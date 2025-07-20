<?php

namespace App\Livewire\Cart;

use App\Helpers\Traits\CartTrait;
use Livewire\Component;
use Livewire\Attributes\On;

class CartModalComponent extends Component
{
    use CartTrait;
    
    #[On('cart-updated')]
    public function render()
    {
        return view('livewire.cart.cart-modal-component');
    }
}
