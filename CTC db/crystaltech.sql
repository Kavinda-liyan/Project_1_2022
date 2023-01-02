-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 08:47 AM
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
-- Database: `crystaltech`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`username`, `pass`) VALUES
('admin', 'ctcadmin');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandid` int(255) NOT NULL,
  `brandname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandid`, `brandname`) VALUES
(9, 'MSI'),
(10, 'Dell'),
(11, 'ASUS'),
(12, 'LENOVO'),
(13, 'FANTECH'),
(14, 'OTHER');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userId`, `itemId`, `quantity`) VALUES
(9, 11, 15, 2),
(12, 11, 21, 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`) VALUES
(13, 'Gaming Laptop'),
(15, 'Laptop'),
(16, 'Mouse'),
(17, 'Keyboard'),
(18, 'Headset'),
(19, 'Mother Board'),
(20, 'Random Access Memory');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comid` int(10) NOT NULL,
  `member` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `comdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comid`, `member`, `comment`, `comdate`) VALUES
(14, 'Anonymous', 'dfdf', '2022-12-13 15:38:34'),
(15, 'Anonymous', 'dfdf', '2022-12-13 15:42:03'),
(16, 'Anonymous', 'dfdf', '2022-12-13 15:43:35'),
(17, 'Anonymous', 'ghhgfgj', '2022-12-13 15:43:53'),
(18, 'ChamKaviz', 'hbjjhgjhjh', '2022-12-13 15:44:09'),
(19, 'ChamKaviz', 'Need to improve . All the best', '2022-12-14 04:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `cid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `reply` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`cid`, `userid`, `itemid`, `msg`, `reply`) VALUES
(12, 14, 29, 'I am a DJ. Is this headset suitable for my work?', 'Yes Sir'),
(13, 14, 29, 'vdc', ''),
(14, 14, 29, 'Can i buy 10 from this product', 'Yes sir ');

-- --------------------------------------------------------

--
-- Table structure for table `itemproduct`
--

CREATE TABLE `itemproduct` (
  `Item_id` int(11) NOT NULL,
  `Item_category` varchar(15) NOT NULL,
  `Item_name` varchar(50) NOT NULL,
  `Item_description_1` varchar(50) NOT NULL,
  `Item_description_2` varchar(50) NOT NULL,
  `Item_price` int(10) NOT NULL,
  `Item_discount_price` int(10) NOT NULL,
  `Item_quantity` int(10) NOT NULL,
  `Item_cover` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `itemproducts`
--

CREATE TABLE `itemproducts` (
  `item_id` int(11) NOT NULL,
  `brand` text NOT NULL,
  `category` varchar(20) NOT NULL,
  `names` varchar(50) NOT NULL,
  `sdiscription` varchar(1000) NOT NULL,
  `price` float NOT NULL,
  `dprice` float NOT NULL,
  `quantity` int(10) NOT NULL,
  `cover` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemproducts`
--

INSERT INTO `itemproducts` (`item_id`, `brand`, `category`, `names`, `sdiscription`, `price`, `dprice`, `quantity`, `cover`) VALUES
(29, 'FANTECH', '18', 'HG15 CAPTAIN 7.1', '7. Stereo ,RGB True 7.1 Surround Sounds , Sound proof', 6500, 6000, 19, 'headset1.jpg'),
(30, 'FANTECH', '18', 'HQ52s TONE+', 'RGB , AUX, SOUND Proof , 50mm Radius Head Cushion , Sound Controller ', 7000, 7000, 20, 'headset2.jpg'),
(31, 'FANTECH', '17', 'K613L FIGHTER II', 'RGB Full size Edition Mechanical Gaming Keyboard, USB 3.0  ', 12000, 11250, 19, 'keyboard1.jpg'),
(32, 'FANTECH', '16', 'X16 THOR II', 'RGB , MACRO Supported, 6 Buttons , 7 Light Mods ,USB 3.0', 3750, 3500, 20, 'mouse2.jpg'),
(33, 'FANTECH', '16', 'X5s ZEUS', 'MACRO PRO GAMING , 200-4800DPI, SIX Buttons , 7 Color style ', 3000, 2850, 20, 'mouse5.jpg'),
(34, 'MSI', '13', 'MSI GF 63 Thin', 'MSI GF63 THIN 11UC i7 - RTX 3050 Intel® Core™ i7-11800H (24M Cache, up to 4.60 GHz, 8 Cores 16 Threads) 8GB DDR4 3200MHZ 512GB SSD NVMe 15.6\" FHD, IPS-Level Thin Bezel 60Hz NVIDIA® GeForce RTX 3050 4GB GDDR6 RED Backlit keyboard 2 kg , 51WHrs MSI Air Gaming Backpack 2 Years warranty DOS', 450000, 445000, 10, 'msi1.jpg'),
(35, 'LENOVO', '13', 'LENOVO Leagion', '11th Gen Core i7-11800H processor NVIDIA GeForce RTX 3070  8GB GDDR6 Graphics 16GB DDR4-3200 Memory 16.0\" WQXGA (2560x1600)  IPS 500 nits Antiglare 100% sRGB 165 Hz 1TB M.2 2242 SSD PCIe NVMe®, PCIe 3.0 x4 Windows 10 HOME Blue backlight keyboard Wi-Fi® 6, 802.11ax 2x2 Wi-Fi + Bluetooth 5.1', 405000, 405000, 10, 'lenovo1.jpg'),
(36, 'Dell', '15', 'DELL Insporon 15', 'Intel® Pentium® Silver N5030 Processor 4M Cache, 1.10 up to 3.1GHz (No of Cores 4 / No of Threads 4) 15.6-inch HD (1366 x 768) Narrow Boarder Display  / Carbon Black Color / Weight 1.85Kg 4GB (1X4GB) DDR4 RAM 2400MHz (1 SODIMM Slot / Upgradable up to 8GB : sold separately) 1TB Hard Disk 5400 RPM 2.5 SATA  (Upgradable up to : 2TB SSD M.2 NVMe : sold separately) Intel® UHD Graphics 605 Shared Graphics Memory', 120000, 111500, 10, 'dell1.jpg'),
(37, 'FANTECH', '16', 'X15 PHANTOM', '200-4800DPI, 7 MACRO Button, RGB 16.8 M Color ', 4700, 4500, 20, 'mouse3.jpg'),
(38, 'OTHER', '20', 'Kingston Nvme 100 ', '4 GB DDR 3', 35000, 34000, 20, 'mouse6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `lineTotal` decimal(15,2) NOT NULL,
  `shippingCost` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `userId`, `lineTotal`, `shippingCost`) VALUES
(3, 11, '475000.00', '250'),
(5, 11, '475000.00', '250'),
(7, 14, '17250.00', '250');

-- --------------------------------------------------------

--
-- Table structure for table `orderline`
--

CREATE TABLE `orderline` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unitPrice` decimal(15,2) NOT NULL,
  `total` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderline`
--

INSERT INTO `orderline` (`id`, `orderId`, `itemId`, `quantity`, `unitPrice`, `total`) VALUES
(1, 3, 7, 1, '450000.00', '450000.00'),
(3, 5, 7, 1, '450000.00', '450000.00'),
(5, 7, 29, 1, '6500.00', '6500.00'),
(6, 7, 31, 1, '12000.00', '12000.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `productName` varchar(25) NOT NULL,
  `productPriceT` int(10) NOT NULL,
  `productPriceN` int(10) NOT NULL,
  `productImg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promoid` int(255) NOT NULL,
  `topic` text NOT NULL,
  `msg` text NOT NULL,
  `cover` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promoid`, `topic`, `msg`, `cover`) VALUES
(10, 'BUY GF 63 AND GET FANTECH MOUSE FREE', 'This offer available only Dec 30 2022!\r\nTherms and Condition available!', 'promo1.jpg'),
(11, 'HOT DEAL 50% RAZER MOUSE', 'Any RAZER mouse got 50% off with Stock Clear sale .\r\nBuy Now !', 'promo2.jpg'),
(12, 'CRAZY CRISTMAS OFFER ! ', 'Buy any 2 fantech products overrs. 15000 and get X9 Mouse free', 'promo3.jpg'),
(15, 'MSI GF 63', 'sfs', 'promo1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rateindex` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `userName` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `nicNumber` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `cemail` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stars`
--

CREATE TABLE `stars` (
  `id` int(11) NOT NULL,
  `rateIndex` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stars`
--

INSERT INTO `stars` (`id`, `rateIndex`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `upassword` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `joindate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userreg`
--

CREATE TABLE `userreg` (
  `id` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `useraddress` varchar(40) NOT NULL,
  `phoneNumber` bigint(10) NOT NULL,
  `nicNumber` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `cemail` varchar(20) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userreg`
--

INSERT INTO `userreg` (`id`, `userName`, `useraddress`, `phoneNumber`, `nicNumber`, `email`, `cemail`, `userpassword`, `cpassword`) VALUES
(11, 'ChamKaviz', 'no 209/a dagonna negombo', 7123232333, '990891559V', 'chamkaviz2@gmail.com', 'chamkaviz2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b'),
(12, 'Pumal Inuruwan', 'Suramya villegoda rd, Mathugama', 342249799, '970851780V', 'pumaroxx@gmail.com', 'pumaroxx@gmail.com', 'd2b4c35b124d8c07f8571f673a1ee6e0', 'd2b4c35b124d8c07f8571f673a1ee6e0'),
(13, 'Gayani', 'no 208/B califonia, rd dehiwala', 771234567, '986543412V', 'gayanisamaraweers@gm', 'gayanisamaraweers@gm', '1d394035560734c814c9ccfdda16ff10', '1d394035560734c814c9ccfdda16ff10'),
(14, 'Kavinda Liyanaarachc', 'No 209/A Dagonna Via Negombo', 701400883, '990891559V', 'chamkaviz1@gmail.com', 'chamkaviz1@gmail.com', 'e64e4a0cc8ce0f73a9e457719fb71f89', 'e64e4a0cc8ce0f73a9e457719fb71f89');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `itemproduct`
--
ALTER TABLE `itemproduct`
  ADD PRIMARY KEY (`Item_id`);

--
-- Indexes for table `itemproducts`
--
ALTER TABLE `itemproducts`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderline`
--
ALTER TABLE `orderline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promoid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `stars`
--
ALTER TABLE `stars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userreg`
--
ALTER TABLE `userreg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `itemproducts`
--
ALTER TABLE `itemproducts`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orderline`
--
ALTER TABLE `orderline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promoid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `stars`
--
ALTER TABLE `stars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userreg`
--
ALTER TABLE `userreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
