<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-success d-block']) }}>
    {{ $slot }}
</button>
