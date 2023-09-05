-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2023 at 04:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_consent_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `consents`
--

CREATE TABLE `consents` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `verification` text DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `guardian_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `patient_sign` varchar(200) NOT NULL,
  `guardian_sign` varchar(200) NOT NULL,
  `employee_sign` varchar(200) NOT NULL,
  `inputdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `inputby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consents`
--

INSERT INTO `consents` (`id`, `form_id`, `content`, `verification`, `patient_id`, `guardian_id`, `employee_id`, `patient_sign`, `guardian_sign`, `employee_sign`, `inputdate`, `inputby`) VALUES
(1, 1, '{\"employee_id\":\"2\",\"patient_id\":\"6\",\"medical_record\":\"198791230918\",\"name\":\"Markidi\",\"sex\":\"L\",\"birthplace\":\"Jawa\",\"birthdate\":\"2023-09-03\",\"phone\":\"081230912039\",\"address\":\"<p>Ohhhhh</p>\",\"guardian_id\":\"5\",\"relation\":\"ayah\",\"guardian_name\":\"Testing\",\"guardian_phone\":\"0821490079845\",\"guardian_address\":\"<p>Markidi</p>\",\"verification\":[\"Diagnosis penyakit saya tidak boleh diinformasikan kecuali keluarga inti\"],\"agree\":\"Dengan menandatangani dokumen ini berarti saya telah memahami dan menyetujui semua ketentuan tersebut.\r\n                                            Jika yang memberikan tanda tangan bukan pasien yang bersangkutan, maka penandatangan menjamin bahwa ia mendapat kuasa dari pasien dan sah mewakili pasien.\",\"signed-pasien\":\"198791230918-signature-pasien-2023-09-04-16-49-16.png\",\"signed-wali\":\"198791230918-signature-wali-2023-09-04-16-49-16.png\",\"signed-petugas\":\"198791230918-signature-petugas-2023-09-04-16-49-16.png\"}', 'Array', 6, 5, 2, '198791230918-signature-pasien-2023-09-04-16-49-16.png', '198791230918-signature-wali-2023-09-04-16-49-16.png', '198791230918-signature-petugas-2023-09-04-16-49-16.png', '2023-09-04 09:49:16', '1');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_number` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `front_title` varchar(50) DEFAULT NULL,
  `back_title` varchar(50) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `inputdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_number`, `name`, `front_title`, `back_title`, `join_date`, `position`, `phone`, `email`, `user_id`, `inputdate`, `updatedate`) VALUES
(1, '55124134', 'Pegawai 1', NULL, 'A.Md.Kep', '2016-06-09', 'Pelayanan', '0811123123', 'a@a.com', 1, '2023-08-31 12:19:33', NULL),
(2, '55212411', 'Pegawai 2', NULL, 'S.Rm', '2019-09-09', 'Pelayanan', '081229321314', 'b@b.com', 2, '2023-08-31 12:20:51', NULL),
(3, '71234168', 'Pegawai 3', NULL, 'S.Pd', '2020-01-09', 'Pelayanan', '081316512172', 'c@c.com', 3, '2023-08-31 12:20:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `token` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `name`, `token`, `content`) VALUES
(1, 'Form testing tanggal 3', 'y_t7lEbjJh0s749KdobtgZ0rcOUfiM836XVFfc0o-BSqgV_WrU', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"10\",\"11\"]'),
(2, 'Form for testing', 'GjTw5YR_hBi3HO0MeB65-husNPL_ZffA9yBCH_AcjNUUjPBufC', '[\"1\",\"2\",\"4\",\"5\",\"6\",\"7\"]');

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE `guardians` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `relation` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `inputdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `inputby` varchar(50) NOT NULL,
  `updatedate` timestamp NULL DEFAULT NULL,
  `updateby` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guardians`
--

INSERT INTO `guardians` (`id`, `name`, `relation`, `address`, `phone`, `patient_id`, `inputdate`, `inputby`, `updatedate`, `updateby`) VALUES
(1, 'Surim', 'ayah', '<p>testong bong</p>', '08312352112', 2, '2023-09-02 08:59:57', '', NULL, NULL),
(5, 'Testing', 'ayah', '<p>Markidi</p>', '0821490079845', 6, '2023-09-04 14:43:14', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `medical_record` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `sex` char(1) NOT NULL,
  `birthplace` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `inputdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `inputby` varchar(50) NOT NULL,
  `updatedate` timestamp NULL DEFAULT NULL,
  `updateby` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `medical_record`, `name`, `sex`, `birthplace`, `birthdate`, `address`, `phone`, `inputdate`, `inputby`, `updatedate`, `updateby`) VALUES
(2, '12309152', 'Sarno', 'L', 'Jawa', '1998-09-22', '<p>teting</p>', '0812312313', '2023-09-02 08:59:57', '', NULL, NULL),
(6, '198791230918', 'Markidi', 'L', 'Jawa', '2023-09-03', '<p>Ohhhhh</p>', '081230912039', '2023-09-04 14:43:14', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `head` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `verification` text NOT NULL,
  `inputdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `inputby` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `updatedate` timestamp NULL DEFAULT NULL,
  `updateby` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `head`, `content`, `verification`, `inputdate`, `inputby`, `updatedate`, `updateby`) VALUES
(1, 'perizinan-dokter', '<p>Saya mengetahui bahwa saya/pasien memiliki kondisi yang membutuhkan pelayanan dan pengobatan medis. Saya mengizinkan dokter dan profesional kesehatan lainnya untuk melakukan prosedur diagnostik dan terapi yang diperlukan sesuai penilaian profesional mereka.</p>', '', '2023-09-03 08:03:43', 'Pegawai 1', NULL, NULL),
(2, 'hak-partisipasi', '<p>Saya menyadari bahwa praktik kedokteran adalah upaya dokter untuk mengembalikan kesehatan pasien yang terganggu, karenanya tidak ada jaminan pasti terhadap hasil prosedur, tindakan dan perawatan yang dilakukan kepada saya/pasien. Saya mengetahui bahwa saya/pasien mempunyai hak untuk berpartisipasi dalam semua tahapan pengobatan dan perawatan saya/pasien, termasuk untuk menyetujui maupun menolak semua tindakan medis yang direncanakan kepada saya/pasien.</p>', '', '2023-09-03 07:36:13', 'Pegawai 1', NULL, NULL),
(3, 'kerahasiaan-medis', '<p>Saya menyetujui&nbsp;rumah&nbsp;sakit&nbsp;wajib&nbsp;menjamin&nbsp;kerahasiaan&nbsp;informasi&nbsp;medis&nbsp;saya/pasien. Namun untuk kesehatan saya/pasien dan perkembangan ilmu pengetahuan serta yang terkait dengan pihak ketiga dalam keadaan tertentu, saya setuju melepaskan hak kerahasiaan medis&nbsp;pasien atas izin dari saya atau sesuai ketentuan perundang-undangan yang berlaku di bidang kesehatan.&nbsp;Saya memberi wewenang kepada rumah sakit untuk memberikan informasi tentang kondisi kesehatan, hasil pelayanan dan pengobatan saya/pasien kepada kontak saya dan wali yang bertanda tangan dibawah</p>', '', '2023-09-03 07:37:54', 'Pegawai 1', NULL, NULL),
(4, 'kuasa-privasi', '<p>Saya memberi kuasa kepada rumah sakit untuk menjaga privasi saya/pasien sesuai ketentuan rumah sakit, kecuali yang secara tegas saya minta&nbsp;&nbsp;</p>', '<ul><li>Diagnosis penyakit saya tidak boleh diinformasikan <strong>kecuali</strong> keluarga inti</li><li>Diagnosis penyakit saya tidak boleh diinformasikan <strong>termasuk</strong> keluarga inti</li></ul>', '2023-09-03 07:39:00', 'Pegawai 1', NULL, NULL),
(5, 'mengetahui-rs', '<p>Saya mengetahui bahwa RSPAD Gatot Soebroto merupakan RS Pendidikan yang menjadi tempat praktik klinik bagi mahasiswa kedokteran dan profesi-profesi kesehatan lainnya. Saya menyetujui mahasiswa kedokteran dan profesi kesehatan lain berpartisipasi dalam perawatan saya/pasien atas asistensi pembimbing sesuai ketentuan yang berlaku di Rumah Sakit ini. Saya mengizinkan rumah sakit menggunakan data kesehatan saya untuk penelitian kesehatan sesuai ketentuan dan saya bersedia berpartisipasi dalam penelitian yang relevan dengan penyakit yang saya derita sesuai ketentuan rumah sakit.</p>', '', '2023-09-03 07:39:25', 'Pegawai 1', NULL, NULL),
(6, 'kehilangan-barang', '<p>Saya mengetahui bahwa rumah sakit tidak bertanggung jawab atas semua kehilangan barang-barang milik pasien dan saya/pasien secara pribadi bertanggung jawab atas barang-barang berharga milik pasien. Saya setuju apabila pasien tidak sadar/membutuhkan maka saya dapat menguasakan/ menitipkan barang-barang berharga pasien kepada rumah sakit.</p>', '', '2023-09-03 07:39:50', 'Pegawai 1', NULL, NULL),
(7, 'larangan-video', '<p>Saya setuju bahwa tidak diperkenankan mengambil dan mengedarkan gambar (foto/video) proses pelayanan yang saya/pasien terima tanpa izin dari pihak rumah sakit.</p>', '', '2023-09-03 07:40:17', 'Pegawai 1', NULL, NULL),
(8, 'pembayaran-perawatan', '<p>Saya menyatakan setuju&nbsp;untuk&nbsp;membayar total biaya perawatan. Bila saya menggunakan jaminan BPJS Kesehatan, saya akan tunduk pada ketentuan yang ditetapkan pemerintah Indonesia dan ketentuan internal RSPAD Gatot Soebroto. Bila saya menggunakan asuransi swasta, saya setuju pada ketentuan rumah sakit dan regulasi asuransi di Indonesia.</p>', '', '2023-09-03 07:40:33', 'Pegawai 1', NULL, NULL),
(10, 'hak-pasien', '<p><strong>Hak Pasien:</strong></p><ol><li>Memperoleh informasi tentang tata tertib Rumah Sakit dan peraturan yang berlaku di Rumah Sakit;</li><li>Memperoleh informasi tentang Hak &amp; Kewajiban Pasien;</li><li>Memperoleh layanan yang manusiawi, adil, jujur dan tanpa diskriminasi;</li><li>Memperoleh layanan kesehatan yang bermutu sesuai dengan standar profesi dan Standar Prosedur Operasional;</li><li>Memperoleh layanan yang efektif dan efisien sehingga pasien terhindar dari kerugian fisik &amp; materi;</li><li>Mengajukan pengaduan atas kualitas pelayanan yang didapatkan;&nbsp;</li><li>Memilih dokter, dokter gigi &nbsp;dan kelas perawatan sesuai dengan keinginannya dan peraturan yang berlaku di Rumah Sakit;</li><li>Meminta konsultasi tentang penyakit yang dideritanya &nbsp;kepada dokter lain yang mempunyai Surat Izin Praktik (SIP) baik di dalam maupun di luar Rumah Sakit;</li><li>Mendapatkan privasi &amp; kerahasiaan penyakit yang diderita termasuk data medisnya;</li><li>Mendapat informasi yang meliputi diagnosis dan tata cara tindakan medis, tujuan tindakan medis, alternatif&nbsp; tindakan, risiko dan komplikasi yang mungkin terjadi &amp; prognosis terhadap tindakan yang dilakukan serta perkiraan biaya pengobatan;</li><li>Memberikan persetujuan atau menolak atas tindakan yang akan dilakukan terhadap penyakit yang dideritanya;</li><li>Didampingi keluarganya dalam keadaan kritis;</li><li>Menjalankan ibadah sesuai agama atau kepercayaan yang dianutnya selama hal itu tidak mengganggu Pasien lainnya;</li><li>Memperoleh keamanan dan keselamatan dirinya;</li><li>Mengajukan usul, saran, perbaikan atas perlakuan Rumah Sakit terhadap dirinya; &nbsp;</li><li>Menolak pelayanan &nbsp;bimbingan rohani yang tidak sesuai dengan agama &amp; kepercayaan yang dianutnya;</li><li>Menggugat dan atau menuntut Rumah Sakit apabila Rumah Sakit memberikan pelayanan yang tidak sesuai dengan standar baik secara perdata ataupun pidana; dan</li><li>Mengeluhkan&nbsp; pelayanan Rumah Sakit yang tidak sesuai standar pelayanan melalui media cetak &amp; elektronik sesuai dengan peraturan&nbsp; perundang-undangan.</li></ol>', '', '2023-09-03 17:23:50', 'Pegawai 1', NULL, NULL),
(11, 'kewajiban-pasien', '<p><strong>Kewajiban Pasien</strong></p><ol><li>Mematuhi&nbsp;peraturan&nbsp;yang berlaku di Rumah Sakit;</li><li>Menggunakan&nbsp;fasilitas&nbsp;Rumah Sakit&nbsp;secara&nbsp;bertanggung jawab;</li><li>Menghormati&nbsp;hak&nbsp;pasien&nbsp;lain,&nbsp;pengunjung&nbsp;&amp;&nbsp;hak&nbsp;Tenaga Kesehatan&nbsp;serta&nbsp;petugas&nbsp;lainnya&nbsp;yang&nbsp;bekerja&nbsp;di Rumah Sakit;</li><li>Memberikan&nbsp;informasi&nbsp;yang&nbsp;jujur,&nbsp;lengkap,&nbsp;dan&nbsp;akurat&nbsp;sesuai dengan kemampuan dan pengetahuannya tentang&nbsp;masalah kesehatannya;</li><li>Memberikan &nbsp;informasi mengenai kemampuan &nbsp;finansial &nbsp;dan &nbsp;jaminan &nbsp;kesehatan &nbsp;yang dimilikinya;</li><li>Mematuhi&nbsp;rencana&nbsp;terapi&nbsp;yang &nbsp;direkomendasikan&nbsp;oleh&nbsp;Tenaga Kesehatan di Rumah Sakit dan disetujui oleh Pasien yang bersangkutan setelah mendapatkan penjelasan sesuai dengan ketentuan peraturan perundang-undangan;</li><li>Menerima segala konsekuensi atas keputusan pribadinya untuk menolak rencana terapi yang direkomendasikan oleh &nbsp;Tenaga Kesehatan dan atau tidak mematuhi petunjuk yang diberikan oleh Tenaga Kesehatan untuk penyembuhan penyakit atau masalah kesehatannya; dan</li><li>Memberikan imbalan jasa atas pelayanan yang diterima.</li></ol>', '', '2023-09-03 17:26:06', 'Pegawai 1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `roles` int(11) NOT NULL,
  `inputdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `roles`, `inputdate`, `updatedate`) VALUES
(1, 'a', '0cc175b9c0f1b6a831c399e269772661', 'Pegawai 1', 1, '2023-08-31 12:17:00', NULL),
(2, 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'Pegawai 2', 1, '2023-08-31 12:17:29', NULL),
(3, 'c', '4a8a08f09d37b73795649038408b5f33', 'Pegawai 3', 1, '2023-08-31 12:17:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consents`
--
ALTER TABLE `consents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consents_patient_idx` (`patient_id`),
  ADD KEY `consents_guardian_idx` (`guardian_id`),
  ADD KEY `consents_employee_idx` (`employee_id`),
  ADD KEY `consent_form_idx` (`form_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guardians_patient_idx` (`patient_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consents`
--
ALTER TABLE `consents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consents`
--
ALTER TABLE `consents`
  ADD CONSTRAINT `consent_form_idx` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`),
  ADD CONSTRAINT `consents_employee_idx` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `consents_guardian_idx` FOREIGN KEY (`guardian_id`) REFERENCES `guardians` (`id`),
  ADD CONSTRAINT `consents_patient_idx` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `guardians`
--
ALTER TABLE `guardians`
  ADD CONSTRAINT `guardians_patient_idx` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
