-- phpMyAdmin SQL Dump
-- version 5.2.1
-- SQLINES DEMO *** admin.net/
--
-- Host: localhost
-- SQLINES DEMO *** Jun 25, 2023 at 02:30 PM
-- SQLINES DEMO *** 0.11.2-MariaDB-1
-- PHP Version: 8.2.5

/* SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"; */
START TRANSACTION;
time_zone := "+00:00";


/* SQLINES DEMO *** ARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/* SQLINES DEMO *** ARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/* SQLINES DEMO *** LLATION_CONNECTION=@@COLLATION_CONNECTION */;
/* SQLINES DEMO *** tf8mb4 */;

--
-- Database: `school`
--

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** or table `assign_class_teacher`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE assign_class_teacher (
  id int NOT NULL,
  filiere_id int DEFAULT NULL,
  teacher_id int DEFAULT NULL,
  created_at timestamp(0) DEFAULT NULL,
  updated_at timestamp(0) DEFAULT NULL
) ;

--
-- SQLINES DEMO *** table `assign_class_teacher`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
INSERT INTO assign_class_teacher (id, filiere_id, teacher_id, created_at, updated_at) VALUES
(2, 6, 10, '2023-06-22 22:31:28', '2023-06-22 22:31:28'),
(4, 5, 11, '2023-06-23 07:03:46', '2023-06-23 07:03:46'),
(5, 6, 15, '2023-06-23 08:39:18', '2023-06-23 08:39:18');

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** or table `class_subject_timetable`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE class_subject_timetable (
  id int NOT NULL,
  class_id int DEFAULT NULL,
  subject_id int DEFAULT NULL,
  week_id int DEFAULT NULL,
  start_time varchar(255) DEFAULT NULL,
  end_time varchar(255) DEFAULT NULL,
  room_number varchar(255) DEFAULT NULL,
  created_at timestamp(0) DEFAULT NULL,
  updated_at timestamp(0) DEFAULT NULL
) ;

--
-- SQLINES DEMO *** table `class_subject_timetable`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
INSERT INTO class_subject_timetable (id, class_id, subject_id, week_id, start_time, end_time, room_number, created_at, updated_at) VALUES
(5, 6, 3, 1, '08:00', '00:00', 's3', '2023-06-23 17:04:39', '2023-06-23 17:04:39'),
(6, 6, 3, 3, '07:00', '14:00', 's3', '2023-06-23 17:04:39', '2023-06-23 17:04:39'),
(7, 4, 6, 1, '08:00', '10:00', 'sd', '2023-06-23 18:19:33', '2023-06-23 18:19:33'),
(8, 4, 6, 3, '15:00', '17:00', 'sd', '2023-06-23 18:19:33', '2023-06-23 18:19:33'),
(12, 5, 3, 1, '08:00', '00:00', 'g5', '2023-06-23 19:54:53', '2023-06-23 19:54:53'),
(13, 6, 1, 4, '08:00', '12:00', 's3', '2023-06-23 21:14:46', '2023-06-23 21:14:46'),
(15, 6, 7, 4, '08:00', '10:00', 'k', '2023-06-24 17:11:14', '2023-06-24 17:11:14'),
(17, 4, 10, 6, '08:00', '00:00', 'lm', '2023-06-25 12:01:20', '2023-06-25 12:01:20');

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** or table `failed_jobs`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE failed_jobs (
  id bigint CHECK (id > 0) NOT NULL,
  uuid varchar(255) NOT NULL,
  connection text NOT NULL,
  queue text NOT NULL,
  payload text NOT NULL,
  exception text NOT NULL,
  failed_at timestamp(0) NOT NULL DEFAULT current_timestamp()
) ;

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** or table `files`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE files (
  id int NOT NULL,
  teacher_id int DEFAULT NULL,
  matiere_id int DEFAULT NULL,
  file_name varchar(255) DEFAULT NULL,
  file_path varchar(255) DEFAULT NULL,
  created_at timestamp(0) NOT NULL,
  updated_at timestamp(0) NOT NULL
) ;

--
-- SQLINES DEMO *** table `files`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
INSERT INTO files (id, teacher_id, matiere_id, file_name, file_path, created_at, updated_at) VALUES
(3, 17, 6, 'rbd8k6qxqac3zmudtlux.txt', 'upload/rbd8k6qxqac3zmudtlux.txt', '2023-06-24 08:45:38', '2023-06-24 08:45:38'),
(4, 17, 6, 'uiofmhcwyhnd8u0klmtd.yml', 'upload/uiofmhcwyhnd8u0klmtd.yml', '2023-06-24 08:53:47', '2023-06-24 08:53:47'),
(5, 17, 6, 'fw0fieozbg70zqlunoqb.png', 'upload/fw0fieozbg70zqlunoqb.png', '2023-06-24 23:36:15', '2023-06-24 23:36:15'),
(6, 17, 10, 'Tp de developpement web', 'upload/7codeirbfkqeodzk9zww.pdf', '2023-06-25 12:49:19', '2023-06-25 12:49:19');

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** or table `filiere`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE filiere (
  id int NOT NULL,
  name varchar(255) DEFAULT NULL,
  created_by int DEFAULT NULL,
  created_at timestamp(0) DEFAULT NULL,
  updated_at timestamp(0) DEFAULT NULL
) ;

--
-- SQLINES DEMO *** table `filiere`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
INSERT INTO filiere (id, name, created_by, created_at, updated_at) VALUES
(4, 'Physique', 1, '2023-06-21 23:33:33', '2023-06-21 23:33:33'),
(5, 'Mathématiques', 1, '2023-06-21 23:33:55', '2023-06-21 23:33:55'),
(6, 'Informatique', 1, '2023-06-22 19:45:13', '2023-06-22 19:45:13'),
(7, 'Prepa2', 1, '2023-06-24 15:08:47', '2023-06-24 15:08:47'),
(8, 'Prepa1', 1, '2023-06-25 11:52:37', '2023-06-25 11:52:37');

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** or table `filiere_matiere`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE filiere_matiere (
  id int NOT NULL,
  filiere_id int DEFAULT NULL,
  matiere_id int DEFAULT NULL,
  teacher_id int DEFAULT NULL,
  created_at timestamp(0) DEFAULT NULL,
  updated_at timestamp(0) DEFAULT NULL
) ;

--
-- SQLINES DEMO *** table `filiere_matiere`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
INSERT INTO filiere_matiere (id, filiere_id, matiere_id, teacher_id, created_at, updated_at) VALUES
(16, 6, 3, 16, '2023-06-24 00:21:38', '2023-06-24 00:21:38'),
(18, 6, 1, 11, '2023-06-24 00:31:29', '2023-06-24 00:31:29'),
(19, 4, 6, 17, '2023-06-24 00:33:37', '2023-06-24 00:33:37'),
(21, 7, 5, 13, '2023-06-24 15:21:28', '2023-06-24 15:21:28'),
(22, 4, 4, 15, '2023-06-25 11:53:58', '2023-06-25 11:53:58'),
(23, 4, 10, 17, '2023-06-25 12:35:44', '2023-06-25 12:35:44'),
(26, 6, 7, 13, '2023-06-25 12:46:49', '2023-06-25 12:46:49');

-- SQLINES DEMO *** ---------------------------------------

--
-- SQLINES DEMO *** or table `matiere`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE matiere (
  id int NOT NULL,
  name varchar(255) DEFAULT NULL,
  semestre int DEFAULT NULL,
  masse_horaire int DEFAULT NULL,
  credit int DEFAULT NULL,
  created_at timestamp(0) DEFAULT NULL,
  updated_at timestamp(0) DEFAULT NULL
) ;

--
-- SQLINES DEMO *** table `matiere`
--

-- SQLINES LICENSE FOR EVALUATION USE ONLY
INSERT INTO matiere (id, name, semestre, masse_horaire, credit, created_at, updated_at) VALUES
(1, 'Réseaux', NULL, NULL, 5, NULL, NULL),
(3, 'ATO', NULL, NULL, 2, '2023-06-21 23:41:41', '2023-06-21 23:41:41'),
(4, 'Système d'exploitation', NULL, NULL, 4, '2023-06-21 23:42:28', '2023-06-21 23:42:28'),
(5, 'Electro', NULL, NULL, 4, '2023-06-22 19:44:27', '2023-06-22 19:44:27'),
(6, 'Relativité', 6, 30, 4, '2023-06-22 19:44:39', '2023-06-24 15:07:15'),
(7, 'Langage C', 5, 60, 4, '2023-06-23 21:12:25', '2023-06-24 15:06:27'),
(8, 'Programmation Web', NULL, NULL, 4, '2023-06-24 00:12:22', '2023-06-24 00:12:22'),
(9, 'Probabilité', 5, 40, 4, '2023-06-24 00:12:40', '2023-06-24 15:05:14'),
(10, 'Thermodynamique', 5, 40, 4, '2023-06-24 00:13:45', '2023-06-24 15:01:35'),
(11, 'Base de donnée', 5, 40, 3, '2023-06-24 14:41:48', '2023-06-24 14:41:48'),
(12, 'Algèbre', 5, 40, 4, '2023-06-24 14:45:16', '2023-06-24 14:45:16');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `matricule` int(11) DEFAULT NULL,
  `filiere_id` int(11) DEFAULT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 3 COMMENT '1:Admin, 2:Teacher, 3:Student',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `email`, `email_verified_at`, `password`, `remember_token`, `date_of_birth`, `gender`, `matricule`, `filiere_id`, `statut`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'admin@gmail.com', NULL, '$2y$10$M5GnYbexTm0NB.m5iQ4bpOtT/XuMwpy0kgEQkBI8drDgCKzbm/9U6', 'rgu4bdOavoDAh3ZJi5rV1XhANG2NXttWdIoIoEXG9hmTmxCSr1TlBCZsOL5j', '0000-00-00', NULL, 0, 0, '', 1, '2023-06-19 09:35:57', '2023-06-20 13:50:28'),
(3, 'Student', 'Model', 'student@gmail.com', NULL, '$2y$10$H/haMWA6wA2qTmxzL2hruOS1Wfr2SMVfkl9zMZzZO/KmxCU37GkAC', NULL, '0000-00-00', 'M', 1236252, 6, '', 3, '2023-06-19 09:35:57', '2023-06-22 19:17:47'),
(4, 'Directeur', NULL, 'dir_etude@gmail.com', NULL, '$2y$10$wGueUiyEwqlojeG3gYxsJ.DHhmNB3M4s2vB3/g2JG8iQTDIJFuzre', NULL, '0000-00-00', NULL, 0, 0, '', 1, '2023-06-19 09:35:57', '2023-06-19 09:35:57'),
(6, 'Nolan', NULL, 'nolan@gmail.com', NULL, '$2y$10$e4Vc37Z56CAACniATdIFkOhLIeaMfwnZzARaB0Gtj6Tk652NtUEhq', NULL, '0000-00-00', NULL, 0, 0, '', 1, '2023-06-20 21:02:26', '2023-06-20 21:08:49'),
(7, 'Try', NULL, 'try@gmail.com', NULL, '$2y$10$J3pUW03lBuStnN0Z/UrzJ.QmXOCq.SzE4xaS3iPT3mE9I5h5rUto', NULL, '0000-00-00', NULL, 0, 0, '', 1, '2023-06-22 10:25:49', '2023-06-22 10:25:49'),
(9, 'NGB', 'Eben Ezer', 'eben1@gmail.com', NULL, '$2y$10$MV.y7P2yOxIdT0KOqrcoGO22lx24.kmKucmC5pomjRizRClThDvHG', NULL, '2001-09-02', 'F', 123541, 6, '', 3, '2023-06-22 15:18:28', '2023-06-23 06:34:35'),
(10, 'Ghe', 'Jio', 'ghe@gmail.com', NULL, '$2y$10$tY11is8odzTiCrPIYkaOUu7sDhHxPYA/ksmfhxkNbJL3ezuZ595e6', NULL, NULL, NULL, NULL, NULL, 'enseignant_local', 2, '2023-06-22 17:20:43', '2023-06-22 17:20:43'),
(11, 'Quamar Hickman', 'Velma', 'peweb@mailinator.com', NULL, '$2y$10$FleVHA24S0ENEfiFNJ7yNeK053UrQFd8q.gvpXCvRFH4OMymU91ly', NULL, NULL, NULL, NULL, NULL, 'enseignant_local_vacataire', 2, '2023-06-22 21:26:24', '2023-06-22 21:26:24'),
(12, 'Rana Harrington', 'Kane', 'sopavihy@mailinator.com', NULL, '$2y$10$vDcNQjp0CWiIfo0hd4XdsOIEZ3mEujaufvXAqdXS3cfCyaH/Jtwwa', NULL, NULL, NULL, NULL, NULL, 'enseignant_missionnaire', 2, '2023-06-22 21:26:38', '2023-06-22 21:26:38'),
(13, 'Kiayada Evans', 'Gail', 'teacher@gmail.com', NULL, '$2y$10$ZPtmNo1aUt3sVHy2oAo2Devk1cYHhyZB/PYGuUUlw2dpVEgI9Mcfy', NULL, NULL, NULL, NULL, NULL, 'enseignant_local', 2, '2023-06-23 06:58:59', '2023-06-23 06:58:59'),
(14, 'Jayme Pugh', 'Lois', 'lexemop@mailinator.com', NULL, '$2y$10$ZwwGhoRkuJunT9Bvk9bI8.9Cw3qoMu7wgIgm5b/5BCT3PB9Xafkjy', NULL, '2002-11-11', 'F', 851515, 4, NULL, 3, '2023-06-23 07:23:55', '2023-06-25 12:08:44'),
(15, 'Robot', 'Mr', 'robot@gmail.com', NULL, '$2y$10$L7wNo8W07lLQTh/wQrKL8eoFl4lGnXuGTRFFxBL0l3NDpbsa8ADxK', NULL, NULL, NULL, NULL, NULL, 'enseignant_local', 2, '2023-06-23 07:38:53', '2023-06-23 07:38:53'),
(16, 'Adara Lester', 'Tucker', 'guwywaridi@mailinator.com', NULL, '$2y$10$BENcJjFEcUCflYPYFrcwQejQeSbR.eVnFiCL94WZsy05Bfx5ILTCq', NULL, NULL, NULL, NULL, NULL, 'enseignant_missionnaire', 2, '2023-06-23 23:16:05', '2023-06-23 23:16:05'),
(17, 'René', 'Kelly', 'kakaki@mailinator.com', NULL, '$2y$10$WjZFUj9c668IqvUfxd6iseShi9g46j23NA1qEhLwZ3HQsqeQUs.XW', NULL, NULL, NULL, NULL, NULL, 'enseignant_local_vacataire', 2, '2023-06-23 23:16:49', '2023-06-23 23:16:49'),
(18, 'Halee Chavez', 'Piper', 'hezy@mailinator.com', NULL, '$2y$10$xsDL2v..0BBmsoAop4gWa.pKbBS8TucZLEFMwssJjZYddQvN8Iuvy', NULL, NULL, NULL, NULL, NULL, 'enseignant_local_vacataire', 2, '2023-06-25 10:48:58', '2023-06-25 10:48:58'),
(19, 'Minerva Jarvis', 'Cody', 'dinijy@mailinator.com', NULL, '$2y$10$7PRQxbx8KjNpvAlEVcEpAumrztOQjf3B4pFIRMBlVyLjXxseHRGeK', NULL, '2023-06-23', 'F', 85, 7, NULL, 3, '2023-06-25 10:49:10', '2023-06-25 10:49:10'),
(20, 'Duncan Mcfadden', 'Gil', 'bejujoq@mailinator.com', NULL, '$2y$10$I1DGqcNC7yXbP7VgVcmuduuMo9L2JHqF8OunzLAK8c3hMA1Cqx9rq', NULL, NULL, NULL, NULL, NULL, 'enseignant_local_vacataire', 2, '2023-06-25 10:51:02', '2023-06-25 10:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

CREATE TABLE `week` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `week`
--

INSERT INTO `week` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Lundi', NULL, NULL),
(2, 'Mardi', NULL, NULL),
(3, 'Mercredi', NULL, NULL),
(4, 'Jeudi', NULL, NULL),
(5, 'Vendredi', NULL, NULL),
(6, 'Samedi', NULL, NULL),
(7, 'Dimanche', NULL, NULL);

--
-- SQLINES DEMO *** d tables
--

--
-- SQLINES DEMO ***  `assign_class_teacher`
--
ALTER TABLE assign_class_teacher
  ADD PRIMARY KEY (id);

--
-- SQLINES DEMO ***  `class_subject_timetable`
--
ALTER TABLE class_subject_timetable
  ADD PRIMARY KEY (id);

--
-- SQLINES DEMO ***  `failed_jobs`
--
ALTER TABLE failed_jobs
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY failed_jobs_uuid_unique (uuid);

--
-- SQLINES DEMO ***  `files`
--
ALTER TABLE files
  ADD PRIMARY KEY (id);

--
-- SQLINES DEMO ***  `filiere`
--
ALTER TABLE filiere
  ADD PRIMARY KEY (id);

--
-- SQLINES DEMO ***  `filiere_matiere`
--
ALTER TABLE filiere_matiere
  ADD PRIMARY KEY (id);

--
-- SQLINES DEMO ***  `matiere`
--
ALTER TABLE matiere
  ADD PRIMARY KEY (id);

--
-- SQLINES DEMO ***  `migrations`
--
ALTER TABLE migrations
  ADD PRIMARY KEY (id);

--
-- SQLINES DEMO ***  `password_reset_tokens`
--
ALTER TABLE password_reset_tokens
  ADD PRIMARY KEY (email);

--
-- SQLINES DEMO ***  `personal_access_tokens`
--
ALTER TABLE personal_access_tokens
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY personal_access_tokens_token_unique (token),
  ADD KEY personal_access_tokens_tokenable_type_tokenable_id_index (tokenable_type,tokenable_id);

--
-- SQLINES DEMO ***  `users`
--
ALTER TABLE users
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY users_email_unique (email);

--
-- SQLINES DEMO ***  `week`
--
ALTER TABLE week
  ADD PRIMARY KEY (id);

--
-- SQLINES DEMO *** r dumped tables
--

--
-- SQLINES DEMO *** r table `assign_class_teacher`
--
ALTER TABLE assign_class_teacher
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- SQLINES DEMO *** r table `class_subject_timetable`
--
ALTER TABLE class_subject_timetable
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- SQLINES DEMO *** r table `failed_jobs`
--
ALTER TABLE failed_jobs
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- SQLINES DEMO *** r table `files`
--
ALTER TABLE files
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- SQLINES DEMO *** r table `filiere`
--
ALTER TABLE filiere
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- SQLINES DEMO *** r table `filiere_matiere`
--
ALTER TABLE filiere_matiere
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- SQLINES DEMO *** r table `matiere`
--
ALTER TABLE matiere
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- SQLINES DEMO *** r table `migrations`
--
ALTER TABLE migrations
  MODIFY id cast(10 as int) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- SQLINES DEMO *** r table `personal_access_tokens`
--
ALTER TABLE personal_access_tokens
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- SQLINES DEMO *** r table `users`
--
ALTER TABLE users
  MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- SQLINES DEMO *** r table `week`
--
ALTER TABLE week
  MODIFY id cast(11 as int) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/* SQLINES DEMO *** ER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/* SQLINES DEMO *** ER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
