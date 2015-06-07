CREATE USER 'emir_hellofresh'@'localhost' IDENTIFIED BY 'k7awE8';

GRANT USAGE ON *.* TO 'emir_hellofresh'@'localhost' IDENTIFIED BY 'k7awE8' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;

CREATE DATABASE IF NOT EXISTS `emir_hellofresh`;

GRANT ALL PRIVILEGES ON `emir\_hellofresh`.* TO 'emir_hellofresh'@'localhost';


