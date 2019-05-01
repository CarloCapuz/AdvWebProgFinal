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
  `AttractionsID` INTEGER NOT NULL AUTO_INCREMENT, 
  `Name` VARCHAR(255),  
  `Address` VARCHAR(255), 
  `City` VARCHAR(255), 
  `Region` VARCHAR(255), 
  `Postal` VARCHAR(255),  
  `Phone` VARCHAR(255),
  `Website` VARCHAR(255),
  `Description` VARCHAR(255),
  PRIMARY KEY (`AttractionsID`)
) ENGINE=innodb DEFAULT CHARSET=utf8;";
  
$db->execute($activitySQL);

$imageSQL ="CREATE TABLE `Image` (
	`ImageID` INTEGER NOT NULL AUTO_INCREMENT,
	`AttractionsID` INT,
	`FilePath` VARCHAR(255),
	`AltText` VARCHAR(255),
	PRIMARY KEY (`ImageID`),
	FOREIGN KEY (AttractionsID) REFERENCES `Attractions` (AttractionsID)
) ENGINE=innodb DEFAULT CHARSET=utf8;";

$db->execute($imageSQL);

echo "INSTALLED";