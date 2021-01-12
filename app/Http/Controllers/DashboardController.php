<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImotiModel;

class DashboardController extends ImotiController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->forbiden = ['address', 'phone', 'owner', 'notes'];
    }

    public function test()
    {
        $links = ImotiModel::imoti(1, 2);
        $imoti = $links->makeHidden($this->forbiden)->toArray();
        //dd($imoti);
        return view('vendor/adminlte/dashboard', ['imoti' => $imoti, 'links' => $links->links()]);
    }
}
