<?php
// add the config.php to access database
require_once('config.php');
require_once ('Activity.php');
require_once ('ActivityDao.php');
require_once ('ActivityDaoMaria.php');


try {
    $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    die ( $e->getMessage());
}

?>
<!DOCTYPE html>

<html lang="en">

<head>

   <title> Midterm Project</title>

<!-- Link your CSS -->
<link href="midterm.css" rel="stylesheet"/>

</head>

<body>

<a href="midterm.php"><h1 class="bigheader">WELCOME TO CONCORD</h1></a>

<!-- Header -->
<nav>
  <ul>
    <a href="https://www.britannica.com/place/Concord-New-Hampshire" target="_blank"><li>HISTORY</li></a>

    <a href="?page=attractions"><li>ATTRACTIONS</li></a>
      <a href="?page=activities"><li>ACTIVITIES</li></a>
      <a href="?page=reset"><li>RESET</li></a>

<?php
session_start();

function outputAttractions() {

    global $pdo;
    $sql = 'select Name, Address, City, Region, Postal, Website, Phone from attractions order by name';
    $result = $pdo->query($sql);

    while ($row = $result->fetch()) {
        // set the variables
        $name = $row['Name'];
        $address = $row['Address'];
        $cityRegionAndPostal = $row['City'] . ", " . $row['Region'] . " " . $row['Postal'];
        $phone = $row['Phone'];
        $website = $row['Website'];

        echo "<a href='$website' target='_blank'><h2>$name</h2></a>";
        echo "<h7>$address</h7><br>";
        echo "<h7>$cityRegionAndPostal</h7><br>";
        echo "<h7>$phone</h7>";
    }
}

function outputActivities() {
    global $pdo;
    $sql = 'select Name, ActivityName, Address, City, Region, Postal, Website from attractions where ActivityName IS NOT NULL order by name';
    $result = $pdo->query($sql);

    while ($row = $result->fetch()) {
        // set the variables
        $name = $row['Name'];
        $address = $row['Address'];
        $cityRegionAndPostal = $row['City'] . ", " . $row['Region'] . " " . $row['Postal'];
        $activity = $row['ActivityName'];
        $website = $row['Website'];

        echo "<a href='$website' target='_blank'><h2>$name</h2></a>";
        echo "<h7>$activity</h7><br>";
        echo "<h7>$address</h7><br>";
        echo "<h7>$cityRegionAndPostal</h7>";
    }
}

if( isset($_GET['page'])){
  $_SESSION['Page'] = $_GET['page'];
      if ($_GET['page'] == 'attractions') {   // ATTRACTIONS tab
          outputAttractions();
      } // end if
      else if ($_GET['page'] == 'activities') {   // ACTIVITIES tab
          outputActivities();
      } // end else if
} // end if isset

if ($_SESSION['Page'] == 'attractions'){
    outputAttractions();
} else if ($_SESSION['Page'] == 'activities'){
    outputActivities();
} else {
    unset($_SESSION['page']);
}

// There are no vulnerabilities for a URL attack because of my code structure. I'm not pulling up the database by using $_GET, I'm manually pulling it up instead of using $_GET.
?>
  </ul>
</nav>

</body>

</html>
