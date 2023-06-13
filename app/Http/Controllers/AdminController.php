<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Therapy;
use App\Models\Employee;
use App\Models\User;
use App\Models\Ch;
use App\Models\Trauma;
use App\Mail\Email;
use App\Mail\EmailPassw;

class AdminController extends Controller
{
    /**
     * Returns to Treatments page.
     */
    public function Admin_view()
    {
        $appointment = new Appointment();
        $sel=1;
        $array = $appointment->getAppoints();
        return view('admin', compact('array', 'sel'))->with('scrollToSection', 'section');
    }

    public function Admin_appo()
    {
        $appointment = new Appointment();
        $sel=1;

        $array = $appointment->getAppoints();
        return view('admin', compact('array', 'sel'))->with('scrollToSection', 'section');
    }

    public function Admin_pat()
    {
        $patient = new Patient();
        $sel=2;

        $array = $patient->getPatients();
        return view('admin', compact('array', 'sel'))->with('scrollToSection', 'section');
    }

    public function Admin_emp()
    {
        $employee = new Employee();
        $sel=3;

        $array = $employee->getEmployees();
        return view('admin', compact('array', 'sel'))->with('scrollToSection', 'section');
    }

    public function Admin_usr()
    {
        $user = new User();
        $sel=4;

        $array = $user->getUsers();
        return view('admin', compact('array', 'sel'))->with('scrollToSection', 'section');
    }

    public function Admin_ther()
    {
        $ther = new Therapy();
        $sel=5;

        $array = $ther->getTherapies();
        return view('admin', compact('array', 'sel'))->with('scrollToSection', 'section');
    }

    public function Admin_ch()
    {
        $ch = new Ch();
        $sel=6;

        $array = $ch->getFullCh();
        return view('admin', compact('array', 'sel'))->with('scrollToSection', 'section');
    }

    public function Admin_trau()
    {
        $trau = new Trauma();
        $sel=7;

        $array = $trau->getTraumas();
        return view('admin', compact('array', 'sel'))->with('scrollToSection', 'section');
    }

    public function Admin_newUsrView(){
        return view('newUser')->with('scrollToSection', 'section');
    }

    public function Admin_newUsr(Request $request){

        $request->validate([
            'uname' => 'required|string|min:2|max:10',
            'email' => 'required|email|min:8|max:35',
            'role' => 'required',
            ]);
        $cod_verify = Str::upper(Str::random(4));
        $hash_cod_verify = Hash::make($cod_verify);
        $password = Str::upper(Str::random(5));
        $hash_pssw = Hash::make($password);
        $user = new User();

        $sel=4;
        $response = Mail::to($request->email)->send(new EmailPassw($request->uname,$cod_verify, $password));
        $result = $user->createUser($request->uname, $request->email, $hash_pssw, $hash_cod_verify, intval($request->role), now());

        return redirect()->route('admin-usr#section', ['sel' => $sel]);
    }

    public function Admin_newAppoView(){
        return view('newAppo')->with('scrollToSection', 'section');
    }

    public function Admin_newAppo(Request $request){

        $request->validate([
            'date' => 'required',
            'cod_emp' => 'required',
            'cod_pat' => 'required',
            ]);
        
        $appoint = new Appointment();

        $sel=1;

        $result = $appoint->createAppoint($request->date,0, $request->cod_employee, $request->cod_patient);

        return redirect()->route('admin-appo', ['sel' => $sel]);
    }

    public function Admin_newPatView(){
        return view('newPat')->with('scrollToSection', 'section');
    }

    public function Admin_newPat(Request $request){

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'bdate' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'id_user' => 'required',
            'cod_doc' => 'required',
            ]);
        
        $patient = new Patient();

        $last_patient = $patient->getPatientLast();

        $last_id= $last_patient->cod_patient;

        $last_id++;

        $sel=2;

        $result = $patient->createPatient($last_id,$request->fname,$request->lname,$request->phone,$request->bdate,$request->age,$request->sex, $request->id_user, $request->cod_doc);

        return redirect()->route('admin-pat#section', ['sel' => $sel]);
    }

    public function Admin_newEmpView(){
        return view('newAppo')->with('scrollToSection', 'section');
    }

    public function Admin_newEmp(Request $request){

        $request->validate([
            'fname' => 'required',
            'title' => 'required',
            'tcourt' => 'required',
            'bdate' => 'required',
            'hdate' => 'required',
            ]);
        
        $employee = new Employee();

        $sel=3;

        $result = $employee->createAppoint($request->fname,$request->title,$request->tcourt,$request->bdate,$request->hdate);

        return redirect()->route('admin-emp#section', ['sel' => $sel]);
    }

    public function Admin_newTherView(){
        return view('newTher')->with('scrollToSection', 'section');
    }

    public function Admin_newTher(Request $request){

        $request->validate([
            'fname' => 'required',
            'title' => 'required',
            'tcourt' => 'required',
            'bdate' => 'required',
            'hdate' => 'required',
            ]);
        
        $therapy = new Therapy();

        $sel=5;

        $result = $therapy->createTherapy($request->fname,$request->title,$request->tcourt,$request->bdate,$request->hdate);

        return redirect()->route('admin-ther#section', ['sel' => $sel]);
    }

    public function Admin_newChView(){
        return view('newCh')->with('scrollToSection', 'section');
    }

    public function Admin_newCh(Request $request){

        $request->validate([
            'lesion' => 'required',
            'interv' => 'required',
            'rdate' => 'required',
            ]);
        
        $ch = new Ch();

        $sel=6;

        $result = $ch->createCh($request->lesion,$request->interv,$request->rdate);

        return redirect()->route('admin-ch#section', ['sel' => $sel]);
    }

    public function Admin_newTrauView(){
        return view('newCh')->with('scrollToSection', 'section');
    }

    public function Admin_newTrau(Request $request){

        $request->validate([
            'name' => 'required',
            ]);
        
        $ch = new Ch();

        $sel=6;

        $result = $ch->createTrauma($request->name);

        return redirect()->route('admin-trau#section', ['sel' => $sel]);
    }

    public function Admin_delUsr(Request $request)
    {
        $id_user = $request->input('id_user');
        $user = new User();
        $sel=4;

        $result = $user->deleteUser($id_user);
        return redirect()->route('admin-usr', ['sel' => $sel]);
    }

    public function Admin_updUsr(Request $request)
    {
        $user = new User();

        $sel=4;

        $result = $user->updateUser($request->id_user,$request->username,$request->email,$request->password,$request->cod_verify,$request->active,$request->img_path);

        return redirect()->route('admin-usr', ['sel' => $sel]);
    }

    public function Admin_updPat(Request $request){
        $patient = new Patient();
        $sel=2;
        $result = $patient->updatePatient($request->input0,$request->input1,$request->input2,$request->input3,$request->date_birth,$request->input5,$request->input6,$request->input7);
        return redirect()->route('admin-pat', ['sel' => $sel]);
    }

    public function Admin_delPat(Request $request){
        $cod_patient = $request->input('cod_patient');
        $patient = new Patient();
        $sel=2;
        $result = $patient->deletePatient($cod_patient);
        return redirect()->route('admin-pat', ['sel' => $sel]);
    }

    public function Admin_updEmp(Request $request){
        $employee = new Patient();
        $sel=3;
        $result = $employee->updateEmployee($request->input0,$request->input1,$request->input2,$request->input3,$request->date4,$request->date5,$request->input6,$request->input7);
        return redirect()->route('admin-pat', ['sel' => $sel]);
    }

    public function Admin_delEmp(Request $request){
        $cod_emp = $request->input('cod_emp');
        $employee = new Patient();
        $sel=3;
        $result = $employee->deleteEmployee($cod_emp);
        return redirect()->route('admin-emp', ['sel' => $sel]);
    }

    public function delAppoAdm(Request $request){
        $id_appo = $request->input('id_appo');

        $appoint = new Appointment();
        $sel = 1;
        $result = $appoint->deleteAppoint($id_appo);

        return redirect()->route('admin-appo', ['sel' => $sel]);
    }

    public function updAppoAdm(Request $request){
        $id_appo = $request->input('id_appo');

        $appoint = new Appointment();
        $sel = 1;
        $result = $appoint->updateAppoint(intVal($id_appo),$request->input1,intVal($request->input2));

        return redirect()->route('admin-appo', ['sel' => $sel]);
    }

    public function Admin_updAddr(Request $request){

    }

    public function Admin_delAddr(Request $request){

    }

    public function Admin_delTher(Request $request){

    }

    public function Admin_updTher(Request $request){

    }

    public function Admin_delCh(Request $request){

    }

    public function Admin_updCh(Request $request){

    }

    public function Admin_delTrau(Request $request){

    }

    public function Admin_updTrau(Request $request){

    }
}