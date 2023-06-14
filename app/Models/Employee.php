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
 * Class Employee
 * 
 * @property int $cod_emp
 * @property string $name_emp
 * @property string $title
 * @property string $title_court
 * @property Carbon $date_birth
 * @property Carbon|null $date_hire
 * @property int $user_id_user
 * @property string $img_path
 * 
 * @property User $user
 * @property Collection|Appointment[] $appointments
 *
 * @package App\Models
 */
class Employee extends Model
{
	protected $table = 'employee';
	public $timestamps = false;

	protected $casts = [
		'date_birth' => 'datetime',
		'date_hire' => 'datetime',
		'user_id_user' => 'int'
	];

	protected $fillable = [
		'name_emp',
		'title',
		'title_court',
		'date_birth',
		'date_hire',
		'img_path'
	];

	//CRUD Employee

	/**
	 * function createEmployee()
	 * 
	 * @param $name_emp Nombre de empleado
	 * @param $title Titulo de empleado
	 * @param $title_court Titulo de cortesia
	 * @param $date_birth Fecha de nacimiento
	 * @param $date_hire Fecha de contrato
	 * 
	 * @return $result Devuelve un bool
	 */
	public function createEmployee($name_emp, $title, $title_court, $date_birth, $date_hire, $id_user){
		$result = DB::table('employee')->insert(array('name_emp'=> $name_emp, 'title'=>$title, 'title_court'=>$title_court, 'date_birth'=>$date_birth, 'date_hire'=>$date_hire, 'user_id_user'=>$id_user));
		return $result;
	}


	/**
	 * function getEmployees()
	 * 
	 * @return $return devuelve un array $employees
	 */
	public function getEmployees(){
		$employees = DB::table('employee')->get();
		return $employees;
	}


	/**
	 * function getEmployee()
	 * 
	 * @param $cod_emp Codigo de empleado
	 * 
	 * @return $return un objeto queryBuilder ($employee)
	 */
	public function getEmployee($cod_emp){
		$employee = DB::table('employee')->where('cod_emp', [$cod_emp])->first();
		return $employee;
	}


	/**
	 * function getEmployeeByUser()
	 * 
	 * @param $id_user id de usuario
	 * 
	 * @return $return un objeto queryBuilder ($employee)
	 */
	public function getEmployeeByUser($id_user){
		$employee = DB::table('employee')->where('user_id_user', [$id_user])->first();
		return $employee;
	}


	/**
	 * function updateEmployee()
	 * 
	 * @param $cod_emp Codigo de empleado
	 * @param $name_emp Nombre de empleado
	 * @param $title Titulo de empleado
	 * @param $title_court Titulo de cortesia
	 * @param $date_birth Fecha de nacimiento
	 * @param $date_hire Fecha de contrato
	 * @param $img_path Ruta imagen de perfil
	 * 
	 * @return $return Devuelve un int
	 */
	public function updateEmployee($cod_emp, $name_emp, $title, $title_court, $date_birth, $date_hire, $img_path){
		$result=DB::table('employee')
            ->where('cod_emp', $cod_emp)
			->update(array('name_emp' => $name_emp, 'title'=>$title, 'title_court'=>$title_court, 'date_birth'=>$date_birth, 'date_hire'=>$date_hire, 'img_path'=>$img_path));
			return $result;
	}


	/**
	 * function deleteEmployee()
	 * 
	 * @param $cod_emp Codigo de empleado
	 * 
	 * @return $return devuelve un int
	 */
	public function deleteEmployee($cod_emp){
		$result=DB::table('employee')->where('cod_emp', $cod_emp)->delete();

		return $result;
	}

	//public function user()
	//{
		//return $this->belongsTo(User::class, 'user_id_user');
	//}

	//public function appointments()
	//{
		//return $this->hasMany(Appointment::class, 'employee_cod_emp');
	//}
}
