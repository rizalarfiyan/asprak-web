# 🚀 Jawaban! 🚀

---

Psst, jangan lupa ya, kamu perlu **mengubah kredensial *database*** di file `src\Config\Database.php` biar koneksinya jalan!

### 1. Aset tidak mau terbaca!

Buka *file* `src\Views\_layout\header.php`. Kamu tinggal ubah di **baris 40, 41, dan 42** dari yang tadinya begini:

```php
<script src="/tailwindcss.min.js"></script>
<script src="/htmx.min.js"></script>
<script src="/_hyperscript.min.js"></script>
```

Menjadi seperti ini:

```php
<script src="./assets/js/tailwindcss.min.js"></script>
<script src="./assets/js/htmx.min.js"></script>
<script src="./assets/js/_hyperscript.min.js"></script>
```

### 2. Belum bisa login

Coba deh buka *file* `dump.sql` (itu yang buat *database*). Di sana ada *email* dan *password* *default* yang masih dalam bentuk biasa (belum dienkripsi). Contohnya seperti ini:

```sql
INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Administrator', 'admin@admin.com', 'password', '2025-07-07 04:30:18');
```

### 3. Password belum terenkripsi

Untuk urusan *password* yang lebih aman, kamu bisa pakai fungsi `password_hash()`. Cara gampangnya, bikin aja *file* PHP baru, misalnya `generator.php`, lalu isi dengan kode ini:

```php
<?php
echo password_hash('password', PASSWORD_BCRYPT); // ganti 'password' dengan password yang kamu inginkan
```

Nah, kalau *file* `generator.php` itu kamu buka di *browser*, nanti bakal muncul *string* panjang hasil enkripsi *password*mu. Salin deh kode *hash* itu, terus *update* *password* *user* 'Admin' di tabel `users`. Kamu bisa pakai *query* SQL kayak contoh di bawah:

```sql
UPDATE `users` SET `password` = '$2y$10$szhGqQqbe5jgHD9wQAGBzeSUD0Xy6g8QloZXYe0cf4WhXVk07AxDu' WHERE `users`.`id` = 1;
```

*User* tersebut sekarang *password*-nya sudah dienkripsi, aman! Langkah selanjutnya, kamu perlu sedikit mengubah *file* `src\Controllers\AuthController.php` di **baris 42**. Dari kode sebelumnya:

```php
$user = $this->model('Users')->getByEmail($email);
if (!$user || $password != $user['password']) {
    $this->errorMessage('Invalid email or password.', true);
    return;
}
```

Jadi seperti ini nih:

```php
$user = $this->model('Users')->getByEmail($email);
if (!$user || !password_verify($password, $user['password'])) {
    $this->errorMessage('Invalid email or password.', true);
    return;
}
```

### 4. Menambahkan user baru

Untuk nambahin *user* baru, kamu bisa langsung pakai *query* SQL `INSERT` seperti ini:

```sql
INSERT INTO `users` (`name`, `email`, `password`) VALUES
('Muhamad Rizal Arfiyan', 'rizal.arfiyan.23@gmail.com', '$2y$10$mUS9Gh7xA8sxAC3.qt4IzOupgjWWlV5g2BoC344DYDFJgbL458dGW');
```

*Hash password* di atas itu adalah hasil enkripsi dari `rizal`. Kamu bisa pakai cara yang sudah dijelaskan di poin 3 untuk membuat *hash password* yang lain ya!

### 5. Tambahkan nim dan nama di footer

Gampang banget! Kamu tinggal buka *file* `src\Views\_layout\footer.php` di **baris 3**. Ubah deh di situ dengan nama lengkap dan NIM kamu!

### 6. Tambahkan data hobi sesuai nim

Di *file* `src\Controllers\StudentController.php` **baris 51**, kamu bakal nemuin komentar `TODO`. Nah, itu dia tempatnya kamu mengisi *array* hobi sesuai dengan ketentuan NIM kamu. Awalnya seperti ini:

```php
return [
    // hidden code
    'hobbies' => [], // TODO: add hobbies options
];
```

Nah, kamu bisa ubah menjadi contoh berikut (sesuaikan dengan kriteria NIM kamu ya!):

```php
return [
    // hidden code
    'hobbies' => [
        [
            'name' => 'Reading',
            'value' => 'Reading',
        ],
        [
            'name' => 'Sport',
            'value' => 'Sport',
        ],
        [
            'name' => 'Gaming',
            'value' => 'Gaming',
        ],
        [
            'name' => 'Cooking',
            'value' => 'Cooking',
        ],
        [
            'name' => 'Gardening',
            'value' => 'Gardening',
        ],
    ],
];
```

### 7. Fungsi edit belum terisi dengan benar

Kamu perlu mengubah di *file* `src\Views\student\update.php` pada **baris 27 dan 68**.

Kode sebelumnya di **baris 27**:

```php
<input id="<?= $id ?>" type="radio" name="gender" value="<?= $gender['value'] ?>" class="size-4">
```

Diubah menjadi:

```php
<input id="<?= $id ?>" type="radio" name="gender" value="<?= $gender['value'] ?>" class="size-4" <?= $student['gender'] === $gender['value'] ? 'checked' : '' ?>>
```

Kode sebelumnya di **baris 68**:

```php
<input id="<?= $id ?>>" type="checkbox" name="hobby[]" value="<?= $hobby['value'] ?>" class="w-4 h-4 rounded">
```

Diubah menjadi:

```php
<input id="<?= $id ?>>" type="checkbox" name="hobby[]" value="<?= $hobby['value'] ?>" class="w-4 h-4 rounded" <?= in_array($hobby['value'], $studentHobbies) ? 'checked' : '' ?>>
```

### 8. Fungsi hapus belum berjalan dengan baik

Kamu perlu mengubah di *file* `src\Models\Students.php` di **baris 67**. Dari yang sebelumnya:

```php
$this->db->query("DELETE FROM students WHERE id = :id");
```

Diubah jadi:

```php
$this->db->query("DELETE FROM students WHERE nim = :id");
```

### 9. Total mahasiswa pada study program tidak benar

Kamu perlu mengubah di *file* `src\Models\StudyPrograms.php` di **baris 22**. Dari yang awalnya begini:

```php
$query = "SELECT sp.id, sp.name, 0 as total FROM study_programs sp";
```

Kamu bisa pilih salah satu dari alternatif *query* berikut ini (ketiganya berfungsi untuk hasil yang sama, tinggal pilih mana yang paling kamu pahami atau sukai):

- **Menggunakan CTE (Common Table Expression):**
```php
$query = "WITH students AS (
    SELECT count(nim) as total, study_program_id as id FROM students GROUP BY study_program_id
)
SELECT sp.id, sp.name, coalesce(s.total, 0) as total
FROM study_programs sp
LEFT JOIN students s USING (id)";
```

- **Menggunakan Sub-query:**
```php
$query = "SELECT
    sp.id,
    sp.name,
    COALESCE((SELECT COUNT(s.nim) FROM students s WHERE s.study_program_id = sp.id), 0) AS total
FROM study_programs sp";
```

- **Menggunakan `LEFT JOIN`:**
```php
$query = "SELECT
    sp.id,
    sp.name,
    COALESCE(COUNT(s.nim), 0) AS total
FROM study_programs sp
LEFT JOIN students s ON sp.id = s.study_program_id
GROUP BY sp.id, sp.name";
```

### 🎉 Selamat! 🎉

Yey! Kamu sudah berhasil menyelesaikan semua tugas yang diberikan. Keren banget! Ini menunjukkan kalau kamu punya kemampuan yang solid dalam debugging dan pengembangan web. Terus asah skill kamu ya, karena dunia programming itu dinamis banget. Semoga semua ilmu yang kamu dapatkan bisa bermanfaat di kemudian hari. Sampai jumpa di lain kesempatan!