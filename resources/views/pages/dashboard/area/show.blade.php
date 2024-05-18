<x-app-layout>
    <x-header title="Detail Area">
        <x-back></x-back>
    </x-header>
    @if (!$area)
        <h4>Area tidak ditemukan</h4>
    @else
        <div class="card mb-2" data-area-id="{{ $area['id'] }}">
            <div class="card-header">
                <h5>{{ $area['name'] }}</h5>
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <iframe loading='lazy' src="{{ $area['video_embed_url'] }}" frameborder="0"></iframe>
                    <a href="{{ $area['video_url'] }}" class="d-block">{{ $area['video_url'] }}</a>
                </div>
                <p>{{ $area['description'] }}</p>
                <ol>
                    @foreach ($area['langkah'] as $langkah)
                        <li> {{ $langkah['name'] }}</li>
                    @endforeach
                </ol>
                <button class="btn btn-success" onclick="markArea({{ $area['id'] }},true)"
                    type="button">Aman</button>
                <button class="btn btn-danger" onclick="markArea({{ $area['id'] }},false)"
                    type="button">Rusak</button>
            </div>
        </div>
    @endif
    <script>
        function markArea(area_id, safe) {
            let status_area_kerusakan = JSON.parse(localStorage.getItem('status_area_kerusakan')) || []
            status_area_kerusakan = status_area_kerusakan.filter((item) => item.area_id !== area_id)
            status_area_kerusakan.push({
                area_id,
                safe
            })
            localStorage.setItem('status_area_kerusakan', JSON.stringify(status_area_kerusakan))
            const areaElement = document.querySelectorAll(`[data-area-id="${area_id}"]`)
            areaElement.forEach((item) => {
                item.classList.remove('bg-danger', 'bg-success')
                item.classList.add('text-white', safe ? 'bg-success' : 'bg-danger')
            })

        }
    </script>
</x-app-layout>
