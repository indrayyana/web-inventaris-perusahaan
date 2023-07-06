<?php

class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'inventaris-barang';

    public function koneksi()
    {
        return new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );
    }
}
?>