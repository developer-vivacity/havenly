-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2013 at 11:57 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `design`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `privileges` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `designerid` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `privileges`, `password`, `username`, `designerid`) VALUES
(8, 'lee', 'global', 'password', 'lee', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `color_code`
--

CREATE TABLE IF NOT EXISTS `color_code` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `color_code` varchar(100) DEFAULT NULL,
  `color_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `color_code`
--

INSERT INTO `color_code` (`id`, `color_code`, `color_id`) VALUES
(1, 'rgb(188,196,188);', 1),
(2, 'rgb(255,243,196);', 2),
(5, 'rgb(99, 121, 134);', 3),
(6, 'rgb(255, 186, 180);', 4),
(7, 'rgb(204, 199, 185);', 5),
(8, 'rgb(241, 242, 235);', 6),
(9, 'rgb(197, 222, 204);', 7),
(10, 'rgb(190, 210, 213);', 8),
(11, '#FF0055;', 9),
(12, '#006FFF;', 10),
(13, '#00FFF7;', 11),
(14, '#00FF5E;', 12),
(15, '#FFD500;', 13),
(16, '#FF1100;', 14);

-- --------------------------------------------------------

--
-- Table structure for table `concept_board`
--

CREATE TABLE IF NOT EXISTS `concept_board` (
  `concept_id` int(10) NOT NULL AUTO_INCREMENT,
  `room_id` int(10) NOT NULL,
  `filename` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT '1',
  PRIMARY KEY (`concept_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

--
-- Dumping data for table `concept_board`
--

INSERT INTO `concept_board` (`concept_id`, `room_id`, `filename`, `status`) VALUES
(30, 157, 'https://s3.amazonaws.com/easableimages/197836413.jpg', '0'),
(31, 157, 'https://s3.amazonaws.com/easableimages/579351950.jpg', '0'),
(32, 157, 'https://s3.amazonaws.com/easableimages/593296983.jpg', '1'),
(33, 178, 'http://s3.amazonaws.com/easableimages/876777043.jpg', '1'),
(34, 178, 'http://s3.amazonaws.com/easableimages/937638083.jpg', '1'),
(35, 179, 'http://s3.amazonaws.com/easableimages/212986901.jpg', '1'),
(36, 179, 'http://s3.amazonaws.com/easableimages/773509982.jpg', '1'),
(37, 182, 'http://s3.amazonaws.com/easableimages/726761629.jpg', '0'),
(38, 182, 'http://s3.amazonaws.com/easableimages/990958074.jpg', '1'),
(39, 183, 'http://s3.amazonaws.com/easableimages/111309285.jpg', '1'),
(40, 183, 'http://s3.amazonaws.com/easableimages/171231594.jpg', '0'),
(41, 183, 'http://s3.amazonaws.com/easableimages/791062408.jpg', '0'),
(42, 183, 'http://s3.amazonaws.com/easableimages/625756293.jpg', '0'),
(43, 183, 'http://s3.amazonaws.com/easableimages/580223781.jpg', '1'),
(44, 183, 'http://s3.amazonaws.com/easableimages/761525359.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `concept_board_comments`
--

CREATE TABLE IF NOT EXISTS `concept_board_comments` (
  `room_id` int(10) NOT NULL,
  `concept_id` int(10) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `concept_board_comments`
--

INSERT INTO `concept_board_comments` (`room_id`, `concept_id`, `comments`, `status`) VALUES
(157, 30, ' I like the color scheme.', '');

-- --------------------------------------------------------

--
-- Table structure for table `concept_products`
--

CREATE TABLE IF NOT EXISTS `concept_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `filename` varchar(200) NOT NULL,
  `price` varchar(50) NOT NULL,
  `comments` text,
  `category` varchar(100) NOT NULL,
  `concept_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `concept_products`
--

INSERT INTO `concept_products` (`id`, `product_id`, `filename`, `price`, `comments`, `category`, `concept_id`) VALUES
(18, NULL, 'http://ab.weimgs.com/weimgs/ab/images/wcm/products/201335/0227/img56o.jpg', '699', 'Yes yes yes.', 'Sofa', 37),
(26, NULL, 'http://ab.weimgs.com/weimgs/ab/images/wcm/products/201335/0022/img11c.jpg', '600', NULL, 'Sofa', 37),
(27, NULL, 'http://ab.weimgs.com/weimgs/ab/images/wcm/products/201335/0022/img11c.jpg', '800', NULL, 'Sofa', 37),
(28, NULL, 'http://ab.weimgs.com/weimgs/ab/images/wcm/products/201335/0101/img89c.jpg', '499', 'I think this one is great.', 'Coffee Table', 37),
(29, NULL, 'http://ab.weimgs.com/weimgs/ab/images/wcm/products/201335/0240/img53c.jpg', '199', 'I''m not sure that I love this one.', 'Coffee Table', 37),
(41, NULL, 'http://ab.weimgs.com/weimgs/ab/images/wcm/products/201323/0066/img41x.jpg', '399', 'Email Test.', 'Coffee Table', 38),
(43, NULL, 'http://ab.weimgs.com/weimgs/ab/images/wcm/products/201335/0136/img35j.jpg', '1299', 'I''m not sure about this one.', 'Sofa', 38),
(44, NULL, 'http://ab.weimgs.com/weimgs/ab/images/wcm/products/201335/0252/img1j.jpg', '1499', 'I love this couch.', 'Sofa', 38),
(46, NULL, 'http://ab.weimgs.com/weimgs/ab/images/wcm/products/201335/0179/img95c.jpg', '1249', NULL, 'Sofa', 38),
(47, NULL, 'http://ab.weimgs.com/weimgs/ab/images/wcm/products/201335/0219/img76c.jpg', '500', 'So love this.', 'Coffee Table', 38),
(49, NULL, 'http://ab.weimgs.com/weimgs/ab/images/wcm/products/201335/0219/img76c.jpg', '500 - 50wx75x30', NULL, 'Coffee Table', 38),
(50, NULL, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0174/img49c.jpg', '1299', NULL, 'Sofa', 43),
(51, NULL, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201323/0045/img49c.jpg', '1399', NULL, 'Sofa', 43),
(52, NULL, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201338/0008/img84c.jpg', '299', NULL, 'Bench', 43),
(53, NULL, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0208/img17c.jpg', '199', NULL, 'Bench', 43);

-- --------------------------------------------------------

--
-- Table structure for table `designer`
--

CREATE TABLE IF NOT EXISTS `designer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designer_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `designer_phone_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `designer_picture` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `designer_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `designer`
--

INSERT INTO `designer` (`id`, `designer_name`, `designer_phone_number`, `designer_picture`, `designer_email`) VALUES
(1, 'Shelby Girard', '', 'model.jpg', 'lee@havenly.com'),
(2, 'Vanessa Montiel', '', 'model3.jpg', 'hello@havenly.com'),
(3, 'Erinn Leary', '', 'model2.jpg', 'lee@havenly.com');

-- --------------------------------------------------------

--
-- Table structure for table `designer_availability`
--

CREATE TABLE IF NOT EXISTS `designer_availability` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `designer_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `designer_availability`
--


-- --------------------------------------------------------

--
-- Table structure for table `designer_calls`
--

CREATE TABLE IF NOT EXISTS `designer_calls` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `designer_calls`
--


-- --------------------------------------------------------

--
-- Table structure for table `designer_mapping`
--

CREATE TABLE IF NOT EXISTS `designer_mapping` (
  `designer_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=128 ;

--
-- Dumping data for table `designer_mapping`
--

INSERT INTO `designer_mapping` (`designer_id`, `id`, `user_id`) VALUES
(3, 127, 186);

-- --------------------------------------------------------

--
-- Table structure for table `design_fee`
--

CREATE TABLE IF NOT EXISTS `design_fee` (
  `design_fee_id` int(10) NOT NULL AUTO_INCREMENT,
  `design_type` varchar(100) NOT NULL,
  `promotion_code` varchar(50) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `fee` varchar(200) NOT NULL,
  `credit_amount` decimal(10,0) NOT NULL,
  PRIMARY KEY (`design_fee_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=124 ;

--
-- Dumping data for table `design_fee`
--

INSERT INTO `design_fee` (`design_fee_id`, `design_type`, `promotion_code`, `status`, `fee`, `credit_amount`) VALUES
(122, 'incomplete', NULL, 'active', '1', 0),
(123, 'complete', NULL, 'active', '1', 0),
(3, 'complete', 'CHANCE', 'active', '3', 0),
(4, 'incomplete', 'CHANCE', 'active', '3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `design_product_mapping`
--

CREATE TABLE IF NOT EXISTS `design_product_mapping` (
  `design_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `design_product_mapping`
--

INSERT INTO `design_product_mapping` (`design_id`, `product_id`) VALUES
(181, 140),
(181, 105),
(181, 107),
(181, 109),
(181, 139);

-- --------------------------------------------------------

--
-- Table structure for table `invite_requests`
--

CREATE TABLE IF NOT EXISTS `invite_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` int(5) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `invite_requests`
--

INSERT INTO `invite_requests` (`id`, `email`, `zipcode`, `Timestamp`) VALUES
(45, 'lee@havenly.com', 80218, '2013-10-21 02:12:40'),
(46, 'lee@havenly.com', 80218, '2013-10-21 02:22:19'),
(47, 'kapilparihar49@yahoo.in', 34230, '2013-11-22 00:55:06'),
(48, 'kapilparihar49@yahoo.in', 34230, '2013-11-22 01:37:49'),
(49, 'kapsa49parihar@gmail.com', 34230, '2013-11-22 02:22:02'),
(50, 'kapilparihar49@yahoo.in', 34230, '2013-11-22 03:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `paint_colors`
--

CREATE TABLE IF NOT EXISTS `paint_colors` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `design_id` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `paint_colors`
--

INSERT INTO `paint_colors` (`id`, `design_id`, `color`, `description`) VALUES
(97, '181', 'rgb(234,234,234);', 'Pistachio'),
(88, '177', 'rgb(122,111,111);', 'BM Silver Spoon');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(10) NOT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `rent_price` decimal(10,2) DEFAULT NULL,
  `ship_cost` decimal(10,2) DEFAULT NULL,
  `qty_in_stock` int(10) DEFAULT NULL,
  `time_to_ship` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `weblink` text COLLATE utf8_unicode_ci,
  `product_type_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_color_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_material_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_style_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dimensions` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `material_name` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color_name` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=143 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `vendor_id`, `product_name`, `price`, `rent_price`, `ship_cost`, `qty_in_stock`, `time_to_ship`, `weblink`, `product_type_id`, `product_color_id`, `product_material_id`, `product_style_id`, `description`, `dimensions`, `note`, `material_name`, `color_name`) VALUES
(1, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '1-3 weeks', 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80o.jpg', '48', '16', '30', '3', '', '74.5"w x 38"d x 27"h', '', 'Faux Suede', 'Charcoal Herringbone'),
(2, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80o.jpg', '48', '4', '30', '3', '', '74.5"w x 38"d x 27"h', '', 'Faux Suede', 'Espresso Herringbone'),
(109, 1, 'Emerson Dining Table', 799.00, NULL, 99.00, 0, '', 'http://www.westelm.com/products/emmerson-dining-table-g504/?pkey=cdining-furniture-on-sale&cm_src=dining-furniture-on-sale||NoFacet-_-NoFacet-_--_-', '25,', '4,', '34,', '10,', '', '60"w x 38"d x 31"h.', '', NULL, NULL),
(3, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80o.jpg', '48', '5', '30', '3', '', '74.5"w x 38"d x 27"h', '', 'Faux Suede', 'Paprika Herringbone'),
(4, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80o.jpg', '48', '4', '30', '3', '', '74.5"w x 38"d x 27"h', '', 'Faux Suede', 'Saddle Herringbone'),
(5, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80o.jpg', '48', '1', '30', '3', '', '74.5"w x 38"d x 27"h', '', 'Faux Suede', 'Bone Pin-Dot'),
(108, 1, 'Emerson Dining Table', 799.00, NULL, 99.00, 0, '', 'http://www.westelm.com/products/emmerson-dining-table-g504/?pkey=cdining-furniture-on-sale&cm_src=dining-furniture-on-sale||NoFacet-_-NoFacet-_--_-', '25,', '4,', '34,', '9,', '', '60"w x 38"d x 31"h.', '', NULL, NULL),
(6, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '5', '37', '3', '', '74.5"w x 38"d x 27"h', '', 'Marled Microfiber', 'Cardinal'),
(7, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '16', '37', '3', '', '74.5"w x 38"d x 27"h', '', 'Marled Microfiber', 'Granite'),
(8, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '1-3 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '16', '37', '3', '', '74.5"w x 38"d x 27"h', '', 'Marled Microfiber', 'Heather Gray'),
(9, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '16', '37', '3', '', '74.5"w x 38"d x 27"h', '', 'Marled Microfiber', 'Licorice'),
(10, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '4', '37', '3', '', '74.5"w x 38"d x 27"h', '', 'Marled Microfiber', 'Mink'),
(11, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '7', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Dandelion'),
(12, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '16', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Dove Gray'),
(13, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '4', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Espresso'),
(14, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '7', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Golden Gate'),
(15, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '12', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Hazy Taupe'),
(16, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '9', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Ink Blue'),
(17, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '9', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Lagoon'),
(18, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '4', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Mocha'),
(19, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '8', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Moss'),
(20, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '16', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Otter'),
(21, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '5', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Poppy'),
(22, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '16', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Shadow'),
(23, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '9', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Silver Sage'),
(24, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '9', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Steel Blue'),
(25, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '1-3 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '16', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Stone'),
(26, 1, '2 Tillary Sofas, 4 Back Supports', 1798.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-h068/?pkey=e%7Ctillary%7C14%7Cbest%7C0%7C1%7C24%7C%7C12&cm_src=PRODUCTSEARCH||NoFacet-_-NoFacet-_-NoMerchRules-_-', '48', '2', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Toast'),
(27, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '1-3 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '16', '30', '3', '', '74.5"w x 38"d x 27"h', '', 'Faux Suede', 'Charcoal Herringbone'),
(28, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '4', '30', '3', '', '74.5"w x 38"d x 27"h', '', 'Faux Suede', 'Espresso Herringbone'),
(29, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '5', '30', '3', '', '74.5"w x 38"d x 27"h', '', 'Faux Suede', 'Paprika Herringbone'),
(30, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '4', '30', '3', '', '74.5"w x 38"d x 27"h', '', 'Faux Suede', 'Saddle Herringbone'),
(31, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '1', '30', '3', '', '74.5"w x 38"d x 27"h', '', 'Faux Suede', 'Bone Pin-Dot'),
(32, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '5', '37', '3', '', '74.5"w x 38"d x 27"h', '', 'Marled Microfiber', 'Cardinal'),
(33, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '16', '37', '3', '', '74.5"w x 38"d x 27"h', '', 'Marled Microfiber', 'Granite'),
(34, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '1-3 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '16', '37', '3', '', '74.5"w x 38"d x 27"h', '', 'Marled Microfiber', 'Heather Gray'),
(35, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '16', '37', '3', '', '74.5"w x 38"d x 27"h', '', 'Marled Microfiber', 'Licorice'),
(36, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '4', '37', '3', '', '74.5"w x 38"d x 27"h', '', 'Marled Microfiber', 'Mink'),
(37, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '7', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Dandelion'),
(38, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '16', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Dove Gray'),
(39, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '4', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Espresso'),
(40, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '7', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Golden Gate'),
(41, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '12', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Hazy Taupe'),
(42, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '9', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Ink Blue'),
(43, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '9', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Lagoon'),
(44, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '4', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Mocha'),
(45, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '8', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Moss'),
(46, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '16', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Otter'),
(47, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '5', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Poppy'),
(48, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '16', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Shadow'),
(49, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '9', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Silver Sage'),
(50, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '9', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Steel Blue'),
(51, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '1-3 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '16', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Stone'),
(52, 1, '2 Tillary Tufted Sofas, 4 Back Supports', 1898.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/tillary-2-sofa-sectional-tufted-h071/?cm_src=AutoRel', '48', '2', '36', '3', '', '74.5"w x 38"d x 27"h', '', 'Performance Velvet', 'Toast'),
(53, 1, 'Andalusia Dhurrie Pouf', 249.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/andalusia-dhurrie-pouf-b869/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '41', '16', '33', '4', '', '24"sq. x 13"h', '', 'Cotton Weave', 'Platinum/Ivory'),
(54, 1, 'Antique Finish Element Coffee Table', 999.00, 0.00, 0.00, 0, '2-4 weeks', 'http://www.westelm.com/products/element-coffee-table-h181/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '1', '14', '', '8', '', '49"w x 28"d x 17"h', '', '', 'Antique Nickel'),
(55, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '4', '33', '7', '', '104"w x 64"d x 34"h', '', 'Basketweave', 'Cacao'),
(56, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '33', '7', '', '104"w x 64"d x 34"h', '', 'Basketweave', 'Iron'),
(57, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '33', '7', '', '104"w x 64"d x 34"h', '', 'Basketweave', 'Putty Gray'),
(58, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '11', '33', '7', '', '104"w x 64"d x 34"h', '', 'Basketweave', 'Raisin'),
(59, 1, 'Armless 3-Piece Corner Sectional', 2297.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '1', '7', '', '104"w x 64"d x 34"h', '', 'Brushed Heathered Cotton', 'Caviar'),
(60, 1, 'Armless 3-Piece Corner Sectional', 2297.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '2', '1', '7', '', '104"w x 64"d x 34"h', '', 'Brushed Heathered Cotton', 'Flax'),
(61, 1, 'Armless 3-Piece Corner Sectional', 2297.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '1', '7', '', '104"w x 64"d x 34"h', '', 'Brushed Heathered Cotton', 'Gray Haze'),
(62, 1, 'Armless 3-Piece Corner Sectional', 2497.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '12', '33', '7', '', '104"w x 64"d x 34"h', '', 'Chunky Basketweave', 'Natural'),
(63, 1, 'Armless 3-Piece Corner Sectional', 2297.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '2', '33', '7', '', '104"w x 64"d x 34"h', '', 'Cotton Basketweave', 'Flax'),
(64, 1, 'Armless 3-Piece Corner Sectional', 2297.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '33', '7', '', '104"w x 64"d x 34"h', '', 'Cotton Basketweave', 'Slate'),
(65, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '1', '30', '7', '', '104"w x 64"d x 34"h', '', 'Faux Suede', 'Bone Pin-Dot'),
(66, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '30', '7', '', '104"w x 64"d x 34"h', '', 'Faux Suede', 'Charcoal Herringbone'),
(67, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '4', '30', '7', '', '104"w x 64"d x 34"h', '', 'Faux Suede', 'Espresso Herringbone'),
(68, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '5', '30', '7', '', '104"w x 64"d x 34"h', '', 'Faux Suede', 'Paprika Herringbone'),
(69, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '4', '30', '7', '', '104"w x 64"d x 34"h', '', 'Faux Suede', 'Saddle Herringbone'),
(70, 1, 'Armless 3-Piece Corner Sectional', 2697.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '35', '7', '', '104"w x 64"d x 34"h', '', 'Heathered Wool', 'Cinder'),
(71, 1, 'Armless 3-Piece Corner Sectional', 2297.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '12', '14', '7', '', '104"w x 64"d x 34"h', '', 'Linen Blend', 'Fawn'),
(72, 1, 'Armless 3-Piece Corner Sectional', 2297.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '10', '14', '7', '', '104"w x 64"d x 34"h', '', 'Linen Weave', 'Lotus Pink'),
(73, 1, 'Armless 3-Piece Corner Sectional', 2297.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '12', '14', '7', '', '104"w x 64"d x 34"h', '', 'Linen Weave', 'Natural'),
(74, 1, 'Armless 3-Piece Corner Sectional', 2297.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '4', '14', '7', '', '104"w x 64"d x 34"h', '', 'Linen Weave', 'Timber'),
(75, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '5', '37', '7', '', '104"w x 64"d x 34"h', '', 'Marled Microfiber', 'Cardinal'),
(76, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '37', '7', '', '104"w x 64"d x 34"h', '', 'Marled Microfiber', 'Granite'),
(77, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '37', '7', '', '104"w x 64"d x 34"h', '', 'Marled Microfiber', 'Heather Gray'),
(78, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '37', '7', '', '104"w x 64"d x 34"h', '', 'Marled Microfiber', 'Licorice'),
(79, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '4', '37', '7', '', '104"w x 64"d x 34"h', '', 'Marled Microfiber', 'Mink'),
(80, 1, 'Armless 3-Piece Corner Sectional', 2297.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '9', '33', '7', '', '104"w x 64"d x 34"h', '', 'Pebble Weave', 'Aegean Blue'),
(81, 1, 'Armless 3-Piece Corner Sectional', 2297.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '12', '33', '7', '', '104"w x 64"d x 34"h', '', 'Pebble Weave', 'Burlap'),
(82, 1, 'Armless 3-Piece Corner Sectional', 2297.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '2', '33', '7', '', '104"w x 64"d x 34"h', '', 'Pebble Weave', 'Oatmeal'),
(83, 1, 'Armless 3-Piece Corner Sectional', 2297.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '33', '7', '', '104"w x 64"d x 34"h', '', 'Pebble Weave', 'Shale'),
(84, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '7', '36', '7', '', '104"w x 64"d x 34"h', '', 'Performance Velvet', 'Dandelion'),
(85, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '36', '7', '', '104"w x 64"d x 34"h', '', 'Performance Velvet', 'Dove Gray'),
(86, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '4', '36', '7', '', '104"w x 64"d x 34"h', '', 'Performance Velvet', 'Espresso'),
(87, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '7', '36', '7', '', '104"w x 64"d x 34"h', '', 'Performance Velvet', 'Golden Gate'),
(88, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '12', '36', '7', '', '104"w x 64"d x 34"h', '', 'Performance Velvet', 'Hazy Taupe'),
(89, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '9', '36', '7', '', '104"w x 64"d x 34"h', '', 'Performance Velvet', 'Ink Blue'),
(90, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '9', '36', '7', '', '104"w x 64"d x 34"h', '', 'Performance Velvet', 'Lagoon'),
(91, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '4', '36', '7', '', '104"w x 64"d x 34"h', '', 'Performance Velvet', 'Mocha'),
(92, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '8', '36', '7', '', '104"w x 64"d x 34"h', '', 'Performance Velvet', 'Moss'),
(93, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '36', '7', '', '104"w x 64"d x 34"h', '', 'Performance Velvet', 'Otter'),
(94, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '5', '36', '7', '', '104"w x 64"d x 34"h', '', 'Performance Velvet', 'Poppy'),
(95, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '36', '7', '', '104"w x 64"d x 34"h', '', 'Performance Velvet', 'Shadow'),
(96, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '9', '36', '7', '', '104"w x 64"d x 34"h', '', 'Performance Velvet', 'Silver Sage'),
(97, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '9', '36', '7', '', '104"w x 64"d x 34"h', '', 'Performance Velvet', 'Steel Blue'),
(98, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '36', '7', '', '104"w x 64"d x 34"h', '', 'Performance Velvet', 'Stone'),
(99, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '2', '36', '7', '', '104"w x 64"d x 34"h', '', 'Performance Velvet', 'Toast'),
(100, 1, 'Armless 3-Piece Corner Sectional', 2097.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-corner-sectional-h100/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '2', '14', '7', '', '104"w x 64"d x 34"h', '', 'Slubby Linen', 'Flax'),
(101, 1, 'Armless 3-Piece Mini Sectional', 1697.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-mini-sectional-h078/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '4', '33', '7', '', '64"sq. x 34"h', '', 'Basketweave', 'Cacao'),
(102, 1, 'Armless 3-Piece Mini Sectional', 1697.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-mini-sectional-h078/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '12', '33', '7', '', '64"sq. x 34"h', '', 'Basketweave', 'Hazy Taupe'),
(103, 1, 'Armless 3-Piece Mini Sectional', 1697.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-mini-sectional-h078/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '33', '7', '', '64"sq. x 34"h', '', 'Basketweave', 'Iron'),
(104, 1, 'Armless 3-Piece Mini Sectional', 1697.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-mini-sectional-h078/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '33', '7', '', '64"sq. x 34"h', '', 'Basketweave', 'Putty Gray'),
(105, 1, 'Armless 3-Piece Mini Sectional', 1697.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-mini-sectional-h078/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '11', '33', '7', '', '64"sq. x 34"h', '', 'Basketweave', 'Raisin'),
(106, 1, 'Armless 3-Piece Mini Sectional', 1847.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-mini-sectional-h078/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '16', '1', '7', '', '64"sq. x 34"h', '', 'Brushed Heathered Cotton', 'Caviar'),
(107, 1, 'Armless 3-Piece Mini Sectional', 1847.00, 0.00, 0.00, 0, '8-10 weeks', 'http://www.westelm.com/products/armless-3-piece-mini-sectional-h078/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '44', '2', '1', '7', '', '64"sq. x 34"h', '', 'Brushed Heathered Cotton', 'Flax'),
(110, 1, 'Emerson Dining Table', 799.00, NULL, 99.00, 0, '', 'http://www.westelm.com/products/emmerson-dining-table-g504/?pkey=cdining-furniture-on-sale&cm_src=dining-furniture-on-sale||NoFacet-_-NoFacet-_--_-', '25,', '4,', '34,', '11,', '', '60"w x 38"d x 31"h.', '', NULL, NULL),
(111, 1, 'Test Product', 100.00, NULL, 0.00, 0, '', '', '48,', '16,', '36,', '12,', '', 'a;lskjdf', '', NULL, NULL),
(112, 1, 'Test2', 99.00, NULL, 0.00, 0, '', '', '25,', '7,', '34,', '13,', '', 'asdf', '', NULL, NULL),
(113, 1, 'Test2', 99.00, NULL, 0.00, 0, '', '', '25,', '7,', '34,', '14,', '', 'asdf', '', NULL, NULL),
(114, 1, 'Test2', 99.00, NULL, 0.00, 0, '', '', '25,', '7,', '34,', '15,', '', 'asdf', '', NULL, NULL),
(115, 1, 'Test2', 99.00, NULL, 0.00, 0, '', '', '25,', '7,', '34,', '16,', '', 'asdf', '', NULL, NULL),
(116, 1, 'Test2', 99.00, NULL, 0.00, 0, '', '', '25,', '7,', '34,', '17,', '', 'asdf', '', NULL, NULL),
(117, 1, 'Test2', 99.00, NULL, 0.00, 0, '', '', '25,', '7,', '34,', '18,', '', 'asdf', '', NULL, NULL),
(118, 1, 'atest', 99.00, NULL, 0.00, 0, '', '', '25,', '16,', '36,', '19,', '', 'a', '', NULL, NULL),
(119, 1, 'atest', 99.00, NULL, 0.00, 0, '', '', '25,', '16,', '36,', '20,', '', 'a', '', NULL, NULL),
(120, 1, 'atest', 99.00, NULL, 0.00, 0, '', '', '25,', '16,', '36,', '21,', '', 'a', '', NULL, NULL),
(121, 1, 'atest', 99.00, NULL, 0.00, 0, '', '', '25,', '16,', '36,', '22,', '', 'a', '', NULL, NULL),
(122, 1, 'atest', 99.00, NULL, 0.00, 0, '', '', '25,', '16,', '36,', '23,', '', 'a', '', NULL, NULL),
(123, 1, 'atest', 99.00, NULL, 0.00, 0, '', '', '25,', '16,', '36,', '24,', '', 'a', '', NULL, NULL),
(124, 1, 'atest', 100.00, NULL, 0.00, 0, '', '', '25,', '9,', '34,', '25,', '', 'a', '', NULL, NULL),
(125, 1, 'atest', 100.00, NULL, 0.00, 0, '', '', '25,', '9,', '34,', '26,', '', 'a', '', NULL, NULL),
(126, 1, 'atest', 100.00, NULL, 0.00, 0, '', '', '25,', '9,', '34,', '27,', '', 'a', '', NULL, NULL),
(127, 1, 'atest', 100.00, NULL, 0.00, 0, '', '', '25,', '9,', '34,', '28,', '', 'a', '', NULL, NULL),
(128, 1, 'atest', 100.00, NULL, 0.00, 0, '', '', '25,', '9,', '34,', '29,', '', 'a', '', NULL, NULL),
(129, 1, 'atest', 100.00, NULL, 0.00, 0, '', '', '25,', '9,', '34,', '30,', '', 'a', '', NULL, NULL),
(130, 1, 'atest', 100.00, NULL, 0.00, 0, '', '', '25,', '9,', '34,', '31,', '', 'a', '', NULL, NULL),
(131, 1, 'atest', 100.00, NULL, 0.00, 0, '', '', '25,', '9,', '34,', '32,', '', 'a', '', NULL, NULL),
(132, 1, 'atest', 100.00, NULL, 0.00, 0, '', '', '25,', '9,', '34,', '33,', '', 'a', '', NULL, NULL),
(133, 1, 'atest', 100.00, NULL, 0.00, 0, '', '', '25,', '9,', '34,', '34,', '', 'a', '', NULL, NULL),
(134, 1, 'atest', 100.00, NULL, 0.00, 0, '', '', '25,', '9,', '34,', '35,', '', 'a', '', NULL, NULL),
(135, 1, 'atest', 100.00, NULL, 0.00, 0, '', '', '25,', '9,', '34,', '36,', '', 'a', '', NULL, NULL),
(136, 1, 'atest', 100.00, NULL, 0.00, 0, '', '', '25,', '9,', '34,', '37,', '', 'a', '', NULL, NULL),
(137, 0, '', 0.00, NULL, 0.00, 0, '', '', ',', ',', ',', ',', '', '', '', NULL, NULL),
(138, 0, '', 0.00, NULL, 0.00, 0, '', '', ',', ',', ',', ',', '', '', '', NULL, NULL),
(139, 0, '', 0.00, NULL, 0.00, 0, '', '', ',', ',', ',', ',', '', '', '', NULL, NULL),
(140, 1, 'Tillary Tufted Sofa', 949.00, NULL, 50.00, 0, '', 'http://www.westelm.com/products/tillary-tufted-sofa-g696/?pkey=call-living-room&cm_src=all-living-room||NoFacet-_-NoFacet-_--_-', '48,', '16,', '36,', '38,', 'The right tuft. Part of our popular and endlessly adaptable Tillary Collection, which sports a new tufted look, this sofa pairs traditional tufting with a streamlined design. Its clean lines and tufted back cushions create a perch that effortlessly melds comfort with high style.', '74.5"w x 38"d x 27"h', '', NULL, NULL),
(141, 1, 'aaa', 999.00, NULL, 0.00, 0, '', 'www.google.com', '47,', '8,', '4,', '1,', '', '1x2x3', '', NULL, NULL),
(142, 1, 'aaa', 999.00, NULL, 0.00, 0, '', 'www.google.com', '47,', '8,', '4,', '1,', '', '1x2x3', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE IF NOT EXISTS `product_color` (
  `color_id` int(10) NOT NULL AUTO_INCREMENT,
  `color` varchar(100) NOT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `product_color`
--


-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE IF NOT EXISTS `product_colors` (
  `color_id` int(10) NOT NULL,
  `color` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`color_id`, `color`) VALUES
(1, 'White'),
(2, 'Cream'),
(3, 'Black'),
(4, 'Brown'),
(5, 'Red'),
(6, 'Orange'),
(7, 'Yellow'),
(8, 'Green'),
(9, 'Blue'),
(10, 'Pink'),
(11, 'Purple'),
(12, 'Tan'),
(13, 'Gold'),
(14, 'Silver'),
(15, 'Brass'),
(16, 'Gray');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE IF NOT EXISTS `product_image` (
  `product_id` int(10) NOT NULL,
  `filename` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_id`, `filename`, `type`) VALUES
(120, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(141, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201323/0065/img14o.jpg', 'main'),
(142, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201323/0065/img14o.jpg', 'main'),
(1, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(140, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201323/0028/img8o.jpg', NULL),
(140, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201323/0065/img14o.jpg', 'main'),
(139, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201330/0007/img2x.jpg', NULL),
(139, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0016/img7o.jpg', 'main'),
(138, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0016/img7o.jpg', NULL),
(137, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0016/img7o.jpg', NULL),
(113, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201323/0047/img78o.jpg', NULL),
(113, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201323/0047/img77o.jpg', NULL),
(110, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', NULL),
(109, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(112, 'h', 'h'),
(107, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(106, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(105, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(104, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(103, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(102, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(101, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(100, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(99, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(98, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(97, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(96, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(95, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(94, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(93, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(92, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(91, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(90, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(89, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(88, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(87, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(86, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(85, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(84, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(83, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(82, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(81, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(80, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(79, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(78, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(77, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(76, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(75, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(74, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(73, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(72, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(71, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(70, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(69, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(68, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(67, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(66, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(65, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(64, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(63, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(62, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(61, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(60, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(59, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(58, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(57, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(56, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(55, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(54, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(53, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(52, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(51, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(50, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(49, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(48, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(47, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(46, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(45, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(44, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(43, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(42, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(41, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(40, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(39, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(38, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(37, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(36, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(35, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(34, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(33, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(32, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(31, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(30, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(29, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(28, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(27, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(26, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(25, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(24, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(23, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(22, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(21, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(20, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(19, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(18, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(17, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(16, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(15, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(14, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(13, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(12, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(11, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(10, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(9, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(8, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(7, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(6, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(5, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0244/img80c.jpg', 'main'),
(108, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201323/0071/img58o.jpg', NULL),
(108, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0026/img88c.jpg', NULL),
(109, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201323/0071/img58o.jpg', NULL),
(109, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0026/img88c.jpg', NULL),
(110, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201323/0071/img58o.jpg', 'main'),
(110, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201335/0026/img88c.jpg', NULL),
(112, 'h', 'h'),
(111, 'http://rk.weimgs.com/weimgs/rk/images/wcm/products/201323/0047/img77o.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_material`
--

CREATE TABLE IF NOT EXISTS `product_material` (
  `material_id` int(10) NOT NULL AUTO_INCREMENT,
  `material` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

--
-- Dumping data for table `product_material`
--

INSERT INTO `product_material` (`material_id`, `material`) VALUES
(1, 'Cotton'),
(2, 'Acrylic'),
(3, 'Aluminum'),
(4, 'Brass'),
(5, 'Canvas'),
(6, 'Clay'),
(7, 'Concrete'),
(8, 'Cotton'),
(9, 'Electronics'),
(10, 'Enamel'),
(11, 'Glass'),
(12, 'Iron'),
(13, 'Leather'),
(14, 'Linen'),
(15, 'Marble'),
(16, 'Metal'),
(17, 'Mirror'),
(18, 'Natural'),
(19, 'Other'),
(20, 'Paper'),
(21, 'Plastic'),
(22, 'Poly'),
(23, 'Porcelain'),
(24, 'Powdercoat'),
(25, 'Resin'),
(26, 'Rubber'),
(27, 'Silk'),
(28, 'Steel'),
(29, 'Stoneware'),
(30, 'Suede'),
(31, 'Vinyl'),
(32, 'Wax'),
(33, 'Weave'),
(34, 'Wood'),
(35, 'Wool'),
(36, 'Velvet'),
(37, 'Microfiber'),
(38, 'Synthetic');

-- --------------------------------------------------------

--
-- Table structure for table `product_room_mapping`
--

CREATE TABLE IF NOT EXISTS `product_room_mapping` (
  `room_id` int(10) NOT NULL,
  `product_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Design_Plan` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Morden'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_room_mapping`
--

INSERT INTO `product_room_mapping` (`room_id`, `product_id`, `status`, `timestamp`, `Design_Plan`) VALUES
(183, '140', '', '2013-11-02 00:02:57', '0'),
(182, '120', '', '2013-10-31 01:04:11', '0'),
(157, '139', '', '2013-10-19 23:54:18', '0'),
(157, '140', '', '2013-10-19 23:54:18', '0'),
(183, '105', '', '2013-11-02 00:02:57', '0'),
(183, '107', '', '2013-11-02 00:02:57', '0'),
(183, '109', '', '2013-11-02 00:02:57', '0'),
(183, '139', '', '2013-11-02 00:02:57', '0');

-- --------------------------------------------------------

--
-- Table structure for table `product_style`
--

CREATE TABLE IF NOT EXISTS `product_style` (
  `style_id` int(10) NOT NULL AUTO_INCREMENT,
  `style` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`style_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `product_style`
--

INSERT INTO `product_style` (`style_id`, `style`) VALUES
(1, 'Modern'),
(2, 'Classic'),
(3, 'Traditional'),
(4, 'Casual'),
(5, 'Elegant'),
(6, 'Retro'),
(7, 'Chic'),
(8, 'Vintage');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE IF NOT EXISTS `product_type` (
  `type_id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=58 ;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`type_id`, `type`) VALUES
(1, 'Coffee Table'),
(2, 'Accessories'),
(3, 'Art'),
(4, 'Bag'),
(5, 'Bar'),
(6, 'Barstool'),
(7, 'Bath Accessories'),
(8, 'Bath Linen'),
(9, 'Bed'),
(10, 'Bed Linens'),
(11, 'Bench'),
(12, 'Bookcase'),
(13, 'Cabinet'),
(14, 'Cart'),
(15, 'Chair'),
(16, 'Chaise'),
(17, 'Clock'),
(18, 'Console Table'),
(19, 'Cover'),
(20, 'Curtain'),
(21, 'Cushion'),
(22, 'Daybed'),
(23, 'Desk'),
(24, 'Dining Chair'),
(25, 'Dining Table'),
(26, 'Dresser'),
(27, 'End Table'),
(28, 'File Cabinet'),
(29, 'Frame'),
(30, 'Hamper'),
(31, 'Hardware'),
(32, 'Lamp'),
(33, 'Loveseat'),
(34, 'Media Unit'),
(35, 'Mirror'),
(36, 'Nightstand'),
(37, 'Office Chair'),
(38, 'Organizer'),
(39, 'Ottoman'),
(40, 'Pillow'),
(41, 'Pouf'),
(42, 'Room Divider'),
(43, 'Rug'),
(44, 'Sectional'),
(45, 'Shelves'),
(46, 'Shelving'),
(47, 'Side Table'),
(48, 'Sofa'),
(49, 'Stool'),
(50, 'Storage'),
(51, 'Table'),
(52, 'Tableware'),
(53, 'Throw'),
(54, 'Tray Table'),
(55, 'Vase'),
(56, 'Wall'),
(57, 'Wardrobe');

-- --------------------------------------------------------

--
-- Table structure for table `promotion_code`
--

CREATE TABLE IF NOT EXISTS `promotion_code` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `promotion_code` varchar(100) DEFAULT NULL,
  `design_fee` varchar(500) NOT NULL,
  `designtype` enum('complete','incomplete') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `promotion_code`
--


-- --------------------------------------------------------

--
-- Table structure for table `shopify_product_variant`
--

CREATE TABLE IF NOT EXISTS `shopify_product_variant` (
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopify_product_variant`
--


-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE IF NOT EXISTS `shoppingcart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `room_id` int(10) DEFAULT NULL,
  `product_id` int(10) DEFAULT NULL,
  `design_id` int(10) DEFAULT NULL,
  `qty` int(10) DEFAULT '1',
  `ordered` varchar(50) DEFAULT NULL,
  `ConfirmNumber` varchar(350) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=461 ;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`id`, `user_id`, `room_id`, `product_id`, `design_id`, `qty`, `ordered`, `ConfirmNumber`) VALUES
(453, 180, 157, 140, 177, 1, NULL, ''),
(454, 185, 182, 120, 180, 1, 'yes', ''),
(457, 186, 183, 105, 181, 1, NULL, ''),
(458, 186, 183, 107, 181, 1, NULL, ''),
(459, 186, 183, 109, 181, 1, NULL, ''),
(460, 186, 183, 140, 181, 1, 'yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `email`, `first_name`, `Timestamp`) VALUES
(45, 'abcd', NULL, '2013-11-14 05:34:29'),
(44, 'Email Address', NULL, '2013-11-14 05:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `temp_product`
--

CREATE TABLE IF NOT EXISTS `temp_product` (
  `id` int(10) NOT NULL,
  `product` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `temp_product`
--


-- --------------------------------------------------------

--
-- Table structure for table `token_code`
--

CREATE TABLE IF NOT EXISTS `token_code` (
  `user_id` int(10) NOT NULL,
  `token` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `token_code`
--

INSERT INTO `token_code` (`user_id`, `token`, `amount`, `description`) VALUES
(181, 'tok_2mc985chpPVLsv', NULL, NULL),
(182, 'tok_2mcdiwcQBrD6Nf', NULL, NULL),
(182, 'tok_2mcdiwcQBrD6Nf', NULL, NULL),
(180, 'tok_2n3JnA580Cfeg9', NULL, NULL),
(180, 'tok_2n3ShMfbk4YdEB', NULL, NULL),
(180, 'tok_2n3Z5C38SF71Jw', NULL, NULL),
(180, 'tok_2n3cXkfUUsvATR', NULL, NULL),
(180, 'tok_2n3fbLwjd3ld0i', NULL, NULL),
(181, 'tok_2n3jbz7GzUGS53', NULL, NULL),
(180, 'tok_2n3mjUTpQFfs9U', NULL, NULL),
(180, 'tok_2n3wjQ2y5kfiec', NULL, NULL),
(180, 'tok_2oEZPtJdrFeuWE', NULL, NULL),
(180, 'tok_2oEcUNej1beUzw', NULL, NULL),
(180, 'tok_2oEgSKJZmKO4mZ', NULL, NULL),
(180, 'tok_2pKgePwxI1BZ1L', NULL, NULL),
(180, 'tok_2pKgePwxI1BZ1L', NULL, NULL),
(180, 'tok_2pKgePwxI1BZ1L', NULL, NULL),
(180, 'tok_2pKgePwxI1BZ1L', NULL, NULL),
(180, 'tok_2pKgePwxI1BZ1L', NULL, NULL),
(180, 'tok_2pKgePwxI1BZ1L', NULL, NULL),
(180, 'tok_2pKgePwxI1BZ1L', NULL, NULL),
(180, 'tok_2pKgePwxI1BZ1L', NULL, NULL),
(183, 'tok_2qNdjcehyxqJg1', NULL, NULL),
(184, 'tok_2qNlakzBRrKzFq', NULL, NULL),
(185, 'tok_2qNvFhUFFciZYt', NULL, NULL),
(186, 'tok_2rUZ9Svu9nJuA4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` int(10) NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` text COLLATE utf8_unicode_ci,
  `pinterest` text COLLATE utf8_unicode_ci,
  `instagram` text COLLATE utf8_unicode_ci,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `design_fee_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=189 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `zipcode`, `password`, `facebook`, `pinterest`, `instagram`, `Timestamp`, `design_fee_id`) VALUES
(188, 'Leea', 'Maye', 'lee@havenly.com2', '64687262621', '0', 1, 'princess', 'Link to Your Facebook Page', 'Link to a Pinterest Board', 'Your Instagram Handle', '2013-11-14 04:00:17', 0),
(187, 'Emily', 'Motayed', 'emily@gmail.com', '6468726262', '0', 10024, 'princess', 'Link to Your Facebook Page', 'Link to a Pinterest Board', 'Your Instagram Handle', '2013-11-14 03:22:29', 122),
(186, 'Lee', 'Mayer', 'lee@havenly.com', '6468726262', '0', 10024, 'princess', 'Link to Your Facebook Page', 'Link to a Pinterest Board', 'Your Instagram Handle', '2013-11-01 22:49:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_design`
--

CREATE TABLE IF NOT EXISTS `user_design` (
  `design_id` int(10) NOT NULL AUTO_INCREMENT,
  `room_id` int(10) NOT NULL,
  `design_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'draft',
  `designer_notes` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`design_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=183 ;

--
-- Dumping data for table `user_design`
--

INSERT INTO `user_design` (`design_id`, `room_id`, `design_name`, `status`, `designer_notes`) VALUES
(182, 187, 'Design4', 'draft', 'Test'),
(181, 183, 'Final Design', 'submitted', '   Test note');

-- --------------------------------------------------------

--
-- Table structure for table `user_last_login`
--

CREATE TABLE IF NOT EXISTS `user_last_login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_last_login_id` int(10) NOT NULL,
  `admin_last_login_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_last_login`
--

INSERT INTO `user_last_login` (`id`, `user_last_login_id`, `admin_last_login_id`) VALUES
(2, 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_preferences`
--

CREATE TABLE IF NOT EXISTS `user_preferences` (
  `pref_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `room_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `style_pics` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `color_pics` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pref_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=226 ;

--
-- Dumping data for table `user_preferences`
--

INSERT INTO `user_preferences` (`pref_id`, `user_id`, `room_type`, `style_pics`, `color_pics`, `Timestamp`) VALUES
(219, 186, 'LR', '1,', '1,', '2013-11-15 01:54:00'),
(218, 186, 'BR', '1,', '10,', '2013-11-14 05:41:43'),
(217, 188, 'BR', '2,1,', '1,2,3,', '2013-11-14 04:00:17'),
(216, 186, 'LR', '1,', '1,', '2013-11-14 03:58:32'),
(212, 185, '0', '2,', '3,4,', '2013-10-29 23:53:41'),
(213, 186, 'BR', '2,', '4,5,', '2013-11-01 22:49:46'),
(214, 187, 'LR', '20,', '1,4,', '2013-11-14 03:22:29'),
(215, 187, 'LR', '20,', '1,4,', '2013-11-14 03:22:42'),
(220, 186, 'BR', '2,', '2,', '2013-11-15 01:57:49'),
(221, 186, 'BR', '2,', '2,', '2013-11-15 01:58:13'),
(222, 186, 'BR', '1,', '1,', '2013-11-15 02:07:09'),
(223, 186, 'BR', '1,', '1,', '2013-11-15 03:25:26'),
(224, 186, 'LR', '1,', '1,', '2013-11-15 03:27:29'),
(225, 186, 'LR', '1,', '1,', '2013-11-15 03:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_rooms`
--

CREATE TABLE IF NOT EXISTS `user_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `room_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `budget` int(50) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `room_photo1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_photo2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `width` float NOT NULL,
  `height` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `room_type` (`room_type`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=196 ;

--
-- Dumping data for table `user_rooms`
--

INSERT INTO `user_rooms` (`id`, `user_id`, `type`, `room_type`, `Timestamp`, `budget`, `status`, `about`, `room_photo1`, `room_photo2`, `width`, `height`) VALUES
(191, 186, '', 'BR', '2013-11-15 01:58:13', 1000, 'open', 'I like the couch, but need your help with everything else, including a new coffee table', NULL, NULL, 12, 0),
(190, 186, '', 'BR', '2013-11-15 01:57:49', 1000, 'open', 'I like the couch, but need your help with everything else, including a new coffee table', NULL, NULL, 12, 0),
(184, 187, '', 'LR', '2013-11-14 03:22:29', 1000, 'open', 'I like the couch, but need your help with everything else, including a new coffee table', NULL, NULL, 12, 12),
(185, 187, '', 'LR', '2013-11-14 03:22:42', 1000, 'open', 'I like the couch, but need your help with everything else, including a new coffee table', NULL, NULL, 12, 12),
(186, 186, '', 'LR', '2013-11-14 03:58:32', 1000, 'open', 'I like the couch, but need your help with everything else, including a new coffee table', NULL, NULL, 12, 12),
(187, 188, '', 'BR', '2013-11-14 04:00:17', 100012, 'open', 'I like the couch, but need your help with everything else, including a new coffee table', NULL, NULL, 121, 12),
(188, 186, '', 'BR', '2013-11-14 05:41:43', 1000, 'open', 'I like the couch, but need your help with everything else, including a new coffee table', NULL, NULL, 12, 12),
(189, 186, '', 'LR', '2013-11-15 01:54:00', 1000, 'open', 'I like the couch, but need your help with everything else, including a new coffee table', NULL, NULL, 12, 12),
(183, 186, '', 'BR', '2013-11-01 22:49:46', 1000, 'PRODUCT REVIEW', 'I like the couch, but need your help with everything else, including a new coffee table', NULL, NULL, 12, 12),
(192, 186, '', 'BR', '2013-11-15 02:07:09', 1000, 'open', 'I like the couch, but need your help with everything else, including a new coffee table', NULL, NULL, 12, 12),
(193, 186, '', 'BR', '2013-11-15 03:25:26', 1000, 'open', 'I like the couch, but need your help with everything else, including a new coffee table', NULL, NULL, 12, 12),
(194, 186, '', 'LR', '2013-11-15 03:27:29', 1000, 'open', 'I like the couch, but need your help with everything else, including a new coffee table', NULL, NULL, 12, 12),
(195, 186, '', 'LR', '2013-11-15 03:29:35', 1000, 'open', 'I like the couch, but need your help with everything else, including a new coffee table', NULL, NULL, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_room_designs`
--

CREATE TABLE IF NOT EXISTS `user_room_designs` (
  `user_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `design_id` int(10) NOT NULL,
  `design_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `filename` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_room_designs`
--

INSERT INTO `user_room_designs` (`user_id`, `room_id`, `design_id`, `design_status`, `filename`) VALUES
(186, 183, 181, 'proposed', 'http://s3.amazonaws.com/easableimages/267041956.jpg'),
(186, 183, 181, 'proposed', 'http://s3.amazonaws.com/easableimages/859875408.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_room_details`
--

CREATE TABLE IF NOT EXISTS `user_room_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `room_id` int(10) NOT NULL,
  `Style_notes` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Ceiling_Height` int(10) NOT NULL,
  `Hates` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Likes` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Keep` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Buy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_room_details`
--

INSERT INTO `user_room_details` (`id`, `room_id`, `Style_notes`, `Ceiling_Height`, `Hates`, `Likes`, `Keep`, `Buy`) VALUES
(8, 157, 'blah blah blah', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_room_pictures`
--

CREATE TABLE IF NOT EXISTS `user_room_pictures` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `filename` varchar(100) NOT NULL,
  `room_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=292 ;

--
-- Dumping data for table `user_room_pictures`
--

INSERT INTO `user_room_pictures` (`id`, `user_id`, `filename`, `room_id`) VALUES
(290, 187, 'https://s3.amazonaws.com/easableimages/679848533.png', 0),
(289, 186, 'https://s3.amazonaws.com/easableimages/633931570.jpg', 0),
(291, 187, 'https://s3.amazonaws.com/easableimages/679848533.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_videos`
--

CREATE TABLE IF NOT EXISTS `user_videos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `filename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_videos`
--


-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE IF NOT EXISTS `vendors` (
  `vendor_id` int(10) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website_link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_percent` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_flat` int(11) DEFAULT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `vendor_name`, `address`, `phone_number`, `contact`, `website_link`, `shipping_percent`, `shipping_flat`) VALUES
(1, 'West Elm', '', '', '', '', '.1', NULL);
