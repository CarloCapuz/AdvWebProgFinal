<?php
/**
 * Created by PhpStorm.
 * User: IT-Lab
 * Date: 4/10/2019
 * Time: 6:51 PM
 */

class Activity
{
    public $id;
    public $name;
    public $address;
    public $city;
    public $region;
    public $postal;
    public $phone;
    public $website;
    public $activityName;


    public function Activity($activityArray)
    {
        $this->id = $activityArray['AttractionsID'];
        $this->name = $activityArray['Name'];
        $this->address = $activityArray['Address'];
        $this->city = $activityArray['City'];
        $this->region = $activityArray['Region'];
        $this->postal = $activityArray['Postal'];
        $this->phone = $activityArray['Phone'];
        $this->website = $activityArray['Website'];
        $this->activityName = $activityArray['ActivityName'];
    }

    // GETTERS AND SETTERS

//    /**
//     * @return mixed
//     */
//    public function getId()
//    {
//        return $this->id;
//    }
//
//    /**
//     * @param mixed $id
//     */
//    public function setId($id)
//    {
//        if (!is_numeric($id)){
//            throw new InvalidArgumentException('ID can not be non-numeric');
//        }
//        $this->id = $id;
//    }
//
//    /**
//     * @return mixed
//     */
    public function getName()
    {
        return $this->name;
    }
//
//    /**
//     * @param mixed $name
//     */
    public function setName($name)
    {
        $this->name = $name;
    }
//
//    /**
//     * @return mixed
//     */
//    public function getAddress()
//    {
//        return $this->address;
//    }
//
//    /**
//     * @param mixed $address
//     */
//    public function setAddress($address)
//    {
//        $this->address = $address;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getCity()
//    {
//        return $this->city;
//    }
//
//    /**
//     * @param mixed $city
//     */
//    public function setCity($city)
//    {
//        $this->city = $city;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getRegion()
//    {
//        return $this->region;
//    }
//
//    /**
//     * @param mixed $region
//     */
//    public function setRegion($region)
//    {
//        $this->region = $region;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getPostal()
//    {
//        return $this->postal;
//    }
//
//    /**
//     * @param mixed $postal
//     */
//    public function setPostal($postal)
//    {
//        $this->postal = $postal;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getPhone()
//    {
//        if ($this->phone == "")
//        {
//            return "";
//        } else {
//            return $this->phone;
//        }
//    }
//
//    /**
//     * @param mixed $phone
//     */
//    public function setPhone($phone)
//    {
//        $this->phone = $phone;
//    }
//
//    /**
//     * @return mixed
//     */
    public function getWebsite()
    {
        if ($this->website == "")
        {
            return "";
        } else {
            return $this->website;
        }
    }

//    /**
//     * @param mixed $website
//     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }
//
//    /**
//     * @return mixed
//     */
//    public function getActivityName()
//    {
//        if ($this->activityName == ""){
//            return "";
//        } else {
//            return $this->activityName;
//        }
//    }
//
//    /**
//     * @param mixed $activityName
//     */
//    public function setActivityName($activityName)
//    {
//        $this->activityName = $activityName;
//    }

} // end class