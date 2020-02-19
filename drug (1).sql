-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2019 at 04:49 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drug`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'rifat', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `group_name`, `description`, `price`, `image`) VALUES
(3, 'Napa', 'paracetamol', 'Napa Rapid (Paracetamol 500 mg caplet) is a fastest fever and Pain reliever.The makers of Napa have developed a patented technology which allows the caplet to disintegrate in as little as 2 minutes - this new technology is called Actizorb Technology. Unlike standard paracetamol tablets, Napa Rapid caplets with ActizorbÂ® technology allow the paracetamol to be absorbed quickly so that it can get to work. ActizorbÂ® technology is a combination of ingredients, which work together to speed up the rate at which the paracetamol tablet disintegrates and dissolves in the stomach', '10', 'napa-600x600.jpg'),
(2, 'Ace', 'paracetamol', 'Ace Rapid (Paracetamol 500 mg caplet) is a fastest fever and Pain reliever.The makers of Ace have developed a patented technology which allows the caplet to disintegrate in as little as 2 minutes - this new technology is called Actizorb Technology. Unlike standard paracetamol tablets, Ace Rapid caplets with ActizorbÂ® technology allow the paracetamol to be absorbed quickly so that it can get to work. ActizorbÂ® technology is a combination of ingredients, which work together to speed up the rate at which the paracetamol tablet disintegrates and dissolves in the stomach', '15', 'ACE-PARACETAMOL-500.jpg'),
(4, 'Ace Plus', 'paracetamol', 'Ace Plus 100/500 MG Tablet is a Non-steroidal anti-inflammatory (NSAID) drug used to treat pain associated with conditions like Gout, Migraine, Rheumatoid Arthritis, sprains of muscles and joints and in mild to moderate fever in some cases.', '15', 'ace-plus.jpg'),
(5, 'Ace XR', 'paracetamol', 'Paracetamol is indicated in: Fever,common cold and influenza. Headache,toothache, earache, bodyache, myalgia, dysmenorrhoea, neuralgia and sprains. Pain of colic, back pain, post-operative pain, postpartum pain, chronic pain of cancer, inflammatory pain, and post-vaccination pain and fever of children. Rheumatism and osteoarthritic pain & stiffness of joints in fingers, hips, knees, wrists, elbows, feet, ankles and top & bottom of the spine.', '20', 'ACE-XR-600x600.jpg'),
(6, 'Flagyl', 'Metronidazole', 'Flagyl is an antibiotic effective against anaerobic bacteria and certain parasites. Anaerobic bacteria are single-celled, living organisms that thrive in environments in which there is little oxygen (anaerobic environments). Anaerobic bacteria can cause disease in the abdomen (bacterial peritonitis), liver (liver abscess), and pelvis (abscess of the ovaries and the Fallopian tubes). Giardia lamblia and ameba are intestinal parasites that can cause abdominal pain and diarrhea in infected individuals. Trichomonas is a vaginal parasite that causes inflammation of the vagina (vaginitis). Metronidazole selectively blocks some of the functions within the bacterial cells and the parasites resulting in their death.', '20', '5815a643466d9.jpg'),
(13, 'Ostocal -D', 'Calcium', 'Ostocal D Tablet is used for Calcium supplementation, Calcium supplement, Stomach upset, Sour stomach, Upset stomach, Acidity, Acid indigestion, Osteomalacia, Rickets, Heartburn and other conditions. Ostocal D Tablet may also be used for purposes not listed in this medication guide. Ostocal D Tablet contains Calcium Carbonate and Cholecalciferol as active ingredients. Ostocal D Tablet works by neutralizing acids thus relieving acid reflux; providing building blocks for synthesis of enzymes', '140', 'Ostocal_D_30_pcs_jpg-100245-500x500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `full_name`) VALUES
(2, 'nakib@gmail.com', '12345', 'Nakib Hossain'),
(3, 'fahim@gmail.com', '12345', 'Imtiaz Ahmed'),
(5, 'admin', '12345', 'admin'),
(6, 'rifat@gmail.com', '12345', ''),
(7, 'rifat@gmail.com', '12345', 'ikbal hossain'),
(8, 'rifat@gmail.com', '12345', ''),
(13, 'ikbal@gmail.com', '12345', 'ikbal hossain'),
(11, 'rifat@gmail.com', '12345', ''),
(14, 'ikbal@gmail.com', 'abc', 'ikbal hossain'),
(15, 'ikbalrifat@gmail.com', 'asdfgh', 'ikbal'),
(16, 'ikhossain5@gmail.com', '1234', 'rifat'),
(17, 'ikbalrifathossain5000@gmail.com', '1234', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `CustomerID` varchar(20) NOT NULL,
  `CustomerName` varchar(10) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `phone number` varchar(30) NOT NULL,
  `transaction_id` varchar(10) NOT NULL,
  `adress` varchar(10) NOT NULL,
  `Country` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recommend`
--

CREATE TABLE `recommend` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommend`
--

INSERT INTO `recommend` (`id`, `username`, `group_name`, `flag`) VALUES
(12, 'rifat@gmail.com', 'Calcium', 1),
(11, 'rifat@gmail.com', 'paracetamol', 1),
(10, '', 'paracetamol', 1),
(13, 'ikbal@gmail.com', 'paracetamol', 1),
(14, 'ikbalrifathossain5000@gmail.com', 'Calcium', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommend`
--
ALTER TABLE `recommend`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `recommend`
--
ALTER TABLE `recommend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
