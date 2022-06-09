-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: honestising-mysql-app:3306
-- Generation Time: Jun 04, 2022 at 09:01 AM
-- Server version: 5.7.38
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starter_kit_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `code` varchar(256) NOT NULL,
  `title` varchar(256) NOT NULL,
  `base` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `code`, `title`, `base`) VALUES
(1, 'uk', 'Ukrainian', '1'),
(2, 'en', 'English', '0');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `slug` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `slug`) VALUES
(1, 'create-simple-html-page'),
(2, 'download-code-editor'),
(3, 'start-project-honestising'),
(4, 'main-tags-html'),
(5, 'destroy-myths-about-programming'),
(6, 'create-year-select');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_description`
--

CREATE TABLE `lesson_description` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `meta_description` varchar(256) NOT NULL,
  `meta_keywords` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lesson_description`
--

INSERT INTO `lesson_description` (`id`, `language_id`, `lesson_id`, `title`, `meta_description`, `meta_keywords`) VALUES
(1, 1, 1, 'Створюємо просту web-сторінку', 'Створюємо просту web-сторінку', 'Проста web-сторінка'),
(2, 2, 1, 'Create simple web-page', 'Create simple web-page', 'Simple web-page'),
(3, 1, 2, 'Завантажуємо редактор коду', 'Завантажуємо редактор коду', 'Редактор коду'),
(4, 2, 2, 'Download code editor', 'Download code editor', 'Code editor'),
(5, 1, 3, 'Запускаємо проект HI-EDDY', 'Запускаємо проект HI-EDDY', 'honestising, Запускаємо проект'),
(6, 2, 3, 'Start project HI-EDDY', 'Start project HI-EDDY', 'Start project, HI-EDDY'),
(7, 1, 4, 'Додаємо теги, які найчастіше використовуються', 'Додаємо теги, які найчастіше використовуються', 'теги html'),
(8, 2, 4, 'Most useful tags in html', 'Most useful tags in html', 'useful tags, html, honestising, hieddy'),
(9, 1, 5, '18 тверджень, які впень руйнують міфи про програмування', '18 тверджень, які впень руйнують міфи про програмування', 'Міфи про програмування'),
(10, 2, 5, '18 statements that completely destroy the myths about programming', '18 statements that completely destroy the myths about programming', 'Myths about programming'),
(11, 1, 6, 'Створюємо select для вибору року', 'Створюємо select для вибору року', 'select, js, html'),
(12, 2, 6, 'Create year select', 'Create year select', 'select, html, js');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_done`
--

CREATE TABLE `lesson_done` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_pin`
--

CREATE TABLE `lesson_pin` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `task_question_id` int(11) NOT NULL,
  `task_answers_ids` varchar(256) NOT NULL,
  `task_answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `task_question_id`, `task_answers_ids`, `task_answer_id`) VALUES
(1, 1, '1,2,3,4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `task_answer`
--

CREATE TABLE `task_answer` (
  `id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_answer`
--

INSERT INTO `task_answer` (`id`, `image`) VALUES
(1, 'answer-1.png'),
(2, 'answer-2.png'),
(3, 'answer-3.png'),
(4, 'answer-4.png');

-- --------------------------------------------------------

--
-- Table structure for table `task_answer_description`
--

CREATE TABLE `task_answer_description` (
  `id` int(11) NOT NULL,
  `task_answer_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_answer_description`
--

INSERT INTO `task_answer_description` (`id`, `task_answer_id`, `lang_id`, `text`) VALUES
(1, 1, 1, 'Варіант 1'),
(2, 1, 2, 'Variant 1'),
(3, 2, 1, 'Варіант 2'),
(4, 3, 1, 'Варіант 3'),
(5, 4, 1, 'Варіант 4'),
(6, 2, 2, 'Variant 2'),
(7, 3, 2, 'Variant 3'),
(8, 4, 2, 'Variant 4');

-- --------------------------------------------------------

--
-- Table structure for table `task_question`
--

CREATE TABLE `task_question` (
  `id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_question`
--

INSERT INTO `task_question` (`id`, `image`) VALUES
(1, 'question-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `task_question_description`
--

CREATE TABLE `task_question_description` (
  `id` int(11) NOT NULL,
  `task_question_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_question_description`
--

INSERT INTO `task_question_description` (`id`, `task_question_id`, `lang_id`, `text`) VALUES
(1, 1, 1, 'Що покаже браузер, якщо в ньому відкрити index.html з таким кодом?'),
(2, 1, 2, 'What we will see when open index.html with this code in browser?');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `firstName` varchar(256) DEFAULT NULL,
  `lastName` varchar(256) DEFAULT NULL,
  `phone` varchar(256) DEFAULT NULL,
  `avatar` varchar(256) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `facebook` varchar(256) DEFAULT NULL,
  `telegram` varchar(256) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_description`
--
ALTER TABLE `lesson_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_done`
--
ALTER TABLE `lesson_done`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_pin`
--
ALTER TABLE `lesson_pin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_answer`
--
ALTER TABLE `task_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_answer_description`
--
ALTER TABLE `task_answer_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_question`
--
ALTER TABLE `task_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_question_description`
--
ALTER TABLE `task_question_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lesson_description`
--
ALTER TABLE `lesson_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lesson_done`
--
ALTER TABLE `lesson_done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson_pin`
--
ALTER TABLE `lesson_pin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task_answer`
--
ALTER TABLE `task_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task_answer_description`
--
ALTER TABLE `task_answer_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `task_question`
--
ALTER TABLE `task_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `task_question_description`
--
ALTER TABLE `task_question_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
