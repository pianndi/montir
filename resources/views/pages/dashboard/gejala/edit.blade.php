<x-dashboard-layout title="Edit Detail Gejala">
    <x-header title="Edit Detail Gejala">
        <a href="/dashboard/gejala" class="btn btn-secondary">Kembali</a>
    </x-header>
    @if (!$gejala)
        <h4>Gejala tidak ditemukan</h4>
    @else
        <div class="card">
            <div class="card-header">
                <form action="/dashboard/gejala/{{ $gejala->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="input-group mb-3">

                        <input type="text" name="name" required
                            class="form-control @error('name') is-invalid @enderror" value="{{ $gejala->name }}"
                            placeholder="Ubah nama gejala">
                        <button class="btn btn-primary" type="submit">Ubah</button>
                    </div>
                    <div class="invalid-feedback">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </form>
            </div>
            <div class="card-body">
                @foreach ($gejala->gejalaArea as $item)
                    <div class="card mb-2">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <div class="d-flex gap-2">

                                <a href="/dashboard/area/{{ $item->id }}/edit"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="/dashboard/kerusakan/{{ $item->pivot->id }}" method="post"
                                    class="delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                <h5 class="card-title"></h5>Total Area: {{ $gejala->gejalaArea()->count() }}</h5>
            </div>
        </div>
    @endif
</x-dashboard-layout>
