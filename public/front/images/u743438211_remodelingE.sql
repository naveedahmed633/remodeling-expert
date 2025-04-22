-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2025 at 12:11 PM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u743438211_remodelingE`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Autem laboriosam in', 'Doloremque provident.', 'blogs/oXSXBPg8FcIl98qLL34cX5Xb2B9Ecv32AURsivvH.png', '2025-04-21 20:35:08', '2025-04-21 20:35:08'),
(2, 'At nihil accusamus s', 'In quia ut est eu ma.', 'blogs/5Y2VPuJx03L52LD8F8b8uma9E83Jgaw78HF0dFQM.png', '2025-04-21 20:35:27', '2025-04-21 20:35:27'),
(3, 'Omnis voluptatum odi', 'Enim ea praesentium .', 'blogs/DIwyfXL48HfI2PNwqxVkf4RTTDMdTwK5oI8bN5wF.png', '2025-04-21 20:35:58', '2025-04-21 20:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` longtext NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`content`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `name`, `slug`, `meta_title`, `meta_description`, `content`, `created_at`, `updated_at`) VALUES
(9, 'Setting', 'setting', 'Website Settings - Remodeling Expert', 'Customize and manage your experience on the Remodeling Expert website.', '{\"banner_section_heading\":\"Welcome to Our Website\",\"banner_section_description\":\"Experience strength in both body and spirit with our expert remodeling solutions.\",\"banner_section_button_text\":\"Explore More\",\"banner_section_button_url\":\"about-us\"}', '2025-04-21 20:21:22', '2025-04-21 20:21:22'),
(10, 'Service', 'service', 'Our Services - Remodeling Expert', 'Explore professional remodeling services by Remodeling Expert. From kitchens to full home transformations, we deliver quality and precision.', '{\"banner_section_heading\":\"Our Services\",\"transforming_homes_heading\":\"Transforming Homes with Expert Craftsmanship\",\"transforming_homes_desc_1\":\"At Remodeling Experts, we bring innovation, precision, and quality to every remodeling project. With years of experience, our team specializes in creating stunning, functional spaces that enhance your home\\u2019s beauty and value.\",\"transforming_homes_desc_2\":\"We take pride in our attention to detail, seamless project management, and commitment to customer satisfaction. Whether it\'s a kitchen, bathroom, or whole-home renovation, we ensure a stress-free experience and exceptional results.\",\"transforming_homes_desc_3\":\"Let\\u2019s build something amazing together!\",\"transforming_homes_button_text\":\"Learn More\",\"transforming_homes_button_url\":\"project\",\"trusted_small_heading\":\"Trusted Experts\",\"trusted_main_heading\":\"Building Your Vision into Reality\",\"trusted_description\":\"Our dedicated team ensures excellence in every step of your construction journey, delivering unmatched results on time and on budget.\",\"dark_box_heading\":\"Need Consultation?\",\"dark_box_description\":\"We\\u2019re here to help 24\\/7.\",\"dark_box_number\":\"+92 300 1234567\"}', '2025-04-21 20:21:22', '2025-04-21 20:21:22'),
(11, 'Home', 'home', 'Home - Remodeling Expert', 'Welcome to Remodeling Expert', '{\"banner_section_heading\":\"Transform Your Home with Expert Remodeling\",\"banner_section_description\":\"Transform your space with precision and style. Our expert remodeling services deliver high-quality craftsmanship, innovative designs, and seamless execution to bring your vision to life.\",\"banner_section_button_text\":\"Start Now\",\"banner_section_button_url\":\"orderhttps:\\/\\/remodeling-expert.kaamupdates.net\\/services\",\"transforming_homes_heading\":\"Transforming Homes with Expert Craftsmanship\",\"transforming_homes_desc_1\":\"At Remodelling Experts, we bring innovation, precision, and quality to every remodeling project. With years of experience, our team specializes in creating stunning, functional spaces that enhance your home\\u2019s beauty and value.\",\"transforming_homes_desc_2\":\"We take pride in our attention to detail, seamless project management, and commitment to customer satisfaction. Whether it\'s a kitchen, bathroom, or whole-home renovation, we ensure a stress-free experience and exceptional results.\",\"transforming_homes_desc_3\":\"Let\\u2019s build something amazing together!\",\"transforming_homes_button_text\":\"LEARN MORE\",\"transforming_homes_button_url\":\"https:\\/\\/remodeling-expert.kaamupdates.net\\/services\",\"interior_solutions_heading\":\"Your all-in-one destination for interior solutions\",\"interior_solutions_description\":\"At Remodelling Experts, we bring innovation, precision, and quality to every remodeling project. With years of experience, our team specializes in creating stunning, functional spaces that enhance your home\\u2019s beauty and value.\",\"interior_solution_desc_1\":\"Interior Remodeling\",\"interior_solution_desc_2\":\"Interior Remodeling\",\"interior_solution_desc_3\":\"Plumbing\",\"interior_solution_desc_4\":\"HVAC\",\"interior_solution_button_text\":\"More Services\",\"interior_solution_button_url\":\"https:\\/\\/remodeling-expert.kaamupdates.net\\/services\",\"estimate_section_heading\":\"Get the estimate for your Full Home\",\"estimate_section_description\":\"Estimate the approximate cost of doing up your home interiors\",\"estimate_image_heading_1\":\"CABINETS\",\"estimate_image_desc_1\":\"Estimate the approximate cost your cabinets.\",\"estimate_image_heading_2\":\"FLOORING\",\"estimate_image_desc_2\":\"Estimate the approximate cost your flooring.\",\"estimate_image_heading_3\":\"LIGHTING\",\"estimate_image_desc_3\":\"Estimate the approximate cost your lightings.\",\"estimate_image_heading_4\":\"DOORS\",\"estimate_image_desc_4\":\"Estimate the approximate cost your doors.\",\"estimate_button_text\":\"Get A Quote\",\"estimate_button_url\":\"https:\\/\\/remodeling-expert.kaamupdates.net\\/services\",\"before_after_heading\":\"Before & After\",\"trusted_small_heading\":\"WHAT OUR CLIENTS SAY\",\"trusted_main_heading\":\"Outstanding Residential Services\",\"trusted_description\":\"At Remodelling Experts, we bring innovation, precision, and quality to every remodeling project. With years of experience, our team specializes in creating stunning, functional spaces that enhance your home\\u2019s beauty and value.\",\"dark_box_heading\":\"NEED SERVICE NOW?\",\"dark_box_description\":\"At Remodelling Experts, we bring innovation, precision, and quality to every remodeling project.\",\"dark_box_number\":\"(123) 456-7890\",\"recent_projects_heading\":\"Recent Projects\",\"recent_projects_description\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.\",\"recent_projects_button_text\":\"MORE PROJECTS\",\"recent_projects_button_url\":\"https:\\/\\/remodeling-expert.kaamupdates.net\\/services\",\"get_started_heading\":\"Get Started Today\",\"get_started_description\":\"You dream It, we design It.\",\"get_started_button_text\":\"CONTACT US\",\"get_started_button_url\":\"https:\\/\\/remodeling-expert.kaamupdates.net\\/services\",\"before_image\":{},\"after_image\":{}}', '2025-04-21 20:21:22', '2025-04-22 09:55:24'),
(12, 'Project', 'project', 'Projects - Remodeling Expert', 'Explore our completed and ongoing remodeling projects at Remodeling Expert.', '{\"banner_section_heading\":\"Our Projects\"}', '2025-04-21 20:21:22', '2025-04-21 20:21:22'),
(13, 'Blog', 'blog', 'Blog - Remodeling Expert', 'Explore insights and updates from Remodeling Expert.', '{\"banner_section_heading\":\"Our Blog\",\"get_started_heading\":\"Get Started Today\",\"get_started_description\":\"Start your journey with us and unlock endless possibilities.\",\"get_started_button_text\":\"Join Now\",\"get_started_button_url\":\"order\"}', '2025-04-21 20:21:22', '2025-04-21 20:21:22'),
(14, 'Step Form', 'step_form', 'Step Form - Remodeling Expert', 'Welcome to Remodeling Expert', '{\"banner_section_heading\":\"Welcome to\",\"banner_section_description\":\"Our Website\",\"banner_section_button_text\":\"Strength in Body\",\"banner_section_button_url\":\"and Spirit\"}', '2025-04-21 20:21:22', '2025-04-21 20:21:22'),
(15, 'About', 'about', 'About - Remodeling Expert', 'Welcome to Remodeling Expert', '{\"banner_section_heading\":\"About Us\",\"transforming_homes_heading\":\"Transforming Homes with Expert Craftsmanship\",\"transforming_homes_desc_1\":\"At Remodeling Experts, we bring innovation, precision, and quality to every remodeling project. With years of experience, our team specializes in creating stunning, functional spaces that enhance your home\\u2019s beauty and value.\",\"transforming_homes_desc_2\":\"We take pride in our attention to detail, seamless project management, and commitment to customer satisfaction. Whether it\'s a kitchen, bathroom, or whole-home renovation, we ensure a stress-free experience and exceptional results.\",\"transforming_homes_desc_3\":\"Let\\u2019s build something amazing together!\",\"transforming_homes_button_text\":\"Learn More\",\"transforming_homes_button_url\":\"project\",\"estimate_section_heading\":\"Get the Estimate for Your Full Home\",\"estimate_section_description\":\"Estimate the approximate cost of doing up your home interiors\",\"estimate_image_heading_1\":\"Cabinets\",\"estimate_image_heading_2\":\"Flooring\",\"estimate_image_heading_3\":\"Lighting\",\"estimate_image_heading_4\":\"Doors\",\"estimate_image_desc_1\":\"Estimate the approximate cost of your cabinets.\",\"estimate_image_desc_2\":\"Estimate the approximate cost of your flooring.\",\"estimate_image_desc_3\":\"Estimate the approximate cost of your lighting.\",\"estimate_image_desc_4\":\"Estimate the approximate cost of your doors.\",\"estimate_button_text\":\"Get a Free Quote\",\"estimate_button_url\":\"order\",\"before_after_heading\":\"Before and After\",\"trusted_small_heading\":\"Trusted Experts\",\"trusted_main_heading\":\"Building Your Vision into Reality\",\"trusted_description\":\"Our dedicated team ensures excellence in every step of your construction journey, delivering unmatched results on time and on budget.\",\"dark_box_heading\":\"Need Consultation?\",\"dark_box_description\":\"We\\u2019re here to help 24\\/7.\",\"dark_box_number\":\"+92 300 1234567\"}', '2025-04-21 20:21:22', '2025-04-21 20:21:22'),
(16, 'Contact', 'contact', 'Contact - Remodeling Expert', 'Reach out to Remodeling Expert for inquiries, consultations, and project planning.', '{\"banner_section_heading\":\"Contact Us\",\"address_heading\":\"Address\",\"address_description_1\":\"Your Company Name, 333 Street\",\"address_description_2\":\"City Name, Postal Code, Zip Code\",\"office_hours_heading\":\"Office Hours\",\"office_hours_description_1\":\"Mon\\u2013Fri: 08:00 AM \\u2013 05:00 PM\",\"office_hours_description_2\":\"Sat\\u2013Sun: Emergency Only\",\"phone_number_heading\":\"Phone Number\",\"phone_number_description_1\":\"Main Phone Line\",\"phone_number_description_2\":\"(111) 123-1234\",\"get_in_touch_heading\":\"Get in Touch With Us\",\"get_in_touch_description\":\"Please fill out the form with all required information. We\\u2019ll get back to you within 3 business days.\",\"get_in_touch_button_text\":\"Submit\",\"get_started_heading\":\"Get Started Today\",\"get_started_description\":\"Start your journey with us and unlock endless possibilities.\",\"get_started_button_text\":\"Join Now\",\"get_started_button_url\":\"order\"}', '2025-04-21 20:21:22', '2025-04-21 20:21:22');

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
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\CmsPage', 11, 'a9ae1b92-e962-4a17-b693-a7bee7192d1c', 'before_image', 'spacious-reconfigured-kitchen-remodel-naples-fl-before-2-1', 'spacious-reconfigured-kitchen-remodel-naples-fl-before-2-1.jpg', 'image/jpeg', 'public', 'public', 125967, '[]', '[]', '[]', '[]', 3, '2025-04-22 09:55:25', '2025-04-22 09:55:25'),
(4, 'App\\Models\\CmsPage', 11, 'fc4fcf60-645c-48a8-adfa-2b631c55de40', 'after_image', 'after', 'after.jpg', 'image/jpeg', 'public', 'public', 182965, '[]', '[]', '[]', '[]', 4, '2025-04-22 09:55:25', '2025-04-22 09:55:25');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_01_13_203335_create_permission_tables', 1),
(6, '2025_01_15_234900_add_columns_to_users_table', 1),
(7, '2025_04_16_201356_create_services_table', 1),
(8, '2025_04_16_210324_create_orders_table', 1),
(9, '2025_04_17_160735_create_blogs_table', 1),
(10, '2025_04_18_130032_create_projects_table', 1),
(11, '2025_04_18_175450_create_cms_pages_table', 1),
(12, '2025_04_18_200947_create_media_table', 1),
(13, '2025_04_21_141125_create_service_categories_table', 2),
(14, '2025_04_21_141140_create_subservice_categories_table', 2),
(15, '2025_04_21_141158_create_remodel_types_table', 2),
(16, '2025_04_21_163830_create_requirements_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `services` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`services`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `email`, `message`, `services`, `created_at`, `updated_at`) VALUES
(1, 'test', '92370592705', 'test@mailinator.com', 'TESTING', '[\"Interior Remodeling\",\"Kitchen\",\"Partial Remodel\",\"Cabinets\"]', '2025-04-21 10:28:16', '2025-04-21 10:28:16'),
(2, 'tesr', '23525246', 'testingnaf@mailinator.com', 'test', '[\"Electric Work\",\"Other (Custom Entry Option)\",\"Partial Remodel\",\"Cabinets\",\"Flooring\",\"Appliances\"]', '2025-04-21 10:29:31', '2025-04-21 10:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'edit articles', 'web', '2025-04-21 02:16:32', '2025-04-21 02:16:32'),
(2, 'delete articles', 'web', '2025-04-21 02:16:32', '2025-04-21 02:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `description1` longtext NOT NULL,
  `client` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `description1`, `client`, `year`, `author`, `image`, `image1`, `image2`, `image3`, `created_at`, `updated_at`) VALUES
(1, 'Classic & Professional', 'Commodi quas volupta.', 'Rerum accusantium qu.', 'Dicta voluptatum ill', '2018', 'Quidem dolorum volup', 'projects/yZWuT6Gg46E7v3fmYF6FuY6uHigA5i4H9xbVxmup.png', 'projects/aEped1MRJ8W610aD19K6Qb2ChVQFUP37V6v7VE5V.png', 'projects/33fSe0f9HNK5XDJGv5ZQ7bdQZZcwDW7mVM96ZFVP.png', 'projects/dS5Ig46usArC0xCW3J994GeqGmV50t3dvCGWwGFp.png', '2025-04-21 05:20:29', '2025-04-21 23:58:55'),
(2, 'Nisi est facilis ci', 'Lorem officia omnis .', 'Expedita irure Nam e.', 'Dignissimos voluptas', '1995', 'Quis consequatur Ut', 'projects/lUqqFdYT0GqBlJaaFXrrzvPXfzoZ2dLDDKdlxnOB.png', 'projects/LyXjnYG0ayG806gTzR3tjzOQaCWJgZoCt4k9ZaJw.png', 'projects/4rPAEEhq5xdjYt85IV51mpCG54vLzMeDtY2M6NO2.png', 'projects/zqHPvF2tf1slQe9K1lwX2K98tZsRZMR313sDdzRZ.png', '2025-04-21 05:26:54', '2025-04-21 20:32:22'),
(3, 'Veniam libero nesci', 'Pariatur? Asperiores.', 'Velit occaecat minim.', 'Nisi dolores officia', '2013', 'Earum magna quis duc', 'projects/imSqSshPL1fauqqVQrDbx282kzBFPtNEAoeZPvik.png', 'projects/UsxdRurG8OybNwm7fObjR6Ov3NsqhfcRfdqGjKMc.png', 'projects/7gu2fem5aTZ5e9mN4aakxQ3Bd4BPr0yurAFFdqHH.png', 'projects/yB1ih5YbqlYyFzTGGytzrxYjJ0uGESZcsmqsl4DJ.png', '2025-04-21 20:33:13', '2025-04-21 20:33:13'),
(4, 'Porro possimus sapi', 'Delectus, commodo ea.', 'Nulla impedit, et et.', 'Sit veniam harum n', '2014', 'Magna maiores quo ut', 'projects/WZA9fy0dnpwwYEbCpxoNwgj0F5JIFKbOwi738LV1.png', 'projects/hcZCV3yoFcktF7bTHUZeuD5rmmTw6nWhAxOc2Typ.png', 'projects/CCTQyYIs2Q8MklfD8VhYs5QmxzTPSqzuKSCRFCeU.png', 'projects/LEfpkf0x5SfvHseGHaRfbsSq2Gm6276JmNO5EPfj.png', '2025-04-21 20:34:06', '2025-04-21 20:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `remodel_types`
--

CREATE TABLE `remodel_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subservice_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `remodel_type_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-04-21 02:16:32', '2025-04-21 02:16:32'),
(2, 'user', 'web', '2025-04-21 02:16:32', '2025-04-21 02:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Dolores quasi volupt', 'Officia est id neque.', 'services/6dbEY4UkTSQtgVQWpUzl0Idfzpfq9Z0hnWjQDJKA.png', '2025-04-22 10:09:20', '2025-04-22 10:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subservice_categories`
--

CREATE TABLE `subservice_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone_number`, `address`) VALUES
(1, 'Admin User', 'admin@remodlingexpert.com', NULL, '$2y$10$IrcuQLojqCzgkKvR2LVBuO7aqw8w9zbpftC03jqr3eCPz3iMoazLG', NULL, '2025-04-21 02:16:32', '2025-04-21 02:16:32', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remodel_types`
--
ALTER TABLE `remodel_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `remodel_types_subservice_id_foreign` (`subservice_id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requirements_remodel_type_id_foreign` (`remodel_type_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subservice_categories`
--
ALTER TABLE `subservice_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subservice_categories_service_category_id_foreign` (`service_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `remodel_types`
--
ALTER TABLE `remodel_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subservice_categories`
--
ALTER TABLE `subservice_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `remodel_types`
--
ALTER TABLE `remodel_types`
  ADD CONSTRAINT `remodel_types_subservice_id_foreign` FOREIGN KEY (`subservice_id`) REFERENCES `subservice_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requirements`
--
ALTER TABLE `requirements`
  ADD CONSTRAINT `requirements_remodel_type_id_foreign` FOREIGN KEY (`remodel_type_id`) REFERENCES `remodel_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subservice_categories`
--
ALTER TABLE `subservice_categories`
  ADD CONSTRAINT `subservice_categories_service_category_id_foreign` FOREIGN KEY (`service_category_id`) REFERENCES `service_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
