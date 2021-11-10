-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-11-09 05:04:29
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `postlog`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `post_user_name` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `reply` varchar(256) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `reply`
--

INSERT INTO `reply` (`id`, `title`, `post_user_name`, `name`, `reply`, `date`, `delete_flag`) VALUES
(1, '投稿', 'abc', 'abc', '返信テスト', '2021-11-04 12:03:03', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `userlog`
--

CREATE TABLE `userlog` (
  `id` bigint(20) NOT NULL,
  `title` varchar(256) CHARACTER SET utf8 NOT NULL,
  `name` varchar(256) NOT NULL,
  `text` varchar(256) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `userlog`
--

INSERT INTO `userlog` (`id`, `title`, `name`, `text`, `date`, `delete_flag`) VALUES
(1, '投稿', 'abc', '投稿テスト', '2021-11-04 12:01:17', 0),
(2, '投稿2', 'abc', '投稿テスト', '2021-11-04 12:01:49', 0),
(3, '投稿3', 'abc', '投稿テスト', '2021-11-04 12:02:05', 0),
(4, '投稿4', 'abc', '投稿テスト', '2021-11-04 12:02:19', 0),
(5, '投稿5', 'abc', '投稿テスト', '2021-11-04 12:02:31', 0),
(6, '投稿6', 'abc', '投稿テスト', '2021-11-04 12:02:53', 0),
(7, '投稿7', 'abc', '投稿テスト', '2021-11-04 12:03:23', 0),
(8, '投稿8', 'abc', '投稿テスト\r\n', '2021-11-04 12:03:37', 0),
(9, '投稿9', 'abc', '投稿テスト', '2021-11-04 12:03:50', 0),
(10, '投稿10', 'abc', '投稿テスト\r\n', '2021-11-04 12:03:59', 0),
(11, '投稿11', 'abc', '投稿テスト', '2021-11-04 12:04:30', 0),
(12, '投稿12', 'abc', '投稿テスト', '2021-11-04 12:07:16', 0),
(13, '投稿14', 'abc', '投稿テスト', '2021-11-04 12:07:31', 0),
(14, '投稿15', 'abc', '投稿テスト', '2021-11-04 12:07:45', 0),
(15, '投稿16', 'abc', '投稿テスト', '2021-11-04 12:07:57', 0),
(16, '投稿17', 'abc', '投稿テスト', '2021-11-04 12:08:17', 0),
(17, '投稿18', 'abc', '投稿テスト', '2021-11-04 12:08:31', 0),
(18, '投稿19', 'abc', '投稿テスト\r\n', '2021-11-04 12:08:44', 0),
(19, '投稿20', 'abc', '投稿テスト', '2021-11-04 12:09:05', 0),
(20, '投稿21', 'abc', '投稿テスト', '2021-11-04 12:09:17', 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
