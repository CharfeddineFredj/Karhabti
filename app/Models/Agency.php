<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Agency extends Model
{
    use HasFactory;
    
    protected $appends = [
        'logo','picture','carNumber'
    ];
    public function getLogoAttribute(){
         return asset('default/product-default.png');
    }
     
    public function getPictureAttribute(){
        if(!empty($this->photo)){
            return $this->photo;
        }
        return asset('default/product-default.png');
   }

   public static function generateUsername($name,$i=0){
       $username = Str::slug('agency-'.$name);
       $username = ($i>0)?$username.'-'.$i:$username;
       $findUsername = Agency::where('username',$username)->first();
       $findUsernameInUser = User::where('username',$username)->first();
       if(!empty($findUsername->id)OR!empty($findUsernameInUser->id)){
           $i++;
           return self::generateUsername($name,$i);
       } 
       return $username;
   } 
   public function getcarNumberAttribute(){
    $count = Product::where('Created_by', $this->id)->count();
    return  $count;
}
}
