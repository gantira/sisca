<div>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Tag</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Tag</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-9 m-b-xs">
                <a href="{{ route('admin.tags.create') }}" class="btn btn-sm btn-primary">New</a>
                <div data-toggle="buttons" class="btn-group btn-group-toggle" wire:ignore>
                    <label class="btn btn-sm btn-white active" wire:click="$set('sort', 'asc')"> <input name="sort"
                            type="radio" id="option1" /> Asc </label>
                    <label class="btn btn-sm btn-white" wire:click="$set('sort', 'desc')"> <input name="sort"
                            type="radio" id="option2" /> Des </label>
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
                <div class="ibox ">
                    <div class="ibox-content " wire:loading.class="sk-loading">
                        <x-admin-table-loading-spinner />
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th class="text-right" data-sort-ignore="true">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tags as $key => $item)
                                <tr>
                                    <td>{{ $tags->firstItem() + $key }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button wire:click="$emit('modal', {{ $item }})" class="btn-white btn btn-xs" data-toggle="modal" data-target="#myModal4">View</button>
                                            <button class="btn-white btn btn-xs">Edit</button>
                                            <button class="btn-white btn btn-xs">Delete</button>
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
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
        </div>

        <livewire:admin.modal />
    </div>
</div>
