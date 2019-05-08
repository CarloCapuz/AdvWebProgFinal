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
            'name' => strip_tags($Name),
            'address' => strip_tags($Address),
            'city' => strip_tags($City),
            'state' => strip_tags($Region),
            'postal' => strip_tags($Postal),
            'phone' => strip_tags($Phone),
            'website' => strip_tags($Website),
            'description' => strip_tags($ActivityName),
            'TypeID' => strip_tags($ActivityType)
        ];
        $db->insert('attractions', $activity);
        return $activity;
    }

    public static function update($id, $data) 
    {
        $db = Database::getInstance();
        $activity = [
            'name' => strip_tags($data['name']),
            'address' => strip_tags($data['address']),
            'city' => strip_tags($data['city']),
            'state' => strip_tags($data['state']),
            'postal' => strip_tags($data['postal']),
            'phone' => strip_tags($data['phone']),
            'website' => strip_tags($data['website']),
            'description' => strip_tags($data['description'])
        ];
        $arr = $db->update('attractions', 'attractionsID='.$id, $data);
        return $activity;
    }

    public static function delete($id) 
    {
        $db = Database::getInstance();
        $data = $db->execute('DELETE FROM attractions WHERE attractionsID='.$id);
        $data = $db->execute('DELETE FROM image WHERE attractionsID='.$id);
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
        $data = $db->query('SELECT image.filePath, attractions.* FROM image INNER JOIN attractions ON image.attractionsID=attractions.attractionsID');
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