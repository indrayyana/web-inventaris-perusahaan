<?php
require_once('Barang.php');

// Deklarasi objek baru dari class Barang
$barang = new Barang();

// Memasukkan nilai dari parameter id ke property id di object barang
$barang->id = $_GET['id'];

$tampil_data = $barang->tampil_satu_barang();

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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Edit Data Inventaris Barang</h1>

    <form action="proses_edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $tampil_data['id']; ?>">
        <label for="fnama">Nama Barang</label>
        <input class="readonly" type="text" id="fnama" name="fnama" value="<?php echo $tampil_data['nama']; ?>"
            readonly /><br /><br />
        <label for="fjumlah">Jumlah Barang</label>
        <input type="number" id="fjumlah" name="fjumlah" value="<?php echo $tampil_data['jumlah']; ?>"
            required /><br /><br />
        <label for="fkode">Kode</label>
        <input class="readonly" type="text" id="fkode" name="fkode" value="<?php echo $tampil_data['kode']; ?>"
            readonly /><br /><br />
        <label for="fkategori">Kategori</label>
        <input class="readonly" type="text" id="fkategori" name="fkategori"
            value="<?php echo $tampil_data['kategori']; ?>" readonly /><br /><br />
        <label for="ftipe">Tipe</label>
        <select id="ftipe" name="ftipe" required>
            <?php if ($tampil_data['tipe'] == 'Baru'): ?>
                <option value="Baru">
                    <?php echo $tampil_data['tipe']; ?>
                </option>
                <option value="Bekas">Bekas</option>
            <?php else: ?>
                <option value="Bekas">
                    <?php echo $tampil_data['tipe']; ?>
                </option>
                <option value="Baru">Baru</option>
            <?php endif; ?>
        </select><br /><br />
        <label for="fharga">Harga Beli</label>
        <input type="text" id="fharga" name="fharga"
            value="<?php echo number_format($tampil_data['harga_beli'], 0, ',', '.'); ?>" required
            pattern="\d{1,3}(?:\.\d{3})*" /><br /><br />
        <label for="ftahun">Tahun Beli</label>
        <input type="number" id="ftahun" name="ftahun" min="2000" max="3000"
            value="<?php echo $tampil_data['tahun_beli']; ?>" required /><br /><br />
        <input type="submit" value="Simpan" />
    </form>
</body>

</html>