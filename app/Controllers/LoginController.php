<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;


class LoginController extends BaseController
{
    public function index()
    { 
        helper('cookie');
        $session=session();
        $model= new UsersModel();
        $user=$this->request->getVar('username');
        $pass=$this->request->getVar('password');
        $admin=$this->request->getVar('admin');
        $data=$model->where('username',$user)->orwhere('password',$pass)->findAll();
        if((!empty(get_cookie('username')))&&(!empty(get_cookie('password')))){

            if(get_cookie('username')==$user)
            {
                $data['username']=get_cookie('username');
                $data['admin'] = $admin;
                return view('afterlogin',$data);
            }
        }else
        return view('login');
       
    }
   public function check()
{
    helper('cookie');
    $session = session();
    $model = new UsersModel();
    $user = $this->request->getVar('username');
    $pass = $this->request->getVar('password');
    $admin = $this->request->getVar('admin');

    // Verificăm dacă utilizatorul există în baza de date
    $userData = $model->where('username', $user)->first();

    if (!empty($userData)) {
        // Verificăm dacă parola introdusă este corectă
        if (password_verify($pass, $userData['password'])) { // Compare hashed password
            $value = $this->request->getVar('rememberme');
            $checked = ($value === 'on') ? true : false;
            $session->set('username', $user);
            $session->set('admin_user', $admin);

            if ($checked) {
                set_cookie('username', $user, 60 * 60 * 24 * 365);
                set_cookie('password', $userData['password'], 60 * 60 * 24 * 365); // Store hashed password
            } else {
                set_cookie('username', $user, false);
                set_cookie('password', $userData['password'], false);
            }

            $session->set('user_name', $user);
            return redirect()->to(base_url('/afterlogin'));
        } else {
            $data['error'] = 'Username/Password Invalid';
            return view('login', $data);
        }
    } else {
        $data['error'] = 'Username/Password Invalid';
        return view('login', $data);
    }
}



public function afterlogin()
{
    helper('cookie');
    $session = session();
    $user = $session->get('username');

    if (!empty(get_cookie('username'))) {
        if (get_cookie('username') !== $user) {
            echo "Wrong cookie :(";
        } else {
            $data['username'] = get_cookie('username');
            return view('afterlogin',$data);
        }
    } else {
       return view('afterlogin');
    }
}


public function logout()
{
    helper('cookie');
    set_cookie('username','',time()-100);
    set_cookie('password', '',time()-100);
    delete_cookie('username');
    delete_cookie('password');
    $session = session();
    $session->destroy();
    return redirect()->to(base_url('/login'))->withCookies();
    
}
public function getUserAdminStatus($username)
{
    $userModel = new \App\Models\UsersModel();
    $user = $userModel->where('username', $username)->first();

    if ($user) {
        $admin = $user['admin'];
        if ($admin == 1) {
            echo "User is an admin.";
        } else {
            echo "User is not an admin.";
        }
    } else {
        echo "User not found.";
    }
}
}