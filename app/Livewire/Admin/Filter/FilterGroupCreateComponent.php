<?php

namespace App\Livewire\Admin\Filter;

use Livewire\Component;
use App\Models\FilterGroup;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
#[Layout('components.layouts.admin')]
#[Title('Create Filter Group')]
class FilterGroupCreateComponent extends Component
{
    public string $title;

    public function save()
    {
        $validated = $this->validate([
            'title' => 'required|max:255',
        ]);

        FilterGroup::query()->create($validated);
        session()->flash('success', 'Filter group created successfully');
        $this->redirectRoute('admin.filter-groups.index', navigate: true);
    }


    public function render()
    {

        return view('livewire.admin.filter.filter-group-create-component');
    }
}
