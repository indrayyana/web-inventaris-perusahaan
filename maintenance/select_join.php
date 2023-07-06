<?php
require_once('../Maintenance.php');

// Deklarasi objek baru dari class Maintenance
$maintenance = new Maintenance();

$months = [
    'januari' => '01',
    'februari' => '02',
    'maret' => '03',
    'april' => '04',
    'mei' => '05',
    'juni' => '06',
    'juli' => '07',
    'agustus' => '08',
    'september' => '09',
    'oktober' => '10',
    'november' => '11',
    'desember' => '12'
];

if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $lowercaseKeyword = strtolower($keyword);

    // Mengecek apakah $keyword berupa bulan dalam bentuk string
    if (array_key_exists($lowercaseKeyword, $months)) {
        // Mengubah menjadi format bulan dalam bentuk angka
        $formatKeyword = $months[$lowercaseKeyword];
    } else {
        $formatKeyword = $keyword;
    }
    $tampilkan_maintenance = $maintenance->cari_maintenance($formatKeyword);
} else {
    $tampilkan_maintenance = $maintenance->tampil_semua_maintenance();
}

// Mengubah data array menjadi format JSON
$json = json_encode($tampilkan_maintenance);
echo ($json);

?>