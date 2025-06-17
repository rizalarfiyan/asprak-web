<?php

// Koneksi ke database MySQL
try {
    $link = mysqli_connect("127.0.0.1", "root", "password");
    if (!$link) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }
    mysqli_select_db($link, "web_mhs");
} catch (Exception $e) {
    die("Dastabase Error: " . $e->getMessage());
}
