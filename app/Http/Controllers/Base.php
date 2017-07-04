<?php

namespace App\Http\Controllers;

class ControllerBase extends Controller{

    public function __construct(){
//        $this->middleware('guest');

    }

    public function index(){
        $data = ['color'=>'pink'];
        return view('base/index', $data);
    }

    public function order(){
        return view('base/index');
    }

    public function add_order(){
        return view('base/add_order');
    }

    public function list_customer(){
        return view('base/index');
    }

    public function list_user(){
        return view('base/index');
    }

    public function list_item(){
        return view('base/index');
    }

    public function list_inventory(){
        return view('base/index');
    }

    public function add_customer(){
        return view('base/index');
    }
}