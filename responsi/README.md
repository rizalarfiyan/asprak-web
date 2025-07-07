# 🚀 Responsi: Benerin Bug Web Kampus! 🚀

---

## 📚 Daftar Isi

* [👋 Intro Dulu, Yuk!](#intro-dulu-yuk)
* [💻 Cara Menjalankan Programnya](#cara-menjalankan-programnya)
    * [Penting! Siapkan Database MySQL!](#-penting-siapkan-database-mysql)
    * [Menjalankan PHP Server (Pilih Salah Satu!)](#menjalankan-php-server-pilih-salah-satu)
* [📝 Soal Tes dan Tips dari Kami!](#-soal-tes-dan-tips-dari-kami)
    * [1. Aset tidak mau terbaca!](#1-aset-tidak-mau-terbaca)
    * [2. Belum bisa login](#2-belum-bisa-login)
    * [3. Password belum terenkripsi](#3-password-belum-terenkripsi)
    * [4. Menambahkan user baru](#4-menambahkan-user-baru)
    * [5. Tambahkan nim dan nama di footer](#5-tambahkan-nim-dan-nama-di-footer)
    * [6. Tambahkan data hobi sesuai nim](#6-tambahkan-data-hobi-sesuai-nim)
    * [7. Fungsi edit belum terisi dengan benar](#7-fungsi-edit-belum-terisi-dengan-benar)
    * [8. Fungsi hapus belum berjalan dengan baik](#8-fungsi-hapus-belum-berjalan-dengan-baik)
    * [9. Total mahasiswa pada study program tidak benar](#9-total-mahasiswa-pada-study-program-tidak-benar)
    * [10. Pastikan Semuanya Berjalan dengan Baik!](#10-pastikan-semuanya-berjalan-dengan-baik)
* [⏳ Estimasi Waktu Pengerjaan dan Bobot Nilai](#estimasi-waktu-pengerjaan-dan-bobot-nilai)
* [🎉 Penutup](#penutup)

---

## 👋 Intro Dulu, Yuk!

Halo calon **developer** kece! Selamat datang di tes yang seru ini. Anggap aja kamu sekarang adalah seorang karyawan baru di sebuah *startup* yang fokus banget sama dunia pendidikan. Nah, tugas pertama kamu adalah bantu benerin **bug** di web internal kampus yang dipakai buat pendataan mahasiswa.

Web ini dibangun pakai teknologi yang lagi hits banget: **PHP** buat *backend*-nya (pasti udah akrab dong?), **Tailwind CSS** buat tampilan yang cakep dan responsif, sama **HTMX** biar web-nya interaktif tanpa perlu *full reload* (ini nih yang bikin makin asik!).

Jangan khawatir kalau kamu ngerasa kesusahan, soal ini sebenarnya enggak susah-susah banget. Tes ini bisa ngelihat seberapa paham kamu mengaplikasikan materi-materi kuliah sebelumnya. Terus, kenapa kok dibikin beda dari biasanya? Ya, karena memang begitulah dunia kerja. Teknologi itu terus maju, jadi kamu harus sebisa mungkin untuk beradaptasi. Kamu bisa ngerjain soal ini dalam waktu **60 menit**, ya.

Jangan lupa ya, ilmu **OOP (Object-Oriented Programming)** yang udah kamu pelajari di kampus itu penting banget lho di sini. Pastikan kamu terapkan prinsip-prinsipnya biar kode kamu rapi dan gampang di-maintenance. Siap? Gas! 🔥

---

## 💻 Cara Menjalankan Programnya

Oke, setelah kamu siap dengan kodenya, gimana nih cara biar web-nya bisa jalan di komputermu?

### ⚠️ Penting! Siapkan Database MySQL!

Sebelum kamu mulai, kamu perlu **mengaktifkan Apache dan MySQL** di XAMPP-mu. Setelah itu, buka **PHPMyAdmin**, lalu **buat database baru**. Untuk databasenya, kamu tinggal **import file `dump.sql`** yang sudah tersedia di folder proyek ini. File ini berisi struktur tabel dan data awal yang dibutuhkan web-nya.

### Menjalankan PHP Server (Pilih Salah Satu!)

Ada dua cara untuk menjalankan server PHP, kamu bisa pilih yang paling nyaman buatmu:

#### Opsi 1: Pakai XAMPP (Menaruh di `htdocs`)

Kalau kamu mau pakai XAMPP, caranya standar aja kok:

1.  Pastikan **Apache** dan **MySQL** di XAMPP kamu sudah *running*.
2.  Bikin folder baru di dalam `htdocs` XAMPP kamu. Nama foldernya bebas, tapi biar gampang, bisa pakai **4 digit terakhir NIM** kamu. Contohnya, kalau NIM kamu `22.11.5227`, berarti kamu bikin folder `5227`.
3.  Salin semua *file* kode dari proyek ini ke folder yang baru kamu buat tadi (misalnya `C:\xampp\htdocs\5227`).
4.  Buka *browser* kamu dan ketik `http://localhost/5227/public` (ganti `5227` dengan nama folder kamu).

#### Opsi 2: Pakai *Built-in* PHP Server (Rekomendasi Kami!)

Nah, ini nih cara yang lebih cepat dan enggak bikin pusing pindah-pindah *directory*. Kamu cukup buka **terminal** atau **CMD** di *root folder* proyek ini, lalu jalankan *command* berikut:

`php -S localhost:8001 -t ./public`

**⚠️ Kalau *command* `php` tidak ditemukan di Windows:**

Kalau pas kamu ketik `php` di CMD muncul pesan error "command not found" atau semacamnya, itu berarti *path* PHP-nya belum terdaftar di *environment variables* Windows kamu. Jangan panik! Kamu bisa langsung pakai *full path* ke `php.exe` yang ada di XAMPP-mu.

Contohnya, kalau XAMPP kamu terinstal di `D:\xampp`, *command*-nya jadi begini:

`D:\xampp\php\php.exe -S localhost:8001 -t ./public`

Jadi, kamu tinggal sesuaikan aja *path* `D:\xampp\php\php.exe` dengan lokasi instalasi XAMPP kamu. Setelah *command* berhasil dijalankan, kamu tinggal buka *browser* dan kunjungi `http://localhost:8001`, deh!

---

## 📝 Soal Tes dan Tips dari Kami!

Oke, ini dia bagian yang paling kamu tunggu-tunggu: **soal tesnya!** Jangan tegang, ini kesempatan kamu buat nunjukkin *pemahaman coding*-mu.

**Tips dari kami:** Di beberapa bagian kode, kamu bakal nemuin komentar `TODO`. Nah, itu dia spot yang bisa kamu lengkapi atau perbaiki. Fokus di situ ya! Usahakan untuk mengerjakan secara runtut ya!

Berikut adalah daftar *bug* dan fitur yang perlu kamu bereskan:

### 1. Aset tidak mau terbaca!

Coba cek **frontend** web-nya. Pasti ada beberapa bagian tampilannya yang berantakan atau gambar yang enggak muncul, kan? Ini karena **link** ke aset-asetnya belum bener. Tugas kamu adalah memperbaiki **path** atau URL ke semua aset (CSS, JavaScript, gambar, dll.) supaya bisa terbaca dengan benar oleh **browser**.

### 2. Belum bisa login

**Bug** utama di web ini adalah kamu belum bisa **login**. Padahal, kamu sudah menambahkan database tersebut. Coba cari tahu kenapa proses **login**-nya gagal supaya **user** bisa masuk ke dalam sistem.

### 3. Password belum terenkripsi

Ini masalah keamanan serius! **Password** yang ada di database saat ini masih dalam bentuk **plain text** (alias tidak dienkripsi). Tugas kamu adalah mengubah sistem **password** agar menggunakan enkripsi yang aman. Kami sarankan pakai fungsi `password_hash()` untuk mengenkripsi saat penyimpanan, dan `password_verify()` saat proses **login**. Anda bisa memanfaatkan **IntelliSense** pada VSCode Anda untuk membantu menemukan fungsi-fungsi ini, lho.

### 4. Menambahkan user baru

Setelah sukses **login** dan **password** terenkripsi dengan aman, kamu juga diminta untuk menambahkan **user** baru**. Cukup berikan **query** SQL untuk menambahkan **user** ini dan simpan di **notepad**. Pastikan kamu juga menyertakan detail **email** dan **password** untuk akun baru tersebut. Yang terpenting, pastikan **akun baru** itu bisa digunakan untuk **login** ke sistem!

### 5. Tambahkan nim dan nama di footer

Mudah aja nih! Kamu cuma perlu **menambahkan NIM dan nama lengkap kamu** pada bagian **footer**.

### 6. Tambahkan data hobi sesuai nim

Kamu perlu **menambahkan data hobi** untuk setiap mahasiswa. Tapi ada aturannya nih, hobinya beda tergantung digit terakhir NIM kamu:
* Kalau **NIM-mu ganjil**, tambahkan hobi: **Reading, Sport, Gaming, Cooking, Gardening**.
* Kalau **NIM-mu genap**, tambahkan hobi: **Music, Coding, Photography, Writing, Traveling**.
Pastikan data hobi ini muncul di tampilan yang **relevan** ya!

### 7. Fungsi edit belum terisi dengan benar

Saat ini, ketika kamu mencoba mengedit data mahasiswa, **field** yang seharusnya terseleksi tidak menunjukkan nilai yang benar dari data yang sedang diedit. Tugas kamu adalah **memperbaiki fungsi edit** agar semua **field** pada form edit **menampilkan data yang sesuai** dari mahasiswa yang dipilih.

### 8. Fungsi hapus belum berjalan dengan baik

Ada masalah dengan tombol hapus! Ketika mencoba menghapus data mahasiswa, fungsi ini belum bekerja sebagaimana mestinya. Kamu perlu **memperbaiki fungsi hapus** agar data mahasiswa bisa dihapus dari database dan tampilannya juga terupdate.

### 9. Total mahasiswa pada study program tidak benar

Di halaman tertentu, ada informasi total mahasiswa per program studi yang masih menampilkan angka 0. Ini jelas **bug**! Tugas kamu adalah **memperbaiki perhitungan total** ini agar menampilkan jumlah mahasiswa yang sebenarnya untuk setiap program studi.

### 10. Pastikan Semuanya Berjalan dengan Baik!

Setelah semua **bug** di atas beres dan fitur baru ditambahkan, pastikan kamu melakukan **pengujian menyeluruh**. Cek lagi semua fungsionalitas, mulai dari login, menambah data, mengedit, menghapus, hingga tampilan aset dan perhitungan total. Pastikan semuanya berjalan lancar dan tanpa error.

---

## ⏳ Estimasi Waktu Pengerjaan dan Bobot Nilai

Ini perkiraan waktu yang bisa kamu alokasikan untuk setiap tugas, dengan total waktu pengerjaan tidak lebih dari **60 menit**. Bobot nilai juga kami sertakan untuk setiap bagian, jadi kamu bisa tahu prioritasnya!

| No. | Tugas | Estimasi Waktu | Bobot Nilai |
| :-- | :----------------------------------------------- | :------------- | :---------- |
| | Instalasi (Bisa jalan) | 15 menit | 15% |
| | Baca kode program | 0 menit | |
| 1. | Aset tidak mau terbaca | 2 menit | 5% |
| 2. | Belum bisa *login* | 3 menit | 10% |
| 3. | *Password* belum terenkripsi | 8 menit | 15% |
| 4. | Menambahkan *user* baru | 2 menit | 10% |
| 5. | Tambahkan NIM dan nama di *footer* | 1 menit | 5% |
| 6. | Tambahkan data hobi sesuai NIM | 4 menit | 5% |
| 7. | Fungsi *edit* belum terisi dengan benar | 5 menit | 10% |
| 8. | Fungsi *hapus* belum berjalan dengan baik | 5 menit | 10% |
| 9. | Total mahasiswa pada *study program* tidak benar | 15 menit | 15% |
| 10. | Pengujian menyeluruh | 0 menit | |
| | **Total Estimasi Waktu** | **60 menit** | **100%** |

---

## 🎉 Penutup

Selamat mengerjakan tes ini! Ingat, ini bukan cuma tentang menemukan dan memperbaiki **bug**, tapi juga tentang bagaimana kamu menerapkan pengetahuanmu di skenario dunia nyata. Semoga sukses, dan kami tunggu hasil terbaikmu! Kalau ada kendala, jangan ragu untuk kembali melihat instruksi ini. Semangat! 💪