-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 03:51 PM
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
-- Database: `ctc_food2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminId` int(10) NOT NULL,
  `admin_image` varchar(200) NOT NULL,
  `Admin_username` varchar(50) NOT NULL,
  `Admin_name` varchar(50) NOT NULL,
  `Admin_surname` varchar(50) NOT NULL,
  `Admin_password` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `admin_address` varchar(200) NOT NULL,
  `admin_tell` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminId`, `admin_image`, `Admin_username`, `Admin_name`, `Admin_surname`, `Admin_password`, `Date`, `admin_address`, `admin_tell`) VALUES
(0, '/assets/img/profile/6398877241dd9.png', 'admin@gmail.com', 'นพรัตน์', 'อินมี', '123456', '0000-00-00', '122 USA ', '123 1212 1231');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `Member_id` int(11) NOT NULL,
  `MFid` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_amount` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category_food`
--

CREATE TABLE `category_food` (
  `cf_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_food`
--

INSERT INTO `category_food` (`cf_id`, `name`, `picture`, `date`) VALUES
(1, 'อาหารไทย', 'f1.jpg', '2022-12-11'),
(2, 'ขนมหวาน\r\n', 'f2.jpg', '2022-12-11'),
(3, 'เมนูเส้น', 'f3.jpg', '2022-12-11'),
(9, 'อาหารญี่ปุ่น', '', '2022-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `category_ret`
--

CREATE TABLE `category_ret` (
  `cr_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_ret`
--

INSERT INTO `category_ret` (`cr_id`, `name`, `picture`, `date`, `status`) VALUES
(2, 'ร้านอาหารสบายๆ', '/assets/img/profile/63988b1811875.jpg', '2022-12-08', '2'),
(3, 'ร้านคาเฟ่', '/assets/img/profile/63988b1ec7ac8.jfif', '2022-12-08', '3'),
(4, 'ร้านขนมหวาน', '/assets/img/profile/63988b269ecb7.webp', '2022-12-08', '4'),
(44, 'ร้านอาหารฟาสต์ฟู้ด', '/assets/img/profile/63988b3bc4663.jpg', '2022-12-13', '');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `Price_Normal` int(11) NOT NULL,
  `Promotion` int(11) NOT NULL,
  `Price_pro` int(11) NOT NULL,
  `food_picture` varchar(255) NOT NULL,
  `food_description` longtext NOT NULL,
  `food_date` date NOT NULL DEFAULT current_timestamp(),
  `cf_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `Price_Normal`, `Promotion`, `Price_pro`, `food_picture`, `food_description`, `food_date`, `cf_id`) VALUES
(1, 'ข้าวมันไก่', 40, 0, 30, 'https://images.deliveryhero.io/image/fd-th/LH/e9vi-hero.jpg', 'ข้าวมันไก่นุ่ม  กรอบอร่อย', '2022-12-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('admin','mfood','rider','member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `status`) VALUES
(1, 'Aemorn@gmail.com', '123456', 'mfood'),
(72, 'admin@gmail.com', '123456', 'admin'),
(73, 'rider@gamil.com', '1', 'rider'),
(74, 'member@demo.com', '123456', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Member_id` int(10) NOT NULL,
  `Member_Name` varchar(50) NOT NULL,
  `Member_Surname` varchar(50) NOT NULL,
  `Member_Email` varchar(50) NOT NULL,
  `Member_Password` varchar(50) NOT NULL,
  `Member_Image` varchar(100) NOT NULL,
  `Member_address` varchar(200) NOT NULL,
  `Member_Tell` varchar(20) NOT NULL,
  `Member_Status` varchar(50) NOT NULL,
  `Member_date` date NOT NULL DEFAULT current_timestamp(),
  `member_level` enum('1','0','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Member_id`, `Member_Name`, `Member_Surname`, `Member_Email`, `Member_Password`, `Member_Image`, `Member_address`, `Member_Tell`, `Member_Status`, `Member_date`, `member_level`) VALUES
(2, 'นพรัตน์', 'อินมี', 'admin@gamil.com', '123456', 'default.png', '85 Market St Kittanning PA 16201 USA', '3123123123', 'member', '2022-12-09', '2'),
(46, 'เอ็มอร', 'ศุภมงคลชัย', 'Aemorn@gmail.com', '123456', 'default.png', '120 Market St Kittanning PA 16201 USA', '11111111', 'mfood', '2022-12-10', '0'),
(52, 'สุพรรษา', 'มาประเสริฐ', 'member@demo.com', '123456', 'default.png', '120 Market St Kittanning PA 16201 USA', '12345567', 'member', '2022-12-07', '2'),
(70, 'nopparut', 'inme', 'member@gmail.com1', '1', '', '120 Market St Kittanning PA 16201 USA', '234234', 'member', '0000-00-00', '2');

-- --------------------------------------------------------

--
-- Table structure for table `mfood`
--

CREATE TABLE `mfood` (
  `MFid` int(10) NOT NULL,
  `MFName` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `MFEmail` varchar(50) NOT NULL,
  `MFPassword` varchar(50) NOT NULL,
  `MFImage` varchar(100) NOT NULL,
  `MFaddress` varchar(200) NOT NULL,
  `MFTell` varchar(20) NOT NULL,
  `MFLevel` enum('1','2','0') NOT NULL,
  `MFStatus` varchar(20) NOT NULL,
  `MFDate` date NOT NULL DEFAULT current_timestamp(),
  `cr_id` int(11) NOT NULL,
  `cf_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mfood`
--

INSERT INTO `mfood` (`MFid`, `MFName`, `name`, `surname`, `MFEmail`, `MFPassword`, `MFImage`, `MFaddress`, `MFTell`, `MFLevel`, `MFStatus`, `MFDate`, `cr_id`, `cf_id`) VALUES
(3, '', 'นพรัตน์ ', 'อินมี', 'Aemorn@gmail.com', '123456', '/assets/img/profile/63988e16a7497.png', '85 Market St Kittanning PA 16201 USA', '234234', '2', 'mfood', '2022-12-13', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

CREATE TABLE `rider` (
  `rider_id` int(10) NOT NULL,
  `rider_name` varchar(50) NOT NULL,
  `rider_surname` varchar(50) NOT NULL,
  `rider_email` varchar(50) NOT NULL,
  `rider_password` varchar(50) NOT NULL,
  `rider_image` varchar(100) NOT NULL,
  `rider_address` varchar(200) NOT NULL,
  `rider_tell` varchar(20) NOT NULL,
  `rider_level` enum('1','2',' 0') NOT NULL,
  `rider_Status` varchar(20) NOT NULL,
  `rider_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`rider_id`, `rider_name`, `rider_surname`, `rider_email`, `rider_password`, `rider_image`, `rider_address`, `rider_tell`, `rider_level`, `rider_Status`, `rider_date`) VALUES
(5, 'ศุภกร', 'วันชัยดี', 'supakorn@demo.com', '123456', 'default.png', '256 บ.ขี้เหล็กใหญ่  ต.ในเมือง อ.เมือง จ.ชัยภูมิ', '0859457654', '2', 'rider', '2022-12-12'),
(6, 'nopparut', 'inme', 'rider@demo.com', '1', '', '120 Market St Kittanning PA 16201 USA', '111', '2', 'rider', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `category_food`
--
ALTER TABLE `category_food`
  ADD PRIMARY KEY (`cf_id`);

--
-- Indexes for table `category_ret`
--
ALTER TABLE `category_ret`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Member_id`),
  ADD UNIQUE KEY `Member_Email` (`Member_Email`);

--
-- Indexes for table `mfood`
--
ALTER TABLE `mfood`
  ADD PRIMARY KEY (`MFid`);

--
-- Indexes for table `rider`
--
ALTER TABLE `rider`
  ADD PRIMARY KEY (`rider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_food`
--
ALTER TABLE `category_food`
  MODIFY `cf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category_ret`
--
ALTER TABLE `category_ret`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `Member_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `mfood`
--
ALTER TABLE `mfood`
  MODIFY `MFid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rider`
--
ALTER TABLE `rider`
  MODIFY `rider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
