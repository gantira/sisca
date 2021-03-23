<div class="modal inmodal" id="myModalInfo" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    @isset($category)
        <div class="modal-dialog">
            <div class="modal-content animated bounceIn">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                    <i class="fa fa-folder-open-o modal-icon"></i>
                    <h4 class="modal-title">{{ $category->name }}</h4>
                    <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                </div>
                <div class="modal-body">
                    <p>{{ $category }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    @endisset

</div>