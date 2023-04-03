-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 05:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentbuddy_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_phonenum` varchar(150) NOT NULL,
  `admin_intro` varchar(200) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_email`, `admin_phonenum`, `admin_intro`, `admin_pass`) VALUES
(1, 'sbwebsite', 'sbwebsite@gmail.com', '9152632547', 'Intro', '123456'),
(2, 'Shravani Milind Jeurkar', 'shravanimjeurkar@gmail.com', '9876543212', 'ABC', '123'),
(3, 'TEST', 'Test@test.com', '9874561232', 'TEST', '123456'),
(4, 'Test1', '1234@mail.com', '9632587412', 'TEST', '123'),
(8, 'Dsoza', '12345@mail.com', '8896563259', 'Living a retired life with the family, ex-soldier', '123'),
(9, 'Owner1', 'owner1.com', '9511599511', 'owner1', '1'),
(10, 'Owner2', 'Owner2.com', '9633699633', 'Owner2', '2'),
(11, 'Owner3', 'Owner3.com', '9877899879', 'Owner3', '3'),
(12, 'Owner4', 'Owner4.com', '9444444444', 'Owner4', '4'),
(13, 'Owner5', 'Owner5.com', '9555555555', 'Owner5', '5'),
(14, 'Owner6', 'Owner6.com', '9666666666', 'Owner6', '6'),
(15, 'Owner7', 'Owner7.com', '9777777777', 'Owner7', '7'),
(16, 'Owner8', 'Owner8.com', '9888888888', 'Owner8', '8'),
(17, 'Owner9', 'Owner9.com', '9999999999', 'Owner9', '9'),
(18, 'Owner10', 'Owner10.com', '9101010100', 'Owner10', '10'),
(19, 'Owner11', 'Owner11@gmail.com', '9911111199', 'Owner11', '11');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `sr_no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `room_no` int(11) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`sr_no`, `booking_id`, `room_name`, `price`, `room_no`, `user_name`, `phonenum`, `admin_id`) VALUES
(1, 1, 'Room 5', 12000, NULL, 'TEST', '123456789', 3),
(2, 2, 'Room 5', 12000, NULL, 'TEST', '123456789', 4),
(3, 3, 'Room 4', 22000, NULL, 'TEST', '123456789', 5),
(4, 4, 'Room 3', 1, NULL, 'TEST', '123456789', 6),
(5, 5, 'Room 4', 22000, 0, 'TEST', '123456789', 7),
(6, 6, 'Room 3', 1, NULL, 'TEST', '123456789', 0),
(7, 7, 'Room 5', 12000, NULL, 'TEST', '123456789', 0),
(16, 17, 'Shra 2', 350, NULL, 'TEST', '123456789', 10),
(17, 18, 'Room by Owner 11', 350, NULL, 'TEST', '123456789', 19),
(18, 19, 'Shra 2', 350, NULL, 'TEST', '123456789', 19),
(19, 20, 'Room by Owner 11', 350, NULL, 'TEST', '123456789', 19),
(20, 21, 'New Room', 300, NULL, 'TEST', '123456789', 19),
(21, 22, 'New Room', 300, NULL, 'Test1', '9404173684', 19),
(22, 23, 'New Room 2', 450, NULL, 'Test1', '9404173684', 19),
(23, 24, '1', 200, 0, 'Test1', '9404173684', 19),
(24, 25, 'Room by Owner 10', 200, NULL, 'Test1', '9404173684', 18),
(25, 26, 'Room by Owner 10', 200, NULL, 'Test1', '9404173684', 18),
(26, 27, 'Room by Owner 10', 200, NULL, 'Test1', '9404173684', 18);

-- --------------------------------------------------------

--
-- Table structure for table `booking_order`
--

CREATE TABLE `booking_order` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `arrival` int(11) NOT NULL DEFAULT 0,
  `refund` int(11) DEFAULT NULL,
  `booking_status` varchar(100) NOT NULL DEFAULT 'pending',
  `order_id` varchar(150) NOT NULL,
  `trans_id` varchar(200) DEFAULT NULL,
  `trans_amt` int(11) NOT NULL,
  `trans_status` varchar(100) NOT NULL DEFAULT 'pending',
  `trans_resp_msg` varchar(200) DEFAULT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_order`
--

INSERT INTO `booking_order` (`booking_id`, `user_id`, `room_id`, `arrival`, `refund`, `booking_status`, `order_id`, `trans_id`, `trans_amt`, `trans_status`, `trans_resp_msg`, `datentime`) VALUES
(1, 7, 5, 0, NULL, 'pending', 'ORD7736252', NULL, 0, 'pending', NULL, '2022-10-10 17:59:14'),
(2, 7, 5, 0, 0, 'cancelled', 'ORD749754', '20221010111212800110168217104112645\n', 12000, 'TXN_SUCCESS', 'Txn Success', '2022-10-10 18:31:50'),
(3, 7, 4, 0, NULL, 'booked', 'ORD7945882', '20221010111212800110168647404153869', 22000, 'TXN_SUCCESS', 'Txn Success', '2022-10-10 19:56:58'),
(4, 7, 3, 0, NULL, 'payment failed', 'ORD7180228', '20221010111212800110168898404145696', 1, 'TXN_FAILURE', 'Your payment has been declined by your bank. Please try again or use a different method to complete the payment.', '2022-10-10 19:57:41'),
(5, 7, 4, 1, NULL, 'booked', 'ORD7229444', '20221010111212800110168655304150268', 22000, 'TXN_SUCCESS', 'Txn Success', '2022-10-10 21:08:26'),
(6, 7, 3, 0, 0, 'cancelled', 'ORD7784326', '20221010111212800110168609304092452', 1, 'TXN_SUCCESS', 'Txn Success', '2022-10-10 23:24:44'),
(7, 7, 5, 0, 0, 'cancelled', 'ORD7700463', '20221010111212800110168109604121016', 12000, 'TXN_SUCCESS', 'Txn Success', '2022-10-10 23:25:57'),
(8, 7, 5, 0, NULL, 'booked', 'ORD7960387', '20221011111212800110168778004131836', 12000, 'TXN_SUCCESS', 'Txn Success', '2022-10-11 01:48:34'),
(9, 7, 5, 0, NULL, 'booked', 'ORD793261', '20221011111212800110168039604143909', 12000, 'TXN_SUCCESS', 'Txn Success', '2022-10-11 10:00:14'),
(10, 7, 3, 0, NULL, 'booked', 'ORD7776763', '20221011111212800110168342704120562', 200, 'TXN_SUCCESS', 'Txn Success', '2022-10-11 10:59:27'),
(11, 7, 5, 0, NULL, 'booked', 'ORD7514566', '20221011111212800110168633304130769', 150, 'TXN_SUCCESS', 'Txn Success', '2022-10-11 11:54:47'),
(12, 7, 3, 0, NULL, 'pending', 'ORD7899451', NULL, 0, 'pending', NULL, '2022-10-11 14:09:09'),
(13, 7, 6, 0, NULL, 'pending', 'ORD7407879', NULL, 0, 'pending', NULL, '2022-10-11 14:12:53'),
(14, 7, 6, 0, NULL, 'booked', 'ORD7678177', '20221011111212800110168344804120596', 300, 'TXN_SUCCESS', 'Txn Success', '2022-10-11 20:35:44'),
(15, 7, 9, 0, NULL, 'pending', 'ORD7244064', NULL, 0, 'pending', NULL, '2022-11-02 01:24:27'),
(16, 7, 9, 0, NULL, 'pending', 'ORD7876654', NULL, 0, 'pending', NULL, '2022-11-02 01:25:33'),
(17, 7, 10, 0, NULL, 'pending', 'ORD7576623', NULL, 0, 'pending', NULL, '2022-11-04 17:37:58'),
(18, 7, 11, 0, NULL, 'pending', 'ORD7370706', NULL, 0, 'pending', NULL, '2022-11-04 18:17:29'),
(19, 7, 10, 0, NULL, 'pending', 'ORD7289650', NULL, 0, 'pending', NULL, '2022-11-04 18:31:25'),
(20, 7, 11, 0, NULL, 'pending', 'ORD7613935', NULL, 0, 'pending', NULL, '2022-11-04 18:31:58'),
(21, 7, 12, 0, 1, 'cancelled', 'ORD7748356', '20221104111212800110168875604201032', 300, 'TXN_SUCCESS', 'Txn Success', '2022-11-04 21:48:38'),
(22, 9, 12, 0, NULL, 'booked', 'ORD9554682', '20221105111212800110168022205607795', 300, 'TXN_SUCCESS', 'Txn Success', '2022-11-05 00:08:32'),
(23, 9, 13, 0, NULL, 'booked', 'ORD9466690', '20221107111212800110168833804202470', 450, 'TXN_SUCCESS', 'Txn Success', '2022-11-07 22:25:02'),
(24, 9, 15, 1, NULL, 'booked', 'ORD9773691', '20221110111212800110168859404211404', 200, 'TXN_SUCCESS', 'Txn Success', '2022-11-10 11:26:11'),
(25, 9, 16, 0, NULL, 'booked', 'ORD9186010', '20221113111212800110168588204225829', 200, 'TXN_SUCCESS', 'Txn Success', '2022-11-13 12:09:25'),
(26, 9, 16, 0, NULL, 'pending', 'ORD9448686', NULL, 0, 'pending', NULL, '2022-11-16 18:16:14'),
(27, 9, 16, 0, NULL, 'pending', 'ORD918228', NULL, 0, 'pending', NULL, '2022-11-16 18:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `sr_no` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`sr_no`, `image`) VALUES
(8, 'IMG_14315.png'),
(9, 'IMG_44645.png'),
(10, 'IMG_57732.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `pn1` bigint(20) NOT NULL,
  `pn2` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `pn1`, `pn2`, `email`, `fb`, `insta`, `tw`) VALUES
(1, 9616185423, 2365142315, 'ourmplteam@gmail.com', 'https://www.google.com/', 'https://www.google.com/', 'https://www.google.com/');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `icon`, `name`, `description`, `admin_id`) VALUES
(9, 'IMG_36047.svg', 'Garden', 'Gardens near the flat to relax', 2),
(11, 'IMG_72609.svg', 'Library', 'There is a library near room for studies', 3),
(12, 'IMG_21742.svg', 'Laundry', 'Nearby Laundry Services', 0),
(13, 'IMG_42527.svg', 'Atharva College Of Engineering', 'Near By Atharva College Of Engineering (ACOE). Thus making the room best suitable for the ACOE students', 0),
(14, 'IMG_99974.svg', 'School', 'Saint Lorrain&#039;s School for the students from Kinder Garden till 12th class', 0),
(16, 'IMG_96063.svg', 'Park', 'A small Park to go for a walk', 0);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `admin_id`) VALUES
(44, '1 AC', 3),
(45, '1 Dining Table', 2),
(48, '1 Sofa', 2),
(49, '2 Wardrobes', 2),
(51, 'Gas Pipeline', 0),
(52, 'Water Supply', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `admin_id`, `name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `status`, `removed`) VALUES
(1, 2, 'Room 1', 1234, 12005, 1, 4, 1, 'This is s description!!', 1, 1),
(2, 3, 'Room 2', 120, 1, 1, 1, 1, 'wsdfgh', 1, 1),
(3, 2, 'Room 3', 1200, 200, 2, 1, 1, 'This is a desc', 1, 0),
(4, 3, 'Room 4', 123, 500, 2, 1, 1, 'DESC', 1, 0),
(5, 3, 'Room 5', 250, 150, 3, 2, 1, 'Simple Room', 1, 0),
(6, 2, 'Room 7', 2500, 300, 4, 1, 1, 'Test', 1, 0),
(7, 2, 'Shra', 12000, 200, 2, 1, 1, 'Shra', 1, 0),
(8, 3, 'Test', 13000, 200, 2, 1, 1, 'TEST', 1, 1),
(9, 9, 'Room by Owner1', 13000, 300, 3, 2, 1, 'There are 3 spacious rooms available to stay at Malad West Mumbai, Provided 1 AC, 1 Dining Table, and we have Library in our facilities within 500m of our location.', 1, 1),
(10, 19, 'Shra 2', 1300, 350, 2, 1, 1, 'Shra&#039;s room', 1, 0),
(11, 19, 'Room by Owner 11', 1300, 350, 2, 1, 1, 'Room by Owner 11', 1, 0),
(12, 19, 'New Room', 1500, 300, 2, 1, 1, 'New Room', 1, 0),
(13, 19, 'New Room 2', 1500, 450, 3, 0, 1, 'New Room By the Owner number 11', 1, 0),
(14, 19, 'Room by Owner 11', 1500, 500, 3, 3, 0, 'Located in Malad West, moderately crowded area, at prime location.', 1, 0),
(15, 19, '1', 12345, 200, 1, 0, 1, 'TEST', 1, 0),
(16, 18, 'Room by Owner 10', 1500, 200, 2, 2, 0, 'Room by Owner 10, have 2 rooms in the apartment, can accommodate 2 girls.', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_facilities`
--

INSERT INTO `room_facilities` (`sr_no`, `room_id`, `facilities_id`) VALUES
(21, 3, 9),
(23, 5, 9),
(24, 5, 11),
(25, 4, 11),
(26, 6, 11),
(27, 7, 11),
(30, 9, 11),
(31, 10, 9),
(32, 10, 11),
(33, 11, 11),
(34, 12, 11),
(35, 13, 11),
(36, 14, 12),
(37, 14, 13),
(38, 14, 16),
(39, 15, 11),
(40, 16, 9),
(41, 16, 11),
(42, 16, 12),
(43, 16, 16);

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_features`
--

INSERT INTO `room_features` (`sr_no`, `room_id`, `features_id`) VALUES
(33, 3, 44),
(36, 5, 44),
(37, 5, 45),
(38, 5, 48),
(39, 5, 49),
(40, 4, 49),
(41, 6, 44),
(42, 6, 45),
(43, 7, 44),
(47, 9, 44),
(48, 9, 45),
(49, 10, 44),
(50, 11, 45),
(51, 11, 48),
(52, 12, 44),
(53, 12, 45),
(54, 13, 44),
(55, 13, 45),
(56, 14, 44),
(57, 14, 51),
(58, 14, 52),
(59, 15, 44),
(60, 15, 48),
(61, 15, 52),
(62, 16, 44),
(63, 16, 48),
(64, 16, 49),
(65, 16, 52);

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`sr_no`, `room_id`, `image`, `thumb`) VALUES
(7, 3, 'IMG_95222.jpg', 0),
(8, 3, 'IMG_99965.png', 1),
(9, 4, 'IMG_27135.png', 1),
(10, 5, 'IMG_93164.png', 1),
(11, 5, 'IMG_73964.png', 0),
(12, 5, 'IMG_41247.png', 0),
(13, 3, 'IMG_51922.png', 0),
(15, 9, 'IMG_30144.png', 1),
(16, 14, 'IMG_60877.jpg', 1),
(17, 14, 'IMG_55352.png', 0),
(18, 10, 'IMG_66023.png', 1),
(19, 15, 'IMG_88267.png', 1),
(20, 16, 'IMG_41613.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `site_about` varchar(250) NOT NULL,
  `shutdown` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'Student Buddy', 'About Us Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam veritatis, eos iure facilis nam id soluta. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam veritatis, eos iure facilis nam id soluta.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_details`
--

INSERT INTO `team_details` (`sr_no`, `name`, `picture`) VALUES
(10, 'Person 1', 'IMG_56162.png'),
(11, 'Person 2', 'IMG_17376.png'),
(12, 'Person 3', 'IMG_24366.png'),
(13, 'Person 4', 'IMG_66578.png'),
(14, 'Person 5', 'IMG_29217.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `intro` varchar(300) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `token` varchar(200) DEFAULT NULL,
  `t_expire` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`id`, `name`, `email`, `phonenum`, `profile`, `intro`, `password`, `is_verified`, `token`, `t_expire`, `status`, `datentime`) VALUES
(7, 'TEST', 'miniprojectlab13260310@gmail.com', '123456789', 'IMG_35908.jpeg', 'TEST', '$2y$10$PqGuO5nOOJBweshyBjjy..nNp.xGT00dCXeflpPJhL3YYCRADQ9n6', 1, NULL, NULL, 1, '2022-10-07 00:38:01'),
(9, 'Test1', 'jeurkarshravani@gmail.com', '9404173684', 'IMG_79914.jpeg', 'A self dependent lady, finding a nice and affordable place to live in this city', '$2y$10$oqALvXLcDGth6t/cM4kasuLVT43dJrWOL.bAhQQmDVGqtBSOa3d0W', 1, '50acd48474120600ada831c668881c56', NULL, 1, '2022-11-05 00:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `date` date NOT NULL ,
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`sr_no`, `name`, `email`, `subject`, `message`, `date`, `seen`) VALUES
(18, 'Test', 'Test@test.com', 'Test', 'Test', '2022-10-11', 0),
(19, 'Shravani Milind Jeurkar', 'shravanimjeurkar@gmail.com', 'scsz', 'test', '2022-10-11', 0),
(20, 'zrf', 'test@test.com', 'adw', 'zsfzsf', '2022-10-11', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room id` (`room_id`),
  ADD KEY `facilities id` (`facilities_id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `features id` (`features_id`),
  ADD KEY `rm id` (`room_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `team_details`
--
ALTER TABLE `team_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `booking_order`
--
ALTER TABLE `booking_order`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_details`
--
ALTER TABLE `team_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_order` (`booking_id`);

--
-- Constraints for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD CONSTRAINT `booking_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_cred` (`id`),
  ADD CONSTRAINT `booking_order_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD CONSTRAINT `facilities id` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `room id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_features`
--
ALTER TABLE `room_features`
  ADD CONSTRAINT `features id` FOREIGN KEY (`features_id`) REFERENCES `features` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `rm id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
