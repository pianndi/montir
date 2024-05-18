<x-app-layout title="Kesimpulan kerusakan dari area yang telah diperiksa">
    <x-header title="Kesimpulan">
        <x-back></x-back>
    </x-header>
    @if (!count($area_list))
        <h4>Tidak ada kerusakan yang ditemukan pada gejala berikut</h4>
    @else
        <h4>Kerusakan yang dialami dengan gejala berikut</h4>
    @endif
    <ol>
        @foreach ($gejala as $item)
            <li>{{ $item['name'] }}</li>
            <ul>
                @foreach ($item['gejala_area'] as $item)
                    @foreach ($area_list as $id)
                        @if ($item['id'] == $id)
                            <li class="text-danger">
                                <a href="/periksa/{{ $id }}" class="text-danger">
                                    {{ $item['name'] }}</a>
                            </li>
                        @endif
                    @endforeach
                @endforeach
            </ul>
        @endforeach
    </ol>
    <h4>Area berikut mengalami kerusakan</h4>
    <ol>
        @foreach ($area as $item)
            <li><a href="/periksa/{{ $item['id'] }}" class="text-danger">{{ $item['name'] }}</a></li>
        @endforeach
    </ol>
</x-app-layout>
