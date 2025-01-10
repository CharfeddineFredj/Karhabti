<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Agency;
use App\Models\Report;
use App\Models\Contact;
use App\Models\Ad;

class DashboardController extends Controller
{
    public function index(){
        $count = [
            'users' => User::count(),
            'new_users' => User::whereMonth("created_at",Date('m'))->count(),
            'cars' => Product::count(),  
            'agencies' => Agency::count()

        ];
        $users = User::orderBy('created_at','desc')->take(10)->get();
        $agencies = Agency::orderBy('created_at','desc')->take(10)->get();

        return inertia('Dashboard',compact('count','users','agencies'));
    }
    public function posts(){
        return inertia('Admin/Manager/Posts');
    }
    public function ads(){
        $adv = Ad::all();
        return inertia('Admin/Manager/Ads',compact('adv'));
    }
    public function reports(){
            $reports = Report::all();
        return inertia('Admin/reports', compact('reports'));
    }
    public function inbox(){
        $inbox = Contact::all();
    return inertia('Admin/inbox', compact('inbox'));
}


    public function delete_report(Report $report)
    {
        Report::where('id',$report->id)->delete();
        return redirect()->route('reports');
    }
    public function accept_report(Report $report)
    {
        Product::where('id',$report->reported_post)->delete();
        Report::where('id',$report->id)->delete();
        return redirect()->route('reports');
    }

    public function destroy_ad(Ad $ad)
    {
        Ad::where('id',$ad->id)->delete();
        return redirect()->route('ads');
    }
    
    public function accept_ad(Ad $ad)
    {
        $ad->active = true;
        $ad->save();
       return redirect()->route('ads');
    }
    public function disable_ad(Ad $ad)
    {
        $ad->active = false;
        $ad->save();
       return redirect()->route('ads');
    }

    public function delete_msg(Contact $msg)
    {
        Contact::where('id',$msg->id)->delete();
        return redirect()->route('inbox');
    }

}
