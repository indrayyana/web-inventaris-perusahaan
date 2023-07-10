<?php
require_once('../Maintenance.php');

// Deklarasi objek baru dari class Maintenance
$maintenance = new Maintenance();

// Memasukkan nilai dari parameter id ke property id di object maintenance
$maintenance->id = $_GET['id'];

$tampil_data = $maintenance->tampil_satu_maintenance();

if (!$tampil_data) {
    echo '<script>
        alert("Terjadi kesalahan saat mengedit data.");
        window.location.href = "../index.html";
    </script>';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Memasukkan nilai2 formulir ke property2 object
    $maintenance->tanggal = $_POST['ftanggal'];
    $maintenance->vendor = $_POST['fvendor'];
    $maintenance->staff = $_POST['fstaff'];

    $result = $maintenance->ubah_maintenance();

    if ($result) {
        echo '<script>
            alert("Simpan Data Berhasil");
            window.location.href = "maintenance.html";
        </script>';
    } else {
        echo '<script>
            alert("Terjadi kesalahan saat mengedit data.");
            window.location.href = "edit_maintenance.php?id=' . $maintenance->id . '";
        </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventaris Barang</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <h1>Data Maintenance Inventaris Barang</h1>

    <form action="" method="post">
        <label for="fnama">Nama Barang</label>
        <input class="readonly" type="text" id="fnama" name="fnama" value="<?php echo $tampil_data['nama']; ?>"
            readonly /><br /><br />
        <label for="ftanggal">Tanggal Maintenance</label>
        <input type="date" id="ftanggal" name="ftanggal" value="<?php echo $tampil_data['tanggal_maintenance']; ?>"
            required /><br /><br />
        <label for="fvendor">Vendor Maintenance</label>
        <input type="text" id="fvendor" name="fvendor" value="<?php echo $tampil_data['vendor_maintenance']; ?>"
            required placeholder="Masukkan nama vendor" /><br /><br />
        <label for="fstaff">Staff PIC</label>
        <input type="text" id="fstaff" name="fstaff" value="<?php echo $tampil_data['staff_pic']; ?>" required
            placeholder="Masukkan nama staff" /><br /><br />
        <input type="submit" value="Simpan" />
    </form>
</body>

</html>