<x-app-layout>
    <div class="d-flex align-items-center flex-column">
        @error('login')
            <div class="alert alert-danger" style="width: 24rem">{{ $message }}</div>
        @enderror
        <form class="card" style="width: 24rem" method="POST">
            @csrf
            <div class="card-header bg-primary text-white text-center card">
                <h1>Halaman Login Admin</h1>
            </div>
            <div class="card-body">
                <div class="form-group mb-2">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username"
                        class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan username"
                        value="{{ old('username') }}">
                    <div class="invalid-feedback">
                        @error('username')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password">
                    <div class="invalid-feedback">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
