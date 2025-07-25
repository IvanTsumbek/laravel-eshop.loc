<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use App\Helpers\Traits\CartTrait;
use Illuminate\Support\Facades\DB;

class CategoryComponent extends Component
{
    use WithPagination, CartTrait;

    public string $slug = '';
    #[Url]
    public string $sort = 'default';
    public array $sortList = [
        'default' => ['title' => 'Default', 'order_field' => 'id', 'order_direction' => 'desc'],
        'name-asc' => ['title' => 'Name (a-z)', 'order_field' => 'title', 'order_direction' => 'asc'],
        'name-desc' => ['title' => 'Name (z-a)', 'order_field' => 'title', 'order_direction' => 'desc'],
        'price-asc' => ['title' => 'Price (low > high)', 'order_field' => 'price', 'order_direction' => 'asc'],
        'price-desc' => ['title' => 'Price (high > low)', 'order_field' => 'price', 'order_direction' => 'desc'],
    ];

    #[Url]
    public int $limit = 3;
    public array $limitList = [3, 6, 9, 12];

    #[Url]
    public array $selected_filters = [];


    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function changeSort()
    {
        $this->sort = isset($this->sortList[$this->sort]) ? $this->sort : 'default';
    }

    public function changeLimit()
    {
        $this->limit = in_array($this->limit, $this->limitList) ? $this->limit : $this->limitList[0];
        $this->resetPage();
    }


    public function render()
    {
        $category = Category::query()->where('slug', '=', $this->slug)->firstOrFail();
        $ids = \App\Helpers\Category\Category::getIds($category->id) . $category->id;
        $category_filters = DB::table('category_filters')
            ->select('category_filters.filter_group_id', 'filter_groups.title', 'filters.id as filter_id', 'filters.title as filter_title')
            ->join('filter_groups', 'category_filters.filter_group_id', '=', 'filter_groups.id')
            ->join('filters', 'filters.filter_group_id', '=', 'filter_groups.id')
            ->whereIn('category_filters.category_id', explode(',', $ids))
            // ->groupBy('filters.id')
            ->get();

        $filter_groups = [];
        foreach ($category_filters as $filter) {
            $filter_groups[$filter->filter_group_id][] = $filter;
        }

        // dump($filter_groups);

        $products = Product::query()
            ->whereIn('category_id', explode(',', $ids))
            ->orderBy($this->sortList[$this->sort]['order_field'], $this->sortList[$this->sort]['order_direction'])
            ->paginate($this->limit);

        $breadcrumbs = \App\Helpers\Category\Category::getBreadcrumbs($category->id);

        return view('livewire.product.category-component', [
            'products' => $products,
            'category' => $category,
            'breadcrumbs' => $breadcrumbs,
            'filter_groups' => $filter_groups,
        ]);
    }
}
