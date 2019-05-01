<?php
include_once "../../models/ActivityType.php";
include_once "../../objects/ActivityType.php";

// activitytype.php?create&typeName=Name

if (isset($_GET['create']) && isset($_GET['typeName']))
{
    $typeData = ActivityTypeModel::create($_GET['typeName']);
    $type = new ActivityType($typeData, false);
    print_r(json_encode($type));
}

if (isset($_GET['getAll']))
{
    print_r(json_encode(ActivityTypeModel::getAll()));
}