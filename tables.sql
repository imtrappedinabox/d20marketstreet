-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2016 at 06:41 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers`
(
  `customer_id` INT(11) NOT NULL AUTO_INCREMENT,
  `salutation` VARCHAR(10) NOT NULL,
  `customer_first_name` VARCHAR(24) NOT NULL,
  `customer_middle_initial` CHAR(1) NULL,
  `customer_last_name` VARCHAR(24) NOT NULL,
  `gender` VARCHAR(1) NOT NULL,
  `email_address` VARCHAR(60) NOT NULL,
  `username` VARCHAR(60) NOT NULL,
  `password` VARCHAR(25) NOT NULL,
  `street_address` text NOT NULL,
  `town_city` VARCHAR(40) NOT NULL,
  `county` VARCHAR(2) NOT NULL,
  `country` VARCHAR(40) NOT NULL,
  `zip_code` VARCHAR(9) NOT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE (
		`email_address`,
		`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `salutation`, `customer_first_name`, `customer_middle_initial`, `customer_last_name`, `gender`, `email_address`, `username`, `password`, `street_address`, `town_city`, `county`, `country`, `zip_code`) VALUES
(100005, 'Mr.', 'Michael', 'P', 'McClune', 'M', 'Michael0@webbook.com', 'Michael0', 'Michael0', '8784 Tawny Panda Point', 'Stirling', 'New Foundland', 'Canada', '15145'),
(100007, 'Mr.', 'Michael', 'P', 'Young', 'M', 'Michael1@webbook.com', 'Michael1', 'Michael1', '5275 Pleasant Rise Ledge', 'Wanneroo', 'Texas', 'USA', '15151'),
(100009, 'Mr.', 'Jordan', 'I', 'Ore', 'M', 'Jordan2@webbook.com', 'Jordan2', 'Jordan2', '9830 Red Pony Pike', 'Subiaco', 'Washington', 'USA', '25987'),
(100011, 'Mr.', 'Bjorn', 'A', 'Ditty', 'M', 'Bjorn3@webbook.com', 'Bjorn3', 'Bjorn3', '8844 Golden Gate Acres', 'Wangaratta', 'Missouri', 'USA', '43017'),
(100013, 'Ms.', 'Riza', 'U', 'Zalameda', 'F', 'Riza4@webbook.com', 'Riza4', 'Riza4', '7572 High Log Estates', 'Adelaide', 'Missouri', 'USA', '88585'),
(100015, 'Ms.', 'Jacqueline', 'M', 'Goldfeld', 'F', 'Jacqueline5@webbook.com', 'Jacqueline5', 'Jacqueline5', '2675 Tawny Cider Knoll', 'Grafton', 'North Carolina', 'USA', '52369'),
(100017, 'Mr.', 'Scoville', 'E', 'Lepchenko', 'M', 'Scoville6@webbook.com', 'Scoville6', 'Scoville6', '2335 Honey Apple Canyon', 'Mount Isa', 'Texas', 'USA', '15158'),
(100019, 'Mr.', 'Nathan', 'T', 'Blake', 'M', 'Nathan7@webbook.com', 'Nathan7', 'Nathan7', '5142 Rocky Zephyr View', 'Port Pirie', 'Nunavut', 'Canada', '15182'),
(100021, 'Mr.', 'Ryan', 'R', 'Smyczek', 'M', 'Ryan8@webbook.com', 'Ryan8', 'Ryan8', '7389 Gentle Gate Estates', 'Rockingham', 'New Brunswick', 'Canada', '15126'),
(100023, 'Ms.', 'Angela', 'C', 'Nguyen', 'F', 'Angela9@webbook.com', 'Angela9', 'Angela9', '6126 Foggy Island Glen', 'Liverpool', 'Mississippi', 'USA', '23262'),
(100025, 'Ms.', 'Ester', 'Z', 'Muhammad', 'F', 'Ester10@webbook.com', 'Ester10', 'Ester10', '2481 Thunder Anchor Path', 'Whyalla', 'Florida', 'USA', '15125'),
(100027, 'Ms.', 'Abigail', 'K', 'Harrison', 'F', 'Abigail11@webbook.com', 'Abigail11', 'Abigail11', '6246 Heather Pony Landing', 'Sydney', 'West Virginia', 'USA', '15215');


CREATE TABLE `ref_product_categories`
(
  `product_category_code` VARCHAR(7) NOT NULL,
  `product_category_description` TINYTEXT NOT NULL,
  `department_name` TINYTEXT NOT NULL,
  PRIMARY KEY (`product_category_code`)
);

INSERT INTO `ref_product_categories` (`product_category_code`, `product_category_description`, `department_name`) VALUES
('DICE', 'Dice', 'Physical products'),
('MOD', 'Models', 'Physical products'),
('PROP', 'Props', 'Physical products'),
('CHAR', 'Characters', 'Physical products'),
('RULE', 'Homebrew rules', 'Physical products'),
('SCEN', 'Scenarios', 'Physical products'),
('CHARART', 'Character art', 'Physical products'),
('WORLART', 'World art', 'Physical products'),
('MAPS', 'Maps', 'Physical products');

CREATE TABLE `ref_order_status`
(
  `order_status_code` VARCHAR(2) NOT NULL,
  `order_status_description` TINYTEXT NOT NULL,
  PRIMARY KEY (`order_status_code`)
);

INSERT INTO `ref_order_status` (`order_status_code`, `order_status_description`) VALUES
('IP', 'In progress'),
('CL', 'Canceled'),
('DL', 'Delivered'),
('PD', 'Paid');

CREATE TABLE `Ref_Order_Item_Status`
(
  `order_item_status_code` VARCHAR(2) NOT NULL,
  `order_item_status_description` TINYTEXT NOT NULL,
  PRIMARY KEY (`order_item_status_code`)
);

CREATE TABLE `Personal_Store`
(
  `store_id` INT NOT NULL AUTO_INCREMENT,
  `store_name` VARCHAR(20) NOT NULL,
  `store_description` TEXT NULL,
  `creator_bio` TEXT NULL,
  `customer_id` INT NOT NULL,
  PRIMARY KEY (`store_id`),
  UNIQUE(`store_name`)
);

INSERT INTO `Personal_Store` (`store_id`, `store_name`, `store_description`, `creator_bio`, `customer_id`) VALUES
(12, 'TestStore', 'Description here', 'bio here', 100005);

CREATE TABLE `ref_invoice_status`
(
  `invoice_status_code` VARCHAR(2) NOT NULL,
  `invoice_status_description` TEXT NOT NULL,
  PRIMARY KEY (`invoice_status_code`)
);

INSERT INTO `ref_invoice_status` (`invoice_status_code`, `invoice_status_description`) VALUES
('IS', 'Issued'),
('PD', 'Paid');

CREATE TABLE `Products`
(
  `product_id` INT NOT NULL AUTO_INCREMENT,
  `product_category_code` VARCHAR(7) NOT NULL,
  `product_name` TINYTEXT NOT NULL,
  `product_price` DOUBLE NOT NULL,
  `product_inventory` INT NOT NULL,
  `product_size` VARCHAR(10) NOT NULL,
  `product_description` TEXT NOT NULL,
  `product_image_url` TINYTEXT NOT NULL,
  `product_additional_details` TINYTEXT NOT NULL,
  `store_id` INT NULL,
  PRIMARY KEY (`product_id`)
);

INSERT INTO `products` (`product_id`, `product_category_code`, `product_name`, `product_price`, `product_inventory`, `product_size`, `product_description`, `product_image_url`, `product_additional_details`, `store_id`) VALUES
(708123, 'DICE', 'BLUE D20', 1.99, 32, 'small', 'A single blue 20 sided die', 'images/products/dice0.jpg', '', '12'),
(708124, 'DICE', 'D20 GRAB BAG', 9.99, 75, 'small', '20+ assorted 20 sided dice', 'images/products/dice1.jpg', '', ''),
(708125, 'DICE', 'NORMAL DND SET', 4.99, 43, 'small', 'A d20, a d12, a d10, a d8, a d6, and a d4', 'images/products/dice2.jpg', '', ''),
(708126, 'MOD', 'CHARACTER MODEL SET 1', 55.99, 64, '', 'Assorted character models', 'images/products/mod0.jpg', '', ''),
(708127, 'MOD', 'GREG THE SWORD GUY', 14.99, 74, 'small', 'Greg, a scary man', 'images/products/mod1.jpg', '', ''),
(708128, 'MOD', 'CHARACTER MODEL SET 2', 32.99, 25, '', 'Assorted character models', 'images/products/mod2.jpg', '', ''),
(708129, 'PROP', 'CUSTOMIZABLE SHIP', 68.99, 6, 'large', 'Customizable ship for DnD', 'images/products/prop0.jpg', '', ''),
(708130, 'PROP', 'SCROLL SET', 52.99, 21, 'medium', 'Scrolls sealed with wax', 'images/products/prop1.jpg', '', ''),
(708131, 'PROP', 'DUNGEON', 29.99, 94, 'large', 'Dungeon 3d map', 'images/products/prop2.jpg', '', ''),
(708132, 'CHAR', 'TOM THE ARCHER', 22.99, 45, '', 'He shoots arrows', 'images/products/textproduct.jpg', '', '12'),
(708133, 'CHAR', 'BOB THE WIZARD', 3.69, 68, '', 'Spells and things', 'images/products/textproduct.jpg', '', ''),
(708134, 'CHAR', 'SHARAZARAD THE DESTROYER', 3.69, 16, '', 'Good cook', 'images/products/textproduct.jpg', '', '12'),
(708135, 'RULE', 'BURROWING FOR PATHFINDER', 3.99, 81, '', 'Extended ruleset for Pathfinder', 'images/products/textproduct.jpg', '', ''),
(708136, 'RULE', 'EATING FOR PATHFINDER', 4.49, 74, '', 'Extended ruleset for Pathfinder', 'images/products/textproduct.jpg', '', ''),
(708137, 'RULE', 'DRUNKEN PROPERTIES FOR PATHFINDER', 4.99, 48, '', 'Extended ruleset for Pathfinder', 'images/products/textproduct.jpg', '', ''),
(708138, 'SCEN', 'WITCH HUT', 34.99, 15, '', 'Explore the witch hut', 'images/products/textproduct.jpg', '', ''),
(708139, 'SCEN', 'KIDNAPPED BY ELVES', 31.99, 21, '', 'You get kidnapped by elves', 'images/products/textproduct.jpg', '', ''),
(708140, 'SCEN', 'CHOCOLATE PARTY', 62.99, 96, '', 'Lots of chocolate', 'images/products/textproduct.jpg', '', ''),
(708141, 'CHARART', 'BOB THE BARD', 12.29, 85, '', 'Sings and dances', 'images/products/charart0.jpg', '', ''),
(728140, 'CHARART', 'BELL THE MONK', 32.99, 96, '', 'Not the quiet kind', 'images/products/charart1.jpg', '', ''),
(738140, 'CHARART', 'PALLY THE PALADIN', 12.99, 96, '', 'Not your pal', 'images/products/charart2.jpg', '', ''),
(748140, 'WORLART', 'FORBIDDEN CITY', 27.99, 96, '', 'World art for the Forbidden City', 'images/products/worlart0.jpg', '', '12'),
(758140, 'WORLART', 'EXOTIC LAND', 26.99, 96, '', 'World art for the Exotic Land', 'images/products/worlart1.jpg', '', ''),
(768140, 'WORLART', 'FLOATING ISLAND', 25.99, 96, '', 'World art for the Floating Island', 'images/products/worlart2.jpg', '', ''),
(778140, 'MAPS', 'DUNGEON MAP', 24.99, 96, '', 'Map of a dungeon', 'images/products/maps0.jpg', '', ''),
(788140, 'MAPS', 'TOWN MAP', 23.99, 96, '', 'Map of a town', 'images/products/maps1.jpg', '', ''),
(798140, 'MAPS', 'CITY MAP', 12.99, 96, '', 'Map of a city', 'images/products/maps2.jpg', '', '');

CREATE TABLE `Orders`
(
  `order_id` INT NOT NULL AUTO_INCREMENT,
  `date_order_placed` DATE NOT NULL,
  `order_details` TEXT NULL,
  `customer_id` INT NOT NULL,
  `order_status_code` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`order_id`)
);

CREATE TABLE `Shipping_Items`
(
  `shipping_item_id` INT NOT NULL AUTO_INCREMENT,
  `shipping_item_quantity` INT NOT NULL,
  `shipping_item_price` DOUBLE NOT NULL,
  `shipping_item_status_code` VARCHAR(2) NOT NULL,
  `product_id` INT NOT NULL,
  `order_id` INT NOT NULL,
  PRIMARY KEY (`shipping_item_id`)
 );

CREATE TABLE `Shipment_Items`
(
  `shipment_id` INT NOT NULL AUTO_INCREMENT,
  `shipping_item_id` INT NOT NULL,
  PRIMARY KEY (`shipment_id`)
);

CREATE TABLE `Invoices`
(
  `invoice_id` INT NOT NULL AUTO_INCREMENT,
  `invoice_date` DATE NOT NULL,
  `invoice_details` TEXT NOT NULL,
  `invoice_type` VARCHAR(3) NOT NULL,
  `order_id` INT NOT NULL,
  `invoice_status_code` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`invoice_id`)
);

CREATE TABLE `Payments`
(
  `payment_id` INT NOT NULL AUTO_INCREMENT,
  `payment_date` DATE NOT NULL,
  `payment_amount` DOUBLE NOT NULL,
  `payment_type` VARCHAR(3) NOT NULL,
  `invoice_id` INT NOT NULL,
  PRIMARY KEY (`payment_id`)
);

CREATE TABLE `Store_Shipment`
(
  `shipment_tracking_number` TEXT NOT NULL,
  `shipment_date` DATE NOT NULL,
  `other_shipment_details` INT NOT NULL,
  `shipment_id` INT NOT NULL,
  `store_id` INT NOT NULL,
  PRIMARY KEY (`shipment_id`)
);

CREATE TABLE `Outbound_Shipments`
(
  `shipment_tracking_number` TEXT NOT NULL,
  `shipment_date` DATE NOT NULL,
  `other_shipment_details` INT NOT NULL,
  `shipment_id` INT NOT NULL,
  `order_id` INT NOT NULL,
  `invoice_id` INT NOT NULL,
  PRIMARY KEY (`shipment_id`)
);

