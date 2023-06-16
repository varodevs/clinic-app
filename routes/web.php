<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\Resend;
use App\Http\Controllers\StripeController;
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

//Routes Resend
Route::get('reset-form', [Resend::class, 'ResendPasswView'])->name('reset-view');

Route::post('reset-email', [Resend::class, 'ResendPassw'])->name('reset-email');

Route::post('verify-passw-reset', [Resend::class, 'ResetSubmit'])->name('reset-submit');

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

Route::post('admin/canceled', [AdminController::class, 'delAppoAdm'])->name('admin-del-appo');

Route::post('admin/updated', [AdminController::class, 'updAppoAdm'])->name('admin-upd-appo');

//Routes Admin-Patients
Route::get('admin/patients', [AdminController::class, 'Admin_pat'])->name('admin-pat');

//Routes Admin-Employees
Route::get('admin/employees', [AdminController::class, 'Admin_emp'])->name('admin-emp');

//Routes Admin-Users
Route::get('admin/users', [AdminController::class, 'Admin_usr'])->name('admin-usr');

//Routes Admin-Therapies
Route::get('admin/therapies', [AdminController::class, 'Admin_ther'])->name('admin-ther');

//Routes Admin-CH
Route::get('admin/ch', [AdminController::class, 'Admin_ch'])->name('admin-ch');

//Routes Admin-Trauma
Route::get('admin/trauma', [AdminController::class, 'Admin_trau'])->name('admin-trau');

//Routes Admin-Address
Route::get('admin/address', [AdminController::class, 'Admin_addr'])->name('admin-addr');

//Routes Admin-Create Forms
Route::get('admin/new-user-form', [AdminController::class, 'Admin_newUsrView'])->name('admin-new-usr-view');

Route::get('admin/new-appo-form', [AdminController::class, 'Admin_newAppoView'])->name('admin-new-appo-view');

Route::get('admin/new-pat-form', [AdminController::class, 'Admin_newPatView'])->name('admin-new-pat-view');

Route::get('admin/new-emp-form', [AdminController::class, 'Admin_newEmpView'])->name('admin-new-emp-view');

Route::get('admin/new-ther-form', [AdminController::class, 'Admin_newTherView'])->name('admin-new-ther-view');

Route::get('admin/new-ch-form', [AdminController::class, 'Admin_newChView'])->name('admin-new-ch-view');

Route::get('admin/new-trau-form', [AdminController::class, 'Admin_newTrauView'])->name('admin-new-trau-view');

Route::get('admin/new-addr-form', [AdminController::class, 'Admin_newAddrView'])->name('admin-new-addr-view');

//Routes Admin-Create

Route::post('admin/new-user', [AdminController::class, 'Admin_newUsr'])->name('admin-new-usr');

Route::post('admin/new-appo', [AdminController::class, 'Admin_newAppo'])->name('admin-new-appo');

Route::post('admin/new-pat', [AdminController::class, 'Admin_newPat'])->name('admin-new-pat');

Route::post('admin/new-emp', [AdminController::class, 'Admin_newEmp'])->name('admin-new-emp');

Route::post('admin/new-ther', [AdminController::class, 'Admin_newTher'])->name('admin-new-ther');

Route::post('admin/new-ch', [AdminController::class, 'Admin_newCh'])->name('admin-new-ch');

Route::post('admin/new-trau', [AdminController::class, 'Admin_newTrau'])->name('admin-new-trau');

//Routes Admin-Update
Route::post('admin/users-upd', [AdminController::class, 'Admin_updUsr'])->name('admin-upd-usr');

Route::post('admin/patients-upd', [AdminController::class, 'Admin_updPat'])->name('admin-upd-pat');

Route::post('admin/emp-upd', [AdminController::class, 'Admin_updEmp'])->name('admin-upd-emp');

Route::post(('admin/ther-upd'), [AdminController::class, 'Admin_updTher'])->name('admin-upd-ther');

Route::post(('admin/ch-upd'), [AdminController::class, 'Admin_updCh'])->name('admin-upd-ch');

Route::post(('admin/ch-upd'), [AdminController::class, 'Admin_updTrau'])->name('admin-upd-trau');

Route::post('admin/addr-upd',[AdminController::class, 'Admin_updAddr'])->name('admin-upd-addr');

//Routes Admin-Delete
Route::post('admin/users-del', [AdminController::class, 'Admin_delUsr'])->name('admin-del-usr');

Route::post('admin/patient-del', [AdminController::class, 'Admin_delPat'])->name('admin-del-pat');

Route::post(('admin/emp-del'), [AdminController::class, 'Admin_delEmp'])->name('admin-del-emp');

Route::post(('admin/ther-del'), [AdminController::class, 'Admin_delTher'])->name('admin-del-ther');

Route::post(('admin/ch-del'), [AdminController::class, 'Admin_delCh'])->name('admin-del-ch');

Route::post(('admin/trau-del'), [AdminController::class, 'Admin_delTrau'])->name('admin-del-trau');

Route::post('admin/addr-del',[AdminController::class, 'Admin_delAddr'])->name('admin-del-addr');

//Routes Profiles
Route::get('user/dashboard', [UserController::class, 'userDashboard'])->name('dashboard');

Route::get('user/profile', [UserController::class, 'userProfile'])->name('profile');

Route::get('user/therapy', [UserController::class, 'userCh'])->name('history');

//Route AJAX
Route::get('/check-dates', [AppointmentController::class, 'checkDates'])->name('check');

//Route Stripe
Route::get('/payment-form', [StripeController::class, 'stripe_view'])->name('payment');

Route::post('/checkout', [StripeController::class, 'checkout'])->name('checkout');

Route::get('/success', [StripeController::class, 'success'])->name('success');

//Route Maps
Route::get('/map', 'MapController@showMap')->name('map');

//Route User Actions
Route::post('user/appoint-canceled', [UserController::class, 'delAppo'])->name('del-appo');

Route::post('user/appoint-updated', [UserController::class, 'confAppo'])->name('conf-appo');

Route::post('user/modified', [UserController::class, 'modUser'])->name('upd-pat');

Route::post('user/img-updated', [UserController::class, 'uplImg'])->name('mod-img');

Route::post('user/new-address', [UserController::class, 'addAddr'])->name('add-addr');

Route::post('user/update-address', [UserController::class, 'updAddr'])->name('upd-addr');



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