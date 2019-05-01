<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "../../models/Activity.php";
include_once "../../objects/Activity.php";


// activity.php?create&Name=Test&Address=Test&City=Test&Region=Test&Postal=Test&Phone=Test&Website=Test&Description=Test
// activity.php?update&Name=Test&Address=Test&City=Test&Region=Test&Postal=Test&Phone=Test&Website=Test&Description=Test&ID=1

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
                                         $_GET['Description']
                                      //   $_GET['Type']
                                        );
    $activity = new Activity($activityData);
    print_r(json_encode($activity));
}

if (isset($_GET['update']) && 
    isset($_GET['Name']) &&
    isset($_GET['Address']) &&
    isset($_GET['City']) &&
    isset($_GET['Region']) &&
    isset($_GET['Postal']) &&
    isset($_GET['Phone']) &&
    isset($_GET['Website']) &&
    isset($_GET['Description']) &&
    isset($_GET['ID'])
    )
{
    $activityData = ActivtyModel::update($_GET['ID'],
        [
            'Name' => strip_tags($_GET['Name']),
            'Address' => strip_tags($_GET['Address']),
            'City' => strip_tags($_GET['City']),
            'Region' => strip_tags($_GET['Region']),
            'Postal' => strip_tags($_GET['Postal']),
            'Phone' => strip_tags($_GET['Phone']),
            'Website' => strip_tags($_GET['Website']),
            'Description' => strip_tags($_GET['Description'])
        ]
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