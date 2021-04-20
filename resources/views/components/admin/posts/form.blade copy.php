<div class="form-group row"><label class="col-sm-2 col-form-label">Title</label>
    <div class="col-sm-10">
        <input type="text" class="form-control @error('post.title') is-invalid @enderror" wire:model.defer="post.title">
        @error('post.title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="form-group row"><label class="col-sm-2 col-form-label">Body</label>
    <div class="col-sm-10">
        <div wire:ignore>
            <textarea class="summernote">{!! $this->post->body ?? '' !!}</textarea>
        </div>
        @error('post.body')
        <div class="text-danger">
            <small>{{ $message }}</small>
        </div>
        @enderror
    </div>
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
                    @endif type="radio" value="{{ $item->id }}" name="status_id"> {{ $item->name}}</div>
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
<!-- SUMMERNOTE -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

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

            // Define function to open filemanager window
            var lfm = function(options, cb) {
                var route_prefix = (options && options.prefix) ? options.prefix :
                    "{{ url('laravel-filemanager') }}";
                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager',
                    'width=1024,height=600,location=no');
                window.SetUrl = cb;
            };

            // Define LFM summernote button
            var LFMButton = function(context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="note-icon-picture"></i> ',
                    tooltip: 'Image',
                    click: function() {
                        lfm({
                            type: 'image',
                            prefix: "{{ url('laravel-filemanager') }}"
                        }, function(lfmItems, path) {
                            lfmItems.forEach(function(lfmItem) {
                                context.invoke('insertImage', lfmItem.url);
                            });
                        });
                    }
                });
                return button.render();
            };

            // Initialize summernote with LFM button in the popover button group
            // Please note that you can add this button to any other button group you'd like
            $('.summernote').summernote({
                placeholder: 'Write here...',
                height: 150,
                tabsize: 2,
                disableDragAndDrop:true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'lfm', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],

                buttons: {
                    lfm: LFMButton
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('post.body', contents);
                    }
                }
            })

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
