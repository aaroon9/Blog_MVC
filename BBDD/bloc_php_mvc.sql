-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 03-12-2018 a les 00:38:53
-- Versió del servidor: 10.1.36-MariaDB
-- Versió de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `bloc_php_mvc`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `coches`
--

DROP TABLE IF EXISTS `coches`;
CREATE TABLE `coches` (
  `bastidor` varchar(15) NOT NULL,
  `marca` varchar(15) NOT NULL,
  `modelo` varchar(15) NOT NULL,
  `puertas` enum('3','4','5','') DEFAULT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcament de dades per a la taula `coches`
--

INSERT INTO `coches` (`bastidor`, `marca`, `modelo`, `puertas`, `created`) VALUES
('VF61273', 'Ford', 'Mondeo', '5', '2018-11-29'),
('VG325', 'Tesla', 'Model X', '5', '2018-12-02');

-- --------------------------------------------------------

--
-- Estructura de la taula `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(512) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `titulo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcament de dades per a la taula `posts`
--

INSERT INTO `posts` (`id`, `author`, `content`, `image`, `created`, `modified`, `titulo`) VALUES
(1, 'alexito', 'hola soy yo', '', '0000-00-00', '0000-00-00', ''),
(2, 'pepe', 'hola osy pepe', '', '0000-00-00', '0000-00-00', ''),
(3, 'alexito', 'hola soy yo', '', '0000-00-00', '0000-00-00', ''),
(19, 'potato', 'hola adrian', 'ea3ec03857c2fe919c8fa04f11a24f22492882ae-Captura de pantalla de 2018-03-02 10-59-04.png', '2018-12-02', '0000-00-00', 'patata');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `coches`
--
ALTER TABLE `coches`
  ADD PRIMARY KEY (`bastidor`);

--
-- Índexs per a la taula `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
