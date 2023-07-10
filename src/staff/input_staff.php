<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventaris Barang</title>
    <link rel="stylesheet" href="../style.css" />
</head>

<body>
    <h1>Data Staff</h1>

    <form action="proses.php" method="post">
        <label for="fnama">Nama Staff</label>
        <input type="text" id="fnama" name="fnama" placeholder="Masukkan nama staff" required /><br /><br />
        <label for="fjabatan">Jabatan</label>
        <input type="text" id="fjabatan" name="fjabatan" placeholder="Masukkan jabatan staff" required /><br /><br />
        <label for="ftipe">Tipe</label>
        <select id="ftipe" name="ftipe" required>
            <option value="" hidden>Pilih Tipe Staff</option>
            <option value="Pegawai Tetap">Pegawai Tetap</option>
            <option value="Pegawai Baru">Pegawai Baru</option>
        </select><br /><br />
        <label for="fgaji">Gaji</label>
        <input type="text" id="fgaji" name="fgaji" required pattern="\d{1,3}(?:\.\d{3})*"
            placeholder="Contoh format gaji : 10.000.000" /><br /><br />
        <label for="ftahun">Tahun Bergabung</label>
        <input type="number" id="ftahun" name="ftahun" min="2000" max="3000"
            placeholder="Masukkan tahun bergabung staff" required /><br /><br />
        <input type="submit" value="Simpan" />
    </form>
</body>

</html>