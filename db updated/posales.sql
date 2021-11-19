-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 04:56 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posales`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(4, 'Mod'),
(5, 'Juice'),
(6, 'Accessories'),
(8, 'Battery'),
(9, 'Atomizer');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `prod_name` varchar(550) NOT NULL,
  `expected_date` varchar(500) NOT NULL,
  `note` varchar(500) NOT NULL,
  `transac` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `address`, `contact`, `prod_name`, `expected_date`, `note`, `transac`, `status`) VALUES
(20, 'Jaypee', 'asdasd', 'qweqwe', 'qsadasd', 'asdasd', 'asdasd', 'Walk In', 'Complete'),
(21, 'James', 'asdasd', 'qweqasd', 'asdasd', 'asdasd', 'asdasd', 'Walk in', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `customer_user`
--

CREATE TABLE `customer_user` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_user`
--

INSERT INTO `customer_user` (`user_id`, `fullname`, `username`, `password`, `address`) VALUES
(15, 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test'),
(16, 'mark jason', 'mjserq', '49d9c52d45e7c8e6c84c1baf7ee4b704', 'casaratan'),
(17, 'jason', 'markserq', '098f6bcd4621d373cade4e832627b4f6', 'san nicolas'),
(18, 'ronly', 'ronly', '098f6bcd4621d373cade4e832627b4f6', 'asd'),
(19, 'blaze serquina', 'blazeee', 'e10adc3949ba59abbe56e057f20f883e', 'tayug'),
(20, 'Kite', 'Kite', 'e10adc3949ba59abbe56e057f20f883e', 'asdasdasd'),
(21, 'test', 'test2', '098f6bcd4621d373cade4e832627b4f6', 'test'),
(22, 'Pierre Serquina', 'pierre', 'e10adc3949ba59abbe56e057f20f883e', 'San Nicolas'),
(23, 'test', 'test3', '098f6bcd4621d373cade4e832627b4f6', 'test'),
(24, 'gtarp', 'barrio', 'd4177dc752cddc204b22ec5798c4400e', 'los santos'),
(25, 'Karl Zulu', 'zulu', 'e10adc3949ba59abbe56e057f20f883e', 'Earth'),
(26, 'Andrei Hornilla', 'Drei', 'e10adc3949ba59abbe56e057f20f883e', 'Cavite'),
(27, 'qwe', 'qwe', 'e10adc3949ba59abbe56e057f20f883e', 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `subcat` text NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `o_price` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `onhand_qty` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `qty_sold` int(10) NOT NULL,
  `expiry_date` varchar(500) NOT NULL,
  `date_arrival` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `gen_name`, `subcat`, `product_name`, `cost`, `o_price`, `price`, `profit`, `supplier`, `onhand_qty`, `qty`, `qty_sold`, `expiry_date`, `date_arrival`) VALUES
(11, 'MRVS-f8c5', 'Juice', '3mg', 'Freezy Tricks', '', '300', '350', '50', 'Geekpvape', 0, 8, 20, '28/10/2022', '2021-10-28'),
(13, 'MRVS-1e21', 'Atomizer', 'None', 'Zues Tank', '', '1000', '1300', '300', 'Geekpvape', 0, 3, 15, '28/10/2022', '2021-10-28'),
(14, 'MRVS-b05e', 'Battery', '18650 ', 'Cylaid Violet 30A', '', '450', '500', '50', 'Geekpvape', 0, 2, 7, '28/10/2022', '2021-10-28');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `cash` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `profit`, `cash`, `name`) VALUES
(14, 'MR-03322223', 'mj', '10/28/21', 'cash', '2000', '200', '2000', 'Jaypee'),
(15, 'MR-007232', 'mj', '10/28/21', 'cash', '2400', '400', '2500', 'James'),
(16, 'MR-2356233', 'mj', '10/28/21', 'cash', '5000', '1400', '5000', 'Jason'),
(17, 'MR-020033', 'mj', '10/28/21', 'cash', '500', '50', '500', 'Daryl'),
(18, 'MR-0332302', 'mj', '10/28/21', 'cash', '1050', '150', '1100', 'Marko'),
(19, 'MR-838323', 'mj', '10/29/21', 'cash', '2100', '300', '2200', 'Daryl'),
(20, 'MR-32233995', 'mj', '10/28/21', 'cash', '2150', '400', '2200', 'Jaypee'),
(21, 'MR-48233330', 'mj', '10/31/21', 'cash', '350', '50', '500', 'James'),
(22, 'MR-382023', 'mj', '10/30/21', 'cash', '1300', '300', '1300', 'James'),
(23, 'MR-233328', 'mj', '10/31/21', 'cash', '2000', '400', '2000', 'Jaypee'),
(24, 'MR-532820', 'mj', '11/15/21', 'cash', '1300', '300', '1500', 'Jaypee'),
(25, 'MR-20622002', 'mj', '11/15/21', 'cash', '1300', '300', '1500', 'James'),
(26, 'MR-323322', 'mj', '11/17/21', 'cash', '1300', '300', '1500', 'Daryl'),
(27, 'MR-3237000', 'mj', '11/19/21', 'cash', '3450', '700', '3500', 'Jaypee');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `profit`, `product_code`, `gen_name`, `name`, `price`, `discount`, `date`) VALUES
(66, 'MR-03322223', '12', '1', '2000', '200', 'MRVS-39c8', 'Mod', 'Aegis X ', '2500', '500', '2021/10/28'),
(67, 'MR-007232', '13', '2', '2400', '400', 'MRVS-1e21', 'Atomizer', 'Zues Tank', '1300', '200', '2021/10/28'),
(68, 'MR-2356233', '12', '2', '5000', '1400', 'MRVS-39c8', 'Mod', 'Aegis X ', '2500', '0', '2021/10/28'),
(70, 'MR-020033', '14', '1', '500', '50', 'MRVS-b05e', 'Battery', 'Cylaid Violet 30A', '500', '0', '2021/10/28'),
(71, 'MR-0332302', '11', '3', '1050', '150', 'MRVS-f8c5', 'Juice', 'Freezy Tricks', '350', '0', '2021/10/28'),
(72, 'MR-838323', '12', '1', '2100', '300', 'MRVS-39c8', 'Mod', 'Aegis X ', '2500', '400', '2021/10/29'),
(73, 'MR-32233995', '11', '1', '350', '50', 'MRVS-f8c5', 'Juice', 'Freezy Tricks', '350', '0', '2021/10/28'),
(74, 'MR-32233995', '13', '1', '1300', '300', 'MRVS-1e21', 'Atomizer', 'Zues Tank', '1300', '0', '2021/10/28'),
(75, 'MR-32233995', '14', '1', '500', '50', 'MRVS-b05e', 'Battery', 'Cylaid Violet 30A', '500', '0', '2021/10/28'),
(76, 'MR-48233330', '11', '1', '350', '50', 'MRVS-f8c5', 'Juice', 'Freezy Tricks', '350', '0', '2021/10/31'),
(77, 'MR-382023', '13', '1', '1300', '300', 'MRVS-1e21', 'Atomizer', 'Zues Tank', '1300', '0', '2021/10/30'),
(78, 'MR-233328', '11', '2', '700', '100', 'MRVS-f8c5', 'Juice', 'Freezy Tricks', '350', '0', '2021/10/31'),
(79, 'MR-233328', '13', '1', '1300', '300', 'MRVS-1e21', 'Atomizer', 'Zues Tank', '1300', '0', '2021/10/31'),
(80, 'MR-532820', '13', '1', '1300', '300', 'MRVS-1e21', 'Atomizer', 'Zues Tank', '1300', '0', '2021/11/15'),
(81, 'MR-20622002', '13', '1', '1300', '300', 'MRVS-1e21', 'Atomizer', 'Zues Tank', '1300', '0', '2021/11/15'),
(84, 'MR-323322', '13', '1', '1300', '300', 'MRVS-1e21', 'Atomizer', 'Zues Tank', '1300', '0', '2021/11/17'),
(85, 'MR-3237000', '11', '1', '350', '50', 'MRVS-f8c5', 'Juice', 'Freezy Tricks', '350', '0', '2021/11/19'),
(86, 'MR-3237000', '13', '2', '2600', '600', 'MRVS-1e21', 'Atomizer', 'Zues Tank', '1300', '0', '2021/11/19'),
(87, 'MR-3237000', '14', '1', '500', '50', 'MRVS-b05e', 'Battery', 'Cylaid Violet 30A', '500', '0', '2021/11/19');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`suplier_id`, `suplier_name`, `suplier_address`, `suplier_contact`, `contact_person`, `note`) VALUES
(1, 'Geekpvape', 'Urdaneta Pangasinan', 'Juan Dela Cruz', '09093254587', 'sadfasda');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`) VALUES
(8, 'mjserq', '21232f297a57a5a743894a0e4a801fc3', 'mj', 'Admin'),
(9, 'monparagas', 'ee11cbb19052e40b07aac0ca060c23ee', 'Monica Paragas', 'Cashier'),
(10, 'zaratenoemi', '21232f297a57a5a743894a0e4a801fc3', 'Noemi Zarate', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_user`
--
ALTER TABLE `customer_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer_user`
--
ALTER TABLE `customer_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
