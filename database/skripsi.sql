-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2024 pada 18.21
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_brg` int(11) NOT NULL,
  `kode_brg` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `id_category` int(15) NOT NULL,
  `id_unit` int(15) NOT NULL,
  `harga` int(15) DEFAULT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `gambar` text DEFAULT NULL,
  `create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_brg`, `kode_brg`, `nama`, `id_category`, `id_unit`, `harga`, `stok`, `gambar`, `create`) VALUES
(4, 'BRG00001', 'Patene Biru', 1, 1, 1000, 0, 'patene1.jpeg', '0000-00-00 00:00:00'),
(5, 'BRG00002', 'Luwak White Cofee', 4, 3, 14000, 0, 'luwakkopi.jpeg', '2024-07-05 16:15:02'),
(6, 'BRG00003', 'Kapal Api Special Mix', 4, 3, 15000, 0, 'KA_SpecialMix.jpeg', '2024-07-05 16:15:35'),
(7, 'BRG00004', 'Gula Putih', 4, 1, 16500, 10, 'gula_p.jpeg', '2024-07-05 16:16:34'),
(8, 'BRG00005', 'Soklin Softergent', 6, 3, 5000, 0, 'soklin_soft.jpeg', '2024-07-05 16:18:52'),
(9, 'BRG00006', 'Roma Kepala', 2, 2, 9500, 20, 'romakelapa.jpeg', '2024-07-06 21:16:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id_category` int(11) NOT NULL,
  `nama_cate` varchar(100) NOT NULL,
  `create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_category`
--

INSERT INTO `tbl_category` (`id_category`, `nama_cate`, `create`) VALUES
(1, 'Shampoo', '2024-04-29 18:19:24'),
(2, 'Makanan', '2024-05-10 21:08:52'),
(3, 'Sabun', '2024-06-24 16:46:49'),
(4, 'Minuman', '2024-06-27 06:52:48'),
(5, 'Rokok', '2024-07-05 16:17:01'),
(6, 'Deterjen', '2024-07-05 16:18:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(25) NOT NULL,
  `kode_plg` varchar(30) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `gambar` text NOT NULL,
  `create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `kode_plg`, `nama`, `no_hp`, `jenis_kelamin`, `username`, `password`, `alamat`, `gambar`, `create`) VALUES
(1, 'PLG00001', 'Ahmad Muhsin', '08122538212', 'L', ' muhsin', '1c05922c3cfc74e1f1a920b312c26a0ae3307942', 'Kudus', 'mohsen.jpg', '2024-03-07 12:08:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sale`
--

CREATE TABLE `tbl_sale` (
  `id_sale` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `final_price` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `id_stock` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_stock`
--

INSERT INTO `tbl_stock` (`id_stock`, `id_brg`, `type`, `detail`, `id_supplier`, `qty`, `date`, `created`, `id_user`) VALUES
(3, 7, 'in', 'Kulakan', 1, 10, '2024-07-06', '2024-07-06 20:07:36', 1),
(4, 9, 'in', 'Kelukan', 1, 20, '2024-07-06', '2024-07-06 21:17:01', 1),
(5, 9, 'in', 'Kulakan', 1, 5, '2024-07-06', '2024-07-06 21:17:15', 1),
(6, 9, 'out', 'Rusak', 1, 5, '2024-07-06', '2024-07-06 21:34:17', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(100) NOT NULL,
  `create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_unit`
--

INSERT INTO `tbl_unit` (`id_unit`, `nama_unit`, `create`) VALUES
(1, 'Kilogram', '2024-04-29 18:19:24'),
(2, 'Pcs', '2024-05-10 21:08:52'),
(3, 'Renteng', '2024-06-24 16:46:49'),
(4, 'Dus', '2024-06-24 18:23:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `name`, `username`, `password`, `gambar`, `akses`) VALUES
(1, 'Ahmad ', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'muhsin4.jpg', 1),
(3, 'Dhani', 'kasir', '8691e4fc53b99da544ce86e22acba62d13352eff', 'mohsen.jpg', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `create` datetime NOT NULL DEFAULT current_timestamp(),
  `update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `no_hp`, `alamat`, `keterangan`, `create`, `update`) VALUES
(1, 'Toko A', '081225384', 'Welahan', ' Toko ATK Terbesar', '2024-03-07 10:10:28', '2024-03-07 04:09:11'),
(2, 'Toko C', '089123123123', 'Kudus', 'asd', '2024-03-07 11:36:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_brg`),
  ADD UNIQUE KEY `kode_brg` (`kode_brg`),
  ADD KEY `id_kategori` (`id_category`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indeks untuk tabel `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `tbl_sale`
--
ALTER TABLE `tbl_sale`
  ADD PRIMARY KEY (`id_sale`);

--
-- Indeks untuk tabel `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `id_admin` (`id_user`),
  ADD KEY `id_brg` (`id_brg`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_sale`
--
ALTER TABLE `tbl_sale`
  MODIFY `id_sale` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD CONSTRAINT `tbl_barang_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `tbl_category` (`id_category`),
  ADD CONSTRAINT `tbl_barang_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `tbl_unit` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD CONSTRAINT `tbl_stock_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`),
  ADD CONSTRAINT `tbl_stock_ibfk_2` FOREIGN KEY (`id_brg`) REFERENCES `tbl_barang` (`id_brg`),
  ADD CONSTRAINT `tbl_stock_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
