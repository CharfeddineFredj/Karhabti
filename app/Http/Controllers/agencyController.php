<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;
use App\Models\Agency;
use App\Models\Ad;

class agencyController extends Controller
{
    public function agencies(){
        $agencies = Agency::where('active',true)->get();
        return inertia('Agency/Index', compact('agencies'));
    }

    public function agency($username){
        $agency = Agency::where([
            'username' => $username,
            'active' => true
            
        ])->first();
        
        if(!empty($agency->id)){
            $products = Product::where([
                'created_type' => 'agency',
                 'created_by' => $agency->id
            ])->orderBy('id','desc')->get(); 
            return inertia('Agency/Store',compact('products','agency'));
        }
        return abort(404);
    }

    public function create_agency(){
        if(!auth()->user()->haveAgency){
            return inertia('User/agency/request');
        }
        return abort(404);
    }

    public function store_agency(Request $request){

        $request->validate([
            'name' => 'required|min:2|max:255',
            'adress' => 'required|min:2|max:255',
            'email' => 'required|min:2|max:255',
            'phone' => 'required|min:2|max:255',
            'description' => 'required|min:2|max:255',
        ]);
        $agency = new Agency();
        $agency->name = $request->name;
        $agency->adress = $request->adress;
        $agency->email = $request->email;
        $agency->phone = $request->phone;
        $agency->description = $request->description;
        $agency->created_by = auth()->user()->id;
        $agency->username = Agency::generateUsername($request->name);
        $agency->save();
        return redirect()->route('agency.thankyou');
    }
    public function thankyou(){
        return inertia('User/agency/thankyou');
    }
    public function wait(){
        return inertia('User/agency/wait');
    }
    public function myagency(){  

        $item = Agency::where([
            'created_by' => auth()->user()->id,
            'active' => true
            
        ])->first();

        if(!empty($item->id)){
            $products = Product::where([
                'created_type' => 'agency',
                 'created_by' => $item->id
            ])->orderBy('id','desc')->get(); 
            return inertia('User/agency',compact('item','products'));
        }
        return redirect()->route('agency.wait');
    }


    public function addcar(Agency $agency){
        
        return inertia('User/agency/Addcar',compact('agency'));
    }

    public function storeCar(Request $request, Agency $agency){
        $pictures = []; 
        $request->validate([
            'make' => 'required|min:2|max:255',
            'model' => 'required|min:2|max:255',
            'model_year' => 'required|min:2|max:255',
            'month' => 'required|min:2|max:255',
            'year' => 'required|min:2|max:255',
            'motor' => 'required|min:2|max:255',
            'body' => 'required|min:2|max:255',
            'kilometrage' => 'required|min:2|max:255',
            'price' => 'required|min:2|max:255',
            'city' => 'required|min:2|max:255',
            'state' => 'required|min:2|max:255',
            'zip' => 'required|min:2|max:255',
            'phone' => 'required|min:2|max:255',
            'energy' => 'required|min:2|max:255',
            'box' => 'required|min:2|max:255',
            'color' => 'required|min:2|max:255',
            'description' => 'required|min:2|max:255',
            'photos' => 'required'
        ]);
 
      if(!empty($request->photos)){
          foreach ($request->photos as $key => $photo) {
              $pictures[] = $photo['filename'];
          }
      }
    
      $product = new Product();
      $product->make = $request->make;
      $product->model = $request->model;
      $product->model_year = $request->model_year;
      $product->month = $request->month;
      $product->year = $request->year;
      $product->motor = $request->motor;
      $product->body = $request->body;
      $product->kilometrage = $request->kilometrage;
      $product->price = $request->price;
      $product->city = $request->city;
      $product->state = $request->state;
      $product->zip = $request->zip;
      $product->phone = $request->phone;
      $product->energy = $request->energy;
      $product->box = $request->box;
      $product->color = $request->color;
      $product->description = $request->description;
      $product->Eq_Foglights = $request->Eq_Foglights;
      $product->Eq_Reversing_radar = $request->Eq_Reversing_radar;
      $product->Eq_LED_lights = $request->Eq_LED_lights;
      $product->Eq_Sunroof = $request->Eq_Sunroof;
      $product->Eq_Tinted_glass = $request->Eq_Tinted_glass;
      $product->Eq_parking_sensor = $request->Eq_parking_sensor;
      $product->Eq_Satnav = $request->Eq_Satnav;
      $product->Eq_Rearview_camera = $request->Eq_Rearview_camera;
      $product->Eq_Climate_control = $request->Eq_Climate_control;
      $product->Eq_Cruise_control = $request->Eq_Cruise_control;
      $product->Eq_Touchscreen_infotainment = $request->Eq_Touchscreen_infotainment;
      $product->Eq_Heated_seats = $request->Eq_Heated_seats;
      $product->Eq_Apple_CarPlay = $request->Eq_Apple_CarPlay;
      $product->Eq_Leather_seats = $request->Eq_Leather_seats;
      $product->Eq_Android_Auto = $request->Eq_Android_Auto;
      $product->created_type = 'agency';
      $product->created_by = $agency->id ;
      $product->photos = json_encode($pictures);
      $product->save();
      return redirect()->route('myagency',$agency);
        
    }


    public function create_ad(Agency $agency){
        
        return inertia('User/agency/ads',compact('agency'));
    }

    public function store_ad(Request $request, Agency $agency){
        $request->validate([
            'place' => 'required|min:2|max:255',
            'url' => 'required|min:2|max:255',
            'photo' => 'required|min:2|max:255',
            'description' => 'required|min:2|max:255',

        ]);
    
      $ad = new Ad();
      $ad->place = $request->place;
      $ad->duration = $request->duration;
      $ad->url = $request->url;
      if($request->place == 'top'){
        $ad->price = $request->duration * 10;
      }
      else
      {
        $ad->price = $request->duration * 5;
      }
      $ad->photo = $request->photo;
      $ad->description = $request->description;
      $ad->created_by = $agency->username ;
     # $ad->active = $request->active;
      $ad->save();
      return redirect()->route('myagency',$agency);
        
    }


    public function setting(Agency $agency)
    {

        return inertia('User/agency/Setting', compact('agency'));
    }


    public function storeSetting(Request $request, Agency $agency)
    {
        $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|min:2|max:255',
            'adress' => 'nullable|min:2|max:255', 
            'phone' => 'nullable|min:2|max:255', 
            'description' => 'nullable|min:2|max:255', 
            'photo' => 'nullable'

            
        ]);
          //  dd($request->all());
            $agency->name = $request->name;
            $agency->email = $request->email;
            $agency->adress = $request->adress;
            $agency->phone = $request->phone;
            $agency->photo = $request->photo;
            $agency->description = $request->description;
           // dd($agency);
            $agency->save();
            return redirect()->route('myagency', $agency->id );
       
    }

    public function destroy(Agency $agency)
    {
       Product::where('created_by',$agency->id)->delete(); 
       $agency->delete();
       return redirect()->route('agency.index');
    }

}
