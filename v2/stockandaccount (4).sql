-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2018 at 01:00 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockandaccount`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', ''),
(2, 'sami', '4f8de24d6093ac5d25c7cfafc474d49f', '');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(11) NOT NULL DEFAULT '0',
  `brand_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`) VALUES
(1, 'Asim Jofa', 1, 1),
(2, 'Khaadi', 1, 1),
(3, 'Orient', 1, 1),
(4, 'Sapphires', 1, 1),
(5, 'Maria.b', 1, 1),
(6, 'Nimsy', 1, 1),
(7, 'Charizma', 1, 1),
(8, 'Elaan', 1, 1),
(9, 'Lime Light', 1, 1),
(10, 'Shaista lodhi', 1, 1),
(11, 'Sanam jhung', 1, 1),
(12, 'Sanam Bloch', 1, 1),
(13, 'Sobia Nazir', 1, 1),
(14, 'Imrozia', 1, 1),
(15, 'Baroque', 1, 1),
(16, 'Maya Ali', 1, 1),
(17, 'Gul Ahmad', 1, 1),
(18, 'Nishat', 1, 1),
(19, 'Zeen', 1, 1),
(20, 'Okas', 1, 1),
(21, 'Ethnic', 1, 1),
(22, 'Sana Safinaz', 1, 1),
(23, 'Fatima khan', 1, 1),
(24, 'Zainab Chothani', 1, 1),
(25, 'Cross Stitch', 1, 1),
(26, 'Needlez', 1, 1),
(27, 'Needle Impression', 1, 1),
(28, 'Emb Royal', 1, 1),
(29, 'Shara orignal', 1, 1),
(30, 'Iznik', 1, 1),
(31, 'RangJa', 1, 1),
(32, 'Rngraiz', 1, 1),
(33, 'RungRasiya', 1, 1),
(34, 'Crimson', 1, 1),
(35, 'Alkaram', 1, 1),
(36, 'Bonanza', 1, 1),
(37, 'Amber khan ', 1, 1),
(38, 'Sanam saeed', 1, 1),
(39, 'Sanam', 1, 1),
(40, 'Agha Noor', 1, 1),
(41, 'Asifa Nabeel', 1, 1),
(42, 'Ethnic', 1, 1),
(43, 'maryum', 1, 1),
(44, 'Jazmin', 1, 1),
(45, 'sarene', 1, 1),
(46, 'Baroque', 1, 1),
(47, 'Ego', 1, 1),
(48, 'Asifa Nabeel', 1, 1),
(49, 'Eidi offer', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `budget_id` int(11) NOT NULL,
  `budget_name` text NOT NULL,
  `budget_amount` double NOT NULL,
  `budget_type` varchar(300) NOT NULL,
  `budget_date` date NOT NULL,
  `budget_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`budget_id`, `budget_name`, `budget_amount`, `budget_type`, `budget_date`, `budget_add_date`) VALUES
(1, 'Sale of Order #1', 0, 'income', '2018-07-28', '2018-07-28 10:40:59'),
(2, 'Sale of Order #1', 240, 'income', '2018-07-28', '2018-07-28 10:43:17'),
(3, 'Sale of Order #1', 240, 'income', '2018-07-28', '2018-07-28 10:45:36'),
(4, 'Sale of Order #1', 0, 'income', '2018-07-28', '2018-07-28 10:45:49'),
(5, 'Sale of Order #1', 240, 'income', '2018-07-28', '2018-07-28 10:45:57'),
(6, 'Sale of Order #1', 120, 'income', '2018-07-28', '2018-07-28 10:46:12'),
(7, 'Sale of Order #1', 500, 'income', '2018-07-28', '2018-07-28 10:46:32'),
(8, 'Sale of Order #1', 240, 'income', '2018-07-28', '2018-07-28 10:50:52'),
(9, 'Sale of Order #1', 500, 'income', '2018-07-28', '2018-07-28 10:52:16'),
(10, 'Sale of Order #1', 0, 'income', '2018-07-28', '2018-07-28 10:53:46'),
(11, 'Sale of Order #1', 0, 'income', '2018-07-28', '2018-07-28 10:55:10'),
(12, 'Sale of Order #2', 12, 'income', '2018-07-28', '2018-07-28 10:56:37'),
(13, 'Sale of Order #2', 36, 'income', '2018-07-28', '2018-07-28 10:57:36'),
(14, 'Sale of Order #2', 12, 'income', '2018-07-28', '2018-07-28 10:58:11'),
(15, 'Sale of Order #2', 2200, 'income', '2018-07-28', '2018-07-28 10:58:32'),
(16, 'Sale of Order #3', 90, 'income', '2018-07-31', '2018-07-31 05:52:32'),
(17, 'Sale of Order #4', 89, 'income', '2018-07-31', '2018-07-31 05:54:48'),
(18, 'Sale of Order #5', 89, 'income', '2018-07-31', '2018-07-31 05:56:53'),
(19, 'Sale of Order #6', 500, 'income', '2018-07-31', '2018-07-31 05:57:57'),
(20, 'Sale of Order #7', 400, 'income', '2018-07-31', '2018-07-31 05:59:13'),
(21, 'Sale of Order #8', 0, 'income', '2018-07-31', '2018-07-31 10:25:53'),
(22, 'Sale of Order #9', 0, 'income', '2018-07-31', '2018-07-31 10:26:29'),
(23, 'Sale of Order #10', 0, 'income', '2018-07-31', '2018-07-31 10:26:29'),
(24, 'Sale of Order #11', 0, 'income', '2018-07-31', '2018-07-31 10:26:29'),
(25, 'Sale of Order #12', 0, 'income', '2018-07-31', '2018-07-31 10:29:49'),
(26, 'Sale of Order #2', 0, 'income', '2018-08-01', '2018-08-01 08:54:29'),
(27, 'Sale of Order #2', 0, 'income', '2018-08-01', '2018-08-01 09:42:37'),
(28, 'Sale of Order #2', 2200, 'income', '2018-08-01', '2018-08-01 09:45:32'),
(29, 'Sale of Order #2', 2200, 'income', '2018-08-01', '2018-08-01 09:46:13'),
(30, 'Sale of Order #2', 2500, 'income', '2018-08-01', '2018-08-01 09:46:52'),
(31, 'Sale of Order #2', 2200, 'income', '2018-08-01', '2018-08-01 09:48:11'),
(32, 'Sale of purchase #2', 2000, 'income', '2018-08-01', '2018-08-01 09:54:09'),
(33, 'Purchase #2', 67, 'expense', '2018-08-01', '2018-08-01 10:05:28'),
(34, 'Purchase #2', 0, 'expense', '2018-08-01', '2018-08-01 10:06:06'),
(35, 'Purchase #2', 2380, 'expense', '2018-08-01', '2018-08-01 10:06:33'),
(36, 'Purchase #2', 2380, 'expense', '2018-08-01', '2018-08-01 10:07:44'),
(37, 'Purchase #2', 0, 'expense', '2018-08-01', '2018-08-01 10:08:04'),
(38, 'Purchase #2', 5000, 'expense', '2018-08-01', '2018-08-01 10:08:21'),
(39, 'Purchase #2', 10000, 'expense', '2018-08-01', '2018-08-01 10:09:04'),
(40, 'Purchase #2', 0, 'expense', '2018-08-01', '2018-08-01 10:10:54'),
(41, 'Purchase #2', 0, 'expense', '2018-08-01', '2018-08-01 10:11:41'),
(42, 'Purchase #2', 0, 'expense', '2018-08-01', '2018-08-01 10:12:22'),
(43, 'Purchase #2', 0, 'expense', '2018-08-01', '2018-08-01 10:28:55'),
(44, 'Purchase #2', 0, 'expense', '2018-08-01', '2018-08-01 10:29:23'),
(45, 'Purchase #2', 0, 'expense', '2018-08-01', '2018-08-01 10:31:18'),
(46, 'Purchase #2', 0, 'expense', '2018-08-01', '2018-08-01 10:31:40'),
(47, 'Purchase #4', 0, 'expense', '2018-08-01', '2018-08-01 10:37:24'),
(48, 'Purchase #4', 0, 'expense', '2018-08-01', '2018-08-01 10:37:39'),
(49, 'Purchase #4', 0, 'expense', '2018-08-01', '2018-08-01 10:37:57'),
(50, 'Purchase #4', 0, 'expense', '2018-08-01', '2018-08-01 10:38:09'),
(51, 'Purchase #4', 0, 'expense', '2018-08-01', '2018-08-01 10:39:45'),
(52, 'Purchase #4', 0, 'expense', '2018-08-01', '2018-08-01 10:55:47'),
(53, 'Purchase #4', 0, 'expense', '2018-08-01', '2018-08-01 10:56:45'),
(54, 'Purchase #4', 0, 'expense', '2018-08-01', '2018-08-01 10:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `budget_category`
--

CREATE TABLE `budget_category` (
  `budget_category_id` int(11) NOT NULL,
  `budget_category_name` text NOT NULL,
  `budget_category_type` varchar(400) NOT NULL,
  `budget_category_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget_category`
--

INSERT INTO `budget_category` (`budget_category_id`, `budget_category_name`, `budget_category_type`, `budget_category_add_date`) VALUES
(1, 'transport expense', 'expense', '2018-07-24 06:32:36'),
(2, 'shop expense', 'expense', '2018-07-24 06:32:36'),
(3, 'food expense', 'expense', '2018-07-24 06:33:15'),
(4, 'personal expense', 'expense', '2018-07-24 08:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT '0',
  `categories_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`) VALUES
(1, '2pc (Shirt-Trouser)', 1, 1),
(2, '2pc (Shirt-Dupeta)', 1, 1),
(3, '3pc (Shirt -Trouser-Dupeta)', 1, 1),
(4, 'Kid 2 pc (Shirt -Trouser)', 1, 1),
(5, 'Kid 3Pc (Shirt -Trouser- duppeta)', 1, 1),
(6, 'Single Embroidered shirt ', 1, 1),
(7, 'Printed shirt single', 1, 1),
(8, 'Single emb trouser', 1, 1),
(9, 'Fancy Bridal 2 Pc (Shirt Dupeta) ', 1, 1),
(10, 'Fancy Bridal 3pc (Shirt -Trouser -Duppeta) ', 1, 1),
(11, 'Lawn suit with Cotton net dupeta (3pc)', 1, 1),
(12, 'Lawn suit with Net dupeta (3Pc)', 1, 1),
(13, 'Lawn suit with Lawn duppeta (3pc)', 1, 1),
(14, 'Lawn suit with silk duppeta (3pc)', 1, 1),
(15, 'Lawn suit with Bamber chiffone dupetta  (3pc)', 1, 1),
(16, 'Lawn suit with chiffon duppta (3pc)', 1, 1),
(17, 'Pk crinkle chiffone 3pc ', 1, 1),
(18, 'Single shirt', 1, 1),
(19, 'Buy 2 box price 7200 each.                                   Buy 3 box price 6900 each.         Buy 5 box price 6600 each', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `company_phone` varchar(100) NOT NULL,
  `personal_phone` varchar(100) NOT NULL,
  `email` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `logo`, `address`, `company_phone`, `personal_phone`, `email`) VALUES
(5, 'hamza traders', '29645b533fde55210.jpg', 'bowana bazar school wali gali ayesha center', '03044093091', '03007608242', 'muzamwahee'),
(6, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(2000) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_phone` varchar(13) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_active` int(255) NOT NULL,
  `customer_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `customer_active`, `customer_add_date`) VALUES
(1, 'Moiz Iqbal', 'moixx.ansari43@gmail.com', '3226224202', 'Gulberg Colony', 1, '2018-07-28 10:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `cod` varchar(200) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_status` varchar(11) NOT NULL DEFAULT '0',
  `address` varchar(500) NOT NULL,
  `reason_cancle` varchar(255) NOT NULL,
  `charges` varchar(200) NOT NULL,
  `note` varchar(1000) NOT NULL,
  `pending_order` varchar(1000) NOT NULL,
  `tracking` varchar(200) NOT NULL,
  `profit` varchar(255) NOT NULL,
  `transaction_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`, `discount`, `cod`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `order_status`, `address`, `reason_cancle`, `charges`, `note`, `pending_order`, `tracking`, `profit`, `transaction_id`) VALUES
(12, '2018-07-31', '1', '_', '410', '0.00', '410.00', '0', '', '410.00', '0', '410.00', 2, 1, '1', '', '', '', '', '', '', '', 38);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `quantity` double NOT NULL,
  `rate` double NOT NULL,
  `total` double NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`) VALUES
(22, 8, 6, 1, 110, 110, 1),
(23, 9, 6, 1, 110, 110, 1),
(24, 10, 6, 1, 110, 110, 1),
(25, 11, 6, 1, 110, 110, 1),
(26, 12, 4, 1, 70, 70, 1),
(27, 12, 6, 1, 110, 110, 1),
(28, 12, 5, 1, 110, 110, 1),
(29, 12, 1, 1, 120, 120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(200) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `rate` double NOT NULL,
  `purchase` double NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `weight` varchar(200) NOT NULL,
  `arate` varchar(200) NOT NULL,
  `dscrp` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `purchase`, `active`, `status`, `weight`, `arate`, `dscrp`) VALUES
(1, 'xyz', '../assests/images/stock/162125b502d8ac4315.jpg', 1, 1, -16, 120, 11.9375, 1, 1, '', '', ''),
(2, '12356', '../assests/images/stock/237465b502e8f3d191.jpg', 1, 1, 1177, 120, 119.9609375, 1, 1, '', '', ''),
(3, 'laptop', '../assests/images/stock/278055b503033ae0f7.jpg', 1, 1, 25, 2200, 2100, 1, 1, '', '', ''),
(4, 'coke', '../assests/images/stock/314565b544ecee8b85.png', 17, 13, -4, 70, 67.5, 1, 1, '', '', ''),
(5, 'Suger', '../assests/images/stock/322405b56b5956d23c.PNG', 3, 15, 161, 110, 105, 1, 1, '', '', ''),
(6, 'moiz', '', 1, 1, 86, 110, 107.5, 1, 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `purchase_date`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `transaction_id`) VALUES
(1, '2018-07-30', 'Moiz Iqbal', '_', '340.00', '0.00', '340.00', '0', '340.00', '500', '-160.00', 0, 0, 0),
(2, '2018-08-01', '1', '_', '2380.00', '0.00', '2380.00', '0', '2380.00', '', '2380.00', 0, 0, 60),
(3, '2018-08-01', '', '_', '', '', '', '0', '', '', '', 0, 0, 0),
(4, '2018-08-01', '1', '_', '240.00', '0.00', '240.00', '0', '240.00', '', '240.00', 0, 0, 69);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item`
--

CREATE TABLE `purchase_item` (
  `purchase_item_id` int(255) NOT NULL,
  `purchase_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `purchase_item_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_item`
--

INSERT INTO `purchase_item` (`purchase_item_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total`, `purchase_item_status`) VALUES
(1, 1, 2, '1', '120', '120.00', 1),
(2, 1, 6, '1', '110', '110.00', 1),
(3, 1, 5, '1', '110', '110.00', 1),
(47, 2, 1, '5', '120', '600.00', 1),
(48, 2, 5, '2', '110', '220.00', 1),
(61, 4, 2, '1', '120', '120.00', 1),
(62, 4, 2, '5', '120', '600.00', 1),
(63, 4, 2, '4', '120', '480.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `debit` varchar(100) NOT NULL,
  `credit` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `transaction_remarks` text NOT NULL,
  `transaction_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `debit`, `credit`, `balance`, `customer_id`, `transaction_remarks`, `transaction_add_date`) VALUES
(28, '0', '1000', '1000', 1, '_', '2018-07-31 08:31:59'),
(29, '500', '0', '500', 1, '_', '2018-07-31 08:32:41'),
(30, '250', '0', '250', 1, '_', '2018-07-31 08:36:34'),
(31, '0', '500', '750', 1, '_', '2018-07-31 08:40:51'),
(32, '750', '0', '0', 1, '_', '2018-07-31 08:41:29'),
(33, '1000', '0', '-1000', 1, '_', '2018-07-31 08:41:57'),
(34, '0', '110.00', '-890', 1, 'previous', '2018-07-31 10:25:53'),
(35, '0', '110.00', '-780', 1, 'previous', '2018-07-31 10:26:28'),
(36, '0', '110.00', '-670', 1, 'previous', '2018-07-31 10:26:29'),
(37, '0', '110.00', '-560', 1, 'previous', '2018-07-31 10:26:29'),
(38, '0', '410.00', '-150', 1, '', '2018-07-31 10:29:49'),
(39, '0', '2380.00', '-2530', 1, '				  		Purchased product\r\n				  	', '2018-08-01 08:53:01'),
(40, '0', '2380.00', '-150', 1, '				  		Purchased product\r\n				  	', '2018-08-01 08:54:29'),
(41, '0', '2380.00', '2230', 1, '				  		Purchased product\r\n				  	', '2018-08-01 09:42:37'),
(42, '2200', '0', '30', 1, '				  		Purchased product\r\n				  	', '2018-08-01 09:45:32'),
(43, '2200', '0', '-2170', 1, '				  		Purchased product\r\n				  	', '2018-08-01 09:46:13'),
(44, '2500', '0', '-4670', 1, '				  		Purchased product\r\n				  	', '2018-08-01 09:46:52'),
(45, '2200', '0', '-6870', 1, '				  		Purchased product\r\n				  	', '2018-08-01 09:48:11'),
(46, '0', '320.00', '-6550', 1, '				  		Purchased product\r\n				  	', '2018-08-01 09:54:08'),
(47, '0', '2323.00', '-4227', 1, 'Purchased product', '2018-08-01 10:05:28'),
(48, '0', '2380.00', '-1847', 1, 'Purchased product', '2018-08-01 10:06:06'),
(49, '2380', '0', '-4227', 1, 'Purchased product', '2018-08-01 10:06:33'),
(50, '0.00', '0', '-4227', 1, 'Purchased product', '2018-08-01 10:07:44'),
(51, '0', '2380.00', '-1847', 1, 'Purchased product', '2018-08-01 10:08:04'),
(52, '-2620.00', '0', '-4467', 1, 'Purchased product', '2018-08-01 10:08:20'),
(53, '-7620.00', '0', '-12087', 1, 'Purchased product', '2018-08-01 10:09:04'),
(54, '0', '120.00', '-11967', 1, 'Purchased product', '2018-08-01 10:10:53'),
(55, '0', '710.00', '-11257', 1, 'Purchased product', '2018-08-01 10:11:40'),
(56, '0', '1150.00', '-10107', 1, 'Purchased product', '2018-08-01 10:12:21'),
(57, '0', '1700.00', '-8407', 1, 'Purchased product', '2018-08-01 10:28:55'),
(58, '0', '710.00', '-7697', 1, 'Purchased product', '2018-08-01 10:29:23'),
(59, '0', '820.00', '-6877', 1, 'Purchased product', '2018-08-01 10:31:18'),
(60, '0', '2380.00', '-4497', 1, 'Purchased product', '2018-08-01 10:31:40'),
(61, '0', '240.00', '-4737', 1, 'Purchased product', '2018-08-01 10:36:57'),
(62, '0.00', '0', '-4737', 1, 'Purchased product', '2018-08-01 10:37:24'),
(63, '0', '600.00', '-4137', 1, 'Purchased product', '2018-08-01 10:37:39'),
(64, '0', '670.00', '-3467', 1, 'Purchased product', '2018-08-01 10:37:57'),
(65, '0', '600.00', '-2867', 1, 'Purchased product', '2018-08-01 10:38:09'),
(66, '0', '240.00', '-2627', 1, 'Purchased product', '2018-08-01 10:39:45'),
(67, '0', '600.00', '-2027', 1, 'Purchased product', '2018-08-01 10:55:47'),
(68, '0', '720.00', '-1307', 1, 'Purchased product', '2018-08-01 10:56:45'),
(69, '0', '1200.00', '-107', 1, 'Purchased product', '2018-08-01 10:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `address`, `phone`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'sami@gmail.com', '234', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `voucher_id` int(11) NOT NULL,
  `customer_id` varchar(300) NOT NULL,
  `nuration` text NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `voucher_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`voucher_id`, `customer_id`, `nuration`, `transaction_id`, `voucher_date`) VALUES
(11, '1', '_', 28, '2018-07-31'),
(12, '1', '_', 29, '2018-07-31'),
(13, '1', '_', 30, '2018-07-31'),
(14, '1', '_', 31, '2018-07-31'),
(15, '1', '_', 32, '2018-07-31'),
(16, '1', '_', 33, '2018-07-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`budget_id`);

--
-- Indexes for table `budget_category`
--
ALTER TABLE `budget_category`
  ADD PRIMARY KEY (`budget_category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD PRIMARY KEY (`purchase_item_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`voucher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `budget`
--
ALTER TABLE `budget`
  MODIFY `budget_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `budget_category`
--
ALTER TABLE `budget_category`
  MODIFY `budget_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `purchase_item`
--
ALTER TABLE `purchase_item`
  MODIFY `purchase_item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `voucher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
