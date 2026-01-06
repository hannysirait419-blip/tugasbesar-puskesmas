<form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="judul_kegiatan" placeholder="Judul" required>

    <textarea name="deskripsi"></textarea>

    <input type="file" name="fotos[]" multiple required>

    <button type="submit">Simpan</button>
</form>
