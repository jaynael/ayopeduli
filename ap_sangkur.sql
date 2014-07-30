-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2014 pada 10.36
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `ayopedulinew`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ap_sangkur`
--

CREATE TABLE IF NOT EXISTS `ap_sangkur` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `stat` int(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `komunitas` varchar(50) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `ap_sangkur`
--

INSERT INTO `ap_sangkur` (`id`, `stat`, `nama`, `email`, `komunitas`, `hp`, `pesan`) VALUES
(1, 0, 'Adi Guna', 'guna@ayopeduli.com', 'Ayopeduli', '82738749234', '0'),
(2, 0, 'Ajun', 'ajun@sangkur.com', 'sangkur', '08349183749134', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
