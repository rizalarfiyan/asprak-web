<?php
include "koneksi.php";

// Mendapatkan data dari form
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$no_hp = $_POST['no_hp'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];
$hobi = $_POST['hobi'];
$hobies = implode(",", $hobi);

// Query tambah data mahasiswa
$sql = "INSERT INTO mahasiswa (nim, nama, no_hp, jenis_kelamin, jurusan, alamat, hobi) VALUES ('$nim', '$nama', '$no_hp', '$jenis_kelamin', '$jurusan', '$alamat', '$hobies')";
if (mysqli_query($link, $sql)) {
    header("location:tampil_data.php");
} else {
    header("location:form_tambah.php");
}
