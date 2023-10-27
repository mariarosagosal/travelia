-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 04:52 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` char(4) NOT NULL,
  `adminNAMA` varchar(30) NOT NULL,
  `adminEMAIL` varchar(60) NOT NULL,
  `adminPASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminNAMA`, `adminEMAIL`, `adminPASSWORD`) VALUES
('A001', 'Jone', 'jone@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('A002', 'Alex', 'alex@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `areaID` char(4) NOT NULL,
  `areanama` char(35) NOT NULL,
  `areawilayah` char(35) NOT NULL,
  `areaketerangan` varchar(255) NOT NULL,
  `kabupatenKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`areaID`, `areanama`, `areawilayah`, `areaketerangan`, `kabupatenKODE`) VALUES
('AR01', 'Lembang', 'Lembang Barat Daya', 'Lembang adalah desa di kecamatan Lembang, Kabupaten Bandung Barat, Jawa Barat, Indonesia. Lembang juga adalah nama salah-satu daerah dataran tinggi yang terkenal di Indonesia.', 'K001'),
('AR02', 'Tanjung', 'Jawa Tengah', 'Tanjung adalah sebuah kecamatan di Kabupaten Brebes, Jawa Tengah, Indonesia. Kecamatan Tanjung dikenal sebagai penghasil bawang merah.', 'K002'),
('AR03', 'Tegalwaru', 'Jawa Barat', 'Kecamatan Tegalwaru adalah salah satu kecamatan dari 30 kecamatan yang ada di wilayah Kabupaten Karawang.', 'K003'),
('AR04', 'Sindang', 'Jawa Barat', 'Sindang adalah sebuah kecamatan di Kabupaten Indramayu, Provinsi Jawa Barat, Indonesia.', 'K004'),
('AR05', 'Baturiti', 'Bali', 'Baturiti adalah sebuah kecamatan di kabupaten Tabanan, provinsi Bali, Indonesia.', 'K005'),
('AR06', 'Malang', 'Jawa Timur', 'Malang adalah sebuah kota yang terletak di provinsi Jawa Timur, Indonesia', 'K006');

-- --------------------------------------------------------

--
-- Table structure for table `atraksi`
--

CREATE TABLE `atraksi` (
  `atraksiID` varchar(4) NOT NULL,
  `atraksiNAMA` varchar(60) NOT NULL,
  `atraksiKET` varchar(255) NOT NULL,
  `atraksiFOTO` text NOT NULL,
  `areaID` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atraksi`
--

INSERT INTO `atraksi` (`atraksiID`, `atraksiNAMA`, `atraksiKET`, `atraksiFOTO`, `areaID`) VALUES
('ATR1', 'LaLaLa Fest', 'Atraksi lampu sorot membuat cahaya warna-warni menjadikan suasana semakin romantis.', 'atrlembang.jpg', 'AR01'),
('ATR2', 'Pesona Belitung Beach Festival ', 'Pesona Belitung Beach Festival selalu memberikan ruang bagi para seniman lokal untuk berkarya.', 'atrbelitung.jpg', 'AR02'),
('ATR3', 'Karnival', 'Karnival (Karawang Night Festival) merupakan tempat hiburan yang menyelenggarakan berbagai atraksi.', 'karnival.jpg', 'AR03'),
('ATR4', 'Sindang Art Festival', 'Sindang Art Festival menampilkan berbagai kesenian tradisional yang ada di Kabupaten Indramayu.', 'atrindramayu.jpg', 'AR04'),
('ATR5', 'Siat Geni', 'Siat Geni merupakan atraksi perang api sebagai bentuk persembahan.', 'siatgeni.jpg', 'AR05'),
('ATR6', 'Pusaka Indonesia Festival', 'Serangkaian kegiatan yang didedikasikan untuk menggali dan membumikan nilai luhur Bangsa Indonesia.', 'festmalang.jpg', 'AR06');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `beritaID` char(4) NOT NULL,
  `beritajudul` varchar(60) NOT NULL,
  `beritainti` varchar(1000) NOT NULL,
  `penulis` char(50) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tanggalterbit` date NOT NULL,
  `destinasiID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`beritaID`, `beritajudul`, `beritainti`, `penulis`, `penerbit`, `tanggalterbit`, `destinasiID`) VALUES
('B001', 'Liburan Keluarga dengan Harga Murah', 'Sebuah rujukan tempat wisata keluarga di Lembang Bandung yaitu Floating Market yang cocok untuk liburan akhir pekan dan Tahun Baru.  Pastinya liburan bersama keluarga di Floating Market Lembang Bandung ini yang sayang jika kamu lewatkan dengan harga yang murah meriah. Disini akan diulas sedikit tentang tempat wisata asik bagi keluarga di Floating Market Lembang Bandung rekomendasi akhir pekan dan Tahun Baru mendatang. Floating Market Lembang Bandungn juga terdapat berbagai spot untuk membidik lensa kamera kamu seperti wahana kota mini dan taman bunga.', 'Farid Wudjy', 'Kabar Fajar', '2022-11-25', 'WS01'),
('B002', 'Keindahan Alam Luar Biasa', 'Kalau belum ke Pantai Tanjung Tinggi, rasanya belum sah berwisata ke Belitung. Itulah slogan kalangan pelaku wisata saat mempromosikan Pulau Belitung pada wisatawan. Karena pantai yang menjadi lokasi syuting Film Laskar Pelangi ini, wisatawan akan menemui keindahan alam dan sensasi yang luar biasa. Tak heran, pantai yang indah dengan pasir putih bersih, air laut jernih dan bebatuan granit raksasa menjulang ini menjadi pilihan wajib untuk dikunjungi wisatawan saat berlibur di Pulau Belitung. Kondisi pantainya sangatlah bersih dan asri sehingga tak heran jika diklaim sebagai salah satu pantai terindah di Pulau Belitung.', 'Tedja Pramana', 'Pos Belitung', '2022-10-31', 'WS02'),
('B003', 'Manjakan Diri Sambil Hilangkan Rasa Penat', 'Curug Cigentis sebagai destinasi wisata alam yang direkomendasikan Karawang memiliki pesona air terjun dan alam yang indah. Dengan mengunjungi wisata ini, Anda bisa memanajakan diri dari rasa penat akibat aktivitas, pekerjaan atau suasana kota. Karawang juga menawarkan produk wisata yang tidak kalah dengan daerah Jawa Barat lainnya. Salah satunya adalah Wisata Alam Curug Cigentis. Untuk liburan akhir pekan di Karawang yang memiliki pesona wisata yang indah, datanglah ke Curug Cigentis. Anda bisa menggunakan spot-spot rekomendasi Air Terjun Cigentis untuk setting fotografi.', 'Muchamad Rizky', 'Kompas', '2022-11-21', 'WS03'),
('B004', 'Tempat Wisata dengan Estetika', 'Taman Tjimanoek merupakan salah satu tempat wisata favorit bagi masyakarat Indramayu. Adanya destinasi wisata Taman Tjimanoek ini sekaligus menjadi ikon baru bagi daerah yang terletak di pantai utara Jawa Barat ini. Tempat wisata ini dibangun tepat dipinggiran bantaran Sungai Cimanuk yang melintasi dan bermuara di Kota Indramayu. Jika mengunjungi Taman Tjimanoek, Anda akan di suguhkan berbagai pemandangan salah satunya adalah menikmati keindahan sungai-sungai di Taman Tjimanoek ini. Taman Cimanuk juga merupakan sungai bersejarah bagi masyarakat Indramayu karena pernah menjadi bandar atau pelabuhan besar dan ternama di Pulau Jawa. ', 'Rizal Fadillah', 'iNews', '2022-11-16', 'WS04'),
('B005', 'Pesona Keindahan Danau Beratan Bedugul', 'Danau Beratan Bedugul, salah satu destinasi wisata yang wajib masuk dalam daftar tempat wisata di Bali yang wajib dikunjungi. Terkenal dengan danau yang tidak pernah sepi dikunjungi wisatawan domestik dan wisatawan mancanegara. Sebenarnya nama danau ini bukan Danau Bedugul melainkan Danau Beratan atau Bratan, karena danau ini masuk ke wilayah kawasan objek wisata Bedugul. Maka banyak wisatawan lebih mengenalnya sebagai Danau Bedugul bukan Danau Beratan atau Bratan.', 'Yuska Apitya', 'Kilat.com', '2022-07-23', 'WS05'),
('B006', 'Wisata Bersejarah di Malang', 'Perjalanan akan dimulai dari Alun-Alun Malang yang terletak di pusat kota. Alun-Alun ini merupakan salah satu dari dua Alun-Alun yang berada di Kota Malang, salah satunya lagi merupakan Alun-Alun Bundar, atau yang sekarang lebih dikenal sebagai Tugu Malang. Alun- alun Bunder ini merupakan simbol kekuasaan kolonial Belanda di Kota Malang, karena pemerintah kolonial beranggapan bahwa Alun- alun kota Malang terlalu berbau indisch. Pada awalnya nama taman ini adalah JP Coen Plein, sebagai bentuk penghormatan kepada Gubernur jendral Jaan Pieterzoen Coen.', 'Faizal Bakrie', 'Kompas', '2022-11-01', 'WS06');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiID` char(4) NOT NULL,
  `destinasinama` varchar(35) NOT NULL,
  `destinasialamat` varchar(255) NOT NULL,
  `kategoriID` char(4) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiID`, `destinasinama`, `destinasialamat`, `kategoriID`, `areaID`) VALUES
('WS01', 'Floating Market', 'Jl. Grand Hotel No.33E, Lembang, Kec. Lembang, Kabupaten Bandung Barat, Jawa Barat', 'KW05', 'AR01'),
('WS02', 'Tanjung Tinggi', 'Desa Ciput, Kecamatan Sijuk, Kabupaten Belitung, Kepulauan Bangka Belitung', 'KW03', 'AR02'),
('WS03', 'Curug Cigentis', 'Mekarbuana, Tegalwaru, Karawang, Jawa Barat', 'KW01', 'AR03'),
('WS04', 'Taman Cimanuk', 'Taman Cimanuk, Penganjang, Kec. Sindang, Kabupaten Indramayu, Jawa Barat 45221', 'KW06', 'AR04'),
('WS05', 'Danau Beratan', 'Bedugul, Desa Candikuning, Kecamatan Baturiti, Kabupaten Tabanan, Bali', 'KW04', 'AR05'),
('WS06', 'Alun Alun', 'Jl. Merdeka Selatan, Kiduldalem, Kec. Klojen, Kota Malang, Jawa Timur 65119', 'KW02', 'AR06');

-- --------------------------------------------------------

--
-- Table structure for table `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotoID` char(5) NOT NULL,
  `fotonama` char(60) NOT NULL,
  `destinasiID` char(4) NOT NULL,
  `fotofile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotoID`, `fotonama`, `destinasiID`, `fotofile`) VALUES
('F001', 'Gambar FM 1', 'WS01', 'float.jpg'),
('F002', 'Gambar Tanjung 1', 'WS02', 'tanjung.jpg'),
('F003', 'Gambar CC 1', 'WS03', 'curug.jpg'),
('F004', 'Gambar Cimanuk 1', 'WS04', 'cimanuk.jpg'),
('F005', 'Gambar DB 1', 'WS05', 'beratan.jpg'),
('F006', 'Gambar AAM 1', 'WS06', 'alun.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fotokategori`
--

CREATE TABLE `fotokategori` (
  `fotokategoriID` char(4) NOT NULL,
  `fotokategoriNAMA` varchar(100) NOT NULL,
  `fotokategoriFILE` text NOT NULL,
  `kategoriID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fotokategori`
--

INSERT INTO `fotokategori` (`fotokategoriID`, `fotokategoriNAMA`, `fotokategoriFILE`, `kategoriID`) VALUES
('FK01', 'Alam', 'alam.jpg', 'KW01'),
('FK02', 'Budaya', 'budaya.jpg', 'KW02'),
('FK03', 'Pantai', 'pantai.jpg', 'KW03'),
('FK04', 'Religi', 'religi.jpg', 'KW04'),
('FK05', 'Kuliner', 'kuliner.jpg', 'KW05'),
('FK06', 'Seni', 'seni.jpg', 'KW06');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` char(4) NOT NULL,
  `hotelnama` varchar(60) NOT NULL,
  `hotelalamat` varchar(255) NOT NULL,
  `hotelketerangan` varchar(300) NOT NULL,
  `hotelfoto` text NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelID`, `hotelnama`, `hotelalamat`, `hotelketerangan`, `hotelfoto`, `areaID`) VALUES
('H001', 'Puteri Gunung Hotel', 'Jl. Raya Tangkuban Parahu', 'Puteri Gunung Hotel merupakan penginapan bintang 4 yang berdiri di tengah rindang.', 'hotel1.jpg', 'AR01'),
('H002', 'Sari Ater Hotel', 'Jl. Sari Ater Palasari', 'Sari Ater Hotel dikelilingi oleh perkebunan teh dan hutan pinus di kaki gunung berapi Tangkuban Parahu', 'hotel2.jpg', 'AR01'),
('H003', 'Pesona Bamboe', 'Jl. Raya Lembang No.227', 'Hotel di lokasi pegunungan yang nyaman dan menenangkan.', 'hotel3.jpg', 'AR01'),
('H004', 'Swiss Belresort', 'Jl. Tanjung Kelayang No.168', 'Swiss Belresort adalah hotel yang terletak di pulau Belitung Indonesia yang indah', 'hotel4.jpg', 'AR02'),
('H005', 'Fairfield Marriott', 'Jl. Pattimura No.1', 'Fairfield by Marriot Belitung merupakan pilihan tepat saat mengunjungi Tanjung Pandan', 'hotel5.jpg', 'AR02'),
('H006', 'Sheraton Resort', 'Jl. Pantai Penarikan Dusun', 'Hotel bintang lima dengan layanan dan fasilitas terbaik yang terletak di Kepulauan Belitung', 'hotel6.jpg', 'AR02'),
('H008', 'Swiss Belinn', 'Jl. Ahmad Yani No.29', 'Swiss-Belinn Karawang yang strategis terletak di jantung kawasan industri Karawang', 'hotel8.jpg', 'AR03'),
('H009', 'Favehotel Karawang', 'Jl. Arteri Karawang Barat No. 8', 'Favehotel Karawang adalah hotel International pertama di Karawang', 'hotel9.jpg', 'AR03'),
('H010', 'Brits Hotel', 'Jl. Tarumanegara Kav. 8', 'Brits Hotel Karawang menawarkan akomodasi menarik yang terletak di Karawang.', 'hotel101.jpg', 'AR03'),
('H011', 'Hotel Flamingo', 'Jl. By Pass Losarang', 'Hotel yang terletak pada lokasi strategis di Indramayu ', 'hotel11.jpg', 'AR04'),
('H012', 'Grand Trisula', 'Jl. Di Panjaitan No.77', 'Hotel yang terletak di lokasi strategis di jantung Kota Indramayu  dan hanya beberapa menit ke Balongan', 'hotel12.jpg', 'AR04'),
('H013', 'Hotel Handayani', 'Jl. Prabu Gajah Agung No.10', 'Hotel bintang empat dengan fasilitas terbaik dan lokasi yang strategis', 'hotel13.jpg', 'AR04'),
('H014', 'Ulaman', 'Jl. Ulaman, Buwit', 'Ulaman Eco Luxury Resort menawarkan akomodasi, restoran, sepeda gratis, bar, dan taman.', 'hotel14.jpg', 'AR05'),
('H015', 'Swell Hotel', 'Jl. Pantai Kedungu No.99', 'Hotel internasional pertama di daerah Tabanan', 'hotel15.jpg', 'AR05'),
('H016', 'Aris Hotel', 'Jl. Raya Denpasar', 'Aris Hotel Tabanan menawarkan akomodasi bintang 2 dengan balkon pribadi di Tabanan', 'hotel16.jpg', 'AR05'),
('H017', 'Santika Premiere', 'Jl. Letjen Sutoyo No.79', 'Hotel dengan interpretasi yang menyegarkan dari desain tradisional Jawa dengan sentuhan modern.', 'hotel17.jpg', 'AR06'),
('H018', 'The Shalimar', 'Jl. Cerme No.16', 'Hotel yang terletak di kawasan perumahan mewah di Malang', 'hotel18.jpg', 'AR06'),
('H019', 'Tugu Malang', 'Jl. Tugu No.3', 'Hotel properti pertama dari semua Hotel Tugu.', 'hotel19.jpg', 'AR06');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kabupatenKODE` char(4) NOT NULL,
  `kabupatenNAMA` char(60) NOT NULL,
  `kabupatenALAMAT` varchar(255) NOT NULL,
  `kabupatenKET` text NOT NULL,
  `kabupatenFOTOICON` varchar(255) NOT NULL,
  `kabupatenFOTOICONKET` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`kabupatenKODE`, `kabupatenNAMA`, `kabupatenALAMAT`, `kabupatenKET`, `kabupatenFOTOICON`, `kabupatenFOTOICONKET`) VALUES
('K001', 'Kabupaten Bandung', 'Jl. Bandung Raya 1 No. 46', 'Kabupaten Bandung adalah sebuah wilayah kabupaten yang terletak di Provinsi Jawa Barat, Indonesia', 'Kabupaten Bandung.jpg', 'Gambar Kabupaten Bandung'),
('K002', 'Kabupaten Belitung', 'Jl. Belitung Raya No. 32', 'Kabupaten Belitung adalah sebuah kabupaten di provinsi Kepulauan Bangka Belitung.', 'kbelitung.jpg', 'Gambar Kabupaten Belitung'),
('K003', 'Kabupaten Karawang', 'Jl. Karawang Raya 3 No. 15', 'Kabupaten Karawang adalah sebuah wilayah kabupaten yang terletak di Provinsi Jawa Barat, Indonesia', 'kkarawang.jpg', 'Gambar Kabupaten Karawang'),
('K004', 'Kabupaten Indramayu', 'Jl. Indramayu 3 Raya No. 11', 'Kabupaten Indramayu adalah sebuah kabupaten di Provinsi Jawa Barat, Indonesia', 'kindramayu.jpg', 'Gambar Kabupaten Indramayu'),
('K005', 'Kabupaten Tabanan', 'Jl. Tabanan 5 Raya 123', 'Kabupaten Tabanan adalah sebuah kabupaten di provinsi Bali, Indonesia', 'ktabanan.jpg', 'Gambar Kabupaten Tabanan '),
('K006', 'Kabupaten Tulungagung', 'Jl. Tulungagung Raya 9 No. 5', 'Kabupaten Tulungagung adalah sebuah kabupaten yang terletak di Provinsi Jawa Timur, Indonesia', 'ktulungagung.jpg', 'Gambar Kabupaten Tulungagung ');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategoriID` char(4) NOT NULL,
  `kategorinama` char(30) NOT NULL,
  `kategoriketerangan` varchar(255) NOT NULL,
  `kategorireferensi` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `kategorinama`, `kategoriketerangan`, `kategorireferensi`) VALUES
('KW01', 'Alam', 'Wisata untuk menikmati keindahan alam di berbagai daerah', 'Buku Sejarah'),
('KW02', 'Budaya', 'Wisata untuk mengunjungi dan mempelajari budaya daerah tertentu', 'Buku Budaya'),
('KW03', 'Pantai', 'Wisata untuk menikmati keindahan pantai di berbagai daerah', 'Buku Alam'),
('KW04', 'Religi', 'Wisata untuk mengunjungi tempat-tempat yang berkaitan dengan religi', 'Buku Religi'),
('KW05', 'Kuliner', 'Wisata untuk menikmati berbagai jenis makanan khas daerah', 'Buku Kuliner'),
('KW06', 'Seni', 'Wisata untuk menyaksikan berbagai atraksi seni di berbagai daerah', 'Buku Seni');

-- --------------------------------------------------------

--
-- Table structure for table `kuliner`
--

CREATE TABLE `kuliner` (
  `kulinerID` varchar(4) NOT NULL,
  `kulinerNAMA` varchar(30) NOT NULL,
  `kulinerKET` varchar(255) NOT NULL,
  `kulinerFOTO` text NOT NULL,
  `areaID` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuliner`
--

INSERT INTO `kuliner` (`kulinerID`, `kulinerNAMA`, `kulinerKET`, `kulinerFOTO`, `areaID`) VALUES
('KL01', 'Tahu Susu Lembang', 'Tahu susu ini diolah dengan mencampurkan susu murni pada kedelai.', 'tahususu.jpg', 'AR01'),
('KL02', 'Picnic Roll Prima Rasa', 'Picnic roll merupakan olahan daging cincang yang sudah dibumbui sebelumnya.', 'picnicroll.jpg', 'AR01'),
('KL03', 'Pisang Bollen Kartika Sari', 'Pisang bollen ala Kartika Sari ini adalah pelopor pisang bollen di Bandung.', 'pisangbollen.jpg', 'AR01'),
('KL04', 'Siput Gonggong', 'Daging siput gonggong memiliki rasa yang lezat dan mempunyai kandungan protein yang tinggi.', 'siputgonggong.jpg', 'AR02'),
('KL05', 'Lempah Kuning', 'Makanan ini merupakan sajian nikmat berkuah yang diolah dengan menggunakan daging sapi.', 'lempahkuning.jpg', 'AR02'),
('KL06', 'Kue Nanas', 'Kue nanas khas Bangka berbeda dengan kue nanas pada umumnya yang berwujud kue kering dan berukuran kecil.', 'kuenanas.jpg', 'AR02'),
('KL07', 'Strudel Bogor', 'Strudel merupakan pastry berlapis yang biasanya berisi manisan seperti potongan apel, coklat, dan karamel. ', 'strudel.jpg', 'AR03'),
('KL08', 'Bolu Sangkuriang', 'Bolu Lapis Sangkuriang dikenal dengan warnanya yang kuning dan ungu serta topping yang beragam.', 'sangkuriang.jpg', 'AR03'),
('KL09', 'Laksa Bogoir', 'Laksa Bogor menjadi salah satu hidangan yang juga dikenal sebagai makanan khas Bogor.', 'laksabogor.jpg', 'AR03'),
('KL10', 'Nasi Lengko', 'Nasi lengko disajikan dengan toping berisi aneka paduan sayur.', 'lengko.jpg', 'AR04'),
('KL11', 'Pindang Gombyang Manyung', 'Ppindang gombyang manyung adalah makanan yang menggunakan bahan utama berupa ikan manyung. ', 'pindang.jpg', 'AR04'),
('KL12', 'Karedok', 'Yang membedakan karedok dengan gado-gado adalah sayuran yang digunakan untuk membuat karedok adalah sayuran yang mentah.', 'karedok.jpg', 'AR04'),
('KL13', 'Ayam Betutu', 'Ayam betutu terbuat dari bumbu betutu yaitu bumbu khas Bali.', 'betutu.jpg', 'AR05'),
('KL14', 'Sate Lilit', 'Makanan khas Baturiti satu ini bisa terbuat dari daging ayam atau ikan yang digiling.', 'satelilit.jpg', 'AR05'),
('KL15', 'Bebek Timbungan', 'Dagingnya memiliki tekstur empuk dan bumbunya meresap hingga ke dalam daging.', 'bebek.jpg', 'AR05'),
('KL16', 'Bakso Malang', 'Bakso khas Malang memiliki ragam isi yang lebih banyak daripada bakso di kota lain.', 'baksomalang.jpg', 'AR06'),
('KL17', 'Sate Kelinci', 'Batu, Malang menjadi tempat wisata kuliner sate kelinci yang populer. ', 'satekelinci.jpg', 'AR06'),
('KL18', 'Mendol', 'Mendol terbuat dari tempe yang diremukkan, dicampur dengan bumbu, lalu digoreng hingga renyah.', 'mendol.jpg', 'AR06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaID`);

--
-- Indexes for table `atraksi`
--
ALTER TABLE `atraksi`
  ADD PRIMARY KEY (`atraksiID`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`beritaID`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiID`);

--
-- Indexes for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotoID`);

--
-- Indexes for table `fotokategori`
--
ALTER TABLE `fotokategori`
  ADD PRIMARY KEY (`fotokategoriID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`kabupatenKODE`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indexes for table `kuliner`
--
ALTER TABLE `kuliner`
  ADD PRIMARY KEY (`kulinerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
