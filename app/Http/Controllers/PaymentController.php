<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Subscrip;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    public function payment($id,$amount)
{
    $package = Package::find($id);
        if($package->price == 0){

            $package = Package::find($id);
            $auth = Auth::guard('web')->user();
            $user = User::where('id', $auth->id)->with('subscrip')->first();
            if ($user->subscrip == NULL) {
                $Subscrip = new Subscrip();
                $Subscrip->user_id = $user->id;
                $Subscrip->package_id = $package->id;
                $Subscrip->start_at = Carbon::now();
                $Subscrip->end_at = Carbon::now()->addDays($package->days);
                $Subscrip->status = 0;
                $Subscrip->save();

                $order_subscrip = new Subscrip();
                $order_subscrip->user_id = $user->id;
                $order_subscrip->package_id = $package->id;
                $Subscrip->save();


                return Redirect::to('/admin/subscrip');
            } else {
                return Redirect::to('/admin/subscrip');
            }

            return Redirect::to('/admin/subscrip');
        }else{
            return view('payment.index',compact('id','amount'));

        }

}



public function checkout($id) {

    $package = Package::find($id);
    $auth = Auth::guard('web')->user();
    $user = User::where('id', $auth->id)->with('subscrip')->first();
    if ($user->subscrip == NULL) {
        $Subscrip = new Subscrip();
        $Subscrip->user_id = $user->id;
        $Subscrip->package_id = $package->id;
        $Subscrip->start_at = Carbon::now();
        $Subscrip->end_at = Carbon::now()->addDays($package->days);
        $Subscrip->status = 0;
        $Subscrip->save();

        $order_subscrip = new Subscrip();
        $order_subscrip->user_id = $user->id;
        $order_subscrip->package_id = $package->id;
        $Subscrip->save();


        return Redirect::to('/admin/subscrip');
    } else {
        return Redirect::to('/admin/subscrip');
    }

    return Redirect::to('/admin/subscrip');

}
}
