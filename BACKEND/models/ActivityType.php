<?php
include_once dirname(__FILE__) . "\..\core\database.php";
include_once dirname(__FILE__) . "\..\objects\ActivityType.php";
include_once dirname(__FILE__) . "\..\interfaces\ActivityType.php";

class ActivityTypeModel implements ActivityTypeInterface
{
    public static function create($typeName)
    {
        $db = Database::getInstance();
        $type = array(
            'TypeName' => strip_tags($typeName)
        );
        $test = $db->insert('ActivityType', $type);
        return $type;
    }

    public static function getByType($activityType)
    {
        $db = Database::getInstance();
        $arr = $db->select('ActivityType', 'TypeID=?', [$activityType]);
        if ($arr) {
            return $arr;
        }
        return false;
    }

    public static function getAll()
    {
        $db = Database::getInstance();
        $data = $db->query('SELECT * FROM ActivityType');
        $activitiesList = [];
        foreach ($data as $row)
        {
            $activitiesList[] = new ActivityType($row, true);
        }
        return $activitiesList;
    }
}