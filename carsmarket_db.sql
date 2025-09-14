-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2025 at 05:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carsmarket_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maker_id` bigint(20) UNSIGNED NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `vin` varchar(255) NOT NULL,
  `mileage` int(11) NOT NULL,
  `car_type_id` bigint(20) UNSIGNED NOT NULL,
  `fuel_type_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `description` longtext DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `maker_id`, `model_id`, `year`, `price`, `vin`, `mileage`, `car_type_id`, `fuel_type_id`, `user_id`, `city_id`, `address`, `phone`, `description`, `published_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(72, 4, 59, 2024, 55000, '55dfgsdfg', 152, 13, 2, 5, 55, 'test address', '76137263', 'test description', '2025-04-04 16:52:39', '2025-04-04 16:52:39', '2025-04-04 16:52:39', NULL),
(73, 5, 69, 2025, 50000, '159jdd', 400, 10, 2, 5, 36, 'test address 2', '76137263', 'test description 2', '2025-04-21 14:03:51', '2025-04-04 16:53:29', '2025-04-26 16:18:56', NULL),
(75, 3, 32, 2025, 60000, '54cvgd', 500, 13, 2, 5, 45, 'dsd', '5646464', 'kjdsg', '2025-04-27 14:46:37', '2025-04-27 14:46:37', '2025-04-27 14:46:37', NULL),
(76, 2, 16, 2018, 1000, '55dfgsdfg', 400, 2, 2, 5, 87, 'das', '6576257', 'ccccccccccc', '2025-04-28 14:53:23', '2025-04-28 14:53:23', '2025-04-28 14:53:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `car_features`
--

CREATE TABLE `car_features` (
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `abs` tinyint(1) NOT NULL DEFAULT 0,
  `air_conditioning` tinyint(1) NOT NULL DEFAULT 0,
  `power_windows` tinyint(1) NOT NULL DEFAULT 0,
  `power_door_locks` tinyint(1) NOT NULL DEFAULT 0,
  `cruise_control` tinyint(1) NOT NULL DEFAULT 0,
  `bluetooth_connectivity` tinyint(1) NOT NULL DEFAULT 0,
  `remote_start` tinyint(1) NOT NULL DEFAULT 0,
  `gps_navigation` tinyint(1) NOT NULL DEFAULT 0,
  `heated_seats` tinyint(1) NOT NULL DEFAULT 0,
  `climate_control` tinyint(1) NOT NULL DEFAULT 0,
  `rear_parking_sensors` tinyint(1) NOT NULL DEFAULT 0,
  `leather_seats` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_features`
--

INSERT INTO `car_features` (`car_id`, `abs`, `air_conditioning`, `power_windows`, `power_door_locks`, `cruise_control`, `bluetooth_connectivity`, `remote_start`, `gps_navigation`, `heated_seats`, `climate_control`, `rear_parking_sensors`, `leather_seats`) VALUES
(66, 1, 1, 1, 0, 1, 0, 0, 0, 1, 1, 1, 0),
(67, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0),
(68, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(69, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(70, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0),
(71, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0),
(72, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(73, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 1),
(75, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 0),
(76, 1, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `car_images`
--

CREATE TABLE `car_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_images`
--

INSERT INTO `car_images` (`id`, `car_id`, `image_path`, `position`) VALUES
(20, 72, 'cars/1743796359_5/1743796359_m5-exterior-right-front-three-quarter-10.webp', 1),
(21, 72, 'cars/1743796359_5/1743796359_Satin Frozen F90 M5 Modified image1-1.jpeg', 2),
(22, 73, 'cars/1743796409_5/1743796409_210302sclassjl_0063.jpg', 1),
(23, 73, 'cars/1743796409_5/1743796409_y2ehbua_1541075-ezgif.com-webp-to-jpg-converter.jpg', 2),
(26, 75, 'cars/1745775997_5/1745775997_Hennessey-2024-Ford-Mustang-GT-for-Sale-Black-0554-2.webp', 1),
(27, 75, 'cars/1745775997_5/1745775997_m5-exterior-right-front-three-quarter-10.webp', 2),
(34, 76, 'cars/1745862803_5/1745862803_Honda_Civic_e-HEV_Sport_(XI)_–_f_30062024.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `car_types`
--

CREATE TABLE `car_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_types`
--

INSERT INTO `car_types` (`id`, `name`) VALUES
(1, 'SUV'),
(2, 'Sedan'),
(3, 'Coupe'),
(4, 'Hatchback'),
(5, 'Convertible'),
(6, 'Pickup Truck'),
(7, 'Minivan'),
(8, 'Wagon'),
(9, 'Crossover'),
(10, 'Luxury Car'),
(11, 'Electric Vehicle (EV)'),
(12, 'Hybrid Car'),
(13, 'Sports Car'),
(14, 'Off-Road Vehicle'),
(15, 'Compact Car');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`) VALUES
(1, 1, 'Achrafieh'),
(2, 1, 'Hamra'),
(3, 1, 'Ain El Mreisseh'),
(4, 1, 'Ras Beirut'),
(5, 1, 'Mazraa'),
(6, 1, 'Bashoura'),
(7, 1, 'Mar Mikhael'),
(8, 1, 'Gemmayzeh'),
(9, 1, 'Sodeco'),
(10, 1, 'Verdun'),
(11, 1, 'Badaro'),
(12, 1, 'Kantari'),
(13, 1, 'Zokak El Blat'),
(14, 1, 'Manara'),
(15, 1, 'Tariq El Jdideh'),
(16, 2, 'Baabda'),
(17, 2, 'Jounieh'),
(18, 2, 'Aley'),
(19, 2, 'Chouf'),
(20, 2, 'Bikfaya'),
(21, 2, 'Dahr El Sawan'),
(22, 2, 'Broummana'),
(23, 2, 'Beit Mery'),
(24, 2, 'Damour'),
(25, 2, 'Zouk Mosbeh'),
(26, 2, 'Jal El Dib'),
(27, 2, 'Dbayeh'),
(28, 2, 'Ain Saadeh'),
(29, 2, 'Keserwan'),
(30, 2, 'Bhamdoun'),
(31, 3, 'Tripoli'),
(32, 3, 'Mina'),
(33, 3, 'Beddawi'),
(34, 3, 'Zgharta'),
(35, 3, 'Koura'),
(36, 3, 'Batroun'),
(37, 3, 'Bsharri'),
(38, 3, 'Amioun'),
(39, 3, 'Anfeh'),
(40, 3, 'Chekka'),
(41, 3, 'Qoubaiyat'),
(42, 3, 'Sir El Dennieh'),
(43, 3, 'Minyara'),
(44, 3, 'Marmarita'),
(45, 3, 'Deddeh'),
(46, 4, 'Halba'),
(47, 4, 'Berkayel'),
(48, 4, 'Rahbeh'),
(49, 4, 'Khirbet Daoud'),
(50, 4, 'Qoubaiyat'),
(51, 4, 'Beino'),
(52, 4, 'Akkar El Atiqa'),
(53, 4, 'Saidnaya'),
(54, 4, 'Fnaydeq'),
(55, 4, 'Qammoua'),
(56, 4, 'Meshmesh'),
(57, 4, 'Menjez'),
(58, 4, 'Tikrit'),
(59, 4, 'Sammouniyeh'),
(60, 4, 'Kfar Melki'),
(61, 5, 'Zahle'),
(62, 5, 'Rayak'),
(63, 5, 'Taanayel'),
(64, 5, 'Ferzol'),
(65, 5, 'Anjar'),
(66, 5, 'Bar Elias'),
(67, 5, 'Chtaura'),
(68, 5, 'Riyak'),
(69, 5, 'Ksara'),
(70, 5, 'Jdita'),
(71, 5, 'Kfarzabad'),
(72, 5, 'Temnin El Tahta'),
(73, 5, 'Kamed El Loz'),
(74, 5, 'Makse'),
(75, 5, 'Qabb Elias'),
(76, 6, 'Baalbek'),
(77, 6, 'Hermel'),
(78, 6, 'Ras Baalbek'),
(79, 6, 'Deir El Ahmar'),
(80, 6, 'Labweh'),
(81, 6, 'Brital'),
(82, 6, 'Nabi Chit'),
(83, 6, 'Talia'),
(84, 6, 'Ain Bourday'),
(85, 6, 'Qaa'),
(86, 6, 'Younine'),
(87, 6, 'Taraya'),
(88, 6, 'Chmistar'),
(89, 6, 'Boudai'),
(90, 6, 'Jdeideh'),
(91, 7, 'Sidon'),
(92, 7, 'Tyre'),
(93, 7, 'Jezzine'),
(94, 7, 'Qana'),
(95, 7, 'Sarafand'),
(96, 7, 'Aadloun'),
(97, 7, 'Hariss'),
(98, 7, 'Ain Baal'),
(99, 7, 'Dibbine'),
(100, 7, 'Zahrani'),
(101, 7, 'Bint Jbeil'),
(102, 7, 'Deir Mimas'),
(103, 7, 'Majdal Zoun'),
(104, 7, 'Tayr Debba'),
(105, 7, 'Marwahin'),
(106, 8, 'Nabatieh'),
(107, 8, 'Kfar Kila'),
(108, 8, 'Houla'),
(109, 8, 'Marjayoun'),
(110, 8, 'Bint Jbeil'),
(111, 8, 'Tibnine'),
(112, 8, 'Khiam'),
(113, 8, 'Qabrikha'),
(114, 8, 'Deir Seriane'),
(115, 8, 'Adchit'),
(116, 8, 'Habbouch'),
(117, 8, 'Zawtar'),
(118, 8, 'Yater'),
(119, 8, 'Ansar'),
(120, 8, 'Harouf');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourite_cars`
--

CREATE TABLE `favourite_cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourite_cars`
--

INSERT INTO `favourite_cars` (`id`, `car_id`, `user_id`) VALUES
(26, 72, 5);

-- --------------------------------------------------------

--
-- Table structure for table `fuel_types`
--

CREATE TABLE `fuel_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fuel_types`
--

INSERT INTO `fuel_types` (`id`, `name`) VALUES
(1, 'Gasoline'),
(2, 'Diesel'),
(3, 'Electric'),
(4, 'Hybrid');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `makers`
--

CREATE TABLE `makers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `makers`
--

INSERT INTO `makers` (`id`, `name`) VALUES
(1, 'Toyota'),
(2, 'Honda'),
(3, 'Ford'),
(4, 'BMW'),
(5, 'Mercedes-Benz'),
(6, 'Nissan');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_28_183830_create_car_types_table', 1),
(5, '2025_03_28_184012_create_fuel_types_table', 1),
(6, '2025_03_28_190736_create_makers_table', 1),
(7, '2025_03_28_190751_create_models_table', 1),
(8, '2025_03_28_190806_create_states_table', 1),
(9, '2025_03_28_190827_create_cities_table', 1),
(10, '2025_03_28_191608_create_cars_table', 1),
(11, '2025_03_28_191625_create_car_features_table', 1),
(12, '2025_03_28_193809_create_car_images_table', 1),
(13, '2025_03_28_193953_create_favourite_cars_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maker_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `maker_id`, `name`) VALUES
(1, 1, 'Corolla'),
(2, 1, 'Camry'),
(3, 1, 'Yaris'),
(4, 1, 'Hilux'),
(5, 1, 'Land Cruiser'),
(6, 1, 'RAV4'),
(7, 1, 'Highlander'),
(8, 1, 'Fortuner'),
(9, 1, 'Tacoma'),
(10, 1, 'Tundra'),
(11, 1, 'C-HR'),
(12, 1, 'Supra'),
(13, 1, 'Avalon'),
(14, 1, 'Sienna'),
(15, 1, '4Runner'),
(16, 2, 'Civic'),
(17, 2, 'Accord'),
(18, 2, 'CR-V'),
(19, 2, 'HR-V'),
(20, 2, 'Pilot'),
(21, 2, 'Odyssey'),
(22, 2, 'Ridgeline'),
(23, 2, 'Fit'),
(24, 2, 'Passport'),
(25, 2, 'Insight'),
(26, 2, 'Prelude'),
(27, 2, 'Element'),
(28, 2, 'S2000'),
(29, 2, 'Brio'),
(30, 2, 'Jazz'),
(31, 3, 'F-150'),
(32, 3, 'Mustang'),
(33, 3, 'Explorer'),
(34, 3, 'Escape'),
(35, 3, 'Ranger'),
(36, 3, 'Bronco'),
(37, 3, 'Edge'),
(38, 3, 'Expedition'),
(39, 3, 'Fusion'),
(40, 3, 'Focus'),
(41, 3, 'Maverick'),
(42, 3, 'Taurus'),
(43, 3, 'EcoSport'),
(44, 3, 'Transit'),
(45, 3, 'GT'),
(46, 4, '1 Series'),
(47, 4, '2 Series'),
(48, 4, '3 Series'),
(49, 4, '4 Series'),
(50, 4, '5 Series'),
(51, 4, '6 Series'),
(52, 4, '7 Series'),
(53, 4, '8 Series'),
(54, 4, 'X1'),
(55, 4, 'X3'),
(56, 4, 'X5'),
(57, 4, 'X7'),
(58, 4, 'Z4'),
(59, 4, 'M3'),
(60, 4, 'i4'),
(61, 5, 'A-Class'),
(62, 5, 'C-Class'),
(63, 5, 'E-Class'),
(64, 5, 'S-Class'),
(65, 5, 'GLA'),
(66, 5, 'GLC'),
(67, 5, 'GLE'),
(68, 5, 'GLS'),
(69, 5, 'G-Class'),
(70, 5, 'AMG GT'),
(71, 5, 'CLA'),
(72, 5, 'SL'),
(73, 5, 'SLC'),
(74, 5, 'EQC'),
(75, 5, 'V-Class'),
(76, 6, 'Altima'),
(77, 6, 'Maxima'),
(78, 6, 'Sentra'),
(79, 6, 'Versa'),
(80, 6, '370Z'),
(81, 6, 'GT-R'),
(82, 6, 'Rogue'),
(83, 6, 'Pathfinder'),
(84, 6, 'Murano'),
(85, 6, 'Armada'),
(86, 6, 'Frontier'),
(87, 6, 'Titan'),
(88, 6, 'Juke'),
(89, 6, 'X-Trail'),
(90, 6, 'Leaf');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3qjTUQZO1iwPLsBllDjqmdU5rlqU792wCf29jlOS', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTWJiU3FDdmxqVmxGZ2V0YWVVMlZqQTlCYWdGY3JvTlZUc2FLSW5DVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jYXIvc2VhcmNoIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NTt9', 1757864233),
('mfF8nzLcNTLPovekoIujHMx6l61pl5NbOGs3sx2b', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS3UyVk1hbUR4QkpTSlFhRTN1WmhPR1J1TVRQN1FGZEZkZVFuU1pUdCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jYXIvNzMiO319', 1755430601);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Beirut'),
(2, 'Mount Lebanon'),
(3, 'North Lebanon'),
(4, 'Akkar'),
(5, 'Bekaa'),
(6, 'Baalbek-Hermel'),
(7, 'South Lebanon'),
(8, 'Nabatieh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `google_id` varchar(45) DEFAULT NULL,
  `facebook_id` varchar(45) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `google_id`, `facebook_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Georgiana Weimann', 'asia.deckow@example.org', '61073500', '2025-04-01 19:56:28', '$2y$12$bNeay/uaCGYm62hHraDu/ehPaU4cV9thBgF.PKTHXoQEShT0QtpwC', NULL, NULL, 'B4ODPSKdQq', '2025-04-01 19:56:28', '2025-04-01 19:56:28'),
(2, 'Thea Zboncak', 'annamae.collier@example.net', '11918695', '2025-04-01 19:56:28', '$2y$12$bNeay/uaCGYm62hHraDu/ehPaU4cV9thBgF.PKTHXoQEShT0QtpwC', NULL, NULL, '0x1spLBXad', '2025-04-01 19:56:29', '2025-04-01 19:56:29'),
(3, 'Michelle Spencer', 'zieme.laurie@example.net', '68982426', '2025-04-01 19:56:28', '$2y$12$bNeay/uaCGYm62hHraDu/ehPaU4cV9thBgF.PKTHXoQEShT0QtpwC', NULL, NULL, 'voAzN8oH8A', '2025-04-01 19:56:29', '2025-04-01 19:56:29'),
(4, 'Coleman Volkman', 'qcrist@example.org', '47139624', '2025-04-01 19:56:29', '$2y$12$bNeay/uaCGYm62hHraDu/ehPaU4cV9thBgF.PKTHXoQEShT0QtpwC', NULL, NULL, 'J40WGxdmIQ', '2025-04-01 19:56:29', '2025-04-01 19:56:29'),
(5, 'Joud Dhaybi', 'joudhaybi@gmail.com', '76137263', NULL, '$2y$12$zvVW5MLjdTJ65jkgE9y7kedhh9bQRuKJpAQy0655RSbCQKNpnuyzu', NULL, NULL, NULL, '2025-04-03 13:14:05', '2025-04-03 13:14:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_maker_id_foreign` (`maker_id`),
  ADD KEY `cars_model_id_foreign` (`model_id`),
  ADD KEY `cars_car_type_id_foreign` (`car_type_id`),
  ADD KEY `cars_fuel_type_id_foreign` (`fuel_type_id`),
  ADD KEY `cars_user_id_foreign` (`user_id`),
  ADD KEY `cars_city_id_foreign` (`city_id`);

--
-- Indexes for table `car_features`
--
ALTER TABLE `car_features`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `car_images`
--
ALTER TABLE `car_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_images_car_id_foreign` (`car_id`);

--
-- Indexes for table `car_types`
--
ALTER TABLE `car_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favourite_cars`
--
ALTER TABLE `favourite_cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourite_cars_car_id_foreign` (`car_id`),
  ADD KEY `favourite_cars_user_id_foreign` (`user_id`);

--
-- Indexes for table `fuel_types`
--
ALTER TABLE `fuel_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makers`
--
ALTER TABLE `makers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `models_maker_id_foreign` (`maker_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `car_images`
--
ALTER TABLE `car_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `car_types`
--
ALTER TABLE `car_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourite_cars`
--
ALTER TABLE `favourite_cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `fuel_types`
--
ALTER TABLE `fuel_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `makers`
--
ALTER TABLE `makers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_car_type_id_foreign` FOREIGN KEY (`car_type_id`) REFERENCES `car_types` (`id`),
  ADD CONSTRAINT `cars_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `cars_fuel_type_id_foreign` FOREIGN KEY (`fuel_type_id`) REFERENCES `fuel_types` (`id`),
  ADD CONSTRAINT `cars_maker_id_foreign` FOREIGN KEY (`maker_id`) REFERENCES `makers` (`id`),
  ADD CONSTRAINT `cars_model_id_foreign` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`),
  ADD CONSTRAINT `cars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `car_images`
--
ALTER TABLE `car_images`
  ADD CONSTRAINT `car_images_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `favourite_cars`
--
ALTER TABLE `favourite_cars`
  ADD CONSTRAINT `favourite_cars_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`),
  ADD CONSTRAINT `favourite_cars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `models_maker_id_foreign` FOREIGN KEY (`maker_id`) REFERENCES `makers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
