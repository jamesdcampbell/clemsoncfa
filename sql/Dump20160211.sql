CREATE DATABASE  IF NOT EXISTS `_cfa` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `_cfa`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: _cfa
-- ------------------------------------------------------
-- Server version	5.6.20

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
-- Table structure for table `cleanmaint`
--

DROP TABLE IF EXISTS `cleanmaint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cleanmaint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal` text NOT NULL,
  `numGoal` varchar(20) NOT NULL,
  `ranking` varchar(20) NOT NULL,
  `dateGoalAdded` varchar(30) NOT NULL,
  `dateNumGoal` varchar(30) NOT NULL,
  `dateRanking` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cleanmaint`
--

LOCK TABLES `cleanmaint` WRITE;
/*!40000 ALTER TABLE `cleanmaint` DISABLE KEYS */;
INSERT INTO `cleanmaint` VALUES (1,'Cleanliness of Bathroom','70','1','2013-04-30T04:00:00.000Z','2013-04-27T04:00:00.000Z','2013-04-22T04:00:00.000Z');
/*!40000 ALTER TABLE `cleanmaint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(30) DEFAULT NULL,
  `lName` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone1` varchar(20) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `homepage`
--

DROP TABLE IF EXISTS `homepage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `homepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motd` text NOT NULL,
  `notes` text NOT NULL,
  `leaderShipNotes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `homepage`
--

LOCK TABLES `homepage` WRITE;
/*!40000 ALTER TABLE `homepage` DISABLE KEYS */;
INSERT INTO `homepage` VALUES (1,'This is the &lt;span style=\"color:#000000;\"&gt;message&lt;/span&gt; of the day/month placeholder text. If you go to the &lt;strong&gt;&lt;em&gt;\"&lt;span style=\"color:#ed1c24;\"&gt;Site Management&lt;/span&gt;\"&lt;/em&gt;&lt;/strong&gt; tab, you will see places to update this content.','&lt;p&gt;This is the notes section, feel free to add reminders or whatever it may be here and it will show up under the \"Notes\" heading. Remember though, whatever you type in here will overwrite what\'s currently there. To edit this, go to the &lt;strong&gt;\"&lt;/strong&gt;&lt;em&gt;&lt;strong&gt;Site Management&lt;/strong&gt;&lt;/em&gt;&lt;strong&gt;\"&lt;/strong&gt; tab, you will see places to update this content.&lt;/p&gt;','This is the leadership notes section. Feel free to take note during Monday meetings, but &lt;span style=\"color:#000000;\"&gt;remember&lt;/span&gt;, what you put here will show up for all users!!&amp;nbsp;');
/*!40000 ALTER TABLE `homepage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incident`
--

DROP TABLE IF EXISTS `incident`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incident` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerName` varchar(50) NOT NULL,
  `callDate` varchar(30) DEFAULT NULL,
  `callTime` varchar(8) DEFAULT NULL,
  `callTakenByID` varchar(50) DEFAULT NULL,
  `incidentDate` varchar(30) DEFAULT NULL,
  `incidentTime` varchar(8) DEFAULT NULL,
  `details` text,
  `followUp` varchar(11) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `phoneOne` varchar(20) NOT NULL,
  `phoneTwo` varchar(20) NOT NULL,
  `tMemberIssue` varchar(30) NOT NULL,
  `handled` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incident`
--

LOCK TABLES `incident` WRITE;
/*!40000 ALTER TABLE `incident` DISABLE KEYS */;
INSERT INTO `incident` VALUES (52,'Vicki Schaupp','4.29.13','12:45 pm','Vicki Jordan','4.29.13','12:45 PM','Ms. Schaupp stated that she had ordered a no. 1 and no. 2 combo at the front counter but took them to go.  She says her chicken was hard on the outside edges and the fries were not fresh.  ','false','307 Mountain View Dr., Central, SC  29630','864.650.2228','','','Vicki Jordan sent 2 BOG sandwich cards to her.'),(53,'Alexis Earl','4/21/13','7pm','Adam Edwards','4/21/13','5pm','Customer complained that she only received 5 fries in her fry box. Said it was supposed to be a medium fry.','false','1409 Old Central Rd. Central SC 29630','','','','Offered to send a BOG. BOG sent.'),(55,'Jimmy Butts','5.14.13','12:30 pm','Vicki Jordan','5.14.13','','His wife went through the drive thru, and there was no CFA in the bag.','false','519 Madden Bridge Rd., Central, SC  29630','','','Caroline','Vicki sent 1 sandwich BOG card on 5.14.13.'),(56,'Heather McKenzie','5.20.13','4:03 PM','Vicki Jordan','5.20.13','3:44 PM','Ms. McKenzie went through the drive thru.  She ordered three drinks and only received one drink.  Victoria had run out to try to catch her but couldn\'t.','false','109 Stone Terrace , Central, SC  29630','','','Victoria','Vicki sent a salad coupon card, a BOG card for a CSS, and a kid\'s meal coupon on 5.20.13.'),(57,'Lisa May','05/29/13','7:00pm','Erica Womack','5/29/13','7:42 pm','Customer came through the drive-through and ordered two granola parfaits. She did not receive her granola.','false','103 Riverbirch Run, Clemson, SC 29631','864-723-3684','','Erica Womack','Apologized and sent out a BOG for a sandwich.'),(58,'Chandler Compton','5/29/13','7:30 pm','Erica Womack','5/29/13','6:25 pm','Guest came through the drive-through and ordered 3 meals, all with fries and milkshakes. She commented that the person at the window was rude to her when she asked for numerous sauces, that her fries were cold and half full, that she did not like that the salads have changed, and that the icedream is obviously weighed now because it is significantly less than what she was used to.','false','164 Falling Springs Rd, Central, SC 29630','864-506-2061','','Ashley Lee','I apologized for all of the issues mentioned. I explained our process of weighing out icedream to ensure consistency across the brand. I explained that the salad change was a corporate decision. I sent out two BOG cards.'),(59,'Tracy Glenn','05/31/13','5:27 PM','Savanna Lewis','05/31/13','3:00','Called to say recieved two hard sandwiches and two cold fries, 2 1/2 hours prior to calling to report the incident.','false','N/A','864-309-5093','','','When asked for her transaction number, she said she didn\'t have one.  I asked her to tell me exactly what she had, (2 number one combo meals with dr pepper) so that I could hopefully retrieve the trans. number. I told her that if I could not find it, there was nothing I could do because of our policy. While looking, Ms. Glenn called back telling me that her neighbor said that our policy was to replace the food if it was bad. I reiterated that it is, as long as we find the trans. number. I couldn\'t find it so I called her back, and began to ask her what her address was. She told me that she was at a motel in clemson because her house in Georgia was being fixed up. I then told her I just needed an address for documentation purposes. She asked &quot;why, are y\'all gonna bring it to me at the motel?&quot; When I began to explain why we couldn\'t, she yelled, &quot;WELL THEN DON\'T WASTE MY TIME!&quot; and hung up the phone.'),(60,'Cherie Isely','6/3/13','9:30 am','Erica Womack','6/3/13','9:20 am','Ms. Isely came through the drive thru and ordered a chicken, egg, and cheese on a bun. She received her sandwich, drove  to work, and realized there was only chicken, no egg or cheese.','false','151 Grand Oak Circle Pendleton, SC 29670','864-710-3490','','Zach Farroto','I apologized and asked if she was close enough for us to replace the sandwich. She was not, so I asked if it would be okay to send her a coupon so that she could receive her sandwich free of charge on her next visit. She happily agreed. A &quot;CEC bagel&quot; BOG was sent out the next day.'),(61,'Leslie Horton','6/29/13','10:05 pm','Chase Womack','6/29/13','10:01 pm','Came through drive through at 10:00pm. Ordered a meal and two sandwiches. Received all sandwiches and no fries.','false','1872 Maw Bridge Rd, Central, SC 29630','8648847907','','Austin Evert','Apologized and sent out BOG for a cfa sandwich.'),(62,'Tina Cobb','8/8/13','5:15','Austin Evert','8/8/13','12-1','Claimed they purchased 3 sandwiches that were &amp;amp;quot;hard&amp;amp;quot; and overcooked.','false','7215 Hwy 76 Pendleton, SC 29670','','','n/a','Offered to replace the 3 sandwiches next time they were in - AE\n\nCame in on 8.14 and explained situation to Vicki.  Vicki explained that our procedure was not to give free food in the store.  She did give her 3 sandwiches with the understanding that we would not be doing this in the future.  Her story was suspicious.'),(63,'Chris Kaloroplos','8/13/13','3:00','Austin Evert','8/13/13','2:20','Came through drive thru and claimed to have ordered an asian salad with no oranges but said it did have oranges on it.  Also said his spicy sandwich was supposed to have no pickles but did in fact have pickles on it.','false','','','','','I offered to replace the salad and the sandwich for him next time he is in the store.'),(64,'Shelia Price','8/21/13','7:00','Austin Evert','8/21/13','6:30','Forgot CFA sandwich in drive thru','false','847 Warley Circle, Pendleton 29670','8646166059','','','I offered to mail her a coupon to replace the forgotten sandwich'),(65,'Mary Hagord','09/02/2013','1:00 pm','Nina Trahan','','','Customer called stating that they ordered an 8 count grilled nuggest and received a fried 8 count nugget. ','false','122 McGee Street Clemson SC 29631','8645086704','','','An 8 count B.O.G. was mailed on 09/06/2013'),(66,'martel brown - FRAUDULENT','11/5/13','noon','adam','11/5/13','6 or 7pm','Claims he got 2 meals that had bad fries and sandwiches. says the only good thing was the milkshake, strawberry that he got. I got all his info and details about his order and could not locate anything within our system for what he described. tried to call him back and let him know we had nothing that matched and he did not answer or call back.','false','','843-618-2511','','',''),(67,'Sherry Isley','11.8.13','9:00 AM','Tyler Martin','11.8.13','8:00 AM','She order CEC on a bun.  She received only chicken on a bun.','false','151 Grand Oak Circle, Pendleton, SC  29670','','','','Vicki sent her 2 BOG cards for CEC on buns on 11.9.13'),(68,'Kristyn Gardner','11/18/2013','6:33am','Customer filed CARES complaint','11/18/2013','6:33am','Customer complained that her biscuit was soggy. The biscuit and the chicken seemed as if they were &quot;dunked in water&quot;. \n\nShe also complained that the two females in the drive thru did not pay her the appropriate amount of attention. She stated they were busy talking about how one of their cars was in the shop and what might be possibly wrong with it. She said she had to waive them down after the transaction in order to receive ketchup.','false','500 Doyle St','864-784-0647','','Two females in drive thru','Adam called customer and got details on incident. Expressed appreciaton of her business as well as informing us of the issues so we could correct for the future. Two CFA biscuit BOGs were mailed on 11/19/2013'),(69,'Jimi Rhodes - Fraudulent!','11/21/13','12:00pm','Adam','11/19/2013','4pm','Claims she came through drive thru, ordered 3 #1s and a 3ct strip and only received 2 #1s and an 8ct nugget. Wanted coupons to replace. Got all info about her order and looked it up in our system. No such order existed. Called her back to confirm all details, searched again for her order and could not find it. Called her back a third time to tell her I could not find her order, she didnt answer or return my voicemail.','false','112 Gant St.','864-506-3143','','Drive Thru','No coupons sent. Believe this was a fraudulent request.'),(70,'Ashley Cochran','November 20, 2013','11:00','Vicki','November 20, 2013','Breakfas','Left out 4 count in drive thru','false','10239 Clemson Blvd. Su. 310, Seneca, SC  29678','','','','Vicki sent BOG cards.'),(71,'Shirley Sapp','November 20, 2013','','Tyler Martin','November 20, 2013','1:00 pm','Left out CFA sandwich.  ','false','P. O. Box 1495, Seneca, SC  29679','','','','Vicki sent BOG cards and verified her receipt.  '),(72,'Haley Mizell','','','Vicki','','','Transaction 2049934\nMissing CFA biscuit','false','1131 Harts Ridge Dr., Seneca, SC  29678','','','','Vicki sent BOG cards.'),(73,'Kevin McKenzie','11/29/2013','8pm','Scott','11/29/2013','6:53 pm','Tonight we missed a CFA sandwich, however, on the 12th, we missed an 8-nugg, and on the 19th there was no top bun on his spicy sandwich. Kevin is a regular customer and has called each time the night of the problem. He and his family eat here all the time and go through the drive-thru all the time. He estimated his family eats about 12 meals a week with us. ','true','','','','Ciara','Looked up his order and his rec# and time matched up. Each time he has called it has matched perfectly. First two times we mailed him coupons but this time he called to tell us about it and inform us he was going to email Mr. Tyler.\nHe said he is understanding, but we need to fix the problem a different way this time. I told him I would do so personally. During a slow period I took the whole drive-thru team and adressed the importance of accuracy when bagging. I reitterated the process where the bagger will double check, and the window person will double check the contents of the bag. \nHe said sauces and napkins and everything were double checked at the window and were all correct but he\'s tired of mistakes being made with the food itself. '),(74,'Maurice Reris','12/12/13','7:28pm','Austin Evert','12/12/13','1:00pm ','Said he got 3 sandwich meals through the drive-thru and claimed the chicken was overcooked, hard, and dry. ','false','126 Spear Rd Lot B','864-276-8273','','---','I told him I would send him coupons in the mail to try and resolve the situation quickly since it was in the middle of dinner. I know this should have been done differently.'),(75,'Bradley Lewis','12.13.13','1:00','Vicki Jordan','12.13.13','','He was charged for cheese, but no cheese was on his spicy sandwich.\nOrder no. 2083057','false','2020 Ridgeview Lane, Seneca, SC  29678','864.985.8824','','','Vicki sent 2 BOG coupons for spicy sandwiches.'),(76,'Hope Jenkins ','12.10.13','1:30','Vicki Jordan','12.10.13','','She ordered grilled nuggets but received fried nuggets.  \nDThru\nOrder no. 2077420','false','423 Lindsey Road, Apt. 202, Clemson, SC  29631','','','','Vicki sent BOG cards for kid\'s meals.'),(77,'Joanna','12.3.13','9:30 AM','Vicki Jordan','12.3.13','9:06','She was missing a spicy biscuit.  \nDT\norder no. 2065896','false','100 Century Plaza, Su. 9 I, Seneca (Telecom)','864.293.6966','','','Herb delivered a spicy biscuit, a 2014 cow calendar, and a gallon of lemonade to her.'),(78,'Carolyn Yarborough','12.3.13','10:00 AM','Vicki Jordan','12.3.13','8:40 AM','The icing was not on her two clusters.\nDThru\norder no. 2065857','false','13025 Azalea Dr., Seneca, SC  29678','980.225.6109','','','Vicki sent BOG cards.'),(79,'Tony Wayland','12/17/13','6:00','Austin Evert','12/17/13','5:30','Ordered 3 Cobb salads and an Asian salad through the drive thru but did not receive the Asian salad.','false','133 Murphy Road Pendleton SC 29670','8642268078','','Rachel Turner','I told them I would mail him a replacement coupon for the Asian salad.'),(80,'Lori Ann Selch','1.7.14','11:30 AM','Vicki Jordan','1.7.14','10:38 AM','She received a 4 count mini instead of of 4 count strips in DT.\nOrder #2104937','false','3319 Highway 88, Central, SC 29630','8649868787','','','Vicki sent two three strip BOG cards.'),(81,'Leigh Hedden','1/15/14','8pm','Adam','1/15/14','5:45pm','Called and said her son came through Drive Thru and wasnt handed drinks. He drove off without asking for drinks. Also stated that last week we missed a CFA Sand, and when she called to report, a manager asked if we could call her back as we were extremely busy. She said they did call her back and left a voicemail, but never returned her call.','false','501 Madden Bridge Rd','313.8808','','Drive Thru','Sent 3 BOGs for CFA sands.'),(82,'James Wardlaw - fraudulent ','01/16/14','10:20 AM','Savanna Lewis','01/16/14','8:00A-8:','Customer called to say he ordered 3 CFA biscuits and a large hashbrown, yet once he arrived to work he realized he had 3 spicy biscuits and the hashbrowns were cold.','false','126 Spear Rd Lot B Pendleton SC 29670','(864) 309-5078','','Savanna Lewis','After reviewing orders, I could not find one that remotely resembled the order he described. I let him know that without a matching order, we could not do anything for him.'),(83,'Adam coyotes','1-18-2014','4pm','Adam ','1/17/18','4pm','Customer stated it was apparent that the kitchen team simply removed pickles from a sandwich I order to make his no pickle sandwich. Stated it has happened before and in the past there has even been small pieces of a pickle left on his sandwich.','false','209 charleston ave apt 3','757-374-8855','','Kitchen','Sent two bog for sandwiches'),(84,'Ricky Jones - fraudulent','1/22/14','12:30','Adam','1/22/14','9am','Claims he ordered 3 CFA bisc. and one large hashbrown and the biscuits and chicken were bad and only got a small hashbrown. Was unable to provide a trans number. Looked this order up in the system and could not find any that match. Called him back and told him was unable to do anything about it and in the future to keep receipt so we could fix','false','','864-760-7103','','',''),(85,'James Scott - fraudulent','01/23/14','3:30','Savanna Lewis ','01/23/14','1:00 pm','He said that he came in during lunch and got a number one meal that was hard in the fries were cold','false','126 Spear Rd, Pendleton, sc 29620','864-760-7103','','---','We called him and told him that we would not do anything without a transaction number for purchase. Adam followed up and called him and talk to him about multiple previous complaints and told him from here on out without transaction number and return of food, we wouldn\'t be able to do anything for him'),(86,'Michelle Collins','01/24/14','3:14 PM','Savanna Lewis','01/24/14','1:15 PM','Customer called to say that she came through the drive-thru during lunch and received two #1 meals that had \'not good, kinda cold\' fries and \'cold\' sandwiches. ','false','606 Blair Street Apt 3 Easley, SC 29640','864-434-8430','','--','I got all of the details of her order (both large with sweet tea and lemonade to drink) to locate her order on the system since she told me she had not retained her receipt. I searched the whole days sales through drive-thru and could not find such an order. I called and left her a msg saying we couldn\'t do anything for her without a matching order.'),(87,'Roy Jones','02/04/2014','1:30p','Savanna Lewis','02/02/2014','1:30p','Customer said he came through the drive thru and ordered 4 number one sandwiches without pickles and all sandwiches had pickles.','false','5968 Sherwood Place, Ellenwood, GA 30294','954-348-5125','','- - ','The customer was told there was nothing we could do for them without a transaction number.'),(88,'Gretchen Harbin','','','','','Breakfas','Left cheese off bagel','false','137 Berkshire Dr., Seneca, SC  29672','864.654.5881','','','2 BOG cards sent\n2.8.14\nVJ'),(90,'Rita Presher','1.30.14','2.00','VJ','1.30.14','1:31 PM','Left crackers out of bag for soup.\nTransaction #2137307','false','PO Box 461, Sandy Springs, SC  29677','864.353.6833','','Kathy Haile','sent 2 BOG cards\n2.8.14\nVJ'),(91,'Donna Jenkins','3.15.14','11:00 am','Russell Newton','3.15.14','9:50 am','She was missing 4 ct mini.','false','833 Old Greenville Hwy Apt 915','','','','Sent BOG card for minis and CFA biscuit on 3.17.14.\nVJ'),(92,'Tom Hudson','','','Vicki','','','Left out minis.','false','800 Whitworth Circle, Seneca, SC  29672','','','','Sent BOG card for minis.\n'),(93,'Jennifer Day','3.18.14','','Austin/Tyler','around 2.18.14','','Claims she had 4 #1 meals and the fries were cold.  She has called before, and we haven\'t been able to verify her order.  She wanted the combos delivered to her.  We are calling this a fraudulent case.  ','false','7215 Highway 76, Pendleton, SC  ','8642762259','','','Vicki and Austin will call her and tell her of our policy and tell her we are not able to deliver her replacement meals.'),(94,'Scott Kelly','','','Sav','4.14','','CFA sandwich left out of order','false','550 Brookbend Rd. Central, SC  29630','8646507030','','','Sav sent BOG'),(96,'Asia Davis','4.14','','','4.14','','Said parfaits were half filled.','false','105 Lindsay Road, Seneca, SC  29678','8642226599','','','CFA BOG sent'),(97,'Kiana Reese','5.30.14','9:30 am','Vicki Jordan','5.30.14','8:57 AM','She wanted a &quot;cinnamon&quot; cream cheese bagel, and whoever checked her out understood her to say a cinnamon cluster.  I explained to her that we didn\'t have a cinnamon bagel.  \nOrder no. 2309724\n','false','121 Ligon St., Clemson, SC  29631','','','','I sent her a BOG for a CEC bagel that could also be used for a cream cheese bagel.'),(98,'Paulette Grate','07/17/14','7:00 PM','Russell Newton','07/17/04','10:30 AM','Said only half of the bread was cooked for her Lg Mini Tray. She said the other half was &amp;quot;white&amp;quot; and that it had be come &amp;quot;wet&amp;quot; by the time she got home. ','false','324 Grate Rd. Anderson, SC ','864-287-4466','','','Austin called, apologized and sent coupons in the mail.'),(99,'Jennifer Federici','7/29/14','3:10','Kaitlin Holliday','7/29/2014','3:10','She ordered two sweet teas and was upset about the water situation. She wanted a refund or a coupon to replace the sweet teas.','false','246 Oak Grove Road Central, SC','','','Kaitlin Holliday','I explained to her the water situation and that it is out of our control. I am sending her a coupon in the mail for a CFA sandwich. '),(100,'Jennifer Glenn','8/9/14','1145am','adam','8/8/2014','sometime','claims she purchased 3 numbers 1s, two with dr pepper one with chocolate milkshake sometime after 6pm. Says chicken was terrible, overcooked and dry. Said the same for fries.','false','400 Central Rd Apt 902 Pendleton ','864-520-3011','','drive thru','Suspected she was lying because I am pretty certain i talked to same individual 4 months ago. Looked up order details in system and did not find anything that matched. called her back and told her our policy and that we couldnt do anything for her. told her in the future she would have to bring the food back in for us to fix it.\n'),(101,'Jessica Jones','08/11/14','12:25pm','Savanna Lewis','8/11/14','10:36 am','Guest recieved a small tea, and called requesting a refund because of the taste.\n\nTrans. #: 2395750','false','12529 Cheryl Anne Place, Charlotte, NC 28262','980-208-2472','','','I explained the water situation, and offered a refund since she was from out of town and wasn\'t aware. She ultimately dismissed the request for refund. '),(102,'Jared Emerson','8/15/2014','3:57','Kaitlin Holliday','8/15/2014','3:45','Jared Emerson came in and placed a very large carry out order, totaling around $91. He was picking up food for people moving into dorm rooms. We double checked the order but after he left, he called and said that he was missing two 8 count nuggets and 1 medium diet coke.','true','','(864)304-5124','','Kaitlin Holliday','When he called I, Kaitlin Holliday, answered the phone. I apoligized and told him that we could send him a coupon or he could come pick up what we  missed, free of charge. He said that he did not want to do anything else about it because he checked the order himself and thought that everything was there and that he just wanted us to know about the mess up. '),(103,'Brittney Bridge','Aug. 16 2014','9:00','Beth','Aug. 16 2014','2:33 PM','Nuggets were tough.','false','616 East River Street Anderson SC 29624','359-6344','','N/A','Sent an 8 count nugget coupon. '),(104,'Donnie Blackmon','8.23.14','1:30 pm','Vicki','8.23.14','','Order 12 count nuggets - received a 6 count nugget in a 12 count box','false','1464 Iroquois Dr., Seneca SC  29672','864.882.3710','','','Vicki sent nugget coupons on 8.25.14'),(105,'Brandon Owens','08/25/2014','5:00','Beth Shealy','08/25/2014','2:15','Was wanting a number 4 and recieved a regular with american cheese.','false','1108 Tiger Blvd. Clemson SC 29631 Apt. 121','8644264828','','','Given a BOG for a spicy sandwich \n\nUpdate: 01/09/15\nMr. Owens called around 2:30pm claiming he never received the original BOG that was send in Aug. despite having called repeatedly to check on it. After following up with Beth, I sent him a CFA Sandwich coupon along with a Spicy Biscuit coupon on 01/09/15. SAL.\n\n02/17/15 1:40pm\nBrandon returned to our store and spoke to Vicki saying that although he received coupons in the mail, he wanted what we originally messed up on. I promo\'d out a Spicy Deluxe Sandwich + PJ Cheese. The receipt number is 2689826 \n'),(106,'Ashley Anderson ','9.2.14','8:30 am','Vicki','9.2.14','8:00 am','No peppers or onions were on her burrito.','false','321 Pelham Creek Dr., Seneca, SC  29678','864.723.1175','','Nate','Vicki sent 2 BOG coupons'),(107,'Crystal Howard','8.30.14','1:00','Vicki','8.30.14','','Forgot icedream cone','false','650 Bethlehem Church Rd., Due West, SC 29639','864.423.8593','','Drive Thru','Vicki sent 2 BOG cards.'),(108,'Tonia Hill','09/05/2014','09/05/20','Beth ','09/05/2014','','Didn\'t recieve a large fry with her 2 meals, a #1 and 12 count meal. ','false','300 Cardinal Woods Way Easley SC 29642','8649158070','','','sent a BOG'),(109,'Michelle Goss','09/13/2014','5:30','Beth','09/13/2014','5:05','Forgot her 8 count out of 3 sandwiches and a #5 meal.','false','P.O. Box 175 Newry SC 29665','','','','Given a BOG for an 8 count nugget.'),(110,'Amanda Hazzard','9/30/14','10:30 AM','Savanna Lewis','','','Said she spoke with Austin a few weeks ago and was supposed to recieve a BOG in the mail, but never recieved it. Sounded credible.','false','154 Kingsland Way, Piedmont, SC 29673','864-607-3212','','','I sent her a CFA Sandwich BOG.\n\n10/30/2014 Amanda came inside the store today and claimed she never recieved the coupons that were sent to her. I apologized and gave her CFA sandwich to take with her.'),(111,'Teresa Mosley','10.2.14','9:00 am','VJ','10.2.14','8:30 am','She found a curly &quot;hair&quot; in her sandwich.  Another dining room guests just had the same issue.   Sav and I saw the &quot;hair&quot; in question and think it was some type of wrapper thread and not a hair.  ','false','122 Davis St., Central, SC  29630','8646508340','','','2 BOG cards sent on 10.7.14'),(112,'Gail Hunter','11/12/2014','5:15 PM','Beth','11/12/2014','5:00 PM','asked for a special order and didn\'t recieve it correctly.\nWanted a number 8 sandwhich on toast and didn\'t recieve the cheese or bacon.','false','1102 Crosswinds Lane Seneca SC 29678','','','','Recieved a grilled sandwhich coupon'),(113,'Patricia Simpson','12.24.14','1:00pm','Vicki','12.24.14','11:00am','Claimed her 2 chicken sandwiches were tough.','false','428 Earles Grove Road, Westminister, SC  29693','864.784.4177','','','Vicki sent 2 BOG sandwich coupons on 12.27.14.'),(114,'Morgan Reeves','1.27.15','10:00am','Vicki Jordan','1.27.15','9:30 am','Missing a chicken biscuit from their order','false','118 Sunrise Harbor Dr., Anderson, SC 29621','8647609330','','','Vicki sent two biscuit BOGS on 1.29.15.'),(115,'Isley Arruda','February 2015','','CARES','2.5.15','','Fries and tea weren\'t fresh','false','201 Oak St., Apt. 27, Clemson, SC  29631','8439973546','','','Vicki sent 2 BOG coupons on 2.24.15'),(117,'Lisa Childs','February 2015','','Savanna','February 2015','','','false','P. O. Box 244, LaFrance, SC 29656','','','','Vicki sent 2 BOG coupons on 2.24.15'),(118,'Ms. Preusz','February 2015','','Savanna','February 2015','','order no. 2674514','false','398 Tee Ben Trail, Seneca, SC 29672','','','','Vicki sent 2 BOG coupons on 2.24.15'),(119,'Catherine Richter','February 2015','','CARES','February 2015','','Received wrong order, waited inside without being acknowledged, called store and got no answer','false','8857 Old Lee Rd., Lithia Springs, GA 30122','6784885283','','','Vicki sent 2 BOG coupons on 2.24.15'),(120,'Lindsay Hurley','February 2015','','CARES','February 2015','','Ran out of chicken noodle soup - Witnessed a verbal situation between manager and team leader','false','236 Tabor St., Central, SC 29630','8642070462','','','Vicki sent 2 BOG coupons on 2.24.15'),(121,'Doug Hightower','2.15','','Savanna','2.15','','Left out 2 spicy biscuits','false','216 Crooks Rd., Seneca, SC  29678','8642472637','','','Vicki sent 2 BOG coupons 2.19.15'),(122,'Lori Selzch','03/05/15','1:00PM','Savanna Lewis','03/05/15','12:32 PM','Guest said that one Lg Waffle Fry was left out of their meal in the drive-thru\n\nOrder number: 2719162\n','false','3319 Hwy 88 Central, SC 29630','864-986-8787','','Dillon/Isaac','Sent CFA Sandwich Coupon'),(123,'Asiah Picard','3.19.15','9:15am','Savanna','3.19.15','9:00am','Left out a large hashbrown','false','125 Maple St., Apt, 120, Pendleton, SC  29670','864.356.2450','','Savanna','Sent a BOG coupon for biscuit'),(124,'Caroline Blackwell','3.20.15','','Savanna','3.20.15','','Forgot oj','false','111 Cochran Rd., Clemson, SC  29631','864.420.3259','','','sent free drink coupon'),(125,'John C. Williams','4.6.15','','Vicki','4.6.15','','Left 8 ct nugget out of bag','false','2212 Hwy 86, Piedmont, SC  29673','','','','sent BOG for 8 ct'),(126,'Aaron Gore','9.30.15','1:00','Vicki','9.30.15','12:00','He did not receive the correct sandwich.','false','108 Clemson Place Circle, Clemson, 29631','864.517.7959','','','Vicki sent a BOG DOC on 10.6.15.'),(128,'Kristen King','10.1.15','7:00 pm','Vicki','10.1.15','6:30 pm','No chicken in her club sandwich','false','806 Hopkins Ave., Pendleton, SC  29670','864.723.6853','','','Vicki sent a BOG DOC on 10.6.15.'),(129,'Davaugn Dawson','11.27.15','','Vicki','11.27.15','','Food was not fresh.  ','false','606 Rantowles Rd., Anderson, SC  29621','864.760.2876','','','Vicki verified the order on DT screen since he called about 15 min after he had received his order.'),(130,'Melinda Manley','12.9.15','','Brittany','12.9.15','','Left out 8 count nuggets','false','2434 Maw Bridge Rd., Central, SC  29630','','','','Vicki sent 2 8 count nugget DOC'),(131,'Hannah Raines','12/15/15','12:10pm','CFA Cares','12/8/15','8:45pm','Took 25 mins to receive 4 milkshakes.  Customer service was not great.  We were out of whip cream and dome lids.','false','121 Willow Pond Lane, Piedmont, SC, 29673','864-616-0440','','','I spoke with her on the phone.  After call, she was happy and I sent her 3 DOC\'s for CFAs.\n\nNo follow up needed.'),(132,'Dawn Bright','12.22.15','10:00 am','Vicki','12.22.15','9:40','Burned bagel, nuggets not in bread, 10 hb in boxes','false','221 Aiken St., Central','864.952.9601','','','Vicki sent two BOGs'),(133,'Kimberly Johnson','12/22/2015','10:27am','Brittany Broome','12/21/2015','6:00pm','Guest said her CFA sand. was extremely cold and she was unable to enjoy her sand.','false','825 Winston drive Anderson Sc 29624','','','','Sent a DOC and a letter to guest'),(134,'Kristen Neves','Dec 17','5:00','Jon Haile','12 - 17 - 15','5:00','Left 4ct nug out of bag','false','345 Whitfield Ln Seneca SC 29678','','','','Letter Coupon'),(135,'Amanda Payne','','','','12 - 22 - 15','3:30','Missing Sandwich','false','199 Timberlake 2 ','','','','Letter Coupon'),(136,'June McKee','','12:16','','','','Guest claimed she did not receive all of her order.\nOrder no. 3220048','false','2700 Old Greenville Hwy, Central, SC  29630','8649861883','','','\nVicki sent BOG'),(137,'Kyle Homgsermeier','1.21.16','6 pm','Brittany','1.21.16','5 pm','Guest claimed he did not receive 4 strips in his box.  Brittany asked him what color his box was and he said it was the red box.  He claimed to have received only 2 strips.  ','false','111 Cochran Rd., Townhome 807, Clemson, SC  29631','','','','Brittany sent BOG');
/*!40000 ALTER TABLE `incident` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leadershipteams`
--

DROP TABLE IF EXISTS `leadershipteams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leadershipteams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teamName` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leadershipteams`
--

LOCK TABLES `leadershipteams` WRITE;
/*!40000 ALTER TABLE `leadershipteams` DISABLE KEYS */;
/*!40000 ALTER TABLE `leadershipteams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sampling`
--

DROP TABLE IF EXISTS `sampling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sampling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(30) DEFAULT NULL,
  `product` varchar(50) DEFAULT NULL,
  `units` int(11) NOT NULL,
  `samplesMade` int(11) DEFAULT NULL,
  `samplesGiven` int(11) DEFAULT NULL,
  `comments` text NOT NULL,
  `wholeProduct` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sampling`
--

LOCK TABLES `sampling` WRITE;
/*!40000 ALTER TABLE `sampling` DISABLE KEYS */;
INSERT INTO `sampling` VALUES (3,'2013-04-03T03:36:55.422Z','Chicken Nuggets',12,NULL,96,'Chicken nugget samples....',3),(4,'2013-04-03T03:37:53.575Z','Soup',10,NULL,50,'These are soup bowls...large.',3),(5,'2013-04-03T03:37:53.575Z','Ice cream',5,NULL,20,'Ice cream handed out...',5);
/*!40000 ALTER TABLE `sampling` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal` text NOT NULL,
  `numGoal` varchar(20) NOT NULL,
  `ranking` varchar(20) NOT NULL,
  `dateGoalAdded` varchar(30) NOT NULL,
  `dateNumGoal` varchar(30) NOT NULL,
  `dateRanking` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sosandtof`
--

DROP TABLE IF EXISTS `sosandtof`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sosandtof` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal` text NOT NULL,
  `numGoal` varchar(20) NOT NULL,
  `ranking` varchar(20) NOT NULL,
  `dateGoalAdded` varchar(30) NOT NULL,
  `dateNumGoal` varchar(30) NOT NULL,
  `dateRanking` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sosandtof`
--

LOCK TABLES `sosandtof` WRITE;
/*!40000 ALTER TABLE `sosandtof` DISABLE KEYS */;
INSERT INTO `sosandtof` VALUES (1,'Serve 70 cars at lunch','90','68','2013-04-20T04:00:00.000Z','2013-04-12T04:00:00.000Z','2013-04-30T04:00:00.000Z');
/*!40000 ALTER TABLE `sosandtof` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teameight`
--

DROP TABLE IF EXISTS `teameight`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teameight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal` text NOT NULL,
  `numGoal` varchar(20) NOT NULL,
  `ranking` varchar(20) NOT NULL,
  `dateGoalAdded` varchar(30) NOT NULL,
  `dateNumGoal` varchar(30) NOT NULL,
  `dateRanking` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teameight`
--

LOCK TABLES `teameight` WRITE;
/*!40000 ALTER TABLE `teameight` DISABLE KEYS */;
/*!40000 ALTER TABLE `teameight` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teamfive`
--

DROP TABLE IF EXISTS `teamfive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teamfive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal` text NOT NULL,
  `numGoal` varchar(20) NOT NULL,
  `ranking` varchar(20) NOT NULL,
  `dateGoalAdded` varchar(30) NOT NULL,
  `dateNumGoal` varchar(30) NOT NULL,
  `dateRanking` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teamfive`
--

LOCK TABLES `teamfive` WRITE;
/*!40000 ALTER TABLE `teamfive` DISABLE KEYS */;
INSERT INTO `teamfive` VALUES (4,'fghgfhgf','fghgfhf','fghgfhf','2013-04-26T04:55:58.622Z','2013-04-26T04:55:58.622Z','2013-04-26T04:55:58.622Z');
/*!40000 ALTER TABLE `teamfive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teamfour`
--

DROP TABLE IF EXISTS `teamfour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teamfour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal` text NOT NULL,
  `numGoal` varchar(20) NOT NULL,
  `ranking` varchar(20) NOT NULL,
  `dateGoalAdded` varchar(30) NOT NULL,
  `dateNumGoal` varchar(30) NOT NULL,
  `dateRanking` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teamfour`
--

LOCK TABLES `teamfour` WRITE;
/*!40000 ALTER TABLE `teamfour` DISABLE KEYS */;
/*!40000 ALTER TABLE `teamfour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teammemberinfo`
--

DROP TABLE IF EXISTS `teammemberinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teammemberinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(30) DEFAULT NULL,
  `lName` varchar(30) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `login` varchar(10) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teammemberinfo`
--

LOCK TABLES `teammemberinfo` WRITE;
/*!40000 ALTER TABLE `teammemberinfo` DISABLE KEYS */;
INSERT INTO `teammemberinfo` VALUES (51,'Vicki','Jordan','864.506.4089',NULL,'vickijordancfa@gmail.com','true','41e6d1b6878d62449858e94aae30fd8b49c06e95'),(55,'Savanna','Lewis','',NULL,'savannalewiscfa@gmail.com','true','17618f01a3a21b911c925bcb525a1d21abd30673'),(56,'Herb','Tyler','',NULL,'herbtylercfa@gmail.com','true','8afa669368f3a18d9bceabb5acc0b75be6abf209'),(61,'Caroline','Gallagher','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(63,'Morgan','Ford','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(64,'Karil','Tyler','864-986-9060',NULL,'kariltylercfa@gmail.com','true','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(67,'Jake','Crowther','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(68,'Josh','Dempsey','',NULL,'joshdempseycfa@gmail.com','true','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(69,'Judah','Dixon','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(70,'Austin','Evert','',NULL,'austinevertcfa@gmail.com','true','959e5c82c8977f7183eea2101a542c0761823f2e'),(72,'Morgan','Ford','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(73,'Emma','Fowler','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(74,'Tyler','Fowler','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(76,'Kenley','Hall','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(77,'Jonathan','Haile','',NULL,'jonhailecfa@gmail.com','true','7327a4231c6eb16687f5ed7df7d16e3e46552d18'),(79,'Aaron','Hunter','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(81,'Marah','Jordan','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(82,'Amber','King','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(83,'Nate','King','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(86,'Alan','Marionneaux','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(87,'Fahmarr','McElrathBey','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(88,'Joanie','Miller','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(89,'Albert','Morales','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(91,'Russell','Newton','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(92,'Daniel','Perry','',NULL,'danielperrycfa@gmail.com','true','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(94,'Kiana','Vazquez','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(98,'Ryan','Penny','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(101,'Caitlin ','Blackwell','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(105,'Rebekah','Dill','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(106,'Crystal','Fowler','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(108,'Kathy ','Haile','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(109,'Samuel','Haile','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(111,'Truitt','Helmendach','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(112,'Kaitlin','Holliday','',NULL,'kaitlinhollidaycfa@gmail.com','true','b5e65cc504080abc5bcd112b0d90bd25d2cea5ae'),(114,'Reagan','Kelley','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(116,'Guy','Lookabill','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(117,'Tabitha','Scrimpsher','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(118,'Emily','Shelnutt','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(119,'Taylor','Smith','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(120,'Corey','Thrasher','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(121,'Derek','Williams','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(122,'Jade','Burkeen','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(123,'Angie','Dickerson','',NULL,'angiedickersoncfa@gmail.com','true','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(124,'Katie ','Chute','',NULL,'katiechutecfa@gmail.com','true','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(126,'Katherine','Alimpach','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(127,'Larissa','Barkley','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(130,'Shyla','Coleman','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(131,'','','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(132,'','','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(133,'Rachel','Garvais','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(134,'','','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(135,'','','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(136,'','','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(137,'','','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(138,'','','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(139,'','','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(140,'','','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(141,'Merritt','Gantt','',NULL,'merrittganttcfa@gmail.com','true','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(146,'Katelyn','Ingram','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(147,'Anna','Lightsey','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(151,'Elizabeth','Myer','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(152,'Edgar','Pineda','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(153,'Mary','Smith','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(155,'Chris','Zeigler','',NULL,'chriszeiglercfa@gmail.com','true','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(156,'Beth','Shealy','',NULL,'bethshealycfa@gmail.com','true','d96d89a8c2fa6c015b269376c79edb9097a7423c'),(157,'Thacker','Staley','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(158,'','','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(159,'','','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(160,'','','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(161,'','','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(162,'','','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(163,'','','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(164,'','','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(165,'Allyson ','Eskew','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(166,'Ben','Rosenberger','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(167,'Sarah','Brown','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(168,'Alysia','Cruell','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(169,'Jacob','Davis','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(170,'Rachel','Garvais','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(171,'Isaac','Griffin','',NULL,'isaacgriffincfa@gmail.com','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(172,'Amanda','Hall','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(173,'Kelsey','Izzillo','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(174,'Dillon','Pundt','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(175,'Victor','Quintero','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(176,'Ashlyn','Stearns','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(177,'Brook','Watts','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(178,'Alisha','Anderson','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(179,'Karmin','Andrew','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(180,'Danielle','Elrod','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(181,'Jackie','Guiry','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(182,'Jasmine','Haynes','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(183,'Ashley','Jump','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(184,'Emily','McClendon','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(185,'Tyler','Pagliarini','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(186,'Rebekah','Welborn','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(187,'Aubrie','Bedell','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(188,'Anne-Julie','Dube','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(189,'Nick','Gibbons','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(190,'Nathan','Melchers','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(191,'Tivone','Wright','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(192,'Steven ','Brennan','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(193,'Brian','Carbon','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(194,'Wanda','Cloer','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(195,'Dushon','Cunningham','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(196,'Tyler','Lowe','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(197,'Dennis ','McGregory','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(198,'Tyler','McKee','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(199,'Nick','Moore','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(200,'Dalvin','Parks','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(201,'Jeremiah','Tesch','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(202,'Michaela ','McGovern','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(203,'Dakota','Gray','',NULL,'','false','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(204,'Brittany','Broome','',NULL,'Brittanybroomecfa@gmail.com','true','73a7fc9b432d0c1b8fc9eb33da2ee58fec009a3a'),(205,'Andy','Campbell','',NULL,'andycampbellcfa@gmail.com','true','640f8a3391315614e925b7962e7afb14708e47b0'),(206,'Isaac ','Griffin','',NULL,'isaacgriffincfa@gmail.com','true','8983e90d9094fb7d4fabcc33c0be24322489d70e'),(207,'Isaac','Griffin','',NULL,'isaacgriffincfa@gmail.com','true','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(208,'Brittany','Broome','',NULL,'Brittanybroomecfa@gmail.com','true','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(209,'Cody','Pelfrey','',NULL,'codypelfreycfa@gmail.com','true','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(210,'Andy','Campbell','',NULL,'andycampbellcfa@gmail.com','true','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(211,'Cody','Pelfrey','',NULL,'codypelfreycfa@gmail.com','true','7b4f075f3914bbd4bf9a26623d95954fa0dac20a'),(212,'Sheldon','Juncker','555-555-5555','55 Fifty-fifth Street','sheldonjuncker@gmail.com','true','7288edd0fc3ffcbe93a0cf06e3568e28521687bc');
/*!40000 ALTER TABLE `teammemberinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teammemberinfolog`
--

DROP TABLE IF EXISTS `teammemberinfolog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teammemberinfolog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `operation` varchar(20) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(61) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teammemberinfolog`
--

LOCK TABLES `teammemberinfolog` WRITE;
/*!40000 ALTER TABLE `teammemberinfolog` DISABLE KEYS */;
INSERT INTO `teammemberinfolog` VALUES (36,'2013-05-01 18:55:59','Add Member','cone.bart@gmail.com','sdfsd','Test Test'),(24,'2013-04-28 17:20:36','Add Member','vjordan@test.com','goodlookng1@yahoo.com','Paul Jordan'),(25,'2013-04-28 17:21:58','Add Member','vjordan@test.com','adamedwardscfa@gmail.com','Adam Edwards'),(26,'2013-04-28 17:22:05','Delete Member','vjordan@test.com','cone.bart@gmail.com','Barton Cone'),(27,'2013-04-28 17:22:08','Delete Member','vjordan@test.com','christopher.willis13@gmail.com','Chris Willis'),(28,'2013-04-28 17:22:11','Delete Member','vjordan@test.com','goodlookng1@yahoo.com','Paul Jordan'),(29,'2013-04-28 17:23:49','Add Member','vjordan@test.com','vickijordancfa@gmail.com','Vicki Jordan'),(30,'2013-04-28 17:25:49','Add Member','vickijordancfa@gmail.com','ericawomackcfa@gmail.com','Erica Womack'),(31,'2013-04-28 17:26:23','Add Member','vickijordancfa@gmail.com','chasewomackcfa@gmail.com','Chase Womack'),(32,'2013-04-28 17:26:45','Add Member','vickijordancfa@gmail.com','jonathanlassitercfa@gmail.com','Jonathan Lassiter'),(33,'2013-04-28 17:27:11','Add Member','vickijordancfa@gmail.com','savannalewiscfa@gmail.com','Savanna Lewis'),(34,'2013-04-28 17:27:32','Add Member','vickijordancfa@gmail.com','herbtylercfa@gmail.com','Herb Tyler'),(35,'2013-04-28 17:28:07','Add Member','vickijordancfa@gmail.com','ashleythompsoncfa@gmail.com','Ashley Thompson'),(37,'2013-05-04 19:45:49','Add Member','vickijordancfa@gmail.com','','Caroline Gallagher'),(38,'2013-05-04 19:46:05','Add Member','vickijordancfa@gmail.com','','Caroline Gallagher'),(39,'2013-05-04 19:47:03','Add Member','vickijordancfa@gmail.com','','Paul Jordan'),(40,'2013-05-04 19:48:24','Delete Member','vickijordancfa@gmail.com','','Paul Jordan'),(41,'2013-05-04 19:53:26','Add Member','cone.bart@gmail.com','','fgdgdg fdgfdgfdgd'),(42,'2013-05-04 19:53:30','Add Member','cone.bart@gmail.com','','fgdgdg fdgfdgfdgd'),(43,'2013-05-04 20:14:28','Add Member','cone.bart@gmail.com','Testing','Someone New'),(44,'2013-05-04 20:14:34','Delete Member','cone.bart@gmail.com','Testing','Someone New'),(45,'2013-05-04 20:14:36','Delete Member','cone.bart@gmail.com','','fgdgdg fdgfdgfdgd'),(46,'2013-05-04 20:14:38','Delete Member','cone.bart@gmail.com','','fgdgdg fdgfdgfdgd'),(47,'2013-05-04 20:42:49','Add Member','vickijordancfa@gmail.com','','Paul Jordan'),(48,'2013-05-04 20:43:54','Delete Member','vickijordancfa@gmail.com','','Paul Jordan'),(49,'2013-05-05 11:28:31','Delete Member','vickijordancfa@gmail.com','','Caroline Gallagher'),(50,'2013-05-05 11:29:00','Add Member','vickijordancfa@gmail.com','','Morgan Ford'),(51,'2013-05-06 12:22:49','Add Member','herbtylercfa@gmail.com','kariltylercfa@gmail.com','Karil Tyler'),(52,'2013-05-07 10:42:06','Add Member','cone.bart@gmail.com','cwillis@test.com','Chris Willis'),(53,'2013-05-07 10:42:27','Delete Member','cone.bart@gmail.com','cwillis@test.com','Chris Willis'),(54,'2013-05-14 12:53:37','Add Member','vickijordancfa@gmail.com','','Cera  Adams'),(55,'2013-05-14 16:29:10','Add Member','vickijordancfa@gmail.com','','Victoria Blackwell'),(56,'2013-05-14 16:29:28','Add Member','vickijordancfa@gmail.com','','Jake Crowther'),(57,'2013-05-14 16:29:41','Add Member','vickijordancfa@gmail.com','','Josh Dempsey'),(58,'2013-05-14 16:29:56','Add Member','vickijordancfa@gmail.com','','Judah Dixon'),(59,'2013-05-14 16:30:29','Add Member','vickijordancfa@gmail.com','','Austin Evert'),(60,'2013-05-14 16:30:42','Add Member','vickijordancfa@gmail.com','','Zach Farotto'),(61,'2013-05-14 16:30:51','Add Member','vickijordancfa@gmail.com','','Morgan Ford'),(62,'2013-05-14 16:31:00','Add Member','vickijordancfa@gmail.com','','Emma Fowler'),(63,'2013-05-14 16:31:09','Add Member','vickijordancfa@gmail.com','','Tyler Fowler'),(64,'2013-05-14 16:31:24','Add Member','vickijordancfa@gmail.com','','Caroline Gallagher'),(65,'2013-05-14 16:31:34','Add Member','vickijordancfa@gmail.com','','Kenley Hall'),(66,'2013-05-14 16:31:43','Add Member','vickijordancfa@gmail.com','','Jonathan Haile'),(67,'2013-05-14 16:31:55','Add Member','vickijordancfa@gmail.com','','Megan Holder'),(68,'2013-05-14 16:32:05','Add Member','vickijordancfa@gmail.com','','Aaron Hunter'),(69,'2013-05-14 16:32:16','Add Member','vickijordancfa@gmail.com','','Jennifer Johnson'),(70,'2013-05-14 16:32:27','Add Member','vickijordancfa@gmail.com','','Marah Jordan'),(71,'2013-05-14 16:32:37','Add Member','vickijordancfa@gmail.com','','King Amber'),(72,'2013-05-14 16:32:45','Add Member','vickijordancfa@gmail.com','','Nate King'),(73,'2013-05-14 16:32:53','Add Member','vickijordancfa@gmail.com','','Savannah Mabry'),(74,'2013-05-14 16:33:05','Add Member','vickijordancfa@gmail.com','','Alexander Madden'),(75,'2013-05-14 16:33:17','Add Member','vickijordancfa@gmail.com','','Alan Marionneaux'),(76,'2013-05-14 16:33:31','Add Member','vickijordancfa@gmail.com','','Fahmarr McElrathBey'),(77,'2013-05-14 16:33:40','Add Member','vickijordancfa@gmail.com','','Joanie Miller'),(78,'2013-05-14 16:34:07','Add Member','vickijordancfa@gmail.com','','Albert Morales'),(79,'2013-05-14 16:34:16','Add Member','vickijordancfa@gmail.com','','Jacob Morris'),(80,'2013-05-14 16:34:28','Add Member','vickijordancfa@gmail.com','','Russell Newton'),(81,'2013-05-14 16:34:44','Add Member','vickijordancfa@gmail.com','','Daniel Perry'),(82,'2013-05-14 16:34:52','Add Member','vickijordancfa@gmail.com','','Chris Tyler'),(83,'2013-05-14 16:35:06','Add Member','vickijordancfa@gmail.com','','Kiana Vazquez'),(84,'2013-05-15 17:08:53','Delete Member','vickijordancfa@gmail.com','cone.bart@gmail.com','Bart Cone'),(85,'2013-05-15 17:09:04','Delete Member','vickijordancfa@gmail.com','','Caroline Gallagher'),(86,'2013-06-19 19:41:33','Delete Member','vickijordancfa@gmail.com','jonathanlassitercfa@gmail.com','Jonathan Lassiter'),(87,'2013-06-19 19:41:37','Delete Member','vickijordancfa@gmail.com','ashleythompsoncfa@gmail.com','Ashley Thompson'),(88,'2013-06-19 19:41:44','Delete Member','vickijordancfa@gmail.com','','Cera  Adams'),(89,'2013-07-10 19:53:55','Add Member','vickijordancfa@gmail.com','cone.bart@gmail.com','Barton Cone'),(90,'2013-07-30 19:54:29','Add Member','vickijordancfa@gmail.com','ScottHarlancfa@gmail.com','Scott Harlan'),(91,'2013-07-30 19:56:05','Add Member','vickijordancfa@gmail.com','ninatrahancfa@gmail.com','Nina Trahan'),(92,'2013-08-29 03:33:33','Add Member','vickijordancfa@gmail.com','','Ryan Penny'),(93,'2013-10-18 20:17:24','Add Member','vickijordancfa@gmail.com','tylermartincfa@gmail.com','Tyler Martin'),(94,'2013-11-04 15:02:28','Delete Member','vickijordancfa@gmail.com','chasewomackcfa@gmail.com','Chase Womack'),(95,'2013-11-04 15:02:32','Delete Member','vickijordancfa@gmail.com','ericawomackcfa@gmail.com','Erica Womack'),(96,'2013-11-04 15:15:44','Add Member','vickijordancfa@gmail.com','','Jake Bentley'),(97,'2013-11-04 15:16:10','Add Member','vickijordancfa@gmail.com','','Caitlin  Blackwell'),(98,'2013-11-04 15:17:00','Add Member','vickijordancfa@gmail.com','','Ciara Cerqua'),(99,'2013-11-04 15:17:13','Add Member','vickijordancfa@gmail.com','','Travis Delgado'),(100,'2013-11-04 15:17:35','Add Member','vickijordancfa@gmail.com','','Ashley Dempsey'),(101,'2013-11-04 15:17:51','Add Member','vickijordancfa@gmail.com','','Rebekah Dill'),(102,'2013-11-04 15:18:13','Add Member','vickijordancfa@gmail.com','','Crystal Fowler'),(103,'2013-11-04 15:18:50','Add Member','vickijordancfa@gmail.com','','Jacob Goodnough'),(104,'2013-11-04 15:19:04','Add Member','vickijordancfa@gmail.com','','Kathy  Haile'),(105,'2013-11-04 15:19:13','Add Member','vickijordancfa@gmail.com','','Samuel Haile'),(106,'2013-11-04 15:19:29','Add Member','vickijordancfa@gmail.com','','Kaity Hayes'),(107,'2013-11-04 15:19:55','Add Member','vickijordancfa@gmail.com','','Truitt Helmendach'),(108,'2013-11-04 15:20:15','Add Member','vickijordancfa@gmail.com','','Kaitlin Holliday'),(109,'2013-11-04 15:20:30','Add Member','vickijordancfa@gmail.com','','Tarin Howard'),(110,'2013-11-04 15:20:52','Add Member','vickijordancfa@gmail.com','','Reagan Kelley'),(111,'2013-11-04 15:21:12','Add Member','vickijordancfa@gmail.com','','Will Henry Lawrence'),(112,'2013-11-04 15:21:30','Add Member','vickijordancfa@gmail.com','','Guy Lookabill'),(113,'2013-11-04 15:22:05','Add Member','vickijordancfa@gmail.com','','Tabitha Scrimpsher'),(114,'2013-11-04 15:22:42','Add Member','vickijordancfa@gmail.com','','Emily Shelnutt'),(115,'2013-11-04 15:22:57','Add Member','vickijordancfa@gmail.com','','Taylor Smith'),(116,'2013-11-04 15:23:13','Add Member','vickijordancfa@gmail.com','','Corey Thrasher'),(117,'2013-11-04 15:23:28','Add Member','vickijordancfa@gmail.com','','Derek Williams'),(118,'2013-11-04 15:23:47','Delete Member','vickijordancfa@gmail.com','','Jennifer Johnson'),(119,'2014-03-16 14:02:43','Delete Member','vickijordancfa@gmail.com','scottharlancfa@gmail.com','Scott Harlan'),(120,'2014-03-16 14:02:46','Delete Member','vickijordancfa@gmail.com','ninatrahancfa@gmail.com','Nina Trahan'),(121,'2014-03-16 14:02:52','Delete Member','vickijordancfa@gmail.com','cone.bart@gmail.com','Barton Cone'),(122,'2014-03-16 14:03:05','Delete Member','vickijordancfa@gmail.com','','Travis Delgado'),(123,'2014-03-16 14:03:12','Delete Member','vickijordancfa@gmail.com','','Kaity Hayes'),(124,'2014-03-16 14:05:36','Add Member','vickijordancfa@gmail.com','','Jade Burkeen'),(125,'2014-03-16 19:16:20','Add Member','vickijordancfa@gmail.com','angiedickersoncfa@gmail.com','Angie Dickerson'),(126,'2014-03-16 19:16:45','Add Member','vickijordancfa@gmail.com','katiechutecfa@gmail.com','Katie  Chute'),(127,'2014-06-24 12:56:12','Delete Member','vickijordancfa@gmail.com','','Will Henry Lawrence'),(128,'2014-06-24 12:56:18','Delete Member','vickijordancfa@gmail.com','','Tarin Howard'),(129,'2014-06-24 12:57:24','Add Member','vickijordancfa@gmail.com','','Beth Shealy'),(130,'2014-06-24 13:01:42','Delete Member','vickijordancfa@gmail.com','','Ciara Cerqua'),(131,'2014-06-24 13:01:45','Delete Member','vickijordancfa@gmail.com','','Jacob Morris'),(132,'2014-06-24 14:55:20','Add Member','vickijordancfa@gmail.com','','Katherine Alimpach'),(133,'2014-06-24 14:56:33','Add Member','vickijordancfa@gmail.com','','Larissa Barkley'),(134,'2014-06-24 14:57:30','Add Member','vickijordancfa@gmail.com','','Jordan Beckman'),(135,'2014-06-24 14:58:27','Add Member','vickijordancfa@gmail.com','','Chandler Caulder'),(136,'2014-06-24 14:58:58','Add Member','vickijordancfa@gmail.com','','Shyla Coleman'),(137,'2014-06-24 15:00:19','Add Member','vickijordancfa@gmail.com','',' '),(138,'2014-06-24 15:00:46','Add Member','vickijordancfa@gmail.com','',' '),(139,'2014-06-24 15:01:01','Add Member','vickijordancfa@gmail.com','',' '),(140,'2014-06-24 15:01:16','Add Member','vickijordancfa@gmail.com','',' '),(141,'2014-06-24 15:01:21','Add Member','vickijordancfa@gmail.com','',' '),(142,'2014-06-24 15:01:33','Add Member','vickijordancfa@gmail.com','',' '),(143,'2014-06-24 15:01:52','Add Member','vickijordancfa@gmail.com','',' '),(144,'2014-06-24 15:02:51','Add Member','vickijordancfa@gmail.com','',' '),(145,'2014-06-24 15:02:58','Add Member','vickijordancfa@gmail.com','',' '),(146,'2014-06-24 15:03:06','Add Member','vickijordancfa@gmail.com','',' '),(147,'2014-06-24 15:05:09','Add Member','vickijordancfa@gmail.com','','Merritt Gantt'),(148,'2014-06-24 15:05:44','Add Member','vickijordancfa@gmail.com','','Kathy Haile'),(149,'2014-06-24 15:06:50','Add Member','vickijordancfa@gmail.com','','Sam Haile'),(150,'2014-06-24 15:07:22','Add Member','vickijordancfa@gmail.com','','Aly Hammond'),(151,'2014-06-24 15:08:15','Add Member','vickijordancfa@gmail.com','','Grant Helmendach'),(152,'2014-06-24 15:09:20','Add Member','vickijordancfa@gmail.com','','Katelyn Ingram'),(153,'2014-06-24 15:10:08','Add Member','vickijordancfa@gmail.com','','Anna Lightsey'),(154,'2014-06-24 15:10:38','Add Member','vickijordancfa@gmail.com','','Guy Lookabill'),(155,'2014-06-24 15:11:23','Add Member','vickijordancfa@gmail.com','','Parker Moon'),(156,'2014-06-24 15:11:54','Add Member','vickijordancfa@gmail.com','','Grant Morris'),(157,'2014-06-24 15:12:17','Add Member','vickijordancfa@gmail.com','','Elizabeth Myer'),(158,'2014-06-24 15:12:50','Add Member','vickijordancfa@gmail.com','','Edgar Pineda'),(159,'2014-06-24 15:13:52','Add Member','vickijordancfa@gmail.com','','Mary Smith'),(160,'2014-06-24 15:14:09','Add Member','vickijordancfa@gmail.com','','JC Spearman'),(161,'2014-06-24 15:15:03','Add Member','vickijordancfa@gmail.com','','Chris Zeigler'),(162,'2014-07-23 17:33:28','Delete Member','vickijordancfa@gmail.com','tylermartincfa@gmail.com','Tyler Martin'),(163,'2014-07-23 17:33:38','Delete Member','vickijordancfa@gmail.com','','Jake Bentley'),(164,'2014-07-23 17:33:42','Delete Member','vickijordancfa@gmail.com','','Ashley Dempsey'),(165,'2014-09-05 18:37:35','Delete Member','vickijordancfa@gmail.com','','Savannah Mabry'),(166,'2014-09-05 18:37:38','Delete Member','vickijordancfa@gmail.com','','Alexander Madden'),(167,'2014-09-05 18:37:45','Delete Member','vickijordancfa@gmail.com','','Chris Tyler'),(168,'2014-09-13 19:06:13','Delete Member','vickijordancfa@gmail.com',' bethshealycfa@gmail.com','Beth Shealy'),(169,'2014-09-13 19:06:33','Add Member','vickijordancfa@gmail.com','bethshealycfa@gmail.com','Beth Shealy'),(170,'2014-09-21 15:15:23','Add Member','vickijordancfa@gmail.com','','Thacker Staley'),(171,'2015-02-16 18:23:11','Delete Member','vickijordancfa@gmail.com','adamedwardscfa@gmail.com','Adam Edwards'),(172,'2015-02-16 18:23:24','Delete Member','vickijordancfa@gmail.com','victoriablackwellcfa@gmail.com','Victoria Blackwell'),(173,'2015-02-16 18:23:38','Delete Member','vickijordancfa@gmail.com','','Megan Holder'),(174,'2015-02-16 18:23:42','Delete Member','vickijordancfa@gmail.com','','Zach Farotto'),(175,'2015-02-16 18:24:01','Delete Member','vickijordancfa@gmail.com','','Jacob Goodnough'),(176,'2015-02-16 18:24:22','Delete Member','vickijordancfa@gmail.com','','Chandler Caulder'),(177,'2015-02-16 18:24:26','Delete Member','vickijordancfa@gmail.com','','Jordan Beckman'),(178,'2015-02-16 18:24:42','Delete Member','vickijordancfa@gmail.com','','Kathy Haile'),(179,'2015-02-16 18:24:47','Delete Member','vickijordancfa@gmail.com','','Aly Hammond'),(180,'2015-02-16 18:24:51','Delete Member','vickijordancfa@gmail.com','','Grant Helmendach'),(181,'2015-02-16 18:24:55','Delete Member','vickijordancfa@gmail.com','','Sam Haile'),(182,'2015-02-16 18:25:21','Delete Member','vickijordancfa@gmail.com','','Parker Moon'),(183,'2015-02-16 18:25:24','Delete Member','vickijordancfa@gmail.com','','Grant Morris'),(184,'2015-02-16 18:25:29','Delete Member','vickijordancfa@gmail.com','','JC Spearman'),(185,'2015-02-16 18:28:19','Add Member','vickijordancfa@gmail.com','',' '),(186,'2015-02-16 18:28:38','Add Member','vickijordancfa@gmail.com','',' '),(187,'2015-02-16 18:28:59','Add Member','vickijordancfa@gmail.com','',' '),(188,'2015-02-16 18:29:16','Add Member','vickijordancfa@gmail.com','',' '),(189,'2015-02-16 18:29:39','Add Member','vickijordancfa@gmail.com','',' '),(190,'2015-02-16 18:29:51','Add Member','vickijordancfa@gmail.com','',' '),(191,'2015-02-16 18:30:25','Add Member','vickijordancfa@gmail.com','',' '),(192,'2015-02-16 18:31:27','Delete Member','vickijordancfa@gmail.com','','Guy Lookabill'),(193,'2015-02-16 18:31:57','Add Member','vickijordancfa@gmail.com','','Allyson  Eskew'),(194,'2015-02-16 18:32:18','Add Member','vickijordancfa@gmail.com','','Ben Rosenberger'),(195,'2015-02-16 18:32:34','Add Member','vickijordancfa@gmail.com','','Sarah Brown'),(196,'2015-02-16 18:32:56','Add Member','vickijordancfa@gmail.com','','Alysia Cruell'),(197,'2015-02-16 18:33:10','Add Member','vickijordancfa@gmail.com','','Jacob Davis'),(198,'2015-02-16 18:33:22','Add Member','vickijordancfa@gmail.com','','Rachel Garvais'),(199,'2015-02-16 18:33:46','Add Member','vickijordancfa@gmail.com','isaacgriffincfa@gmail.com','Isaac Griffin'),(200,'2015-02-16 18:34:00','Add Member','vickijordancfa@gmail.com','','Amanda Hall'),(201,'2015-02-16 18:34:14','Add Member','vickijordancfa@gmail.com','','Kelsey Izzillo'),(202,'2015-02-16 18:34:28','Add Member','vickijordancfa@gmail.com','','Dillon Pundt'),(203,'2015-02-16 18:34:43','Add Member','vickijordancfa@gmail.com','','Victor Quintero'),(204,'2015-02-16 18:34:56','Add Member','vickijordancfa@gmail.com','','Ashlyn Stearns'),(205,'2015-02-16 18:35:08','Add Member','vickijordancfa@gmail.com','','Brook Watts'),(206,'2015-02-16 18:35:24','Add Member','vickijordancfa@gmail.com','','Alisha Anderson'),(207,'2015-02-16 18:35:39','Add Member','vickijordancfa@gmail.com','','Karmin Andrew'),(208,'2015-02-16 18:35:54','Add Member','vickijordancfa@gmail.com','','Danielle Elrod'),(209,'2015-02-16 18:36:06','Add Member','vickijordancfa@gmail.com','','Jackie Guiry'),(210,'2015-02-16 18:37:10','Add Member','vickijordancfa@gmail.com','','Jasmine Haynes'),(211,'2015-02-16 18:37:25','Add Member','vickijordancfa@gmail.com','','Ashley Jump'),(212,'2015-02-16 18:37:39','Add Member','vickijordancfa@gmail.com','','Emily McClendon'),(213,'2015-02-16 18:38:03','Add Member','vickijordancfa@gmail.com','','Tyler Pagliarini'),(214,'2015-02-16 18:38:38','Add Member','vickijordancfa@gmail.com','','Rebekah Welborn'),(215,'2015-02-16 18:38:47','Add Member','vickijordancfa@gmail.com','','Aubrie Bedell'),(216,'2015-02-16 18:39:01','Add Member','vickijordancfa@gmail.com','','Anne-Julie Dube'),(217,'2015-02-16 18:39:13','Add Member','vickijordancfa@gmail.com','','Nick Gibbons'),(218,'2015-02-16 18:39:28','Add Member','vickijordancfa@gmail.com','','Nathan Melchers'),(219,'2015-02-16 18:39:40','Add Member','vickijordancfa@gmail.com','','Tivone Wright'),(220,'2015-02-16 18:39:55','Add Member','vickijordancfa@gmail.com','','Steven  Brennan'),(221,'2015-02-16 18:40:06','Add Member','vickijordancfa@gmail.com','','Brian Carbon'),(222,'2015-02-16 18:40:18','Add Member','vickijordancfa@gmail.com','','Wanda Cloer'),(223,'2015-02-16 18:40:31','Add Member','vickijordancfa@gmail.com','','Dushon Cunningham'),(224,'2015-02-16 18:40:43','Add Member','vickijordancfa@gmail.com','','Tyler Lowe'),(225,'2015-02-16 18:40:58','Add Member','vickijordancfa@gmail.com','','Dennis  McGregory'),(226,'2015-02-16 18:41:12','Add Member','vickijordancfa@gmail.com','','Tyler McKee'),(227,'2015-02-16 18:41:23','Add Member','vickijordancfa@gmail.com','','Nick Moore'),(228,'2015-02-16 18:41:34','Add Member','vickijordancfa@gmail.com','','Dalvin Parks'),(229,'2015-02-16 18:41:46','Add Member','vickijordancfa@gmail.com','','Jeremiah Tesch'),(230,'2015-02-16 18:42:19','Add Member','vickijordancfa@gmail.com','','Michaela  McGovern'),(231,'2015-02-16 18:42:34','Add Member','vickijordancfa@gmail.com','','Dakota Gray'),(232,'2015-12-05 06:17:13','Add Member','vickijordancfa@gmail.com','Brittanybroomecfa@gmail.com','Brittany Broome'),(233,'2015-12-05 06:17:40','Add Member','vickijordancfa@gmail.com','andycampbellcfa@gmail.com','Andy Campbell'),(234,'2015-12-05 06:18:04','Add Member','vickijordancfa@gmail.com','isaacgriffincfa@gmail.com','Isaac  Griffin'),(235,'2015-12-12 06:01:46','Add Member','vickijordancfa@gmail.com','isaacgriffincfa@gmail.com','Isaac Griffin'),(236,'2015-12-12 06:02:29','Add Member','vickijordancfa@gmail.com','Brittanybroomecfa@gmail.com','Brittany Broome'),(237,'2015-12-12 06:02:58','Add Member','vickijordancfa@gmail.com','codypelfreycfa@gmail.com','Cody Pelfrey'),(238,'2015-12-17 09:23:18','Add Member','vickijordancfa@gmail.com','andycampbellcfa@gmail.com','Andy Campbell'),(239,'2016-02-09 15:41:18','Add Member','vickijordancfa@gmail.com','codypelfreycfa@gmail.com','Cody Pelfrey');
/*!40000 ALTER TABLE `teammemberinfolog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teammemberissues`
--

DROP TABLE IF EXISTS `teammemberissues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teammemberissues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberID` int(11) NOT NULL,
  `dateOfIncident` varchar(30) DEFAULT NULL,
  `managerName` varchar(30) DEFAULT NULL,
  `issue` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teammemberissues`
--

LOCK TABLES `teammemberissues` WRITE;
/*!40000 ALTER TABLE `teammemberissues` DISABLE KEYS */;
INSERT INTO `teammemberissues` VALUES (1,1,'2013-03-06','Emily Cothran','Raging way to much in the kitchen and throwing chicken nuggest at customers...we don\'t know what his problem is, but it has to be addressed. '),(3,1,'2013-03-29','Vicki Jordan','Chris willis is talking to much and poking customers in the side while they\'re ordering. We have got to address this issue as soon as possible.'),(15,20,'2013-03-23T04:11:54.334Z','cxvx','xcvxcvcxvx'),(18,0,'2013-03-23T04:57:42.708Z','sdfs','sdfs'),(25,27,'2013-03-29T04:00:00.000Z','testing','one two three...'),(26,24,'2013-03-24T04:00:00.000Z','Chris','Won\'t stay at work'),(27,60,'2013-05-04T04:00:00.000Z','Testing','This finally works...'),(28,63,'2013-05-05T17:29:08.666Z','Vicki Jordan','On Monday, April 29, 2013, Vicki Jordan spoke with Morgan about her uniform, specifically her necklace and earrings.  This was the third time in a week and a half that she was reminded to take off a second set of earrings or to remove her necklace.  \nVicki also spoke to her about her facial expressions and her attitude towards guests and with team members.  Morgan responded that she didnâ€™t want to be at Chick-fil-A and had been looking for another job.  Morgan said that everyone else knew she didnâ€™t want to be here, but she couldnâ€™t leave because she had bills to pay.  Vicki told Morgan to let us know if we could do anything for her, but Morgan said she didnâ€™t want to talk about it.  \nVictoria Blackwell had spoken with Vicki about Morganâ€™s attitude toward her and how disrespectful it was.  \n'),(29,74,'2013-05-15T19:09:21.850Z','Savanna Lewis, Erica Womack, V','Vicki reminded Tyler today that cups were supposed to be kept under the fry station in the kitchen.  Tyler\'s response was, \"There\'s no room.\"  Vicki said other cups were down there, and there was plenty of room.  His attitude was very disrespectful.  He then moved his cup beside the bags of flour and not under the fry station.  At the end of the shift, Vicki told Tyler that we get points taken off each time the inspector comes for having cups out in the kitchen and that Adam said that\'s where all kitchen member cups have to be stored.  She told him that she expected him to do whatever she asked him to do the first time.  She also told him that his attitude was disrespectful and if others heard him talking like that that they would feel that they could talk like that as well.  Tyler apologized.  '),(30,74,'2013-05-21T19:40:58Z','Chase Womack','Today when the cookie timer went off, I saw Tyler rotate the pans 180 degrees but not switch the first and fifth row pans. I asked him to switch the pans for even cooking and he refused to do so. He said \"I make the best cookies in the restaurant and I don\'t switch the pans\". I reminded him that the proceedure is to switch pans and began to switch them for him. He got angry and said \"Don\'t touch my cookies\". Again I reminded him that at this CFA, we follow proceedures laid out by corporate. He got even more angry and punched the fry freezer next to the oven and shouted \"He\'s touching my cookies!\". He said that \"CFA needs to learn how to bake cookies. I know ya\'ll (managers) have theories but I do this everyday\".'),(31,76,'2013-08-21T04:00:00Z','Chase/Vicki','Today Vicki and I met with Kenly Hall to discuss her nails. She wore Acrylic nails with glitter nail polish . We told her that it was not acceptable and it presented a uniform and safety violation. She understood that she would be sent home next time she wore fake nails again.  '),(32,98,'2013-08-27T04:00:00.000Z','Vicki and Chase','Ryan Penny came to work  with his class ring on.  He has been told several times to take it off on previous shifts.  He was sent home and told that there was a possibility that he would be called in later in the day to come back in to work.  When Vicki called him later to come back in, he told her he had already made plans.  He immediately called back and said that he had had a couple of drinks and did not feel that he was in any condition to work.  Vicki thanked him for his honesty.'),(33,98,'2013-09-25T17:00:50Z','','	Victoria Blackwell answered the phone in the store at 11:50 a.m. on Wednesday, September 25, 2013. She saw that it was Ryan Penny calling and said â€œHello Ryan Penny how may I serve you?â€ He responded by saying very bluntly and rudely â€œhey I am not coming in today.â€ Victoria simply asked what his reasoning was and he said â€œI just have a lot of stuff to do and I am not coming in.â€ Victoria then asked if he was going to be able to come in and find somebody to cover his shift and he answered â€œno I just have too much f****** sh** to deal with and I am not coming inâ€¦Actually I am probably not ever going to f****** come in again.â€ Victoria said â€œoh so you are quitting?â€ He responded by saying â€œyeah pretty much because I canâ€™t deal with all of this sh** anymore.â€ Victoria then thanked him for calling and hung up the phone.'),(34,50,'2013-11-06T19:44:53Z','Adam','Martel Brown called the store in the middle of lunch today and claimed he got two meals yesterday and the fries and sandwiches were both cold. Said the only good part of his meal was his strawberry milkshake. I got the details of his order and told him i would call him back. I looked up his order, and even called him to get more details about his order, and could not find a matching order within our system. \n\nI believe he was simply trying to get free food. I called him back a third time to tell him I was unable to find anything within our system that matched what he described to me, and he did not answer or return my phone call. \n\nPlease be aware of customers calling to try and get free food. '),(35,102,'2014-02-22T23:46:28Z','','Ciara apparently forgot she had to work from 6 - 9:30 on Sat. 2/22/14. I didn\'t realize she wasnt here until around 6:15 and called her to come in. She apologized but doesnt understand how much it set us back. This is also not the only time she has been late for a shift.'),(36,102,'2014-03-15T20:33:14Z','','Ciara was suuposed to be at work at 4p.m. today. She has not called to let anyone know where she is. I tried calling Reagan to see if she had heard from her and she said no. Reagan called Ciara\'s mom and grandmother to see if they knew where she was but got no answer. It is now about 4:30 and still no Ciara. This is not the first time that she has just not showed up for work. When she arrives (if she does) she will be told to go home.'),(37,122,'2014-03-15T04:00:00.000Z','Vicki','We have had a few issues with Jade this week.  Since this was her first week back, I tried to encourage her by telling her that things had changed since she was here before.  This week, she was late for several shifts.  She was also told numerous times that she had to be in the complete CFA uniform including her jacket and that she could not wear the hood up on her head.  She was also unclear about how long she had for break.  She was clearly told what was expected while doing headset and when she was serving guests.  Unfortunately, after the reminders in these areas, she  still showed some inconsistencies in her performance.  We should continue to hold her accountable and give her clear expectations.  '),(38,122,'2014-03-31T13:50:16.791Z','Victoria','Today Jade called 10 minutes before she was supposed to be here saying that she had stayed overnight with a friend in Anderson and that\'s she had overslept because her alarm did not go off. She said that she was only going to be a few minutes late. \n She was asked where exactly she was and she said she was in Pendleton. Jade arrived 15 minutes late but was not in her uniform and had to go change her clothes before she came to work. This is the 3rd or 4th time that she has been late in the 3 weeks that she has been working here. She will be informed that it has been documented that she has been late. The next time she is late she will have to wait to have her break food until she is done working her shift. Please continue to encourage her to strive for excellence!');
/*!40000 ALTER TABLE `teammemberissues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teammemberissueslog`
--

DROP TABLE IF EXISTS `teammemberissueslog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teammemberissueslog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `operation` varchar(30) NOT NULL,
  `user` varchar(50) NOT NULL,
  `preservedMember` varchar(100) NOT NULL,
  `dateOfIncident` varchar(30) NOT NULL,
  `issue` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teammemberissueslog`
--

LOCK TABLES `teammemberissueslog` WRITE;
/*!40000 ALTER TABLE `teammemberissueslog` DISABLE KEYS */;
INSERT INTO `teammemberissueslog` VALUES (1,'2013-05-04 20:13:21','Created Issue','cone.bart@gmail.com','Bart Cone','2013-05-04T04:00:00.000Z','This finally works...'),(2,'2013-05-05 11:32:56','Created Issue','vickijordancfa@gmail.com','Morgan Ford','2013-05-05T17:29:08.666Z','On Monday, April 29, 2013, Vicki Jordan spoke with Morgan about her uniform, specifically her necklace and earrings.  This was the third time in a week and a half that she was reminded to take off a second set of earrings or to remove her necklace.  \nVicki also spoke to her about her facial expressions and her attitude towards guests and with team members.  Morgan responded that she didnâ€™t want to be at Chick-fil-A and had been looking for another job.  Morgan said that everyone else knew she didnâ€™t want to be here, but she couldnâ€™t leave because she had bills to pay.  Vicki told Morgan to let us know if we could do anything for her, but Morgan said she didnâ€™t want to talk about it.  \nVictoria Blackwell had spoken with Vicki about Morganâ€™s attitude toward her and how disrespectful it was.  \n'),(3,'2013-05-15 13:19:54','Created Issue','vickijordancfa@gmail.com','Tyler Fowler','2013-05-15T19:09:21.850Z','Vicki reminded Tyler today that cups were supposed to be kept under the fry station in the kitchen.  Tyler\'s response was, \"There\'s no room.\"  Vicki said other cups were down there, and there was plenty of room.  His attitude was very disrespectful.  He then moved his cup beside the bags of flour and not under the fry station.  At the end of the shift, Vicki told Tyler that we get points taken off each time the inspector comes for having cups out in the kitchen and that Adam said that\'s where all kitchen member cups have to be stored.  She told him that she expected him to do whatever she asked him to do the first time.  She also told him that his attitude was disrespectful and if others heard him talking like that that they would feel that they could talk like that as well.  Tyler apologized.  '),(4,'2013-05-21 13:49:06','Created Issue','chasewomackcfa@gmail.com','Tyler Fowler','2013-05-21T19:40:58Z','Today when the cookie timer went off, I saw Tyler rotate the pans 180 degrees but not switch the first and fifth row pans. I asked him to switch the pans for even cooking and he refused to do so. He said \"I make the best cookies in the restaurant and I don\'t switch the pans\". I reminded him that the proceedure is to switch pans and began to switch them for him. He got angry and said \"Don\'t touch my cookies\". Again I reminded him that at this CFA, we follow proceedures laid out by corporate. He got even more angry and punched the fry freezer next to the oven and shouted \"He\'s touching my cookies!\". '),(5,'2013-08-21 12:22:00','Created Issue','chasewomackcfa@gmail.com','Kenley Hall','2013-08-21T04:00:00Z','Today Vicki and I met with Kenly Hall to discuss her nails. She wore Acrylic nails with glitter nail polish . We told her that it was not acceptable and it presented a uniform and safety violation. She understood that she would be sent home next time she wore fake nails again.  '),(6,'2013-08-29 03:39:23','Created Issue','vickijordancfa@gmail.com','Ryan Penny','2013-08-27T04:00:00.000Z','Ryan Penny came to work  with his class ring on.  He has been told several times to take it off on previous shifts.  He was sent home and told that there was a possibility that he would be called in later in the day to come back in to work.  When Vicki called him later to come back in, he told her he had already made plans.  He immediately called back and said that he had had a couple of drinks and did not feel that he was in any condition to work.  Vicki thanked him for his honesty.'),(7,'2013-09-25 11:01:39','Created Issue','victoriablackwellcfa@gmail.com','Ryan Penny','2013-09-25T17:00:50Z','	Victoria Blackwell answered the phone in the store at 11:50 a.m. on Wednesday, September 25, 2013. She saw that it was Ryan Penny calling and said â€œHello Ryan Penny how may I serve you?â€ He responded by saying very bluntly and rudely â€œhey I am not coming in today.â€ Victoria simply asked what his reasoning was and he said â€œI just have a lot of stuff to do and I am not coming in.â€ Victoria then asked if he was going to be able to come in and find somebody to cover his shift and he answered â€œno I just have too much f****** sh** to deal with and I am not coming inâ€¦Actually I am probably not ever going to f****** come in again.â€ Victoria said â€œoh so you are quitting?â€ He responded by saying â€œyeah pretty much because I canâ€™t deal with all of this sh** anymore.â€ Victoria then thanked him for calling and hung up the phone.'),(8,'2013-11-06 12:48:35','Created Issue','adamedwardscfa@gmail.com','','2013-11-06T19:44:53Z','Martel Brown called the store in the middle of lunch today and claimed he got two meals yesterday and the fries and sandwiches were both cold. Said the only good part of his meal was his strawberry milkshake. I got the details of his order and told him i would call him back. I looked up his order, and even called him to get more details about his order, and could not find a matching order within our system. \r\n\r\nI believe he was simply trying to get free food. I called him back a third time to tell him I was unable to find anything within our system that matched what he described to me, and he did not answer or return my phone call. \r\n\r\nPlease be aware of customers calling to try and get free food. '),(9,'2014-02-22 16:48:18','Created Issue','austinevertcfa@gmail.com','Ciara Cerqua','2014-02-22T23:46:28Z','Ciara apparently forgot she had to work from 6 - 9:30 on Sat. 2/22/14. I didn\'t realize she wasnt here until around 6:15 and called her to come in. She apologized but doesnt understand how much it set us back. This is also not the only time she has been late for a shift.'),(10,'2014-03-15 14:36:04','Created Issue','victoriablackwellcfa@gmail.com','Ciara Cerqua','2014-03-15T20:33:14Z','Ciara was suuposed to be at work at 4p.m. today. She has not called to let anyone know where she is. I tried calling Reagan to see if she had heard from her and she said no. Reagan called Ciara\'s mom and grandmother to see if they knew where she was but got no answer. It is now about 4:30 and still no Ciara. This is not the first time that she has just not showed up for work. When she arrives (if she does) she will be told to go home.'),(11,'2014-03-16 14:55:50','Created Issue','vickijordancfa@gmail.com','Jade Burkeen','2014-03-15T04:00:00.000Z','We have had a few issues with Jade this week.  Since this was her first week back, I tried to encourage her by telling her that things had changed since she was here before.  This week, she was late for several shifts.  She was also told numerous times that she had to be in the complete CFA uniform including her jacket and that she could not wear the hood up on her head.  She was also unclear about how long she had for break.  She was clearly told what was expected while doing headset and when she was serving guests.  Unfortunately, after the reminders in these areas, she  still showed some inconsistencies in her performance.  We should continue to hold her accountable and give her clear expectations.  '),(12,'2014-03-31 07:58:30','Created Issue','victoriablackwellcfa@gmail.com','Jade Burkeen','2014-03-31T13:50:16.791Z','Today Jade called 10 minutes before she was supposed to be here saying that she had stayed overnight with a friend in Anderson and that\'s she had overslept because her alarm did not go off. She said that she was only going to be a few minutes late. \n She was asked where exactly she was and she said she was in Pendleton. Jade arrived 15 minutes late but was not in her uniform and had to go change her clothes before she came to work. This is the 3rd or 4th time that she has been late in the 3 weeks that she has been working here. She will be informed that it has been documented that she has been late. The next time she is late she will have to wait to have her break food until she is done working her shift. Please continue to encourage her to strive for excellence!');
/*!40000 ALTER TABLE `teammemberissueslog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teammemberlate`
--

DROP TABLE IF EXISTS `teammemberlate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teammemberlate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberID` int(11) NOT NULL,
  `date` varchar(30) DEFAULT NULL,
  `arrivalTime` varchar(8) DEFAULT NULL,
  `scheduledTime` varchar(8) DEFAULT NULL,
  `managerName` varchar(30) DEFAULT NULL,
  `comments` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teammemberlate`
--

LOCK TABLES `teammemberlate` WRITE;
/*!40000 ALTER TABLE `teammemberlate` DISABLE KEYS */;
INSERT INTO `teammemberlate` VALUES (2,1,'3/25/2013','3:00pm','12:00pm','Emily Cothran','He\'s late again...'),(3,24,'1991-05-02T04:00:00.000Z','3:00pm','11:00pm','Christopher Willis','He is always LATE'),(6,26,'2013-03-23T04:00:00.000Z','is lat','all','the','fnnfndfndnsfg'),(8,28,'2013-04-03T00:49:04.904Z','sdafads','sadfads','asdf','sadfasdf'),(9,27,'2013-04-02T04:00:00.000Z','fdsfs','dsf','dfs','dfsdfsd'),(10,25,'2013-04-02T04:00:00.000Z','dfds','dfs','f','ddf'),(11,35,'2013-04-08T16:46:43.740Z','10:00 AM','9:30 AM','Vicki Jordan','He\'s alway LATE! Yes he is.'),(12,157,'2014-09-19T04:00:00.000Z','0:00','6:15 AM','VJ','Thacker was scheduled to work at 6:15 AM.  We started calling him around 6:30 AM.  There was no answer.  We left several messages, and he did not call the store all day.  He eventually reached Josh D. and told him that his phone had been smashed the day before.  He had overslept a few weeks prior.  '),(13,146,'2014-10-11T04:00:00.000Z','6:07 am','6:00 am','VJ','');
/*!40000 ALTER TABLE `teammemberlate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teamone`
--

DROP TABLE IF EXISTS `teamone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teamone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal` text NOT NULL,
  `numGoal` varchar(20) NOT NULL,
  `ranking` varchar(20) NOT NULL,
  `dateGoalAdded` varchar(30) NOT NULL,
  `dateNumGoal` varchar(30) NOT NULL,
  `dateRanking` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teamone`
--

LOCK TABLES `teamone` WRITE;
/*!40000 ALTER TABLE `teamone` DISABLE KEYS */;
/*!40000 ALTER TABLE `teamone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teamName` varchar(50) NOT NULL,
  `inUse` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'Team One','1'),(2,'Team Two','1'),(3,'Team Three','1'),(4,'Team Four','1'),(5,'Team Five','1'),(6,'Team Six','1'),(7,'Team Seven','1'),(8,'Team Eight','1');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teamseven`
--

DROP TABLE IF EXISTS `teamseven`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teamseven` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal` text NOT NULL,
  `numGoal` varchar(20) NOT NULL,
  `ranking` varchar(20) NOT NULL,
  `dateGoalAdded` varchar(30) NOT NULL,
  `dateNumGoal` varchar(30) NOT NULL,
  `dateRanking` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teamseven`
--

LOCK TABLES `teamseven` WRITE;
/*!40000 ALTER TABLE `teamseven` DISABLE KEYS */;
/*!40000 ALTER TABLE `teamseven` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teamsix`
--

DROP TABLE IF EXISTS `teamsix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teamsix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal` text NOT NULL,
  `numGoal` varchar(20) NOT NULL,
  `ranking` varchar(20) NOT NULL,
  `dateGoalAdded` varchar(30) NOT NULL,
  `dateNumGoal` varchar(30) NOT NULL,
  `dateRanking` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teamsix`
--

LOCK TABLES `teamsix` WRITE;
/*!40000 ALTER TABLE `teamsix` DISABLE KEYS */;
/*!40000 ALTER TABLE `teamsix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teamthree`
--

DROP TABLE IF EXISTS `teamthree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teamthree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal` text NOT NULL,
  `numGoal` varchar(20) NOT NULL,
  `ranking` varchar(20) NOT NULL,
  `dateGoalAdded` varchar(30) NOT NULL,
  `dateNumGoal` varchar(30) NOT NULL,
  `dateRanking` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teamthree`
--

LOCK TABLES `teamthree` WRITE;
/*!40000 ALTER TABLE `teamthree` DISABLE KEYS */;
/*!40000 ALTER TABLE `teamthree` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teamtwo`
--

DROP TABLE IF EXISTS `teamtwo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teamtwo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goal` text NOT NULL,
  `numGoal` varchar(20) NOT NULL,
  `ranking` varchar(20) NOT NULL,
  `dateGoalAdded` varchar(30) NOT NULL,
  `dateNumGoal` varchar(30) NOT NULL,
  `dateRanking` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teamtwo`
--

LOCK TABLES `teamtwo` WRITE;
/*!40000 ALTER TABLE `teamtwo` DISABLE KEYS */;
/*!40000 ALTER TABLE `teamtwo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-11  8:23:55
