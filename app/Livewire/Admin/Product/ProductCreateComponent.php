<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Layout('components.layouts.admin')]
#[Title('Create Product')]
class ProductCreateComponent extends Component
{
    use WithFileUploads;

    public string $title;
    public $category_id;
    public array $selectedFilters = [];
    public int $price = 0;
    public int $old_price = 0;
    public bool $is_hit = false;
    public bool $is_new = false;
    public string $excerpt;
    public string $content = '';
    #[Validate]
    public $image;
    #[Validate]
    public $gallery;

    public function render()
    {
        return view('livewire.admin.product.product-create-component');
    }
}
