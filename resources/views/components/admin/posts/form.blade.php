<div class="form-group"><label class="">Title</label>
    <input type="text" class="form-control @error('post.title') is-invalid @enderror" wire:model.defer="post.title">
    @error('post.title')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="form-group" wire:ignore>
    <label for="description">Body</label>
    <textarea class="form-control" id="description" name="description" cols="30" rows="10" wire:model.defer="post.body"
        x-data x-init="
        CKEDITOR.replace('description',{
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        });

        CKEDITOR.instances['description'].on('change', function(e){
            $dispatch('input', e.editor.getData())
        });

    "></textarea>
    @error('post.body')
    <div class="text-danger">
        <small>{{ $message }}</small>
    </div>
    @enderror
</div>



<div class="form-group row"><label class="col-sm-2 col-form-label">Category</label>
    <div class="col-sm-10">
        <div wire:ignore>
            <select id="category_id" multiple
                class="chosen-select-single form-control @error('category_id') is-invalid @enderror" tabindex="2">
                @foreach ($categories as $item)
                <option @if ($this->category_id && $this->category_id == $item->id) selected @endif
                    value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        @error('category_id')
        <div class="text-danger">
            <small>{{ $message }}</small>
        </div>
        @enderror
    </div>

</div>

<div class="form-group row"><label class="col-sm-2 col-form-label">Tag</label>
    <div class="col-sm-10">
        <div wire:ignore>
            <select id="tag_id" multiple
                class="chosen-select-multiple form-control @error('tag_id') is-invalid @enderror" tabindex="2">
                @foreach ($tags as $item)
                <option @if ($this->tag_id && in_array($item->id, $this->tag_id))
                    selected
                    @endif value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        @error('tag_id')
        <div class="text-danger">
            <small>{{ $message }}</small>
        </div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Status <br /><small class="text-navy"></small></label>

    <div class="col-sm-10">
        <div wire:ignore>
            @foreach ($statuses as $item)
            <div class="i-checks text-capitalize"><label>
                    <input @if (request()->routeIs('admin.posts.edit') && $this->post['status_id'] == $item->id)
                    checked
                    @endif @if ($item->name == 'private') disabled @endif type="radio" value="{{ $item->id }}" name="status_id"> {{ $item->name}}</div>
            @endforeach
        </div>
        @error('post.status_id')
        <div class="text-danger">
            <small>{{ $message }}</small>
        </div>
        @enderror
    </div>

</div>

<div class="hr-line-dashed"></div>
<div class="form-group row">
    {{-- <label class="col-sm-2 col-form-label"></label> --}}
    <div class="col-sm-10">
        <a href="{{ route($backUrl) }}" class="btn btn-white btn-sm">Cancel</a>
        <x-admin-submit-button>{{ $button }}</x-admin-submit-button>
    </div>
</div>

@push('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<link href="{{ asset('vendor/css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}"
    rel="stylesheet">
<link href="{{ asset('vendor/css/plugins/iCheck/custom.css') }}" rel="stylesheet">
@endpush

@push('js')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<!-- Select2 -->
<script src="{{ asset('vendor/js/plugins/chosen/chosen.jquery.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('vendor/js/plugins/iCheck/icheck.min.js') }}"></script>

<script>
    $(document).ready(function() {

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            $('input').on('ifChecked', function (event) {
                var value = $("input[type=radio][name=status_id]:checked").val();
                @this.set('post.status_id', value);
            });

            $('.chosen-select-single').chosen({
                max_selected_options: 1,
                placeholder_text_multiple: 'Choose a Category'
            });
            $('.chosen-select-multiple').chosen({
                placeholder_text_multiple: 'Choose a Tag'
            });

            $('#category_id').on('change', function(e) {
                var value = $('#category_id').chosen().val();
                @this.set('category_id', value);
            });

            $('#tag_id').on('change', function(e) {
                var value = $('#tag_id').chosen().val();
                @this.set('tag_id', value);
            });


        });



</script>
@endpush
