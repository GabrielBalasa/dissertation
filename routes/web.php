<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StripeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Routes to the landing page */

Route::get('/', [UserController::class, 'home']);
Route::get('/home', [UserController::class, 'home']);

Route::get('/about', [UserController::class, 'about']); // Route to the about us page

/* Routes to the contact us page and contacts functions */

Route::get('/contact', [UserController::class, 'contact']);
Route::post('/contact', [UserController::class, 'contactUs']);

Route::get('/terms', [UserController::class, 'terms']); // Route to the terms and conditions page

Route::get('/privacy', [UserController::class, 'privacy']); // Route to the privacy policy page

Route::get('/datasharing', [UserController::class, 'dataSharing']); // Route to the data sharing agreement page

Route::get('/payment', [UserController::class, 'payment']);

/* Routes for the become a trainer page and waiting list functions */

Route::get('/joinus', [UserController::class, 'joinus']);
Route::post('/joinus', [UserController::class, 'becomeTrainer']);

/* Routes for the "user" role */

Route::get('/user/dashboard', [UserController::class, 'dashboard'])->middleware('role:user');
Route::get('/user/personaldetails', [UserController::class, 'personalDetails'])->middleware('role:user');
Route::post('/user/personaldetails', [UserController::class, 'update'])->middleware('role:user');
Route::get('/user/exercises', [UserController::class, 'exercises'])->middleware('role:user');
Route::get('/user/trainer', [UserController::class, 'trainer'])->middleware('role:user');
Route::get('/user/subscription', [UserController::class, 'subscription'])->middleware('role:user');
Route::get('/user/personaldetails/changepassword', [UserController::class, 'editPassword'])->middleware('role:user');
Route::post('/user/personaldetails/changepassword', [UserController::class, 'updatePassword'])->middleware('role:user');
Route::get('/user/personaldetails/changeaddress', [UserController::class, 'editAddress'])->middleware('role:user');
Route::post('/user/personaldetails/changeaddress', [UserController::class, 'updateAddress'])->middleware('role:user');
Route::get('/user/exercises/{id}', [UserController::class, 'viewExercises'])->middleware('role:user');
Route::get('/user/message/{id}', [UserController::class, 'viewMessages'])->middleware('role:user');
Route::post('/user/message/{id}', [UserController::class, 'messageClient'])->middleware('role:user');

/* Routes for the "trainer" role */

Route::get('/trainer/dashboard', [TrainerController::class, 'dashboard'])->middleware('role:trainer');
Route::get('/trainer/personaldetails', [TrainerController::class, 'personalDetails'])->middleware('role:trainer');
Route::post('/trainer/personaldetails', [UserController::class, 'update'])->middleware('role:trainer');
Route::get('/trainer/clients', [TrainerController::class, 'clients'])->middleware('role:trainer');
Route::get('/trainer/exercises', [TrainerController::class, 'exercises'])->middleware('role:trainer');
Route::get('/trainer/workouts', [TrainerController::class, 'workouts'])->middleware('role:trainer');
Route::get('/trainer/subscriptions', [TrainerController::class, 'subscriptions'])->middleware('role:trainer');
Route::get('/trainer/personaldetails/changepassword', [TrainerController::class, 'editPassword'])->middleware('role:trainer');
Route::post('/trainer/personaldetails/changepassword', [UserController::class, 'updatePassword'])->middleware('role:trainer');
Route::get('/trainer/personaldetails/changeaddress', [TrainerController::class, 'editAddress'])->middleware('role:trainer');
Route::post('/trainer/personaldetails/changeaddress', [UserController::class, 'updateAddress'])->middleware('role:trainer');
Route::get('/trainer/exercises/newexercise', [TrainerController::class, 'viewNewExercise'])->middleware('role:trainer');
Route::post('/trainer/exercises/newexercise', [TrainerController::class, 'addNewExercise'])->middleware('role:trainer');
Route::get('/trainer/workouts/newworkout', [TrainerController::class, 'viewNewWorkout'])->middleware('role:trainer');
Route::post('/trainer/workouts/newworkout', [TrainerController::class, 'addNewWorkout'])->middleware('role:trainer');
Route::get('/trainer/settiers', [TrainerController::class, 'viewTiers'])->middleware('role:trainer');
Route::post('/trainer/settiers', [TrainerController::class, 'setTiers'])->middleware('role:trainer');
Route::get('/trainer/exercises/{id}', [TrainerController::class, 'editExercise'])->middleware('role:trainer');
Route::post('/trainer/exercises/{id}', [TrainerController::class, 'updateExercise'])->middleware('role:trainer');
Route::get('/trainer/exercises/{id}/delete', [TrainerController::class, 'deleteExercise'])->middleware('role:trainer');
Route::get('/trainer/workouts/{id}', [TrainerController::class, 'editWorkout'])->middleware('role:trainer');
Route::post('/trainer/workouts/{id}', [TrainerController::class, 'updateWorkout'])->middleware('role:trainer');
Route::get('/trainer/workouts/{id}/delete', [TrainerController::class, 'deleteWorkout'])->middleware('role:trainer');
Route::get('/trainer/exercises/{id}/assign', [TrainerController::class, 'viewAssignExercise'])->middleware('role:trainer');
Route::post('/trainer/exercises/{id}/assign', [TrainerController::class, 'AssignExercise'])->middleware('role:trainer');
Route::get('/trainer/workouts/{id}/assign', [TrainerController::class, 'viewAssignWorkout'])->middleware('role:trainer');
Route::post('/trainer/workouts/{id}/assign', [TrainerController::class, 'AssignWorkout'])->middleware('role:trainer');
Route::get('/trainer/message/{id}', [TrainerController::class, 'viewMessages'])->middleware('role:trainer');
Route::post('/trainer/message/{id}', [TrainerController::class, 'messageClient'])->middleware('role:trainer');

/* Routes for the "admin" role */

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('role:admin');
Route::get('/admin/users', [AdminController::class, 'users'])->middleware('role:admin');
Route::get('/admin/users/{id}', [AdminController::class, 'viewUser'])->middleware('role:admin');
Route::post('/admin/users/{id}', [AdminController::class, 'editUser'])->middleware('role:admin');
Route::get('/admin/users/{id}/delete', [AdminController::class, 'deleteUser'])->middleware('role:admin');
Route::get('/admin/waitinglist', [AdminController::class, 'waitingList'])->middleware('role:admin');
Route::get('/admin/waitinglist/{id}', [AdminController::class, 'approveWaitingList'])->middleware('role:admin');
Route::get('/admin/waitinglist/{id}/delete', [AdminController::class, 'deleteWaitingList'])->middleware('role:admin');

/* Routes to display trainers listing page and trainer profile page */

Route::get('/trainers', [TrainerController::class, 'index']);
Route::get('/trainers/{city}', [TrainerController::class, 'trainerCity']);
Route::get('/trainers/profile/{id}', [TrainerController::class, 'viewTrainer']);

/* Routes for the registration process */

Route::get('/register', [RegistrationController::class, 'create']);
Route::post('register', [RegistrationController::class, 'store']);

/* Routes for the login process */

Route::get('/login', [SessionsController::class, 'create']);
Route::post('/login', [SessionsController::class, 'store']);
Route::get('/logout', [SessionsController::class, 'destroy']);

/* Routes for the payment gateway */

Route::get('/trainers/{trainer_id}/subscribe/{subscription_tier}', [StripeController::class, 'handleGet']);
Route::post('/trainers/{trainer_id}/subscribe/{subscription_tier}', [StripeController::class, 'handlePost'])->name('stripe.payment');