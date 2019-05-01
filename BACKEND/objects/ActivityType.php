<?php
include_once dirname(__FILE__) . "\..\core\database.php";

class ActivityType implements JsonSerializable
{
    public $Name;
    public $ID;

    public function __construct($typeArray, $useID)
    {
        $this->Name = $typeArray['TypeName'];
        if ($useID) {
            $this->ID = $typeArray['TypeID'];
        } else {
            $this->ID = 0;
        }
    }

    public function jsonSerialize()
    {
        return [
            'Name' => $this->Name,
            'ID' => $this->ID,
        ];
    }
}