create database book_buddy;
use book_buddy;
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    uid VARCHAR(45) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE `book_buddy`.`book_details` (
  `add_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT UNIQUE,
  `user_id` INT(10) NOT NULL,
  `book_name` VARCHAR(45) NOT NULL,
  `author_name` VARCHAR(45) NOT NULL,
  `branch` VARCHAR(45) NOT NULL,
  `semester` VARCHAR(10) NOT NULL,
  `price` INT(10) NOT NULL,
	`phone_no` INT(10) NOT NULL,
  `message` VARCHAR(45) NOT NULL,
  `created` DATETIME DEFAULT CURRENT_TIMESTAMP,

  CONSTRAINT `userid`
    FOREIGN KEY (`user_id`)
    REFERENCES `book_buddy`.`users` (`id`)
    );
    
    	      CREATE TABLE `book_buddy`.`images` (
	  `image_id` INT AUTO_INCREMENT UNIQUE,
	  `add_id` INT(11) NOT NULL,
	  `user_id` INT(11) NOT NULL,
	  `image` varchar(45) NOT NULL,
	  `created` datetime DEFAULT CURRENT_TIMESTAMP,
	  CONSTRAINT `add_id`
	    FOREIGN KEY (`add_id`)
	    REFERENCES `book_buddy`.`book_details` (`add_id`)
	    ,
	  CONSTRAINT `user_id`
	    FOREIGN KEY (`user_id`)
	    REFERENCES `book_buddy`.`users` (`id`)
	  );
CREATE TABLE IF NOT EXISTS `admin` (
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(40) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;



INSERT INTO `admin` (`name`, `pass`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

insert into users (username,password,uid) values('allen','$2y$10$hDnl9rf0KaYGGkGcoEw6/eKTwn5mIhI4n1AJD2/a.e7v3hmbp6pru','u1703021');
insert into users (username,password,uid) values('jerry','$2y$10$p1xFil7iOXdepSyJse.XhOuly7QfovxiQalC0Mqrgwimr3bftTU8y','u1703022');
insert into users (username,password,uid) values('adarsh','$2y$10$p1xFil7iOXdepSyJse.XhOuly7QfovxiQalC0Mqrgwimr3bftTU8y','u1703023');
insert into users (username,password,uid) values('anu','$2y$10$p1xFil7iOXdepSyJse.XhOuly7QfovxiQalC0Mqrgwimr3bftTU8y','u1703024');
insert into users (username,password,uid) values('akshay','$2y$10$p1xFil7iOXdepSyJse.XhOuly7QfovxiQalC0Mqrgwimr3bftTU8y','u1703025');
insert into users (username,password,uid) values('aaron','$2y$10$p1xFil7iOXdepSyJse.XhOuly7QfovxiQalC0Mqrgwimr3bftTU8y','u1703026');
insert into users (username,password,uid) values('asish','$2y$10$p1xFil7iOXdepSyJse.XhOuly7QfovxiQalC0Mqrgwimr3bftTU8y','u1703027');
insert into users (username,password,uid) values('chinnu','$2y$10$p1xFil7iOXdepSyJse.XhOuly7QfovxiQalC0Mqrgwimr3bftTU8y','u1703028');
insert into users (username,password,uid) values('jhanvi','$2y$10$p1xFil7iOXdepSyJse.XhOuly7QfovxiQalC0Mqrgwimr3bftTU8y','u1703029');
