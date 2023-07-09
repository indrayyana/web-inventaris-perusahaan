<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once 'Barang.php';
require_once 'Maintenance.php';
require_once 'Staff.php';

$mpdf = new \Mpdf\Mpdf();

if (isset($_GET['data']) && isset($_GET['id'])) {
    if ($_GET['data'] === 'barang') {
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
    } else if ($_GET['data'] === 'maintenance') {
        $maintenance = new Maintenance();
        $maintenance->id = $_GET['id'];
        $tampil_data = $maintenance->tampil_satu_maintenance();

        // Fungsi manipulasi tanggal
        function formatDate($tanggal) {
            // Set locale ke bahasa Indonesia
            $locale = 'id_ID';

            // Konversi tanggal ke objek DateTime
            $date = new DateTime($tanggal);

            // Format tanggal dengan menggunakan IntlDateFormatter
            $formatter = new IntlDateFormatter($locale, IntlDateFormatter::FULL, IntlDateFormatter::NONE);
            $formatter->setPattern('EEEE, d MMMM y');

            return $formatter->format($date);
        }


        if (!$tampil_data) {
            ?>
                <script type="text/javascript">
                    alert("Terjadi kesalahan saat mencetak data.");
                    window.location.href = "./staff/staff.html";
                </script>
                <?php
        }

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
        <h2>Data Staff Perusahaan</h2>
    </div>
    <div class="tampil">
        <table>
            <tr>
                <td>Nama Barang</td>
                <td>: ' . $tampil_data['nama'] . '</td>
            </tr>
            <tr>
                <td>Tanggal Maintenance</td>
                <td>: ' . formatDate($tampil_data['tanggal_maintenance']) . ' </td>
            </tr>
            <tr>
                <td>Vendor Maintenance</td>
                <td>: ' . $tampil_data['vendor_maintenance'] . '</td>
            </tr>
            <tr>
                <td>Staff PIC</td>
                <td>: ' . $tampil_data['staff_pic'] . '</td>
            </tr>
        </table>
    </div>
</body>
</html>';
    } else if ($_GET['data'] === 'staff') {
        $staff = new Staff();
        $staff->id = $_GET['id'];
        $tampil_data = $staff->tampil_satu_staff();

        if (!$tampil_data) {
            ?>
                    <script type="text/javascript">
                        alert("Terjadi kesalahan saat mencetak data.");
                        window.location.href = "./staff/staff.html";
                    </script>
                    <?php
        }

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
        <h2>Data Staff Perusahaan</h2>
    </div>
    <div class="tampil">
        <table>
            <tr>
                <td>Nama</td>
                <td>: ' . $tampil_data['nama'] . '</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: ' . $tampil_data['jabatan'] . '</td>
            </tr>
            <tr>
                <td>Tipe</td>
                <td>: ' . $tampil_data['tipe'] . '</td>
            </tr>
            <tr>
                <td>Gaji</td>
                <td>: Rp' . number_format($tampil_data['gaji'], 0, ',', '.') . '</td>
            </tr>
            <tr>
                <td>Tahun Bergabung</td>
                <td>: ' . $tampil_data['tahun_bergabung'] . '</td>
            </tr>
        </table>
    </div>
</body>
</html>';
    }
    $mpdf->WriteHTML($html);
    $mpdf->Output('Data ' . $tampil_data['nama'] . '.pdf', 'I');
} else {
    ?>
    <script type="text/javascript">
        alert("Terjadi kesalahan saat mencetak data.");
        window.location.href = "index.html";
    </script>
<?php
}
?>