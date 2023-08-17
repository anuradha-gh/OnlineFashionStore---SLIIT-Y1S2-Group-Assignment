-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 03:26 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ofs2`
--

-- --------------------------------------------------------

--
-- Table structure for table `addtocart`
--

CREATE TABLE `addtocart` (
  `CartID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addtowishlist`
--

CREATE TABLE `addtowishlist` (
  `UserID` int(11) NOT NULL,
  `WishlistID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminUN` varchar(50) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminUN`, `Name`, `Password`) VALUES
('admin', 'Sasanka', '$2a$04$GEfuKb4duNsHQgFkn41qieX95bVoUdbdxITK2A2hfhIOJ/emOXp9W');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Size` varchar(5) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `TotalAmount` int(11) DEFAULT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CartID`, `ProductName`, `Image`, `Size`, `Price`, `Quantity`, `TotalAmount`, `UserID`) VALUES
(1, 'Gini & jony Gils Printed tops', 'uploads/girlsPrintedTop.jpg', 'M', 3000, 1, 3000, 4),
(2, 'Polo Crew Neck Printed', 'uploads/Polocrewprint.jpg', 'L', 1290, 1, 1290, 4),
(3, 'Mid Waist Blue Jean', 'uploads/bluejean.jpg', 'L', 6990, 1, 6990, 3),
(4, 'Junior George’s casual shirt', 'uploads/casualShirt.jpg', 'M', 1500, 2, 3000, 1),
(5, 'Gini & jony Gils Printed tops', 'uploads/girlsPrintedTop.jpg', 'M', 3000, 1, 3000, 5),
(23, 'Gini & jony Gils Printed tops', 'uploads/girlsPrintedTop.jpg', 'M', 3000, 1, 3000, 4),
(24, 'Women’s Chino Short Camel', 'uploads/ChinoShortCamel.jpg', 'M', 1890, 4, 7560, 4),
(25, 'Poster Logo Cap', 'uploads/Levicap.jpg', 'S', 690, 1, 690, 2),
(26, 'Gini & jony Gils Printed tops', 'uploads/girlsPrintedTop.jpg', 'M', 3000, 1, 3000, 6),
(28, 'Gini & jony Gils Printed tops', 'uploads/girlsPrintedTop.jpg', 'M', 3000, 5, 15000, 4),
(29, 'Polo Crew Neck Printed', 'uploads/Polocrewprint.jpg', 'L', 1290, 2, 2580, 3),
(30, 'Mid Waist Blue Jean', 'uploads/bluejean.jpg', 'L', 6990, 1, 6990, 3),
(31, 'Polo Crew Neck Printed', 'uploads/Polocrewprint.jpg', 'L', 1290, 1, 1290, 1),
(32, 'akila', 'uploads/11111111.jpg', 'L', 20000, 5, 100000, 1),
(33, 'akila', 'uploads/11111111.jpg', 'L', 20000, 1, 20000, 1),
(34, 'Adidas X_PLR', 'uploads/adidassport.jpg', 'NA', 19000, 1, 19000, 7),
(35, 'Men’s Sports Watch', 'uploads/Gshock.jpg', 'NA', 2490, 1, 2490, 7),
(36, 'Poster Logo Cap', 'uploads/Levicap.jpg', 'S', 690, 5, 3450, 7),
(37, 'Women’s Chino Short Camel', 'uploads/ChinoShortCamel.jpg', 'M', 1890, 1, 1890, 7);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FID` int(11) NOT NULL,
  `Comment` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `slevel` int(11) DEFAULT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `AdminUN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FID`, `Comment`, `Date`, `slevel`, `UserID`, `ProductID`, `AdminUN`) VALUES
(1, 'aaaaa', '2023-06-07 09:28:21', 4, 2, 1, 'admin'),
(2, 'very good', '2023-06-07 09:31:06', 5, 1, 2, 'admin'),
(3, 'good', '2023-06-07 11:41:58', 4, 1, 2, 'admin'),
(4, 'd', '2023-06-07 11:43:24', 4, 1, 2, 'admin'),
(5, 'Good Item', '2023-06-07 16:20:10', 4, 4, 4, 'admin'),
(6, 'This product exceeded my expectations. The quality is great, and it fits perfectly.', '2023-06-08 21:14:13', 4, 4, 5, 'admin'),
(7, 'bad product not satisfied', '2023-06-08 21:24:49', 1, 4, 4, 'admin'),
(8, '12/12, mildstone, Hawaii', '2023-06-09 16:28:22', 5, 4, 5, 'admin'),
(10, 'good item ,satisfied', '2023-06-12 05:55:41', 3, 7, 25, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `BillingAddress` varchar(255) NOT NULL,
  `Quantity` int(11) DEFAULT 1,
  `PaymentMethod` varchar(30) NOT NULL,
  `OrderDate` datetime NOT NULL DEFAULT current_timestamp(),
  `OrderStatus` varchar(30) DEFAULT 'Pending',
  `UserID` int(11) NOT NULL,
  `AdminUN` varchar(50) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `Amount`, `BillingAddress`, `Quantity`, `PaymentMethod`, `OrderDate`, `OrderStatus`, `UserID`, `AdminUN`, `ProductID`) VALUES
(1, 3000, '21/56, valinton, New Zealand', 2, 'CashOnDelivery', '2023-06-06 19:18:58', 'Cancelled', 1, 'admin', 2),
(2, 2290, '67/453D, Youngland, Westly, U.S', 1, 'DebitCard', '2023-06-06 19:18:58', 'Pending', 2, 'admin', 1),
(3, 6990, '12/12, mildstone, HawaiiMildstone', 1, 'DebitCard', '2023-06-06 19:18:58', 'Pending', 3, 'admin', 3),
(4, 3000, '7/90/B, hamiltonvaley, Germany', 1, 'CashOnDelivery', '2023-06-06 19:18:58', 'Cancelled', 4, 'admin', 4),
(5, 3000, '89A, george E. Silva RD, Colombo, Sri lanka', 1, 'CashOnDelivery', '2023-06-06 19:18:58', 'Pending', 5, 'admin', 4),
(6, 1290, '7/90/B, hamiltonvaley, Germany', 1, 'CashOnDelivery', '2023-06-06 19:18:58', 'Pending', 4, 'admin', 5),
(13, 15000, '12/12, mildstone, Hawaii', 5, 'CreditDebitCard', '2023-06-10 00:03:42', 'Pending', 4, 'admin', 4),
(14, 2580, '67/453D, Youngland, Westly, U.S', 2, 'CreditDebitCard', '2023-06-10 00:37:20', 'Pending', 3, 'admin', 5),
(15, 2580, '67/453D, Youngland, Westly, U.S', 2, 'Paypal', '2023-06-10 00:39:34', 'Pending', 3, 'admin', 5),
(16, 2580, '67/453D, Youngland, Westly, U.S', 2, 'Paypal', '2023-06-10 00:41:08', 'Pending', 3, 'admin', 5),
(17, 2580, '67/453D, Youngland, Westly, U.S', 2, 'Paypal', '2023-06-10 00:41:53', 'Pending', 3, 'admin', 5),
(18, 2580, '67/453D, Youngland, Westly, U.S', 2, 'CreditDebitCard', '2023-06-10 00:41:56', 'Pending', 3, 'admin', 5),
(19, 3000, '67j test riad test', 1, 'CreditDebitCard', '2023-06-10 00:46:56', 'Pending', 6, 'admin', 4),
(20, 3000, '67j test riad test', 1, 'CreditDebitCard', '2023-06-10 00:53:02', 'Confirmed', 6, 'admin', 4),
(21, 6990, '67/453D, Youngland, Westly, U.S', 1, 'Paypal', '2023-06-10 01:00:05', 'Confirmed', 3, 'admin', 3),
(22, 3000, '89A, george E. Silva RD, Colombo, Sri lanka', 2, 'Paypal', '2023-06-10 09:47:13', 'Pending', 1, 'admin', 2),
(23, 1290, '89A, george E. Silva RD, Colombo, Sri lanka', 1, 'CreditDebitCard', '2023-06-11 11:48:59', 'Confirmed', 1, 'admin', 5),
(25, 1290, '89A, george E. Silva RD, Colombo, Sri lanka', 1, 'CreditDebitCard', '2023-06-12 02:00:11', 'Pending', 1, 'admin', 5),
(26, 2490, 'kafjkajkfj,\r\ngjshg\r\nifsingdfg', 1, 'CashOnDelivery', '2023-06-12 05:46:05', 'Pending', 7, 'admin', 22),
(27, 2490, 'kafjkajkfj,\r\ngjshg\r\nifsingdfg', 1, 'CashOnDelivery', '2023-06-12 05:50:54', 'Pending', 7, 'admin', 22),
(28, 3450, 'arisona', 5, 'CreditDebitCard', '2023-06-12 05:51:31', 'Pending', 7, 'admin', 7),
(29, 1890, 'arisona', 1, 'Paypal', '2023-06-12 05:53:51', 'Pending', 7, 'admin', 10),
(30, 1250, 'arisona', 1, 'CreditDebitCard', '2023-06-12 05:54:48', 'Confirmed', 7, 'admin', 25);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ProductDesc` varchar(500) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `Price` int(11) NOT NULL,
  `Brand` varchar(30) DEFAULT NULL,
  `Size` varchar(5) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `SubCategory` varchar(50) DEFAULT NULL,
  `Availability` varchar(30) DEFAULT 'InStock',
  `AdminUN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `ProductDesc`, `filename`, `filepath`, `Price`, `Brand`, `Size`, `Category`, `SubCategory`, `Availability`, `AdminUN`) VALUES
(1, 'High Neck Rib Maroon Crop Tee', 'Material:Knit,Color: Maroon Rib,Style', 'MaroonCropTee.jpg', 'uploads/MaroonCropTee.jpg', 2290, 'Moose', 'L', 'women', 'tshirt', 'InStock', 'admin'),
(2, 'Junior George’s casual shirt', 'Casual shirt Material: Cotton', 'casualShirt.jpg', 'uploads/casualShirt.jpg', 1500, 'Junior George’s', 'M', 'kids', 'boys', 'InStock', 'admin'),
(3, 'Mid Waist Blue Jean', 'Material: Denim,Color: Blue,Style Jean', 'bluejean.jpg', 'uploads/bluejean.jpg', 6990, 'TiTo', 'L', 'women', 'trousers', 'InStock', 'admin'),
(4, 'Gini & jony Gils Printed tops', 'Girls Printed T-Shirt,Material:Cotton', 'girlsPrintedTop.jpg', 'uploads/girlsPrintedTop.jpg', 3000, 'Gini & Jony', 'M', 'kids', 'girls', 'OutOfStock', 'admin'),
(5, 'Polo Crew Neck Printed', 'Crew Neck T-shirtShort Sleeve Slim Fit Casual Wear', 'Polocrewprint.jpg', 'uploads/Polocrewprint.jpg', 1290, 'Polo', 'L', 'men', 'tshirt', 'InStock', 'admin'),
(6, 'Nike Airforce 2', 'The Nike Air Force 1 Low White', 'nikeairforce1.jpg', 'uploads/nikeairforce1.jpg', 16999, 'Nike', 'NA', 'men', 'footwear', 'InStock', 'admin'),
(7, 'Poster Logo Cap', 'Poster Logo Cap', 'Levicap.jpg', 'uploads/Levicap.jpg', 690, 'Levi’s', 'S', 'men', 'accessories', 'InStock', 'admin'),
(8, 'Vneck Twisted Waist Yellow Printed Dress', 'Vneck Twisted Waist Yellow Printed Dress', 'YellowPrintedDress.jpg', 'uploads/YellowPrintedDress.jpg', 5990, 'ZigZag', 'L', 'women', 'frock', 'InStock', 'admin'),
(9, 'Tommy tapered fit indigo wash jean ', 'Tommy tapered fit indigo wash jean ', 'taperedfitdenim.jpg', 'uploads/taperedfitdenim.jpg', 5400, 'Tommy Hilfiger', 'S', 'men', 'trousers', 'InStock', 'admin'),
(10, 'Women’s Chino Short Camel', 'Women’s Chino Short Camel', 'ChinoShortCamel.jpg', 'uploads/ChinoShortCamel.jpg', 1890, 'Moose', 'M', 'women', 'short', 'InStock', 'admin'),
(14, 'Formal Black Blazer Dress', 'Material: Cotton/Polyester\r\nColor: Black\r\n\r\nFit Type: Regular Fit\r\n\r\nStretch: Slight Stretch\r\nStyle: Short sleeves, Overlapped front, Skater dress', 'Black Blazer Dress.jpg', 'uploads/Black Blazer Dress.jpg', 5490, 'zigzag', 'M', 'female', 'frock', 'InStock', 'admin'),
(15, 'Sleeveless Mini Floral Dress', 'Material: Polyester/Elastane\r\nColor: Navy Blue\r\n\r\nFit Type: Regular\r\n\r\nStretch: Non Stretch\r\nStyle: Sleeveless, Mini dress, Round neck', 'Mini Floral Dress.jpg', 'uploads/Mini Floral Dress.jpg', 4190, 'zigzag', 'M', 'female', 'frock', 'InStock', 'admin'),
(16, 'Moose crew neck slim fit', 'Crew Neck T-shirt\r\nShort Sleeve,Slim FitCasual Wear\r\nMaterial Composition:100% Cotton\r\n', 'Moosecrewneck.jpg', 'uploads/Moosecrewneck.jpg', 990, 'moose', 'L', 'men', 'tshirt', 'InStock', 'admin'),
(17, 'Moose men’s chino pants', 'Trouser\r\nWaist: Mid-Rise\r\nSlim Fit\r\n•	Type of pleat: Flat front\r\nMaterial Composition:98% Cotton & 5% Spandex\r\n', 'moosechinopant.jpg', 'uploads/moosechinopant.jpg', 3290, 'moose', 'M', 'men', 'trouser', 'InStock', 'admin'),
(18, 'Junior George’s Long sleeve crewneck ', '1.	Casual   T-shirt\r\n•	Material :100% Cotton\r\n•	Color: green/Orange/Gray\r\n•	Size: 1yr,2yrs,3yrs,4yrs and above\r\n', 'crewNeck.webp', 'uploads/crewNeck.webp', 1000, 'Junior George’s', 'S', 'kids', 'boys', 'InStock', 'admin'),
(19, 'MotherCare Shorts', 'Shorts\r\n	1.	Shorts \r\n•	Material:100% Cotton\r\n•	Color: Purple/White/light blue\r\n•	Size: 1yr,2yrs,3yrs,4yrs and above\r\n	motherCareShort.jpeg	Rs.5500.00	Mother care\r\n	Kids	Boys	InStock\r\n', 'motherCareShort.jpeg', 'uploads/motherCareShort.jpeg', 5490, 'Mother Care', 'XS', 'kids', 'girls', 'InStock', 'admin'),
(20, 'Basic Crew Neck Long Sleeve Gray Tshirt', 'Material: Knit\r\nColor: Gray Marl\r\nStyle: Long sleeve, crew neck', 'Sleeve Gray Tshirt.jpg', 'uploads/Sleeve Gray Tshirt.jpg', 2990, 'moose', 'M', 'female', 'tshirt', 'InStock', 'admin'),
(21, 'Vneck Strappy Holiday Dress', 'Material: Polyester\r\nColor: Beige\r\nStyle: Vneck, Shoulder straps, Skater dress', 'Holiday Dress.jpg', 'uploads/Holiday Dress.jpg', 4990, 'zigzag', 'S', 'female', 'frock', 'InStock', 'admin'),
(22, 'Men’s Sports Watch', '•	Digital Time\r\n•	100% High Quality\r\n•	Movement: Digital\r\n•	EL Backlight\r\n•	1/100sec Hour Format\r\n•	30m-50m water resistance\r\n', 'Gshock.jpg', 'uploads/Gshock.jpg', 2490, 'Casio', 'NA', 'men', 'watches', 'InStock', 'admin'),
(23, 'High Waist Light Whiskers Black Jean', 'Material: Denim\r\nColor: Black\r\nStyle: High Waist, Light Whiskers, 3 buttons, jean ', 'Whiskers Black Jean.jpg', 'uploads/Whiskers Black Jean.jpg', 6990, 'tito', 'M', 'female', 'trouser', 'InStock', 'admin'),
(24, 'Adidas X_PLR', 'Adidas X_PLR Shoes. A minimalist style brings modern looks to ', 'adidassport.jpg', 'uploads/adidassport.jpg', 19000, 'adidas', 'NA', 'men', 'footwear', 'InStock', 'admin'),
(25, 'H & M Boys Sunglass', '1.	Sunglasses with frames\r\n2.	Sidepieces in plastic\r\n3.	Tinted & UV-protective plastic lenses.\r\n4.	Color: Black, Solid Color\r\n', 'hmSunglass.jpeg', 'uploads/hmSunglass.jpeg', 1250, 'h & m', 'NA', 'kids', 'boys', 'InStock', 'admin'),
(26, 'H & M Cotton Bucket Hat', '1.	Bucket hat in cotton twill with embroidered eyelets and a sloping brim\r\n2.	Color: Light Pink, Solid color\r\n3.	Material: 100% Cotton & Twill\r\n', 'hmBucketHat.jpeg', 'uploads/hmBucketHat.jpeg', 1590, 'h & m', 'NA', 'kids', 'girls', 'InStock', 'admin'),
(27, 'Scoop Neck Rib Red Tee', 'Material: Knit\r\nColor: Red\r\nStyle: Sleeveless, Scoop neck', 'Rib Red Tee.jpg', 'uploads/Rib Red Tee.jpg', 2190, 'moose', 'L', 'female', 'tshirt', 'OutOfStock', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `purchasedproducts`
--

CREATE TABLE `purchasedproducts` (
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` int(11) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(50) NOT NULL,
  `PostalCode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `DOB`, `Gender`, `Email`, `Phone`, `Password`, `Address`, `City`, `PostalCode`) VALUES
(1, 'Aroshana', 'Dissanayke', '2001-04-16', 'Male', 'aroshana@gmail.com', 60888, '$2a$04$9yoZQ9NwRanovP5OeXR44OSv8Aaarp4EPEz1HutAVJgXAj.62Z1Ka', '89A, george E. Silva RD, Colombo, Sri lanka', 'Colombo', 7006),
(2, 'Hansamalee', 'Ekanayake', '2000-06-30', 'Female', 'hansalee@gmail.com', 990888, '$2a$04$9rBs/oJJd2l9joCiQiLFUe0LNDhpFEQDFTXSVcCPhSeICETdjSNMu', '21/56, valinton, New Zealand', 'Valinton', 7788),
(3, 'Akila', 'Pathum', '2001-11-02', 'Male', 'akila@gmail.com', 9088887, '$2a$04$X618QedSKSQv9Yi9FzcTweeARdiGqydVJvUbGKGzltZ/GzfZ.x/K2', '67/453D, Youngland, Westly, U.S', 'Westly', 9988),
(4, 'Anura', 'Bandara', '2001-08-09', 'Male', 'anuradha@gmail.com', 80888, '$2a$04$t04avF3WF1kseGxzfGvNDe2eB5nW4iZGsQkt2xAjcXqXPs.nUpk1e', '12/12, mildstone, Hawaii', 'Mildstone', 7676),
(5, 'Achira', 'Rathnayake', '2000-04-16', 'Male', 'achira@gmail.com', 7888, '$2a$04$qo7DJol8A3w16Vh2fIqBUexeSETMBHFb7T1eGLnp8Xzo./iNO0fCS', '7/90/B, hamiltonvaley, Germany', 'Hamiltonvaley', 7006),
(6, 'Reshmi', 'Gamage', '2004-01-15', 'Female', 'testing@gmail.com', 5677, '$2y$10$WEZnsyjWAxab3tA.Cv0LOOi00bJ64OtqaDIws8QfoxqufNPVvgXwq', '67j test riad test', 'Soul', 678),
(7, 'Hrithik', 'Roshan', '1995-06-21', 'Male', 'hr@in.com', 89007, '$2y$10$ioY9OqXNKaS4owLJnVcAOexgNsx1zlz6JSkMykp97Qaeeufjr99a2', 'arisona', 'mumbai', 6969);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `WishlistID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Availability` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`WishlistID`, `UserID`, `ProductName`, `Image`, `Price`, `Availability`) VALUES
(1, 4, 'Gini & jony Gils Printed tops', 'uploads/girlsPrintedTop.jpg', 3000, 'InStock'),
(2, 4, 'Polo Crew Neck Printed', 'uploads/Polocrewprint.jpg', 1290, 'InStock'),
(3, 3, 'Mid Waist Blue Jean', 'uploads/bluejean.jpg', 6990, 'InStock'),
(4, 1, 'Junior George’s casual shirt', 'uploads/casualShirt.jpg', 1500, 'InStock'),
(5, 5, 'Gini & jony Gils Printed tops', 'uploads/girlsPrintedTop.jpg', 3000, 'InStock'),
(14, 4, 'Gini & jony Gils Printed tops', 'uploads/girlsPrintedTop.jpg', 3000, 'OutOfStock'),
(15, 4, 'Polo Crew Neck Printed', 'uploads/Polocrewprint.jpg', 1290, 'InStock'),
(17, 7, 'Scoop Neck Rib Red Tee', 'uploads/Rib Red Tee.jpg', 2190, 'InStock');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addtocart`
--
ALTER TABLE `addtocart`
  ADD PRIMARY KEY (`CartID`,`ProductID`),
  ADD KEY `AddToCart2_FK` (`ProductID`);

--
-- Indexes for table `addtowishlist`
--
ALTER TABLE `addtowishlist`
  ADD PRIMARY KEY (`UserID`,`WishlistID`,`ProductID`),
  ADD KEY `WishlistProduct_FK` (`ProductID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminUN`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `CartUser_FK` (`UserID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FID`),
  ADD KEY `FUser_FK` (`UserID`),
  ADD KEY `FProductSize_FK` (`ProductID`),
  ADD KEY `FAdmin_FK` (`AdminUN`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `OrderUser_FK` (`UserID`),
  ADD KEY `OrderAdmin_FK` (`AdminUN`),
  ADD KEY `OrderProduct_FK` (`ProductID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `ProductAdmin_FK` (`AdminUN`);

--
-- Indexes for table `purchasedproducts`
--
ALTER TABLE `purchasedproducts`
  ADD PRIMARY KEY (`UserID`,`ProductID`),
  ADD KEY `PProduct_FK` (`ProductID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`WishlistID`,`UserID`),
  ADD KEY `WUser_FK` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `WishlistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addtocart`
--
ALTER TABLE `addtocart`
  ADD CONSTRAINT `AddToCart1_FK` FOREIGN KEY (`CartID`) REFERENCES `cart` (`CartID`),
  ADD CONSTRAINT `AddToCart2_FK` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Constraints for table `addtowishlist`
--
ALTER TABLE `addtowishlist`
  ADD CONSTRAINT `WishlistProduct_FK` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `WishlistUser_FK` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `CartUser_FK` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FAdmin_FK` FOREIGN KEY (`AdminUN`) REFERENCES `admin` (`AdminUN`) ON DELETE CASCADE,
  ADD CONSTRAINT `FProductSize_FK` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE,
  ADD CONSTRAINT `FUser_FK` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `OrderAdmin_FK` FOREIGN KEY (`AdminUN`) REFERENCES `admin` (`AdminUN`) ON DELETE CASCADE,
  ADD CONSTRAINT `OrderProduct_FK` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE,
  ADD CONSTRAINT `OrderUser_FK` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `ProductAdmin_FK` FOREIGN KEY (`AdminUN`) REFERENCES `admin` (`AdminUN`) ON DELETE CASCADE;

--
-- Constraints for table `purchasedproducts`
--
ALTER TABLE `purchasedproducts`
  ADD CONSTRAINT `PProduct_FK` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `PUser_FK` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `WUser_FK` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
