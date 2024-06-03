-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 07:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sig_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_lengkap`, `email`, `password`) VALUES
(1, 'Antonius', 'antoniusmunthe01@gmail.com', '$2y$10$TgEpkDTvsBPgPOn7OOcQ6.NaQUwPHi0GkigJqECKvjPwyIHOTXIwG'),
(3, 'Toni', 'test@example.com', '$2y$10$qWDA.iJmdGS9dEPTfEslhe4sXo6.2v5fsXkCnMa8V6XgtKm.2x2r6');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `link`, `judul`, `deskripsi`, `foto`, `created_at`) VALUES
(8, 'https://agrotek.id/sistem-bercocok-tanam/', 'Sistem Bercocok Tanam', 'Manajemen Pemupukan dan Irigasi Pemupukan: Petani harus mengelola\r\n              pemupukan dengan hati-hati untuk memenuhi kebutuhan nutrisi\r\n              tanaman. Pemupukan organik dan mineral yang tepat dapat\r\n              meningkatkan kualitas tanah dan hasil panen. Irigasi: Pengelolaan\r\n              irigasi yang efisien penting untuk menjaga kelembaban tanah dan\r\n              mendukung pertumbuhan tanaman yang baik. Pemilihan metode irigasi\r\n              yang sesuai dengan kondisi lokasi sangat diperlukan.', '../assets/Berita1.webp', '2024-05-28 19:43:17'),
(9, 'https://lampungselatankab.bps.go.id/statictable/2023/11/17/494/luas-lahan-menurut-kecamatan-dan-jenis-penggunaan-di-kabupaten-lampung-selatan-hektar-2023.html', 'Luas Lahan Bercocok Tanam Lampung Selatan', 'Lahan bercocok tanam yang disajikan oleh Badan Pusat Statistik\r\n              (BPS) telah mencakup data tentang luas lahan yang digunakan\r\n              untuk kegiatan pertanian, perkebunan, dan tanaman lainnya. Data\r\n              ini penting untuk memahami sektor pertanian suatu daerah.', '../assets/Berita2.webp', '2024-05-28 19:44:03'),
(10, 'https://tipspetani.com/kebutuhan-air-dan-kebutuhan-irigasi-lahan/', 'Kebutuhan Air dan Kebutuhan Irigasi Lahan', 'Kebutuhan irigasi adalah jumlah total air yang diaplikasikan ke permukaan tanah sebagai pelengkap \r\n              air yang disuplai melalui profil curah hujan dan tanah untuk memenuhi kebutuhan air tanaman untuk \r\n              pertumbuhan optimal. \r\n              IR = WR â€“ (ER + S) \r\n              Kebutuhan irigasi bersih: Kebutuhan irigasi bersih adalah \r\n              jumlah air irigasi yang diperlukan untuk membawa kadar air tanah di kedalaman zona akar tanaman ke \r\n              kapasitas lapangan. Dengan demikian, kebutuhan irigasi bersih adalah perbedaan antara kapasitas \r\n              lapangan dan kadar air tanah di zona akar sebelum aplikasi air irigasi. \r\n              Kebutuhan irigasi kotor: Jumlah total air termasuk air di lapangan yang diaplikasikan melalui irigasi \r\n              disebut sebagai persyaratan irigasi bruto, yang dengan kata lain adalah kebutuhan irigasi bersih ditambah \r\n              aplikasi dan kerugian lainnya', '../assets/Berita3.jpg', '2024-05-28 19:44:36'),
(11, 'https://www.antaranews.com/berita/4090536/pemprov-lampung-alokasi-lahan-100-ribu-hektare-untuk-percepatan-tanam', 'Alokasi Lahan 100 ribu Hektare Pemprov-Lampung', '\"Dalam mendukung kegiatan percepatan tanam di Lampung ini ada beberapa kegiatan \r\n            yang dilakukan, seperti melakukan identifikasi lahan-lahan yang selama ini belum \r\n            dioptimalkan dan disediakan pula ketersediaan air untuk irigasi,\" ujar Kepala \r\n            Bidang (Kabid) Tanaman Pangan Dinas Ketahanan Pangan Tanaman Pangan Hortikultura \r\n            Provinsi Lampung Ida Rachmawati di Bandarlampung, Lampung.', '../assets/Berita4.webp', '2024-05-28 19:45:14'),
(15, 'https://www.beritasatu.com/ekonomi/1065633/el-nino-765-hektare-lahan-sawah-di-lampung-terancam-gagal-panen', 'El Nino, 765 Hektare Lahan Sawah di Lampung Terancam Gagal Panen', 'Sekitar 765 hektare lahan sawah di Provinsi Lampung terancam gagal panen akibat \r\n          ekeringan yang disebabkan oleh fenomena El Nino. Data dari Dinas Ketahanan Pangan, \r\n          Tanaman Pangan dan Hortikultura Provinsi Lampung menunjukkan bahwa kekeringan telah \r\n          mempengaruhi sembilan kabupaten di provinsi tersebut.', '../assets/Berita5.webp', '2024-05-28 23:27:24'),
(16, 'https://www.metrotvnews.com/read/kM6C0mdR-40-ribu-hektare-lahan-di-lampung-selatan-kekeringan-ratusan-sawah-puso', '40 Ribu Hektare Lahan di Lampung Selatan Kekeringan, Ratusan Sawah Puso', 'Kepala Bidang Tanaman Pangan DTPH-Bun Lampung Selatan, Eka Saputra, mengatakan \r\n        dari luasan tersebut terdapat 6.056,7 Ha sawah mengalami kekeringan. Jumlah itu \r\n        terdiri dari kekeringan ringan 3.268 Ha, sedang 1.934,7 Ha, berat 473,25 Ha, dan puso 380,75 Ha.\r\n        Kemudian untuk lahan tanaman jagung mengalami kekeringan mencapai 4.690,5 Ha, terdiri dari \r\n        kekeringan ringan 1.910,5 Ha, sedang 2.067 Ha, dan berat 713 Ha.\r\n        \"Lahan sawah yang kekeringan itu di Kecamatan Natar, Way Sulan, Jatiagung dan Ketapang. \r\n        Bahkan, hingga mengakibatkan gagal panen atau puso,\" ujar Eka', '../assets/Berita6.jpg', '2024-05-28 23:28:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
