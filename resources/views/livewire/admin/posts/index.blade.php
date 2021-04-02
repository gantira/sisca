<div>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Post</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Post</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">


        <div class="row">
            <div class="col-lg-12">
                <x-alert />
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>All post</h5>
                        <div class="ibox-tools">
                            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-xs">Create new
                                post</a>
                        </div>
                    </div>

                    <div class="project-list">
                        <div class="ibox-content " wire:loading.class="sk-loading">
                            <div class="row m-b-sm m-t-sm">
                                <div class="col-md-1">
                                    <div data-toggle="buttons" class="btn-group btn-group-toggle" wire:ignore>
                                        <label title="ascending" class="btn btn-sm btn-white active"
                                            wire:click="$set('sort', 'asc')">
                                            <input name="sort" type="radio" id="option1" /><i
                                                class="fa fa-sort-amount-asc" aria-hidden="true"></i> </label>
                                        <label title="descending" class="btn btn-sm btn-white"
                                            wire:click="$set('sort', 'desc')"> <input name="sort" type="radio"
                                                id="option2" /><i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="input-group"><input wire:model.lazy="search" type="text"
                                            placeholder="Search" class="form-control-sm form-control"> <span
                                            class="input-group-btn">
                                            <button type="button" class="btn btn-sm btn-primary"
                                                wire:click="$set('search', $search)"> Go!</button> </span>
                                    </div>
                                </div>
                            </div>

                            <x-admin-table-loading-spinner />
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th class="text-right">Author</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($posts as $key => $item)
                                    <tr>
                                        <td class="project-status">
                                            <x-label :status="$item->status->name"> {{ $item->status->name }}</x-label>
                                        </td>
                                        <td class="project-status">
                                            @if ($item->categories()->first())
                                            <x-label :status="$item->categories()->first()->name">
                                                {{ $item->categories()->first()->name }}</x-label>
                                            @endif
                                        </td>
                                        <td class="project-title">
                                            <a data-toggle="modal" data-target="#myModalInfo"
                                                wire:click="$emit('modalInfo', {{ $item->id }})">{{ $item->title}}</a>
                                            <br />
                                            <small>Created {{ $item->created_at->format('d.m.Y') }}</small>
                                        </td>
                                        <td class="project-people text-right">
                                            <a href=""><img alt="image" class="rounded-circle"
                                                    title="{{ $item->user->name }}"
                                                    src="https://ui-avatars.com/api/?background=random&name={{ $item->user->name}}"></a>
                                        </td>
                                        <td class="project-actions">
                                            <button wire:click="$emit('modalInfo', {{ $item->id }})"
                                                class="btn btn-white btn-sm" data-toggle="modal"
                                                data-target="#myModalInfo"><i class="fa fa-folder"></i>
                                                View</button>
                                            <a href="{{ route('admin.posts.edit', $item) }}"
                                                class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                            <button wire:click="$emit('modalDelete', {{ $item->id }})"
                                                class="btn btn-white btn-sm" data-toggle="modal"
                                                data-target="#myModalDelete"><i class="fa fa-trash"></i>
                                                Delete</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="text-center">
                                        <td colspan="6">Data Empty</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@section('modal')
<livewire:admin.posts.modal-info />
<livewire:admin.posts.modal-delete />
@endsection
