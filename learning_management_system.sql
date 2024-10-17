-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 07:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instructor` varchar(255) DEFAULT NULL,
  `degree` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `upload_file` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `registeration_no` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `blog_description` varchar(255) NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `degree` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classes_name` varchar(255) NOT NULL,
  `classes_status` varchar(255) NOT NULL,
  `classes_description` longtext NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `classes_name`, `classes_status`, `classes_description`, `added_from`, `created_at`, `updated_at`) VALUES
(1, 'one', '1', 'Reserved For Middle', '1', '2024-10-16 14:20:49', '2024-10-16 14:20:49'),
(2, 'two', '1', 'Reserved For Matriculation', '1', '2024-10-16 14:21:04', '2024-10-16 14:21:04'),
(3, 'three', '1', 'This room is reserved for Eleventh Class.', '1', '2024-10-16 14:21:16', '2024-10-16 14:21:16'),
(4, 'four', '1', 'This room is reserved for Twelfth Class.', '1', '2024-10-16 14:21:20', '2024-10-16 14:21:20');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_degree` varchar(255) NOT NULL,
  `course_program` longtext NOT NULL,
  `course_status` varchar(255) NOT NULL,
  `course_description` longtext NOT NULL,
  `course_picture` longtext NOT NULL,
  `course_price` longtext NOT NULL,
  `course_duration` longtext NOT NULL,
  `course_benefits` longtext NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_title`, `course_degree`, `course_program`, `course_status`, `course_description`, `course_picture`, `course_price`, `course_duration`, `course_benefits`, `added_from`, `created_at`, `updated_at`) VALUES
(1, 'graphic designing', '2', '3', '1', 'This course combines design principles and software, typography, digital illustration, digital imaging, page layout, and prepress techniques with a focus on design processes from the point of visualization to production.', '30275.jpeg', '30000-40000', '2', 'Here are the benefits of graphic designing Course such as:\r\n1) Turning Your Passion into Your Profession. Many people used to like drawing and creative stuff in their childhood.\r\n2) Personal Branding.\r\n3) Improved Communication Skills. \r\n4) Personal Development.\r\n5) Get Paid for Being a Creative Designer.', '1', '2024-10-16 14:17:44', '2024-10-16 14:17:44'),
(2, 'shopify mastery', '2', '3', '1', 'This perfectly designed course emphasizes delivering variable methodologies, concept building, and advanced tools to revolutionize the state of the art. These mastery courses will guide you in building an e-commerce store for financially rewarding business development.', '22335.jpg', '30000-40000', '2', 'A Shopify Mastery Course provides essential skills for effectively setting up, managing, and growing an e-commerce store on the Shopify platform. Participants gain expertise in store configuration, product management, marketing strategies, and analytics. The course facilitates a deep understanding of Shopify\'s features, enabling users to optimize their online business and stay current with platform updates.', '1', '2024-10-16 14:18:48', '2024-10-16 14:18:48'),
(3, 'amazon virtual assistant', '2', '3', '1', 'An Amazon Virtual Assistant (VA) Course is designed to equip individuals with the skills needed to efficiently manage tasks related to selling products on Amazon. This includes product research, listing optimization, order processing, customer service, and inventory management. Participants learn to navigate Amazon Seller Central, implement effective marketing strategies, and utilize tools for successful e-commerce operations. The course aims to empower virtual assistants to support Amazon sellers in optimizing their businesses and maximizing sales.', '47095.webp', '30000-40000', '2', 'An Amazon VA Course provides a comprehensive skill set, teaching efficient navigation of Amazon Seller Central, listing optimization, product research, and customer service. Participants gain expertise in managing inventory, implementing marketing strategies, and understanding Amazon policies. The course offers valuable remote work skills and networking opportunities within the Amazon Virtual Assistant community.', '1', '2024-10-16 14:19:53', '2024-10-16 14:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `day__books`
--

CREATE TABLE `day__books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `day__book__categories`
--

CREATE TABLE `day__book__categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_type` varchar(255) NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `degree_name` varchar(255) NOT NULL,
  `degree_status` varchar(255) NOT NULL,
  `degree_description` longtext NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `degree_name`, `degree_status`, `degree_description`, `added_from`, `created_at`, `updated_at`) VALUES
(1, 'middle', '1', 'This includes grade 6, 7 & 8.', '1', '2024-10-16 14:11:40', '2024-10-16 14:11:40'),
(2, 'courses', '1', 'This includes short courses.', '1', '2024-10-16 14:11:54', '2024-10-16 14:11:54'),
(3, 'intermediate', '1', '12 Years Of Education', '1', '2024-10-16 14:12:08', '2024-10-16 14:12:08'),
(4, 'matriculation', '1', '10 Years Of Education', '1', '2024-10-16 14:12:20', '2024-10-16 14:12:20');

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
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_receipt_no` varchar(255) NOT NULL,
  `due_date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `fee_status` varchar(255) NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `fee_receipt_no`, `due_date`, `month`, `room`, `batch`, `student_id`, `fee_status`, `added_from`, `created_at`, `updated_at`) VALUES
(1, 'CRV-5277-359490', '2024-10-17', 'October', '6', '2023-2024', '6', 'Paid', '1', '2024-10-16 22:38:27', '2024-10-16 22:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `fee__reminders`
--

CREATE TABLE `fee__reminders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reminder_name` varchar(255) DEFAULT NULL,
  `from_date` varchar(255) DEFAULT NULL,
  `to_date` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `added_from` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee__reminders`
--

INSERT INTO `fee__reminders` (`id`, `reminder_name`, `from_date`, `to_date`, `status`, `description`, `type`, `added_from`, `created_at`, `updated_at`) VALUES
(1, 'Demo Reminder', '2024-10-16', '2024-10-16', 'Scheduling', 'Testing Description of the fee reminder', 'Late Fee Reminder', '1', '2024-10-16 13:41:53', '2024-10-16 13:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `holidays__reminders`
--

CREATE TABLE `holidays__reminders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holiday_name` varchar(255) DEFAULT NULL,
  `reminder_name` varchar(255) DEFAULT NULL,
  `from_date` varchar(255) DEFAULT NULL,
  `to_date` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `added_from` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `from_date` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `leave_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instructor` varchar(255) DEFAULT NULL,
  `degree` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `upload_file` varchar(255) NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_01_173212_create_degrees_table', 1),
(6, '2023_10_01_173227_create_programs_table', 1),
(7, '2023_10_01_173244_create_courses_table', 1),
(8, '2023_10_02_180207_create_classes_table', 1),
(9, '2023_10_16_183810_create_books_table', 1),
(10, '2023_10_16_183903_create_test__schedules_table', 1),
(11, '2023_10_16_183932_create_time__tables_table', 1),
(12, '2023_10_16_183953_create_notices_table', 1),
(13, '2023_10_16_184016_create_blogs_table', 1),
(14, '2023_10_16_190635_create_syllabi_table', 1),
(15, '2023_10_16_191918_create_contacts_table', 1),
(16, '2023_10_22_195718_create_assignments_table', 1),
(17, '2023_10_22_195738_create_materials_table', 1),
(18, '2023_10_28_100921_create_fees_table', 1),
(19, '2023_10_29_071903_create_attendances_table', 1),
(20, '2023_11_07_203640_create_leaves_table', 1),
(21, '2023_11_07_212433_create_day__books_table', 1),
(22, '2023_11_07_212534_create_day__book__categories_table', 1),
(23, '2023_11_09_113244_create_holidays__reminders_table', 1),
(24, '2023_11_11_212450_create_teacher__attendances_table', 1),
(25, '2023_11_12_042602_create_teacher__salaries_table', 1),
(26, '2023_11_23_192109_create_fee__reminders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notice_name` varchar(255) NOT NULL,
  `notice_description` varchar(255) NOT NULL,
  `notice_status` varchar(255) NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_degree` varchar(255) NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `program_status` varchar(255) NOT NULL,
  `program_description` longtext NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program_degree`, `program_name`, `program_status`, `program_description`, `added_from`, `created_at`, `updated_at`) VALUES
(1, '1', 'seventh', '1', '8 Years Of Education.', '1', '2024-10-16 14:13:08', '2024-10-16 14:13:08'),
(2, '1', 'eighth', '1', '8 Years Of Education.', '1', '2024-10-16 14:13:25', '2024-10-16 14:13:25'),
(3, '2', 'short courses', '1', 'Short courses play vital role in enhancing skills of students.', '1', '2024-10-16 14:13:50', '2024-10-16 14:13:50'),
(4, '3', 'eleventh', '1', 'HSSC-I (11 Years Of Education)', '1', '2024-10-16 14:14:22', '2024-10-16 14:14:22'),
(5, '3', 'twelfth', '1', 'HSSC-II (12 Years Of Education)', '1', '2024-10-16 14:14:38', '2024-10-16 14:14:38'),
(6, '4', 'ninth', '1', 'SSC-I (9 Years Of Education)', '1', '2024-10-16 14:14:56', '2024-10-16 14:14:56'),
(7, '4', 'tenth', '1', 'SSC-II (10 Years Of Education)', '1', '2024-10-16 14:15:11', '2024-10-16 14:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `syllabi`
--

CREATE TABLE `syllabi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instructor` varchar(255) DEFAULT NULL,
  `degree` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher__attendances`
--

CREATE TABLE `teacher__attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `in_time` varchar(255) NOT NULL,
  `out_time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `attendance_status` varchar(255) NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher__salaries`
--

CREATE TABLE `teacher__salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_number` varchar(255) NOT NULL,
  `voucher_date` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `from_date` varchar(255) NOT NULL,
  `to_date` varchar(255) NOT NULL,
  `present` varchar(255) NOT NULL,
  `absent` varchar(255) NOT NULL,
  `net_salary` varchar(255) NOT NULL,
  `academy_expences` varchar(255) NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test__schedules`
--

CREATE TABLE `test__schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instructor` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `program` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `book` varchar(255) DEFAULT NULL,
  `batch` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `added_from` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time__tables`
--

CREATE TABLE `time__tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `book` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `added_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registeration_no` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `program` varchar(255) DEFAULT NULL,
  `session` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `cnic` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email_verified_at` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `student_status` varchar(255) DEFAULT NULL,
  `batch` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `guadian_name` varchar(255) DEFAULT NULL,
  `guadian_cnic` varchar(255) DEFAULT NULL,
  `guadian_number` varchar(255) DEFAULT NULL,
  `relation_guadian` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `deals` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `last_attended_class` varchar(255) DEFAULT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `student_total_subjects` longtext DEFAULT NULL,
  `student_total_fee` varchar(255) DEFAULT NULL,
  `student_discount_fee` varchar(255) DEFAULT NULL,
  `student_after_discount_fee` varchar(255) DEFAULT NULL,
  `total_marks` varchar(255) DEFAULT NULL,
  `obt_marks` varchar(255) DEFAULT NULL,
  `percentage` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `sibling_name` varchar(255) DEFAULT NULL,
  `sibling_class` varchar(255) DEFAULT NULL,
  `sibling_institute` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `enrollment` varchar(255) DEFAULT NULL,
  `permanent` varchar(255) DEFAULT NULL,
  `contract` varchar(255) DEFAULT NULL,
  `teacher_degree` varchar(255) DEFAULT NULL,
  `teacher_program` varchar(255) DEFAULT NULL,
  `teacher_degree_status` varchar(255) DEFAULT NULL,
  `teacher_university` varchar(255) DEFAULT NULL,
  `teacher_year` varchar(255) DEFAULT NULL,
  `teacher_professional_field` varchar(255) DEFAULT NULL,
  `teacher_experience` varchar(255) DEFAULT NULL,
  `teacher_picture` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `enter_type` varchar(255) DEFAULT NULL COMMENT '1 = student, 2 = query, 3 = teacher, 4 = staff',
  `added_from` varchar(255) DEFAULT NULL,
  `is_email_verified` varchar(255) DEFAULT NULL,
  `emailToken` varchar(255) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `role_assign` varchar(255) DEFAULT NULL,
  `fees_paid_status` varchar(255) DEFAULT NULL,
  `fees_giving_date` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `registeration_no`, `degree`, `program`, `session`, `class`, `name`, `father_name`, `start_date`, `cnic`, `email`, `password`, `email_verified_at`, `contact_no`, `gender`, `date_of_birth`, `student_status`, `batch`, `address`, `guadian_name`, `guadian_cnic`, `guadian_number`, `relation_guadian`, `occupation`, `deals`, `designation`, `last_attended_class`, `institute`, `student_total_subjects`, `student_total_fee`, `student_discount_fee`, `student_after_discount_fee`, `total_marks`, `obt_marks`, `percentage`, `year`, `sibling_name`, `sibling_class`, `sibling_institute`, `profession`, `organization`, `is_active`, `enrollment`, `permanent`, `contract`, `teacher_degree`, `teacher_program`, `teacher_degree_status`, `teacher_university`, `teacher_year`, `teacher_professional_field`, `teacher_experience`, `teacher_picture`, `description`, `enter_type`, `added_from`, `is_email_verified`, `emailToken`, `reset_token`, `role_assign`, `fees_paid_status`, `fees_giving_date`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 'Shaharyar Ahmad', 'Javed', NULL, '33102-2577569-9', 'itsme.shaharyar@gmail.com', '$2y$10$iGst00Nwmm8uxY/7jDslDeVU6kw/2JPd.2fYn1Q/XuCe9NMpUfXHi', '2024-10-16 18:41:53', '0312-7502394', 'Male', '01,Nov,2002', NULL, NULL, 'Faisalabad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 'Admin', NULL, NULL, NULL, '2024-10-16 13:41:53', '2024-10-16 13:41:53'),
(3, NULL, NULL, NULL, NULL, NULL, 'Abdul Manan Ejaz', 'Ejaz', NULL, '33100-6754109-5', 'mananejaz14@gmail.com', '$2y$10$gd2GXHyrHaieMzK0KlxD3ehyhLmmhFcFuXlttYdo0w45kR.jXO.He', '2024-10-16 18:41:53', '0324-7697963', 'Male', '20,Apr,2000', NULL, NULL, 'Faisalabad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, 'Admin', NULL, NULL, NULL, '2024-10-16 13:41:53', '2024-10-16 13:41:53'),
(4, '1', '4', '6', 'Morning', '1', 'Madeline Vargas', 'Martina Simpson', NULL, NULL, 'dybakyrosu@mailinator.com', '$2y$10$Adu7G7PV/SavI8pTj42PReR/4/nLS02b.Eix.4sbRWSF1X0bDG/B.', '2024-10-16 19:42:04', '+92-9403493040', 'Female', NULL, 'Old', '2013', 'Quia omnis aliquip i', 'Susan Myers', NULL, '+92-4839483948', 'Minim minus enim qui', 'business', 'Nemo voluptas vero c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-16 14:42:04', '2024-10-16 14:42:04'),
(6, '1', '4', '6', 'Evening', '2', 'Usman Mughal', 'Muhammad Humayoun Mughal', NULL, NULL, 'chaudharywaqeeahmad@gmail.com	', '$2y$10$yYWI5XTSBBHz9mTvf6aIvOLZ0HaGLn3F9WYsOASP9A/SQAt.ZcoYi', '2024-10-16 19:59:56', '+92-3127502394', 'Male', NULL, 'Old', '2023-2024', 'House # 721, Street # 21, Usman Block, Bahria Town Phase 8, Rawalpindi.', 'Muhammad Humayoun Mughal', NULL, '+92-9509504954', 'Father', 'business', NULL, NULL, NULL, NULL, 'a:6:{s:14:\"Usman Mughal_0\";s:7:\"Physics\";s:14:\"Usman Mughal_1\";s:9:\"Chemistry\";s:14:\"Usman Mughal_2\";s:16:\"Computer Science\";s:14:\"Usman Mughal_3\";s:4:\"Urdu\";s:14:\"Usman Mughal_4\";s:9:\"Islamiyat\";s:14:\"Usman Mughal_5\";s:16:\"Pakistan Studies\";}', '16000', '5993', '10007', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12494.jpeg', NULL, '1', '1', '1', NULL, NULL, 'Student', '0', NULL, NULL, '2024-10-16 14:59:56', '2024-10-16 14:59:56'),
(7, '2', '4', '7', 'Evening', '2', 'Raffay Amjad', 'Malik Amjad Bashir', NULL, NULL, 'rehmanatif62@gmail.com', '$2y$10$O4jpKmwHW51b2aUopQ5J7OHUlTHny0orDI6MSEtgWWAfg2.slUmSm', '2024-10-16 20:05:18', '+92-3127502394', 'Male', NULL, 'Old', '2023-2024', 'House # 2107, Street # 63, Abubakar Block, Bahria Town Phase 8, Rawalpindi.', 'Malik Amjad Bashir', NULL, '+92-9090903943', 'Father', 'business', NULL, NULL, NULL, NULL, 'a:4:{s:14:\"Raffay Amjad_0\";s:11:\"Mathematics\";s:14:\"Raffay Amjad_1\";s:7:\"Physics\";s:14:\"Raffay Amjad_2\";s:9:\"Chemistry\";s:14:\"Raffay Amjad_3\";s:4:\"Urdu\";}', '10500', '2494', '8006', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21843.jpeg', NULL, '1', '1', '1', NULL, NULL, 'Student', '0', NULL, NULL, '2024-10-16 15:05:18', '2024-10-16 15:05:18'),
(8, '3', '3', '4', 'Morning', '2', 'Abubakar Tariq', 'Muhammad Tariq', NULL, NULL, 'itsme.shaharyar14@gmail.com', '$2y$10$XAQcJRp93u8YXSz2cpbye.hfxDalm7Bc.sZ8oYIf8GmjNazWJ3caa', '2024-10-16 20:08:02', '+92-3127502394', 'Male', NULL, 'Old', '2023-2024', 'House # 229, Street # 28, Ali Block, Bahria Town Phase 8, Rawalpindi.', 'Muhammad Tariq', NULL, '+93-2732382938', 'Father', 'business', NULL, NULL, NULL, NULL, 'a:8:{s:16:\"Abubakar Tariq_0\";s:11:\"Mathematics\";s:16:\"Abubakar Tariq_1\";s:7:\"Physics\";s:16:\"Abubakar Tariq_2\";s:9:\"Chemistry\";s:16:\"Abubakar Tariq_3\";s:16:\"Computer Science\";s:16:\"Abubakar Tariq_4\";s:7:\"English\";s:16:\"Abubakar Tariq_5\";s:4:\"Urdu\";s:16:\"Abubakar Tariq_6\";s:9:\"Islamiyat\";s:16:\"Abubakar Tariq_7\";s:16:\"Pakistan Studies\";}', '16000', '5994', '10006', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '35648.jpeg', NULL, '1', '1', '1', NULL, NULL, 'Student', '0', NULL, NULL, '2024-10-16 15:08:02', '2024-10-16 15:08:58'),
(9, '4', '3', '5', 'Evening', '2', 'Hajra Amir', 'Amar Nisar Ahmed', NULL, NULL, 'shaharyarahmad230@gmail.com', '$2y$10$BgG9NeSFRMDz4QdGEnRnx.KLjqbK43VTxto/WMZ1XbgNQ8T0Oht9u', '2024-10-16 20:12:06', '+92-3127502394', 'Female', NULL, 'Old', '2023-2024', 'House # 140, Street # 10, Sector E, Safari Homes, Bahria Town Phase 8, Rawalpindi.', 'Amar Nisar Ahmed', NULL, '+92-8439849348', 'Father', 'business', NULL, NULL, NULL, NULL, 'a:8:{s:12:\"Hajra Amir_0\";s:7:\"English\";s:12:\"Hajra Amir_1\";s:4:\"Urdu\";s:12:\"Hajra Amir_2\";s:9:\"Islamiyat\";s:12:\"Hajra Amir_3\";s:16:\"Pakistan Studies\";s:12:\"Hajra Amir_4\";s:7:\"Biology\";s:12:\"Hajra Amir_5\";s:9:\"Chemistry\";s:12:\"Hajra Amir_6\";s:11:\"Mathematics\";s:12:\"Hajra Amir_7\";s:7:\"Physics\";}', '16000', '6000', '10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24699.jpeg', NULL, '1', '1', '1', NULL, NULL, 'Student', '0', NULL, NULL, '2024-10-16 15:12:06', '2024-10-16 15:12:06'),
(10, '5', '3', '5', 'Afternoon', '3', 'Hiroko Blankenship', 'Isadora Charles', NULL, NULL, 'itsme.talha64@gmail.com', '$2y$10$583T7vZD9T3szrp0zt2bs.9GRntzHfS5O7fGZgrYGosuTxPNtc0hO', '2024-10-16 20:22:27', '+92-3127502394', 'Female', NULL, 'Old', '2023-2024', 'Tempor cumque conseq', 'Isadora Charles', NULL, '+92-8494384938', 'Father', 'job', NULL, NULL, NULL, NULL, 'a:8:{s:20:\"Hiroko Blankenship_0\";s:7:\"English\";s:20:\"Hiroko Blankenship_1\";s:4:\"Urdu\";s:20:\"Hiroko Blankenship_2\";s:9:\"Islamiyat\";s:20:\"Hiroko Blankenship_3\";s:16:\"Pakistan Studies\";s:20:\"Hiroko Blankenship_4\";s:7:\"Biology\";s:20:\"Hiroko Blankenship_5\";s:9:\"Chemistry\";s:20:\"Hiroko Blankenship_6\";s:11:\"Mathematics\";s:20:\"Hiroko Blankenship_7\";s:7:\"Physics\";}', '16000', '5996', '10004', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45766.jpeg', NULL, '1', '1', '1', NULL, NULL, 'Student', '0', NULL, NULL, '2024-10-16 15:22:27', '2024-10-16 15:22:27'),
(11, '6', '3', '5', 'Morning', '4', 'Hiram Blanchard', 'Jayme Alvarez', NULL, NULL, 'shaharyarahmad260@gmail.com', '$2y$10$xFtlk7.J.v8Ptk3kivbQIeoD.mrIUynTXkY2EpRviJtmB/iN9YkE2', '2024-10-16 20:25:29', '+92-3127502394', 'Female', NULL, 'Old', '2023-2024', 'Laboris quis earum o', 'Jayme Alvarez', NULL, '+92-4734394834', 'Father', 'business', NULL, NULL, NULL, NULL, 'a:8:{s:17:\"Hiram Blanchard_0\";s:7:\"English\";s:17:\"Hiram Blanchard_1\";s:4:\"Urdu\";s:17:\"Hiram Blanchard_2\";s:9:\"Islamiyat\";s:17:\"Hiram Blanchard_3\";s:16:\"Pakistan Studies\";s:17:\"Hiram Blanchard_4\";s:7:\"Biology\";s:17:\"Hiram Blanchard_5\";s:9:\"Chemistry\";s:17:\"Hiram Blanchard_6\";s:11:\"Mathematics\";s:17:\"Hiram Blanchard_7\";s:7:\"Physics\";}', '16000', '6000', '10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '17223.jpeg', NULL, '1', '1', '1', NULL, NULL, 'Student', '0', NULL, NULL, '2024-10-16 15:25:29', '2024-10-16 15:25:29'),
(14, '1', NULL, 'a:6:{i:0;s:1:\"7\";i:1;s:1:\"5\";i:2;s:1:\"4\";i:3;s:1:\"3\";i:4;s:1:\"2\";i:5;s:1:\"1\";}', NULL, 'a:4:{i:0;s:1:\"4\";i:1;s:1:\"3\";i:2;s:1:\"2\";i:3;s:1:\"1\";}', 'Juliet Perry', 'Zorita Contreras', NULL, '33100-3049304-3', 'vipet@mailinator.com', '$2y$10$rjRXUZO4YeyO2GVZs809P.RUBNjr9uXCismjQbtqNILtBqjef9mqi', '2024-10-17 03:16:17', '+92-5845405940', 'Male', NULL, NULL, NULL, 'Veniam tempor sit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'permanent', NULL, NULL, 'Bachelors', NULL, 'complete', 'COMSATS', NULL, 'a:6:{i:0;s:20:\"General Mathematics \";i:1;s:9:\"Economics\";i:2;s:15:\"General Science\";i:3;s:16:\"Computer Science\";i:4;s:18:\"Junior Mathematics\";i:5;s:15:\"Computer Course\";}', '2', '36729.jpeg', 'I am passionate about inspiring the next generation of scientists. My dynamic teaching style emphasizes hands-on experimentation, real-world applications, and collaborative learning. I strive to create an environment that nurtures curiosity, critical thinking, and a genuine love for the subject matter.', '3', '1', '1', NULL, NULL, 'Teacher', NULL, NULL, NULL, '2024-10-16 22:16:17', '2024-10-16 22:16:17'),
(15, '2', NULL, 'a:4:{i:0;s:1:\"7\";i:1;s:1:\"6\";i:2;s:1:\"5\";i:3;s:1:\"4\";}', NULL, 'a:2:{i:0;s:1:\"4\";i:1;s:1:\"3\";}', 'Herrod Diaz', 'Mariam Bird', NULL, '33100-4839493-9', 'ryfuz@mailinator.com', '$2y$10$H2758EGxIvPBUY/brsoCeOqpoaE8nCCwnREEYZ.QwwD3LB04SA9wu', '2024-10-17 03:18:21', '+92-4304930493', 'Male', NULL, NULL, NULL, 'Aspernatur id atque', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'permanent', NULL, NULL, 'Bachelors', NULL, 'complete', 'bixumaxa@mailinator.com', NULL, 'a:1:{i:0;s:11:\"Mathematics\";}', '2', '18243.jpeg', 'Magni velit consequa', '3', '1', '1', NULL, NULL, 'Teacher', NULL, NULL, NULL, '2024-10-16 22:18:21', '2024-10-16 22:18:21'),
(16, '3', NULL, 'a:6:{i:0;s:1:\"7\";i:1;s:1:\"6\";i:2;s:1:\"5\";i:3;s:1:\"4\";i:4;s:1:\"2\";i:5;s:1:\"1\";}', NULL, 'a:3:{i:0;s:1:\"4\";i:1;s:1:\"3\";i:2;s:1:\"1\";}', 'Timothy Joseph', 'India Bentley', NULL, '43943-0940394-3', 'mafu@mailinator.com', '$2y$10$H43yKZt7rjyHdwoR1/OJa.DV1mAIi3hYQUyDQxGfUy7ExuY3X0mPa', '2024-10-17 03:31:23', '+94-0309403940', 'Female', NULL, NULL, NULL, 'Sed cupidatat repreh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'permanent', NULL, NULL, 'Masters', NULL, 'complete', 'Punjab University', NULL, 'a:3:{i:0;s:7:\"English\";i:1;s:15:\"Pakisan Studies\";i:2;s:10:\"Psychology\";}', '2', '29993.jpeg', 'My approach is rooted in fostering critical thinking, empathy, and effective communication skills, creating a holistic and enriching learning experience for students. My teaching philosophy centers on the idea that education extends beyond subject matter mastery. I believe in a student-centric approach, tailoring lessons to accommodate diverse learning styles and encouraging active participation.', '3', '1', '1', NULL, NULL, 'Teacher', NULL, NULL, NULL, '2024-10-16 22:31:23', '2024-10-16 22:31:23'),
(17, '4', NULL, 'a:6:{i:0;s:1:\"7\";i:1;s:1:\"6\";i:2;s:1:\"5\";i:3;s:1:\"4\";i:4;s:1:\"2\";i:5;s:1:\"1\";}', NULL, 'a:3:{i:0;s:1:\"4\";i:1;s:1:\"3\";i:2;s:1:\"1\";}', 'Cassandra Navarro', 'Deanna Stein', NULL, '34343-9483948-3', 'cocyhaju@mailinator.com', '$2y$10$kEMr8T1mH/k6matTFiVRdunFcmtklGZmMyJNXCyRAjygrVuCjYslu', '2024-10-17 03:33:34', '+92-8493493843', 'Female', NULL, NULL, NULL, 'Sed magnam veniam c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'permanent', NULL, NULL, 'Bachelors', NULL, 'complete', 'Punjab University', NULL, 'a:2:{i:0;s:4:\"Urdu\";i:1;s:9:\"Islamiyat\";}', '2', '30975.jpeg', 'I bring a deep commitment to fostering cultural understanding, linguistic proficiency, and spiritual development through the teaching of Urdu and Islamiyat. My teaching philosophy revolves around nurturing an appreciation for language, literature, and religious values. I believe in fostering an inclusive classroom where students from diverse backgrounds feel a sense of belonging.', '3', '1', '1', NULL, NULL, 'Teacher', NULL, NULL, NULL, '2024-10-16 22:33:34', '2024-10-16 22:33:34'),
(18, '5', NULL, 'a:4:{i:0;s:1:\"7\";i:1;s:1:\"6\";i:2;s:1:\"5\";i:3;s:1:\"4\";}', NULL, 'a:2:{i:0;s:1:\"4\";i:1;s:1:\"3\";}', 'Rahim Hewitt', 'Orlando Willis', NULL, '49304-9304930-4', 'culul@mailinator.com', '$2y$10$/S5bDKW61PK0UdEzBKIgn.elkfF/hp1u1zoG7T2Vll.nrzPz//n1e', '2024-10-17 03:35:18', '+92-8430484304', 'Male', NULL, NULL, NULL, 'Ex ut velit deserunt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'permanent', NULL, NULL, 'Bachelors', NULL, 'incomplete', 'Rawal Medical College', NULL, 'a:2:{i:0;s:7:\"Biology\";i:1;s:9:\"Chemistry\";}', '2', '42204.jpeg', 'I am a dedicated teacher specializing in the fields of biology and chemistry. My instructional approach revolves around fostering a deep understanding of scientific concepts, cultivating a passion for discovery, and preparing students for academic excellence. In both biology and chemistry, I strive to create a classroom environment that inspires students to explore the wonders of life and the intricacies of matter, fostering a love for the scientific process. Recognizing the interconnectedness of biology and chemistry, I create interdisciplinary connections in my lessons.', '3', '1', '1', NULL, NULL, 'Teacher', NULL, NULL, NULL, '2024-10-16 22:35:18', '2024-10-16 22:35:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classes_classes_name_unique` (`classes_name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_course_title_unique` (`course_title`);

--
-- Indexes for table `day__books`
--
ALTER TABLE `day__books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day__book__categories`
--
ALTER TABLE `day__book__categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `degrees_degree_name_unique` (`degree_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee__reminders`
--
ALTER TABLE `fee__reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays__reminders`
--
ALTER TABLE `holidays__reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programs_program_name_unique` (`program_name`);

--
-- Indexes for table `syllabi`
--
ALTER TABLE `syllabi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher__attendances`
--
ALTER TABLE `teacher__attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher__salaries`
--
ALTER TABLE `teacher__salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test__schedules`
--
ALTER TABLE `test__schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time__tables`
--
ALTER TABLE `time__tables`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `day__books`
--
ALTER TABLE `day__books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `day__book__categories`
--
ALTER TABLE `day__book__categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fee__reminders`
--
ALTER TABLE `fee__reminders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `holidays__reminders`
--
ALTER TABLE `holidays__reminders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `syllabi`
--
ALTER TABLE `syllabi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher__attendances`
--
ALTER TABLE `teacher__attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher__salaries`
--
ALTER TABLE `teacher__salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test__schedules`
--
ALTER TABLE `test__schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time__tables`
--
ALTER TABLE `time__tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
