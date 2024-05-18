<x-app-layout>
    <x-header title="Pilih gejala yang anda alami"
        description='Pilih gejala yang sesuai pada kerusakan mobil.'></x-header>
    <form action="/periksa" method="get" id="myform">
        <input type="hidden" name="g">
        @foreach ($gejala as $key => $g)
            <label class="card mb-2 pointer">
                <div class="card-body d-flex justify-content-between">
                    <h5 class="card-title">{{ $key + 1 }}. {{ $g->name }}</h5>
                    <input type="checkbox" class="form-check" value="{{ $g->id }}">
                </div>
            </label>
        @endforeach
        <button type="submit" class="btn btn-primary font-weight-bold w-100">Periksa Area Kerusakan</button>
    </form>
    <script>
        document.querySelectorAll('[type="checkbox"]').forEach((el) => {
            el.addEventListener('change', (e) => {
                const gejala = document.querySelectorAll('[type="checkbox"]:checked')
                const gejalaValue = Array.from(gejala).map((el) => el.value)
                const input = document.querySelector('input[name="g"]')
                input.value = gejalaValue.join('-')
            })
        })
        document.getElementById('myform').addEventListener('submit', function(e) {
            e.preventDefault();
            localStorage.removeItem('status_area_kerusakan');
            e.target.submit()
        });
    </script>
</x-app-layout>
