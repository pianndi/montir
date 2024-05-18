<x-dashboard-layout title="Dashboard">
    <h2>Selamat Datang {{ request()->user()->name }}</h2>
    <div class="d-flex gap-4 mt-4">
        <a class="card w-100 text-center bg-danger-subtle text-decoration-none" href="/dashboard/gejala">
            <div class="card-header">
                <h5 class="card-title">Data Gejala</h5>
            </div>
            <div class="card-body text-decoration-underline">
                <h6>{{ $total_gejala }}</h6>
            </div>
        </a>
        <a class="card w-100 text-center bg-success-subtle text-decoration-none" href="/dashboard/area">
            <div class="card-header">
                <h5 class="card-title">Data Area</h5>
            </div>
            <div class="card-body text-decoration-underline">
                <h6>{{ $total_area }}</h6>
            </div>
        </a>
    </div>
</x-dashboard-layout>
