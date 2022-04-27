<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Controller for the login process 
class SessionsController extends Controller
{
    // Function to show login page
    public function create()
    {
        $user = Auth::user();
        return view('sessions.create', compact('user'));
    }
    
    // Function to create session and login user
    public function store()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
        
        return redirect()->to('/');
    }
    
    // Function to logout user
    public function destroy()
    {
        auth()->logout();
        
        return redirect()->to('/');
    }
}
