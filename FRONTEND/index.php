<?php
// require_once ('Activity.php');
// require_once ('ActivityDao.php');
// require_once ('ActivityDaoMaria.php');

?>
<!DOCTYPE html>

<html lang="en">

<head>

    <title> Final Project</title>

    <!-- Link your CSS and Bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="midterm.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
</head>

<body>

<p>

// activity.php?create&Name=Test&Address=Test&City=Test&Region=Test&Postal=Test&Phone=Test&Website=Test&Description=Test
// activity.php?update&Name=Test&Address=Test&City=Test&Region=Test&Postal=Test&Phone=Test&Website=Test&Description=Test&ID=1

</p>

<a href="index.php"><h1 class="bigheader">WELCOME TO CONCORD</h1></a>

<div class="imgContainer">
    <img class="img" src="ConcordLogo2.0.png" />
</div>

<!-- Header -->
<nav>
    <ul>
        <a href="https://www.britannica.com/place/Concord-New-Hampshire" target="_blank"><li>HISTORY</li></a>

        <a href="?page=attractions"><li>ATTRACTIONS</li></a>
        <li class="filter"><form action="index.php" method="GET">
                <select name="filter">
                    <option value="name">Name</option>
                    <option value="address">Address</option>
                    <option value="city">City</option>
                    <option value="region">Region</option>
                    <option value="postal">Postal</option>
                </select>
                <input type="submit">
            </form></li>


        <script>
            var sortt = "";
            var results = [];

            const cleanNull = (input) => input == null ? '' : input;

            const genActivity = (activity) => {
                const {AttractionID, Website, Name, Address, City, Postal, Region, Phone, Description, FilePath} = activity;
                const {city, description, id, name, postal, state, street} = activity;

                const el = document.createElement('div');
                el.innerHTML = `<div class="activity" data-activityID=${cleanNull(AttractionID || id)}>
                    <div class="activity-icon">
                        <i class="fas fa-info"></i>
                    </div>
                    <div class="activity-title">
                        <a href='${cleanNull(Website)}' target='_blank'><h2>${cleanNull(Name || name)}</h2></a>
                    </div>
                    <div class="activity-title">
                        <img src='./${cleanNull(FilePath)}' class='img-rounded' width='500px' height='600px'/><br>
                    </div>
                    <div class="activity-title">
                        ${cleanNull(Name || name)}
                    </div>
                    <div class="activity-description">
                        ${cleanNull(Address || street)}
                    </div>
                    <div class="activity-topics">
                        ${cleanNull(City || city)}, ${cleanNull(Region || state)} ${cleanNull(Postal || postal)}
                    </div>
                    <div class="activity-topics">
                        ${cleanNull(Phone)}
                    </div>
                    <div class="activity-topics">
                        ${cleanNull(Description || description)}
                    </div>
                    <a href="../BACKEND/api/v1/activity.php?delete&ID=${cleanNull(AttractionID)}">Delete</a>
                </div>`;
                document.getElementById('activities-list').appendChild(el);
            };
            const fetchActivities = async () => {
                let activities = await fetch('../BACKEND/api/v1/activity.php?getAll').then(r=>r.json());
                console.log(activities);
                for(let i=0; i<activities.length; i+=1) {
                    genActivity(activities[i]);
                }
                console.log('round2');
                //round2
                let otherWeb = await fetch('http://64.72.1.175/AdvWebFinal/webservice.php?infoType=activity').then(r=>r.json());
                console.log(otherWeb);
               // console.log(images);
                console.log(otherWeb);
                for(let i=0; i<otherWeb.length; i+=1) {
                    genActivity(otherWeb[i]);
                }
            };

            const fetchSortedActivities = async (sortt) => {
                let activities = await fetch('../BACKEND/api/v1/activity.php?getAll').then(r=>r.json());
                console.log(activities);
                console.log("Sortt: " + sortt);
                results = activities.sort(dynamicSort(sortt));
                console.log("Sorted results: " + results);
                for(let i=0; i<results.length; i+=1) {
                    genActivity(results[i]);
                }
            };

            function dynamicSort(property) {
                console.log("Property: " + property)
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
        //session_start();

        if( isset($_GET['page'])){
            //$_SESSION['Page'] = $_GET['page'];
            if ($_GET['page'] == 'attractions') {   // ATTRACTIONS tab
                echo "<div id='activities'><script>fetchActivities();</script></div>";
            } 
        } // end if isset

        if (isset($_GET['filter']) && $_GET['filter'] == 'name') {
            echo "<div id='activities'><script>fetchSortedActivities('Name');</script></div>";   
        } else if (isset($_GET['filter']) && $_GET['filter'] == 'address') {
            echo "<div id='activities'><script>fetchSortedActivities('Address');</script></div>";
        } else if (isset($_GET['filter']) && $_GET['filter'] == 'city') {
            echo "<div id='activities'><script>fetchSortedActivities('City');</script></div>";
        } else if (isset($_GET['filter']) && $_GET['filter'] == 'region') {
            echo "<div id='activities'><script>fetchSortedActivities('Region');</script></div>";
        } else if (isset($_GET['filter']) && $_GET['filter'] == 'postal') {
            echo "<div id='activities'><script>fetchSortedActivities('Postal');</script></div>";
        }

        ?>
        <div class="category-head" id="activities-list"></div>
    </ul>
</nav>

</body>

</html>
