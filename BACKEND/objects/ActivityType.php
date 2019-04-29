<?php
include_once dirname(__FILE__) . "\..\core\database.php";

class ActivityType implements JsonSerializable
{
    public $Name;
    public $ID;

    public function ActivityType($typeArray)
    {
        $this->Name = $activityArray['TypeName'];
        $this->ID = $activityArray['TypeID'];  
    }

    public function jsonSerialize()
    {
        return [
            'ID' => $this->ID,
            'Name' => $this->Name,
        ];
    }
}