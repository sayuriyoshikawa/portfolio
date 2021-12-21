-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 11:38 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fswd14_cr13_bigeventssayuriyoshikawa`
--
CREATE DATABASE IF NOT EXISTS `fswd14_cr13_bigeventssayuriyoshikawa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fswd14_cr13_bigeventssayuriyoshikawa`;

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20211203174606', '2021-12-03 18:46:14', 581);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `time`, `description`, `picture`, `capacity`, `email`, `phone`, `address`, `url`, `type`) VALUES
(2, 'Modigliani. The Primitivist Revolution', '2022-01-23 10:00:00', 'The ALBERTINA Museum will honor Amedeo Modigliani with a major retrospective to mark the one hundredth anniversary of his death.', 'https://cdn.pixabay.com/photo/2016/03/27/16/23/woman-1283009_960_720.jpg', 15, 'info@albertina.at', '123451234', 'Albertinaplatz 1 1010 Wien', 'www.albertina.at', 'arts'),
(4, 'Human Rights Day event', '2021-12-10 00:00:00', 'All States and interested organisations were invited by the UN General Assembly in 1950 to observe 10 December as Human Rights Day. The Day marks the anniversary of the Assembly\'s adoption of the Universal Declaration of Human Rights in 1948.', 'https://cdn.pixabay.com/photo/2016/06/13/04/40/gay-1453594_960_720.jpg', 1000, 'humanright@mail.com', '12345678', 'Palais des Nations CH-1211 Geneva 10, Switzerland', 'https://www.un.org/events/humanrights/', 'other'),
(5, 'Gentle Yoga  for Joy and Health', '2021-12-10 15:00:00', 'Simple and accessible breathing exercises, stretches, and guided meditation for all bodies, minds, and spirits. No experience necessary.', 'https://cdn.pixabay.com/photo/2017/01/20/11/44/yoga-1994667_960_720.jpg', 50, 'gentleyoga@mail.com', '01234567', 'online', 'https://www.joycewu.yoga/', 'health'),
(7, 'Wiener Philharmoniker', '2021-12-31 22:00:00', 'These concerts not only delight the audiences in the Musikverein in Vienna, but also enjoy great international popularity through the worldwide television broadcast, which now reaches over 90 countries.', 'https://cdn.pixabay.com/photo/2015/01/09/17/34/opera-594592_960_720.jpg', 1000, 'tickets@musikverein.at', '12341234', 'Grosser Saal Musikvereinsplatz 1 1010 Wien', 'www.musikverein.at', 'music'),
(8, 'Mozart and his Magic Flute', '2022-02-24 00:00:00', 'W.A. Mozart himself – as a marionette – presents humorous and interesting facts: A mix of anecdotes from Mozart’s life, background information and the wonderful music of the Magic Flute.', 'https://cdn.pixabay.com/photo/2020/11/08/17/03/music-5724419_960_720.jpg', 500, 'office@marionettentheater.at', '431173247', 'Marionette Theater at Schönbrunn Palace Schloss Schönbrunn, Hofratstrakt 1130 Wien', 'www.marionettentheater.at', 'music'),
(9, 'The Lipizzans\' Performances', '2022-01-11 10:00:00', 'The world-famous performances by the Lipizzans – the Ballet of the White Stallions – take place in the baroque Winter Riding School at Hofburg Palace, built under\r\nCharles VI. in 1729 to 1735 - the most beautiful riding hall in the world.', 'https://cdn.pixabay.com/photo/2017/09/07/11/04/sommerfest-2724667_960_720.jpg', 100, 'office@srs.at', '345345345', 'Spanish Riding School, Michaelerplatz 1, 1010 Wien', 'www.srs.at', 'other'),
(10, 'CATS in Wiener Ronacher', '2021-12-12 00:00:00', 'CATS triumphantly swept the world straight after its première in London, revolutionising the musical world.', 'https://www.musicalvienna.at/media/image/original/19963.jpg', 500, 'info@vbw.at', '41588301010', 'VBW Vereinigte Bühnen Wien GmbH Linke Wienzeile 6 A - 1060 Wien', 'https://www.musicalvienna.at/', 'music'),
(11, 'Towards a healthier', '2022-04-20 08:00:00', 'The EU Sport Forum is the European Commission\'s premiere event in support of expanding sporting activities and programmes across Europe.', 'https://cdn.pixabay.com/photo/2014/10/14/20/24/football-488714_960_720.jpg', 50, 'sports@mail.com', '4564567', 'online', 'https://vimeo.com/557668525/0611f4d635', 'sport'),
(12, 'MARATHON DES ALPES-MARITIMES', '2022-03-10 09:00:00', 'The French Riviera Marathon is an IAAF Bronze Label event and the second largest marathon in France. The French Riviera has an average of 300 days of sunshine per year and 115km of coastline and beaches.', 'https://cdn.pixabay.com/photo/2015/09/09/18/08/race-932254_960_720.jpg', 1000, 'fran@runfuntravel.com', '1300 383 690', '4 Pl. de la Gare, 06400 Cannes, French', 'https://www.runfuntravel.com/event.php?e=13', 'sport'),
(13, 'Para Volley Europe', '2022-02-23 10:00:00', 'The European Volleyball Confederation (CEV) has confirmed the addition of a men’s 1-star event in Warsaw, Poland on 2-5 September to the FIVB World Tour 2021 calendar.', 'https://cdn.pixabay.com/photo/2016/08/24/19/54/volleyball-1617874_960_720.jpg', 200, 'mail@paravolley.eu', '45645645', 'Rue Dante 32-22, 1070 Anderlecht, Belgium', 'https://www.paravolley.eu/events/', 'sport'),
(14, 'The Carnival Of Venice', '2022-02-26 00:00:00', 'There is a water parade, competitions inspired by old Venetian traditions, a grand ball, and a popularity contest for best mask design.', 'https://cdn.pixabay.com/photo/2014/08/06/11/51/woman-411494_960_720.jpg', 2000, 'carnival@mail.com', '567567123', 'Calle Larga S. Marco, 374, 30124 Venezia VE, Italy', 'https://pickvisa.com/blog/the-carnival-of-venice', 'festival'),
(15, 'Oktoberfest', '2022-09-18 18:00:00', 'One of the top festivals of Europe of beer, Oktoberfest Germany is Bavaria’s most important period of celebration and one of the top festivals in Europe in September.', 'https://cdn.pixabay.com/photo/2016/06/03/21/44/folk-festival-1434523_960_720.jpg', 1000, 'october@mail.com', '67878678', 'Nymphenburger Str. 2, 80335 München, Germany', 'https://www.oktoberfest.de/en', 'festival'),
(16, 'La Tomatina Festival', '2022-08-25 16:00:00', 'Held in the town of Buñol, La Tomatina is one of the biggest European food festivals. It is all about the food fight, especially involving tomatoes.', 'https://cdn.pixabay.com/photo/2011/03/16/16/01/tomatoes-5356_960_720.jpg', 10000, 'tomato@mail.com', '555555555', 'Carrer Riu Túria, 3, 46530 Puçol, Valencia, Spain', 'https://www.latomatinatours.com/', 'festival'),
(17, 'San Fermín', '2016-01-01 00:00:00', 'The running of the bulls is the main attraction in this famous celebration that transforms Pamplona into an endless party.\r\n\r\nThe city of Pamplona is world-famous for its fiestas of San Fermín Festival.', 'https://cdn.pixabay.com/photo/2018/08/06/11/36/sanfermin-3587336_960_720.jpg', 30000, 'san@mail.com', '34555345', 'Kalea Calatayud Aita, 21, Bajo, 31003 Pamplona, Navarra, Spain', 'https://www.sanfermin.com/es/', 'festival'),
(18, 'International Conference on Educational', '2022-12-27 00:00:00', 'The International Research Conference is a federated organization dedicated to bringing together a significant number of diverse scholarly events for presentation within the conference program.', 'https://cdn.pixabay.com/photo/2016/06/03/13/57/digital-marketing-1433427_960_720.jpg', 50, 'ed@mail.com', '890909090', 'Walton Hall, Kents Hill, Milton Keynes MK7 6AA, UK', 'https://waset.org/educational-software-and-technology-enhanced-learning-conference-in-december-2021-in-vienna', 'education'),
(19, 'Strategic Management', '2022-03-24 00:00:00', 'The International Research Conference is a federated organization dedicated to bringing together a significant number of diverse scholarly events for presentation within the conference program.', 'https://cdn.pixabay.com/photo/2021/08/17/06/31/business-6552127_960_720.jpg', 50, 'ed@mail.com', '41588301010', 'Walton Hall, Kents Hill, Milton Keynes MK7 6AA, UK', 'https://waset.org/strategic-management-in-higher-education-conference-in-december-2021-in-vienna', 'education'),
(20, 'Education Media Design and Technology', '2022-02-23 07:00:00', 'The International Research Conference is a federated organization dedicated to bringing together a significant number of diverse scholarly events for presentation within the conference program.', 'https://cdn.pixabay.com/photo/2021/03/29/18/57/social-media-6134993_960_720.png', 50, 'ed@mail.com', '4564567', 'Walton Hall, Kents Hill, Milton Keynes MK7 6AA, UK', 'https://waset.org/education-media-design-and-technology-conference-in-december-2021-in-vienna', 'education'),
(21, 'Conquer Overthinking', '2022-01-01 10:00:00', 'In this free and live workshop, discover and practice the behavioral science-backed framework to make efficient and confident decisions without losing your sleep.', 'https://cdn.pixabay.com/photo/2017/03/26/21/54/yoga-2176668_960_720.jpg', 30, 'health@mail.com', '2345678', 'Doktor Yoga Studio,  Passauer Pl. 2, 1010 Wien', 'https://www.eventbrite.com/e/conquer-overthinking-and-make-lasting-changes-tickets-161712752195?aff=ebdssbdestsearch&keep_tld=1', 'health'),
(22, 'Let\'s Meditate', '2021-01-10 08:00:00', '“The only true wisdom is in knowing that you know nothing”', 'https://cdn.pixabay.com/photo/2017/09/05/12/31/meditation-2717462_960_720.jpg', 20, 'meditate@mail.com', '123123', 'Palais des Nations CH-1211 Geneva 10, Switzerland', 'https://sahajayogareview.wordpress.com/', 'health'),
(23, 'MQ Vienna Fashion Week', '2022-05-04 00:00:00', 'MQ Vienna Fashion Week will be erecting its fashion marquee in front of Vienna\'s MuseumsQuartier (MQ). Fashions shows will be held daily again from September 13 to 18.', 'https://cdn.pixabay.com/photo/2016/11/21/16/55/high-heels-1846436_960_720.jpg', 500, 'office@mqw.at', '0000000000', 'MQ, Museumsplatz 1, 1070 Wien', 'http://www.mqw.at/', 'fashion'),
(24, 'PARIS FASHION WEEK', '2022-08-07 15:00:00', 'Paris Fashion Week is back from Monday September 27 to Tuesday October 5, 2021 for designers to show their Spring/Summer 2022 Women Ready-to-Wear collections.', 'https://cdn.pixabay.com/photo/2018/10/15/20/14/fashion-3749869_960_720.jpg', 500, 'fashion@mail.com', '222222222222', 'Showroom Fashion, 5 Rue Coq Héron, 75001 Paris, French', 'https://www.sortiraparis.com/', 'fashion'),
(25, 'EU Fashion Match', '2022-01-27 11:00:00', 'Even more fashion success and growing runways with EU Fashion Match Amsterdam\r\nWelcome to the virtual EU Fashion Match Amsterdam 10.0 Following the footsteps of previously successful events, Enterprise Europe Network (EEN) is delighted to invite you to the 10th EU Fashion Match Amsterdam on Monday 25th,  Tuesday 26th and 27th of January 2021.', 'https://cdn.pixabay.com/photo/2020/03/06/01/52/high-fashion-4905868_960_720.jpg', 1000, 'fashion@mail.com', '222222222222', 'Fashion Factory, Zamenhofstraat 108, office 102, 1022 AG Amsterdam, Netherlands', 'https://events.b2match.com/events/fashionmatch-10thedition', 'fashion'),
(26, 'Wiener Festwochen', '2022-01-11 10:00:00', 'When it started in the 1950s, the Wiener Festwochen laid several important foundations for creating a new image for Vienna, both nationally and internationally.', 'https://cdn.pixabay.com/photo/2021/08/11/16/06/mountain-6538890_960_720.jpg', 300, 'arts@mail.com', '12345678', 'Wiener Festival, Lehárgasse 11, 1060 Wien', 'https://www.festwochen.at/home', 'arts'),
(27, 'Athens Digital Arts', '2022-01-31 11:00:00', 'Athens Digital Arts Festival celebrates digital culture through an annual gathering bringing together a global community of artists and audiences.', 'https://cdn.pixabay.com/photo/2017/07/01/19/48/background-2462434_960_720.jpg', 50, 'arts@mail.com', '12345678', 'Athens Museum, Dionysiou Areopagitou 15, Athina 117 42 Greece', 'https://www.festwochen.at/home', 'arts');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
