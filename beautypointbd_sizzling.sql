-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 24, 2019 at 01:37 AM
-- Server version: 10.1.41-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beautypointbd_sizzling`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(5) NOT NULL,
  `admin_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'inactive',
  `admin_created_by` int(11) NOT NULL,
  `admin_updated_by` int(5) NOT NULL,
  `admin_created_on` datetime NOT NULL,
  `admin_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_status`, `admin_created_by`, `admin_updated_by`, `admin_created_on`, `admin_updated_on`) VALUES
(2, 'ADMIN', 'admin@sizzlingpro.co.uk', '21232f297a57a5a74#sizzling#3894a0e4a801fc3', 'active', 1, 0, '0000-00-00 00:00:00', '2019-08-21 10:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ala_carte`
--

CREATE TABLE `tbl_ala_carte` (
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_details` text NOT NULL,
  `product_new_price` decimal(10,2) NOT NULL,
  `product_created_on` datetime NOT NULL,
  `product_created_by` int(10) NOT NULL,
  `product_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_updated_by` int(10) NOT NULL,
  `product_status` enum('Active','Inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ala_carte`
--

INSERT INTO `tbl_ala_carte` (`product_id`, `product_category_id`, `product_title`, `product_image`, `product_details`, `product_new_price`, `product_created_on`, `product_created_by`, `product_updated_on`, `product_updated_by`, `product_status`) VALUES
(1, 1, 'ONION BHAJI', NULL, 'Onion, flour and lentils. Lightly spiced.', '3.15', '2018-05-13 12:34:54', 2, '2018-05-13 06:34:54', 0, 'Active'),
(2, 1, 'PRAWN PATIA PURI', NULL, 'Sweet and sour prawn with puri.', '4.95', '2018-05-13 12:35:24', 2, '2018-05-13 06:35:24', 0, 'Active'),
(3, 1, 'VEGETABLE PAKORA', NULL, 'Mixed vegetable fritters.', '3.15', '2018-05-13 12:35:49', 2, '2018-05-13 06:35:49', 0, 'Active'),
(4, 1, 'KING PRAWN PURI', NULL, 'Sweet and sour with puri.', '5.95', '2018-05-13 12:36:17', 2, '2018-05-13 06:36:17', 0, 'Active'),
(5, 1, 'VEGETABLE SAMOSA', NULL, 'Mixed savoury.', '3.15', '2018-05-13 12:36:36', 2, '2018-05-13 06:36:36', 0, 'Active'),
(6, 1, 'KING PRAWN BUTTERFLY', NULL, 'Marinated in spices and deep fried.', '5.95', '2018-05-13 12:37:01', 2, '2018-05-13 06:37:01', 0, 'Active'),
(7, 1, 'MEAT SAMOSA', NULL, 'Mixed lamb, savoury.', '3.15', '2018-05-13 12:37:19', 2, '2018-05-13 06:37:19', 0, 'Active'),
(8, 1, 'CRISPY GARLIC MUSHROOM', NULL, 'Crispy mushroom with garlic.', '3.95', '2018-05-13 12:37:36', 2, '2018-05-13 06:37:36', 0, 'Active'),
(9, 1, 'CHICKEN CHAT', NULL, 'Chicken well spiced with cucumber.', '3.15', '2018-05-13 12:37:59', 2, '2018-05-13 06:37:59', 0, 'Active'),
(10, 1, 'CHICKEN KUPITA', NULL, 'Spicy minced chicken served with peppers.', '3.95', '2018-05-13 12:38:18', 2, '2018-05-13 06:38:18', 0, 'Active'),
(11, 1, 'TANDOORI DUCK', NULL, 'Marinated in spices and grilled in the clay oven.', '4.15', '2018-05-13 12:38:36', 2, '2018-05-13 06:38:36', 0, 'Active'),
(12, 1, 'SPICY LAMB', NULL, 'Tender fillet of lamb served with spinach and yoghurt bread.', '4.50', '2018-05-13 12:38:54', 2, '2018-05-13 06:38:54', 0, 'Active'),
(13, 1, 'TANDOORI CHICKEN', NULL, '1/4 chicken on the bone.', '3.30', '2018-05-13 12:39:16', 2, '2018-05-13 06:39:16', 0, 'Active'),
(14, 1, 'AVACADO PRAWN', NULL, 'Avocado served with prawns in a cocktail sauce.', '3.95', '2018-05-13 12:39:52', 2, '2018-05-13 06:39:52', 0, 'Active'),
(15, 1, 'CHICKEN TIKKA', NULL, 'Marinated in spices and grilled in the clay oven.', '3.50', '2018-05-13 12:40:06', 2, '2018-05-13 06:40:06', 0, 'Active'),
(16, 1, 'TUFANI PLATTER', NULL, 'Chef\'s special starter for 4 persons.', '24.95', '2018-05-13 12:40:22', 2, '2018-05-13 06:40:22', 0, 'Active'),
(17, 1, 'LAMB TIKKA', NULL, 'Marinated in spices and grilled in the clay oven.', '3.50', '2018-05-13 12:40:45', 2, '2018-05-13 06:40:45', 0, 'Active'),
(18, 1, 'MIXED STARTER', NULL, 'Chicken tikka, sheek kebab and lamb tikka.', '4.95', '2018-05-13 12:41:01', 2, '2018-05-13 06:41:01', 0, 'Active'),
(19, 1, 'SHAMI KEBAB', NULL, 'Spicy minced lamb fried in oil.', '3.50', '2018-05-13 12:41:21', 2, '2018-05-13 06:41:21', 0, 'Active'),
(20, 1, 'PAPDOM PLAIN AND SPICED & PICKLE', NULL, 'Each.', '0.60', '2018-05-13 12:41:21', 2, '2018-05-13 06:43:09', 0, 'Active'),
(21, 1, 'RESHMI KEBAB', NULL, 'Spicy lamb covered in omelette.', '3.95', '2018-05-13 12:43:33', 2, '2018-05-13 06:43:33', 0, 'Active'),
(22, 1, 'PICKLE TRAY', NULL, 'Assorted selection, 60p each.', '3.00', '2018-05-13 12:43:51', 2, '2018-05-13 06:43:51', 0, 'Active'),
(23, 1, 'MURGH MAKMAL', NULL, 'Pieces of chicken marinated with garlic, fresh herbs, soft cheese, cream, ground cumin, and barbequed in the clay oven.', '3.95', '2018-05-13 12:44:10', 2, '2018-05-13 06:44:10', 0, 'Active'),
(24, 1, 'STUFFED PEPPER', NULL, 'Whole green peppers roasted in tandoor and filled with minced lamb and nuts.', '4.95', '2018-05-13 12:44:27', 2, '2018-05-13 06:44:27', 0, 'Active'),
(25, 1, 'SHEEK KEBAB', NULL, 'Spicy minced lamb cooked on skewers in the clay oven.', '3.50', '2018-05-13 12:44:42', 2, '2018-05-13 06:44:42', 0, 'Active'),
(26, 1, 'BEGUNI BAHAR', NULL, 'Baked aubergine with curd cheese, sesame seeds and tomato, served with chef\'s special chutney.', '3.95', '2018-05-13 12:45:02', 2, '2018-05-13 06:45:02', 0, 'Active'),
(27, 2, 'MEAL FOR ONE', NULL, 'STARTER: Includes papadoms, chutney and mixed starter. MAIN COURSE: Chicken or lamb korma, dansak, rogan. Any side dish of your choice, pilau rice and nan.', '17.95', '2018-05-13 12:46:01', 2, '2018-05-13 06:46:01', 0, 'Active'),
(28, 2, 'MEAL FOR TWO', NULL, 'STARTER: Papadom and chutneys, mixed starters. MAIN COURSE: Chicken tikka massala or lamb balti. SIDE DISH: Bombay aloo or gobi sag (cauliflower and spinach). Rice and nan bread.', '31.95', '2018-05-13 12:46:28', 2, '2018-05-13 06:46:28', 0, 'Active'),
(29, 3, 'TANDOORI MIXED GRILL', NULL, 'Tandoori chicken, chicken tikka, lamb tikka, sheek kebab and nan.', '9.95', '2018-05-13 12:47:01', 2, '2018-05-13 06:47:01', 0, 'Active'),
(30, 3, 'TANDOORI DUCK', NULL, 'Pieces of duck with grilled onion, tomatoes and green peppers.', '9.95', '2018-05-13 12:47:19', 2, '2018-05-13 06:47:19', 0, 'Active'),
(31, 3, 'TANDOORI KING PRAWN', NULL, 'With grilled onion, tomatoes and green peppers.', '11.95', '2018-05-13 12:47:36', 2, '2018-05-13 06:47:36', 0, 'Active'),
(32, 3, 'TANDOORI CHICKEN', NULL, 'Half chicken on the bone with garlic, onion and green peppers.', '6.95', '2018-05-13 12:47:56', 2, '2018-05-13 06:47:56', 0, 'Active'),
(33, 3, 'CHICKEN OR LAMB TIKKA', NULL, 'Diced chicken or lamb with grilled onion, tomatoes and green peppers', '7.95', '2018-05-13 12:48:13', 2, '2018-05-13 06:48:13', 0, 'Active'),
(34, 3, 'CHICKEN OR LAMB SHASHLIK', NULL, '', '8.55', '2018-05-13 12:48:31', 2, '2018-05-13 06:48:31', 0, 'Active'),
(35, 4, 'CHICKEN OR LAMB', NULL, '', '6.95', '2018-05-13 12:48:59', 2, '2018-05-13 06:48:59', 0, 'Active'),
(36, 4, 'CHICKEN TIKKA', NULL, '', '7.95', '2018-05-13 12:49:11', 2, '2018-05-13 06:49:11', 0, 'Active'),
(37, 4, 'PRAWN', NULL, '', '8.95', '2018-05-13 12:49:24', 2, '2018-05-13 06:49:24', 0, 'Active'),
(38, 4, 'KING PRAWN', NULL, '', '9.95', '2018-05-13 12:49:37', 2, '2018-05-13 06:49:37', 0, 'Active'),
(39, 4, 'MIXED VEGETABLE', NULL, '', '6.95', '2018-05-13 12:49:55', 2, '2018-05-13 06:49:55', 0, 'Active'),
(40, 5, 'CHICKEN OR LAMB', NULL, '', '6.95', '2018-05-13 12:50:46', 2, '2018-05-13 06:50:46', 0, 'Active'),
(41, 5, 'CHICKEN TIKKA', NULL, '', '7.95', '2018-05-13 12:50:59', 2, '2018-05-13 06:50:59', 0, 'Active'),
(42, 5, 'PRAWN', NULL, '', '8.95', '2018-05-13 12:51:15', 2, '2018-05-13 06:51:15', 0, 'Active'),
(43, 5, 'KING PRAWN', NULL, '', '9.95', '2018-05-13 12:51:31', 2, '2018-05-13 06:51:31', 0, 'Active'),
(44, 5, 'FISH', NULL, '', '8.95', '2018-05-13 12:51:46', 2, '2018-05-13 06:51:46', 0, 'Active'),
(45, 5, 'GOBI SAG', NULL, 'Cauliflower and spinach.', '6.95', '2018-05-13 12:52:03', 2, '2018-05-13 06:52:03', 0, 'Active'),
(46, 5, 'CHANA SAG', NULL, '', '6.95', '2018-05-13 12:52:19', 2, '2018-05-13 06:52:19', 0, 'Active'),
(47, 6, 'CHICKEN OR LAMB', NULL, '', '8.95', '2018-05-13 12:52:52', 2, '2018-05-13 06:52:52', 0, 'Active'),
(48, 6, 'KING PRAWN', NULL, '', '10.95', '2018-05-13 12:53:12', 2, '2018-05-13 06:53:12', 0, 'Active'),
(49, 6, 'PRAWN OR FISH', NULL, '', '9.95', '2018-05-13 12:53:27', 2, '2018-05-13 06:53:27', 0, 'Active'),
(50, 6, 'MIXED VEGETABLES', NULL, '', '6.95', '2018-05-13 12:53:42', 2, '2018-05-13 06:53:42', 0, 'Active'),
(51, 7, 'CHICKEN OR LAMB', NULL, '', '8.95', '2018-05-13 12:54:12', 2, '2018-05-13 06:54:12', 0, 'Active'),
(52, 7, 'PRAWN', NULL, '', '9.95', '2018-05-13 12:54:25', 2, '2018-05-13 06:54:25', 0, 'Active'),
(53, 7, 'KING PRAWN', NULL, '', '10.95', '2018-05-13 12:54:39', 2, '2018-05-13 06:54:39', 0, 'Active'),
(54, 7, 'MIXED VEGETABLES', NULL, '', '6.95', '2018-05-13 12:54:58', 2, '2018-05-13 06:55:20', 0, 'Active'),
(55, 8, 'CHICKEN OR LAMB', NULL, '', '8.95', '2018-05-13 12:55:40', 2, '2018-05-13 06:55:40', 0, 'Active'),
(56, 8, 'PRAWN', NULL, '', '9.95', '2018-05-13 12:55:56', 2, '2018-05-13 06:55:56', 0, 'Active'),
(57, 8, 'KING PRAWN', NULL, '', '11.95', '2018-05-13 12:56:08', 2, '2018-05-13 06:56:08', 0, 'Active'),
(58, 8, 'MOGAL', NULL, 'Chicken meat and prawn.', '12.95', '2018-05-13 12:56:27', 2, '2018-05-13 06:56:27', 0, 'Active'),
(59, 8, 'CHICKEN OR LAMB TIKKA', NULL, '', '9.95', '2018-05-13 12:56:38', 2, '2018-05-13 06:56:38', 0, 'Active'),
(60, 8, 'MUSHROOM', NULL, '', '7.55', '2018-05-13 12:56:56', 2, '2018-05-13 06:56:56', 0, 'Active'),
(61, 8, 'MIXED VEGETABLES', NULL, '', '7.55', '2018-05-13 12:57:10', 2, '2018-05-13 06:57:10', 0, 'Active'),
(62, 9, 'TANDOORI KING PRAWN MASSALA', NULL, '', '12.95', '2018-05-13 12:57:30', 2, '2018-05-13 06:57:30', 0, 'Active'),
(63, 9, 'CHICKEN OR LAMB TIKKA MASSALA', NULL, '', '8.95', '2018-05-13 12:57:41', 2, '2018-05-13 06:57:41', 0, 'Active'),
(64, 9, 'TANDOORI DUCK MASSALA', NULL, '', '10.95', '2018-05-13 12:57:52', 2, '2018-05-13 06:57:52', 0, 'Active'),
(65, 9, 'FISH MASSALA', NULL, 'Diced, off the bone.', '8.95', '2018-05-13 12:58:11', 2, '2018-05-13 06:58:11', 0, 'Active'),
(66, 9, 'TANDOORI CHICKEN MASSALA', NULL, 'Off the bone.', '7.95', '2018-05-13 12:58:27', 2, '2018-05-13 06:58:27', 0, 'Active'),
(67, 9, 'MIXED VEGETABLE MASSALA', NULL, '', '6.95', '2018-05-13 12:58:40', 2, '2018-05-13 06:58:40', 0, 'Active'),
(68, 10, 'CHICKEN OR LAMB', NULL, '', '6.95', '2018-05-13 12:59:03', 2, '2018-05-13 06:59:03', 0, 'Active'),
(69, 10, 'KING PRAWN', NULL, '', '9.95', '2018-05-13 12:59:16', 2, '2018-05-13 06:59:16', 0, 'Active'),
(70, 10, 'CHICKEN TIKKA', NULL, '', '7.95', '2018-05-13 12:59:30', 2, '2018-05-13 06:59:30', 0, 'Active'),
(71, 10, 'FISH', NULL, '', '8.95', '2018-05-13 12:59:40', 2, '2018-05-13 06:59:40', 0, 'Active'),
(72, 10, 'PRAWN', NULL, '', '8.95', '2018-05-13 12:59:51', 2, '2018-05-13 06:59:51', 0, 'Active'),
(73, 10, 'MIXED VEGETABLE', NULL, '', '5.95', '2018-05-13 13:01:33', 2, '2018-05-13 07:01:33', 0, 'Active'),
(74, 11, 'CHICKEN OR LAMB', NULL, '', '6.95', '2018-05-13 13:02:08', 2, '2018-05-13 07:02:08', 0, 'Active'),
(75, 11, 'KING PRAWN', NULL, '', '9.95', '2018-05-13 13:02:24', 2, '2018-05-13 07:02:24', 0, 'Active'),
(76, 11, 'PRAWN', NULL, '', '8.95', '2018-05-13 13:02:38', 2, '2018-05-13 07:02:38', 0, 'Active'),
(77, 11, 'MIXED VEGETABLE', NULL, '', '5.95', '2018-05-13 13:02:52', 2, '2018-05-13 07:02:52', 0, 'Active'),
(78, 11, 'MUSHROOM', NULL, '', '5.95', '2018-05-13 13:03:04', 2, '2018-05-13 07:03:04', 0, 'Active'),
(79, 12, 'CHICKEN OR LAMB', NULL, '', '6.95', '2018-05-13 13:05:05', 2, '2018-05-13 07:05:05', 0, 'Active'),
(80, 12, 'KING PRAWN', NULL, '', '9.95', '2018-05-13 13:05:05', 2, '2018-05-13 07:05:05', 0, 'Active'),
(81, 12, 'CHICKEN TIKKA', NULL, '', '7.95', '2018-05-13 13:05:05', 2, '2018-05-13 07:05:05', 0, 'Active'),
(82, 12, 'MIXED VEGETABLE', NULL, '', '5.95', '2018-05-13 13:05:05', 2, '2018-05-13 07:05:05', 0, 'Active'),
(83, 12, 'PRAWN', NULL, '', '8.95', '2018-05-13 13:05:05', 2, '2018-05-13 07:05:05', 0, 'Active'),
(84, 12, 'MUSHROOM', NULL, '', '5.95', '2018-05-13 13:05:05', 2, '2018-05-13 07:05:05', 0, 'Active'),
(85, 13, 'CHICKEN OR LAMB', NULL, '', '6.93', '2018-05-13 13:09:17', 2, '2018-05-13 07:09:17', 0, 'Active'),
(86, 13, 'KING PRAWN', NULL, '', '9.95', '2018-05-13 13:09:17', 2, '2018-05-13 07:09:17', 0, 'Active'),
(87, 13, 'PRAWN', NULL, '', '8.95', '2018-05-13 13:09:17', 2, '2018-05-13 07:09:17', 0, 'Active'),
(88, 13, 'MIXED VEGETABLE', NULL, '', '6.95', '2018-05-13 13:09:17', 2, '2018-05-13 07:09:17', 0, 'Active'),
(89, 14, 'CHICKEN OR LAMB', NULL, '', '6.95', '2018-05-13 13:10:59', 2, '2018-05-13 07:10:59', 0, 'Active'),
(90, 13, 'CHICKEN OR LAMB', NULL, '', '9.95', '2018-05-13 13:11:16', 2, '2018-05-13 09:05:04', 0, 'Active'),
(91, 13, 'PRAWN', NULL, '', '8.95', '2018-05-13 13:11:26', 2, '2018-05-13 09:06:21', 0, 'Active'),
(92, 13, 'KING PRAWN', NULL, '', '9.95', '2018-05-13 13:11:39', 2, '2018-05-13 09:06:39', 0, 'Active'),
(93, 13, 'MIXED VEGETABLE', NULL, '', '6.95', '2018-05-13 13:11:49', 2, '2018-05-13 09:06:05', 0, 'Active'),
(94, 14, 'CHICKEN OR LAMB', NULL, '', '6.95', '2018-05-13 13:12:05', 2, '2018-05-13 09:07:18', 0, 'Active'),
(95, 14, 'KING PRAWN', NULL, '', '9.95', '2018-05-13 15:07:30', 2, '2018-05-13 09:07:30', 0, 'Active'),
(96, 14, 'CHICKEN TIKKA', NULL, '', '7.95', '2018-05-13 15:07:46', 2, '2018-05-13 09:07:46', 0, 'Active'),
(97, 14, 'MIXED VEGETABLE', NULL, '', '6.95', '2018-05-13 15:08:04', 2, '2018-05-13 09:08:04', 0, 'Active'),
(98, 14, 'PRAWN', NULL, '', '8.95', '2018-05-13 15:08:40', 2, '2018-05-13 09:08:40', 0, 'Active'),
(99, 14, 'MUSHROOM', NULL, '', '6.95', '2018-05-13 15:08:49', 2, '2018-05-13 09:08:49', 0, 'Active'),
(100, 15, 'CHICKEN OR LAMB', NULL, '', '6.95', '2018-05-13 15:09:13', 2, '2018-05-13 09:09:13', 0, 'Active'),
(101, 15, 'KING PRAWN', NULL, '', '9.95', '2018-05-13 15:09:26', 2, '2018-05-13 09:09:26', 0, 'Active'),
(102, 15, 'CHICKEN TIKKA', NULL, '', '7.95', '2018-05-13 15:09:41', 2, '2018-05-13 09:09:41', 0, 'Active'),
(103, 15, 'MIXED VEGETABLE', NULL, '', '6.95', '2018-05-13 15:09:51', 2, '2018-05-13 09:09:51', 0, 'Active'),
(104, 15, 'PRAWN', NULL, '', '8.95', '2018-05-13 15:10:03', 2, '2018-05-13 09:10:03', 0, 'Active'),
(105, 15, 'MUSHROOM', NULL, '', '6.95', '2018-05-13 15:10:14', 2, '2018-05-13 09:10:14', 0, 'Active'),
(106, 16, 'LAMB PISTA BADAMI', NULL, 'Succulent pieces of lamb simmered in a mild rich sauce with ground cashew nuts garnished with pistachio nuts.', '9.95', '2018-05-13 15:10:35', 2, '2018-05-13 09:10:35', 0, 'Active'),
(107, 16, 'HALIBUT CHULA (GRILLED)', NULL, 'Infused halibut with cayenne pepper and dill seeds, smothered with parsley and olive oil. Dressed with a selection of vegetables.', '11.95', '2018-05-13 15:10:53', 2, '2018-05-13 09:10:53', 0, 'Active'),
(108, 16, 'BATERA JALALI', NULL, 'Spicy whole quail cooked in lightly spiced sauce and garnished with fresh fruit.', '10.95', '2018-05-13 15:11:14', 2, '2018-05-13 09:11:14', 0, 'Active'),
(109, 16, 'MONK MACHRI', NULL, 'Healthy portions of monk fish cooked in olive oil, with garlic and bay leaves, simmered in a slightly spiced tomato burst and served with a mould of steamed rice.', '13.95', '2018-05-13 15:12:00', 2, '2018-05-13 09:12:00', 0, 'Active'),
(110, 16, 'MURGH HARA BONOFUL', NULL, 'An exceptional chicken curry in a smooth gravy and well flavoured. A film favourite.', '8.95', '2018-05-13 15:12:35', 2, '2018-05-13 09:12:35', 0, 'Active'),
(111, 16, 'HALIBUT LAZIZZ', NULL, 'Halibut fillet cooked with olive oil, garlic and fresh herbs, simmered in fenugreek and tomato sauce with a dash of cream served with a mould of steamed rice.', '13.95', '2018-05-13 15:12:53', 2, '2018-05-13 09:12:53', 0, 'Active'),
(112, 16, 'GOAN SHAKUTI', NULL, 'Red salmon steak coated in fresh spices and herbs.', '10.95', '2018-05-13 15:13:10', 2, '2018-05-13 09:13:10', 0, 'Active'),
(113, 16, 'MURGH KALIA', NULL, 'Strips of chicken cooked in a black pepper sauce with a hint of chilli.', '7.95', '2018-05-13 16:13:25', 2, '2018-05-13 10:13:25', 0, 'Active'),
(114, 16, 'ROSHAN JINGA NIZMANI', NULL, 'King prawns marinated in South Indian spices, roasted on skewers with peppers, shallots and served with chutney.', '13.95', '2018-05-13 16:13:39', 2, '2018-05-13 10:13:39', 0, 'Active'),
(115, 16, 'INDIAN BASKET', NULL, 'Tiger prawns cooked with chicken in a medium strength sauce served with fresh vegetables.', '13.95', '2018-05-13 16:18:14', 2, '2018-05-13 10:18:14', 0, 'Active'),
(116, 16, 'JINGA MORICH MASSALA', NULL, 'Marinated king prawns roasted in the clay oven cooked with onions, peppers, minced meat, hot spices and herbs, and dressed with green chillies and coriander. A little hot.', '12.95', '2018-05-13 16:18:34', 2, '2018-05-13 10:18:34', 0, 'Active'),
(117, 16, 'BENGAL LOBSTER (Six hours notice required)', NULL, 'Grilled lobster cooked with cheese in Indian spices, served with rice, vegetables and nan.', '35.95', '2018-05-13 16:18:53', 2, '2018-05-13 10:18:53', 0, 'Active'),
(118, 16, 'LAMB ROSHUNI', NULL, '', '8.95', '2018-05-13 16:19:07', 2, '2018-05-13 10:19:07', 0, 'Active'),
(119, 17, 'CHICKEN OR LAMB', NULL, '', '6.95', '2018-05-13 16:19:24', 2, '2018-05-13 10:19:24', 0, 'Active'),
(120, 17, 'KING PRAWN', NULL, '', '9.95', '2018-05-13 16:19:35', 2, '2018-05-13 10:19:35', 0, 'Active'),
(121, 17, 'CHICKEN TIKKA', NULL, '', '7.95', '2018-05-13 16:19:47', 2, '2018-05-13 10:19:47', 0, 'Active'),
(122, 17, 'MIXED VEGETABLE', NULL, '', '5.95', '2018-05-13 16:20:02', 2, '2018-05-13 10:20:02', 0, 'Active'),
(123, 17, 'PRAWN', NULL, '', '8.95', '2018-05-13 16:20:18', 2, '2018-05-13 10:20:18', 0, 'Active'),
(124, 17, 'MUSHROOM', NULL, '', '5.95', '2018-05-13 16:20:31', 2, '2018-05-13 10:20:31', 0, 'Active'),
(125, 18, 'CHICKEN NARIYAL', NULL, '', '8.95', '2018-05-13 16:20:54', 2, '2018-05-13 10:20:54', 0, 'Active'),
(126, 18, 'ACHARI CHICKEN OR LAMB', NULL, 'Cooked in onions, tomatoes, coriander and mixed pickle. Medium.', '8.95', '2018-05-13 16:21:13', 2, '2018-05-13 10:21:13', 0, 'Active'),
(127, 18, 'CHICKEN OR LAMB KORAI', NULL, 'Tikka cooked with a mixture of mild peppers and spices.', '8.95', '2018-05-13 16:22:21', 2, '2018-05-13 10:22:21', 0, 'Active'),
(128, 18, 'CHITTAL KUFTA', NULL, 'Off the bone Bangladeshi fish, cooked in a special medium sauce.', '7.95', '2018-05-13 16:24:22', 2, '2018-05-13 10:24:22', 0, 'Active'),
(129, 18, 'CHICKEN OR LAMB DOPIAZA', NULL, 'Cooked with medium spices and onions.', '7.95', '2018-05-13 16:24:36', 2, '2018-05-13 10:24:36', 0, 'Active'),
(130, 18, 'BOAL DOPIAZA', NULL, 'Boneless pieces of Bangladeshi fish cooked with spices, tomato and onions.', '9.95', '2018-05-13 16:24:50', 2, '2018-05-13 10:24:50', 0, 'Active'),
(131, 18, 'CHICKEN OR LAMB PODINA', NULL, 'Cooked with tomatoes, green peppers, mint and spices. Medium.', '7.95', '2018-05-13 16:25:12', 2, '2018-05-13 10:25:12', 0, 'Active'),
(132, 18, 'JOYPUR HONEY DUCK', NULL, 'Spicy tandoori duck cooked with spices, coriander, cream and strawberry with honey sauce.', '11.95', '2018-05-13 16:25:34', 2, '2018-05-13 10:25:34', 0, 'Active'),
(133, 18, 'MAKHAN CHICKEN', NULL, '', '8.95', '2018-05-13 16:25:54', 2, '2018-05-13 10:25:54', 0, 'Active'),
(134, 18, 'MURGH RASAM ZAFRANI', NULL, 'Chicken stuffed with vegetables coated in roasted spices, cooked with coconut milk and fresh curry leaves.', '11.95', '2018-05-13 16:26:08', 2, '2018-05-13 10:26:08', 0, 'Active'),
(135, 18, 'AKBOORI CHICKEN', NULL, 'Cooked with yoghurt and mild spices.', '8.95', '2018-05-13 16:26:31', 2, '2018-05-13 10:26:31', 0, 'Active'),
(136, 18, 'MURGH-E-CHILLI LAHORI', NULL, 'Marinated chicken cooked with fresh garlic, onion, capsicum, green herbs, tandoori spice and yoghurt, dressed with green chillies, coriander and cream. A little hot.', '9.95', '2018-05-13 16:26:48', 2, '2018-05-13 10:26:48', 0, 'Active'),
(137, 18, 'ADA CHICKEN OR LAMB', NULL, 'Tikka with freshly chopped ginger, onion, green peppers and tomatoes.', '8.95', '2018-05-13 16:27:05', 2, '2018-05-13 10:27:05', 0, 'Active'),
(138, 18, 'MURGH ANARKOLI', NULL, 'Marinated off the bone tandoori chicken cooked with coconut, fruit cocktail, pineapple and chef\'s own special spices.', '9.95', '2018-05-13 16:27:20', 2, '2018-05-13 10:27:20', 0, 'Active'),
(139, 18, 'GARLIC CHICKEN', NULL, 'Chicken cooked with chopped garlic, green peppers and tomatoes.', '8.95', '2018-05-13 16:27:37', 2, '2018-05-13 10:27:37', 0, 'Active'),
(140, 18, 'CHICKEN OR LAMB PASSANDA', NULL, 'Cooked with fresh cream, almonds and cashew nuts.', '8.95', '2018-05-13 16:27:52', 2, '2018-05-13 10:27:52', 0, 'Active'),
(141, 18, 'REZALA CHICKEN OR LAMB', NULL, 'Cooked in a spicy aromatic creamy sauce. Mild spice.', '8.95', '2018-05-13 16:28:09', 2, '2018-05-13 10:28:09', 0, 'Active'),
(142, 19, 'SARSOO BAIGAN', NULL, 'Sliced aubergine cooked with crushed mustard. Medium.', '5.95', '2018-05-13 16:28:34', 2, '2018-05-13 10:28:34', 0, 'Active'),
(143, 19, 'MUTTER PANIER', NULL, 'Green peas cooked with homemade cheese.', '6.95', '2018-05-13 16:28:49', 2, '2018-05-13 10:28:49', 0, 'Active'),
(144, 19, 'ALOO NARIYAL', NULL, 'Coconut and potato cooked in a mild creamy sauce.', '5.95', '2018-05-13 16:29:04', 2, '2018-05-13 10:29:04', 0, 'Active'),
(145, 19, 'MUTTER BAIGAN', NULL, 'Chick peas and aubergine cooked in a medium sauce.', '5.95', '2018-05-13 16:29:17', 2, '2018-05-13 10:29:17', 0, 'Active'),
(146, 19, 'SAG PANIER', NULL, 'Spinach cooked with homemade cheese.', '6.95', '2018-05-13 16:29:31', 2, '2018-05-13 10:29:31', 0, 'Active'),
(147, 19, 'ACHARI MIXED VEGETABLE', NULL, 'Cooked in onions, tomatoes, coriander and mixed pickle. Medium.', '5.95', '2018-05-13 16:30:00', 2, '2018-05-13 10:30:00', 0, 'Active'),
(148, 20, 'SAG PANIER', NULL, 'Spinach cooked with homemade cheese.', '4.95', '2018-05-13 16:30:31', 2, '2018-05-13 10:30:31', 0, 'Active'),
(149, 20, 'BOMBAY ALOO', NULL, 'Lightly spiced potatoes.', '3.95', '2018-05-13 16:30:46', 2, '2018-05-13 10:30:46', 0, 'Active'),
(150, 20, 'VEGETABLE BHAJI', NULL, 'Lightly spiced dry mixed vegetables.', '3.95', '2018-05-13 16:31:00', 2, '2018-05-13 10:31:00', 0, 'Active'),
(151, 20, 'SAG ALOO', NULL, 'Lightly spiced spinach and potato.', '3.95', '2018-05-13 16:31:13', 2, '2018-05-13 10:31:13', 0, 'Active'),
(152, 20, 'VEGETABLE CURRY', NULL, 'Mixed vegetables in curry sauce.', '3.95', '2018-05-13 16:31:31', 2, '2018-05-13 10:31:31', 0, 'Active'),
(153, 20, 'SAG DALL', NULL, 'Spinach and lentils cooked with garlic.', '3.95', '2018-05-13 16:31:50', 2, '2018-05-13 10:31:50', 0, 'Active'),
(154, 20, 'BHINDI MASSALA', NULL, 'Spiced okra cooked in yoghurt sauce.', '3.95', '2018-05-13 16:32:15', 2, '2018-05-13 10:32:15', 0, 'Active'),
(155, 20, 'ALOO GOBI', NULL, 'Lightly spiced potatoes and cauliflower.', '3.95', '2018-05-13 16:32:30', 2, '2018-05-13 10:32:30', 0, 'Active'),
(156, 20, 'BHINDI BHAJI', NULL, 'Lightly spiced okra.', '3.95', '2018-05-13 16:32:52', 2, '2018-05-13 10:32:52', 0, 'Active'),
(157, 20, 'TARKA DALL', NULL, 'Spiced lentils.', '3.95', '2018-05-13 16:33:09', 2, '2018-05-13 10:33:09', 0, 'Active'),
(158, 20, 'SAG BHAJI', NULL, 'Lightly spiced spinach with garlic.', '3.95', '2018-05-13 16:33:24', 2, '2018-05-13 10:33:24', 0, 'Active'),
(159, 20, 'MATTAR PANIER', NULL, 'Peas cooked in homemade cheese.', '4.95', '2018-05-13 16:33:37', 2, '2018-05-13 10:33:37', 0, 'Active'),
(160, 20, 'GOBI BHAJI', NULL, 'Lightly spiced cauliflower with garlic.', '3.95', '2018-05-13 16:33:57', 2, '2018-05-13 10:33:57', 0, 'Active'),
(161, 20, 'ALOO CHANNA', NULL, 'Lightly spiced chick peas and potatoes.', '3.95', '2018-05-13 16:34:17', 2, '2018-05-13 10:34:17', 0, 'Active'),
(162, 20, 'MUSHROOM BHAJI', NULL, 'Lightly spiced mushroom.', '3.95', '2018-05-13 16:34:50', 2, '2018-05-13 10:34:50', 0, 'Active'),
(163, 20, 'CUCUMBER RAITHA', NULL, 'Yoghurt with cucumber and herbs.', '2.50', '2018-05-13 16:35:11', 2, '2018-05-13 10:35:11', 0, 'Active'),
(164, 21, 'BOILED RICE', NULL, 'Steamed rice.', '2.15', '2018-05-13 16:35:30', 2, '2018-05-13 10:36:53', 0, 'Active'),
(165, 21, 'LIME JEERA RICE', NULL, '', '2.95', '2018-05-13 16:35:45', 2, '2018-05-13 10:37:04', 0, 'Active'),
(166, 21, 'PILAU RICE', NULL, 'Basmati rice.', '2.50', '2018-05-13 16:36:02', 2, '2018-05-13 10:36:02', 0, 'Active'),
(167, 21, 'SPECIAL FRIED PILAU RICE', NULL, 'Basmati rice fried with egg and mixed vegetables.', '3.95', '2018-05-13 16:36:20', 2, '2018-05-13 10:36:20', 0, 'Active'),
(168, 21, 'PINEAPPLE RICE', NULL, '', '3.15', '2018-05-13 16:36:32', 2, '2018-05-13 10:36:32', 0, 'Active'),
(169, 21, 'LEMON RICE', NULL, '', '2.95', '2018-05-13 16:38:23', 2, '2018-05-13 10:38:23', 0, 'Active'),
(170, 21, 'KEEMA RICE', NULL, '', '3.95', '2018-05-13 16:38:37', 2, '2018-05-13 10:38:37', 0, 'Active'),
(171, 21, 'EGG RICE', NULL, '', '3.15', '2018-05-13 16:38:51', 2, '2018-05-13 10:38:51', 0, 'Active'),
(172, 22, 'NAN', NULL, 'Leavened bread baked in tandoor.', '2.15', '2018-05-13 16:39:15', 2, '2018-05-13 10:39:15', 0, 'Active'),
(173, 22, 'PARATHA', NULL, 'Round shaped fried bread.', '2.15', '2018-05-13 16:39:31', 2, '2018-05-13 10:39:31', 0, 'Active'),
(174, 22, 'GARLIC NAN', NULL, 'Nan stuffed with garlic.', '2.30', '2018-05-13 16:39:49', 2, '2018-05-13 10:39:49', 0, 'Active'),
(175, 22, 'SOBZI PARATHA', NULL, 'Stuffed with vegetables.', '2.95', '2018-05-13 16:40:07', 2, '2018-05-13 10:40:07', 0, 'Active'),
(176, 22, 'KEEMA NAN', NULL, 'Nan stuffed with minced meat.', '2.30', '2018-05-13 16:40:25', 2, '2018-05-13 10:40:25', 0, 'Active'),
(177, 22, 'PURI', NULL, 'Deep fried thin bread.', '1.75', '2018-05-13 16:40:44', 2, '2018-05-13 10:40:44', 0, 'Active'),
(178, 22, 'PESHWARI NAN', NULL, 'Nan stuffed with almonds and nuts. Sweet.', '2.30', '2018-05-13 16:41:07', 2, '2018-05-13 10:41:07', 0, 'Active'),
(179, 22, 'CHAPATTI', NULL, 'Dry thin unleavened bread.', '1.75', '2018-05-13 16:41:25', 2, '2018-05-13 10:41:25', 0, 'Active'),
(180, 23, 'CHIPS', NULL, '', '2.50', '2018-05-13 16:41:44', 2, '2018-05-13 10:41:44', 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ala_carte_category`
--

CREATE TABLE `tbl_ala_carte_category` (
  `product_category_id` int(11) NOT NULL,
  `product_category_name` varchar(255) NOT NULL,
  `product_category_created_by` int(11) NOT NULL,
  `product_category_created_on` datetime NOT NULL,
  `product_category_updated_by` int(11) NOT NULL,
  `product_category_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_category_status` enum('Active','Inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ala_carte_category`
--

INSERT INTO `tbl_ala_carte_category` (`product_category_id`, `product_category_name`, `product_category_created_by`, `product_category_created_on`, `product_category_updated_by`, `product_category_updated_on`, `product_category_status`) VALUES
(1, 'STARTER', 0, '2018-05-13 10:56:18', 0, '2018-05-13 04:56:18', 'Active'),
(2, 'SET MEALS', 0, '2018-05-13 10:56:55', 0, '2018-05-13 04:56:55', 'Active'),
(3, 'TANDOORI DISHES', 0, '2018-05-13 10:57:09', 0, '2018-05-13 04:57:09', 'Active'),
(4, 'DHANSAK DISHES', 0, '2018-05-13 10:57:16', 0, '2018-05-13 04:57:16', 'Active'),
(5, 'SAG DISHES', 0, '2018-05-13 10:57:22', 0, '2018-05-13 04:57:22', 'Active'),
(6, 'JALFREZI DISHES', 0, '2018-05-13 10:57:28', 0, '2018-05-13 04:57:28', 'Active'),
(7, 'BALTI DISHES', 0, '2018-05-13 10:57:59', 0, '2018-05-13 04:57:59', 'Active'),
(8, 'BIRIYANI DISHES', 0, '2018-05-13 10:58:04', 0, '2018-05-13 04:58:04', 'Active'),
(9, 'TANDOORI MASSALA DISHES', 0, '2018-05-13 10:58:10', 0, '2018-05-13 04:58:10', 'Active'),
(10, 'MADRAS AND VINDALOO', 0, '2018-05-13 10:58:16', 0, '2018-05-13 04:58:16', 'Active'),
(11, 'KORMA DISHES', 0, '2018-05-13 10:58:23', 0, '2018-05-13 04:58:23', 'Active'),
(12, 'BHUNA', 0, '2018-05-13 10:58:31', 0, '2018-05-13 04:58:31', 'Active'),
(13, 'ROGAN DISHES', 0, '2018-05-13 10:58:37', 0, '2018-05-13 04:58:37', 'Active'),
(14, 'PATHIA DISHES', 0, '2018-05-13 10:58:42', 0, '2018-05-13 04:58:42', 'Active'),
(15, 'METHI DISHES', 0, '2018-05-13 10:58:47', 0, '2018-05-13 04:58:47', 'Active'),
(16, 'CHEF\'S SPECIALS', 0, '2018-05-13 10:58:52', 0, '2018-05-13 04:58:52', 'Active'),
(17, 'CURRY DISHES', 0, '2018-05-13 10:59:01', 0, '2018-05-13 04:59:01', 'Active'),
(18, 'HOUSE SPECIALS', 0, '2018-05-13 10:59:18', 0, '2018-05-13 04:59:18', 'Active'),
(19, 'VEGETARIAN SPECIAL', 0, '2018-05-13 10:59:25', 0, '2018-05-13 04:59:25', 'Active'),
(20, 'VEGETABLE SIDE DISHES', 0, '2018-05-13 10:59:34', 0, '2018-05-13 04:59:34', 'Active'),
(21, 'RICE', 0, '2018-05-13 10:59:44', 0, '2018-05-13 04:59:44', 'Active'),
(22, 'BREADS', 0, '2018-05-13 10:59:50', 0, '2018-05-13 04:59:50', 'Active'),
(23, 'OTHER SIDE DISHES', 0, '2018-05-13 10:59:56', 0, '2018-05-13 05:20:32', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_link` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_status` enum('Active','Inactive') NOT NULL,
  `banner_created_on` datetime NOT NULL,
  `banner_created_by` int(11) NOT NULL,
  `banner_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `banner_updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`banner_id`, `banner_title`, `banner_link`, `banner_image`, `banner_status`, `banner_created_on`, `banner_created_by`, `banner_updated_on`, `banner_updated_by`) VALUES
(11, 'Hot wings', '', 'Hot-wings.jpg', 'Active', '2019-08-23 06:51:19', 0, '2019-08-23 00:51:19', 0),
(12, 'Yummy Wrap', '', 'Yummy-Wrap.jpg', 'Active', '2019-08-23 06:53:56', 0, '2019-08-23 00:53:56', 0),
(15, 'Tasty Burgers', '', 'Tasty-Burgers.jpg', 'Active', '2019-08-23 06:57:15', 0, '2019-08-23 00:57:15', 0),
(16, 'shareer for family', '', 'shareer-for-family.jpg', 'Active', '2019-08-23 06:58:18', 0, '2019-08-23 00:58:18', 0),
(18, 'fish & chips', '', 'fish-&-chips.jpg', 'Active', '2019-08-23 07:00:25', 0, '2019-08-23 01:00:25', 0),
(19, 'Healthy & fresh food all day', '', 'Healthy-&-fresh-food-all-day.jpg', 'Active', '2019-08-23 07:01:44', 0, '2019-08-23 01:01:44', 0),
(29, 'Special Deals', '', 'Special-Deals.png', 'Active', '2019-08-23 18:35:03', 2, '2019-08-23 12:35:03', 0),
(31, 'Special Deals 2', '', 'Special-Deals-2.png', 'Active', '2019-08-23 18:38:00', 2, '2019-08-23 12:38:00', 0),
(32, 'Special Deals 3', '', 'Special-Deals-3.png', 'Active', '2019-08-23 18:38:35', 2, '2019-08-23 12:38:35', 0),
(33, 'Special Deals 4', '', 'Special-Deals-4.png', 'Active', '2019-08-23 18:44:14', 2, '2019-08-23 12:44:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_subject` varchar(255) NOT NULL,
  `contact_message` text NOT NULL,
  `contact_created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `banner_id` int(11) NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_status` enum('Active','Inactive') NOT NULL,
  `banner_created_on` datetime NOT NULL,
  `banner_created_by` int(11) NOT NULL,
  `banner_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `banner_updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`banner_id`, `banner_title`, `banner_image`, `banner_status`, `banner_created_on`, `banner_created_by`, `banner_updated_on`, `banner_updated_by`) VALUES
(4, 'Chicken and rice', 'Chicken-and-rice.jpg', 'Active', '2019-08-21 16:03:35', 2, '2019-08-21 10:03:35', 0),
(5, 'Smoothies', 'Smoothies.jpg', 'Active', '2019-08-21 16:03:45', 2, '2019-08-21 10:03:45', 0),
(7, 'Quarter pounder', 'Quarter-pounder.jpg', 'Active', '2019-08-23 06:13:36', 0, '2019-08-23 00:13:36', 0),
(8, 'Hot wings', 'Hot-wings.jpg', 'Active', '2019-08-23 06:14:17', 0, '2019-08-23 00:14:17', 0),
(9, 'side salad', 'side-salad.jpg', 'Active', '2019-08-23 06:15:00', 0, '2019-08-23 00:15:00', 0),
(10, 'Chicken Supreme Burger', 'Chicken-Supreme-Burger.png', 'Active', '2019-08-23 06:17:18', 0, '2019-08-23 00:17:18', 0),
(11, 'Biryani', 'Biryani.jpg', 'Active', '2019-08-23 06:19:10', 0, '2019-08-23 00:19:10', 0),
(12, 'Hummus & pitta', 'Hummus-&-pitta.jpg', 'Active', '2019-08-23 06:19:43', 0, '2019-08-23 00:19:43', 0),
(13, 'fish & chips', 'fish-&-chips.jpg', 'Active', '2019-08-23 06:20:04', 0, '2019-08-23 00:20:04', 0),
(14, 'Quarter Chicken', 'Quarter-Chicken.jpeg', 'Active', '2019-08-23 06:20:50', 0, '2019-08-23 00:20:50', 0),
(15, 'Garlic Bread', 'Garlic-Bread.jpeg', 'Active', '2019-08-23 06:21:20', 0, '2019-08-23 00:21:20', 0),
(16, 'Fries', 'Fries.jpg', 'Active', '2019-08-23 06:21:45', 0, '2019-08-23 00:21:45', 0),
(17, 'Mixed Olives', 'Mixed-Olives.jpg', 'Active', '2019-08-23 06:22:28', 0, '2019-08-23 00:22:28', 0),
(18, 'Peri Peri Wrap', 'Peri-Peri-Wrap.jpg', 'Active', '2019-08-23 06:23:07', 0, '2019-08-23 00:23:07', 0),
(19, 'Halloumi Burger', 'Halloumi-Burger.png', 'Active', '2019-08-23 06:23:41', 0, '2019-08-23 00:23:41', 0),
(20, 'Potato Wedges', 'Potato-Wedges.jpg', 'Active', '2019-08-23 06:24:31', 0, '2019-08-23 00:24:31', 0),
(21, 'Mixed Doner', 'Mixed-Doner.jpg', 'Active', '2019-08-23 06:25:42', 0, '2019-08-23 00:25:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) NOT NULL,
  `order_user_id` int(10) NOT NULL,
  `order_name` varchar(50) DEFAULT NULL,
  `order_amount` decimal(10,2) NOT NULL,
  `order_delivery_charge` decimal(10,2) NOT NULL,
  `order_location_id` int(11) NOT NULL,
  `order_phone` varchar(255) NOT NULL,
  `order_total_quantity` int(11) NOT NULL,
  `order_created_on` datetime NOT NULL,
  `order_status` enum('Received','Shipped','Delivered') NOT NULL,
  `order_ship_address` text NOT NULL,
  `order_payment_method` varchar(255) NOT NULL,
  `order_session_id` varchar(255) NOT NULL,
  `order_track_no` varchar(255) NOT NULL,
  `order_notes` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='o=order';

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_user_id`, `order_name`, `order_amount`, `order_delivery_charge`, `order_location_id`, `order_phone`, `order_total_quantity`, `order_created_on`, `order_status`, `order_ship_address`, `order_payment_method`, `order_session_id`, `order_track_no`, `order_notes`) VALUES
(8, 0, 'Anika Chowdhury', '0.00', '0.00', 0, '7957340355', 0, '2019-09-11 00:26:38', 'Received', '71 jarrow road  RM6 5RL', 'Delivery', 'd09hai2oj9vf9jitlfhhn3bop1', '0008908640', 'can I get Dr Pepper drink or 7up');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_details_order_id` int(11) NOT NULL,
  `order_details_product_id` int(11) NOT NULL,
  `order_details_product_quantity` int(11) NOT NULL,
  `order_details_product_price` decimal(10,2) NOT NULL,
  `order_details_product_flag` enum('N','O') NOT NULL,
  `order_details_session_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_details_order_id`, `order_details_product_id`, `order_details_product_quantity`, `order_details_product_price`, `order_details_product_flag`, `order_details_session_id`) VALUES
(1, 1, 22, 2, '12.95', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(2, 1, 23, 2, '10.95', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(3, 1, 20, 1, '8.55', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(4, 1, 19, 1, '7.95', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(5, 1, 18, 1, '7.95', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(6, 1, 16, 2, '11.95', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(7, 1, 16, 2, '11.95', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(8, 1, 15, 2, '9.95', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(9, 1, 14, 2, '9.95', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(10, 1, 3, 1, '3.15', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(11, 2, 4, 1, '4.50', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(12, 2, 14, 3, '9.95', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(13, 2, 15, 4, '9.95', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(14, 2, 19, 3, '7.95', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(15, 2, 17, 2, '6.95', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(16, 2, 20, 3, '8.55', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(17, 3, 22, 2, '12.95', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(18, 3, 23, 2, '10.95', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(19, 3, 16, 2, '11.95', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(20, 3, 15, 2, '9.95', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(21, 3, 14, 2, '9.95', 'N', 'ikm1edlg1iuqdsu3qo4e56bgc3'),
(22, 4, 3, 1, '3.15', 'N', 'hr8ed3ieivc01np3g4lpvnr5q5'),
(23, 4, 4, 1, '4.50', 'N', 'hr8ed3ieivc01np3g4lpvnr5q5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_details` text NOT NULL,
  `product_new_price` decimal(10,2) NOT NULL,
  `product_created_on` datetime NOT NULL,
  `product_created_by` int(10) NOT NULL,
  `product_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_updated_by` int(10) NOT NULL,
  `product_status` enum('Active','Inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_category_id`, `product_title`, `product_image`, `product_details`, `product_new_price`, `product_created_on`, `product_created_by`, `product_updated_on`, `product_updated_by`, `product_status`) VALUES
(82, 16, '2pcs Grilled Chicken  Quarter ( with meal)', NULL, 'with Your Choice of Sauce', '5.99', '2019-08-25 00:27:44', 0, '2019-08-24 18:27:44', 0, 'Active'),
(69, 15, 'MINI CHICKEN BURGER (with meal)', NULL, '', '2.99', '2019-08-24 18:18:53', 0, '2019-08-24 12:18:53', 0, 'Active'),
(70, 15, 'DOUBLE CHEES BURGER', NULL, '', '1.99', '2019-08-24 18:20:26', 0, '2019-08-24 12:20:26', 0, 'Active'),
(71, 15, 'DOUBLE CHEES BURGER (with meal)', NULL, '', '3.29', '2019-08-24 18:21:28', 0, '2019-08-24 12:21:28', 0, 'Active'),
(72, 15, 'DONER BURGER', NULL, '', '2.99', '2019-08-24 18:22:36', 0, '2019-08-24 12:22:36', 0, 'Active'),
(73, 15, 'DONER BURGER (with meal)', NULL, '', '4.49', '2019-08-24 18:23:58', 0, '2019-08-24 12:23:58', 0, 'Active'),
(74, 15, 'DONER WRAP', NULL, '', '3.89', '2019-08-25 00:12:44', 0, '2019-08-24 18:12:44', 0, 'Active'),
(62, 15, '9 HOT WINGS', NULL, '', '2.99', '2019-08-24 18:12:04', 0, '2019-08-24 12:12:04', 0, 'Active'),
(63, 15, '9 HOT WINGS (with meal)', NULL, '', '4.29', '2019-08-24 18:12:48', 0, '2019-08-24 12:12:48', 0, 'Active'),
(64, 15, '6 NUGGETS', NULL, '', '1.99', '2019-08-24 18:13:29', 0, '2019-08-24 12:13:29', 0, 'Active'),
(65, 15, '6 NUGGETS (with meal)', NULL, '', '3.29', '2019-08-24 18:14:08', 0, '2019-08-24 12:14:08', 0, 'Active'),
(66, 15, 'MINI BEEF BURGER', NULL, '', '0.99', '2019-08-24 18:15:18', 0, '2019-08-24 12:15:18', 0, 'Active'),
(67, 15, 'MINI BEEF BURGER  (with meal)', NULL, '', '2.49', '2019-08-24 18:16:03', 0, '2019-08-24 12:16:03', 0, 'Active'),
(68, 15, 'MINI CHICKEN BURGER', NULL, '', '1.79', '2019-08-24 18:18:01', 0, '2019-08-24 12:18:01', 0, 'Active'),
(44, 13, 'COMBO 2', NULL, 'Any burger, Any regular side, 5 hot wings/ 3 peri peri wings, Can of drink', '7.99', '2019-08-24 16:49:34', 0, '2019-08-24 10:49:34', 0, 'Active'),
(45, 13, 'COMBO 3', NULL, 'Any 2 burgers, 2 regular side, 10 hot wings/5 peri peri wings, 2 can of drinks', '14.99', '2019-08-24 16:52:23', 0, '2019-08-24 10:52:23', 0, 'Active'),
(46, 13, 'COMBO 4', NULL, 'Full grilled chicken, 2 regular side, 10 hot wings/6 peri peri wings, A bottle of drink', '15.99', '2019-08-24 16:54:08', 0, '2019-08-24 10:54:53', 0, 'Active'),
(47, 13, 'COMBO 5', NULL, 'Any 2 burgers, 3 regular side, 15 hot wings/10 peri peri wings, Full grilled chicken, A bottle of drink', '34.99', '2019-08-24 16:59:32', 0, '2019-08-24 10:59:32', 0, 'Active'),
(48, 14, 'Amazing Chicken Burger', NULL, 'Aromatic grilled chicken fillet with secret ingredients’, garlic mayo, cheese, lettuce, tomato, onion, sweet chillsauce,  in a toasted bun', '3.49', '2019-08-24 17:29:17', 0, '2019-08-24 11:29:17', 0, 'Active'),
(49, 14, 'Amazing Chicken Burger (with meal)', NULL, '', '5.00', '2019-08-24 17:32:44', 0, '2019-08-24 11:32:44', 0, 'Active'),
(50, 14, 'Chicken Supreme', NULL, 'Handmade breadedfried chicken filled with secret ingredients’, garlic mayo, cheese, lettuce, tomato, onion, sweetchilisauce in a toasted bun', '3.49', '2019-08-24 17:36:17', 0, '2019-08-24 11:36:17', 0, 'Active'),
(51, 14, 'Chicken Supreme (with meal)', NULL, '', '5.00', '2019-08-24 17:37:41', 0, '2019-08-24 11:37:41', 0, 'Active'),
(52, 14, 'Big Ben Burger', NULL, 'grilled beef patty with secret ingredients’, garlic mayo, cheese, lettuce, gherkins ,  tomato, onion, hot chili, egg, Turkey bacon in a toasted bun', '4.00', '2019-08-24 17:39:32', 0, '2019-08-24 11:39:32', 0, 'Active'),
(53, 14, 'Big Ben Burger (with meal)', NULL, '', '5.50', '2019-08-24 17:40:27', 0, '2019-08-24 11:40:27', 0, 'Active'),
(54, 14, 'Fillet O\' Fish', NULL, 'Fried braded fish patty with tartare sauce, ketchup, cheese  and lettuce in a bun', '3.49', '2019-08-24 17:43:17', 0, '2019-08-24 11:43:17', 0, 'Active'),
(55, 14, 'Fillet O\' Fish (with meal)', NULL, '', '5.00', '2019-08-24 17:44:25', 0, '2019-08-24 11:44:25', 0, 'Active'),
(56, 14, 'Hallumi Burger', NULL, 'grilled hallumi, roasted pepper, chilli mayo, mango chutney, lettuce, tomato, onion', '3.49', '2019-08-24 17:45:28', 0, '2019-08-24 11:45:28', 0, 'Active'),
(57, 14, 'Hallumi Burger (with meal)', NULL, '', '5.00', '2019-08-24 17:46:19', 0, '2019-08-24 11:46:19', 0, 'Active'),
(58, 15, '3 HOT WINGS', NULL, '', '0.99', '2019-08-24 17:53:52', 0, '2019-08-24 11:53:52', 0, 'Active'),
(59, 15, '3 HOT WINGS (with meal)', NULL, '', '1.99', '2019-08-24 18:08:42', 0, '2019-08-24 12:08:42', 0, 'Active'),
(60, 15, '6 HOT WINGS', NULL, '', '1.99', '2019-08-24 18:10:11', 0, '2019-08-24 12:10:11', 0, 'Active'),
(61, 15, '6 HOT WINGS (with meal)', NULL, '', '3.29', '2019-08-24 18:11:14', 0, '2019-08-24 12:11:14', 0, 'Active'),
(35, 13, 'COMBO 1', NULL, '1/4 Peri Peri chicken, Any regular side, 4 Hot wings, Can of drink', '6.99', '2018-05-09 23:08:53', 2, '2019-08-24 10:47:39', 0, 'Active'),
(83, 16, '4pcs Grilled Chicken Quarter', NULL, 'with Your Choice of Sauce', '6.99', '2019-08-25 00:28:48', 0, '2019-08-24 18:28:48', 0, 'Active'),
(84, 16, '4pcs Grilled Chicken Quarter (with meal)', NULL, 'with Your Choice of Sauce', '8.49', '2019-08-25 00:29:40', 0, '2019-08-24 18:29:40', 0, 'Active'),
(85, 16, 'Tender Chicken Stripes', NULL, 'with Your Choice of Sauce (3 Pieces)', '2.49', '2019-08-25 00:31:02', 0, '2019-08-24 18:31:02', 0, 'Active'),
(75, 15, 'DONER WRAP (with meal)', NULL, '', '4.99', '2019-08-25 00:13:44', 0, '2019-08-24 18:13:44', 0, 'Active'),
(76, 15, 'DONNER IN PITTA', NULL, '', '3.89', '2019-08-25 00:15:01', 0, '2019-08-24 18:15:01', 0, 'Active'),
(77, 15, 'DONNER IN PITTA (with meal)', NULL, '', '4.99', '2019-08-25 00:15:35', 0, '2019-08-24 18:15:35', 0, 'Active'),
(78, 15, 'FRIES  (small)', NULL, '', '1.00', '2019-08-25 00:16:47', 0, '2019-08-24 18:16:47', 0, 'Active'),
(79, 16, 'Quartered Grilled Chicken', NULL, 'with Your Choice of Sauce', '2.49', '2019-08-25 00:19:41', 0, '2019-08-24 18:22:00', 0, 'Active'),
(80, 16, 'Quartered Grilled Chicken (with meal)', NULL, 'with Your Choice of Sauce', '3.99', '2019-08-25 00:21:12', 0, '2019-08-24 18:21:12', 0, 'Active'),
(81, 16, '2pcs Grilled Chicken  Quarter', NULL, 'with Your Choice of Sauce', '2.99', '2019-08-25 00:26:43', 0, '2019-08-24 18:26:43', 0, 'Active'),
(86, 16, 'Tender Chicken Stripes (with meal)', NULL, 'with Your Choice of Sauce (3 Pieces)', '3.99', '2019-08-25 00:31:47', 0, '2019-08-24 18:31:47', 0, 'Active'),
(87, 16, 'Tender Chicken Stripes ', NULL, 'with Your Choice of Sauce (6 Pieces)', '3.99', '2019-08-25 00:33:22', 0, '2019-08-24 18:33:22', 0, 'Active'),
(88, 16, 'Tender Chicken Stripes (with meal)', NULL, 'with Your Choice of Sauce (6 Pieces)', '4.99', '2019-08-25 00:34:18', 0, '2019-08-24 18:34:18', 0, 'Active'),
(89, 16, 'Grilled Chicken Wings', NULL, 'with  Your Choice of Sauce (3 Pieces)', '2.49', '2019-08-25 00:35:57', 0, '2019-08-24 18:35:57', 0, 'Active'),
(90, 16, 'Grilled Chicken Wings (with meal)', NULL, 'with  Your Choice of Sauce (3 Pieces)', '3.99', '2019-08-25 00:37:12', 0, '2019-08-24 18:37:12', 0, 'Active'),
(91, 16, 'Grilled Chicken Wings', NULL, 'with Your Choice of Sauce (6 Pieces)', '3.99', '2019-08-25 00:38:13', 0, '2019-08-24 18:38:13', 0, 'Active'),
(92, 16, 'Grilled Chicken Wings (with meal)', NULL, 'with Your Choice of Sauce (6 Pieces)', '4.99', '2019-08-25 00:39:08', 0, '2019-08-24 18:39:08', 0, 'Active'),
(93, 17, 'Stripes Platter', NULL, '12 Grilled Stripes, 2 Sides & 3 Can Drinks', '14.00', '2019-08-25 00:42:10', 0, '2019-08-24 18:42:10', 0, 'Active'),
(94, 17, 'Royal Platter', NULL, '4pcs Grilled Chicken Quartered, 9 Grilled Wings, 2 Sides & 1.5ltr Bottle Drinks', '19.99', '2019-08-25 00:43:05', 0, '2019-08-24 18:43:05', 0, 'Active'),
(95, 17, 'Wings Platter', NULL, '15 Grilled Wings, 2 Sides & 2 Can Drinks', '14.99', '2019-08-25 00:44:10', 0, '2019-08-24 18:44:10', 0, 'Active'),
(96, 17, 'Mixed Platter', NULL, '2 Grilled Burger, 2pcs Grilled Chicken, 3 Grilled Wings 2 Sides & 2 Can Drinks', '16.00', '2019-08-25 00:45:14', 0, '2019-08-24 18:45:14', 0, 'Active'),
(97, 17, 'Family Platter', NULL, '8pcs Grilled Chicken Quartered, 10 Grilled Wings 3 Sides & 1.5ltr Bottle Soft Drink', '29.99', '2019-08-25 00:46:08', 0, '2019-08-24 18:46:08', 0, 'Active'),
(98, 19, 'Hummus with Toasted Pitta', NULL, '', '1.49', '2019-08-26 18:08:45', 0, '2019-08-26 12:08:45', 0, 'Active'),
(99, 19, 'Garlic Bread (2 Slices) ', NULL, '', '1.49', '2019-08-26 18:12:23', 0, '2019-08-26 12:12:23', 0, 'Active'),
(100, 19, 'Mixed Olives ', NULL, '', '1.49', '2019-08-26 18:13:01', 0, '2019-08-26 12:13:01', 0, 'Active'),
(101, 18, 'HALLOUMI BURGER', NULL, '', '2.99', '2019-08-26 18:18:30', 0, '2019-08-26 12:18:30', 0, 'Active'),
(102, 18, 'HALLOUMI BURGER (WITH MEAL)', NULL, '', '4.49', '2019-08-26 18:19:11', 0, '2019-08-26 12:19:11', 0, 'Active'),
(103, 18, 'HALLOUMI AUBERGINE WRAP', NULL, '', '2.99', '2019-08-26 18:20:30', 0, '2019-08-26 12:20:30', 0, 'Active'),
(104, 18, 'HALLOUMI AUBERGINE WRAP (WITH MEAL)', NULL, '', '4.49', '2019-08-26 18:21:22', 0, '2019-08-26 12:21:22', 0, 'Active'),
(105, 18, 'SIZZLING VEGE. WRAP', NULL, '', '2.49', '2019-08-26 18:22:08', 0, '2019-08-26 12:22:08', 0, 'Active'),
(106, 18, 'SIZZLING VEGE. WRAP (WITH MEAL)', NULL, '', '3.99', '2019-08-26 18:22:56', 0, '2019-08-26 12:22:56', 0, 'Active'),
(107, 18, 'EGG WRAP', NULL, '', '2.49', '2019-08-26 18:23:36', 0, '2019-08-26 12:23:36', 0, 'Active'),
(108, 18, 'EGG WRAP (WITH MEAL)', NULL, '', '3.99', '2019-08-26 18:24:13', 0, '2019-08-26 12:24:13', 0, 'Active'),
(109, 20, 'Sizzling Special Salad', NULL, 'Mixed Leaves, Grilled Chicken, Avocado, Tomato Cucumber, Sweetcorn, Haloumi & House Dressing', '6.99', '2019-08-26 18:25:50', 0, '2019-08-26 12:25:50', 0, 'Active'),
(110, 20, 'Traditional Fish & Chips', NULL, 'Chunky Battered Fish Fillet with Tartare Sauce &  lemon', '5.99', '2019-08-26 18:26:32', 0, '2019-08-26 12:29:45', 0, 'Active'),
(111, 20, 'Vege Fish & Chips', NULL, 'Chunky Battered Marinated Halloumi with Tartare Sauce & Mushy Peas', '5.99', '2019-08-26 18:27:18', 0, '2019-08-26 12:30:37', 0, 'Active'),
(112, 20, 'Special Biryani ( chicken/ lamb)', NULL, 'Aromatic Basmati Rice Cooked With Chicken or Lamb & Blended with Central Asian Secret Herbs', '4.99', '2019-08-26 18:28:20', 0, '2019-08-26 12:28:20', 0, 'Active'),
(113, 21, 'Peri Peri Chicken', NULL, '', '3.49', '2019-08-26 18:31:55', 0, '2019-08-26 12:31:55', 0, 'Active'),
(114, 21, 'Peri Peri Chicken  (WITH MEAL)', NULL, '', '4.49', '2019-08-26 18:32:48', 0, '2019-08-26 12:32:48', 0, 'Active'),
(115, 21, 'Chicken Tikka Burger', NULL, '', '3.49', '2019-08-26 18:33:44', 0, '2019-08-26 12:33:44', 0, 'Active'),
(116, 21, 'Chicken Tikka Burger (WITH MEAL)', NULL, '', '4.49', '2019-08-26 18:34:46', 0, '2019-08-26 12:34:46', 0, 'Active'),
(117, 21, 'Lamb Gourmet ', NULL, '', '3.99', '2019-08-26 18:35:26', 0, '2019-08-26 12:35:26', 0, 'Active'),
(118, 21, 'Lamb Gourmet  (WITH MEAL)', NULL, '', '4.99', '2019-08-26 18:36:10', 0, '2019-08-26 12:36:10', 0, 'Active'),
(119, 21, 'Chicken Gourmet', NULL, '', '3.99', '2019-08-26 18:36:54', 0, '2019-08-26 12:36:54', 0, 'Active'),
(120, 21, 'Chicken Gourmet (WITH MEAL)', NULL, '', '4.99', '2019-08-26 18:37:38', 0, '2019-08-26 12:37:38', 0, 'Active'),
(121, 21, 'Quater Pounder', NULL, '', '3.49', '2019-08-26 18:38:20', 0, '2019-08-26 12:38:20', 0, 'Active'),
(122, 21, 'Quater Pounder (WITH MEAL)', NULL, '', '4.49', '2019-08-26 18:39:00', 0, '2019-08-26 12:39:00', 0, 'Active'),
(123, 21, 'Vegetable', NULL, '', '3.49', '2019-08-26 18:39:40', 0, '2019-08-26 12:39:40', 0, 'Active'),
(124, 21, 'Vegetable (WITH MEAL)', NULL, '', '4.49', '2019-08-26 18:40:24', 0, '2019-08-26 12:40:24', 0, 'Active'),
(125, 22, 'Peri Peri FrieS (R)', NULL, '', '1.29', '2019-08-26 18:47:13', 0, '2019-08-26 12:47:13', 0, 'Active'),
(126, 22, 'Peri Peri FrieS (L)', NULL, '', '2.20', '2019-08-26 18:47:59', 0, '2019-08-26 12:47:59', 0, 'Active'),
(127, 22, 'Mashed Potatoes (R)', NULL, '', '1.49', '2019-08-26 18:49:08', 0, '2019-08-26 12:49:08', 0, 'Active'),
(128, 22, 'Mashed Potatoes (L)', NULL, '', '2.50', '2019-08-26 18:49:46', 0, '2019-08-26 12:49:46', 0, 'Active'),
(129, 22, 'Potato Wedges (R)', NULL, '', '1.60', '2019-08-26 18:50:23', 0, '2019-08-26 12:50:23', 0, 'Active'),
(130, 22, 'Potato Wedges (L)', NULL, '', '2.20', '2019-08-26 18:50:50', 0, '2019-08-26 12:50:50', 0, 'Active'),
(131, 22, 'Coleslaw (R)', NULL, '', '1.00', '2019-08-26 18:51:38', 0, '2019-08-26 12:51:38', 0, 'Active'),
(132, 22, 'Coleslaw (L)', NULL, '', '2.50', '2019-08-26 18:52:27', 0, '2019-08-26 12:52:27', 0, 'Active'),
(133, 22, 'Corn On The Cob (R)', NULL, '', '1.30', '2019-08-26 18:53:28', 0, '2019-08-26 12:53:28', 0, 'Active'),
(134, 22, 'Corn On The Cob (L)', NULL, '', '2.50', '2019-08-26 18:54:20', 0, '2019-08-26 12:54:20', 0, 'Active'),
(135, 22, 'Mixed Salad (R)', NULL, '', '1.99', '2019-08-26 18:54:55', 0, '2019-08-26 12:54:55', 0, 'Active'),
(136, 22, 'Mixed Salad (L)', NULL, '', '3.00', '2019-08-26 18:55:32', 0, '2019-08-26 12:55:32', 0, 'Active'),
(137, 22, 'Fries (R)', NULL, '', '1.00', '2019-08-26 19:04:21', 0, '2019-08-26 13:04:21', 0, 'Active'),
(138, 22, 'Fries (L)', NULL, '', '1.99', '2019-08-26 19:04:45', 0, '2019-08-26 13:04:45', 0, 'Active'),
(139, 22, 'Peri Rice (R)', NULL, '', '1.99', '2019-08-26 19:05:24', 0, '2019-08-26 13:05:24', 0, 'Active'),
(140, 22, 'Peri Rice (L)', NULL, '', '3.49', '2019-08-26 19:05:53', 0, '2019-08-26 13:05:53', 0, 'Active'),
(141, 23, 'Cheese Cake', NULL, '', '3.50', '2019-08-26 19:06:56', 0, '2019-08-26 13:06:56', 0, 'Active'),
(142, 23, 'Chocolate Fudge Cake ', NULL, '', '3.50', '2019-08-26 19:07:34', 0, '2019-08-26 13:07:34', 0, 'Active'),
(143, 23, 'Ice Cream/Sorbet  Scope', NULL, '', '1.50', '2019-08-26 19:08:09', 0, '2019-08-26 13:08:09', 0, 'Active'),
(144, 24, 'Can 330ml', NULL, 'Coke/ Diet Coke/Pepsi/merinda Orange/ 7up', '0.75', '2019-08-26 19:09:10', 0, '2019-08-26 13:09:10', 0, 'Active'),
(145, 24, 'Bottle 1.5 ltr', NULL, 'Coke/ Diet Coke/Pepsi/merinda Orange/ 7up', '1.99', '2019-08-26 19:09:57', 0, '2019-08-26 13:09:57', 0, 'Active'),
(146, 24, 'Tea', NULL, '', '1.00', '2019-08-26 19:10:31', 0, '2019-08-26 13:10:31', 0, 'Active'),
(147, 24, 'Coffee', NULL, '', '1.69', '2019-08-26 19:10:55', 0, '2019-08-26 13:10:55', 0, 'Active'),
(148, 24, 'Fresh Smoothies', NULL, '', '1.99', '2019-08-26 19:11:21', 0, '2019-08-26 13:11:21', 0, 'Active'),
(149, 24, 'Water Bottle 500ml', NULL, '', '0.69', '2019-08-26 19:11:55', 0, '2019-08-26 13:11:55', 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

CREATE TABLE `tbl_product_category` (
  `product_category_id` int(11) NOT NULL,
  `product_category_name` varchar(255) NOT NULL,
  `product_category_created_by` int(11) NOT NULL,
  `product_category_created_on` datetime NOT NULL,
  `product_category_updated_by` int(11) NOT NULL,
  `product_category_updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_category_status` enum('Active','Inactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`product_category_id`, `product_category_name`, `product_category_created_by`, `product_category_created_on`, `product_category_updated_by`, `product_category_updated_on`, `product_category_status`) VALUES
(14, 'NEW EDITIONS', 0, '2019-08-24 14:48:17', 0, '2019-08-24 08:48:17', 'Active'),
(15, 'SAVER MENU', 0, '2019-08-24 14:48:47', 0, '2019-08-24 08:48:47', 'Active'),
(13, 'MEAL DEAL', 0, '2019-08-24 14:42:19', 0, '2019-08-24 08:42:19', 'Active'),
(16, 'FROM THE GRILL', 0, '2019-08-24 14:49:16', 0, '2019-08-24 08:49:16', 'Active'),
(17, 'SHARERS', 0, '2019-08-24 14:49:47', 0, '2019-08-24 08:49:47', 'Active'),
(18, 'VEGETARIAN', 0, '2019-08-24 14:50:14', 0, '2019-08-24 08:50:15', 'Active'),
(19, 'APPETIZERS', 0, '2019-08-24 14:50:38', 0, '2019-08-24 08:50:38', 'Active'),
(20, 'SIZZLING SPECIALS', 0, '2019-08-24 14:50:58', 0, '2019-08-24 08:50:58', 'Active'),
(21, 'BURGER/WRAP/PITTA', 0, '2019-08-24 14:51:54', 0, '2019-08-24 08:51:54', 'Active'),
(22, 'SIDES', 0, '2019-08-24 14:52:11', 0, '2019-08-24 08:52:11', 'Active'),
(23, 'DESSERTS', 0, '2019-08-24 14:52:51', 0, '2019-08-24 08:52:51', 'Active'),
(24, 'DRINKS', 0, '2019-08-24 14:52:58', 0, '2019-08-24 08:52:58', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `review_email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `review_text` text CHARACTER SET latin1 NOT NULL,
  `review_status` enum('Active','Inactive') CHARACTER SET latin1 NOT NULL,
  `review_created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_name`, `review_email`, `review_text`, `review_status`, `review_created_on`) VALUES
(3, 'Móniicay Diiogo', '', 'best grilled chicken better than nandos and best chicken gourmet burger fantastic service.', 'Active', '2019-08-23 08:48:57'),
(4, 'Oliwia Kolejnik', '', 'Great ! It was super delicious ???? we ordered whole grilled chicken ????\r\n\r\nWorth the price!', 'Active', '2019-08-23 08:49:51'),
(5, 'Janine Headley', '', 'Food, staff, take away, delivery, service, restaurant all top quality 10 out of 10. I would recommend it to anyone! Very pleased', 'Active', '2019-08-23 08:50:58'),
(6, 'Gibbi Dukureh', '', 'Best chicken burger and hot wings', 'Active', '2019-08-23 08:51:37'),
(7, 'Mim Thakurain', '', 'Food is simply yummy..... especially its chips and peri peri chicken burger.....nice atmosphere as well...highly recommended\r\nGreat food', 'Active', '2019-08-23 08:52:15'),
(8, 'Sundas Ahmed', '', 'excellent food... Lamb gourmet burget too good!!', 'Active', '2019-08-23 08:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_temp_order`
--

CREATE TABLE `tbl_temp_order` (
  `temp_order_id` int(11) NOT NULL,
  `temp_order_product_id` int(11) NOT NULL,
  `temp_order_product_qty` int(11) NOT NULL,
  `temp_order_product_price` decimal(10,2) NOT NULL,
  `temp_order_session_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_temp_order`
--

INSERT INTO `tbl_temp_order` (`temp_order_id`, `temp_order_product_id`, `temp_order_product_qty`, `temp_order_product_price`, `temp_order_session_id`) VALUES
(24, 28, 4, '5.95', 'hur2i36olqr6sdgot2gqd1kgh2'),
(31, 16, 1, '5.95', 'dkfr505rj83jeo04b9d0jhtt83'),
(29, 4, 1, '5.95', 'dkfr505rj83jeo04b9d0jhtt83'),
(30, 16, 1, '5.95', 'dkfr505rj83jeo04b9d0jhtt83'),
(97, 48, 1, '3.49', 'qeeh071kt5mnffq63a70fba7b1'),
(49, 67, 1, '29.99', 'q10ti2duke7i36dgkfl84k6o46'),
(37, 14, 1, '9.95', 'hr8ed3ieivc01np3g4lpvnr5q5'),
(36, 14, 1, '9.95', 'hr8ed3ieivc01np3g4lpvnr5q5'),
(38, 15, 1, '9.95', 'hr8ed3ieivc01np3g4lpvnr5q5'),
(50, 67, 1, '29.99', 'i5ghsd7uqu35928r9oe4f22de6'),
(51, 64, 1, '29.99', 'tn0bj9q9e2q49t0q1lem6svjc5'),
(52, 65, 1, '29.99', '63ojkacl0pvkfuiortmugu5dq5'),
(53, 65, 1, '3.29', '3lddkm4mjr4snec4kv54eeso45'),
(54, 67, 1, '2.49', 'h43bmpfai6h0m8tj9qu90770p1'),
(55, 65, 1, '3.29', '257bknif9pdtvji7jdt1vdj4n7'),
(56, 67, 1, '2.49', 'n5au3glft1ps2eho6j9d8nbe05'),
(66, 52, 1, '4.00', 'of3rc1ia0m5l74ln39f5oebu40'),
(63, 149, 2, '0.69', '9m4rv7um5qbof6777ong17v936'),
(64, 148, 2, '1.99', '9m4rv7um5qbof6777ong17v936'),
(65, 52, 1, '4.00', 'itc7e5udfhspq0psoo9tq7kf06'),
(62, 110, 2, '5.99', '9m4rv7um5qbof6777ong17v936'),
(68, 51, 1, '5.00', 'e6u2vuu1r1k2cuoe5vn0vc4gb1'),
(69, 48, 1, '3.49', '68enujnipog77rs0fcqfm9i353'),
(70, 49, 1, '5.00', '4k0em52sqvce5sugtl8hoqp4t2'),
(71, 48, 1, '3.49', 'th6bi87dfo3camj15u6rnstcp1'),
(72, 49, 1, '5.00', 'th6bi87dfo3camj15u6rnstcp1'),
(73, 49, 1, '5.00', 'th6bi87dfo3camj15u6rnstcp1'),
(78, 58, 1, '0.99', 'btdsb91c73tniu812jostiklq1'),
(79, 59, 1, '1.99', 'btdsb91c73tniu812jostiklq1'),
(80, 59, 1, '1.99', 'btdsb91c73tniu812jostiklq1'),
(81, 94, 1, '19.99', '5gc260j53t4jrdf0fq6ihd9dt5'),
(84, 56, 1, '3.49', 'ha3ddtkvbmmqtn77dlr84rf816'),
(85, 58, 1, '0.99', 'ha3ddtkvbmmqtn77dlr84rf816'),
(86, 53, 1, '5.50', '98s7attf1lhpqevir5n25mdhl6'),
(87, 53, 1, '5.50', '7t27p4cp4cumrt2v0188frcbd5'),
(90, 51, 2, '5.00', 'k4p7aqnvu42blqmqkaaq1bkje4'),
(91, 51, 1, '5.00', 'b2s2hr09j0deqq6lt65fiad987'),
(96, 76, 1, '3.89', 'qeeh071kt5mnffq63a70fba7b1'),
(98, 48, 1, '3.49', 'qeeh071kt5mnffq63a70fba7b1'),
(99, 48, 1, '3.49', 'qeeh071kt5mnffq63a70fba7b1'),
(100, 48, 1, '3.49', 'qeeh071kt5mnffq63a70fba7b1'),
(101, 48, 1, '3.49', 'qeeh071kt5mnffq63a70fba7b1'),
(108, 46, 1, '15.99', '4ediqeupn4r5tqdvrlekc11it0'),
(109, 49, 1, '5.00', 'f6bfgbsgq1ohqhqlqcr2tc8h43'),
(104, 95, 1, '14.99', '9ifdcgvu381q0hdghntggah440'),
(107, 46, 1, '15.99', '8otl2fepk9rkcnga6nncdoicg4'),
(110, 122, 1, '4.49', 'peogs39vp80g3ld2kpsuconpk5'),
(111, 122, 1, '4.49', 'e8vgnhd0ppqsh4quo5g3nmros7'),
(112, 122, 1, '4.49', 'h23utbqcs5pv5bneb2r9on22p2'),
(113, 122, 2, '4.49', '1p9l2hvt022sjit1qd6turnc94'),
(114, 122, 1, '4.49', 'd8hp7nh916ktr9vb0eq8m12gv1'),
(115, 122, 2, '4.49', '8253rj2o6r5vkftlci90rq0d73'),
(116, 122, 1, '4.49', 'ha3fvsh1vnr127qhahhq7m2as5'),
(117, 122, 1, '4.49', 'r1cmtopeu02mecg1j0fl49cc90'),
(118, 122, 1, '4.49', '3a1f2hj30a4m7fqsdotm34svb5'),
(119, 122, 1, '4.49', '3as2cununiqhjgoavva7kfui15'),
(120, 122, 1, '4.49', 'bbro4di4spcngvsb60i2olphf6'),
(121, 122, 1, '4.49', '6qkvvvbv5fskc2ns1pjcjf9qf6'),
(122, 122, 1, '4.49', 'ms8cup45c2bqiihut7jbd70kc2'),
(123, 122, 1, '4.49', 'ppva7junhhcroatca4n2us72c6'),
(124, 122, 1, '4.49', '5ohqe0fmqfqhii718m9ck67471'),
(125, 53, 1, '5.50', '34gdsj60s11dg1locta5pf1k06'),
(126, 49, 1, '5.00', 'loj72iop7i641ualvu2l7qlt80'),
(127, 71, 1, '3.29', 'fof25bnvuh965s9nphpjojrd45'),
(128, 51, 1, '5.00', '94ccq9q4ob7mdb7av07sk14s57'),
(129, 71, 2, '3.29', '994ooshg2l13qmsqgibl5lmt15'),
(130, 71, 1, '3.29', 'kfiddd4b44hof8o9h55tl2m4u4'),
(131, 51, 1, '5.00', '6lh1nf15uueg0s6r2rjrv02420'),
(132, 149, 1, '0.69', 'jug1tnklj998pot153tck6acq7'),
(133, 148, 1, '1.99', '0dh1mu93p6f1an1vncbusa1bm6'),
(134, 147, 1, '1.69', 'ak4d2l9eb9f9okskv11uph5r33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_password_text` varchar(255) NOT NULL,
  `user_address` text NOT NULL,
  `user_created_on` datetime NOT NULL,
  `user_status` enum('Active','Inactive') NOT NULL,
  `user_last_login` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_mobile`, `user_password`, `user_password_text`, `user_address`, `user_created_on`, `user_status`, `user_last_login`) VALUES
(1, 'Zian Kabir', 'me@nazrulkabir.com', '01671121200', '827ccb0eea8a706c4#sizzling#c34a16891f84e7b', '12345', 'Shahjadpur, Gulshan  ', '2019-08-19 14:10:23', 'Active', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_ala_carte`
--
ALTER TABLE `tbl_ala_carte`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_ala_carte_category`
--
ALTER TABLE `tbl_ala_carte_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_temp_order`
--
ALTER TABLE `tbl_temp_order`
  ADD PRIMARY KEY (`temp_order_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_ala_carte`
--
ALTER TABLE `tbl_ala_carte`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `tbl_ala_carte_category`
--
ALTER TABLE `tbl_ala_carte_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_temp_order`
--
ALTER TABLE `tbl_temp_order`
  MODIFY `temp_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
