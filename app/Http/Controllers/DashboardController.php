<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('dashboard');
    }
}
