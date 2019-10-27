-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2019 at 05:59 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_review`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `dir` ()  BEGIN
SELECT director_id, director_name,age,no_of_movies FROM director WHERE 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `top_rated` ()  NO SQL
BEGIN
SELECT movie_name,prating,movie_language,movie_year FROM movie WHERE prating>8 ORDER by prating DESC;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `actor_id` int(11) NOT NULL,
  `actor_name` varchar(20) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `no_of_movies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`actor_id`, `actor_name`, `gender`, `age`, `no_of_movies`) VALUES
(1, 'Daniel radcliff', 'M', 30, 28),
(2, 'Yash', 'M', 33, 18),
(3, 'Mahesh Babu', 'M', 43, 25),
(4, 'Vijay Joseph', 'M', 45, 63),
(5, 'RajniKanth', 'M', 68, 117),
(6, 'Aamir Khan', 'M', 54, 57),
(7, 'Leonardo decaprio', 'M', 50, 44),
(8, 'Jesse Eisenberg', 'M', 36, 38),
(9, 'Sudeep', 'M', 46, 59),
(10, 'Sri Murali', 'M', 0, 7),
(11, 'Suriya\r\n            ', 'M', 44, 55),
(12, 'Samantha', 'F', 32, 41),
(13, 'Parvathi Menon', 'F', 31, 22),
(14, 'Robert Downey Jr', 'M', 54, 65),
(15, 'Scarlett Johansson', 'F', 34, 54),
(16, 'Nivin Pauly', 'M', 35, 28),
(17, 'Ryan Reynolds', 'M', 43, 54),
(18, 'Joaquin Phoenix', 'M', 44, 40),
(19, 'Allu Arjun', 'M', 36, 24),
(20, 'Chiranjeevi', 'M', 64, 87),
(21, 'Vijay Sethupathi', 'M', 41, 50),
(22, 'Akshay Kumar', 'M', 52, 130),
(23, 'Arnold Schwaznegger', 'M', 72, 55),
(24, 'Nani', 'M', 35, 29),
(25, 'Dhruv Kumar', 'M', 24, 1),
(26, 'Jr.Nandamuri Taraka ', 'M', 36, 28);

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `director_id` int(11) NOT NULL,
  `director_name` varchar(20) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `no_of_movies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`director_id`, `director_name`, `age`, `no_of_movies`) VALUES
(101, 'Prashant neel', 39, 2),
(102, 'Manu Ashokan', 30, 5),
(103, 'James Cameron', 65, 38),
(104, 'Rajakumar Hirani', 56, 14),
(105, 'K.V.Anand', 52, 25),
(106, 'S Krishna', 44, 19),
(107, 'A R Murugadoss', 45, 27),
(108, 'B V Nandini Reddy', 32, 4),
(109, 'Atlee', 33, 7),
(110, 'Anil Ravipudi', 36, 13),
(111, 'Anthony Russo', 49, 8),
(112, 'Louis Leterrier', 46, 10),
(113, 'Farhad Samji', 45, 15),
(114, 'Trivikram', 47, 30),
(115, 'Rajamouli', 46, 25),
(116, 'Todd Philips', 48, 17),
(117, 'Dhyan Sreenivasan', 30, 7),
(118, 'Tim Miller', 49, 39),
(119, 'Gireesaaya', 30, 1),
(120, 'David Leitch', 49, 7),
(121, 'Mani Ratnam', 63, 28),
(122, 'Vijaya Bapineedu', 82, 6),
(123, 'Puri Jagannadh\r\n    ', 53, 43),
(124, 'David Yates\r\n       ', 56, 10),
(125, 'Chethan kumar', 35, 8),
(126, 'Cate Shortland', 51, 22),
(127, 'Surender reddy', 43, 12),
(128, 'Vikram Kumar', 44, 8);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(50) NOT NULL,
  `movie_year` year(4) NOT NULL,
  `movie_language` varchar(20) NOT NULL,
  `plot` varchar(200) NOT NULL,
  `actor_id` int(11) NOT NULL,
  `director_id` int(11) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `prating` int(11) NOT NULL,
  `img_path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_name`, `movie_year`, `movie_language`, `plot`, `actor_id`, `director_id`, `genre`, `prating`, `img_path`) VALUES
(201, 'Harry Potter Deathly hallows-1', 2010, 'English', 'Without the guidance and protection of their professors, Harry (Daniel Radcliffe), Ron (Rupert Grint', 1, 124, 'Mystery', 0, '\'Images/harry potter.jpg\''),
(202, 'K.G.F Chapter-1', 2018, 'Kannada', 'Rocky, a young man, seeks to acquire power and wealth to fulfil a promise made to his dying mother. Later, he finds not only wealth and power but also something more meaningful, respect.\r\n', 2, 101, 'Action', 9, '\'Images/kgf.jpg\''),
(203, 'chekka chivantha vaanam', 2018, 'Tamil', 'Three brothers conspire against each other in a bid to take over their father\'s criminal empire following his sudden death. Meanwhile, someone else tries to take advantage of the rift between them.', 21, 121, 'Crime', 0, '\'Images/chekka chivantha vanam.jpeg\''),
(204, 'sarileru neekevvaru', 2020, 'Telugu', 'which translates to nobody can matchyou', 3, 110, 'Action ', 0, '\'Images/sarileru neekevvaru.jpg\''),
(205, 'Business man', 2012, 'Telugu', 'Man who lands in Mumbail to rule underworld mafia', 3, 123, 'crime', 1, '\'Images/business man.jpg\''),
(206, 'Bigil', 2019, 'Tamil', 'Story revolves around a football coach; who struggles to fulfill the dream of his late friend and seeks out revenge on the death of his best friend.\r\n', 4, 109, 'drama', 8, '\'Images/bigil.jpg\''),
(207, '3 Idiots', 2009, 'Hindi', 'In college, Farhan and Raju form a great bond with Rancho due to his refreshing outlook. Years later, a bet gives them a chance to look for their long-lost friend whose existence seems rather elusive.', 6, 104, 'drama', 0, '\'Images/3 idiots.jpg\''),
(208, 'Titanic', 1997, 'English', 'Seventeen-year-old Rose hails from an aristocratic family and is set to be married. When she boards the Titanic, she meets Jack Dawson, an artist, and falls in love with him.\r\n', 7, 103, 'Drama', 0, '\'Images/titanic.jpg\''),
(209, 'Darbar', 2020, 'Tamil', 'Darbar is an upcoming Indian Tamil-language action thriller film written and directed by AR Murugadoss and produced by Allirajah Subaskaran under the banner of Lyca Productions. The film starring Raji', 5, 107, 'Adventure', 0, '\'Images/darbar.jpg\''),
(210, 'Pailwan', 2019, 'kannada', 'A fierce wrestler fights brutal oppression and becomes a symbol of hope for people.\r\n', 9, 106, 'Sport', 10, '\'Images/pailwan.jpg\''),
(211, 'kaappaan', 2019, 'Tamil', 'In this dynamic action thriller, Suriya plays a Special Protection Group (SPG) officer in charge of protecting the Prime Minister. When a spy turns rogue and plots to kill the country\'s leader, he mus', 11, 105, 'Thriller', 8, '\'Images/kaappaan.jpg\''),
(212, 'Now you see me', 2013, 'English', 'Four street magicians, Daniel, Merritt, Henley and Jack, ransack a huge amount of money belonging to insurance baron Arthur Tressler while being chased by FBI agent Dylan and Interpol agent Alma.\r\n', 8, 112, 'Mystery', 0, '\'Images/now you see me.jpg\''),
(213, 'Ayan', 2009, 'Tamil', 'Deva works for Arumugam, a smuggler, who has taken care of him for many years. However, when his best friend gets killed, Deva decides to help the police to nab a dangerous drug lord.\r\n', 11, 105, 'Action', 0, '\'Images/ayan.jpg\''),
(214, 'Joker', 2019, 'English', 'Forever alone in a crowd, failed comedian Arthur Fleck seeks connection as he walks the streets of Gotham City. Arthur wears two masks -- the one he paints for his day job as a clown, and the guise he', 18, 116, 'Drama', 2, '\'Images/joker.jpg\''),
(215, 'Ala vaikuntapuram lo', 2020, 'Telugu', 'movie revolves around a guy and his emotions with hs family', 19, 114, 'Drama', 0, '\'Images/alavaikuntapuram lo.jpg\''),
(216, 'Thuppakki', 2012, 'Tamil', 'An army captain visits Mumbai to be with his family and find a suitable bride. However, an explosion in the city sets him off on a mission to find and disable a terrorist sleeper cell in the city', 4, 107, 'Thriller', 0, '\'Images/thuppakki.jpg\''),
(217, 'K.G.F Chapter-2', 2020, 'kannada', 'The host sheds light on the latest news updates pertaining to the sequel of the well-received Kannada movie \'KGF: Chapter 1\'.', 2, 101, 'Drama', 0, '\'Images/kgf chapter2.jpg\''),
(218, 'Bharaate', 2019, 'Kannada', 'Bharaate movie is romantic family entertainer directed by Bahaddur Chethan and produced by Supreeth.', 10, 125, 'Romance', 0, '\'Images/bharaate.jpg\''),
(219, 'Oh! Baby', 2019, 'Telugu', 'Savitri, a 70-year-old woman who is not happy with her life, accuses God of her fate. When she gets her photograph clicked at a studio, she gets transformed into a 24-year-old beautiful female.', 12, 108, 'Fantasy', 0, '\'Images/oh baby.jpg\''),
(220, 'Uyare', 2019, 'Malayalam', 'Pallavi aspires to be a pilot but her career is jeopardised when she falls victim to an acid attack by Govind, an obsessive man who was formerly her boyfriend.', 13, 102, 'Drama', 0, '\'Images/uyare.jpg\''),
(221, 'Avengers Endgame', 2019, 'English', 'After Thanos, an intergalactic warlord, disintegrates half of the universe, the Avengers must reunite and assemble again to reinvigorate their trounced allies and restore balance.', 14, 111, 'Sci-Fi', 0, '\'Images/avengers endgame.jpg\''),
(222, 'Black widow', 2020, 'English', 'A film about Natasha Romanoff in her quests between the films Civil War and Infinity War.', 15, 126, 'Adventure', 0, '\'Images/black widow.jpg\''),
(223, 'Love Action Drama', 2019, 'Malayalam', 'A man goes through all kinds of action to impress the girl he is in love with a hope to marry her.', 16, 117, 'Comedy', 0, '\'Images/love action drama.jpg\''),
(224, 'Deadpool-2', 2018, 'English', 'Deadpool protects a young mutant Russell from the authorities and gets thrown in prison. However, he escapes and forms a team of mutants to prevent a time-travelling mercenary from killing Russell.', 17, 120, 'Sci-fi', 1, '\'Images/deadpool 2.jpg\''),
(225, 'Sye raa narasimha reddy', 2019, 'Telugu', 'Uyyalawada Narasimha Reddy starts a rebellion against the British East India Company', 20, 127, 'Drama', 0, '\'Images/sye raa narasimha reddy.jpeg\''),
(226, 'RRR', 2020, 'Telugu', 'RRR is an upcoming 2020 Indian Telugu-language period action film written and directed by S. S. Rajamouli. It stars N. T. Rama Rao Jr., Ram Charan, Alia Bhatt and Ajay Devgn.', 26, 115, 'Action', 0, '\'Images/RRR.jpg\''),
(227, 'housefull 4', 2019, 'Hindi', 'Three pairs of reincarnated lovers reunite in the present day -- but the men wind up falling for the wrong women.', 22, 113, 'Drama', 0, '\'Images/housefull 4.jpg\''),
(228, 'Terminator:dark fate', 2019, 'English', 'Sarah Connor and a hybrid cyborg human must protect a young girl from a newly modified liquid Terminator from the future.', 23, 118, 'Fantasy', 0, '\'Images/terminator dark fate.jpg\''),
(229, 'Adithya Varma', 2019, 'Tamil', 'Adithya Varma is an upcoming Indian Tamil-language romantic drama film directed by Gireesaaya and produced by Mukesh Mehta under E4 Entertainment. The film stars newcomer Dhruv Vikram and Banita Sandh', 25, 119, 'Drama', 0, '\'Images/adithya varma.jpeg\''),
(230, 'Gang leader', 2019, 'Telugu', 'Gang Leader follows the story of an all-women gang led by Nani who is a crime fiction writer with a pen name \'Pencil\'.', 24, 128, 'Thriller', 0, '\'Images/gang leader.jpg\'');

-- --------------------------------------------------------

--
-- Table structure for table `movie_cast`
--

CREATE TABLE `movie_cast` (
  `actor_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_cast`
--

INSERT INTO `movie_cast` (`actor_id`, `movie_id`, `role`) VALUES
(1, 201, 'Hero'),
(2, 202, 'Hero'),
(2, 217, 'Hero'),
(3, 204, 'Hero'),
(3, 205, 'Hero'),
(4, 206, 'Hero'),
(4, 216, 'Hero'),
(5, 209, 'Hero'),
(6, 207, 'Hero'),
(7, 208, 'Hero'),
(8, 212, 'Hero'),
(9, 210, 'Hero'),
(10, 218, 'Hero'),
(11, 211, 'Hero'),
(11, 213, 'Hero'),
(12, 219, 'Heroine'),
(13, 220, 'Heroine'),
(14, 221, 'Hero'),
(15, 222, 'Heroine'),
(16, 223, 'Hero'),
(17, 224, 'Hero'),
(18, 214, 'Hero'),
(19, 215, 'Hero'),
(20, 225, 'Hero'),
(21, 203, 'Hero'),
(22, 227, 'Hero'),
(23, 228, 'Hero'),
(24, 230, 'Hero'),
(25, 229, 'Hero'),
(26, 226, 'Hero');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewer_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `num_rating` float NOT NULL,
  `r_data` varchar(500) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`reviewer_id`, `movie_id`, `num_rating`, `r_data`, `username`) VALUES
(2, 211, 7, 'not upto the point', 'test'),
(2, 224, 1, 'not good', 'test'),
(4, 202, 9, 'Super', 'test123'),
(4, 206, 8.5, 'Excellent', 'test123'),
(4, 211, 10, 'super surya', 'test123'),
(4, 214, 2.5, '', 'test123'),
(5, 210, 10, 'worth watching', 'Surya'),
(9, 202, 10, 'the mindblowing ultimate movie in the world', 'DATTA'),
(10, 202, 8, 'i have never heard such a bgm before in my life', 'arpitha'),
(11, 202, 9, 'awesome bhai\r\nsalaam rocky bhai', 'ananya'),
(12, 205, 1.5, '', 'Gangadhar');

--
-- Triggers `review`
--
DELIMITER $$
CREATE TRIGGER `averagereview` AFTER INSERT ON `review` FOR EACH ROW update movie set prating=(SELECT AVG(num_rating) from review group by movie_id having movie.movie_id=review.movie_id)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(11, 'ananya', 'ananya', 'ananya'),
(10, 'arpitha', 'arpitha', 'arpitha'),
(9, 'datta', 'DATTA', '12345678'),
(3, 'disha', 'dishpish@gmail.com', 'abcdefg'),
(12, 'Gangadhar', 'gangadharakalwadi@gmail.com', '1234567890'),
(5, 'Surya', 'Surya@gmail.com', 'surya'),
(2, 'test', 'test', 'test'),
(4, 'test123', 'test123', 'test123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`actor_id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`director_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`,`actor_id`,`director_id`),
  ADD KEY `actor_id` (`actor_id`),
  ADD KEY `director_id` (`director_id`);

--
-- Indexes for table `movie_cast`
--
ALTER TABLE `movie_cast`
  ADD PRIMARY KEY (`actor_id`,`movie_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewer_id`,`movie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`actor_id`),
  ADD CONSTRAINT `movie_ibfk_2` FOREIGN KEY (`director_id`) REFERENCES `director` (`director_id`);

--
-- Constraints for table `movie_cast`
--
ALTER TABLE `movie_cast`
  ADD CONSTRAINT `movie_cast_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`actor_id`),
  ADD CONSTRAINT `movie_cast_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
