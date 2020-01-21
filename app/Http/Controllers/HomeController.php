<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    // 一般会員向けのトップページ表示
    public function free_index()
    {
        return view('free');
    }

    // プレミア会員向けのトップページ表示
    public function premier_index()
    {
        return view('premier');
    }





}
