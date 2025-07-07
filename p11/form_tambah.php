<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Tambah Mahasiswa</h1>
        <form method="POST" action="aksi_simpan.php">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="d-flex flex-wrap gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="Laki-laki" required>
                        <label class="form-check-label" for="laki_laki">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" required>
                        <label class="form-check-label" for="perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-select" id="jurusan" name="jurusan">
                <option value="Informatika">Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                </select>               
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Hobi</label>
                <div class="d-flex flex-wrap gap-3">
                    <div class="form-check">
                        <input class="form-check-input" name="hobi[]" type="checkbox" value="coding" id="coding">
                        <label class="form-check-label" for="coding">
                            Coding
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="hobi[]" type="checkbox" value="membaca" id="membaca">
                        <label class="form-check-label" for="membaca">
                            Membaca
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="hobi[]" type="checkbox" value="olahraga" id="olahraga">
                        <label class="form-check-label" for="olahraga">
                            Olahraga
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="hobi[]" type="checkbox" value="musik" id="musik">
                        <label class="form-check-label" for="musik">
                            Musik
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="hobi[]" type="checkbox" value="fotografi" id="fotografi">
                        <label class="form-check-label" for="fotografi">
                            Fotografi
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
