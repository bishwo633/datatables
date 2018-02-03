-- 
-- Editor SQL for DB table books
-- Created by http://editor.datatables.net/generator
-- 

CREATE TABLE IF NOT EXISTS `books` (
	`id` int(10) NOT NULL auto_increment,
	`name` varchar(255),
	`isbn` varchar(255),
	`author` varchar(255),
	`description` varchar(255),
	`registered_date` date,
	PRIMARY KEY( `id` )
);