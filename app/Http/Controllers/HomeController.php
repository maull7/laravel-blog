<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\posts;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        return view('home', ['judul' => 'home', 'posts' => posts::all()]);
    }
}
