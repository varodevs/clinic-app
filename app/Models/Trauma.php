<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Trauma
 * 
 * @property int $cod_trauma
 * @property string $name_doctor
 * 
 * @property Collection|Patient[] $patients
 *
 * @package App\Models
 */
class Trauma extends Model
{
	protected $table = 'trauma';
	protected $primaryKey = 'cod_trauma';
	public $timestamps = false;

	protected $fillable = [
		'name_doctor'
	];

	//CRUD Trauma

	/**
	 * function createTrauma()
	 * 
	 * @param $name_doctor Nombre doctor
	 * 
	 * @return $result Devuelve un bool
	 */
	public function createTrauma($name_doctor){
		$result = DB::table('trauma')->insert(array('name_doctor'=> $name_doctor));
		return $result;
	}


	/**
	 * function getTraumas()
	 * 
	 * @return $return devuelve un array $ch
	 */
	public function getTraumas(){
		$traumas = DB::table('trauma')->get();
		return $traumas;
	}


	/**
	 * function getTrauma()
	 * 
	 * @param $cod_trauma Codigo traumatologo
	 * 
	 * @return $return un objeto queryBuilder ($therapy)
	 */
	public function getTraumaById($cod_trauma){
		$trauma = DB::table('trauma')->where('cod_trauma', [$cod_trauma])->first();
		return $trauma;
	}


	/**
	 * function updateTrauma()
	 * 
	 * @param $cod_trauma Codigo traumatologo
	 * @param $name_doctor Nombre doctor
	 * 
	 * @return $return Devuelve un int
	 */
	public function updateTrauma($cod_trauma, $name_doctor){
		$result=DB::table('trauma')
            ->where('cod_trauma', $cod_trauma)
			->update(array('name_doctor' => $name_doctor));
			return $result;
	}


	/**
	 * function deleteTrauma()
	 * 
	 * @param $cod_trauma Codigo traumatologo
	 * 
	 * @return $return devuelve un int
	 */
	public function deleteTrauma($cod_trauma){
		$result=DB::table('trauma')->where('cod_trauma', $cod_trauma)->delete();

		return $result;
	}


	//public function patients()
	//{
		//return $this->hasMany(Patient::class, 'trauma_cod_trauma');
	//}
}
