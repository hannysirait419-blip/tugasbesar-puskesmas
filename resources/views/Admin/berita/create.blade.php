<form action="{{ route('admin.berita.store') }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf

    <input type="text" name="judul" placeholder="Judul Berita" required>

    <textarea name="konten" rows="6" placeholder="Isi berita" required></textarea>

    <input type="file" name="gambar">

    <button type="submit">Simpan</button>
</form>
