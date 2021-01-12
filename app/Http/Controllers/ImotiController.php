<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImotiModel;

class ImotiController extends Controller
{
    protected $forbiden = array();

    public function __construct()
    {
        $this->forbiden = ['address', 'phone', 'owner', 'notes'];
    }

    public function index()
    {
        
        $links = ImotiModel::imoti(0, 10);
        $imoti = $links->makeHidden($this->forbiden)->toArray();
        //dd($imoti);
        return view('welcome', ['imoti' => $imoti, 'links' => $links->links()]);
    }

    public function dashboard()
    {
        $data=[
          'var1'=>'something',
          'var2'=>'something',
          'var3'=>'something',
        ];
        return view('vendor/adminlte/dashboard', ['name' => 'James']);
    }

    public function count()
    {
        $count = new ImotiModel;
        dd($count->count());
        return view('vendor/adminlte/imoti');
    }

    public function agentsImoti($id=0)
    {
        $imoti = new ImotiModel;

        dd($imoti->agentsImoti($id));
    }

    public function imot($id)
    {
        $imot = new ImotiModel;

        dd($imot->imot($id));
    }
}
