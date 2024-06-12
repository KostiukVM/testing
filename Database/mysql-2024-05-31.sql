use testdb;
create schema test;

CREATE TABLE `books`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `author` VARCHAR(255) NOT NULL,
    `year` BIGINT NOT NULL,
    `genreId` BIGINT NOT NULL
);
CREATE TABLE `genres`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL
);
CREATE TABLE `records`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `visitorId` BIGINT NOT NULL,
    `bookId` BIGINT NOT NULL,
    `date_of_issue` DATETIME NOT NULL,
    `return_date` DATETIME NULL
);
CREATE TABLE `visitors`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `lastname` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `phone` BIGINT NOT NULL
);


ALTER TABLE
    `books` ADD CONSTRAINT `books_genreid_foreign` FOREIGN KEY(`genreId`) REFERENCES `genres`(`id`);
ALTER TABLE
    `records` ADD CONSTRAINT `record_bookid_foreign` FOREIGN KEY(`bookId`) REFERENCES `books`(`id`);
ALTER TABLE
    `records` ADD CONSTRAINT `record_visitorid_foreign` FOREIGN KEY(`visitorId`) REFERENCES `visitors`(`id`);