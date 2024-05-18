<x-app-layout title="Periksa Area Kerusakan berdasarkan gejala">
    <x-header title="Periksa Area Kerusakan">
        <button class="btn btn-warning" id="resetStatus">Reset
            Pemeriksaan</button>
    </x-header>
    <form action="kesimpulan" method="get">
        <input type="hidden" name="g" value="{{ implode('-', array_map(fn($g) => $g['id'], $gejala)) }}">
        @foreach ($gejala as $key => $g)
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">{{ $g['id'] }}. {{ $g['name'] }}</h3>
                </div>
                <div class="card-body">
                    @foreach ($g['gejala_area'] as $key => $area)
                        <div class="card mb-2" data-area-id="{{ $area['id'] }}">
                            <div class="card-header">
                                <h5>{{ $area['name'] }}</h5>
                            </div>
                            <div class="card-body">
                                <a href="{{ $area['video_url'] }}">{{ $area['video_url'] }}</a>
                                <p>{{ $area['description'] }}</p>
                                <ol>

                                    @foreach ($area['langkah'] as $langkah)
                                        <li> {{ $langkah['name'] }}</li>
                                    @endforeach
                                    </ul>
                                    <div class="mb-2">
                                        {{-- <iframe loading='lazy' src="{{ $area['video_embed_url'] }}"
                                        frameborder="0"></iframe> --}}
                                    </div>
                                    <button class="btn btn-success" onclick="markArea({{ $area['id'] }},true)"
                                        type="button">Aman</button>
                                    <button class="btn btn-danger" onclick="markArea({{ $area['id'] }},false)"
                                        type="button">Rusak</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
        <div id="gejala_list">
        </div>
        <button type="submit" class="btn btn-primary w-100" id="done">Lihat kesimpulan</button>
    </form>
    <script>
        document.getElementById('resetStatus').addEventListener('click', (e) => {
            e.preventDefault()
            Swal.fire({
                title: 'Reset Pemeriksaan',
                text: 'Apakah anda yakin ingin mereset pemeriksaan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    localStorage.removeItem('status_area_kerusakan')
                    loadData()
                }
            })
        })
        const data = @json($gejala);

        function loadData() {
            let html = ''
            let status_area_kerusakan = JSON.parse(localStorage.getItem('status_area_kerusakan')) || []
            document.querySelectorAll('[data-area-id]').forEach((item) => {
                item.classList.remove('bg-danger', 'bg-success', 'text-white')
            })
            status_area_kerusakan.forEach((status) => {
                const areas = document.querySelectorAll(`[data-area-id="${status.area_id}"]`)
                areas.forEach((item) => {
                    item.classList.remove('bg-danger', 'bg-success')
                    item.classList.add('text-white', status.safe ? 'bg-success' : 'bg-danger')
                })
            })
            // const marked = [...document.querySelectorAll('[data-area-id]')].filter((item) => !item.classList.contains(
            //     'text-white'))
            // document.getElementById('done').disabled = marked.length != 0
            html +=
                `<input type="hidden" name="k" value="${status_area_kerusakan.filter((item) => !item.safe).map(item=>item.area_id).join('-')}">`
            document.getElementById('gejala_list').innerHTML = html
        }
        loadData()

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
            loadData()

        }

        // function getArea(id) {
        //     const status_area_kerusakan = JSON.parse(localStorage.getItem('status_area_kerusakan')) || [];
        //     return status_area_kerusakan.find((item) => item.area_id === id)
        // }
    </script>
</x-app-layout>
