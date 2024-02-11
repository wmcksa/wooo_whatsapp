<?php

namespace App\Livewire;

use App\Models\OrderSupscrip;
use App\Models\Subscrip;
use Livewire\Component;

class Orders extends Component
{
    public $orders;

    public function render()
    {
        $this->orders = OrderSupscrip::all();
        return view('livewire.orders');
    }
    public function order_pross($id)
    {
        $OrderSupscrip = OrderSupscrip::find($id);
        $subscrip = Subscrip::find($OrderSupscrip->subscrip_id);

    }
}
