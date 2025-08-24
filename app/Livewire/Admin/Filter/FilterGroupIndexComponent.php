<?php

namespace App\Livewire\Admin\Filter;

use App\Models\FilterGroup;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;


#[Layout('components.layouts.admin')]
#[Title('Filter Groups')]
class FilterGroupIndexComponent extends Component
{
    public function render()
    {
        $filter_groups = FilterGroup::all();
        return view('livewire.admin.filter.filter-group-index-component', compact('filter_groups'));
    }
}
