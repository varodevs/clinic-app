<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Therapy
 * 
 * @property int $cod_therapy
 * @property string $name_ther
 * @property string|null $description
 * @property string|null $material
 * 
 * @property Collection|Ch[] $ches
 *
 * @package App\Models
 */
class Therapy extends Model
{
	protected $table = 'therapy';
	protected $primaryKey = 'cod_therapy';
	public $timestamps = false;

	protected $fillable = [
		'name_ther',
		'description',
		'material'
	];

	//CRUD Therapy

	/**
	 * function createTherapy()
	 * 
	 * @param $name_ther Nombre terapia
	 * @param $description Descripcion terapia
	 * @param $material Material usado
	 * 
	 * @return $result Devuelve un bool
	 */
	public function createTherapy($name_ther, $description, $material){
		$result = DB::table('therapy')->insert(array('name_ther'=> $name_ther, 'description'=>$description, 'material'=>$material));
		return $result;
	}


	/**
	 * function getTherapies()
	 * 
	 * @return $return devuelve un array $ch
	 */
	public function getTherapies(){
		$therapies = DB::table('therapy')->get();
		return $therapies;
	}


	/**
	 * function getTherapy()
	 * 
	 * @param $cod_therapy Codigo terapia
	 * 
	 * @return $return un objeto queryBuilder ($therapy)
	 */
	public function getTherapy($cod_therapy){
		$therapy = DB::table('therapy')->where('cod_therapy', [$cod_therapy])->first();
		return $therapy;
	}


	/**
	 * function updateTherapy()
	 * 
	 * @param $cod_therapy Codigo terapia
	 * @param $name_ther Nombre terapia
	 * @param $description Descripcion terapia
	 * @param $material Material usado
	 * 
	 * @return $return Devuelve un int
	 */
	public function updateTherapy($cod_therapy, $name_ther, $description, $material){
		$result=DB::table('therapy')
            ->where('cod_therapy', $cod_therapy)
			->update(array('name_ther' => $name_ther, 'description'=>$description, 'material'=>$material));
			return $result;
	}


	/**
	 * function deleteTherapy()
	 * 
	 * @param $cod_therapy Codigo terapia
	 * 
	 * @return $return devuelve un int
	 */
	public function deleteTherapy($cod_therapy){
		$result=DB::table('therapy')->where('cod_therapy', $cod_therapy)->delete();

		return $result;
	}

	//public function ches()
	//{
		//return $this->belongsToMany(Ch::class, 'ch_therapy', 'therapy_cod_therapy', 'ch_cod_ch');
	//}
}
