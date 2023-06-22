<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AfterloginController extends BaseController
{
    public function index()
    {
        return view("afterlogin");
    }
}
