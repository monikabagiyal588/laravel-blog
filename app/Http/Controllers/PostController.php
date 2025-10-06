<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AppModelsPost;
    use App\Models\Post;

class PostController extends Controller
{

public function index() {
    
  $posts = Post::orderBy('created_at', 'desc')->get();
  return view('posts.index', ['posts' => $posts]);
}
    
// Create post
public function create() {
  return view('posts.create');
}

// Store post
public function store(Request $request,$id) {
  // validations
  $request->validate([
    'title' => 'required',
    'description' => 'required',
    'category'=>'required',
  ]);

  $post = new Post;

  $post->title = $request->title;
  $post->description = $request->description;
  $post->category = $request->category;

  $post->save();
  return redirect()->route('posts.index')->with('success', 'Post created successfully.');
}

}
