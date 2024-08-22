<?php

namespace App\Http\Controllers;

use App\Models\posts;
use App\Models\User;
use Illuminate\Http\Request;

class MyblogController extends Controller
{
    public function index(String $id)
    {

        return view('myblog', ['judul' => 'artikel saya', 'posts' =>  posts::where('author_id', $id)->get()]);
    }
}
