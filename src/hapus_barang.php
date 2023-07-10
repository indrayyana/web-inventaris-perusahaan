<?php
require_once('Barang.php');
require_once('Maintenance.php');

// Deklarasi objek baru dari class Barang dan class Maintenance
$barang = new Barang();
$maintenance = new Maintenance();

// Memasukkan nilai dari parameter id ke property id di masing2 object
$barang->id = $_GET['id'];
$maintenance->id = $_GET['id'];

// Memanggil method hapus di masing-masing class
$result_delete_maintenance = $maintenance->hapus_maintenance();
$result_delete_inventaris = $barang->hapus_barang();

if ($result_delete_maintenance && $result_delete_inventaris) {
    echo '<script>
        alert("Data Berhasil Dihapus");
        window.location.href = "index.html";
    </script>';
} else {
    echo '<script>
        alert("Terjadi kesalahan saat menghapus data.");
        window.location.href = "index.html";
    </script>';
}

?>