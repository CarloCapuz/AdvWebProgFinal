<?php
/**
 * Created by PhpStorm.
 * User: ccapuz
 * Date: 4/17/2019
 * Time: 11:09 AM
 */

class ActivityDaoMaria implements ActivityDao
{
    public function readAll()
    {
        try {
            $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            die ( $e->getMessage());
        }

        $query = $pdo->query('SELECT * FROM attractions');
        $activitiesList = [];
        foreach ($query as $row){
            $activitiesList[] = new Activity($row);
        }
        return $activitiesList;
    }

} // end class