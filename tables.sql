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

CREATE TABLE `cars` (
  `id` int AUTO_INCREMENT NOT NULL,
  `carmodel` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `driver` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cars` (`id`, `carmodel`, `color`, `capacity`, `driver`) VALUES
(1, 'Fiat Multipla', 'Rouge', '3', 'Mark'),
(2, 'Porsche cayen', 'Noir', '1', 'Cléa'),
(3, 'Citroen picasso C4', 'Gris', '3', 'Théo');