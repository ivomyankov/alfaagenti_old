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
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function getImoti(ImotiService $imoti)
    {
        if (Auth::user()) {   // Check is user logged in
            $user = Auth::user();
        } else {
            $user = 'guest';
        }
        // Gets this class name only ( no namespace)
        $class = substr(strrchr(__CLASS__, "\\"), 1);
        //parametres: This class and loged in user or guest
        //dd($imoti->getimoti($class, $user));
        $all = $imoti->getimoti($class, $user);
        return view('home', ['imoti' => $all]);
    }

    public function index()
    {
        return view('home');
    }
}
