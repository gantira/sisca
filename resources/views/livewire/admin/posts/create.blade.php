<div>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Create a Post</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.posts.index') }}">Post</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-content">
                        <form wire:submit.prevent="save">
                            <x-admin.posts.form :statuses="$statuses" :categories="$categories" :tags="$tags" backUrl="admin.posts.index" button="Save" />
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

