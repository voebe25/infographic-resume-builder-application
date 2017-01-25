-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2015 at 01:04 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_resume`
--

CREATE TABLE IF NOT EXISTS `customer_resume` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(10) NOT NULL,
  `m_name` varchar(10) DEFAULT NULL,
  `l_name` varchar(10) DEFAULT NULL,
  `date` int(2) NOT NULL,
  `month` varchar(15) NOT NULL,
  `year` int(4) NOT NULL,
  `address1` varchar(30) DEFAULT NULL,
  `address2` varchar(20) DEFAULT NULL,
  `address3` varchar(20) DEFAULT NULL,
  `pin` int(10) NOT NULL,
  `mob` bigint(20) DEFAULT NULL,
  `email_id` varchar(25) DEFAULT NULL,
  `company_name` varchar(15) DEFAULT NULL,
  `photo` blob NOT NULL,
  `highsch_name` varchar(10) DEFAULT NULL,
  `hpass_year` int(4) DEFAULT NULL,
  `gradclg_name` varchar(25) DEFAULT NULL,
  `gpass_year` int(4) DEFAULT NULL,
  `hsc_cgp` float(2,1) DEFAULT NULL,
  `grad_cgp` float(2,1) DEFAULT NULL,
  `certfir` varchar(10) DEFAULT NULL,
  `certsec` varchar(10) DEFAULT NULL,
  `certthird` varchar(10) DEFAULT NULL,
  `intfir` varchar(15) DEFAULT NULL,
  `intsec` varchar(15) DEFAULT NULL,
  `intthird` varchar(15) DEFAULT NULL,
  `pre_expfir` varchar(15) DEFAULT NULL,
  `pre_expsec` varchar(15) DEFAULT NULL,
  `pre_expthird` varchar(15) DEFAULT NULL,
  `password` int(4) DEFAULT NULL,
  `user_id` varchar(8) DEFAULT NULL,
  `pre_comone` varchar(15) DEFAULT NULL,
  `pre_comtwo` varchar(15) DEFAULT NULL,
  `pre_comthree` varchar(15) DEFAULT NULL,
  `about_me` varchar(120) DEFAULT NULL,
  `skillone` varchar(20) DEFAULT NULL,
  `skilltwo` varchar(20) DEFAULT NULL,
  `skillthree` varchar(20) DEFAULT NULL,
  `exp_timeone` varchar(20) DEFAULT NULL,
  `exp_timetwo` varchar(20) DEFAULT NULL,
  `exp_timethree` varchar(20) DEFAULT NULL,
  `current_from` int(4) DEFAULT NULL,
  `current_to` int(4) DEFAULT NULL,
  `com1_from` int(4) DEFAULT NULL,
  `com2_to` int(4) DEFAULT NULL,
  `com1_to` int(4) DEFAULT NULL,
  `com2_from` int(4) DEFAULT NULL,
  `com3_from` int(4) DEFAULT NULL,
  `com3_to` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `customer_resume`
--

INSERT INTO `customer_resume` (`id`, `f_name`, `m_name`, `l_name`, `date`, `month`, `year`, `address1`, `address2`, `address3`, `pin`, `mob`, `email_id`, `company_name`, `photo`, `highsch_name`, `hpass_year`, `gradclg_name`, `gpass_year`, `hsc_cgp`, `grad_cgp`, `certfir`, `certsec`, `certthird`, `intfir`, `intsec`, `intthird`, `pre_expfir`, `pre_expsec`, `pre_expthird`, `password`, `user_id`, `pre_comone`, `pre_comtwo`, `pre_comthree`, `about_me`, `skillone`, `skilltwo`, `skillthree`, `exp_timeone`, `exp_timetwo`, `exp_timethree`, `current_from`, `current_to`, `com1_from`, `com2_to`, `com1_to`, `com2_from`, `com3_from`, `com3_to`) VALUES
(52, 'volakeriz', 'zosiklomac', 'kopkjsojlo', 18, 'mar', 1994, '24-sector', 'bl road', 'lucknow', 802103, 8267873980, 'vivek18pathak@gmail.com', 'Accenturecapegn', 0xffd8ffe000104a46494600010100000100010000ffdb008400090607141010150f12140f1414171410161410141414151415161414161615151615181c2822181c2527151421312127292b2e2e2e171f3338332c37282d2e2b010a0a0a0e0d0e1a10101a30251f2437372f2c2c2f2c2c2c2c2d2c2c2f34342c2c2f342c2d2c2c372c2c2c2c3434342c2f342b2c2c2f342c2c2c342c2c2c2c2b2cffc000110800cc00cc03012200021101031101ffc4001c0001000105010100000000000000000000000402030506070108ffc400481000020102010806060802060b0000000001020003041105061221223141511361718191c1073272a1b1d114234243526292b25383336382a2e1f115253444547393b3c2d2f0ffc4001a010100030101010000000000000000000000030405020106ffc4002411010002020104020301010000000000000001020311041221314132510522917113ffda000c03010002110311003f00ee311101111011130d9733852db600e92a91aa929ddc8b9fb22736b456372eab59b4ea198270d67773983becebb7a64aa96aadf8690d2f16dc3c66ad775ab5d9fad6661fc14c4531dbf8bbe549939c0c0280396a129df9733f085ba71623e729f719d970ff00d1d2a54c73762ede03003df31d71966e8efb8d1ea4a6a3e38ca2b5165e07ba626e6bcab39b24f99598c58e3c42edc655b8ff0089b8ee603ca5819d3774ce22e1dba9d5587c2636e6e262ae6e2755b5fee5cdab5fa741c8fe92b0609748b87f1a9e3abda4f91ee9bae4bcbf6f75aa8d5a6e7f063837e93ae706b4b5350e2774d92cf242b0048d635861a9872208d60c9a39535f3dd14f1a2de3b3b3c4d1f35339996b2d95c369e96aa1707d6623eeea7e6e478cde25da5e2f1b853bd2693a9222276e088880888808888088880888808888187ce8cac6da8ec6baae74298eb3bdb0e437cd5a8dad2b65e92eaa2ab36d1563b6e7893c7ba6333fb385d2f4ad3c314408ac7594275b151bb13bb1ea13159bd9b8f7a4d7aaee109f5ceb77237e04f0eb99b9f2c4dfef4d0c38fa69f5b6c3719ef6e9b3492a30e1800a3df20be7b63f7270f6ff00c267edf362d90602929eb6c58fbe575337edcfdcd3ee184af6cb794b11486b833a29bef575f023dd2dd7ad4eb8d441ecde265ee7346837abd221ea6c47836330f759a15175d3756e58ec9f3914de7da5af4b56ca0c518a9ff3eb96eced0b9c4ccadf649ac59454a55495fb4a85b11cb15d527e4aab455c53a81d09d5b6347fca4919371af6e669a9dae64fb10a313245c5d84d4249cba9d00054e2a7dc794d3b285fe3a844d677ddec5a35d9772d5d1dea483886523786538822767cd7cabf4bb3a371c590690e4ebb2e3c419c0ebd6d2a7d7cfb2750f43177a5675297e0ac70ec7507e72ef1266274a7c9ef1b74188897948888808888088880888808888088881c333d14ff00a42b0fce674fc936829d0a74c7045f86b9a87a4cc9469dd25c81b1534713c9d778ef181ee337fa29a876099738e7fe9689684dff004aad684a5924cd0943a4ea71a38ba132cb0eb26bac8ee255bd1356c8ac263b29d8a56428e011cf88eb0784c9b0962a89567b278973fcb376c943a0738ba540a0f12b812a7c089abd4c66d39e94b0ae1b9a0f1048c7e1358a92d63b6e1e5a14db6e22745f422ffed49c8d13e3a43ca73ab6de7ba744f424bb576787d48fdf2ee0f9c2a66f8cbaa4444bea4444404444044440444404444044440c7e5fc9eb716f52938c764953c43018a91d78cf2cce28a79aafc04c811c2627273614d472d9fd270f295f2f6b44a6a77acb2184b1504ab4e5b769cded1a7b58958a923d497dcc8ce651c92b34587962acbee647aa652b2c4347cfaf5e9fb2ff0011350a8674dca7654ea90cea188040c71c35f54c25fe4ca2e0ae82a9e057519dd32c5635293a26cd2ed8eb3dd3a77a12a5f5372fceaa0f04c7ce72fa8343a45e4747df84ed3e89ac0d2c9a8e4606ab3d4fec93a2bee507be6a71e376db3f3cea1b94444bca64444044440444404444044440444404c28d9a951393923b1c06f896f099a988cacba3555f832953daa711f1695b951fa757d26c1f2d3de9252cf2c69ca4bca13956a28adda59768679699a417ba5ad54b191ab34bb51a42b8a92bcca5ac225d3cc1de570b8b1dc0127c2646eeacd4739ef705e8c6f6dfec8f9ce6b59bda2b09f7d3599962f2558b5f5da5ba638d5a8713f8575966ee1899f475a5bad2a6949060a8aaaa39051801ee9a3fa2bcd436b4be975970ad557654efa74ceb00f22da89ee137e9f47831f4d5899afd5622224c848888088880888808888088880888809072cd2d2a448de9838fecef1e18c9d044e6f5eaacd67dbaadba6625ab8a98eb9e1696ee13a276a5c8ecf5a9f57cc774b66acf9db6eb3312d688898dc2f1696dde597ad2355af389977155dad56636e6bcf2bdc48f4e91a9b44e0837b7ca73de7b42488d77941bbaf32b99199a970eb94ebb07524f45430d4a69b3262fcfd5c40eb9ae65aba0ec42ea5d40760dd3a67a3a3feada3d46bffdea865dfc752272cefe95f9d698c71a6c911137190444404444044440444404444044440444404448f797a94462ec0721bc9ec1c6040ce1c9e6a28a8831740757165e23b7889a8b5cccde50cbd51f553fab5e7a8b9f94c3db500f5344b152d8e077e2d813ac1dfb8ccee6713af77af9f6b9c6e474feb645a9752d6933faa09f878cc9d5c9d5d770b73d7b40f8612cd4b4af86d328fca800f7999334d796945a3d20bd25a7b555b13f804c4e53ca4d53646ca7051e7255edab2e3a8f6eff007cc4559e6fd43b88f68b5666b36f3b6b58814c05a947124d23a9813bca3f91c7ba627a2275e070c759e1d9287a7353f1d8bcde7fc67f3f278a43b3640ce5b7bd1f54f838f5a8b6cd45eee23ac6226627cf8519185442cac35aba92181ea2374ddf363d2214c295eeb1a80b951aff0098a3f701dd3519ce9912dd0acb5143a32b2b005594e2083c4112e404444044440444404444044440444c4e5cbe2b851a6707704961bd106a2dda770efe5028cab967449a5470671eb39f553b79b754c0ba1274989663bd8eff00f01d52625b851801abff00b593c4cb751604275989cb170691a4ebbc56a67b70de3e2266ea09afe716b6a2bcea63e0227b8dd4b860186e23190ee374c958d917a4b81c0e1c774a1f24d46d5b23ac9f94c6cfc6c916d446da38b3535de5acdd464ecda374c18ae8d3e3508d67a979cdbad3205353a4fb6791f57c38f7cab387287d1e81d1c0336ca0e5ccf77ca7787f1f333bc9fc3273751aa7f5a1e70d0a65c51a382d2a58a803ed37db727893bbba62fe86a3afb64b32879ab11111a867cccccee5134147d95c3960259af608c31518491525815344f94f5e2e640cb55b27bfd592d489dbb763b27ad4fd96ecd478ceaf90f2dd2bca7d2526ea643a9d0f261e7ba725aaa1c79c8b677d56ceb0ad49b4587e975e2ac388f840eed13159b796d2f680ac9a8ee743bd186f1d9c8f299580888808888088880888809a8d3b8e96a54adf89885f61352e1dbacf7cd832e5cf456d56a0de11b47da2305f791357b55d04541c001e020640bc8f50ca7a496d9e05150cc0657d7736ebed9f84ce3b4c25c6d5f521c931f163f281d2725ae14c49923d88c1049103c6380c4ee9cef38328fd22b161ea0d483ab9f7fca6c39df953417a053b4c36f0e0bcbbfe134c30283287959943c08d5245a924d4916a40b695744f54aaba061848f525da6d8a8f081333232d1b3bc018e14ea114ea0e1893b0fda0fb899daa7ced94176bb44ed9995957e93634aa31c5c2e839e2593649efc01ef819d89e6908c607b111011110111103039e3530a0a9f8ead21dc0e91fdb3041e64f3d9f5dbafe7a8dfa508ffca6103c093d24a4bcb1a73c2f02b6698db41a5943b1107bc9f39319a47c82ba57ce79680fee881d2ad86c896f285e0a34daa3701a8733c04bd486a134ccecca5d254e894eca6feb6e3e1bbc60612eee0d476763896249960cf4994981e196aa1970991ea18166a1916a197ea1916a18162a1955b36a23ae5aa862d5b591d502ce52e07b66ebe88eff00fa7b73c342a2f7ecb7c17c6697947d5ef991f47175d1e5051c1e9d543e01c7bd040ed41e541e58a6ac770ef974516ea815879507948a279cb829081e86954011011110350cf86faeb61f96e4fbe88f3983d39b467ad833d25ae80b351d22546f34db0d3c3ac68a9ee9a7d3aa180604107583024e9cf0b4b3a51a502e1695e68ae37554fe7c3c00918b4c86642e352a37e7681b765eca3f47a048f5db653b4ef3dd39f334c9670651e9eb120ec2eca760de7bfe53144c0133c31286681e3b48d51a5751a46a8d028a8d22d46976a348d51a05aa86516edb5dc65351a5145b6c77fc205dbff50f77c65acd9afa17b41bfad5f7eaf3972ecec9ec98cc9d530b8a27fada5fbc40fa06daf8aeade397ca65a9550c31135315a64b235626a60371071eee3033b111011110111101349ce2cd86a6cd716aba4a49352dc6f078bd2f35f09bb440e4d4ab871883d47983c411c0f54af19bce5ccd7a5724d418d2adfc54035f2d35dce3dfd734dca792ebdaebaa98a0fbea78b261cd86f4efd5d7023e32ee4cbae8e8381eb3b38c790c75fca464a81862082398d6278a301840af19e63292650cf02a66961de78ef2cbbc03bc8eed3d7791dde07951a46a8d2a7691ea340a2a34b749b6c76cf2a34b28db43b4409f70764f61988b23f5d4bfe6d2fde24fbcb80a08e3ca65330b346b5f555af868d0438f4ac35330e0a3ed61e503a05ae95460880927879cdc726588a2b86f63eb1f21d5193726a5bae8a0d7c58ef3db26404444044440444404444044440c1652cd4b7ac4b05349cfde52d924f32beab7789ad5f6685cd3d74da9d75ffa753c0e2a7c44e851038e5e96a270ac95291feb14807b1b71ee32cf4a0eb041eb1ae7686504604020ef0758989b9cd8b4a8716b7a38f3550a7fbb840e50cf2cbbce9d57312ccfd9aabecd571eec643a99836daf06b91fcc1e6b039bbbcb0ef3a31f47d6ff00c4bafd74ff00f49717d1e5aeac5ae4ff0030792c0e5aef23bb4ec69e8eacb8ad63db55fc8c974731ac17fddd1bda2cdf130383d6ac06f2076993326643b9ba23a0a355c1fbcd12a9dba67013e80b3c8b6f475d3a14108e2b4d41f1c3193e0733cd9f456a8455bd7150ea3f474c7a307f3b6f7ecd43b6749a5482284501540015400000350000dc257101111011110111103fffd9, 'D.P.S', 2011, 'S.R.M University', 2016, 7.5, 8.1, 'Network+', 'CCNA', 'CCNP', 'Linux', 'Networks', 'Php', 'Networks', 'Aws', 'Php', 1234, 'viks', 'Accenturecapegn', '', '', 'I am a technology loving guy', 'moderate', 'moderate', 'high', 'moderate', 'low', 'moderate', 2012, 2015, 2006, 0, 2008, 0, 2010, 2012);

-- --------------------------------------------------------

--
-- Table structure for table `query_answers`
--

CREATE TABLE IF NOT EXISTS `query_answers` (
  `unique_id` int(10) DEFAULT NULL,
  `answers` text,
  KEY `unique_id` (`unique_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query_answers`
--

INSERT INTO `query_answers` (`unique_id`, `answers`) VALUES
(14, 'Answer for query 14'),
(15, 'answer for query 15'),
(16, 'answer for query 3'),
(19, 'answer of query 6'),
(16, 'another ans for query 3'),
(16, 'another ans for q 3');

-- --------------------------------------------------------

--
-- Table structure for table `test_table`
--

CREATE TABLE IF NOT EXISTS `test_table` (
  `F_name` varchar(19) DEFAULT NULL,
  `l_name` varchar(10) DEFAULT NULL,
  `mob` int(10) DEFAULT NULL,
  `pin` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_table`
--

INSERT INTO `test_table` (`F_name`, `l_name`, `mob`, `pin`) VALUES
('VIVEK', 'bhardwaj', 1234567890, 802103),
('', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vyom_table`
--

CREATE TABLE IF NOT EXISTS `vyom_table` (
  `unique_id` int(10) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(10) DEFAULT NULL,
  `m_name` varchar(10) DEFAULT NULL,
  `l_name` varchar(10) DEFAULT NULL,
  `branch` varchar(5) DEFAULT NULL,
  `btech_year` int(2) DEFAULT NULL,
  `mob` int(10) DEFAULT NULL,
  `query` mediumtext,
  `email_id` varchar(30) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`unique_id`),
  UNIQUE KEY `email_id` (`email_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `vyom_table`
--

INSERT INTO `vyom_table` (`unique_id`, `f_name`, `m_name`, `l_name`, `branch`, `btech_year`, `mob`, `query`, `email_id`, `date`, `time`) VALUES
(14, 'VIVEK', '', '', 'it', 0, 0, 'query 1', 'vivek@gmail.com', '06/01/15', '02:09:02pm'),
(15, 'Zoya', '', '', 'cse', 0, 0, 'query 2', 'zoya@gmail.com', '06/01/15', '02:09:22pm'),
(16, 'Subham', '', '', 'it', 0, 0, 'query 3', 'subham@gmail.com', '06/01/15', '02:09:39pm'),
(17, 'shabad', '', '', 'cse', 0, 0, 'query 4', 'ch@gm.com', '06/01/15', '02:10:02pm'),
(18, 'vicky', '', '', 'mec', 0, 0, 'query 5', 'vivek.itscool1@gmail.com', '06/01/15', '02:10:34pm'),
(19, 'ankit', '', '', 'it', 0, 0, 'query 6', 'ank@gmail.com', '06/01/15', '02:11:10pm'),
(20, 'harami', '', '', 'mec', 3, 0, 'harami ka query', 'harami@gm.com', '06/01/15', '05:46:27pm');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `query_answers`
--
ALTER TABLE `query_answers`
  ADD CONSTRAINT `query_answers_ibfk_1` FOREIGN KEY (`unique_id`) REFERENCES `vyom_table` (`unique_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
