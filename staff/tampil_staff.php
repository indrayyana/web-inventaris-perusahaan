<?php
header('Access-Control-Allow-Origin: *');
require_once('Staff.php');

// Deklarasi objek baru dari class Barang
$staff = new Staff();

if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
    $tampilkan_staff = $staff->cari_Staff($_GET['keyword']);
} else {
    $tampilkan_staff = $staff->tampil_semua_Staff();
}

// Mengubah data array menjadi format JSON
$json = json_encode($tampilkan_staff);
echo ($json);
?>