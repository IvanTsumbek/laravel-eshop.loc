<?php

namespace App\Livewire\Cart;

use Livewire\Component;
use Livewire\Attributes\On;

class CartIconComponent extends Component
{
    #[On('cart-updated')]
    public function render()
    {
        return view('livewire.cart.cart-icon-component');
    }
}
