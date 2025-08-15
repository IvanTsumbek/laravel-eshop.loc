<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
#[Title('Edit Category')]

class CategoryEditComponent extends Component
{
    public Category $category;
    public string $title;
    public $parent_id = 0;
    public $id;

    public function mount(Category $category)
    {
    $this->category = $category;
    $this->title = $category->title;
    $this->parent_id = $category->parent_id;
    $this->id = $category->id;

}

 public function save()
    {
        $validated = $this->validate([
            'title' => 'required|max:255',
            'parent_id' => 'required|integer',
        ]);

        $this->category->update($validated);
        cache()->forget('categories_html');
        session()->flash('success', 'Category updated successfully');
        $this->redirectRoute('admin.categories.index', navigate:true);
    }

    public function render()
    {
        return view('livewire.admin.category.category-edit-component');
    }
}
