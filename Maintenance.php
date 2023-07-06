<?php
require_once('Database.php');

// Membuat class Maintenance yang merupakan turunan dari class Database.
class Maintenance extends Database
{
    public $id;
    public $tanggal;
    public $vendor;
    public $staff;

    public function tambah_maintenance()
    {
        $con = $this->koneksi();
        $insert = $con->query("INSERT INTO maintenance_inventaris 
                                (
                                    id, 
                                    tanggal_maintenance, 
                                    vendor_maintenance, 
                                    staff_pic
                                ) 
                                VALUES 
                                (
                                    '{$this->id}', 
                                    '{$this->tanggal}', 
                                    '{$this->vendor}', 
                                    '{$this->staff}'
                                )");
        return $insert;
    }

    public function tampil_satu_maintenance()
    {
        $con = $this->koneksi();
        $data = $con->query("SELECT 
                                A.id, 
                                A.nama, 
                                B.tanggal_maintenance, 
                                B.vendor_maintenance, 
                                B.staff_pic
                                FROM inventaris AS A
                                LEFT JOIN maintenance_inventaris AS B 
                                ON A.id = B.id
                                WHERE A.id = '{$this->id}'");

        // Mengambil satu baris data dalam bentuk array.
        $tampil = $data->fetch_assoc();
        return $tampil;
    }

    public function tampil_semua_maintenance()
    {
        $con = $this->koneksi();
        $data = $con->query("SELECT 
                                A.id,
                                A.nama, 
                                B.tanggal_maintenance, 
                                B.vendor_maintenance, 
                                B.staff_pic
                            FROM inventaris AS A
                            LEFT JOIN maintenance_inventaris AS B 
                            ON A.id = B.id");

        // Mengambil semua data dalam bentuk array.
        $tampil = $data->fetch_all(MYSQLI_ASSOC);
        return $tampil;
    }

    public function cari_maintenance($keyword)
    {
        $con = $this->koneksi();
        $search = $con->query("SELECT 
                            A.id,
                            A.nama, 
                            B.tanggal_maintenance, 
                            B.vendor_maintenance, 
                            B.staff_pic
                            FROM inventaris AS A
                            LEFT JOIN maintenance_inventaris AS B 
                            ON A.id = B.id 
                            WHERE nama LIKE '%{$keyword}%' OR
                            tanggal_maintenance LIKE '%{$keyword}%' OR
                            vendor_maintenance LIKE '%{$keyword}%' OR
                            staff_pic LIKE '%{$keyword}%'");
        $result = $search->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function ubah_maintenance()
    {
        $con = $this->koneksi();
        $update = $con->query("UPDATE maintenance_inventaris SET 
                                tanggal_maintenance='{$this->tanggal}', 
                                vendor_maintenance='{$this->vendor}', 
                                staff_pic='{$this->staff}' 
                                WHERE id='{$this->id}'");
        return $update;
    }

    public function hapus_maintenance()
    {
        $con = $this->koneksi();
        $delete = $con->query("DELETE FROM maintenance_inventaris 
                                WHERE id = '{$this->id}'");
        return $delete;
    }

}

?>