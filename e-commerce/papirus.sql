-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Tem 2023, 01:09:28
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `papirus`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim1`
--

CREATE TABLE `iletisim1` (
  `id` int(250) NOT NULL,
  `isim` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mesaj` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `iletisim1`
--

INSERT INTO `iletisim1` (`id`, `isim`, `email`, `mesaj`) VALUES
(47, 'aslı', 'aslıç@gmail.com', 'sdfghjkl'),
(49, 'elmas', 'elmas@gmail.com', '123456789\r\n'),
(50, 'sabri', 'sabri@gmail.com', 'sdrftgyhujıkolş'),
(57, 'elmas', 'elmas@gmail.com', 'Bu bir ileetişim formudur.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

CREATE TABLE `kitaplar` (
  `id` int(250) NOT NULL,
  `ad` text NOT NULL,
  `bilgi` varchar(150) NOT NULL,
  `fiyat` int(50) NOT NULL,
  `resim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`id`, `ad`, `bilgi`, `fiyat`, `resim`) VALUES
(1, 'Serenad', 'Zülfü Livaneli 300sayfa', 150, 'download.jpg'),
(4, 'Balıkçı ve Oğlu', 'Zülfü Livaneli 135 sayfa', 75, '110000021857593.jpg'),
(5, '37 Kitap', 'Sezin Karameşe ', 55, '0001914091001-1.jpg'),
(7, 'Gece Yarısı Kütüphanesi ', 'Matt Haig', 70, '0001922926001-1.jpg'),
(8, '1984', 'George Orwell', 45, '0000000064038-1.jpg'),
(9, 'Hayvan Çiftliği', 'George Orwell', 40, '0000000105409-1.jpg'),
(10, 'Beyaz Zambaklar Ülkesinde', 'Grigoriy Petrov', 60, '0001784820001-1.jpg'),
(11, 'İnce Memed 1', 'Yaşar Kemal', 65, '0000000147918-1.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `username`, `email`, `password`) VALUES
(14, 'ahmet', 'ahmet@gmail.com', 'ahmet123'),
(15, 'esma', 'esma@gmail.com', 'esma..'),
(16, 'musti', 'mustafa@gmail.com', 'musti135'),
(17, 'sabri', 'sabri@gmail.com', 'sabri147'),
(19, 'Elmas', 'elmasbayram@gmail.com', '$2y$10$N9xnmCreWQhSGrkXmGNDJu5sc3ir0AHMuypGuh755ql'),
(20, 'Ecrin', 'ecrinak@gmail.com', '$2y$10$l3Y8hbaPKZnLa2sKtJjieuipEYughiHDMBVGRucH/lG'),
(22, 'Yağmur', 'yagmur@gmail.com', 'yagmuryc.2000'),
(23, 'Nico', 'nicokpz@gmail.com', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oyuncaklar`
--

CREATE TABLE `oyuncaklar` (
  `id` int(250) NOT NULL,
  `ad` text NOT NULL,
  `bilgi` varchar(150) NOT NULL,
  `fiyat` int(50) NOT NULL,
  `resim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `oyuncaklar`
--

INSERT INTO `oyuncaklar` (`id`, `ad`, `bilgi`, `fiyat`, `resim`) VALUES
(2, 'Okey Takımı', 'Masa Oyunu', 220, 'download.jpg'),
(3, 'Uno', 'Kart Oyunu', 35, '1.jpg'),
(5, 'Play-Doh', 'Oyun Hamuru Yeşil', 15, '0001702801001-1.jpg'),
(6, 'Play-Doh', 'Oyun Hamuru Mor', 15, 'f5e53_Play_Doh_Oyun_Hamuru_Tekli_B6756.jpg'),
(7, 'Play-Doh', 'Oyun Hamuru Aletleri', 40, '10802981732402.jpg'),
(8, 'Play-Doh', 'Oyun Hamuru Turuncu', 15, 'images.jpg'),
(9, 'Let\'s Oyun Hamuru', 'Oyun Hamuru 4\'lü set', 60, '4545.jpg'),
(10, 'Oyuncak Bebek', 'Barbie', 450, '110000011248496.jpg'),
(11, 'Futbol Topu', 'Rengarenk futbol topları', 150, 'Futbol-Topu-Spor-Poster-Tablo_2.jpg'),
(12, 'Voleybol Topu', 'Voit Renkli Voleybol topu', 200, '6418273a5c3145cba25531d9_800.jpg'),
(13, 'Basketbol Topu', 'Nike Pembe Basketbol Topu', 550, 'nike-skills-03-pembe-mini-basketbol-topu-n.ki.08.644.03-siyahbordo-108926.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ürünler`
--

CREATE TABLE `ürünler` (
  `id` int(250) NOT NULL,
  `ad` text NOT NULL,
  `bilgi` varchar(150) NOT NULL,
  `fiyat` int(50) NOT NULL,
  `resim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ürünler`
--

INSERT INTO `ürünler` (`id`, `ad`, `bilgi`, `fiyat`, `resim`) VALUES
(83, 'Faber Castell Kalem', 'Mor 0.7 Uçlu Kalem', 30, 'ürün1.jpg'),
(84, 'Faber Castell Kalem', 'Yeşil 0.7 Uçlu Kalem', 30, 'ürün2.jpg'),
(85, 'Faber Castell  Kalem', '1.4 Siyah Uçlu Kalem', 90, 'ürün3.jpg'),
(86, 'Maries Guaj Boya', '12 Tüp maries Guaj Boya', 135, 'ürün4.jpg'),
(87, 'Stabilio Kalem', '0.5 Uçlu renkli keçeli kalem', 20, 'ürün6.jpg'),
(88, 'Tükenmez Kalem', 'Renkli Tükenmez Kalem', 5, 'ürün7.jpg'),
(89, 'Adeland Set', 'Kuru-pastel-keçeli boya karışık set', 130, 'ürün8.jpg'),
(90, 'Defter', 'Mikro 80 Yaprak Kareli defter', 25, 'ürün9.jpg'),
(91, 'Masa Üstü Kalemlik', 'Lacivert masa üstü kalemlik', 35, 'ürün10.jpg'),
(92, 'Uçlu Kalem', '0.7 uçlu balık desenli renkli kalem ', 30, 'ürün13.jpg'),
(93, 'Uçlu Kalem', '0.7 uçlu Faber Castell uçlu kalem', 30, 'ürün14.jpg'),
(94, 'A4 Kağıdı', '500 Adet A4 kağıdı ofis için uygun', 130, 'images.jpg');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `iletisim1`
--
ALTER TABLE `iletisim1`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `oyuncaklar`
--
ALTER TABLE `oyuncaklar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ürünler`
--
ALTER TABLE `ürünler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `iletisim1`
--
ALTER TABLE `iletisim1`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Tablo için AUTO_INCREMENT değeri `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `oyuncaklar`
--
ALTER TABLE `oyuncaklar`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `ürünler`
--
ALTER TABLE `ürünler`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
