<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;
use App\Models\Agency;
use App\Models\Chat;
use App\Models\ChatHistory;
use App\Models\Report;
use App\Models\Contact;
use App\Models\Ad;

class appController extends Controller
{
    public function index(){
        
        return inertia('App/Home');
    } 

    public function discover(){

        return inertia('App/car-discovery/main.vue');
    } 
    
    public function storeDiscover(Request $request){
        $products = Product::orderBy('id','desc');
        if(!empty($request->price_min)){
            $products = $products->where('price','>=',$request->price_min);
        }
        if(!empty($request->price_max)){
            $products = $products->where('price','<=',$request->price_max);
        }
        if(!empty($request->energy)){
            $products = $products->whereIn('energy',$request->energy);
        }
        if(!empty($request->body)){
            $products = $products->whereIn('body',$request->body);
        }
        if(!empty($request->make)){
                $products = $products->whereIn('make',$request->make);
        }
        if(!empty($request->climate_control)){
            $products = $products->where('Eq_Climate_control',true);
        }
        if(!empty($request->cruise_control)){
            $products = $products->where('Eq_Cruise_control',true);
        }
        if(!empty($request->touchscreen_infotainment)){
            $products = $products->where('Eq_Touchscreen_infotainment',true);
        }
        if(!empty($request->heated_seats)){
            $products = $products->where('Eq_Heated_seats',true);
        }
        if(!empty($request->leather_seats)){
            $products = $products->where('Eq_Leather_seats',true);
        }
        if(!empty($request->android_auto)){
            $products = $products->where('Eq_Android_Auto',true);
        }
        if(!empty($request->fog_lights)){
            $products = $products->where('Eq_Foglights',true);
        }
        if(!empty($request->parking_sensor)){
            $products = $products->where('Eq_parking_sensor',true);
        }
        if(!empty($request->rearview_camera)){
            $products = $products->where('Eq_Rearview_camera',true);
        }
        if(!empty($request->reversing_radar)){
            $products = $products->where('Eq_Reversing_radar',true);
        }
        if(!empty($request->led_lights)){
            $products = $products->where('Eq_LED_lights',true);
        }
        if(!empty($request->sunroof)){
            $products = $products->where('Eq_Sunroof',true);
        }

        $products = $products->get();
        $compare = (!empty(session()->get("product_comparaison")))?session()->get("product_comparaison"):[]; 
        $ad = Ad::where('place','top')->where('active','1')->inRandomOrder()->first();
        return inertia('App/Store', compact('products','compare','ad'));

        

    } 

    public function mycars($username){  
        $item = User::where('username',$username)->first();
        if(!empty($item->id)){
            $products = Product::where([
                'created_type' => 'user',
                 'created_by' => $item->id
            ])->orderBy('id','desc')->get(); 
            return inertia('User/Mycars',compact('item','products'));
        }
        return abort(404);
    }

    public function addcar(){
        
        return inertia('User/Addcar');
    } 
    

    public function storeCar(Request $request){
        $pictures = []; 
        $request->validate([
            'make' => 'required|max:255',
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
      $product->created_type = 'user';
      $product->created_by = auth()->user()->id ;
      $product->photos = json_encode($pictures);
      $product->save();
      return redirect()->route('mycars',auth()->user()->username);
        
    }

    public function editcar(Product $product)
    {
        $item = $product; 
        return inertia('User/editcar', compact('item'));
    }
    public function destroycar(product $product)
    {
            Product::where('id',$product->id)->delete();
            return redirect()->route('mycars',auth()->user()->username);
    }


    public function updatecar(Request $request, Product $product)
    {
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
        $product->photos = json_encode($pictures);
        $product->save();
        return redirect()->route('mycars',auth()->user()->username);
    }




    public function proseller(){
        
        return inertia('Agency/Store');
    }

    public function chat($type=null,$username=null){
        if($type=='agency'){
            $item = Agency::where('username',$username)->first();
            $me = auth()->user()->username;
            $user_type = 'user_id';
        }elseif($type=='user'){
            $item = User::where('username',$username)->first();
            $me = auth()->user()->username;
            $user_type = 'user_id';
        }else{
            $item = User::where('username',$username)->first();
            $me = auth()->user()->agency->username;
            $user_type = 'partner_id';
        }

      #  dd($item);
        if(!empty($item->id)){
            Chat::where([
                'receiver_id' => $me,
                'sender_id' => $item->username,
                'seen'=> false
            ])->update(['seen' => true]);
            $messages = Chat::whereIn('sender_id',[$me,$item->username])
                ->whereIn('receiver_id',[$me,$item->username])
                ->orderBy('id','asc')
                ->get();
            $list = ChatHistory::where($user_type,$me)->orderBy('updated_at','desc')->get();
            return inertia('Chat',compact('item','type','messages','list'));
        }else{

            $last_msg = Chat::where([
                'receiver_id' => ($type=='inbox')?auth()->user()->agency->username:auth()->user()->username,
            ])->orderBy('id','desc')->first();
            if(!empty($last_msg->id)){
                $item = User::where('username',$last_msg->sender_id)->first();

                if(!empty($item->id)){
                    return redirect()->route('chat',[
                        'type' => $type,
                        'username' => $item->username
                    ]);
                }
                return abort(404);
            }else{
                return inertia('nomessages');
            }

   

        }
    }
    public function chatSend(Request $request){
     #   dd($request->all());
        $request->validate([
            'receiver' => 'required',
            'type' => 'required|min:2|max:255',
            'message' => 'required|max:255',
        ]);

        if($request->type =='inbox'){
         $me = auth()->user()->agency->username;
        }else{
            $me = auth()->user()->username;
        }
        $message = new Chat();
        $message->sender_id = $me;
        $message->receiver_id = $request->receiver;
        $message->message = $request->message;
        $message->save();
        $message->type = $request->type; 
        $message->history();

        return back();
    }

    public function chatApi(Request $request){
        if(Chat::verifToken($request->token)){
            $me = $request->me;
            $partner = $request->partner;
            $messages = Chat::whereIn('sender_id',[$me,$partner])
                    ->whereIn('receiver_id',[$me,$partner])
                    ->orderBy('id','asc')
                    ->get();
                  #  dd($messages,$request);
            return response()->json($messages);
        }
        return abort(500);
        
    }
    
    public function messageApi(Request $request){
        if(Chat::verifToken($request->token)){
            return response()->json(Chat::where([
                'receiver_id' => $request->username,
                'seen' => false,
            ])->count());
        }
        return abort(500);
    }

    public function contact(){
        
        return inertia('Contact');
    }
    
    public function store_contact(Request $request){
       # dd($request->all());
        $request->validate([
            'first_name' => 'required|min:2|max:255',
            'last_name' => 'required|min:2|max:255',
            'email' => 'required|min:2|max:255',
            'phone' => 'required|min:2|max:255',
            'state' => 'required|min:2|max:255',
            'subject' => 'required|min:2|max:255',
            'message' => 'required|min:2|max:255',
        ]);
        $contact = new Contact();
        $contact->last_name = $request->last_name;
        $contact->first_name = $request->first_name;
        $contact->phone = $request->phone;
        $contact->email =  $request->email;
        $contact->state = $request->state;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        return inertia('App/Home');
       # dd($request->all());
       
        //    Mail::to('aymen1rs@gmail.com')->send(new Contact());
           #  return redirect()->route('home');
          // dd("Success");
    }



    public function upload(Request $request){
        //dd($request->all());
        $request->validate([
            'file' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);
        $filename = time().rand().'.png';
        $request->file('file')->move('pictures',$filename);
        return [
            "filename" => $filename,
            "url" => asset('pictures/'.$filename),
        ];
    }

    public function store_reports(Request $request ){

        $request->validate([
            'reason' => 'required|min:2|max:255',
            'email' => 'required|min:2|max:255',
            'message' => 'required|min:2|max:255',
        ]);
        $report = new Report();
        $report->reason = $request->reason;
        $report->email = $request->email;
        $report->message = $request->message;
        $report->reported_by = auth()->user()->username;
        $report->reported_post = $request->reported_post;
        $report->save();
        return redirect()->route('mycars',auth()->user()->username);
    }


}
