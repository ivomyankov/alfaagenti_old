<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImotiModel;
use App\Service\ImotiService;
use Auth;

class DashboardController extends ImotiController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->forbiden = ['address', 'phone', 'owner', 'notes'];
    }

    public function getImoti(ImotiService $imoti)
    {   
        //parametres: This class and loged in user 
        //dd($imoti->getImoti(Auth::user()));
        // Gets this class name only ( no namespace)
        $class = substr(strrchr(__CLASS__, "\\"), 1);
        $var = $imoti->getImoti2($class, Auth::user() );
        //return $this->dashboardImoti($var);

        $imoti = new ImotiModel;
        $func = $var['method'];
        $all = $imoti->$func($var['agent']); 
        return view('vendor/adminlte/partials/dashboard/imoti', ['imoti' => $all]);
    }

    public function test()
    {
        $links = ImotiModel::imoti(1, 2);
        $imoti = $links->makeHidden($this->forbiden)->toArray();
        //dd($imoti);
        return view('vendor/adminlte/dashboard', ['imoti' => $imoti, 'links' => $links->links()]);
    }
}
