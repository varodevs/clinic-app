<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Message
 * 
 * @property int $cod_msg
 * @property int $cod_receiver
 * @property string|null $subject
 * @property string $message
 * @property Carbon $date_Sent
 * @property bool $seen
 * @property int $user_id_user
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Message extends Model
{
	protected $table = 'message';
	public $timestamps = false;

	protected $casts = [
		'cod_receiver' => 'int',
		'date_Sent' => 'datetime',
		'seen' => 'bool',
		'user_id_user' => 'int'
	];

	protected $fillable = [
		'cod_receiver',
		'subject',
		'message',
		'date_Sent',
		'seen'
	];

	//CRUD Message

	/**
	 * function createMsg()
	 * 
	 * @param $cod_receiver Codigo recibe
	 * @param $subject Asunto
	 * @param $message Mensaje
	 * @param $date_Sent Fecha de envio
	 * @param $seen Visto
	 * @param $user_id_user id de usuario envia
	 * 
	 * @return $result Devuelve un bool
	 */
	public function createMsg($cod_receiver, $subject, $message, $date_Sent, $seen, $user_id_user){
		$result = DB::table('message')->insert(array('cod_receiver'=> $cod_receiver, 'subject'=>$subject, 'message'=>$message, 'date_Sent'=>$date_Sent, 'seen'=>$seen, '$user_id_user'=>$user_id_user));
		return $result;
	}


	/**
	 * function getMsg()
	 * 
	 * @return $return devuelve un array $msgs
	 */
	public function getMsgs(){
		$msgs = DB::table('message')->get();
		return $msgs;
	}

	
	/**
	 * function getMsgSent()
	 * 
	 * @param $user_id_user id de usuario envia
	 * 
	 * @return $return devuelve un mediumint (id_user)
	 */
	public function getMsgSent($user_id_user){
		$msg_sent = DB::table('message')->where('user_id_user', [$user_id_user])->get();
		return $msg_sent;
	}

		/**
	 * function getMsgReceived()
	 * 
	 * @param $cod_receiver cod de usuario recibe
	 * 
	 * @return $return devuelve un mediumint (id_user)
	 */
	public function getMsgReceived($cod_receiver){
		$msg_received = DB::table('message')->where('cod_receiver', [$cod_receiver])->get();
		return $msg_received;
	}


	/**
	 * function getMsg()
	 * 
	 * @param $cod_msg Codigo de mensaje
	 * 
	 * @return $return un objeto queryBuilder ($msg)
	 */
	public function getMsg($cod_msg){
		$msg = DB::table('message')->where('cod_msg', [$cod_msg])->first();
		return $msg;
	}


	/**
	 * function updateMsg()
	 * 
	 * @param $cod_msg Codigo de mensaje
	 * @param $subject Asunto
	 * @param $message Mensaje
	 * @param $date_Sent Fecha de envio
	 * @param $seen Visto
	 * 
	 * @return $return Devuelve un int
	 */
	public function updateMsg($cod_msg, $subject, $message, $date_Sent, $seen){
		$result=DB::table('message')
            ->where('cod_msg', $cod_msg)
			->update(array('subject' => $subject, 'message'=>$message, 'date_Sent'=>$date_Sent, 'seen'=>$seen));
			return $result;
	}


	/**
	 * function deleteMsg()
	 * 
	 * @param $cod_msg Codigo de mensaje
	 * 
	 * @return $return devuelve un int
	 */
	public function deleteMsg($cod_msg){
		$result=DB::table('message')->where('cod_msg', $cod_msg)->delete();

		return $result;
	}

	//public function user()
	//{
		//return $this->belongsTo(User::class, 'user_id_user');
	//}
}
