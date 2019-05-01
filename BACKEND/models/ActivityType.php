<?php
include_once dirname(__FILE__) . "\..\core\database.php";

class ActivityTypeModel implements ActivityTypeInterface
{
    public static function create($typeName)
    {
        $db = Database::getInstance();
        $type = array(
            'TypeName' => strip_tags($typeName)
        );
        $db->insert('ActivityType', $type);
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
        return $db->query('SELECT * FROM ActivityType');
    }
}