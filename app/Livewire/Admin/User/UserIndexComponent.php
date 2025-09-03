<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

#[Layout('components.layouts.admin')]
#[Title('Users')]
class UserIndexComponent extends Component
{
    use WithPagination;

    public function deleteUser(User $user)
    {
       try {
        DB::beginTransaction();
        // $user>orders()->delete();
        DB::table('orders')
            ->where('user_id', '=', $user->id)
            ->update(['user_id' => null]);
        $user->delete();
        DB::commit();
         $this->js("toastr.success('User deleted successfully')");
        return;
       } catch (\Exception $e) {
        DB::rollBack();
        Log::error($e->getMessage());
        $this->js("toastr.error('Error deliting user')");
       }
    }

    public function render()
    {
        $users = User::query()->orderBy('id', 'desc')->paginate();
        return view('livewire.admin.user.user-index-component', compact('users'));
    }
}
