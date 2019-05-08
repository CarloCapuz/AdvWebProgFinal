<?php
include_once dirname(__FILE__) . "\..\core\database.php";

class Activity implements JsonSerializable
{
    public $ActivityID;
    public $Name;
    public $Address;
    public $City;
    public $Region;
    public $Postal;
    public $Phone;
    public $Website;
    public $Description;
    public $FilePath;
   // public $TypeID;

    public function __construct($activityArray)
    {
        $this->Name = $activityArray['name'];
        $this->FilePath = isset($activityArray['filePath']) ? $activityArray['filePath'] : '/';
        $this->ActivityID = isset($activityArray['attractionsID']) ? $activityArray['attractionsID'] : '0';
        $this->Address = $activityArray['address'];
        $this->City = $activityArray['city'];
        $this->Region = $activityArray['state'];
        $this->Postal = $activityArray['postal'];
        $this->Phone = $activityArray['phone'];
        $this->Website = $activityArray['website'];
        $this->Description = $activityArray['description'];        
       // $this->TypeID = $activityArray['TypeID'];        
    }

    public function jsonSerialize()
    {
        return [
            'attractionID' => $this->ActivityID,
            'filePath' => $this->FilePath,
            'name' => $this->Name,
            'address' => $this->Address,
            'city' => $this->City,
            'state' => $this->Region,
            'postal' => $this->Postal,
            'phone' => $this->Phone,
            'website' => $this->Website,
            'description' => $this->Description,
            //'TypeID' => $this->TypeID,
        ];
    }
}