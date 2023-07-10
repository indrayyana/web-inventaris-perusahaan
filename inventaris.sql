-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for inventaris-barang
CREATE DATABASE IF NOT EXISTS `inventaris-barang` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `inventaris-barang`;

-- Dumping structure for table inventaris-barang.inventaris
CREATE TABLE IF NOT EXISTS `inventaris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `tahun_beli` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table inventaris-barang.inventaris: ~7 rows (approximately)
/*!40000 ALTER TABLE `inventaris` DISABLE KEYS */;
INSERT INTO `inventaris` (`id`, `nama`, `jumlah`, `kode`, `kategori`, `tipe`, `harga_beli`, `tahun_beli`, `status`) VALUES
	(1, 'Laptop', 10, 'LP001', 'Elektronik', 'Baru', 15000000, 2021, NULL),
	(2, 'Meja Kantor', 5, 'MK002', 'Perabotan', 'Baru', 1500000, 2020, NULL),
	(3, 'LCD Proyektor', 2, 'LC003', 'Elektronik', 'Baru', 5000000, 2020, NULL),
	(4, 'Kamera DSLR', 2, 'KM004', 'Elektronik', 'Baru', 5000000, 2021, NULL),
	(5, 'Mobil', 1, 'MB005', 'Kendaraan', 'Bekas', 120000000, 2019, NULL),
	(6, 'WiFi IndiHome', 1, 'WF006', 'Elektronik', 'Baru', 965000, 2023, NULL),
	(7, 'Router', 3, 'RT003', 'Elektronik', 'Baru', 1500000, 2021, NULL);
/*!40000 ALTER TABLE `inventaris` ENABLE KEYS */;

-- Dumping structure for table inventaris-barang.maintenance_inventaris
CREATE TABLE IF NOT EXISTS `maintenance_inventaris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_maintenance` date NOT NULL,
  `vendor_maintenance` varchar(50) NOT NULL,
  `staff_pic` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_inventaris` FOREIGN KEY (`id`) REFERENCES `inventaris` (`id`),
  CONSTRAINT `maintenance_inventaris_ibfk_1` FOREIGN KEY (`id`) REFERENCES `inventaris` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table inventaris-barang.maintenance_inventaris: ~3 rows (approximately)
/*!40000 ALTER TABLE `maintenance_inventaris` DISABLE KEYS */;
INSERT INTO `maintenance_inventaris` (`id`, `tanggal_maintenance`, `vendor_maintenance`, `staff_pic`) VALUES
	(1, '2022-06-12', 'PT Global Teknologi', 'Putu Siki'),
	(2, '2022-03-21', 'Moxxa Furniture', 'Kadek Kalih'),
	(3, '2022-11-26', 'PT Foxbyte Global Inovasi', 'Komang Tiga');
/*!40000 ALTER TABLE `maintenance_inventaris` ENABLE KEYS */;

-- Dumping structure for table inventaris-barang.staff
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `gaji` int(11) NOT NULL,
  `tahun_bergabung` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table inventaris-barang.staff: ~3 rows (approximately)
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` (`id`, `nama`, `jabatan`, `tipe`, `gaji`, `tahun_bergabung`) VALUES
	(7, 'Kadek', 'OB', 'Pegawai Baru', 3000000, 2021),
	(8, 'Komang', 'HRD', 'Pegawai Tetap', 9000000, 2019),
	(9, 'Ketut', 'Manager', 'Pegawai Tetap', 10000000, 2020);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
