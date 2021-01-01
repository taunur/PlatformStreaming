-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 04:00 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_filmi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(8) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'haped', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_film`
--

CREATE TABLE `tb_film` (
  `id_film` int(8) NOT NULL,
  `judul_film` varchar(30) NOT NULL,
  `thumb_film` varchar(50) NOT NULL,
  `genre_film` varchar(50) NOT NULL,
  `movie_film` varchar(50) NOT NULL,
  `tahun_film` char(4) NOT NULL,
  `country` varchar(20) NOT NULL,
  `sinopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_film`
--

INSERT INTO `tb_film` (`id_film`, `judul_film`, `thumb_film`, `genre_film`, `movie_film`, `tahun_film`, `country`, `sinopsis`) VALUES
(1, 'AVENGER ENDGAME', '5fe5897891dc6.jfif', 'ACTION', '5fe589789b07c.mp4', '2019', 'AMERICA', 'setelah peristiwa yang memusnahkan setengah dari populasi bumi di avengers: infinity war (2018), kisah akan berlanjut saat avengers yang tersisa berkumpul sekali lagi untuk melawan thanos (josh brolin). \r\n\r\nnamun kesedihan, keputusasaan dan ketidakberdayaan masih tetap menyelimuti para pahlawan super. trailer avengers: endgame didominasi potret &quot;kehancuran&quot; di bumi usai thanos memusnahkan separuh populasi dunia. \r\n\r\nwarna hitm putih mendominasi cuplikan film besutan joe dan anthony russo tersebut. dalam sinopsis avengers: endgame, para avengers pun berusaha untuk memulihkan tatanan alam semesta. \r\n\r\navengers yang tersisa seperti steve rogers/captain america (chris evans), natasha romanoff/black widow (scarlett johansson) hingga thor (chris hemsworth) mendapat bantuan dari carol danvers/captain marvel (brie larson). \r\n\r\nhawkeye (jeremy renner) yang tak hadir saat infinity war juga bakal tampil di avengers: endgame dengan busur dan panah andalannya. scott lang/ant-man (paul rudd) pun hadir membantu para avengers yang tersisa untuk melawan thanos.\r\n'),
(2, 'YOWIS BEN', '5fe589fb91d9b.jpg', 'COMEDY', '5fe589fb920b1.mp4', '2019', 'INDONESIA', 'bayu (bayu skak) menyukai susan (cut meyriska) sejak lama. namun karena dia merasa minder dengan keadaan dirinya yang pas-pasan, bayu memutuskan memendam perasaan itu.\r\n\r\nnamun hari-hari bayu berubah sejak susan mengirim voice chat ke ponsel bayu, yang membuatnya kegeeran luar biasa mengira susan memberi isyarat agar didekati. ternyata susan hanya memanfaatkan bayu untuk membantunya mensuplai pecel untuk konsumsi teman-teman osis. bayu bertekad mengubah dirinya menjadi lebih populer dari roy (indra widjaya), pacar susan, yang dikenal piawai sebagai gitaris band sekolah mereka,\r\n\r\nbayu berinisiatif membentuk band bersama doni (joshua suherman) - sahabat dekatnya, yayan (tutus thomson) - seorang tukang tabuh beduk sebagai drummer dan nando (brandon salim) - siswa ganteng yang jago keyboard. mereka sepakat menamakan band mereka yowis ben.\r\n\r\nnamun rupanya langkah bayu dan teman-temannya tidak mudah. dalam masa-masa yowis ben tumbuh di dunia musik kota malang, perlahan tapi pasti celah perpecahan antar personil yowis ben mulai tampak.'),
(3, 'BAD BOYS FOR LIFE', '5fe58a9d099c8.jfif', 'ACTION', '5fe58a9d09cbf.mp4', '2017', 'MEXICO', 'film bad boys for life ini mengisahkan tentang aksi detektif mike lowrey yang sedang memiliki masalah baru. saat diterpa masalah, sahabatnya marcuss burneet yang biasa menemaninya dalam menumpas kejahatan, pensiun dari kepolisian karena faktor usia. \r\n\r\nmike pun tidak terima dan mencoba berbagai cara agar sahabatnya itu terus menemaninya lagi memburu penjahat.\r\n\r\napalagi, penjahat yang diburu kali ini merupakan seseorang yang mencoba membunuh mike. bagi marcus, mike bukan hanya seperti sahabat, melainkan keluarga yang saling melindungi satu sama lain. marcus pun kembali bergabung dengan mike dalam menumpas kejahatan.\r\n\r\n'),
(4, 'NANNY CAM', '5fe58bf13d118.jfif', 'HOROR', '5fe58bf13d429.mp4', '2015', 'NORWEGIA', '\r\nlinda memiliki pernikahan yang tampaknya sempurna dengan suaminya yang kasar dan tampan mark dan seorang putri berusia 8 tahun yang menggemaskan, chloe. tetapi ketika chloe terluka oleh seorang pengasuh tua yang mengalami demensia, linda ingin memastikan bahwa anaknya tidak pernah terluka lagi.\r\n\r\nhal ini merupakan awal dari kisah yang menegangkan karena ketika keluarganya menyewa pengasuh anak, terlihat seperti baik-baik saja dari penampilan, akan tetapi pengasuh tersebut memiliki sisi yang kelam dan berbeda dari penampilannya.'),
(5, 'PLAYING WITH FIRE', '5fe58cfb33d3a.jpg', 'ACTION COMEDY', '5fe58cfb34038.mp4', '2015', 'ITALY', 'film playing with fire mengisahkan tentang regu petugas pemadam kebakaran hutan yang dipimpin jake carson (john cena). bersama dua anak buahnya, mark rogers (keegan-michael key) dan rodrigo torres (john leguizamo), jake selalu berhasil menangani situasi berbahaya sekaligus menyelamatkan warga sipil. \r\n\r\nsuatu hari, mereka menyelamatkan brynn (brianna hildebrand)dan dua adiknya, will (christian convery) dan zoey (finley rose slater) dari kabin yang terbakar. namun, tugas jake ternyata tak berhenti di situ. karena adanya aturan khusus, jake harus mengurus ketiga anak itu sampai orang tua mereka menjemput. \r\n\r\njake sudah berusaha menghubungi orang tua brynn. sayangnya, ibu brynn masih dalam perjalanan dan tak tahu kapan datangnya. di satu sisi, jake harus menyelesaikan lamarannya untuk menjadi komandan divisi. rencananya pun kacau karena ketiga anak itu suka membuat onar. \r\n\r\nbelum lagi, jake juga harus menghadapi mantan pacarnya yang datang tiba-tiba serta berbagai macam protes dari penduduk setempat. \r\n\r\nterlepas dari kekacauan itu, jake, mark, dan rodrigo mulai dekat dengan anak-anak. bahkan mereka juga mengajari anak-anak cara menghadapi situasi berbahaya.'),
(6, 'RUN', '5fe58efeca170.jfif', 'ACTION HOROR', '5fe58efeca4b7.mp4', '2017', 'ARGENTINA', 'diane membesarkan chloe seorang diri dan mengontrol dengan ketat semua aktivitas yang dilakukannya  hal ini dilakukan diane karena chole lahir secara prematur dan menderita banyak penyakit sejak kecil mulai dari asma, jantung, dan kelumpuhan. chloe juga sangat bergantung pada banyak obat untuk meringankan semua gejala penyakitnya. \r\n\r\nsuatu ketika, chloe merasa sangsi saat ibunya memberi obat baru sebuah pil berwarna hijau. dalam kemasan obat tersebut chloe tak sengaja melihat ada sebuah label bertuliskan trigoxin di bawah label namanya. merasa penasaran, chloe pun mencoba mencarinya di internet tetapi batal karena diane memutuskan jaringan internet di rumahnya. \r\n\r\ntak ingin menyerah, chloe lantas mengajak ibunya pergi ke bioskop untuk menonton film. chloe lalu berpura-pura pergi ke toilet padahal sebetulnya ia pergi ke apotek terdekat untuk menanyakan tentang obat tersebut. dari penjelasan apoteker terkuaklah fakta pil hijau itu adalah obat pelemas untuk anjing dan jika dikonsumsi oleh manusia bisa menyebabkan kelumpuhan. \r\n\r\nsejak saat itu, chloe mulai curiga ibunya sengaja membuatnya sakit tapi belum bisa menemukan apa motifnya hingga tega melakukan hal keji pada puterinya sendiri.'),
(7, 'ARTEMIS FOWL', '5fe58f74a8ff3.jfif', 'ACTION COMEDY', '5fe58f74a9343.mp4', '2010', 'AMERIKA', 'film ini menceritakan tentang artemis fowl ii, seorang dalang kriminal irlandia muda yang berusaha mencari keberadaan peri. ia ingin mencari peri demi mengembalikan kekayaan keluarganya. \r\n\r\nfowl adalah anak berusia 12 tahun. ia juga ingin menyelamatkan ayahnya yang juga seorang penjahat.\r\n\r\nbersama para pelayan dan pengawal kepercayaannya yang bernama butler, artemis fowl ii mencari keberadaan peri yang dipercaya dapat membuatnya terhubung dengan sang ayah serta merampok para peri.'),
(8, 'SINISTER', '5fe58fd4c1ce0.jfif', 'HOROR', '5fe58fd4c20cb.mp4', '2016', 'AMERICA', 'film sinister berkisah tentang seorang penulis novel kriminal bernama ellison oswalt (ethan hawke) yang tengah mengalami stagnasi dalam kariernya sebagai penulis. ellison pun memutuskan untuk pindah ke rumah yang dulunya pernah menjadi lokasi pembunuhan untuk menemukan ide novel barunya.\r\n\r\nbelum lama menempati rumah tersebut, ellison dan keluarga mulai merasakan banyak kejadian aneh. ellsion yang membutuhkan inspirasi pun meyakinkan keluarganya untuk tetap tinggal di rumah tersebut.\r\n\r\nsuatu hari, ellison pergi ke loteng rumah dan menemukan proyektor beserta beberapa gulungan film. ellison pun memutuskan menonton film tersebut dan mendapati isinya berupa seri rekaman pembunuhan keluarga. anehnya, semua keluarga dibunuh secara sadis oleh salah satu anak dari keluarga tersebut.\r\n\r\nusai menonton, ellison mulai ketakutan karena teror di rumahnya terasa semakin menjadi-jadi. hantu anak-anak yang menjadi pelaku pembunuhan dalam film yang ellison tonton pun mulai mengganggunya. pada malam hari, ellsion bahkan melihat proyektor yang menyala sendiri.\r\n\r\nellison yang semakin ketakutan lalu membakar film-film tersebut. ellison juga mengajak keluarganya untuk pindah ke rumah lain. sayangnya, kepindahan ellison ini tidak menyudahi teror yang tetap mengintai mereka.'),
(9, 'MULAN', '5fe5903a00257.jfif', 'ACTION', '5fe5903a006c5.mp4', '2017', 'KOREA', 'film mulan bercerita tentang perjuangan wanita yang menggantikan ayahnya untuk ikut wajib militer (wamil) dengan menyamar sebagai laki-laki. film ini diperankan oleh aktris cantik yifei liu.\r\n\r\ndalam film ini ia menyamar sebagai kstarua pria untuk menyelamatkan ayahnya. kekaisaran china mempunyai kebijakan wamil bagi setiap pria untuk tergabung ke tentara kerajaan. \r\n\r\nayah mulan sendiri merupakan seorang prajurit yang terhormat, namun saat itu ia telah jatuh sakit sehingga tidak mampu mengikuti wamil. keluarga mulan pun tidak memiliki laki-laki lain lagi selain ayahnya, akhirnya mulan menyamar menjadi laki-laki dan menggantikan ayahnya mengikuti wamil.\r\n\r\nnamun, lika-liku untuk menggantikan sang ayah sangat banyak sekali. akhirnya identitas mulan pun terbongkar, terbongkarnya penyamaran yang dilakukan mulan menyebabkan dirinya terancam bahaya.'),
(10, 'FREE GUY', '5fe5908d93b64.jfif', 'ACTION COMEDY', '5fe5908d95f07.mp4', '2019', 'AMERICA', 'film free guy bercerita tentang seorang npc, guy yang merupakan teller bank di permainan free city. berkat sebuah kode yang dimasukan dalam game oleh programmer mily dan keys.\r\n\r\nguy menjadi sadar akan dunianya yang ternyata hanya sebuah game, lalu guy berjuang untuk menjadi seorang pahlawan di dalam game free city tersebut.'),
(11, 'HIT AND RUN', '5fe5912b4dba9.jpg', 'COMEDY', '5fe5912b4defd.mp4', '2017', 'KOREA', 'film hit and run squad berkisah tentang aksi satuan polisi yang berupaya menangkap seorang pengusaha korup. \r\n\r\neun shi yeon (gong hyo jin) adalah polisi wanita kompeten yang selalu gigih dalam menangkap penjahat. shi yeon awalnya ditugaskan di unit investigasi internal yang sedang berusaha memburu pengusaha korup bernama jung jae cheol (jo jung suk). jo jung suk merupakan mantan pembalap formula one yang beralih profesi menjadi pengusaha. \r\n\r\ndalam upaya awal menangkap jae cheol, shi yeon mengalami kegagalan karena kurangnya bukti. bahkan akibat hal ini, ia pun diturunkan ke satuan lain, yaitu satuan hit &amp; run yang menangani kasus tabrak lari. meski tidak lagi bertugas di unit investigasi, shi yeon tetap ingin menjebloskan jae cheol ke penjara.'),
(12, 'ONWARD', '5fe591b8e604a.jpg', 'COMEDY', '5fe591b8e645e.mp4', '2018', 'AMERICA', 'animasi ini bercerita tentang dunia sihir. dahulu kala, banyak sekali keajaiban dan banyak pula orang-orang memiliki kemampuan sihir. namun seiring dengan perkembangan zaman, banyak hal telah berubah. moda transportasi semakin canggih dan maju, pesawat salah satu terobosannya. \r\n\r\ntidak hanya hal-hal publik, kegiatan setiap keluarga juga berbeda. keluarga lightfoot misalnya, kini laurel lightfoot sangat menyukai fitnes. dia memiliki anak bernama ian dan barley. \r\n\r\nsuaminya telah meninggal beberapa tahun yang lalu. walaupun tanpa ayah, mereka menjalani hidup dengan bahagia dan saling akrab satu sama lain. hingga suatu hari, saat ian yang merupakan anak kedua berumur 16 tahun, ibunya memberikan barang kepada ian. \r\n\r\ndengan antusias mereka membuka hadiah itu. saat dibuka, ternyata di dalamnya terdapat tongkat seperti tongkat sihir. selain tongkat ada kertas berisi petunjuk. dalam petunjuk tersebut terlihat cara pakai dan kegunaan tongkat. secara singkatnya, dengan mengikuti petunjuk dalam kertas, tongkat itu bisa membawa sang ayah kembali hidup.'),
(14, 'DUNKIRK', '5fe708ad59a2a.jfif', 'ACTION', '5fe708ad5a03e.mp4', '2010', 'MEXICO', 'dunkirk sendiri merupakan operasi militer yang terjadi di dunkirk, perancis. operasi militer ini dikenal dengan nama the battle of dunkirk yang terjadi saat perang dunia ke-2 yaitu mulai 26 mei hingga 4 juni 1940.\r\n\r\npada filmnya, diceritakan terdapat lebih dari 400 ribu tentara inggris dan perancing pada saat perang dunia ke-2 yang terlantar di dunkirk. mereka menantikan keajaiban adanya aksi penyelamatan atau sampai mereka mati.\r\n\r\nuniknya, dalam film ini dikisahkan dari tiga sudut pandang, yaitu the mole (darat), the sea (laut), dan the air (udara). masing-masing sudut juga memiliki rentang waktu yang berbeda satu sama lain, yaitu 1 minggu untuk di darat, 1 hari untuk di laut dan 1 jam untuk udara.'),
(15, 'THE MONSTER', '5fe7091f397da.jpg', 'HOROR', '5fe7091f39bcc.mp4', '2016', 'PERU', 'seorang ibu (kathy) yang sedang dalam mengantar buah hatinya (lizzy) untuk bertemu mantan suaminya (ayah dari putrinya). berdua mereka menempuh perjalanan jauh menggunakan mobil, ketika malam di tengah hutan yang hujan mereka mengalami sebuah kecelakaan, disebabkan karena mobil oleng menabrak seekor anjing yang berhenti ditengah jalan.\r\n\r\nberuntung mereka masih selamat, meskipun lizzy mendapatkan luka ringan. namun mobil yang mereka kendarai tidak bisa digunakan karena ban mobil rusak. mereka terjebak di tengah hutan dan mencari pertolongan. polisi datang membantu memperbaiki mobil, namun nahas polisi tersebut menghilang ditangan makhluk misterius. kathy pun diculik, tinggal lizzy harus bertahan dari serangan monster tersebut sambil mencari ibunya.'),
(16, 'THE PRODIGY', '5fe7098d49054.jpg', 'HOROR', '5fe7098d494fa.mp4', '2019', 'AMERICA', 'kisah the prodigy sendiri berfokus pada tokoh sarah (taylor schilling). seorang mamah-mamah muda caem. yang anak laki-lakinya, miles (jackson robert scott), menunjukkan perilaku yang cukup mengganggu: semacam dikuasai roh jahat alias kekuatan supranatural.\r\n\r\nkhawatir akan keselamatan miles, sarah pun bergulat dengan naluri keibuannya untuk melindungi putranya tadi. dia menyelidiki apa, atau siapa, yang menyebabkan perilaku anaknya berubah menjadi aneh.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(8) NOT NULL,
  `username` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `email`, `password`) VALUES
(1, 'hafidh', 'hafidh@gmail.com', '$2y$10$pAp5T4crWs2MuUxaiz1v1.eq/RJzcqVv99tfiwaSfsIq6Cv7MsefG'),
(2, 'taufik', 'taufik@gmail.com', '$2y$10$yXqFi3f493G5QUys9CnFCOGdompur89rYvJ5DlaZqr21MqzBVTqAG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_film`
--
ALTER TABLE `tb_film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_film`
--
ALTER TABLE `tb_film`
  MODIFY `id_film` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
