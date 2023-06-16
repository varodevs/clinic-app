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
 * Class Ch
 * 
 * @property int $cod_ch
 * @property string|null $lesion
 * @property string|null $intervention
 * @property Carbon $reg_date
 * @property int $patient_cod_patient
 * 
 * @property Patient $patient
 * @property Collection|Therapy[] $therapies
 *
 * @package App\Models
 */
class Ch extends Model
{
	protected $table = 'ch';
	public $timestamps = false;

	protected $casts = [
		'reg_date' => 'datetime',
		'patient_cod_patient' => 'int'
	];

	protected $fillable = [
		'lesion',
		'intervention',
		'reg_date'
	];

	//CRUD Clinic History

	/**
	 * function createCh()
	 * 
	 * @param $lesion Lesion
	 * @param $intervention Intervencion/tratamiento
	 * @param $reg_date Fecha de registro clinico
	 * 
	 * @return $result Devuelve un bool
	 */
	public function createCh($lesion, $intervention, $reg_date, $cod_pat){
		$result = DB::table('ch')->insert(array('lesion'=> $lesion, 'intervention'=>$intervention, 'reg_date'=>$reg_date, 'patient_cod_patient'=>$cod_pat));
		return $result;
	}


	/**
	 * function getFullCh()
	 * 
	 * @return $return devuelve un array $ch
	 */
	public function getFullCh(){
		$fullCh = DB::table('ch')->get();
		return $fullCh;
	}


	/**
	 * function getChByPatient()
	 * 
	 * @param $cod_patient Codigo paciente
	 * 
	 * @return $return devuelve un array $ch
	 */
	public function getChByPatient($cod_patient){
		$ch = DB::table('ch')->where('patient_cod_patient', [$cod_patient])->get();
		return $ch;
	}

		/**
	 * function getChByPatientLast()
	 * 
	 * @param $cod_patient Codigo paciente
	 * 
	 * @return $return devuelve un array $ch
	 */
	public function getChByPatientLast($cod_patient){
		$ch = DB::table('ch')->where('patient_cod_patient', [$cod_patient])->latest()->first();
		return $ch;
	}


	/**
	 * function getCh()
	 * 
	 * @param $cod_ch Codigo ch
	 * 
	 * @return $return un objeto queryBuilder ($ch)
	 */
	public function getCh($cod_ch){
		$user = DB::table('ch')->where('cod_ch', [$cod_ch])->first();
		return $user;
	}


	/**
	 * function updateCh()
	 * 
	 * @param $cod_ch Codigo ch
	 * @param $lesion Lesion
	 * @param $intervention Intervencion/tratamiento
	 * @param $reg_date Fecha de registro clinico
	 * 
	 * @return $return Devuelve un int
	 */
	public function updateCh($cod_ch, $lesion, $intervention, $reg_date){
		$result=DB::table('ch')
            ->where('cod_ch', $cod_ch)
			->update(array('lesion' => $lesion, 'intervention'=>$intervention, 'reg_date'=>$reg_date));
			return $result;
	}


	/**
	 * function deleteCh()
	 * 
	 * @param $cod_ch Codigo ch
	 * 
	 * @return $return devuelve un int
	 */
	public function deleteCh($cod_ch){
		$result=DB::table('ch')->where('cod_ch', $cod_ch)->delete();

		return $result;
	}

	//public function patient()
	//{
		//return $this->belongsTo(Patient::class, 'patient_cod_patient');
	//}

	//public function therapies()
	//{
		//return $this->belongsToMany(Therapy::class, 'ch_therapy', 'ch_cod_ch', 'therapy_cod_therapy');
	//}
}
