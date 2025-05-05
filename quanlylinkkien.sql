-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 05, 2025 lúc 04:19 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlylinkkien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctdonhang`
--

CREATE TABLE `ctdonhang` (
  `MADONHANG` int(11) NOT NULL,
  `MAHANG` int(11) NOT NULL,
  `GIABAN` decimal(19,4) NOT NULL,
  `SOLUONG` decimal(10,2) NOT NULL,
  `MUCGIAMGIA` decimal(4,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MADONHANG` int(11) NOT NULL,
  `MAKHACHHANG` int(11) NOT NULL,
  `NGAYBANHANG` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKHACHHANG` int(11) NOT NULL,
  `HOKHACHHANG` varchar(100) NOT NULL,
  `TENKHACHHANG` varchar(100) NOT NULL,
  `GIOITINH` varchar(10) NOT NULL,
  `DIACHI` varchar(100) NOT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `DIENTHOAI` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihang`
--

CREATE TABLE `loaihang` (
  `MALOAIHANG` int(11) NOT NULL,
  `TENLOAIHANG` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihang`
--

INSERT INTO `loaihang` (`MALOAIHANG`, `TENLOAIHANG`) VALUES
(7, 'Loa'),
(8, 'Màn hình'),
(9, 'Bàn phím'),
(10, 'Chuột'),
(11, 'Tản nhiệt'),
(12, 'Case');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mathang`
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
-- Đang đổ dữ liệu cho bảng `mathang`
--

INSERT INTO `mathang` (`MAHANG`, `TENHANG`, `MALOAIHANG`, `MATHUONGHIEU`, `DONVITINH`, `GIABAN`, `ANHMINHHOA`, `THONGSOKYTHUAT`) VALUES
(91, 'Loa Bluetooth JBL GO 4', 7, 27, 'Cái', 1090000.0000, 'hình1', 'Công nghệ âm thanh: JBL Sound Pro, JBL PartyBoost\nCông suất: 4.2W\nChống nước: IP67\nBluetooth: 5.3\nTính năng: Kết nối nhiều loa Auracast\nKích thước: 9.4 x 7.8 x 4.2 cm\nTrọng lượng: 190g'),
(92, 'Loa JBL Authentics 300', 7, 27, 'Cái', 10900000.0000, 'hình2', 'Công nghệ âm thanh nổi với chất lượng hoàn hảo, cân mọi thể loại nhạc\nTrang bị công suất lớn đến 100W, lắp đầy âm thanh cho ngôi nhà của bạn\nThiết kế lấy cảm hứng cổ điển, tô điểm vẻ sang trọng cho mọi không gian\nTrang bị pin dung lượng lớn, cho thời gian nghe nhạc lên đến 8 giờ'),
(93, 'Loa Bluetooth JBL Charge 5', 7, 27, 'Cái', 3490000.0000, 'hinh3', 'Thiết kế trẻ trung, năng động\nCông suất lên đến 40 W mang lại âm thanh mạnh mẽ, sống động\nHỗ trợ tính năng PartyBoost cho phép kết nối nhiều loa cùng lúc\nTrải nghiệm ở mọi lúc, mọi nơi nhờ vào chuẩn kháng nước IP67\nTuỳ chỉnh EQ nhanh chóng và tiện lợi với ứng dụng JBL Portable'),
(94, 'Loa Bluetooth Sony SRS-XE200/BC E', 7, 28, 'Cái', 1250000.0000, 'hinh4', 'Âm thanh rộng hơn với Bộ khuếch tán hình dạng đường thẳng\nBộ loa X-Balanced cho âm thanh mạnh mẽ và rõ ràng\nChống nước và chống bụi IP67\nThời lượng pin lên đến 16 giờ và sạc nhanh\nDây đeo cho tính di động thoải mái'),
(95, 'Loa Bluetooth Sony SRS-XE200/HC E', 7, 28, 'Cái', 1480000.0000, 'hinh5', 'Âm thanh rộng hơn với Bộ khuếch tán hình dạng đường thẳng\nBộ loa X-Balanced cho âm thanh mạnh mẽ và rõ ràng\nChống nước và chống bụi IP67\nThời lượng pin lên đến 16 giờ và sạc nhanh\nDây đeo cho tính di động thoải mái'),
(96, 'Loa bluetooth Sony MHC-V41D', 7, 28, 'Cái', 7490000.0000, 'hinh6', 'Thiết kế hình trụ thời thượng\nLoa chính được nâng cấp to hơn\nCông nghệ mới Spread Sound cho âm thanh vang rộng hơn\nHát Karaoke âm thanh mượt và rõ nét\nHiệu ứng đèn Party, loa với đèn đa sắc và bảng điều khiển phát sáng sành điệu\nKết nối dễ dàng với cổng HDMI, NFC, Bluetooth, USB\nHỗ trợ đa dạng các nguồn phát đĩa CD và DVD\nHỗ trợ kết nối Guitar điện'),
(97, 'Loa 2.1 Microlab M108', 7, 29, 'Cái', 580000.0000, 'hinh7', 'Thiết Kế: Hệ Thống Loa 2.1\nKết Nối: Jack 3.5mm (input) / Jack 3.5mm (output)\nChức Năng: Volume Control / Bass Control\nCông Suất: 11W RMS'),
(98, 'Loa Bluetooth Microlab MD215', 7, 29, 'Cái', 64000.0000, 'hinh8', 'Kết Nối: Bluetooth (audio) / Jack 3.5mm (audio) / USB (charge)\nDung Lượng Pin: 2200 mAh'),
(99, 'Loa Bluetooth Microlab MD118', 7, 29, 'Cái', 150000.0000, 'hinh9', 'Tích hợp Đọc USB, TF Card - Kết nối : Bluetooth\nSử dụng Pin sạc : 4000 mAh có thể làm pin sạc dự phòng\nKết hợp gậy chụp hình không dây qua bluetooth, đèn pin\nInput : 5V/1A'),
(100, 'Loa Bluetooth Microlab M660BT', 7, 29, 'Cái', 899000.0000, 'hinh10', 'Thiết Kế: Hệ Thống Loa 2.1\nKết Nối: Bluetooth 4.0, jack 3.5mm\nChức Năng: Volume Control / Bass Control'),
(101, 'Màn Hình Acer K202HQL 19.5 inch', 8, 30, 'Cái', 2490000.0000, 'hinh11', '- Kích thước: 19.5\"\"\n- Độ phân giải: 1600 x 900 ( 16:9 )\n- Công nghệ tấm nền: TN\n- Góc nhìn: 90 (H) / 65 (V)\n- Tần số quét: 60Hz\n- Thời gian phản hồi: 5 ms'),
(102, 'Màn Hình Dell E2016HV 19.5 inch', 8, 31, 'Cái', 2650000.0000, 'hinh12', 'Kích thước: 19.5\"\" (1600 x 900), Tỷ lệ 16:9\n- Tấm nền TN, Góc nhìn: 170 (H) / 160 (V)\n- Tần số quét: 60Hz , Thời gian phản hồi 5 ms\n- HIển thị màu sắc: 16.7 triệu màu\n- Cổng hình ảnh: 1 x VGA/D-sub'),
(103, 'Màn Hình Samsung 23.5\"', 8, 32, 'Cái', 5490000.0000, 'hinh13', '- Kích thước: 23.5\"\"\n- Độ phân giải: 1920 x 1080 ( 16:9 )\n- Công nghệ tấm nền: PLS\n- Góc nhìn: 178 (H) / 178 (V)\n- Tần số quét: 60Hz\n- Thời gian phản hồi: 4 ms'),
(104, 'Màn hình Xiaomi A27i 27 inch', 8, 33, 'Cái', 2390000.0000, 'hinh14', '- Kích thước: 27\"\" (1920 x 1080), Tỷ lệ 16:9\n- Tấm nền IPS, Góc nhìn: 178 (H) / 178 (V)\n- Tần số quét: 100Hz , Thời gian phản hồi 6 ms\n- HIển thị màu sắc: 16.7 triệu màu\n- Cổng hình ảnh: 1 x DisplayPort, 1 x HDMI 2.0'),
(105, 'Màn hình cong Philips 271E1C 27 inch', 8, 34, 'Cái', 3890000.0000, 'hinh15', '- Kích thước: 27\"\" (1920 x 1080), Tỷ lệ 16:9\n- Tấm nền VA, Góc nhìn: 178 (H) / 178 (V)\n- Tần số quét: 75Hz , Thời gian phản hồi 4 ms\n- HIển thị màu sắc: 16.7 triệu màu\n- Cổng hình ảnh: 1 x HDMI 1.4, 1 x VGA/D-sub'),
(106, 'Màn hình Samsung ViewFinity S7 S70D', 8, 32, 'Cái', 5890000.0000, 'hinh16', '- Kích thước: 27\"\" (3840 x 2160), Tỷ lệ 16:9\n- Tấm nền IPS, Góc nhìn: 178 (H) / 178 (V)\n- Tần số quét: 60Hz , Thời gian phản hồi 5 ms\n- HIển thị màu sắc: 1 tỉ màu\n- Cổng hình ảnh: 1 x DisplayPort, 1 x HDMI'),
(107, 'Màn hình SAMSUNG 34\' LC34G55TWWEXXV', 8, 32, 'Cái', 7690000.0000, 'hinh17', '- Kích thước: 34\"\" (3440 x 1440), Tỷ lệ 21:9\n- Tấm nền VA, Góc nhìn: 178 (H) / 178 (V)\n- Tần số quét: 165Hz , Thời gian phản hồi 1 ms\n- HIển thị màu sắc: 16.7 triệu màu\n- Cổng hình ảnh: 1 x DisplayPort 1.4, 1 x HDMI'),
(108, 'Màn hình LCD Samsung 27\" LS27C900PAEXXV', 8, 32, 'Cái', 22989000.0000, 'hinh18', '- Kích thước: 27\"\" (5120 x 2880), Tỷ lệ 16:9\n- Tấm nền IPS, Góc nhìn: 178 (H) / 178 (V)\n- Tần số quét: 60Hz , Thời gian phản hồi 5 ms\n- HIển thị màu sắc: 1 tỉ màu\n- Cổng hình ảnh: 1 x mini DisplayPort, 3 x USB-A'),
(109, 'Màn hình LG 27MR400-B.ATV 27 inch', 8, 35, 'Cái', 2680000.0000, 'hinh19', 'Kích thước: 27\"\" (1920 x 1080), Tỷ lệ 16:9\n- Tấm nền IPS, Góc nhìn: 178 (H) / 178 (V)\n- Tần số quét: 100Hz , Thời gian phản hồi 5 ms\n- HIển thị màu sắc: 16.7 triệu màu\n- Cổng hình ảnh: 1 x HDMI, 1 x VGA/D-sub'),
(110, 'Màn hình Dell E2020H 19.5 inch', 8, 31, 'Cái', 2050000.0000, 'hinh20', '- Kích thước: 19.5\"\" (1600 x 900), Tỷ lệ 16:9\n- Tấm nền TN, Góc nhìn: 170 (H) / 160 (V)\n- Tần số quét: 60Hz , Thời gian phản hồi 5 ms\n- HIển thị màu sắc: 16.7 triệu màu\n- Cổng hình ảnh: 1 x DisplayPort, 1 x VGA/D-sub'),
(111, 'Bàn phím Logitech K120', 9, 36, 'Cái', 165000.0000, 'hinh21', '- Kiểu: Bàn phím thường\n- Kiểu kết nối: Có dây\n- Kích thước: Full size\n- Màu sắc: Đen'),
(112, 'Bàn phím Dell KB216 USB', 9, 31, 'Cái', 179000.0000, 'hinh22', '- Kiểu: Bàn phím thường\n- Kiểu kết nối: Có dây\n- Kích thước: Full size\n- Màu sắc: Đen'),
(113, 'Bàn phím Logitech K270', 9, 36, 'Cái', 415000.0000, 'hinh23', 'Bàn phím thường\n- Kết nối 2.4 GHz Wireless\n- Pin: 2 x AA\n- Tương thích: Windows 10,11 trở lên'),
(114, 'Bàn phím Apple Magic Keyboard', 9, 37, 'Cái', 2299000.0000, 'hinh24', 'Bàn phím thường\n- Kết nối: Bluetooth, USB Type-C\n- Phím chức năng: Có\n- Kích thước: 1.09 x 27.89 x 1.49 cm\n- Trọng lượng: 239g'),
(115, 'Bàn phím Fuhlen L411', 9, 38, 'Cái', 199000.0000, 'hinh25', 'Bàn phím thường\n- Kết nối USB 2.0\n- Kiểu kết nối: Có dây\n- Phù hợp với các thiết bị PC, laptop,...'),
(116, 'Bàn phím cơ gaming không dây AULA F75', 9, 39, 'Cái', 1249000.0000, 'hinh26', 'Bàn phím cơ\n- Kết nối: USB Type-C, Wireless 2.4GHz, Bluetooth\n- Switch: Reaper switch\n- Phím chức năng: Có'),
(117, 'Bàn phím Newmen E340', 9, 40, 'Cái', 160000.0000, 'hinh27', 'Bàn phím thường\n- Kết nối USB 2.0'),
(118, 'Bàn phím Logitech K400 Plus không dây', 9, 36, 'Cái', 699000.0000, 'hinh28', 'Kiểu: Bàn phím thường\n- Kiểu kết nối: không dây\n- Phạm vi không dây: 10 m\n- Màu sắc: Đen'),
(119, 'Bàn phím không dây Baseus K01A Tri-Mode', 9, 41, 'Cái', 499000.0000, 'hinh29', '- Thiết kế mỏng, đẹp mắt\n- Nhiều màu sắc đa dạng\n- Hệ điều hành tương thích: Windows, Apple OS, Linus, Harmony OS, Android\n- 3 chế độ kết nối: Wireless 2.4Ghz, Bluetooth 5.0 và Bluetooth 3.0'),
(120, 'Bàn phím cơ DareU EK98L Grey Black Dream switch', 9, 42, 'Cái', 599000.0000, 'hinh30', '- Bàn phím cơ\n- Kết nối: USB\n- Switch: Dream switch\n- Phím chức năng: Có'),
(121, 'Chuột máy tính Dell MS116', 10, 31, 'Cái', 110000.0000, 'hinh31', '- Kiểu kết nối: Có dây\n- Dạng cảm biến: Optical\n- Độ phân giải: 1000 DPI\n- Màu sắc: Đen'),
(122, 'Chuột máy tính Logitech B100', 10, 36, 'Cái', 80000.0000, 'hinh32', '- Kiểu kết nối: Có dây\n- Dạng cảm biến: Optical\n- Độ phân giải: 800 DPI\n- Màu sắc: Đen'),
(123, 'Chuột máy tính không dây Logitech M331', 10, 36, 'Cái', 34000.0000, 'hinh33', '- Kiểu kết nối: Không dây\n- Dạng cảm biến: Optical\n- Độ phân giải: 1000 DPI\n- Phạm vi không dây: 10 m\n- Màu sắc: Đen'),
(124, 'Chuột gaming Fuhlen L102 1000 DPI', 10, 38, 'Cái', 129000.0000, 'hinh34', '- Kiểu kết nối: Có dây\n- Dạng cảm biến: Optical\n- Độ phân giải: 1000 DPI\n- Màu sắc: Đen'),
(125, 'Chuột không dây Logitech Silent M220', 10, 36, 'Cái', 269000.0000, 'hinh35', 'Chuột không dây Logitech Silent M220 (Đen). Với độ phân giải quang học cao cùng kết nối không dây mạnh mẽ đem đến hiệu suất cao, làm việc nhanh và có hiệu quả hơn.'),
(126, 'Chuột máy tính không dây Dareu LM115G', 10, 42, 'Cái', 149000.0000, 'hinh36', '- Cảm biến: PAN3212\n- Chuẩn kết nối: 2.4GHz Wireless\n- DPI: 800-1200-1600\n- IPS: 30\n- Tăng tốc: 10G'),
(127, 'Chuột máy tính không dây Dell WM118', 10, 31, 'Cái', 149000.0000, 'hinh37', '- Kết nối: 2.4 GHz Wireless\n- Kiểu cầm: Ambidextrous / Đối xứng\n- Độ phân giải: 1000DPI\n- Dạng cảm biến: Optical'),
(128, 'Chuột gaming không dây Razer DeathAdder V2 X HyperSpeed', 10, 43, 'Cái', 89000.0000, 'hinh38', '- Thiết kế công thái học\n- Kết nối: 2.4GHz và Bluetooth\n- Cảm biến: Optical\n- Độ nhạy: 14000 DPI'),
(129, 'Chuột công thái học Newmen F1000', 10, 40, 'Cái', 499000.0000, 'hinh39', '- Kết nối: Wireless và Bluetooth linh hoạt\n- Kết nối lên đến 3 thiết bị\n- Pin sạc lithium, sạc type-C\n- Tương thích Mac, Win, Android\n- Thiết kế giúp giảm mỏi tay khi dùng lâu'),
(130, 'Chuột không dây HyperWork Silentium MS01', 10, 44, 'Cái', 490000.0000, 'hinh40', '- Thiết kế công thái học\n- Kết nối: Bluetooth 5.1, Wireless 2.4GHz\n- DPI tối đa: 2400dpi'),
(161, 'Tản Nhiệt Khí CPU ID-COOLING SE-214-XT', 11, 45, 'Cái', 359000.0000, 'hinh41', '- Tên sản phẩm: Se-214-Xt\n- Dạng tản nhiệt: Tản khí\n- Chất liệu: Nhôm'),
(162, 'Tản nhiệt nước Xigmatek FENIX 240 - EN42935', 11, 46, 'Cái', 129000.0000, 'hinh42', '- Tên sản phẩm: EN42935\n- Dạng tản nhiệt: Tản nước\n- Chất liệu: Nhôm'),
(163, 'Tản nhiệt khí Deepcool AK400 DIGITAL', 11, 47, 'Cái', 890000.0000, 'hinh43', '- Tên sản phẩm: AK400 DIGITAL\n- Dạng tản nhiệt: Tản khí'),
(164, 'Tản nhiệt nước MSI MAG CORELIQUID I360', 11, 48, 'Cái', 299000.0000, 'hinh44', '- Tên sản phẩm: MAG CORELIQUID I360\n- Dạng tản nhiệt: Tản nước\n- Chất liệu: Nhôm'),
(165, 'Tản nhiệt khí Xigmatek AIR-KILLER S', 11, 46, 'Cái', 699000.0000, 'hinh45', '- Tên sản phẩm: AIR-KILLER S\n- Dạng tản nhiệt: Tản khí\n- Chất liệu: Nhôm'),
(166, 'Tản Nhiệt Khí CPU ID-Cooling SE-214-XT ARGB', 11, 45, 'Cái', 399000.0000, 'hinh46', '- Tên sản phẩm: Se-214-Xt Argb\n- Dạng tản nhiệt: Tản khí\n- Chất liệu: Nhôm'),
(167, 'Bộ Tản Nhiệt Nước ID-COOLING FX240 INF ARGB', 11, 45, 'Cái', 1390000.0000, 'hinh47', '- Tên sản phẩm: FX240 INF\n- Dạng tản nhiệt: Tản nước\n- Chất liệu: Nhôm, Đồng'),
(168, 'Tản nhiệt khí Noctua NH-U12A CH.BK Black CPU Cooler', 11, 49, 'Cái', 3390000.0000, 'hinh48', '- Tên sản phẩm: NH-U12A CH.BK\n- Dạng tản nhiệt: Tản khí\n- Chất liệu: Nhôm'),
(169, 'Tản nhiệt khí CPU Deepcool AG400 ARGB', 11, 47, 'Cái', 399000.0000, 'hinh49', '- Tên sản phẩm: AG400 ARGB\n- Dạng tản nhiệt: Tản khí'),
(170, 'Tản nhiệt nước Corsair NAUTILUS 360 RS ARGB', 11, 50, 'Cái', 2490000.0000, 'hinh50', '- Tên sản phẩm: NAUTILUS 360 ARGB\n- Dạng tản nhiệt: Tản nước AIO\n- Chất liệu: Nhôm'),
(171, 'Case MIK AETHER GAMING', 12, 51, 'Cái', 649000.0000, 'hinh51', '- Hỗ trợ mainboard: ITX, Micro-ATX\n- Khay mở rộng tối đa: 1 x 3.5\", 1 x 2.5\"\n- USB: 1 x USB 3.0, 1 x USB 2.0'),
(172, 'Case MSI MAG FORGE 320R AIRFLOW', 12, 48, 'Cái', 1490000.0000, 'hinh52', '- Hỗ trợ mainboard: Mini-ITX, Micro-ATX, ATX\n- Khay mở rộng tối đa: 2 x 3.5\", 1 x 2.5\"\n- USB: 2 x USB 3.2\n- Quạt tặng kèm: 1 x 120 mm aRGB, 3 x 120 mm aRGB'),
(173, 'Case Xigmatek Alphard M 3GF', 12, 46, 'Cái', 790000.0000, 'hinh53', '- Hỗ trợ mainboard: Micro-ATX, ITX\n- Khay mở rộng tối đa: 1 x 3.5\", 1 x 2.5\"\n- USB: 1 x USB 3.0, 2 x USB 2.0\n- Quạt tặng kèm: 1 x 120 mm, 2 x 120 mm'),
(174, 'Case Xigmatek Fly 3F', 12, 46, 'Cái', 590000.0000, 'hinh54', '- Hỗ trợ mainboard: Micro-ATX, ATX, ITX\n- Khay mở rộng tối đa: 2 x 3.5\", 3 x 2.5\"\n- USB: 1 x USB 3.0, 2 x USB 2.0\n- Quạt tặng kèm: 3 x 120 mm'),
(175, 'Thùng máy/ Case MIK Phong Vu Office', 12, 51, 'Cái', 490000.0000, 'hinh55', '- Hỗ trợ mainboard: Micro-ATX, ITX\n- Khay mở rộng tối đa: 1 x 3.5\", 1 x 2.5\"\n- USB: 1 x USB 3.0, 2 x USB 2.0\n- Quạt tặng kèm: 1 x 120 mm'),
(176, 'Thùng máy/ Case MIK MORAX 3FA BLACK', 12, 51, 'Cái', 790000.0000, 'hinh56', '- Hỗ trợ mainboard: ITX, Micro-ATX\n- Khay mở rộng tối đa: 2 x 3.5\", 2 x 2.5\"\n- USB: 1 x USB 3.0, 2 x USB 2.0\n- Quạt tặng kèm: 1 x 120 mm, 2 x 140 mm'),
(177, 'Case Xigmatek HERO II AIR 3F', 12, 46, 'Cái', 690000.0000, 'hinh57', '- Hỗ trợ mainboard: Mini-ITX, Micro-ATX, ATX\n- Khay mở rộng tối đa: 2 x 3.5\", 2 x 2.5\"\n- USB: 1 x USB 3.0, 2 x USB 2.0'),
(178, 'Thùng máy/ Case THERMALTAKE Tower 300 - Black', 12, 52, 'Cái', 2290000.0000, 'hinh58', '- Hỗ trợ mainboard: Mini-ITX, Micro-ATX\n- Khay mở rộng tối đa: 3 x 3.5\", 3 x 2.5\"\n- USB: 1 x USB Type C, 2 x USB 3.0'),
(179, 'Thùng máy/ CASE MIK FOCALORS M BLACK (Đen)', 12, 51, 'Cái', 1049000.0000, 'hinh59', '- Hỗ trợ mainboard: Micro-ATX, ITX\n- Khay mở rộng tối đa: 2 x 3.5\", 3 x 2.5\"\n- USB: 1 x USB 3.0, 1 x USB 2.0'),
(180, 'Thùng máy/ Case MIK BARBATOS', 12, 51, 'Cái', 1290000.0000, 'hinh60', '- Hỗ trợ mainboard: ATX, Micro-ATX, ITX\n- Khay mở rộng tối đa: 2 x 3.5\", 3 x 2.5\"\n- USB: 1 x USB 3.0, 2 x USB 2.0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `MATHUONGHIEU` int(11) NOT NULL,
  `TENTHUONGHIEU` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`MATHUONGHIEU`, `TENTHUONGHIEU`) VALUES
(27, 'JBL'),
(28, 'Sony'),
(29, 'Microlab'),
(30, 'Acer'),
(31, 'Dell'),
(32, 'Samsung'),
(33, 'Xiaomi'),
(34, 'Philips'),
(35, 'LG'),
(36, 'Logitech'),
(37, 'Apple'),
(38, 'Fuhlen'),
(39, 'AULA'),
(40, 'Newmen'),
(41, 'Baseus'),
(42, 'Dareu'),
(43, 'Razer'),
(44, 'Hyper'),
(45, 'ID-Cooling'),
(46, 'Xigmatek'),
(47, 'Deepcool'),
(48, 'MSI'),
(49, 'Noctua'),
(50, 'Corsair'),
(51, 'MIK'),
(52, 'Thermalta');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD PRIMARY KEY (`MADONHANG`,`MAHANG`),
  ADD KEY `MAHANG` (`MAHANG`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MADONHANG`),
  ADD KEY `MAKHACHHANG` (`MAKHACHHANG`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKHACHHANG`);

--
-- Chỉ mục cho bảng `loaihang`
--
ALTER TABLE `loaihang`
  ADD PRIMARY KEY (`MALOAIHANG`);

--
-- Chỉ mục cho bảng `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`MAHANG`),
  ADD UNIQUE KEY `TENHANG` (`TENHANG`),
  ADD KEY `MALOAIHANG` (`MALOAIHANG`),
  ADD KEY `MATHUONGHIEU` (`MATHUONGHIEU`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`MATHUONGHIEU`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MADONHANG` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MAKHACHHANG` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaihang`
--
ALTER TABLE `loaihang`
  MODIFY `MALOAIHANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `mathang`
--
ALTER TABLE `mathang`
  MODIFY `MAHANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `MATHUONGHIEU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD CONSTRAINT `ctdonhang_ibfk_1` FOREIGN KEY (`MADONHANG`) REFERENCES `donhang` (`MADONHANG`),
  ADD CONSTRAINT `ctdonhang_ibfk_2` FOREIGN KEY (`MAHANG`) REFERENCES `mathang` (`MAHANG`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MAKHACHHANG`) REFERENCES `khachhang` (`MAKHACHHANG`);

--
-- Các ràng buộc cho bảng `mathang`
--
ALTER TABLE `mathang`
  ADD CONSTRAINT `mathang_ibfk_1` FOREIGN KEY (`MALOAIHANG`) REFERENCES `loaihang` (`MALOAIHANG`),
  ADD CONSTRAINT `mathang_ibfk_2` FOREIGN KEY (`MATHUONGHIEU`) REFERENCES `thuonghieu` (`MATHUONGHIEU`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
