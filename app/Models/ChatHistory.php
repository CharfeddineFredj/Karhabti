<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatHistory extends Model
{
    use HasFactory;
    protected $appends = [
        'partner','createdAtText'
    ];

    public function getPartnerAttribute(){
        if($this->type == 'agency'){
            return Agency::where('username',$this->partner_id)->first();
        }else{
           return User::where('username',$this->partner_id)->first();
        }
    }
    public function getCreatedAtTextAttribute(){
        return $this->updated_at->diffForHumans();
    }
}
