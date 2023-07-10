<?php

class Database
{
    private $host = 'mysql-db';
    private $username = 'root';
    private $password = 'root';
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