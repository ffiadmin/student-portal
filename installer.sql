-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2013 at 10:48 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wordpress`
--
CREATE DATABASE IF NOT EXISTS `wordpress` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wordpress`;

-- --------------------------------------------------------

--
-- Table structure for table `ffi_sp_apis`
--

CREATE TABLE IF NOT EXISTS `ffi_sp_apis` (
  `ID` int(1) NOT NULL,
  `CloudinaryCloudName` varchar(25) NOT NULL,
  `CloudinaryAPIKey` varchar(25) NOT NULL,
  `CloudinaryAPISecret` varchar(50) NOT NULL,
  `TwitterUsername` varchar(32) NOT NULL,
  `TwitterConsumerKey` varchar(64) NOT NULL,
  `TwitterConsumerSecret` varchar(64) NOT NULL,
  `TwitterAccessToken` varchar(64) NOT NULL,
  `TwitterAccessTokenSecret` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ffi_sp_apis`
--

INSERT INTO `ffi_sp_apis` (`ID`, `CloudinaryCloudName`, `CloudinaryAPIKey`, `CloudinaryAPISecret`, `TwitterUsername`, `TwitterConsumerKey`, `TwitterConsumerSecret`, `TwitterAccessToken`, `TwitterAccessTokenSecret`) VALUES
(1, 'forwardfour', '211984672133855', 'nN9B1_7aKjq_PPR_2hRs8aZ7qnQ', 'sgaatgcc', '2kJqtpSfPDmvRZcZpNuo5w', 'E2pFTYCVs9zpFbLmDWwclTjOXBKewciw0iF9yPpXw', '1730779790-NIZZ2F6mgRwYfTFCxOpUfehc9f5o0ccsQo9z38F', 'DDXoDlrcr5nimNmm5GJkfkSL14SHxXHcFktqM3JFFXQ');

-- --------------------------------------------------------

--
-- Table structure for table `ffi_sp_committees`
--

CREATE TABLE IF NOT EXISTS `ffi_sp_committees` (
  `CommitteeID` int(11) NOT NULL AUTO_INCREMENT,
  `Position` int(11) NOT NULL,
  `Committee` varchar(32) NOT NULL,
  PRIMARY KEY (`CommitteeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ffi_sp_committees`
--

INSERT INTO `ffi_sp_committees` (`CommitteeID`, `Position`, `Committee`) VALUES
(1, 1, 'Executive Committee'),
(2, 2, 'Senior Class'),
(3, 3, 'Junior Class'),
(4, 4, 'Sophmore Class'),
(5, 5, 'Freshman Class'),
(6, 6, 'Adjunct Officers');

-- --------------------------------------------------------

--
-- Table structure for table `ffi_sp_events`
--

CREATE TABLE IF NOT EXISTS `ffi_sp_events` (
  `EventID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(512) NOT NULL,
  `Time` datetime NOT NULL,
  `Location` varchar(256) NOT NULL,
  `Description` longtext NOT NULL,
  PRIMARY KEY (`EventID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ffi_sp_events`
--

INSERT INTO `ffi_sp_events` (`EventID`, `Title`, `Time`, `Location`, `Description`) VALUES
(1, 'Release the Portal', '2013-09-05 21:30:00', 'SGA Website', '<p>Or I could have called it &quot;Release the Hounds&quot;! I thought this would be a little more appropriate, though. :-) I also could have set the release location as &quot;My Room&quot;, since that is where I will be releasing it. hehe</p>'),
(2, 'Release the Travel Assistant', '2013-09-14 22:00:00', 'SGA Website', '<p>I hope so...</p>');

-- --------------------------------------------------------

--
-- Table structure for table `ffi_sp_links`
--

CREATE TABLE IF NOT EXISTS `ffi_sp_links` (
  `LinkID` int(1) NOT NULL AUTO_INCREMENT,
  `CafeteriaMenu` varchar(1024) NOT NULL,
  `AcademicCalendar` varchar(1024) NOT NULL,
  `CampusOrganizations` varchar(1024) NOT NULL,
  `OrganizationWebsites` varchar(1024) NOT NULL,
  `StudentDirectory` varchar(1024) NOT NULL,
  `CampusContact` varchar(1024) NOT NULL,
  `OfficeHours` varchar(1024) NOT NULL,
  `BuildingHours` varchar(1024) NOT NULL,
  `DepartmentWebsites` varchar(1024) NOT NULL,
  `ChapelSchedule` varchar(1024) NOT NULL,
  `ChapelRecordings` varchar(1024) NOT NULL,
  PRIMARY KEY (`LinkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ffi_sp_links`
--

INSERT INTO `ffi_sp_links` (`LinkID`, `CafeteriaMenu`, `AcademicCalendar`, `CampusOrganizations`, `OrganizationWebsites`, `StudentDirectory`, `CampusContact`, `OfficeHours`, `BuildingHours`, `DepartmentWebsites`, `ChapelSchedule`, `ChapelRecordings`) VALUES
(1, 'http://grovecity.cafebonappetit.com/', 'http://www.gcc.edu/Documents/Academics/2013-2014_Calendar.pdf', 'http://info.gcc.edu/Offices/studentlife/crimson/orgs/ALL.htm', 'http://info.gcc.edu/orgs/default.htm', 'http://info.gcc.edu/directory/Directory_090313.pdf', 'http://info.gcc.edu/directory/default.htm', 'http://info.gcc.edu/offices/provost/hours/default.htm', 'http://www2.gcc.edu/info/hours/', 'http://www2.gcc.edu/dept/', 'http://www2.gcc.edu/media/chapel.htm', 'http://www2.gcc.edu/media/chapel.htm');

-- --------------------------------------------------------

--
-- Table structure for table `ffi_sp_people`
--

CREATE TABLE IF NOT EXISTS `ffi_sp_people` (
  `PersonID` int(11) NOT NULL AUTO_INCREMENT,
  `CommitteeID` int(11) NOT NULL,
  `Position` int(11) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `Title` varchar(64) NOT NULL,
  `ImageID` varchar(128) NOT NULL,
  PRIMARY KEY (`PersonID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `ffi_sp_people`
--

INSERT INTO `ffi_sp_people` (`PersonID`, `CommitteeID`, `Position`, `Name`, `Title`, `ImageID`) VALUES
(1, 1, 1, 'Preston Denlinger', 'President', 'preston-denlinger_nau9su.jpg'),
(2, 1, 2, 'Blake Denlinger', 'VP of Academic Affairs', 'blake-denlinger_xbjdjy.jpg'),
(3, 1, 3, 'Chole Smiley', 'VP of Social Affairs', 'smiley_uhodz9.jpg'),
(4, 1, 4, 'Louis Phillips', 'VP of Social Affairs', 'phillips_xjesqt.jpg'),
(5, 1, 5, 'Mike Trombly', 'Vice President of Student Affairs', 'trombly_o9lubi.jpg'),
(6, 1, 6, 'Taylor Hunker', 'VP of Communications', 'hunker_jrhggs.jpg'),
(7, 1, 7, 'Carlen Barnett', 'Treasurer', 'barnett_tyzdsc.jpg'),
(8, 2, 1, 'Joshua Martin', 'Senior Class President', 'martin_fdvszq.jpg'),
(9, 2, 2, 'Zander Cochran', 'Senator of Academic Affairs', 'cochran_cwurfj.jpg'),
(10, 2, 3, 'Spencer Everett', 'Senator of Social Affairs', 'everett_z1pneg.jpg'),
(11, 2, 4, 'Kyle Thorp', 'Senator of Student Affairs', 'thorp_mhwdre.jpg'),
(12, 2, 5, 'Keith Sandell', 'Senior Class Secretary', 'sandell_wwjtsi.jpg'),
(13, 3, 1, 'Alvin Thomas', 'Junior Class President', 'thomas_mwvjm1.jpg'),
(14, 3, 2, 'James Kintzing', 'Senator of Academic Affairs', 'kintzing_jqoloe.jpg'),
(15, 3, 3, 'Victor Nardini', 'Senator of Social Affairs', 'nardini_ynrwqe.jpg'),
(16, 3, 4, 'Allen Scheie', 'Senator of Student Affairs', 'scheie_cjqjkt.jpg'),
(17, 3, 5, 'Julia Haines', 'Junior Class Secretary', 'haines_twdaxa.jpg'),
(18, 4, 1, 'Ben Crelin', 'Sophmore Class President', 'crelin_legyoj.jpg'),
(19, 4, 2, 'Hannah Coad', 'Senator of Academic Affairs', 'coad_kiapci.jpg'),
(20, 4, 3, 'Chesterton Cobb', 'Senator of Social Affairs', 'cobb_qzhdqv.jpg'),
(21, 4, 4, 'Scott Alford', 'Senator of Student Affairs', 'alford_gx7ru6.jpg'),
(22, 4, 5, 'Becky Torre', 'Sophmore Class Secretary', 'torre_voydtr.jpg'),
(23, 5, 1, 'Benjamin Marasco', 'Freshman Class President', 'marasco_kwyhsl.jpg'),
(24, 5, 2, 'Jonathan Hewitt', 'Senator of Academic Affairs', 'hewitt_pbb4pb.jpg'),
(25, 5, 3, 'Megan Cotterman', 'Senator of Social Affairs', 'cotterman_b5jj1a.jpg'),
(26, 5, 4, 'Elijah Coryell', 'Senator of Student Affairs', 'coryell_elt14k.jpg'),
(27, 5, 5, 'Arianna Johnson', 'Freshman Class Secretary', 'johnson_t1bjo7.jpg'),
(28, 6, 1, 'Clive Komlenic', 'Historian', 'komlenic_d3ia2k.jpg'),
(29, 6, 2, 'Oliver Spryn', 'Webmaster', 'spryn_zivpnw.jpg'),
(30, 6, 3, 'Christopher Bush', 'Chaplain', 'bush_or3ngf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ffi_sp_settings`
--

CREATE TABLE IF NOT EXISTS `ffi_sp_settings` (
  `SettingsID` int(1) NOT NULL AUTO_INCREMENT,
  `TimeZone` enum('Pacific/Honolulu','America/Anchorage','America/Los_Angeles','America/Denver','America/Chicago','America/New_York') NOT NULL DEFAULT 'America/New_York',
  PRIMARY KEY (`SettingsID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ffi_sp_settings`
--

INSERT INTO `ffi_sp_settings` (`SettingsID`, `TimeZone`) VALUES
(1, 'America/New_York');

-- --------------------------------------------------------

--
-- Table structure for table `ffi_sp_splash`
--

CREATE TABLE IF NOT EXISTS `ffi_sp_splash` (
  `EntryID` int(11) NOT NULL AUTO_INCREMENT,
  `Order` int(1) NOT NULL,
  `Title` varchar(256) NOT NULL,
  `ColumnOne` longtext NOT NULL,
  `ColumnTwo` longtext NOT NULL,
  `BackgroundID` varchar(512) NOT NULL,
  `IconID` varchar(512) NOT NULL,
  PRIMARY KEY (`EntryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ffi_sp_splash`
--

INSERT INTO `ffi_sp_splash` (`EntryID`, `Order`, `Title`, `ColumnOne`, `ColumnTwo`, `BackgroundID`, `IconID`) VALUES
(1, 1, 'Book Exchange', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id dui turpis. Aenean eros nibh, commodo vel aliquet non, dictum posuere risus. Nunc vitae cursus orci. Fusce in tincidunt diam. Nam at metus dui, in semper sapien. Nulla tempor imperdiet elit, eu pulvinar risus dapibus vel. Praesent gravida nisi eget erat consequat sit amet pellentesque sapien mollis. Nunc elementum condimentum venenatis.</p>\r\n<p>Vivamus porta sodales massa at viverra. Vivamus nec felis velit, eget molestie velit. Nunc felis orci, sollicitudin non aliquet eget, faucibus sed odio. Etiam et tellus sit amet mauris euismod dapibus vel ut risus. Sed rutrum metus nec ante luctus sollicitudin. Fusce scelerisque, elit et molestie eleifend, metus nisi fermentum dui, a sollicitudin felis nisi quis arcu. Sed eget leo sit amet velit aliquet euismod. Nam lorem neque, ornare ut tristique nec, blandit non velit. Quisque non libero metus.</p>', '', 'library_vrz3af.jpg', 'book-exchange_py1nq5.png'),
(2, 2, 'Travel Assistant', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id dui turpis. Aenean eros nibh, commodo vel aliquet non, dictum posuere risus. Nunc vitae cursus orci. Fusce in tincidunt diam. Nam at metus dui, in semper sapien. Nulla tempor imperdiet elit, eu pulvinar risus dapibus vel. Praesent gravida nisi eget erat consequat sit amet pellentesque sapien mollis. Nunc elementum condimentum venenatis.</p>\r\n<p>Vivamus porta sodales massa at viverra. Vivamus nec felis velit, eget molestie velit. Nunc felis orci, sollicitudin non aliquet eget, faucibus sed odio. Etiam et tellus sit amet mauris euismod dapibus vel ut risus. Sed rutrum metus nec ante luctus sollicitudin. Fusce scelerisque, elit et molestie eleifend, metus nisi fermentum dui, a sollicitudin felis nisi quis arcu. Sed eget leo sit amet velit aliquet euismod. Nam lorem neque, ornare ut tristique nec, blandit non velit. Quisque non libero metus.</p>', '', 'commuter_ihjelu.jpg', 'travel-assistant_dlvbpn.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
