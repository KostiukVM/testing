use testdb;
create schema testdb;

CREATE TABLE `books`(
                        `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        `name` VARCHAR(255) NOT NULL,
                        `author` VARCHAR(255) NOT NULL,
                        `year` BIGINT NOT NULL,
                        `genreId` BIGINT NOT NULL,
                        `inStock` BOOL DEFAULT TRUE
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
                         `return_date` DATETIME NULL,
                         `active` BOOLEAN NOT NULL DEFAULT FALSE
);
CREATE TABLE `visitors`(
                           `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                           `name` VARCHAR(255) NOT NULL,
                           `lastname` VARCHAR(255) NOT NULL,
                           `email` VARCHAR(255) NOT NULL,
                           `phone` VARCHAR(11) NOT NULL
);
ALTER TABLE
    `books` ADD CONSTRAINT `books_genreid_foreign` FOREIGN KEY(`genreId`) REFERENCES `genre`(`id`);
ALTER TABLE
    `record` ADD CONSTRAINT `record_bookid_foreign` FOREIGN KEY(`bookId`) REFERENCES `books`(`id`);
ALTER TABLE
    `record` ADD CONSTRAINT `record_visitorid_foreign` FOREIGN KEY(`visitorId`) REFERENCES `visitors`(`id`);

