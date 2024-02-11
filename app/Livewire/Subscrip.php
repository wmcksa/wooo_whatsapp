<?php

namespace App\Livewire;

use App\Models\OrderSupscrip;
use App\Models\Package;
use App\Models\Subscrip as ModelsSubscrip;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Subscrip extends Component
{
    public $packages, $user, $userScbscrip, $dayOf, $post_id;


    public function render()
    {
        $auth = Auth::guard('web')->user();
        $user = User::where('id', $auth->id)->with('subscrip')->first();
        $this->user = $user;
        if ($user->subscrip == NULL) {
            $this->packages = Package::all();
        } else {

            $start_at =   Carbon::createFromDate($user->subscrip->start_at);
            $end_at = Carbon::createFromDate($user->subscrip->end_at);

            $this->dayOf = $end_at->diffInDays($start_at);

            $this->userScbscrip = Package::find($user->subscrip->package_id);
        }

        return view('livewire.subscrip');
    }

    public function subscrip($id)

    {
        $package = Package::find($id);
        $auth = Auth::guard('web')->user();
        $user = User::where('id', $auth->id)->with('subscrip')->first();
        if ($user->subscrip == NULL) {
            $Subscrip = new ModelsSubscrip();
            $Subscrip->user_id = $user->id;
            $Subscrip->package_id = $package->id;
            $Subscrip->start_at = Carbon::now();
            $Subscrip->end_at = Carbon::now()->addDays($package->days);
            $Subscrip->status = 0;
            $Subscrip->save();

            $order_subscrip = new OrderSupscrip();
            $order_subscrip->user_id = $user->id;
            $order_subscrip->package_id = $package->id;
            $Subscrip->save();
        } else {
            session()->flash('success', 'انت بالفعل مشترك في العرض');
        }
    }
}
