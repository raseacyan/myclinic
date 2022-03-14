-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2022 at 10:05 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_myclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(8) NOT NULL,
  `patient_name` varchar(32) NOT NULL,
  `patient_phone` varchar(32) NOT NULL,
  `patient_address` text NOT NULL,
  `patient_age` int(11) NOT NULL,
  `new_patient` int(2) NOT NULL,
  `status` varchar(8) NOT NULL,
  `token_number` int(11) DEFAULT NULL,
  `doctor_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `date`, `time`, `patient_name`, `patient_phone`, `patient_address`, `patient_age`, `new_patient`, `status`, `token_number`, `doctor_id`, `customer_id`, `created_on`) VALUES
(2, '2022-03-13', '10:00', 'Effy Stonem', '12345678', 'Bristol, England', 18, 1, 'tbc', NULL, 1, 1, '2022-03-13 10:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(8) NOT NULL,
  `age` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `gender`, `age`, `password`, `created_on`) VALUES
(1, 'Effy Stonem', '12345678', 'Bristol, England', 'female', 18, 'cc03e747a6afbbcbf8be7668acfebee5', '2022-02-07 10:29:54'),
(2, 'Han Win', '77777777', 'Yangon', 'male', 20, 'cc03e747a6afbbcbf8be7668acfebee5', '2022-02-11 04:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_on`) VALUES
(1, 'Cardiology', '2022-02-07 08:48:20'),
(2, 'Neurology', '2022-02-07 08:48:52'),
(3, 'General Surgery', '2022-02-07 08:49:08'),
(4, 'Dental', '2022-02-11 04:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `credentials` text NOT NULL,
  `consultation_time` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `credentials`, `consultation_time`, `department_id`, `created_on`) VALUES
(1, 'Dr. Zhivago', 'MBBS, MRCP (United Kingdom), FAMS (Neurology)', 'Mondays: 10am-12pm\r\nFridays: 10am-12pm', 2, '2022-02-07 09:23:42'),
(2, 'Dr. Robert', 'MBBS (uk)', 'Sat 10am-12pm', 4, '2022-02-11 04:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `type`, `description`, `price`, `created_on`) VALUES
(1, 'Silver', 'Neurology', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lobortis turpis nec neque tempus tincidunt. Sed quis arcu efficitur, ornare sapien ac, sollicitudin nunc. Duis porta, diam a porttitor aliquam, lorem turpis venenatis ante, vitae viverra ante sapien eu augue. Mauris ac nulla erat. Proin facilisis placerat nunc, sit amet gravida orci porta ac. Ut ut malesuada mauris, ac imperdiet quam. Nulla mi enim, sodales a efficitur eget, lobortis a odio. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce ornare congue lacinia. Sed et odio vel est commodo vulputate. Nam ultricies nisi et arcu elementum volutpat. Nulla at blandit nisl. Nullam et tincidunt turpis.', '100000.00', '2022-02-07 09:44:42'),
(2, 'Gold', 'Neurology', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lobortis turpis nec neque tempus tincidunt. Sed quis arcu efficitur, ornare sapien ac, sollicitudin nunc. Duis porta, diam a porttitor aliquam, lorem turpis venenatis ante, vitae viverra ante sapien eu augue. Mauris ac nulla erat. Proin facilisis placerat nunc, sit amet gravida orci porta ac. Ut ut malesuada mauris, ac imperdiet quam. Nulla mi enim, sodales a efficitur eget, lobortis a odio. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce ornare congue lacinia. Sed et odio vel est commodo vulputate. Nam ultricies nisi et arcu elementum volutpat. Nulla at blandit nisl. Nullam et tincidunt turpis.', '150000.00', '2022-02-07 09:45:05'),
(3, 'Diamond', 'Neurology', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lobortis turpis nec neque tempus tincidunt. Sed quis arcu efficitur, ornare sapien ac, sollicitudin nunc. Duis porta, diam a porttitor aliquam, lorem turpis venenatis ante, vitae viverra ante sapien eu augue. Mauris ac nulla erat. Proin facilisis placerat nunc, sit amet gravida orci porta ac. Ut ut malesuada mauris, ac imperdiet quam. Nulla mi enim, sodales a efficitur eget, lobortis a odio. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce ornare congue lacinia. Sed et odio vel est commodo vulputate. Nam ultricies nisi et arcu elementum volutpat. Nulla at blandit nisl. Nullam et tincidunt turpis.', '200000.00', '2022-02-07 09:45:19'),
(4, 'Diamond', 'Dental', 'afjkl ksadl j aslfjl; asjljka jadsf', '100000.00', '2022-02-11 04:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `package_registrations`
--

CREATE TABLE `package_registrations` (
  `id` int(11) NOT NULL,
  `registered_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `payment` varchar(32) NOT NULL,
  `package_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_registrations`
--

INSERT INTO `package_registrations` (`id`, `registered_date`, `expiry_date`, `payment`, `package_id`, `customer_id`, `created_on`) VALUES
(1, '2022-02-07', '2023-02-07', 'unpaid', 3, 1, '2022-02-07 11:29:00'),
(2, '2022-02-11', '2023-02-11', 'unpaid', 4, 2, '2022-02-11 04:53:21'),
(3, '2022-02-11', '2023-02-11', 'unpaid', 3, 2, '2022-02-11 04:53:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_registrations`
--
ALTER TABLE `package_registrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package_registrations`
--
ALTER TABLE `package_registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
