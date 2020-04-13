-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2020 at 10:11 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(30) NOT NULL,
  `book_image` varchar(50) NOT NULL,
  `book_authorname` varchar(20) NOT NULL,
  `book_publicationname` varchar(30) NOT NULL,
  `book_purchase_date` varchar(30) NOT NULL,
  `book_price` varchar(50) NOT NULL,
  `book_qty` int(10) NOT NULL,
  `avaible_qty` int(10) NOT NULL,
  `libirian_username` varchar(16) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_image`, `book_authorname`, `book_publicationname`, `book_purchase_date`, `book_price`, `book_qty`, `avaible_qty`, `libirian_username`, `date`) VALUES
(31, 'লোক কি বলবে ?', '268375.jpg', 'আয়মান সাদিক', 'আদর্শ', '2020-01-22', '220 tk', 5, 5, 'Admin', '2020-03-29 14:49:47'),
(32, 'এইচটিএমএল', '482518.jfif', 'বোজলুর রহমান', 'আদর্শ', '2020-03-11', '120 tk', 4, 4, 'Admin', '2020-03-29 14:57:08'),
(33, 'ভাল লেগে না', '908701.jpg', 'আয়মান সাদিক', 'আদর্শ', '2020-02-12', '170 tk', 8, 8, 'Admin', '2020-04-04 15:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `issuebook`
--

CREATE TABLE `issuebook` (
  `id` int(5) NOT NULL,
  `student_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issue_date` varchar(30) NOT NULL,
  `return_date` varchar(11) DEFAULT NULL,
  `Pices` tinyint(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issuebook`
--

INSERT INTO `issuebook` (`id`, `student_id`, `book_id`, `issue_date`, `return_date`, `Pices`, `datetime`) VALUES
(25, 1, 31, '2020-04-01', ' 20-04-01', 0, '2020-04-01 14:44:23'),
(26, 8, 32, '2020-04-01', ' 20-04-01', 0, '2020-04-01 14:45:14'),
(27, 1, 31, '2020-04-01', ' 20-04-01', 0, '2020-04-01 14:46:12'),
(28, 1, 32, '2020-04-01', ' 20-04-01', 0, '2020-04-01 14:46:23'),
(29, 14, 31, '2020-04-01', ' 20-04-01', 0, '2020-04-01 15:04:03'),
(30, 3, 32, '2020-04-01', ' 20-04-01', 0, '2020-04-01 15:05:48'),
(31, 6, 32, '2020-04-01', ' 20-04-01', 0, '2020-04-01 15:05:56'),
(32, 8, 32, '2020-04-01', ' 20-04-01', 0, '2020-04-01 15:06:22'),
(33, 6, 31, '2020-04-01', ' 20-04-01', 0, '2020-04-01 15:11:34'),
(34, 1, 32, '2020-04-01', ' 2020-04-03', 0, '2020-04-01 16:05:15'),
(35, 6, 31, '2020-04-01', ' 2020-04-03', 0, '2020-04-01 16:07:19'),
(36, 8, 31, '2020-04-01', ' 2020-04-03', 0, '2020-04-01 16:17:42'),
(37, 14, 32, '2020-04-02', ' 2020-04-03', 0, '2020-04-03 05:28:48'),
(38, 14, 32, '2020-04-03', ' 2020-04-03', 0, '2020-04-03 05:29:25'),
(39, 8, 31, '2020-04-04', ' 2020-04-03', 0, '2020-04-03 05:29:34'),
(41, 5, 33, '2020-04-06', ' 2020-04-06', 0, '2020-04-06 18:22:25'),
(42, 5, 33, '2020-04-07', ' 2020-04-07', 0, '2020-04-07 19:16:23'),
(43, 5, 32, '2020-04-08', ' 2020-04-08', 0, '2020-04-08 07:21:37'),
(44, 5, 32, '2020-04-08', ' 2020-04-08', 0, '2020-04-08 08:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `liberian`
--

CREATE TABLE `liberian` (
  `id` int(5) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `images` varchar(50) DEFAULT NULL,
  `Number` varchar(30) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `liberian`
--

INSERT INTO `liberian` (`id`, `Name`, `Username`, `Email`, `Password`, `images`, `Number`, `Address`, `date`) VALUES
(1, 'Ayon Hasan', 'Admin', 'admin@gmail.com', '369949', '256535.jpeg', '01319053104', 'Feni', '2020-03-26 05:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `roll` int(5) NOT NULL,
  `reg no` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `number` varchar(15) NOT NULL,
  `Images` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fname`, `lname`, `roll`, `reg no`, `email`, `username`, `number`, `Images`, `password`, `status`, `date`) VALUES
(5, 'Tamim', 'Khan', 4, 1218688820, 'Tamim@gmail.com', 'Tamim', '01615573253', NULL, '1234567', 1, '2020-03-25 03:10:36'),
(19, 'Nurul Amin', 'limon', 5, 1218688819, 'nurulaminlimon@gmail.com', 'Limon', '01838723408', NULL, '369949', 0, '2020-04-13 08:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `bookname` varchar(30) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `aname` varchar(30) NOT NULL,
  `bookprice` varchar(30) NOT NULL,
  `bdate` varchar(30) NOT NULL,
  `bquintity` int(5) NOT NULL,
  `aquintity` int(5) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `bookname`, `pname`, `aname`, `bookprice`, `bdate`, `bquintity`, `aquintity`, `sid`) VALUES
(76, 'এইচটিএমএল', 'আদর্শ', 'বোজলুর রহমান', '120 tk', '11-03-2020', 3, 3, 32),
(77, 'ভাল লেগে না', 'আদর্শ', 'আয়মান সাদিক', '170 tk', '16-10-2019', 8, 8, 33),
(78, 'লোক কি বলবে ?', 'আদর্শ', 'আয়মান সাদিক', '180 tk', '17-03-2020', 5, 5, 31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `book_name` (`book_name`),
  ADD UNIQUE KEY `book_image` (`book_image`);

--
-- Indexes for table `issuebook`
--
ALTER TABLE `issuebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `liberian`
--
ALTER TABLE `liberian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `issuebook`
--
ALTER TABLE `issuebook`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `liberian`
--
ALTER TABLE `liberian`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
