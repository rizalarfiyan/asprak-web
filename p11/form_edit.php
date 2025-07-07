<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Edit Mahasiswa</h1>
        <?php
        // Koneksi ke database
        include "koneksi.php";
        // Mendapatkan data mahasiswa berdasarkan ID
        $id = $_GET['id'];
        $sql = "SELECT * FROM mahasiswa WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        $data = mysqli_fetch_assoc($result);
        $hobies = $data['hobi'] === '' ? [] : explode(',', $data['hobi']);
        ?>
        <form method="POST" action="aksi_edit.php">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $data['nim']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $data['no_hp']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div class="d-flex flex-wrap gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="Laki-laki" required <?php if ($data['jenis_kelamin'] === 'Laki-laki') echo 'checked'; ?>>
                        <label class="form-check-label" for="laki_laki">
                            Laki-laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" required <?php if ($data['jenis_kelamin'] === 'Perempuan') echo 'checked'; ?>>
                        <label class="form-check-label" for="perempuan">
                            Perempuan
                        </label>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-select" id="jenis_kelamin" name="jurusan" required>
                    <option value="Informatika" <?php if ($data['jurusan'] === 'Informatika') echo 'selected'; ?>>Informatika</option>
                    <option value="Sistem Informasi" <?php if ($data['jurusan'] === 'Sistem Informasi') echo 'selected'; ?>>Sistem Informasi</option>
                </select> 
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?php echo $data['alamat']; ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Hobi</label>
                <div class="d-flex flex-wrap gap-3">
                    <div class="form-check">
                        <input class="form-check-input" name="hobi[]" type="checkbox" value="coding" id="coding" <?= in_array("coding", $hobies) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="coding">
                            Coding
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="hobi[]" type="checkbox" value="membaca" id="membaca" <?= in_array("membaca", $hobies) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="membaca">
                            Membaca
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="hobi[]" type="checkbox" value="olahraga" id="olahraga" <?= in_array("olahraga", $hobies) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="olahraga">
                            Olahraga
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="hobi[]" type="checkbox" value="musik" id="musik" <?= in_array("musik", $hobies) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="musik">
                            Musik
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="hobi[]" type="checkbox" value="fotografi" id="fotografi" <?= in_array("fotografi", $hobies) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="fotografi">
                            Fotografi
                        </label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="tampil_data.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
