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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cars` (`id`, `carmodel`, `color`, `capacity`) VALUES
(1, 'Fiat Multipla', 'Rouge', '3'),
(2, 'Porsche cayen', 'Noir', '1'),
(3, 'Citroen picasso C4', 'Gris', '3'),
(4, 'Mercedes', 'Rose', '7');


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

CREATE TABLE `users_cars` (
  `id` int AUTO_INCREMENT NOT NULL,
  `user_id` int NOT NULL,
  `car_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_cars` (`id`, `user_id`, `car_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 3, 4);


CREATE TABLE `users_adds` (
  `id` int AUTO_INCREMENT NOT NULL,
  `add_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_adds` (`id`, `user_id`, `add_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 7),
(4, 3, 3);