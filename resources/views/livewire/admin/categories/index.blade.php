<div>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Category</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Category</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-9 m-b-xs">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-primary">New</a>
                <div data-toggle="buttons" class="btn-group btn-group-toggle" wire:ignore>
                    <label title="ascending" class="btn btn-sm btn-white active" wire:click="$set('sort', 'asc')">
                        <input name="sort" type="radio" id="option1" /><i class="fa fa-sort-amount-asc"
                            aria-hidden="true"></i> </label>
                    <label title="descending" class="btn btn-sm btn-white" wire:click="$set('sort', 'desc')"> <input
                            name="sort" type="radio" id="option2" /><i class="fa fa-sort-amount-desc"
                            aria-hidden="true"></i> </label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group mb-3">
                    <input type="search" wire:model.lazy="search" class="form-control form-control-sm"
                        placeholder="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="button"
                            wire:click="$set('search', $search)">Go!</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <x-alert />
                <div class="ibox ">
                    <div class="project-list">
                        <div class="ibox-content " wire:loading.class="sk-loading">
                            <x-admin-table-loading-spinner />
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th class="text-right" data-sort-ignore="true">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $key => $item)
                                    <tr>
                                        <td>{{ $categories->firstItem() + $key }}</td>
                                        <td class="project-title">{{ $item->name }}</td>
                                        <td>{{ $item->slug }}</td>
                                        <td class="text-right">
                                            <div class="project-actions">
                                                <button wire:click="$emit('modalInfo', {{ $item->id }})"
                                                    class="btn btn-white btn-sm" data-toggle="modal"
                                                    data-target="#myModalInfo"><i class="fa fa-folder"></i>
                                                    View</button>
                                                <a href="{{ route('admin.categories.edit', $item) }}"
                                                    class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                                <button wire:click="$emit('modalDelete', {{ $item->id }})"
                                                    class="btn btn-white btn-sm" data-toggle="modal"
                                                    data-target="#myModalDelete"><i class="fa fa-trash"></i>
                                                    Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="text-center">
                                        <td colspan="4">Data Empty</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@section('modal')
<livewire:admin.categories.modal-info />
<livewire:admin.categories.modal-delete />
@endsection
