<div class="py-2">
    <div class="d-flex justify-content-between align-items-center">

        <h1>{{ $title }}</h1>
        {{ $slot }}
    </div>
    <p>{{ $description ?? '' }}</p>
</div>
