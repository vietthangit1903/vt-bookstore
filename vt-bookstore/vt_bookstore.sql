-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 03:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vt_bookstore`
--
CREATE DATABASE IF NOT EXISTS `vt_bookstore` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `vt_bookstore`;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `name`, `address`, `user_id`, `deleted_at`) VALUES
(1, 'Home', '6 Nguyen Chi Thanh St., Lane 91/45, Dong Da Dist., Hanoi, Vietnam', 1, NULL),
(5, 'Home 1', '67/5C Tam Dong Hamlet, Thoi Tam Thon Ward, Hoc Mon District, Ho Chi Minh City', 6, NULL),
(7, 'CTU', 'Khu II, Đ. 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ Vietnam', 1, NULL),
(8, 'Abc company', '2/186 Tan Lap Hamlet, Tan Thoi Nhi Ward, Hoc Mon Dist, Ho Chi Minh City', 1, NULL),
(9, 'Company', '811A Ta Quang Buu St., Ward 5, Dist. 8, Ho Chi Minh City', 3, NULL),
(10, 'Home', '45 Le Duan Street, Ben Nghe Ward, District 1, Ho Chi Minh City', 3, NULL),
(11, 'Home', '78 Bach Dang, Ha Noi', 4, NULL),
(12, 'Home', '124 Nguyen Du Street, Can Tho, Vietnam', 5, NULL),
(13, 'School', 'Campus II, 3/2 street, Xuan Khanh ward, Ninh Kieu district, Can Tho city, Vietnam', 3, NULL),
(14, 'New profile 29-11-2022 22:12:58', 'Test auto creates address', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `description`, `deleted_at`) VALUES
(1, 'Brandon Moore', 'Brandon was born in Bridgeton, NJ in 1991. He started writing in the first grade when his teacher gave him an assignment to write a story that had to do with Halloween. He chose to write a story about werewolves and the rest is history. Since then he\'s written poetry, lyrics to quite a few songs, a ton of reviews on music, movies, video games, etc.', NULL),
(2, 'Colleen Hoover', 'Colleen Hoover is the #1 New York Times and International bestselling author of multiple novels and novellas. She lives in Texas with her husband and their three boys. She is the founder of The Bookworm Box, a non-profit book subscription service and bookstore in Sulphur Springs, Texas.\r\n\r\nFor more information and for a schedule of events, please visit colleenhoover.com.', NULL),
(3, 'Sergio Cariello', 'Born in Brazil. At the age of 5 I already knew I wanted to draw comics. At 11 I had my first comic strip published in Local newspapers-Frederico, the Detective. At Caliber Press penciled, inked and lettered the HP Lovecraft\'s Dagon, with writer Steven Jones. At Marvel I drew Daredevil, Conan, Thor, Captain America, Disney\'s Quasimodo, Spider-man, the Avengers and others. Drew Batman, Superman, New Gods, Young Heroes in Love, \r\nSuper boy, Steel, Guy Gardner, Hawk man, Man called X, The Flash, Deathstroke, Wonderwoman, Green Arrow, Azrael and others for DC. Taught 7 yrs at the Joe Kubert School. Member of the National Cartoonists Society since 1995.', NULL),
(4, 'Dale Carnegie', 'Dale Carnegie (1888-1955) described himself as a \"simple country boy\" from Missouri but was also a pioneer of the self-improvement genre. Since the 1936 publication of his first book, How to Win Friends and Influence People, he has touched millions of readers and his classic works continue to impact lives to this day.', NULL),
(5, 'Stephen R. Covey', 'Stephen R. Covey is a renowned leadership authority, family expert, teacher, organizational consultant, and co-founder of Franklin Covey Co. He is author of several international bestsellers, including The 7 Habits of Highly Effective People, which has sold over 20 million copies. He was named one of TIME Magazine\'s 25 Most Influential Americans. Dr. Covey holds the Jon M. Huntsman Presidential Chair in Leadership at the Huntsman School of Business at Utah State University.', NULL),
(6, 'Hunt A Killer', 'No description', NULL),
(8, 'test author delete', 'Loremfafadsfsf', '2022-11-15 16:50:52'),
(9, 'Steve Martin', 'Steve Martin is one of today\'s most talented performers. His huge successes as a film actor include such credits as ROXANNE, FATHER OF THE BRIDE, PARENTHOOD and THE SPANISH PRISONER. He has won Emmys for his television writing and two Grammys for comedy albums. In addition to the bestselling PURE DRIVEL, he has written several plays, including Picasso at the Lapin Agile and a highly acclaimed novel, SHOPGIRL. His work appears in The New Yorker and The New York Times.', NULL),
(10, 'Jay C. LaBarge', 'A graduate of Syracuse University, Jay LaBarge spent his professional career growing companies in the technology industry. A businessman by profession but historian by passion, he and his wife Sandy raised their daughters Ashley and Kara in the Central New York area, with frequent trips to his childhood home in the Adirondack Mountains.\r\n\r\nHe continues to pursue his love of ancient and world history by traveling with his wife to out of the way places both domestically and abroad. His lifetime of curiosity and wanderlust ultimately led to the creation of the Nick LaBounty historical action-adventure series.', NULL),
(11, 'Brothers Grimm', 'The Brothers Grimm, Jacob (1785–1863) and Wilhelm (1786–1859), were scholars best known for their lifelong dedication to collecting and publishing ancient German folk tales. Their groundbreaking Kinder- und Hausmärchen (Children’s and Household Tales) was published in seven different editions between 1812 and 1857 and brought to the world’s attention such unforgettable characters as Cinderella, Hansel and Gretel, Rapunzel, and Snow White.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `publishDate` date NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `publisher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `description`, `price`, `stock`, `publishDate`, `author_id`, `category_id`, `publisher_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'It Starts with Us', 'Lily and her ex-husband, Ryle, have just settled into a civil coparenting rhythm when she suddenly bumps into her first love, Atlas, again. After nearly two years separated, she is elated that for once, time is on their side, and she immediately says yes when Atlas asks her on a date.\r\n\r\nBut her excitement is quickly hampered by the knowledge that, though they are no longer married, Ryle is still very much a part of her life—and Atlas Corrigan is the one man he will hate being in his ex-wife and daughter’s life.\r\n\r\nSwitching between the perspectives of Lily and Atlas, It Starts with Us picks up right where the epilogue for the “gripping, pulse-pounding” (Sarah Pekkanen, author of Perfect Neighbors) bestselling phenomenon It Ends with Us left off. Revealing more about Atlas’s past and following Lily as she embraces a second chance at true love while navigating a jealous ex-husband, it proves that “no one delivers an emotional read like Colleen Hoover” (Anna Todd, New York Times bestselling author).', '17.99', 33, '2022-10-18', 2, 5, 12, '2022-11-17 20:21:07', '2022-12-02 08:10:13', NULL),
(2, 'Number One Is Walking: My Life in the Movies and Other Diversions', 'Steve Martin has never written about his career in the movies before. In Number One Is Walking, he shares anecdotes from the sets of his beloved films―Father of the Bride, Roxanne, The Jerk, Three Amigos, and many more―bringing readers directly into his world. He shares charming tales of antics, moments of inspiration, and exploits with the likes of Paul McCartney, Diane Keaton, Robin Williams, and Chevy Chase. Martin details his forty years in the movie biz, as well as his stand-up comedy, banjo playing, writing, and cartooning, all with his unparalleled wit.\r\n\r\nWith gorgeously illustrated cartoons and single panel “diversions” in Steve and Harry’s signature style, Number One Is Walking is full of the everyday moments that make up a movie star’s life, capturing Steve Martin’s singular humor and acclaimed career in film. The perfect gift from the team who brought you the #1 New York Times bestseller A Wealth of Pigeons.', '21.00', 19, '2022-11-15', 9, 3, 1, '2022-11-17 20:38:02', '2022-11-30 17:58:31', NULL),
(3, 'How to Win Friends & Influence People', 'You can go after the job you want—and get it!\r\n\r\nYou can take the job you have—and improve it!\r\n\r\nYou can take any situation—and make it work for you!\r\n\r\nDale Carnegie’s rock-solid, time-tested advice has carried countless people up the ladder of success in their business and personal lives. One of the most groundbreaking and timeless bestsellers of all time, How to Win Friends & Influence People will teach you:\r\n\r\n-Six ways to make people like you\r\n\r\n-Twelve ways to win people to your way of thinking', '10.50', 94, '1998-10-01', 4, 18, 11, '2022-11-18 01:45:40', '2022-12-02 08:13:34', NULL),
(4, 'The Bet Between Us', 'Donald Carlino only cares about three things: money, getting girls, and gambling. His friends are so impressed with his abilities with women, they start calling him Don Juan. When senior year starts, he’s got a list of girls he wants to add to the growing number of notches on his headboard. So, when his best friend, Thomas, bets Donald that his skills aren’t enough to nab the school valedictorian, Alaina Pizzo, Donald is up for the challenge. What Thomas doesn’t know is that Donald has had a crush on Alaina since kindergarten. Problem is, Alaina hates his guts.\r\n\r\n When Donald’s feelings for Alaina start to show, Thomas begins to turn against him. Thomas wanted Donald to see the error of his ways when it comes to women, not abandon their friendship for yet another girl. The deeper Donald gets, the more he wants a future with Alaina, but that means revealing why he started talking to her in the first place. When Thomas starts threatening to tell Alaina the truth, Donald has to decide if he wants to lose the love of his life or his best friend.\r\n\r\n Donald realizes he took a bet he can’t win. The great Don Juan may lose everything.', '9.99', 10, '2018-12-28', 1, 5, 2, '2022-11-19 05:41:07', '2022-11-30 17:09:13', NULL),
(5, 'Aztec Odyssey: Historical Action Adventure', 'The year is 1521, and Tenochtitlán burns. Wracked by plague and war, the majestic Aztec empire begins to crumble. As their beloved capital city falls to the ruthless Spaniards and hordes of vengeful tribes, the Aztecs make a last-ditch attempt to secretly save their heritage before it’s lost to the sands of time forever.\r\n\r\nMeanwhile in the modern day, a string of high-profile robberies lays waste to archaeological sites and museums across Mesoamerica, overshadowed by a brewing nationalistic fervor which threatens to topple already fragile countries. Rumors say the artifacts hold the secret to a legendary myth—The Seven Cities of Cibola—which has concealed countless treasures for centuries.\r\n\r\nFaced with unravelling the mysteries of both the present and the past, aspiring archaeologist Nick LaBounty embarks on a dangerous mission to solve a long-held family mystery and discover the truth behind the stolen artifacts.\r\n\r\nHe soon finds his fate irreversibly entangled with a civilization from over five hundred years ago. But time is running out, and the future of both a fabulous treasure—and all Central America—teeters precariously in the balance.', '19.99', 32, '2021-12-08', 10, 1, 10, '2022-11-19 05:46:13', '2022-12-03 05:39:21', NULL),
(6, 'Apocalypse Atlantis: Historical Archeological Action Adventure', 'It’s 1646 BC, and Atlantis, the jewel of the ancient world, faces oblivion. A cataclysm is brewing – one which will wash over an empire at the very height of its power and shroud it in mystery forever. A resolute general is tasked with unravelling the gods’ ominous warnings, but nature is about to unleash devastation that will ripple across millennia. Perhaps even crushing the nascent concept of democracy, before it can ever be born.\r\n\r\nFamed archaeologist Nick LaBounty is no stranger to ancient myths – and when he’s recruited to help uncover the remains of an ancient wreck off the coast of Greece, he jumps at the chance. But he quickly finds himself catapulted into a sinister scheme revolving around dark mysteries from the ancient world and recent past. Both with terrible consequences.\r\n\r\nFacing off against a shadowy aristocrat who dreams of rekindling history’s bloodiest regime, Nick fights to solve the legend of Atlantis and prevent history from repeating itself. Unable to tell friend from foe and crossing paths with the world’s preeminent secret service organization, he’s dragged into in a deadly web of deceit and subterfuge that has life-threatening consequences. The ghosts of the past are about to awaken, and Nick’s next moves could decide the fate of nations…', '19.99', 13, '2022-04-26', 10, 1, 10, '2022-11-19 05:49:32', '2022-12-02 08:10:24', NULL),
(7, 'Grimm\'s Complete Fairy Tales', 'They are the stories we\'ve known since we were children. Rapunzel. Hansel and Gretel. Cinderella. Sleeping Beauty. But the works originally collected by the Brothers Grimm in the early 1800s are not necessarily the versions we heard before bedtime. They\'re darker and often don\'t end very happily--but they\'re often far more interesting.\r\n\r\nThis elegant edition of Grimm\'s Complete Fairy Tales includes all our cherished favorites--Snow White, Rumpelstiltskin, Little Red Cap, and many more--in their original versions. With specially designed end papers, a genuine leather cover, and other enhancements, it\'s the perfect gift for anyone looking to build a complete home library.\r\n\r\n Many of these tales begin with the familiar refrain of “once upon a time” --but they end with something unexpected and fascinating!', '13.99', 42, '2011-11-01', 11, 2, 3, '2022-11-19 06:00:04', '2022-11-30 17:17:35', NULL),
(8, 'The Complete Grimm\'s Fairy Tales', '\"Once upon a time in a fairy tale world, there were magical mirrors and golden slippers, Castles and fields and mountains of glass, Houses of bread and windows of sugar. Frogs transformed into handsome Princes, And big bad wolves into innocent grandmothers. There were evil queens and wicked stepmothers, Sweethearts, true brides and secret lovers. In the same fairy world, A poor boy has found a golden key and an iron chest, and We must wait until he has quite unlocked it and opened the lid. A classic collection of timeless folk tales by Grimm Brothers, Grimm s Fairy Tales is not only enchanting, mysterious and amusing, but also frightening and intriguing. Delighting children and adults alike, these tales have undergone several adaptations over the decades. This edition with black-and-white illustrations is a translation by Margaret Hunt.\"', '13.49', 100, '2018-01-06', 11, 2, 5, '2022-11-19 06:04:08', '2022-12-03 03:04:46', NULL),
(9, 'Grimm\'s Fairy Tales (Dover Thrift Editions: SciFi/Fantasy)', 'Early in the nineteenth century, Jacob and Wilhelm Grimm compiled a collection of stories to preserve the folklore of their native Germany. Forty-three of them — fairy tales, some deliciously dark, that have bewitched readers for generations — are gathered here. Translated into more than 150 languages, these well-loved narratives brim with fearless heroes, humble and hardworking heroines, and treacherous villains, exploring themes of innocence, curiosity, and revenge.\r\nRich in detail, lyrical in phrase, these masterful translations by Margaret Hunt capture the flavor of the original Grimm tales. Here are classics such as \"Rapunzel,\" \"Hansel and Grethel,\" \"Thumbling,\" \"Cinderella,\" \"The Bremen Town-Musicians,\" \"The Wolf and the Seven Little Kids,\" \"The Fisherman and His Wife,\" and \"Little Snow-White.\" These cherished fables, created from centuries\'-old oral tradition, await rediscovery by children and adults alike.', '4.99', 150, '2007-05-11', 11, 14, 6, '2022-11-19 06:10:57', '2022-11-27 20:31:01', NULL),
(10, 'The Action Bible: God\'s Redemptive Story', 'Plus, these spectacular updates take the action to a whole new level:\r\n\r\nEvery page sparks excitement to explore God’s Word and know Him personally. Readers will witness God’s active presence in the world through stories from the life of Jesus and great heroes of the faith.\r\n \r\nLet this blend of powerful imagery and clear storytelling capture your imagination and instill the truth that invites you to discover your own adventure of life with God.\r\n \r\nSergio Cariello’s illustrations for The Action Bible leap off the page with the same thrilling energy that earned him international recognition for his work with Marvel Comics and DC Comics.', '18.79', 39, '2020-09-01', 3, 3, 7, '2022-11-19 06:30:27', '2022-12-02 09:15:00', NULL),
(11, 'The 7 Habits of Highly Effective People: 30th Anniversary Edition', 'One of the most inspiring and impactful books ever written, The 7 Habits of Highly Effective People has captivated readers for nearly three decades. It has transformed the lives of presidents and CEOs, educators and parents—millions of people of all ages and occupations. Now, this 30th anniversary edition of the timeless classic commemorates the wisdom of the 7 Habits with modern additions from Sean Covey.\r\n\r\nThe 7 Habits have become famous and are integrated into everyday thinking by millions and millions of people. Why? Because they work!\r\n\r\nWith Sean Covey’s added takeaways on how the habits can be used in our modern age, the wisdom of the 7 Habits will be refreshed for a new generation of leaders.\r\n\r\nThey include:\r\nHabit 1: Be Proactive\r\nHabit 2: Begin with the End in Mind\r\nHabit 3: Put First Things First\r\nHabit 4: Think Win/Win\r\nHabit 5: Seek First to Understand, Then to Be Understood\r\nHabit 6: Synergize\r\nHabit 7: Sharpen the Saw\r\n\r\nThis beloved classic presents a principle-centered approach for solving both personal and professional problems. With penetrating insights and practical anecdotes, Stephen R. Covey reveals a step-by-step pathway for living with fairness, integrity, honesty, and human dignity—principles that give us the security to adapt to change and the wisdom and power to take advantage of the opportunities that change creates.', '19.79', 52, '2020-05-19', 5, 18, 8, '2022-11-19 06:36:38', '2022-11-28 07:14:51', NULL),
(12, 'The Detective\'s Puzzle Book: True-Crime-Inspired Ciphers, Codes, and Brain Games', 'In Hunt A Killer: The Detective’s Puzzle Book, you’ll meet up with private eye Michelle Gray who needs you to hit the books and fine-tune your investigative skills before the next big murder case.\r\n\r\nUnder her expert guidance, you’ll start with “Investigative Best Practices” before diving into a world of curious ciphers, devious riddles, and other intriguing logic puzzles all designed to take you from amateur sleuth to a top-notch lead detective. With non-narrative puzzles, you can pick up this training manual anytime you need to sharpen your skills, between episodes, or whenever you need a fun challenge.\r\n\r\nWhether you’re a Hunt A Killer member, armchair detective, or logic puzzle junkie, these deceptively difficult but always fun puzzles will have you breaking codes and cracking Hunt A Killer cases in no time. So pick up a pen, grab your magnifying glass, and get sleuthing.', '14.95', 0, '2022-07-08', 6, 4, 9, '2022-11-19 06:42:42', '2022-12-02 09:12:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_images`
--

CREATE TABLE `book_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_images`
--

INSERT INTO `book_images` (`id`, `image_path`, `book_id`) VALUES
(6, 'books/3/gINpvIjKM6YbDwhTbeGzCQ8CgqHlktpWmABQNBb6.jpg', 3),
(7, 'books/3/LIAO9hVUGkRtMQoJx1VArWFJlp28LZ3W1XXC0g8Q.jpg', 3),
(12, 'books/1/1bxpsucIiBkBWaFvI09Hm7ee1KRTYfCeOwHpIXCO.jpg', 1),
(13, 'books/1/SoVJu5nxxMXszTh3aCyc2ppu4va5Za4sYlaSuHIh.jpg', 1),
(14, 'books/2/y2v5KwabiONWwrohRVXiUxyCjjvMzMdcgymbAszE.jpg', 2),
(15, 'books/2/Wa2gPcrg140yrKTLETCsXIrCdDTQK1YKSNaVr8Eq.jpg', 2),
(16, 'books/2/37hRumf86ZyyjtNCnSO8bdxdbVQn8emXNB47OBFg.jpg', 2),
(17, 'books/2/oCz91uOmHHETpZnMqujt8gN1mz4aaekJi9SIs74s.jpg', 2),
(18, 'books/2/ApJiSmYmVFmQrdvmBain19jFh4RnPQXTGYU2725j.jpg', 2),
(19, 'books/2/wompMjrRdxmFEss4sQ1kqS0amUzF14S3LCR79bWr.jpg', 2),
(20, 'books/4/k5sSeAGuWIBopQjnJZGU3IjnIVXU0qTyKSENdpdw.jpg', 4),
(21, 'books/4/oXO2I9b0kMWstbdFqcFTLN5QnVirlzxkFgVYNVcS.jpg', 4),
(22, 'books/5/abm9N0qadJT3MeKaWUZxJHcdyNR6xaNfqiqU6CuM.jpg', 5),
(23, 'books/5/Ezrpn7xteqgK9MDhSIXNzewnux0VDUxW1770xtoI.jpg', 5),
(24, 'books/6/vjRNx489yL7gU48QPweYAM3uWJuPz0goUvt3sg8s.jpg', 6),
(25, 'books/6/VsIUT11CDwylqZterp3MIWHHnQrfMmBmcOC27s1V.jpg', 6),
(26, 'books/7/284td3vQRVnRyFjziZYcpSsJNzp9lXNvWQHuuyKA.jpg', 7),
(27, 'books/7/uOHKsq7K5lJuToA5fXI6b1FShnLvpc5NNrHJcees.jpg', 7),
(28, 'books/7/rKPSqAMPyKoEa2UtIK27P1jSjyDxxsJWYJEwTwQI.jpg', 7),
(29, 'books/7/daEiC2Es82Nmc1CiKeggECP9uzeWScRCvzcdy9Nj.jpg', 7),
(30, 'books/7/ZyDVfHsMuaWyrgHT3GEDeIjvlx2M5e5DASYNyQNG.jpg', 7),
(34, 'books/9/FhGmF2umgkNVkCnyEwvcg8pPwFUIOXlVFs2LnKGW.jpg', 9),
(35, 'books/9/YHo8PDpAsMZECV56Jpz4iBKekaQp7AyaCf0NBHid.jpg', 9),
(36, 'books/10/OWcPTt2S070X0978JyhRheKAUgBplDYhlybJX8Ac.jpg', 10),
(37, 'books/10/vZNC8PkDf3e7JQJ1SCYRQLqfHiScxrTyT6oqjEOw.jpg', 10),
(38, 'books/10/lcmfDWnwmVGsubqb2cOeTrEFJ5V6zFER1wrxhnDz.jpg', 10),
(39, 'books/10/HeKOcsxbYTBHjD6QGrmwNYAwBcVTGGK6fVY169zT.jpg', 10),
(40, 'books/11/ZSzvSi6NoSgkTItgTFuFYv95uJYNbNVMIzUScFGe.jpg', 11),
(41, 'books/11/M9a7QqQ0Ppp3G7W6nu8joTzfB2sTNlU8q8zfQhpx.jpg', 11),
(42, 'books/11/0DZfOzetygARrCfHSQFya97FxUfwB5KcBsATNrEE.jpg', 11),
(44, 'books/12/xnuO4LZxQ122ijZNYOIhWEH1pfttBleG8uXmxEx1.jpg', 12),
(45, 'books/12/p2V3vDF06Ldod0TOVjRTZLLM0jFXOXV3iBp5tsfU.jpg', 12),
(46, 'books/12/jNIXQz6APqzNK3zi97AraTX0CAcNcfxzdLAIgVA4.jpg', 12),
(47, 'books/12/t2eq0YlCa4cIYNrvlsWmGygM8Ff8ITjgDjyv5yh8.jpg', 12),
(49, 'books/8/9JG90kX0OCL7TbFHNEIxkuvAh5mtG4K1C6wzsPO8.jpg', 8),
(50, 'books/8/Lv3zO2PkmmiSbgm6ryDdK7diAgjPrVhGdjVTfKVk.jpg', 8),
(51, 'books/8/eshXY2bCZujSWlFcRAJVcRvCwPc3tD4CQ4FikUCl.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`id`, `price`, `quantity`, `book_id`, `user_id`) VALUES
(51, '19.99', 1, 5, 3),
(52, '9.99', 1, 4, 3),
(57, '17.99', 1, 1, 7),
(59, '21.00', 1, 2, 7),
(63, '17.99', 1, 1, 5),
(64, '19.99', 1, 6, 5),
(67, '18.79', 1, 10, 8),
(68, '14.95', 1, 12, 8);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `deleted_at`) VALUES
(1, 'Action and Adventure', NULL),
(2, 'Classics', NULL),
(3, 'Comic Book or Graphic Novel', NULL),
(4, 'Detective and Mystery', NULL),
(5, 'Fiction', NULL),
(7, 'Historical Fiction', NULL),
(10, 'test category', '2022-11-17 20:53:41'),
(11, 'Horror', NULL),
(12, 'Literary Fiction', NULL),
(13, 'Romance', NULL),
(14, 'Science Fiction (Sci-Fi)', NULL),
(15, 'Short Stories', NULL),
(16, 'History', NULL),
(17, 'Biographies and Autobiographies', NULL),
(18, 'Self-Help', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_10_18_023411_create_users_table', 1),
(3, '2022_10_18_074141_create_addresses_table', 1),
(4, '2022_10_18_075158_create_authors_table', 1),
(5, '2022_10_18_075454_create_categories_table', 1),
(6, '2022_10_18_075639_create_publishers_table', 1),
(7, '2022_10_18_075732_create_books_table', 1),
(8, '2022_10_18_080616_create_book_images_table', 1),
(9, '2022_10_18_081243_create_cart_details_table', 1),
(10, '2022_10_18_082645_create_reviews_table', 1),
(11, '2022_10_18_083917_create_orders_table', 1),
(12, '2022_10_18_084739_create_order_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `totalPrice` decimal(9,2) UNSIGNED NOT NULL,
  `orderStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Processing',
  `paymentStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unpaid',
  `paymentMethod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transactionId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transDate` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `totalPrice`, `orderStatus`, `paymentStatus`, `paymentMethod`, `transactionId`, `transDate`, `user_id`, `address_id`, `created_at`, `updated_at`) VALUES
(2, '50.47', 'Processing', 'Paid', 'vnpay', '13894074', '2022-12-03', 3, 9, '2022-11-29 08:29:56', '2022-12-03 06:40:00'),
(3, '42.00', 'Processing', 'Unpaid', 'chkpayment', NULL, NULL, 3, 13, '2022-11-30 02:35:51', '2022-11-30 02:35:51'),
(4, '30.48', 'Processing', 'Paid', 'vnpay', '13891491', '2022-11-30', 4, 11, '2022-11-30 03:12:14', '2022-11-30 07:04:46'),
(5, '31.50', 'Processing', 'Paid', 'vnpay', '13891493', '2022-11-30', 4, 11, '2022-11-30 06:22:11', '2022-11-30 07:06:19'),
(7, '31.50', 'Processing', 'Paid', 'vnpay', '13891471', '2022-11-30', 4, 11, '2022-11-30 06:32:51', '2022-11-30 06:33:43'),
(8, '59.97', 'Processing', 'Unpaid', 'vnpay', NULL, NULL, 6, 5, '2022-11-30 07:20:21', '2022-11-30 07:20:21'),
(9, '41.97', 'Processing', 'Unpaid', 'vnpay', NULL, NULL, 6, 5, '2022-11-30 17:19:20', '2022-11-30 17:19:20'),
(10, '147.00', 'Processing', 'Unpaid', 'vnpay', NULL, NULL, 6, 5, '2022-11-30 17:21:48', '2022-11-30 17:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `price`, `quantity`, `order_id`, `book_id`) VALUES
(1, '9.99', 2, 2, 4),
(2, '19.99', 1, 2, 5),
(3, '10.50', 1, 2, 3),
(4, '21.00', 1, 3, 2),
(5, '10.50', 2, 3, 3),
(6, '10.50', 1, 4, 3),
(7, '9.99', 2, 4, 4),
(8, '21.00', 1, 5, 2),
(9, '10.50', 1, 5, 3),
(12, '21.00', 1, 7, 2),
(13, '10.50', 1, 7, 3),
(14, '19.99', 1, 8, 5),
(15, '19.99', 2, 8, 6),
(16, '13.99', 3, 9, 7),
(17, '21.00', 7, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `deleted_at`) VALUES
(1, 'Celadon Books edited', NULL),
(2, 'B. L. Moore', NULL),
(3, 'Canterbury Classics', NULL),
(4, 'test publisher', '2022-11-15 19:36:29'),
(5, 'Fingerprint Publishing', NULL),
(6, 'Dover Publications', NULL),
(7, 'David C Cook', NULL),
(8, 'Simon & Schuster', NULL),
(9, 'Ulysses Press', NULL),
(10, 'Independently published', NULL),
(11, 'Pocket Books', NULL),
(12, 'Atria', NULL),
(13, 'Celadon Books', '2022-12-03 01:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/default-avt.png',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `email`, `dob`, `image`, `password`, `role`, `google_id`, `facebook_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pham Viet Thang', 'vietthang@nienluan.com', '2001-03-19', 'images/8a7YBdjadJrpM034rLhYcunwMOeAYDePaaJDF2db.jpg', '$2y$10$u2KkcOojwlpx1KDK.CfZAuZkTEDKoMl.Jtk2STQoIONgHSsbDq/sK', 'admin', NULL, NULL, 'D98dOBRFiHWuBE5huroUUf2Nk8EVl6KpnfYoYA4z9tQsIjA5ErpCendffEkS', '2022-10-18 06:52:55', '2022-12-03 07:13:31', NULL),
(2, 'test test', 'viethang@nienluan.com', NULL, 'images/default-avt.png', '$2y$10$lnWL6Pv7FGu/14W1OuheoerSA3zwUmlgZJ5z8pBT9X8tXAiiWl94y', 'guest', NULL, NULL, NULL, '2022-10-18 06:58:23', '2022-10-18 06:58:23', NULL),
(3, 'Tran Huu Dan', 'huudan@nienluan.com', '2001-04-12', 'images/aYl4rOFG3GVsZpSFEWQ2ZHuC12HvAK8lAIhKiyHX.jpg', '$2y$10$JnGIJLOtmgZM4JGoMpFiTuDHqZfAdT2e/affV.zgw2sYc74Peh0hK', 'guest', NULL, NULL, NULL, '2022-10-18 19:50:03', '2022-11-19 02:01:37', NULL),
(4, 'Huynh Nguyen Thanh Dien', 'thanhdien@nienluan.com', '2001-04-15', 'images/oCiyTDK9oN2ZEKDsC1IeRgy7TV8TKpPHv9JW9KUY.jpg', '$2y$10$RR2dK7tMw5m8VPagp3zYqe1t0XBLT9O6AmhTSya3tPh0nWsDyywye', 'guest', NULL, NULL, NULL, '2022-10-18 19:54:38', '2022-11-19 02:02:12', NULL),
(5, 'Thắng Phạm Việt', 'vietphamthang2001@gmail.com', '2001-03-19', 'images/RBYPoguLeqoYM8MnnBSM7cR6qKK9gKAHCRaZiuOg.jpg', NULL, 'guest', '117890112480051519036', NULL, NULL, '2022-10-19 08:07:29', '2022-11-15 05:40:09', NULL),
(6, 'Nguyen Le Binh Nam', 'binhnam@nienluan.com', '2001-06-20', 'images/nKJrUiAI7XHj0bBQrubCZpdWwK1EBaN349mN85RJ.jpg', '$2y$10$cJgX33ClW9XAogYGd/xpYeMok.kVmAe/8isurjmdbnUscZwfMT0lu', 'guest', NULL, NULL, 'XoosNxLsj6A9oBWCp9g0VESW9Li7HLbvnOYLiaROrWPNmtX2wAYDvqw18FGB', '2022-10-25 23:47:31', '2022-11-30 17:18:33', NULL),
(7, 'Ho Hoang Phi', 'hoangphi@nienluan.com', NULL, 'images/default-avt.png', '$2y$10$UshTnD3/qfpQ8s2l3I/QleJCj1FQlL2oik1qs1snKP0lE.M6AWFHS', 'guest', NULL, NULL, 'P06OzTikMO7LxxinayUIxNqD2AGShPzEbJ4HwalUJkp2VwlM1tTDemezHOEc', '2022-11-30 17:37:05', '2022-11-30 17:37:05', NULL),
(8, 'Nguyen Hoang Thanh', 'hoangthanh@nienluan.com', NULL, 'images/default-avt.png', '$2y$10$hhHjCoHNNjgHb8qISHfiueC0oVu0vyR15.mpRzXaEsHd0defPTRxC', 'guest', NULL, NULL, 'D5UuqKYUMk4Wm36BVHUz4gNRcGrUAVT58XFhGtKzbH3Ei6Ah86DDwVq5LNJ8', '2022-12-02 02:36:11', '2022-12-02 02:36:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_author_id_foreign` (`author_id`),
  ADD KEY `books_category_id_foreign` (`category_id`),
  ADD KEY `books_publisher_id_foreign` (`publisher_id`);

--
-- Indexes for table `book_images`
--
ALTER TABLE `book_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_images_book_id_foreign` (`book_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_details_book_id_foreign` (`book_id`),
  ADD KEY `cart_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders__address_id_foreign` (`address_id`),
  ADD KEY `orders__user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_book_id_foreign` (`book_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `book_images`
--
ALTER TABLE `book_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`);

--
-- Constraints for table `book_images`
--
ALTER TABLE `book_images`
  ADD CONSTRAINT `book_images_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD CONSTRAINT `cart_details_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `cart_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders__address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `orders__user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
