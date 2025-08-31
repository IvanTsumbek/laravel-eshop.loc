<?php

namespace App\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
#[Title('Order')]
class OrderEditComponent extends Component
{
    public Order $order;
    public bool $status;

    public function updatedStatus()
    {
      $this->order->setAttribute('status', $this->status)->save();
    }

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->status = $order->status;
    }



    public function render()
    {
        return view('livewire.admin.order.order-edit-component');
    }
}
