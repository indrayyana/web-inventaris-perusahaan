<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once 'Barang.php';

$barang = new Barang();

$barang->id = $_GET['id'];
$tampil_data = $barang->tampil_satu_barang();

if (!$tampil_data) {
    ?>
    <script type="text/javascript">
        alert("Terjadi kesalahan saat mencetak data.");
        window.location.href = "index.html";
    </script>
    <?php
}

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventaris Barang</title>
    <style>
       .centered {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }

        table {
            border-collapse: collapse;
        }

        table td {
            padding: 5px;
        }
    </style>
</head>
<body style="text-align: center;">
    <div class="centered">
        <img src="./logo/Stikom-Bali.png" alt="STIKOM" width=400>
        <h2>Data Inventaris Barang</h2>
    </div>
    <div class="tampil">
        <table>
            <tr>
                <td>Nama Barang</td>
                <td>: ' . $tampil_data['nama'] . '</td>
            </tr>
            <tr>
                <td>Jumlah Barang</td>
                <td>: ' . $tampil_data['jumlah'] . '</td>
            </tr>
            <tr>
                <td>Kode Barang</td>
                <td>: ' . $tampil_data['kode'] . '</td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>: ' . $tampil_data['kategori'] . '</td>
            </tr>
            <tr>
                <td>Tipe</td>
                <td>: ' . $tampil_data['tipe'] . '</td>
            </tr>
            <tr>
                <td>Harga Beli</td>
                <td>: Rp' . number_format($tampil_data['harga_beli'], 0, ',', '.') . '</td>
            </tr>
            <tr>
                <td>Tahun Beli</td>
                <td>: ' . $tampil_data['tahun_beli'] . '</td>
            </tr>
        </table>
    </div>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('Data ' . $tampil_data['nama'] . '.pdf', 'I');
?>