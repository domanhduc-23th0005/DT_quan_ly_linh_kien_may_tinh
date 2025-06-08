-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2025 at 09:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlylinhkien`
--

-- --------------------------------------------------------

--
-- Table structure for table `ctdonhang`
--

CREATE TABLE `ctdonhang` (
  `MADONHANG` int(11) NOT NULL,
  `MAHANG` int(11) NOT NULL,
  `GIABAN` decimal(19,4) NOT NULL,
  `SOLUONG` decimal(10,2) NOT NULL,
  `MUCGIAMGIA` decimal(4,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ctdonhang`
--

INSERT INTO `ctdonhang` (`MADONHANG`, `MAHANG`, `GIABAN`, `SOLUONG`, `MUCGIAMGIA`) VALUES
(1, 12, 17390000.0000, 1.00, 0.00),
(2, 3, 4990000.0000, 1.00, 0.00),
(2, 53, 1199000.0000, 1.00, 0.00),
(2, 63, 3490000.0000, 1.00, 0.00),
(3, 72, 2650000.0000, 1.00, 0.00),
(4, 92, 80000.0000, 1.00, 0.00),
(5, 102, 129000.0000, 1.00, 0.00),
(5, 113, 790000.0000, 1.00, 0.00),
(6, 43, 495000.0000, 4.00, 0.00),
(7, 22, 1190000.0000, 2.00, 0.00),
(7, 73, 5490000.0000, 1.00, 0.00),
(7, 112, 1490000.0000, 1.00, 0.00),
(8, 40, 39000000.0000, 1.00, 0.00),
(8, 51, 1349000.0000, 1.00, 0.00),
(9, 22, 1190000.0000, 1.00, 0.00),
(9, 30, 2690000.0000, 1.00, 0.00),
(10, 42, 629000.0000, 1.00, 0.00),
(10, 67, 580000.0000, 1.00, 0.00),
(11, 2, 3690000.0000, 1.00, 0.00),
(11, 3, 4990000.0000, 1.00, 0.00),
(11, 4, 6499000.0000, 1.00, 0.00),
(12, 23, 1400000.0000, 1.00, 0.00),
(12, 24, 1990000.0000, 1.00, 0.00),
(12, 61, 1090000.0000, 1.00, 0.00),
(12, 64, 1250000.0000, 1.00, 0.00),
(12, 70, 899000.0000, 1.00, 0.00),
(13, 2, 3690000.0000, 1.00, 0.00),
(13, 43, 495000.0000, 1.00, 0.00),
(13, 53, 1199000.0000, 1.00, 0.00),
(14, 22, 1190000.0000, 1.00, 0.00),
(14, 32, 845000.0000, 1.00, 0.00),
(14, 42, 629000.0000, 1.00, 0.00),
(14, 43, 495000.0000, 1.00, 0.00),
(15, 82, 179000.0000, 1.00, 0.00),
(15, 92, 80000.0000, 1.00, 0.00),
(16, 4, 6499000.0000, 1.00, 0.00),
(16, 14, 14490000.0000, 1.00, 0.00),
(16, 36, 81900000.0000, 1.00, 0.00),
(16, 63, 3490000.0000, 1.00, 0.00),
(17, 21, 1350000.0000, 1.00, 0.00),
(17, 61, 1090000.0000, 1.00, 0.00),
(17, 73, 5490000.0000, 1.00, 0.00),
(17, 74, 2390000.0000, 1.00, 0.00),
(18, 51, 1349000.0000, 1.00, 0.00),
(19, 42, 629000.0000, 1.00, 0.00),
(20, 22, 1190000.0000, 1.00, 0.00),
(20, 23, 1400000.0000, 1.00, 0.00),
(21, 2, 3690000.0000, 1.00, 0.00),
(21, 43, 495000.0000, 1.00, 0.00),
(22, 31, 3174000.0000, 1.00, 0.00),
(22, 58, 5490000.0000, 1.00, 0.00),
(23, 6, 1890000.0000, 1.00, 0.00),
(23, 77, 7690000.0000, 1.00, 0.00),
(23, 78, 22989000.0000, 1.00, 0.00),
(24, 101, 359000.0000, 3.00, 0.00),
(25, 103, 890000.0000, 1.00, 0.00),
(26, 120, 1290000.0000, 3.00, 0.00),
(27, 81, 165000.0000, 1.00, 0.00),
(27, 82, 179000.0000, 4.00, 0.00),
(27, 83, 415000.0000, 1.00, 0.00),
(27, 86, 1249000.0000, 1.00, 0.00),
(27, 90, 599000.0000, 2.00, 0.00),
(28, 93, 34000.0000, 2.00, 0.00),
(28, 97, 149000.0000, 1.00, 0.00),
(28, 100, 490000.0000, 1.00, 0.00),
(29, 13, 62500000.0000, 1.00, 0.00),
(29, 14, 14490000.0000, 1.00, 0.00),
(30, 26, 3190000.0000, 1.00, 0.00),
(30, 27, 5190000.0000, 1.00, 0.00),
(31, 2, 3690000.0000, 1.00, 0.00),
(32, 23, 1400000.0000, 1.00, 0.00),
(32, 53, 1199000.0000, 1.00, 0.00),
(33, 62, 10900000.0000, 1.00, 0.00),
(33, 65, 1480000.0000, 1.00, 0.00),
(33, 74, 2390000.0000, 1.00, 0.00),
(34, 83, 415000.0000, 1.00, 0.00),
(34, 94, 129000.0000, 1.00, 0.00),
(35, 11, 2589000.0000, 1.00, 0.00),
(35, 41, 549000.0000, 1.00, 0.00),
(36, 63, 3490000.0000, 1.00, 0.00),
(36, 72, 2650000.0000, 1.00, 0.00),
(36, 81, 165000.0000, 1.00, 0.00),
(36, 111, 649000.0000, 1.00, 0.00),
(37, 32, 845000.0000, 1.00, 0.00),
(38, 14, 14490000.0000, 1.00, 0.00),
(38, 44, 650000.0000, 1.00, 0.00),
(39, 64, 1250000.0000, 1.00, 0.00),
(39, 75, 3890000.0000, 1.00, 0.00),
(40, 23, 1400000.0000, 1.00, 0.00),
(40, 105, 699000.0000, 1.00, 0.00),
(41, 20, 9990000.0000, 1.00, 0.00),
(42, 32, 845000.0000, 1.00, 0.00),
(42, 42, 629000.0000, 2.00, 0.00),
(43, 22, 1190000.0000, 1.00, 0.00),
(43, 32, 845000.0000, 1.00, 0.00),
(43, 53, 1199000.0000, 1.00, 0.00),
(43, 64, 1250000.0000, 1.00, 0.00),
(44, 72, 2650000.0000, 1.00, 0.00),
(44, 75, 3890000.0000, 1.00, 0.00),
(44, 84, 2299000.0000, 1.00, 0.00),
(45, 13, 62500000.0000, 2.00, 0.00),
(46, 82, 179000.0000, 1.00, 0.00),
(47, 53, 1199000.0000, 2.00, 0.00),
(48, 92, 80000.0000, 1.00, 0.00),
(48, 102, 129000.0000, 1.00, 0.00),
(48, 120, 1290000.0000, 1.00, 0.00),
(49, 101, 359000.0000, 1.00, 0.00),
(49, 111, 649000.0000, 1.00, 0.00),
(50, 83, 415000.0000, 1.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `MADONHANG` int(11) NOT NULL,
  `MAKHACHHANG` int(11) NOT NULL,
  `NGAYBANHANG` datetime DEFAULT NULL,
  `TRANGTHAI` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`MADONHANG`, `MAKHACHHANG`, `NGAYBANHANG`, `TRANGTHAI`) VALUES
(1, 1, '2025-04-01 08:04:48', 3),
(2, 2, '2025-04-01 10:06:06', 3),
(3, 1, '2025-04-01 14:09:08', 3),
(4, 3, '2025-04-01 15:10:49', 3),
(5, 4, '2025-04-01 17:19:46', 3),
(6, 5, '2025-04-02 10:21:31', 3),
(7, 6, '2025-04-02 13:23:36', 3),
(8, 7, '2025-04-02 19:31:24', 4),
(9, 8, '2025-04-03 04:32:41', 3),
(10, 9, '2025-04-03 09:35:12', 0),
(11, 10, '2025-04-04 11:40:25', 0),
(12, 10, '2025-04-04 12:41:03', 0),
(13, 11, '2025-04-04 17:26:01', 0),
(14, 11, '2025-04-05 09:26:00', 0),
(15, 11, '2025-04-05 13:37:39', 0),
(16, 12, '2025-04-05 14:39:59', 0),
(17, 12, '2025-04-07 12:40:17', 0),
(18, 12, '2025-04-07 13:41:29', 0),
(19, 13, '2025-04-08 14:07:24', 0),
(20, 14, '2025-04-08 15:08:48', 0),
(21, 15, '2025-04-10 21:48:23', 0),
(22, 16, '2025-04-11 10:29:48', 0),
(23, 17, '2025-04-11 14:33:39', 0),
(24, 18, '2025-04-11 18:35:08', 0),
(25, 1, '2025-04-12 07:35:56', 0),
(26, 19, '2025-04-16 09:37:23', 0),
(27, 20, '2025-04-16 10:38:53', 0),
(28, 21, '2025-04-16 13:40:18', 0),
(29, 22, '2025-04-18 10:41:04', 0),
(30, 23, '2025-04-19 16:42:06', 0),
(31, 24, '2025-04-19 22:22:46', 0),
(32, 4, '2025-04-19 23:23:39', 0),
(33, 15, '2025-04-20 10:25:27', 0),
(34, 25, '2025-04-23 14:26:20', 0),
(35, 26, '2025-04-24 06:27:08', 0),
(36, 27, '2025-04-26 08:28:18', 0),
(37, 5, '2025-04-26 17:29:09', 0),
(38, 27, '2025-04-27 11:29:51', 0),
(39, 28, '2025-04-29 22:31:00', 0),
(40, 29, '2025-05-01 15:32:02', 0),
(41, 30, '2025-05-03 08:58:13', 0),
(42, 31, '2025-05-03 14:58:57', 0),
(43, 32, '2025-05-04 09:00:01', 0),
(44, 14, '2025-05-05 09:00:43', 0),
(45, 1, '2025-05-08 15:01:37', 0),
(46, 13, '2025-05-10 06:03:38', 0),
(47, 17, '2025-05-12 19:04:45', 0),
(48, 33, '2025-05-15 13:05:59', 0),
(49, 34, '2025-05-15 15:06:57', 0),
(50, 35, '2025-05-15 20:07:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKHACHHANG` int(11) NOT NULL,
  `HOKHACHHANG` varchar(100) NOT NULL,
  `TENKHACHHANG` varchar(100) NOT NULL,
  `GIOITINH` varchar(10) NOT NULL,
  `DIACHI` varchar(100) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `DIENTHOAI` varchar(50) NOT NULL,
  `MATKHAU` varchar(200) DEFAULT NULL,
  `MAXACNHAN` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MAKHACHHANG`, `HOKHACHHANG`, `TENKHACHHANG`, `GIOITINH`, `DIACHI`, `EMAIL`, `DIENTHOAI`, `MATKHAU`, `MAXACNHAN`) VALUES
(1, 'dang', 'thanh hoa', 'Nam', '169', 'hoa.thudientu@gmail.com', '0905199281', '$2y$10$27IoyXZ6O8W1lC5ZwCpgvOAixxBqOjvYj5cG5W8FB8/aJc7JJMrC2', NULL),
(2, 'n/a', 'n/a', 'n/a', 'n/a', 'jade@gmail.co', 'jade@gmail.co', 'n/a', NULL),
(3, 'n/a', 'n/a', 'n/a', 'n/a', 'tienphat@gmail.co', 'tienphat@gmail.co', 'n/a', NULL),
(4, 'n/a', 'n/a', 'n/a', 'n/a', 'guppy@gmail.co', 'guppy@gmail.co', 'n/a', NULL),
(5, 'n/a', 'n/a', 'n/a', 'n/a', 'tramy@gmail.co', 'tramy@gmail.co', 'n/a', NULL),
(6, 'n/a', 'n/a', 'n/a', 'n/a', 'greentech@gmail.co', 'greentech@gmail.co', 'n/a', NULL),
(7, 'n/a', 'n/a', 'n/a', 'n/a', 'netnam@gmail.co', 'netnam@gmail.co', 'n/a', NULL),
(8, 'n/a', 'n/a', 'n/a', 'n/a', 'hanoi@gmail.co', 'hanoi@gmail.co', 'n/a', NULL),
(9, 'nguyen', 'ngoc bich', 'Nữ', '46', 'ngocbich@gmail.co', '0328664231', '$2y$10$eR5kjsPVgBXXdVDnQVDon.IUN1.ZHYdoJkdlWnkI845hTB72mxZP.', NULL),
(10, 'Nguyen', 'A', 'Nam', 'Nha trang', 'A@gmail.com', '0123456999', '$2y$10$deQTN5nkURBl023SyYbibOIJP2/4WU9SKPpeJXdOcW6Tm8zBBKJ.S', NULL),
(11, 'Nguyễn Văn', 'B', 'Nam', '123', 'vanb@gmail.com', '029654317685', '$2y$10$kfrfCargcNrrhivTCVabN.hlNkfeJM9UBIp9MQ2XAF1jry27vv/4.', NULL),
(12, 'Nguyễn Thị', 'C', 'Nữ', '456', 'vanc@gmail.com', '0912345667', '$2y$10$LxJA5JmWPtrNEFItn0FweuAf6EK2nr8wtaAkLyuh/KJ8ixm4tVJq2', NULL),
(13, 'n/a', 'n/a', 'n/a', 'n/a', 'datloi@gmail.co', 'datloi@gmail.co', 'n/a', NULL),
(14, 'n/a', 'n/a', 'n/a', 'n/a', 'thanhlong@gmail.co', 'thanhlong@gmail.co', 'n/a', NULL),
(15, 'n/a', 'n/a', 'n/a', 'n/a', 'hcm@gmail.co', 'hcm@gmail.co', 'n/a', NULL),
(16, 'n/a', 'n/a', 'n/a', 'n/a', 'leepham@hotmail.co', 'leepham@hotmail.co', 'n/a', NULL),
(17, 'n/a', 'n/a', 'n/a', 'n/a', 'mancity@football.co', 'mancity@football.co', 'n/a', NULL),
(18, 'n/a', 'n/a', 'n/a', 'n/a', 'coolmoon@group.co', 'coolmoon@group.co', 'n/a', NULL),
(19, 'n/a', 'n/a', 'n/a', 'n/a', 'ctybaoanh@gmail.co', 'ctybaoanh@gmail.co', 'n/a', NULL),
(20, 'n/a', 'n/a', 'n/a', 'n/a', 'coffeegame@gmail.co', 'coffeegame@gmail.co', 'n/a', NULL),
(21, 'n/a', 'n/a', 'n/a', 'n/a', 'hailong@gmail.co', 'hailong@gmail.co', 'n/a', NULL),
(22, 'n/a', 'n/a', 'n/a', 'n/a', 'gma@gmail.co', 'gma@gmail.co', 'n/a', NULL),
(23, 'n/a', 'n/a', 'n/a', 'n/a', 'pcadvanced@gmail.co', 'pcadvanced@gmail.co', 'n/a', NULL),
(24, 'n/a', 'n/a', 'n/a', 'n/a', 'vantoan@gmail.co', 'vantoan@gmail.co', 'n/a', NULL),
(25, 'n/a', 'n/a', 'n/a', 'n/a', 'shopin@gmail.co', 'shopin@gmail.co', 'n/a', NULL),
(26, 'n/a', 'n/a', 'n/a', 'n/a', 'huuchien@gmail.co', 'huuchien@gmail.co', 'n/a', NULL),
(27, 'n/a', 'n/a', 'n/a', 'n/a', 'tanphat@gmail.co', 'tanphat@gmail.co', 'n/a', NULL),
(28, 'n/a', 'n/a', 'n/a', 'n/a', 'longnguyen@techco.net', 'longnguyen@techco.net', 'n/a', NULL),
(29, 'n/a', 'n/a', 'n/a', 'n/a', 'truongphat@gmail.co', 'truongphat@gmail.co', 'n/a', NULL),
(30, 'n/a', 'n/a', 'n/a', 'n/a', 'manhhung@gmail.co', 'manhhung@gmail.co', 'n/a', NULL),
(31, 'n/a', 'n/a', 'n/a', 'n/a', 'haivan@gmail.co', 'haivan@gmail.co', 'n/a', NULL),
(32, 'n/a', 'n/a', 'n/a', 'n/a', 'trucly@gmail.co', 'trucly@gmail.co', 'n/a', NULL),
(33, 'n/a', 'n/a', 'n/a', 'n/a', 'lynguyen@gmail.co', 'lynguyen@gmail.co', 'n/a', NULL),
(34, 'n/a', 'n/a', 'n/a', 'n/a', 'vuongpham@gmail.co', 'vuongpham@gmail.co', 'n/a', NULL),
(35, 'n/a', 'n/a', 'n/a', 'n/a', 'huong88@gmail.co', 'huong88@gmail.co', 'n/a', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loaihang`
--

CREATE TABLE `loaihang` (
  `MALOAIHANG` int(11) NOT NULL,
  `TENLOAIHANG` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaihang`
--

INSERT INTO `loaihang` (`MALOAIHANG`, `TENLOAIHANG`) VALUES
(1, 'CPU'),
(2, 'GPU'),
(3, 'RAM'),
(4, 'Mainboard'),
(5, 'Nguồn'),
(6, 'Ổ cứng'),
(7, 'Loa'),
(8, 'Màn hình'),
(9, 'Bàn phím'),
(10, 'Chuột'),
(11, 'Tản nhiệt'),
(12, 'Case');

-- --------------------------------------------------------

--
-- Table structure for table `mathang`
--

CREATE TABLE `mathang` (
  `MAHANG` int(11) NOT NULL,
  `TENHANG` varchar(100) NOT NULL,
  `MALOAIHANG` int(11) NOT NULL,
  `MATHUONGHIEU` int(11) NOT NULL,
  `DONVITINH` varchar(20) NOT NULL,
  `GIABAN` decimal(19,4) NOT NULL,
  `ANHMINHHOA` varchar(200) DEFAULT NULL,
  `THONGSOKYTHUAT` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mathang`
--

INSERT INTO `mathang` (`MAHANG`, `TENHANG`, `MALOAIHANG`, `MATHUONGHIEU`, `DONVITINH`, `GIABAN`, `ANHMINHHOA`, `THONGSOKYTHUAT`) VALUES
(1, 'intel core i3 12100', 1, 1, 'cái', 2790000.0000, 'intel_i3_12100.jpg', 'Số lõi: 4\r\nSố P-core: 4\r\nSố E-core: 0\r\nTổng số luồng: 8\r\nTần số turbo tối đa: 4.30 GHz\r\nTần số Turbo tối đa của P-core: 4.30 GHz\r\nTần số Cơ sở của P-core: 3.30 GHz\r\nBộ nhớ đệm: 12 MB Intel® Smart Cache\r\nTổng Bộ nhớ đệm L: 25 MB\r\nCông suất Cơ bản: 60 W\r\nCông suất Turbo Tối đa: 89 W'),
(2, 'intel core i5 12400', 1, 1, 'cái', 3690000.0000, 'intel_i5_12400.jpg', 'Số lõi: 6\r\nSố P-core: 6\r\nSố E-core: 0\r\nTổng số luồng: 12\r\nTần số turbo tối đa: 4.40 GHz\r\nTần số Turbo tối đa của P-core: 4.40 GHz\r\nTần số Cơ sở của P-core: 2.50 GHz\r\nBộ nhớ đệm: 18 MB Intel® Smart Cache\r\nTổng Bộ nhớ đệm L2: 7.5 MB\r\nCông suất Cơ bản: 65 W\r\nCông suất Turbo Tối đa: 117 W'),
(3, 'intel core i7 12700', 1, 1, 'cái', 4990000.0000, 'intel_i7_12700.jpg', 'Số lõi: 12\r\nSố P-core: 8\r\nSố E-core: 4\r\nTổng số luồng: 20\r\nTần số turbo tối đa: 4.90 GHz\r\nTurbo Boost Max 3.0: 4.90 GHz\r\nTurbo tối đa P-core: 4.80 GHz\r\nTurbo tối đa E-core: 3.60 GHz\r\nCơ sở P-core: 2.10 GHz\r\nCơ sở E-core: 1.60 GHz\r\nBộ nhớ đệm: 25 MB Intel® Smart Cache\r\nTổng Bộ nhớ đệm L2: 12 MB\r\nCông suất Cơ bản: 65 W\r\nCông suất Turbo Tối đa: 180 W'),
(4, 'intel core i9 12900k', 1, 1, 'cái', 6499000.0000, 'intel_i9_12900k.jpg', 'Số lõi: 16\r\nSố P-core: 8\r\nSố E-core: 8\r\nTổng số luồng: 24\r\nTần số turbo tối đa: 5.20 GHz\r\nTurbo Boost Max 3.0: 5.20 GHz\r\nTurbo tối đa P-core: 5.10 GHz\r\nTurbo tối đa E-core: 3.90 GHz\r\nCơ sở P-core: 3.20 GHz\r\nCơ sở E-core: 2.40 GHz\r\nBộ nhớ đệm: 30 MB Intel® Smart Cache\r\nTổng Bộ nhớ đệm L2: 14 MB\r\nCông suất Cơ bản: 125 W\r\nCông suất Turbo Tối đa: 241 W'),
(5, 'intel core ultra 5 245', 1, 1, 'cái', 8799000.0000, 'intel_core-ultra_5-245.jpg', 'Số lõi: 14\r\nSố P-core: 6\r\nSố E-core: 8\r\nTổng số luồng: 14\r\nTần số turbo tối đa: 5.2 GHz\r\nTurbo tối đa P-core: 5.2 GHz\r\nTurbo tối đa E-core: 4.6 GHz\r\nCơ sở P-core: 4.2 GHz\r\nCơ sở E-core: 3.6 GHz\r\nBộ nhớ đệm: 24 MB Intel® Smart Cache\r\nTổng Bộ nhớ đệm L2: 26 MB\r\nCông suất Cơ bản: 125 W\r\nCông suất Turbo Tối đa: 159 W\r\nIntel® DL Boost: Có'),
(6, 'AMD Ryzen 3 3200g', 1, 2, 'cái', 1890000.0000, 'amd_r3_3200g.jpg', 'Số Nhân: 4\r\nSố Luồng: 4\r\nXung Nhịp Tối Đa: Lên tới 4.0GHz\r\nXung Nhịp Cơ Bản: 3.6GHz\r\nBộ Nhớ Đệm L1: 384KB\r\nBộ Nhớ Đệm L2: 2MB\r\nBộ Nhớ Đệm L3: 4MB\r\nTDP Mặc Định: 65W\r\nCPU Socket: AM4'),
(7, 'AMD Ryzen 5 5600', 1, 2, 'cái', 2990000.0000, 'amd_r5_5600.jpg', 'Số Nhân: 6\r\nSố Luồng: 12\r\nXung Nhịp Tối Đa: Lên tới 4.4GHz\r\nXung Nhịp Cơ Bản: 3.5GHz\r\nBộ Nhớ Đệm L1: 384KB\r\nBộ Nhớ Đệm L2: 3MB\r\nBộ Nhớ Đệm L3: 32MB\r\nTDP Mặc Định: 65W\r\nCPU Socket: AM4'),
(8, 'AMD Ryzen 5 8500g', 1, 2, 'cái', 4090000.0000, 'amd_r5_8500g.jpg', 'Số Nhân: 6\r\nSố Luồng: 12\r\nXung Nhịp Tối Đa: Lên tới 5.0GHz\r\nXung Nhịp Cơ Bản: 3.5GHz\r\nBộ Nhớ Đệm L2: 6MB\r\nBộ Nhớ Đệm L3: 16MB\r\nTDP Mặc Định: 65W\r\nCPU Socket: AM5'),
(9, 'AMD Ryzen 7 5800x3D', 1, 2, 'cái', 3540000.0000, 'amd_r7_5800x3d.jpg', 'Số Nhân: 8\r\nSố Luồng: 16\r\nXung Nhịp Tối Đa: Lên tới 4.5GHz\r\nXung Nhịp Cơ Bản: 3.4GHz\r\nBộ Nhớ Đệm L1: 512KB\r\nBộ Nhớ Đệm L2: 4MB\r\nBộ Nhớ Đệm L3: 96MB\r\nTDP Mặc Định: 105W\r\nCPU Socket: AM4'),
(10, 'AMD Ryzen 9 5950x', 1, 2, 'cái', 7490000.0000, 'amd_r9_5950x.jpg', 'Số Nhân: 16\r\nSố Luồng: 32\r\nXung Nhịp Tối Đa: Lên tới 4.9GHz\r\nXung Nhịp Cơ Bản: 3.4GHz\r\nBộ Nhớ Đệm L2: 8MB\r\nBộ Nhớ Đệm L3: 64MB\r\nTDP Mặc Định: 105W\r\nCPU Socket: AM4'),
(11, 'Nvidia Geforce GTX 1060 3GB MSI', 2, 3, 'cái', 2589000.0000, 'nvidia_gtx_1060_3gb.jpg', 'Kiến trúc GPU: Pascal\r\nNVIDIA Cuda® Cores: 1152\r\nVRAM: 3 GB GDDR5 192 bit\r\nClock speed: 1506 MHz\r\nTDP: 120 W'),
(12, 'Nvidia Geforce RTX 4070 12GB MSI VENTUS 3X', 2, 3, 'cái', 17390000.0000, 'nvidia_rtx_4070_12g.jpg', 'Kiến trúc GPU: Ada Lovelace\r\nNVIDIA Cuda® Cores: 5888\r\nVRAM: 12 GB GDDR6X 192 bit\r\nClock speed: 1920 MHz\r\nTDP: 200 W'),
(13, 'Nvidia Geforce RTX 4090 24GB MSI SUPRIM X', 2, 3, 'cái', 62500000.0000, 'nvidia_rtx_4090_24g.jpg', 'Kiến trúc GPU: Ada Lovelace\r\nNVIDIA Cuda® Cores: 16384\r\nVRAM: 24 GB GDDR6X 384 bit\r\nClock speed: 2235 MHz\r\nTDP: 450 W'),
(14, 'Nvidia Geforce RTX 5060 Ti', 2, 3, 'cái', 14490000.0000, 'nvidia_rtx_5060ti_8g.jpg', 'Kiến trúc GPU: Blackwell 2.0\r\nNVIDIA Cuda® Cores: 4608\r\nVRAM: 8 GB GDDR7 128 bit\r\nClock speed: 2407 MHz\r\nTDP: 180 W'),
(15, 'AMD Radeon RX 580 8GB MSI ARMOR OC', 2, 2, 'cái', 1950000.0000, 'amd_rx_580_8g.jpg', 'Kiến trúc GPU: Polaris\r\nCores: 2304\r\nVRAM: 8 GB GDDR5 256 bit\r\nClock speed: 1257 MHz\r\nTDP: 185 W'),
(16, 'AMD Radeon RX 6600 8GB Asus DUAL', 2, 2, 'cái', 5300000.0000, 'amd_rx_6600_8g.jpg', 'Kiến trúc GPU: RDNA 2.0\r\nCores: 1792\r\nVRAM: 8 GB GDDR6 128 bit\r\nClock speed: 1626 MHz\r\nTDP: 132 W'),
(17, 'AMD Radeon RX 7700 XT 12GB Asus DUAL', 2, 2, 'cái', 11990000.0000, 'amd_rx_7600xt_12g.jpg', 'Kiến trúc GPU: RDNA 3.0\r\nCores: 3456\r\nVRAM: 12 GB GDDR6 192 bit\r\nClock speed: 1435 MHz\r\nTDP: 245 W'),
(18, 'AMD Radeon RX 9070 XT 16GB Sapphire PULSE', 2, 2, 'cái', 23490000.0000, 'amd_rx_9070xt_16g.jpg', 'Kiến trúc GPU: RDNA 4.0\r\nCores: 4096\r\nVRAM: 16 GB GDDR6 256 bit\r\nClock speed: 1660 MHz\r\nTDP: 304 W'),
(19, 'intel ARC A580 8GB SPARKLE ORC OC', 2, 1, 'cái', 5290000.0000, 'intel_arc_A580_8g.jpg', 'Kiến trúc GPU: Generation 12.7\r\nCores: 3072\r\nVRAM: 8 GB GDDR6 256 bit\r\nClock speed: 1700 MHz\r\nTDP: 175 W'),
(20, 'intel ARC A770 16GB SPARKLE ROC OC', 2, 1, 'cái', 9990000.0000, 'intel_arc_750_16g.jpg', 'Kiến trúc GPU: Generation 12.7\r\nCores: 4096\r\nVRAM: 16 GB GDDR6 256 bit\r\nClock speed: 2100 MHz\r\nTDP: 225 W'),
(21, 'HDD 1TB Seagate Skyhawk', 6, 16, 'cái', 1350000.0000, 'hdd_1tb_seagate_skyhawk-1.jpg', 'Dung lượng: 1 TB\r\nBộ nhớ đệm: 64MB\r\nKích thước: 101.6 x 25.4 x 146 (mm)\r\nTốc độ đọc: ~210MB/s\r\nTốc độ ghi: ~210MB/s\r\nTốc độ quay: 7200 vòng/phút\r\nMô tả: Đĩa cứng cơ học'),
(22, 'HDD 1TB Western Blue WD10EZEX', 6, 15, 'cái', 1190000.0000, 'hdd_1tb_wd.jpg', 'Dung lượng: 1 TB\r\nBộ nhớ đệm: 64MB\r\nKích thước: 101.6 x 25.4 x 146 (mm)\r\nTốc độ đọc: ~210MB/s\r\nTốc độ ghi: ~210MB/s\r\nTốc độ quay: 7200 vòng/phút\r\nMô tả: Đĩa cứng cơ học'),
(23, 'HDD 1TB–WD PURPLE WD10PURX-78', 6, 15, 'cái', 1400000.0000, 'hdd_1tb_wd_purple.jpg', 'Dung lượng: 1 TB\r\nBộ nhớ đệm: 64MB\r\nKích thước: 26.1 x 147 x 101.6 mm\r\nTốc độ đọc: ~145MB/s\r\nTốc độ ghi: ~210MB/s\r\nTốc độ quay: 5400 vòng/phút\r\nMô tả: Đĩa cứng cơ học'),
(24, 'HDD 2TB Seagate Skyhawk', 6, 16, 'cái', 1990000.0000, 'hdd_2tb_seagate_skyhawk.jpg', 'Dung lượng: 2 TB\r\nBộ nhớ đệm: 64MB\r\nKích thước: 101.6 x 25.4 x 146 (mm)\r\nTốc độ đọc: ~210MB/s\r\nTốc độ ghi: ~210MB/s\r\nTốc độ quay: 7200 vòng/phút\r\nMô tả: Đĩa cứng cơ học'),
(25, 'HDD WD Purple 4TB', 6, 15, 'cái', 2450000.0000, 'hdd_4tb_wd_purple.jpg', 'Dung lượng: 4 TB\r\nBộ nhớ đệm: 64MB\r\nKích thước: 26.1 x 147 x 101.6 mm\r\nTốc độ đọc: ~145MB/s\r\nTốc độ ghi: ~210MB/s\r\nTốc độ quay: 5400 vòng/phút\r\nMô tả: Đĩa cứng cơ học'),
(26, 'SSD Aorus 7000S 2TB Non Heatsink | PCIe Gen4, M.2 NVMe', 6, 42, 'cái', 3190000.0000, 'ssd_2tb_aorus_gen4_nvme.jpg', 'Model: GP-AG70S2TB\r\nChuẩn kết nối: PCI-Express 4.0 x4, NVMe 1.4\r\nDung lượng: 2TB\r\nTốc độ đọc: 7000 MB/s\r\nTốc độ ghi: 6850 MB/s\r\nNAND: 3D TLC NAND Flash\r\nIOPS đọc/ghi ngẫu nhiên: 650k/700k\r\nMTBF: 1.6 triệu giờ\r\nTBW: 1400 TB'),
(27, 'SSD 2TB Samsung 870 EVO (MZ-77E2T0BW) SATA 3', 6, 11, 'cái', 5190000.0000, 'ssd_2tb_samsung_670_evo.jpg', 'Kích thước: 2.5\"\r\nGiao diện: SATA 3\r\nDung lượng: 2TB\r\nTốc độ đọc/ghi: 560 MB/s / 530 MB/s\r\nIOPS đọc/ghi 4K: 98,000 / 88,000\r\nKiểu Flash: TLC (Samsung V-NAND 3bit MLC)'),
(28, 'SSD Western Digital SN740 PCIe Gen4 x4 NVMe M.2 2230 2TB', 6, 15, 'cái', 3600000.0000, 'ssd_2tb_western_digital_sn740-pcie-gen4-x4-nvme_m_2-2230.jpg', 'Chuẩn kết nối: PCI-Express 4.0 x4, NVMe 1.4\r\nDung lượng: 2TB\r\nTốc độ đọc: 7000 MB/s\r\nTốc độ ghi: 6850 MB/s\r\nNAND: 3D TLC NAND Flash\r\nIOPS đọc/ghi ngẫu nhiên: 650k/700k\r\nMTBF: 1.6 triệu giờ\r\nTBW: 1400 TB'),
(29, 'SSD Crucial MX500 3TB 2.5 Inch SATA III', 6, 14, 'cái', 4500000.0000, 'ssd_3tb_crusial_mx500_sata.jpg', 'Kích thước: 2.5\"\r\nGiao diện: SATA 3\r\nDung lượng: 3TB\r\nTốc độ đọc/ghi: 560 MB/s / 530 MB/s\r\nIOPS đọc/ghi 4K: 98,000 / 88,000\r\nKiểu Flash: TLC (Samsung V-NAND 3bit MLC)'),
(30, 'SSD Samsung 990 PRO PCIe 4.0 NVMe SSD 1TB MZ-V9P1T0', 6, 11, 'cái', 2690000.0000, 'ssd_samsung_990_pro_pcie_gen_4_nvme.jpg', 'Nhà sản xuất: Samsung\r\nModel: MZ-V9P1T0\r\nChuẩn giao tiếp: PCIe 4.0\r\nKích thước: M.2\r\nTốc độ đọc: 7450 MB/s\r\nTốc độ ghi: 6900 MB/s'),
(31, 'Msi Tomakawk B550M Pro4', 4, 6, 'cái', 3174000.0000, 'am4__b550_msi_tomahawk_pro4.jpg', 'Hỗ trợ CPU (Bộ vi xử lý)\r\n- Supports 3rd Gen AMD AM4 Ryzen™ / future AMD Ryzen™ Processors*\r\n- Digi Power design\r\n- 8 Power Phase design\r\n*Not compatible with AMD Ryzen™ 5 3400G and Ryzen™ 3 3200G.\r\nChipset \r\n- AMD B550'),
(32, 'Gigabyte A320m-s2h', 4, 5, 'cái', 845000.0000, 'am4_a320m-s2h_gigabyte.jpg', 'Supports AMD Ryzen™ & 7th Generation A-series/ Athlon™ Processors\r\nDual Channel Non-ECC Unbuffered DDR4, 2 DIMMs\r\nUltra-Fast PCIe Gen3 x4 M.2 with PCIe NVMe & SATA mode support\r\nHigh Quality Audio Capacitors and Audio Noise Guard\r\nRealtek® Gigabit LAN with cFosSpeed Internet Accelerator Software\r\nSmart Fan 5 features 5 Temperature Sensors and 2 Hybrid Fan Headers\r\nGIGABYTE™ UEFI BIOS\r\nAll New GIGABYTE™™ APP Center, Simple and Easy Use'),
(33, 'Mainboard Asrock B450M HDV DDR4', 4, 7, 'cái', 1290000.0000, 'am4_b450m_pro4_asrock.jpg', 'Supports AMD AM4 Socket Ryzen™ 2000, 3000, 4000 G-Series, 5000 and 5000 G-Series Desktop Processors\r\nSupports DDR4 3200+ (OC)\r\n1 PCIe 3.0 x16, 1 PCIe 2.0 x16, 1 PCIe 2.0 x1\r\nAMD Quad CrossFireX™\r\nGraphics Output: HDMI, DVI-D, D-Sub\r\n7.1 CH HD Audio (Realtek ALC892 Audio Codec), ELNA Audio Caps\r\n4 SATA3, 1 Ultra M.2 (PCIe Gen3x4)*, 1 M.2 (SATA3)\r\n7 x USB 3.2 Gen1 (1 x Type-C, 2 Front, 4 Rear)\r\nRealtek Gigabit LAN\r\nASRock Polychrome SYNC'),
(34, 'Mainboard Gigabyte B650M GAMING PLUS WIFI DDR5', 2, 5, 'cái', 3340000.0000, 'am5_b650_eagle_gigabyte.jpg', 'AMD Socket AM5：Supports AMD Ryzen™ 7000/ Ryzen™ 8000/ Ryzen™ 9000 Series Processors\r\nUnparalleled Performance：12+2+2 Phases Digital VRM Solution\r\nDual Channel DDR5：4*SMD DIMMs with AMD EXPO™ & Intel® XMP Memory Module Support\r\nSuperSpeed Storage：1*PCIe 5.0 + 2*PCIe 4.0 M.2 Connectors\r\nAdvanced Thermal Design & M.2 Thermal Guard：To Ensure VRM Power Stability & 25110 M.2 SSD Performance\r\nEZ-Latch：PCIe x16 Slot with Quick Release Design\r\nFast Networks：GbE LAN\r\nExtended Connectivity：DP, HDMI, Rear USB® 10Gb/s\r\nSmart Fan 6：Features Multiple Temperature Sensors, Hybrid Fan Headers with FAN STOP\r\nQ-Flash Plus：Update BIOS Without Installing the CPU, Memory and Graphics Card'),
(35, 'Mainboard Gigabyte X670 GAMING X AX', 2, 5, 'cái', 8520000.0000, 'am5_x670_gigabyte.jpg', 'AMD Socket AM5：Supports AMD Ryzen™ 7000 / Ryzen™ 8000 / Ryzen™ 9000 Series Processors\r\nUnparalleled Performance：Twin 16*+2+2 Phases Digital VRM Solution\r\nDual Channel DDR5：4*SMD DIMMs with AMD EXPO™ & Intel® XMP Memory Module Support\r\nNext Generation Storage：1*PCIe 5.0 x4 and 3*PCIe 4.0 x4 M.2 Connectors\r\nMega-Heatpipe & M.2 Thermal Guard：To Ensure VRM Power Stability & 25110 PCIe 5.0 M.2 SSD Performance\r\nEZ-Latch：PCIe x16 Slot & M.2 Connectors with Quick Release & Screwless Design\r\nFast Networks：2.5GbE LAN & Wi-Fi 6E 802.11ax\r\nExtended Connectivity：HDMI, Dual USB-C® 20Gbps and Upcoming GIGABYTE USB4 AIC Support\r\nSmart Fan 6：Features Multiple Temperature Sensors, Hybrid Fan Headers with FAN STOP\r\nQ-Flash Plus：Update BIOS Without Installing the CPU, Memory and Graphics Card\r\n* 8+8 phases parallel power design'),
(36, 'Mainboard Gigabyte X670e Aorus Elite AX', 4, 42, 'cái', 81900000.0000, 'am5_x670e_aorus_gigabyte.jpg', 'Twin 16+2+2 Digital VRM Design\r\n105A Smart Power Stage*\r\n8-Layer 2X Copper PCB\r\nPCIe 5.0 Ready Low Loss PCB\r\n* Power Stage maximum current capacity is based on VCORE Phase.\r\n2 Advanced Thermal Design\r\nFins-Array III with NanoCarbon Coating\r\n12 W/mk Thermal Conductivity Pad\r\nAluminum I/O Cover\r\nNanoCarbon Aluminum Backplate\r\n3 Design Ready for PCI Express 5.0\r\n2* PCIe 5.0 x4 M.2 with 2* PCIe 4.0 x4 M.2 with M.2 Thermal Guard III & II\r\n1*SMD PCIe 5.0 x16 with Ultra Durable™ Armor\r\n1*PCIe 4.0 x4 & 1*PCIe 3.0 x2'),
(37, 'Mainboard ASRock H370M-HDV/M.2', 4, 7, 'cái', 1240000.0000, 'h370m_asrock.jpg', 'Supports 9th and 8th Gen Intel® Core™ Processors (LGA1151)\r\n4 Power Phase\r\nSupports DDR4 2666\r\n1 PCIe 3.0 x16, 1 PCIe 3.0 x1\r\nGraphics Output Options: HDMI, DVI-D, D-Sub\r\nRealtek ALC897 7.1 CH HD Audio Codec\r\n4 SATA3, 1 Ultra M.2 (PCIe Gen3 x4 & SATA3)\r\n4 USB 3.2 Gen1 Type-A (2 Rear, 2 Front),\r\n6 USB 2.0 (4 Rear, 2 Front)\r\nRealtek Gigabit LAN\r\nSupports ASRock Auto Driver Installer'),
(38, 'Mainboard ASRock H610M-H2/M.2 D5', 4, 7, 'cái', 1475000.0000, 'h610m_asrock.jpg', 'Supports 14th, 13th & 12th Gen Intel® Core™ Processors (LGA1700)\r\n6 Phase Power Design\r\n2 x DDR4 DIMMs\r\nSupports Dual Channel, up to 3200\r\n1 PCIe 4.0 x16, 2 PCIe 3.0 x1\r\n1 M.2 Key-E for WiFi\r\nGraphics Output Options: HDMI, DisplayPort, D-Sub\r\nRealtek ALC887/897 7.1 CH HD Audio Codec\r\n4 SATA3\r\n1 Ultra M.2 (PCIe Gen3x4 & SATA3)\r\n4 USB 3.2 Gen1 (2 Rear, 2 Front)\r\n5 USB 2.0 (2 Rear, 3 Front)\r\nIntel® Gigabit LAN'),
(39, 'Mainboard Gigabyte H610M H V3 DDR4 (rev. 1.0)', 4, 5, 'cái', 1690000.0000, 'h610m_gigabyte.jpg', 'Supports Intel® Core™ 14th/ 13th /12th processors\r\nDual Channel Non-ECC Unbuffered DDR4, 2 DIMMs\r\n6+1+1 Hybrid Digital VRM Design\r\nIntel® GbE LAN with cFosSpeed Internet Accelerator Software\r\nNVMe PCIe 3.0 x4 M.2\r\nHigh Quality Audio Capacitors and Audio Noise Guard\r\nSmart Fan 6 Features Multiple Temperature Sensors , Hybrid Fan Headers with FAN STOP\r\nGIGABYTE APP Center, Simple and Easy Use\r\nAnti-Sulfur Resistors Design'),
(40, 'Mainboard Asus Z690 Rog Maximus Extreme Glacial', 4, 4, 'cái', 39000000.0000, 'z890_extreme_asus_rog_maximus.jpg', 'PROCOOL II POWER CỔNG KÉP\r\n24(110A)+1(90A)+2(90A)+2(80A)\r\nTỤ CẤP NGUỒN\r\nKHE MỞ RỘNG\r\n・ 2 x Khe PCIe 5.0 x16\r\nSocket Intel® LGA1851\r\nCho bộ vi xử lý Intel® Core™ Ultra\r\nDDR5, 4 X DIMM\r\n・ Tối đa 256GB\r\n・ Kênh đôi\r\nCard ROG Q-Dimm.2\r\n・ 2 x M.2 22110 (PCIe 4.0 x4)\r\n4 X KHE M.2\r\n・ 2 x M.2 22110 (PCIe 5.0 x4)\r\n・ 1 x M.2 2280 (PCIe 5.0 x4)\r\n・ 1 x M.2 2280 (PCIe 4.0 x4)'),
(41, 'Ram Adata XPG D35G RGB White 8GB | DDR4, 3200MHz, C16', 3, 13, 'cái', 549000.0000, '8gb_adata_xpg_ddr4_rgb_3200mhz.jpg', 'Dung lượng: 8GB\r\nTần số: 3200MHz\r\nLoại: DDR4'),
(42, 'Ram Kingston Fury Beast RGB 8GB | 1x8GB, DDR4, 3200MHz (KF432C16BB2A/8)', 3, 17, 'cái', 629000.0000, '8gb_kingston_fury_beast_ddr4_rgb_3200mhz.jpg', 'Dung lượng: 8GB\r\nBus: DDR4 3200 MHz\r\nĐộ trễ: CL16-18-18\r\nĐiện áp: 1.35v\r\nTản nhiệt: Có\r\nSố thanh: 1 thanh\r\nLED: RGB'),
(43, 'Ram Lexar DDR4 8GB bus 2666', 3, 12, 'cái', 495000.0000, '8gb_lexar_ddr4_2666.jpg', 'Dung lượng: 8GB\r\nBus: DDR4 2666 MHz\r\nĐộ trễ: CL16-18-18\r\nĐiện áp: 1.35v\r\nTản nhiệt: không\r\nSố thanh: 1 thanh'),
(44, 'RAM Laptop Samsung 8GB DDR4 3200MHz', 3, 11, 'cái', 650000.0000, '8gb_samsung_ddr4_laptop_3200mhz.jpg', 'Hãng sản xuất: Samsung Chính hãng\r\nDung lượng: 8GB\r\nBus RAM: 3200MHz\r\nHỗ trợ: SO-DIMM (Laptop)\r\nVoltage: 1.2v'),
(45, 'Ram GSkill Trident Z RGB 16GB DDR4 3600MHz QSD', 3, 10, 'cái', 790000.0000, '16gb_gskill_trident_ddr4_2x8gb_rgb_3200mhz.jpg', 'Hãng sản xuất: Gskill\r\nChuẩn Ram: DDR4\r\nDung lượng: 16 GB (2x 8GB)\r\nBus: 3600MHz\r\nCas: 18-22-22-42\r\nĐiện áp: 1.35v\r\nKhác: Intel XMP 2.0'),
(46, 'Ram Kingbank 16GB DDR5 4800MHz tản nhiệt', 3, 8, 'cái', 830000.0000, '16gb_kingbank_ddr5_4800mhz.jpg', 'Loại ram: DDR5\r\nDung lượng ram: 16GB\r\nHiệu điện thế: 1.35V\r\nBus ram: 4800\r\nĐộ trễ: C38\r\nĐèn led: LED\r\nMàu sắc: Trắng bạc\r\nĐóng gói: 1 thanh ram'),
(47, 'Ram DDR4 TeamGroup 16GB 3200Mhz T-Force Delta RGB (1x 16GB) (TF3D416G3200HC16C01) (Đen)', 3, 18, 'cái', 890000.0000, '16gb_t_force_delta_ddr4_rgb_ddr4_32000mhz.jpeg', 'Hãng sản xuất: TEAMGROUP\r\nChuẩn Ram: DDR4\r\nDung lượng: 16GB (1x 16GB)\r\nBus: 3200MHz\r\nCas: CL16-18-18-38\r\nĐiện áp: 1.35v\r\nHiệu ứng ánh sáng RGB Force Flow tích hợp\r\nHỗ trợ công nghệ ép xung một cú nhấp chuột XMP 2.0'),
(48, 'Ram GSkill Trident Z5 RGB White 32GB | 2 x 16GB, DDR5, 6000MHz', 3, 10, 'cái', 2666000.0000, '32gb_gskill_trident_z5_ddr5_rgb_2x16GB_5600MHz.jpg', 'Loại bộ nhớ: DDR5\r\nDung lượng: 32GB (2 x 16GB)\r\nTốc độ XMP: 6000 MT/s\r\nĐộ trễ: 36-36-36-96\r\nĐiện áp (XMP): 1.35V\r\nTính năng: Intel XMP 3.0'),
(49, 'Ram Kingston Fury Beast RGB 32GB | 1x32GB, DDR4, 3200MHz (KF432C16BB2A/32)', 3, 17, 'cái', 1590000.0000, '32gb_kingston_ddr4_2x16GB_rgb_3200MHz.jpg', 'Dung lượng: 32GB\r\nBus: 3200MHz\r\nĐộ trễ: CL16-20-20\r\nĐiện áp: 1.35V\r\nTản nhiệt: Có'),
(50, 'Ram DDR5 32Gx2 6000 Corsair Vengeance Rgb Cmh64Gx5M2B6000C38', 3, 9, 'cái', 4711000.0000, '64gb_corsair_vengrance_ddr5_(2x32GB)_6000mhz.jpg', 'Dung lượng: 64GB (2 x 32GB)\r\nTốc độ: 6000MHz\r\nLoại bộ nhớ: DDR5\r\nHệ thống tương thích: Intel 600 Series, Intel 700 Series\r\nĐiện áp: 1.35V (test), 1.1V (SPD)\r\nĐộ trễ đã thử nghiệm: 38-44-44-96\r\nVỏ tản nhiệt: Nhôm\r\nHiệu suất XMP 3.0: Có'),
(51, 'Nguồn MSI MAG A650BN 650W 80 Plus Bronze', 5, 6, 'cái', 1349000.0000, '650w_80plus_bronze_msi_a650bn.jpg', 'Chứng chỉ năng lượng hiệu suất cao 80 Plus Bronze\r\n\r\nQuạt độ ồn thấp 120mm\r\n\r\nBảo vệ theo tiêu chuẩn công nghiệp với các chuẩn OVP,OCP,OPP,OTP, SCP\r\n\r\nThiết kế mạch DC-DC\r\n\r\nThiết kế Active PFC'),
(52, 'Nguồn Asus TUF Gaming 650W 80 Plus Bronze (90YE00D0-B0NA00)', 5, 4, 'cái', 1489000.0000, '650w_80plus_bronze_asus_tuf.jpg', 'Công suất: 750W\r\n\r\nChứng nhận: 80 Plus Bronze\r\n\r\nChuẩn nguồn: ATX 12V\r\n\r\nKích thước: 16 x 15 x 8.6 cm\r\n\r\nCáp kết nối: MB 24/20 chân x1/CPU 4 + 4 chân x1/PCI-E 6 + 2 chân x2/SATA x5/Periplheral x4'),
(53, 'Nguồn Gigabyte GP-P650B 650W 80 Plus Bronze', 5, 5, 'cái', 1199000.0000, '650w_80plus_bronze_gigabyte_p650b.jpg', 'Đáp ứng tiêu chuẩn 80 Plus Bronze\r\n\r\nQuạt 120mm trục Hydraulic Bearing\r\n\r\nCable kết nối dạng dẹt – dễ dàng đi dây\r\n\r\nĐường +12V Single Rail\r\n\r\nCông nghệ bảo vệ: OVP/OPP/SCP/UVP/OCP/OTP'),
(54, 'Nguồn Corsair CX750 | 750W, 80 Plus Bronze, ATX', 5, 9, 'cái', 1590000.0000, '750w_80plus_bronze_corsair_cx750webp.jpg', 'Số lượng đầu nối ATX: 1\r\n\r\nPhiên bản ATX12V: v2.31\r\n\r\nLoại cáp: Loại 4\r\n\r\nCông suất liên tục: 750 Watts\r\n\r\nSố lượng đầu nối EPS: 1\r\n\r\nCông nghệ ổ trục quạt: Trượt\r\n\r\nKích thước quạt: 120mm\r\n\r\nSố lượng đầu nối SATA: 3\r\n\r\nModular: Không\r\n\r\nSố lượng đầu nối PCIe: 2\r\n\r\nThời gian trung bình giữa các lần hỏng hóc (MTBF): 100.000 giờ\r\n\r\nKiểu dáng PSU: ATX\r\n\r\nCân nặng: 2,28 kg'),
(55, 'Nguồn ASUS TUF Gaming 850W Gold | 80 Plus Gold, Full Module, PCIe 5.0, ATX 3.0', 5, 4, 'cái', 3999000.0000, '850w_80plus_gold_asus_tuf.jpg', 'ATX Standard: ATX 3.0\r\n\r\nKích thước: 150 x 150 x 86 mm\r\n\r\nHiệu suất: 80Plus Vàng\r\n\r\nCường độ dòng điện tối đa:\r\n\r\n25A, 25A, 70.8A, 0.8A, 3A\r\n\r\nCông suất tải tương ứng:\r\n\r\n130W, 130W, 850W, 9.6W, 15W\r\n\r\nTổng công suất đầu ra: 850W\r\n\r\nCác đầu kết nối:\r\n\r\n1 cáp nguồn bo mạch chủ 24/20 chân, 2 cáp nguồn CPU 4+4 chân, 1 cáp PCI-E'),
(56, 'Gigabyte 850W PCIE5 80 Plus Gold Full Modular (GP-UD850GM-PG5)', 5, 5, 'cái', 2850000.0000, '850w_80plus_gold_gigabyte_gp-ud860gm.jpg', 'Model: GP-UD850GMv\r\n\r\nType: Intel Form Factor ATX 12V v2.31\r\n\r\nPFC PFC hoạt động (> 0.9 điển hình)\r\n\r\nĐiện áp đầu vào 100-240 Vac (toàn dải)\r\n\r\nĐầu vào hiện tại: 12-6A\r\n\r\nTần số đầu vào: 60-50 Hz\r\n\r\nCông suất đầu ra: 850W\r\n\r\nKết nối ATX/MB 20+4 Pin x 1 : 610mm*1CPU/EPS 4+4\r\n\r\nPin x 2 : 600mm*2PCI-e 6+2\r\n\r\nPin x 4 : 600mm+150mm*2SATA x 8 :600mm+150mm+150mm+150mm*24\r\n\r\nPin Peripheral x 3+4-\r\n\r\nPin floppy x 1 : 500mm+120mm+120mm+150mm*1'),
(57, 'Nguồn Gigabyte UD 1000W PG580 Fully Modular 80 Plus Gold(UD1000GM PG5)', 5, 5, 'cái', 4290000.0000, '1000w_80plus_gold_gigabyte.jpg', 'Model:GP-UD1000GM PG5\r\n\r\nType: Intel Form Factor ATX 12V\r\n\r\nĐiện áp đầu vào 100-240 Vac (toàn dải)\r\n\r\nĐầu vào hiện tại: 15-6,5A\r\n\r\nTần số đầu vào  60-50 Hz\r\n\r\nCông suất đầu ra: 1000W\r\n\r\nKết nối ATX/MB 20+4 Pin x 1 : 610mm*1\r\n\r\nCPU/EPS 4+4 Pin x 2 : 600mm+200mm*1\r\n\r\nPCI-e 16 Pin x 1: 700mm*1\r\n\r\nPCI-e 6+2 Pin x 4 : 600mm+150mm*2\r\n\r\nSATA x 8 :\r\n\r\n600mm+150mm+150mm+150mm*2\r\n\r\n4 Pin Peripheral x 3+4-Pin floppy x 1 : 500mm+120mm+120mm+150mm*1'),
(58, 'Nguồn Corsair SF1000 PCIE5 1000W 80 Plus Platinum CP-9020257-NA', 5, 9, 'cái', 5490000.0000, '1000w_80plus_platinum_corsair_sf1000.jpg', 'Công suất nguồn: 1000W\r\n\r\nForm Factor: SFX\r\n\r\nKích thước nguồn: 100 x 125 x 63.5 mm\r\n\r\nLoại dây nguồn: Full-Modular\r\n\r\nKích thước Fan: 92 mm\r\n\r\nChuẩn nguồn ATX: ATX12V V3.1\r\n\r\nTiêu chuẩn: 80 Plus Platinum\r\n\r\nCáp kết nối:\r\n\r\n1x ATX 20+4 pin (300mm)\r\n\r\n2x CPU 4+4 pin (400mm)\r\n\r\n4x PCI-E 6+2 pin*1 (400mm)\r\n\r\n1x 12V-2x6 16 pin (400mm)\r\n\r\n2x SATA*4 (100mm + 115mm + 115mm + 115mm)\r\n\r\n1x 4 pin Peripheral*3 (100mm + 115mm + 115mm)\r\n\r\nNguồn vào AC: 100-240V AC'),
(59, 'Nguồn máy tính Msi MAG A1250GL PCIE5 - 1250W - 80 Plus Gold - Full Modular', 5, 6, 'cái', 9590000.0000, '1250w_gold_80_plus_msi_mag_a1250gl.jpg', 'Công suất tối đa: 1250W\r\n\r\nHiệu suất: 80 Plus Gold\r\n\r\nCáp rời: Full Modular\r\n\r\nChuẩn kích thước: ATX\r\n\r\nSố cổng cắm:\r\n\r\n1 x 24-pin Main, 2 x 8-pin (4+4) EPS, 1 x 16-pin PCIE 5.0, 4 x 8-pin (6+2) PCIE, 12 x SATA, 1 x FDD (4-pin)\r\n\r\nQuạt làm mát: 1 x 135 mm\r\n\r\nNguồn đầu vào: 100 - 240VAC'),
(60, 'NGUỒN CORSAIR AX1600I 1600W (80 PLUS TITANIUM/ FULL MODULAR/MÀU ĐEN)', 5, 9, 'cái', 14590000.0000, '1600w_80plus_titanium_cosair_ax1600i.jpg', 'Công suất danh định: 1600 W\r\n\r\nCông suất thực: 1600 W\r\n\r\nĐầu cấp điện cho main: 24Pin + 4Pin\r\n\r\nĐầu cấp điện cho hệ thống\r\n\r\n- 1 x 24(20+4)-pin. \r\n\r\n- 2 x 8(4+4)-pin ATX12V\r\n\r\n- 8 x 8(6+2)-pin PCI-E\r\n\r\n- 16 x SATA\r\n\r\n- 3 x Molex\r\n\r\n- 2 x Floppy'),
(61, 'Loa Bluetooth JBL GO 4', 7, 19, 'Cái', 1090000.0000, '20250509180122_hinh1.png', 'Công nghệ âm thanh: JBL Sound Pro, JBL PartyBoost\r\nCông suất: 4.2W\r\nChống nước: IP67\r\nBluetooth: 5.3\r\nTính năng: Kết nối nhiều loa Auracast\r\nKích thước: 9.4 x 7.8 x 4.2 cm\r\nTrọng lượng: 190g'),
(62, 'Loa JBL Authentics 300', 7, 19, 'cái', 10900000.0000, '20250509180114_hinh2.png', 'Công nghệ âm thanh nổi với chất lượng hoàn hảo, cân mọi thể loại nhạc\r\nTrang bị công suất lớn đến 100W, lắp đầy âm thanh cho ngôi nhà của bạn\r\nThiết kế lấy cảm hứng cổ điển, tô điểm vẻ sang trọng cho mọi không gian\r\nTrang bị pin dung lượng lớn, cho thời gian nghe nhạc lên đến 8 giờ'),
(63, 'Loa Bluetooth JBL Charge 5', 7, 19, 'Cái', 3490000.0000, '20250509180055_hinh3.png', 'Thiết kế trẻ trung, năng động\r\nCông suất lên đến 40 W mang lại âm thanh mạnh mẽ, sống động\r\nHỗ trợ tính năng PartyBoost cho phép kết nối nhiều loa cùng lúc\r\nTrải nghiệm ở mọi lúc, mọi nơi nhờ vào chuẩn kháng nước IP67\r\nTuỳ chỉnh EQ nhanh chóng và tiện lợi với ứng dụng JBL Portable'),
(64, 'Loa Bluetooth Sony SRS-XE200/BC E', 7, 20, 'Cái', 1250000.0000, '20250509180047_hinh4.png', 'Âm thanh rộng hơn với Bộ khuếch tán hình dạng đường thẳng\r\nBộ loa X-Balanced cho âm thanh mạnh mẽ và rõ ràng\r\nChống nước và chống bụi IP67\r\nThời lượng pin lên đến 16 giờ và sạc nhanh\r\nDây đeo cho tính di động thoải mái'),
(65, 'Loa Bluetooth Sony SRS-XE200/HC E', 7, 20, 'cái', 1480000.0000, '20250509180036_hinh5.png', 'Âm thanh rộng hơn với Bộ khuếch tán hình dạng đường thẳng\r\nBộ loa X-Balanced cho âm thanh mạnh mẽ và rõ ràng\r\nChống nước và chống bụi IP67\r\nThời lượng pin lên đến 16 giờ và sạc nhanh\r\nDây đeo cho tính di động thoải mái'),
(66, 'Loa bluetooth Sony MHC-V41D', 7, 20, 'cái', 7490000.0000, '20250509180020_hinh6.png', 'Thiết kế hình trụ thời thượng\r\nLoa chính được nâng cấp to hơn\r\nCông nghệ mới Spread Sound cho âm thanh vang rộng hơn\r\nHát Karaoke âm thanh mượt và rõ nét\r\nHiệu ứng đèn Party, loa với đèn đa sắc và bảng điều khiển phát sáng sành điệu\r\nKết nối dễ dàng với cổng HDMI, NFC, Bluetooth, USB\r\nHỗ trợ đa dạng các nguồn phát đĩa CD và DVD\r\nHỗ trợ kết nối Guitar điện'),
(67, 'Loa 2.1 Microlab M108', 7, 21, 'cái', 580000.0000, '20250509180010_hinh7.png', 'Thiết Kế: Hệ Thống Loa 2.1\r\nKết Nối: Jack 3.5mm (input) / Jack 3.5mm (output)\r\nChức Năng: Volume Control / Bass Control\r\nCông Suất: 11W RMS'),
(68, 'Loa Bluetooth Microlab MD215', 7, 21, 'Cái', 64000.0000, '20250509180000_hinh8.png', 'Kết Nối: Bluetooth (audio) / Jack 3.5mm (audio) / USB (charge)\r\nDung Lượng Pin: 2200 mAh'),
(69, 'Loa Bluetooth Microlab MD118', 7, 21, 'Cái', 150000.0000, '20250509175950_hinh9.png', 'Tích hợp Đọc USB, TF Card - Kết nối : Bluetooth\r\nSử dụng Pin sạc : 4000 mAh có thể làm pin sạc dự phòng\r\nKết hợp gậy chụp hình không dây qua bluetooth, đèn pin\r\nInput : 5V/1A'),
(70, 'Loa Bluetooth Microlab M660BT', 7, 21, 'Cái', 899000.0000, '20250509175938_hinh10.png', 'Thiết Kế: Hệ Thống Loa 2.1\r\nKết Nối: Bluetooth 4.0, jack 3.5mm\r\nChức Năng: Volume Control / Bass Control'),
(71, 'Màn Hình Acer K202HQL 19.5 inch', 8, 22, 'Cái', 2490000.0000, '20250509175923_hinh11.png', '- Kích thước: 19.5\"\"\r\n- Độ phân giải: 1600 x 900 ( 16:9 )\r\n- Công nghệ tấm nền: TN\r\n- Góc nhìn: 90 (H) / 65 (V)\r\n- Tần số quét: 60Hz\r\n- Thời gian phản hồi: 5 ms'),
(72, 'Màn Hình Dell E2016HV 19.5 inch', 8, 23, 'Cái', 2650000.0000, '20250509175912_hinh12.png', 'Kích thước: 19.5\"\" (1600 x 900), Tỷ lệ 16:9\r\n- Tấm nền TN, Góc nhìn: 170 (H) / 160 (V)\r\n- Tần số quét: 60Hz , Thời gian phản hồi 5 ms\r\n- HIển thị màu sắc: 16.7 triệu màu\r\n- Cổng hình ảnh: 1 x VGA/D-sub'),
(73, 'Màn Hình Samsung 23.5', 8, 11, 'Cái', 5490000.0000, '20250509175859_hinh13.png', '- Kích thước: 23.5\"\"\r\n- Độ phân giải: 1920 x 1080 ( 16:9 )\r\n- Công nghệ tấm nền: PLS\r\n- Góc nhìn: 178 (H) / 178 (V)\r\n- Tần số quét: 60Hz\r\n- Thời gian phản hồi: 4 ms'),
(74, 'Màn hình Xiaomi A27i 27 inch', 8, 24, 'cái', 2390000.0000, '20250509175832_hinh14.png', '- Kích thước: 27\"\" (1920 x 1080), Tỷ lệ 16:9\r\n- Tấm nền IPS, Góc nhìn: 178 (H) / 178 (V)\r\n- Tần số quét: 100Hz , Thời gian phản hồi 6 ms\r\n- HIển thị màu sắc: 16.7 triệu màu\r\n- Cổng hình ảnh: 1 x DisplayPort, 1 x HDMI 2.0'),
(75, 'Màn hình cong Philips 271E1C 27 inch', 8, 25, 'Cái', 3890000.0000, '20250509175817_hinh15.png', '- Kích thước: 27\"\" (1920 x 1080), Tỷ lệ 16:9\r\n- Tấm nền VA, Góc nhìn: 178 (H) / 178 (V)\r\n- Tần số quét: 75Hz , Thời gian phản hồi 4 ms\r\n- HIển thị màu sắc: 16.7 triệu màu\r\n- Cổng hình ảnh: 1 x HDMI 1.4, 1 x VGA/D-sub'),
(76, 'Màn hình Samsung ViewFinity S7 S70D', 8, 11, 'Cái', 5890000.0000, '20250509175757_hinh16.png', '- Kích thước: 27\"\" (3840 x 2160), Tỷ lệ 16:9\r\n- Tấm nền IPS, Góc nhìn: 178 (H) / 178 (V)\r\n- Tần số quét: 60Hz , Thời gian phản hồi 5 ms\r\n- HIển thị màu sắc: 1 tỉ màu\r\n- Cổng hình ảnh: 1 x DisplayPort, 1 x HDMI'),
(77, 'Màn hình SAMSUNG 34\' LC34G55TWWEXXV', 8, 11, 'cái', 7690000.0000, '20250509175744_hinh17.png', '- Kích thước: 34\"\" (3440 x 1440), Tỷ lệ 21:9\r\n- Tấm nền VA, Góc nhìn: 178 (H) / 178 (V)\r\n- Tần số quét: 165Hz , Thời gian phản hồi 1 ms\r\n- HIển thị màu sắc: 16.7 triệu màu\r\n- Cổng hình ảnh: 1 x DisplayPort 1.4, 1 x HDMI'),
(78, 'Màn hình LCD Samsung 27', 8, 11, 'Cái', 22989000.0000, '20250509175728_hinh18.png', '- Kích thước: 27\"\" (5120 x 2880), Tỷ lệ 16:9\r\n- Tấm nền IPS, Góc nhìn: 178 (H) / 178 (V)\r\n- Tần số quét: 60Hz , Thời gian phản hồi 5 ms\r\n- HIển thị màu sắc: 1 tỉ màu\r\n- Cổng hình ảnh: 1 x mini DisplayPort, 3 x USB-A'),
(79, 'Màn hình LG 27MR400-B.ATV 27 inch', 8, 26, 'cái', 2680000.0000, '20250509175708_hinh19.png', 'Kích thước: 27\"\" (1920 x 1080), Tỷ lệ 16:9\r\n- Tấm nền IPS, Góc nhìn: 178 (H) / 178 (V)\r\n- Tần số quét: 100Hz , Thời gian phản hồi 5 ms\r\n- HIển thị màu sắc: 16.7 triệu màu\r\n- Cổng hình ảnh: 1 x HDMI, 1 x VGA/D-sub'),
(80, 'Màn hình Dell E2020H 19.5 inch', 8, 23, 'cái', 2050000.0000, '20250509175647_hinh20.png', '- Kích thước: 19.5\"\" (1600 x 900), Tỷ lệ 16:9\r\n- Tấm nền TN, Góc nhìn: 170 (H) / 160 (V)\r\n- Tần số quét: 60Hz , Thời gian phản hồi 5 ms\r\n- HIển thị màu sắc: 16.7 triệu màu\r\n- Cổng hình ảnh: 1 x DisplayPort, 1 x VGA/D-sub'),
(81, 'Bàn phím Logitech K120', 9, 27, 'cái', 165000.0000, '20250509175626_hinh21.png', '- Kiểu: Bàn phím thường\r\n- Kiểu kết nối: Có dây\r\n- Kích thước: Full size\r\n- Màu sắc: Đen'),
(82, 'Bàn phím Dell KB216 USB', 9, 23, 'Cái', 179000.0000, '20250509175607_hinh22.png', '- Kiểu: Bàn phím thường\r\n- Kiểu kết nối: Có dây\r\n- Kích thước: Full size\r\n- Màu sắc: Đen'),
(83, 'Bàn phím Logitech K270', 9, 27, 'Cái', 415000.0000, '20250509175543_hinh23.png', 'Bàn phím thường\r\n- Kết nối 2.4 GHz Wireless\r\n- Pin: 2 x AA\r\n- Tương thích: Windows 10,11 trở lên'),
(84, 'Bàn phím Apple Magic Keyboard', 9, 28, 'Cái', 2299000.0000, '20250509175515_hinh24.png', 'Bàn phím thường\r\n- Kết nối: Bluetooth, USB Type-C\r\n- Phím chức năng: Có\r\n- Kích thước: 1.09 x 27.89 x 1.49 cm\r\n- Trọng lượng: 239g'),
(85, 'Bàn phím Fuhlen L411', 9, 29, 'cái', 199000.0000, '20250509175436_hinh25.png', 'Bàn phím thường\r\n- Kết nối USB 2.0\r\n- Kiểu kết nối: Có dây\r\n- Phù hợp với các thiết bị PC, laptop,...'),
(86, 'Bàn phím cơ gaming không dây AULA F75', 9, 30, 'cái', 1249000.0000, '20250509175351_hinh26.png', 'Bàn phím cơ\r\n- Kết nối: USB Type-C, Wireless 2.4GHz, Bluetooth\r\n- Switch: Reaper switch\r\n- Phím chức năng: Có'),
(87, 'Bàn phím Newmen E340', 9, 31, 'cái', 160000.0000, '20250509175319_hinh27.png', 'Bàn phím thường\r\n- Kết nối USB 2.0'),
(88, 'Bàn phím Logitech K400 Plus không dây', 9, 27, 'Cái', 699000.0000, '20250509175300_hinh28.png', 'Kiểu: Bàn phím thường\r\n- Kiểu kết nối: không dây\r\n- Phạm vi không dây: 10 m\r\n- Màu sắc: Đen'),
(89, 'Bàn phím không dây Baseus K01A Tri-Mode', 9, 32, 'Cái', 499000.0000, '20250509175245_hinh29.png', '- Thiết kế mỏng, đẹp mắt\r\n- Nhiều màu sắc đa dạng\r\n- Hệ điều hành tương thích: Windows, Apple OS, Linus, Harmony OS, Android\r\n- 3 chế độ kết nối: Wireless 2.4Ghz, Bluetooth 5.0 và Bluetooth 3.0'),
(90, 'Bàn phím cơ DareU EK98L Grey Black Dream switch', 9, 33, 'Cái', 599000.0000, '20250509175220_hinh30.png', '- Bàn phím cơ\r\n- Kết nối: USB\r\n- Switch: Dream switch\r\n- Phím chức năng: Có'),
(91, 'Chuột máy tính Dell MS116', 10, 23, 'cái', 110000.0000, '20250509175116_hinh31.png', '- Kiểu kết nối: Có dây\r\n- Dạng cảm biến: Optical\r\n- Độ phân giải: 1000 DPI\r\n- Màu sắc: Đen'),
(92, 'Chuột máy tính Logitech B100', 10, 27, 'Cái', 80000.0000, '20250509175024_hinh32.png', '- Kiểu kết nối: Có dây\r\n- Dạng cảm biến: Optical\r\n- Độ phân giải: 800 DPI\r\n- Màu sắc: Đen'),
(93, 'Chuột máy tính không dây Logitech M331', 10, 27, 'cái', 34000.0000, '20250509174957_hinh33.png', '- Kiểu kết nối: Không dây\r\n- Dạng cảm biến: Optical\r\n- Độ phân giải: 1000 DPI\r\n- Phạm vi không dây: 10 m\r\n- Màu sắc: Đen'),
(94, 'Chuột gaming Fuhlen L102 1000 DPI', 10, 29, 'cái', 129000.0000, '20250509174937_hinh34.png', '- Kiểu kết nối: Có dây\r\n- Dạng cảm biến: Optical\r\n- Độ phân giải: 1000 DPI\r\n- Màu sắc: Đen'),
(95, 'Chuột không dây Logitech Silent M220', 10, 27, 'Cái', 269000.0000, '20250509174911_hinh35.png', 'Chuột không dây Logitech Silent M220 (Đen). Với độ phân giải quang học cao cùng kết nối không dây mạnh mẽ đem đến hiệu suất cao, làm việc nhanh và có hiệu quả hơn.'),
(96, 'Chuột máy tính không dây Dareu LM115G', 10, 33, 'Cái', 149000.0000, '20250509174852_hinh36.png', '- Cảm biến: PAN3212\r\n- Chuẩn kết nối: 2.4GHz Wireless\r\n- DPI: 800-1200-1600\r\n- IPS: 30\r\n- Tăng tốc: 10G'),
(97, 'Chuột máy tính không dây Dell WM118', 10, 23, 'Cái', 149000.0000, '20250509174820_hinh37.png', '- Kết nối: 2.4 GHz Wireless\r\n- Kiểu cầm: Ambidextrous / Đối xứng\r\n- Độ phân giải: 1000DPI\r\n- Dạng cảm biến: Optical'),
(98, 'Chuột gaming không dây Razer DeathAdder V2 X HyperSpeed', 10, 34, 'cái', 89000.0000, '20250509174343_hinh38.png', '- Thiết kế công thái học\r\n- Kết nối: 2.4GHz và Bluetooth\r\n- Cảm biến: Optical\r\n- Độ nhạy: 14000 DPI'),
(99, 'Chuột công thái học Newmen F1000', 10, 31, 'cái', 499000.0000, '20250509174326_hinh39.png', '- Kết nối: Wireless và Bluetooth linh hoạt\r\n- Kết nối lên đến 3 thiết bị\r\n- Pin sạc lithium, sạc type-C\r\n- Tương thích Mac, Win, Android\r\n- Thiết kế giúp giảm mỏi tay khi dùng lâu'),
(100, 'Chuột không dây HyperWork Silentium MS01', 10, 35, 'Cái', 490000.0000, '20250509174258_hinh40.png', '- Thiết kế công thái học\r\n- Kết nối: Bluetooth 5.1, Wireless 2.4GHz\r\n- DPI tối đa: 2400dpi'),
(101, 'Tản Nhiệt Khí CPU ID-COOLING SE-214-XT', 11, 36, 'Cái', 359000.0000, '20250509174222_hinh41.png', '- Tên sản phẩm: Se-214-Xt\r\n- Dạng tản nhiệt: Tản khí\r\n- Chất liệu: Nhôm'),
(102, 'Tản nhiệt nước Xigmatek FENIX 240 - EN42935', 11, 37, 'cái', 129000.0000, '20250509174201_hinh42.png', '- Tên sản phẩm: EN42935\r\n- Dạng tản nhiệt: Tản nước\r\n- Chất liệu: Nhôm'),
(103, 'Tản nhiệt khí Deepcool AK400 DIGITAL', 11, 38, 'Cái', 890000.0000, '20250509174133_hinh43.png', '- Tên sản phẩm: AK400 DIGITAL\r\n- Dạng tản nhiệt: Tản khí'),
(104, 'Tản nhiệt nước MSI MAG CORELIQUID I360', 11, 6, 'Cái', 299000.0000, '20250509174105_hinh44.png', '- Tên sản phẩm: MAG CORELIQUID I360\r\n- Dạng tản nhiệt: Tản nước\r\n- Chất liệu: Nhôm'),
(105, 'Tản nhiệt khí Xigmatek AIR-KILLER S', 11, 37, 'Cái', 699000.0000, '20250509173939_hinh45.png', '- Tên sản phẩm: AIR-KILLER S\r\n- Dạng tản nhiệt: Tản khí\r\n- Chất liệu: Nhôm'),
(106, 'Tản Nhiệt Khí CPU ID-Cooling SE-214-XT ARGB', 11, 36, 'Cái', 399000.0000, '20250509173911_hinh46.png', '- Tên sản phẩm: Se-214-Xt Argb\r\n- Dạng tản nhiệt: Tản khí\r\n- Chất liệu: Nhôm'),
(107, 'Bộ Tản Nhiệt Nước ID-COOLING FX240 INF ARGB', 11, 36, 'cái', 1390000.0000, '20250509173833_hinh47.png', '- Tên sản phẩm: FX240 INF\r\n- Dạng tản nhiệt: Tản nước\r\n- Chất liệu: Nhôm, Đồng'),
(108, 'Tản nhiệt khí Noctua NH-U12A CH.BK Black CPU Cooler', 11, 39, 'cái', 3390000.0000, '20250509173814_hinh48.png', '- Tên sản phẩm: NH-U12A CH.BK\r\n- Dạng tản nhiệt: Tản khí\r\n- Chất liệu: Nhôm'),
(109, 'Tản nhiệt khí CPU Deepcool AG400 ARGB', 11, 38, 'Cái', 399000.0000, '20250509173713_hinh49.png', '- Tên sản phẩm: AG400 ARGB\r\n- Dạng tản nhiệt: Tản khí'),
(110, 'Tản nhiệt nước Corsair NAUTILUS 360 RS ARGB', 11, 9, 'cái', 2490000.0000, '20250509173644_hinh50.png', '- Tên sản phẩm: NAUTILUS 360 ARGB\r\n- Dạng tản nhiệt: Tản nước AIO\r\n- Chất liệu: Nhôm'),
(111, 'Case MIK AETHER GAMING', 12, 40, 'cái', 649000.0000, '20250509173454_hinh51.png', '- Hỗ trợ mainboard: ITX, Micro-ATX\r\n- Khay mở rộng tối đa: 1 x 3.5\", 1 x 2.5\"\r\n- USB: 1 x USB 3.0, 1 x USB 2.0'),
(112, 'Case MSI MAG FORGE 320R AIRFLOW', 12, 6, 'Cái', 1490000.0000, '20250509173534_hinh52.png', '- Hỗ trợ mainboard: Mini-ITX, Micro-ATX, ATX\r\n- Khay mở rộng tối đa: 2 x 3.5\", 1 x 2.5\"\r\n- USB: 2 x USB 3.2\r\n- Quạt tặng kèm: 1 x 120 mm aRGB, 3 x 120 mm aRGB'),
(113, 'Case Xigmatek Alphard M 3GF', 12, 37, 'cái', 790000.0000, '20250509173429_hinh53.png', '- Hỗ trợ mainboard: Micro-ATX, ITX\r\n- Khay mở rộng tối đa: 1 x 3.5\", 1 x 2.5\"\r\n- USB: 1 x USB 3.0, 2 x USB 2.0\r\n- Quạt tặng kèm: 1 x 120 mm, 2 x 120 mm'),
(114, 'Case Xigmatek Fly 3F', 12, 37, 'Cái', 590000.0000, '20250509173358_hinh54.png', '- Hỗ trợ mainboard: Micro-ATX, ATX, ITX\r\n- Khay mở rộng tối đa: 2 x 3.5\", 3 x 2.5\"\r\n- USB: 1 x USB 3.0, 2 x USB 2.0\r\n- Quạt tặng kèm: 3 x 120 mm'),
(115, 'Thùng máy/ Case MIK Phong Vu Office', 12, 40, 'Cái', 490000.0000, '20250509173139_hinh55.png', '- Hỗ trợ mainboard: Micro-ATX, ITX\r\n- Khay mở rộng tối đa: 1 x 3.5\", 1 x 2.5\"\r\n- USB: 1 x USB 3.0, 2 x USB 2.0\r\n- Quạt tặng kèm: 1 x 120 mm'),
(116, 'Thùng máy/ Case MIK MORAX 3FA BLACK', 12, 40, 'Cái', 790000.0000, '20250509173120_hinh56.png', '- Hỗ trợ mainboard: ITX, Micro-ATX\r\n- Khay mở rộng tối đa: 2 x 3.5\", 2 x 2.5\"\r\n- USB: 1 x USB 3.0, 2 x USB 2.0\r\n- Quạt tặng kèm: 1 x 120 mm, 2 x 140 mm'),
(117, 'Case Xigmatek HERO II AIR 3F', 12, 37, 'cái', 690000.0000, '20250509173053_hinh57.png', '- Hỗ trợ mainboard: Mini-ITX, Micro-ATX, ATX\r\n- Khay mở rộng tối đa: 2 x 3.5\", 2 x 2.5\"\r\n- USB: 1 x USB 3.0, 2 x USB 2.0'),
(118, 'Thùng máy/ Case THERMALTAKE Tower 300 - Black', 12, 41, 'Cái', 2290000.0000, '20250509173016_hinh58.png', '- Hỗ trợ mainboard: Mini-ITX, Micro-ATX\r\n- Khay mở rộng tối đa: 3 x 3.5\", 3 x 2.5\"\r\n- USB: 1 x USB Type C, 2 x USB 3.0'),
(119, 'Thùng máy/ CASE MIK FOCALORS M BLACK (Đen)', 12, 40, 'Cái', 1049000.0000, '20250509172944_hinh59.png', '- Hỗ trợ mainboard: Micro-ATX, ITX\r\n- Khay mở rộng tối đa: 2 x 3.5\", 3 x 2.5\"\r\n- USB: 1 x USB 3.0, 1 x USB 2.0'),
(120, 'Thùng máy/ Case MIK BARBATOS', 12, 40, 'Cái', 1290000.0000, '20250509172859_hinh60.png', '- Hỗ trợ mainboard: ATX, Micro-ATX, ITX\r\n- Khay mở rộng tối đa: 2 x 3.5\", 3 x 2.5\"\r\n- USB: 1 x USB 3.0, 2 x USB 2.0');

-- --------------------------------------------------------

--
-- Table structure for table `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `MATHUONGHIEU` int(11) NOT NULL,
  `TENTHUONGHIEU` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thuonghieu`
--

INSERT INTO `thuonghieu` (`MATHUONGHIEU`, `TENTHUONGHIEU`) VALUES
(1, 'Intel'),
(2, 'AMD'),
(3, 'Nvidia'),
(4, 'Asus'),
(5, 'Gigabyte'),
(6, 'Msi'),
(7, 'Asrock'),
(8, 'Kingbank'),
(9, 'Corsair'),
(10, 'Gskill'),
(11, 'Samsung'),
(12, 'Lexar'),
(13, 'Adata'),
(14, 'Crucial'),
(15, 'Western Digital'),
(16, 'Seagate'),
(17, 'Kingston'),
(18, 'TeamGroup'),
(19, 'JBL'),
(20, 'Sony'),
(21, 'Microlab'),
(22, 'Acer'),
(23, 'Dell'),
(24, 'Xiaomi'),
(25, 'Philips'),
(26, 'LG'),
(27, 'Logitech'),
(28, 'Apple'),
(29, 'Fuhlen'),
(30, 'AULA'),
(31, 'Newmen'),
(32, 'Baseus'),
(33, 'Dareu'),
(34, 'Razer'),
(35, 'Hyper'),
(36, 'ID-Cooling'),
(37, 'Xigmatek'),
(38, 'Deepcool'),
(39, 'Noctua'),
(40, 'MIK'),
(41, 'Thermaltake'),
(42, 'Aorus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD PRIMARY KEY (`MADONHANG`,`MAHANG`),
  ADD KEY `MAHANG` (`MAHANG`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MADONHANG`),
  ADD KEY `MAKHACHHANG` (`MAKHACHHANG`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKHACHHANG`);

--
-- Indexes for table `loaihang`
--
ALTER TABLE `loaihang`
  ADD PRIMARY KEY (`MALOAIHANG`);

--
-- Indexes for table `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`MAHANG`),
  ADD UNIQUE KEY `TENHANG` (`TENHANG`),
  ADD KEY `MALOAIHANG` (`MALOAIHANG`),
  ADD KEY `MATHUONGHIEU` (`MATHUONGHIEU`);

--
-- Indexes for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`MATHUONGHIEU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MADONHANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MAKHACHHANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `loaihang`
--
ALTER TABLE `loaihang`
  MODIFY `MALOAIHANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mathang`
--
ALTER TABLE `mathang`
  MODIFY `MAHANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `MATHUONGHIEU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD CONSTRAINT `ctdonhang_ibfk_1` FOREIGN KEY (`MADONHANG`) REFERENCES `donhang` (`MADONHANG`),
  ADD CONSTRAINT `ctdonhang_ibfk_2` FOREIGN KEY (`MAHANG`) REFERENCES `mathang` (`MAHANG`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MAKHACHHANG`) REFERENCES `khachhang` (`MAKHACHHANG`);

--
-- Constraints for table `mathang`
--
ALTER TABLE `mathang`
  ADD CONSTRAINT `mathang_ibfk_1` FOREIGN KEY (`MALOAIHANG`) REFERENCES `loaihang` (`MALOAIHANG`),
  ADD CONSTRAINT `mathang_ibfk_2` FOREIGN KEY (`MATHUONGHIEU`) REFERENCES `thuonghieu` (`MATHUONGHIEU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
