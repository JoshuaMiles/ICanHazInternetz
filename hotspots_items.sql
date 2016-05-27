-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: localhost    Database: hotspots
-- ------------------------------------------------------
-- Server version	5.7.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `NAME` varchar(36) NOT NULL,
  `ADDRESS` varchar(107) NOT NULL,
  `SUBURB` varchar(20) NOT NULL,
  `POSTCODE` int(11) NOT NULL,
  `LATITUDE` decimal(12,8) NOT NULL,
  `LONGITUDE` decimal(11,7) NOT NULL,
  PRIMARY KEY (`NAME`),
  UNIQUE KEY `NAME_UNIQUE` (`NAME`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES ('7th Brigade Park','Delaware St','Chermside',4032,-27.37893000,153.0446100),('Annerley Library','450 Ipswich Road','Annerley',4103,-27.50942285,153.0333218),('Ashgrove Library','87 Amarina Avenue','Ashgrove',4060,-27.44394629,152.9870981),('Banyo Library','284 St Vincents Road','Banyo',4014,-27.37396641,153.0783234),('Booker Place Park','Birkin Rd & Sugarwood St','Bellbowrie',4070,-27.56353000,152.8937200),('Bracken Ridge Library','Corner Bracken and Barrett Street','Bracken Ridge',4017,-27.31797261,153.0378735),('Brisbane Botanic Gardens','Mt Coot-tha Rd','Toowong',4066,-27.47724000,152.9759900),('Brisbane Square Library','266 George Street','Brisbane',4000,-27.47091173,153.0224598),('Bulimba Library','Corner Riding Road & Oxford Street','Bulimba',4171,-27.45203086,153.0628242),('Calamvale District Park','Formby & Ormskirk Sts','Calamvale',4116,-27.62152000,153.0366500),('Carina Library','Corner Mayfield Road & Nyrang Street','Carina',4152,-27.49169314,153.0912127),('Carindale Library','Corner Carindale Street  & Banchory Court','Carindale',4152,-27.50475928,153.1003965),('Carindale Recreation Reserve','Cadogan and Bedivere Sts','Carindale',4152,-27.49700000,153.1110500),('Chermside Library','375 Hamilton  Road','Chermside',4032,-27.38560320,153.0349028),('City Botanic Gardens','Alice Street','Brisbane City',4000,-27.47561000,153.0300500),('Coopers Plains Library','107 Orange Grove Road','Coopers Plains',4108,-27.56510509,153.0403183),('Corinda Library','641 Oxley Road','Corinda',4075,-27.53880237,152.9809091),('D.M. Henderson Park','Granadilla St','MacGregor',4109,-27.57745000,153.0760300),('Einbunpin Lagoon','Brighton Rd','Sandgate',4017,-27.31947000,153.0682200),('Everton Park Library','561 South Pine Road','Everton park',4053,-27.40533360,152.9904205),('Fairfield Library','Fairfield Gardens Shopping Centre, 180 Fairfield Road','Fairfield',4103,-27.50909038,153.0259709),('Forest Lake Parklands','Forest Lake Bld','Forest Lake',4078,-27.62020000,152.9662500),('Garden City Library','Garden City Shopping Centre, Corner Logan and Kessels Road','Upper Mount Gravatt',4122,-27.56244221,153.0809183),('Glindemann Park','Logan Rd','Holland Park West',4121,-27.52552000,153.0692300),('Grange Library','79 Evelyn Street','Grange',4051,-27.42531193,153.0174728),('Gregory Park','Baroona Rd','Paddington',4064,-27.46700000,152.9998100),('Guyatt Park','Sir Fred Schonell Dve','St Lucia',4067,-27.49297000,153.0018700),('Hamilton Library','Corner Racecourt Road and Rossiter Parade','Hamilton',4007,-27.43790137,153.0642227),('Hidden World Park','Roghan Rd','Fitzgibbon',4018,-27.33971701,153.0349810),('Holland Park Library','81 Seville Road','Holland Park',4121,-27.52292286,153.0722921),('Inala Library','Inala Shopping centre, Corsair Ave','Inala',4077,-27.59828574,152.9735217),('Indooroopilly Library','Indrooroopilly Shopping centre, Level 4, 322 Moggill Road','Indooroopilly',4068,-27.49764287,152.9736471),('Kalinga Park','Kalinga St','Clayfield',4011,-27.40666000,153.0521700),('Kenmore Library','Brookfield Road','Kenmore',4069,-27.50592852,152.9386437),('King Edward Park','Turbot St and Wickham Tce','Brisbane',4000,-27.46589000,153.0240600),('King George Square','Ann & Adelaide Sts','Brisbane',4000,-27.46843000,153.0242200),('Mitchelton Library','37 Helipolis Parada','Mitchelton',4053,-27.41704165,152.9783402),('Mt Coot-tha Botanic Gardens Library','Administration Building, Brisbane Botanic Gardens (Mt Coot-tha), Mt Coot-tha Road','Toowong',4066,-27.47529908,152.9760412),('Mt Gravatt Library','8 Creek Road','Mt Gravatt',4122,-27.53855482,153.0802628),('Mt Ommaney Library','171 Dandenong Road','Mt Ommaney',4074,-27.54824198,152.9378099),('New Farm Library','135 Sydney Street','New Farm',4005,-27.46736574,153.0495841),('New Farm Park','Brunswick Street','New Farm',4005,-27.47046000,153.0522300),('Nundah Library','1 Bage Street','Nundah',4012,-27.40125908,153.0583751),('Oriel Park','Cnr of Alexandra & Lancaster Rds','Ascot',4007,-27.42928000,153.0576800),('Orleigh Park','Hill End Tce','West End',4101,-27.48995000,153.0032600),('Post Office Square','Queen & Adelaide Sts','Brisbane',4000,-27.46735000,153.0273500),('Rocks Riverside Park','Counihan Rd','Seventeen Mile Rocks',4073,-27.54153000,152.9591300),('Sandgate Library','Seymour Street','Sandgate',4017,-27.32060523,153.0704927),('Stones Corner Library','280 Logan Road','Sunnybank Hills',4120,-27.49803575,153.0436550),('Sunnybank Hills Library','Corner Compton and Calam Road','Sunnybank Hills',4109,-27.61092530,153.0550706),('Teralba Park','Pullen & Osborne Rds','Everton Park',4053,-27.40286000,152.9805900),('Toowong Library','Toowong Village Shopping Centre, Sherwood Road','Toowong',4066,-27.48505116,152.9925091),('West End Library','178 - 180 Boundary Street','West End',4101,-27.48245078,153.0120763),('Wynnum Library','Wynnum Civic Centre, 66 Bay Terrace','Wynnum',4178,-27.44244894,153.1731968),('Zillmere Library','Corner Jennings Street and Zillmere Road','Zillmere',4034,-27.36014232,153.0407898);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-24 11:08:29
