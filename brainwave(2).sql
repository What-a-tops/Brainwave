-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2016 at 03:25 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brainwave`
--

-- --------------------------------------------------------

--
-- Table structure for table `brain_achievements`
--

CREATE TABLE `brain_achievements` (
  `bam` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `achiv_counts` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `result` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brain_button_submit`
--

CREATE TABLE `brain_button_submit` (
  `bid` int(12) NOT NULL,
  `submit` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `room_id` varchar(50) NOT NULL,
  `question_num` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brain_buzz`
--

CREATE TABLE `brain_buzz` (
  `buzz_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `room_id` varchar(50) NOT NULL,
  `result` varchar(20) NOT NULL,
  `buzz` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brain_buzz_current`
--

CREATE TABLE `brain_buzz_current` (
  `bcb` int(12) NOT NULL,
  `qid` int(12) NOT NULL,
  `room_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brain_buzz_result`
--

CREATE TABLE `brain_buzz_result` (
  `buzz_Rid` int(11) NOT NULL,
  `buzz_result` varchar(50) NOT NULL,
  `room_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `question_num` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brain_comments`
--

CREATE TABLE `brain_comments` (
  `com_id` int(12) NOT NULL,
  `comms` varchar(500) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `data_coms` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brain_finish`
--

CREATE TABLE `brain_finish` (
  `bid` int(12) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `room_num` varchar(50) NOT NULL,
  `ans` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brain_hint`
--

CREATE TABLE `brain_hint` (
  `hid` int(12) NOT NULL,
  `hint` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `room_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brain_joinroom`
--

CREATE TABLE `brain_joinroom` (
  `jid` int(12) NOT NULL,
  `rid` int(12) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `room_num` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `player_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brain_moves`
--

CREATE TABLE `brain_moves` (
  `mid` int(12) NOT NULL,
  `moves` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `room_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brain_question`
--

CREATE TABLE `brain_question` (
  `bid` int(12) NOT NULL,
  `question_path` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `question` varchar(250) NOT NULL,
  `hint` varchar(250) NOT NULL,
  `answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brain_question`
--

INSERT INTO `brain_question` (`bid`, `question_path`, `level`, `subject`, `question`, `hint`, `answer`) VALUES
(122, '', 'Easy', 'English', 'She Looks ___ Than She Is.', 'MRE YNGR', ''),
(123, '', 'Easy', 'English', 'Ten Thousand Dollars ___ A Lot Of Money.', 'I', ''),
(124, '', 'Easy', 'English', 'My Younger Brother Has Just ___ A Letter From His Girlfriend.', 'RD', ''),
(125, '', 'Easy', 'English', 'A Lot Of Work ___ To Be Done.', 'RS', ''),
(126, '', 'Easy', 'English', 'I Enjoyed ___ With Your Brother', 'T NG', ''),
(127, '', 'Easy', 'English', 'I Saw ___ Of My Friends.', 'YES', ''),
(128, '', 'Easy', 'English', 'It ___ When I Left The House.', 'WR', ''),
(129, '', 'Easy', 'English', 'My House Is As ____  As Your House.', 'SMALL', ''),
(130, '', 'Easy', 'English', 'I ___ The Woman Very Well', 'WONK', ''),
(131, '', 'Easy', 'English', 'Would You Mind _____ The Window?', 'ING', ''),
(132, '', 'Easy', 'English', 'What Is The Meaning Of Vividly?', 'CR', ''),
(133, '', 'Easy', 'English', 'What Is The Synonym Of Distinct?', 'U', ''),
(134, '', 'Easy', 'English', 'A Word That Is The Name Of Something (such As Person, Animal, Place, Thing, Quality, Idea Or Action. And Is Typically Used In A Sentence As Subject Or Object Of A Verb.', 'Jenny Rose ', ''),
(135, '', 'Easy', 'English', 'A Word Or Group Of Words That Is Used With A Noun, Pronoun, Or A Noun Phrase To Show Direction, Location Or Time.', 'PP', ''),
(136, '', 'Easy', 'English', 'A Word (such As Jump, Think, Happen Or Exist) That Is Usually One Of The Main Parts Of A Sentence.', 'Sing, Walk, Dance', ''),
(137, '', 'Easy', 'English', 'It Is A Standardized Non-alphabetical Symbol Or Mark Used To Organized Writing In Clauses, Phrases, And Sentences.', 'NIOTAUTCNUP', ''),
(138, '', 'Easy', 'English', 'Kind Of Sentence That Tells Something About A Person, Place, Thing Or Event. It Ends With Period.', 'DS', ''),
(139, '', 'Easy', 'English', '18.	Kinds Of Sentence That Ask Questions. It Ends With Question Mark (?)', 'I S', ''),
(140, '', 'Easy', 'English', 'A Sentence That Is Consist Of Two Or More Simple Sentence Or Independent Clauses.', 'C S', ''),
(141, '', 'Easy', 'English', 'Sentence Consist Of An Independent Clause And Two Or More Dependent Clauses.', 'CXS', ''),
(142, '', 'Moderate', 'English', 'With Regard To Television Display, What Is The Meaning Of The Acronym  ''HD''?', 'Clear Output', 'High Definition'),
(143, '', 'Moderate', 'English', 'Translate The Spanish Word â€•suerteâ€– (swear Tay) Into English.', 'Buenas', 'Luck'),
(144, '', 'Moderate', 'English', 'Africa Is Home To The Worldâ€˜s Heaviest Insectâ€”a Beetle That Can Weigh Up To 100\r\nGrams. Give The Seven-letter Name Of This Beetle Who Shares Its Name With A\r\nBiblical Character.', 'David', 'Goliath'),
(148, '', 'Hard', 'English', 'In Literature, What Kind Of Animal Is â€•Rosinanteâ€– As Found In Don Quixote??', 'Vice Ganda', 'Horse'),
(149, '', 'Hard', 'English', 'Which Country Occupied The Philppies During World War II?', 'Samurai', 'Japan'),
(150, '', 'Moderate', 'English', 'Which Of The Following Languages Is Indigenous To The Philippines?', 'Filipino', 'Tagalog'),
(151, '', 'Hard', 'English', 'Which Country Had The Philippines As Its Colony For More Than 300 Years?', 'SP', 'Spain'),
(152, '', 'Hard', 'English', 'What Is The Color Of The 1,000 Peso Bill?', 'Sea Or Sky', 'Blue'),
(153, '', 'Moderate', 'English', 'What Is The National Flower Of The Philippines?', 'White Flower', 'Sampaguita'),
(154, '', 'Moderate', 'English', 'What Is A Fertilized Duck Egg Called?', 'Pinoy', 'Balut'),
(156, '', 'Hard', 'English', 'What Is The Collective Noun For A Group Of Ants? ', 'Empire', 'Colony'),
(157, '', 'Moderate', 'English', ' Give A Synonym For Confess?', 'Madit', 'Admit'),
(158, '', 'Moderate', 'English', 'What Is The Young One Of A Duck Called ?', 'Lingduck', 'Duckling'),
(160, '', 'Easy', 'Math', 'What Is 150 Divided By 5?', '15 Plus 15', ''),
(161, '', 'Easy', 'Math', 'What Is 222 Plus 83?', 'Next Is 306', ''),
(162, '', 'Easy', 'Math', 'What Is 50% Of 500?', ': One Hundred Twenty Five Times Two', ''),
(163, '', 'Easy', 'Math', 'What Is Square Root Of 9?', 'Upper Of Two', ''),
(164, '', 'Easy', 'Math', 'What Is 11x11?', 'Next Is 122', ''),
(165, '', 'Easy', 'Math', 'What Is 100 Â€ - 151?', 'Reciprocal Of Positive 51', ''),
(167, '', 'Moderate', 'Math', 'What Is 0.33 As A Percentage?', '16 Plus 17', '33'),
(169, '', 'Moderate', 'Math', 'What Is The Smallest Prime Number?', 'One Plus Zero', '1'),
(170, '', 'Moderate', 'Math', 'What Is 0.88 As A Percentage?', 'Lower  Eighty Nine', '88%'),
(172, '', 'Hard', 'Math', 'What Is 3/5 Of 50?', 'Next Is Thirty One', '30 '),
(175, '', 'Hard', 'Math', 'If You Add The Two Numbers On The Opposite Sides Of A Dice Together, What Total Do You Always Get ?', 'Below Eight', '7'),
(178, './user/tooth.jpg', 'Easy', 'Science', 'How Many Teeth Should An Adult Have Including Their Wisdom Tooth?', 'Higher Than 30', ''),
(179, '', 'Easy', 'Science', 'What Is The Name Of Organ That We Used To Breath Oxygen?', 'Nulgs', ''),
(180, '', 'Easy', 'Science', 'What Is The Name Of The Organ That Pumps Blood Around The Body?', 'Love', ''),
(181, '', 'Easy', 'Science', 'Which Two Parts Of The Body Continue To Grow For Your Entire Life.?', 'Smell And Hear', ''),
(182, './user/brain.jpg', 'Easy', 'Science', 'What Makes Up 80% Of Our Brains?', 'H2o', ''),
(184, '', 'Easy', 'Science', 'In The Adult Human Body, What Is Longer The Small Intestine Or The Large Intestine?The Long Intestine?', 'Similar Of Little', ''),
(185, '', 'Moderate', 'Science', 'Where Is The Smallest Bone In Your Body?', 'Hear', 'Ears'),
(186, './user/', 'Moderate', 'Science', 'Where Is The Largest Bone In Your Body?', 'Above The Feet', 'leg'),
(188, '', 'Moderate', 'Science', 'What Is The Strongest Muscle In Your Body?', 'Sense Of Taste', 'Tongue'),
(189, '', 'Moderate', 'Science', 'What Color Eyes Do More Humans Have?', 'Color Of Mud', 'Brown'),
(193, '', 'Hard', 'Science', 'What Is The Name Of The Tube That Carries Blood To The Head?', 'Results Of How The Blood Flows', 'Veins'),
(194, '', 'Hard', 'Science', 'How Many Moons Does The Planet Mars Have?', 'More Than 1', '2'),
(195, '', 'Hard', 'Science', 'Which Planet Is Closest To The Sun?', 'Before Venus', 'Mercury'),
(196, '', 'Hard', 'Science', 'What Is The Largest Planet In The Solar System?', 'Starts With Letter J', 'Jupiter'),
(197, '', 'Easy', 'History', 'What Was Special About The Type Of Roads That The Romans Made?', 'TWS', ''),
(198, '', 'Easy', 'History', 'During What Year Did World War 1 Begin?', 'NEXT TO 1913', ''),
(199, '', 'Easy', 'History', 'What Was The Name Of The German Leader During World War II?', 'AH', ''),
(200, '', 'Easy', 'History', 'In Which Country Are The Famous Pyramids Of Giza?', 'E', ''),
(201, '', 'Easy', 'History', 'What Type Of Flowers Is Worn On Remembrance Day In Britain?', 'P', ''),
(202, '', 'Easy', 'History', 'Which Three Countries Did The Vikings Come From?', 'DNS', ''),
(203, '', 'Moderate', 'History', 'What Type Of Material Were The First Castles Made From?', 'Tree', 'Wood'),
(205, '', 'Moderate', 'History', 'Can You Unscramble This Word  To Find The First Name Of A Roman Leader  SIUULJ', 'Name', 'Julius'),
(208, '', 'Hard', 'History', 'What Did King Arthur Easily Pull Out Of A Store?', 'Two Bladed Weapon', 'Sword'),
(211, '', 'Hard', 'History', 'What Year Was The Battle Of Hastings?', '1065', '1066'),
(212, '', 'Hard', 'History', 'How Many Wives Did King Henry Vill Have?', '7 IS THE NEXT', '6'),
(213, '', 'Easy', 'Filipino', 'Ang Kambal Katinig Ay?', 'K', ''),
(214, '', 'Easy', 'Filipino', 'Kilala Bilang Â€ "Huseng Baluteâ€', 'JCDH', ''),
(215, '', 'Easy', 'Filipino', 'Tumatanggap Ng Kilos Sa Isang Pangungusap.', 'TL', ''),
(216, '', 'Easy', 'Filipino', 'Pahapyaw Na Pagbasa.', 'SKMNG', ''),
(217, '', 'Easy', 'Filipino', 'Awit Na Panghalele.', 'O', ''),
(218, '', 'Easy', 'Filipino', '17.	Â€"ang Tumatakbong Kabayong Itim Ay Mabilisâ€', 'PA', ''),
(222, '', 'Moderate', 'Filipino', 'Ang ____ Ay Nag-aanyong Buwaya Upang Makain Ang Intsik At Madala Sa Impiyerno.', 'May Sungay', 'Dimonyo'),
(223, '', 'Moderate', 'Filipino', 'Si ____ Ang Dakilang Guro Ng Mga Intsik.', 'Nagsisimula Sa Letter C', 'Confucio'),
(224, '', 'Moderate', 'Filipino', 'Ang Tawa Ng Payat Na Paring Pransiskano Ay Katulad Ng ____ Ng Isang Naghihingalo.', 'Iwing', 'Ngiwi'),
(228, '', 'Hard', 'Filipino', 'Si Basilio Ay Nakakita Ng Isang __________ Sa Siwang Ng Dalawang Ugat Ng Baliti.', 'Madilim Na Tao Na Nasa Likod Pag Naiilawan Ka', 'Anino'),
(229, '', 'Hard', 'Filipino', 'Ang Mag-aalahas Na Si __________ Ang Nakatagpo Uli Ni Basilio Sa Gubat.', 'Alyas Ni Crisostomo Ibarra', 'Simon'),
(230, '', 'Hard', 'Filipino', 'May __________ Taon Nang Namatay Ang Ina Ni Basilio.', 'Mas Mataas Pa Sa 12', '13'),
(231, '', 'Hard', 'Filipino', 'Naghanda Ng _____ Si Simoun Noong Gabing Iyon Upang Mabuksan Ang Kumbento At Makuha Si Maria Clara.', 'May Gira', 'Himagsikan'),
(232, '', 'Hard', 'Filipino', 'Si _____ Ang Nagbalita Kay Simoun Ng Pagkamatay Ni Maria Clara.', 'Liobasi', 'Basilio'),
(233, './user/hitl.jpg', 'Moderate', 'History', 'Hitler''s First Name?', 'Starts In Letter A', 'Adolf'),
(234, './user/flag.jpg', 'Moderate', 'History', 'What Is The Title Of The Philippine National Anthem?', 'LP', 'Lupang Hinirang'),
(235, './user/Rizal_Park_Facing_Quirino_Grandstand.jpg', 'Moderate', 'History', 'What Is The Original Name Of LunetaPark?', 'Bayan', 'Bagumbayan'),
(236, '', 'Moderate', 'Science', 'How Many Ribs Are There In Human Body?', ' X2', '24'),
(237, '', 'Moderate', 'Math', 'Tool To Measure Angle?', 'Torproctra', 'Protractor'),
(238, '', 'Moderate', 'Math', 'How Many Straight Edges Have Cube Have?', 'X6', '12'),
(239, '', 'Moderate', 'Math', 'What Is Square Root Of 144?', 'X6', '12'),
(240, '', 'Moderate', 'Math', 'What Number You Must Add To 66 To Make Sure The Sum Of 121?', 'Fifty Five', '55'),
(241, '', 'Moderate', 'Filipino', 'Ito Ang Uri Ng Tauhan Na Nagbabago Ng Karakter At Nagkakaroon Ng Pagkatuto Sa Kanyang Hinaharap Ng Tunggalian O Suliranin.?', 'Logbi', 'Bilog'),
(242, '', 'Moderate', 'Filipino', 'Si Rizal Ay Ipinanganak Noong Sa Anong Buwan?', 'YoHun', 'Hunyo'),
(243, '', 'Hard', 'English', 'Which Handed People Are Many, Left Or Right?', 'Ightr', 'Right'),
(244, '', 'Hard', 'English', 'What Is The Play Given To A Sad Ending?', 'Dygetra', 'Tragedy'),
(245, '', 'Hard', 'English', 'What Is The Young One Of A Bear Called?', 'Buc', 'Cub'),
(246, '', 'Hard', 'Math', 'What Is 3/5 Of 50?', 'Thirty', '30'),
(247, '', 'Hard', 'Math', 'What Is 4995 Divided By 15?', 'Triple 3', '333'),
(248, '', 'Hard', 'Math', 'What Is The Total Number Of Degrees In Triangle?', 'One Eighty', '180'),
(249, '', 'Hard', 'Math', 'How Many Degrees Are There In Right Angle?', 'Ninety', '90'),
(250, '', 'Hard', 'History', 'What Year Did World War One Begin?', 'NEXT TO 1913', '1914'),
(251, '', 'Hard', 'History', 'TRUE Or FALSE The Hanging Gardens Of Babylonâ€™s One Of The Seven Wonders Of The Ancient World.', 'T', 'True'),
(260, '', 'Moderate', 'Science', 'Which Organ Is Known As â€œthe Cellâ€™s Brainâ€?', 'Cluneus', 'Nucleus');

-- --------------------------------------------------------

--
-- Table structure for table `brain_quitgame`
--

CREATE TABLE `brain_quitgame` (
  `qid` int(12) NOT NULL,
  `room_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `quit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brain_result`
--

CREATE TABLE `brain_result` (
  `rid` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `question` varchar(500) NOT NULL,
  `room_num` varchar(50) NOT NULL,
  `difficulty` varchar(50) NOT NULL,
  `choice` varchar(50) NOT NULL,
  `points` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brain_rooms`
--

CREATE TABLE `brain_rooms` (
  `brim` int(12) NOT NULL,
  `room_num` varchar(500) NOT NULL,
  `server_id` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `players` int(12) NOT NULL,
  `num_of_players` int(12) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `player_type` varchar(50) NOT NULL,
  `stats` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brain_score`
--

CREATE TABLE `brain_score` (
  `sid` int(12) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `room_num` varchar(50) NOT NULL,
  `score` int(12) NOT NULL,
  `difficulty` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(12) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cat_name`) VALUES
(45, 'English'),
(51, 'Filipino'),
(52, 'History'),
(53, 'Math'),
(64, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `easy_choice`
--

CREATE TABLE `easy_choice` (
  `choice_id` int(11) NOT NULL,
  `qid` varchar(50) NOT NULL,
  `correct` varchar(50) NOT NULL,
  `choiceB` varchar(50) NOT NULL,
  `choiceC` varchar(50) NOT NULL,
  `choiceD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `easy_choice`
--

INSERT INTO `easy_choice` (`choice_id`, `qid`, `correct`, `choiceB`, `choiceC`, `choiceD`) VALUES
(44, '39', 'Dff', 'Dff', 'Sdsf', 'Vcv'),
(45, '40', 'Dfdf', 'Dfdg', 'Dgdfg', 'Dfg'),
(46, '41', 'Fgfh', 'Fgfh', 'Fhg', 'Fhgh'),
(47, '42', 'Sdff', 'Sdff', 'Dfdf', 'Sdfdf'),
(48, '43', 'Sdsd', 'Cv', 'Dfg', 'Dff'),
(49, '43', 'Sfdf', 'Vcv', 'Dfdf', 'Cc'),
(50, '52', 'Sdsd', 'Sdsd', 'Sdsd', 'Sdsd'),
(51, '53', 'Dfdf', 'Dfdf', 'Dfdf', 'Dff'),
(52, '54', 'Sdsd', 'Sdsf', 'Dfdf', 'Sdfd'),
(53, '55', 'Sds', 'Sds', 'Sds', 'Sdf'),
(54, '56', 'Kjkjsd', 'sds', 'sdsd', 'cc'),
(55, '57', 'Ascc', 'Fdfdf', 'Vcvvsdf', 'Dgfg'),
(56, '68', '', '', '', ''),
(57, '68', '', '', '', ''),
(58, '76', 'Sds', 'Sds', 'Sdsd', 'Sdsd'),
(59, '82', 'Sdsd', 'Sdsd', 'Sdf', 'Dfdf'),
(60, '82', 'Sdsd', 'Sdsd', 'Sdf', 'Dfdf'),
(61, '84', 'Sdsdvcv', 'Vcv', 'Dfg', 'Dfgf'),
(62, '85', 'Ccc', 'aww', 'Hggh', 'Fhg'),
(63, '87', 'Cc', 'Dfdgf', 'Dgf', 'Fgfg'),
(64, '92', 'boom', 'baam', 'kook', 'kick'),
(65, '95', 'Foot', 'Stomach', 'Head', 'Hand'),
(66, '96', 'The Whitehouse', 'Palace ', 'Versailles', 'Westminster Abbey'),
(67, '97', 'Red', 'Green', 'Blue', 'Yellow'),
(68, '98', 'Wind', 'Athletes', 'Spacecraft', 'Light'),
(69, '99', 'Yemen', 'Somalia', 'Iran', 'Oman'),
(70, '100', 'Ring ', 'Pyramid', 'Brick', 'Leaf'),
(71, '101', 'Painting', 'Martial ', 'Meditation', 'Cooking'),
(72, '119', 'Einstein', 'Newton', 'Rizal', 'Apol'),
(73, '120', 'Sdsd', 'Sdsd', 'Sds', 'Sdsd'),
(74, '120', 'More Young ', 'More Younger  ', 'Much Younger', 'Very Younger'),
(75, '121', 'Are', 'Is', 'And', 'Have'),
(76, '122', 'More Younger', 'More Young', 'Much Younger', 'Very Younger'),
(77, '123', 'Is', 'Are', 'And', 'Have'),
(78, '124', 'Received', 'Receive', 'Receiving', 'To Receive'),
(79, '125', 'Remains', 'Remain', 'Remained', 'Has Remain'),
(80, '126', 'Traveling', 'To Travel', 'Travel', 'Travelled '),
(81, '127', 'No', 'Nobody', 'No One', 'None'),
(82, '128', 'Was Raining ', 'Rained', 'Had Raining', 'Is Raining'),
(83, '129', 'Big', 'Bigger', 'Biggest', 'The Biggest'),
(84, '130', 'Know ', 'Am Knowing', 'Knowed', 'Having Known'),
(85, '131', 'Closing ', 'Close', 'Closed', 'To Close'),
(86, '132', 'Clear ', 'Blurry', 'Near', 'Far'),
(87, '133', 'Unlike ', 'Alike', 'Identical', 'Like'),
(88, '134', 'Noun ', 'Verb', 'Preposition', 'Adverb'),
(89, '135', 'Preposition ', 'Noun', 'Verb', 'Adverb'),
(90, '136', 'Verb ', 'Noun', 'Preposition', 'Adverb'),
(91, '137', 'Punctuation ', 'Preposition', 'Conjunction', 'Noun'),
(92, '138', 'Declarative Sentence ', 'Interrogative Sentence', 'Simple Sentence', 'Compound Sentence'),
(93, '139', 'Interrogative Sentence ', 'Declarative Sentence', 'Simple Sentence', 'Compound Sentence'),
(94, '140', 'Compound Sentence ', 'Interrogative Sentence', 'Declarative Sentence ', 'Simple Sentence'),
(95, '141', 'Complex Sentence ', 'Simple Sentence', 'Interrogative Sentence', 'Compound Sentence'),
(96, '160', '30 ', '25', '40', '15'),
(97, '161', '305 ', '500', '306', '205'),
(98, '162', '250 ', '350', '150', '450'),
(99, '163', '3', '6', '9', '1'),
(100, '164', '121  ', '122', '123', '124'),
(101, '165', '-51 ', '-32', '-42', '-24'),
(102, '178', '32', '12', '13', '24 '),
(103, '179', 'Lungs', 'Heart', 'Nose', 'Ears'),
(104, '180', 'Heart', 'Nose', 'Ears', 'Lungs'),
(105, '181', 'Nose And Ears', 'Eyes And Mouth', 'Legs And Hands', 'Fingers And Head'),
(106, '182', 'Water', 'Intestine', 'Nerves', 'Pulse '),
(107, '183', 'Small Intestine', 'The Long Intestine', 'Both A And B', 'None Of These'),
(108, '184', 'Small Intestine', 'The Long Intestine', 'Both A And B', 'None Of These'),
(109, '197', 'They Were Straight', 'They  Were Curve', 'They  Were Circle', 'None Of The Above'),
(110, '198', '1914', '1930', '1918', '1990'),
(111, '199', 'Adolf Hitler', 'Gray Honi', 'John Huim', 'George Juna '),
(112, '200', 'Egypt', 'London', 'Hawaii', 'Hongkong'),
(113, '201', 'Poppy', 'Gaugamela', 'Rose', 'Sampaguita'),
(114, '202', 'Denmark, Norway And Sweden', 'Hong Kong, Taiwan And Dubai', 'Netherlands, Yemen And China', 'None Of The Above'),
(115, '213', 'Klaster', 'Pares Minimal', 'Diptonggo', 'Salawikain'),
(116, '214', 'Jose Corazon De Hesus(HINT:JCDH)', 'Gregorio H. Del Pilar', 'Melchora Aquino', 'Apolinario Mabini'),
(117, '215', 'Tuwirang Layon ', 'Di- Tuwiarang Layon', 'Simuno', 'Panaguri'),
(118, '216', 'Skimming ', 'Sintaksis', 'Sesura', 'Sukat'),
(119, '217', 'Oyayi ', 'Lullaby', 'Sesura', 'Bugtong'),
(120, '218', 'Pang Abay ', 'Pang Uri', 'Wala Sa Nabanggit', 'Wala Sa Lahat'),
(121, '252', 'Dfdf', 'Dfdf', 'Sdfdf', 'Sfdf'),
(122, '256', 'Dfdf', 'Dfdf', 'Dfd', 'Dfdf'),
(123, '257', 'Dfdf', 'Ddg', 'Dfdf', 'Fgg'),
(124, '258', 'Sfsf', 'Sffs', 'Sfdf', 'Sfdf'),
(125, '252', 'Sdfdff', 'Dfdf', 'Dfdf', 'Sfdf'),
(126, '253', 'Dfdf', 'Dfdf', 'Dfdf', 'Dfdf'),
(127, '254', 'Dssdf', 'Dsdsg', 'Sdgsg', 'Sdgsdg'),
(128, '256', 'Dfdf', 'Sdfd', 'Dgd', 'Df'),
(129, '257', 'Sdfsdf', 'Sdf', 'Df', 'Df'),
(130, '261', '1', 'Sfdf', 'Dfdf', 'Dfdf'),
(131, '262', '1', 'Dfs', 'Dffg', 'Dgfd');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `uid` int(12) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `user_path` varchar(500) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `age` int(12) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `date_reg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`uid`, `user_id`, `user_path`, `lname`, `fname`, `middlename`, `address`, `contact`, `age`, `gender`, `username`, `password`, `usertype`, `date_reg`) VALUES
(1, '2015-84610', './user/Image0016.jpg', 'Admin', 'Admin', 'Admin', 'Tacloban', '0912-907-7750', 19, 'Male', 'admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', 'Admin', 'Dec:13:2015'),
(2, '2015-86398', './user/Image0016.jpg', 'Dp', 'Bacate', 'U', 'Tacloban', '0912-907-7750', 18, 'Male', 'dp', '*6EB9707E469F2B1817D7727DB857BF5F4DF0B476', 'User', 'Dec:13:2015'),
(3, '2015-66942', './user/Image0016.jpg', 'Juan', 'Tamad', 'Pa', 'Tacloban', '0999-478-5312', 19, 'Male', 'juan', '*D4C60B4C430EAECAC4AC4A49BA455C53369DCD2D', 'User', 'Dec:13:2015'),
(31, '2016-68287', './user/unk.png', 'Sadad', 'Fsdf', 'Dsfsf', 'Dgs', '3353-454-6456', 31, 'FEMALE', 'sdsad', '*DA8966FEA05E0A2B8852B4D93B6E753CD31DC900', 'User', 'Feb:16:2016'),
(32, '2016-84492', './user/unk.png', 'Asdaf', 'Sf', 'Sdf', 'Fsf', '2354-354-6546', 21, 'Male', 'sadf', '*209644A604AFEBE83AD2E0110C90F0BA243B931B', 'User', 'Feb:16:2016');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_question`
--

CREATE TABLE `reserve_question` (
  `res_id` int(12) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `room_num` int(12) NOT NULL,
  `question_num` int(12) NOT NULL,
  `question_id` int(12) NOT NULL,
  `difficulty` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `logID` int(12) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `actions` varchar(50) NOT NULL,
  `date_logs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`logID`, `user_id`, `actions`, `date_logs`) VALUES
(1, '2015-84610', 'Logged Out.', 'Feb:17:2016'),
(2, '2015-84610', 'Logged in.', 'Feb:17:2016'),
(3, '2015-84610', 'Logged Out.', 'Feb:17:2016'),
(4, '2015-84610', 'Logged in.', 'Feb:17:2016'),
(5, '2015-84610', 'Logged Out.', 'Feb:17:2016'),
(6, '2015-84610', 'Logged Out.', 'Feb:17:2016'),
(7, '2015-84610', 'Logged in.', 'Feb:17:2016'),
(8, '2015-84610', 'Add Category.', 'Feb:17:2016'),
(9, '2015-84610', 'Add Category.', 'Feb:17:2016'),
(10, '2015-84610', 'Add Category.', 'Feb:17:2016'),
(11, '2015-84610', 'Delete Category.', 'Feb:17:2016'),
(12, '2015-84610', 'Add Question.', 'Feb:17:2016'),
(13, '2015-84610', 'Add Question.', 'Feb:17:2016'),
(14, '2015-84610', 'Add Question.', 'Feb:17:2016'),
(15, '2015-84610', 'Add Question.', 'Feb:17:2016'),
(16, '2015-84610', 'Add Question.', 'Feb:17:2016'),
(17, '2015-84610', 'Add Question.', 'Feb:17:2016'),
(18, '2015-84610', 'Add Question.', 'Feb:17:2016'),
(19, '2015-84610', 'Add Question.', 'Feb:17:2016'),
(20, '2015-84610', 'Add Question.', 'Feb:17:2016'),
(21, '2015-84610', 'Add Question.', 'Feb:17:2016');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brain_achievements`
--
ALTER TABLE `brain_achievements`
  ADD PRIMARY KEY (`bam`);

--
-- Indexes for table `brain_buzz`
--
ALTER TABLE `brain_buzz`
  ADD PRIMARY KEY (`buzz_id`);

--
-- Indexes for table `brain_buzz_current`
--
ALTER TABLE `brain_buzz_current`
  ADD PRIMARY KEY (`bcb`);

--
-- Indexes for table `brain_buzz_result`
--
ALTER TABLE `brain_buzz_result`
  ADD PRIMARY KEY (`buzz_Rid`);

--
-- Indexes for table `brain_comments`
--
ALTER TABLE `brain_comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `brain_finish`
--
ALTER TABLE `brain_finish`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `brain_hint`
--
ALTER TABLE `brain_hint`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `brain_joinroom`
--
ALTER TABLE `brain_joinroom`
  ADD PRIMARY KEY (`jid`);

--
-- Indexes for table `brain_moves`
--
ALTER TABLE `brain_moves`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `brain_question`
--
ALTER TABLE `brain_question`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `brain_quitgame`
--
ALTER TABLE `brain_quitgame`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `brain_result`
--
ALTER TABLE `brain_result`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `brain_rooms`
--
ALTER TABLE `brain_rooms`
  ADD PRIMARY KEY (`brim`);

--
-- Indexes for table `brain_score`
--
ALTER TABLE `brain_score`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `easy_choice`
--
ALTER TABLE `easy_choice`
  ADD PRIMARY KEY (`choice_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `reserve_question`
--
ALTER TABLE `reserve_question`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`logID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brain_achievements`
--
ALTER TABLE `brain_achievements`
  MODIFY `bam` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brain_buzz`
--
ALTER TABLE `brain_buzz`
  MODIFY `buzz_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brain_buzz_current`
--
ALTER TABLE `brain_buzz_current`
  MODIFY `bcb` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brain_buzz_result`
--
ALTER TABLE `brain_buzz_result`
  MODIFY `buzz_Rid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brain_comments`
--
ALTER TABLE `brain_comments`
  MODIFY `com_id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brain_finish`
--
ALTER TABLE `brain_finish`
  MODIFY `bid` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brain_hint`
--
ALTER TABLE `brain_hint`
  MODIFY `hid` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brain_joinroom`
--
ALTER TABLE `brain_joinroom`
  MODIFY `jid` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brain_moves`
--
ALTER TABLE `brain_moves`
  MODIFY `mid` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brain_question`
--
ALTER TABLE `brain_question`
  MODIFY `bid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;
--
-- AUTO_INCREMENT for table `brain_quitgame`
--
ALTER TABLE `brain_quitgame`
  MODIFY `qid` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brain_result`
--
ALTER TABLE `brain_result`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brain_rooms`
--
ALTER TABLE `brain_rooms`
  MODIFY `brim` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brain_score`
--
ALTER TABLE `brain_score`
  MODIFY `sid` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `easy_choice`
--
ALTER TABLE `easy_choice`
  MODIFY `choice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `uid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `reserve_question`
--
ALTER TABLE `reserve_question`
  MODIFY `res_id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `logID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
