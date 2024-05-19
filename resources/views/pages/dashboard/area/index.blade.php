<x-dashboard-layout title="Kelola Area Kerusakan">
    <x-header title="Daftar Area Kerusakan">
        <a href="/dashboard/area/create" class="btn btn-primary">Tambah</a>
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
                        <div class="d-flex gap-2">

                            <a href="/dashboard/area/{{ $g->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/dashboard/area/{{ $g->id }}" method="post" class="delete">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                            </form>
                        </div>
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
