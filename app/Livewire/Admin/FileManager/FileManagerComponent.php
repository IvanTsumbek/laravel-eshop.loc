<?php

namespace App\Livewire\Admin\FileManager;

use App\Models\Media;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\WithoutUrlPagination;

class FileManagerComponent extends Component
{
    use WithFileUploads, WithPagination, WithoutUrlPagination;

    #[Validate]
    public $path;

    protected function rules()
    {
        return [
            'path' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function saveMedia()
    {
        $validated = $this->validate();
        $folders = date('Y') . '/' . date('m') . '/' . date('d');
        $validated['path'] = "uploads/" . $validated['path']->store($folders);
        Media::query()->create($validated);
        $this->js("toastr.success('Upload successfully')");
        $this->path = null;
    }

    public function render()
    {
        $media = Media::query()->orderBy('id', 'desc')->paginate();
        return view('livewire.admin.file-manager.file-manager-component', compact('media'));
    }
}
