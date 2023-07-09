<?php
require_once('./Staff.php');

// Deklarasi objek baru dari class Staff
$staff = new Staff();

// Memasukkan nilai dari parameter id ke property id di object staff
$staff->id = $_GET['id'];

$tampil_data = $staff->tampil_satu_staff();

if (!$tampil_data) {
    echo '<script>
        alert("Terjadi kesalahan saat mengedit data.");
        window.location.href = "index.html";
    </script>';
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
    <h1>Edit Data Staff</h1>

    <form action="proses_edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $tampil_data['id']; ?>">
        <label for="fnama">Nama Staff</label>
        <input class="readonly" type="text" id="fnama" name="fnama" value="<?php echo $tampil_data['nama']; ?>"
            readonly /><br /><br />
        <label for="fjabatan">Jabatan</label>
        <input type="text" id="fjabatan" name="fjabatan" value="<?php echo $tampil_data['jabatan']; ?>" /><br /><br />
        <label for="ftipe">Tipe</label>
        <select id="ftipe" name="ftipe" required>
            <?php if ($tampil_data['tipe'] == 'Pegawai Baru'): ?>
                <option value="Pegawai Baru">
                    <?php echo $tampil_data['tipe']; ?>
                </option>
                <option value="Pegawai Tetap">Pegawai Tetap</option>
            <?php else: ?>
                <option value="Pegawai Tetap">
                    <?php echo $tampil_data['tipe']; ?>
                </option>
                <option value="Pegawai Baru">Pegawai Baru</option>
            <?php endif; ?>
        </select><br /><br />
        <label for="fgaji">Gaji</label>
        <input type="text" id="fgaji" name="fgaji"
            value="<?php echo number_format($tampil_data['gaji'], 0, ',', '.'); ?>" required
            pattern="\d{1,3}(?:\.\d{3})*" /><br /><br />
        <label for="ftahun">Tahun Bergabung</label>
        <input type="number" id="ftahun" name="ftahun" min="2000" max="3000"
            value="<?php echo $tampil_data['tahun_bergabung']; ?>" required /><br /><br />
        <input type="submit" value="Simpan" />
    </form>
</body>

</html>