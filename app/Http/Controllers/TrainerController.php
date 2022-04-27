<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\Subscriber;
use App\Models\Exercise;
use App\Models\Workout;
use Illuminate\Support\Facades\DB;
use App\Models\AssignExercise;
use App\Models\AssignWorkout;
use App\Models\Qualification;

// Controller for users with the "trainer" role
class TrainerController extends Controller {

    // Function to return dashboard for trainers
    public function dashboard()
    {
        $user = Auth::user();
        $clientsCount = Subscriber::where('trainer_id', $user->id)->count();
        $subscriptions = Subscription::where('trainer_id', $user->id)->first();
        if($subscriptions){
            $t1price = $subscriptions->tier1_price;
            $t2price = $subscriptions->tier2_price;
            $t3price = $subscriptions->tier3_price;
        } else {
            $t1price = 0;
            $t2price = 0;
            $t3price = 0;
        }
        $tier1Count = Subscriber::where('trainer_id', $user->id)->where('subscription_tier', '1')->count();
        $tier2Count = Subscriber::where('trainer_id', $user->id)->where('subscription_tier', '2')->count();
        $tier3Count = Subscriber::where('trainer_id', $user->id)->where('subscription_tier', '3')->count();
        $earnings = ($t1price * $tier1Count) + ($t2price * $tier2Count) + ($t3price * $tier3Count);
        $total = doubleval($earnings - ($earnings * 0.1));
        $total = bcadd($total, '0', 2);
        return view('trainer.dashboard', compact('user', 'clientsCount', 'subscriptions', 'tier1Count', 'tier2Count', 'tier3Count', 'total'));
    }

    // Function to return personal details page view
    public function personalDetails()
    {
        $user = Auth::user();
        return view('trainer.personalDetails', compact('user'));
    }

    // Function to return exercises page view
    public function exercises()
    {
        $user = Auth::user();
        $exercises = Exercise::where('trainer_id', $user->id)->get();
        return view('trainer.exercises', compact('user', 'exercises'));
    }

    // Function to return clients page view
    public function clients()
    {
        $user = Auth::user();
        $subscribers = Subscriber::where('trainer_id', $user->id)->get();
        if (!count($subscribers)) {
            return redirect('/trainer/dashboard')->withErrors(['msg' => 'You have no clients yet.']);
        }
        return view('trainer.clients', compact('user', 'subscribers'));
    }

    // Function to return subscriptions page view
    public function subscriptions()
    {
        $user = Auth::user();
        $subscriptions = Subscription::where('trainer_id', $user->id)->first();
        return view('trainer.subscriptions', compact('user', 'subscriptions'));
    }

    // Function to return edit password page view
    public function editPassword()
    {
        $user = Auth::user();
        return view('trainer.password', compact('user'));
    }

    // Function to return edit address page view
    public function editAddress()
    {
        $user = Auth::user();
        return view('trainer.address', compact('user'));
    }

    // Function to return new exercise page view
    public function viewNewExercise()
    {
        $user = Auth::user();
        return view('trainer.newExercise', compact('user'));
    }

    // Function to create new entry for new exercise
    public function addNewExercise()
    {
        $entry = $this->validate(request(), [
            'exercise_title' => 'required',
            'exercise_description' => 'required',
            'link' => 'required',
            'sets' => 'required',
            'reps' => 'required',
        ]);
        $entry['trainer_id'] = Auth::id();

        Exercise::create($entry);
        session()->flash('message', "Your exercise has been created.");
        return redirect()->back();
    }

    // Function to return set tiers page view
    public function viewTiers()
    {
        $user = Auth::user();
        $subscription = (array)(DB::table('subscriptions')->where('trainer_id', $user->id)->first() ?? new Subscription());
        return view('trainer.setTiers', compact('user', 'subscription'));
    }

    // Function to update or create subscription tiers entry for trainer
    public function setTiers(Request $request)
    {
        $userId = Auth::id();

        $validator = Validator::make($request->all(), [
            'tier1_price' => 'required_without:tier2_price,tier2_description,tier3_price,tier3_description',
            'tier1_description' => 'required_without:tier2_price,tier2_description,tier3_price,tier3_description',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Subscription::updateOrCreate(
            [
                'trainer_id' => $userId,
            ],
            [
                'tier1_price' => $request->tier1_price,
                'tier1_description' => $request->tier1_description,
                'tier2_price' => $request->tier2_price,
                'tier2_description' => $request->tier2_description,
                'tier3_price' => $request->tier3_price,
                'tier3_description' => $request->tier3_description,
            ]
        );

        session()->flash('message', "You have set your tier(s).");
        return redirect()->back();
    }
    
    // Function to return edit exercise page view
    public function editExercise(Request $request, $id)
    {
        $user = Auth::user();
        $exercise = Exercise::find($id);
        return view('trainer.editExercise', compact('user', 'id', 'exercise'));
    }
    
    // Function to update exercise with new data
    public function updateExercise(Request $request, $id)
    {
        
        $exercise = Exercise::find($id); 
        
        $validator = Validator::make($request->all(), [
            'exercise_title' => 'required',
            'exercise_description' => 'required',
            'link' => 'required',
            'sets' => 'required',
            'reps' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $exercise->fill([
            'exercise_title' => $request->exercise_title,
            'exercise_description' => $request->exercise_description,
            'link' => $request->link,
            'sets' => $request->sets,
            'reps' => $request->reps,
        ]);

        $exercise->save();

        session()->flash('message', "Your exercise has been changed.");
        return redirect()->back();
    }
    
    // Function to delete exercise entry
    public function deleteExercise(Request $request, $id)
    {
        $exercise = Exercise::find($id);
        $workouts_exercises = AssignExercise::where('exercise_id', $id);
        $workouts_exercises->forceDelete();
        $exercise->forceDelete();
        
        session()->flash('message', "Your exercise has been deleted.");
        return redirect()->back();
    }
    
    // Function to return workouts page view
    public function workouts()
    {
        $user = Auth::user();
        $workouts = Workout::where('trainer_id', $user->id)->get();
        return view('trainer.workouts', compact('user', 'workouts'));
    }
    
    // Function to return new workout page view
    public function viewNewWorkout()
    {
        $user = Auth::user();
        return view('trainer.newWorkout', compact('user'));
    }

    // Function to add new workout entry
    public function addNewWorkout()
    {
        $entry = $this->validate(request(), [
            'workout_title' => 'required',
        ]);
        $entry['trainer_id'] = Auth::id();

        Workout::create($entry);
        session()->flash('message', "Your workout has been created.");
        return redirect()->back();
    }
    
    // Function to return edit workout page view
    public function editWorkout(Request $request, $id)
    {
        $user = Auth::user();
        $workout = Workout::find($id);
        return view('trainer.editWorkout', compact('user', 'id', 'workout'));
    }
    
    // Function to update workout entry with new data
    public function updateWorkout(Request $request, $id)
    {
        
        $workout = Workout::find($id); 
        
        $validator = Validator::make($request->all(), [
            'workout_title' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $workout->fill([
            'workout_title' => $request->workout_title,
        ]);

        $workout->save();

        session()->flash('message', "Your workout has been changed.");
        return redirect()->back();
    }
    
    // Function to delete workout entry
    public function deleteWorkout(Request $request, $id)
    {
        $workout = Workout::find($id);
        $workouts_assignments = AssignWorkout::where('workout_id', $id);
        $workouts_exercises = AssignExercise::where('workout_id', $id);
        $workouts_exercises->forceDelete();
        $workouts_assignments->forceDelete();
        $workout->forceDelete();
        
        session()->flash('message', "Your workout has been deleted.");
        return redirect()->back();
    }
    
    // Function to return assign exercise page view
    public function viewAssignExercise(Request $request, $id)
    {
        $user = Auth::user();
        $exercise = Exercise::find($id);
        $workouts = Workout::where('trainer_id', $user->id)->get();
        $assignedTo = AssignExercise::where('exercise_id', $id)->get();
        if (!$workouts) {
            return redirect('/trainer/exercises')->withErrors(['msg' => 'You don\'t have any workouts yet.']);
        }
        return view('trainer.assignExercise', compact('user', 'id', 'exercise', 'workouts', 'assignedTo'));
    }
    
    // Function to create new entry for assgined exercise to workout
    public function assignExercise(Request $request, $id)
    {
        AssignExercise::create([
            'exercise_id' => $id,
            'workout_id' => $request->workout_id,
        ]);
        
        session()->flash('message', "Your exercise has been assigned.");
        return redirect()->back();
    }
    
    // Function to return assign workout page view
    public function viewAssignWorkout(Request $request, $id)
    {
        $user = Auth::user();
        $workout = Workout::find($id);
        $users = Subscriber::where('trainer_id', $user->id)->get();
        $assignedTo = AssignWorkout::where('workout_id', $id)->get();
        if (!$users) {
            return redirect('/trainer/workouts')->withErrors(['msg' => 'You don\'t have any client yet.']);
        }
        return view('trainer.assignWorkout', compact('user', 'id', 'workout', 'users', 'assignedTo'));
    }
    
    // Function to create new entry for assigned workout to user
    public function assignWorkout(Request $request, $id)
    {
        
        $validator = Validator::make($request->all(), [
            'workout_start_date' => 'required',
            'workout_end_date' => 'required',
        ], [], [
            'workout_start_date' => 'start date of workout',
            'workout_end_date' => 'end date of workout',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        AssignWorkout::create([
            'workout_id' => $id,
            'user_id' => $request->user_id,
            'workout_start_date' => $request->workout_start_date,
            'workout_end_date' => $request->workout_end_date,
        ]);
        
        session()->flash('message', "Your workout has been assigned.");
        return redirect()->back();
    }
    
    // Function to return trainers page listing
    public function index()
    {
        $user = Auth::user();
        $trainersList = User::where('role', 'trainer')->get();
        $cities = User::where('role', 'trainer')->select('city')->distinct()->get();
        
        return view('trainers', compact('user', 'trainersList', 'cities'));
    }
    
    // Function to return trainers page listing based on city;
    public function trainerCity(Request $request, $city)
    {
        $user = Auth::user();
        $trainersList = User::where('city', $city)->where('role', 'trainer')->get();
        $cities = User::where('role', 'trainer')->select('city')->distinct()->get();
        
        return view('trainers', compact('user', 'trainersList', 'cities'));
    }
    
    // Function to return trainer profile page
    public function viewTrainer(Request $request, $id)
    {
        $user = Auth::user();
        $trainer = User::where('id', $id)->first();
        $trainerQualifications = Qualification::where('trainer_id', $id)->get();
        $subscriptions = Subscription::where('trainer_id', $id)->first();
        
        if($user){
            $alreadySubscribed = Subscriber::where('user_id', $user->id)->first();
            if($alreadySubscribed){
                return view('trainerProfile', compact('user', 'trainer', 'trainerQualifications', 'subscriptions', 'alreadySubscribed'));
            }
        }
        $alreadySubscribed = 0;
        return view('trainerProfile', compact('user', 'trainer', 'trainerQualifications', 'subscriptions', 'alreadySubscribed'));
    }
    
    // Function to return private messages page
    public function viewMessages(Request $request, $id)
    {
        $user = Auth::user();
        
        return view('trainer.message', compact('user'));
    }
    
    // Function to create entry for new private message
    public function messageClient(Request $request, $id)
    {
        $user = Auth::user();
        
        return view('trainer.message', compact('user'));
    }
}
