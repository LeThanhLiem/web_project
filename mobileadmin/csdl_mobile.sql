-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th9 26, 2018 lúc 09:38 AM
-- Phiên bản máy phục vụ: 5.7.21
-- Phiên bản PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `csdl_mobile`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_ID` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manu_image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_ID`, `manu_name`, `manu_image`) VALUES
(1, 'Đồ chơi Trẻ em', 'Logo.png'),
(2, 'Đô Chơi Trẻ Em ToysBox', 'Logo2.png'),
(3, 'Đồ Chơi Trẻ Em ToysRUS', 'Logo3.npg'),
(4, 'Đồ Chơi Trẻ Em MyToys', 'Logo1.npg'),
(5, 'Đồ Chơi Trẻ EM MArval', 'Logo4.ipg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `manu_ID` int(11) NOT NULL,
  `type_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ID`, `name`, `price`, `image`, `des`, `manu_ID`, `type_ID`) VALUES
(1, 'Lego chiến tranh', 877, 'LegoCT.jpg', 'đồ chơi cho trẻ em mạnh mẽ.', 1, 1),
(2, 'Doll', 963, 'DollXQ.jpg', 'Búp bê cho các em nhỏ.', 1, 2),
(3, 'Mô hình xe đua Bạch Tuộc', 800, 'XeduaBT.jpg', 'Mô hình xe đua.', 1, 3),
(4, 'Xe đồ chơi', 777, 'Xedochoi.jpg', 'Xe đồ chơi cho các em.', 1, 4),
(5, 'Đồ chơi nhà bếp.', 997, 'Dochoinhabep.jpg', 'Đầy đủ đồ dùng trong bộ đồ chơi nhà bếp', 1, 5),
(6, 'Lego người sắt', 845, 'Lego người sắt', 'Lego người sắt', 2, 1),
(7, 'Búp bê barbie', 843, 'Bupbexxxxxx.jpg', 'Búp bê xinh ', 2, 2),
(8, 'MÔ hình láp ráp đồ chơi', 600, 'Mohinhlr.jpg', 'Mô hình láp ráp ', 2, 3),
(9, 'Xe điều khiển từ xa', 845, 'Xedieuk.jpg', 'Xe điều khiển từ xa.', 2, 4),
(10, 'Bộ đồ chơi nhà bếp ahihj', 311, 'Dochoinhabep.jpg', 'Bộ đồ chơi nhà bếp ahiihihihihihi', 2, 5),
(11, 'Lego người nhện', 843, 'Legonguoinhen.jpg', 'Lego người nhện', 3, 1),
(12, 'Bup bê nam', 555, 'Bupbenam.jpg', 'Búp bê nam ', 3, 2),
(13, 'Mô hình máy bay ', 877, 'Mohinhmaybay.jpg', 'Mô hình máy bay ', 3, 3),
(14, 'Xe dua f1', 857, 'Xeduaf1.jpg', 'xe dua f1 100m', 3, 4),
(15, 'Xe Yaz', 10000, 'Yaz.jpg', 'xe thế hệ mới', 3, 4),
(16, 'xe Raider', 10000, 'RAider.ipg', 'best xe rider', 3, 4),
(17, 'Lego micecraft', 999, 'lego434.jpg', 'best đập đá', 3, 1),
(18, 'Lego doraemon', 1111, 'doremon.jpg', 'doremon cute', 4, 1),
(19, 'Dồ CHơi Bếp dao', 1111, 'dao.jpg', 'dao cực sắt', 5, 5),
(20, 'đồ chơi xe lắc', 9999, 'nhun.jpg', 'lắc cực mạnh', 4, 4),
(21, 'Lego micecraft', 999, 'lego434.jpg', 'best đập đá', 3, 1),
(22, 'Lego doraemon', 1111, 'doremon.jpg', 'doremon cute', 4, 1),
(23, 'Dồ CHơi Bếp dao', 1111, 'dao.jpg', 'dao cực sắt', 5, 5),
(24, 'đồ chơi xe lắc', 9999, 'nhun.jpg', 'lắc cực mạnh', 4, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_ID` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_img` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`type_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_ID`, `type_name`, `type_img`) VALUES
(1, 'Lego', 'lego.png'),
(2, 'Búp bê', 'bupbe.jpg'),
(3, 'Mô hình', 'mohinh.jpg'),
(4, 'Xe đồ chơi', 'cartoy.jpg'),
(5, 'Đồ chơi nhà bếp', 'nhabep.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
