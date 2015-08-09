-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: answersvid
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `video_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `commentable_id` int(11) NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_reserved_at_index` (`queue`,`reserved`,`reserved_at`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (47,'default','{\"job\":\"Illuminate\\\\Events\\\\CallQueuedHandler@call\",\"data\":{\"class\":\"App\\\\Events\\\\IndexQuestionInSearch\",\"method\":\"handle\",\"data\":\"a:1:{i:0;O:29:\\\"App\\\\Events\\\\QuestionWasCreated\\\":1:{s:8:\\\"question\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:8:\\\"App\\\\Post\\\";s:2:\\\"id\\\";i:4;}}}\"}}',0,0,NULL,1437763788,1437763788),(48,'default','{\"job\":\"Illuminate\\\\Events\\\\CallQueuedHandler@call\",\"data\":{\"class\":\"App\\\\Events\\\\IndexQuestionInSearch\",\"method\":\"handle\",\"data\":\"a:1:{i:0;O:29:\\\"App\\\\Events\\\\QuestionWasCreated\\\":1:{s:8:\\\"question\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:8:\\\"App\\\\Post\\\";s:2:\\\"id\\\";i:5;}}}\"}}',0,0,NULL,1437767219,1437767219),(49,'default','{\"job\":\"Illuminate\\\\Events\\\\CallQueuedHandler@call\",\"data\":{\"class\":\"App\\\\Events\\\\IndexQuestionInSearch\",\"method\":\"handle\",\"data\":\"a:1:{i:0;O:29:\\\"App\\\\Events\\\\QuestionWasCreated\\\":1:{s:8:\\\"question\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":2:{s:5:\\\"class\\\";s:8:\\\"App\\\\Post\\\";s:2:\\\"id\\\";i:1;}}}\"}}',0,0,NULL,1437768834,1437768834),(50,'default','{\"job\":\"mailer@handleQueuedMessage\",\"data\":{\"view\":\"emails.contact\",\"data\":{\"email\":\"iamfaizahmed123@gmail.com\",\"name\":\"Rana Faiz Ahmad\",\"subject\":\"Subject\",\"bodyMessage\":\"This is my message.\"},\"callback\":\"C:32:\\\"SuperClosure\\\\SerializableClosure\\\":279:{a:5:{s:4:\\\"code\\\";s:149:\\\"function ($message) {\\n    $message->to(\'iamfaizahmed123@gmail.com\', \'Rana Faiz Ahmad\');\\n    $message->subject(\'AnswersVid: Contact Form Message\');\\n};\\\";s:7:\\\"context\\\";a:0:{}s:7:\\\"binding\\\";N;s:5:\\\"scope\\\";s:29:\\\"App\\\\Jobs\\\\SendContactFormEmail\\\";s:8:\\\"isStatic\\\";b:0;}}\"}}',0,0,NULL,1438610362,1438610362),(51,'default','{\"job\":\"mailer@handleQueuedMessage\",\"data\":{\"view\":\"emails.contact\",\"data\":{\"email\":\"iamfaizahmed123@gmail.com\",\"name\":\"Faiz Ahmad\",\"subject\":\"Subject\",\"bodyMessage\":\"Message.\"},\"callback\":\"C:32:\\\"SuperClosure\\\\SerializableClosure\\\":279:{a:5:{s:4:\\\"code\\\";s:149:\\\"function ($message) {\\n    $message->to(\'iamfaizahmed123@gmail.com\', \'Rana Faiz Ahmad\');\\n    $message->subject(\'AnswersVid: Contact Form Message\');\\n};\\\";s:7:\\\"context\\\";a:0:{}s:7:\\\"binding\\\";N;s:5:\\\"scope\\\";s:29:\\\"App\\\\Jobs\\\\SendContactFormEmail\\\";s:8:\\\"isStatic\\\";b:0;}}\"}}',0,0,NULL,1439061676,1439061676);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_06_28_095046_create_questions_table',2),('2015_06_28_164224_create_posts_table',3),('2015_06_30_091533_create_comments_table',4),('2015_06_30_141534_create_tags_table',5),('2015_07_02_052542_create_views_table',6),('2015_07_02_091135_drop_views_column_from_posts_table',7),('2015_07_02_112053_create_votes_table',8),('2015_07_04_114553_add_columns_in_posts_table_for_answers',9),('2015_07_04_125802_create_answers_table',10),('2015_07_04_165315_remove_views_column_from_posts_table',11),('2015_07_05_063326_add_user_id_column_in_answers_table',12),('2015_07_06_093414_add_is_answer_field_in_comments_table',13),('2015_07_07_074600_drop_old_comments_table',14),('2015_07_07_075140_create_new_comments_table',15),('2015_07_16_074824_update_answers_table_exclude_website_etc',16),('2015_07_20_145520_create_jobs_table',17);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('iamfaizahmed123@gmail.com','2afaed27230f51ac297caa9c45185409e9135fa83e352c8159777a092a820cbf','2015-08-08 14:59:00');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_tag` (
  `post_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  KEY `post_tag_post_id_index` (`post_id`),
  KEY `post_tag_tag_id_index` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag`
--

LOCK TABLES `post_tag` WRITE;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
INSERT INTO `post_tag` VALUES (9,3),(10,4),(11,3),(12,4),(12,3),(12,2),(12,1),(13,4),(13,3),(13,2),(13,1),(14,3),(15,3),(16,2),(17,1),(18,3),(18,1),(8,1),(6,1),(7,1),(33,3),(233,3),(233,1),(237,3),(238,1),(2,1),(4,1),(5,3),(1,1),(1043,1),(1,4),(1,3),(1,2),(2,2),(3,2),(3,1),(17,4),(17,3),(17,2),(18,4),(18,2);
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_title_unique` (`title`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `answers` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `questions_title_unique` (`title`),
  UNIQUE KEY `questions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'How to make a simple website from scratch?','Can somebody show me how to make a website from scratch? Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, laboriosam natus nobis quas facilis delectus magnam velit deleniti provident ipsa reprehenderit ipsum laborum doloremque sunt itaque ut dolor, consectetur et. Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, laboriosam natus nobis quas facilis delectus magnam velit deleniti provident ipsa reprehenderit ipsum laborum doloremque sunt itaque ut dolor, consectetur et.','how-to-make-a-simple-website-from-scratch',1,5,2,25,'2015-06-28 05:00:47','2015-06-28 05:00:47'),(2,'How to code the code?','I need to know the best way to code the code. Can anyone help me?','how-to-code-the-code',1,0,0,0,'2015-06-28 05:41:53','2015-06-28 05:41:53'),(3,'How to change the background color of the body element with css?','Hello everybody! I want to know how to change the background color of the body element with css. ','how-to-change-the-background-color-of-the-body-element-with-css',1,0,0,0,'2015-06-28 06:33:20','2015-06-28 06:33:20'),(4,'How to code php?','<p>In this question I am going to ask about how to create a simple code in php?</p><p><br></p><pre>&lt;?php echo \'Hello World!\'; ?&gt;</pre>','how-to-code-php',1,0,0,0,'2015-06-28 08:39:24','2015-06-28 08:39:24'),(5,'How to learn javascript?','<p>How can I learn javascript?????</p><pre>function saySomething(thing) {\r\n    alert(thing);\r\n\r\n}\r\n\r\nsaySomething(\'Hello World\');</pre><p>Is it correct?</p>','how-to-learn-javascript',10,0,0,0,'2015-06-28 08:42:42','2015-06-28 08:42:42');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'html','2015-07-01 08:32:15','2015-07-01 08:33:29'),(2,'css','2015-07-01 08:33:48','2015-07-01 08:33:48'),(3,'javascript','2015-07-01 08:34:00','2015-07-01 08:34:00'),(4,'php','2015-07-01 08:34:10','2015-07-01 08:34:10');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'FAIZ AHMED','iamfaizahmed123@gmail.com','',0,'cczEG5qlaNcXWzrVsxLYnVIfh0lvorPQ8h3OoLRS6DdTPt4O5SZn2NRe3JoI','2015-08-08 14:58:34','2015-08-09 02:27:02');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `views`
--

DROP TABLE IF EXISTS `views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `views` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `views`
--

LOCK TABLES `views` WRITE;
/*!40000 ALTER TABLE `views` DISABLE KEYS */;
INSERT INTO `views` VALUES (1,'127.0.0.1',1,'2015-07-19 12:59:35','2015-07-19 12:59:35'),(2,'127.0.0.1',3,'2015-07-20 10:05:14','2015-07-20 10:05:14'),(3,'127.0.0.1',4,'2015-07-20 10:05:49','2015-07-20 10:05:49'),(4,'127.0.0.1',5,'2015-07-20 10:06:30','2015-07-20 10:06:30'),(5,'127.0.0.1',6,'2015-07-20 10:08:43','2015-07-20 10:08:43'),(6,'127.0.0.1',7,'2015-07-20 10:15:45','2015-07-20 10:15:45'),(7,'127.0.0.1',33,'2015-07-21 01:37:34','2015-07-21 01:37:34'),(8,'127.0.0.1',233,'2015-07-24 08:48:29','2015-07-24 08:48:29'),(9,'127.0.0.1',2,'2015-07-24 12:25:13','2015-07-24 12:25:13'),(10,'127.0.0.1',545,'2015-07-25 13:34:26','2015-07-25 13:34:26'),(11,'127.0.0.1',62,'2015-07-25 13:43:56','2015-07-25 13:43:56'),(12,'127.0.0.1',988,'2015-07-26 08:22:06','2015-07-26 08:22:06'),(13,'127.0.0.1',989,'2015-07-26 08:30:10','2015-07-26 08:30:10'),(14,'127.0.0.1',990,'2015-07-26 08:30:18','2015-07-26 08:30:18'),(15,'127.0.0.1',17,'2015-07-26 08:58:37','2015-07-26 08:58:37'),(16,'127.0.0.1',1042,'2015-07-29 03:19:28','2015-07-29 03:19:28'),(17,'127.0.0.1',997,'2015-07-29 05:40:43','2015-07-29 05:40:43'),(18,'127.0.0.1',996,'2015-07-30 12:52:56','2015-07-30 12:52:56'),(19,'127.0.0.1',1043,'2015-08-01 04:02:04','2015-08-01 04:02:04'),(20,'127.0.0.1',18,'2015-08-08 14:18:36','2015-08-08 14:18:36');
/*!40000 ALTER TABLE `views` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('upvote','downvote') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes`
--

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
INSERT INTO `votes` VALUES (1,2,184,'upvote','2015-08-02 02:05:51','2015-08-02 02:05:51'),(2,2,182,'upvote','2015-08-02 02:11:50','2015-08-02 02:11:50');
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-09 15:03:58
