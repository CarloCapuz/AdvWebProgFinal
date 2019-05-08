<?php
include_once 'database.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = Database::getInstance();
/*

$typeAssocSQL ="CREATE TABLE `TypeAssoc` (
	`ActivityID` INT,
	`TypeID` INT,
	FOREIGN KEY (ActivityID) REFERENCES `Activities` (ActivityID),
	FOREIGN KEY (TypeID) REFERENCES `ActivityType` (TypeID)
);";
    
$db->execute($typeAssocSQL);

*/
$activitySQL ="CREATE TABLE `Attractions` (
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
) ENGINE=innodb DEFAULT CHARSET=utf8;";
  
$db->execute($activitySQL);

$imageSQL ="CREATE TABLE `Image` (
	`ImageID` INTEGER NOT NULL AUTO_INCREMENT,
	`attractionsID` INT,
	`filePath` VARCHAR(255),
	`altText` VARCHAR(255),
	PRIMARY KEY (`ImageID`),
	FOREIGN KEY (attractionsID) REFERENCES `Attractions` (attractionsID)
) ENGINE=innodb DEFAULT CHARSET=utf8;";

$db->execute($imageSQL);

echo "INSTALLED";