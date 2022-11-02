ALTER TABLE `owner_plans` ADD `description` VARCHAR(255) NULL DEFAULT NULL AFTER `location`;
ALTER TABLE `owner_plans` ADD `product_id` VARCHAR(255) NULL DEFAULT NULL AFTER `description`, ADD `price_id` VARCHAR(255) NULL DEFAULT NULL AFTER `product_id`;
ALTER TABLE `owner_plans` CHANGE `type` `type` ENUM('monthly','yearly','day') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;