<?php

namespace App\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Livewire\Features\SupportFileUploads\WithFileUploads;

#[Layout('components.layouts.admin')] //в config/livewire происываем layout по default, a здесь не по default
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
    #[Validate] //валидация прямо в браузере
    public $image;//в config/filesystems.php создали массив 'public_uploads' с новым местом хранения изображений. В ключе .env пишем FILESYSTEM_DISK=public_uploads
    #[Validate]
    public $gallery;

    //метод вызывается автоматически если есть updated. Данные берет напрямую с JSON
    public function updatedCategoryId()
    {
        $this->selectedFilters = [];
    }

    #[Computed] //метод вызывается автоматически и вычесляет сразу
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

    protected function rules() //метод автоматически является валидатором для validate
    {
        return [
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'selectedFilters.*' => 'numeric',
            'price' => 'required|integer',
            'old_price' => 'integer',
            'is_hit' => 'boolean',
            'is_new' => 'boolean',
            'excerpt' => 'nullable|max:255',
            'content' => 'required',
            'image' => 'nullable|image:mimes:jpg,jpeg,png|max:2048',
            'gallery.*' => 'nullable|image:mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function save()
    {
        $validated = $this->validate();
        dd($validated);
    }

    public function render()
    {
        return view('livewire.admin.product.product-create-component');
    }
}
