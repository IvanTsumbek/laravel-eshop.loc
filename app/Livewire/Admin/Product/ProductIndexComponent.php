<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('components.layouts.admin')]
#[Title('Products')]
class ProductIndexComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::query()->with('category')->orderBy('id', 'desc')->paginate();

        return view('livewire.admin.product.product-index-component', compact('products'));
    }
}
