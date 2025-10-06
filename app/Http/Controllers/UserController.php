<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AppModelsUser;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

public function index() {
  // $posts = Post::orderBy('created_at', 'desc')->get();

  return view('users.index');
}
    
// Create user
public function create() {
  return view('users.create');
}

// save user
public function store(Request $request) {
 
  // validations
  $request->validate([
    'name' => 'required',
    'email' => 'required|email',
    'password'=>[
       'required',
        Password::min(8)
      ->mixedCase()
      ->letters()
      ->numbers()
      ->symbols(),
      
    ],
  ]);
  

  $user = new User;

  $user->name = $request->name;
  $user->email = $request->email;
  $user->password = $request->password;

  $user->save();
  return redirect()->route('posts.index')->with('success', 'User created successfully.');
}
public function login(Request $request){
  $request->validate([
    'email'=>'required|email',
    'password'=>'required'
   ]);

   $users=DB::select('select id,email,password from users where email=?',[$request->email]);
   if($users>0){
    $user = $users[0];

      if (Hash::check($request->password, $user->password)) {
                // Login successful
                // You can then manage the user's session or generate a token
                return response()->json(['message' => 'Login successful', 'user_id' => $user->id]);
            }
   }
   return response()->json(['message' => 'Invalid credentials'], 401);
}
}


