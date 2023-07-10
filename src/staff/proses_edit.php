<?php
require_once('../Staff.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Deklarasi objek baru dari class Staff
    $staff = new Staff();

    // Memasukkan nilai formulir ke property object
    $staff->id = $_POST['id'];
    $staff->nama_staff = $_POST['id'];
    $staff->jabatan = $_POST['fjabatan'];
    $staff->tipe = $_POST['ftipe'];
    $staff->gaji = str_replace('.', '', $_POST['fgaji']);
    $staff->tahun_bergabung = $_POST['ftahun'];

    $result = $staff->ubah_staff();

    if ($result) {
        echo '<script>
            alert("Simpan Data Berhasil");
            window.location.href = "staff.html";
        </script>';
    } else {
        echo '<script>
            alert("Terjadi kesalahan saat menyimpan data.");
            window.location.href = "edit_staff.php?id=' . $staff->id . '";
        </script>';
    }
}
?>