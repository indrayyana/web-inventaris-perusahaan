<?php
require_once('Staff.php');

// Deklarasi objek baru dari class Staff
$staff = new Staff();

// Memasukkan nilai dari parameter id ke property id pada object
$staff->id = $_GET['id'];

// Memanggil method hapus staff
$result_delete_staff = $staff->hapus_staff();

if ($result_delete_staff) {
    ?>
    <script type="text/javascript">
        alert("Data Berhasil Dihapus");
        window.location.href = "staff.html";
    </script>
    <?php
} else {
    ?>
    <script type="text/javascript">
        alert("Terjadi kesalahan saat menghapus data.");
        window.location.href = "staff.html";
    </script>
    <?php
}

?>