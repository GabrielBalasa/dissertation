<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\WaitingList;

//Controller used for the users with role "admin"
class AdminController extends Controller
{
    // Admin area dashboard page
    public function dashboard()
    {
        $user = Auth::user();
        $usersCount = User::all()->count();
        $trainersCount = User::where('role', 'trainer')->count();
        $waitingListCount = WaitingList::where('status', 'pending')->count();
        
        return view('admin.dashboard', compact('user', 'usersCount', 'trainersCount', 'waitingListCount'));
    }
    
    // Admin area users page
    public function users()
    {
        $user = Auth::user();
        $users = User::whereNot('role', 'admin')->get();
        
        return view('admin.users', compact('user', 'users'));
    }
    
    // Admin area users edit page
    public function viewUser(Request $request, $id)
    {
        $user = Auth::user();
        $editUser = User::find($id);
        
        return view('admin.editUser', compact('user', 'id', 'editUser'));
    }
    
    // Admin area users edit page action
    public function editUser(Request $request, $id)
    {
        $updateUser = User::find($id); 
        
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'dob' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $updateUser->fill([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'postcode' => $request->postcode,
            'dob' => $request->dob,
        ]);

        $updateUser->save();

        session()->flash('message', "Details have been changed.");
        return redirect()->back();
    }
    
    // Admin area users delete action
    public function deleteUser(Request $request, $id)
    {
        $user = Auth::user();
        $deleteUser = User::find($id);
        $deleteUser->forceDelete();
        
        session()->flash('message', "User has been deleted");
        return redirect()->back();
    }
    
    // Admin area waiting list page
    public function waitingList()
    {
        $user = Auth::user();
        $waitingList = WaitingList::where('status', 'pending')->get();
        
        return view('admin.waitingList', compact('user', 'waitingList'));
    }
    
    // Admin area waiting list delete action
    public function deleteWaitingList(Request $request, $id)
    {
        $waitingList = WaitingList::find($id);
        $waitingList->forceDelete();
        
        session()->flash('message', "Pending request has been deleted.");
        return redirect()->back();
    }
    
    // Admin area waiting list approve action
    public function approveWaitingList(Request $request, $id)
    {
        $waitingList = WaitingList::find($id);
        $user = User::where('id', $waitingList->user_id)->first();
    
        $waitingList->status = 'approved';
        $user->role = 'trainer';

        $waitingList->save();
        $user->save();

        session()->flash('message', "The request has been approved.");
        return redirect()->back();
    }
    
    
}
