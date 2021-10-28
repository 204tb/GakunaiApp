-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-10-02 06:05:02
-- サーバのバージョン： 10.4.20-MariaDB
-- PHP のバージョン: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `attendance`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `attendance_log`
--

CREATE TABLE `attendance_log` (
  `id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  `day_of_week` varchar(12) NOT NULL,
  `timetable_times_id` int(2) DEFAULT NULL,
  `timetable_subjects_id` varchar(40) DEFAULT NULL,
  `attendance_status` varchar(12) NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `classes`
--

CREATE TABLE `classes` (
  `class_id` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `classes`
--

INSERT INTO `classes` (`class_id`) VALUES
('ig11'),
('ig12'),
('ig21'),
('ig22'),
('ri11'),
('ri12'),
('ri21'),
('ri22');

-- --------------------------------------------------------

--
-- テーブルの構造 `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(60) NOT NULL,
  `furigana` varchar(60) NOT NULL,
  `gender` varchar(16) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(255) NOT NULL,
  `classes_id` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `furigana`, `gender`, `email`, `password`, `classes_id`) VALUES
(200001, '曽田航介', 'ソタコウスケ', '男', '200099oy@yse-c.net', '$2y$10$q7TOQ6tePjrKtlkSA5CidOyYChVnaiAsnReFYZbdBKFaTkVe5sVAO', 'ig21'),
(200002, '中田久美子', 'ナカタクミコ', '女', 'a@a.aa', '$2y$10$h5KneXq8Xh4rI9jnxICWIO1loW9ka3LbdHnQHq6Cd/k.Mh/UCNVRu', 'ig22'),
(200003, '田中太郎', 'タナカタロウ', '未設定', 'b@b.bb', '$2y$10$3aBeG8.xFCnBIggRX89JxuhTtYeutSkVnT9jnROXIPkmQZ8Q3ucEm', 'ri21'),
(200004, '中田敦彦', 'ナカタアツヒコ', '男', 'c@c.cc', '$2y$10$eGUv5zpCPfSPKsBib3L1ZeXyOeyB21Dn3WG3HS8pkT8SYSldUw2mO', 'ri22'),
(200005, '鈴木隆', 'スズキタカシ', '男', 'd@d.dd', '$2y$10$JMsZaLdrhZWBy2319TFGCu2zj0YxZDox7NgNbm8rUz4JJY1TS7zzq', 'ig11'),
(200006, '佐藤一郎', 'サトウイチロウ', '未設定', 'e@e.ee', '$2y$10$FioIwLg/ZnWNmesosh6V8u9Rnd7YKX8bEj91uZQAp2ZxZXcwREYQG', 'ig12'),
(200007, '伊藤健太', 'イトウケンタ', '未設定', 'f@f.ff', '$2y$10$VYJjDGcD1jWPDMyDq9SVd.vBFDXrD6YIB7WxY5hJUQ5vZag6c0LeO', 'ri11'),
(200008, '奥田美和子', 'オクダミワコ', '女', 'g@g.gg', '$2y$10$IvVkxBP0lvKIYmE87rRiR.TtQlX0o.lo9h.2wJgoG1amVYeYnOBu2', 'ri12'),
(200009, '新井純也', 'アライジュンヤ', '未設定', 'h@h.hh', '$2y$10$K5bhvLS/.75eq/qxdqh14eg6FapYUqrqk6IX.Goj2ai2LAdFO8ghC', 'ig21'),
(200010, '武田勝', 'タケダマサル', '男', 'i@i.ii', '$2y$10$/t4rfLc06LXwv4fGVp3A2.z4bZjGJIf4.YJ8skLUdO8hfrkSgAbbq', 'ri11');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `attendance_log`
--
ALTER TABLE `attendance_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_id` (`students_id`) USING BTREE,
  ADD KEY `timetable_subjects_id` (`timetable_subjects_id`);

--
-- テーブルのインデックス `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- テーブルのインデックス `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `student_name` (`student_name`),
  ADD KEY `furigana` (`furigana`),
  ADD KEY `classes_id` (`classes_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `attendance_log`
--
ALTER TABLE `attendance_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200011;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `attendance_log`
--
ALTER TABLE `attendance_log`
  ADD CONSTRAINT `attendance_log_ibfk_1` FOREIGN KEY (`students_id`) REFERENCES `students` (`student_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_log_ibfk_2` FOREIGN KEY (`timetable_subjects_id`) REFERENCES `timetable`.`subjects` (`subject_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_log_ibfk_3` FOREIGN KEY (`timetable_subjects_id`) REFERENCES `timetable`.`subjects` (`subject_id`) ON UPDATE CASCADE;

--
-- テーブルの制約 `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`classes_id`) REFERENCES `classes` (`class_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
