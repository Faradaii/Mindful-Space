-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2023 pada 07.06
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mindfulspace`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `status` enum('selesai','menunggu','konsultasi') NOT NULL,
  `keluhan` varchar(500) NOT NULL,
  `waktu` int(2) DEFAULT NULL,
  `tanggal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chats`
--

CREATE TABLE `chats` (
  `id_chat` int(11) NOT NULL,
  `isi_chat` varchar(200) NOT NULL,
  `id_from` int(11) NOT NULL,
  `id_to` int(11) NOT NULL,
  `referensi` int(20) NOT NULL,
  `time` varchar(10) NOT NULL,
  `tanggal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokters`
--

CREATE TABLE `dokters` (
  `id_dokter` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `historychat`
--

CREATE TABLE `historychat` (
  `id` int(11) NOT NULL,
  `id_from` int(11) NOT NULL,
  `id_to` int(11) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `keluhan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `jeniskelamin` enum('Laki - Laki','Perempuan') NOT NULL DEFAULT 'Laki - Laki',
  `umur` int(11) NOT NULL,
  `url_image` varchar(200) NOT NULL DEFAULT '../uploads/user/profile-user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`id`, `id_user`, `namalengkap`, `jeniskelamin`, `umur`, `url_image`) VALUES
(1, 1, 'admin', 'Laki - Laki', 0, '../uploads/user/profile-user.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `newspaper`
--

CREATE TABLE `newspaper` (
  `id` int(11) NOT NULL,
  `url_image` varchar(200) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(175) NOT NULL,
  `link` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `newspaper`
--

INSERT INTO `newspaper` (`id`, `url_image`, `judul`, `deskripsi`, `link`) VALUES
(1, 'https://img.freepik.com/free-photo/man-jump-through-gaps-hills_1150-19693.jpg?size=626&ext=jpg&uid=R82435641&ga=GA1.2.303861152.1673342395&semt=sph', 'Menemukan Makna dalam Keadaan Sulit', 'Dalam kehidupan, di tengah ketidakpastian dan keputusasaan, ada sebuah kekuatan yang mampu mengubah persepsi kita', 'https://bit.ly/artikel-mindfulspace-1'),
(2, 'https://img.freepik.com/free-photo/sportswomen-running-sunset_23-2147600438.jpg?size=626&ext=jpg&uid=R82435641&ga=GA1.2.303861152.1673342395&semt=sph', 'Keajaiban Olahraga dan Kesehatan Mental', 'Ketika terlibat dalam olahraga, kita melepaskan endorfin, hormon alami yang meningkatkan suasana hati. ', 'https://bit.ly/artikel-mindfulspace-2'),
(3, 'https://img.freepik.com/free-photo/front-view-woman-working-as-economist_23-2150167275.jpg?size=626&ext=jpg&uid=R82435641&ga=GA1.2.303861152.1673342395&semt=ais', 'Keseimbangan Hidup untuk Kesehatan Mental', 'Keseimbangan hidup adalah kunci untuk menjaga kesehatan mental yang optimal. ', 'https://bit.ly/artikel-mindfulspace-3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(11) NOT NULL,
  `pertanyaan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `pertanyaan`) VALUES
(1, 'Apakah Anda merasa kehilangan minat atau kegairahan dalam melakukan kegiatan yang biasanya Anda nikmati?'),
(2, 'Apakah Anda sering merasa sedih, hampa, atau putus asa tanpa alasan yang jelas?'),
(3, 'Apakah Anda merasa tertekan atau cemas secara konstan tanpa dapat mengendalikannya?'),
(4, 'Apakah Anda merasa terisolasi sosial dan kesulitan dalam menjalin hubungan dengan orang lain?'),
(5, 'Apakah Anda sering merasa lelah secara fisik dan mental tanpa adanya penyebab yang jelas?'),
(6, 'Apakah Anda mengalami gangguan tidur seperti kesulitan tidur, terbangun secara berulang, atau tidur berlebihan?'),
(7, 'Apakah Anda sering merasa gelisah, tidak tenang, atau mudah marah tanpa alasan yang jelas?'),
(8, 'Apakah Anda mengalami perubahan berat badan yang signifikan tanpa melakukan perubahan dalam pola makan atau aktivitas fisik?'),
(9, 'Apakah Anda memiliki pikiran yang gelap, seperti ingin melukai diri sendiri atau merasa hidup tidak berarti?'),
(10, 'Apakah Anda merasa kesulitan berkonsentrasi, mengingat informasi, atau membuat keputusan?'),
(11, 'Apakah Anda sering mengalami perubahan suasana hati yang tiba-tiba dan intens, seperti perasaan sedih yang mendalam atau kebahagiaan yang berlebihan?'),
(12, 'Apakah Anda merasa kehilangan motivasi atau harapan untuk masa depan, merasa tidak berdaya atau tidak berarti?');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` enum('admin','dokter','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indeks untuk tabel `dokters`
--
ALTER TABLE `dokters`
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `historychat`
--
ALTER TABLE `historychat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_from` (`id_from`);

--
-- Indeks untuk tabel `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `newspaper`
--
ALTER TABLE `newspaper`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `chats`
--
ALTER TABLE `chats`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `historychat`
--
ALTER TABLE `historychat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `newspaper`
--
ALTER TABLE `newspaper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `antrian_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `dokters`
--
ALTER TABLE `dokters`
  ADD CONSTRAINT `dokters_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `dokters_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `identitas` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `historychat`
--
ALTER TABLE `historychat`
  ADD CONSTRAINT `historychat_ibfk_1` FOREIGN KEY (`id_from`) REFERENCES `identitas` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `identitas`
--
ALTER TABLE `identitas`
  ADD CONSTRAINT `identitas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
