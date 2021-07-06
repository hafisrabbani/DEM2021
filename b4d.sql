-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2021 pada 10.09
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b4d`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerima` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alamat`
--

INSERT INTO `alamat` (`id`, `user_id`, `nama`, `penerima`, `provinsi`, `kota`, `kode_pos`, `kecamatan`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 3, 'Alamat 1', 'Ahmad Supeno', 'Jawa Timur', 'Gresik', 61171, 'Cerme', 'Perum Cerme Indah', '2021-06-23 08:14:49', '2021-06-23 08:14:49'),
(2, 1, 'Alamatku', 'Roma Irama', 'Jawa Timur', 'Gresik', 61171, 'Benjeng', 'Jatirembe gg 12 dekat pertelon', '2021-07-02 12:59:22', '2021-07-02 12:59:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bid_bid`
--

CREATE TABLE `bid_bid` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bid_bid`
--

INSERT INTO `bid_bid` (`id`, `user_id`, `bid_id`, `harga`, `created_at`, `updated_at`) VALUES
(5, 1, 7, 300, '2021-06-30 09:58:16', '2021-06-30 09:58:16'),
(6, 1, 8, 2000, '2021-06-30 13:53:58', '2021-06-30 13:53:58'),
(7, 3, 7, 3000, '2021-06-30 13:53:58', '2021-06-30 13:53:58'),
(8, 1, 7, 3500, '2021-07-01 12:14:14', '2021-07-01 12:14:14'),
(9, 1, 8, 3000, '2021-07-04 13:29:24', '2021-07-04 13:29:24'),
(10, 1, 8, 4000, '2021-07-04 13:29:32', '2021-07-04 13:29:32'),
(11, 1, 8, 4001, '2021-07-04 13:30:11', '2021-07-04 13:30:11'),
(12, 1, 9, 10000, '2021-07-05 07:03:22', '2021-07-05 07:03:22'),
(13, 1, 9, 10001, '2021-07-05 07:03:38', '2021-07-05 07:03:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bid_main`
--

CREATE TABLE `bid_main` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemenang` int(11) DEFAULT NULL,
  `harga_win` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `last_bid` timestamp NULL DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bid_main`
--

INSERT INTO `bid_main` (`id`, `user_id`, `nama_barang`, `image`, `pemenang`, `harga_win`, `description`, `status`, `last_bid`, `pesan`, `created_at`, `updated_at`) VALUES
(7, '3', 'Kipas Angin Maspion', 'bid/IwdOtEeirTgnbAocx8H6iS7BT0OmPHm4q8IPvVkc.jpg', 1, 3500, 'kipas angin maspion mantap kipas angin maspion mantap kipas angin maspion mantap kipas angin maspion mantap kipas angin maspion mantap kipas angin maspion mantap', 1, '2021-07-01 14:21:00', NULL, '2021-06-29 14:22:11', '2021-07-02 10:10:55'),
(8, '3', 'Macbook Pro 2021 Chipset M1', 'bid/pbFNWSqsnrKbF1nrGFabCqwmknUMAIkmEUfOPe4p.jpg', NULL, NULL, 'MacbookPro Mantap bangetMacbookPro Mantap bangetMacbookPro Mantap bangetMacbookPro Mantap bangetMacbookPro Mantap bangetMacbookPro Mantap bangetMacbookPro Mantap banget', 1, '2021-07-06 04:02:26', NULL, '2021-07-01 09:33:15', '2021-07-06 04:02:26'),
(9, '3', 'ROG Phone', 'bid/7fRGr694H4Eb7Bqd2mndAg8lVJHkNgH3p6rlmyuN.jpg', NULL, NULL, 'lorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum dolor sit ametlorem ipsum dolor sit amet', 1, '2021-07-05 08:01:00', NULL, '2021-07-05 07:01:37', '2021-07-05 07:02:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donate_action`
--

CREATE TABLE `donate_action` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `donate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `donate_main`
--

CREATE TABLE `donate_main` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` int(11) NOT NULL,
  `last_donate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `donate_main`
--

INSERT INTO `donate_main` (`id`, `user_id`, `name`, `description`, `target`, `last_donate`, `image`, `created_at`, `updated_at`) VALUES
(1, 3, '#LAWANCOVID19 Bantu Para Tenaga Kesehatan', 'Bantu para tenaga kesehatan melawan covid Bantu para tenaga kesehatan melawan covid Bantu para tenaga kesehatan melawan covid Bantu para tenaga kesehatan melawan covid Bantu para tenaga kesehatan melawan covid Bantu para tenaga kesehatan melawan covid Bantu para tenaga kesehatan melawan covid Bantu para tenaga kesehatan melawan covid ', 12000000, '2021-07-06 04:46:37', 'https://awsimages.detik.net.id/community/media/visual/2020/09/28/ilustrasi-dokter_169.jpeg?w=700&q=90', '2021-07-05 17:00:00', '2021-07-04 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_bid`
--

CREATE TABLE `invoice_bid` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `bukti` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `invoice_bid`
--

INSERT INTO `invoice_bid` (`id`, `total`, `key`, `user_id`, `bid_id`, `bukti`, `alamat_id`, `status`, `created_at`, `updated_at`) VALUES
(198, 3500, '7+1', 1, 7, 'pay/Cy2eK9yPmMmg8EUHALczjB88ejnwwDYYwwQDfbhE.jpg', 2, 1, '2021-07-02 10:09:46', '2021-07-02 10:09:46');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_16_093158_create_unittes_table', 1),
(5, '2021_06_16_103525_create_videos_table', 2),
(6, '2021_06_16_115603_create_bid_table', 3),
(23, '2021_06_16_115603_create_bidmain_table', 4),
(28, '2021_06_16_123403_create_user_table', 5),
(29, '2021_06_16_130707_create_bidbid_table', 6),
(30, '2021_06_16_132058_create_bid_table', 6),
(33, '2021_06_21_143853_create_invoice_table', 7),
(34, '2021_06_21_151612_create_admin_table', 7),
(37, '2021_06_23_145341_create_alamat_table', 8),
(40, '2021_06_24_153725_create_seller_table', 9),
(43, '2021_07_03_134639_create_shipment_table', 10),
(44, '2021_07_05_200440_create_donate_table', 11),
(45, '2021_07_05_203004_create_donate_action_table', 12);

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
-- Struktur dari tabel `seller`
--

CREATE TABLE `seller` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bid_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `seller`
--

INSERT INTO `seller` (`id`, `user_id`, `resi`, `alamat_id`, `key`, `bid_id`, `status`, `invoice_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'JDA342NSSA', 1, '1+3+1', 1, 1, 3, '2021-06-24 10:23:02', '2021-06-25 13:29:27'),
(2, 3, 'JT12ADKM3144', 2, '2+198+7', 7, 1, 198, '2021-07-02 13:23:29', '2021-07-04 08:10:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shipment`
--

CREATE TABLE `shipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `resi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `unittes`
--

CREATE TABLE `unittes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `toko` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `unittes`
--

INSERT INTO `unittes` (`id`, `produk_name`, `image`, `toko`, `lokasi`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Tas Sekolah', 'https://images.tokopedia.net/img/cache/300-square/VqbcmM/2020/12/21/862f516e-7a14-42c0-bed4-c1540b2b9198.png.webp?ect=4g', 'tasku.id', 'Bandung', 90000, NULL, NULL),
(2, 'Botol Minum Anak', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2020/10/9/a8b6cde2-e0c7-416a-ac5a-cc01cb2093e4.jpg.webp?ect=4g', 'java plastik', 'Malang', 15000, NULL, NULL),
(3, 'Bejo Jahe Merah 12 Sachet', 'https://images.tokopedia.net/img/cache/300-square/VqbcmM/2021/3/19/6b095a38-6daf-4a89-8d4e-4462ef8308e9.jpg.webp?ect=4g', 'herbal nusantara', 'Sidoarjo', 12000, NULL, NULL),
(6, 'Daster Katun', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2021/3/15/7a6900b8-18de-4a17-8bf6-e0e72d68ac01.jpg.webp?ect=4g', 'katun.id', 'Jakarta timur', 34000, NULL, NULL),
(7, 'RC Mobil Remote', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2021/5/22/f863bfe8-0448-40ff-aaa3-76ad315551ef.jpg.webp?ect=4g', 'mainan anak', 'Jakarta Barat', 2300000, NULL, NULL),
(8, 'Keyboard Mechanical', 'https://images.tokopedia.net/img/cache/200-square/product-1/2019/12/20/30331860/30331860_13af5259-74bc-4b77-94ba-4a2b8e1f2a4b_800_800.webp?ect=4g', 'komputer surabaya', 'Surabaya', 450000, NULL, NULL),
(9, 'Coil Drag', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2021/6/6/86233e75-340d-4caf-9718-fac494366c88.jpg.webp?ect=4g', 'V-Vaping', 'Jakarta Pusat', 97000, NULL, NULL),
(10, 'Minyak goreng 2L', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2021/2/17/150df5f3-3766-4442-9dc5-1e8a2988ce27.jpg.webp?ect=4g', 'Sembako.id', 'Mojokerto', 20000, NULL, NULL),
(11, 'Tinta Printer', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2020/9/29/fcade9aa-bfa6-4b04-be8e-248b528c70e3.png.webp?ect=4g', 'komputer.id', 'Bandung', 40000, NULL, NULL),
(12, 'Garnier Mask', 'https://images.tokopedia.net/img/cache/200-square/VqbcmM/2021/1/29/e03634ae-1951-431f-8fef-b52afbb2bf90.jpg.webp?ect=4g', 'Kosmetik.id', 'Bandung', 23000, NULL, NULL),
(13, 'Intech Bohlam LED', 'https://images.tokopedia.net/img/cache/300-square/VqbcmM/2021/3/12/4022ddb7-2a96-4cdf-a76f-d57a6a36ef39.png.webp?ect=4g', 'intech official', 'Jakarta pusat', 70000, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `telp`, `email`, `password`, `saldo`, `created_at`, `updated_at`) VALUES
(1, '', 'andi99', 0, 'p@gmail.com', '$2y$10$EXUvLzBH6FK.kCsu6h.Kcu65dQfiH2ctjBcBMb0R.RNTdMFsSPrES', 0, '2021-06-21 08:29:44', '2021-06-21 08:29:44'),
(3, '', 'supeno112', NULL, 'a@gmail.com', '$2y$10$vmtlEo1GGB7D/LE4Mmz1LONvM.iWPEGwevUXOc.NzExtjFmUjGnuG', 3500, '2021-06-21 08:34:17', '2021-07-04 13:24:31');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `videos`
--

INSERT INTO `videos` (`id`, `user`, `caption`, `video`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'hafisR', 'Lagu yang enak', 'video.mp4', 'https://cdn1-production-images-kly.akamaized.net/cwKdjiZpY8-_hsOp447gM9TeUDw=/640x480/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/1386399/original/065005200_1477531961-Maroon_5.jpg', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_username_unique` (`username`);

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bid_bid`
--
ALTER TABLE `bid_bid`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bid_main`
--
ALTER TABLE `bid_main`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `donate_action`
--
ALTER TABLE `donate_action`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `donate_main`
--
ALTER TABLE `donate_main`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoice_bid`
--
ALTER TABLE `invoice_bid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice_bid_key_unique` (`key`);

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
-- Indeks untuk tabel `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seller_key_unique` (`key`);

--
-- Indeks untuk tabel `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `unittes`
--
ALTER TABLE `unittes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_username_unique` (`username`),
  ADD UNIQUE KEY `user_email_unique` (`email`),
  ADD UNIQUE KEY `user_telp_unique` (`telp`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bid_bid`
--
ALTER TABLE `bid_bid`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `bid_main`
--
ALTER TABLE `bid_main`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `donate_action`
--
ALTER TABLE `donate_action`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `donate_main`
--
ALTER TABLE `donate_main`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invoice_bid`
--
ALTER TABLE `invoice_bid`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `seller`
--
ALTER TABLE `seller`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `shipment`
--
ALTER TABLE `shipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `unittes`
--
ALTER TABLE `unittes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
