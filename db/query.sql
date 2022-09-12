-- DATABASE MENGGUNAKAN MYSQL mariadb

CREATE DATABASE 'bri_db';

CREATE TABLE `mst_barang` (
	`id_mst_barang` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`nama_barang` VARCHAR(255) NOT NULL,
	`jenis_barang` VARCHAR(255) NOT NULL DEFAULT '-',
	`deskripsi_barang` TEXT NULL DEFAULT NULL,
	`date_created` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
	`deleted` TINYINT(4) NOT NULL DEFAULT '0',
	`date_deleted` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id_mst_barang`) USING BTREE
);

CREATE TABLE `mst_karyawan` (
	`id_mst_karyawan` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`nama_karyawan` VARCHAR(255) NOT NULL,
	`no_induk` VARCHAR(255) NOT NULL,
	`status_karyawan` TINYINT(4) NOT NULL DEFAULT '1',
	`date_created` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
	`deleted` TINYINT(4) NOT NULL DEFAULT '0',
	`date_deleted` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id_mst_karyawan`) USING BTREE
);

CREATE TABLE `mst_toko` (
	`id_mst_toko` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`nama_toko` VARCHAR(255) NOT NULL,
	`alamat` VARCHAR(255) NULL DEFAULT NULL,
	`no_telp` VARCHAR(50) NULL DEFAULT NULL,
	`date_created` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
	`deleted` TINYINT(4) NOT NULL DEFAULT '0',
	`date_deleted` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id_mst_toko`) USING BTREE
);

CREATE TABLE `trx_pembayaran` (
	`id_trx_pembayaran` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`id_mst_karyawan` BIGINT(20) NOT NULL DEFAULT '0',
	`tgl_pembayaran` DATETIME NOT NULL,
	`periode` DATE NOT NULL,
	`nominal` DOUBLE NOT NULL DEFAULT '0',
	`jenis_pembayaran` VARCHAR(255) NOT NULL,
	`metadata` LONGTEXT NULL DEFAULT NULL,
	`date_created` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
	`deleted` TINYINT(4) NOT NULL DEFAULT '0',
	`date_deleted` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id_trx_pembayaran`) USING BTREE
);

CREATE TABLE `trx_pembelian` (
	`id_trx_pembelian` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`id_mst_barang` BIGINT(20) NOT NULL,
	`id_mst_toko` BIGINT(20) NOT NULL,
	`harga_beli` DOUBLE NOT NULL DEFAULT '0',
	`harga_jual` DOUBLE NOT NULL DEFAULT '0',
	`jumlah_barang` DOUBLE NOT NULL DEFAULT '0',
	`metadata` LONGTEXT NULL DEFAULT NULL,
	`date_created` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
	`deleted` TINYINT(4) NOT NULL DEFAULT '0',
	`date_deleted` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id_trx_pembelian`) USING BTREE
);

CREATE TABLE `trx_pinjaman` (
	`id_trx_pinjaman` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`id_mst_karyawan` BIGINT(20) NOT NULL,
	`tgl_pinjam` DATETIME NOT NULL,
	`nominal` DOUBLE NOT NULL,
	`tenor` INT(11) NOT NULL,
	`bunga` DOUBLE NOT NULL,
	`metadata` LONGTEXT NULL DEFAULT NULL,
	`lunas` TINYINT(4) NOT NULL DEFAULT '0',
	`date_created` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
	`deleted` TINYINT(4) NOT NULL DEFAULT '0',
	`date_deleted` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id_trx_pinjaman`) USING BTREE
);

CREATE TABLE `trx_pinjaman_setor` (
	`id_trx_pinjaman_setor` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`id_trx_pinjaman` BIGINT(20) NOT NULL,
	`tgl_penyetoran` DATETIME NOT NULL,
	`nominal` DOUBLE NOT NULL DEFAULT '0',
	`metadata` LONGTEXT NULL DEFAULT NULL,
	`date_created` TIMESTAMP NOT NULL DEFAULT current_timestamp(),
	`deleted` TINYINT(4) NOT NULL DEFAULT '0',
	`date_deleted` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id_trx_pinjaman_setor`) USING BTREE
);