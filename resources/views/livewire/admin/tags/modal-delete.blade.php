<div class="modal inmodal" id="myModalDelete" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    @isset($tag)
    <form wire:submit.prevent="delete">
        <div class="modal-dialog">
            <div class="modal-content animated">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                    <i class="fa fa-trash-o modal-icon"></i>
                    <h4 class="modal-title">Are you sure?</h4>
                    <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                </div>
                <div class="modal-body">
                    {{--  <p>{{ $tag }}</p>  --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">No</button>
                    <x-admin-submit-button>Yes</x-admin-submit-button>
                </div>
            </div>
        </div>
        </form>
    @endisset

</div>
