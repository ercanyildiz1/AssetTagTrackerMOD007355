-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 04:49 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asset_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Assets_Table`
--

CREATE TABLE `Assets_Table` (
  `Device_Asset_Tag_ID` int NOT NULL,
  `Device_Type` varchar(50) NOT NULL,
  `Device_Brand` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Device_Model` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Device_Serial_Number` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Device_IMEI_Number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Device_Assigned_To_First_Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Device_Assigned_To_Last_Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Device_Assigned_To_Email_Address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Device_Assigned_To_Employee_Number` int NOT NULL,
  `Device_Time_Stamp` varchar(50) NOT NULL,
  `Device_Adjustment_Timestamp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Assets_Table`
--

INSERT INTO `Assets_Table` (`Device_Asset_Tag_ID`, `Device_Type`, `Device_Brand`, `Device_Model`, `Device_Serial_Number`, `Device_IMEI_Number`, `Device_Assigned_To_First_Name`, `Device_Assigned_To_Last_Name`, `Device_Assigned_To_Email_Address`, `Device_Assigned_To_Employee_Number`, `Device_Time_Stamp`, `Device_Adjustment_Timestamp`) VALUES
(18, 'Laptopa', 'Apple', 'MacBook Pro 16', 'HHHHGGGG1119', '3333399991', 'Jim', 'Browning', 'jb@dmail.com', 9988770, '24-12-21 15:06:17', '26-12-21 00:07:34'),
(19, 'Phone', 'Samsung', 'Galaxy S10', 'JJKKLLOOPPUU', '86262768726', 'Yaren', 'Kihman', 'yk@mail.ru', 3444778, '24-12-21 15:08:21', '24-12-21 15:08:21'),
(22, 'Air Conditioner', 'Mitsubishi', 'Edge 360', 'GJJJUI1828271', '111111', 'Gary', 'Barlow', 'kkoo@test.uk', 8866891, '26-12-21 01:51:01', '26-12-21 01:52:07'),
(25, 'Webcam1', 'Dell1', '4k cam1', 'HKJHKUJHKHKJ1', '10493023441', 'Kerry1', 'Gold1', 'kg@test.uk1', 1879491, '26-12-21 16:13:34', '26-12-21 16:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `UserAuth_Table`
--

CREATE TABLE `UserAuth_Table` (
  `UserAuth_ID` int NOT NULL,
  `UserAuth_Email_Address` varchar(50) NOT NULL,
  `UserAuth_Password` varchar(300) NOT NULL,
  `UserAuth_First_Name` varchar(50) NOT NULL,
  `UserAuth_Last_Name` varchar(50) NOT NULL,
  `UserAuth_Telephone_Number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `UserAuth_Creation_DateTime` varchar(50) NOT NULL,
  `UserAuth_Adjustment_Timestamp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `UserAuth_Table`
--

INSERT INTO `UserAuth_Table` (`UserAuth_ID`, `UserAuth_Email_Address`, `UserAuth_Password`, `UserAuth_First_Name`, `UserAuth_Last_Name`, `UserAuth_Telephone_Number`, `UserAuth_Creation_DateTime`, `UserAuth_Adjustment_Timestamp`) VALUES
(22, 'kl@gmail.co.uk', 'Hello7895', 'Kerrys', 'Lilos', '0998877665', '24-12-21 14:17:50', '26-12-21 01:54:33'),
(23, 'ts@yahoo.com', 'Password123', 'Tom', 'Styles', '0711223344', '24-12-21 14:18:05', '24-12-21 14:24:06'),
(29, 'test@test.uk', 'test', 'test', 'test', '0889000876', '25-12-21 20:57:06', '25-12-21 20:57:06'),
(30, 'ghgh@gjg.co', 'Macbook123', 'Harry', 'Styles', '07980988678', '26-12-21 01:49:36', '26-12-21 01:49:36'),
(31, 'iih@gjghj.co', 'kjkjhkj', 'kjkjhkhj', 'kjhkjhkj', '989789', '26-12-21 01:49:50', '26-12-21 01:49:50'),
(32, 'hello123@test.uk', 'Hello123!', 'Olly', 'Bradley', '07567990765', '26-12-21 15:57:36', '26-12-21 15:57:36'),
(33, 'katie@test.uk', 'Katie123', 'Katie', 'Willow', '0736281273', '26-12-21 16:05:25', '26-12-21 16:05:25'),
(34, 'JB791@test.uk', 'Hello679?', 'Josh', 'Barry', '07931061792', '26-12-21 16:11:02', '26-12-21 16:11:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Assets_Table`
--
ALTER TABLE `Assets_Table`
  ADD PRIMARY KEY (`Device_Asset_Tag_ID`);

--
-- Indexes for table `UserAuth_Table`
--
ALTER TABLE `UserAuth_Table`
  ADD PRIMARY KEY (`UserAuth_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Assets_Table`
--
ALTER TABLE `Assets_Table`
  MODIFY `Device_Asset_Tag_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `UserAuth_Table`
--
ALTER TABLE `UserAuth_Table`
  MODIFY `UserAuth_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
