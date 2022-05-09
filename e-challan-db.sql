-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 12:14 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-challan-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `middle_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `perma_province` varchar(10) NOT NULL,
  `perma_address` varchar(30) NOT NULL,
  `temp_province` varchar(10) NOT NULL,
  `temp_address` varchar(30) NOT NULL,
  `post_address` varchar(30) NOT NULL,
  `phone_no` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `middle_name`, `last_name`, `username`, `password`, `gender`, `perma_province`, `perma_address`, `temp_province`, `temp_address`, `post_address`, `phone_no`) VALUES
(19, 'Ram', 'Lal', 'Thapa', 'ram', '123', 'Male', 'Province 3', 'Jhapa', 'Province 2', 'Kathmandu', 'Kapan', '9840300510'),
(20, 'Sonam', 'Rinzin', 'Gurung', 'son', '123', 'Male', 'Province 5', 'Morang', 'Province 3', 'Kathmandu', 'Kapan', '9801222222'),
(22, 'Shaym', 'Shree', 'Thapa', 'shy', '123', 'Male', 'Province 5', 'Rolpa', 'Province 7', 'Kailali', 'Godawari', '9801222222');

-- --------------------------------------------------------

--
-- Table structure for table `challan`
--

CREATE TABLE `challan` (
  `name` varchar(40) DEFAULT NULL,
  `place` varchar(40) NOT NULL,
  `license_no` varchar(40) NOT NULL,
  `vehicle_no` varchar(40) NOT NULL,
  `vehicle_type` varchar(40) NOT NULL,
  `created_by` varchar(40) NOT NULL,
  `challan_id` int(11) NOT NULL,
  `phone_no` bigint(11) NOT NULL,
  `fine_amount` int(11) NOT NULL,
  `violation_type` varchar(50) NOT NULL,
  `violation_desc` varchar(50) NOT NULL,
  `violation_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `challan`
--

INSERT INTO `challan` (`name`, `place`, `license_no`, `vehicle_no`, `vehicle_type`, `created_by`, `challan_id`, `phone_no`, `fine_amount`, `violation_type`, `violation_desc`, `violation_date`) VALUES
('Jeenie Aiko', 'Ramnagar', '123456789012', 'sa-10-pa-1234', 'Ranger', 'yezzy', 11, 9801222222, 1500, 'B2', 'Drink', '2022-01-29'),
('Vivek', 'Kathmandu', '123456789012', 'sa-10-pa-1234', 'A', 'sohan', 12, 9801222222, 1000, 'B2', 'No Liscense', '2022-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `traffic_user`
--

CREATE TABLE `traffic_user` (
  `id` int(20) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `middle_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `perma_province` varchar(10) NOT NULL,
  `perma_address` varchar(30) NOT NULL,
  `temp_province` varchar(10) NOT NULL,
  `temp_address` varchar(30) NOT NULL,
  `post_address` varchar(30) NOT NULL,
  `phone_no` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traffic_user`
--

INSERT INTO `traffic_user` (`id`, `first_name`, `middle_name`, `last_name`, `username`, `password`, `gender`, `perma_province`, `perma_address`, `temp_province`, `temp_address`, `post_address`, `phone_no`) VALUES
(12, 'Shris', 'Lal', 'Mann', 'shris', 'shir@1', 'Male', 'Province 1', 'Bhojpur', 'Province 3', 'Pokhara', 'Indra Galli', '9810101010'),
(13, 'Sohan', 'Kaji', 'Lama', 'sohan', '4321', 'Male', 'Province 4', 'Mustang', 'Province 3', 'Kathmandu', 'Chabahil', '981010101010'),
(15, 'Ram', '', 'Budathoki', 'ram', '123', 'Male', 'Province 1', 'Morang', 'Province 1', 'Bhojpur', 'Kharibot', '9801222222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `challan`
--
ALTER TABLE `challan`
  ADD PRIMARY KEY (`challan_id`);

--
-- Indexes for table `traffic_user`
--
ALTER TABLE `traffic_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `challan`
--
ALTER TABLE `challan`
  MODIFY `challan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `traffic_user`
--
ALTER TABLE `traffic_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
