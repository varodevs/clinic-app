<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Address
 * 
 * @property int $cod_address
 * @property string|null $street
 * @property string|null $pc
 * @property string|null $city
 * @property string|null $country
 * @property string|null $number
 * @property string|null $flat
 * @property int $patient_cod_patient
 * 
 * @property Patient $patient
 *
 * @package App\Models
 */
class Address extends Model
{
	protected $table = 'address';
	protected $primaryKey = 'cod_address';
	public $timestamps = false;

	protected $casts = [
		'patient_cod_patient' => 'int'
	];

	protected $fillable = [
		'street',
		'pc',
		'city',
		'country',
		'number',
		'flat',
		'patient_cod_patient'
	];

//CRUD Address

	/**
	 * function createAddress()
	 * 
	 * @param $street Nombre de calle
	 * @param $pc Codigo postal
	 * @param $city Ciudad
	 * @param $country Pais
	 * @param $number Num portal/casa
	 * @param $flat Num piso
	 * 
	 * @return $result Devuelve un bool
	 */
	public function createAddress($street, $pc, $city, $country, $number, $flat, $cod_patient){
		$result = DB::table('address')->insert(array('street'=> $street, 'pc'=>$pc, 'city'=>$city, 'country'=>$country, 'number'=>$number, 'flat'=>$flat, 'patient_cod_patient'=>$cod_patient));
		return $result;
	}


		/**
	 * function getAddresses()
	 * 
	 * @return $return devuelve un array $addresses
	 */
	public function getAddresses(){
		$addresses = DB::table('address')->get();
		return $addresses;
	}


	/**
	 * function getAddressByCod()
	 * 
	 * @param $cod_address id de usuario
	 * 
	 * @return $return un objeto queryBuilder ($user)
	 */
	public function getAddressByCod($cod_address){
		$address = DB::table('address')->where('cod_address', [$cod_address])->first();
		return $address;
	}
	/**
	 * function getAddressByCodPat()
	 * 
	 * @param $patient_cod_patient id de usuario
	 * 
	 * @return $return un objeto queryBuilder ($user)
	 */
	public function getAddressByCodPat($cod_pat){
		$address = DB::table('address')->where('patient_cod_patient', [$cod_pat])->first();
		return $address;
	}


	/**
	 * function updateAddress()
	 * 
	 * @param $cod_address Codigo de direccion
	 * @param $street Nombre de calle
	 * @param $pc Codigo postal
	 * @param $city Ciudad
	 * @param $country Pais
	 * @param $number Num portal/casa
	 * @param $flat Num piso
	 * 
	 * @return $return Devuelve un int
	 */
	public function updateAddress($cod_address, $street, $pc, $city, $country, $number, $flat){
		$result=DB::table('address')
            ->where('cod_address', $cod_address)
			->update(array('street' => $street, 'pc'=>$pc, 'city'=>$city, 'country'=>$country, 'number'=>$number, 'flat'=>$flat));
			return $result;
	}


	/**
	 * function deleteAddress()
	 * 
	 * @param $cod_address Codigo de direccion
	 * 
	 * @return $return devuelve un int
	 */
	public function deleteAddress($cod_address){
		$result=DB::table('address')->where('cod_address', $cod_address)->delete();

		return $result;
	}

	
	/**
	 * function deleteAddressByPatient()
	 * 
	 * @param $cod_address Codigo de direccion
	 * 
	 * @return $return devuelve un int
	 */
	public function deleteAddressByPatient($cod_patient){
		$result=DB::table('address')->where('patient_cod_patient', $cod_patient)->delete();

		return $result;
	}



	//public function patient()
	//{
		//return $this->belongsTo(Patient::class, 'patient_cod_patient');
	//}
}
