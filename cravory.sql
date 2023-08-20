-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 12:33 PM
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
-- Database: `cravory`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `u_id` varchar(255) NOT NULL,
  `p_id` varchar(255) NOT NULL,
  `cart_quant` int(11) DEFAULT NULL,
  `cart_price` decimal(10,0) DEFAULT NULL,
  `cart_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `u_id`, `p_id`, `cart_quant`, `cart_price`, `cart_status`) VALUES
(1, 'Diya Raj', 'Biscuit Sponge', 22, '1500', 1),
(2, 'Diya Raj', '34', 3, '850', 1),
(4, 'Diya Raj', 'Swiss Roll Sponge Cake', 3, '450', 1),
(5, 'Diya Raj', 'Mint Chip Ice Cream Cake', 2, '350', 1),
(6, 'jays', 'Biscuit Sponge.', 1, '1500', 1),
(7, 'Maria Thomas', 'Plum Blueberry Upside Down Cake', 1, '980', 1),
(8, 'Maria Thomas', 'Ricotta plum cheesecakes', 1, '550', 1),
(9, 'Maria Thomas', 'Chiffon Cake', 0, '1549', 1),
(10, 'Maria Thomas', 'Swiss Roll Sponge Cake', 0, '450', 1),
(11, 'Maria Thomas', 'Chiffon Cake', 0, '1549', 1),
(12, 'Maria Thomas', 'Flourless Lemon Almond Cake', 0, '750', 1),
(13, 'Maria Thomas', 'Victoria Sponge Cake', 0, '850', 1),
(14, 'Maria Thomas', 'Truffle Walnut Cake', 2, '750', 1),
(15, 'Mathew', 'Victoria Sponge Cake', 2, '850', 1),
(16, 'Diya Raj', 'Red Velvet Teacake', 0, '956', 1),
(17, 'Anu Babu', 'Maple syrup cheesecake', 1, '600', 1),
(18, 'Anu Babu', 'Hot Fudge Sundae Cake', 2, '999', 1),
(19, 'Anu Babu', 'Flourless creamy cake', 1, '450', 1),
(20, 'Neeraj Jai', 'Belgium Chocolate Truffle Cake', 2, '1500', 1),
(21, 'Neeraj Jai', 'Plum Blueberry Upside Down Cake', 1, '980', 1),
(22, 'Neeraj Jai', 'Polish Yeast Plum Cake', 3, '450', 1),
(23, 'Neeraj Jai', 'Swiss Roll Sponge Cake', 0, '450', 1),
(24, 'Neeraj Jai', 'Swiss Roll Sponge Cake', 1, '450', 1),
(25, 'Abhinav Joseph', 'Truffle Walnut Cake', 1, '750', 1),
(26, 'Anu Babu', 'Victoria Sponge Cake', 1, '850', 1),
(27, 'Sree', 'Truffle Walnut Cake', 1, '750', 1),
(28, 'Sree', 'Belgium Chocolate Truffle Cake', 2, '1500', 1),
(29, 'Sree', 'Belgium Chocolate Truffle Cake', 1, '1500', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `d_co` varchar(255) NOT NULL,
  `d_staus` int(11) DEFAULT NULL,
  `d_pr_reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`d_id`, `d_name`, `d_co`, `d_staus`, `d_pr_reg_date`) VALUES
(1, 'ARHAM ORGANIC INC', '', 1, '2023-02-24'),
(2, 'SPRIGHTLITE FOODS PRIVATE LIMITED', '', 1, '2023-02-24'),
(3, 'PETALSCART', '', 1, '2023-02-24'),
(12, 'Meriboy', 'meriboy.co', 1, '2023-02-26'),
(13, 'vgrb', 'vfv', 1, '2023-02-27'),
(14, 'bubu&mumu', 'bu&mu.co', 1, '2023-02-27'),
(15, 'Sweet Grill', 'Grill.co', 1, '2023-02-28'),
(16, 'Sweetland', 'sweetland.co', 1, '2023-03-02'),
(17, 'Cake pie', 'cakepie.co', 1, '2023-03-03'),
(18, 'Mr. chandramogan', 'Arun Icecreams', 1, '2023-03-10'),
(19, 'Manu vinod', 'Kiwi', 1, '2023-03-15'),
(20, 'MIYA', 'Fruits and nuts', 1, '2023-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fd_id` int(11) NOT NULL,
  `or_id` int(11) DEFAULT NULL,
  `fd_sub` varchar(255) DEFAULT NULL,
  `fd_desc` varchar(255) DEFAULT NULL,
  `fd_status` int(11) DEFAULT NULL,
  `fd_date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `or_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `or_price` decimal(10,0) DEFAULT NULL,
  `or_date` date DEFAULT NULL,
  `or_staus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `or_return`
--

CREATE TABLE `or_return` (
  `rt_id` int(11) NOT NULL,
  `or_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `rt_date` date DEFAULT NULL,
  `rt_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `amt` int(255) NOT NULL,
  `pay_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `d_id` int(11) DEFAULT NULL,
  `p_name` varchar(255) DEFAULT NULL,
  `p_cat_id` int(11) DEFAULT NULL,
  `p_quant` int(11) DEFAULT NULL,
  `p_size` decimal(4,2) NOT NULL,
  `p_price` decimal(10,0) DEFAULT NULL,
  `p_img` varchar(255) DEFAULT NULL,
  `p_reg_date` date DEFAULT current_timestamp(),
  `p_status` int(11) DEFAULT NULL,
  `Mfg_date` varchar(50) NOT NULL,
  `Exp_date` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `d_id`, `p_name`, `p_cat_id`, `p_quant`, `p_size`, `p_price`, `p_img`, `p_reg_date`, `p_status`, `Mfg_date`, `Exp_date`, `duration`) VALUES
(5, 0, 'Mint Chip Ice Cream Cake', 18, 3, '1.00', '350', 'mintchip.jpg', '2023-02-26', 1, '01/01/2023', '05/01/2023', '4 days'),
(15, 0, 'Flourless Lemon Almond Cake', 8, 4, '2.00', '750', 'flourlesslemon.jpg', '2023-03-02', 1, '10/01/2023', '15/01/2023', '5 days'),
(16, 0, 'Flourless chocolate cake', 8, 2, '1.00', '600', 'floulesschocolate.jpg', '2023-03-02', 1, '10/01/2023', '14/01/2023', '4 days'),
(17, 0, 'Maple syrup cheesecake', 15, 6, '1.50', '600', 'maplesyrup.jpg', '2023-03-02', 2, '15/01/2023', '18/01/2023', '3 days'),
(18, 0, 'Ricotta plum cheesecakes', 15, 2, '2.00', '550', 'ricottacheese.jpg', '2023-03-10', 1, '16/01/2023', '18/01/2023', '2 days'),
(19, 0, 'chocolate fresh lemon cake', 19, 4, '2.00', '750', 'lemoncake.jpg', '2023-03-15', 1, '12/03/2023', '14/03/2023', '2 days'),
(20, 0, 'Biscuit Sponge.', 4, 2, '2.50', '1500', 'flourcake.jpg', '2023-03-15', 1, '14/03/2023', '25/03/2023', 'Best before 10 days'),
(21, 0, 'Flourless creamy cake', 8, 2, '1.00', '450', 'flourless.jpg', '2023-03-15', 1, '12/03/2023', '18/03/2023', 'Best before 6 days'),
(22, 0, 'cartoon cherish flourless cake', 8, 5, '1.00', '850', 'cartoon.jpg', '2023-03-15', 1, '10/03/2023', '15/03/2023', 'Best before 5 days'),
(23, 0, 'tea chocolate cake', 16, 2, '2.00', '500', 'tea.jpeg', '2023-03-15', 1, '14/05/2023', '18/05/2023', '5 days'),
(24, 0, 'chocolate truffle pastry', 6, 1, '2.00', '850', 'truffle.jpg', '2023-03-15', 1, '23/05/2023', '25/05/2023', '2 days'),
(29, 0, 'dark chocolate relish cake', 18, 4, '2.00', '2110', 'chocorelish.jpg', '2023-03-15', 1, '15/06/2023', '19/06/2023', '6 days'),
(30, 0, 'Jasmine Green Tea Birthday Cake.', 16, 3, '2.50', '1500', 'jasmine.jpg', '2023-03-15', 1, '15/03/2023', '20/03/2023', 'Best before 5 days'),
(32, 21, 'delta cake', 1, 2, '1.00', '630', 'delta.jpg', '2023-03-25', 1, '22/02/2022', '22/05/2022', '4'),
(33, 17, 'Cocoa relish cream cake', 1, 4, '1.50', '530', 'chocolate-cocoa cream-cake.jpg', '2023-03-26', 1, '25/03/2023', '29/03/2023', '4 days'),
(34, 16, 'Victoria Sponge Cake', 4, 2, '1.50', '850', 'victoria.jpg', '2023-03-29', 1, '24/03/2023', '26/03/2023', '2 days'),
(35, 17, 'Polish Yeast Plum Cake', 19, 1, '2.00', '450', 'yeastplum.jpg', '2023-03-29', 1, '25/03/2023', '28/03/2023', '3 days'),
(36, 15, 'Plum Blueberry Upside Down Cake', 19, 3, '2.50', '980', 'plumblue.jpg', '2023-03-29', 1, '15/02/2023', '20/02/2023', '5 days'),
(37, 12, 'Mango Fruit Cake', 1, 4, '2.00', '860', 'mango.jpg', '2023-03-29', 1, '05/03/2023', '10/03/2023', '5 days'),
(38, 3, 'Swiss Roll Sponge Cake', 4, 2, '2.00', '450', 'sponge.jpg', '2023-03-29', 1, '17/03/2023', '20/03/2023', '3 days'),
(39, 2, 'Belgium Chocolate Truffle Cake', 6, 1, '2.00', '1500', 'belgium.jpg', '2023-03-29', 1, '22/03/2023', '27/03/2023', '5 days'),
(40, 17, 'Flourless chestnut, chocolate and rum cake', 8, 4, '2.00', '2500', 'rum.jpg', '2023-03-29', 1, '10/02/2023', '15/02/2023', '4 days'),
(41, 18, 'Chocolate Fruit Gateau Cake', 1, 2, '0.50', '945', 'fruitchoco.jpg', '2023-03-29', 1, '22/03/2023', '28/03/2023', '6 days'),
(42, 15, 'Chiffon Cake', 4, 4, '2.50', '1549', 'chiffon.jpg', '2023-03-29', 1, '18/03/2023', '21/03/2023', '3 days'),
(43, 1, 'Truffle Walnut Cake', 6, 2, '2.50', '750', 'walnut.jpg', '2023-03-29', 1, '29/03/2023', '01/04/2023', '3 days'),
(44, 16, 'White Chocolate Malteser Cheesecake', 15, 1, '2.00', '840', 'whitecheese.jpg', '2023-03-29', 1, '25/03/2023', '29/03/2023', '4 days'),
(45, 16, 'Red Velvet Teacake', 16, 2, '1.50', '956', 'redvelvet.jpg', '2023-03-29', 1, '26/03/2023', '29/03/2023', '3 days'),
(46, 15, 'Hot Fudge Sundae Cake', 18, 3, '2.50', '999', 'hotfudge.jpg', '2023-03-29', 1, '26/03/2023', '30/03/2023', '4 days');

-- --------------------------------------------------------

--
-- Table structure for table `product_categ`
--

CREATE TABLE `product_categ` (
  `p_cat_id` int(11) NOT NULL,
  `p_categ_name` varchar(255) DEFAULT NULL,
  `sub_categ` varchar(50) NOT NULL,
  `categ_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categ`
--

INSERT INTO `product_categ` (`p_cat_id`, `p_categ_name`, `sub_categ`, `categ_img`) VALUES
(1, 'Fruit cakes', '', 'fruit.jpg'),
(4, 'Sponge cakes', '', 'sponge.jpg'),
(6, 'Truffle cakes', '', 'truffle1.jpg'),
(8, 'Flourless Cake', '', 'flourless1.jpg'),
(15, 'Cheese Cake', '1', 'cheese.jpg'),
(16, 'Birthday Tea cakes', '1', 'birthdaytea.jpg'),
(18, 'Cream cakes', '1', 'cream.jpg'),
(19, 'Plum cakes', '1', 'plum.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `r_id` int(11) NOT NULL,
  `r_name` varchar(255) DEFAULT NULL,
  `r_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categ`
--

CREATE TABLE `sub_categ` (
  `sub_id` int(10) NOT NULL,
  `sub_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categ`
--

INSERT INTO `sub_categ` (`sub_id`, `sub_name`) VALUES
(1, 'Strawberry'),
(2, 'Pappaya'),
(3, ''),
(4, 'Blackforest'),
(5, 'Ricotta cheesecake'),
(6, 'Birthday Cakes'),
(7, 'Tea chocolates'),
(8, 'rich plum'),
(9, 'cocoa cream cake'),
(10, 'sponge creamy cakes'),
(11, 'chocolate cake');

-- --------------------------------------------------------

--
-- Table structure for table `upcoming`
--

CREATE TABLE `upcoming` (
  `uc_id` int(11) NOT NULL,
  `uc_name` varchar(255) DEFAULT NULL,
  `d_id` int(11) DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `p_cat_id` int(11) DEFAULT NULL,
  `uc_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_credential_reg`
--

CREATE TABLE `user_credential_reg` (
  `u_id` int(11) NOT NULL,
  `r_id` int(10) NOT NULL,
  `u_name` varchar(255) DEFAULT NULL,
  `u_mail` varchar(255) DEFAULT NULL,
  `u_adrs` varchar(255) DEFAULT NULL,
  `u_phone` decimal(10,0) DEFAULT NULL,
  `u_pass` varchar(255) DEFAULT NULL,
  `u_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_credential_reg`
--

INSERT INTO `user_credential_reg` (`u_id`, `r_id`, `u_name`, `u_mail`, `u_adrs`, `u_phone`, `u_pass`, `u_status`) VALUES
(3, 1, 'bubu', 'bubu@gmail.com', 'Kochi', '8789763567', 'adAD!@12', 1),
(4, 1, 'Kiyara', 'kiyara@gmail.com', 'Delhi', '8789763567', 'adAD!@12', 1),
(5, 1, 'tom', 'tom@g.co', 'kjwnmrsgnkj', '837634438', 'ASas!@12', 1),
(107, 1, 'Sree', 'sree@gmail.com', 'Kashmir', '6321457890', 'Sree@456', 1),
(108, 1, 'Admin', 'admin@gmail.com', 'Ernakulam', '9987456321', 'Admin@123', 1),
(109, 1, 'Aswathy', 'aswathy@gmail.com', 'Trivandrum', '9875123046', 'Aswathy@123', 1),
(110, 1, 'Mathew', 'mathew@gmail.com', 'Kollam', '8475632190', 'Mathew@123', 1),
(114, 1, 'jays', 'jays@gmail.com', 'Ranni', '7206548930', 'Jays@123', 1),
(116, 1, 'Sree', 'sree@gmail.com', 'kashmir', '6321457890', 'Sree@456', 1),
(117, 1, 'Sree', 'sree@gmail.com', 'kashmir', '6321457890', 'Sree@456', 1),
(118, 1, 'Sree', 'sree@gmail.com', 'kashmir', '6321457890', 'Sree@456', 1),
(119, 1, 'Sree', 'sree@gmail.com', 'kashmir', '6321457890', 'Sree@456', 1),
(120, 1, 'Sree', 'sree@gmail.com', 'kashmir', '6321457890', 'Sree@456', 1),
(121, 1, 'Sree', 'sree@gmail.com', 'kashmir', '6321457890', 'Sree@456', 1),
(122, 1, 'Diya Raj', 'diya12@gmail.com', 'Mumbai', '7896541230', 'Diya@456', 1),
(124, 1, 'Maria Thomas', 'maria@gmail.com', 'Kochi', '9874563210', 'Maria@123', 1),
(125, 1, 'Anu Babu', 'anu@gmail.com', 'Thodupuzha', '9876230154', 'Anu@#$123', 1),
(126, 1, 'Neeraj Jai', 'neeraj21@gmail.com', 'Goa', '7563210489', 'Neeraj@456', 1),
(127, 1, 'Abhinav Joseph', 'abhi@gmail.com', 'kollam', '8456123123', 'Abhi@#$456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `u_id` int(11) DEFAULT NULL,
  `r_id` int(10) NOT NULL,
  `u_name` varchar(255) DEFAULT NULL,
  `u_pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`u_id`, `r_id`, `u_name`, `u_pass`) VALUES
(0, 0, '[value-2]', '[value-3]'),
(NULL, 1, 'bubu', 'adAD!@12'),
(NULL, 1, 'tom', 'ASas!@12'),
(NULL, 1, 'user', 'qwQW12!@'),
(NULL, 1, 'maria ', 'Maria@123'),
(0, 2, 'maria', 'Maria@123'),
(NULL, 1, 'Meenu', 'Meenu@456'),
(100, 2, 'admin', 'admin'),
(NULL, 1, 'Cutie pie', 'Cutie@123'),
(NULL, 1, 'Fruit bae', 'Fruit@123'),
(NULL, 1, 'Durg#123', 'Durga@123'),
(NULL, 1, 'Durg#123', 'Durga@123'),
(NULL, 1, 'Durg#123', 'Durga@123'),
(NULL, 1, 'Riyara', 'Riyara@123'),
(NULL, 1, 'Sree', 'Sree@456'),
(NULL, 1, 'Admin', 'Admin@123'),
(NULL, 1, 'Aswathy', 'Aswathy@123'),
(NULL, 1, 'Mathew', 'Mathew@123'),
(NULL, 1, 'Amal', 'Amal@123'),
(NULL, 1, 'varsha', 'Varsha@123'),
(NULL, 1, 'Navya', 'Navya@123'),
(NULL, 1, 'jays', 'Jays@123'),
(NULL, 1, 'meenu', 'Meenu@456'),
(NULL, 1, 'Sree', 'Sree@456'),
(NULL, 1, 'Sree', 'Sree@456'),
(NULL, 1, 'Sree', 'Sree@456'),
(NULL, 1, 'Sree', 'Sree@456'),
(NULL, 1, 'Sree', 'Sree@456'),
(NULL, 1, 'Sree', 'Sree@456'),
(NULL, 1, 'Diya Raj', 'Diya@456'),
(NULL, 1, 'Maria Thomas', 'Maria@123'),
(NULL, 1, 'Maria Thomas', 'Maria@123'),
(NULL, 1, 'Anu Babu', 'Anu@#$123'),
(NULL, 1, 'Neeraj Jai', 'Neeraj@456'),
(NULL, 1, 'Abhinav Joseph', 'Abhi@#$456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fd_id`),
  ADD KEY `or_id` (`or_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`or_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `or_return`
--
ALTER TABLE `or_return`
  ADD PRIMARY KEY (`rt_id`),
  ADD KEY `or_id` (`or_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `or_id` (`amt`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `d_id` (`d_id`),
  ADD KEY `p_cat_id` (`p_cat_id`);

--
-- Indexes for table `product_categ`
--
ALTER TABLE `product_categ`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `sub_categ`
--
ALTER TABLE `sub_categ`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `upcoming`
--
ALTER TABLE `upcoming`
  ADD PRIMARY KEY (`uc_id`),
  ADD KEY `p_cat_id` (`p_cat_id`);

--
-- Indexes for table `user_credential_reg`
--
ALTER TABLE `user_credential_reg`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD KEY `u_id` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fd_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `or_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `or_return`
--
ALTER TABLE `or_return`
  MODIFY `rt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `product_categ`
--
ALTER TABLE `product_categ`
  MODIFY `p_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categ`
--
ALTER TABLE `sub_categ`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `upcoming`
--
ALTER TABLE `upcoming`
  MODIFY `uc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_credential_reg`
--
ALTER TABLE `user_credential_reg`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`or_id`) REFERENCES `order` (`or_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user_credential_reg` (`u_id`);

--
-- Constraints for table `or_return`
--
ALTER TABLE `or_return`
  ADD CONSTRAINT `or_return_ibfk_1` FOREIGN KEY (`or_id`) REFERENCES `order` (`or_id`),
  ADD CONSTRAINT `or_return_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`);

--
-- Constraints for table `upcoming`
--
ALTER TABLE `upcoming`
  ADD CONSTRAINT `upcoming_ibfk_1` FOREIGN KEY (`p_cat_id`) REFERENCES `product_categ` (`p_cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
