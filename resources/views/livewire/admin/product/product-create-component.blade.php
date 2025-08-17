<div class="row">
    <div class="col-12 mb-4 position-relative">

        <div class="update-loading" wire:loading wire:target="save, category_id">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a wire:navigate href="{{ route('admin.products.index') }}" class="btn btn-primary">Products List</a>
            </div>
            <div class="card-body">

                <form wire:submit="save">

                    <div class="mb-3">
                        <label for="title" class="form-label required">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            placeholder="Product title" wire:model="title">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label required">Category</label>
                        <select wire:model.live="category_id" id="category_id" class="custom-select"
                            @error('category_id') is-invalid @enderror>
                            <option value="">Select category</option>
                            {!! \App\Helpers\Category\Category::getMenu('incs.menu-select-tpl') !!}
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        @foreach ($this->filters as $k => $filter_group)
                            <div class="col-lg-3 col-md-6" wire:key="{{ $k }}">
                                <div class="card">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primery">{{ $filter_group[0]->title }}</h6>
                                    </div>
                                    <div class="card-body">
                                        @foreach ($filter_group as $filter)
                                            <div wire:key="{{ $filter->filter_id }}">
                                                <input type="checkbox"
                                                       wire:model="selectedFilters"
                                                       value="{{ $filter->filter_id }}"
                                                       id="filter-{{ $filter->filter_id }}">
                                                <label for="filter-{{ $filter->filter_id }}"
                                                       class="form-check-label">{{ $filter->filter_title }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <div class="mb-3">
                        <label for="price" class="form-label required">Price</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                            placeholder="Product price" wire:model="price">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="old_price" class="form-label">Old price</label>
                        <input type="number" class="form-control @error('old_price') is-invalid @enderror"
                            id="old_price" placeholder="Product old price" wire:model="old_price">
                        @error('old_price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="is_hit" class="form-check-label">Is hit</label>
                        <input type="checkbox" class="@error('is_hit') is-invalid @enderror" id="is_hit"
                            wire:model="is_hit">
                        @error('is_hit')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="is_new" class="form-check-label">Is new</label>
                        <input type="checkbox" class="@error('is_new') is-invalid @enderror" id="is_new"
                            wire:model="is_new">
                        @error('is_new')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Excerpt</label>
                        <input type="text" class="form-control @error('excerpt') is-invalid @enderror" id="excerpt"
                            placeholder="Product excerpt" wire:model="excerpt">
                        @error('excerpt')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label required">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Product content"
                            wire:model="content" rows="10"></textarea>
                        @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-info">
                            Save
                            <div wire:loading wire:target="save" class="spinner-grow spinner-grow-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
