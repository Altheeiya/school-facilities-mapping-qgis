-- Ini Belum Digunakan (saat hosting)
CREATE DATABASE IF NOT EXISTS db_sig_sma;
USE db_sig_sma;

-- 1. TABEL KECAMATAN
CREATE TABLE IF NOT EXISTS `tabel_kecamatan` (
  `id_kecamatan` INT AUTO_INCREMENT PRIMARY KEY,
  `nama_kecamatan` VARCHAR(50) NOT NULL UNIQUE,
  `nilai_pemerataan` INT DEFAULT 0,
  `geojson_polygon` LONGTEXT NULL, -- Menyimpan data koordinat array poligon spasial kecamatan
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2. TABEL SEKOLAH (SMA)
CREATE TABLE IF NOT EXISTS `tabel_sekolah` (
  `id_sekolah` INT AUTO_INCREMENT PRIMARY KEY,
  `npsn` VARCHAR(10) NOT NULL UNIQUE,
  `nama_sekolah` VARCHAR(100) NOT NULL,
  `jenis` VARCHAR(10) DEFAULT 'SMA',
  `status` ENUM('NEGERI', 'SWASTA') NOT NULL,
  `alamat` TEXT NOT NULL,
  `kelurahan` VARCHAR(50) DEFAULT NULL,
  `id_kecamatan` INT NOT NULL,
  `lintang` DECIMAL(17, 14) NOT NULL, -- Format presisi tinggi untuk koordinat map (contoh: -5.431700000000)
  `bujur` DECIMAL(17, 14) NOT NULL,   -- Format presisi tinggi untuk koordinat map (contoh: 105.197400000000)
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`id_kecamatan`) REFERENCES `tabel_kecamatan`(`id_kecamatan`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;