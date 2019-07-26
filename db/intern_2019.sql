-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2019 at 05:43 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intern_2019`
--

-- --------------------------------------------------------

--
-- Table structure for table `in_cars`
--

CREATE TABLE `in_cars` (
  `cars_id` int(11) NOT NULL COMMENT 'ID รถ',
  `cars_img` varchar(100) NOT NULL COMMENT 'ID รูปรถ',
  `cars_brand` int(11) NOT NULL COMMENT 'ยี่ห้อรถ',
  `cars_model` varchar(250) NOT NULL COMMENT 'โมเดลรถ',
  `cars_colour` varchar(100) NOT NULL COMMENT 'สีรถ',
  `cars_colour_code` varchar(7) NOT NULL COMMENT 'รหัสสี',
  `cars_years` varchar(4) NOT NULL COMMENT 'ปี',
  `cars_type` int(100) NOT NULL COMMENT 'ประเภทรถ',
  `cars_country` int(100) NOT NULL COMMENT 'ประเทศที่ผลิต',
  `cars_engine` smallint(6) NOT NULL COMMENT 'ขนาดเครื่องยนต์ ',
  `cars_price` decimal(10,0) NOT NULL COMMENT 'ราคารถ',
  `createdate` datetime NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `in_cars`
--

INSERT INTO `in_cars` (`cars_id`, `cars_img`, `cars_brand`, `cars_model`, `cars_colour`, `cars_colour_code`, `cars_years`, `cars_type`, `cars_country`, `cars_engine`, `cars_price`, `createdate`, `updatedate`) VALUES
(3, '106024378-1563382023200my20-corvette_z51_9287_topon.jpg', 2, 'Corvette', 'Red', '#FF0000', '2014', 5, 4, 1500, '38400000', '2019-07-05 00:00:00', '2019-07-25 05:23:48'),
(6, '051216-cars-AAC-4.jpg', 3, 'Tipo 815', 'Red Wine', '#722f37', '1990', 1, 5, 0, '3428000', '0000-00-00 00:00:00', '2019-07-25 05:22:33'),
(7, 'preview_big.jpg', 3, 'Ferrari 488', 'Dark Blue', '#0000A0', '2016', 5, 8, 4, '97000000', '0000-00-00 00:00:00', '2019-07-25 05:24:43'),
(8, '2020-chevy-corvette-convertible-pre-production.jpg', 2, 'c8', 'Silver', '#C0C0C0', '2019', 5, 4, 0, '5000000', '0000-00-00 00:00:00', '2019-07-25 05:27:11'),
(9, '0', 8, 'MG 3 X MY18', 'Yellow', '#FFFF00', '2017', 3, 3, 1200, '0', '0000-00-00 00:00:00', '2019-07-11 08:10:29'),
(10, '0', 1, 'BMW today', 'Blue', '', '2019', 4, 3, 0, '0', '0000-00-00 00:00:00', '2019-07-25 03:56:44'),
(11, 'BMW-i8.jpg', 1, 'i8', 'Black', '#000000', '2019', 5, 4, 2500, '4990000', '0000-00-00 00:00:00', '2019-07-25 05:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `in_cars_brand`
--

CREATE TABLE `in_cars_brand` (
  `cb_id` int(11) NOT NULL,
  `cb_name` varchar(500) NOT NULL,
  `createdate` datetime NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `in_cars_brand`
--

INSERT INTO `in_cars_brand` (`cb_id`, `cb_name`, `createdate`, `updatedate`) VALUES
(1, 'BMW', '2019-07-05 00:00:00', '2019-07-05 06:57:05'),
(2, 'Chevrolet', '2019-07-05 00:00:00', '2019-07-05 06:57:05'),
(3, 'Ferrari', '2019-07-05 00:00:00', '2019-07-05 06:58:26'),
(4, 'Ford', '2019-07-05 00:00:00', '2019-07-05 06:58:26'),
(5, 'Honda', '2019-07-05 00:00:00', '2019-07-05 06:58:26'),
(6, 'Hyundai', '2019-07-05 00:00:00', '2019-07-05 06:58:26'),
(7, 'Mazda', '2019-07-05 00:00:00', '2019-07-05 07:01:42'),
(8, 'MG', '2019-07-05 00:00:00', '2019-07-05 07:01:42'),
(9, 'NISSAN', '2019-07-05 00:00:00', '2019-07-05 07:01:42'),
(10, 'TOYOTA', '2019-07-05 00:00:00', '2019-07-05 07:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `in_cars_country`
--

CREATE TABLE `in_cars_country` (
  `cc_id` int(11) NOT NULL,
  `cc_name` varchar(500) NOT NULL,
  `createdate` datetime NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `in_cars_country`
--

INSERT INTO `in_cars_country` (`cc_id`, `cc_name`, `createdate`, `updatedate`) VALUES
(1, 'Japan ', '2019-07-02 00:00:00', '2019-07-02 09:55:03'),
(2, 'South Korea ', '2019-07-02 00:00:00', '2019-07-02 09:55:04'),
(3, 'England', '2019-07-03 00:00:00', '2019-07-03 06:33:51'),
(4, 'USA', '2019-07-03 00:00:00', '2019-07-03 06:33:51'),
(5, 'Germany', '0000-00-00 00:00:00', '2019-07-04 13:50:35'),
(7, 'Italy', '0000-00-00 00:00:00', '2019-07-04 13:56:49'),
(8, 'USE', '0000-00-00 00:00:00', '2019-07-04 14:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `in_cars_img`
--

CREATE TABLE `in_cars_img` (
  `icimg_id` int(11) NOT NULL,
  `icimg_name` varchar(255) NOT NULL,
  `icimg_img_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `in_cars_img`
--

INSERT INTO `in_cars_img` (`icimg_id`, `icimg_name`, `icimg_img_dir`) VALUES
(1, '52818', 'images/52818.jpg'),
(2, 'Aladdin 5_53668d9d', 'images/aladdin-5_53668d9d.jpeg'),
(3, 'Aladdin 7_951b18cd', 'images/aladdin-7_951b18cd.jpeg'),
(4, '2015 Ford Mustang', 'images/2015-Ford-Mustang.jpg'),
(8, 'BMW Today', 'images/BMW-Today.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `in_cars_type`
--

CREATE TABLE `in_cars_type` (
  `ct_id` int(11) NOT NULL,
  `ct_name` varchar(500) NOT NULL,
  `createdate` datetime NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `in_cars_type`
--

INSERT INTO `in_cars_type` (`ct_id`, `ct_name`, `createdate`, `updatedate`) VALUES
(1, 'รถยนต์นั่งขนาดเล็กมาก', '2019-07-02 00:00:00', '2019-07-02 09:59:21'),
(2, 'รถกระบะขนาดกลาง', '2019-07-02 00:00:00', '2019-07-02 09:59:21'),
(3, 'รถยนต์อเนกประสงค์สมรรถนะสูงขนาดเล็ก', '2019-07-03 11:34:00', '2019-07-03 04:45:25'),
(4, 'รถยนต์อเนกประสงค์สมรรถนะสูง (ขนาดกลาง)', '2019-07-03 11:34:00', '2019-07-04 15:15:33'),
(5, 'รถเก๋งอเนกประสงค์', '2019-07-03 11:34:00', '2019-07-03 04:46:01');

-- --------------------------------------------------------

--
-- Table structure for table `in_mydata`
--

CREATE TABLE `in_mydata` (
  `md_id` int(11) NOT NULL,
  `md_text` varchar(500) NOT NULL,
  `md_info` varchar(500) NOT NULL,
  `md_record` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `in_mydata`
--

INSERT INTO `in_mydata` (`md_id`, `md_text`, `md_info`, `md_record`) VALUES
(2, 'claudia', 'opas', '2019-06-28 06:21:19'),
(3, 'csmju', '', '2019-06-27 09:31:50'),
(5, 'hi', 'yo', '2019-06-28 06:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `lu_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `lu_password` text NOT NULL,
  `trn_date` datetime NOT NULL,
  `r_name` text NOT NULL COMMENT 'Real Name of User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`lu_id`, `name`, `email`, `lu_password`, `trn_date`, `r_name`) VALUES
(1, 'kodsunan', '', 'cc63ac5a05b3bbac24c2885e0aa0caf0', '0000-00-00 00:00:00', ''),
(4, 'jane', 'jane@gmail.com', '37ed35aa6dd8c3b49d9a768a700d6066', '2019-07-18 11:18:28', 'Jane Operl'),
(5, 'jacksonW', 'jw@gmail.com', 'eda018ca23acbae81332e16695dd1bf20b36b44f', '2019-07-19 11:49:48', 'Jackson Wang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `in_cars`
--
ALTER TABLE `in_cars`
  ADD PRIMARY KEY (`cars_id`),
  ADD KEY `cars_type` (`cars_type`),
  ADD KEY `cars_country` (`cars_country`),
  ADD KEY `cars_brand` (`cars_brand`);

--
-- Indexes for table `in_cars_brand`
--
ALTER TABLE `in_cars_brand`
  ADD PRIMARY KEY (`cb_id`);

--
-- Indexes for table `in_cars_country`
--
ALTER TABLE `in_cars_country`
  ADD PRIMARY KEY (`cc_id`);

--
-- Indexes for table `in_cars_img`
--
ALTER TABLE `in_cars_img`
  ADD PRIMARY KEY (`icimg_id`);

--
-- Indexes for table `in_cars_type`
--
ALTER TABLE `in_cars_type`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `in_mydata`
--
ALTER TABLE `in_mydata`
  ADD PRIMARY KEY (`md_id`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`lu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `in_cars`
--
ALTER TABLE `in_cars`
  MODIFY `cars_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID รถ', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `in_cars_brand`
--
ALTER TABLE `in_cars_brand`
  MODIFY `cb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `in_cars_country`
--
ALTER TABLE `in_cars_country`
  MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `in_cars_img`
--
ALTER TABLE `in_cars_img`
  MODIFY `icimg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `in_cars_type`
--
ALTER TABLE `in_cars_type`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `in_mydata`
--
ALTER TABLE `in_mydata`
  MODIFY `md_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `lu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `in_cars`
--
ALTER TABLE `in_cars`
  ADD CONSTRAINT `in_cars_ibfk_1` FOREIGN KEY (`cars_country`) REFERENCES `in_cars_country` (`cc_id`),
  ADD CONSTRAINT `in_cars_ibfk_2` FOREIGN KEY (`cars_type`) REFERENCES `in_cars_type` (`ct_id`),
  ADD CONSTRAINT `in_cars_ibfk_3` FOREIGN KEY (`cars_brand`) REFERENCES `in_cars_brand` (`cb_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
