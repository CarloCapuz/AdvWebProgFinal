<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "../../models/Activity.php";
include_once "../../objects/Activity.php";


// activity.php?create&Name=Test&Address=Test&City=Test&Region=Test&Postal=Test&Phone=Test&Website=Test&Description=Test&Type=22

if (isset($_GET['create']) && 
    isset($_GET['Name']) &&
    isset($_GET['Address']) &&
    isset($_GET['City']) &&
    isset($_GET['Region']) &&
    isset($_GET['Postal']) &&
    isset($_GET['Phone']) &&
    isset($_GET['Website']) &&
    isset($_GET['Description']) //&&
    //isset($_GET['Type'])
    )
{
    $activityData = ActivtyModel::create($_GET['Name'],
                                         $_GET['Address'],
                                         $_GET['City'],
                                         $_GET['Region'],
                                         $_GET['Postal'],
                                         $_GET['Phone'],
                                         $_GET['Website'],
                                         $_GET['Description'],
                                      //   $_GET['Type']
                                        );
    $activity = new Activity($activityData);
    print_r(json_encode($activity));
}

if (isset($_GET['getAll']))
{
    print_r(json_encode(ActivtyModel::getAll()));
}

if (isset($_GET['getImages']))
{
    print_r(json_encode(ActivtyModel::getImages()));
}