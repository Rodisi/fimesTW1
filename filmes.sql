-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2014 at 09:38 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `filmes`
--

-- --------------------------------------------------------

--
-- Table structure for table `filmes`
--

CREATE TABLE IF NOT EXISTS `filmes` (
  `idFilme` int(11) NOT NULL AUTO_INCREMENT,
  `idTipo` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `realizador` varchar(128) NOT NULL,
  `sinopse` varchar(512) NOT NULL,
  `imagem` varchar(256) NOT NULL,
  `imagemthumb` varchar(256) NOT NULL,
  `votos` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `actores` varchar(256) NOT NULL,
  PRIMARY KEY (`idFilme`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `filmes`
--

INSERT INTO `filmes` (`idFilme`, `idTipo`, `nome`, `realizador`, `sinopse`, `imagem`, `imagemthumb`, `votos`, `ano`, `actores`) VALUES
(8, 1, 'aaa', 'ssss', '<p>fdfdfdfdffd</p>\r\n', 'upload/tumblr_mv25yeNT6j1sq38yao1_400.gif', '', 2, 2005, 'aaaa'),
(9, 6, 'fghfghfghfgh', 'fghfghfghfghfgh', '<p>fgfghfghfghfgh</p>\r\n', 'upload/Wrj5YTE.jpg', '', 4, 1995, 'fghfghfgh');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
