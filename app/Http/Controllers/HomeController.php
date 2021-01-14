<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ImotiService;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $imoti;

    public function __construct(ImotiService $imoti )
    {
        //$this->middleware('auth');
        $this->imoti = $imoti;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function getImotiFiltar()
    {  
        return $this->imoti->getImotiFiltar();
    }

    public function getImotiHome()
    {  
        return $this->getImoti($page = 'home');
    }

    public function getImotiImoti()
    {  
        return $this->getImoti($page = 'imoti');
    }

    public function getImotiNaem()
    {  
        return $this->getImoti($page = 'naem');
    }

    public function getImotiProdajba()
    {  
        return $this->getImoti($page = 'prodajba');
    }
    
     public function getImoti($page)
    {
        // Gets this class name only ( no namespace)
        $class = substr(strrchr(__CLASS__, "\\"), 1);
        //Pulls data from ImotiService service container
        $all = $this->imoti->getimoti($class, $page);
        //dd($all);
        return view($page, ['imoti' => $all]);
    }

    public function index()
    {
        return view('home');
    }
}
