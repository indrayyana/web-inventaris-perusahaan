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
    <h1>Data Inventaris Barang</h1>

    <form action="proses.php" method="post">
        <label for="fnama">Nama Barang</label>
        <input type="text" id="fnama" name="fnama" placeholder="Masukkan nama barang" required /><br /><br />
        <label for="fjumlah">Jumlah Barang</label>
        <input type="number" id="fjumlah" name="fjumlah" placeholder="Masukkan jumlah barang" required /><br /><br />
        <label for="fkode">Kode</label>
        <input type="text" id="fkode" name="fkode" placeholder="Masukkan kode barang" required /><br /><br />
        <label for="fkategori">Kategori</label>
        <input type="text" id="fkategori" name="fkategori" placeholder="Masukkan kategori barang"
            required /><br /><br />
        <label for="ftipe">Tipe</label>
        <select id="ftipe" name="ftipe" required>
            <option value="" hidden>Pilih Tipe Barang</option>
            <option value="Baru">Baru</option>
            <option value="Bekas">Bekas</option>
        </select><br /><br />
        <label for="fharga">Harga Beli</label>
        <input type="text" id="fharga" name="fharga" required pattern="\d{1,3}(?:\.\d{3})*"
            placeholder="Contoh format harga : 10.000.000" /><br /><br />
        <label for="ftahun">Tahun Beli</label>
        <input type="number" id="ftahun" name="ftahun" min="2000" max="3000"
            placeholder="Masukkan tahun pembelian barang" required /><br /><br />
        <input type="submit" value="Simpan" />
    </form>
</body>

</html>