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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>



<a href="index.php"><h1 class="bigheader">WELCOME TO CONCORD</h1></a>

<div class="imgContainer">
  <img class="img" src="ConcordLogo2.0.png" />
</div>

<!-- Header -->
<nav>
  <ul>
    <a href="https://www.britannica.com/place/Concord-New-Hampshire" target="_blank"><li>HISTORY</li></a>

    <a href="?page=attractions"><li>ATTRACTIONS</li></a>
      <a href="?page=activities"><li>ACTIVITIES</li></a>
      <a href="?page=reset"><li>RESET</li></a>
      <li><form action="">
    <select name="filter">
        <option value="name">Name</option>
        <option value="address">Address</option>
        <option value="city">City</option>
        <option value="region">Region</option>
        <option value="postal">Postal</option>
        <option value="description">Description</option>
    </select>
    <input type="submit" onclick="setFilter()">
    </form></li>


    <script>

        var filtered = false;
        var results = [];
        const genActivity = (activity) => {
        const el = document.createElement('div');
        el.innerHTML = `<div class="activity">
                    <div class="activity-icon">
                        <i class="fas fa-info"></i>
                    </div>
                    <div class="activity-title">
                        <a href='${activity["Website"]}' target='_blank'><h2>${activity["Name"]}</h2></a> 
                    </div>
                    <div class="activity-title">
                        ${activity['Name']}
                    </div>
                    <div class="activity-description">
                        ${activity['Address']}
                    </div>
                    <div class="activity-topics">
                        ${activity['City']}
                    </div>
                    <div class="activity-topics">
                        ${activity['Region']}
                    </div>
                    <div class="activity-topics">
                        ${activity['Postal']}
                    </div>
                    <div class="activity-topics">
                        ${activity['Phone']}
                    </div>
                </div>`;
        document.getElementById('activities-list').appendChild(el);
        };

        const fetchActivities = async () => {
            let activities = await fetch('BACKEND/api/v1/activity.php?getAll').then(r=>r.json());
            console.log(activities);
                activities.forEach(activity=>{
                genActivity(activity);
            return activities;
            });
        }

        const fetchSortedActivities = async () => {
            let activities = await fetch('BACKEND/api/v1/activity.php?getAll').then(r=>r.json());
            console.log(activities);

            results = activities.sort(dynamicSort("Name"));
                console.log("Sorted results: " + results);
                results.forEach(activity=>{
                genActivity(activity);
            return results;
            });
        }
        
        function dynamicSort(property) {
            var sortOrder = 1;

            if(property[0] === "-") {
                sortOrder = -1;
                property = property.substr(1);
            }

            return function (a,b) {
                if(sortOrder == -1){
                    return b[property].localeCompare(a[property]);
                } else {
                    return a[property].localeCompare(b[property]);
                }        
            }
        }
    </script>

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

if( isset($_GET['page'])){
  $_SESSION['Page'] = $_GET['page'];
      if ($_GET['page'] == 'attractions') {   // ATTRACTIONS tab
          outputAttractions();
      } // end if
      else if ($_GET['page'] == 'activities') {   // ACTIVITIES tab
          echo "<div id='activities'><script>fetchActivities()</script></div>";
          ?>
          <div class="category-head" id="activities-list"></div>
          <?php
      } // end else if
} // end if isset

if ($_SESSION['Page'] == 'attractions'){
    outputAttractions();
} else if ($_SESSION['Page'] == 'activities'){
   if (isset($_GET['filter'])) {
        echo "<div id='activities'><script>fetchSortedActivities()</script></div>";
    } else {
        echo "<div id='activities'><script>fetchActivities()</script></div>";
    }

    ?>
    <div class="category-head" id="activities-list"></div>
    <?php
} else {
    unset($_SESSION['page']);
} 

//else if (isset($_GET['filter'])) {
   // echo "<div id='activities'><script>fetchSortedActivities()</script></div>";
    ?>
    <div class="category-head" id="activities-list"></div>
    <?php
//} 




// There are no vulnerabilities for a URL attack because of my code structure. I'm not pulling up the database by using $_GET, I'm manually pulling it up instead of using $_GET.
?>


  </ul>
</nav>

</body>

</html>
