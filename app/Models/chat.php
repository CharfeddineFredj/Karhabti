<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;

    public function history(){
        $partner_id = ($this->receiver_id == auth()->user()->username)?$this->sender_id:$this->receiver_id;
        $data = ChatHistory::where([
            'user_id' => auth()->user()->username,
            'partner_id' => $partner_id
        ])->first();
        if(empty($data->id)){
            $data = new ChatHistory();
        }
        $data->user_id = auth()->user()->username;
        $data->partner_id = $partner_id;
        $data->type = $this->type;
        $data->last_msg = $this->message;
        $data->save();
    }
    public static function token(){
        #session()->forget("chat_token");
        /*
        if(empty(session()->get("chat_token"))){
            $token = "536ccafab429c66d19d4f720f619752d";
            session()->put("chat_token",$token);
        }
        return session()->get("chat_token");
        */
        return env("APP_TOKEN");
    }
    public static function verifToken($token){
        #dd($token,self::token() );
        return ($token == self::token() );
    }

}
