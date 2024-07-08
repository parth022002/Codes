-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 04:53 PM
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
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(12) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created_by`, `created_on`) VALUES
(1, 'PHP', 'PHP is a widely-used open-source scripting language especially suited for web development and can be embedded into HTML. It is known for its efficiency in creating dynamic web pages and applications.', 0, '2024-06-29 18:08:21'),
(2, 'JavaScript', 'JavaScript is a high-level, versatile programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS. It is a key enabler of interactive web pages and is used by most websites.', 0, '2024-06-29 18:11:24'),
(3, 'Python Language', 'Python is a high-level, interpreted programming language known for its readability and broad applicability. It emphasizes code readability and simplicity, making it a popular choice for both beginners and experienced developers.', 0, '2024-06-29 18:11:24'),
(4, 'Java Lanugauge', 'Java is a versatile programming language known for its platform independence and strength in server-side programming for tasks like database interactions and business logic in web applications.', 0, '2024-06-30 19:17:16'),
(5, 'HTML', 'HTML (HyperText Markup Language) defines the structure and content of web pages using elements like headings, paragraphs, lists, and links, enabling browsers to render information in a structured format.', 0, '2024-06-30 19:17:16'),
(6, 'CSS', 'CSS (Cascading Style Sheets) enhances HTML by controlling the visual presentation and layout of web pages, including aspects like colors, fonts, spacing, and positioning, ensuring consistent design across different devices and enhancing user experience.', 0, '2024-06-30 19:17:16'),
(7, 'Next.js', 'Next.js is a React framework for building server-side rendered (SSR) or statically generated (SSG) web applications. It simplifies the setup and development of React applications by providing features like automatic code splitting, routing, and server-side rendering. Next.js is often used for building modern web applications with React.', 0, '2024-07-06 17:21:42'),
(8, 'React.js', 'React.js is a JavaScript library for building user interfaces, particularly for single-page applications where UI state management and efficient DOM updates are crucial. It allows developers to create reusable UI components and manage component state efficiently.', 0, '2024-07-06 17:21:42'),
(9, 'Node.js', 'Node.js is a runtime environment that allows you to run JavaScript on the server-side. It uses an event-driven, non-blocking I/O model that makes it lightweight and efficient for building scalable network applications. Node.js is commonly used for building APIs, servers, and real-time applications.', 0, '2024-07-06 17:21:42'),
(10, 'TypeScript', 'TypeScript is a superset of JavaScript that adds static types, allowing for type-checking during development. It compiles down to plain JavaScript and helps catch errors early in the development process. TypeScript is often used in large-scale applications to enhance code quality and maintainability.', 0, '2024-07-06 17:21:42'),
(11, 'Android', 'Android is an open-source mobile operating system developed by Google. It is based on the Linux kernel and is designed primarily for touchscreen mobile devices such as smartphones and tablets. Android provides a rich application framework that allows developers to create innovative apps using Java, Kotlin, or C++.', 0, '2024-07-06 17:21:42'),
(12, 'Kotlin', 'Kotlin is a statically typed programming language that runs on the Java Virtual Machine (JVM) and can also be compiled to JavaScript or native code. It was developed by JetBrains and is officially supported for Android app development by Google. Kotlin is known for its conciseness, safety features, and interoperability with Java.', 0, '2024-07-06 17:21:42'),
(13, 'Mysql', 'Database Management System', 1, '2024-07-06 17:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commnet_id` int(12) NOT NULL,
  `comment_desc` text NOT NULL,
  `thread_id` int(12) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_category_id` int(11) NOT NULL,
  `thread_user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `srno` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `countrycode` int(5) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`srno`, `name`, `email`, `phone`, `countrycode`, `password`, `Date`, `user_id`) VALUES
(19, 'admin', 'admin@gmail.com', 7874996808, 91, '$2y$10$5ahVLfiII99c5AgbM6.wLurAkAJGD2//ipqQ4QGawhGtEMZyFqz2a', '2024-07-03 15:41:17', 1),
(20, 'admin2', 'admin2@gmail.com', 1209873476, 81, '$2y$10$HroSoEetJuSYcXSCSiJS9.rJGsH5KnLkudj0zDv.3f792MM2Z7A7C', '2024-07-03 20:14:57', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commnet_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`srno`),
  ADD UNIQUE KEY `username` (`name`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commnet_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `srno` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
