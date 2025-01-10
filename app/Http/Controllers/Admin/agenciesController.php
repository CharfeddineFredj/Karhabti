<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Product;
use Illuminate\Http\Request;

class agenciesController extends Controller
{

    public function index()
    {
        $inactive = Agency::where('active',false)->get();
        $active = Agency::where('active',true)->get();
       # dd($active);

        
        return inertia('Admin/Manager/Agencies/Index',compact('active','inactive'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Agency $agency)
    {
        $item = $agency;
        return inertia('Admin/Manager/Agencies/show', compact('item'));
    }

    public function edit(Agency $agency)
    {
        $item = $agency;
        return inertia('Admin/Manager/Agencies/edit', compact('item'));
    }


    public function update(Request $request, Agency $agency)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|min:2|max:255',
            'adress' => 'nullable|min:2|max:255', 
            'phone' => 'nullable|min:2|max:255', 
            'description' => 'nullable|min:2|max:255', 
            
        ]);

      $item = $agency;
      $item->name = $request->name;
      $item->email = $request->email;
      $item->adress = $request->adress;
      $item->phone = $request->phone;
      $item->description = $request->description;
      $item->active = $request->active;
      $item->save();
      return redirect()->route('agencies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function accept(Agency $agency)
    {
        $agency->active = true;
        $agency->save();
       return redirect()->route('agencies.index');
    }

    public function destroy(Agency $agency)
    {
        Product::where([
            'Created_by'=> $agency->id,
            'Created_type' => 'agency'
            ])->delete(); 
        $agency->delete();
       return redirect()->route('agencies.index');

    }

    public function disable(Agency $agency)
    {
       $agency->active = false;
       $agency->save();
       return redirect()->route('agencies.index');
    }

}
