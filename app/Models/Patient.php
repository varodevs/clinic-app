<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Patient
 * 
 * @property int $cod_patient
 * @property string $first_name
 * @property string $last_name
 * @property Carbon $date_birth
 * @property int|null $age
 * @property string|null $sex
 * @property int $user_id_user
 * @property int $trauma_cod_trauma
 * 
 * @property Trauma $trauma
 * @property User $user
 * @property Collection|Address[] $addresses
 * @property Collection|Appointment[] $appointments
 * @property Collection|Ch[] $ches
 *
 * @package App\Models
 */
class Patient extends Model
{
	protected $table = 'patient';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cod_patient' => 'int',
		'date_birth' => 'datetime',
		'age' => 'int',
		'user_id_user' => 'int',
		'trauma_cod_trauma' => 'int'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'date_birth',
		'age',
		'sex'
	];

	//CRUD Patient

	/**
	 * function createPatient()
	 * 
	 * @param $first_name Nombre de empleado
	 * @param $last_name Titulo de empleado
	 * @param $date_birth Fecha de nacimiento
	 * @param $age Fecha de contrato
	 * @param $sex Fecha de contrato
	 * @param $id_user Fecha de contrato
	 * @param $cod_trauma Fecha de contrato
	 * 
	 * @return $result Devuelve un bool
	 */
	public function createPatient($first_name, $last_name, $date_birth, $age, $sex, $id_user, $cod_trauma){
		$result = DB::table('patient')->insert(array('first_name'=> $first_name, 'last_name'=>$last_name, 'date_birth'=>$date_birth, 'age'=>$age, '$sex'=>$sex, '$id_user'=>$id_user, '$cod_trauma'=>$cod_trauma));
		return $result;
	}


	/**
	 * function getPatients()
	 * 
	 * @return $return devuelve un array $employees
	 */
	public function getPatients(){
		$patients = DB::table('patient')->get();
		return $patients;
	}


	/**
	 * function getPatient()
	 * 
	 * @param $cod_patient Codigo de paciente
	 * 
	 * @return $return un objeto queryBuilder ($patient)
	 */
	public function getPatient($cod_patient){
		$patient = DB::table('patient')->where('cod_patient', [$cod_patient])->first();
		return $patient;
	}


	/**
	 * function getPatientByUser()
	 * 
	 * @param $id_user id de usuario
	 * 
	 * @return $return un objeto queryBuilder ($employee)
	 */
	public function getPatientByUser($id_user){
		$patient = DB::table('patient')->where('user_id_user', [$id_user])->first();
		return $patient;
	}


	/**
	 * function updatePatient()
	 * 
	 * @param $cod_patient Codigo de paciente
	 * @param $first_name Nombre de empleado
	 * @param $last_name Titulo de empleado
	 * @param $date_birth Fecha de nacimiento
	 * @param $age Fecha de contrato
	 * @param $sex Fecha de contrato
	 * @param $id_user Fecha de contrato
	 * @param $cod_trauma Fecha de contrato
	 * @param $img_path Ruta imagen de perfil
	 * 
	 * @return $return Devuelve un int
	 */
	public function updatePatient($cod_patient, $first_name, $last_name, $date_birth, $age, $sex, $img_path){
		$result=DB::table('patient')
            ->where('cod_patient', $cod_patient)
			->update(array('first_name' => $first_name, 'last_name'=>$last_name, 'date_birth'=>$date_birth, 'age'=>$age, 'sex'=>$sex, 'img_path'=>$img_path));
			return $result;
	}


	/**
	 * function deletePatient()
	 * 
	 * @param $cod_patient Codigo de paciente
	 * 
	 * @return $return devuelve un int
	 */
	public function deletePatient($cod_patient){
		$result=DB::table('patient')->where('cod_patient', $cod_patient)->delete();

		return $result;
	}

	//public function trauma()
	//{
		//return $this->belongsTo(Trauma::class, 'trauma_cod_trauma');
	//}

	//public function user()
	//{
		//return $this->belongsTo(User::class, 'user_id_user');
	//}

	//public function addresses()
	//{
		//return $this->hasMany(Address::class, 'patient_cod_patient');
	//}

	//public function appointments()
	//{
		//return $this->hasMany(Appointment::class, 'patient_cod_patient');
	//}

	//public function ches()
	//{
		//return $this->hasMany(Ch::class, 'patient_cod_patient');
	//}
}
