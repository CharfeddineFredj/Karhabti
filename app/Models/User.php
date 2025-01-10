<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Str;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'adress',
        'phone',
        'role',
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url','haveAgency','photo','agency','picture','ChatToken'
    ];

    public function isAdmin(){
        return $this->role == 'admin';
    }

    public static function generateUsername($name,$i=0){
        $username = Str::slug($name);
        $username = ($i>0)?$username.'-'.$i:$username;
        $findUsername = User::where('username',$username)->first();
        if(!empty($findUsername->id)){
            $i++;
            return self::generateUsername($name,$i);
        } 
        return $username;
    } 

    public function getHaveAgencyAttribute(){
        return ((Agency::where('created_by',$this->id)->count() > 0) );
    }

    public function getAgencyAttribute(){
        return Agency::where('created_by',$this->id)->first();
    }

    public function getPhotoAttribute(){
        return $this->profile_photo_url ;
    }  
    public function getPictureAttribute(){
        if(!empty($this->profile_photo_url)){
            return $this->profile_photo_url;
        }
        return asset('default/product-default.png');
   }
   public function getChatTokenAttribute(){
       return Chat::token();
  }

}
