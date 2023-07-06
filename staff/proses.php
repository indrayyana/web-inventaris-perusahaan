<?php
require_once('Staff.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Deklarasi objek baru dari class Staff
    $staff = new Staff();

    // Memasukkan nilai formulir ke property-object
    $staff->nama_staff = $_POST['fnama'];
    $staff->jabatan = $_POST['fjabatan'];
    $staff->tipe = $_POST['ftipe'];
    $staff->gaji = str_replace('.', '', $_POST['fgaji']);
    $staff->tahun_bergabung = $_POST['ftahun'];

    $result = $staff->tambah_staff();

    // Cek apakah proses tambah staff berhasil atau tidak
    if ($result) {
        ?>
        <script type="text/javascript">
            alert("Simpan Data Berhasil");
            window.location.href = "staff.html";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Terjadi kesalahan saat menyimpan data.");
            window.location.href = "input_staff.php";
        </script>
        <?php
    }
}
?>