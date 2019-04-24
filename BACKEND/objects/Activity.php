<?php
include_once dirname(__FILE__) . "\..\core\database.php";

class Activity implements JsonSerializable
{
    public $Name;
    public $Address;
    public $City;
    public $Region;
    public $Postal;
    public $Phone;
    public $Website;
    public $Description;

    public function Activity($activityArray)
    {
        $this->Name = $activityArray['Name'];
        $this->Address = $activityArray['Address'];
        $this->City = $activityArray['City'];
        $this->Region = $activityArray['Region'];
        $this->Postal = $activityArray['Postal'];
        $this->Phone = $activityArray['Phone'];
        $this->Website = $activityArray['Website'];
        $this->Description = $activityArray['Description'];        
    }

    public function jsonSerialize()
    {
        return [
            'Name' => $this->Name,
            'Address' => $this->Address,
            'City' => $this->City,
            'Region' => $this->Region,
            'Postal' => $this->Postal,
            'Phone' => $this->Phone,
            'Website' => $this->Website,
            'Description' => $this->Description,
        ];
    }
}