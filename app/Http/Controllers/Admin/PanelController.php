<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function index()
    {
        return response([
            "data"=>'done',
            'status'=>'ok'
        ],200);
        //return view('Admin.panel');
    }
}
