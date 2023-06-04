<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Appointment
 * 
 * @property int $cod_appoint
 * @property Carbon|null $date_appoint
 * @property int $employee_cod_emp
 * @property int $patient_cod_patient
 * 
 * @property Employee $employee
 * @property Patient $patient
 *
 * @package App\Models
 */
class Appointment extends Model
{
	protected $table = 'appointment';
	public $timestamps = false;

	protected $casts = [
		'date_appoint' => 'datetime',
		'employee_cod_emp' => 'int',
		'patient_cod_patient' => 'int'
	];

	protected $fillable = [
		'date_appoint'
	];


	//CRUD Appointment

	/**
	 * function createAppoint()
	 * 
	 * @param $date_appoint Fecha cita
	 * @param $cod_employee Codigo empleado
	 * @param $cod_patient Codigo paciente
	 * 
	 * @return $result Devuelve un bool
	 */
	public function createAppoint($date_appoint,$confirmed, $cod_employee, $cod_patient){
		$result = DB::table('appointment')->insert(array('date_appoint'=> $date_appoint,'confirmed'=>$confirmed, 'employee_cod_emp'=>$cod_employee, 'patient_cod_patient'=>$cod_patient));
		return $result;
	}

	/**
	 * function getAppoints()
	 * 
	 * @return $return devuelve un array $appoints
	 */
	public function getAppoints(){
		$appoints = DB::table('appointment')->get();
		return $appoints;
	}

	public function getLastAppointPat($cod_patient){
		$appoints = DB::table('appointment')->where('patient_cod_patient', [$cod_patient])->first();
		return $appoints;
	}

	/**
	 * function getAppointsByPatient()
	 * 
	 * @param $cod_patient Codigo paciente
	 * 
	 * @return $return un array de $appoints
	 */
	public function getAppointsByPatient($cod_patient){
		$appoints = DB::table('appointment')->where('patient_cod_patient', [$cod_patient])->get();
		return $appoints;
	}

	/**
	 * function getAppointsByEmp()
	 * 
	 * @param $cod_employee Codigo empleado
	 * 
	 * @return $return un array de $appoints
	 */
	public function getAppointsByEmp($cod_employee){
		$appoints = DB::table('appointment')->where('employee_cod_emp', [$cod_employee])->get();
		return $appoints;
	}

		/**
	 * function getAppoint()
	 * 
	 * @param $cod_patient Codigo paciente
	 * @param $cod_employee Codigo empleado
	 * 
	 * @return $return un objeto query builder $appoint
	 */
	public function getAppoint($cod_employee, $cod_patient){
		$appoint = DB::table('appointment')->where('employee_cod_emp', [$cod_employee])->where('patient_cod_patient', [$cod_patient])->first();
		return $appoint;
	}

	public function getLastAppointEmp($cod_emp){
		$appoints = DB::table('appointment')->where('employee_cod_emp', [$cod_emp])->first();
		return $appoints;
	}
	/**
	 * function updateAppoint()
	 * 
	 * @param $cod_appoint Codigo cita
	 * @param $date_appoint Fecha cita
	 * 
	 * @return $return Devuelve un int
	 */
	public function updateAppoint($cod_appoint, $date_appoint){
		$result=DB::table('appointment')
            ->where('cod_appoint', $cod_appoint)
			->update(array('date_appoint' => $date_appoint));
			return $result;
	}


	/**
	 * function deleteAppoint()
	 * 
	 * @param $id_user Id de usuario
	 * 
	 * @return $return devuelve un int
	 */
	public function deleteAppoint($cod_appoint){
		$result=DB::table('appointment')->where('cod_appoint', $cod_appoint)->delete();

		return $result;
	}

	//public function employee()
	//{
		//return $this->belongsTo(Employee::class, 'employee_cod_emp');
	//}

	//public function patient()
	//{
		//return $this->belongsTo(Patient::class, 'patient_cod_patient');
	//}
}
