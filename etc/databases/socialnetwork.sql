CREATE TABLE `brays` (
    `id` CHAR(36) NOT NULL,
    `message` VARCHAR(255) NOT NULL,
    `user_id` VARCHAR(36) NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;