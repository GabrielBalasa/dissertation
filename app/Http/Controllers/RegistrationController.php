<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// Controller for the registration process
class RegistrationController extends Controller
{
    // Function to show the registration page
    public function create()
    {
        $user = Auth::user();
        return view('registration.create', compact('user'));
    }
    
    // Function to store data from registration process to database
    public function store()
    {
        $this->validate(request(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'dob' => 'required',
            'password' => 'required',
            'terms' =>'accepted',
        ], [], [
            'firstname' => 'first name',
            'lastname' => 'last name',
            'address' => 'required',
            'dob' => 'date of birth',
            'terms' =>'terms and conditions',
        ]);
        
        $user = User::create(request(['firstname', 'lastname', 'email', 'address', 'city', 'postcode', 'dob', 'password']));
        
        auth()->login($user);
        
        return redirect()->to('/');
    }
}
