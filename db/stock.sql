-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 09:20 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `companyid` bigint(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `companyemail` varchar(255) NOT NULL,
  `regis_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`companyid`, `companyname`, `companyemail`, `regis_date`) VALUES
(1, 'Aizo Group', 'service@aizogroup.com', '2020-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `clientuser`
--

CREATE TABLE `clientuser` (
  `id` bigint(255) NOT NULL,
  `companyId` bigint(255) NOT NULL,
  `companyname` varchar(200) NOT NULL,
  `userId` bigint(255) NOT NULL,
  `username` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `intransaction`
--

CREATE TABLE `intransaction` (
  `transactionID` bigint(100) NOT NULL,
  `companyId` int(11) NOT NULL,
  `trUnityprice` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `qtyBefore` int(11) NOT NULL,
  `itemCode` varchar(255) NOT NULL,
  `doneOn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intransaction`
--

INSERT INTO `intransaction` (`transactionID`, `companyId`, `trUnityprice`, `qty`, `qtyBefore`, `itemCode`, `doneOn`) VALUES
(1, 1, 400000, 0, 10, '1', 2147483647),
(2, 1, 450000, 0, 3, '1', 2147483647),
(3, 1, 430000, 0, 5, '1', 2147483647),
(4, 1, 440000, 4, 5, '1', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemId` bigint(20) NOT NULL,
  `companyId` bigint(255) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `quantity` double NOT NULL,
  `unit` varchar(50) NOT NULL,
  `unityPrice` double NOT NULL,
  `inDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `addedBy` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemId`, `companyId`, `itemName`, `kode`, `quantity`, `unit`, `unityPrice`, `inDate`, `addedBy`) VALUES
(1, 1, 'PC', 'PC001', 0, 'pc', 500000, '2020-04-18 17:56:04', 'Aizo');

-- --------------------------------------------------------

--
-- Stand-in structure for view `returnoninvestment`
-- (See below for the actual view)
--
CREATE TABLE `returnoninvestment` (
`companyId` bigint(255)
,`transactionID` bigint(20)
,`doneOn` timestamp
,`operation` varchar(20)
,`itemCode` varchar(11)
,`itemName` varchar(50)
,`qty` decimal(20,5)
,`trUnityPrice` decimal(20,5)
,`PURCHASE_PRICE` int(11)
,`GAIN_UNIT` decimal(21,5)
,`GAIN_PER_OPERATION` decimal(41,10)
,`INVESTMENT` decimal(30,5)
);

-- --------------------------------------------------------

--
-- Table structure for table `serieid`
--

CREATE TABLE `serieid` (
  `serieID` bigint(50) NOT NULL,
  `companyId` bigint(255) NOT NULL,
  `serieDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userOn` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serieid`
--

INSERT INTO `serieid` (`serieID`, `companyId`, `serieDate`, `userOn`) VALUES
(1, 1, '2020-04-18 18:11:38', 'Aizo'),
(2, 1, '2020-04-18 18:30:07', 'Aizo'),
(3, 1, '2020-04-18 18:31:14', 'Aizo'),
(4, 1, '2020-04-18 19:07:44', 'Aizo'),
(5, 1, '2020-04-18 19:15:32', 'Aizo'),
(6, 1, '2020-04-18 19:17:01', 'Aizo');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactionID` bigint(20) NOT NULL,
  `companyId` bigint(255) NOT NULL,
  `PurchasePrice` int(11) NOT NULL,
  `trUnityPrice` decimal(20,5) NOT NULL,
  `qty` decimal(20,5) NOT NULL,
  `itemCode` varchar(11) NOT NULL,
  `operation` varchar(20) NOT NULL,
  `purchaseOrder` varchar(50) NOT NULL,
  `deliverlyNote` varchar(50) NOT NULL,
  `docRefNumber` varchar(50) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `customerRef` varchar(50) NOT NULL,
  `operationNotes` varchar(300) NOT NULL,
  `operationStatus` int(2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `doneOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `doneBy` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transactionID`, `companyId`, `PurchasePrice`, `trUnityPrice`, `qty`, `itemCode`, `operation`, `purchaseOrder`, `deliverlyNote`, `docRefNumber`, `customerName`, `customerRef`, `operationNotes`, `operationStatus`, `description`, `doneOn`, `doneBy`) VALUES
(1, 1, 400000, '400000.00000', '10.00000', '1', 'In', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '', 1, '', '2020-04-18 18:07:36', 'Aizo'),
(2, 1, 400000, '500000.00000', '2.00000', '1', 'Out', 'INV2020-2', 'N/A', 'N/A', 'N/A', 'N/A', '', 1, '', '2020-04-18 18:11:43', 'Aizo'),
(3, 1, 450000, '450000.00000', '3.00000', '1', 'In', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '', 1, '', '2020-04-18 18:12:28', 'Aizo'),
(4, 1, 400000, '500000.00000', '8.00000', '1', 'Out', 'INV2020-3', 'N/A', 'N/A', 'N/A', 'N/A', '', 1, '', '2020-04-18 18:30:17', 'Aizo'),
(5, 1, 450000, '500000.00000', '3.00000', '1', 'Out', 'INV2020-4', 'N/A', 'N/A', 'N/A', 'N/A', '', 1, '', '2020-04-18 18:31:21', 'Aizo'),
(6, 1, 430000, '430000.00000', '5.00000', '1', 'In', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '', 1, '', '2020-04-18 18:52:24', 'Aizo'),
(7, 1, 430000, '500000.00000', '3.00000', '1', 'Out', 'INV2020-5', 'N/A', 'N/A', 'N/A', 'N/A', '', 1, '', '2020-04-18 19:07:50', 'Aizo'),
(8, 1, 430000, '510000.00000', '1.00000', '1', 'Out', 'INV2020-6', 'N/A', 'N/A', 'N/A', 'N/A', '', 1, '', '2020-04-18 19:15:44', 'Aizo'),
(9, 1, 440000, '440000.00000', '5.00000', '1', 'In', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '', 1, '', '2020-04-18 19:16:37', 'Aizo'),
(10, 1, 430000, '500000.00000', '1.00000', '1', 'Out', 'INV2020-7', 'N/A', 'N/A', 'N/A', 'N/A', '', 1, '', '2020-04-18 19:17:07', 'Aizo'),
(11, 1, 440000, '500000.00000', '1.00000', '1', 'Out', 'INV2020-7', 'N/A', 'N/A', 'N/A', 'N/A', '', 1, '', '2020-04-18 19:17:07', 'Aizo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `companyId` bigint(255) NOT NULL,
  `companyname` varchar(200) NOT NULL,
  `pwd` varchar(250) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `account_type` enum('standard','administrator') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `companyId`, `companyname`, `pwd`, `phone`, `email`, `account_type`) VALUES
(1, 'Aizo', 1, 'Aizo Group', 'aizopro3', '0789754425', 'aizokini@gmail.com', 'administrator');

-- --------------------------------------------------------

--
-- Structure for view `returnoninvestment`
--
DROP TABLE IF EXISTS `returnoninvestment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `returnoninvestment`  AS  select `t`.`companyId` AS `companyId`,`t`.`transactionID` AS `transactionID`,`t`.`doneOn` AS `doneOn`,`t`.`operation` AS `operation`,`t`.`itemCode` AS `itemCode`,`i`.`itemName` AS `itemName`,`t`.`qty` AS `qty`,`t`.`trUnityPrice` AS `trUnityPrice`,`t`.`PurchasePrice` AS `PURCHASE_PRICE`,(`t`.`trUnityPrice` - `t`.`PurchasePrice`) AS `GAIN_UNIT`,((`t`.`trUnityPrice` - `t`.`PurchasePrice`) * `t`.`qty`) AS `GAIN_PER_OPERATION`,(`t`.`PurchasePrice` * `t`.`qty`) AS `INVESTMENT` from (`transactions` `t` join `items` `i` on(((`t`.`itemCode` = `i`.`itemId`) and (`t`.`operation` = 'Out')))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`companyid`);

--
-- Indexes for table `clientuser`
--
ALTER TABLE `clientuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intransaction`
--
ALTER TABLE `intransaction`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemId`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `serieid`
--
ALTER TABLE `serieid`
  ADD PRIMARY KEY (`serieID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loginId` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `companyid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clientuser`
--
ALTER TABLE `clientuser`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `intransaction`
--
ALTER TABLE `intransaction`
  MODIFY `transactionID` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `serieid`
--
ALTER TABLE `serieid`
  MODIFY `serieID` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
