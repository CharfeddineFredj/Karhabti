<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;
use App\Models\Agency;
use App\Models\Ad;

class storeController extends Controller
{
    public function store(){
        $products = Product::orderBy('id','desc')->get();
        $compare = (!empty(session()->get("product_comparaison")))?session()->get("product_comparaison"):[]; 
        $ad = Ad::where('place','top')->where('active','1')->inRandomOrder()->first();
     #   dd($ad);
        return inertia('App/Store', compact('products','compare','ad'));
    }
    public function search(Request $request){
       // dd($request->all());
      $products = Product::orderBy('id','desc');
      $ad = Ad::where('place','top')->where('active','1')->inRandomOrder()->first();
      $compare = (!empty(session()->get("product_comparaison")))?session()->get("product_comparaison"):[]; 
      if(!empty($request->make)){
            $products->where('make', $request->make);
        }

        if(!empty($request->model)){
            $products->where('model',$request->model);
        }

        if(!empty($request->state)){
            $products->where('state', $request->state);
        }   

        if(!empty($request->price)){
          $products =  $products->where('price','<=', $request->price);
        }

        $products = $products->get();
      #  dd($products);
        return inertia('App/Store', compact('products','ad','compare'));
    }

    public function post($id){
            $product = Product::where('id',$id)->first();
            $ad = Ad::where('place','sidebar')->where('active','1')->inRandomOrder()->first();
            if($product->Created_type == 'user'){
                $item = User::find($product->Created_by);
                $count = Product::where('Created_by', $item->id)->count();
            }else{
                $item = Agency::find($product->Created_by);
                $count = Product::where('Created_by', $item->id)->count();

            }

      /*  if(!empty($post->id)){
            $product = Product::where([
                 'id' => $post->id
            ]);*/
            return inertia('App/Post',compact('product','item','count','ad'));
        }
        public function compare(){
           $data = session()->get("product_comparaison");
           $products = Product::whereIn('id',$data)->get();
          return inertia('App/Compare',compact('products'));
        }
       // return abort(404); } 

       public function addCompare(Request $request){ 
           
           if(!empty($request->action)){
               $data = [];
               foreach(session()->get("product_comparaison") as $item){
                   if($request->product != $item){
                       $data[] = $item;
                   }
               }
               $request->session()->put("product_comparaison",$data);
               return redirect()->route('store');
           }else{
                if($request->session()->exists('product_comparaison')){
                    if((count(session()->get("product_comparaison")) < 3)&& (!in_array($request->product,session()->get("product_comparaison")))){
                    $request->session()->push("product_comparaison",$request->product);
                    }
                
                }else{
                  $request->session()->put("product_comparaison",[$request->product]);
                
                } 
           }
       }
}

