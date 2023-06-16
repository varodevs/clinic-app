<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class ChTherapy
 * 
 * @property int $ch_cod_ch
 * @property int $therapy_cod_therapy
 * 
 * @property Ch $ch
 * @property Therapy $therapy
 *
 * @package App\Models
 */
class ChTherapy extends Model
{
	protected $table = 'ch_therapy';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ch_cod_ch' => 'int',
		'therapy_cod_therapy' => 'int'
	];

	/**
	 * function createChTher()
	 * 
	 * @param $cod_ch Codigo historial
	 */	
	public function createChTher($cod_ch,$cod_ther){
		$result = DB::table('ch_therapy')->insert(array('ch_cod_ch' => $cod_ch, 'therapy_cod_therapy' => $cod_ther));
		return $result;
	}

	/**
	 * function getChTherapies()
	 * 
	 * @param $cod_ch Codigo historial
	 */	

	public function getChTherapies($cod_c){
		$ChTherapies = DB::table('ch_therapy')->where('cod_c', [$cod_c])->get();
		return $ChTherapies;
	}

	public function ch()
	{
		return $this->belongsTo(Ch::class, 'ch_cod_ch');
	}

	public function therapy()
	{
		return $this->belongsTo(Therapy::class, 'therapy_cod_therapy');
	}
}
