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
                <div data-toggle="buttons" class="btn-group btn-group-toggle">
                    <label class="btn btn-sm btn-white"> <input type="radio" id="option1" name="options"> Day </label>
                    <label class="btn btn-sm btn-white active"> <input type="radio" id="option2" name="options"> Week
                    </label>
                    <label class="btn btn-sm btn-white"> <input type="radio" id="option3" name="options"> Month </label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group mb-3">
                    <input type="text" wire:model="search" class="form-control form-control-sm" placeholder="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" type="button">Go!</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-content">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tags as $key => $item)
                                <tr>
                                    <td>{{ $tags->firstItem() + $key }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>Edit | Delete</td>
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
    </div>
</div>
