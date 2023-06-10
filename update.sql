DROP TABLE IF EXISTS `tb_content`;
CREATE TABLE `tb_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(225) NOT NULL,
  `date_create` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_content` (`id`, `content`, `date_create`) VALUES
(1,	'content workshop',	'2023-06-03 05:37:32'),
(2,	'content workshop',	'2023-06-03 05:41:30'),
(3,	'content workshop',	'2023-06-03 05:41:30');

DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `date_create` datetime NOT NULL,
  `role` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_users` (`id`, `name`, `email`, `password`, `date_create`, `role`) VALUES
(1,	'admin',	'admin@mail.com',	'$2a$12$6YAJiiBC4kMUSdPWS3.6nOsXaXWlVO7qxhQvEkUhT5D0bmY85pL1u',	'2023-06-10 02:54:47',	'su');
