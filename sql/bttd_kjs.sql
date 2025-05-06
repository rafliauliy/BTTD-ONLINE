-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2025 pada 08.24
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
-- Database: `bttd_kjs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_vendor` char(7) NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `nilai_invoice` varchar(50) NOT NULL,
  `tgl_invoice` varchar(50) NOT NULL,
  `no_spk` varchar(50) NOT NULL,
  `no_lhp` varchar(50) NOT NULL,
  `no_faktur_pajak` varchar(50) NOT NULL,
  `tgl_diterima` varchar(50) NOT NULL,
  `top` varchar(100) DEFAULT NULL,
  `due_date` varchar(11) NOT NULL,
  `keterangan_invoice` varchar(255) NOT NULL,
  `pdf_invoice` varchar(255) NOT NULL,
  `pdf_faktur_pajak` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL,
  `tanggal_dibayar` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(50) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`id`, `user_id`, `token`, `created_at`) VALUES
(12, 223, '67deff1eccd2d9c6850c784b47c1318f5423ab7b79fc54cce37bc0c6a674619f0f8412b9d3fac1b8098050ac470b532ee718', '2025-04-21 01:15:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `id_user` int(50) NOT NULL,
  `file_pph` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `periode` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_wa` varchar(50) NOT NULL,
  `role` enum('vendor','admin','GM','TL','super admin','viewer') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `foto` text NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `selected_signature_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_perusahaan`, `nama`, `alamat`, `username`, `email`, `no_telp`, `no_wa`, `role`, `password`, `created_at`, `foto`, `is_active`, `selected_signature_id`) VALUES
(40, 'PT Krakatau Jasa Samudera', 'Admin BTTD KJS', 'Cilegon', 'Administrator', 'admin@krakatau-jasasamudera.com', '08000000000', '08000000000', 'admin', '$2y$10$cpGKLmfKdP69LxzpSUI7hujkIf.fEBCjclPeJ/ftP9zukeJs/eKaG', 1711438768, 'c867a9d2196153612b5a7e1d01f6b7c2.png', 1, NULL),
(223, 'PT Coba coba', 'DIKI', 'JAKARTA', 'user', 'DIKI@gmail.com', '0812219121212', '0821872172712', 'vendor', '$2y$10$nGjkVRF0It1isSyHR./mvuFfdDLo4v88Ogl3oMx5Poep1Q3/7oWdm', 1744468584, 'user.png', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_vendor`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
