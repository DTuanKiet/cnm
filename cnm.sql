-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 26, 2025 lúc 02:06 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cnm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaCT` int(11) NOT NULL,
  `MaDonHang` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaCT`, `MaDonHang`, `MaSP`, `SoLuong`, `Gia`) VALUES
(1, 12, 1, 2, 1690000.00),
(2, 13, 1, 1, 1690000.00),
(3, 14, 1, 2, 1690000.00),
(4, 3, 1, 5, 1690000.00),
(5, 4, 1, 1, 1750000.00),
(6, 4, 2, 1, 2000000.00),
(7, 5, 2, 1, 2000000.00),
(8, 6, 2, 1, 2000000.00),
(9, 7, 30, 1, 1380000.00),
(10, 8, 1, 1, 1750000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `ngaylap` datetime DEFAULT current_timestamp(),
  `tongtien` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `hoten`, `diachi`, `sdt`, `ngaylap`, `tongtien`) VALUES
(1, 'minh', '12', '12', '2025-05-20 16:28:36', 0.00),
(2, '', '', '', '2025-05-20 16:28:48', 0.00),
(3, '', '', '', '2025-05-20 16:30:34', 0.00),
(4, '', '', '', '2025-05-22 16:22:52', 0.00),
(5, '', '', '', '2025-05-22 16:23:19', 0.00),
(6, '', '', '', '2025-05-22 16:26:31', 0.00),
(7, '', '', '', '2025-05-22 16:32:19', 0.00),
(8, '', '', '', '2025-05-26 17:49:08', 0.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `idrole` int(11) NOT NULL,
  `namerole` varchar(100) NOT NULL,
  `mota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`idrole`, `namerole`, `mota`) VALUES
(1, 'Quản Lý', 'Quản lý khách hàng, Nhúng Tách'),
(3, 'Khách hàng', 'Xem và sửa thông tin cá nhân, Nhúng và Tách tin, gửi tin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `GiaGoc` double NOT NULL,
  `GiaBan` double DEFAULT NULL,
  `HinhAnh` varchar(50) NOT NULL,
  `MaTH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `GiaGoc`, `GiaBan`, `HinhAnh`, `MaTH`) VALUES
(1, 'Anker MagGo Power Bank (10K, Slim)', 1850000, 1750000, '1.webp', 1),
(2, 'Anker Prime Charger (100W, 3 Ports, GaN)', 2100000, 2000000, '2.webp', 1),
(3, 'Anker Prime Charging Station (8-in-1, 240W)', 3700000, 3600000, '3.webp', 1),
(4, 'Anker Nano Charger (100W) with USB-C Cable', 1100000, 1000000, '4.webp', 1),
(5, 'Anker 737 Power Bank (PowerCore 24K)', 5400000, 5300000, '5.webp', 1),
(6, 'Anker 622 Magnetic Battery (MagGo)', 650000, 750000, '6.webp', 2),
(7, 'Anker 525 Charging Station (7-in-1)', 1700000, NULL, '7.webp', 2),
(8, 'Anker Soundcore Life Q30 Headphones', 2445000, NULL, '8.webp', 2),
(9, 'Anker Soundcore Liberty Air 2 Pro Earbuds', 1470000, NULL, '9.webp', 2),
(10, 'Anker PowerExpand+ 7-in-1 USB-C Hub', 1470000, NULL, '10.webp', 2),
(11, 'AUKEY LC-MC311A MagFusion 3-in-1 Wireless Charger ', 3200000, 3100000, '11.webp', 2),
(12, 'AUKEY HD-MC13A MagFusion Dash Pro Wireless Chargin', 1000000, 900000, '12.webp', 2),
(13, 'AUKEY LC-MC10 Qi2 Magnetic Wireless Charger', 620000, 520000, '13.webp', 2),
(14, 'AUKEY LC-MC312 MagFusion Z Qi2 3-in-1 Foldable Wir', 2950000, 2850000, '14.webp', 2),
(15, 'AUKEY HD-MC13 Qi2 Wireless Charging Phone Mount', 1350000, 1250000, '15.webp', 2),
(16, 'AUKEY LC-MC311 MagFusion Qi2 3-in-1 Wireless Charg', 2700000, 2600000, '16.webp', 2),
(17, 'AUKEY LC-G10 MagFusion GameFrost Qi2 Active Coolin', 1050000, 950000, '17.webp', 2),
(18, 'AUKEY Omnia Mix 65W PD Charger', 1050000, 950000, '18.webp', 2),
(19, 'AUKEY EP-T21 True Wireless Earbuds', 730000, 630000, '19.webp', 2),
(20, 'AUKEY PB-Y36 10000mAh Power Bank', 700000, 600000, '20.webp', 2),
(21, 'Baseus Blade Laptop Power Bank 100W 20000mAh', 3200000, 3100000, '21.webp', 3),
(22, 'Baseus Bowie H1i Bluetooth Headphones', 1480000, 1380000, '22.webp', 3),
(23, 'Baseus Magnetic Portable Charger 20W 10000mAh', 740000, 640000, '23.webp', 3),
(24, 'Baseus GaN3 Pro 65W Fast Charger', 1230000, 1130000, '24.webp', 3),
(25, 'Baseus Encok W04 Pro TWS Earphones', 740000, 640000, '25.webp', 3),
(26, 'Baseus 100W USB-C to USB-C Cable', 245000, 145000, '26.webp', 3),
(27, 'Baseus 6-in-1 USB-C Hub', 1230000, 1130000, '27.webp', 3),
(28, 'Baseus Super Energy Car Jump Starter', 1480000, 1380000, '28.webp', 3),
(29, 'Baseus A2 Car Vacuum Cleaner', 1135000, 1035000, '29.webp', 3),
(30, 'Baseus Smart Eye Series Desk Lamp', 1480000, 1380000, '30.webp', 3),
(31, 'UGREEN Steam Deck Dock 6-in-1 USB-C Docking Statio', 1200000, 1100000, '31.webp', 4),
(32, 'UGREEN Revodok Pro 109 9-in-1 USB-C Hub', 1320000, 1220000, '32.webp', 4),
(33, 'UGREEN Revodok Max 8-in-1 Thunderbolt 4 Docking St', 6000000, 5900000, '33.webp', 4),
(34, 'UGREEN USB-C Hub 10Gbps, 4 Ports USB 3.2 Adapter', 720000, 620000, '34.webp', 4),
(35, 'UGREEN 100W GaN Fast Charger', 1320000, 1220000, '35.webp', 4),
(36, 'UGREEN HiTune T3 ANC Wireless Earbuds', 768000, 668000, '36.webp', 4),
(37, 'UGREEN 20W USB-C Charger', 360000, 260000, '37.webp', 4),
(38, 'UGREEN 10000mAh Magnetic Wireless Power Bank', 1104000, 1004000, '38.webp', 4),
(39, 'UGREEN 2-in-1 USB-C Card Reader', 336000, 236000, '39.webp', 4),
(40, 'UGREEN Ethernet Adapter USB 3.0 to RJ45', 288000, 188000, '40.webp', 4),
(43, 'Remax RP-U31 3-Port USB Charger', 160000, 60000, '43.webp', 5),
(48, 'Remax RB-M26 Bluetooth Speaker', 1200000, 1100000, '48.webp', 5),
(51, 'Sony WH-1000XM5 Wireless Noise-Canceling Headphone', 8490000, 8390000, '51.jpg', 6),
(52, 'Sony WF-1000XM4 True Wireless Earbuds', 5990000, 5890000, '52.jpg', 6),
(53, 'Sony SRS-XB43 Portable Bluetooth Speaker', 3990000, 3890000, '53.jpg', 6),
(54, 'Sony Alpha a7 III Mirrorless Camera', 35990000, 35890000, '54.jpg', 6),
(55, 'Sony PlayStation 5 Console', 14490000, 14390000, '55.jpg', 6),
(56, 'Sony Bravia XR A90J OLED TV', 89900000, 89800000, '56.jpg', 6),
(57, 'Sony Xperia 1 III Smartphone', 26900000, 26800000, '57.jpg', 6),
(58, 'Sony HT-A7000 Soundbar', 19990000, 19890000, '58.jpg', 6),
(59, 'Sony ZV-E10 Vlogging Camera', 16900000, 16800000, '59.jpg', 6),
(60, 'Sony UBP-X700 4K Ultra HD Blu-ray Player', 4990000, 4890000, '60.jpg', 6),
(61, 'JBL Flip 6', 3200000, 3100000, '61.jpg', 7),
(62, 'JBL Charge 5', 3500000, 3400000, '62.jpg', 7),
(63, 'JBL Clip 4', 1000000, 900000, '63.jpg', 7),
(65, 'JBL Tune 230NC TWS', 2500000, 2400000, '65.jpg', 7),
(66, 'JBL Tune 510BT', 1000000, 900000, '66.jpg', 7),
(67, 'JBL Quantum 400', 1500000, 1400000, '67.jpg', 7),
(68, 'JBL Reflect Mini NC', 3400000, 3300000, '68.jpg', 7),
(69, 'JBL Endurance Peak II', 2500000, 2400000, '69.jpg', 7),
(70, 'JBL PartyBox 310', 11000000, 10900000, '70.jpg', 7),
(71, 'AirPods Pro (2nd Gen)', 5800000, 5700000, '71.jpg', 8),
(72, 'AirPods Max', 12700000, 12600000, '72.jpg', 8),
(73, 'AirPods (3rd Gen)', 3900000, 3800000, '73.jpg', 8),
(74, 'AirTag', 700000, 600000, '74.jpg', 8),
(75, 'Apple Pencil (2nd Gen)', 3000000, 2900000, '75.jpg', 8),
(76, 'MagSafe Charger', 900000, 800000, '76.jpg', 8),
(77, 'Smart Keyboard Folio', 5800000, 5700000, '77.jpg', 8),
(78, 'Magic Mouse 2', 2300000, 2200000, '78.jpg', 8),
(79, 'Magic Keyboard', 3500000, 3400000, '79.jpg', 8),
(80, 'Apple Watch Magnetic Charging Cable', 700000, 600000, '80.jpg', 8),
(81, 'Galaxy Buds 2', 3300000, 3200000, '81.jpg', 9),
(82, 'Galaxy Buds Pro', 3700000, 3600000, '82.jpg', 9),
(83, 'Galaxy SmartTag', 560000, 460000, '83.jpg', 9),
(84, 'S Pen Pro', 2300000, 2200000, '84.jpg', 9),
(85, 'Wireless Charger Duo', 1600000, 1500000, '85.jpg', 9),
(86, 'Samsung 10000mAh Battery Pack', 800000, 700000, '86.jpg', 9),
(87, 'Galaxy Watch Charger', 700000, 600000, '87.jpg', 9),
(88, 'Samsung DeX Station', 1000000, 900000, '88.jpg', 9),
(89, 'Galaxy Z Fold5 Slim S Pen Case', 780000, 680000, '89.jpg', 9),
(90, 'Samsung 35W Duo Travel Adapter', 800000, 700000, '90.jpg', 9),
(91, 'Mi Wireless Power Bank 10000mAh', 1200000, 1100000, '91.jpg', 10),
(92, 'Xiaomi 50W Wireless Car Charger', 2000000, 1900000, '92.jpg', 10),
(93, 'Xiaomi Smart Plug 2 (WiFi)', 400000, 300000, '93.jpg', 10),
(94, 'Xiaomi 67W Car Charger', 600000, 500000, '94.jpg', 10),
(95, 'Mi LCD Writing Tablet 13.5\"', 1500000, 1400000, '95.jpg', 10),
(96, 'Xiaomi Smart Laser Measure', 1000000, 900000, '96.jpg', 10),
(97, 'Xiaomi Electric Scooter Cable Lock', 300000, 200000, '97.jpg', 10),
(98, 'Xiaomi Magnetic Charging Cable', 150000, 50000, '98.jpg', 10),
(99, 'Xiaomi Commuter Helmet', 1500000, 1400000, '99.jpg', 10),
(100, 'Xiaomi Electric Scooter Riding Gloves', 800000, 700000, '100.jpg', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `MaTH` int(11) NOT NULL,
  `TenTH` varchar(30) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `Website` varchar(50) NOT NULL,
  `DienThoai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`MaTH`, `TenTH`, `DiaChi`, `Website`, `DienThoai`) VALUES
(1, 'Anker Innovations', '10900 NE 8th Street, 5th Floor, Bellevue, WA 98004, USA', 'https://www.anker.com', 'N/A'),
(2, 'Aukey', 'N/A', 'https://www.aukey.com', '888-882-8539'),
(3, 'Baseus', 'Room 601, Floor 6, Building B, Baseus Intelligent Industrial Park, No. 2008 Xuegang Road, Shenzhen, ', 'https://www.baseus.com', 'N/A'),
(4, 'Ugreen', 'N/A', 'https://www.ugreen.com', '+86 755 2806 65'),
(5, 'Remax', 'N/A', 'https://www.remax.com', '800-525-7452'),
(6, 'Sony Corporation of America', '25 Madison Avenue, 26th Floor, New York, NY 10010-8601, USA', 'https://www.sony.com', '+1 212-833-6722'),
(7, 'JBL (Harman International)', 'N/A', 'https://www.jbl.com', '800-336-4525'),
(8, 'Apple Inc.', 'Apple Park, Cupertino, California, USA', 'https://www.apple.com', '1-800-692-7753'),
(9, 'Samsung Electronics America', '85 Challenger Rd, Ridgefield Park, NJ 07660, USA', 'https://www.samsung.com', 'N/A'),
(10, 'Xiaomi Inc.', 'Xiaomi Campus, Anningzhuang Road, Haidian District, Beijing, China', 'https://www.mi.com', '+86 10 6060 666'),
(11, 'SoundPEATS', 'N/A', 'https://soundpeats.com', '+86 137 1486 52'),
(12, 'Haylou', 'N/A', 'https://haylou.com', '400 8555 083'),
(13, 'Logitech', '3930 North First Street, San Jose, CA 95134, USA', 'https://www.logitech.com', '+1 510-795-8500'),
(14, 'Razer Inc.', '9 Pasteur, Irvine, CA 92618, USA', 'https://www.razer.com', '1-855-872-5233'),
(15, 'Corsair Gaming Inc.', '115 N. McCarthy Blvd., Milpitas, CA 95035, USA', 'https://www.corsair.com', '+1 510-657-8747');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `MaTT` int(11) NOT NULL,
  `TieuDe` varchar(255) DEFAULT NULL,
  `NgayDang` date DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `HinhAnh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`MaTT`, `TieuDe`, `NgayDang`, `MoTa`, `HinhAnh`) VALUES
(1, 'API', NULL, '. RESTful API (PHP Backend)\r\nMỗi chức năng (login, signup, gửi/nhận tin nhắn) được tách thành một tệp PHP riêng biệt, ví dụ:\r\n\r\nlogin.php – xử lý đăng nhập\r\n\r\nsignup.php – xử lý đăng ký\r\n\r\ninsert-chat.php – lưu tin nhắn mới\r\n\r\nget-chat.php – lấy tin nhắn\r\n\r\nGiao tiếp bằng HTTP methods như POST.', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nameuser` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `idrole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`iduser`, `nameuser`, `password`, `phonenumber`, `idrole`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '123456789', 1),
(12, 'haha', 'b59c67bf196a4758191e42f76670ceba', '001', 3),
(18, 'dada', 'e10adc3949ba59abbe56e057f20f883e', '002', 3),
(20, 'wow', '81dc9bdb52d04dc20036dbd8313ed055', '003', 3),
(21, 'khoa', '81dc9bdb52d04dc20036dbd8313ed055', '004', 3),
(22, 'hphp', 'b59c67bf196a4758191e42f76670ceba', '005', 3),
(23, 'okok', 'b59c67bf196a4758191e42f76670ceba', '123123', 3),
(24, '1', 'c4ca4238a0b923820dcc509a6f75849b', '1', 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaCT`),
  ADD KEY `MaDonHang` (`MaDonHang`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idrole`),
  ADD UNIQUE KEY `namerole` (`namerole`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `CompID` (`MaTH`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`MaTH`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`MaTT`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `nameuser` (`nameuser`),
  ADD UNIQUE KEY `phonenumber` (`phonenumber`),
  ADD KEY `idrole` (`idrole`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MaCT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `MaTH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaTH`) REFERENCES `thuonghieu` (`MaTH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idrole`) REFERENCES `role` (`idrole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
