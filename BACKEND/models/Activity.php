<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once dirname(__FILE__) . "\..\core\database.php";
include_once dirname(__FILE__) . "\..\objects\Activity.php";
include_once dirname(__FILE__) . "\..\interfaces\Activity.php";

class ActivtyModel implements ActivityInterface
{
    public static function create($Name,$Address,$City,$Region,$Postal,$Phone,$Website,$ActivityName,$ActivityType)
    {
        $db = Database::getInstance();
        $activity = [
            'Name' => strip_tags($Name),
            'Address' => strip_tags($Address),
            'City' => strip_tags($City),
            'Region' => strip_tags($Region),
            'Postal' => strip_tags($Postal),
            'Phone' => strip_tags($Phone),
            'Website' => strip_tags($Website),
            'Description' => strip_tags($ActivityName),
            'TypeID' => strip_tags($ActivityType)
        ];
        $db->insert('attractions', $activity);
        return $activity;
    }

    public static function update($id, $data) 
    {
        $db = Database::getInstance();
        $activity = [
            'Name' => strip_tags($data['Name']),
            'Address' => strip_tags($data['Address']),
            'City' => strip_tags($data['City']),
            'Region' => strip_tags($data['Region']),
            'Postal' => strip_tags($data['Postal']),
            'Phone' => strip_tags($data['Phone']),
            'Website' => strip_tags($data['Website']),
            'Description' => strip_tags($data['Description'])
        ];
        $arr = $db->update('attractions', 'AttractionsID='.$id, $data);
        return $activity;
    }

    public static function getByType($typeID)
    {
        $db = Database::getInstancec();

        $arr = $db->select('attractions', 'TypeID=?', [$typeID]);
        if ($arr)
        {
            return $arr;
        }
        return false;
    }

    public static function getByID($activityID)
    {
        $db = Database::getInstance();

        $arr = $db->select('attractions', 'attractions=?', [$activityID]);
        if ($arr) 
        {
            return $arr;
        }
        return false;
    }

    public static function getAll()
    {
        $db = Database::getInstance();
        $data = $db->query('SELECT image.FilePath, attractions.* FROM image INNER JOIN attractions ON image.AttractionsID=attractions.AttractionsID');
        $activitiesList = [];

        foreach ($data as $row)
        {
            $activitiesList[] = new Activity($row);
        }
        return $activitiesList;
    }

    public static function getImages()
    {
        $db = Database::getInstance();
        $data = $db->query('SELECT * FROM image');
        $activitiesList = [];
        foreach ($data as $row)
        {
           // echo $row;
            $activitiesList[] = $row;
        }
        return $activitiesList;
    }
}