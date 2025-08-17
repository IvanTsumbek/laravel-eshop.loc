<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
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

    #[Computed]
    public function filters()
    {
        $filter_groups = [];
        if ($this->category_id)
        {
            $ids = \App\Helpers\Category\Category::getIds($this->category_id) . $this->category_id;
            $category_filters = DB::table('category_filters')
               ->select('category_filters.filter_group_id', 'filter_groups.title', 'filters.id as filter_id', 'filters.title as filter_title')
               ->join('filter_groups', 'category_filters.filter_group_id', '=', 'filter_groups.id')
               ->join('filters', 'filters.filter_group_id', '=', 'filter_groups.id')
               ->whereIn('category_filters.category_id', explode(',', $ids))
                  ->get();
            foreach ($category_filters as $filter)
            {
               $filter_groups[$filter->filter_group_id][] = $filter;
            }
        }
        return $filter_groups;
    }

    public function render()
    {
        return view('livewire.admin.product.product-create-component');
    }
}
