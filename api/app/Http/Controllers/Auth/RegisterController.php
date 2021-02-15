<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RegisterController extends Controller
{

    public function __construct(){
        $this->middleware('guest');
    }

    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        auth()->attempt($request->only('email','password'));

        return Redirect()->route('dashboard');

    }

}
