@props(['button', 'backUrl'])

<div class="form-group row"><label class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control @error('team.name') is-invalid @enderror" wire:model.defer="team.name">
        @error('team.name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
<div class="hr-line-dashed"></div>
<div class="form-group row">
    {{--  <label class="col-sm-2 col-form-label"></label>  --}}
    <div class="col-sm-10">
        <a href="{{ route($backUrl) }}" class="btn btn-white btn-sm">Cancel</a>
        <x-admin-submit-button>{{ $button }}</x-admin-submit-button>
    </div>
</div>
