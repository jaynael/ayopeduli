-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2014 pada 11.22
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
-- Struktur dari tabel `ap_product`
--

CREATE TABLE IF NOT EXISTS `ap_product` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `productid` varchar(10) NOT NULL,
  `partnerid` varchar(10) NOT NULL,
  `namapartner` varchar(75) NOT NULL,
  `product` varchar(50) NOT NULL,
  `poin` int(10) NOT NULL,
  `tersedia` int(10) NOT NULL,
  `teredeem` int(10) NOT NULL,
  `tersisa` int(10) NOT NULL,
  `desk` text NOT NULL,
  `pic` varchar(100) NOT NULL,
  `stat` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `ap_product`
--

INSERT INTO `ap_product` (`id`, `productid`, `partnerid`, `namapartner`, `product`, `poin`, `tersedia`, `teredeem`, `tersisa`, `desk`, `pic`, `stat`) VALUES
(1, 'UAP00001', '', 'Tripseru.com', 'Diskon 10 Persen All trip', 100, 100, 0, 100, '<p>Lorem Ipsum</p>', 'bc20831282012ea320ac3d2c98609bc8.png', 1),
(2, 'POAP00002', '', 'Blue Bird', 'Blue Bird', 90, 100, 0, 100, '<p>Blue Birds,</p>', '0f20be23a0f38eb9047bb40940c121fa.png', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
