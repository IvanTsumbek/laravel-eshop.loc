<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
#[Title('Users')]
class UserIndexComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $users = User::query()->orderBy('id', 'desc')->paginate(1);
        return view('livewire.admin.user.user-index-component', compact('users'));
    }
}
