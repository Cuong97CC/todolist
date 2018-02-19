-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th2 19, 2018 lúc 12:41 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `id4645569_todolist`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `boards`
--

CREATE TABLE `boards` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `boards`
--

INSERT INTO `boards` (`id`, `name`) VALUES
(5, 'ophvvcx'),
(7, 'fxse'),
(9, 'ygv'),
(10, 'btl'),
(11, 'tgxse'),
(12, 'tgggvv'),
(13, 'dghvc'),
(14, 'sdcc'),
(15, 'dghvc'),
(16, 'vvv'),
(17, 'gvjskms'),
(18, 'tgv'),
(20, 'ygxs');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `boards_users`
--

CREATE TABLE `boards_users` (
  `id` int(11) NOT NULL,
  `idBoard` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `is_owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `boards_users`
--

INSERT INTO `boards_users` (`id`, `idBoard`, `idUser`, `is_owner`) VALUES
(6, 5, 3, 1),
(8, 7, 3, 1),
(10, 9, 3, 0),
(11, 10, 3, 1),
(12, 11, 3, 0),
(13, 11, 4, 0),
(15, 12, 4, 0),
(16, 13, 3, 1),
(17, 14, 3, 1),
(18, 15, 3, 1),
(19, 16, 3, 1),
(20, 17, 3, 1),
(21, 18, 3, 1),
(27, 20, 4, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `card`
--

CREATE TABLE `card` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `idList` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `card`
--

INSERT INTO `card` (`id`, `name`, `description`, `date`, `time`, `location`, `lat`, `lng`, `idList`) VALUES
(7, 'tfssz', 'hb ', '12/02/2018', '17:37', '20°36\'28.4\"N 105°58\'46.3\"E ~ Đường tỉnh 9710, Yên Nam, Duy Tiên, Hà Nam, Vietnam', '20.607882499999995', '105.97953515624997', 8),
(8, 'ygvcgvv', 'gbbhkn', '12/02/2018', '23:45', '20°36\'45.0\"N 105°58\'54.8\"E ~ 60, Yên Nam, Duy Tiên, Hà Nam, Vietnam', '20.612487500000007', '105.9818867187499', 8),
(9, 'yhb', 'ygv', '', '', '', '', '', 9),
(10, 'add user', '', '', '', '', '', '', 11),
(11, 'drag n drop', 'optional', '', '', '', '', '', 11),
(12, 'choose ringtone', 'optional', '14/02/2018', '19:38', '', '', '', 11),
(14, 'hhvf', '', '', '', '', '', '', 8),
(16, 'history', '', '18/02/2018', '17:32', '', '', '', 11),
(17, 'ggv', 'ggv', '18/02/2018', '09:30', '20°35\'33.0\"N 105°58\'23.1\"E ~ Unnamed Road, Đọi Sơn, Duy Tiên, Hà Nam, Vietnam', '20.592497500000015', '105.97308984374993', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cardslist`
--

CREATE TABLE `cardslist` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `idBoard` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cardslist`
--

INSERT INTO `cardslist` (`id`, `name`, `idBoard`) VALUES
(8, 'ghfse', 5),
(9, 'yhcd', 5),
(11, 'todo', 10),
(12, 'tfv', 7),
(13, 'ygv', 5),
(14, 'gv s', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cards_users`
--

CREATE TABLE `cards_users` (
  `id` int(11) NOT NULL,
  `idCard` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`) VALUES
(3, 'nb bu', 'osi19972@gmail.com'),
(4, 'Cuong Le Ngoc', 'osident1997@gmail.com'),
(5, 'nameless_ _', 'nameless2972@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `boards_users`
--
ALTER TABLE `boards_users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cardslist`
--
ALTER TABLE `cardslist`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cards_users`
--
ALTER TABLE `cards_users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `boards`
--
ALTER TABLE `boards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `boards_users`
--
ALTER TABLE `boards_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `card`
--
ALTER TABLE `card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `cardslist`
--
ALTER TABLE `cardslist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `cards_users`
--
ALTER TABLE `cards_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
