-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-10-26 06:57:41
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
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `reply`
--

INSERT INTO `reply` (`id`, `title`, `post_user_name`, `name`, `reply`, `date`) VALUES
(1, '投稿テスト', 'abc', 'yse', 'テスト\r\n', '2021-10-26 13:56:16'),
(2, '投稿テスト', 'yse', 'yse', '返信テスト', '2021-10-26 13:56:32');

-- --------------------------------------------------------

--
-- テーブルの構造 `userlog`
--

CREATE TABLE `userlog` (
  `id` bigint(20) NOT NULL,
  `title` varchar(256) CHARACTER SET utf8 NOT NULL,
  `name` varchar(256) NOT NULL,
  `text` varchar(256) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `userlog`
--

INSERT INTO `userlog` (`id`, `title`, `name`, `text`, `date`) VALUES
(1, '投稿テスト', 'abc', 'テスト', '2021-10-26 13:55:43'),
(2, '投稿テスト', 'yse', 'テスト', '2021-10-26 13:56:10');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- テーブルの AUTO_INCREMENT `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
