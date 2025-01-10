<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    
    protected $appends = [
        'picture','pictures','name','old_pictures','createdAtText'
    ];

    public function getPictureAttribute(){
        if(!empty($this->photos)){
            $pictures = json_decode($this->photos);
            return asset('pictures/'.$pictures[0]);
        }
        return asset('default/product-default.png');
    }

    public function getPicturesAttribute(){
        $list = [];
        if(!empty($this->photos)){
            $pictures = json_decode($this->photos);
            foreach ($pictures as $key => $picture) {
                $list[] = asset('pictures/'.$picture);
            } 
        }
        return $list;
    }

    public function getNameAttribute(){
        return $this->make." ".$this->model;
    }

    public function getOldPicturesAttribute(){ 
        $old_photos = [];
        $old_pictures = json_decode($this->photos); 
        foreach($old_pictures as $item){
            $old_photos[] = [
                'filename' => $item,
                'url' => asset('pictures/'.$item),
            ];
        } 
        return $old_photos;
    }
    public function getCreatedAtTextAttribute(){
        return $this->created_at->format('d M Y h:i');
    }
    



}
