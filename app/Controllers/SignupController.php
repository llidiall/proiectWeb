<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\DataModel;
use CodeIgniter\I18n\Time;
  
class SignupController extends Controller
{
    public function index()
    {
        helper(['form']);
        $data = [];
        return view('signup', $data);
    }
  
    public function store()
    {
        helper(['form']);
        $rules = [
            'username'          => 'required|min_length[2]|max_length[50]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];
          
        if($this->validate($rules)){
            $userModel = new UsersModel();
            $data = [
                'username'     => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'admin' => '0'
            ];
            $userModel->save($data);
            return redirect()->to('login');
        }else{
            $data['validation'] = $this->validator;
            return view('signup', $data);
        }
          
    }
  
}