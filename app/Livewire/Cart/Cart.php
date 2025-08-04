<?php

namespace App\Livewire\Cart;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Helpers\Traits\CartTrait;

class Cart extends Component
{
    use CartTrait;

    #[On('cart-updated')]

    public function render()
    {
        return view('livewire.cart.cart');
    }
}
