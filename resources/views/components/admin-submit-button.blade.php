<button wire:loading.remove type="submit" class="btn btn-primary btn-sm">
    {{ $slot }}
</button>

<button wire:loading class="btn btn-primary btn-sm" type="button" disabled>
    <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
    Loading...
</button>
