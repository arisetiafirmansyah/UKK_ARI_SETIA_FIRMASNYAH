-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Feb 2024 pada 04.40
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(222) NOT NULL,
  `penulis` varchar(222) NOT NULL,
  `penerbit` varchar(222) NOT NULL,
  `tahun` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penulis`, `penerbit`, `tahun`, `created_at`) VALUES
(3, 'Bom Jakarta', 'Dodi Santoso', 'Erlangga', 2022, '2024-02-27 21:43:51'),
(4, 'No Way Home', 'Dedi Santoso', 'Erlangga', 2022, '2024-02-28 01:06:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `katagori`
--

CREATE TABLE `katagori` (
  `id_katagori` int(11) NOT NULL,
  `nama_katagori` varchar(222) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `katagori`
--

INSERT INTO `katagori` (`id_katagori`, `nama_katagori`, `created_at`) VALUES
(3, 's', '2024-02-28 06:47:21'),
(4, 'dsdsd', '2024-02-28 07:08:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `katagoribuku`
--

CREATE TABLE `katagoribuku` (
  `id_katagoribuku` int(11) NOT NULL,
  `buku` int(11) NOT NULL,
  `katagori` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `katagoribuku`
--

INSERT INTO `katagoribuku` (`id_katagoribuku`, `buku`, `katagori`, `created_at`) VALUES
(1, 4, 4, '2024-02-28 13:59:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koleksi`
--

CREATE TABLE `koleksi` (
  `id_koleksi` int(11) NOT NULL,
  `peminjam` int(11) NOT NULL,
  `buku` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `koleksi`
--

INSERT INTO `koleksi` (`id_koleksi`, `peminjam`, `buku`, `created_at`) VALUES
(4, 8, 4, '2024-02-28 21:08:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(222) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `created_at`) VALUES
(1, 'Admin', '2024-02-28 03:06:40'),
(2, 'Petugas', '2024-02-28 03:06:40'),
(3, 'Peminjam', '2024-02-28 03:07:13'),
(4, 'Super Admin', '2024-02-28 16:07:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjam`
--

CREATE TABLE `peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `nama_peminjam` varchar(222) NOT NULL,
  `alamat` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `jk` enum('Laki-laki','Perempuan','','') NOT NULL,
  `ttl` date NOT NULL,
  `nohp` varchar(222) NOT NULL,
  `user` int(222) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjam`
--

INSERT INTO `peminjam` (`id_peminjam`, `nama_peminjam`, `alamat`, `email`, `jk`, `ttl`, `nohp`, `user`, `created_at`) VALUES
(8, 'Ari Setia Firmasyah', 'Batam Center', 'arisetiafirmnsyah@gmail.com', 'Laki-laki', '2024-01-31', '089876765455', 15, '2024-02-28 21:05:33'),
(9, 'Madrid', 'Batam Center', 'arisetiafirmnsyah@gmail.com', 'Laki-laki', '2024-02-02', '087656543432', 7, '2024-02-28 21:28:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `peminjam` int(11) NOT NULL,
  `buku` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` varchar(222) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `peminjam`, `buku`, `tanggal`, `tgl_kembali`, `status`, `created_at`) VALUES
(7, 8, 4, '2024-01-28', '2024-02-16', 'minja dulu ya gais', '2024-02-28 21:07:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(222) NOT NULL,
  `alamat` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `ttl` date NOT NULL,
  `nohp` varchar(222) NOT NULL,
  `nik` int(11) NOT NULL,
  `user` varchar(222) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `alamat`, `email`, `jk`, `ttl`, `nohp`, `nik`, `user`, `created_at`) VALUES
(2, 'Ari Setia Firmasnyah', 'Batam Center', 'arisetiafirmnsyah@gmail.com', 'Laki-laki', '2024-02-07', '089876765456', 21161036, '3', '2024-02-27 20:41:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `peminjam` int(11) NOT NULL,
  `buku` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `peminjam`, `buku`, `ulasan`, `rating`, `created_at`) VALUES
(6, 8, 4, 'Sangat bagus', 8, '2024-02-28 21:08:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `level` int(222) NOT NULL,
  `foto` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `foto`, `created_at`) VALUES
(3, 'petugas', '827ccb0eea8a706c4c34a16891f84e7b', 2, 'd.png', '2024-02-27 20:41:23'),
(7, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'img.jpg', '2024-02-28 05:00:16'),
(12, 'super admin', '827ccb0eea8a706c4c34a16891f84e7b', 4, 'img.jpg', '2024-02-28 16:08:05'),
(15, 'Peminjam', '827ccb0eea8a706c4c34a16891f84e7b', 3, 'c.jpg', '2024-02-28 21:05:33'),
(16, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 3, 'logo.ai', '2024-02-28 21:28:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `katagori`
--
ALTER TABLE `katagori`
  ADD PRIMARY KEY (`id_katagori`);

--
-- Indeks untuk tabel `katagoribuku`
--
ALTER TABLE `katagoribuku`
  ADD PRIMARY KEY (`id_katagoribuku`);

--
-- Indeks untuk tabel `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`id_koleksi`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `katagori`
--
ALTER TABLE `katagori`
  MODIFY `id_katagori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `katagoribuku`
--
ALTER TABLE `katagoribuku`
  MODIFY `id_katagoribuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `id_koleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
