ALTER TABLE `products` ADD `deleted_at` TIMESTAMP NULL AFTER `updated_at`; 
ALTER TABLE `attributes` ADD `deleted_at` TIMESTAMP NULL AFTER `updated_at`;
ALTER TABLE `categories` ADD `deleted_at` TIMESTAMP NULL AFTER `updated_at`;
ALTER TABLE `carriers` ADD `deleted_at` TIMESTAMP NULL AFTER `updated_at`;
ALTER TABLE `orders` ADD `deleted_at` TIMESTAMP NULL AFTER `updated_at`;
ALTER TABLE `order_details` ADD `deleted_at` TIMESTAMP NULL AFTER `updated_at`;
ALTER TABLE `shops` ADD `deleted_at` TIMESTAMP NULL AFTER `updated_at`;
