# Dump File
#
# Database is ported from MS Access
#--------------------------------------------------------
# Program Version 5.1.232

DROP DATABASE IF EXISTS `places`;
CREATE DATABASE IF NOT EXISTS `places`;
USE `places`;

#
# Table structure for table 'Attractions'
#

DROP TABLE IF EXISTS `Attractions`;

CREATE TABLE `Attractions` (
  `AttractionsID` INTEGER NOT NULL AUTO_INCREMENT, 
  `Name` VARCHAR(255),  
  `Address` VARCHAR(255), 
  `City` VARCHAR(255), 
  `Region` VARCHAR(255), 
  `Postal` VARCHAR(255),  
  `Phone` VARCHAR(255),
  `Website` VARCHAR(255),
  `ActivityName` VARCHAR(255),
  PRIMARY KEY (`AttractionsID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Attractions'
#

INSERT INTO `Attractions` (`AttractionsID`, `Name`, `Address`, `City`, `Region`, `Postal`, `Phone`, `Website`, `ActivityName`) VALUES (1, 'Canterbury Shaker Village', '288 Shaker Rd', 'Canterbury', 'NH', '03224', '603-783-9511', 'http://www.shakers.org/', 'Museum Tour and Exhibits');
INSERT INTO `Attractions` (`AttractionsID`, `Name`, `Address`, `City`, `Region`, `Postal`, `Phone`, `Website`, `ActivityName`) VALUES (2, 'McAuliffe-Shepard Discovery Center', '2 Institute Dr', 'Concord', 'NH', '03301', '603-271-7827', 'https://www.starhop.com/', 'Science Tour');
INSERT INTO `Attractions` (`AttractionsID`, `Name`, `Address`, `City`, `Region`, `Postal`, `Phone`, `Website`, `ActivityName`) VALUES (3, 'NH Audubon McLane Center', '84 Silk Farm Rd', 'Concord', 'NH', '03301', '603-224-9909', 'http://www.nhaudubon.org/about/centers/mclane/', 'Wooded Hiking Trails, Raptor Exhibit, and Indoor Animal Displays');
INSERT INTO `Attractions` (`AttractionsID`, `Name`, `Address`, `City`, `Region`, `Postal`, `Phone`, `Website`, `ActivityName`) VALUES (4, 'New Hampshire State House', '107 N Main St', 'Concord', 'NH', '03303', '603-271-2154', 'https://www.nh.gov/index.htm', NULL);
INSERT INTO `Attractions` (`AttractionsID`, `Name`, `Address`, `City`, `Region`, `Postal`, `Phone`, `Website`, `ActivityName`) VALUES (5, 'Bear Brook State Park', '157 Deerfield Rd', 'Allenstown', 'NH', '03275', '603-485-9874', 'https://www.nhstateparks.org/visit/state-parks/bear-brook-state-park.aspx', 'Outdoor Activities - Hiking, Swimming, Fishing, etc');
INSERT INTO `Attractions` (`AttractionsID`, `Name`, `Address`, `City`, `Region`, `Postal`, `Phone`, `Website`, `ActivityName`) VALUES (6, 'Chuckster''s', '9 Bailey Rd', 'Chichester', 'NH', '03258', '603-798-3555', 'https://www.chuckstersnh.com/', 'Outdoor Fun Park - Go-Karts, Mini Golf, etc');
INSERT INTO `Attractions` (`AttractionsID`, `Name`, `Address`, `City`, `Region`, `Postal`, `Phone`, `Website`, `ActivityName`) VALUES (7, 'White Park', '1 White St', 'Concord', 'NH', '03301', '603-225-8690', 'http://concordnh.gov/facilities/facility/details/White-Park-21', 'Pool, Walking Trails, Playground Equipments, Outdoor Sport Fields');
INSERT INTO `Attractions` (`AttractionsID`, `Name`, `Address`, `City`, `Region`, `Postal`, `Phone`, `Website`, `ActivityName`) VALUES (8, 'New Hampshire Historical Society', '30 Park St', 'Concord', 'NH', '03301', '603-228-6688', 'https://www.nhhistory.org/', 'Guided Tour');
INSERT INTO `Attractions` (`AttractionsID`, `Name`, `Address`, `City`, `Region`, `Postal`, `Phone`, `Website`, `ActivityName`) VALUES (9, 'The Pierce Manse', '14 Horseshoe Pond Ln', 'Concord', 'NH', '03301', '603-225-4555', 'http://www.piercemanse.org/', NULL);
INSERT INTO `Attractions` (`AttractionsID`, `Name`, `Address`, `City`, `Region`, `Postal`, `Phone`, `Website`, `ActivityName`) VALUES (10, 'Winant Park', '53, 11 Fisk Rd', 'Concord', 'NH', '03301', NULL, 'http://www.concordnh.gov/Facilities/Facility/Details/72', 'Trail Park');
INSERT INTO `Attractions` (`AttractionsID`, `Name`, `Address`, `City`, `Region`, `Postal`, `Phone`, `Website`, `ActivityName`) VALUES (11, 'Old North Cemetery', 'N State St', 'Concord', 'NH', '03301', NULL, NULL, NULL);
INSERT INTO `Attractions` (`AttractionsID`, `Name`, `Address`, `City`, `Region`, `Postal`, `Phone`, `Website`, `ActivityName`) VALUES (12, 'Mary Baker Eddy Historic House', '62 N State St', 'Concord', 'NH', '03301', '603-225-3444', 'https://www.longyear.org/', 'Exhibits');
INSERT INTO `Attractions` (`AttractionsID`, `Name`, `Address`, `City`, `Region`, `Postal`, `Phone`, `Website`, `ActivityName`) VALUES (13, 'Merrimack River Greenway Trail', 'Gully Hill Rd', 'Concord', 'NH', '03301', NULL, 'https://www.merrimackrivergreenwaytrail.org/', 'Trail');
INSERT INTO `Attractions` (`AttractionsID`, `Name`, `Address`, `City`, `Region`, `Postal`, `Phone`, `Website`, `ActivityName`) VALUES (14, 'West Terrill Park', 'Old Turnpike Rd', 'Concord', 'NH', '03301', '603-225-8690', 'http://concordnh.gov/Facilities/Facility/Details/Terrill-Park-28', 'Dog Parks and Walking Trail');
INSERT INTO `Attractions` (`AttractionsID`, `Name`, `Address`, `City`, `Region`, `Postal`, `Phone`, `Website`, `ActivityName`) VALUES (15, 'Society for the Protection of NH Forests', '54 Portsmouth St', 'Concord', 'NH', '03301', '603-224-9945', 'https://forestsociety.org/', NULL);




