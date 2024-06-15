-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2024-06-14 20:44:26
-- 服务器版本： 10.4.27-MariaDB
-- PHP 版本： 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `sysadmin`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(255) DEFAULT NULL,
  `adminPwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `adminPwd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `instituteID` varchar(20) NOT NULL,
  `simID` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `institute` varchar(15) NOT NULL,
  `phone_number` char(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bitmap` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `instituteID`, `simID`, `name`, `gender`, `age`, `institute`, `phone_number`, `time`, `bitmap`) VALUES
(1, '500000012', '9898989896', 'Alice Brown', 'female', 22, 'uol', '9876543210', '2024-06-14 02:00:00', NULL),
(3, '500000014', '9898989898', 'Charlie Davis', 'male', 23, 'uol', '9876501235', '2024-06-14 02:10:00', NULL),
(4, '500000015', '9898989899', 'Daisy Clark', 'female', 21, 'uow', '9876501236', '2024-06-14 02:15:00', NULL),
(5, '500000016', '9898989900', 'Ethan Frank', 'male', 20, 'uol', '9876501237', '2024-06-14 02:20:00', NULL),
(6, '500000017', '9898989901', 'Fiona Grace', 'female', 22, 'uow', '9876501238', '2024-06-14 02:25:00', NULL),
(7, '500000018', '9898989902', 'George Hill', 'male', 23, 'uol', '9876501239', '2024-06-14 02:30:00', NULL),
(8, '500000019', '9898989903', 'Hannah Scott', 'female', 21, 'uow', '9876501240', '2024-06-14 02:35:00', NULL),
(9, '500000020', '9898989904', 'Ian Joy', 'male', 24, 'uol', '9876501241', '2024-06-14 02:40:00', NULL),
(10, '500000021', '9898989905', 'Jill Bean', 'female', 20, 'uow', '9876501242', '2024-06-14 02:45:00', NULL),
(11, '500000022', '9898989906', 'Kevin Root', 'male', 22, 'uol', '9876501243', '2024-06-14 02:50:00', NULL),
(12, '500000023', '9898989907', 'Laura Seed', 'female', 23, 'uow', '9876501244', '2024-06-14 02:55:00', NULL),
(13, '500000024', '9898989908', 'Mason Fog', 'male', 21, 'uol', '9876501245', '2024-06-14 03:00:00', NULL),
(14, '500000025', '9898989909', 'Nancy Stern', 'female', 24, 'uow', '9876501246', '2024-06-14 03:05:00', NULL),
(15, '500000026', '9898989910', 'Oscar Leaf', 'male', 20, 'uol', '9876501247', '2024-06-14 03:10:00', NULL),
(16, '500000027', '9898989911', 'Penny River', 'female', 22, 'uow', '9876501248', '2024-06-14 03:15:00', NULL),
(17, '500000028', '9898989912', 'Quinn Pool', 'male', 23, 'uol', '9876501249', '2024-06-14 03:20:00', NULL),
(18, '500000029', '9898989913', 'Ruby Lake', 'female', 21, 'uow', '9876501250', '2024-06-14 03:25:00', NULL),
(19, '500000030', '9898989914', 'Steve Marsh', 'male', 24, 'uol', '9876501251', '2024-06-14 03:30:00', NULL),
(20, '500000031', '9898989915', 'Tina Brook', 'female', 20, 'uow', '9876501252', '2024-06-14 03:35:00', NULL),
(26, 'J7W7QV7Y33', '22222222', 'Ni hao ah', 'male', 21, 'uow', '44444444', '2024-06-13 13:24:10', NULL),
(27, '32233578902', '22222222', 'test test test', 'male', 20, 'uow', '66666666', '2024-06-14 12:50:31', NULL),
(101, '9898989891', '5000000002', 'Liam Chen', 'male', 21, 'uol', '87654321', '2024-06-13 14:29:50', NULL),
(102, '9898989892', '5000000003', 'Olivia Zhang', 'female', 20, 'uow', '76543210', '2024-06-13 14:29:49', NULL),
(103, '9898989893', '5000000004', 'Noah Zhou', 'male', 23, 'uow', '65432109', '2024-06-13 14:29:47', NULL),
(104, '9898989894', '5000000005', 'Emma Wang', 'female', 22, 'uow', '54321098', '2024-06-13 14:29:46', NULL),
(105, '9898989895', '5000000006', 'Oliver Liu', 'male', 24, 'uow', '43210987', '2024-06-13 14:29:45', NULL),
(110, '9898989900', '5000000011', 'Mia Zheng', 'female', 21, 'uol', '98765432', '2024-06-13 14:29:36', NULL);

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
