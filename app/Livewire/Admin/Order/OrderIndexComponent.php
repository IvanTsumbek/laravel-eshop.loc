<?php

namespace App\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
#[Title('Orders')]
class OrderIndexComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $orders = Order::orderBy('id', 'desc')->paginate();
        return view('livewire.admin.order.order-index-component', compact('orders'));
    }
}
