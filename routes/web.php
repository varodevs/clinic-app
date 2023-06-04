<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\UserController;
use App\Mail\Email;
use App\Models\Role;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\RequestContext;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'web'], function () {
Route::get('/', function () {
    return view('home');
})->name('index');

Route::get('/home', function () {
    $style=0;
    return view('home');
})->name('home', 'style');

//Routes Login

Route::get('login', [LoginController::class,'Login_view'])->name('login');

Route::post('login-form', [LoginController::class,'Login_done'])->name('login-done');

//Routes Logout

Route::get('logout',[LoginController::class,'Logout'])->name('logout');

//Routes Register
Route::get('register', [RegisterController::class,'Register_view'])->name('register');
Route::post('register-form', [RegisterController::class,'Register_done'])->name('register-done');

//Routes Verify
Route::get('verify', function () {
    return view('verify');
})->name('verify');
Route::post('verify-form', [RegisterController::class, 'Verify'])->name('verify-done');

//Routes contact
Route::get('contact', [ContactController::class, 'Contact_view'])->name('contact');

//Routes treatments
Route::get('treatments', [TreatmentController::class, 'Treatment_view'])->name('treatment');
Route::get('more-treatments', [TreatmentController::class, 'More_view'])->name('more');

//Routes about
Route::get('about-us', [AboutController::class, 'About_view'])->name('about');

//Routes team
Route::get('team', [TeamController::class, 'Team_view'])->name('team');

//Routes request
Route::get('request', [RequestController::class, 'Request_view'])->name('request');

//Route request form

Route::post('requested', [RequestController::class, 'Request_done'])->name('requestdone');

//Routes Admin
Route::get('admin', [AdminController::class, 'Admin_view'])->name('admin');

//Routes Admin-appointments
Route::get('admin/appointments', [AdminController::class, 'Admin_appo'])->name('admin-appo');

//Routes Admin-Patients
Route::get('admin/patients', [AdminController::class, 'Admin_pat'])->name('admin-pat');

//Routes Admin-Employees
Route::get('admin/employees', [AdminController::class, 'Admin_emp'])->name('admin-emp');

//Routes Admin-Users
Route::get('admin/users', [AdminController::class, 'Admin_usr'])->name('admin-usr');

//Routes Admin-Update
Route::post('admin/users-upd', [AdminController::class, 'Admin_updUsr'])->name('admin-upd-usr');

//Routes Admin-Delete
Route::post('admin/users-del', [AdminController::class, 'Admin_delUsr'])->name('admin-del-usr');

//Routes Profiles
Route::get('user/dashboard', [UserController::class, 'userDashboard'])->name('dashboard');

Route::get('user/profile', [UserController::class, 'userProfile'])->name('profile');

Route::get('user/therapy', [UserController::class, 'userTherapy'])->name('history');

//Route AJAX
Route::get('/check-dates', [AppointmentController::class, 'checkDates'])->name('check');



//db test
//Route::get('/dbtest', function () {
//   try {
//        DB::connection()->getPdo();
//        return "Connected to the database. Data can be stored.";
//    } catch (\Exception $e) {
//        return "Unable to connect to the database.";
//    }
//});
});