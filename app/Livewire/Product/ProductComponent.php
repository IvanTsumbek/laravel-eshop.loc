<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

use App\Helpers\Category\Category;
use Illuminate\Cache\RateLimiting\Limit;

class ProductComponent extends Component
{
    public string $slug = '';

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $product = Product::query()
            ->where('slug', '=', $this->slug)
            ->with('category')
            ->firstOrFail();

        $related_products = Product::query()
            ->where('category_id', '=', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(8)
            ->get();

        $breadcrumbs = Category::getBreadcrumbs($product->category_id);

        return view('livewire.product.product-component', [
            'product' => $product,
            'related_products' => $related_products,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }
}
