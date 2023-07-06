<?php
require_once('../Database.php');

// Membuat class Staff yang merupakan turunan dari class Database.
class Staff extends Database
{
  public $id;
  public $nama_staff;
  public $jabatan;
  public $tipe;
  public $gaji;
  public $tahun_bergabung;

  public function tambah_staff()
  {
    $con = $this->koneksi();
    $insert = $con->query("INSERT INTO staff
                              (
                                nama,
                                jabatan,
                                tipe,
                                gaji,
                                tahun_bergabung
                              ) 
                             VALUES 
                              (
                                '{$this->nama_staff}',
                                '{$this->jabatan}', 
                                '{$this->tipe}', 
                                '{$this->gaji}', 
                                '{$this->tahun_bergabung}'                             
                              )");
    return $insert;
  }

  public function tampil_satu_staff()
  {
    $con = $this->koneksi();
    $data = $con->query("SELECT * FROM staff 
                          WHERE id = '{$this->id}'");

    // Mengambil satu baris data dalam bentuk array.
    $tampil = $data->fetch_assoc();
    return $tampil;
  }

  public function tampil_semua_staff()
  {
    $con = $this->koneksi();
    $data = $con->query("SELECT * FROM staff");

    // Mengambil semua data dalam bentuk array.
    $tampil = $data->fetch_all(MYSQLI_ASSOC);
    return $tampil;
  }

  public function cari_staff($keyword)
  {
    $con = $this->koneksi();
    $search = $con->query("SELECT * FROM staff 
                            WHERE nama LIKE '%{$keyword}%' OR
                            jabatan LIKE '%{$keyword}%' OR
                            tipe LIKE '%{$keyword}%' OR
                            tahun_bergabung LIKE '%{$keyword}%'");
    $result = $search->fetch_all(MYSQLI_ASSOC);
    return $result;
  }

  public function ubah_staff()
  {
    $con = $this->koneksi();
    $update = $con->query("UPDATE staff SET  
                            jabatan='{$this->jabatan}', 
                            tipe='{$this->tipe}', 
                            gaji='{$this->gaji}', 
                            tahun_bergabung='{$this->tahun_bergabung}' 
                            WHERE id='{$this->id}'
                          ");
    return $update;
  }

  public function hapus_staff()
  {
    $con = $this->koneksi();
    $delete = $con->query("DELETE FROM staff 
                          WHERE id = '{$this->id}'");
    return $delete;
  }
}
?>