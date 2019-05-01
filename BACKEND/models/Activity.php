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
        $db->insert('Activities', $activity);
        return $activity;
    }

    public static function getByType($typeID)
    {
        $db = Database::getInstancec();

        $arr = $db->select('Activities', 'TypeID=?', [$typeID]);
        if ($arr)
        {
            return $arr;
        }
        return false;
    }

    public static function getByID($activityID)
    {
        $db = Database::getInstance();

        $arr = $db->select('Activities', 'ActivityID=?', [$activityID]);
        if ($arr) 
        {
            return $arr;
        }
        return false;
    }

    public static function getAll()
    {
        $db = Database::getInstance();
        $data = $db->query('SELECT * FROM Activities');
        $activitiesList = [];
        foreach ($data as $row)
        {
            $activitiesList[] = new Activity($row);
        }
        return $activitiesList;
    }
}