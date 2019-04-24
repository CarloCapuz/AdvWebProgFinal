<?php
include_once dirname(__FILE__) . "\..\core\database.php";
include_once dirname(__FILE__) . "\..\objects\Activity.php";
include_once dirname(__FILE__) . "\..\interfaces\Activity.php";

class ActivtyModel implements ActivityInterface
{
    public static function create($Name,$Address,$City,$Region,$Postal,$Phone,$Website,$ActivityName)
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
            'Description' => strip_tags($ActivityName)
        ];
        $db->insert('Attractions', $activity);
        return $activity;
    }

    public static function getByID($activityID)
    {
        $db = Database::getInstance();

        $arr = $db->select('Attractions', 'id=?', [$activityID]);
        if ($arr) {
            return $arr;
        }
        return false;
    }

    public static function getAll()
    {
        $db = Database::getInstance();
        return $db->query('SELECT * FROM Attractions');
    }

    public static function readAll()
    {
        $db = Database::getInstance();
        $data = $db->query('SELECT * FROM Attractions');
        $activitiesList = [];
        foreach ($data as $row)
        {
            $activitiesList[] = new Activity($row);
        }
        return $activitiesList;
    }
}