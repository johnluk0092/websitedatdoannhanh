-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 18, 2018 lúc 05:19 PM
-- Phiên bản máy phục vụ: 10.1.35-MariaDB
-- Phiên bản PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethd`
--

CREATE TABLE `chitiethd` (
  `Id` int(11) NOT NULL,
  `IdHd` int(11) NOT NULL,
  `IdMon` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitiethd`
--

INSERT INTO `chitiethd` (`Id`, `IdHd`, `IdMon`, `SoLuong`) VALUES
(23, 1, 19, 2),
(28, 2, 31, 4),
(29, 2, 8, 1),
(30, 2, 18, 4),
(31, 3, 10, 3),
(32, 3, 26, 1),
(33, 4, 13, 1),
(34, 5, 48, 4),
(35, 5, 19, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `IdCm` int(11) NOT NULL,
  `TenTk` varchar(50) NOT NULL,
  `NoiDungCm` text NOT NULL,
  `Time` datetime NOT NULL,
  `IdSp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`IdCm`, `TenTk`, `NoiDungCm`, `Time`, `IdSp`) VALUES
(35, 'toan', 'cơm ngonnn', '2018-12-08 15:46:59', 11),
(36, 'toan', 'i like sting', '2018-12-08 15:50:27', 18),
(37, 'toan', 'ngon bổ rẻ', '2018-12-08 15:50:39', 18),
(38, 'toan', 'tốt', '2018-12-08 18:11:15', 11),
(39, 'toan', 'good', '2018-12-08 18:11:22', 11),
(40, 'toan', 'hay', '2018-12-08 18:11:26', 11),
(41, 'toan', 'quá tuyệt', '2018-12-08 18:11:33', 11),
(42, 'toan', 'tuyệt vời', '2018-12-08 18:11:43', 11),
(43, 'toan', 'like', '2018-12-08 18:11:53', 11),
(44, 'toan', 'ưadwada', '2018-12-08 18:12:03', 11),
(45, 'toan', 'ưadadad', '2018-12-08 18:12:08', 11),
(46, 'toan', 'ưdaaaaaaaaaa', '2018-12-08 18:12:14', 11),
(47, 'toan', 'hế lô', '2018-12-08 18:54:19', 11),
(48, 'toan', 'tôi yêu các bạn', '2018-12-08 19:20:14', 11),
(49, 'toan', 'commen đỉnh cao', '2018-12-08 19:20:36', 11),
(50, 'toan', 'ZSXsZDxsd', '2018-12-08 19:20:40', 11),
(51, 'toan1', 'user thứ 2', '2018-12-08 19:22:53', 11),
(52, 'toan1', 'qsqas', '2018-12-08 19:22:57', 11),
(53, 'toan1', 'qsqsqs', '2018-12-08 19:22:59', 11),
(54, 'toan1', 'dfgvdgvfdxv', '2018-12-08 19:33:25', 11),
(55, 'toan1', 'uầy ngon\n', '2018-12-08 19:33:42', 8),
(56, 'toan1', 'ship có tâm', '2018-12-08 19:33:53', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `IdHd` int(11) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `DiaChi` text NOT NULL,
  `Sdt` varchar(11) NOT NULL,
  `TongTien` int(10) NOT NULL,
  `Ngay` datetime NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`IdHd`, `HoTen`, `DiaChi`, `Sdt`, `TongTien`, `Ngay`, `TrangThai`) VALUES
(1, 'Anh Toàn', '175-Tây Sơn - Đống Đa - HN', '0944083294', 110000, '2018-12-11 02:16:37', 0),
(2, 'ĐInh NGọc Toàn', 'Đại Học Thuỷ Lợi 2019', '01689262320', 325000, '2018-12-12 01:55:25', 1),
(3, 'Nguyễn VĂn A', 'ĐHTL', '01689262320', 230000, '2018-12-12 20:12:13', 0),
(4, 'abc', 'ngõ 1 Thái Thịnh', '0986532322', 15000, '2018-12-13 12:05:13', 0),
(5, 'Nguyễn VĂn A', 'dhtl', '01689262320', 270000, '2018-12-17 15:26:17', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `IdMenu` int(11) NOT NULL,
  `TenMenu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`IdMenu`, `TenMenu`) VALUES
(1, 'Cơm Set'),
(2, 'Giải Khát'),
(3, 'Korean Food'),
(4, 'Phở - Mì'),
(5, 'Đồ Ăn Vặt'),
(6, 'ComBo 95k');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon`
--

CREATE TABLE `mon` (
  `IdMon` int(11) NOT NULL,
  `IdMenu` int(11) NOT NULL,
  `Anh` varchar(100) NOT NULL,
  `TenMon` varchar(100) NOT NULL,
  `Gia` varchar(100) NOT NULL,
  `TinhTrang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `mon`
--

INSERT INTO `mon` (`IdMon`, `IdMenu`, `Anh`, `TenMon`, `Gia`, `TinhTrang`) VALUES
(1, 1, '1541762302_com-rang-hai-san-70k.jpeg', 'Cơm Rang Hải Sản', '70000', 'Sẵn Sàng'),
(2, 1, '1541762421_com-rang-thit-xien-60k.jpg', 'Cơm Rang Thịt Xiên', '60000', 'Còn Hàng'),
(3, 1, '1541763106_com-vien-chua-ngot-60k.jpg', 'Cơm Viên Chua Ngọt', '60000', 'Còn Hàng'),
(4, 1, '1541763352_com-ca-kho-thit-60k.jpg', 'Cơm Cá Kho Thịt', '60000', 'Còn Hàng'),
(5, 1, '1541763635_com-tom-xu-60k.jpg', 'Cơm Tôm Xù', '60000', 'Còn Hàng'),
(7, 1, 'Cơm Bò Rau Cải Xào Tỏi 65k.jpg', 'Cơm Bò Rau Cải', '65000', 'Còn Hàng'),
(8, 1, 'cơm bò sốt tiêu 65k.jpg', 'Cơm Bò Sốt Tiêu', '65000', 'Còn Hàng'),
(9, 1, 'cơm bò xào nấm 65k.jpg', 'Cơm Bò Xào Nấm', '65000', 'Còn Hàng'),
(10, 1, 'Cơm Gà Bơ Tỏi 60k.jpg', 'Cơm Gà Bơ Tỏi', '60000', 'Còn Hàng'),
(11, 1, 'com-rang-dua-bo-60k.jpg', 'Cơm Rang Dưa Bò', '60000', 'Còn Hàng'),
(12, 2, '1541934456_sua-chua-milo-30k.jpg', 'Sữa Chua Mít', '30000', 'Còn Hàng'),
(13, 2, '1542018483_tra-thai-xanh 15k.jpg', 'Trà Thái', '15000', 'Còn Hàng'),
(14, 2, '1542018555_tra-dao 25k.jpg', 'Trà Đào', '25000', 'Còn Hàng'),
(15, 2, '1542018659_nuoc-suoi 10k.png', 'Nước Suối', '10000', 'Còn Hàng'),
(16, 2, 'Hoa Quả Dầm  Sữa Chua Mít 30k.jpg', 'Hoa Quả Dầm, Sữa Chua Mít', '30000', 'Còn Hàng'),
(17, 2, 'n-c-ng-t-3-42062.jpg', 'Nước Ngọt Các Loại', '10000', 'Còn Hàng'),
(18, 2, 'number-1-chai-nhua-1423555686597-59-0-390-650-crop-1423555702543_02.jpg', 'Number One Chai Nhựa', '10000', 'Còn Hàng'),
(19, 2, 'nuoc ep hoa qua 30k.jpg', 'Nước Ép Hoa Quả', '30000', 'Còn Hàng'),
(20, 3, 'Cánh Gà Chiên Sốt Cay-2C 50k.jpg', 'Cánh Gà Chiên Sốt Cay', '50000', 'Tạm Hết Hàng'),
(21, 3, 'Chajangmuyn - Mỳ Đen 55k.jpg', 'Mỳ Đen', '55000', 'Còn Hàng'),
(22, 3, 'Cơm Rang Kim Chi 65k.jpg', 'Cơm Rang Kim Chi', '65000', 'Còn Hàng'),
(23, 3, 'Cơm Trộn HQ 65k.jpg', 'Cơm Trộn Hàn Quốc', '65000', 'Còn Hàng'),
(24, 3, 'Gimbab - Cơm Cuốn 30k.jpg', 'Gimbab Cơm Cuốn', '30000', 'Còn Hàng'),
(25, 3, 'Gà Xào Bắp Cải Phomai 65k.jpg', 'Gà Xào Bắp Cải Phomai', '65000', 'Còn Hàng'),
(26, 3, 'Gà Viên Sốt Cay 50k.jpg', 'Gà Viên Sốt Cay', '50000', 'Còn Hàng'),
(27, 4, 'Miến Xào Lươn -Hải Sản 70k.jpg', 'Miến Xào Lươn Hải Sản', '70000', 'Còn Hàng'),
(28, 4, 'Mỳ Cay Samyang Full Option 55k.jpg', 'Mỳ Cay Samyang', '55000', 'Còn Hàng'),
(29, 4, 'Mỳ Xào Bò 50k.jpg', 'Mỳ Xào Bò', '50000', 'Còn Hàng'),
(30, 4, 'Spaggetti Bolongesse chese 55k.jpg', 'Spagetti', '55000', 'Sẵn Sàng'),
(31, 4, 'Phở Xào Bò 55k.jpg', 'Phở Xào Bò', '55000', 'Sẵn Sàng'),
(32, 5, 'Bánh Tráng Trộn 30k.jpg', 'Bánh Tráng Trộn', '30000', 'Sẵn Sàng'),
(33, 5, 'Bánh Trưng Rán Lạp Xưởng 35k.jpg', 'Bánh Trưng Rán Lạp Xưởng', '35000', 'Sẵn Sàng'),
(34, 5, 'Bim Bim Mực Thái Lan 65k.jpg', 'Bim Bim Mực Thái Lan', '65000', 'Còn Hàng'),
(35, 5, 'Cánh Gà Rán KFC 25k.jpg', 'Cánh Gà Rán KFC', '25000', 'Sẵn Sàng'),
(36, 5, 'Chân Gà Rang Muối 2c 50k.jpg', 'Chân Gà Rang Muối 2C', '50000', 'Sẵn Sàng'),
(37, 5, 'Chân Gà Rút Xương Sốt Thái 110k.jpg', 'Chân Gà Rút Xương Sốt Thái', '110000', 'Sẵn Sàng'),
(38, 5, 'Combo 4 Cổ Rang Muối - Chân Rang Muối - Nước 15k.jpg', 'Cổ Gà Rang Muối', '15000', 'Sẵn Sàng'),
(39, 5, 'Đùi Gà Rán KFC 50k.jpg', 'Đùi Gà Rán KFC', '50000', 'Sẵn Sàng'),
(40, 5, 'Hạt Rẻ Mật Ong 30k.jpg', 'Hạt Rẻ Mật Ong', '30000', 'Còn Hàng'),
(41, 5, 'Heo Sợi Cháy Tỏi-Khô Gà Xé Cay 80k.jpg', 'Khô Gà Xé Cay', '80000', 'Sẵn Sàng'),
(42, 5, 'Khoai Lang Kén 35k.jpg', 'Khoai Lang Kén', '35000', 'Sẵn Sàng'),
(43, 5, 'Khoai Tây Chiên 30k.jpg', 'Khoai Tây Chiên', '30000', 'Sẵn Sàng'),
(44, 6, 'Combo 1- Gimbab - Mỳ Xào Tokbokki - Nước 15 95k.jpg', 'Combo1 : gymbab, mỳ xào, nước ngọt', '95000', 'Sẵn Sàng'),
(45, 6, 'Combo 2 Mỳ Đen - Tokboki - Nước 15k 95k.jpg', 'combo2: mỳ đen, toboky, nước', '95000', 'Sẵn Sàng'),
(46, 6, 'Combo 3 Cơm 55k - Gà Chiên Viên - Nước 15k.jpg', 'combo3: cơm, gà viên chiên, nước', '95000', 'Sẵn Sàng'),
(47, 5, 'Combo 4 Cổ Rang Muối - Chân Rang Muối - Nước 15k.jpg', 'combo4: cổ , chân gà rang muối, nước', '95000', 'Sẵn Sàng'),
(48, 1, 'Cơm Gà Popcorn Chua Ngọt 60k.jpg', 'Cơm Gà Chua Ngọt', '60000', 'Sẵn Sàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Ten` varchar(100) NOT NULL,
  `MatKhau` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Level` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`Id`, `Ten`, `MatKhau`, `Email`, `Level`, `TrangThai`) VALUES
(1, 'toan', 'c4ca4238a0b923820dcc509a6f75849b', 'dinhngoctoan@gmail.com', 1, 0),
(4, 'toan1', 'c4ca4238a0b923820dcc509a6f75849b', 'toan@gmail.com', 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`IdCm`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`IdHd`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`IdMenu`);

--
-- Chỉ mục cho bảng `mon`
--
ALTER TABLE `mon`
  ADD PRIMARY KEY (`IdMon`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiethd`
--
ALTER TABLE `chitiethd`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `IdCm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `IdMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `mon`
--
ALTER TABLE `mon`
  MODIFY `IdMon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
