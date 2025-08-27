<?php

namespace App\Livewire\Admin\Filter;

use Livewire\Component;
use App\Models\Filter;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\WithPagination;

#[Layout('components.layouts.admin')]
#[Title('Filters')]
class FilterIndexComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $filters = Filter::query()->with('group')->paginate();
        return view('livewire.admin.filter.filter-index-component', compact('filters'));
    }
}
