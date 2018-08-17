-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2017 at 03:31 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aifrieck`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_produk`, `jumlah`, `total`) VALUES
(1, 16, 1, 3400),
(2, 2, 1, 27300);

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(10) NOT NULL,
  `nama_diskon` varchar(100) NOT NULL,
  `potongan_harga` int(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_berakhir` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `nama_diskon`, `potongan_harga`, `tanggal_mulai`, `tanggal_berakhir`) VALUES
(1, 'Diskon Bulan Ramadhan', 50000, '2017-05-27', '2017-06-26'),
(2, 'Ulang Tahun Aifrieck ke-10 ', 100000, '2017-03-23', '2017-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Menu Hamburger'),
(2, 'Menu Paket Hemat'),
(3, 'Menu Anak-anak'),
(4, 'Menu Minuman'),
(5, 'Menu Makanan Ringan'),
(6, 'Menu Pencuci Mulut'),
(7, 'Menu Sarapan');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(10) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `harga` int(50) NOT NULL,
  `stok` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `foto`, `deskripsi`, `harga`, `stok`) VALUES
(2, 'Paket Chicken Nugget dan Beef', 'paket_chicken_and_beef.jpg', 'Menu Paket dengan lauk chicken nugget serta beef yang membuat selera makan anda terpenuhi dengan baik', 32800, 25),
(1, 'Paket Udang dan Sup', 'paket_shrimp.jpg', 'Menu Paket Udang dengan krispi yang bikin nagih serta sup dengan bumbu rempah yang tiada duanya', 27300, 26),
(3, 'Paket Chicken Egg Roll', 'paket_chicken_egg_roll.png', 'Menu Paket dengan lauk chicken egg roll asli buatan restoran kami yang rasanya khas dengan daging yang lembut', 31700, 21),
(4, 'Paket Nasi Chicken Egg Roll', 'paket_chicken_egg_roll_with_rice.png', 'Menu Paket dengan lauk chicken egg roll dan nasi yang memenuhi selera nafsu makan anda dengan citarasa menu khas jejepangan', 30120, 45);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `foto`, `deskripsi`, `harga`, `stok`) VALUES
(3, 4, 'Coffee', 'coffee.png', 'Kopi panas siap santap cocok untuk para pria yang suka kopi', 7400, 34),
(2, 1, 'Burger', 'burger.jpg', 'Hamburger normal dengan daging serta roti yang cukup dengan porsi yang pas dan rasa yang tiada duanya', 27300, 32),
(1, 1, 'Big Cheese Burger', 'big_cheese_burger.png', 'Hamburger dengan Keju yang melimpah disetiap gigitannya dan dilengkapi dengan daging yang lembut', 34200, 13),
(8, 6, 'Strawberry Short Cake', 'strawberry_short_cake.png', 'Roti khas restoran bintang lima yang dibalut dengan selai dan buah strawberry dengan perpaduan rasa asam manis yang pas di mulut', 28000, 38),
(9, 3, 'Menu Anak-anak Jagung dan Nugget', 'anak_jagung_nugget.png', 'Paket Menu dengan Jagung dan Nugget yang disukai oleh Anak-anak cocok dengan nutrisi yang seimbang', 24600, 27),
(10, 3, 'Menu Anak-anak Burger', 'anak_burger.png', 'Menu Paket dengan Hamburger cocok untuk Anak anda yang menyukai burger dengan sayuran segar cocok untuk nutrisi Anak Anda', 26000, 24),
(11, 3, 'Menu Anak-anak Nugget dan Kentang 1', 'anak_nugget_kentang.png', 'Menu Paket dengan Nugget dan Kentang yang disukai oleh Anak-anak dijamin puas', 25300, 32),
(12, 3, 'Menu Anak-anak Nugget dan Kentang 2 ', 'anak_nugget_kentang_2.png', 'Menu Paket dengan Nugget dan Kentang dengan harga yang lebih terjangkau dengan kepuasan dan nutrisi Anak yang dijamin baik', 22300, 23),
(13, 3, 'Menu Anak-anak Pancake', 'anak_pancake.jpeg', 'Menu Paket dengan Pancake yang digemari Anak-anak dengan hiasan yang menarik serta nutrisi yang seimbang', 27200, 18),
(14, 6, 'Banana Ice Cream', 'banana_ice_cream.png', 'Es krim yang dibalut dengan pisang manis asli menjadikan rasa manis yang tiada duanya', 37800, 22),
(15, 6, 'Chocolate Jelly', 'chocolate_jelly.png', 'Jeli Coklat manis yang lembut berpadu dengan coklat asli membuat anda ketagihan', 28300, 25),
(4, 1, 'Deluxe Burger Double Size', 'deluxe_burger_double_size.png', 'Hamburger dengan Ukuran yang lebih besar dua kali lipat dengan daging dan keju yang melimpah', 37400, 23),
(5, 1, 'Double Deluxe Cheese Burger', 'double_deluxe_cheese_burger.jpg', 'Hamburger dengan Ukuran yang lebih besar serta keju yang lebih banyak membuat anda tergila-gila dengan kejunya', 40200, 23),
(6, 6, 'Ice Cream Sundae Besar', 'ice_cream_sundae_large.png', 'Ice Cream Sundae dengan chocolate dan buah cherry', 5700, 34),
(7, 6, 'Ice Cream Sundae Kecil', 'ice_cream_sundae_small.png', 'Ice Cream Sundae ukuran kecil dengan coklat dan buah cherry cocok untuk anak-anak', 4800, 32),
(16, 4, 'Es Teh', 'ice_tea.jpg', 'Es Teh berukuran normal mampu melepas dahaga anda', 3400, 45),
(17, 4, 'Juice', 'juice.png', 'Aneka Juice yang berasal dari buah segar langsung dari perkebunan pilihan', 6400, 33),
(18, 4, 'Lemon Tea', 'lemon_tea.png', 'Teh rasa lemon dengan es yang nikmat di tenggorokan', 5500, 33),
(19, 4, 'Marimas Jeruk', 'marimas_orange.png', 'Marimas Jeruk murah meriah dengan rasa bintang lima', 2300, 34),
(20, 4, 'Milk Shake', 'milk_shake.png', 'Milk Shake dengan aneka rasa yang nikmat di tenggorokan', 6500, 34),
(21, 2, 'Paket Kombo Ayam', 'paket_combo_ayam.png', 'Paket dengan Burger dan Ayam pas untuk Anda yang sedang lapar', 34200, 34),
(22, 2, 'Paket Kombo Burger', 'paket_combo_burger.png', 'Menu Paket dengan burger serta kentang cocok untuk makanan dengan harga yang terjangkau', 26300, 34),
(23, 2, 'Paket Panas', 'paket_panas.png', 'Paket Panas dengan telur dan ayam serta minuman yang komplit menjadi santapan bagi anda', 24300, 32),
(24, 2, 'Paket Super Besar', 'paket_super_besar.png', 'Paket dengan ayam yang ukurannya besar menjadi pilihan yang cocok untuk anda', 27600, 43),
(25, 2, 'Paket Super Family', 'paket_super_family.png', 'Paket dengan nasi dan ayam yang banyak cocok untuk keluarga anda', 75300, 35),
(26, 2, 'Paket Superstar', 'paket_superstar.png', 'Paket dengan nasi dan ayam untuk porsi dua orang dilengkapi dengan cd musik', 34200, 35),
(27, 6, 'Peanut Butter Protein Bar', 'peanut_butter_protein_bar.png', 'Hidangan pencuci mulut yang cocok untuk anda yang sedang diet', 21000, 35),
(28, 1, 'Small Burger', 'small_burger.png', 'Hamburger berukuran kecil yang cocok untuk anda yang tidak suka porsi besar', 26900, 27),
(29, 4, 'Soft Drink', 'soft_drink.png', 'Minuman bersoda yang beraneka ragam rasa dan pilihan', 5400, 26),
(30, 6, 'Strawberry Cheese Cake', 'strawberry_cheese_cake.jpg', 'Kue keju yang dilapisi dengan strawberry membuat anda ketagihan ingin mencobanya lagi', 18000, 27),
(31, 6, 'Strawberry Jelly', 'strawberry_jelly.png', 'Jelly dengan strawberry yang lembut di mulut', 17200, 27),
(32, 6, 'Strawberry Pancake', 'strawberry_pancake.png', 'Pancake strawberry yang cocok untuk anda dengan cita rasa tinggi', 20100, 22),
(33, 5, 'Chips', 'chips.png', 'Chips dengan rasa yang beraneka ragam dicampur dalam satu mangkuk berukuran besar', 18200, 27),
(34, 5, 'Chips BBQ', 'chips_bbq.jpg', 'Chips rasa barbeque yang cocok untuk anda penggemar barbeque', 17200, 27),
(35, 7, 'Coffee dan Roti', 'coffee_and_bread.png', 'Kopi dan Roti cocok untuk sarapan di pagi hari', 29000, 23),
(36, 7, 'Egg dan Daging', 'egg_and_bacon.png', 'Telur dan Daging yang cocok dibuat sarapan', 28100, 29),
(37, 7, 'Egg dan Sosis', 'egg_and_sosis.png', 'Telur dan Sosis hadir sebagai varian lain dari sarapan yang cocok untuk anda', 23100, 28),
(38, 5, 'French Fries', 'french_fries.png', 'Kentang Goreng yang menjadi kesukaan orang-orang cocok untuk camilan', 12800, 37),
(39, 5, 'French Toast', 'french_toast.png', 'Roti Bakar khas prancis yang cocok dijadikan makanan ringan untuk anda', 18200, 28),
(40, 5, 'Peanut Mix', 'peanut_mix.png', 'kacang-kacangan yang beraneka ragam cocok untuk camilan anda', 10900, 28),
(41, 7, 'Sandwich', 'sandwich.png', 'Roti Sandwich yang cocok untuk sarapan anda yang mengenyangkan', 20200, 27),
(42, 7, 'Waffle', 'waffle.png', 'Waffle untuk anda yang ingin sarapan dengna yang manis-manis', 19200, 18);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `id_diskon` int(10) NOT NULL,
  `harga_satuan` int(50) NOT NULL,
  `total_harga` int(50) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_produk`, `id_diskon`, `harga_satuan`, `total_harga`, `tanggal_transaksi`) VALUES
(1, 1, 1, 2, 12000, 10000, '2017-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `fullname`, `email`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin@aifrieck.id', 'admin'),
(4, 'yafie', '37ccb8e58e390b34fd3d8d9dc04ad51d', 'Yafie Imam Achmad', 'imamachmad18@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
