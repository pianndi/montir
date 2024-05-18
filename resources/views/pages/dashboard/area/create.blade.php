<x-dashboard-layout title="Tambah Area Kerusakan">
    <x-header title="Tambah Area">
        <x-back></x-back>
    </x-header>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Tambah Area Kerusakan</h2>
        </div>
        <form class="card-body" action="/dashboard/area/create" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="form-label">Nama Area</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ old('name') }}" placeholder="Masukkan nama area kerusakan" required>
                <div class="invalid-feedback">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="description" class="form-label">Deskripsi (opsional)</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                    name="description" value="{{ old('description') }}" placeholder="Masukkan deskripsi area kerusakan">
                <div class="invalid-feedback">
                    @error('description')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="step" class="form-label">Langkah-langkah</label>
                <div class="">
                    @if (old('step'))
                        @foreach (old('step') as $index => $step)
                            <div class="input-group mb-1 steps">
                                <span class="input-group-text">{{ $index + 1 }}.</span>
                                <input type="text" class="form-control" name="step[{{ $index }}]"
                                    value="{{ $step }}" placeholder="Langkah pengecekan {{ $index + 1 }}">
                            </div>
                        @endforeach
                    @else
                        <div class="input-group mb-1 steps">
                            <span class="input-group-text">1.</span>
                            <input type="text" class="form-control " name="step[0]" value=""
                                placeholder="Langkah pengecekan 1">
                        </div>
                    @endif
                    <button type="button" onclick="tambahLangkah()" class=" btn btn-secondary" id="addButton">Tambah
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
                <input type="text" class="form-control @error('video_url') is-invalid @enderror" id="video_url"
                    name="video_url" value="{{ old('video_url') }}" placeholder="https://youtu.be.com/contoh" required>
                <div class="invalid-feedback">
                    @error('video_url')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
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
            input.name = 'step[' + (index) + ']'
            addButton.before(newStep);
        }
    </script>
</x-dashboard-layout>
