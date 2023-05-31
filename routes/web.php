<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TreatmentController;
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

//Routes Register
Route::get('register', [RegisterController::class,'Register_view'])->name('register');
Route::post('register-form', [RegisterController::class,'Register_done'])->name('register-done');
Route::post('verify-form', [RegisterController::class, 'Verify'])->name('verify');

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
Route::get('request-form', [RequestController::class, 'Request_done'])->name('request-done');

//Routes Admin
Route::get('admin', [AdminController::class, 'Admin_view'])->name('admin');

//Routes Admin-appointments
Route::get('admin/appointments', [AdminController::class, 'Admin_appo'])->name('admin-appo');

//Routes Admin-Patients
Route::get('admin/patients', [AdminController::class, 'Admin_pat'])->name('admin-pat');

//Routes Admin-Employees
Route::get('admin/employees', [AdminController::class, 'Admin_emp'])->name('admin-emp');


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