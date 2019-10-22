-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Okt 2019 pada 23.23
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discuss`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(25) NOT NULL,
  `id_video` int(11) NOT NULL,
  `isi_comment` varchar(50) NOT NULL,
  `username` varchar(225) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `image`
--

CREATE TABLE `image` (
  `id_image` int(5) NOT NULL,
  `nama_image` varchar(255) NOT NULL,
  `deskripsi_image` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `image`
--

INSERT INTO `image` (`id_image`, `nama_image`, `deskripsi_image`, `username`) VALUES
(1, 'bg.jpg', 'My Design Picture', 'Haris Angriawan'),
(2, '9418315_774b894d-0668-4c8d-bf7c-4ab6bbee8c98.jpg', 'Kamera Terbaru Keren', 'Irwan Saputra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `no_telepon`, `jenis_kelamin`, `email`, `password`, `foto_profil`) VALUES
(1, 'Haris Angriawan', 'Jl. Mangga', '082384383680', 'Laki-Laki', '1000@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'user.png'),
(2, 'Irwan Saputra', 'Jl.Condong Catur', '08223332444', 'Laki-Laki', '12@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id_video` int(25) NOT NULL,
  `nama_video` varchar(100) NOT NULL,
  `deskripsi_video` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`id_video`, `nama_video`, `deskripsi_video`, `username`) VALUES
(1, 'Instagram.mp4', 'Keren', 'Haris Angriawan'),
(2, '48171402_2251681351769921_7920038642943262720_n.mp4', 'Youtube Rewind', 'Irwan Saputra');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indeks untuk tabel `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
