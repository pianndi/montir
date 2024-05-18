<nav class="navbar bg-primary text-white" data-bs-theme="dark">
    <div class="container-fluid d-flex justify-content-between navbar-expand-sm">

        <a href="#" class="navbar-brand fw-bold text-white">{{ config('app.name') }}</a>
        <div class="navbar-nav d-flex gap-3 flex-row">

            <div class="nav-item">
                <a href="/" class="nav-link @if (request()->is('/')) active @endif">Home</a>
            </div>
            @auth
                <div class="nav-item">
                    <a href="/dashboard" class="nav-link @if (request()->is('dashboard')) active @endif">Dashboard</a>
                </div>
                <div class="nav-item">
                    <a href="/dashboard/gejala" class="nav-link @if (request()->is('dashboard/gejala')) active @endif">Gejala</a>
                </div>
                <div class="nav-item">
                    <a href="/dashboard/area" class="nav-link @if (request()->is('dashboard/area')) active @endif">Area</a>
                </div>
                <div class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        <button type='submit' href="/dashboard/area" class="nav-link">Logout</button>
                    </form>
                </div>
            @else
                <div class="nav-item">
                    <a href="/login" class="nav-link @if (request()->is('login')) active @endif">Login</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
