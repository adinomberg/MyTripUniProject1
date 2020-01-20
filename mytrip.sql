-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 10:26 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mytrip`
DROP DATABASE IF EXISTS mytrip;
CREATE DATABASE IF NOT EXISTS mytrip;
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment_lists`
--
DROP TABLE IF EXISTS mytrip.`equipment_lists`;
CREATE TABLE IF NOT EXISTS mytrip.`equipment_lists` (
  `EL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Destination` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL DEFAULT 'All Categories',
  `Season` varchar(100) NOT NULL DEFAULT 'All Year Round',
  PRIMARY KEY (`EL_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `equipment_lists`
--

INSERT INTO mytrip.`equipment_lists` (`EL_ID`, `Name`, `Destination`, `Category`, `Season`) VALUES
(1, 'Stav''s list', 'Hungary', 'City Trip', 'Winter'),
(2, 'Lital''s list', 'Israel ', 'Relaxing Vacation', 'Summer'),
(3, 'Adi''s list', 'Portugal', 'Adventure trip', 'Spring '),
(4, 'Barak''s list', 'England', 'City Trip', 'Fall'),
(5, 'Tidhar''s list', 'India', 'Adventure trip', 'Summer');

-- --------------------------------------------------------

--
-- Table structure for table `favorite_activities`
--
DROP TABLE IF EXISTS mytrip.`favorite_activities`;
CREATE TABLE IF NOT EXISTS mytrip.`favorite_activities` (
  `U_Email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `A_ID` int(11) NOT NULL,
  PRIMARY KEY (`U_Email`,`A_ID`),
  KEY `FK_Activites` (`A_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorite_activities`
--

INSERT INTO mytrip.`favorite_activities` (`U_Email`, `A_ID`) VALUES
('litalmen@post.bgu.ac.il', 1),
('tidharsa@post.bgu.ac.il', 1),
('barakpinch@gmail.com', 2),
('litalmen@post.bgu.ac.il', 2),
('tidharsa@post.bgu.ac.il', 2),
('stba@post.bgu.ac.il', 3),
('tidharsa@post.bgu.ac.il', 4),
('adinom@post.bgu.ac.il', 5),
('litalmen@post.bgu.ac.il', 5),
('tidharsa@post.bgu.ac.il', 5),
('stba@post.bgu.ac.il', 6),
('adinom@post.bgu.ac.il', 7),
('litalmen@post.bgu.ac.il', 7),
('tidharsa@post.bgu.ac.il', 7),
('barakpinch@gmail.com', 8),
('stba@post.bgu.ac.il', 8),
('adinom@post.bgu.ac.il', 9),
('tidharsa@post.bgu.ac.il', 9),
('barakpinch@gmail.com', 10);

-- --------------------------------------------------------

--
-- Table structure for table `favorite_equipment_lists`
--
DROP TABLE IF EXISTS mytrip.`favorite_equipment_lists`;
CREATE TABLE IF NOT EXISTS mytrip.`favorite_equipment_lists` (
  `U_Email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `EL_ID` int(11) NOT NULL,
  PRIMARY KEY (`U_Email`),
  KEY `FK_Lists` (`EL_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorite_equipment_lists`
--

INSERT INTO mytrip.`favorite_equipment_lists` (`U_Email`, `EL_ID`) VALUES
('stba@post.bgu.ac.il', 1),
('litalmen@post.bgu.ac.il', 2),
('adinom@post.bgu.ac.il', 3),
('barakpinch@gmail.com', 4),
('tidharsa@post.bgu.ac.il', 5);

-- --------------------------------------------------------

--
-- Table structure for table `hiking_trips`
--
DROP TABLE IF EXISTS mytrip.`hiking_trips`;
CREATE TABLE IF NOT EXISTS mytrip.`hiking_trips` (
  `H_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Destination` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL DEFAULT 'All Categories',
  `Season` varchar(50) NOT NULL DEFAULT 'All Year Round',
  `Trail_type` varchar(50) NOT NULL,
  `Difficulty` varchar(50) NOT NULL,
  `Extension` varchar(20) NOT NULL,
  `Time_average` varchar(20) NOT NULL,
  `Trail_info` text NOT NULL,
  `Img` text NOT NULL,
  PRIMARY KEY (`H_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `hiking_trips`
--

INSERT INTO mytrip.`hiking_trips` (`H_ID`, `Name`, `Destination`, `Category`, `Season`, `Trail_type`, `Difficulty`, `Extension`, `Time_average`, `Trail_info`, `Img`) VALUES
(1, 'Pedra Queimada - Sao Miguel', 'Portugal', 'Adventure trip', 'All Year Round', 'Circular', 'Medium', '6.6 km ', '2h30', 'This small circular route begins in Largo de Santo Antonio, in the village of Maia. Head South along a dirt road known as Pedra Queimada and follow the waymarks until you reach the regional road.\n\nContinue by walking parallel to the road, enjoying the view over the North Coast, village of Maia, Ponta Formosa and Ponta do Cintrao.\n\nProceed along the trail downwards by the Lajinha way, among agricultural fields until you reach the road again - Rua do Rosario - with the fountain Velha on your right (spring water).\n\nContinue towards the centre until you arrive at the bathing area of Calhau da Areia - by taking the connection to PR 27 SMI Praia da Viola. Follow the waymarks passing the viewpoint of Melo Nunes where it is possible to access a rocky area.\n\nThe trail continues along the coast, passing the viewpoint of Frade. Along the way you will go through ETAR and cross the bridge over Ribeira da Cruz. Further ahead there is a detour to the right that will take you to natural swimming pools.\n\nKeep on going on the dirt road until the regional road and turn left towards the centre of the village. Along the road there are several points of interest such as the Tobacco Museum and Solar do Lalem. Continue until you reach to the start of the trail. ', '../imgs/pedra-queimada.jpg'),
(2, 'Laguna Esmeralda', 'Argentina', 'Adventure trip', 'All Year Round', 'Circular', 'Easy', '9.3 km', '3h21', 'We walk through dense young forest, which was managed until the mid 20th century. We come soon to a wide path, which is probably thought for dogsled, and we go left. Wild parrots, Cachanas, are screeching over our heads. At the next sign that marks the Laguna, we leave the forest and we get our first nice view of the Sierra Alvear. On the right, we find the way to the Cafeteria, but we turn left and cross a stream on a wide wooden bridge. After a bit of walk through the forest, we reach a wide high moor. The trail becomes always more and more swampier, branches and bridges help to cross the worst passages. It is now steeper and goes through the old Lenga forest. From the next high moor on, the road goes along the rushing glacial stream. At the end of the valley, a long rocky wall blocks the flow of the river and behind you find the dammed up Laguna Esmeralda. The view becomes more beautiful step by step. After about 1,5 hours, there is the sea below us. On the beach, you find amazing places for a picnic. Those who want to walk more, could follow the path on the right from the Laguna. After 2 hours of walking on that route, you will reach the Glaciar del Albino. The route becomes tough always more and more difficult.', 'https://media-cdn.tripadvisor.com/media/photo-s/05/a7/7a/ac/laguna-esmeralda.jpg'),
(3, 'Gergeti Glacier Hike', 'Georgia', 'Adventure trip', 'Spring', 'One Way', 'Hard', '20.4 km', '8h', 'The best place to start is Didube bus station in Tbilisi. As soon as you leave the subway, you will be approached by taxi drivers offering a ride to Kazbegi. They usually charge 100-120 GEL, the best price we were ever able to haggle was 75 GEL for five people. The main advantage of a taxi is the possibility to make breaks at various sights along the highway such as Ananuri fortress, Friendship monument or travertines behind Jvari pass. Road itself is magnificent, so it''s worth it to pay a taxi, at least for the first time. \nIf you are not interested in a taxi, you can look for a marshrutka - they depart when full from 8. am till late afternoon. The trip takes 3 hours and costs 10 GEL.', 'http://someforeignguy.com/wp-content/uploads/2012/09/g2.jpg'),
(4, 'Durch das Tal der Seelen', 'Bolivia', 'Adventure trip ', 'Summer', 'One Way', 'medium', '4 km', '3h', 'Spectacularly situated on the southern foothills of the Royal Cordillera, La Paz is ideal for a comfortable acclimatization stay. Several tours are available, such as the Muela del Diablo or the Palca gorge. The tour presented here leads in a short time to 4300 m high, is therefore only suitable for height-adjusted. The view leaves nothing to be desired and is hardly surpassed even by tours in the royal cordillera itself.', 'https://www.noa.network/smartedit/images/detail/hp_val_dsc7615.jpg'),
(5, 'Auf den Rainbow Mountain', 'Peru', 'Adventure trip', 'All Year Round', 'One Way', 'medium', '15.1 km', '4h45', 'Since the Rainbow Mountain 2015 was opened to tourists, the tour has quickly become a must-do in Peru. The view over the colorful mountains is a real highlight on every trip to South America.\n\nIf you are unlucky, it can happen that you can not see the colorful colors because of snowfall. However, this happens only very rarely.\n\nAltogether about 700 meters of altitude are climbed and then descended again. At the highest point at about 5100 m, you have a wonderful view over the colorful mountains of Rainbow Mountain.\n\nThe path leads through a valley up to the ridge and from there to the highest vantage point. On the way you can watch wild alpaca herds grazing.\n\nThe hike is technically not very demanding, the only challenge is the height. If you have problems with this, you can reach the summit in an emergency on mules that are on the way all the way. Therefore, this walk is also feasible for everyone.', 'https://i.pinimg.com/originals/00/5b/b3/005bb3644f3323feac23fd81828a4ab8.jpg'),
(6, 'Milford Sound', 'New Zealand', 'Adventure trip', 'Summer', 'One Way', 'Hard', '15 km', '3h30', 'Milford Sound is a fjord on the west coast of New Zealand''s South Island. It is a UNESCO World Heritage Site and is part of the Fiordland National Park. The mighty glacial movements of the Ice Age created the 15 km long stretch of coastline, creating up to 1,200 m high cliffs that tower majestically out of the water today. With its connection to the New Zealand Alps, the area is one of the rainiest on earth, on the slopes of the mountains grows temperate rainforest and in between numerous waterfalls fall into the Tasman Sea. The Milford Sound is home to seals, penguins and dolphins, while the deeper waters of the fjord are home to the marine wildlife of the deep sea.', 'https://farm1.nzstatic.com/_proxy/imageproxy_1y/serve/milford-sound.jpg?focalpointx=47&focalpointy=40&height=427&outputformat=jpg&quality=85&source=4366771&transformationsystem=focalpointcrop&width=640&securitytoken=B152D5B3B63B0457CAED849713A8DCC2'),
(7, 'Tsitsikamma Lookout', 'South Africa', 'Adventure trip', 'Winter', 'Circular', 'easy', '1.7 km', '2h30', 'Boardwalk along the coast and through forests to 2 suspension bridges (1km one way) to cross Storms River. Easy walk besides some steps near the bridge. Walk can be extended to reach a Lookout (~1km, some steep parts).', 'http://www.nature-reserve.co.za/images/tsitsikamma-national-park-beach-590x390.jpg'),
(8, 'Great Ocean Road', 'Australia', 'Adventure trip', 'Fall', 'One Way', 'Easy', '242.4 km', '3h20', 'The Great Ocean Road is a panoramic street between Torquay and Allansford in the state of Victoria at Australia''s southern coast. In 2001 this street was officially listed as Australian National Heritage.  There are millions of visitors every year enjoying the stunning views of the seascapes.\n\nGreat Ocean Road starts in Torquay which is also labelled the "Surfing Capital of Australia". This is where surfers from all over the world are coming together to enjoy the huge waves and the stunning scenery of this picturesque spot. Lovers of the nature as well as hobby photographer are gathering in Torquay to capture the charm and magic of one of Australia''s most impressive locations.\n\nThe landscape of Great Ocean Road is as diverse as it is stunning. You can find here cliffs alongside sandy beaches and spectacular viewpoints next to the road. In between you can see beautiful spots of wildlife, a stunning setting for souvenir photos. Another rewarding stop are porth Campbell and Great Otway National Park. This is where you can observe koalas and other exotic animals at close range as well as explore picturesque waterfalls.\n\nYou can go snorkelling or rafting, do a canoa tour or go for a ride in order to grasp the beauty of the Australian coastline.\n\nAt the end of the road you''ll find one of the most impressive spots along Great Ocean Road: the famous Twelve Apostles. These distinctive rock formations rise above the water and will take your breath away.\n\nIf you want to go for a walk along the route, you shouldn''t miss the chance to take a look at Great Ocean Walk. If you''re lucky you''ll even spot whales and dolphins near the coast.', 'https://cdn-campsauswide.pressidium.com/wp-content/uploads/2013/11/12-apostles.jpg'),
(9, 'Laguna Quilotoa', 'Ecuador', 'Adventure trip', 'All Year Round', 'Circular', 'Easy', '10.9 km', '4h16', 'It costs $2 to enter the town of Quilotoa. If you just want to make a short visit, there are multiple buses each day from Latacunga to Quilotoa (1 hr 45 min). Take Zumbahua-Quilotoa-Chugchilan bus for $2.50. You will take this bus past a "Welcome to Quilotoa" sign. Don''t get off here. It''s not actually Quilotoa for a couple more kilometers. Once you approach a highway exit for Quilotoa, get off. The bus will continue left towards Chugchilan, but you will walk into town. Alternatively, you can make the three-hour direct drive from Quito. There''s a wonderful hotel directly across from the entrance to the Quilotoa Lake called Hostal Chukirawa. Sitting at such a high altitude, altitude sickness prevention pills are recommended. Also, the town is foggy and cold - bring a warm jacket, and make sure that your hotel will be warm (such as a fireplace in your room and warm down blankets).', 'http://www.cretertours.com.ec/wp-content/uploads/2017/10/QUILOTA.jpg'),
(10, 'Cime du Diable', 'France', 'Adventure trip', 'Spring', 'Circular', 'difficult', '13.6 km', '7h', 'After only an hour''s walk, once you have reached the ridge, the view towards the Belvedere and south to the surroundings of the Col de Turini is really impressive.\n\nFrom the summit of Mont Capelet Inferieur, you can enjoy spectacular views of the mountains around the Gordolasque valley, especially the Cime du Diable, overlooking the lakes above the Refuge des Merveilles.\n\nThe ascent first runs along a beautifully laid-out old connecting path in the forest, then gently along the mountain ridge through sparse larch forest and across blooming meadows and later over steep grassy slopes that become schottrig upwards, but nowhere dangerous.\n\nAt the top of the Mont Capelet Superieur is a mobile radio transmitter, which is remarkable in that there is no reception in the entire valley of Gordolasque.\n\nThe descent from the Pas du Trem takes place on a marked trail, which cleverly winds through several blocks of land and further down to a beautiful alpine trail.', 'https://lh4.googleusercontent.com/-0lD7TvcM1go/U-5KlBq9hVI/AAAAAAAAcrQ/w63vu1WNjY4/s1024/Capelet%2520sup%25C3%25A9rieur%2520et%2520Cime%2520du%2520Diable%2520%25280%2529.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--
DROP TABLE IF EXISTS mytrip.`items`;
CREATE TABLE IF NOT EXISTS mytrip.`items` (
  `Item_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`Item_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `items`
--

INSERT INTO mytrip.`items` (`Item_ID`, `Name`) VALUES
(1, 'Hat'),
(2, 'Passport'),
(3, 'Umbrella'),
(4, 'Boots'),
(5, 'Sweater'),
(6, 'Euro'),
(7, 'Scurf'),
(8, 'Socks'),
(9, 'Gloves'),
(10, 'Pants'),
(11, 'Shirts'),
(12, 'Swimsuit'),
(13, 'Flip Flops'),
(14, 'Sunglasses'),
(15, 'Sunscreen'),
(16, 'Tank Tops'),
(17, 'Shorts'),
(18, 'Buoy'),
(19, 'Surfboard'),
(20, 'Towel'),
(21, 'Sandals'),
(22, 'Trousers'),
(23, 'Trekking Sticks'),
(25, 'Shekels'),
(26, 'Money'),
(27, 'Waterproof Coat'),
(28, 'Short sleeve shirts'),
(29, 'Source Sandals'),
(30, 'Beach Umbrella'),
(31, 'Softshell Jacket'),
(32, 'Backpack'),
(33, 'Hiking shoes'),
(34, 'Source Sandals'),
(35, 'Short sleeve shirts'),
(36, 'Waterproof Coat'),
(37, 'Knitted Hat'),
(38, 'Long Shirts'),
(39, 'Hungarian forint');

-- --------------------------------------------------------

--
-- Table structure for table `items_in_list`
--
DROP TABLE IF EXISTS mytrip.`items_in_list`;
CREATE TABLE IF NOT EXISTS mytrip.`items_in_list` (
  `List_ID` int(11) NOT NULL,
  `Item_ID` int(11) NOT NULL,
  PRIMARY KEY (`List_ID`,`Item_ID`),
  KEY `FK_item` (`Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_in_list`
--

INSERT INTO mytrip.`items_in_list` (`List_ID`, `Item_ID`) VALUES
(2, 1),
(3, 1),
(5, 1),
(1, 2),
(4, 2),
(1, 3),
(3, 3),
(4, 3),
(1, 4),
(4, 4),
(3, 5),
(4, 5),
(5, 5),
(1, 6),
(3, 6),
(1, 7),
(3, 7),
(4, 7),
(1, 8),
(3, 8),
(4, 8),
(1, 9),
(4, 9),
(5, 10),
(4, 11),
(2, 12),
(3, 12),
(2, 13),
(5, 13),
(2, 14),
(2, 15),
(5, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(1, 20),
(2, 20),
(4, 20),
(5, 20),
(2, 21),
(2, 25),
(4, 26),
(5, 26),
(1, 27),
(5, 28),
(2, 30),
(3, 31),
(5, 31),
(1, 32),
(3, 32),
(5, 32),
(3, 33),
(5, 33),
(3, 34),
(5, 34),
(3, 35),
(5, 35),
(3, 36),
(4, 36),
(1, 37),
(4, 37),
(1, 38),
(4, 38),
(1, 39);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS mytrip.`users`;
CREATE TABLE IF NOT EXISTS mytrip.`users` (
  `Email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `FirstName` varchar(20) CHARACTER SET utf8 NOT NULL,
  `LastName` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO mytrip.`users` (`Email`, `Password`, `FirstName`, `LastName`) VALUES
('adinom@post.bgu.ac.il', 'adi123', 'Adi', 'Nomberg'),
('barakpinch@gmail.com', 'barak123', 'Barak', 'Pinchovski'),
('hadardvd@gmail.com', 'hadar123', 'Hadar', 'David'),
('lee@post.bgu.ac.il', 'lee123', 'Lee', 'Ohayon'),
('litalmen@post.bgu.ac.il', 'lital123', 'Lital', 'Menashe'),
('netanella@gmail.com', 'neti123', 'Netanella', 'Brand'),
('stba@post.bgu.ac.il', 'stav123', 'Stav', 'Bar'),
('tidharsa@post.bgu.ac.il', 'tidhar123', 'Tidhar', 'Sandovsky');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorite_activities`
--
ALTER TABLE mytrip.`favorite_activities`
  ADD CONSTRAINT `FK_Activites` FOREIGN KEY (`A_ID`) REFERENCES mytrip.`hiking_trips` (`H_ID`),
  ADD CONSTRAINT `FK_Users` FOREIGN KEY (`U_Email`) REFERENCES mytrip.`users` (`Email`);

--
-- Constraints for table `favorite_equipment_lists`
--
ALTER TABLE mytrip.`favorite_equipment_lists`
  ADD CONSTRAINT `FK_Eusers` FOREIGN KEY (`U_Email`) REFERENCES mytrip.`users` (`Email`),
  ADD CONSTRAINT `FK_Lists` FOREIGN KEY (`EL_ID`) REFERENCES mytrip.`equipment_lists` (`EL_ID`);

--
-- Constraints for table `items_in_list`
--
ALTER TABLE mytrip.`items_in_list`
  ADD CONSTRAINT `FK_item` FOREIGN KEY (`Item_ID`) REFERENCES mytrip.`items` (`Item_ID`),
  ADD CONSTRAINT `FK_list` FOREIGN KEY (`List_ID`) REFERENCES mytrip.`equipment_lists` (`EL_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
