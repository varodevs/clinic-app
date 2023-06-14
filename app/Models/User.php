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
 * Class User
 * 
 * @property int $id_user
 * @property string $username
 * @property string $email
 * @property string|null $password
 * @property string|null $cod_verify
 * @property int $active
 * @property Carbon|null $reg_date
 * @property int $role_cod_role
 * @property string $img_path
 * 
 * @property Role $role
 * @property Collection|Employee[] $employees
 * @property Collection|Message[] $messages
 * @property Collection|Patient[] $patients
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'user';
	public $timestamps = false;

	protected $casts = [
		'active' => 'int',
		'reg_date' => 'datetime',
		'role_cod_role' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'email',
		'password',
		'cod_verify',
		'active',
		'reg_date',
		'role_cod_role',
		'img_path'
	];

//CRUD User

	/**
	 * function createUser()
	 * 
	 * @param $username Nombre de usuario
	 * @param $email Email de usuario
	 * @param $password Password de usuario
	 * @param $cod_verify Codigo de verificacion
	 * @param $reg_date Fecha de registro
	 * 
	 * @return $result Devuelve un bool
	 */
	public function createUser($username, $email, $password, $cod_verify, $role, $reg_date){
		$result = DB::table('user')->insert(array('username'=> $username, 'email'=>$email, 'password'=>$password, 'cod_verify'=>$cod_verify, 'active'=>1, 'reg_date'=>$reg_date, 'role_cod_role'=>$role));
		return $result;
	}


	/**
	 * function getUsers()
	 * 
	 * @return $return devuelve un array $users
	 */
	public function getUsers(){
		$users = DB::table('user')->get();
		return $users;
	}

	
	/**
	 * function getUserIdByEmail()
	 * 
	 * @param $email email de usuario
	 * 
	 * @return $return devuelve un mediumint (id_user)
	 */
	public function getUserIdByEmail($email){
		$id_user = DB::table('user')->where('email', [$email])->value('id_user');
		return $id_user;
	}


	/**
	 * function getUserdById()
	 * 
	 * @param $id_user id de usuario
	 * 
	 * @return $return un objeto queryBuilder ($user)
	 */
	public function getUserdById($id_user){
		$user = DB::table('user')->where('id_user', [$id_user])->first();
		return $user;
	}


	/**
	 * function updateUser()
	 * 
	 * @param $id_user Id de usuario
	 * @param $username Nombre de usuario
	 * @param $email Email de usuario
	 * @param $password Password de usuario
	 * @param $cod_verify Codigo de verificacion
	 * @param $img_path Ruta a imagen de perfil
	 * 
	 * @return $return Devuelve un int
	 */
	public function updateUser($id_user, $username, $email, $password, $cod_verify, $active){
		$result=DB::table('user')
            ->where('id_user', $id_user)
			->update(array('username' => $username, 'email'=>$email, 'password'=>$password, 'cod_verify'=>$cod_verify, 'active'=>$active));
			return $result;
	}


	/**
	 * function deleteUser()
	 * 
	 * @param $id_user Id de usuario
	 * 
	 * @return $return devuelve un int
	 */
	public function deleteUser($id_user){
		$result=DB::table('user')->where('id_user', $id_user)->delete();

		return $result;
	}

	//public function role()
	//{
		//return $this->belongsTo(Role::class, 'role_cod_role');
	//}

	//public function employees()
	//{
		//return $this->hasMany(Employee::class, 'user_id_user');
	//}

	//public function messages()
	//{
		//return $this->hasMany(Message::class, 'user_id_user');
	//}

	//public function patients()
	//{
		//return $this->hasMany(Patient::class, 'user_id_user');
	//}
}
