-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Nov 2021 pada 17.05
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pariwisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi_berita` text NOT NULL,
  `penulis` varchar(25) DEFAULT NULL,
  `published` date NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daerah`
--

CREATE TABLE `tb_daerah` (
  `id_daerah` int(11) NOT NULL,
  `nama_daerah_wisata` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_daerah`
--

INSERT INTO `tb_daerah` (`id_daerah`, `nama_daerah_wisata`) VALUES
(1, 'Aceh'),
(2, 'Sumatra Utara'),
(3, 'Sumatra Barat'),
(4, 'Riau');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Danau');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_portal_wisata`
--

CREATE TABLE `tb_portal_wisata` (
  `id_portal` int(11) NOT NULL,
  `id_wisata` int(11) DEFAULT NULL,
  `keterangan_wisata` text NOT NULL,
  `gambar_portal_wisata` blob NOT NULL,
  `published` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `role`) VALUES
('aka00', 'aka123', 'admin'),
('eve00', 'eve123', 'user'),
('ibal00', 'ibal123', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wisata`
--

CREATE TABLE `tb_wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(255) NOT NULL,
  `lokasi_wisata` text NOT NULL,
  `gambar_wisata` blob DEFAULT NULL,
  `keterangan_wisata` text NOT NULL,
  `kategori` int(11) DEFAULT NULL,
  `penulis` varchar(25) DEFAULT NULL,
  `daerah_wisata` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_wisata`
--

INSERT INTO `tb_wisata` (`id_wisata`, `nama_wisata`, `lokasi_wisata`, `gambar_wisata`, `keterangan_wisata`, `kategori`, `penulis`, `daerah_wisata`) VALUES
(1, 'Danau Toba', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d510166.39238323073!2d98.55577599511497!3d2.6114158530381077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031de07a843b6ad%3A0xc018edffa69c0d05!2sDanau%20Toba!5e0!3m2!1sid!2sid!4v1636203851858!5m2!1sid!2sid\" width=\"300\" height=\"150\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', NULL, 'Danau kawah gunung api besar dengan panorama pegunungan yang tenang, plus fasilitas seperti restoran.', 1, 'aka00', 2),
(2, 'Danau Toba', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d510166.39238323073!2d98.55577599511497!3d2.6114158530381077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031de07a843b6ad%3A0xc018edffa69c0d05!2sDanau%20Toba!5e0!3m2!1sid!2sid!4v1636203851858!5m2!1sid!2sid\" width=\"300\" height=\"150\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', NULL, 'Danau kawah gunung api besar dengan panorama pegunungan yang tenang, plus fasilitas seperti restoran.', 1, 'ibal00', 1),
(3, 'Danau Toba', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d510166.39238323073!2d98.55577599511497!3d2.6114158530381077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3031de07a843b6ad%3A0xc018edffa69c0d05!2sDanau%20Toba!5e0!3m2!1sid!2sid!4v1636203851858!5m2!1sid!2sid\" width=\"300\" height=\"150\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', NULL, 'Danau kawah gunung api besar dengan panorama pegunungan yang tenang, plus fasilitas seperti restoran.', 1, 'eve00', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `penulis` (`penulis`);

--
-- Indeks untuk tabel `tb_daerah`
--
ALTER TABLE `tb_daerah`
  ADD PRIMARY KEY (`id_daerah`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_portal_wisata`
--
ALTER TABLE `tb_portal_wisata`
  ADD PRIMARY KEY (`id_portal`),
  ADD KEY `id_wisata` (`id_wisata`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD PRIMARY KEY (`id_wisata`),
  ADD KEY `username` (`penulis`,`daerah_wisata`),
  ADD KEY `daerah_wisata` (`daerah_wisata`),
  ADD KEY `kategori` (`kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_daerah`
--
ALTER TABLE `tb_daerah`
  MODIFY `id_daerah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_portal_wisata`
--
ALTER TABLE `tb_portal_wisata`
  MODIFY `id_portal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD CONSTRAINT `tb_berita_ibfk_1` FOREIGN KEY (`penulis`) REFERENCES `tb_user` (`username`);

--
-- Ketidakleluasaan untuk tabel `tb_portal_wisata`
--
ALTER TABLE `tb_portal_wisata`
  ADD CONSTRAINT `tb_portal_wisata_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `tb_wisata` (`id_wisata`);

--
-- Ketidakleluasaan untuk tabel `tb_wisata`
--
ALTER TABLE `tb_wisata`
  ADD CONSTRAINT `tb_wisata_ibfk_1` FOREIGN KEY (`penulis`) REFERENCES `tb_user` (`username`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_wisata_ibfk_2` FOREIGN KEY (`daerah_wisata`) REFERENCES `tb_daerah` (`id_daerah`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_wisata_ibfk_3` FOREIGN KEY (`kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
