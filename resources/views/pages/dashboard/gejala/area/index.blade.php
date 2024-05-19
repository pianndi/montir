<x-dashboard-layout title="Kelola Area Kerusakan">
    <x-header title="Pilih Area Kerusakan">
        <a href="/dashboard/gejala/{{ request()->route()->parameter('id') }}/edit" class="btn btn-secondary">Kembali</a>
    </x-header>
    <x-search></x-search>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Area</th>
                <th>Langkah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($area as $no => $g)
                <tr>
                    <td>{{ ($area->currentPage() - 1) * $area->perPage() + $no + 1 }}</td>
                    <td><a href="/periksa/{{ $g->id }}">{{ $g->name }}</a></td>
                    <td>{{ $g->langkah_count }}</td>
                    <td>
                        <form method="post">
                            @csrf
                            <input type="hidden" name="area_id" value="{{ $g->id }}">
                            <button class="btn btn-primary">Tambah</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Data tidak ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $area->withQueryString()->links() }}
</x-dashboard-layout>
