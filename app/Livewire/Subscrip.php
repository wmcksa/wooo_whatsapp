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
          Carbon::now()->isAfter($end_at);

            $this->dayOf =Carbon::parse($end_at)->diffInDays();

            $this->userScbscrip = Package::find($user->subscrip->package_id);
        }

        return view('livewire.subscrip');
    }

    public function subscrip($id)

    {
        return view('payment.index',compact('amount'));

    }
}
