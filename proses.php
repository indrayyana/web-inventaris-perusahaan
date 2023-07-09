<?php
require_once('Barang.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Deklarasi objek baru dari class Barang
    $barang = new Barang();

    // Memasukkan nilai2 formulir ke property2 object
    $barang->nama = $_POST['fnama'];
    $barang->jumlah = $_POST['fjumlah'];
    $barang->kode = $_POST['fkode'];
    $barang->kategori = $_POST['fkategori'];
    $barang->tipe = $_POST['ftipe'];
    $barang->harga_beli = str_replace('.', '', $_POST['fharga']);
    $barang->tahun_beli = $_POST['ftahun'];

    $result = $barang->tambah_barang();

    // Cek apakah kueri INSERT berhasil atau tidak
    if ($result) {
        echo '<script>
            alert("Simpan Data Berhasil");
            window.location.href = "index.html";
        </script>';
    } else {
        echo '<script>
            alert("Terjadi kesalahan saat menyimpan data.");
            window.location.href = "input_inventaris.php";
        </script>';
    }
} ?>