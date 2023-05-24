-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Час створення: Трв 24 2023 р., 17:31
-- Версія сервера: 5.7.39
-- Версія PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `sketch_your_point_db`
--

-- --------------------------------------------------------

--
-- Структура таблиці `Admin`
--

CREATE TABLE `Admin` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `description` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `Admin`
--

INSERT INTO `Admin` (`ID`, `email`, `name`, `password`, `description`) VALUES
(1, 'valeriia.postoronka@gmail.com', 'Валерія Посторонка', '34444356', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `Comments`
--

CREATE TABLE `Comments` (
  `taskID` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `comment` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `Marks`
--

CREATE TABLE `Marks` (
  `taskID` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `targetUser` varchar(255) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `TaskMarks`
--

CREATE TABLE `TaskMarks` (
  `user` varchar(255) NOT NULL,
  `taskID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `TaskMarksMin`
--

CREATE TABLE `TaskMarksMin` (
  `taskID` int(11) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `Tasks`
--

CREATE TABLE `Tasks` (
  `ID` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `mark` int(11) NOT NULL,
  `difficulty` varchar(16) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `Tasks`
--

INSERT INTO `Tasks` (`ID`, `user`, `title`, `mark`, `difficulty`, `description`) VALUES
(13, 'Валерія Посторонка', 'Намалюйте свого аватара. ', 5, 'Початковий', 'Це не обов\'язково повинна бути людина. Відобразіть будь-що, що на вашу думку характерезує вас, як творчу особистість. '),
(15, 'Валерія Посторонка', 'Відобразіть опале осіннє листя. Розмалюйте його, використавши як можна більше відтінків кольорів. ', 4, 'Початковий', 'Кожен листок має прожилки, що розділяють його. Саме кожна з цих частин повинна мати своє унікальне забарвлення. Чим більше відтінків буде задіяно в картині, тим краще. '),
(16, 'Валерія Посторонка', 'Намалюйте арену цирку та заштрихуйте її елементи різними візерунками. ', 6, 'Середній', 'Додайте на арені людей, що виступають або їхніх тварин. Так картина буде більш доповненою. ');

-- --------------------------------------------------------

--
-- Структура таблиці `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `descriprion` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `Users`
--

INSERT INTO `Users` (`ID`, `email`, `name`, `password`, `descriprion`) VALUES
(5, 'valeriia.postoronka@gmail.com', 'Валерія Посторонка', '$2y$10$H/QWXL9bO2rsSsNPXCv2jOSsak6pEeNAWfRRl/l6i7/K5g6PvyeKW', 'Я зареєструвалась на даному ресурсі, щоб мати змогу знайти однодумців та покращити свої навички, тож буду рада познайомитися та працювати разом.');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `Marks`
--
ALTER TABLE `Marks`
  ADD PRIMARY KEY (`taskID`,`user`,`targetUser`);

--
-- Індекси таблиці `TaskMarks`
--
ALTER TABLE `TaskMarks`
  ADD PRIMARY KEY (`user`,`taskID`);

--
-- Індекси таблиці `Tasks`
--
ALTER TABLE `Tasks`
  ADD PRIMARY KEY (`ID`,`title`);

--
-- Індекси таблиці `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`,`email`,`name`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `Admin`
--
ALTER TABLE `Admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `Tasks`
--
ALTER TABLE `Tasks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблиці `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
