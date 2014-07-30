-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2014 at 02:08 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ayopeduli`
--

-- --------------------------------------------------------

--
-- Table structure for table `ap_aksi`
--

CREATE TABLE IF NOT EXISTS `ap_aksi` (
  `aid` varchar(25) NOT NULL,
  `kode` int(15) NOT NULL,
  `uid` varchar(25) NOT NULL,
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `featured` int(10) NOT NULL,
  `verified` int(11) NOT NULL,
  `pic` varchar(250) NOT NULL,
  `jumlahtarget` varchar(100) NOT NULL,
  `donasi` varchar(100) NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `vid` varchar(100) NOT NULL,
  `descsing` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `now` varchar(25) NOT NULL,
  `stat` int(10) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `jumlahterkumpul` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ap_aksi`
--

INSERT INTO `ap_aksi` (`aid`, `kode`, `uid`, `id`, `featured`, `verified`, `pic`, `jumlahtarget`, `donasi`, `tgl`, `vid`, `descsing`, `judul`, `slug`, `now`, `stat`, `cat`, `deskripsi`, `jumlahterkumpul`) VALUES
('AAP00001', 123, 'UAP00002', 1, 1, 1, 'ea7914974360a43b4881accfccefcfe4.jpg', '15000000', 'butuh', '1/30/2014', '', 'Balita Penderita Tuberkulosis', 'Davin Raka Abimanyu', 'davin-raka-abimanyu', '12/28/2013 05:57:23', 1, 'kesehatan', '&lt;h2&gt;&lt;strong&gt;Short Summary :&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Contributors fund ideas they can be passionate about and to people they trust. Here are some things to do in this section:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Introduce yourself and your background.&lt;/li&gt;\r\n	&lt;li&gt;Briefly describe your campaign and why it&amp;#39;s important to you.&lt;/li&gt;\r\n	&lt;li&gt;Express the magnitude of what contributors will help you achieve.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Remember, keep it concise, yet personal. Ask yourself: if someone stopped reading here would they be ready to make a contribution?&lt;/p&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;What We Need &amp;amp; What You Get :&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Break it down for folks in more detail:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Explain how much funding you need and where it&amp;#39;s going. Be transparent and specific&amp;mdash;people need to trust you to want to fund you.&lt;/li&gt;\r\n	&lt;li&gt;Tell people about your unique perks. Get them excited!&lt;/li&gt;\r\n	&lt;li&gt;Describe where the funds go if you don&amp;#39;t reach your entire goal.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;The Impact&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Feel free to explain more about your campaign and let people know how the difference their contribution will make:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Explain why your project is valuable to the contributor and to the world.&lt;/li&gt;\r\n	&lt;li&gt;Point out your successful track record with projects like this (if you have one).&lt;/li&gt;\r\n	&lt;li&gt;Make it real for people and build trust.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;Other Ways You Can Help&lt;/strong&gt;&lt;br /&gt;\r\nSome people just can&amp;#39;t contribute, but that doesn&amp;#39;t mean they can&amp;#39;t help:&lt;/h2&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Ask folks to get the word out and make some noise about your campaign.&lt;/li&gt;\r\n	&lt;li&gt;Remind them to use the Indiegogo share tools!&lt;/li&gt;\r\n&lt;/ul&gt;\r\n', '1400000'),
('AAP00002', 121, 'UAP00001', 2, 1, 0, '103cf0bdef8621c34af33bc5b84293ab.png', '6500000', '', '2/30/2014', '', 'Taman Baca untuk pedalaman simalungun', 'Taman Baca Ana', 'taman-baca-ana', '12/28/2013 06:35:31', 1, 'pendidikan', '&lt;h2&gt;&lt;strong&gt;Short Summary :&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Contributors fund ideas they can be passionate about and to people they trust. Here are some things to do in this section:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Introduce yourself and your background.&lt;/li&gt;\r\n	&lt;li&gt;Briefly describe your campaign and why it&amp;#39;s important to you.&lt;/li&gt;\r\n	&lt;li&gt;Express the magnitude of what contributors will help you achieve.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Remember, keep it concise, yet personal. Ask yourself: if someone stopped reading here would they be ready to make a contribution?&lt;/p&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;What We Need &amp;amp; What You Get :&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Break it down for folks in more detail:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Explain how much funding you need and where it&amp;#39;s going. Be transparent and specific&amp;mdash;people need to trust you to want to fund you.&lt;/li&gt;\r\n	&lt;li&gt;Tell people about your unique perks. Get them excited!&lt;/li&gt;\r\n	&lt;li&gt;Describe where the funds go if you don&amp;#39;t reach your entire goal.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;The Impact&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Feel free to explain more about your campaign and let people know how the difference their contribution will make:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Explain why your project is valuable to the contributor and to the world.&lt;/li&gt;\r\n	&lt;li&gt;Point out your successful track record with projects like this (if you have one).&lt;/li&gt;\r\n	&lt;li&gt;Make it real for people and build trust.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;Other Ways You Can Help&lt;/strong&gt;&lt;br /&gt;\r\nSome people just can&amp;#39;t contribute, but that doesn&amp;#39;t mean they can&amp;#39;t help:&lt;/h2&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Ask folks to get the word out and make some noise about your campaign.&lt;/li&gt;\r\n	&lt;li&gt;Remind them to use the Indiegogo share tools!&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;And that&amp;#39;s all there is to it.&lt;/strong&gt;&lt;/h2&gt;\r\n', '775000'),
('AAP00003', 124, 'UAP00003', 3, 1, 1, 'e8111cd8ed7eded7eb3c20964ffc8d66.jpg', '30000000', 'butuh', '03/31/2014', '', 'Penyelamatan Lingkungan Muara Gembong', 'Save Muara Gembong', 'save-muara-gembong', '12/28/2013 10:10:41', 1, 'lingkungan', '&lt;h2&gt;&lt;strong&gt;Short Summary :&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Contributors fund ideas they can be passionate about and to people they trust. Here are some things to do in this section:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Introduce yourself and your background.&lt;/li&gt;\r\n	&lt;li&gt;Briefly describe your campaign and why it&amp;#39;s important to you.&lt;/li&gt;\r\n	&lt;li&gt;Express the magnitude of what contributors will help you achieve.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Remember, keep it concise, yet personal. Ask yourself: if someone stopped reading here would they be ready to make a contribution?&lt;/p&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;What We Need &amp;amp; What You Get :&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Break it down for folks in more detail:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Explain how much funding you need and where it&amp;#39;s going. Be transparent and specific&amp;mdash;people need to trust you to want to fund you.&lt;/li&gt;\r\n	&lt;li&gt;Tell people about your unique perks. Get them excited!&lt;/li&gt;\r\n	&lt;li&gt;Describe where the funds go if you don&amp;#39;t reach your entire goal.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;The Impact&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Feel free to explain more about your campaign and let people know how the difference their contribution will make:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Explain why your project is valuable to the contributor and to the world.&lt;/li&gt;\r\n	&lt;li&gt;Point out your successful track record with projects like this (if you have one).&lt;/li&gt;\r\n	&lt;li&gt;Make it real for people and build trust.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;Other Ways You Can Help&lt;/strong&gt;&lt;br /&gt;\r\nSome people just can&amp;#39;t contribute, but that doesn&amp;#39;t mean they can&amp;#39;t help:&lt;/h2&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Ask folks to get the word out and make some noise about your campaign.&lt;/li&gt;\r\n	&lt;li&gt;Remind them to use the Indiegogo share tools!&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;And that&amp;#39;s all there is to it.&lt;/strong&gt;&lt;/h2&gt;\r\n', '940000'),
('AAP00004', 125, 'UAP00030', 4, 0, 0, '046c486dcf1bd2542384d7e01daa07a7.jpg', '6000000', '', '02/15/2014', '', 'Sisiimsiamisa', 'Sismismism', 'sismismism', '12/31/2013', 1, 'kesehatan', '&lt;h2&gt;&lt;strong&gt;Short Summary :&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Contributors fund ideas they can be passionate about and to people they trust. Here are some things to do in this section:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Introduce yourself and your background.&lt;/li&gt;\r\n	&lt;li&gt;Briefly describe your campaign and why it&amp;#39;s important to you.&lt;/li&gt;\r\n	&lt;li&gt;Express the magnitude of what contributors will help you achieve.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;Remember, keep it concise, yet personal. Ask yourself: if someone stopped reading here would they be ready to make a contribution?&lt;/p&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;What We Need &amp;amp; What You Get :&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Break it down for folks in more detail:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Explain how much funding you need and where it&amp;#39;s going. Be transparent and specific&amp;mdash;people need to trust you to want to fund you.&lt;/li&gt;\r\n	&lt;li&gt;Tell people about your unique perks. Get them excited!&lt;/li&gt;\r\n	&lt;li&gt;Describe where the funds go if you don&amp;#39;t reach your entire goal.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;The Impact&lt;/strong&gt;&lt;/h2&gt;\r\n\r\n&lt;p&gt;Feel free to explain more about your campaign and let people know how the difference their contribution will make:&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Explain why your project is valuable to the contributor and to the world.&lt;/li&gt;\r\n	&lt;li&gt;Point out your successful track record with projects like this (if you have one).&lt;/li&gt;\r\n	&lt;li&gt;Make it real for people and build trust.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;Other Ways You Can Help&lt;/strong&gt;&lt;br /&gt;\r\nSome people just can&amp;#39;t contribute, but that doesn&amp;#39;t mean they can&amp;#39;t help:&lt;/h2&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;Ask folks to get the word out and make some noise about your campaign.&lt;/li&gt;\r\n	&lt;li&gt;Remind them to use the Indiegogo share tools!&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;h2&gt;&lt;strong&gt;And that&amp;#39;s all there is to it.&lt;/strong&gt;&lt;/h2&gt;\r\n', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ap_donasi`
--

CREATE TABLE IF NOT EXISTS `ap_donasi` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `aid` varchar(25) NOT NULL,
  `did` varchar(25) NOT NULL,
  `uid` varchar(25) NOT NULL,
  `namaaksi` varchar(100) NOT NULL,
  `donatur` varchar(100) NOT NULL,
  `poin` int(50) NOT NULL,
  `sembunyi` int(10) NOT NULL,
  `donasi_aksi` int(25) NOT NULL,
  `donasi_ap` int(25) NOT NULL,
  `totaldon` int(50) NOT NULL,
  `statdon` int(10) NOT NULL,
  `time1` varchar(25) NOT NULL,
  `time2` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `did` (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `ap_donasi`
--

INSERT INTO `ap_donasi` (`id`, `aid`, `did`, `uid`, `namaaksi`, `donatur`, `poin`, `sembunyi`, `donasi_aksi`, `donasi_ap`, `totaldon`, `statdon`, `time1`, `time2`) VALUES
(1, 'AAP00002', 'AP00001', 'UAP00011', 'Taman Baca Ana', '', 331, 0, 300000, 30750, 330750, 0, '12/28/2013 12:39:33', ''),
(2, 'AAP00002', 'AP00002', '', 'Taman Baca Ana', '', 331, 0, 300000, 30941, 330941, 0, '12/28/2013 14:58:24', ''),
(3, 'AAP00002', 'AP00003', '', 'Taman Baca Ana', '', 501, 0, 500000, 957, 500957, 0, '12/28/2013 15:02:53', ''),
(4, 'AAP00002', 'AP00004', 'UAP00011', 'Taman Baca Ana', 'yusdiyanti', 83, 0, 75000, 8026, 83026, 1, '12/28/2013 15:10:24', ''),
(5, 'AAP00003', 'AP00005', 'UAP00003', 'Save Muara Gembong', 'Wiwih Hasim', 660, 0, 600000, 60181, 660181, 1, '12/28/2013 15:18:54', ''),
(6, 'AAP00003', 'AP00006', 'UAP00011', 'Save Muara Gembong', 'yusdiyanti', 1, 0, 1000000, 100807, 1100807, 0, '12/28/2013 15:54:50', ''),
(7, 'AAP00002', 'AP00007', 'UAP00003', 'Taman Baca Ana', 'Donatur Ayopeduli', 550, 0, 3849391, 50109, 550109, 1, '12/29/2013 00:54:01', ''),
(8, 'AAP00002', 'AP00008', 'UAP00003', 'Taman Baca Ana', '', 0, 0, 500000, -500000, 0, 0, '12/29/2013 00:54:06', ''),
(9, 'AAP00003', 'AP00009', 'UAP00001', 'Save Muara Gembong', 'Jaenal Gufron', 72, 0, 65000, 7476, 72476, 1, '12/29/2013 03:26:14', ''),
(10, 'AAP00003', 'AP00010', 'UAP00001', 'Save Muara Gembong', 'Jaenal Gufron', 83, 0, 75000, 8146, 83146, 1, '12/29/2013 03:28:36', ''),
(11, 'AAP00001', 'AP00011', 'UAP00013', 'Davin Raka Abimanyu', 'Wiwih Hasim', 184, 0, 200000, 20546, 220546, 1, '12/29/2013 17:43:18', ''),
(12, 'AAP00001', 'AP00012', 'UAP00013', 'Davin Raka Abimanyu', 'Wiwih Hasyim', 275, 0, 300000, 30180, 330180, 1, '12/29/2013 17:59:44', ''),
(13, 'AAP00001', 'AP00013', 'UAP00013', 'Davin Raka Abimanyu', 'E', 275, 0, 300000, 30361, 330361, 1, '12/29/2013 18:55:18', ''),
(14, 'AAP00001', 'AP00014', 'UAP00014', 'Davin Raka Abimanyu', 'Wiwih', 275, 0, 300000, 30345, 330345, 1, '12/29/2013 19:00:00', ''),
(15, 'AAP00001', 'AP00015', 'UAP00015', 'Davin Raka Abimanyu', 'Wiwih', 275, 0, 300000, 30024, 330024, 1, '12/29/2013 19:04:55', ''),
(16, 'AAP00002', 'AP00016', 'UAP00030', 'Taman Baca Ana', 'Gufron', 300, 0, 300000, 67, 300067, 1, '12/31/2013 08:11:21', ''),
(17, 'AAP00003', 'AP00017', 'UAP00001', 'Save Muara Gembong', 'Jaenal Gufron', 220, 0, 200000, 20008, 220008, 1, '12/31/2013 08:17:05', ''),
(18, 'AAP00002', 'AP00018', 'UAP00001', 'Taman Baca Ana', 'Jaenal Gufron', 441, 1, 400000, 40780, 440780, 1, '01/07/2014 00:50:33', ''),
(19, '', 'AP00019', '', '', 'Gufron', 0, 0, 0, 0, 0, 0, '01/07/2014 11:14:47', ''),
(20, 'AAP00002', 'AP00020', '', '', 'Samsul gufron', 0, 0, 2147483647, 0, 0, 0, '01/07/2014 11:17:28', '');

-- --------------------------------------------------------

--
-- Table structure for table `ap_partner`
--

CREATE TABLE IF NOT EXISTS `ap_partner` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `partid` varchar(20) NOT NULL,
  `stat` int(11) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `bidang` varchar(25) NOT NULL,
  `hp` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pic` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ap_product`
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
-- Dumping data for table `ap_product`
--

INSERT INTO `ap_product` (`id`, `productid`, `partnerid`, `namapartner`, `product`, `poin`, `tersedia`, `teredeem`, `tersisa`, `desk`, `pic`, `stat`) VALUES
(1, 'UAP00001', '', 'Tripseru.com', 'Diskon 10 Persen All trip', 100, 100, 0, 100, '<p>Lorem Ipsum</p>', 'bc20831282012ea320ac3d2c98609bc8.png', 1),
(2, 'POAP00002', '', 'Blue Bird', 'Blue Bird', 90, 100, 0, 100, '<p>Blue Birds,</p>', '0f20be23a0f38eb9047bb40940c121fa.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ap_redeem`
--

CREATE TABLE IF NOT EXISTS `ap_redeem` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `stat` int(5) NOT NULL,
  `uidreed` varchar(25) NOT NULL,
  `productid` varchar(25) NOT NULL,
  `time` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `poin` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ap_redeem`
--

INSERT INTO `ap_redeem` (`id`, `stat`, `uidreed`, `productid`, `time`, `alamat`, `poin`) VALUES
(1, 0, 'UAP00001', 'POAP00002', '', 'Jl. CutmutiahBekasi17113', 100),
(2, 0, 'UAP00001', 'POAP00002', '', 'Jl. CutmutiahBekasi17113', 100),
(3, 0, 'UAP00001', 'POAP00002', '01/12/2014 02:25:24', 'Jln. Cut Mutiah Blok D No.5 Rt.8Margahayu - Bekasi Timur17113', 90),
(4, 0, 'UAP00001', 'POAP00002', '01/12/2014 02:26:00', 'Jln. Cut Mutiah Blok D No.5 Rt.8Margahayu - Bekasi Timur17113', 90);

-- --------------------------------------------------------

--
-- Table structure for table `ap_sangkur`
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
-- Dumping data for table `ap_sangkur`
--

INSERT INTO `ap_sangkur` (`id`, `stat`, `nama`, `email`, `komunitas`, `hp`, `pesan`) VALUES
(1, 0, 'Adi Guna', 'guna@ayopeduli.com', 'Ayopeduli', '82738749234', '0'),
(2, 0, 'Ajun', 'ajun@sangkur.com', 'sangkur', '08349183749134', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ap_user`
--

CREATE TABLE IF NOT EXISTS `ap_user` (
  `email` varchar(50) NOT NULL,
  `bio` varchar(200) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `panggilan` varchar(25) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `poin` int(25) NOT NULL,
  `group` int(25) NOT NULL,
  `ip` int(15) NOT NULL,
  `activation_code` varchar(25) NOT NULL,
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `ap_user`
--

INSERT INTO `ap_user` (`email`, `bio`, `hp`, `password`, `panggilan`, `fullname`, `poin`, `group`, `ip`, `activation_code`, `id`, `uid`, `photo`) VALUES
('gufron@ayopeduli.com', '0', '', 'ce44bf05bd6c27834303d268d79f2315', 'Jaenal', 'Jaenal Gufron', 332, 1, 0, '', 1, 'UAP00001', '6a003df1f9284bdd4d11a222d10abbbd.jpg'),
('tifani@ayopeduli.com', '0', '', 'ce44bf05bd6c27834303d268d79f2315', 'Tifani', 'Tifani Dwi Utami', 25, 0, 0, '', 4, 'UAP00002', '858a602d165a0467a006b9019705f0e9.jpg'),
('wiwih.hasim@ayopeduli.com', '0', '', 'ce44bf05bd6c27834303d268d79f2315', 'Wiwih', 'Wiwih Hasim', 695, 0, 0, '', 5, 'UAP00003', '7092528ef622568743b5d84199df34f5.jpg'),
('billyboen@gmail.com', '0', '', 'ce44bf05bd6c27834303d268d79f2315', 'Billy', 'Billy Boen', 25, 0, 0, '', 13, 'UAP00004', '2f4ae9af7d954219956a42442b6dc4f9.jpg'),
('nutrifood@info.com', '0', '', 'ce44bf05bd6c27834303d268d79f2315', 'Nutri', 'Nutrifood', 25, 0, 0, '', 16, 'UAP00005', '97633605322e97933ea85994aedbeed3.jpg'),
('nutrifood@nutrisari.com', '0', '', 'ce44bf05bd6c27834303d268d79f2315', 'Nutrifood', 'Nutrifood', 25, 0, 0, '', 19, 'UAP00006', '5246ee869a2b1ac7652e4ee27f65e4f6.jpg'),
('guna@ayopeduli.com', '0', '', 'ce44bf05bd6c27834303d268d79f2315', 'Guna', 'Wiguna', 25, 0, 0, '', 20, 'UAP00007', '64d425367e865390b54dd194848d7b51.jpg'),
('jaynael@gmail.com', '0', '', 'ce44bf05bd6c27834303d268d79f2315', 'Syamsul', 'Gufron Sajalah yah', 45, 0, 0, '', 21, 'UAP00008', '0'),
('gufron@gmail.com', '0', '', 'ce44bf05bd6c27834303d268d79f2315', 'Uponk', 'Uponk Saja', 25, 0, 0, '', 22, 'UAP00009', '6ab4df0486a078269b462078fe149f17.jpg'),
('gufronnih@ayopeduli.com', '0', '', 'ce44bf05bd6c27834303d268d79f2315', 'gufron', 'gufron saja', 25, 0, 0, '', 23, 'UAP00010', 'bbba0dd3df38ec57fe402c536ac69ee2.jpg'),
('yus@ayopeduli.com', '0', '', 'ce44bf05bd6c27834303d268d79f2315', 'yus', 'yusdiyanti', 1107, 0, 0, '', 24, 'UAP00011', '15972641e67225d30be80ec4668f51e9.jpg'),
('', '0', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 1, 0, 0, '', 25, 'UAP00012', ''),
('wiwih21.hasim@ayopeduli.com', '0', '', 'ce44bf05bd6c27834303d268d79f2315', 'Sf', 'E', 525, 0, 0, '', 28, 'UAP00013', '0'),
('wiwih22.hasim@ayopeduli.com', '0', '', 'ce44bf05bd6c27834303d268d79f2315', 'Wiwih', 'Wiwih', 275, 0, 0, '', 29, 'UAP00014', '0'),
('wiwih212.hasim@ayopeduli.com', '0', '', 'ce44bf05bd6c27834303d268d79f2315', 'Wiwih', 'Wiwih', 275, 0, 0, '', 30, 'UAP00015', '0'),
('info@ayopeduli.com', '', '', 'ce44bf05bd6c27834303d268d79f2315', 'Admin', 'Admin Ayopeduli', 25, 0, 0, '', 31, 'UAP00016', 'a52475822c538a6e147021f301b38d12.jpg'),
('admin@youngontop.com', '', '', 'ce44bf05bd6c27834303d268d79f2315', 'YOT', 'Young On Top', 25, 0, 0, '', 32, 'UAP00017', '0a885951b75affae1b4f8868283c0c09.png'),
('yus21@ayopeduli.com', '', '', 'ce44bf05bd6c27834303d268d79f2315', 'yus', 'yusdiyanti', 25, 0, 0, '', 34, 'UAP00018', '2aa1deda59609a8c9abc687df13ccd34.jpg'),
('yus213@ayopeduli.com', '', '', 'ce44bf05bd6c27834303d268d79f2315', 'yus', 'yusdiyanti', 25, 0, 0, '', 35, 'UAP00019', '64e201d6606039d9afb756ac30fd3e59.jpg'),
('yus2134@ayopeduli.com', '', '', 'ce44bf05bd6c27834303d268d79f2315', 'yus', 'yusdiyanti', 25, 0, 0, '', 38, 'UAP00020', '963f35d83b5fd16f8c8538d24aa57a69.jpg'),
('yus121212@ayopeduli.com', '', '', 'ce44bf05bd6c27834303d268d79f2315', 'yus', 'yusdiyanti', 25, 0, 0, '', 39, 'UAP00021', 'df6406888d815922af4b3e71e16b1c67.jpg'),
('yus1111@ayopeduli.com', '', '', 'ce44bf05bd6c27834303d268d79f2315', 'yus', 'yusdiyanti', 25, 0, 0, '', 40, 'UAP00022', '104f47e607444f378ff67702a5c04f61.jpg'),
('yus1222@ayopeduli.com', '', '', 'ce44bf05bd6c27834303d268d79f2315', 'yus', 'yusdiyanti', 25, 0, 0, '', 41, 'UAP00023', 'f2a106dcee40d33739bba99d81a79cdf.jpg'),
('yus1122@ayopeduli.com', '', '', 'ce44bf05bd6c27834303d268d79f2315', 'yus', 'yusdiyanti', 25, 0, 0, '', 43, 'UAP00024', '927d8c36578276ab38770e42c1b1ff3f.jpg'),
('yus1121@ayopeduli.com', '', '', 'ce44bf05bd6c27834303d268d79f2315', 'yus', 'yusdiyanti', 25, 0, 0, '', 46, 'UAP00025', 'd349df45b182fc66f5f81ccae7b6c765.jpg'),
('yus1123@ayopeduli.com', '', '', 'ce44bf05bd6c27834303d268d79f2315', 'yus', 'yusdiyanti', 25, 0, 0, '', 50, 'UAP00026', '4a0a1b59169b7b3e1672f703a7bfe3e5.jpg'),
('yus1124@ayopeduli.com', '', '', 'ce44bf05bd6c27834303d268d79f2315', 'yus nih', 'Yu Yus', 25, 0, 0, '', 51, 'UAP00027', 'd3951ba2f4bd236fa9df428f08a407cf.png'),
('09349859248592', '', 'syamsul@ayopeduli.com', 'ce44bf05bd6c27834303d268d79f2315', 'Syamsul', 'Syamsul', 25, 0, 0, '', 52, 'UAP00028', '07a19a53e58972310e61ce4e119615fc.jpg'),
('0345024095024', '', 'jaynael@gmail.com', 'ce44bf05bd6c27834303d268d79f2315', 'Syamsul', 'Syamsul', 25, 0, 0, '', 53, 'UAP00029', '7e83a2794c8890acd1eada1048164e7b.jpg'),
('gufronsaja@ayopeduli.com', '', '0349583294859284', 'ce44bf05bd6c27834303d268d79f2315', 'gufron', 'Gufron', 275, 0, 0, '', 54, 'UAP00030', '16293695e10ff6c94809379f934ff950.jpg'),
('apasaja@gmail.com', '', '982948298492', 'ce44bf05bd6c27834303d268d79f2315', 'gufron', 'gufronsaja', 25, 0, 0, '', 55, 'UAP00031', '1edcce2f160bbf4751a40e868568ef0f.jpg'),
('ajun@sangkur.com', '', '08349183749134', 'f7fa49f7fd33f479a97e1069470c9ce1', 'Ajun', 'Ajun', 35, 0, 0, '', 56, 'UAP00032', '6df34d1ddd762b93372d5ab1bc75da77.png'),
('amir@ayopeduli.com', '', '', 'ce44bf05bd6c27834303d268d79f2315', 'amir', 'amir rah', 5, 0, 0, '', 57, 'UAP00033', ''),
('amir21@ayopeduli.com', '', '', 'ce44bf05bd6c27834303d268d79f2315', 'amir', 'amir rah', 5, 0, 0, '', 58, 'UAP00034', ''),
('amir212@ayopeduli.com', '', '', 'ce44bf05bd6c27834303d268d79f2315', 'amir', 'amir rah', 15, 0, 0, '', 59, 'UAP00035', '');

-- --------------------------------------------------------

--
-- Table structure for table `ap_volunteer`
--

CREATE TABLE IF NOT EXISTS `ap_volunteer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `void` varchar(50) NOT NULL,
  `uidv` varchar(50) NOT NULL,
  `aid` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `ap_volunteer`
--

INSERT INTO `ap_volunteer` (`id`, `void`, `uidv`, `aid`, `date`) VALUES
(1, 'VAP00001', '', '', '12/29/2013 00:46:47'),
(2, 'VAP00002', '', '', '12/29/2013 00:46:51'),
(3, 'VAP00003', '', '', '12/29/2013 00:47:29'),
(4, 'VAP00004', '', '', '12/29/2013 00:50:24'),
(5, 'VAP00005', 'UAP00003', 'AAP00002', '12/29/2013 01:01:22'),
(6, 'VAP00006', 'UAP00001', 'AAP00002', '12/29/2013 01:54:37'),
(7, 'VAP00007', 'UAP00011', 'AAP00002', '12/29/2013 02:29:07'),
(8, 'VAP00008', 'UAP00011', 'AAP00003', '12/29/2013 02:46:07'),
(9, 'VAP00009', 'UAP00001', 'AAP00001', '12/29/2013 03:11:03'),
(10, 'VAP00010', 'UAP00001', 'AAP00003', '12/29/2013 03:12:01'),
(11, 'VAP00011', 'UAP00027', 'AAP00001', '12/31/2013 04:23:02'),
(12, 'VAP00012', 'UAP00027', 'AAP00003', '12/31/2013 05:28:10'),
(13, 'VAP00013', 'UAP00002', 'AAP00004', '12/31/2013 11:29:26'),
(14, 'VAP00014', 'UAP00003', 'AAP00004', '01/01/2014 01:30:19'),
(15, 'VAP00015', 'UAP00004', 'AAP00004', '01/01/2014 10:44:35'),
(16, 'VAP00016', 'UAP00005', 'AAP00004', '01/01/2014 10:49:41'),
(17, 'VAP00017', 'UAP00006', 'AAP00004', '01/01/2014 10:52:48'),
(18, 'VAP00018', 'UAP00001', 'AAP00004', '01/01/2014 11:02:43'),
(19, 'VAP00019', 'UAP00008', 'AAP00003', '01/03/2014 07:26:41'),
(20, 'VAP00020', 'UAP00008', 'AAP00002', '01/03/2014 07:32:15'),
(21, 'VAP00021', 'UAP00001', 'AAP00003', '01/11/2014 09:00:18'),
(22, 'VAP00022', 'UAP00001', 'AAP00003', '01/11/2014 09:07:50'),
(23, 'VAP00023', 'UAP00003', 'AAP00003', '01/11/2014 09:28:38'),
(24, 'VAP00024', 'UAP00004', 'AAP00003', '01/11/2014 09:31:34'),
(25, 'VAP00025', 'UAP00006', 'AAP00003', '01/11/2014 09:32:55'),
(26, 'VAP00026', 'UAP00007', 'AAP00003', '01/11/2014 09:42:31'),
(27, 'VAP00027', 'UAP00032', 'AAP00003', '01/11/2014 09:59:22'),
(28, 'VAP00028', 'UAP00035', 'AAP00002', '01/25/2014 02:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
