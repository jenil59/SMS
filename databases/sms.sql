-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 04:20 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Id` int(10) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `prize` int(5) NOT NULL,
  `mrp` int(5) NOT NULL,
  `isbn` int(20) NOT NULL,
  `nofpages` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `img` varchar(100) NOT NULL,
  `reg_date` varchar(10) DEFAULT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `b_name`, `author_name`, `publisher`, `language`, `prize`, `mrp`, `isbn`, `nofpages`, `quantity`, `description`, `img`, `reg_date`, `userid`) VALUES
(8, 'Getting Started in Technical Analysis: 19 Paperback', 'Getting Started in Technical Analysis: 19 Paperback', 'WILEY', 'English', 699, 999, 471295426, 352, 5, 'Revered by many, reviled by some, technical analysis is the art and science of deciphering price activity to better understand market behavior and identify trading opportunities. In this accessible gu', 'wpwqpekpq_179e8.jpeg', NULL, 0),
(9, 'Great Truths That Set Us ', 'Dr. Joseph Murphy ', 'Fingerprint Publishing', 'English', 150, 200, 2147483647, 216, 5, 'You are creating your life, This very moment, by your thoughts. Your imagination is like a Canvas. Paint a picture, have faith in the reality of its existence, and your picture will come to life. You ', 'nfsalskndalsd_179e8.jpeg', NULL, 3),
(10, 'Karma: A Yogi\'s Guide to Crafting Your Destiny | Spirituality, Self-improvement & Self help books by', 'Sadhguru ', 'Penguin Ananda', 'English', 164, 299, 143452673, 336, 5, '\"Forget what you think you know about karma-Sadhguru shows us it\'s not a punishment for bad behavior, but a vehicle for transformation and empowerment. This book will put you back in charge of your ow', 'dsanojdoa_179e8.jpeg', NULL, 1),
(11, 'Object Oriented Programming- I For GTU B.E. Computer/CSE/ICT Engineering Sem 4 ', 'Harish G. Narula, Anil Prajapati,Manmitsinh Zala', 'TechKnowledge Publications', 'English', 185, 255, 2147483647, 252, 5, 'With clear, concise and easy-to-read material, the tenth edition of Computer Organization and Architecture is a user-friendly source for students studying computers. Subjects such as I/O functions and', 'dsjflnkfeniwae_179e8.jpeg', NULL, 2),
(12, 'Operating System For GTU B.E. Computer/CSE/ICT Engineering Sem 4', 'Dr. Rajesh D. Kadu', 'TechKnowledge Publications', 'English', 205, 245, 2147483647, 284, 5, 'Chapter - 1 Introduction Chapter - 2 Process and Threads Management Chapter - 3 Concurrency Chapter - 4 Inter Process Communication Chapter - 5 Deadlock Chapter - 6 Memory Management Chapter - 7 I/O M', 'wlqlelqkejqle_179e8.jpeg', NULL, 1),
(13, 'Advanced Java Programming for GTU 18 Course (VI- CSE/Prof. Elec.-III - 3160707) ', 'A. A. Puntambekar', 'Technical Publications', 'English', 350, 500, 2147483647, 392, 5, '1.Java Networking Network Basics and Socket overview, TCP/IP client sockets, URL, TCP/IP server sockets, Datagrams, java.net package Socket, ServerSocket, InetAddress, URL, URLConnection. (Chapter - 1', 'skandlansdlasn_179e8.jpeg', NULL, 1),
(14, 'Wings of Fire: An Autobiography of Abdul Kalam', 'Arun Tiwari , APJ Abduk Kalam', 'International Universities Press', 'English', 340, 500, 2147483647, 180, 5, 'Every common man who by his sheer grit and hard work achieves success should share his story with the rest for they may find inspiration and strength to go on, in his story. The \'Wings of Fire\' is one', 'lsknlknsa_179e8.jpeg', NULL, 1),
(15, 'World inbox Gram sevak book GPSSB Gramsevak krushi vigyan book Subject related krushi vishyak ane fa', 'OJASBOOK.COM', 'OJASBOOK.COM', 'GUJARATI ', 179, 270, 2147483647, 300, 5, 'takes all sorts to make a world.? tired of his Spring cleaning, moly, the polite and altruistic Mole, steps out of his secluded home under the ground and reaches the river. He befriends ratty, who tak', 'lsaldnnad_179e8.jpeg', NULL, 1),
(16, 'The Wind In The Willows ', 'Kenneth Grahame', 'Fingerprint! Publishing', 'English', 99, 150, 2147483647, 200, 5, ' He befriends ratty, who takes him on his first boat ride. ?Believe me, My young friend, there is nothing?absolute nothing?half so much worth doing as simply messing about in boats.? Fun and adventure', 'wpwqpekpq_179e8.jpeg', NULL, 3),
(17, 'Price Action Trading', ' Sunil Gurjar (', 'Buzzingstock Publishing House', 'English', 310, 350, 2147483647, 260, 5, 'This book by Sunil Gurjar, founder of Chartmojo, will guide you how to trade in securities and time entry and exit in a better way using price action, without relying much on technical indicators. The', 'sadlasdlasdn_179e8.jpeg', NULL, 2),
(18, 'Eat That Frog!: 21 Great Ways to Stop Procrastinating and Get More Done in Less Time', 'Brian Tracy ', 'Berrett Koehler Publishers', 'English', 150, 250, 2147483647, 144, 10, 'There just isnt enough time for everything on our to-do listȔand there never will be. Successful people dont try to do everything. They learn to focus on the most important tasks and make sure those g', '9781523095131_179e8.jpg', '06/04/22', 2),
(19, 'Bruised Passports: Travelling the World as Digital Nomad', 'savi munjal', 'self', 'english', 302, 399, 0, 135, 10, 'Savi and Vid created Bruised Passports in 2013. Over the years, they have garnered a loyal following of viewers who follow their travels around the world through their beautiful photographs. Their work has appeared in a number of magazines, newspapers, and online portals such as BBC Good Food Magazine, National Geographic Traveller and The Huffington Post, to name a few. They have also appeared in a number of TV shows on Discovery Channel, TLC Asia and NDTV Travel.', 'dssdsdsd_179e8.jpg', '09/04/22', 1),
(20, 'The Psychology of Money: Timeless lessons on wealth, greed, and happiness', 'Morgan Housel', 'Harriman House Publishing', 'English', 908, 1500, 857197681, 256, 10, '\"It’s one of the best and most original finance books in years.\" -- Jason Zweig, The Wall Street Journal\r\n\r\n\"The Psychology of Money is bursting with interesting ideas and practical takeaways. Quite simply, it is essential reading for anyone interested in being better with money. Everyone should own a copy.\" -- James Clear, Author, million-copy bestseller, Atomic Habits\r\n', '81Lb75rUhLL_179e8.jpg', '14/04/22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `fn` varchar(100) NOT NULL,
  `mn` varchar(100) NOT NULL,
  `ln` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobileno` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fn`, `mn`, `ln`, `email`, `mobileno`, `username`, `password`) VALUES
(1, 'jenil', 'k', 'saliya', 'jenil@gmail.com', 2147483647, 'jenil', 'd4078b033cf97554e62a42223129939c'),
(2, 'prit', 'J', 'dhanani', 'PRIT@GMAIL.COM', 685421693, 'prit', 'a7becfc3b9343c012c0c9b2a81969bb0'),
(3, 'jimmy', 'roads', 'kelian', 'jimmy@gmail.com', 698541236, 'jimmy', 'c2fe677a63ffd5b7ffd8facbf327dad0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
