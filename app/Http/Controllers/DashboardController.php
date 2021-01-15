<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImotiModel;
use App\Service\ImotiService;
use Auth;

class DashboardController extends ImotiController
{
    public function __construct(ImotiService $imoti )
    {
        $this->middleware('auth');
        $this->imoti = $imoti;        
    }

    public function getImoti()
    {   
        // Gets this class name only ( no namespace)
        $class = substr(strrchr(__CLASS__, "\\"), 1);
        $all = $this->imoti->getimoti($class, $page='dash_imoti');


        $var = $imoti->getImoti2($class, Auth::user() );
        //return $this->dashboardImoti($var);

        $imoti = new ImotiModel;
        $func = $var['method'];
        $all = $imoti->$func($var['agent']); 
        return view('vendor/adminlte/partials/dashboard/imoti', ['imoti' => $all]);
    }

    public function test()
    {
        $links = ImotiModel::imoti(1, 10);
        $imoti = $links->makeHidden($this->forbiden)->toArray();
        //dd($imoti);
        return view('vendor/adminlte/dashboard', ['imoti' => $imoti, 'links' => $links->links()]);
    }
}
