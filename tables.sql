CREATE TABLE `users` (
  `id` int AUTO_INCREMENT NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `birthday`) VALUES
(1, 'Vincent', 'Godé', 'hello@vincentgo.fr', '1990-11-08'),
(2, 'Albert', 'Dupond', 'sonemail@gmail.com', '1985-11-08'),
(3, 'Thomas', 'Dumoulin', 'sonemail2@gmail.com', '1985-10-08');

CREATE TABLE `adverts` (
  `id` int AUTO_INCREMENT NOT NULL,
  `iddriver` varchar(255) NOT NULL,
  `idcar` varchar(255) NOT NULL,
  `citystart` varchar(255) NOT NULL,
  `cityend` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `adverts` (`id`, `iddriver`, `idcar`, `citystart`, `cityend`, `date`) VALUES
(1, '1', '2', 'Paris', 'Bordeaux', '2023-11-02'),
(2, '3', '3', 'Marseille', 'Toulouse' '2023-12-05'),
(3, '2', '1', 'Lyon', 'Strasbourg', '2023-12-11');