CREATE DATABASE company_xyz;

CREATE TABLE items (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `item_name` varchar(50) NOT NULL,
    `item_price` int(11) NOT NULL,
    `quantity` int(11) NOT NULL,
    PRIMARY KEY(`id`)
    );
    
CREATE TABLE users (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(20) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY(`id`)
    );