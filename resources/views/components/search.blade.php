<form class="input-group mb-2">
    <input type="search" name="cari" class="form-control"
        placeholder="{{ $placeholder ?? 'Cari berdasarkan nama atau deskripsi' }}"
        value="{{ request()->get('cari', '') }}">
    <button type="submit" class="btn btn-secondary">Cari</button>
</form>
