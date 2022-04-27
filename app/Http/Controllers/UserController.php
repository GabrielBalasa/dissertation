<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Subscriber;
use App\Models\WaitingList;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\AssignWorkout;
use App\Models\AssignExercise;
use App\Models\ContactUs;

// Controller for the users with the role "user"
class UserController extends Controller
{
    // Function to return dashboard page view
    public function dashboard()
    {
        $user = Auth::user();
        $workouts = AssignWorkout::where('user_id', $user->id)->get();
        $exercisesTotal = 0;
        foreach($workouts as $workout){
            $exercisesTotal += AssignExercise::where('workout_id', $workout->workout_id)->count();
        }
        
        $subscriber = Subscriber::where('user_id', $user->id)->first();
        
        if($subscriber){
            $trainer = $subscriber->trainer()->first();
            $subscription = $subscriber->subscription()->first();
        } else {
            $trainer = 0;
            $subscription = 0;
        }
        
        
        
        return view('user.dashboard', compact('user', 'workouts', 'exercisesTotal', 'trainer' ,'subscription', 'subscriber'));
    }
    
    // Function to return personal details page view
    public function personalDetails()
    {
        $user = Auth::user();
        return view('user.personalDetails', compact('user'));
    }
    
    // Function to update personal details for loggedin user
    public function update(Request $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:225|'. Rule::unique('users')->ignore($user->id),
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->fill([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email
        ]);

        $user->save();

        session()->flash('message', "Your details have been updated.");
        return redirect()->back();
    }
    
    // Function to return exercises page
    public function exercises()
    {
        $user = Auth::user();
        $workouts = AssignWorkout::where('user_id', $user->id)->get();
        return view('user.exercises', compact('user', 'workouts'));
    }
    
    // Function to return trainer page
    public function trainer()
    {
        $user = Auth::user();
        $subscriber = Subscriber::where('user_id', $user->id)->first();
        if(!$subscriber){
            return redirect('/user/dashboard')->withErrors(['msg' => 'You don\'t have a trainer yet.']);
        }
        $trainer = $subscriber->trainer()->first();
        return view('user.trainer', compact('user', 'trainer'));
    }
    
    // Function to return subscription page
    public function subscription()
    {    
        $user = Auth::user();
        $subscriber = Subscriber::where('user_id', $user->id)->first();
        if(!$subscriber){
            return redirect('/user/dashboard')->withErrors(['msg' => 'You don\'t have a trainer yet.']);
        }
        $subscription = $subscriber->subscription()->first();
        
        return view('user.subscription', compact('user', 'subscription', 'subscriber'));
    }
    
    // Function to return become a trainer page
    public function joinus()
    {
        $user = Auth::user();
        if($user){
            $waitingListItem = WaitingList::where('user_id', $user->id)->first();
            if ($waitingListItem || $user->role === "trainer"){ // If the user is already on the waiting list
                return view('joinusSuccess', compact('user'));
            }
        }
        
        return view('joinus', compact('user'));
    }
    
    // Function to add new entry to the waiting list
    public function becomeTrainer()
    {
        $user = Auth::user();
        $userId = Auth::id();
        $date = Carbon::now();
        $entry = new WaitingList();
        $entry->user_id = $userId;
        $entry->applied_at = $date;
        $entry->timestamps = false;
        $entry->save();
        
        return view('joinusSuccess', compact('user'));
    }
    
    // Function to return home page view
    public function home()
    {
        $user = Auth::user();
        return view('home', compact('user'));
    }
    
    // Function to return edit password page view
    public function editPassword(){
        $user = Auth::user();
        return view('user.password', compact('user'));
    }
    
    // Function to update password entry for logged in user (used for trainers too)
    public function updatePassword(Request $request)
    {
    
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        
        $validator = Validator::make($request->all(), [
            'oldpassword' => 'required',
            'newpassword' => 'required|confirmed',
        ], [],
        [
            'oldpassword' => 'password',
            'newpassword' => 'new password',
        ]);
        
        
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else 
        {
            $hashedPassword = Auth::user()->password;
 
            if (Hash::check($request->oldpassword , $hashedPassword )) {
                if (!Hash::check($request->newpassword , $hashedPassword)) {
         
                    $user->password = bcrypt($request->newpassword);
                    User::where('id', $userId)->update( array('password' => bcrypt($request->newpassword)));
                    
                    session()->flash('message', "Success! Your password has been changed.");
                    return redirect()->back();
                } else {
                    return redirect()->back()->withErrors(['msg' => 'Your new password cannot be the same as your old password.']);
                }
            }else{
                return redirect()->back()->withErrors(['msg' => 'Your old password is not matching.']);
            }        
        }
    }
    
    // Function to return edit address page view
    public function editAddress()
    {
        $user = Auth::user();
        return view('user.address', compact('user'));
    }
    
    
    // Function to update address entry for logged in user (used for trainers too)
    public function updateAddress(Request $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        $validator = Validator::make($request->all(), [
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'postcode' => 'required|max:225|',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->fill([
            'address' => $request->address,
            'city' => $request->city,
            'postcode' => $request->postcode
        ]);

        $user->save();

        session()->flash('message', "Success! Your address has been changed.");
        return redirect()->back();
    }
    
    // Function to return view exercises page
    public function viewExercises(Request $request, $id)
    {
        $user = Auth::user();
        $exercises = AssignExercise::where('workout_id', $id)->get();
        return view('user.viewExercises', compact('user', 'exercises'));
    }
    
    // Function to return about us page view
    public function about()
    {
        $user = Auth::user();
        return view('about', compact('user'));
    }
    
    // Function to return contact us page view
    public function contact()
    {
        $user = Auth::user();
        return view('contact', compact('user'));
    }
    
    // Function to create new entry for contact us page enquiries
    public function contactUs()
    {
        $this->validate(request(), [
            'contact_name' => 'required',
            'contact_email' => 'required|email',
            'contact_message' => 'required',
        ], [], [
            'contact_name' => 'name',
            'contact_email' => 'email',
            'contact_message' => 'message',
        ]);
        
        ContactUs::create(request(['contact_name', 'contact_email', 'contact_message']));
        
        session()->flash('message', "Your message has been received.");
        return redirect()->back();
    }
    
    // Function to return terms and conditions page view
    public function terms()
    {
        $user = Auth::user();
        return view('terms', compact('user'));
    }
    
    // Function to return privacy policy page view
    public function privacy()
    {
        $user = Auth::user();
        return view('privacyPolicy', compact('user'));
    }
    
    // Function to return data sharing agreement page view
    public function dataSharing()
    {
        $user = Auth::user();
        return view('dataSharing', compact('user'));
    }
    
    // Function to return payment page view
    public function payment()
    {
        $user = Auth::user();
        return view('payment', compact('user'));
    }
}