<?php

namespace App\Livewire\Admin\Category;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

#[Layout('components.layouts.admin')]
#[Title('Categories')]
class CategoryIndexComponent extends Component
{
    public function deleteCategory(Category $category)
    {
        $category_cnt = Category::query()
            ->where('parent_id', '=', $category->id)->count();
        if ($category_cnt)
        {
            $this->js("toastr.error('Error! Category has child categories.')");
            return;
        }

        $product_cnt = Product::query()
            ->where('category_id', '=', $category->id)->count();
        if ($product_cnt)
            {
                $this->js("toastr.error('Error! Category has products.')");
                return;
            }

        try {
            DB::beginTransaction();
            DB::table('category_filters')
            ->where('category_id', '=', $category->id)->delete();
            $category->delete();
            DB::commit();
            cache()->forget('categories_html');
            session()->flash('success', 'Category removed');
            $this->redirectRoute('admin.categories.index', navigate:true);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            $this->js("toastr.error('Error deleting category')");
        }
    }

    public function render()
    {
        return view('livewire.admin.category.category-index-component');
    }
}
