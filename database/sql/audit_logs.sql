
--
-- Table structure for table `audit_logs`
--


CREATE TABLE `audit_logs` (
  `id` bigint NOT NULL,
  `description` text NOT NULL,
  `subject_id` bigint DEFAULT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `properties` text,
  `host` varchar(46) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
); 

ALTER TABLE `audit_logs` CHANGE `id` `id` BIGINT NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`id`);