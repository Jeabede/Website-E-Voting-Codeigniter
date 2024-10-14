-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Bulan Mei 2024 pada 11.27
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_voting_database`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandidat_event`
--

CREATE TABLE `kandidat_event` (
  `id` int(11) NOT NULL,
  `id_kategori_event_vote` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto_kandidat` varchar(2000) NOT NULL,
  `visi_misi` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kandidat_event`
--

INSERT INTO `kandidat_event` (`id`, `id_kategori_event_vote`, `nama`, `foto_kandidat`, `visi_misi`) VALUES
(1, 2, 'Ratu Annisa', 'foto_1714585918.png', 'Tidak ada'),
(2, 2, 'Putri Dahlia', 'foto_1714584661.png', 'Tidak Ada'),
(3, 2, 'Putri Mawar', 'foto_1715261180.jpg', 'Tidak Ada'),
(5, 3, 'Muhaimin', 'foto_1714604125.jpg', 'Tidak Ada'),
(6, 3, 'Gibran', 'foto_1714604146.jpg', 'Tidak Ada'),
(7, 3, 'Mahfud', 'foto_1714604198.jpg', 'Tidak Ada'),
(8, 4, 'Jaihan Abidin', 'foto_1715840903.jpg', 'Ingin Menjadikan Literasi semakin berkembang di Sidoarjo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_event_vote`
--

CREATE TABLE `kategori_event_vote` (
  `id` int(11) NOT NULL,
  `nama_event` varchar(1000) NOT NULL,
  `deskripsi` varchar(2000) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_event_vote`
--

INSERT INTO `kategori_event_vote` (`id`, `nama_event`, `deskripsi`, `created_date`) VALUES
(2, 'Putri Indonesia', 'Putri Indonesia Region Sidoarjo', '2024-05-09 12:40:26'),
(3, 'Pemilu 2024', 'Pemilu diselenggarakan untuk memilih pemimpin negara ditahun 2024', '0000-00-00 00:00:00'),
(4, 'Duta Literasi', 'Duta Literasi Sidoarjo', '2024-05-06 18:39:32'),
(6, 'Duta Pariwisata', 'Duta Pariwisata Sidoarjo', '2024-05-09 13:01:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `no_inv` varchar(20) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status_validasi` tinyint(1) DEFAULT 0,
  `jumlah_token` int(11) DEFAULT NULL,
  `nominal_uang` int(11) NOT NULL,
  `notifikasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_user`, `no_inv`, `bukti_pembayaran`, `status_validasi`, `jumlah_token`, `nominal_uang`, `notifikasi`) VALUES
(11, 7, '2404505Q4BGRP8', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce76.png', 1, 12, 11500, 0),
(12, 7, '2405505Q4HGRP9', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce77.png', 1, 12, 12000, 0),
(13, 7, '2404543Q4BGRP6', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce78.png', 1, 10, 10000, 0),
(14, 7, '2484533Z4BGRP6', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce79.png', 1, 10, 10000, 0),
(15, 7, '2404505Q4BGRP4', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce710.png', 1, 10, 10000, 0),
(16, 7, '2404505Q4BGRP3', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce711.png', 1, 6, 6000, 0),
(17, 7, '2404505Q4BGGG6', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce7111.png', 1, 10, 10000, 0),
(18, 7, '2404505Q4AGGG7', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce771.png', 1, 10, 10000, 0),
(19, 7, '2404505Q4AGAAD5', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce731.png', 1, 10, 10000, 0),
(20, 7, '2404505Q4AGAHH8', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce721.png', 1, 1, 1000, 0),
(21, 7, '2404505Q4AGAAD5', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce732.png', 1, 1, 1000, 0),
(22, 7, '2404505Q4AGAAD5', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce733.png', 1, 1, 1000, 0),
(23, 7, '2404505Q4BGRP8', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce734.png', 1, 1, 1000, 0),
(24, 11, '2404505Q4AGAAD5', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce735.png', 1, 1, 1000, 0),
(25, 11, '2404543Q4BGRP6', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce761.png', 1, 1, 1000, 0),
(26, 11, '2404505Q4AGAHH8', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce722.png', 1, 1, 1000, 0),
(27, 11, '2404505Q4AGAHH8', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce736.png', 1, 1, 1000, 0),
(28, 12, '241460564BGBH90', 'Screenshot_2024-04-23_132959.png', 1, 20, 20000, 0),
(29, 13, '241460564BGBH10', 'Screenshot_2023-03-06_212031.png', 1, 25, 25000, 0),
(30, 14, '241460564BGBH10', 'Screenshot_2023-03-06_211715.png', 1, 20, 20000, 1),
(31, 14, '241460564BGBH10', 'Screenshot_2023-03-06_2117151.png', 1, 20, 20000, 1),
(32, 14, '241460564BGBH10', 'Screenshot_2023-03-06_2117152.png', 1, 20, 20000, 1),
(33, 14, '241460564BGBH10', 'Screenshot_2023-03-06_2117153.png', 0, 20, 20000, 0),
(34, 14, '241460564BGBH10', 'Screenshot_2023-03-06_2117154.png', 1, 20, 20000, 1),
(35, 7, '2414605Q4BGBH7', 'qrcode_104350259_92cec2cef78fc9decc1b1ebecb718ce737.png', 1, 10, 10000, 1),
(36, 12, '890979', 'cczcz1.png', 0, 100, 100000, 0),
(37, 10, '24576SHJABBHAADD32DA', '_2fe7da5e-f474-403d-b57d-ef4889aab1ad11.jpg', 1, 20, 20000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `userv`
--

CREATE TABLE `userv` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `token` int(11) DEFAULT 0,
  `email` varchar(1000) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `pertanyaan` varchar(2000) NOT NULL,
  `jawaban` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `userv`
--

INSERT INTO `userv` (`id_user`, `username`, `password`, `token`, `email`, `nama`, `no_hp`, `tgl_lahir`, `pertanyaan`, `jawaban`) VALUES
(7, 'jeabede', 'jehanabeden', 98, 'jeabede@gmail.com', 'Jaihan Abidin', '085604015383', '2002-09-11', 'Hobi?', 'Editing'),
(8, 'bian', 'feb123', 40, 'bianajaa27@gmail.com', 'M Febryansyah Hadi Putra', '081234540362', '2003-02-14', 'Makanan Favorit?', 'Ketoprak'),
(10, 'alfian', 'alam123', 20, 'aalvian17@gmail.com', 'Alfian Bahrul Alam', '081315489732', '2002-05-25', 'Apa makanan favorit Anda?', 'Ketoprak'),
(11, 'reza', 'rez123', 0, 'rezaaa@gmail.com', 'Reza Arap Oktavio', '0865567656545', '2024-05-02', 'Apa makanan favorit Anda?', 'Balado'),
(12, 'bianaja', '1122334455', 16, 'brianaja77889@gmail.com', 'bryan', '081234540362', '2003-02-14', 'Apa warna favorit Anda?', 'hitam'),
(13, 'bisma', 'bisma123', 25, 'grenjel123@gmail.com', 'bisma', '081234540342', '2024-05-15', 'Apa nama hewan peliharaan pertama Anda?', 'asu'),
(14, 'hqq', 'hqq123', 80, 'hqqgans123@gmail.com', 'hqq', '081216184336', '2024-05-16', 'Apa makanan favorit Anda?', 'babi guling');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_admin`
--

CREATE TABLE `user_admin` (
  `id_admin` int(11) NOT NULL,
  `username_adm` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_admin`
--

INSERT INTO `user_admin` (`id_admin`, `username_adm`, `password`) VALUES
(2, 'admin', '$2y$10$NWIJzf4C8WopdNfiuCDYxugEO3jG6/hL4hqQafBCFG.F5Qv8zIduK'),
(3, 'jeabede', '$2y$10$ASo/xJfIagQ7s14e41ajgurX5RHttBwfFPUykpL4zIGYROtjB7Rue');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voting`
--

CREATE TABLE `voting` (
  `id_voting` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kandidat` int(11) DEFAULT NULL,
  `id_kategori_event_vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `voting`
--

INSERT INTO `voting` (`id_voting`, `id_user`, `id_kandidat`, `id_kategori_event_vote`) VALUES
(38, 7, 8, 4),
(39, 7, 8, 4),
(40, 7, 5, 3),
(41, 7, 2, 2),
(42, 7, 5, 3),
(43, 7, 8, 4),
(44, 8, 5, 3),
(45, 8, 1, 2),
(46, 8, 8, 4),
(47, 8, 6, 3),
(48, 8, 7, 3),
(49, 8, 8, 4),
(50, 8, 8, 4),
(51, 7, 5, 3),
(52, 7, 8, 4),
(53, 7, 3, 2),
(55, 8, 3, 2),
(58, 11, 1, 2),
(59, 11, 1, 2),
(60, 11, 5, 3),
(61, 11, 8, 4),
(62, 7, 1, 2),
(63, 7, 1, 2),
(64, 12, 1, 2),
(65, 7, 8, 4),
(66, 7, 1, 2),
(67, 12, 1, 2),
(68, 12, 8, 4),
(69, 12, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kandidat_event`
--
ALTER TABLE `kandidat_event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_event_vote`
--
ALTER TABLE `kategori_event_vote`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `userv`
--
ALTER TABLE `userv`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`id_voting`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kandidat` (`id_kandidat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kandidat_event`
--
ALTER TABLE `kandidat_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kategori_event_vote`
--
ALTER TABLE `kategori_event_vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `userv`
--
ALTER TABLE `userv`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `voting`
--
ALTER TABLE `voting`
  MODIFY `id_voting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `userv` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `voting`
--
ALTER TABLE `voting`
  ADD CONSTRAINT `voting_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `userv` (`id_user`),
  ADD CONSTRAINT `voting_ibfk_new` FOREIGN KEY (`id_kandidat`) REFERENCES `kandidat_event` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
