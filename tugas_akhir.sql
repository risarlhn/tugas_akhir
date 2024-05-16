-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Bulan Mei 2024 pada 05.38
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_po` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` date NOT NULL,
  `no_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kapal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilayah_pengisian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double NOT NULL,
  `harga_dasar` double NOT NULL,
  `ppn` double NOT NULL,
  `jumlah_harga_dasar` double NOT NULL,
  `jumlah_ppn` double NOT NULL,
  `total` double NOT NULL,
  `terbilang` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `invoices`
--

INSERT INTO `invoices` (`id`, `nama_perusahaan`, `alamat`, `no_telp`, `no_po`, `tanggal`, `no_invoice`, `term`, `produk`, `nama_kapal`, `wilayah_pengisian`, `qty`, `satuan`, `harga`, `harga_dasar`, `ppn`, `jumlah_harga_dasar`, `jumlah_ppn`, `total`, `terbilang`, `created_at`, `updated_at`) VALUES
(4, 'Abinaya', 'Jl.Marsma R iswahyudi RT 09', '08989811425', 'PO-KSA-BBM-2024-02-0217', '2024-05-08', '001/PT-AKPS/05/24', 'cash', 'BBM SOLAR', 'KSA 136', 'Balikpapan', 10000, 'Liter', 157000000, 15700, 1727, 157000000, 17270000, 174270000, 'One Hundred Seventy Four Million Two Hundred Seventy  Thousand Rupiah', '2024-05-08 01:44:02', '2024-05-12 04:07:01'),
(5, 'Risa Rilhana', 'Jln swadaya', '08989811425', 'PO-KSA-BBM-2024-02-0217', '2024-05-11', '002/PT-AKPS/05/24', '2 minggu', 'oli', 'kapal titanic', 'bontang', 17000, 'liter', 323000000, 19000, 2090, 323000000, 35530000, 358530000, 'Three Hundred Fifty Eight Million Five Hundred Thirty  Thousand Rupiah', '2024-05-10 20:45:15', '2024-05-12 04:07:08'),
(6, 'PT TRAKINDO', 'KILOMETER 13', '08989811425', '002/PO-AKPS/05/24', '2024-05-12', '003/PT-AKPS/05/24', '3 minggu', 'Bensin', 'Kapal Cargo', 'Pelabuhan Kariangau', 13000, 'Liter', 221000000, 17000, 1870, 221000000, 24310000, 245310000, 'Two Hundred Forty Five Million Three Hundred  Thousand Rupiah', '2024-05-12 03:00:56', '2024-05-12 04:07:24'),
(7, 'PT. PELAYARAN MENARATAMA PASIFIK INDAH', 'Complex Artha Gading Niaga Block G 9-10', '021 4585 0841', '0104/MPI-PO/WG-II/2024', '2024-05-12', '004/PT-AKPS/05/24', '12 Hari', 'BIO SOLAR', 'AWB. WINTER GREEN', 'Balikpapan', 10000, 'liter', 141780000, 14178, 1559, 141780000, 15595800, 157375800, 'One Hundred Fifty Seven Million Three Hundred Seventy Five Thousand Eight Hundred Rupiah', '2024-05-12 03:11:05', '2024-05-12 03:55:16'),
(9, 'PT elnusa', 'jln mulawarman', '081250935105', 'PO-KSA-BBM-2024-02-0217', '2024-05-12', '005/PT-AKPS/05/24', '1 hari', 'Bio Solar', 'KSA 136', 'Pelabuhan Kariangau', 10000, 'Liter', 110000000, 11000, 1210, 110000000, 12100000, 122100000, 'One Hundred Twenty Two Million One Hundred  Thousand Rupiah', '2024-05-12 04:00:30', '2024-05-12 04:00:41'),
(10, 'PT Abadi', 'Jl.Marsma R iswahyudi RT 09', '08980811425', NULL, '2024-05-13', '006/PT-AKPS/05/24', 'cash', 'Oli Premium', 'Cargo', 'Bali', 18900, 'liter', 321300000, 17000, 1870, 321300000, 35343000, 356643000, 'Three Hundred Fifty Six Million Six Hundred Forty Three Thousand Rupiah', '2024-05-12 18:10:02', '2024-05-12 18:10:11'),
(11, 'PT. PELAYAN KORINDO', 'jln swadaya 23', '08989898114', '-', '2024-05-13', '007/PT-AKPS/05/24', '7  hari', 'Oli', 'MT. MUTIARA GLOBAL', 'Berau', 70000, 'Liter', 1500030000, 21429, 2357, 1500030000, 165003300, 1665033300, 'One Billion Six Hundred Sixty Five Million Thirty Three Thousand Three Hundred Rupiah', '2024-05-13 04:15:09', '2024-05-13 04:15:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_02_19_113548_create_purchase_orders_table', 2),
(7, '2024_03_03_060614_create_invoices_table', 3),
(8, '2024_03_03_114312_create_surat_jalans_table', 4),
(9, '2024_03_27_032545_create_notifications_table', 5),
(16, '2024_04_04_032452_create_pengeluaran_bbms_table', 6),
(17, '2024_04_04_032556_create_pengeluaran_operasional_table', 7),
(18, '2024_04_04_032936_change_pengeluaran_operasinoal_to_pengeluaran_operasionals_table', 8),
(19, '2024_04_04_033322_drop_tabel_pengeluaran_bbms', 9),
(20, '2024_04_04_033338_drop_tabel_pengeluaran_operasionals', 9),
(21, '2024_05_10_034309_create_pengeluarans_table', 10),
(22, '2024_05_15_111101_add_comments_to_purchase_orders_table', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$12$gU4wyyITh5p4xbAt16jlQ.vQWC12Hiks866y1SkFmg5vMoyg/T9aS', '2024-04-22 20:45:39'),
('admin@white.com', '$2y$12$qZDUp6VHuVvrwNKvlNoiM.cYpbFL0lheJXGn8PqqQuOoj4JgOrj/.', '2024-02-20 07:19:55'),
('andika@gmail.com', '$2y$12$CPBPh9VZhLXBTIEpWm70X.cUMx7Y1XhaGmYWMvVEbFk1ll6dUjDMy', '2024-05-13 22:30:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_bbm`
--

CREATE TABLE `pengeluaran_bbm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_dasar` double NOT NULL,
  `ppn` double NOT NULL,
  `total` double NOT NULL,
  `no_pengeluaran` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengeluaran_bbm`
--

INSERT INTO `pengeluaran_bbm` (`id`, `nama_perusahaan`, `tanggal`, `qty`, `harga_dasar`, `ppn`, `total`, `no_pengeluaran`, `created_at`, `updated_at`) VALUES
(16, 'PT. Trakindo', '2024-05-13', 15000, 202500000, 22275000, 224775000, 123456, '2024-05-13 04:01:54', '2024-05-13 04:04:37'),
(17, 'PT. MANDIRI KITA SUKSES', '2024-05-13', 49000, 627200000, 68992000, 696192000, 2906, '2024-05-13 04:08:20', '2024-05-13 04:09:30'),
(20, 'PT. Buma', '2024-05-16', 13700, 110000000, 12.1, 122.1, 567, '2024-05-15 08:42:46', '2024-05-15 08:42:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_biaya_operasional`
--

CREATE TABLE `pengeluaran_biaya_operasional` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kategori_pengeluaran` text DEFAULT NULL,
  `jenis_pengeluaran` varchar(200) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga_biaya` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengeluaran_biaya_operasional`
--

INSERT INTO `pengeluaran_biaya_operasional` (`id`, `tanggal`, `kategori_pengeluaran`, `jenis_pengeluaran`, `deskripsi`, `harga_biaya`, `total`, `created_at`, `updated_at`) VALUES
(8, '2024-05-07', 'Biaya Umum', 'Penyusutan', 'wifi', 300000, 300000, '2024-05-07 07:22:44', '2024-05-07 07:22:44'),
(9, '2024-05-08', 'Pokok Penjualan', 'Biaya Transportasi', 'Tiket Ke Surabaya', 1000000, 1000000, '2024-05-07 19:15:42', '2024-05-08 04:39:15'),
(10, '2024-05-13', 'Biaya Umum', 'Biaya Transportasi', 'Tiket Ke jakarta', 1500000, 1500000, '2024-05-13 04:06:51', '2024-05-13 04:06:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Proses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `nama_perusahaan`, `user_id`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PT. Alisha Karunia Perdana', 1, '1708405624.pdf', 'Selesai', '2024-02-19 22:07:04', '2024-05-14 23:29:28'),
(3, 'Abinaya', 3, '1714541503.pdf', 'Batal', '2024-04-30 21:31:43', '2024-05-14 23:38:03'),
(5, 'Pt Elnusa', 12, '1715483795.pdf', 'Selesai', '2024-05-11 19:16:35', '2024-05-14 23:29:16'),
(6, 'Abinaya', 3, '1715735423.pdf', 'Batal', '2024-05-14 17:10:23', '2024-05-15 01:24:48'),
(7, 'Abinaya', 3, '1715735460.pdf', 'Batal', '2024-05-14 17:11:00', '2024-05-15 06:42:52'),
(8, 'Risa Rilhana', 16, '1715739297.pdf', 'Selesai', '2024-05-14 18:14:57', '2024-05-14 18:30:24'),
(9, 'Risa Rilhana', 16, '1715739388.pdf', 'Proses', '2024-05-14 18:16:28', '2024-05-14 18:16:28'),
(10, 'Risa', 3, '1715773561.pdf', 'Proses', '2024-05-15 03:46:01', '2024-05-15 03:46:01'),
(11, 'Risa', 3, '1715773610.pdf', 'Proses', '2024-05-15 03:46:50', '2024-05-15 03:46:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_jalans`
--

CREATE TABLE `surat_jalans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kepada` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `up` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `no_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_po` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_transportir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segel_atas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segel_bawah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat_jalans`
--

INSERT INTO `surat_jalans` (`id`, `kepada`, `up`, `tanggal`, `no_surat`, `no_po`, `tujuan`, `contact`, `no_telp`, `qty`, `jenis`, `nama_transportir`, `segel_atas`, `segel_bawah`, `plat`, `pengirim`, `created_at`, `updated_at`) VALUES
(3, 'PT. SORAYA', '-', '2024-05-08', '001/SJ-AKPS/05/24', '001/PO-AKPS/05/24', 'gate va', 'zul', '08989811425', 10000, 'Bio Solar', 'alisha', '12345', '12345', 'B 9051 WFU', 'abaw', '2024-05-07 19:00:35', '2024-05-08 01:47:48'),
(4, 'risa', '-', '2024-05-15', '002/SJ-AKPS/05/24', 'PO-KSA-BBM-2024-02-0217', 'gate va', 'zul', '08989811425', 10000, 'Bio Solar', 'alisha', '12345', '12345', 'B 9051 WFU', 'abaw', '2024-05-14 16:52:02', '2024-05-14 16:52:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'CUSTOMER',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Risa Rilhana', 'rilhanarisa29@gmail.com', '2024-02-08 06:29:35', '$2y$12$6wF6PWfeI.yZW7qvF5y5AO98vMIG63lyXZ9Mx/wVz.1Y4Ia3rYij2', 'SpsEMJvbBwofxB38fhxngpeirRsP2jKym4O7ksJGBsNX0MCAdUH596CMc7z7', 'ADMIN', '2024-02-08 06:29:36', '2024-05-14 17:45:49'),
(3, 'Customer', 'customer@gmail.com', NULL, '$2y$10$mDenlne5MMn7h0AfBJS.OexhzgdWjHzRBR2rvEWpKWLL/WxvFmdl.', NULL, 'CUSTOMER', '2024-03-03 13:02:15', NULL),
(4, 'Ratna Puspitarini', 'direktur@gmail.com', NULL, '$2y$10$VkpIJUyFyKXOSKaAd68AUunvb8FDMdEaWfFN0QCsQhH44dAL0TCLe', NULL, 'DIREKTUR', '2024-03-03 13:02:18', '2024-04-25 20:28:31'),
(5, 'Risa', '10201076@gmail.com', NULL, '$2y$12$ZCOh0k4Ho0QhZavvU81XE.ylLKAFDsQoUQwrjkVjy5xpxPU8ihbrW', NULL, 'CUSTOMER', '2024-03-03 06:00:13', '2024-04-25 00:32:58'),
(6, 'user', 'user@gmail.com', NULL, '$2y$12$PaA3HralxttuZeMGY.DU6.4QVOv1OIvntAhNgAJIklwlEMTvHRsXu', NULL, 'CUSTOMER', '2024-03-27 07:05:27', '2024-03-27 07:05:27'),
(7, 'Julia Astrid', 'juliaastrid@gmail.com', NULL, '$2y$12$OQSNg7rLD2QbRhAlfw4X5O9tgE2sqBL3WDxadm6avRQIyiZMJfAsm', NULL, 'KEUANGAN', '2024-04-03 09:15:13', '2024-04-03 09:27:23'),
(8, 'Julia Astrid', 'keuangan@gmail.com', NULL, '$2y$12$5atqi1Z0Tmyu2CU4p39EQ.Y3Djt/0TsuFg9iDuQ7iiuZgh0vcRoNy', 'Q1R3akk3XNfacJbwMl0XiE9ukEWNZtBtjKUZkZ2Otf50ONc426AzKFh2Pagf', 'KEUANGAN', '2024-04-03 09:30:46', '2024-05-15 08:38:21'),
(11, 'risa rilhana', 'admin@gmail.com', NULL, '$2y$12$y3ziivGFyUhRZElH0mr30eiOrOLibo/IfHrzq1KxVdZkW8U8zFSe.', NULL, 'CUSTOMER', '2024-05-11 03:59:07', '2024-05-11 03:59:07'),
(12, 'ariqin', 'ariqin@gmail.com', NULL, '$2y$12$1NFYcYM.JotwAneZGLayD.8HSIpsHquSX5nvMW1xqvDA5FiLGTzvO', NULL, 'CUSTOMER', '2024-05-11 19:14:00', '2024-05-11 19:14:00'),
(15, 'andika', 'andika@gmail.com', NULL, '$2y$12$6oOJ.d7naQVKOMYESL6jJu/cI6pH8lg.Vj56KvyothYG8lTOWM8ry', NULL, 'CUSTOMER', '2024-05-13 22:29:45', '2024-05-13 22:29:45'),
(16, 'PT. ELNUSA', 'riva.juliana@gmail.com', NULL, '$2y$12$TDO.8RD/UsIE0PCgV7uWLeCWSIfQqwiwDUlHJaJYEoeK5pds9lCAC', NULL, 'CUSTOMER', '2024-05-14 18:09:38', '2024-05-14 18:11:23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengeluaran_bbm`
--
ALTER TABLE `pengeluaran_bbm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengeluaran_biaya_operasional`
--
ALTER TABLE `pengeluaran_biaya_operasional`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_jalans`
--
ALTER TABLE `surat_jalans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_bbm`
--
ALTER TABLE `pengeluaran_bbm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_biaya_operasional`
--
ALTER TABLE `pengeluaran_biaya_operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `surat_jalans`
--
ALTER TABLE `surat_jalans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
