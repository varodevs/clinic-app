<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Role
 * 
 * @property int $cod_role
 * @property string $role
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'role';
	protected $primaryKey = 'cod_role';
	public $timestamps = false;

	protected $fillable = [
		'role'
	];

	/**
	 * function getRole()
	 * 
	 * @param $cod_role Codigo de rol
	 * 
	 * @return $return un objeto queryBuilder ($role)
	 */
	public function getRole($cod_role){
		$role = DB::table('role')->where('cod_role', [$cod_role])->first();
		return $role;
	}

	public function users()
	{
		return $this->hasMany(User::class, 'role_cod_role');
	}
}
