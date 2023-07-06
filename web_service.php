<?php
header('Access-Control-Allow-Origin: *');
require_once('Barang.php');

// Deklarasi objek baru dari class Barang
$barang = new Barang();

if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
    $tampilkan_barang = $barang->cari_barang($_GET['keyword']);
} else {
    $tampilkan_barang = $barang->tampil_semua_barang();
}

// Mengubah data array menjadi format JSON
$json = json_encode($tampilkan_barang);
echo ($json);
?>