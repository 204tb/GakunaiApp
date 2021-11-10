-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-11-10 03:11:14
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 8.0.11

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
  `students_classes_id` varchar(16) NOT NULL,
  `day_of_week` varchar(12) NOT NULL,
  `timetable_times_id` int(2) DEFAULT NULL,
  `timetable_subjects_id` varchar(40) DEFAULT NULL,
  `attendance_status` varchar(12) NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `attendance_log`
--

INSERT INTO `attendance_log` (`id`, `students_id`, `students_classes_id`, `day_of_week`, `timetable_times_id`, `timetable_subjects_id`, `attendance_status`, `update_time`) VALUES
(1, 200001, 'ig21', '月曜日', 3, 'ゲームプログラミングc', '出席', '2021-10-25 10:47:15'),
(2, 200001, 'ig21', '火曜日', 6, 'ゲームプログラミングc', '出席', '2021-10-26 14:15:02'),
(3, 200001, 'ig21', '木曜日', 1, 'ゲームプログラミングc', '出席', '2021-10-28 09:31:51'),
(4, 200002, 'ig21', '', 1, 'ゲームプログラミングc', '出席', '2021-11-02 05:18:28'),
(5, 200005, 'ig21', '', 1, 'ゲームプログラミングc', '出席', '2021-11-02 05:19:05'),
(6, 200004, 'ig21', '', 1, 'ゲームプログラミングc', '出席', '2021-11-02 05:19:05'),
(7, 200003, 'ig21', '', 1, 'ゲームプログラミングc', '出席', '2021-11-02 05:19:49'),
(8, 200004, 'ig21', '', 1, 'ゲームプログラミングc', '出席', '2021-11-02 05:19:49'),
(9, 200004, 'ig21', '', 1, 'ゲームプログラミングc', '出席', '2021-11-02 05:22:59'),
(10, 200003, 'ig21', '', 1, 'ゲームプログラミングc', '出席', '2021-11-02 05:22:59');

-- --------------------------------------------------------

--
-- テーブルの構造 `attendance_rate`
--

CREATE TABLE `attendance_rate` (
  `id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  `timetable_subjects_id` varchar(40) NOT NULL,
  `rate` varchar(4) NOT NULL,
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
(200001, '曽田航介', 'ソタコウスケ', '男', '200099oy@yse-c.net', '$2y$10$d9Mf0zTr5w86Mmg32CVN0OSbhVHGTngEoolQ6kjSzrvZarpzrVwIi', 'ig21'),
(200002, 'あいうえお', 'アイウエオ', '男', 'a@a.aa', '$2y$10$jjVEug0VoCXE99PxoNpI8OQkp6/HqyGiR9d2i6g.jYqXiRtMSISym', 'ig21'),
(200003, 'かきくけこ', 'カキクケコ', '未設定', 'c@c.cc', '$2y$10$Vk0r5OXIFAPjB8Pbgsp35u8vxe/QuTzsrSMgjN2jHlntd61E8T3.K', 'ig21'),
(200004, 'さしすせそ', 'サシスセソ', '未設定', 'b@b.bb', '$2y$10$rBm9QnpN8RijOj/GUB3tOeAK3SgZUiiJJ5LDKj.5UzqZWkgiq6jfe', 'ig21'),
(200005, 'たちつてと', 'タチツテト', '女', 'd@d.dd', '$2y$10$h9noRThEtzFtvEVxDWKYxeYkvRxRjGJCQ4Ls45CZujKnGTSmW7L5e', 'ig21');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `attendance_log`
--
ALTER TABLE `attendance_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_id` (`students_id`) USING BTREE,
  ADD KEY `timetable_subjects_id` (`timetable_subjects_id`),
  ADD KEY `attendance_log_ibfk_4` (`students_classes_id`);

--
-- テーブルのインデックス `attendance_rate`
--
ALTER TABLE `attendance_rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timetable_subjects_id` (`timetable_subjects_id`),
  ADD KEY `students_id` (`students_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルの AUTO_INCREMENT `attendance_rate`
--
ALTER TABLE `attendance_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200006;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `attendance_log`
--
ALTER TABLE `attendance_log`
  ADD CONSTRAINT `attendance_log_ibfk_1` FOREIGN KEY (`students_id`) REFERENCES `students` (`student_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_log_ibfk_2` FOREIGN KEY (`timetable_subjects_id`) REFERENCES `timetable`.`subjects` (`subject_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_log_ibfk_3` FOREIGN KEY (`timetable_subjects_id`) REFERENCES `timetable`.`subjects` (`subject_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_log_ibfk_4` FOREIGN KEY (`students_classes_id`) REFERENCES `classes` (`class_id`) ON UPDATE CASCADE;

--
-- テーブルの制約 `attendance_rate`
--
ALTER TABLE `attendance_rate`
  ADD CONSTRAINT `attendance_rate_ibfk_1` FOREIGN KEY (`timetable_subjects_id`) REFERENCES `timetable`.`subjects` (`subject_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_rate_ibfk_2` FOREIGN KEY (`students_id`) REFERENCES `students` (`student_id`) ON UPDATE CASCADE;

--
-- テーブルの制約 `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`classes_id`) REFERENCES `classes` (`class_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
