/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `absensi` (
  `id_pegawai` int(5) DEFAULT NULL,
  `tgl_tap` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  KEY `id_pegawai` (`id_pegawai`),
  CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `payroll` (
  `nama` varchar(50) DEFAULT NULL,
  `periode_awal` date DEFAULT NULL,
  `periode_akhir` date DEFAULT NULL,
  `total_jam_kerja` int(20) DEFAULT NULL,
  `gaji` int(20) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `pegawai` (
  `id` int(5) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `divisi` varchar(50) DEFAULT NULL,
  `gaji_pokok` int(20) DEFAULT NULL,
  `hari_kerja_1_bulan` int(20) DEFAULT NULL,
  `jam_kerja_1_hari` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `id_pegawai` int(5) DEFAULT NULL,
  `hak_akses` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pegawai` (`id_pegawai`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `absensi` (`id_pegawai`, `tgl_tap`, `status`) VALUES
(3, '2024-05-01 07:54:06', 'Tap In');
INSERT INTO `absensi` (`id_pegawai`, `tgl_tap`, `status`) VALUES
(3, '2024-05-01 16:54:16', 'Tap Out');
INSERT INTO `absensi` (`id_pegawai`, `tgl_tap`, `status`) VALUES
(3, '2024-05-02 07:55:11', 'Tap In');
INSERT INTO `absensi` (`id_pegawai`, `tgl_tap`, `status`) VALUES
(3, '2024-05-02 16:55:16', 'Tap Out'),
(3, '2024-05-03 07:55:28', 'Tap In'),
(3, '2024-05-03 16:55:31', 'Tap Out'),
(3, '2024-05-04 07:58:53', 'Tap In'),
(3, '2024-05-04 17:22:15', 'Tap Out'),
(3, '2024-05-05 07:59:24', 'Tap In'),
(3, '2024-05-05 16:59:26', 'Tap Out'),
(3, '2024-05-06 08:07:44', 'Tap In'),
(3, '2024-05-06 17:07:47', 'Tap Out'),
(3, '2024-05-07 08:07:49', 'Tap In'),
(3, '2024-05-07 16:50:50', 'Tap Out'),
(3, '2024-05-08 08:10:52', 'Tap In'),
(3, '2024-05-08 17:07:54', 'Tap Out'),
(1, '2024-06-01 07:50:49', 'Tap In'),
(1, '2024-06-01 16:50:52', 'Tap Out'),
(1, '2024-06-02 07:50:52', 'Tap In'),
(1, '2024-06-02 17:50:53', 'Tap Out'),
(1, '2024-06-03 07:50:54', 'Tap In'),
(1, '2024-06-03 16:50:54', 'Tap Out'),
(1, '2024-06-04 07:53:38', 'Tap In'),
(1, '2024-06-04 16:53:48', 'Tap Out'),
(1, '2024-06-05 07:53:50', 'Tap In'),
(1, '2024-06-05 16:53:52', 'Tap Out'),
(1, '2024-06-06 08:15:54', 'Tap In'),
(1, '2024-06-06 16:59:56', 'Tap Out'),
(1, '2024-06-07 07:53:57', 'Tap In'),
(1, '2024-06-07 17:10:59', 'Tap Out'),
(1, '2024-06-08 08:54:01', 'Tap In'),
(1, '2024-06-08 17:54:02', 'Tap Out'),
(1, '2024-06-09 07:54:04', 'Tap In'),
(1, '2024-06-09 16:54:05', 'Tap Out'),
(4, '2024-06-01 08:01:07', 'Tap In'),
(4, '2024-06-01 17:01:09', 'Tap Out'),
(4, '2024-06-02 08:20:17', 'Tap In'),
(4, '2024-06-02 16:59:59', 'Tap Out'),
(4, '2024-06-03 08:01:23', 'Tap In'),
(4, '2024-06-03 16:59:24', 'Tap Out'),
(4, '2024-06-04 08:12:53', 'Tap In'),
(4, '2024-06-04 16:53:02', 'Tap Out'),
(4, '2024-06-05 07:50:50', 'Tap In'),
(4, '2024-06-05 16:50:52', 'Tap Out'),
(4, '2024-06-06 08:50:53', 'Tap In'),
(4, '2024-06-06 17:50:56', 'Tap Out'),
(4, '2024-06-07 07:50:58', 'Tap In'),
(4, '2024-06-07 17:50:59', 'Tap Out'),
(4, '2024-06-08 07:51:00', 'Tap In'),
(4, '2024-06-08 16:51:03', 'Tap Out'),
(4, '2024-06-09 07:51:04', 'Tap In'),
(4, '2024-06-09 16:51:07', 'Tap Out'),
(4, '2024-06-10 07:51:08', 'Tap In'),
(4, '2024-06-10 16:51:09', 'Tap Out'),
(4, '2024-06-11 07:51:11', 'Tap In'),
(4, '2024-06-11 16:51:13', 'Tap Out'),
(2, '2024-06-01 07:55:47', 'Tap In'),
(2, '2024-06-01 16:55:49', 'Tap Out'),
(2, '2024-06-02 07:55:50', 'Tap In'),
(2, '2024-06-02 16:55:51', 'Tap Out'),
(2, '2024-06-03 07:55:52', 'Tap In'),
(2, '2024-06-03 16:48:53', 'Tap Out'),
(2, '2024-06-04 07:55:54', 'Tap In'),
(2, '2024-06-04 16:55:54', 'Tap Out'),
(2, '2024-06-05 07:55:55', 'Tap In'),
(2, '2024-06-05 17:00:55', 'Tap Out'),
(2, '2024-06-06 08:00:56', 'Tap In'),
(2, '2024-06-06 17:00:57', 'Tap Out');

INSERT INTO `payroll` (`nama`, `periode_awal`, `periode_akhir`, `total_jam_kerja`, `gaji`, `keterangan`, `id`) VALUES
('Darren Christian', '2024-06-01', '2024-06-09', 82, 3075000, 'gaji darren 1 - 9 juni 2024', 1);
INSERT INTO `payroll` (`nama`, `periode_awal`, `periode_akhir`, `total_jam_kerja`, `gaji`, `keterangan`, `id`) VALUES
('Fiony Alveria', '2024-06-01', '2024-06-06', 53, 1987500, 'gaji fiony 1- 6 juni 2024', 2);
INSERT INTO `payroll` (`nama`, `periode_awal`, `periode_akhir`, `total_jam_kerja`, `gaji`, `keterangan`, `id`) VALUES
('Jessica Chandra', '2024-05-01', '2024-05-08', 72, 5000000, 'gaji jessi 1 - 8 mei 2024', 3);
INSERT INTO `payroll` (`nama`, `periode_awal`, `periode_akhir`, `total_jam_kerja`, `gaji`, `keterangan`, `id`) VALUES
('Febriola Sinambela', '2024-06-01', '2024-06-11', 99, 6875000, 'gaji olla 1 - 11 juni 2024', 4);

INSERT INTO `pegawai` (`id`, `nama`, `alamat`, `tgl_lahir`, `divisi`, `gaji_pokok`, `hari_kerja_1_bulan`, `jam_kerja_1_hari`) VALUES
(1, 'Darren Christian', 'Kelapa Gading', '2004-06-13', 'IT', 6000000, 20, 8);
INSERT INTO `pegawai` (`id`, `nama`, `alamat`, `tgl_lahir`, `divisi`, `gaji_pokok`, `hari_kerja_1_bulan`, `jam_kerja_1_hari`) VALUES
(2, 'Fiony Alveria', 'Kelapa Gading', '2004-06-12', 'UI/UX', 6000000, 20, 8);
INSERT INTO `pegawai` (`id`, `nama`, `alamat`, `tgl_lahir`, `divisi`, `gaji_pokok`, `hari_kerja_1_bulan`, `jam_kerja_1_hari`) VALUES
(3, 'Jessica Chandra', 'Jakarta Utara', '2004-06-13', 'IT', 10000000, 18, 8);
INSERT INTO `pegawai` (`id`, `nama`, `alamat`, `tgl_lahir`, `divisi`, `gaji_pokok`, `hari_kerja_1_bulan`, `jam_kerja_1_hari`) VALUES
(4, 'Febriola Sinambela', 'Jakarta Timur', '2004-12-06', 'Accounting', 10000000, 18, 8);

INSERT INTO `user` (`id`, `username`, `password`, `id_pegawai`, `hak_akses`) VALUES
(1, 'darren', '123456', 1, 1);
INSERT INTO `user` (`id`, `username`, `password`, `id_pegawai`, `hak_akses`) VALUES
(2, 'fiony', '78910', 2, 1);
INSERT INTO `user` (`id`, `username`, `password`, `id_pegawai`, `hak_akses`) VALUES
(3, 'jessi', '123', 3, 2);
INSERT INTO `user` (`id`, `username`, `password`, `id_pegawai`, `hak_akses`) VALUES
(4, 'olla', '456', 4, 2);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;