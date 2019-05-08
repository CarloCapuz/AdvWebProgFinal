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
  `attractionsID` INTEGER NOT NULL AUTO_INCREMENT, 
  `name` VARCHAR(255),  
  `address` VARCHAR(255), 
  `city` VARCHAR(255), 
  `state` VARCHAR(255), 
  `postal` VARCHAR(255),  
  `phone` VARCHAR(255),
  `website` VARCHAR(255),
  `description` VARCHAR(255),
  PRIMARY KEY (`attractionsID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

#
# Dumping data for table 'Attractions'
#

INSERT INTO `Attractions` (`attractionsID`, `name`, `address`, `city`, `state`, `postal`, `phone`, `website`, `description`) VALUES (1, 'Canterbury Shaker Village', '288 Shaker Rd', 'Canterbury', 'NH', '03224', '603-783-9511', 'http://www.shakers.org/', 'Museum Tour and Exhibits');
INSERT INTO `Attractions` (`attractionsID`, `name`, `address`, `city`, `state`, `postal`, `phone`, `website`, `description`) VALUES (2, 'McAuliffe-Shepard Discovery Center', '2 Institute Dr', 'Concord', 'NH', '03301', '603-271-7827', 'https://www.starhop.com/', 'Science Tour');
INSERT INTO `Attractions` (`attractionsID`, `name`, `address`, `city`, `state`, `postal`, `phone`, `website`, `description`) VALUES (3, 'NH Audubon McLane Center', '84 Silk Farm Rd', 'Concord', 'NH', '03301', '603-224-9909', 'http://www.nhaudubon.org/about/centers/mclane/', 'Wooded Hiking Trails, Raptor Exhibit, and Indoor Animal Displays');
INSERT INTO `Attractions` (`attractionsID`, `name`, `address`, `city`, `state`, `postal`, `phone`, `website`, `description`) VALUES (4, 'New Hampshire State House', '107 N Main St', 'Concord', 'NH', '03303', '603-271-2154', 'https://www.nh.gov/index.htm', NULL);
INSERT INTO `Attractions` (`attractionsID`, `name`, `address`, `city`, `state`, `postal`, `phone`, `website`, `description`) VALUES (5, 'Bear Brook State Park', '157 Deerfield Rd', 'Allenstown', 'NH', '03275', '603-485-9874', 'https://www.nhstateparks.org/visit/state-parks/bear-brook-state-park.aspx', 'Outdoor Activities - Hiking, Swimming, Fishing, etc');
INSERT INTO `Attractions` (`attractionsID`, `name`, `address`, `city`, `state`, `postal`, `phone`, `website`, `description`) VALUES (6, 'Chuckster''s', '9 Bailey Rd', 'Chichester', 'NH', '03258', '603-798-3555', 'https://www.chuckstersnh.com/', 'Outdoor Fun Park - Go-Karts, Mini Golf, etc');
INSERT INTO `Attractions` (`attractionsID`, `name`, `address`, `city`, `state`, `postal`, `phone`, `website`, `description`) VALUES (7, 'White Park', '1 White St', 'Concord', 'NH', '03301', '603-225-8690', 'http://concordnh.gov/facilities/facility/details/White-Park-21', 'Pool, Walking Trails, Playground Equipments, Outdoor Sport Fields');
INSERT INTO `Attractions` (`attractionsID`, `name`, `address`, `city`, `state`, `postal`, `phone`, `website`, `description`) VALUES (8, 'New Hampshire Historical Society', '30 Park St', 'Concord', 'NH', '03301', '603-228-6688', 'https://www.nhhistory.org/', 'Guided Tour');
INSERT INTO `Attractions` (`attractionsID`, `name`, `address`, `city`, `state`, `postal`, `phone`, `website`, `description`) VALUES (9, 'The Pierce Manse', '14 Horseshoe Pond Ln', 'Concord', 'NH', '03301', '603-225-4555', 'http://www.piercemanse.org/', NULL);
INSERT INTO `Attractions` (`attractionsID`, `name`, `address`, `city`, `state`, `postal`, `phone`, `website`, `description`) VALUES (10, 'Winant Park', '53, 11 Fisk Rd', 'Concord', 'NH', '03301', NULL, 'http://www.concordnh.gov/Facilities/Facility/Details/72', 'Trail Park');
INSERT INTO `Attractions` (`attractionsID`, `name`, `address`, `city`, `state`, `postal`, `phone`, `website`, `description`) VALUES (11, 'Old North Cemetery', 'N State St', 'Concord', 'NH', '03301', NULL, NULL, NULL);
INSERT INTO `Attractions` (`attractionsID`, `name`, `address`, `city`, `state`, `postal`, `phone`, `website`, `description`) VALUES (12, 'Mary Baker Eddy Historic House', '62 N State St', 'Concord', 'NH', '03301', '603-225-3444', 'https://www.longyear.org/', 'Exhibits');
INSERT INTO `Attractions` (`attractionsID`, `name`, `address`, `city`, `state`, `postal`, `phone`, `website`, `description`) VALUES (13, 'Merrimack River Greenway Trail', 'Gully Hill Rd', 'Concord', 'NH', '03301', NULL, 'https://www.merrimackrivergreenwaytrail.org/', 'Trail');
INSERT INTO `Attractions` (`attractionsID`, `name`, `address`, `city`, `state`, `postal`, `phone`, `website`, `description`) VALUES (14, 'West Terrill Park', 'Old Turnpike Rd', 'Concord', 'NH', '03301', '603-225-8690', 'http://concordnh.gov/Facilities/Facility/Details/Terrill-Park-28', 'Dog Parks and Walking Trail');
INSERT INTO `Attractions` (`attractionsID`, `name`, `address`, `city`, `state`, `postal`, `phone`, `website`, `description`) VALUES (15, 'Society for the Protection of NH Forests', '54 Portsmouth St', 'Concord', 'NH', '03301', '603-224-9945', 'https://forestsociety.org/', NULL);

CREATE TABLE `Image` (
	`ImageID` INTEGER NOT NULL AUTO_INCREMENT,
	`attractionsID` INT,
	`filePath` VARCHAR(255),
	`altText` VARCHAR(255),
	PRIMARY KEY (`ImageID`),
	FOREIGN KEY (AttractionsID) REFERENCES `Attractions` (AttractionsID)
) ENGINE=innodb DEFAULT CHARSET=utf8;

SET autocommit=1;

INSERT INTO `Image` (`attractionsID`, `filePath`, `altText`) VALUES (1, '\\Pictures\\Canterbury Shaker Village.jpg', 'Canterbury Shaker Village');
INSERT INTO `Image` (`attractionsID`, `filePath`, `altText`) VALUES (2, '\\Pictures\\McAuliffe-Shepard-Discovery-Center.jpg', 'McAuliffe-Shepard Discovery Center');
INSERT INTO `Image` (`attractionsID`, `filePath`, `altText`) VALUES (3, '\\Pictures\\McLane-Center.jpg', 'NH Audubon McLane Center');
INSERT INTO `Image` (`attractionsID`, `filePath`, `altText`) VALUES (4, '\\Pictures\\stocknhstatehouse.jpg', 'New Hampshire State House');
INSERT INTO `Image` (`attractionsID`, `filePath`, `altText`) VALUES (5, '\\Pictures\\BB State Park.jpg', 'Bear Brook State Park');
INSERT INTO `Image` (`attractionsID`, `filePath`, `altText`) VALUES (6, '\\Pictures\\chucksters.jpg', 'Chuckster''s');
INSERT INTO `Image` (`attractionsID`, `filePath`, `altText`) VALUES (7, '\\Pictures\\whitepark.jpg', 'White Park');
INSERT INTO `Image` (`attractionsID`, `filePath`, `altText`) VALUES (8, '\\Pictures\\NH historical society.jpg', 'New Hampshire Historical Society');
INSERT INTO `Image` (`attractionsID`, `filePath`, `altText`) VALUES (9, '\\Pictures\\Piercemanse.jpg', 'The Pierce Manse');
INSERT INTO `Image` (`attractionsID`, `filePath`, `altText`) VALUES (10, '\\Pictures\\winant-park.jpg', 'Winant Park');
INSERT INTO `Image` (`attractionsID`, `filePath`, `altText`) VALUES (11, '\\Pictures\\oldnorthcemetery.jpg', 'Old North Cemetery');
INSERT INTO `Image` (`attractionsID`, `filePath`, `altText`) VALUES (12, '\\Pictures\\MBE Historic House.jpg', 'Mary Baker Eddy Historic House');
INSERT INTO `Image` (`attractionsID`, `filePath`, `altText`) VALUES (13, '\\Pictures\\MerrimackRiverGreenwayTrail.jpg', 'Merrimack River Greenway Trail');
INSERT INTO `Image` (`attractionsID`, `filePath`, `altText`) VALUES (14, '\\Pictures\\terrillpark.jpg', 'West Terrill Park');
INSERT INTO `Image` (`attractionsID`, `filePath`, `altText`) VALUES (15, '\\Pictures\\Society for the protection of NH forests.jpg', 'Society for the Protection of NH Forests');

CREATE TABLE `ActivityType` (
	`TypeID` INTEGER NOT NULL AUTO_INCREMENT,
	`TypeName` VARCHAR(255) UNIQUE,
	PRIMARY KEY (`TypeID`)
);

	INSERT INTO `ActivityType` (`TypeName`) VALUES ('Entertainment');
	INSERT INTO `ActivityType` (`TypeName`) VALUES ('Interactive');
	INSERT INTO `ActivityType` (`TypeName`) VALUES ('Museums');
	INSERT INTO `ActivityType` (`TypeName`) VALUES ('Parks');

	CREATE TABLE `TypeAssoc` (
	`AttractionsID` INT,
	`TypeID` INT,
	FOREIGN KEY (AttractionsID) REFERENCES `Attractions` (AttractionsID),
	FOREIGN KEY (TypeID) REFERENCES `ActivityType` (TypeID)
	);
