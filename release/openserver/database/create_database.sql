CREATE DATABASE IF NOT EXISTS asu
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

CREATE USER IF NOT EXISTS 'asu_user'@'localhost'
IDENTIFIED BY 'change_this_password';

GRANT ALL PRIVILEGES ON asu.*
TO 'asu_user'@'localhost';

FLUSH PRIVILEGES;
