<x-dashboard-layout title="Kelola Gejala Kerusakan">


    <form method="POST" class="mb-3">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                placeholder="Tambahkan nama gejala baru" required>
            <button class="btn btn-primary" type="submit" id="button-addon2">Tambah</button>
        </div>
        <div class="invalid-feedback">
            @error('name')
                {{ $message }}
            @enderror
        </div>
    </form>
    <x-header title="Daftar Gejala Kerusakan">
    </x-header>
    <x-search placeholder="Cari berdasarkan nama"></x-search>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Gejala</th>
                <th>Total Area</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($gejala as $no => $g)
                <tr>
                    <td>{{ ($gejala->currentPage() - 1) * $gejala->perPage() + $no + 1 }}</td>
                    <td>
                        <a href="/periksa?g={{ $g->id }}">{{ $g->name }}</a>
                    </td>
                    <td>{{ $g->gejala_area_count }}</td>
                    <td>
                        <div class="d-flex gap-2 ">

                            <a href=
                            "/dashboard/gejala/{{ $g->id }}/edit"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="/dashboard/gejala/{{ $g->id }}" method="post" class="delete">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Data tidak ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $gejala->withQueryString()->links() }}
</x-dashboard-layout>
