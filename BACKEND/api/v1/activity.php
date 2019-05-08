<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once "../../models/Activity.php";
include_once "../../objects/Activity.php";


// activity.php?create&Name=Test&Address=Test&City=Test&Region=Test&Postal=Test&Phone=Test&Website=Test&Description=Test
// activity.php?update&Name=Test&Address=Test&City=Test&Region=Test&Postal=Test&Phone=Test&Website=Test&Description=Test&ID=1

if (isset($_GET['create']) && 
    isset($_GET['name']) &&
    isset($_GET['address']) &&
    isset($_GET['city']) &&
    isset($_GET['state']) &&
    isset($_GET['postal']) &&
    isset($_GET['phone']) &&
    isset($_GET['website']) &&
    isset($_GET['description'])
    )
{
    $activityData = ActivtyModel::create($_GET['name'],
                                         $_GET['address'],
                                         $_GET['city'],
                                         $_GET['state'],
                                         $_GET['postal'],
                                         $_GET['phone'],
                                         $_GET['website'],
                                         $_GET['description']
                                        );
    $activity = new Activity($activityData);
    print_r(json_encode($activity));
}

if (isset($_GET['update']) && 
    isset($_GET['name']) &&
    isset($_GET['address']) &&
    isset($_GET['city']) &&
    isset($_GET['state']) &&
    isset($_GET['postal']) &&
    isset($_GET['phone']) &&
    isset($_GET['website']) &&
    isset($_GET['description']) &&
    isset($_GET['ID'])
    )
{
    $activityData = ActivtyModel::update($_GET['ID'],
        [
            'name' => strip_tags($_GET['name']),
            'address' => strip_tags($_GET['address']),
            'city' => strip_tags($_GET['city']),
            'state' => strip_tags($_GET['state']),
            'postal' => strip_tags($_GET['postal']),
            'phone' => strip_tags($_GET['phone']),
            'website' => strip_tags($_GET['website']),
            'description' => strip_tags($_GET['description'])
        ]
    );
    $activity = new Activity($activityData);
    print_r(json_encode($activity));
}

if (isset($_GET['delete']) && isset($_GET['ID']))
{
    $activityData = ActivtyModel::delete($_GET['ID']);
    echo "[]";
}

if (isset($_GET['getAll']))
{
    print_r(json_encode(ActivtyModel::getAll()));
}

if (isset($_GET['getImages']))
{
    print_r(json_encode(ActivtyModel::getImages()));
}