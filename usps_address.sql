-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 02:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usps_address`
--

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `Code` char(2) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`Code`, `Name`) VALUES
('AL', 'ALABAMA'),
('AK', 'ALASKA'),
('AB', 'ALBERTA'),
('AS', 'AMERICAN SAMOA'),
('AZ', 'ARIZONA'),
('AR', 'ARKANSAS'),
('BC', 'BRITISH COLUMBIA'),
('CA', 'CALIFORNIA'),
('PW', 'CAROLINE ISLANDS'),
('CO', 'COLORADO'),
('CT', 'CONNETICUT'),
('DE', 'DELAWARE'),
('DC', 'DISTRICT OF COLUMBIA'),
('FM', 'FEDERATED STATE'),
('FL', 'FLORIDA'),
('GA', 'GEORGIA'),
('GU', 'GUAM'),
('HI', 'HAWAII'),
('ID', 'IDOHA'),
('IL', 'ILLINOIS'),
('IN', 'INDIANA'),
('IA', 'IOWA'),
('KS', 'KANSAS'),
('KY', 'KENTUCKY'),
('LA', 'LOUSIANA'),
('ME', 'MAINE'),
('MB', 'MANITOBA'),
('MP', 'MARIANA ISLANDS'),
('MH', 'MARSHALL ISLANDS'),
('MD', 'MARYLAND'),
('MA', 'MASSACHUSETTS'),
('MI', 'MICHIGAN'),
('MN', 'MINNESOTA'),
('MS', 'MISSISSIPPI'),
('MO', 'MISSOURI'),
('MT', 'MONTANA'),
('NE', 'NEBRASKA'),
('NV', 'NEVADA'),
('NB', 'NEW BRUNSWICK'),
('NH', 'NEW HAMPSHIRE'),
('NJ', 'NEW JERSEY'),
('NM', 'NEW MEXICO'),
('NY', 'NEW YORK'),
('NF', 'NEWFOUNDLAND'),
('NC', 'NORTH CAROLINA'),
('ND', 'NORTH DAKOTA'),
('NT', 'NORTHWEST TERRITORIES'),
('NS', 'NOVA SCOTIA'),
('NU', 'NUNAVUT'),
('OH', 'OHIO'),
('OK', 'OKLAHOMA'),
('ON', 'ONTARIO'),
('OR', 'OREGON'),
('PA', 'PENNSYLVANIA'),
('PE', 'PRINCE EDWARD ISLAND'),
('PR', 'PUERTO RICO'),
('PQ', 'QUEBEC'),
('RI', 'RHODE ISLAND'),
('SK', 'SASKATCHEWAN'),
('SC', 'SOUTH CAROLINA'),
('SD', 'SOUTH DAKOTA'),
('TN', 'TENNESSEE'),
('TX', 'TEXAS'),
('UT', 'UTAH'),
('VT', 'VERMONT'),
('VI', 'VIRGIN ISLANDS'),
('VA', 'VIRGINIA'),
('WA', 'WASHINGTON'),
('WV', 'WEST VIRGINIA'),
('WI', 'WISCONSIN'),
('WY', 'WYOMING'),
('YT', 'YUKON TERRITORY'),
('AE', 'ARMED FORCES - EUROPE'),
('AA', 'ARMED FORCES - AMERICAS'),
('AP', 'ARMED FORCES - PACIFIC');

-- --------------------------------------------------------

--
-- Table structure for table `usps_addresses`
--

CREATE TABLE `usps_addresses` (
  `id` int(11) NOT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usps_addresses`
--

INSERT INTO `usps_addresses` (`id`, `address`) VALUES
(6, 'Address Line1: STE 6100\r\nAddress Line2: 185 BERRY ST\r\nCity: SAN FRANCISCO\r\nState: CALIFORNIA\r\nZip Code: 94107'),
(7, 'Address Line1: STE 6100\r\nAddress Line2: 185 BERRY ST\r\nCity: SAN FRANCISCO\r\nState: CALIFORNIA\r\nZip Code: 94107'),
(8, 'Address Line1: Suite 6100\r\nAddress Line2: 185 Berry Sts\r\nCity: San Francisco\r\nState: CALIFORNIA\r\nZip Code: 94556');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usps_addresses`
--
ALTER TABLE `usps_addresses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usps_addresses`
--
ALTER TABLE `usps_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
