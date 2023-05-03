-- Database export via SQLPro (https://www.sqlprostudio.com/allapps.html)
-- Exported by gerard.alainp at 03-05-2023 23:44.
-- WARNING: This file may contain descructive statements such as DROPs.
-- Please ensure that you are running the script at the proper location.


-- BEGIN TABLE departments
DROP TABLE IF EXISTS departments;
CREATE TABLE `departments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `departmentname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserting 7 rows into departments
-- Insert batch #1
INSERT INTO departments (id, departmentname, created_at, updated_at) VALUES
(5, 'Cardiology', NULL, NULL),
(6, 'General Medecine', NULL, NULL),
(7, 'ENT', NULL, NULL),
(8, 'Oncology', NULL, NULL),
(9, 'General Surgery', NULL, NULL),
(10, 'Radiology', '2023-04-01 08:05:12', '2023-04-01 08:05:12'),
(11, 'Ortho', '2023-04-06 12:59:26', '2023-04-06 12:59:26');

-- END TABLE departments

-- BEGIN TABLE diagnostics
DROP TABLE IF EXISTS `diagnostics`;
CREATE TABLE `diagnostics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `doctorid` bigint DEFAULT NULL,
  `doctorname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patientid` bigint DEFAULT NULL,
  `patientname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnosis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table `diagnostics` contains no data. No inserts have been genrated.
-- Inserting 0 rows into `diagnostics`


-- END TABLE diagnostics

-- BEGIN TABLE doctorpatientlists
DROP TABLE IF EXISTS doctorpatientlists;
CREATE TABLE `doctorpatientlists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `patientid` bigint DEFAULT NULL,
  `doctorid` bigint DEFAULT NULL,
  `doctorname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctorspatientappointmentid` bigint DEFAULT NULL,
  `patientname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patientdoctorlistsid` bigint DEFAULT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointmentdate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserting 15 rows into doctorpatientlists
-- Insert batch #1
INSERT INTO doctorpatientlists (id, patientid, doctorid, doctorname, doctorspatientappointmentid, patientname, patientdoctorlistsid, department, appointmentdate, status, created_at, updated_at) VALUES
(1, 11, 16, 'Doctor 1', 1, 'Patient 1', 1, 'General Surgery', 'May 5, 2023', 'No Show', '2023-04-10 13:48:42', '2023-05-01 05:18:16'),
(2, 11, 16, 'Doctor 1', 2, 'Patient 1', 2, 'General Surgery', 'April 8,2023', 'Done Check-up', '2023-04-10 13:48:43', '2023-04-15 04:56:53'),
(3, 11, 16, 'Doctor 1', 3, 'Patient 1', 3, 'General Surgery', 'April 30,2023', 'Done Check-up', '2023-04-10 13:48:44', '2023-04-15 04:56:59'),
(4, 8, 8, 'John Fuentes', NULL, 'Michael Johson5', NULL, 'Ortho', 'April 18, 2023', 'For Approval', '2023-04-15 08:53:45', '2023-04-15 08:53:45'),
(5, 12, 16, 'Doctor 1', 4, 'Patient 2', 4, 'General Surgery', 'April 30,2023', 'Done Check-up', '2023-04-18 12:14:43', '2023-04-21 02:18:03'),
(6, 11, 18, 'Doctor 3', 5, 'Patient 1', 5, 'Cardiology', 'May 5, 2023', 'Done Check-up', '2023-04-22 14:02:27', '2023-04-22 14:02:38'),
(7, 11, 16, 'Doctor 1', 1, 'Patient 1', 1, 'General Surgery', '2023-04-30 3:00 AM', 'Done Check-up', '2023-04-29 13:26:25', '2023-05-01 05:18:22'),
(8, 11, 18, 'Doctor 3', 8, 'Patient 1', 8, 'Cardiology', '2023-04-14 12:00 PM', 'Cancel', '2023-04-29 13:45:13', '2023-04-29 13:57:23'),
(9, 16, 16, 'Doctor 1', NULL, 'Patient 1', NULL, 'General Surgery', '2023-05-10 10:00 AM', 'For Approval', '2023-05-01 13:38:43', '2023-05-01 13:38:43'),
(10, 16, 16, 'Doctor 1', NULL, 'Patient 1', NULL, 'General Surgery', '2023-05-09 12:00 PM', 'For Approval', '2023-05-01 13:39:58', '2023-05-01 13:39:58'),
(11, 16, 16, 'Doctor 1', NULL, 'Patient 1', NULL, 'General Surgery', '2023-05-02 12:00 PM', 'For Approval', '2023-05-01 13:45:22', '2023-05-01 13:45:22'),
(12, 11, 16, 'Doctor 1', NULL, 'Patient 1', NULL, 'General Surgery', '2023-05-03 12:00 PM', 'For Approval', '2023-05-01 13:51:30', '2023-05-01 13:51:30'),
(13, 11, 18, 'Dr. Doctor 3', 16, 'Patient 1', 16, 'Cardiology', '2023-05-10 2:00 PM', 'Approved/Active', '2023-05-02 12:04:17', '2023-05-02 12:05:07'),
(14, 11, 18, 'Dr. Doctor 3', 17, 'Patient 1', 17, 'Cardiology', '2023-07-10 1:00 PM', 'Approved/Active', '2023-05-02 12:12:37', '2023-05-02 12:25:33'),
(15, 11, 18, 'Doctor 3', 18, 'Patient 1', 18, 'Cardiology', '2023-09-06 11:00 AM', 'For Approval', '2023-05-02 12:28:22', '2023-05-02 12:28:22');

-- END TABLE doctorpatientlists

-- BEGIN TABLE doctorslists
DROP TABLE IF EXISTS doctorslists;
CREATE TABLE `doctorslists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `doctorid` bigint DEFAULT NULL,
  `doctorname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `availabledays` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `availabletime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserting 17 rows into doctorslists
-- Insert batch #1
INSERT INTO doctorslists (id, doctorid, doctorname, department, availabledays, availabletime, created_at, updated_at) VALUES
(5, 1, 'Dr. Simon Ryes', 'Cardiology', 'Monday, Wednesday, Friday', '7am-5pm', NULL, NULL),
(6, 2, 'Dr. Smith Jones', 'General Medecine', 'Tuesday, Thursday', '8am-10am/3pm-5pm', NULL, NULL),
(8, 4, 'Dr. Maricar Ryes', 'Cardiology', 'Monday, Wednesday, Friday', '7am-5pm', NULL, NULL),
(9, 5, 'Dr. Ryan Jones', 'General Medecine', 'Tuesday, Thursday', '8am-10am/3pm-5pm', NULL, NULL),
(10, 6, 'Dr. Anthon Jones', 'ENT', 'Monday, Wednesday, Friday', '7am-5pm', NULL, NULL),
(11, 7, 'Dr. Kathy Mcphee', 'Cardiology', 'Monday, Wednesday, Friday', '7am-5pm', NULL, NULL),
(17, 7, 'Dr. Michael Jackson', 'Ortho', 'Monday, Tueday', '9:00AM - 5:00PM', '2023-04-06 10:43:08', '2023-04-06 10:43:08'),
(19, 6, 'Dr. Michael Jackson', 'Ortho', 'Monday, Tueday, Wednesday', '9:00AM - 5:00PM', '2023-04-06 10:45:34', '2023-04-06 10:45:34'),
(20, 7, 'Dr. Michael Johson5', 'Ortho', 'Monday, Tueday, Wednesday', '9:00AM - 5:00PM', '2023-04-06 10:50:53', '2023-04-06 10:50:53'),
(21, 5, 'Dr. Gerard Alain Potato', 'Ortho', 'Monday, Tueday, Wednesday', '9:00AM - 5:00PM', '2023-04-06 10:51:19', '2023-04-06 10:51:19'),
(23, 8, 'Dr. John Fuentes', 'Ortho', 'Monday, Tueday, Wednesday', '9:00AM - 5:00PM', '2023-04-06 12:48:44', '2023-04-06 12:48:44'),
(24, 9, 'Dr. Gerard Alain Potatorrr', 'Ortho', 'Monday, Tueday, Wednesday', '9:00AM - 5:00PM', '2023-04-06 12:49:39', '2023-04-06 12:49:39'),
(25, 16, 'Dr. Doctor 1', 'General Surgery', 'Monday, Tueday, Wednesday', '9:00AM - 5:00PM', '2023-04-07 05:09:33', '2023-04-07 05:09:33'),
(26, 17, 'Dr. Doctor 2', 'Oncology', 'Monday, Tueday, Wednesday', '9:00AM - 5:00PM', '2023-04-07 05:09:46', '2023-04-07 05:09:46'),
(27, 18, 'Dr. Doctor 3', 'Cardiology', 'Monday, Tueday, Wednesday', '9:00AM - 5:00PM', '2023-04-07 05:09:56', '2023-04-07 05:09:56'),
(28, 19, 'Dr. Doctor 4', 'Radiology', 'Tueday, Thursday', '9:00AM - 5:00PM', '2023-04-07 05:10:14', '2023-04-07 05:10:14'),
(29, 20, 'Dr. Doctor 5', 'ENT', 'Monday, Tueday, Wednesday', '9:00AM - 5:00PM', '2023-04-07 05:10:22', '2023-04-07 05:10:22');

-- END TABLE doctorslists

-- BEGIN TABLE doctorspatientappointments
DROP TABLE IF EXISTS doctorspatientappointments;
CREATE TABLE `doctorspatientappointments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `patientid` bigint DEFAULT NULL,
  `doctorid` bigint DEFAULT NULL,
  `patientname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointmentdate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserting 18 rows into doctorspatientappointments
-- Insert batch #1
INSERT INTO doctorspatientappointments (id, patientid, doctorid, patientname, department, appointmentdate, status, created_at, updated_at) VALUES
(1, 11, 16, 'Patient 1', 'General Surgery', '2023-04-30 12:00 PM', 'Done Check-up', '2023-04-10 13:48:10', '2023-05-01 05:18:22'),
(2, 11, 16, 'Patient 1', 'General Surgery', 'April 8,2023', 'Done Check-up', '2023-04-10 13:48:27', '2023-04-15 04:56:53'),
(3, 11, 16, 'Patient 1', 'General Surgery', 'April 30,2023', 'Done Check-up', '2023-04-10 13:48:29', '2023-04-15 04:56:59'),
(4, 12, 16, 'Patient 2', 'General Surgery', 'June 12, 2023 8AM', 'Done Check-up', '2023-04-18 12:14:31', '2023-04-21 02:18:03'),
(5, 11, 18, 'Patient 1', 'Cardiology', 'May 5, 2023', 'Done Check-up', '2023-04-22 14:01:56', '2023-04-22 14:02:38'),
(6, 11, 2, 'Patient 1', 'General Medecine', '2023-04-06', 'Cancel', '2023-04-29 09:21:07', '2023-04-29 14:54:07'),
(7, 11, 18, 'Patient 1', 'Cardiology', '2023-05-11 9:00 AM', 'Cancel', '2023-04-29 09:25:43', '2023-04-30 06:01:56'),
(8, 11, 18, 'Patient 1', 'Cardiology', '2023-04-14 12:00 PM', 'Cancel', '2023-04-29 10:02:00', '2023-04-29 13:57:23'),
(9, 11, 1, 'Patient 1', 'Cardiology', '2023-04-06 12:00 PM', 'Cancel', '2023-04-29 10:17:59', '2023-04-29 14:54:52'),
(10, 11, 1, 'Patient 1', 'Cardiology', '2023-04-30 9:00 AM', 'Cancel', '2023-04-29 10:21:15', '2023-04-29 14:54:21'),
(11, 11, 20, 'Patient 1', 'ENT', '2023-06-05 10:00 AM', 'Cancel', '2023-04-29 14:55:54', '2023-04-30 03:23:12'),
(12, 11, 18, 'Patient 1', 'Cardiology', '2023-05-09 10:00 AM', 'For Approval', '2023-05-01 05:32:04', '2023-05-01 05:32:04'),
(13, 12, 16, 'Patient 2', 'General Surgery', '2023-05-11 12:00 PM', 'Approved/Active', '2023-05-01 13:17:23', '2023-05-01 13:18:17'),
(14, 11, 16, 'Patient 1', 'General Surgery', '2023-05-03 12:00 PM', 'For Approval', '2023-05-01 13:51:30', '2023-05-01 13:51:30'),
(15, 11, 18, 'Patient 1', 'Cardiology', '2023-05-17 8:45 AM', 'For Approval', '2023-05-02 12:02:42', '2023-05-02 12:02:42'),
(16, 11, 18, 'Patient 1', 'Cardiology', '2023-05-10 2:00 PM', 'Approved/Active', '2023-05-02 12:04:17', '2023-05-02 12:05:07'),
(17, 11, 18, 'Patient 1', 'Cardiology', '2023-07-10 1:00 PM', 'Approved/Active', '2023-05-02 12:12:37', '2023-05-02 12:25:33'),
(18, 11, 18, 'Patient 1', 'Cardiology', '2023-09-06 11:00 AM', 'For Approval', '2023-05-02 12:28:22', '2023-05-02 12:28:22');

-- END TABLE doctorspatientappointments

-- BEGIN TABLE doctorsschedules
DROP TABLE IF EXISTS doctorsschedules;
CREATE TABLE `doctorsschedules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `doctorslistid` bigint DEFAULT NULL,
  `day` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserting 2 rows into doctorsschedules
-- Insert batch #1
INSERT INTO doctorsschedules (id, doctorslistid, `day`, doctor, `time`, created_at, updated_at) VALUES
(5, 1, 'Monday', 'Dr. John Jones', '8:00AM', NULL, NULL),
(6, 2, 'Tuesday', 'Dr. John Teng', '10:00AM', NULL, NULL);

-- END TABLE doctorsschedules

-- BEGIN TABLE failed_jobs
DROP TABLE IF EXISTS failed_jobs;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table failed_jobs contains no data. No inserts have been genrated.
-- Inserting 0 rows into failed_jobs


-- END TABLE failed_jobs

-- BEGIN TABLE migrations
DROP TABLE IF EXISTS migrations;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserting 4 rows into migrations
-- Insert batch #1
INSERT INTO migrations (id, migration, batch) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- END TABLE migrations

-- BEGIN TABLE password_resets
DROP TABLE IF EXISTS password_resets;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserting 1 row into password_resets
-- Insert batch #1
INSERT INTO password_resets (email, token, created_at) VALUES
('gaypotato1990@gmail.com', '$2y$10$xcyKWuwgmFKEA893qOsz2usg4m188rBorLxtXeon1F3iFSlJzim1K', '2023-04-22 14:58:28');

-- END TABLE password_resets

-- BEGIN TABLE patientdoctorlists
DROP TABLE IF EXISTS patientdoctorlists;
CREATE TABLE `patientdoctorlists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `patientid` bigint DEFAULT NULL,
  `doctorid` bigint DEFAULT NULL,
  `doctorspatientappointmentid` bigint DEFAULT NULL,
  `doctorname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointmentdate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserting 18 rows into patientdoctorlists
-- Insert batch #1
INSERT INTO patientdoctorlists (id, patientid, doctorid, doctorspatientappointmentid, doctorname, department, appointmentdate, status, created_at, updated_at) VALUES
(1, 11, 16, 1, 'Dr. Doctor 1', 'General Surgery', '2023-04-30 12:00 PM', 'Done Check-up', '2023-04-10 13:48:10', '2023-05-01 05:18:22'),
(2, 11, 16, 2, 'Dr. Doctor 1', 'General Surgery', 'April 8,2023', 'Done Check-up', '2023-04-10 13:48:27', '2023-04-15 04:56:53'),
(3, 11, 16, 3, 'Dr. Doctor 1', 'General Surgery', 'May 20, 2023 8AM', 'Done Check-up', '2023-04-10 13:48:30', '2023-04-20 16:57:05'),
(4, 12, 16, 4, 'Dr. Doctor 1', 'General Surgery', 'April 30,2023', 'Done Check-up', '2023-04-18 12:14:31', '2023-04-21 02:18:03'),
(5, 11, 18, 5, 'Dr. Doctor 3', 'Cardiology', 'May 5, 2023', 'Done Check-up', '2023-04-22 14:01:56', '2023-04-22 14:02:38'),
(6, 11, 2, 6, 'Dr. Smith Jones', 'General Medecine', '2023-04-06', 'Cancel', '2023-04-29 09:21:07', '2023-04-29 14:54:07'),
(7, 11, 18, 7, 'Dr. Doctor 3', 'Cardiology', '2023-05-11 9:00 AM', 'Cancel', '2023-04-29 09:25:43', '2023-04-30 06:01:56'),
(8, 11, 18, 8, 'Dr. Doctor 3', 'Cardiology', '2023-04-14 12:00 PM', 'Cancel', '2023-04-29 10:02:00', '2023-04-29 13:57:23'),
(9, 11, 1, 9, 'Dr. Simon Ryes', 'Cardiology', '2023-04-06 12:00 PM', 'Cancel', '2023-04-29 10:17:59', '2023-04-29 14:54:52'),
(10, 11, 1, 10, 'Dr. Simon Ryes', 'Cardiology', '2023-04-30 9:00 AM', 'Cancel', '2023-04-29 10:21:15', '2023-04-29 14:54:21'),
(11, 11, 20, 11, 'Dr. Doctor 5', 'ENT', '2023-06-05 10:00 AM', 'Cancel', '2023-04-29 14:55:54', '2023-04-30 03:23:12'),
(12, 11, 18, 12, 'Dr. Doctor 3', 'Cardiology', '2023-05-09 10:00 AM', 'For Approval', '2023-05-01 05:32:04', '2023-05-01 05:32:04'),
(13, 12, 16, 13, 'Dr. Doctor 1', 'General Surgery', '2023-05-11 12:00 PM', 'Approved/Active', '2023-05-01 13:17:23', '2023-05-01 13:18:17'),
(14, 11, 16, 14, 'Doctor 1', 'General Surgery', '2023-05-03 12:00 PM', 'For Approval', '2023-05-01 13:51:30', '2023-05-01 13:51:30'),
(15, 11, 18, 15, 'Dr. Doctor 3', 'Cardiology', '2023-05-17 8:45 AM', 'For Approval', '2023-05-02 12:02:42', '2023-05-02 12:02:42'),
(16, 11, 18, 16, 'Dr. Doctor 3', 'Cardiology', '2023-05-10 2:00 PM', 'Approved/Active', '2023-05-02 12:04:17', '2023-05-02 12:05:07'),
(17, 11, 18, 17, 'Dr. Doctor 3', 'Cardiology', '2023-07-10 1:00 PM', 'Approved/Active', '2023-05-02 12:12:37', '2023-05-02 12:25:33'),
(18, 11, 18, 18, 'Doctor 3', 'Cardiology', '2023-09-06 11:00 AM', 'For Approval', '2023-05-02 12:28:22', '2023-05-02 12:28:22');

-- END TABLE patientdoctorlists

-- BEGIN TABLE patientsappointmentlist
DROP TABLE IF EXISTS patientsappointmentlist;
CREATE TABLE `patientsappointmentlist` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `doctorname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointmentdate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table patientsappointmentlist contains no data. No inserts have been genrated.
-- Inserting 0 rows into patientsappointmentlist


-- END TABLE patientsappointmentlist

-- BEGIN TABLE personal_access_tokens
DROP TABLE IF EXISTS personal_access_tokens;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table personal_access_tokens contains no data. No inserts have been genrated.
-- Inserting 0 rows into personal_access_tokens


-- END TABLE personal_access_tokens

-- BEGIN TABLE uploads
DROP TABLE IF EXISTS uploads;
CREATE TABLE `uploads` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `doctorid` bigint DEFAULT NULL,
  `doctorname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patientid` bigint DEFAULT NULL,
  `patientname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnostic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserting 15 rows into uploads
-- Insert batch #1
INSERT INTO uploads (id, doctorid, doctorname, patientid, patientname, imagename, diagnostic, `size`, created_at, updated_at) VALUES
(5, 11, 'Dr. Juan', 11, 'John', '2-REGPAGE.png', 'COVID', 111170, '2023-04-22 16:56:56', '2023-04-22 16:56:56'),
(6, 11, 'Dr. Juan', 11, 'John', '2-REGPAGE.png', 'COVID', 111170, '2023-04-22 17:15:10', '2023-04-22 17:15:10'),
(7, 11, 'Dr. Juan', 11, 'John', '2-REGPAGE.pngtest2023-04-22 17:49:43', 'COVID', 111170, '2023-04-22 17:49:43', '2023-04-22 17:49:43'),
(8, 11, 'Dr. Juan', 11, 'John', '2-REGPAGE.png', 'COVID', 111170, '2023-04-22 17:59:23', '2023-04-22 17:59:23'),
(9, 11, 'Dr. Juan', 11, 'John', 'test-2023-04-24 12:07:14-2-REGPAGE.png', 'COVID', 111170, '2023-04-24 12:07:14', '2023-04-24 12:07:14'),
(10, 11, 'Dr. Juan', 11, 'John', 'test-2023-04-27 13:09:02-1-REGPAGE.png', 'COVID', 111648, '2023-04-27 13:09:02', '2023-04-27 13:09:02'),
(11, 16, 'Doctor 1', 11, 'Patient 1', 'test-2023-04-27 13:16:56-download.png', 'COVID', 9832, '2023-04-27 13:16:56', '2023-04-27 13:16:56'),
(12, 16, 'Doctor 1', 12, 'Patient 2', 'test-2023-04-27 13:34:27-1-result.png', 'COVID', 142070, '2023-04-27 13:34:27', '2023-04-27 13:34:27'),
(13, 16, 'Doctor 1', 12, 'Patient 2', 'Patient 2 -2023-04-27 13:37:52-2-Profile.png', 'COVID', 112893, '2023-04-27 13:37:52', '2023-04-27 13:37:52'),
(14, 16, 'Doctor 1', 11, 'Patient 1', 'Patient 1-2023-04-27 15:50:31-3-REGPAGE.png', 'COVID', 120178, '2023-04-27 15:50:31', '2023-04-27 15:50:31'),
(15, 16, 'Doctor 1', 11, 'Patient 1', 'Patient 1-2023-04-27 15:56:16-3-REGPAGE.png', 'SARS', 120178, '2023-04-27 15:56:16', '2023-04-27 15:56:16'),
(16, 16, 'Doctor 1', 12, 'Patient 2', 'Patient 2-2023-04-28 13:29:15-2-appointmentpage.png', 'SARS', 115014, '2023-04-28 13:29:15', '2023-04-28 13:29:15'),
(17, 18, 'Doctor 3', 11, 'Patient 1', 'Patient 1-2023-04-29 15:25:28-3-REGPAGE.png', 'diabetes', 120178, '2023-04-29 15:25:28', '2023-04-29 15:25:28'),
(18, 16, 'Doctor 1', 11, 'Patient 1', 'Patient 1-2023-04-29 15:41:56-3-REGPAGE.png', 'SARS', 120178, '2023-04-29 15:41:56', '2023-04-29 15:41:56'),
(19, 16, 'Doctor 1', 11, 'Patient 1', 'Patient 1-2023-05-01 03:20:14-3-REGPAGE.png', 'SARSw', 120178, '2023-05-01 03:20:14', '2023-05-01 03:20:14');

-- END TABLE uploads

-- BEGIN TABLE users
DROP TABLE IF EXISTS users;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_number` bigint DEFAULT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Inserting 13 rows into users
-- Insert batch #1
INSERT INTO users (id, name, email, address, telephone_number, usertype, email_verified_at, password, remember_token, created_at, updated_at, otp) VALUES
(5, 'Gerard Alain Potato', 'gypotato@up.edu.ph3', 'Pilar Village', 11111212112, NULL, NULL, '$2y$10$44dR7MMX1b5VIZbcx1bTTOzuuiS2R8YFval85rz.TWMbPhTIz/0PK', NULL, '2023-03-06 14:21:26', '2023-03-06 14:21:26', NULL),
(6, 'Michael Jackson', 'gaypotato1990@gmail.com', 'Manila', 123456789, NULL, NULL, '$2y$10$ivCuf486PZ/7Opk.xepUpeFvxYlCiKxoYcHi1Hi/ToCdfOIiohUA6', NULL, '2023-04-01 15:17:39', '2023-04-01 15:17:39', NULL),
(11, 'Patient 1', 'test01@test.com', 'Manila', 912345577, 'Patient', NULL, '$2y$10$RpZuIaq6QOC8bv764WGxUOGDl18E/g2AszzaFed0MV6jWAFRqFLu.', NULL, '2023-04-07 03:14:08', '2023-04-07 03:14:08', NULL),
(12, 'Patient 2', 'test02@test.com', 'Manila', 912345577, 'Patient', NULL, '$2y$10$ulpu7XOlMnyFXAUhSiUJoOdTnOfQRIFvuNDk.k5ZvuaqdF9ZqFKH6', NULL, '2023-04-07 03:15:33', '2023-04-07 03:15:33', NULL),
(13, 'Patient 3', 'test03@test.com', 'Manila City', 912345577, 'Patient', NULL, '$2y$10$Sf1XtV8LULYTOhjv6URc.O3OnXz4pzdPnAaYHvCzW1kRc/BGpi8Iq', NULL, '2023-04-07 03:18:09', '2023-04-07 03:18:09', NULL),
(14, 'Patient 4', 'test04@test.com', 'Manila City', 912345577, 'Patient', NULL, '$2y$10$sQxzE.jClWpaZh58UhAVVuv5A0HEUlN67KaeoL6Cw/Aq7BlOYhng2', NULL, '2023-04-07 03:18:56', '2023-04-07 03:18:56', NULL),
(15, 'Patient 5', 'test05@test.com', 'Manila City', 912345577, 'Patient', NULL, '$2y$10$ssheswa01hOh6zDfcmIZ7O11wlxxtDDOETfH2EqNms0NlImEHwYA.', NULL, '2023-04-07 03:20:15', '2023-04-07 03:20:15', NULL),
(16, 'Doctor 1', 'dtest01@test.com', 'Manila City', 912345577, 'Doctor', NULL, '$2y$10$s6nVDMBod7OcGE2BHsaSwOsVmYprflpfJ5K3W/1c6HaBDc6ahRS2e', NULL, '2023-04-07 03:21:44', '2023-04-07 03:21:44', NULL),
(17, 'Doctor 2', 'dtest02@test.com', 'Makati', 9178763339, 'Doctor', NULL, '$2y$10$eAG61vAyKvM/UzI8iS27/ui5kEZjgONgHKyZC2HLyVf7FG0dr9K/e', NULL, '2023-04-07 03:23:22', '2023-04-07 03:23:22', NULL),
(18, 'Doctor 3', 'dtest03@test.com', 'Makati', 9178763339, 'Doctor', NULL, '$2y$10$2aBVeDSx/pYDuZ7DX8SaeOAlCziMVz03YWLiZ2aJ8RrbPc.i66ACC', NULL, '2023-04-07 03:23:52', '2023-04-07 03:23:52', NULL),
(19, 'Doctor 4', 'dtest04@test.com', 'Manila City', 9178763569, 'Doctor', NULL, '$2y$10$YToPYLRfufKzVFz8fknjOe2q4KpcLqXAp8K9MzVTvVLh5yEXFXkS.', NULL, '2023-04-07 03:32:40', '2023-04-07 03:32:40', NULL),
(20, 'Doctor 5', 'dtest05@test.com', 'Manila City', 912345577, 'Doctor', NULL, '$2y$10$fN6fUvOulM0HgkIQ8Q65Muv3w2tjQCCkUCFcCp7Dbm5qO2y.OcOo.', NULL, '2023-04-07 03:35:39', '2023-04-07 03:35:39', NULL),
(22, 'Emma2', 'emmavasquez773@gmail.com', 'Manila', 9178953783, 'Patient', NULL, '$2y$10$vkk/LL00h1MgIw7GVkKTtOmjUdB7iYPXfyEEnYlBDJLBT.rC53BoS', 'OkvNEIiW8oWdEuXzWRknEA56EtC14FsdanEQTEJwVOoqHAoR38DPt03tDxai', '2023-05-01 05:39:42', '2023-05-01 06:51:47', NULL);

-- END TABLE users

