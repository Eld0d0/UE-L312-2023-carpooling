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

CREATE TABLE `adds` (
  `id` int AUTO_INCREMENT NOT NULL,
  `driverId` int NOT NULL,
  `carId` int NOT NULL,
  `tripDateAndTime` datetime NOT NULL,
  `tripDepartureCity` varchar(255) NOT NULL,
  `tripArrivalCity` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `adds` (`id`, `driverId`, `carId`, `tripDateAndTime`, `tripDepartureCity`, `tripArrivalCity`) VALUES
(1, 1, 1, '2023-11-14 14:30:00', 'Paris', 'Marseille'),
(2, 2, 2, '2023-12-26 18:00:00', 'Lyon', 'Toulouse'),
(3, 3, 2, '2023-11-23 07:15:00', 'Bordeaux', 'Nantes');

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


CREATE TABLE `bookings` (
  `id` int AUTO_INCREMENT NOT NULL,
  `addId` int NOT NULL,
  `passengerId` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `bookings` (`id`, `addId`, `passengerId`) VALUES
(1, 2, 3),
(2, 3, 2),
(3, 1, 1);
