<?php
include_once 'database.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = Database::getInstance();

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

$activityTypeSQL ="CREATE TABLE `ActivityType` (
	`TypeID` INTEGER NOT NULL AUTO_INCREMENT,
	`TypeName` VARCHAR(255) UNIQUE,
	PRIMARY KEY (`TypeID`)
);";

$db->execute($activityTypeSQL);

$typeAssocSQL ="CREATE TABLE `TypeAssoc` (
	`AttractionsID` INT,
	`TypeID` INT,
	FOREIGN KEY (AttractionsID) REFERENCES `Attractions` (AttractionsID),
	FOREIGN KEY (TypeID) REFERENCES `ActivityType` (TypeID)
);";
    
$db->execute($typeAssocSQL);

echo "INSTALLED";