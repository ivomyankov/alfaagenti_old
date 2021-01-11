<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImotiModel;

class ImotiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
}
