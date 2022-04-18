-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 11, 2020 lúc 09:49 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tourdiscover`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_group_id` int(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `admin_group_id`) VALUES
(1, 'sangsama', '96e79218965eb72c92a549dd5a330112', 'dang hoai sang', 1),
(17, 'songvedem', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Hoàng Đức', 0),
(10, 'meocute97', '25f9e794323b453885f5181f1b624d0b', 'Hoàng Đức', 0),
(11, 'sangvipbmt', '25f9e794323b453885f5181f1b624d0b', 'sang sáng sủa', 0),
(13, 'dikbmt', 'e10adc3949ba59abbe56e057f20f883e', 'Y Dik Mi Lé', 0),
(19, 'cuongbmt@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Cường Cần Cù', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_group`
--

CREATE TABLE `admin_group` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `sort_order` tinyint(4) NOT NULL DEFAULT 0,
  `permissions` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `admin_group`
--

INSERT INTO `admin_group` (`id`, `name`, `sort_order`, `permissions`) VALUES
(1, 'Admin', 1, 'a:14:{s:4:\"tran\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:13:\"product_order\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:3:\"cat\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:7:\"product\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:11:\"admin_group\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:5:\"admin\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:4:\"user\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:4:\"news\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:4:\"info\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:7:\"support\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:7:\"contact\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:7:\"comment\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:5:\"slide\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:5:\"video\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}}'),
(2, 'Mod', 2, 'a:9:{s:3:\"cat\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:7:\"product\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:4:\"news\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:4:\"info\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:7:\"support\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:7:\"contact\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:7:\"comment\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:5:\"slide\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}s:5:\"video\";a:2:{i:0;s:4:\"list\";i:1;s:6:\"change\";}}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(50) COLLATE utf8_bin NOT NULL,
  `site_title` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_info` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `sort_order` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `image_link`, `site_title`, `title_info`, `meta_desc`, `meta_key`, `parent_id`, `sort_order`) VALUES
(1, 'Adventure', 'photo-1489493887464-892be6d1daae.jpg', 'This is the title description Adventure', 'Adventure is simply dummy text of the printing and typesetting industry', '', '', 0, 0),
(2, 'Historical', 'photo-1550566167-163a6a29c8c7.jpg', 'This is the title description Historical tour', 'Historical is simply dummy text of the printing and typesetting industry', '', '', 0, 1),
(3, 'Boat', 'pexels-photo-208701.jpeg', 'This is the title description Boat Tour', 'Boat is simply dummy text of the printing and typesetting industry', '', '', 0, 2),
(11, 'Family', 'family.jpg', 'This is a description Family', 'Family is simply dummy text of the printing and typesetting industry', '', '', 2, 3),
(12, 'Luxury Tour', 'Luxury.jpg', 'This is a description Luxury Tour', 'Luxury Tour is simply dummy text of the printing and typesetting industry', '', '', 2, 4),
(13, 'Private', 'private.png', 'This is a description Private', 'Private is simply dummy text of the printing and typesetting industry', '', '', 3, 0),
(14, 'Australia', 'Uustralia.png', 'This is a description Australia', 'Australia is simply dummy text of the printing and typesetting industry', '', '', 3, 1),
(15, 'Couples', 'couple1.jpg', 'This is a description Couples', 'Couples is simply dummy text of the printing and typesetting industry', '', '', 3, 2),
(16, 'Festivals Events', 'photo-1559060680-36abfac01944.jpg', 'Description Festivals Events', 'Festivals and Events is simply dummy text of the printing and typesetting industry', '', '', 3, 3),
(17, 'North America', 'Around_Iceland_Adventure.jpg', 'This is description North America', 'North America is simply dummy text of the printing and typesetting industry', '', '', 3, 5),
(18, 'Asia Tours', 'Asia.jpg', 'This is a description Asia Tours', 'Asia Tours is simply dummy text of the printing and typesetting industry.', '', '', 3, 6),
(25, 'Mountain', 'photo-1572252009286-268acec5ca0a.jpg', 'This is the title description Mountain Tour', 'Mountain is simply dummy text of the printing and typesetting industry', '', '', 0, 1),
(31, 'Europe Tours', 'people-on-a-gondola-1796736.jpg', 'This is a description Europe Tours', 'Europe Tours is simply dummy text of the printing and typesetting industry', '', '', 25, 0),
(44, 'Beach', 'beach.jpg', 'This is the title description Beach Tour', 'Beach is simply dummy text of the printing and typesetting industry', '', '', 0, 0),
(45, 'Bycicle', 'photo-1447678523326-1360892abab8.jpg', 'This is the title description Bycicle Tour', 'Bycicle is simply dummy text of the printing and typesetting industry', '', '', 0, 0),
(46, 'Event', 'air_ballon.jpg', 'This is the title description Event Tour', 'Event is simply dummy text of the printing and typesetting industry', '', '', 0, 0),
(49, 'Couples', 'photo-1524492412937-b28074a5d7da.jpg', 'This is the sub title description Couples', 'Couples is simply dummy text of the printing and typesetting industry', '', '', 0, 0),
(51, 'Private', 'photo-1504197885-609741792ce7.jpg', ' This is the title description Private Tour', 'Private is simply dummy text of the printing and typesetting industry', '', '', 51, 0),
(57, 'Afica', 'africa.jpg', 'This is a description Afica', 'Afica is simply dummy text of the printing and typesetting industry', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `parent_id` int(255) NOT NULL,
  `user_name` text COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL,
  `count_like` int(255) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `product_id`, `parent_id`, `user_name`, `user_email`, `user_id`, `user_ip`, `content`, `created`, `count_like`, `status`) VALUES
(1, 7, 0, 'Hoang van tuyen', 'hoangvantuyencnt@gmail.com', 0, '', 'San pham noi con khong admin?                    ', 1408798677, 10, 1),
(2, 7, 1, 'Vu van Anh', 'anh@gmail.com', 0, '', 'San pham nay van con hang', 1408799662, 3, 1),
(3, 7, 0, 'abc', 'hoang@gmail.com', 0, '', 'Test comment             ', 1408800324, 8, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(128) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `content_static`
--

CREATE TABLE `content_static` (
  `id` int(11) NOT NULL,
  `key` varchar(128) COLLATE utf8_bin NOT NULL DEFAULT '',
  `content` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `content_static`
--

INSERT INTO `content_static` (`id`, `key`, `content`) VALUES
(3, 'footer', '<p class=\"bold\">\r\n &copy;2013 -2014 Bản quyền thuộc về&nbsp; <strong>C&ocirc;ng ty TNHH Tuấn Thoa media &ndash; Đại l&yacute; VTC Digital</strong></p>\r\n<p>\r\n Lĩnh vực hoạt động của c&ocirc;ng ty: Điện &amp; điện tử , b&aacute;n lẻ &amp; b&aacute;n bu&ocirc;n</p>\r\n<p>\r\n <strong>Cơ sở 1:</strong>: Cẩm La, X&atilde; Thanh Sơn, Huyện Kiến Thụy, Th&agrave;nh Phố Hải Ph&ograve;ng - DT: 0313881505</p>\r\n<p>\r\n <strong>Cơ sở 2:</strong>: Cẩm Xu&acirc;n, N&uacute;i Đối, Huyện Kiến Thụy, Th&agrave;nh Phố Hải Ph&ograve;ng - DT: 0313812682</p>\r\n'),
(18, 'shipping', '<p>\r\n Chi ph&iacute; vận chuyển của Tuấn Thoa Media</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `info`
--

INSERT INTO `info` (`id`, `title`, `content`, `meta_desc`, `meta_key`, `created`) VALUES
(1, 'Giới thiệu', '<p>\r\n	Giới thiệu</p>\r\n', '', '', 1409044792),
(2, 'Hướng dẫn mua hàng', '<p>\r\n	Hướng dẫn mua h&agrave;ng</p>\r\n', '', '', 1409044950);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `maker`
--

CREATE TABLE `maker` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `site_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(255) NOT NULL,
  `title` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(50) COLLATE utf8_bin NOT NULL,
  `created` int(11) NOT NULL DEFAULT 0,
  `feature` enum('0','1') COLLATE utf8_bin NOT NULL,
  `count_view` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `intro`, `content`, `meta_desc`, `meta_key`, `image_link`, `created`, `feature`, `count_view`) VALUES
(4, 'Top 10 Hotels: Rating by Wonder Tour Travel Experts', '(Dân trí) - Sau khi Tổng thống Obama phê chuẩn cho không kích các mục tiêu của nhóm phiến quân Hồi giáo IS ở miền bắc Iraq, Lầu Năm Góc đã tiến hành 3 đợt không kích.', '<p>Các vụ không kích nhằm vào nhóm Nhà nước Hồi giáo (IS) ở miền bắc Iraq là những cuộc tấn công đầu tiên kể từ khi Mỹ trực tiếp tham gia vào hoạt động quân sự ở Iraq và sau đó rút quân vào cuối năm 2011.</p><p>Trong cuộc không kích đầu tiên vào ngày thứ sáu, máy bay không người lái cùng chiến đấu cơ hải quân Mỹ đã nhắm vào các mục tiêu gần thành phố Irbil của người Kurd. Sau đó họ tiến hành thêm 2 đợt tấn công nữa.</p><p>Nhóm Hồi giáo người Sunni IS đã chiếm quyền kiểm soát nhiều khu vực của Iraq và cả Syria.</p><p>Hàng chục ngàn người thuộc các nhóm dân tộc thiểu số đã phải rời bỏ nhà cửa khi phiến quân tiến vào.</p><p>Nhóm IS hay còn được gọi là ISIS cũng đã chiếm đập lớn nhất Iraq.</p><p>Lầu Năm Góc cho biết trong đợt không kích thứ hai, máy bay không người lái của Mỹ đã phá hủy một vị trí đặt pháo của phiến quân và tiêu diệt một nhóm phiến quân.</p><p>Chỉ hơn một tiếng sau, chiến đấu cơ F/A-18 đã dùng bom có laser dẫn đường bắn trúng một đoàn 7 xe của IS.</p><p>Trước đó, vào ngày thứ sáu, 2 quả bom đã được thả xuống một khẩu pháo của IS dùng để chống lại lực lượng đang bảo vệ Irbil, thủ phủ của vùng tự trị của người Kurd.</p><p>Phát ngôn viên Bộ Ngoại giao Mỹ Marie Harf cho biết mục tiêu trước mắt của các cuộc không kích là “ngăn chặn bước tiến” của IS về Irbil.</p><p>“Sau đó về lâu dài chung tôi muốn phối hợp hỗ trợ thêm thời gian và không gian cho các lực lượng của người Kurd để xốc lại lực lượng, chiến đấu với đe dọa của chính họ”.</p><p>Bà cũng khẳng định “không có giải pháp quân sự lâu dài của Mỹ ở đó”.</p><p>Mặc dù chính phủ Iraq và Vùng người Kurd vẫn còn đang có bất đồng trong những tháng qua, nhưng Thủ tướng Nouri Maliki đã phái một máy bay chở đạn tới Irbil và thứ sáu. Trước đó ông đã lệnh cho lực lượng không quân hỗ trợ cho các tay súng người Kurd để chiến đấu chống IS.</p><p><strong>Trung Anh</strong></p>', '', '', '1-7d48c.jpg', 1593797597, '0', 0),
(8, 'Your Personal Guide to 5 Best Places to Visit on Earth', '', '<p>Đây là bài viết</p>', '', '', 'Lighthouse1.jpg', 1593797559, '0', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `transaction_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `amount` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `data` text COLLATE utf8_bin NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`transaction_id`, `id`, `product_id`, `qty`, `amount`, `data`, `status`) VALUES
(7, 6, 2, 1, '4000000.0000', '', 1),
(8, 7, 2, 1, '4000000.0000', '', 0),
(9, 8, 8, 1, '10000000.0000', '', 0),
(10, 9, 8, 1, '10000000.0000', '', 0),
(11, 10, 8, 1, '10000000.0000', '', 2),
(12, 11, 8, 1, '10000000.0000', '', 0),
(13, 12, 8, 2, '20000000.0000', '', 0),
(14, 13, 8, 1, '10000000.0000', '', 1),
(15, 14, 3, 1, '5000000.0000', '', 0),
(16, 15, 3, 1, '5000000.0000', '', 0),
(17, 16, 3, 1, '5000000.0000', '', 0),
(18, 17, 3, 1, '5000000.0000', '', 0),
(19, 18, 3, 1, '5000000.0000', '', 0),
(20, 19, 3, 1, '5000000.0000', '', 0),
(21, 20, 8, 1, '10000000.0000', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `maker_id` int(255) NOT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `content_decrip` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `image_link` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image_list` text COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL DEFAULT 0,
  `view` int(11) NOT NULL DEFAULT 0,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `site_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `warranty` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(255) NOT NULL,
  `buyed` int(255) NOT NULL,
  `rate_total` int(255) NOT NULL,
  `rate_count` int(255) NOT NULL,
  `gifts` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `feature` enum('0','1') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `hot_product` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `catalog_id`, `name`, `maker_id`, `price`, `content_decrip`, `content`, `discount`, `image_link`, `image_list`, `created`, `view`, `meta_key`, `site_title`, `warranty`, `total`, `buyed`, `rate_total`, `rate_count`, `gifts`, `video`, `meta_desc`, `feature`, `hot_product`) VALUES
(2, 15, 'Vietnam Experience', 0, '690.0000', 'Vietnam Experience is a buzzing resort with a big reputation for beach holidays. Situated in sunny Costa Blanca, the town is one of the original Spanish beach resorts', '<p>Bài viết cho sản phẩm này đang được cập nhật ...</p>', 320, 'product2.jpg', '[\"photo-1486056997767-09578eee7de1.jpg\",\"photo-1503764654157-72d979d9af2f.jpg\",\"photo-1506917980821-213681597089.jpg\",\"photo-1522780300892-b25a6ec89734.jpg\"]', 1594327323, 8, '', '', '12 tháng', 0, 0, 4, 1, 'USB 4G', 'https://www.youtube.com/watch?v=zAEYQ6FDO5U', '', '0', 1),
(3, 13, 'Spain,Benidorm', 0, '5000000.0000', '', 'Bài viết cho sản phẩm này đang được cập nhật ...', 0, 'product1.jpg', '', 0, 8, '', '', '12 tháng', 0, 0, 4, 1, 'USB 4G', 'https://www.youtube.com/watch?v=zAEYQ6FDO5U', '', '0', 0),
(4, 16, 'Mauritius Island, Africa', 0, '960.0000', 'Mauritius Island, Africa is a buzzing resort with a big reputation for beach holidays. Situated in sunny Costa Blanca, the town is one of the original Spanish beach resorts', '<p>Bài viết cho sản phẩm này đang được cập nhật ...</p>', 0, 'product3.jpg', '', 1593815036, 7, '', '', '12 tháng', 0, 0, 12, 3, 'USB 4G', 'https://www.youtube.com/watch?v=zAEYQ6FDO5U', '', '0', 1),
(5, 17, 'Jewel of the Nile', 0, '5500000.0000', '', 'Bài viết cho sản phẩm này đang được cập nhật ...', 0, 'product4.jpg', '', 0, 1, '', '', '12 tháng', 0, 0, 0, 0, 'USB 4G', 'https://www.youtube.com/watch?v=zAEYQ6FDO5U', '', '0', 0),
(6, 15, 'Classic Colombia', 0, '540.0000', '', '<p>Bài viết cho sản phẩm này đang được cập nhật ...</p>', 200, 'island-3417784.jpg', '', 1594326784, 1, '', '', '12 tháng', 0, 0, 0, 0, 'USB 4G', 'https://www.youtube.com/watch?v=zAEYQ6FDO5U', '', '0', 0),
(7, 18, 'Insolite', 0, '620.0000', '', '<p>Bài viết cho sản phẩm này đang được cập nhật ...</p>', 80, 'product6.jpg', '', 1594326848, 74, '', '', '12 tháng', 0, 0, 7, 2, 'USB 4G', 'https://www.youtube.com/watch?v=zAEYQ6FDO5U', '', '0', 0),
(8, 14, 'Great Wall', 0, '950.0000', '', '<p>Bài viết cho sản phẩm này đang được cập nhật ...</p>', 100, 'great-wall-of-china-19872.jpg', '', 1594326757, 114, '', '', '12 tháng', 0, 0, 17, 5, 'USB 4G', 'https://www.youtube.com/watch?v=zAEYQ6FDO5U', '', '0', 0),
(9, 15, 'The Steppe Africa', 0, '5400000.0000', '', '<p>\r\n	B&agrave;i viết cho sản phẩm n&agrave;y đang được cập nhật ...</p>\r\n', 0, 'product13.jpg', 'a:0:{}', 0, 19, '', '', '12 tháng', 0, 0, 4, 1, '0', 'https://www.youtube.com/watch?v=zAEYQ6FDO5U', '', '0', 0),
(38, 18, 'Moscow', 0, '1000000.0000', '', '', 0, 'Lighthouse.jpg', '[]', 1593533401, 0, '', '', '', 0, 0, 0, 0, '', '', '', '0', 0),
(39, 12, 'Hong Kong', 0, '250.0000', 'abc', '', 50, 'bantersnaps-vpNtiucFhck-unsplash.jpg', '[]', 1594326730, 1, '', '', '', 0, 0, 0, 0, '', '', '', '0', 0),
(40, 0, 'Japan', 0, '2000.0000', '', '', 0, 'photo-1493780474015-ba834fd0ce2f.jpg', '[]', 1594325935, 0, '', '', '', 0, 0, 0, 0, '', '', '', '0', 0),
(47, 31, 'Dreamy mountainous plain', 0, '1200.0000', 'Đây là mô tả của sản phẩm', '', 0, 'agriculture-asia-cat-china-235648.jpg', '[]', 1593957273, 0, '', '', '', 0, 0, 0, 0, '', '', '', '0', 0),
(48, 31, 'Athens, Ios & Santorini Tour ', 0, '2500.0000', 'Không có gì để mô tả ở đây', '', 0, 'concrete-road-between-trees-1563356.jpg', '[]', 0, 0, '', '', '', 0, 0, 0, 0, '', '', '', '0', 0),
(51, 31, 'Desert Delta Express', 0, '960.0000', 'Đây là mô tả', '', 100, 'Desert.jpg', '[\"Chrysanthemum1.jpg\",\"Desert2.jpg\",\"Hydrangeas1.jpg\",\"Jellyfish1.jpg\"]', 1593989441, 1, '', '', '', 0, 0, 0, 0, '', '', '', '0', 0),
(50, 31, 'Around Iceland Adventure', 0, '1200.0000', 'Đây là mô tả', '', 0, 'asia-japan-japanese-.jpg', '[]', 0, 0, '', '', '', 0, 0, 0, 0, '', '', '', '0', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `name`, `image_name`, `image_link`, `link`, `info`, `sort_order`) VALUES
(10, 'Mountain Adventure', '', 'mountain.jpg', '', 'Build your next holiday trip with us', 1),
(11, 'Sunny Beach', '', 'view-of-ocean-during.jpg', '', 'Create your tour', 0),
(12, 'Great Wall', '', 'geat_wall.jpg', '', 'A team of a professional travel epperts', 3),
(13, 'THE STEPPE AFRICA', '', 'silde4.jpg', '', 'Enjoy The Best Destinations with our travel agency', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `support`
--

CREATE TABLE `support` (
  `id` int(255) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `yahoo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `support`
--

INSERT INTO `support` (`id`, `name`, `yahoo`, `gmail`, `skype`, `phone`, `sort_order`) VALUES
(1, 'Hoang van tuyen', 'tuyenht90', 'hoangvantuyencnt@gmail.com', 'tuyencnt90', '01686039488', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `amount` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `payment` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_info` text COLLATE utf8_bin NOT NULL,
  `message` varchar(255) COLLATE utf8_bin NOT NULL,
  `security` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `type`, `status`, `user_id`, `user_name`, `user_email`, `user_phone`, `amount`, `payment`, `payment_info`, `message`, `security`, `created`) VALUES
(7, 0, 1, 15, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '4000000.0000', 'nganluong', '', '', '', 1405548000),
(8, 0, 0, 15, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '4000000.0000', 'nganluong', '', '', '', 1407917785),
(9, 0, 0, 0, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '10000000.0000', 'nganluong', '', '111', '', 1407918071),
(10, 0, 0, 0, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '10000000.0000', 'nganluong', '', '111111', '', 1407918235),
(11, 0, 2, 0, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '111111', '10000000.0000', 'nganluong', '', '111', '', 1407918299),
(12, 0, 1, 0, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '7667676', '10000000.0000', 'nganluong', '', '', '', 1407923211),
(13, 0, 1, 0, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '11', '20000000.0000', 'nganluong', '', '11', '', 1407926712),
(14, 0, 1, 0, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '10000000.0000', 'nganluong', '', '', '', 1407981011),
(15, 0, 0, 19, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '5000000.0000', 'baokim', '', '', '', 1408099561),
(16, 0, 0, 19, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '5000000.0000', 'baokim', '', '', '', 1408099692),
(17, 0, 0, 19, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '5000000.0000', 'baokim', '', '', '', 1408099749),
(18, 0, 0, 19, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '5000000.0000', 'baokim', '', '', '', 1408099776),
(19, 0, 0, 19, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '5000000.0000', 'baokim', '', '', '', 1408099813),
(20, 0, 0, 19, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '5000000.0000', 'baokim', '', '', '', 1408099856),
(21, 0, 0, 0, 'Hoàng văn Tuyền', 'hoangvantuyencnt@gmail.com', '01686039488', '10000000.0000', 'dathang', '', '', '', 1408159002);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `password`, `created`) VALUES
(48, 'YDikmlo99', 'ydikmolo@gmai.com', '', '', 'e10adc3949ba59abbe56e057f20f883e', 1594469159),
(47, 'songvedem', 'hoangducbmt1997@gmail.com', '', '', '26e543670a6c145569de01c5655a2e87', 1594138925);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video`
--

CREATE TABLE `video` (
  `id` int(255) NOT NULL,
  `count_view` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `feature` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `view` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `video`
--

INSERT INTO `video` (`id`, `count_view`, `name`, `images`, `intro`, `link`, `feature`, `created`, `view`) VALUES
(10, 0, 'Chuyện Tình Trên Facebook - Hồ Việt Trung [Official]', '1386147113843_video.jpg', '', 'http://www.youtube.com/watch?v=3ZlLyU2L4P0', 1386146497, 2013, 4),
(8, 0, 'Chỉ còn trong mơ & Phải không em', '1386147092891_video.jpg', '', 'http://www.youtube.com/watch?v=RfNJ43HBzOM', 1386146505, 2013, 6),
(7, 0, '[HD] Anh Xin Lỗi - Minh Vương M4U', '1386147058495_video.jpg', '', 'http://www.youtube.com/watch?v=OCZ4D9qT8lI', 1386146502, 2013, 17),
(16, 0, 'Nhốt Em Vào Tim - Hồ Việt Trung [Official]', '1386147135763_video.jpg', '', 'http://www.youtube.com/watch?v=fkDSnN_I_Ig', 0, 1386147135, 0),
(17, 0, 'Chỉ Yêu Mình Em - Châu Khải Phong [Official]', '1386147154302_video.jpg', '', 'http://www.youtube.com/watch?v=l2MydtlKra8', 0, 1386147154, 4),
(18, 0, 'Số Nghèo - Châu Khải Phong [Official]', '138614718279_video.jpg', '', 'http://www.youtube.com/watch?v=LJRvv8U6Dos', 1386147576, 1386147182, 1),
(19, 0, 'Trò Chơi Đắng Cay - Châu Khải Phong [Official]', '138614721063_video.jpg', '', 'http://www.youtube.com/watch?v=3J8d8-YgOlU', 1386147575, 1386147210, 0),
(20, 0, 'Sầu Tím Thiệp Hồng - Quang Lê & Lệ Quyên ( Liveshow Quang Lê )', '1386147271236_video.jpg', '', 'http://www.youtube.com/watch?v=Kd5OrV4Y_bs', 0, 1386147271, 0),
(21, 0, 'Gõ cửa trái tim Quang Lê - Mai Thiên Vân', '1386147292776_video.jpg', '', 'http://www.youtube.com/watch?v=9oVxDQsgXIQ', 1386147577, 1386147292, 0),
(22, 0, 'Cô Hàng Xóm - Quang Lê', '1386147310490_video.jpg', '', 'http://www.youtube.com/watch?v=nA9ub4zlel8', 0, 1386147310, 0),
(23, 0, 'Lam Truong - Mai Mai', '1386147353743_video.jpg', '', 'http://www.youtube.com/watch?v=o1igATj9lMw', 0, 1386147353, 0),
(24, 0, 'Lỡ Yêu Em Rồi - Bằng Kiều', '1386147364632_video.jpg', '', 'http://www.youtube.com/watch?v=HYi-5dM_c34', 0, 1386147364, 0),
(25, 0, 'Bản Tình Cuối - Bằng Kiều', '1386147389790_video.jpg', '', 'http://www.youtube.com/watch?v=pNr7jEQ8LT8', 0, 1386147389, 2),
(26, 1, 'Phút cuối - Bằng Kiều', '1386150063515_video.jpg', '', 'http://www.youtube.com/watch?v=sA_gM6_eqXU', 0, 1386150063, 0),
(27, 0, 'Giấc Mơ (Live) - Bùi Anh Tuấn ft Yanbi', '1386150103768_video.jpg', '', 'http://www.youtube.com/watch?v=XLr463dUNgQ', 0, 1386150103, 0),
(28, 4, 'Anh Nhớ Em - Tuấn Hưng', '1386150121482_video.jpg', '', 'http://www.youtube.com/watch?v=ewNQtt1RiSk', 0, 1386150121, 0),
(29, 0, 'LE QUYEN & TUAN HUNG - Nhu Giac Chiem Bao', '1386150141608_video.jpg', '', 'http://www.youtube.com/watch?v=DaMARvh0kms', 0, 1386150141, 0),
(30, 10, 'Dĩ Vãng Cuộc Tình - Duy Mạnh ft Tuấn Hưng', '140905101897_video.jpg', '', 'http://www.youtube.com/watch?v=g8I-LoBIFgQ', 0, 1409051018, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `admin_group`
--
ALTER TABLE `admin_group`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `content_static`
--
ALTER TABLE `content_static`
  ADD PRIMARY KEY (`id`,`key`);

--
-- Chỉ mục cho bảng `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `info` ADD FULLTEXT KEY `title` (`title`);

--
-- Chỉ mục cho bảng `maker`
--
ALTER TABLE `maker`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `news` ADD FULLTEXT KEY `title` (`title`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `product` ADD FULLTEXT KEY `name` (`name`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `admin_group`
--
ALTER TABLE `admin_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `content_static`
--
ALTER TABLE `content_static`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `maker`
--
ALTER TABLE `maker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `support`
--
ALTER TABLE `support`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `video`
--
ALTER TABLE `video`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
