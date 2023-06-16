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
use App\Models\Address;
use App\Mail\Email;
use App\Mail\EmailPassw;
use App\Models\ChTherapy;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Returns to Treatments page.
     */
    public function Admin_view()
    {
        $appointment = new Appointment();
        $emp = new Employee();
        $employee = $emp->getEmployeeByUser(session('id_user'));
        $img_path = $employee->img_path;
        $sel=1;
        $array = $appointment->getAppoints();
        return view('admin', compact('array', 'sel','img_path'))->with('scrollToSection', 'section');
    }

    public function Admin_appo()
    {
        $appointment = new Appointment();
        $emp = new Employee();
        $employee = $emp->getEmployeeByUser(session('id_user'));
        $img_path = $employee->img_path;
        $sel=1;

        $array = $appointment->getAppoints();
        return view('admin', compact('array', 'sel','img_path'))->with('scrollToSection', 'section');
    }

    public function Admin_pat()
    {
        $patient = new Patient();
        $emp = new Employee();
        $employee = $emp->getEmployeeByUser(session('id_user'));
        $img_path = $employee->img_path;
        $sel=2;

        $array = $patient->getPatients();
        return view('admin', compact('array', 'sel','img_path'))->with('scrollToSection', 'section');
    }

    public function Admin_emp()
    {
        $emp = new Employee();
        $employee = $emp->getEmployeeByUser(session('id_user'));
        $img_path = $employee->img_path;
        $sel=3;

        $array = $emp->getEmployees();
        return view('admin', compact('array', 'sel','img_path'))->with('scrollToSection', 'section');
    }

    public function Admin_usr()
    {
        $user = new User();
        $emp = new Employee();
        $employee = $emp->getEmployeeByUser(session('id_user'));
        $img_path = $employee->img_path;
        $sel=4;

        $array = $user->getUsers();
        return view('admin', compact('array', 'sel','img_path'))->with('scrollToSection', 'section');
    }

    public function Admin_ther()
    {
        $ther = new Therapy();
        $emp = new Employee();
        $employee = $emp->getEmployeeByUser(session('id_user'));
        $img_path = $employee->img_path;
        $sel=5;

        $array = $ther->getTherapies();
        return view('admin', compact('array', 'sel','img_path'))->with('scrollToSection', 'section');
    }

    public function Admin_ch()
    {
        $ch = new Ch();
        $emp = new Employee();
        $employee = $emp->getEmployeeByUser(session('id_user'));
        $img_path = $employee->img_path;
        $sel=6;

        $array = $ch->getFullCh();
        return view('admin', compact('array', 'sel','img_path'))->with('scrollToSection', 'section');
    }

    public function Admin_trau()
    {
        $trau = new Trauma();
        $emp = new Employee();
        $employee = $emp->getEmployeeByUser(session('id_user'));
        $img_path = $employee->img_path;
        $sel=7;

        $array = $trau->getTraumas();
        return view('admin', compact('array', 'sel','img_path'))->with('scrollToSection', 'section');
    }

    public function Admin_addr()
    {
        $addr = new Address();
        $sel=7;

        $array = $addr->getAddresses();
        return view('admin', compact('array', 'sel','img_path'))->with('scrollToSection', 'section');
    }

    //New User Form and Submit

    public function Admin_NewUsrView(){
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
        $password = Str::upper(Str::random(8));
        $hash_pssw = Hash::make($password);
        $user = new User();

        $response = Mail::to($request->email)->send(new EmailPassw($request->uname,$cod_verify, $password));
        $result = $user->createUser($request->uname, $request->email, $hash_pssw, $hash_cod_verify, intval($request->role), now());

        return redirect()->route('admin-usr');
    }

    //New Appointment Form and Submit

    public function Admin_NewAppoView(){
        return view('newAppo')->with('scrollToSelection', 'section');
    }

    public function Admin_newAppo(Request $request){

        $request->validate([
            'date' => 'required',
            'cod_emp' => 'required',
            'cod_pat' => 'required',
            ]);
        
        $appoint = new Appointment();

        $result = $appoint->createAppoint($request->date,0, $request->cod_emp, $request->cod_pat);

        return redirect()->route('admin-appo');
    }

    //New Patient Form and Submit

    public function Admin_newPatView(){
        return view('newPat')->with('scrollToSection', 'section');
    }

    public function Admin_newPat(Request $request){

        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'bdate' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'cod_doc' => 'required',
            ]);
        
        $patient = new Patient();

        $user = new User();

        $result = $user->createUser('username', $request->email, 'ABCD', 'ABCD', 6, now());

        $id_user = $user->getUserIdByEmail($request->email);

        $last_patient = $patient->getPatientLast();

        $last_id= $last_patient->cod_patient;

        $last_id++;

        $img_path = 'img/userimg/default.png';

        $sel=2;

        $result = $patient->createPatient($last_id,$request->fname,$request->lname,$request->phone,$request->bdate,$request->age,$request->sex, $id_user, $request->cod_doc, $img_path);

        return redirect()->route('admin-pat', ['sel' => $sel]);
    }

    //New Employee Form and Submit

    public function Admin_newEmpView(){
        return view('newEmp')->with('scrollToSection', 'section');
    }

    public function Admin_newEmp(Request $request){

        $request->validate([
            'fname' => 'required',
            'email' => 'required|email',
            'title' => 'required',
            'tcourt' => 'required',
            'bdate' => 'required',
            'hdate' => 'required',
            ]);
        
        $employee = new Employee();        

        $user = new User();

        $result = $user->createUser('username', $request->email, 'ABCD', 'ABCD', 5, now());

        $id_user = $user->getUserIdByEmail($request->email);
        $img_path = 'img/userimg/default.png';

        $result = $employee->createEmployee($request->fname,$request->title,$request->tcourt,$request->bdate,$request->hdate, $id_user,$img_path);

        return redirect()->route('admin-emp');
    }

    //New Therapy Form and Submit

    public function Admin_newTherView(){
        return view('newTher')->with('scrollToSection', 'section');
    }

    public function Admin_newTher(Request $request){

        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'mats' => 'required',                        
            ]);
        
        $therapy = new Therapy();        

        $result = $therapy->createTherapy($request->name,$request->desc,$request->mats);

        return redirect()->route('admin-ther');
    }

    //New CH Form and Submit

    public function Admin_newChView(){
        $ther = new Therapy();
        $pat = new Patient();
        $therapies = $ther->getTherapies();
        $patients = $pat->getPatients();
        return view('newCh')->with(['scrollToSection' => 'section','therapies' => $therapies,'patients' => $patients]);
    }

    public function Admin_newCh(Request $request){

        $request->validate([
            'lesion' => 'required',
            'cod_ther' => 'required',
            'cod_pat' => 'required',            
            ]);
        $pat = new Patient();
        $ch = new Ch();
        $ther = new Therapy();
        $cT = new ChTherapy();

        $therapy = $ther->getTherapy(intval($request->cod_ther));       
        $patient = $pat->getPatient(intval($request->cod_pat));
        $result = $ch->createCh($request->lesion,$therapy->name_ther,now(),intval($request->cod_pat));

        $ch = $ch->getChByPatientLast(intval($request->cod_pat));

        $chTher=$cT->createChTher(intval($ch->cod_ch),intval($request->cod_ther));
        return redirect()->route('admin-ch');
    }

    //New Trauma Form and Submit

    public function Admin_newTrauView(){
        return view('newTrau')->with('scrollToSection', 'section');
    }

    public function Admin_newTrau(Request $request){

        $request->validate([
            'name' => 'required',
            ]);
        
        $trau = new Trauma();

        $sel=6;

        $result = $trau->createTrauma($request->name);

        return redirect()->route('admin-trau', ['sel' => $sel]);
    }

    //New Address Form and Submit

    public function Admin_newAddrView(){
        return view('newTrau')->with('scrollToSection', 'section');
    }

    public function Admin_newAddr(Request $request){

        $request->validate([
            'street' => 'required',
            'pc' => 'required',
            'city' => 'required',
            'country' => 'required',
            'num' => 'required',
            'flat' => 'required',
            'cod_pat' => 'required',
            ]);
        
        $addr = new Address();

        $sel=6;

        $result = $addr->createAddress($request->street,$request->pc,$request->city,$request->country,$request->num,$request->flat,$request->cod_pat);

        return redirect()->route('admin-addr', ['sel' => $sel]);
    }

    //Delete User

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
        $employee = new Employee();
        $carbonDate = \Carbon\Carbon::parse($request->date4)->format('Y-m-d');
        $carbonDate2 = \Carbon\Carbon::parse($request->date5)->format('Y-m-d H:i:s');
        $sel=3;
        $result = $employee->updateEmployee(intval($request->input0),$request->input1,$request->input2,$request->input3,$carbonDate,$carbonDate2,intval($request->input6),intval($request->input7));
        return redirect()->route('admin-emp', ['sel' => $sel]);
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
        // $request->validate([
        //     'input1' => 'required',
        //     'input2' => 'required',
        //     ]);
        $conf = 0;
        if($request->input2 == "Si"){
            $conf = 1;
        }
        $id_appo = $request->input('id_appo');
        $carbonDate = Carbon::createFromFormat('d/m/Y H:i', $request->date_ap);
        $date = $carbonDate->format('Y-m-d H:i:s', $carbonDate);

        $appoint = new Appointment();        

        $sel = 1;
        $result = $appoint->updateAppoint(intVal($id_appo),$date,$conf);

        return redirect()->route('admin-appo', ['sel' => $sel, 'date' => $date]);
    }

    public function Admin_delTher(Request $request){
        $id_ther = $request->input('id_ther');

        $ther = new Therapy();
        $sel = 5;
        $result = $ther->deleteTherapy($id_ther);

        return redirect()->route('admin-ther', ['sel' => $sel]);
    }

    public function Admin_updTher(Request $request){

        $ther = new Therapy();
        $sel = 5;

        $result = $ther->updateTherapy(intval($request->id_ther),$request->input1,$request->input2,$request->input3);

        return redirect()->route('admin-ther', ['sel' => $sel]);

    }

    public function Admin_delCh(Request $request){

        $id_ch = $request->input('id_ch');

        $ch = new Ch();
        $sel = 6;
        $result = $ch->deleteTherapy($id_ch);

        return redirect()->route('admin-ch', ['sel' => $sel]);

    }

    public function Admin_updCh(Request $request){

        $request->validate([
            'lesion' => 'required',
            'input1' => 'required',
            'input2' => 'required',
            'input3' => 'required',            
            ]);
        $pat = new Patient();
        $ch = new Ch();
        $ther = new Therapy();
        $cT = new ChTherapy();

        $therapy = $ther->getTherapy(intval($request->input2));

        $result = $ch->updateCh(intval($request->id_ch),$request->input1,$request->input2,now(),intval($request->input4));

        return redirect()->route('admin-ther');

    }

    public function Admin_delTrau(Request $request){

        $id_trau = $request->input('id_trau');

        $trau = new Trauma();
        $sel = 7;
        $result = $trau->deleteTherapy($id_trau);

        return redirect()->route('admin-trau', ['sel' => $sel]);

    }

    public function Admin_updTrau(Request $request){

        $ther = new Therapy();
        $sel = 7;

        $result = $ther->updateTherapy(intval($request->id_ther),$request->input1,$request->input2,$request->input3);

        return redirect()->route('admin-ther', ['sel' => $sel]);
    }
}