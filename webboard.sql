-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2018 at 11:36 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `status`, `create_date`, `create_by`, `update_date`, `update_by`) VALUES
(1, 'หมวดงานห้องน้ำ', 1, '2018-04-20 00:00:00', 'admin', '0000-00-00 00:00:00', ''),
(2, 'หมวดงานห้องนั่งเล่น', 1, '2018-04-20 00:00:00', 'admin', '0000-00-00 00:00:00', ''),
(3, 'หมวดอุปกรณ์ทำความสะอาด', 1, '2018-04-20 00:00:00', 'admin', '0000-00-00 00:00:00', ''),
(4, 'หมวดผลิตภัณฑ์ทำความอะอาด', 1, '2018-04-20 00:00:00', 'admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `ReplyID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `QuestionID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `CreateDate` datetime NOT NULL,
  `Details` text NOT NULL,
  `Name` varchar(50) NOT NULL,
  `ip_address` varchar(26) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`ReplyID`, `QuestionID`, `CreateDate`, `Details`, `Name`, `ip_address`) VALUES
(00035, 00012, '2018-04-23 13:26:56', 'เพิ่งรู้นะเนี่ย จะนำไปใช้นะคะ', 'อิอิ', '::1'),
(00034, 00014, '2018-04-23 13:22:25', 'ไม่ทราบคะ ', 'อิอิ', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_login` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `user_fullname` varchar(200) NOT NULL,
  `user_type_id` varchar(10) NOT NULL,
  `user_status` varchar(1) NOT NULL,
  `last_login` date NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_login`, `password`, `user_fullname`, `user_type_id`, `user_status`, `last_login`, `create_date`, `create_by`, `update_date`, `update_by`) VALUES
('aa@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'paweena sooksai', '3', '1', '2018-04-22', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
('gfdg', 'd41d8cd98f00b204e9800998ecf8427e', 'gdfgdf', '1', '1', '0000-00-00', '2018-04-23 18:34:42', 'tunwadeenarongrit@gmail.com', '0000-00-00 00:00:00', ''),
('tum@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'teerapong namdokmai', '2', '1', '2018-04-22', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
('tumelecza@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'ใจดี มากมาก', '1', '1', '0000-00-00', '2018-04-23 18:33:42', 'tunwadeenarongrit@gmail.com', '0000-00-00 00:00:00', ''),
('tunwadeenarongrit@gmail.com', '03bdc3ee39f8f9ab16767655346e8c62', 'tunwadee narongrit', '1', '1', '2018-04-13', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(11) NOT NULL,
  `user_type_name` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL,
  `update_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `user_type_name`, `status`, `create_date`, `create_by`, `update_date`, `update_by`) VALUES
(1, 'admin', 1, '2018-04-21 00:00:00', 'admin', '0000-00-00 00:00:00', ''),
(2, 'Moderator', 1, '2018-04-21 00:00:00', 'admin', '0000-00-00 00:00:00', ''),
(3, 'user', 1, '2018-04-21 00:00:00', 'admin\r\n', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `webboard`
--

CREATE TABLE `webboard` (
  `QuestionID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `CreateDate` datetime NOT NULL,
  `Question` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `Details` text NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `View` int(5) NOT NULL,
  `Reply` int(5) NOT NULL,
  `Status` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webboard`
--

INSERT INTO `webboard` (`QuestionID`, `CreateDate`, `Question`, `cate_id`, `Details`, `ip_address`, `Name`, `View`, `Reply`, `Status`) VALUES
(00014, '2018-04-23 13:21:54', '[CR]วิธีล้างเครื่องประดับเงินให้วาววับด้วยแป้งก้อนเดียว', 2, 'วิธีล้างเครื่องเงินโคตรเน่าๆๆๆ ให้เงาวับ ง่ายมากๆ ด้วยแป้งก้อนเดียว\n\nช่วงนี้ต้องแต่งชุดไทยบ่อย เครื่องประดับชุบเคลือบอื่นๆ ก็ใส่กับเขาไม่ค่อยได้ ไปขุดกรุเจอเครื่องประดับเงินเก่ามาชุดหนึ่ง สร้อย แหวน กิ๊ฟติดผม แต่สภาพเน่าโคตรๆๆๆๆๆๆ\n\nเที่ยวไปเดินหาน้ำยาทั่วตลาดจะมาล้าง เจอร้านรับล้างเครื่องเงินเขาบอกแป้งของเขาเลิศมาก ล้างทำความสะอาดเครื่องเงินวาววับ ดีกว่าน้ำยาเคมีเพราะมันจะกัดเนื้อเครื่ิองเงิน \n\nมันก็น่าลองอยู่ เลยจัดมาหนึ่งกล่อง ผลของมันน่าทึ่งจริงๆ เลย จากเงินเน่าๆ ตายซาก คืนชีพขึ้นมาทันที\n\nขอบอกว่าของจริงขาววาววับกว่าในคลิป ในคลิปจะไม่ค่อยชัด\n\nแป้งที่ล้างคราบดำๆ ที่เกาะเครื่องเงินเป็นแป้งที่มาจากฮ่องกง ก้อนขาวๆ หอมๆ ดูจะออกไปทางเครื่องสำอางมากกว่าผงขัดเงิน แต่เท่าที่ลองใช้มันโอเคเลยค่ะ\n\nคลิปเต็ม\nhttps://youtu.be/7CR7rio9C6k', '::1', 'aa@gmail.com', 2, 1, '1'),
(00013, '2018-04-23 13:21:25', 'โซฟาผ้าเป็นคราบทำความสะอาดยังไงให้หายคะ (ถอดซักไม่ได้)', 3, 'พอดีโซฟาที่บ้านเป็นแบบผ้าซึ่งถอดซักไม่ได้เลอะประจำเดือนค่ะ เลยใช้น้ำชุบออกแล้วแต่พอแห้งแล้วเป็นคราบ [Spoil] คลิกเพื่อดูข้อความที่ซ่อนไว้ พอจะมีวิธีทำให้คราบหายมั้ยคะ', '::1', 'aa@gmail.com', 0, 0, '1'),
(00012, '2018-04-23 13:18:29', 'การทำความสะอาดบ้านแบบผิด ๆ ที่คุณอาจทำมันมาตลอดทั้งชีวิต!', 2, '   คุณทราบหรือไม่ว่า!  วิธีการทำความสะอาดของบางอย่างที่คุณทำมาตลอดทั้งชีวิตนั้นเป็นวิธีที่สิ้นเปลืองทั้งเวลาและแรงงาน จริง ๆ แล้ว ของบางอย่าง หากรู้วิธีจัดการกับพวกมัน ชีวิตของคุณแม่บ้านก็จะง่ายขึ้นเยอะ วันนี้แอดมินขอเสนอวิธีการทำความสะอาดที่ถูกต้องมาเริ่มกันเลย!!\n\n1.การทำความสะอาดกระจกหน้าต่าง แม้ว่าเราจะได้รับการสั่งสอนมาว่าอย่าไปทำความสะอาดกระจกในวันที่ฝนตก แต่เรื่องกลับกลายเป็นว่าวันที่ฟ้าใสแดดเปรี้ยงนั่นกลายเป็นช่วงเวลาที่ไม่เหมาะจะเช็ดกระจกเอาเสียเลย ทำไมจึงเป็นเช่นนั้น ก็แสงแดดที่สองเปรี้ยงมาที่กระจกกลับทำให้กระจกแห้งเร็ว ยังเช็ดไม่ทันเกลี้ยง ก็แห้งซะแล้ว คราบน้ำ และน้ำยา ก็แห้งติดกระจก ต้องเช็ดแล้วเช็ดอีก ทำให้เปลืองแรงและเวลามากขึ้น\n\n2.การทำความสำอาดคราบสกปรกบนพรม การที่คุณเอาฟองน้ำมาเช็ดและออกแรงถู ทำให้คราบสกปรกนั้นขยายวงกว้างมากขึ้น คราบสกปรกก็ติดลึกลงไปอีกและกลายเป็นคราบถาวรไปเลย ดังนั้นแทนที่จะเอาฟองน้ำมาเช็ด มาถู ควรเปลี่ยนเป็นใช้กระดาษซับออกไปแทนจะดีกว่า\n\n3.การทำความสะอาดสุขาหรือกล่องทรายสำหรับปลดทุกข์ของสัตว์เจ้าเหมียว เรื่องนี้คนเลี้ยงแมวเข้าใจกันดีว่า สุขาของน้องแมวช่างไม่น่าพิศมัยเอาเสียเลย ทั้งความสกปรก ทั้งกลิ่นที่โชยมาเต็ม ๆ แต่ทั้งนี้มีตัวช่วยที่บรรเทาเบาบางกลิ่นลงได้ ตัวช่วยที่ว่านั้นคือใส่เบกกิ้งโซดาลงไปด้านล่างกล่องก่อน แล้วค่อยใส่สารดูดซับลงไปในกล่องตามปกติ เบกกิ้งโซดาจะช่วยทำให้กลิ่นโดยรวมสดชื่นขึ้นได้', '::1', 'aa@gmail.com', 3, 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`ReplyID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_login`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `webboard`
--
ALTER TABLE `webboard`
  ADD PRIMARY KEY (`QuestionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `ReplyID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `webboard`
--
ALTER TABLE `webboard`
  MODIFY `QuestionID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
