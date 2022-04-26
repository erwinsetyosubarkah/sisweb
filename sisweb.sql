-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 08:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` bigint(100) NOT NULL,
  `id_siswa` varchar(255) NOT NULL,
  `id_mata_pelajaran` int(11) NOT NULL,
  `id_agenda_mengajar` int(11) NOT NULL,
  `kehadiran_absensi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `id_siswa`, `id_mata_pelajaran`, `id_agenda_mengajar`, `kehadiran_absensi`) VALUES
(9, 'SIS00001', 2, 7, 'Hadir'),
(10, 'SIS00002', 2, 7, 'Hadir'),
(11, 'SIS00003', 2, 7, 'Hadir'),
(12, 'SIS00004', 2, 7, 'Ijin'),
(13, 'SIS00005', 2, 7, 'Hadir'),
(14, 'SIS00006', 2, 7, 'Hadir'),
(15, 'SIS00007', 2, 7, 'Hadir'),
(16, 'SIS00008', 2, 7, 'Hadir'),
(17, 'SIS00009', 2, 7, 'Hadir'),
(18, 'SIS00010', 2, 7, 'Hadir'),
(19, 'SIS00011', 2, 7, 'Hadir'),
(20, 'SIS00012', 2, 7, 'Hadir'),
(21, 'SIS00013', 2, 7, 'Hadir'),
(22, 'SIS00014', 2, 7, 'Ijin'),
(23, 'SIS00015', 2, 7, 'Hadir'),
(24, 'SIS00001', 4, 8, 'Ijin'),
(25, 'SIS00002', 4, 8, 'Hadir'),
(26, 'SIS00003', 4, 8, 'Hadir'),
(27, 'SIS00004', 4, 8, 'Hadir'),
(28, 'SIS00005', 4, 8, 'Hadir'),
(29, 'SIS00006', 4, 8, 'Hadir'),
(30, 'SIS00007', 4, 8, 'Sakit'),
(31, 'SIS00008', 4, 8, 'Hadir'),
(32, 'SIS00009', 4, 8, 'Hadir'),
(33, 'SIS00010', 4, 8, 'Hadir'),
(34, 'SIS00011', 4, 8, 'Hadir'),
(35, 'SIS00012', 4, 8, 'Ijin'),
(36, 'SIS00013', 4, 8, 'Hadir'),
(37, 'SIS00014', 4, 8, 'Hadir'),
(38, 'SIS00015', 4, 8, 'Hadir'),
(39, 'SIS00001', 5, 9, 'Hadir'),
(40, 'SIS00002', 5, 9, 'Hadir'),
(41, 'SIS00003', 5, 9, 'Hadir'),
(42, 'SIS00004', 5, 9, 'Hadir'),
(43, 'SIS00005', 5, 9, 'Hadir'),
(44, 'SIS00006', 5, 9, 'Ijin'),
(45, 'SIS00007', 5, 9, 'Sakit'),
(46, 'SIS00008', 5, 9, 'Hadir'),
(47, 'SIS00009', 5, 9, 'Hadir'),
(48, 'SIS00010', 5, 9, 'Ijin'),
(49, 'SIS00011', 5, 9, 'Hadir'),
(50, 'SIS00012', 5, 9, 'Hadir'),
(51, 'SIS00013', 5, 9, 'Hadir'),
(52, 'SIS00014', 5, 9, 'Hadir'),
(53, 'SIS00015', 5, 9, 'Hadir'),
(54, 'SIS00001', 6, 10, 'Ijin'),
(55, 'SIS00002', 6, 10, 'Ijin'),
(56, 'SIS00003', 6, 10, 'Hadir'),
(57, 'SIS00004', 6, 10, 'Hadir'),
(58, 'SIS00005', 6, 10, 'Ijin'),
(59, 'SIS00006', 6, 10, 'Hadir'),
(60, 'SIS00007', 6, 10, 'Hadir'),
(61, 'SIS00008', 6, 10, 'Hadir'),
(62, 'SIS00009', 6, 10, 'Hadir'),
(63, 'SIS00010', 6, 10, 'Hadir'),
(64, 'SIS00011', 6, 10, 'Hadir'),
(65, 'SIS00012', 6, 10, 'Hadir'),
(66, 'SIS00013', 6, 10, 'Hadir'),
(67, 'SIS00014', 6, 10, 'Hadir'),
(68, 'SIS00015', 6, 10, 'Sakit'),
(69, 'SIS00001', 6, 11, 'Hadir'),
(70, 'SIS00002', 6, 11, 'Hadir'),
(71, 'SIS00003', 6, 11, 'Hadir'),
(72, 'SIS00004', 6, 11, 'Hadir'),
(73, 'SIS00005', 6, 11, 'Sakit'),
(74, 'SIS00006', 6, 11, 'Hadir'),
(75, 'SIS00007', 6, 11, 'Hadir'),
(76, 'SIS00008', 6, 11, 'Hadir'),
(77, 'SIS00009', 6, 11, 'Hadir'),
(78, 'SIS00010', 6, 11, 'Hadir'),
(79, 'SIS00011', 6, 11, 'Hadir'),
(80, 'SIS00012', 6, 11, 'Hadir'),
(81, 'SIS00013', 6, 11, 'Hadir'),
(82, 'SIS00014', 6, 11, 'Hadir'),
(83, 'SIS00015', 6, 11, 'Hadir'),
(84, 'SIS00001', 7, 12, 'Hadir'),
(85, 'SIS00002', 7, 12, 'Ijin'),
(86, 'SIS00003', 7, 12, 'Hadir'),
(87, 'SIS00004', 7, 12, 'Hadir'),
(88, 'SIS00005', 7, 12, 'Hadir'),
(89, 'SIS00006', 7, 12, 'Sakit'),
(90, 'SIS00007', 7, 12, 'Hadir'),
(91, 'SIS00008', 7, 12, 'Hadir'),
(92, 'SIS00009', 7, 12, 'Hadir'),
(93, 'SIS00010', 7, 12, 'Hadir'),
(94, 'SIS00011', 7, 12, 'Hadir'),
(95, 'SIS00012', 7, 12, 'Hadir'),
(96, 'SIS00013', 7, 12, 'Hadir'),
(97, 'SIS00014', 7, 12, 'Hadir'),
(98, 'SIS00015', 7, 12, 'Hadir'),
(99, 'SIS00001', 8, 13, 'Hadir'),
(100, 'SIS00002', 8, 13, 'Ijin'),
(101, 'SIS00003', 8, 13, 'Hadir'),
(102, 'SIS00004', 8, 13, 'Hadir'),
(103, 'SIS00005', 8, 13, 'Hadir'),
(104, 'SIS00006', 8, 13, 'Hadir'),
(105, 'SIS00007', 8, 13, 'Hadir'),
(106, 'SIS00008', 8, 13, 'Hadir'),
(107, 'SIS00009', 8, 13, 'Hadir'),
(108, 'SIS00010', 8, 13, 'Hadir'),
(109, 'SIS00011', 8, 13, 'Hadir'),
(110, 'SIS00012', 8, 13, 'Hadir'),
(111, 'SIS00013', 8, 13, 'Hadir'),
(112, 'SIS00014', 8, 13, 'Hadir'),
(113, 'SIS00015', 8, 13, 'Hadir'),
(114, 'SIS00001', 9, 14, 'Hadir'),
(115, 'SIS00002', 9, 14, 'Hadir'),
(116, 'SIS00003', 9, 14, 'Hadir'),
(117, 'SIS00004', 9, 14, 'Hadir'),
(118, 'SIS00005', 9, 14, 'Hadir'),
(119, 'SIS00006', 9, 14, 'Hadir'),
(120, 'SIS00007', 9, 14, 'Hadir'),
(121, 'SIS00008', 9, 14, 'Hadir'),
(122, 'SIS00009', 9, 14, 'Hadir'),
(123, 'SIS00010', 9, 14, 'Hadir'),
(124, 'SIS00011', 9, 14, 'Hadir'),
(125, 'SIS00012', 9, 14, 'Hadir'),
(126, 'SIS00013', 9, 14, 'Hadir'),
(127, 'SIS00014', 9, 14, 'Hadir'),
(128, 'SIS00015', 9, 14, 'Ijin'),
(129, 'SIS00001', 10, 15, 'Hadir'),
(130, 'SIS00002', 10, 15, 'Hadir'),
(131, 'SIS00003', 10, 15, 'Hadir'),
(132, 'SIS00004', 10, 15, 'Hadir'),
(133, 'SIS00005', 10, 15, 'Hadir'),
(134, 'SIS00006', 10, 15, 'Hadir'),
(135, 'SIS00007', 10, 15, 'Hadir'),
(136, 'SIS00008', 10, 15, 'Hadir'),
(137, 'SIS00009', 10, 15, 'Hadir'),
(138, 'SIS00010', 10, 15, 'Hadir'),
(139, 'SIS00011', 10, 15, 'Hadir'),
(140, 'SIS00012', 10, 15, 'Ijin'),
(141, 'SIS00013', 10, 15, 'Hadir'),
(142, 'SIS00014', 10, 15, 'Hadir'),
(143, 'SIS00015', 10, 15, 'Hadir'),
(144, 'SIS00001', 11, 16, 'Hadir'),
(145, 'SIS00002', 11, 16, 'Ijin'),
(146, 'SIS00003', 11, 16, 'Hadir'),
(147, 'SIS00004', 11, 16, 'Hadir'),
(148, 'SIS00005', 11, 16, 'Hadir'),
(149, 'SIS00006', 11, 16, 'Hadir'),
(150, 'SIS00007', 11, 16, 'Ijin'),
(151, 'SIS00008', 11, 16, 'Sakit'),
(152, 'SIS00009', 11, 16, 'Hadir'),
(153, 'SIS00010', 11, 16, 'Ijin'),
(154, 'SIS00011', 11, 16, 'Sakit'),
(155, 'SIS00012', 11, 16, 'Hadir'),
(156, 'SIS00013', 11, 16, 'Sakit'),
(157, 'SIS00014', 11, 16, 'Hadir'),
(158, 'SIS00015', 11, 16, 'Hadir'),
(159, 'SIS00001', 12, 17, 'Hadir'),
(160, 'SIS00002', 12, 17, 'Hadir'),
(161, 'SIS00003', 12, 17, 'Hadir'),
(162, 'SIS00004', 12, 17, 'Hadir'),
(163, 'SIS00005', 12, 17, 'Ijin'),
(164, 'SIS00006', 12, 17, 'Hadir'),
(165, 'SIS00007', 12, 17, 'Hadir'),
(166, 'SIS00008', 12, 17, 'Hadir'),
(167, 'SIS00009', 12, 17, 'Hadir'),
(168, 'SIS00010', 12, 17, 'Hadir'),
(169, 'SIS00011', 12, 17, 'Hadir'),
(170, 'SIS00012', 12, 17, 'Hadir'),
(171, 'SIS00013', 12, 17, 'Hadir'),
(172, 'SIS00014', 12, 17, 'Hadir'),
(173, 'SIS00015', 12, 17, 'Hadir'),
(174, 'SIS00001', 2, 18, 'Hadir'),
(175, 'SIS00002', 2, 18, 'Hadir'),
(176, 'SIS00003', 2, 18, 'Hadir'),
(177, 'SIS00004', 2, 18, 'Hadir'),
(178, 'SIS00005', 2, 18, 'Hadir'),
(179, 'SIS00006', 2, 18, 'Hadir'),
(180, 'SIS00007', 2, 18, 'Hadir'),
(181, 'SIS00008', 2, 18, 'Hadir'),
(182, 'SIS00009', 2, 18, 'Hadir'),
(183, 'SIS00010', 2, 18, 'Hadir'),
(184, 'SIS00011', 2, 18, 'Hadir'),
(185, 'SIS00012', 2, 18, 'Hadir'),
(186, 'SIS00013', 2, 18, 'Hadir'),
(187, 'SIS00014', 2, 18, 'Hadir'),
(188, 'SIS00015', 2, 18, 'Hadir'),
(189, 'SIS00001', 4, 19, 'Hadir'),
(190, 'SIS00002', 4, 19, 'Hadir'),
(191, 'SIS00003', 4, 19, 'Hadir'),
(192, 'SIS00004', 4, 19, 'Hadir'),
(193, 'SIS00005', 4, 19, 'Hadir'),
(194, 'SIS00006', 4, 19, 'Hadir'),
(195, 'SIS00007', 4, 19, 'Hadir'),
(196, 'SIS00008', 4, 19, 'Hadir'),
(197, 'SIS00009', 4, 19, 'Hadir'),
(198, 'SIS00010', 4, 19, 'Hadir'),
(199, 'SIS00011', 4, 19, 'Hadir'),
(200, 'SIS00012', 4, 19, 'Hadir'),
(201, 'SIS00013', 4, 19, 'Hadir'),
(202, 'SIS00014', 4, 19, 'Hadir'),
(203, 'SIS00015', 4, 19, 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id_administrator` varchar(255) NOT NULL,
  `nik_administrator` varchar(255) NOT NULL,
  `nama_administrator` varchar(255) NOT NULL,
  `jenis_kelamin_administrator` enum('Laki-laki','Perempuan') NOT NULL,
  `email_administrator` varchar(255) NOT NULL,
  `no_telp_administrator` varchar(255) NOT NULL,
  `alamat_administrator` text NOT NULL,
  `foto_administrator` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id_administrator`, `nik_administrator`, `nama_administrator`, `jenis_kelamin_administrator`, `email_administrator`, `no_telp_administrator`, `alamat_administrator`, `foto_administrator`) VALUES
('ADM00005', '98578467', 'Iswatun Hasanah', 'Perempuan', 'iswatun@gmail.com', '08998225421', 'Bekasi', '109160640154_8h9obpgv6xcbyc3dexl2xjrq9q8q30t6wfjajvcfmhuadojghf6cchb2g06ot2hnfrcgaqfe5vxbl612orqw9itdhjp086arl19m.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `agenda_mengajar`
--

CREATE TABLE `agenda_mengajar` (
  `id_agenda_mengajar` int(11) NOT NULL,
  `id_tahun_pelajaran` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_kompetensi_dasar` int(11) NOT NULL,
  `hari_agenda_mengajar` varchar(255) NOT NULL,
  `tanggal_agenda_mengajar` date NOT NULL,
  `pertemuan_ke_agenda_mengajar` varchar(255) NOT NULL,
  `materi_agenda_mengajar` text NOT NULL,
  `keterangan_agenda_mengajar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agenda_mengajar`
--

INSERT INTO `agenda_mengajar` (`id_agenda_mengajar`, `id_tahun_pelajaran`, `id_semester`, `id_kelas`, `id_kompetensi_dasar`, `hari_agenda_mengajar`, `tanggal_agenda_mengajar`, `pertemuan_ke_agenda_mengajar`, `materi_agenda_mengajar`, `keterangan_agenda_mengajar`) VALUES
(7, 1, 1, 4, 3, 'Senin', '2020-12-21', '1', 'Pengetahuan\n', 'Harian UTS'),
(8, 1, 1, 4, 6, 'Senin', '2020-12-21', '1', 'Pengetahuan\n', 'Harian UTS'),
(9, 1, 1, 4, 9, 'Selasa', '2020-12-22', '1', '', 'Harian UTS'),
(10, 1, 1, 4, 12, 'Selasa', '2020-12-22', '1', '', 'Harian UTS'),
(11, 1, 1, 4, 12, 'Senin', '2020-12-21', '1', '', 'Harian UTS'),
(12, 1, 1, 4, 13, 'Senin', '2020-12-21', '1', '', 'Harian UTS'),
(13, 1, 1, 4, 14, 'Selasa', '2020-12-22', '1', '', 'Harian UTS'),
(14, 1, 1, 4, 15, 'Selasa', '2020-12-22', '1', '', 'Harian UTS'),
(15, 1, 1, 4, 16, 'Senin', '2020-12-21', '1', '', 'Harian UTS'),
(16, 1, 1, 4, 17, 'Jumat', '2020-12-18', '1', '', 'Harian UTS'),
(17, 1, 1, 4, 18, 'Jumat', '2020-12-18', '1', '', 'Harian UTS'),
(18, 1, 1, 4, 4, 'Kamis', '2020-12-24', '2', '', 'Harian Semester'),
(19, 1, 1, 4, 7, 'Kamis', '2020-12-24', '2', '', 'Harian Semester');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` bigint(20) NOT NULL,
  `judul_artikel` varchar(255) NOT NULL,
  `isi_artikel` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `gambar_sampul` varchar(255) NOT NULL,
  `id_kategori_artikel` int(11) NOT NULL,
  `status_artikel` enum('Umum','Khusus') NOT NULL,
  `id_author` varchar(255) NOT NULL,
  `level_author` enum('Administrator','Staff','Guru') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `isi_artikel`, `tgl_upload`, `gambar_sampul`, `id_kategori_artikel`, `status_artikel`, `id_author`, `level_author`) VALUES
(7, 'Buka Potensi Kerja Sama Pendidikan, Nadiem Makarim Kunjungi Singapura', '<p><strong>Liputan6.com, Jakarta -</strong>&nbsp;Menteri Pendidikan dan Kebudayaan (Mendikbud)&nbsp;Nadiem Makarim&nbsp;bertolak ke Singapura untuk mengembangkan dunia pendidikan Indonesia, dengan belajar mengenai pendidikan tinggi di sana.</p>\n\n<p>Dia menuturkan, dirinya bertemu dengan perwakilan sejumlah perguruan tinggi terbaik di sana. Nadiem belajar dari para praktisi mengenai resep menjadikan perguruan tinggi terbaik di dunia.</p>\n\n<p>Kami membahas apa yang menjadikan mereka bagian dari universitas terbaik dunia, dan potensi kerjasama pendidikan tinggi antar kedua negara,&quot; tulis&nbsp;Nadiem Makarim&nbsp;dalam jejaring sosial<em>&nbsp;Instagram</em>&nbsp;di&nbsp;<em>@nadiemmakarim</em>, dikutip pada Minggu (20/12/2020).</p>\n\n<p>Menurut dia, dengan apa yang dilakukannya di Singapura, bisa membuat Indonesia terus belajar mengenai cara untuk meramu perguruan tinggi terbaik sekelas internasional agar banyak terwujud di Tanah Air.</p>\n\n<p>&quot;Semoga kita dapat terus belajar mengenai praktik-praktik baik dari luar dan dalam negeri untuk kemajuan pendidikan Indonesia,&quot; jelas&nbsp;Nadiem Makarim.</p>\n\n<p>&nbsp;</p>\n\n<h2>Bagian Diplomasi</h2>\n\n<p>Sementara, Dirjen Pendidikan Tinggi (Dikti) Kemendikbud, Nizam menjelaskan, kunjungan dinas ke Singapura merupakan salah satu bagian dari diplomasi guna membangun kerja sama yang lebih intens untuk membangun kualitas pendidikan di Indonesia.</p>\n\n<p>&quot;Kunjungan dinas Mendikbud ke NUS. Bagian dari diplomasi Mendikbud untuk membangun kerjasama yang lebih erat antara kedua negara. Kemajuan Indonesia merupakan kunci utama kemajuan Singapura dan pembangunan ASEAN yang berkelanjutan,&quot; jelas dia.</p>\n\n<p>Dalam kunjungan tersebut, pihaknya berhasil meneken kerja sama dengan Universitas Nasional Singapura (NUS) mengenai pungutan kewirausahaan dan pengembangan startup di tanah air.</p>\n\n<p>&quot;Tak ada pilihan lain kecuali hubungan yang lebih erat dalam pengembangan sumber daya manusia di kedua negara. Persahabatan antar mahasiswa kedua negara melalui program-program bersama antara Perguruan Tinggi Singapura dan Indonesia,&quot; kata Nizam.</p>\n', '2020-12-20', 'ezgif_com-gif-maker.jpg', 1, 'Umum', 'ADM00005', 'Administrator'),
(8, 'Hybrid Learning', '<p><em><strong>KOMPAS.com</strong></em> -&nbsp;Januari 2021 Kemendikbud mengizinkan sekolah kembali menyelenggarakan pembelajaran tatap muka. Kebijakan ini tidak lepas munculnya keluh kesah dalam pelaksanaan pembelajaran jarak jauh ( PJJ). Berbagai penelitian juga menyebut ketidakefektifan PJJ yang mengakibatkan berbagai masalah, terutama psikososial siswa. Meski demikian, pembelajaran tatap muka masih menyisakan kekhawatiran di lingkungan pendidikan mengingat pembukaan tatap muka di awal tahun 2021 sebelumnya diikuti gelaran pilkada dan juga liburan panjang Natal dan Tahun Baru. Banyak pihak merasa khawatir, jika tidak disiapkan secara baik, tatap muka pembelajaran di Januari 2021 berpotensi menjadi kluster baru penyebaran Covid-19. Salah satu solusi yang ditawarkan guna meredam kekhawatiran tersebut adalah dengan menerapkan pembelajaran tatap muka berbasis sistem hybrid learning. Baca juga: KBM Tatap Muka di Bogor Dilakukan Bertahap dengan Pola Hybrid Learning Mengenal &quot; Hybrid Learning&quot; Hybrid learning merupakan pembelajaran dengan sistem daring yang dikombinasikan dengan pertemuan tatap muka untuk beberapa jam. Hybrid learning dilakukan guna meminimalisir dampak psikososial siswa. Ada juga yang menganggap hybrid learning sama halnya dengan blended learning. Bentuk pembelajarannya merupakan kombinasi antara pembelajaran tatap muka dengan pembelajaran daring. Hybrid yang dimaksud adalah pembelajaran tatap muka dilakukan secara rotasi dengan jumlah siswa 50 persen. Misalnya, dari jumlah siswa 32 orang menjadi 16 orang per pertemuan tatap muka di kelas. Sisanya mengikuti kelas pembelajaran daring atau luring, dan bergantian.</p>\n\n<p>Pembelajaran tatap muka dilakukan untuk memberi kesempatan bagi anak-anak yang kesulitan melakukan PJJ. Orangtua juga dipersilahkan memilih untuk moda pembelajaran untuk anaknya, bisa mengikuti tatap muka, pembelajaran daring, atau luring. Untuk siswa yang kesulitan mengakses internet, mereka bisa datang 2-3 kali seminggu ke sekolah belajar dengan gurunya. Waktunya disesuai dengan kesepakatan bersama dan wajib mengutamakan keamanan dan kesehatan. Lima kunci &quot; Hybrid Learning&quot; Terdapat lima kunci utama dalam penerapan proses pembelajaran hybrid learning. Dalam penerapannya, hybrid learning menekankan penerapan teori pembelajaran Keller, Gagne, Bloom, Merrill, Clark dan Grey. Apa saja? Live event, diartikan sebagai pembelajaran langsung atau tatap muka yang dilakukan secara sinkronous dalam waktu dan tempat yang sama. Bisa juga waktu yang sama dengan tempat berbeda. Self-paced learning, berarti mengkombinasikannya dengan pembelajaran mandiri yang memungkinkan siswa belajar kapan saja dan dimana saja secara daring. Collaboration, yaitu kolaborasi antara guru dan siswa, juga kolaborasi antar sesama siswa dalam kegiatan belajar mengajar. Assessment, artinya guru harus mampu meracik kombinasi jenis assessment daring atau luring. Bentuknya bisa berupa tes maupun nontes seperti proyek kelas. Performance support materials, yaitu untuk memastikan bahan belajar disiapkan dalam bentuk digital. Tujuannya agar bahan belajar tersebut dapat dengan mudah diakses oleh siswa, baik secara daring maupun luring. Baca juga: [HOAKS] Siswa Wajib Swab Test Sebelum Sekolah Tatap Muka Menerapkan hybrid learning Penerapan hybrid learning sama seperti dengan pembelajaran yang dilakukan selama ini, yaitu dimulai dengan persiapan. Persiapan hybrid learning dimulai dengan melakukan analisis peserta didik, konteks dan konten pembelajaran atau perkuliahan. Hasil dari analisis ini untuk memetakan kompetensi harus dikuasai oleh peserta didik melalui tatap muka secara langsung atau mandiri secara daring. Selanjutnya hasil analisis tersebut dituangkan ke dalam silabus atau rencana pembelajaran. Pelaksanaan hybrid learning dapat dilaksanakan dengan pembagian peserta pembelajaran dalam satu kelas dibagi menjadi dua shift. Untuk minggu pertama misal shift A pembelajaran tatap muka shift B pembelajaran secara daring. Sebaliknya pada minggu kedua shift A pembelajaran secara daring shift B pembelajaran tatap muka. Pembelajaran tatap muka dilakukan secara langsung di dalam kelas. Pembelajaran secara daring dilakukan untuk memfasilitasi interaksi daring dengan menggunakan learning management system (LMS), misal Edmodo, Google Classroom, Google Meet, Zoom Meet, Skype, Whatsapp atau media daring lain. Pembelajaran secara daring real time sebaiknya juga disertai tugas mandiri dan terstruktur. Evaluasi pembelajaran hybrid learning mencakup evaluasi atau hasil capaian pembelajaran untuk mengukur penguasaan kognitif, psikomotorik, dan afektif. Ujian dapat dilakukan secara tata muka di sekolah atau dilakukan secara daring.<br />\n<br />\n&nbsp;</p>\n', '2020-12-22', '5fe086c4403aa.jpeg', 1, 'Umum', 'ADM00005', 'Administrator'),
(9, 'Zenius Luncurkan Platform Manajemen Pembelajaran Gratis untuk Para Guru', '<p><strong>Liputan6.com, Jakarta -</strong>&nbsp;<a href=\"https://www.liputan6.com/tekno/read/4405994/96-siswa-sma-dari-seluruh-indonesia-raih-beasiswa-dari-zenius-dan-telkomsel\" title=\"Zenius \">Zenius&nbsp;</a>baru saja meluncurkan&nbsp;<em>platform</em>&nbsp;manajemen pembelajaran guru yang diberi nama Zenius untuk Guru.</p>\n\n<p>Menurut&nbsp;<em>edtech</em>&nbsp;startup ini,&nbsp;<em>platform</em>&nbsp;tersebut dikembangkan oleh guru&nbsp;dan ditujukan bagi kebutuhan guru dari berbagai mata pelajaran dan segala jenjang pendidikan. Secara garis besar, platform ini hadir untuk mempermudah pengelolaan aktivitas pembelajaran.&nbsp;</p>\n\n<p style=\"text-align:justify\">&quot;Sistem ini hadir sebagai platform<em>&nbsp;co-creation</em>&nbsp;untuk membantu guru melakukan pengajaran, membagikan materi pelajaran, memilah dan menugaskan soal, serta mendapatkan analisis hasil pekerjaan siswa,&quot; tutur Chief of Teachers Initiative Zenius Education, Amanda P. Witdarmono dalam keterangan resmi.</p>\n\n<p style=\"text-align:justify\">Pengembangan&nbsp;<a href=\"https://www.liputan6.com/tekno/read/4172179/zenius-raih-pendanaan-seri-a-dan-tunjuk-ceo-baru\" title=\"Zenius \">Zenius&nbsp;</a>untuk Guru ini juga tidak lepas dari upaya&nbsp;<em>edtech</em>&nbsp;<em>startup</em>&nbsp;ini meningkatkan kompetensi pendidikan Indonesia. Terlebih di masa pandemi ini, para guru menghadapi tantangan melakukan pembelajaran jarak jauh dengan para siswa.</p>\n\n<p>Tidak hanya mencari bahan materi belajar yang menarik, para guru juga harus membuat soal ujian yang cocok dengan tingkat kognitif dan pemahaman siswa.</p>\n\n<p>Belum lagi, mereka perlu mendesain kegiatan belajar mengajar yang menyenangkan, memotivasi, dan mudah diterima, meski tidak berinteraksi langsung dengan siswa.</p>\n\n<p>&quot;Dengan sistem manajemen pembelajaran yang bisa diakses gratis, kami berharap guru-guru bisa memiliki waktu lebih banyak melakukan hal yang mereka kuasai: meningkatkan interaksi pembelajaran berkualitas dengan siswa, sehingga siswa memiliki keterampilan literasi dan numerasi tinggi,&quot; tutur Amanda melanjutkan.</p>\n\n<p>Sebelum diluncurkan,&nbsp;<a href=\"https://www.liputan6.com/tekno/read/4406037/aplikasi-edutech-zenius-kini-layani-lebih-dari-15-juta-pengguna-di-seluruh-indonesia\" title=\"Zenius \">Zenius&nbsp;</a>sendiri sudah membuka akses sistem ini ke lebih dari 6.000 guru di Indonesia. Dengan pemberian akses lebih awal tersebut, perusahaan berharap bisa memperoleh masukan dan menyempurnakan sistem ini.</p>\n\n<p>Melalui Zenius untuk Guru, para guru dapat menciptakan kelas daring (<em>online</em>), mengelola tenggat waktu pekerjaan rumah siswa, hingga membagikan video konsep dari Zenius sebagai materi tambahan.</p>\n\n<p>Kehadiran platform ini pun disambut baik antara lain oleh salah seorang guru dari SMA Gajah Mada Bandar Lampung, Ervina Septiani. Dia menuturkan, platform ini memungkinkan dirinya membuat materi dan soal secara lebih efisien karena memanfaatkan materi dari Zenius sebagai basisnya.</p>\n\n<p>&quot;Kemudian, sistem penilaian otomatisnya benar-benar menghemat waktu. Saya bisa lebih fokus berinteraksi dengan siswa dan mendorong serta mengawasi kemajuan mereka,&quot; tutur Ervina menjelaskan.</p>\n\n<p>Platform Zenius untuk Guru ini dapat langsung diakses secara gratis melalui situs resminya. Para guru yang tertarik menggunakan dan mendaftarkan diri dapat melihat informasi lebih lanjut dari akun media sosial platform ini.</p>\n\n<h2>Zenius Kini Layani Lebih dari 15 Juta Pengguna di Seluruh Indonesia</h2>\n\n<p>Sebelumnya Zenius baru saja mengungkap bahwa penggunanya mengalami peningkatan tinggi saat pandemi Covid-19.&nbsp;</p>\n\n<p>Diungkapkan CEO&nbsp;Zenius&nbsp;Rohan Monga, secara total&nbsp;Zenius&nbsp;melayani lebih dari 15 juta pengguna di Indonesia yang mengakses dari&nbsp;website&nbsp;atau pun aplikasi.</p>\n\n<p>&quot;Selama pandemi, kami menerima jutaan pengguna yang melakukan registrasi,&quot; kata Rohan Monga, dalam acara konferensi pers daring mengenai mengumumkan penerima beasiswa&nbsp;Zenius-Telkomsel, Rabu (11/11/2020) sore.</p>\n\n<p>Rohan menyebut, pihaknya tidak bisa memberikan target pengguna hingga akhir tahun. Pasalnya, misi Zenius adalah untuk membantu menyediakan pendidikan yang lebih baik kepada anak-anak Indonesia dan capaian itu bisa diraih dalam target jangka panjang seperti 4-5 tahun.</p>\n\n<p>&quot;Kami ingin dapat lebih banyak membantu siswa di seluruh Indonesia dengan menghadirkan konten-konten edukasi yang memiliki kualitas tinggi, untuk mendukung anak-anak mendapatkan pendidikan lebih baik,&quot; tuturnya.</p>\n', '2020-12-22', '098544900_1570916468-5_Suasana_Penyampaian_Materi_Literasi_Digital_kepada_Murid.jpg', 1, 'Umum', 'ADM00005', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `judul_foto` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tgl_upload_foto` date NOT NULL,
  `id_author_foto` varchar(255) NOT NULL,
  `level_author_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `judul_foto`, `foto`, `tgl_upload_foto`, `id_author_foto`, `level_author_foto`) VALUES
(3, 'Kegiatan Pramuka', 'WhatsApp_Image_2020-12-22_at_08_59_12.jpeg', '2020-12-22', 'ADM00005', 'Administrator'),
(4, 'Berdo\'a Bersama', 'WhatsApp_Image_2020-12-22_at_08_59_17.jpeg', '2020-12-22', 'ADM00005', 'Administrator'),
(5, 'Guru', 'WhatsApp_Image_2020-12-22_at_08_58_38.jpeg', '2020-12-22', 'ADM00005', 'Administrator'),
(6, 'Study Tour', 'WhatsApp_Image_2020-12-22_at_08_59_13.jpeg', '2020-12-22', 'ADM00005', 'Administrator'),
(7, 'Pembagian Hadiah', 'WhatsApp_Image_2020-12-22_at_08_58_42.jpeg', '2020-12-22', 'ADM00005', 'Administrator'),
(8, 'Pengarahan', 'WhatsApp_Image_2020-12-22_at_08_59_18.jpeg', '2020-12-22', 'ADM00005', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE `gedung` (
  `id_gedung` int(11) NOT NULL,
  `nama_gedung` varchar(255) NOT NULL,
  `jumlah_lantai_gedung` int(11) NOT NULL,
  `panjang_gedung` int(11) NOT NULL,
  `tinggi_gedung` int(11) NOT NULL,
  `lebar_gedung` int(11) NOT NULL,
  `keterangan_gedung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `nama_gedung`, `jumlah_lantai_gedung`, `panjang_gedung`, `tinggi_gedung`, `lebar_gedung`, `keterangan_gedung`) VALUES
(1, 'Gedung A', 2, 100, 50, 50, 'Gedung A');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` varchar(255) NOT NULL,
  `nik_guru` varchar(255) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `jenis_kelamin_guru` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir_guru` varchar(255) NOT NULL,
  `tanggal_lahir_guru` date NOT NULL,
  `nuptk_guru` varchar(255) NOT NULL,
  `status_kepegawaian_guru` varchar(255) NOT NULL,
  `jenis_ptk_guru` varchar(255) NOT NULL,
  `agama_guru` varchar(255) NOT NULL,
  `alamat_jalan_guru` varchar(255) NOT NULL,
  `rt_guru` varchar(5) NOT NULL,
  `rw_guru` varchar(5) NOT NULL,
  `nama_dusun_guru` varchar(255) NOT NULL,
  `desa_kelurahan_guru` varchar(255) NOT NULL,
  `kecamatan_guru` varchar(255) NOT NULL,
  `kabupaten_kota_guru` varchar(255) NOT NULL,
  `provinsi_guru` varchar(255) NOT NULL,
  `kode_pos_guru` varchar(15) NOT NULL,
  `email_guru` varchar(255) NOT NULL,
  `no_telp_guru` varchar(255) NOT NULL,
  `status_keaktifan_guru` varchar(255) NOT NULL,
  `sk_cpns_guru` varchar(255) NOT NULL,
  `tanggal_cpns_guru` date NOT NULL,
  `sk_pengangkatan_guru` varchar(255) NOT NULL,
  `tmt_pengangkatan_guru` date NOT NULL,
  `lembaga_pengangkatan_guru` varchar(255) NOT NULL,
  `golongan_guru` varchar(255) NOT NULL,
  `sumber_gaji_guru` varchar(255) NOT NULL,
  `nama_ibu_kandung_guru` varchar(255) NOT NULL,
  `status_pernikahan_guru` varchar(255) NOT NULL,
  `nama_suami_istri_guru` varchar(255) NOT NULL,
  `nik_suami_istri_guru` varchar(255) NOT NULL,
  `pekerjaan_suami_istri_guru` varchar(255) NOT NULL,
  `tmt_pns_guru` date NOT NULL,
  `npwp_guru` varchar(255) NOT NULL,
  `kewarganegaraan_guru` varchar(255) NOT NULL,
  `foto_guru` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nik_guru`, `nama_guru`, `jenis_kelamin_guru`, `tempat_lahir_guru`, `tanggal_lahir_guru`, `nuptk_guru`, `status_kepegawaian_guru`, `jenis_ptk_guru`, `agama_guru`, `alamat_jalan_guru`, `rt_guru`, `rw_guru`, `nama_dusun_guru`, `desa_kelurahan_guru`, `kecamatan_guru`, `kabupaten_kota_guru`, `provinsi_guru`, `kode_pos_guru`, `email_guru`, `no_telp_guru`, `status_keaktifan_guru`, `sk_cpns_guru`, `tanggal_cpns_guru`, `sk_pengangkatan_guru`, `tmt_pengangkatan_guru`, `lembaga_pengangkatan_guru`, `golongan_guru`, `sumber_gaji_guru`, `nama_ibu_kandung_guru`, `status_pernikahan_guru`, `nama_suami_istri_guru`, `nik_suami_istri_guru`, `pekerjaan_suami_istri_guru`, `tmt_pns_guru`, `npwp_guru`, `kewarganegaraan_guru`, `foto_guru`) VALUES
('GUR00001', '121232750023021', 'Siti Imron Suryati, S. Pd.', 'Perempuan', '', '0000-00-00', '', '', '', 'Islam', '', '', '', '', '', '', '', '', '', '', '', 'Aktif', '', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'undefined'),
('GUR00002', '121232750023012', 'Ir Hj. Mardiyah', 'Perempuan', '', '0000-00-00', '', '', '', 'Islam', '', '', '', '', '', '', '', '', '', '', '', 'Aktif', '', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', '', '', '0000-00-00', '', '', 'undefined'),
('GUR00003', '121232750023002', 'Harismanto, M. Pd. Fis', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
('GUR00004', '121232750023003', 'H. Abd. Sobur, S.Pd.I', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
('GUR00005', '121232750023005', 'Dra. Hj. Maisaroh', 'Perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
('GUR00006', '121232750023006', 'Rahmat Husein, S. Pd.I', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
('GUR00007', '121232750023007', 'Sulistiyono, S. Pd.', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
('GUR00008', '121232750023008', 'Sudardi Eko Saputro, S. Pd.', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
('GUR00009', '121232750023009', 'Ripa&#39;i, M. Ag.', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
('GUR00010', '121232750023010', 'Karnadi, M. Pd.I.', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
('GUR00011', '121232750023011', 'Yeni Yunengsih, S. Pd.', 'Perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
('GUR00012', '121232750023022', 'Harina Mediastanti, S. Pd.', 'Perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
('GUR00013', '121232750023023', 'Neneng Nursaidah, S. Keb.', 'Perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
('GUR00014', '121232750023024', 'Miftahul &#39;Ain', 'Perempuan', 'Bekasi', '0000-00-00', '987654321', 'Tenaga Honorer Sekolah', 'Guru Mapel', 'Islam', 'Jalan Bangau', '9', '8', 'Pekayon', 'Pekayon Jaya', 'Bekasi Selatan', 'Bekasi', 'Jabar', '17148', 'miftaul@gmail.com', '878755443', 'Aktif', '', '0000-00-00', '', '0000-00-00', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_tambahan`
--

CREATE TABLE `jabatan_tambahan` (
  `id_jabatan_tambahan` int(11) NOT NULL,
  `id_grup_pengguna_jabatan` varchar(255) NOT NULL,
  `jabatan_tambahan` enum('Waka Kurikulum','Waka Kesiswaan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id_jadwal_pelajaran` int(11) NOT NULL,
  `id_tahun_pelajaran` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `hari_jadwal_pelajaran` varchar(255) NOT NULL,
  `jam_ke_jadwal_pelajaran` int(11) NOT NULL,
  `id_mata_pelajaran` int(11) NOT NULL,
  `mulai_jadwal_pelajaran` time NOT NULL,
  `selesai_jadwal_pelajaran` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id_jadwal_pelajaran`, `id_tahun_pelajaran`, `id_semester`, `id_kelas`, `hari_jadwal_pelajaran`, `jam_ke_jadwal_pelajaran`, `id_mata_pelajaran`, `mulai_jadwal_pelajaran`, `selesai_jadwal_pelajaran`) VALUES
(5, 1, 1, 4, 'Senin', 1, 4, '07:00:00', '07:40:00'),
(6, 1, 1, 4, 'Senin', 2, 4, '07:40:00', '08:20:00'),
(7, 1, 1, 4, 'Senin', 3, 4, '08:20:00', '09:00:00'),
(8, 1, 1, 4, 'Senin', 4, 2, '09:00:00', '09:40:00'),
(9, 1, 1, 4, 'Senin', 5, 2, '10:00:00', '10:40:00'),
(10, 1, 1, 4, 'Senin', 6, 7, '10:40:00', '11:20:00'),
(11, 1, 1, 4, 'Senin', 7, 10, '11:20:00', '12:00:00'),
(12, 1, 1, 4, 'Senin', 8, 12, '12:40:00', '13:20:00'),
(13, 1, 1, 4, 'Senin', 9, 10, '13:20:00', '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `id_kategori_artikel` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id_kategori_artikel`, `kategori`) VALUES
(1, 'Artikel'),
(2, 'Pengumuman'),
(3, 'Berita'),
(4, 'Materi');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_tingkat` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_guru` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_tingkat`, `id_ruangan`, `id_guru`, `kelas`) VALUES
(4, 1, 4, 'GUR00001', 'VII.1'),
(5, 1, 5, '', 'VII.2'),
(6, 1, 6, '', 'VII.3'),
(7, 1, 7, '', 'VII.4'),
(8, 1, 8, '', 'VII.5'),
(9, 2, 9, '', 'VIII.1'),
(10, 2, 10, '', 'VIII.2'),
(11, 2, 11, '', 'VIII.3'),
(12, 3, 12, '', 'IX.1'),
(13, 3, 13, '', 'IX.2'),
(14, 3, 14, '', 'IX.3');

-- --------------------------------------------------------

--
-- Table structure for table `kompetensi_dasar`
--

CREATE TABLE `kompetensi_dasar` (
  `id_kompetensi_dasar` int(11) NOT NULL,
  `id_mata_pelajaran` int(11) NOT NULL,
  `kode_kompetensi_dasar` varchar(5) NOT NULL,
  `jenis_kompetensi_dasar` varchar(255) NOT NULL,
  `kompetensi_dasar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kompetensi_dasar`
--

INSERT INTO `kompetensi_dasar` (`id_kompetensi_dasar`, `id_mata_pelajaran`, `kode_kompetensi_dasar`, `jenis_kompetensi_dasar`, `kompetensi_dasar`) VALUES
(3, 2, '3.1', 'Pengetahuan', '3.1'),
(4, 2, '3.2', 'Pengetahuan', '3.2'),
(5, 2, '3.3', 'Pengetahuan', '3.3'),
(6, 4, '3.1', 'Pengetahuan', '3.1'),
(7, 4, '3.2', 'Pengetahuan', '3.2'),
(8, 4, '3.3', 'Pengetahuan', '3.3'),
(9, 5, '3.1', 'Pengetahuan', '3.1'),
(10, 5, '3.2', 'Pengetahuan', '3.2'),
(11, 5, '3.2', 'Pengetahuan', '3.3'),
(12, 6, '3.1', 'Pengetahuan', '3.1'),
(13, 7, '3.1', 'Pengetahuan', '3.1'),
(14, 8, '3.1', 'Pengetahuan', '3.1'),
(15, 9, '3.1', 'Pengetahuan', '3.1'),
(16, 10, '3.1', 'Pengetahuan', '3.1'),
(17, 11, '3.1', 'Pengetahuan', '3.1'),
(18, 12, '3.1', 'Pengetahuan', '3.1');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mata_pelajaran` int(11) NOT NULL,
  `mata_pelajaran` varchar(255) NOT NULL,
  `id_tingkat` int(11) NOT NULL,
  `id_guru` varchar(255) NOT NULL,
  `kkm_mata_pelajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mata_pelajaran`, `mata_pelajaran`, `id_tingkat`, `id_guru`, `kkm_mata_pelajaran`) VALUES
(2, 'Talim Mutalim', 1, 'GUR00001', 75),
(4, 'Matematika', 1, 'GUR00002', 75),
(5, 'Al-Qur\'an Hadits', 1, 'GUR00004', 75),
(6, 'SKI / Fiqih', 1, 'GUR00006', 75),
(7, 'IPA', 1, 'GUR00008', 75),
(8, 'Penjaskes', 1, 'GUR00007', 75),
(9, 'Bahasa Arab', 1, 'GUR00005', 75),
(10, 'Bahasa Inggris', 1, 'GUR00011', 75),
(11, 'PKN', 1, 'GUR00013', 75),
(12, 'IPS', 1, 'GUR00012', 75);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` bigint(100) NOT NULL,
  `id_siswa` varchar(255) NOT NULL,
  `id_mata_pelajaran` int(11) NOT NULL,
  `id_agenda_mengajar` int(11) NOT NULL,
  `pengetahuan_nilai` int(11) NOT NULL,
  `keterampilan_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_siswa`, `id_mata_pelajaran`, `id_agenda_mengajar`, `pengetahuan_nilai`, `keterampilan_nilai`) VALUES
(6, 'SIS00001', 2, 7, 68, 78),
(7, 'SIS00002', 2, 7, 68, 88),
(8, 'SIS00003', 2, 7, 78, 88),
(9, 'SIS00004', 2, 7, 78, 87),
(10, 'SIS00005', 2, 7, 78, 87),
(11, 'SIS00006', 2, 7, 78, 89),
(12, 'SIS00007', 2, 7, 78, 89),
(13, 'SIS00008', 2, 7, 78, 89),
(14, 'SIS00009', 2, 7, 67, 87),
(15, 'SIS00010', 2, 7, 87, 87),
(16, 'SIS00011', 2, 7, 78, 79),
(17, 'SIS00012', 2, 7, 89, 87),
(18, 'SIS00013', 2, 7, 87, 67),
(19, 'SIS00014', 2, 7, 80, 78),
(20, 'SIS00015', 2, 7, 79, 78),
(21, 'SIS00001', 4, 8, 78, 78),
(22, 'SIS00002', 4, 8, 78, 76),
(23, 'SIS00003', 4, 8, 78, 78),
(24, 'SIS00004', 4, 8, 87, 87),
(25, 'SIS00005', 4, 8, 78, 78),
(26, 'SIS00006', 4, 8, 78, 78),
(27, 'SIS00007', 4, 8, 67, 78),
(28, 'SIS00008', 4, 8, 88, 87),
(29, 'SIS00009', 4, 8, 80, 87),
(30, 'SIS00010', 4, 8, 88, 87),
(31, 'SIS00011', 4, 8, 78, 98),
(32, 'SIS00012', 4, 8, 78, 79),
(33, 'SIS00013', 4, 8, 79, 78),
(34, 'SIS00014', 4, 8, 87, 78),
(35, 'SIS00015', 4, 8, 78, 87),
(36, 'SIS00001', 5, 9, 78, 78),
(37, 'SIS00002', 5, 9, 76, 87),
(38, 'SIS00003', 5, 9, 79, 79),
(39, 'SIS00004', 5, 9, 78, 78),
(40, 'SIS00005', 5, 9, 67, 78),
(41, 'SIS00006', 5, 9, 88, 77),
(42, 'SIS00007', 5, 9, 67, 87),
(43, 'SIS00008', 5, 9, 87, 77),
(44, 'SIS00009', 5, 9, 88, 76),
(45, 'SIS00010', 5, 9, 77, 78),
(46, 'SIS00011', 5, 9, 78, 75),
(47, 'SIS00012', 5, 9, 87, 76),
(48, 'SIS00013', 5, 9, 78, 67),
(49, 'SIS00014', 5, 9, 78, 78),
(50, 'SIS00015', 5, 9, 78, 78),
(51, 'SIS00001', 6, 10, 78, 78),
(52, 'SIS00002', 6, 10, 78, 78),
(53, 'SIS00003', 6, 10, 77, 87),
(54, 'SIS00004', 6, 10, 77, 87),
(55, 'SIS00005', 6, 10, 78, 78),
(56, 'SIS00006', 6, 10, 78, 78),
(57, 'SIS00007', 6, 10, 78, 78),
(58, 'SIS00008', 6, 10, 78, 78),
(59, 'SIS00009', 6, 10, 78, 78),
(60, 'SIS00010', 6, 10, 87, 78),
(61, 'SIS00011', 6, 10, 79, 87),
(62, 'SIS00012', 6, 10, 78, 78),
(63, 'SIS00013', 6, 10, 80, 87),
(64, 'SIS00014', 6, 10, 80, 87),
(65, 'SIS00015', 6, 10, 80, 78),
(66, 'SIS00001', 6, 11, 67, 65),
(67, 'SIS00002', 6, 11, 67, 67),
(68, 'SIS00003', 6, 11, 67, 67),
(69, 'SIS00004', 6, 11, 67, 86),
(70, 'SIS00005', 6, 11, 67, 76),
(71, 'SIS00006', 6, 11, 78, 87),
(72, 'SIS00007', 6, 11, 78, 78),
(73, 'SIS00008', 6, 11, 87, 87),
(74, 'SIS00009', 6, 11, 98, 87),
(75, 'SIS00010', 6, 11, 78, 78),
(76, 'SIS00011', 6, 11, 78, 67),
(77, 'SIS00012', 6, 11, 78, 76),
(78, 'SIS00013', 6, 11, 76, 88),
(79, 'SIS00014', 6, 11, 87, 78),
(80, 'SIS00015', 6, 11, 78, 78),
(81, 'SIS00001', 7, 12, 78, 78),
(82, 'SIS00002', 7, 12, 87, 78),
(83, 'SIS00003', 7, 12, 67, 87),
(84, 'SIS00004', 7, 12, 87, 87),
(85, 'SIS00005', 7, 12, 78, 76),
(86, 'SIS00006', 7, 12, 78, 87),
(87, 'SIS00007', 7, 12, 87, 87),
(88, 'SIS00008', 7, 12, 67, 78),
(89, 'SIS00009', 7, 12, 84, 76),
(90, 'SIS00010', 7, 12, 87, 86),
(91, 'SIS00011', 7, 12, 78, 78),
(92, 'SIS00012', 7, 12, 78, 78),
(93, 'SIS00013', 7, 12, 78, 77),
(94, 'SIS00014', 7, 12, 78, 77),
(95, 'SIS00015', 7, 12, 78, 78),
(96, 'SIS00001', 8, 13, 87, 76),
(97, 'SIS00002', 8, 13, 66, 67),
(98, 'SIS00003', 8, 13, 87, 77),
(99, 'SIS00004', 8, 13, 67, 87),
(100, 'SIS00005', 8, 13, 75, 76),
(101, 'SIS00006', 8, 13, 87, 78),
(102, 'SIS00007', 8, 13, 67, 67),
(103, 'SIS00008', 8, 13, 78, 78),
(104, 'SIS00009', 8, 13, 78, 87),
(105, 'SIS00010', 8, 13, 78, 78),
(106, 'SIS00011', 8, 13, 77, 68),
(107, 'SIS00012', 8, 13, 77, 87),
(108, 'SIS00013', 8, 13, 77, 77),
(109, 'SIS00014', 8, 13, 88, 87),
(110, 'SIS00015', 8, 13, 80, 78),
(111, 'SIS00001', 9, 14, 76, 76),
(112, 'SIS00002', 9, 14, 78, 78),
(113, 'SIS00003', 9, 14, 76, 78),
(114, 'SIS00004', 9, 14, 78, 78),
(115, 'SIS00005', 9, 14, 76, 77),
(116, 'SIS00006', 9, 14, 87, 76),
(117, 'SIS00007', 9, 14, 67, 67),
(118, 'SIS00008', 9, 14, 78, 76),
(119, 'SIS00009', 9, 14, 87, 76),
(120, 'SIS00010', 9, 14, 76, 76),
(121, 'SIS00011', 9, 14, 77, 67),
(122, 'SIS00012', 9, 14, 76, 88),
(123, 'SIS00013', 9, 14, 76, 78),
(124, 'SIS00014', 9, 14, 78, 78),
(125, 'SIS00015', 9, 14, 80, 78),
(126, 'SIS00001', 10, 15, 78, 76),
(127, 'SIS00002', 10, 15, 67, 78),
(128, 'SIS00003', 10, 15, 57, 87),
(129, 'SIS00004', 10, 15, 78, 67),
(130, 'SIS00005', 10, 15, 78, 87),
(131, 'SIS00006', 10, 15, 81, 78),
(132, 'SIS00007', 10, 15, 78, 78),
(133, 'SIS00008', 10, 15, 78, 78),
(134, 'SIS00009', 10, 15, 78, 78),
(135, 'SIS00010', 10, 15, 78, 98),
(136, 'SIS00011', 10, 15, 78, 78),
(137, 'SIS00012', 10, 15, 67, 78),
(138, 'SIS00013', 10, 15, 76, 87),
(139, 'SIS00014', 10, 15, 78, 75),
(140, 'SIS00015', 10, 15, 78, 87),
(141, 'SIS00001', 11, 16, 67, 77),
(142, 'SIS00002', 11, 16, 76, 76),
(143, 'SIS00003', 11, 16, 76, 76),
(144, 'SIS00004', 11, 16, 77, 76),
(145, 'SIS00005', 11, 16, 78, 78),
(146, 'SIS00006', 11, 16, 78, 78),
(147, 'SIS00007', 11, 16, 67, 76),
(148, 'SIS00008', 11, 16, 88, 88),
(149, 'SIS00009', 11, 16, 77, 67),
(150, 'SIS00010', 11, 16, 77, 87),
(151, 'SIS00011', 11, 16, 66, 78),
(152, 'SIS00012', 11, 16, 87, 77),
(153, 'SIS00013', 11, 16, 77, 77),
(154, 'SIS00014', 11, 16, 78, 76),
(155, 'SIS00015', 11, 16, 78, 78),
(156, 'SIS00001', 12, 17, 67, 87),
(157, 'SIS00002', 12, 17, 76, 67),
(158, 'SIS00003', 12, 17, 87, 76),
(159, 'SIS00004', 12, 17, 78, 78),
(160, 'SIS00005', 12, 17, 78, 78),
(161, 'SIS00006', 12, 17, 78, 78),
(162, 'SIS00007', 12, 17, 78, 78),
(163, 'SIS00008', 12, 17, 78, 78),
(164, 'SIS00009', 12, 17, 78, 78),
(165, 'SIS00010', 12, 17, 78, 78),
(166, 'SIS00011', 12, 17, 76, 78),
(167, 'SIS00012', 12, 17, 78, 78),
(168, 'SIS00013', 12, 17, 78, 67),
(169, 'SIS00014', 12, 17, 87, 87),
(170, 'SIS00015', 12, 17, 77, 77),
(171, 'SIS00001', 2, 18, 80, 78),
(172, 'SIS00002', 2, 18, 88, 77),
(173, 'SIS00003', 2, 18, 88, 88),
(174, 'SIS00004', 2, 18, 77, 77),
(175, 'SIS00005', 2, 18, 78, 78),
(176, 'SIS00006', 2, 18, 67, 78),
(177, 'SIS00007', 2, 18, 76, 67),
(178, 'SIS00008', 2, 18, 76, 76),
(179, 'SIS00009', 2, 18, 67, 76),
(180, 'SIS00010', 2, 18, 78, 78),
(181, 'SIS00011', 2, 18, 78, 78),
(182, 'SIS00012', 2, 18, 88, 76),
(183, 'SIS00013', 2, 18, 88, 76),
(184, 'SIS00014', 2, 18, 76, 66),
(185, 'SIS00015', 2, 18, 76, 76),
(186, 'SIS00001', 4, 19, 75, 65),
(187, 'SIS00002', 4, 19, 76, 87),
(188, 'SIS00003', 4, 19, 76, 76),
(189, 'SIS00004', 4, 19, 76, 76),
(190, 'SIS00005', 4, 19, 87, 76),
(191, 'SIS00006', 4, 19, 87, 87),
(192, 'SIS00007', 4, 19, 80, 80),
(193, 'SIS00008', 4, 19, 78, 80),
(194, 'SIS00009', 4, 19, 67, 78),
(195, 'SIS00010', 4, 19, 78, 75),
(196, 'SIS00011', 4, 19, 76, 76),
(197, 'SIS00012', 4, 19, 78, 87),
(198, 'SIS00013', 4, 19, 78, 78),
(199, 'SIS00014', 4, 19, 78, 78),
(200, 'SIS00015', 4, 19, 78, 87);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_extrakurikuler`
--

CREATE TABLE `nilai_extrakurikuler` (
  `id_nilai_extrakurikuler` bigint(100) NOT NULL,
  `id_tahun_pelajaran` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_siswa` varchar(255) NOT NULL,
  `nama_extrakurikuler` varchar(255) NOT NULL,
  `nilai_extrakurikuler` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_extrakurikuler`
--

INSERT INTO `nilai_extrakurikuler` (`id_nilai_extrakurikuler`, `id_tahun_pelajaran`, `id_semester`, `id_siswa`, `nama_extrakurikuler`, `nilai_extrakurikuler`) VALUES
(4, 1, 1, 'SIS00015', 'Pramuka', 'A'),
(5, 1, 1, 'SIS00014', 'Pramuka', 'B'),
(6, 1, 1, 'SIS00013', 'Pramuka', 'B'),
(7, 1, 1, 'SIS00012', 'OSIS', 'A'),
(8, 1, 1, 'SIS00011', 'OSIS', 'B'),
(9, 1, 1, 'SIS00010', 'Pramuka', 'B'),
(10, 1, 1, 'SIS00009', 'Pramuka', 'B'),
(11, 1, 1, 'SIS00008', 'Pramuka', 'B'),
(12, 1, 1, 'SIS00007', 'OSIS', 'B'),
(13, 1, 1, 'SIS00006', 'Pramuka', 'B'),
(14, 1, 1, 'SIS00005', 'Pramuka', 'A'),
(15, 1, 1, 'SIS00004', 'OSIS', 'B'),
(16, 1, 1, 'SIS00003', 'Pramuka', 'B'),
(17, 1, 1, 'SIS00002', 'Pramuka', 'A'),
(18, 1, 1, 'SIS00001', 'Pramuka', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `nspn` int(11) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `jalan` varchar(255) NOT NULL,
  `rt` varchar(255) NOT NULL,
  `rw` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kabupaten_kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `nama_kepsek` varchar(255) NOT NULL,
  `sambutan_kepala_sekolah` text NOT NULL,
  `foto_kepsek` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `kop_surat_image` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `motto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nspn`, `nama_sekolah`, `jalan`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kabupaten_kota`, `provinsi`, `kode_pos`, `website`, `email`, `telp`, `nama_kepsek`, `sambutan_kepala_sekolah`, `foto_kepsek`, `logo`, `kop_surat_image`, `facebook`, `twitter`, `youtube`, `instagram`, `motto`) VALUES
(1, 12345, 'MTs At-Taqwa 08', 'Jl. Laskar No. 56', '004', '002', 'Pekayon Jaya', 'Bekasi Selatan', 'Kota Bekasi', 'Jawa Barat', '17148', 'http://mtsattaqwa08.sch.id', 'mtsattaqwa08@gmail.com', '021-8223143', 'Drs. H. A. Sukardi, M. Pd', '<p><strong><em>Bismillahirahmanirahim.</em></strong></p>\n\n<p style=\"text-align:justify\">Segala puji bagi Allah SWT tuhan semesta alam yang mengajarkan kita dengan pena pengetahuan. Salawat dan salam semoga selalu tercurah kepada teladan sepanjang zaman, Nabi Muhammad SAW.</p>\n\n<p style=\"text-align:justify\">Pendidikan merupakan pilar penting bagi peradaban bangsa. Maju mundurnya suatu bangsa bisa ditentukan dengan perkembangan ilmu pengetahuan yang dimiliki oleh sumber daya manusia. Dan puncak dari ilmu pengetahuan itu adalah ahlak mulia yang melekat sebagai karakter utama pada diri manusia.</p>\n\n<p style=\"text-align:justify\">Memasuki Dunia Industri 4.0 dan pergaulan global yang penuh dengan kompetisi ini, kita perlu menyiapkan &nbsp;mental generasi-generasi masa depan agar mampu bersaing dengan baik dengan memiliki moral/adab islami, kemandirian, kecerdasan, juga&nbsp; tentunya kreatifitas-inovasi sesuai tumbuh kembangnya.</p>\n\n<p>Sebagai salah satu lembaga pendidikan yang sudah Populer di Kota Bekasi,&nbsp; kami terus berupaya meningkatkan kualitas dan kuantitas sebagai bagian dari pilar penting yang membangun kualitas sumber daya manusia. Menjadi lembaga yang turut ambil bagian dalam pembentukan generasi hari ini untuk menjadi pemimpin di masa yang akan datang.</p>\n\n<p>Dengan penuh kesadaran bahwa sepuluh hingga dua puluh tahun kedepan, para pemimpin bangsa ditentukan dari generasi saat ini, maka MTs At-Taqwa 08 Kota Bekasi&nbsp;diharapkan melahirkan generasi yang salih, kuat ilmu pengetahuan dan bermoral Islami.</p>\n\n<p>Akhirnya, hanya kepada Allah SWT kita bertawakal. Semoga kita semua selalu diberikan kekuatan kesabaran dalam mendidik dan melahirkan generasi-generasi pemimpin masa depan juga selalu diberkahi dalam menjalankan semua aktivitas.</p>\n', 'kepsek.jpeg', 'logo1.png', '200px-No_image_3x4_svg2.png', '', '', '', '', 'Coming together is beginning, Keeping together is progress, Working together is success');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `id_grup_pengguna` varchar(255) NOT NULL COMMENT 'id pengguna berdasarkan grup level pengguna',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Administrator','Staf','Guru','Siswa') NOT NULL,
  `tgl_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_grup_pengguna`, `username`, `password`, `level`, `tgl_login`) VALUES
(16, 'ADM00005', '98578467', '$2y$10$eAZpEorwB92bYzWndXMghOAlSfSGncSMlhFWRYR6uVtvWmUuLjSQK', 'Administrator', '2021-01-13 11:00:48'),
(51, 'GUR00001', '121232750023021', '$2y$10$FfYx35CuYRR8GEZKfZwzl.KL1hZ4Qzx59HkZoW2NHjCHqWp0xh2y6', 'Guru', '2020-12-23 01:47:30'),
(52, 'GUR00002', '121232750023012', '$2y$10$kmXL3X0V2yrweWQG.YDEyOBZUMc9O1npL58UsT8NLNChnyz2V8SwC', 'Guru', '2020-12-23 02:09:39'),
(54, 'GUR00003', '121232750023002', '$2y$10$nzQqS3X2f8K4H1x8ijNyD.0jBX1SlZlPiR3FUrsJfuyT7VBKpmh1a', 'Guru', '0000-00-00 00:00:00'),
(55, 'GUR00004', '121232750023003', '$2y$10$zRjvJZOmq7sc5dxIQvNpYuUbFvMWiT8kbCtzL1UHuK7aG5ivoh/Z6', 'Guru', '0000-00-00 00:00:00'),
(56, 'GUR00005', '121232750023005', '$2y$10$A19/B3dClKX6cJNeZlg9duJISluWYKFZoEyRT9AuKuu.uKxv0xqhG', 'Guru', '0000-00-00 00:00:00'),
(57, 'GUR00006', '121232750023006', '$2y$10$WfEnU82FCEVHxwsyZqqzBun8DRfg3ah6vixlXvV7eno2vi3bnL/cS', 'Guru', '0000-00-00 00:00:00'),
(58, 'GUR00007', '121232750023007', '$2y$10$OSqRikiydYUFdqiTuqRcLunuwJMpV388FjoDnO.fAe/rkNwP9BEOy', 'Guru', '0000-00-00 00:00:00'),
(59, 'GUR00008', '121232750023008', '$2y$10$fZwfwa8GBXhC.IjFnQJ7f.QyHZUtBQDPPQ73CtL8fyaP/zoN29UmS', 'Guru', '0000-00-00 00:00:00'),
(60, 'GUR00009', '121232750023009', '$2y$10$dQyLVhz91MFW2leeeTopGOj/TCWY71GDlrgxb1med3hAzv5fNCGvu', 'Guru', '0000-00-00 00:00:00'),
(61, 'GUR00010', '121232750023010', '$2y$10$Ro.t1cSiBfUdWony8ZNUd.Rwjm31i0nD4GZMW2pw8.a2cihbdhfwy', 'Guru', '0000-00-00 00:00:00'),
(62, 'GUR00011', '121232750023011', '$2y$10$wfdxZ8.zYm8f0X6GfbdFhuhgfFgZ1j7LRX3YILe3zQTuIridxCJOy', 'Guru', '0000-00-00 00:00:00'),
(63, 'GUR00012', '121232750023022', '$2y$10$AYzIla76FKlxktY6VgWmweh3A76hiV6zJEWIxczCXqM2x1XYit0Hy', 'Guru', '0000-00-00 00:00:00'),
(64, 'GUR00013', '121232750023023', '$2y$10$8VqvwWRn7QR9L5tSzyqIoeRSf.xB6kd..9P7ksXw/Iz.R1zuVt7J2', 'Guru', '0000-00-00 00:00:00'),
(65, 'GUR00014', '121232750023024', '$2y$10$YwM2vHox6JZEVkD3YzIhx.M6HIVKA2ESQk14Ag6J14V9j6d0eByXe', 'Guru', '2020-12-23 01:45:16'),
(66, 'SIS00001', '121232750023163001', '$2y$10$Hh8d1oJQkqh3RyCOGo0WBubyay1HN1bI5AMrshHWE8pV95tUTO5Pe', 'Siswa', '2021-01-03 14:51:51'),
(67, 'SIS00002', '121232750023160127', '$2y$10$a3YjLgCeCWSvRQT1TrfgFebkSmFSqWmU9ayoNfmhzgK2qDc8ZbvQa', 'Siswa', '0000-00-00 00:00:00'),
(68, 'SIS00003', '121232750023170035', '$2y$10$dMr1QCMW4xSDT6WiOWqqE./hc9IxRlDLrG1mgy12V3vGHq4/ClCse', 'Siswa', '0000-00-00 00:00:00'),
(69, 'SIS00004', '121232750023160114', '$2y$10$vjBsObQFLICEHBRUcUDLTeMBZeKY9jXTK1UoezN/CMpeqIVeWEAFm', 'Siswa', '0000-00-00 00:00:00'),
(70, 'SIS00005', '121232750023170064', '$2y$10$LsLKUc7kcugaLPss7u/4YuRq36u/gtt.vw6xxqiAad1KGU34dB/0G', 'Siswa', '0000-00-00 00:00:00'),
(71, 'SIS00006', '121232750023170036', '$2y$10$4fknMgB29ed01G7NhZRUreBxo7k2FS3yfbaNmjXBXrTCQ7KMIIZq.', 'Siswa', '0000-00-00 00:00:00'),
(72, 'SIS00007', '121232750023170012', '$2y$10$XCLSlLVdQars46IE99.j8.a7G5a4sP80AgLSsy2onUlUaqyxzp5oO', 'Siswa', '0000-00-00 00:00:00'),
(73, 'SIS00008', '121232750023160018', '$2y$10$kJI6/dSBGaDn5B8wFiEOyePhU6fLj5eI8By9ZurvYd0yUWeSif6ue', 'Siswa', '0000-00-00 00:00:00'),
(74, 'SIS00009', '121232750023160117', '$2y$10$lbakiKZQKei/NitD3E5/LupRMjDeSmq68Rx.Y1711ylKXgOorkgzO', 'Siswa', '0000-00-00 00:00:00'),
(75, 'SIS00010', '121232750023170315', '$2y$10$TuoWPfzv4xknbrYR10YuUe5ESYMqW8eUbIl7oMHIZZqcvUjx0nrhq', 'Siswa', '0000-00-00 00:00:00'),
(76, 'SIS00011', '121232010184170059', '$2y$10$VOMmEPC6kS3GsQQ8KfFnjOsFy31iDDreb25iGy3d.j3jpDXjKhv.W', 'Siswa', '0000-00-00 00:00:00'),
(77, 'SIS00012', '121232750023160023', '$2y$10$3i.dtNOgKQnW7osmcAPFEuzR1G4zWxoLGY.4Njcn2dWXoHBXYn3Bu', 'Siswa', '0000-00-00 00:00:00'),
(78, 'SIS00013', '121232750023160080', '$2y$10$1c/DthSG8iL81J02g.RBaOHoM4ym3g3btDI2sq38.fYWnSFzCLUQa', 'Siswa', '0000-00-00 00:00:00'),
(79, 'SIS00014', '121232750023170318', '$2y$10$37yWoQmuLB09zP7KUaRjv.SZ4Ss6vEkguaWxZJX3cuvV9g9m/zZjO', 'Siswa', '2021-01-03 14:16:23'),
(80, 'SIS00015', '121232750023160081', '$2y$10$VNbKk3pu7hU5cegHpsVCcejbrrPdzhtT6wIha6FCxmvNlqQO75AAu', 'Siswa', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul_pengumuman` varchar(255) NOT NULL,
  `isi_pengumuman` text NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_author` varchar(255) NOT NULL,
  `level_author` enum('Administrator','Guru') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul_pengumuman`, `isi_pengumuman`, `tgl_upload`, `id_author`, `level_author`) VALUES
(2, 'Pengambilan Kartu UTS', '<p>Bagi siswa yang sudah melunasi biaya bulanan sesuai ketentuan silahkan untuk segera mengambil kartu UTS kepada wali kelas masing-masing.</p>\n', '2020-12-22', 'ADM00005', 'Administrator'),
(3, 'Pengumuman Pramuka', '<p>Sementara waktu untuk kegiatan Pramukan diliburkan dikarenakan untuk persiapan UTS</p>\n', '2020-12-22', 'ADM00005', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `rentang_nilai`
--

CREATE TABLE `rentang_nilai` (
  `id_rentang_nilai` int(11) NOT NULL,
  `dari_rentang_nilai` int(11) NOT NULL,
  `sampai_rentang_nilai` int(11) NOT NULL,
  `predikat_rentang_nilai` varchar(5) NOT NULL,
  `keterangan_rentang_nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rentang_nilai`
--

INSERT INTO `rentang_nilai` (`id_rentang_nilai`, `dari_rentang_nilai`, `sampai_rentang_nilai`, `predikat_rentang_nilai`, `keterangan_rentang_nilai`) VALUES
(2, 0, 75, 'D', 'Kurang'),
(3, 76, 80, 'C', 'Cukup'),
(4, 81, 85, 'B', 'Baik'),
(5, 86, 100, 'A', 'Istimewa');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `id_gedung` int(11) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `kapasitas_belajar_ruangan` int(11) NOT NULL,
  `kapasitas_ujian_ruangan` int(11) NOT NULL,
  `keterangan_ruangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `id_gedung`, `nama_ruangan`, `kapasitas_belajar_ruangan`, `kapasitas_ujian_ruangan`, `keterangan_ruangan`) VALUES
(4, 1, 'A.1', 40, 30, ''),
(5, 1, 'A.2', 40, 30, ''),
(6, 1, 'A.3', 40, 30, ''),
(7, 1, 'A.4', 40, 30, ''),
(8, 1, 'A.5', 40, 30, ''),
(9, 1, 'A.6', 40, 30, ''),
(10, 1, 'A.7', 40, 30, ''),
(11, 1, 'A.8', 40, 30, ''),
(12, 1, 'A.9', 40, 30, ''),
(13, 1, 'A.10', 40, 30, ''),
(14, 1, 'A.11', 40, 30, '');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `status_semester` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `semester`, `status_semester`) VALUES
(1, 'Semester Ganjil', '1'),
(3, 'Semester Genap', '0');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` varchar(255) NOT NULL,
  `nis_siswa` varchar(255) NOT NULL,
  `nisn_siswa` varchar(255) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `jenis_kelamin_siswa` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir_siswa` varchar(255) NOT NULL,
  `tanggal_lahir_siswa` date NOT NULL,
  `agama_siswa` varchar(255) NOT NULL,
  `kebutuhan_khusus_siswa` varchar(255) NOT NULL,
  `alamat_jalan_siswa` text NOT NULL,
  `rt_siswa` varchar(5) NOT NULL,
  `rw_siswa` varchar(5) NOT NULL,
  `nama_dusun_siswa` varchar(255) NOT NULL,
  `desa_kelurahan_siswa` varchar(255) NOT NULL,
  `kecamatan_siswa` varchar(255) NOT NULL,
  `kabupaten_kota_siswa` varchar(255) NOT NULL,
  `provinsi_siswa` varchar(255) NOT NULL,
  `kode_pos_siswa` varchar(15) NOT NULL,
  `jenis_tinggal_siswa` varchar(255) NOT NULL,
  `alat_transportasi_siswa` varchar(255) NOT NULL,
  `email_siswa` varchar(255) NOT NULL,
  `no_telp_siswa` varchar(255) NOT NULL,
  `foto_siswa` varchar(255) NOT NULL,
  `skhun_siswa` varchar(255) NOT NULL,
  `nama_ayah_siswa` varchar(255) NOT NULL,
  `tahun_lahir_ayah_siswa` varchar(255) NOT NULL,
  `pendidikan_ayah_siswa` varchar(255) NOT NULL,
  `pekerjaan_ayah_siswa` varchar(255) NOT NULL,
  `penghasilan_ayah_siswa` int(11) NOT NULL,
  `kebutuhan_khusus_ayah_siswa` varchar(255) NOT NULL,
  `no_telp_ayah_siswa` varchar(255) NOT NULL,
  `nama_ibu_siswa` varchar(255) NOT NULL,
  `tahun_lahir_ibu_siswa` varchar(255) NOT NULL,
  `pendidikan_ibu_siswa` varchar(255) NOT NULL,
  `pekerjaan_ibu_siswa` varchar(255) NOT NULL,
  `penghasilan_ibu_siswa` int(11) NOT NULL,
  `kebutuhan_khusus_ibu_siswa` varchar(255) NOT NULL,
  `no_telp_ibu_siswa` varchar(255) NOT NULL,
  `nama_wali_siswa` varchar(255) NOT NULL,
  `tahun_lahir_wali_siswa` varchar(255) NOT NULL,
  `pendidikan_wali_siswa` varchar(255) NOT NULL,
  `pekerjaan_wali_siswa` varchar(255) NOT NULL,
  `penghasilan_wali_siswa` int(11) NOT NULL,
  `no_telp_wali_siswa` varchar(255) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `kewarganegaraan_siswa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis_siswa`, `nisn_siswa`, `nama_siswa`, `jenis_kelamin_siswa`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `agama_siswa`, `kebutuhan_khusus_siswa`, `alamat_jalan_siswa`, `rt_siswa`, `rw_siswa`, `nama_dusun_siswa`, `desa_kelurahan_siswa`, `kecamatan_siswa`, `kabupaten_kota_siswa`, `provinsi_siswa`, `kode_pos_siswa`, `jenis_tinggal_siswa`, `alat_transportasi_siswa`, `email_siswa`, `no_telp_siswa`, `foto_siswa`, `skhun_siswa`, `nama_ayah_siswa`, `tahun_lahir_ayah_siswa`, `pendidikan_ayah_siswa`, `pekerjaan_ayah_siswa`, `penghasilan_ayah_siswa`, `kebutuhan_khusus_ayah_siswa`, `no_telp_ayah_siswa`, `nama_ibu_siswa`, `tahun_lahir_ibu_siswa`, `pendidikan_ibu_siswa`, `pekerjaan_ibu_siswa`, `penghasilan_ibu_siswa`, `kebutuhan_khusus_ibu_siswa`, `no_telp_ibu_siswa`, `nama_wali_siswa`, `tahun_lahir_wali_siswa`, `pendidikan_wali_siswa`, `pekerjaan_wali_siswa`, `penghasilan_wali_siswa`, `no_telp_wali_siswa`, `id_kelas`, `kewarganegaraan_siswa`) VALUES
('SIS00001', '121232750023163001', '', 'ADINDA AYU LESTARI', 'Perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', 4, ''),
('SIS00002', '121232750023160127', '', 'AFIFAH DWI AYUNINGSIH', 'Perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', 4, ''),
('SIS00003', '121232750023170035', '', 'AFNITA CLAUDIA', 'Perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', 4, ''),
('SIS00004', '121232750023160114', '', 'AHMAD FARIZAN SUPRIYATNA', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', 4, ''),
('SIS00005', '121232750023170064', '', 'AHMAD SYAHROZI', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', 4, ''),
('SIS00006', '121232750023170036', '', 'AJIE PANGESTU', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', 4, ''),
('SIS00007', '121232750023170012', '', 'DINIATI KHARESMA PUTRI', 'Perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', 4, ''),
('SIS00008', '121232750023160018', '', 'FACHRI RAMADHAN', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', 4, ''),
('SIS00009', '121232750023160117', '', 'FEBBY VALENTINA SINGKOH', 'Perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', 4, ''),
('SIS00010', '121232750023170315', '', 'HABIBAH NURAINI', 'Perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', 4, ''),
('SIS00011', '121232010184170059', '', 'IDHAM FAHMI SAPUTRA', 'Laki-laki', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', 4, ''),
('SIS00012', '121232750023160023', '', 'INDAH NUR FAJRI', 'Perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', 4, ''),
('SIS00013', '121232750023160080', '', 'JOANA RIZKY ANANDA', 'Perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', 4, ''),
('SIS00014', '121232750023170318', '', 'KARINA EKA PUTRI. H', 'Perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', 4, ''),
('SIS00015', '121232750023160081', '', 'KHAIRUNISA DINA ARIANTI', 'Perempuan', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `judul_slider` varchar(255) NOT NULL,
  `slider` varchar(255) NOT NULL,
  `tgl_upload_slider` date NOT NULL,
  `id_author_slider` varchar(255) NOT NULL,
  `level_author_slider` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id_slider`, `judul_slider`, `slider`, `tgl_upload_slider`, `id_author_slider`, `level_author_slider`) VALUES
(3, 'Pramuka', 'WhatsApp_Image_2020-12-22_at_08_59_121.jpeg', '2020-12-22', 'ADM00005', 'Administrator'),
(4, 'Apel Pagi', 'WhatsApp_Image_2020-12-22_at_08_59_181.jpeg', '2020-12-22', 'ADM00005', 'Administrator'),
(5, 'Berdoa', 'WhatsApp_Image_2020-12-22_at_08_59_171.jpeg', '2020-12-22', 'ADM00005', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_pelajaran`
--

CREATE TABLE `tahun_pelajaran` (
  `id_tahun_pelajaran` int(11) NOT NULL,
  `tahun_pelajaran` varchar(255) NOT NULL,
  `status_tahun_pelajaran` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tahun_pelajaran`
--

INSERT INTO `tahun_pelajaran` (`id_tahun_pelajaran`, `tahun_pelajaran`, `status_tahun_pelajaran`) VALUES
(1, '2018/2019', '1'),
(2, '2019/2020', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_sekolah`
--

CREATE TABLE `tentang_sekolah` (
  `id` int(11) NOT NULL,
  `profil` text NOT NULL,
  `sejarah` text NOT NULL,
  `visi_misi` text NOT NULL,
  `struktur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tentang_sekolah`
--

INSERT INTO `tentang_sekolah` (`id`, `profil`, `sejarah`, `visi_misi`, `struktur`) VALUES
(1, '<p style=\"text-align:center\">&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n', '<p style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Pada era tahun 1990 an dalam upaya meningkatkan pendidikan masyarakat sebagai sumber daya manusia yang handal dan bertaqwa. Maka dari itu masyarakat merasa perlu mendapat perhatian dari orang tua, tokoh, masyarakat dan agama, serta para pemuda dalam lingkungan wilayah perkampungan Pekayon Jaya yang pada saat itu masih menjadi wilayah Kabupaten Bekasi.</span></span></p>\n\n<h1 style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Akhirnya dianggap penting untuk mendirikan Sekolah atau Madrasah Tsanawiyah swasta sebagai kelanjutan dari Madrasah Ibtidaiyah Attaqwa 24 yang lebih awal sudah ada. Pada awal tahun ajaran baru untuk mewujudkan keinginan tersebut masyarakat, pihak yayasan, bersama unsur pemerintah mengadakan musyawarah atau rapat bersama membentuk panitia Pembangunan Tsanawiyah Attaqwa 08 dengan keputusan :</span></span></h1>\n\n<ol>\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Ketua&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ust. H. Ahmad Zarkasyi</span></span></li>\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Wakil Ketua&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Drs. H. A. Sukardi</span></span></li>\n	<li><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Sekertaris&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ust. H. M. Romli</span></span></li>\n	<li style=\"text-align: justify;\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Bendahara&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ust. H. Mukhlis Thoyib</span></span></li>\n	<li style=\"text-align: justify;\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Humas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Alm. H. Mamad (Ketua RW 02)</span></span></li>\n</ol>\n\n<h1 style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Sesuai hasil keputusan tersebut telah diputuskan untuk segera membangun gedung Madrasah Tsanawiyah Attaqwa 08. Adapun lokasi tanah hak milik dengan luas lahan 766 m2 terletak dijalan Laskar Rt 02/04 yang sangan strategis karena bersebrangan dengan Madrasah Ibtidayah Attaqwa 24.</span></span></h1>\n\n<h1 style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Pada tahun 1992/1993 telah dibuka pendaftran siswa baru Madrasah Tsanawiyah dengan jumlah pendaftarnya cukup banyak hingga memperoleh satu ruang belajar. Kesadaran penduduk untuk menyekolahkan putra-putrinya yang ada di wilayah Pekayon Jaya dan sekitarnya mendapatkan respon positif dari warga sekitar.</span></span></h1>\n\n<h1 style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Dalam hal ini Ust. H. A. Zarkasyi ditunjuk sebagai Kepala Madrasah sementara, hingga akhirnya pada bulan September surat keputusan badan pengurus Yayasan Attaqwa pusat yang berada di wilayah Ujung Harapan Bahagia Bekasi memutuskan, menetapkan dan menyerahkan dan mengangkat Drs. H. A. Sukardi sebagai Kepala Madrasah pada tanggal 24 September 1992.</span></span></h1>\n\n<h1 style=\"text-align:justify\"><span style=\"font-size:12pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Pada Tahu<span style=\"font-family:Times New Roman,Times,serif\">n1993 MTs. At-taqwa 08 baru mendapatkan izin operasional dan piagam pendirian Madrasah bernomor : wi/I/PP/005.1/32/93 tertanggal 25 Januari 1993 dengan nomor statistik 212321872077.</span></span></span></h1>\n\n<p><span style=\"font-family:Times New Roman,Times,serif\"><span style=\"font-size:11.0pt\">MTs. At-Taqwa 08 di era sekarang pada tahun 2010 berdasarkan surat Keputusan Kepala Kantor Kementerian Agama Kota Bekasi. MTs. At-Taqwa 08 mendapatkan kembali piagam Nomor Statistik Madrasah yang baru yaitu 121232750023 dengan nomor surat : 32-75/MTS/023/2010.</span></span></p>\n', '<p style=\"text-align:justify\"><strong>1. Visi&nbsp;</strong></p>\n\n<p style=\"text-align:justify\">&quot;Madrasah yang unggul dalam presentasi dan khlakul karimah berdasarkan iman dan taqwa.&quot;</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<div style=\"text-align:justify\"><strong>2. Misi</strong></div>\n\n<div style=\"text-align:justify\">- Melaksanakan pembelajaran yang efektif bagi&nbsp;semua siswa dan&nbsp;guru Madasah</div>\n\n<div style=\"text-align:justify\">- Menumbuhkan semangat keunggulan warga Madrasah daam berkarya</div>\n\n<div style=\"text-align:justify\">- Mendorong siswa mengenali potensi dirinya untuk meningkatkan motivasi dan prestasi</div>\n\n<div style=\"text-align:justify\">- Menumbuhkan penghayatan dan pengalaman terhadap ajaran agama islam</div>\n\n<div style=\"text-align:justify\">&nbsp;</div>\n', '<p style=\"text-align:center\"><img alt=\"\" src=\"/sisweb/assets/kcfinder/upload/images/struktur%20mts.jpg\" style=\"height:615px; width:737px\" /></p>\n\n<p style=\"text-align:center\">&nbsp;</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `tingkat`
--

CREATE TABLE `tingkat` (
  `id_tingkat` int(11) NOT NULL,
  `tingkat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tingkat`
--

INSERT INTO `tingkat` (`id_tingkat`, `tingkat`) VALUES
(1, 'VII'),
(2, 'VIII'),
(3, 'IX');

-- --------------------------------------------------------

--
-- Table structure for table `vidio`
--

CREATE TABLE `vidio` (
  `id_vidio` int(11) NOT NULL,
  `judul_vidio` varchar(255) NOT NULL,
  `url_vidio` varchar(255) NOT NULL,
  `tgl_upload_vidio` date NOT NULL,
  `id_author_vidio` varchar(255) NOT NULL,
  `level_author_vidio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vidio`
--

INSERT INTO `vidio` (`id_vidio`, `judul_vidio`, `url_vidio`, `tgl_upload_vidio`, `id_author_vidio`, `level_author_vidio`) VALUES
(1, 'Kegiatan Marching Band', 'https://www.youtube.com/watch?v=PxljP-PdTV8', '2020-12-09', '', ''),
(3, 'Pramuka', 'https://www.youtube.com/watch?v=wOvGdb7Y6YA', '2020-12-09', '', ''),
(4, 'Ragam Kegiatan', 'https://www.youtube.com/watch?v=Ok18efoOkZ0', '2020-12-09', '', ''),
(5, 'Bela Diri', 'https://www.youtube.com/watch?v=aE1fqsa3DTE', '2020-12-09', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_administrator`),
  ADD UNIQUE KEY `nik_administrator` (`nik_administrator`);

--
-- Indexes for table `agenda_mengajar`
--
ALTER TABLE `agenda_mengajar`
  ADD PRIMARY KEY (`id_agenda_mengajar`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_author` (`id_author`),
  ADD KEY `id_kategori_artikel` (`id_kategori_artikel`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_author_foto` (`id_author_foto`);

--
-- Indexes for table `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `nik_guru` (`nik_guru`);

--
-- Indexes for table `jabatan_tambahan`
--
ALTER TABLE `jabatan_tambahan`
  ADD PRIMARY KEY (`id_jabatan_tambahan`),
  ADD KEY `siswa_jabatan_constraint` (`id_grup_pengguna_jabatan`);

--
-- Indexes for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id_jadwal_pelajaran`),
  ADD KEY `id_tahun_pelajaran` (`id_tahun_pelajaran`),
  ADD KEY `id_semester` (`id_semester`),
  ADD KEY `id_mata_pelajaran` (`id_mata_pelajaran`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD PRIMARY KEY (`id_kategori_artikel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kompetensi_dasar`
--
ALTER TABLE `kompetensi_dasar`
  ADD PRIMARY KEY (`id_kompetensi_dasar`),
  ADD KEY `id_mata_pelajaran` (`id_mata_pelajaran`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mata_pelajaran`),
  ADD KEY `id_tingkat` (`id_tingkat`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_agenda_mengajar` (`id_agenda_mengajar`);

--
-- Indexes for table `nilai_extrakurikuler`
--
ALTER TABLE `nilai_extrakurikuler`
  ADD PRIMARY KEY (`id_nilai_extrakurikuler`),
  ADD KEY `id_tahun_pelajaran` (`id_tahun_pelajaran`),
  ADD KEY `id_semester` (`id_semester`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `id_grup_pengguna` (`id_grup_pengguna`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`),
  ADD KEY `id_author` (`id_author`);

--
-- Indexes for table `rentang_nilai`
--
ALTER TABLE `rentang_nilai`
  ADD PRIMARY KEY (`id_rentang_nilai`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `id_gedung` (`id_gedung`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nis_siswa` (`nis_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`),
  ADD KEY `id_author_slider` (`id_author_slider`);

--
-- Indexes for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  ADD PRIMARY KEY (`id_tahun_pelajaran`);

--
-- Indexes for table `tentang_sekolah`
--
ALTER TABLE `tentang_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tingkat`
--
ALTER TABLE `tingkat`
  ADD PRIMARY KEY (`id_tingkat`);

--
-- Indexes for table `vidio`
--
ALTER TABLE `vidio`
  ADD PRIMARY KEY (`id_vidio`),
  ADD KEY `id_author_vidio` (`id_author_vidio`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `agenda_mengajar`
--
ALTER TABLE `agenda_mengajar`
  MODIFY `id_agenda_mengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gedung`
--
ALTER TABLE `gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jabatan_tambahan`
--
ALTER TABLE `jabatan_tambahan`
  MODIFY `id_jabatan_tambahan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id_jadwal_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  MODIFY `id_kategori_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kompetensi_dasar`
--
ALTER TABLE `kompetensi_dasar`
  MODIFY `id_kompetensi_dasar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mata_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `nilai_extrakurikuler`
--
ALTER TABLE `nilai_extrakurikuler`
  MODIFY `id_nilai_extrakurikuler` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rentang_nilai`
--
ALTER TABLE `rentang_nilai`
  MODIFY `id_rentang_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tahun_pelajaran`
--
ALTER TABLE `tahun_pelajaran`
  MODIFY `id_tahun_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tingkat`
--
ALTER TABLE `tingkat`
  MODIFY `id_tingkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vidio`
--
ALTER TABLE `vidio`
  MODIFY `id_vidio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
