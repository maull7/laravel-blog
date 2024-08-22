<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\posts;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('add_post', ['judul' => 'tambahkan data', 'category' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'body' => 'required',
        ]);
        $data = [
            'author_id' => Auth::user()->id,
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ];

        posts::create($data);
        return route('/addposts')->with(['success' => 'Data berhasil diubah!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('home_post', ['judul' => 'selengkapnya', 'post' => posts::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('edit_post', ['judul' => 'edit postingan', 'category' => Category::all(), 'post' => posts::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Temukan post berdasarkan ID
        $post = posts::findOrFail($id);

        // Perbarui data post
        $post->update([
            'author_id' => Auth::user()->id,
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]);

        // Redirect ke halaman yang sesuai dengan pesan sukses
        return route('/addposts')->with(['success' => 'Data berhasil diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    // Menghapus post berdasarkan ID
    public function destroy(String $id)
    {
        // Temukan post berdasarkan ID
        $post = posts::findOrFail($id);

        // Hapus post
        $post->delete();

        // Redirect dengan pesan sukses
        return route('/addposts')->with(['success' => 'Data berhasil diubah!']);
    }

    public function where(User $user)
    {
        // $post = posts::where('author_id', $id)->get();

        return view('home', ['judul' => 'selengkapnya', 'posts' => $user->posts]);
    }
    public function category(Category $category)
    {


        return view('home', ['judul' => 'category', 'posts' => $category->posts]);
    }
}
