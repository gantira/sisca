<div class="modal inmodal" id="myModal4" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore>
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <i class="fa fa-clock-o modal-icon"></i>
                <h4 class="modal-title">Modal title</h4>
                <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
            </div>
            <div class="modal-body">
                {{ is_null($tag) }}
                @if ($tag)
                <p>
                    Tag : {{ $tag['name'] }}
                </p>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
