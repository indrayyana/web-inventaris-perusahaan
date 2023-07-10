<?php
require_once('Database.php');

// Membuat class Barang yang merupakan turunan dari class Database.
class Barang extends Database
{
  public $id;
  public $nama;
  public $jumlah;
  public $kode;
  public $kategori;
  public $tipe;
  public $harga_beli;
  public $tahun_beli;

  public function tambah_barang()
  {
    $con = $this->koneksi();
    $insert = $con->query("INSERT INTO inventaris 
                              (
                                nama,
                                jumlah,
                                kode,
                                kategori,
                                tipe,
                                harga_beli,
                                tahun_beli
                              ) 
                             VALUES 
                              (
                                '{$this->nama}',
                                '{$this->jumlah}', 
                                '{$this->kode}', 
                                '{$this->kategori}', 
                                '{$this->tipe}', 
                                '{$this->harga_beli}', 
                                '{$this->tahun_beli}'                               
                              )");
    return $insert;
  }

  public function tampil_satu_barang()
  {
    $con = $this->koneksi();
    // Buat nampilin data berdasarkan id (satu data)
    $data = $con->query("SELECT * FROM inventaris 
                          WHERE id = '{$this->id}'");

    // Mengambil satu baris data dalam bentuk array.
    $tampil = $data->fetch_assoc();
    return $tampil;
  }

  public function tampil_semua_barang()
  {
    $con = $this->koneksi();
    $data = $con->query("SELECT * FROM inventaris");

    // Mengambil semua data dalam bentuk array.
    $tampil = $data->fetch_all(MYSQLI_ASSOC);
    return $tampil;
  }

  public function cari_barang($keyword)
  {
    $con = $this->koneksi();
    $search = $con->query("SELECT * FROM inventaris 
                            WHERE nama LIKE '%{$keyword}%' OR
                            jumlah LIKE '%{$keyword}%' OR
                            kode LIKE '%{$keyword}%' OR
                            kategori LIKE '%{$keyword}%' OR
                            tipe LIKE '%{$keyword}%' OR
                            tahun_beli LIKE '%{$keyword}%'");
    $result = $search->fetch_all(MYSQLI_ASSOC);
    return $result;
  }

  public function ubah_barang()
  {
    $con = $this->koneksi();
    $update = $con->query("UPDATE inventaris SET 
                            jumlah='{$this->jumlah}', 
                            kategori='{$this->kategori}', 
                            tipe='{$this->tipe}', 
                            harga_beli='{$this->harga_beli}', 
                            tahun_beli='{$this->tahun_beli}' 
                            WHERE id='{$this->id}'
                          ");
    return $update;
  }

  public function hapus_barang()
  {
    $con = $this->koneksi();
    $delete = $con->query("DELETE FROM inventaris 
                          WHERE id = '{$this->id}'");
    return $delete;
  }

}
?>