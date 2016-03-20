-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 24, 2013 at 11:02 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mumza`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(3) NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) NOT NULL,
  `pword` text NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `uname`, `pword`) VALUES
(1, 'tosino', '8cb2237d0679ca88db6464eac60da96345513964');

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE IF NOT EXISTS `cash` (
  `c_id` int(255) NOT NULL AUTO_INCREMENT,
  `cashier` varchar(50) NOT NULL,
  `invoice` varchar(10) NOT NULL,
  `cash` varchar(20) NOT NULL,
  `disc` varchar(10) NOT NULL,
  `vat` varchar(10) NOT NULL,
  `total` varchar(20) NOT NULL,
  `bal` varchar(20) NOT NULL,
  `dat` varchar(15) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `cash`
--

INSERT INTO `cash` (`c_id`, `cashier`, `invoice`, `cash`, `disc`, `vat`, `total`, `bal`, `dat`) VALUES
(9, 'Phillip', '199563', '7000', '0', '0', '6950', '50', '2013-07-14'),
(10, 'Phillip', '840698', '10000', '0', '0', '9700', '300', '2013-07-13'),
(11, 'Phillip', '737673', '8100', '0', '0', '8100', '0', '2013-07-14'),
(12, 'Phillip', '894009', '13000', '0', '0', '12500', '500', '2013-07-11'),
(13, 'Phillip', '377239', '25000', '0', '0', '25000', '0', '2013-07-15'),
(14, 'Phillip', '860556', '4500', '0', '0', '4320', '180', '2013-07-15'),
(15, 'Phillip', '924084', '2000', '20', '0', '1800', '220', '2013-07-15'),
(19, 'Mercy', '678787', '6000', '0', '0', '5650', '350', ' 2013-07-15'),
(20, 'Mercy', '755718', '5500', '0', '0', '5090', '410', '2013-07-16'),
(21, 'Phillip', '901040', '2000', '0', '0', '2000', '0', '2013-07-16'),
(22, 'Phillip', '806146', '2000', '40', '0', '1200', '840', '2013-07-16'),
(23, 'Mercy', '9670443', '1000', '0', '0', '540', '460', '2013-07-19'),
(24, 'Mercy', '973803', '60000', '0', '0', '59670', '330', '2013-07-19'),
(25, 'Phillip', '8815426', '30000', '0', '0', '29430', '570', '2013-08-28'),
(26, 'Phillip', '1937756', '3000', '0', '0', '3000', '0', '2013-08-29'),
(27, 'Phillip', '1533744', '4000', '0', '0', '3850', '150', '2013-08-29'),
(38, 'Mercy', '9928901', '100', '0', '0', '100', '0', '2013-08-31'),
(39, 'Mercy', '1222191', '1000', '0', '0', '700', '300', '2013-08-31'),
(40, 'Mercy', '2547132', '100', '0', '0', '100', '0', '2013-09-01'),
(41, 'Mercy', '6173478', '200', '0', '0', '200', '0', '2013-09-01'),
(42, 'Mercy', '3615140', '100', '0', '0', '100', '0', '2013-09-01'),
(43, 'Mercy', '1269794', '500', '0', '0', '200', '300', '2013-09-01'),
(44, 'Mercy', '6090173', '200', '0', '0', '200', '0', '2013-09-01'),
(45, 'Mercy', '7543885', '500', '0', '0', '200', '300', '2013-09-01'),
(46, 'Mercy', '', '500', '0', '0', '0', '300', '2013-09-01'),
(47, 'Mercy', '8826411', '500', '0', '0', '200', '300', '2013-09-01'),
(48, 'Mercy', '8258841', '200', '0', '0', '100', '100', '2013-09-01'),
(49, 'Mercy', '853270', '500', '0', '0', '300', '200', '2013-09-01'),
(50, 'Phillip', '4149755', '', '', '', '270', '', '2013-09-02'),
(51, 'OTUKPO', '8899341', '1000', '0', '0', '800', '200', '2013-09-02'),
(52, 'OTUKPO', '5173822', '500', '0', '0', '500', '0', '2013-09-02'),
(53, 'OTUKPO', '5773127', '500', '0', '0', '300', '200', '2013-09-02');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `num` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `num` (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(225) NOT NULL AUTO_INCREMENT,
  `serial_code` varchar(100) NOT NULL,
  `name` varchar(80) NOT NULL,
  `c_price` varchar(30) NOT NULL,
  `s_price` varchar(30) NOT NULL,
  `sat_price` int(100) NOT NULL,
  `sat_qty` int(225) NOT NULL,
  `temp` int(10) NOT NULL,
  `qty` int(200) NOT NULL,
  `l_date` varchar(20) NOT NULL,
  `l_value` int(10) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `serial_code`, `name`, `c_price`, `s_price`, `sat_price`, `sat_qty`, `temp`, `qty`, `l_date`, `l_value`) VALUES
(4, '5701719641885', 'Panadol Xtra', '200', '270', 50, 6, 6, 198, '29 August 2013', 6),
(6, '00000833', 'Septrin Syrup', '100', '200', 80, 3, 0, 193, '19 July 2013', 50),
(13, '075285002766', 'Neuclogen', '300', '500', 300, 2, 0, 274, '', 0),
(14, '892342003405628047', 'Ampiclox', '400', '550', 300, 2, 0, 381, '29 August 2013', 200),
(16, '570171964198', 'pcmm', '100', '120', 0, 0, 0, 98, '', 0),
(17, '9984545877', 'Mist Magnesium', '200', '300', 150, 1, 3, 400, '1 September 2013', 200),
(18, '45379000868', 'Felvin', '400', '600', 70, 10, 0, 96, '29 August 2013', 20),
(19, '24546568667', 'Novalgin', '500', '750', 750, 1, 1, 50, '2 September 2013', 50),
(20, '56789067890', 'ACT', '600', '750', 100, 8, 8, 148, '2 September 2013', 50);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `rep_id` int(225) NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(200) NOT NULL,
  `qty` int(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`rep_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`rep_id`, `pro_name`, `qty`, `date`) VALUES
(2, 'Panadol Xtra', 22, '29 August 2013'),
(3, 'Panadol Xtra', 6, '29 August 2013'),
(4, 'Ampiclox', 200, '29 August 2013'),
(5, 'Felvin', 80, '29 August 2013'),
(6, 'Felvin', 20, '29 August 2013'),
(7, 'Mist Magnesium', 90, '1 September 2013'),
(8, 'Mist Magnesium', 20, '1 September 2013'),
(9, 'Mist Magnesium', 200, '1 September 2013'),
(10, 'Novalgin', 50, '2 September 2013'),
(11, 'Novalgin', 50, '2 September 2013'),
(12, 'Novalgin', 50, '2 September 2013'),
(13, 'ACT', 100, '2 September 2013'),
(14, 'ACT', 50, '2 September 2013');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(255) NOT NULL AUTO_INCREMENT,
  `cashier` varchar(100) NOT NULL,
  `invoice` int(10) NOT NULL,
  `date` varchar(15) NOT NULL,
  `product` varchar(50) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `subtotal` int(50) NOT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=118 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `cashier`, `invoice`, `date`, `product`, `qty`, `subtotal`) VALUES
(57, 'Phillip', 199563, '2013-07-12', 'Neuclogen', '10', 5000),
(58, 'Phillip', 199563, '2013-07-14', 'Panadol Xtra', '5', 1350),
(59, 'Phillip', 199563, '2013-07-13', 'Septrin Syrup', '3', 600),
(60, 'Phillip', 840698, '2013-07-11', 'Neuclogen', '10', 5000),
(61, 'Phillip', 840698, '2013-07-12', 'Panadol Xtra', '10', 2700),
(62, 'Phillip', 840698, '2013-07-13', 'Septrin Syrup', '10', 2000),
(63, 'Phillip', 737673, '2013-07-14', 'Panadol Xtra', '30', 8100),
(64, 'Phillip', 894009, '2013-07-11', 'Neuclogen', '25', 12500),
(65, 'Phillip', 377239, '2013-07-15', 'Neuclogen', '50', 25000),
(66, 'Phillip', 860556, '2013-07-15', 'Panadol Xtra', '16', 4320),
(67, 'Phillip', 924084, '2013-07-15', 'Septrin Syrup', '9', 1800),
(71, 'Mercy', 678787, '2013-07-15', 'Panadol Xtra', '15', 4050),
(72, 'Mercy', 678787, '2013-07-15', 'Septrin Syrup', '8', 1600),
(73, 'Mercy', 755718, '2013-07-16', 'Ampiclox', '5', 2750),
(74, 'Mercy', 755718, '2013-07-16', 'Emzor paracetamol', '9', 1800),
(75, 'Mercy', 755718, '2013-07-16', 'Panadol Xtra', '2', 540),
(76, 'Phillip', 901040, '2013-07-16', 'Septrin Syrup', '10', 2000),
(77, 'Phillip', 806146, '2013-07-16', 'Emzor paracetamol', '6', 1200),
(78, 'Mercy', 9670443, '2013-07-19', 'Panadol Xtra', '2', 540),
(79, 'Mercy', 973803, '2013-07-19', 'Panadol Xtra', '221', 59670),
(80, 'Phillip', 8815426, '2013-08-28', 'Panadol Xtra', '109', 29430),
(81, 'Phillip', 1937756, '2013-08-29', 'Mist Magnesium', '10', 3000),
(82, 'Phillip', 1533744, '2013-08-29', 'Ampiclox', '7', 3850),
(103, 'Mercy', 9928901, '2013-08-31', 'Panadol Xtra', '2 Sachets', 100),
(104, 'Mercy', 1222191, '2013-08-31', 'Felvin', '10 Sachets', 700),
(105, 'Mercy', 2547132, '2013-09-01', 'Panadol Xtra', '2 Sachets', 100),
(106, 'Mercy', 6173478, '2013-09-01', 'Panadol Xtra', '4 Sachets', 200),
(107, 'Mercy', 3615140, '2013-09-01', 'Panadol Xtra', '2 Sachets', 100),
(108, 'Mercy', 1269794, '2013-09-01', 'Panadol Xtra', '4 Sachets', 200),
(109, 'Mercy', 6090173, '2013-09-01', 'Panadol Xtra', '4 Sachets', 800),
(110, 'Mercy', 7543885, '2013-09-01', 'Panadol Xtra', '4 Sachets', 200),
(111, 'Mercy', 8826411, '2013-09-01', 'Panadol Xtra', '4 Sachets', 200),
(112, 'Mercy', 8258841, '2013-09-01', 'Panadol Xtra', '2 Sachets', 100),
(113, 'Mercy', 853270, '2013-09-01', 'Mist Magnesium', '2 Sachets', 300),
(114, 'Phillip', 4149755, '2013-09-02', 'Panadol Xtra', '1', 270),
(115, 'OTUKPO', 8899341, '2013-09-02', 'ACT', '8 Sachets', 800),
(116, 'OTUKPO', 5173822, '2013-09-02', 'ACT', '5 Sachets', 500),
(117, 'OTUKPO', 5773127, '2013-09-02', 'ACT', '3 Sachets', 300);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(5) NOT NULL AUTO_INCREMENT,
  `lname` varchar(50) NOT NULL,
  `oname` varchar(50) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `add` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nxtkin` varchar(50) NOT NULL,
  `nxtkin_add` text NOT NULL,
  `nxtkin_phone` varchar(20) NOT NULL,
  `date_employed` varchar(30) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pword` text NOT NULL,
  `logon` varchar(10) NOT NULL,
  `t_login` varchar(20) NOT NULL,
  `pix` blob NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `lname`, `oname`, `sex`, `dob`, `add`, `phone`, `email`, `nxtkin`, `nxtkin_add`, `nxtkin_phone`, `date_employed`, `uname`, `pword`, `logon`, `t_login`, `pix`) VALUES
(3, 'Oluwatosin', 'Phillip', 'Male', '2/10/1987', '14, ifesowapo street, ogudu, ojota lagos.', '08089236423', 'dtosign@yahoo.com', 'Mr T Adedokun', '17, baptist church street, gbagada phase 2, gbagada lagos.', '08089236423', '1/08/2013', 'tosino', '8cb2237d0679ca88db6464eac60da96345513964', 'yes', '02/09/2013 11:58:35', 0x75706c6f6164732f44534330303133352e6a7067),
(4, 'Olukpe', 'Mercy', 'Female', '29/02/1987', '1, kola Iyaomolere street, omole phase I, Ikeja Lagos.', '08023467524', 'mercy4show@gmail.com', 'Mr Lucky Olukpe', '56, awolowo road, Ikeja, Lagos.', '080567890732', '5/5/2012', 'mercy_olu', 'c984aed014aec7623a54f0591da07a85fd4b762d', 'yes', '31/08/2013 18:32:05', 0x75706c6f6164732f66756e6d692e6a7067),
(5, 'JOHNO', 'OTUKPO', 'Female', '12/ 09/1989', '45 LOLA STREET IJESHA, SURULERE LAGOS', '0907 567 8907', 'min_true@yahoo.com', 'Mrs Otukpo', '45 LOLA STREET IJESHA, SURULERE LAGOS', '0809 456 2345', '23/05/2012', 'johnee', '1001e8702733cced254345e193c88aaa47a4f5de', 'yes', '02/09/2013 11:43:42', 0x75706c6f6164732f50656e6775696e732e6a7067);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
