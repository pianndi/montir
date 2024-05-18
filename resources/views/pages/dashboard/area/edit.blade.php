<x-dashboard-layout title="Edit Area Kerusakan">
    <x-header title="Edit Area">
        <a href="/dashboard/area" class="btn btn-secondary">Kembali</a>
    </x-header>
    @if (!$area)
        <h4>Area tidak ditemukan</h4>
    @else
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Edit Area Kerusakan</h2>
            </div>
            <form class="card-body" action="/dashboard/area/{{ $area->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Nama Area</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $area->name) }}" placeholder="Masukkan nama area kerusakan"
                        required>
                    <div class="invalid-feedback">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="description" class="form-label">Deskripsi (opsional)</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                        id="description" name="description" value="{{ old('description', $area->description) }}"
                        placeholder="Masukkan deskripsi area kerusakan">
                    <div class="invalid-feedback">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="step" class="form-label">Langkah-langkah (kosongkan untuk menghapus)</label>
                    <div class="">
                        @if (old('step'))
                            @foreach (old('step') as $index => $step)
                                @if (isset($step['id']))
                                    <input type="hidden" name="step[{{ $index }}][id]"
                                        value="{{ $step['id'] }}">
                                @endif
                                <div class="input-group">
                                    <span class="input-group-text">{{ $index + 1 }}.</span>
                                    <input type="text" class="form-control" name="step[{{ $index }}][name]"
                                        value="{{ $step['name'] }}"
                                        placeholder="Langkah pengecekan {{ $index + 1 }}">
                                </div>
                            @endforeach
                        @else
                            @forelse ($area->langkah as $index => $step)
                                <input type="hidden" name="step[{{ $index }}][id]"
                                    value="{{ $step->id }}">
                                <div class="input-group mb-1 steps">
                                    <span class="input-group-text">{{ $index + 1 }}.</span>
                                    <input type="text" class="form-control" name="step[{{ $index }}][name]"
                                        value="{{ $step->name }}"
                                        placeholder="Langkah pengecekan {{ $index + 1 }}">
                                </div>
                            @empty
                                <div class="input-group mb-1 steps">
                                    <span class="input-group-text">1.</span>
                                    <input type="text" class="form-control " name="step[0][name]" value=""
                                        placeholder="Langkah pengecekan 1">
                                </div>
                            @endforelse

                        @endif
                        <button type="button" onclick="tambahLangkah()" class=" btn btn-secondary"
                            id="addButton">Tambah
                            langkah</button>
                    </div>
                    <div class="invalid-feedback">
                        @error('step')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="video_url" class="form-label">Link video</label>
                    <iframe src="{{ $area->video_embed_url }}" frameborder="0" class="mb-2 d-block"></iframe>
                    <input type="text" class="form-control @error('video_url') is-invalid @enderror" id="video_url"
                        name="video_url" value="{{ old('video_url', $area->video_url) }}"
                        placeholder="https://youtu.be.com/contoh" required>
                    <div class="invalid-feedback">
                        @error('video_url')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan perubahan</button>
            </form>
        </div>
    @endif
    <script>
        function tambahLangkah() {
            const steps = document.querySelectorAll('.steps');
            const index = steps.length;
            const step = document.querySelector('.steps');
            const newStep = step.cloneNode(true);
            const input = newStep.querySelector('input');
            newStep.querySelector('span').textContent = index + 1 + '.';
            input.value = '';
            input.placeholder = "Langkah pengecekan " + (index + 1)
            input.name = 'step[' + (index) + '][name]'
            addButton.before(newStep);
        }
    </script>
</x-dashboard-layout>
