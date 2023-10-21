-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 12:39 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_music`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `album_id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `genre` varchar(45) DEFAULT NULL,
  `date_released` date DEFAULT NULL,
  `artists_artist_id` int(11) NOT NULL,
  `imgs` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`album_id`, `title`, `genre`, `date_released`, `artists_artist_id`, `imgs`) VALUES
(1, 'Daily Mix', 'melow', '2022-11-10', 2, 'MobiComJava.png'),
(2, 'Russ', 'Chill', '2022-11-01', 1, 'class.jpg'),
(3, 'Pain', 'Lonely', '2022-11-29', 1, 'chill.jpg'),
(4, 'Pop', 'Energetic', '2022-12-07', 4, 'chan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `albums_listeners`
--

CREATE TABLE `albums_listeners` (
  `albums_album_id` int(11) NOT NULL,
  `listeners_listener_id` int(11) NOT NULL,
  `reviews` int(11) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `albums_listeners`
--

INSERT INTO `albums_listeners` (`albums_album_id`, `listeners_listener_id`, `reviews`, `comment`) VALUES
(1, 5, 5, 'good'),
(1, 6, NULL, NULL),
(1, 7, 4, ' good'),
(1, 8, 4, ' shesh'),
(2, 5, NULL, NULL),
(2, 6, NULL, NULL),
(2, 7, 5, ' Nice'),
(2, 8, 5, ' eyyy'),
(3, 6, NULL, NULL),
(4, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `artist_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `img_path` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_id`, `name`, `country`, `img_path`) VALUES
(1, 'Bangtan Sonyeondan', 'korea', 'IMG_20210510_090651_042.jpg'),
(2, 'adlawan', 'Philippines', 'IMG_20210528_074802_314.jpg'),
(3, 'Whitney Houston', 'America', '313355965_1437089540113086_30772062874458403_'),
(4, 'Elvis Presley', 'America', 'Memory Pen AD.jpg'),
(5, 'The Jackson 5', 'Califorña', 'WIN_20221004_09_17_55_Pro.jpg'),
(6, 'Aerosmith', 'Philippines', 'MobiComJava.png');

-- --------------------------------------------------------

--
-- Table structure for table `listeners`
--

CREATE TABLE `listeners` (
  `listener_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `img_path` varchar(45) DEFAULT NULL,
  `users_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `listeners`
--

INSERT INTO `listeners` (`listener_id`, `name`, `address`, `img_path`, `users_user_id`) VALUES
(1, 'Ampol', 'Makati City', '1.jpg', 1),
(2, 'Joseph', 'Makati City', '5.jpg', 1),
(3, 'Dave', 'taguig', 'tokneneng.jpg', 4),
(4, 'Dave', 'taguig', 'WIN_20221004_09_17_55_Pro.jpg', 5),
(5, 'Dave', 'taguig', '10.0 ?Slides for Demo Day.png', 6),
(6, 'Chan', 'Western  Bicutan, Taguig City', 'chan.jpg', 7),
(7, 'Dan Emil', 'Lower Bicutan, Taguig City', 'danemil.jpg', 8),
(8, 'Ramil', 'Lupi Sanfernando Camarines Sur', 'ramil.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `song_id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `albums_album_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `title`, `description`, `albums_album_id`) VALUES
(1, 'Rap good', 'Speed', 1),
(2, 'Courtesy call', 'Rock n Roll', 2),
(3, 'Freak on leash', 'Rock', 1),
(4, 'Love Me Tender', 'Love but Rock n Roll', 4),
(5, 'Breathe', 'Rap with sweet theme', 2),
(6, 'At Last', 'Mga huling sandali', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`) VALUES
(1, 'ampol@email.com', 'b4c66df78875d66298d76773a1c75fce08272c45'),
(2, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(3, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(4, 'subscriber1@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(5, 'adlawandavemerc98@gmail.com', 'dc8aab79f9c249e9cf81160040bbc9d36dcc3e58'),
(6, 'adlawandavemerc98@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d'),
(7, 'subscriber1@gmail.com', 'dd6448e2f8e68d251fe278801759dd7b48389e32'),
(8, 'subscriber2@gmail.com', '290231ce665e661629b2cc9490c9dbf16fd19957'),
(9, 'nice@gmail.com', '299f8b01fb2c1d66bed91ec7ced0f7ee90dbca47');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `before_user_delete` BEFORE DELETE ON `users` FOR EACH ROW INSERT INTO deleted_users (user_id, email, name, address, admin_user, action) 
VALUES (OLD.user_id, OLD.email, 
        (SELECT name FROM listeners l INNER JOIN users u ON(u.user_id = l.users_user_id) WHERE l.users_user_id = OLD.user_id), 
        (SELECT address FROM listeners l INNER JOIN users u ON(u.user_id = l.users_user_id) WHERE l.users_user_id = OLD.user_id), 
        (SELECT SUBSTRING_INDEX(current_user(),'@',1)), 'DELETE')
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `fk_albums_artists1_idx` (`artists_artist_id`);

--
-- Indexes for table `albums_listeners`
--
ALTER TABLE `albums_listeners`
  ADD PRIMARY KEY (`albums_album_id`,`listeners_listener_id`),
  ADD KEY `fk_albums_has_listeners_listeners1_idx` (`listeners_listener_id`),
  ADD KEY `fk_albums_has_listeners_albums1_idx` (`albums_album_id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `listeners`
--
ALTER TABLE `listeners`
  ADD PRIMARY KEY (`listener_id`),
  ADD KEY `fk_listeners_users_idx` (`users_user_id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`),
  ADD KEY `fk_songs_albums1_idx` (`albums_album_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `listeners`
--
ALTER TABLE `listeners`
  MODIFY `listener_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `fk_albums_artists1` FOREIGN KEY (`artists_artist_id`) REFERENCES `artists` (`artist_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `albums_listeners`
--
ALTER TABLE `albums_listeners`
  ADD CONSTRAINT `fk_albums_has_listeners_albums1` FOREIGN KEY (`albums_album_id`) REFERENCES `albums` (`album_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_albums_has_listeners_listeners1` FOREIGN KEY (`listeners_listener_id`) REFERENCES `listeners` (`listener_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `listeners`
--
ALTER TABLE `listeners`
  ADD CONSTRAINT `fk_listeners_users` FOREIGN KEY (`users_user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `fk_songs_albums1` FOREIGN KEY (`albums_album_id`) REFERENCES `albums` (`album_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
