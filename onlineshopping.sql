-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2018 at 07:31 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `sel_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `pay_mode` varchar(255) NOT NULL,
  `sel_id` int(11) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`user_id`, `payment_id`, `prod_id`, `quantity`, `pay_mode`, `sel_id`, `order_time`) VALUES
(1, 14, 1, 2, 'cod', 2, '2017-11-02 17:52:45'),
(1, 14, 2, 1, 'cod', 2, '2017-10-30 13:56:33'),
(1, 14, 27, 1, 'cod', 5, '2017-10-30 13:56:33'),
(1, 27, 7, 1, 'cod', 2, '2017-11-02 18:30:55'),
(1, 28, 14, 2, 'cod', 2, '2017-11-02 18:31:19'),
(1, 29, 1, 1, 'cod', 2, '2017-11-03 04:27:35'),
(1, 30, 1, 1, 'cod', 2, '2017-11-03 04:28:42'),
(1, 31, 1, 1, 'cod', 2, '2017-11-03 04:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `pay_mode` varchar(255) NOT NULL,
  `total_cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`user_id`, `payment_id`, `pay_mode`, `total_cost`) VALUES
(1, 14, 'cod', 30549),
(1, 27, 'cod', 231),
(1, 28, 'cod', 1298),
(1, 29, 'cod', 300),
(1, 30, 'cod', 300),
(1, 31, 'cod', 300);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `sel_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avail_quan` int(11) NOT NULL,
  `mrp` double NOT NULL,
  `discount` double NOT NULL,
  `shipping_charges` double NOT NULL,
  `description` longtext NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `sel_id`, `name`, `avail_quan`, `mrp`, `discount`, `shipping_charges`, `description`, `category`) VALUES
(1, 2, 'Classmate Notebooks', 15, 250, 0, 50, '200 pages each set of 5', 'Books'),
(2, 2, 'Samsung S7 Edge', 7, 35000, 5000, 0, 'black pearl, 128gb', 'Electronics'),
(3, 2, 'Casio-120D Business Calculator', 15, 550, 0, 0, 'black,solar and battery powered', 'Office Products'),
(4, 2, 'Oneplus 5', 2, 33000, 2000, 0, 'slate gray 6gb ram+64gb memory', 'Electronics'),
(5, 2, 'PSC for VA for CAT', 10, 300, 101, 50, 'by nishit sinha', 'Books'),
(6, 2, 'Patanjali Honey', 15, 70, 0, 40, '250g', 'Foods'),
(7, 2, 'Looking for Alaska', 9, 260, 99, 70, 'by john green', 'Books'),
(8, 2, 'Philips Iron', 15, 1500, 0, 100, '1440-watt steam iron with spray', 'Appliances'),
(11, 2, 'Redmi 4(Black, 32GB)', 20, 8999, 0, 0, '13MP primary camera with 5-elements lens, f/2.2 aperture, PDAF, high dynamic range (HDR), panaroma, 1080p full HD video recording and 5MP front facing camera \r\n12.7 centimeters (5-inch) display with 1280 x 720 pixels resolution and 293 ppi pixel density \r\nAndroid v6.0.1 Marshmallow operating system with up to 1.4GHz Qualcomm Snapdragon 435 octa core processor with Adreno 505 GPU, 3GB RAM, 32GB internal memory expandable up to 128GB and dual SIM (micro+nano) dual-standby (4G+4G), Hybrid SIM slot \r\n4100mAH lithium-ion battery providing talk-time of 36 hours and standby time of 432 hours \r\n1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase \r\n', 'Electronics'),
(13, 2, 'JBL C100SI Earphone', 20, 1299, 0, 0, 'Superior JBL sound, with bass you can feel.\r\nThe 3 sizes of ear tips that are included allow you to choose a size that gives you the most comfortable listening experience even for longer listening periods.\r\nOne-button universal remote with mic: Answer and manage your calls effortlessly, with the touch of a button.\r\nDriver Size: 9mm.\r\nWorks with Android and iOS devices.\r\nFrequency Range: 20Hz to 20kHz.\r\n3.5mm connector with 1.2m long cable.', 'Electronics'),
(14, 2, 'Sun Tigers Mercury Leather Flip Cover for redmi 4', 5, 599, 0, 100, 'Redmi 4 (Please check your model no before order) \r\nBE SAFE: Buy Original Sun Tiger products from site (shown below as \'Sold By sun tiger Store\'). As only Original products will be eligible for Replacement Guarantee and Low-cost warranty terms \r\nComfortable, lightweight design that protects without adding bulk . Provides a comfortable grip,added protection against accidental drops \r\nComplete access to all features of the device including microphone, speaker, camera and all buttons. Enhance the appearance of the overall phone \r\nBranded Product easy to install and use made up of High qualty material and Value For Money.Imported Shock Absorption Material.Excellent Looks.Provides Complete Protection. ', 'Electronics'),
(15, 3, 'Sony Microvault 16GB Pen Drive', 10, 349, 0, 70, '16GB storage capacity \r\nNew simple and stylish model with retractable USB connector \r\nHi-speed USB 2.0 for a convenient transfer of large files \r\nPlug and play \r\nFor any assistance contact Sony Contact Centre (Toll free No- 1800-103-7799) Sony India Contact Centre Email address i.e. sonyindia.care@ap.sony.com \r\nSony India Contact Centre Email address i.e. sonyindia.care@ap.sony.com ', 'Electronics'),
(16, 3, 'iBall 11.6 Inches Compbook', 15, 18485, 0, 0, 'Touch at your fingertips 29.46cm (11.6\") HD Display. Feel freely to move your cursor with your fingertips where iBall CompBook i360 comes with touch display. \r\nIt is powered by IntelÂ® Quad Core processor, which provides an incredible speed of up to 1.84 GHz and seamless powerful experience. \r\nFlexible it rotates 360 degrees.(with RDS3T (Robust Double Spindle 360Â° Technology)) \r\nClassy, Ultra-Sleek and Light Weight Sleek of just 170 mm and easy to carry weighing just 1.35 kgs. \r\nExcellent Battery Life While you have prolonged working hours, stay charged with a gigantic 10,000mAh Li-Polymer Battery. ', 'Electronics'),
(17, 3, 'Bajaj Rex 500 Watt Mixer Grinder', 10, 2005, 0, 0, 'This product does not require installation. please contact brand customer care for any product related queires. Customer Service Number: 18001025963 \r\nDo not worry if you experience some burning smell when you run your mixer grinder for the 1st time .This is due to the motor varnish getting heated for the 1st time. The problem should not recur in subsequent uses. If it does, please contact Brand Service Centre \r\nSince your mixer grinder runs on a powerful motor, there will be some noise. If the noise level seems abnormal, please contact Brand Service Centre \r\nSturdy stainless steel jars for liquidizing , wet/dry grinding and chutney making \r\nJar Capacity:1.25 Litre liquidizing jar, 0.88 Litre multi purpose jar, 0.3 Litre chutney jar \r\n3 speed control with incher for momentary operation \r\nMulti-functional blade system ', 'Appliances'),
(18, 3, 'Philips HP810006 Hair Dryer', 15, 675, 0, 0, 'Advanced concentrator technology with quick-heat head \r\nNot cordless, 1.5-meter power cord \r\nCompact design for easy handling; easy storage hook for convenient storage \r\n2 flexible speed settings for careful drying \r\n1000 watts and 2 years Philips India warranty from the date of purchase \r\n2 Years Manufacturer Warranty from date of purchase ', 'Appliances'),
(19, 3, 'Prestige Electric Kettle PKOSS', 10, 1195, 0, 0, 'Authorised Seller: Kitchen Mart \r\nKey Features : 1.8 Liter Capacity, Elegant Handles with Single- Touch Lid Locking, Automatic Cut-Off When Water Has Boiled, Concealed Element, Power Indicator, 360 Degree Swivel Base. 1500 W \r\n1 year warranty ', 'Electronics'),
(20, 3, 'Bajaj DX 7 1000-Watt Dry Iron', 10, 589, 0, 0, 'This product does not require installation. please contact brand customer care for any product related queires. Customer Service Number: 18001025963 \r\nNon-stick coated golden colour sole plate \r\nSuper clean finish with pleasant aesthetics \r\nCool touch body with comfortable hand grip \r\nLight weight and 360 degree swivel cord \r\nThermal fuse for safety \r\nWarranty: 2years on product ', 'Appliances'),
(21, 3, 'IFB 25 L Convection Microwave Oven', 10, 10209, 0, 0, 'Stainless steel cavity and LED display \r\nClock with timer option, 10 power levels and temperature settings \r\nCombi-Tec: 2 - (Grill + Microwave) and 4 - (Convection + Microwave) \r\nWeight defrost, steam clean and multi-stage cooking \r\n26 auto cook menus, express cooking and auto reheat \r\nDeodorize, cooling feature and keep warm \r\nSensor malfunction protection, over heating protection and child safety lock ', 'Appliances'),
(22, 4, 'How to win friends and influence people', 10, 100, 0, 70, 'This is the book that gave birth to a self-improvement industry that spans the Globe (according to the Daily Express Newspaper). First written in 1936, this is the 2016 edition specially typeset for easy readability and offering terrific value for money. The book has sold over 32 million copies worldwide and has been translated into every major language. Still as vibrant and helpful as the day it was written it offers a simple set of guidelines, lucidly explained, that will enable every reader gain insights into being Popular, Persuasive, Influential and Happy in all of his or her relationships.', 'Books'),
(23, 4, 'I do what I do', 15, 490, 0, 0, 'When Raghuram G. Rajan took charge as Governor of the Reserve Bank of India in September 2013, the rupee was in free fall, inflation was high, India had a large current account deficit and India\'s exchange reserves were falling. As measure after measure failed to stabilize markets, speculators sensed a full-blown crisis and labelled India one of the Fragile Five economies. Rajan\'s response was to go all out, not just to tackle the crisis of confidence, but also to send a strong message about the strength of India\'s institutions and the country\'s ongoing programme of reform. He outlined a vision that went beyond the immediate crisis to focus on long-term growth and stability, thus restoring investor confidence. Boldness and farsightedness would be characteristic of the decisions he took in the ensuing three years. Rajan\'s commentary and speeches in I Do What I Do convey what it was like to be at the helm of the central bank in those turbulent but exciting times. Whether on dosanomics or on debt relief, Rajan explains economic concepts in a readily accessible way. Equally, he addresses key issues that are not in any banking manual but essential to growth: the need for tolerance and respect to assure India\'s economic progress, for instance, or the connection between political freedom and prosperity. I Do What I Do offers a front-row view into the thinking of one of the world\'s most respected economists, one whose commitment to India\'s progress shines through in the essays and speeches here. It also brings home what every RBI Governor discovers for himself when he sits down at his desk on the 18th floor: the rupee stops here. Right here!', 'Books'),
(24, 4, 'Attitude is everything Change your attitude', 10, 150, 0, 50, 'Do you dread going to work? Do you feel tired, unhappy, weighed down? Have you given up on your dreams? The road to a happier, more successful life starts with your attitude-and your attitude is within your control. Whether your outlook is negative, positive or somewhere in between, Jeff Keller, motivational speaker and coach, will show you how to take control and unleash your hidden potential through three powerful steps: -THINK! Success begins in the mind. The power of attitude can change your destiny. -SPEAK! Watch your words. How you speak can propel you towards your goals. -ACT! Don\'t sit back. Take active steps to turn your dreams into reality. Soon, you will be energized and see new possibilities. You will be able to counter adversities and develop talents unique to you. Your relationships will improve, both at work and in your personal life. All you need is this step-by-step programme to change your attitude and your life!', 'Books'),
(25, 4, 'The Alchemist', 19, 250, 50, 0, 'Paulo Coelho\'s enchanting novel has inspired a devoted following around the world. This story, dazzling in its powerful simplicity and inspiring wisdom, is about an Andalusian shepherd boy named Santiago who travels from his homeland in Spain to the Egyptian desert in search of a treasure buried in the Pyramids. Along the way he meets a Gypsy woman, a man who calls himself.', 'Books'),
(26, 4, 'Think and Grow Rich', 20, 75, 0, 50, 'Think And Grow Rich has earned itself the reputation of being considered a textbook for actionable techniques that can help one get better at doing anything, not just by rich and wealthy, but also by people doing wonderful work in their respective fields. There are hundreds and thousands of successful people in the world who can vouch for the contents of this book. At the time of authorâ€™s death, about 20 million copies had already been sold. Numerous revisions have been made in the book, from time to time, to make the book more readable and comprehensible to the readers. \r\nThe book details out the most fundamental questions that once bothered the author, Napoleon Hill. The author once set out on a personal quest to find out what really made some people so successful. Why is it that some people manage to remain healthy, happy and financially independent, all at the same time? Why, after all, do some end up being called as lucky? The answers, no wonder, had to be no less than revelations. \r\nFor more than a decade, the author interviewed some of the wealthiest and most successful people in the world. It was based on what author learnt in the process from all these people, when asked about how they achieved not just great riches but also personal wellbeing. The author formulated hundreds and thousands of answers, into concise principles which when acted upon, many claim, can help one achieve unprecedented success. \r\nThe author has in many places narrated short stories and examples that help explain the concept at hand in an engaging manner. Think and Grow Rich teaches not just concepts but also methods. It is not a book that a reader can use for one time consumption. The book, even author recommends, has to be read one chapter at a time and in sequence. Several readers and even some motivational speakers claim to have been reading this book over and over again, few pages at a time, for a long time now. Till date, it remains the number one self help book in the world, as far as sales are concerned!', 'Electronics'),
(27, 5, 'Dennis Lingo Mens Solid Casual Full Seeves', 50, 549, 0, 0, 'This Casual Shirt has a Mandarin collar , long sleeves with button cuffs , full buttoned placket on the front, yoke on the back, curved hem \r\nPair this along with a good pair of denim or chinos and loafers / Espadrilles for a Sharp and Dapper look \r\nThis material comes with 100 % Premium Cotton \r\nCotton rich fabric for crisp Casual look \r\nWash care : Risen Wash ', 'Men Clothing'),
(28, 5, 'Feed Up Mens Denim Shirt', 50, 799, 0, 0, 'Material: Denim \r\nDouble Pocket Style \r\nFitting type: Slim Fit \r\nGolden Triple Stitch \r\nBio Wash Effect', 'Men Clothing'),
(29, 5, 'Ben Martin Mens Regular Fit Denim Jeans', 25, 698, 0, 0, 'Style : Casual Wear. \r\nPerfect For : Men And Boys. \r\nMaterial : Denim Jeans. Wash Care Instructions : Do Not Bleach, Dry In Shade. \r\nDirectly From Manufacturer To Buyer At Lowest Cost Possible. \r\nDisclaimer : Kindly Refer To The Size Chart (Also In Images) For Fiting Measurements. ', 'Men Clothing'),
(30, 5, 'Revoke Mens Casual Loafer', 19, 1249, 0, 0, 'Buy Only From REVOKE Store For Authentic Shoes \r\nColor: Brown, Lifestyle: Formal, Casual \r\nSole : High Quality PU Sole , Technology: Adiprene + \r\nStyle: Panel and Stitch Detail \r\nCare Instructions: Remove any dust from the surface using a clean cloth. Do Use Polish or Shiner.', 'Men Clothing'),
(31, 5, 'Clifton Womens Army Tshirt R Neck Walnut', 25, 450, 0, 0, 'Clifton Women\'s T-Shirt \r\nComfort Fit & machine Wash cold \r\nAvailable in Sizes XS,S, M, L, XL, XXL, 3XL, 4XL, 5XL, 6XL, 7XL, 8XL, 9XL & 10XL. \r\nProduct color may slightly vary due to photographic lighting sources or your monitor settings. ', 'Women Clothing'),
(32, 5, 'Palakh Womens Cotton Printed Kurti', 20, 599, 0, 0, 'Note: Seller \"RAJMANDIRFABRICS\" is the Manufacturer and registered seller of this product. To get 100% original and Triple QC done products make sure that you buy from the Manufacturer Only. \r\nStyle: Stand Collar, Front Slit with white buttons,Multi Color \r\nMaterial: Cotton with 3/4 Sleeve and Collar Neck \r\nGreat Choice For: Casual Wear,Care Instruction : Easy Wash,Gently Wash \r\nBrand \"Palakh\" By RAJMANDIR FABRICS ', 'Women Clothing'),
(33, 5, 'Cloth Theory Womens Printed Tshirt', 10, 299, 0, 100, '100% Cotton \r\nTumble dry low, wash with similar colours, machine wash cold, do not bleach, use mild detergent, do not wring, line dry and do not iron on print \r\nPrinted \r\nHalf sleeve \r\nRound neck ', 'Women Clothing'),
(34, 5, '612 League Girls Dress', 10, 722, 0, 0, '100% Cotton \r\nMidi \r\nSleeveless \r\nNormal wash ', 'Kids Clothing'),
(35, 5, 'Aarika Girls Self Design Party Wear Net', 15, 1439, 0, 0, 'Premium Net Fabric \r\nDesigner Collection from AARIKA offering the best of style and comfort \r\nCaptivating design and attractive shade, lightweight and skin-friendly \r\nSales Package : 1 Gown with Inner \r\nDisclaimer : Color may slightly be different due to viewer\'s screen brightness.', 'Kids Clothing'),
(36, 5, 'Goodway Girls Pack of 5', 3, 678, 0, 0, 'Premium Net Fabric \r\nDesigner Collection from AARIKA offering the best of style and comfort \r\nCaptivating design and attractive shade, lightweight and skin-friendly \r\nSales Package : 1 Gown with Inner \r\nDisclaimer : Color may slightly be different due to viewer\'s screen brightness. ', 'Kids Clothing'),
(37, 5, 'Chhota Bheem Boys Tshirt', 10, 599, 0, 0, 'Color: Multi Color \r\n100% Cotton \r\nRound neck \r\nHalf sleeve \r\nMachine wash, use mild detergents ', 'Kids Clothing'),
(38, 6, 'AJ Dezines Kids Kurta Pyjama and Waistcoat Set for Boys', 8, 999, 0, 0, 'Specially handcrafted clothing for the perfect look and comfort for the festive season \r\nPreminum Indian ethnic, festive and party wear for kids designed by AJ Dezines. \r\nFor viewing our complete store of Ethnic and Party Wear, Please click on \"AJ DEZINES\" in Blue above product name. \r\nFabric Details :- Cotton Blend \r\nSales Package-Kurta, Waistcoat and Breeches \r\nThis product comes with the Broach \r\nDisclaimer-Color may slightly be different due to viewer\'s screen brightness \r\nWe have not authorised any other seller to sell our products/brand AJ Dezines. Any seller doing so is selling fake products. To get the best fit and quality please Buy original AJ Dezines products from the seller \"AJ DEZINES\" only.\r\nWearability- festive, party, ceremony, special ocaission, wedding, diwali, Navratri, dussehra, marriages, pooja, birthday gift, christmas, onam, ganesha etc.', 'Kids Clothing'),
(39, 6, 'Global Desi Womens Body Blouse Top', 15, 600, 0, 50, '100% Liva \r\nHand wash separately in cold water use mild detergent do not soak or wring dry immediately after wash dry in shade \r\nBody blouse \r\nLong sleeve \r\nRound Neck\r\n', 'Women Clothing'),
(40, 6, 'Harpa White Womens Top', 20, 500, 0, 0, 'Brand: Harpa \r\nPattern:- Floral Print \r\nColor:- White \r\nSleeve Length:- 3/4Th Sleeves \r\nCategory:- Top ', 'Women Clothing'),
(41, 6, 'London Bee Mens Cotton Poplin Printed', 10, 899, 0, 0, 'Pyjama for men \r\nmen\'s pyjama \r\nPyjama, Lounge pants \r\ncotton pyjama for men, lounge pants for men \r\nLondon Bee Men\'s Pyjama, Printed Pyjama.', 'Men Clothing'),
(42, 7, 'Sharpie Wraps Pen', 10, 582, 0, 150, 'Get the bold, smooth, high-quality writing experience of Sharpie markers with the sharp line of a pen, and with Wraps designs, as fun to look at as it is to use. \r\nWater- and smear-resistant pens are great for home and school use. \r\nInk is acid-free and non-toxic. Won\'t bleed through paper. \r\nDurable fine-point tip produces thinner detailed lines on even hard-to-mark surfaces. Ideal for birthday cards, note taking, and thank-you notes. \r\nIncludes black, blue, red, and green pens. \r\nWarranty not applicable in India for items sold by Amazon Export Sales LLC.', 'Office Products'),
(43, 7, 'TI-36 X Pro', 12, 2000, 0, 250, 'Ideal for curricula in which graphing technology may not be permitted. \r\nMultiViewTM display shows multiple calculations at the same time on screen. \r\nMathPrintTM shows math expressions, symbols and stacked fractions as they appear in textbooks \r\nIdeal for high school through college: Algebra 1 & 2, Geometry, Trigonometry, Statistics, Calculus, Biology, etc. \r\nConvert fractions, decimals and terms including Pi into alternate representations. \r\nSelect degrees/radians, floating/fix, number format modes. \r\nWarranty not applicable in India for items sold by Amazon Export Sales LLC.', 'Office Products'),
(44, 7, 'A4 Size Hand Operated Mini Portable Manual Personal Paper Shredder', 15, 895, 0, 100, 'Manual hand operated shredder. Can shred paper upto A4 side without any need of folding \r\nCan shred two normal 80 GSM A4 size papers together \r\nFor personal use and not heavy duty professional use \r\nAlso useful for quilling art and craft.', 'Office Products'),
(45, 7, 'Camlin Kokuyo Office Highlighter-Pack of 5 Assorted Colors', 20, 100, 0, 50, 'Chisel tip for underlining and Highlighting \r\nWater based fluorescent ink for better visibility \r\nAvailable 5 Fluorescent colours ( Yellow, Pink, Orange, Green, Blue) \r\nNon-Toxic.', 'Office Products'),
(46, 7, 'Camlin Kokuyo PB White Board Marker', 15, 100, 35, 50, 'Features: Refillable, Bright Ink, Easy to erase with duster, tissue and cloth \r\nCE Certified \r\nBright Ink for better visibility \r\nUSP: Available in - 4 Colours (Red, Blue, Green and Red).', 'Office Products');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sel_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `comp_name` varchar(255) NOT NULL,
  `door_no` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `contact` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sel_id`, `username`, `password`, `comp_name`, `door_no`, `area`, `city`, `contact`) VALUES
(1, 'harry', 'happy', 'big town', '256/50', 'wilson garden', 'bangalore', 9738128026),
(2, 'ankith10reddy@ymail.com', 'd64bc1eb577b062fa13ed20ddbc130f3', 'Ankith Reddy', '256/50', '28026,wilson garden', 'Bangalore', 9738128026),
(3, 'kotapalliankith.reddy2015@vit.ac.in', 'd64bc1eb577b062fa13ed20ddbc130f3', 'OmniTech Retailer', '798/6', 'Sarjapura Road,Ranka Heights', 'Bangalore', 8056922398),
(4, 'ankith10.ar@gmail.com', 'f0bf97d2f85c040963f47c03888434c4', 'Wiley Publications', '465/2', 'Gandhi Road,Chikpet', 'Delhi', 8065971011),
(5, 'ankith10reddy96@gmail.com', 'd0585ffddbc10793f5e3817424f08fa4', 'Campus Sutra', '896/20', 'Eagle street,Somachiguda ', 'Hyderabad', 8919926651),
(6, 'aj.styles@wwe.com', '2d878df64992bf58128641d7bd615a5b', 'AJ DEZINES', '808', '12th Street,4th Block,California Street', 'Los Angeles', 6724352644),
(7, 'retailnet@gmail.com', 'd73f92e31c7b374ce6416595d3ee2b6d', 'Retail Net', '714', 'Church Street,Koramangala', 'Bangalore', 9848032919);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `door_no` varchar(255) NOT NULL,
  `area` longtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `contact` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `first_name`, `last_name`, `door_no`, `area`, `city`, `contact`) VALUES
(1, 'ankith10reddy@ymail.com', '56ab24c15b72a457069c5ea42fcfc640', 'Ankith', 'Reddy', '256/50', 'mukunds court,wilson garden', 'Bangalore', 9738128026),
(2, 'ankith10reddy@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'ankith', 'reddy', '268/50', 'wilson garden,', 'bangalore', 8919926651);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`prod_id`,`user_id`),
  ADD KEY `c_user_id` (`user_id`),
  ADD KEY `c_sel_id` (`sel_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`user_id`,`payment_id`,`prod_id`) USING BTREE,
  ADD KEY `payment_id_fk` (`payment_id`),
  ADD KEY `prod_id_fk` (`prod_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`) USING BTREE,
  ADD KEY `p_user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`,`sel_id`) USING BTREE,
  ADD KEY `prod_sel_fk` (`sel_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sel_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `sel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `c_prod_id` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`),
  ADD CONSTRAINT `c_sel_id` FOREIGN KEY (`sel_id`) REFERENCES `seller` (`sel_id`),
  ADD CONSTRAINT `c_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `payment_id_fk` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`),
  ADD CONSTRAINT `prod_id_fk` FOREIGN KEY (`prod_id`) REFERENCES `product` (`prod_id`),
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `p_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `prod_sel_fk` FOREIGN KEY (`sel_id`) REFERENCES `seller` (`sel_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
