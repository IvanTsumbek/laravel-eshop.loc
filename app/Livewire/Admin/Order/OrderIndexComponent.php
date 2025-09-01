<?php

namespace App\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;
use App\Models\OrderProduct;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

#[Layout('components.layouts.admin')]
#[Title('Orders')]
class OrderIndexComponent extends Component
{
    use WithPagination;

    public function deleteOrder(Order $order)
    {
        try {
            DB::beginTransaction();
            OrderProduct::where('order_id', '=', $order->id)->delete();
            $order->delete();
            DB::commit();
            $this->js("toastr.success('Order deleted successfully')");
            return;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            $this->js("toastr.error('Error deleting order')");
        }
    }

    public function render()
    {
        $orders = Order::orderBy('id', 'desc')->paginate();
        return view('livewire.admin.order.order-index-component', compact('orders'));
    }
}
