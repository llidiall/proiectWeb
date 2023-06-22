<?php

namespace app\Controllers;

use App\Controllers\BaseController;

class WelcomeController extends BaseController
{
    public function index()
    {
        helper('cookie');
        $session=session();
        if(!is_null(get_cookie('username')))
        {
            $session->set('username',get_cookie('username'));
           
            return redirect()->to(base_url('/afterlogin'));
        }
        else
        {return view('welcome_message');}
    }
    public function upload()
    {
        return view('upload');
    }
}
