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

            const genActivity = ({attractionID, website, name, address, city, postal, region, phone, description, filePath}) => {
                const el = document.createElement('div');
                el.innerHTML = `<div class="activity" data-activityID=${cleanNull(attractionID)}>
                    <div class="activity-icon">
                        <i class="fas fa-info"></i>
                    </div>
                    <div class="activity-title">
                        <a href='${cleanNull(website)}' target='_blank'><h2>${cleanNull(name)}</h2></a>
                    </div>
                    <div class="activity-title">
                        <img src='./${cleanNull(filePath)}' class='img-rounded' width='500px' height='600px'/><br>
                    </div>
                    <div class="activity-title">
                        ${cleanNull(name)}
                    </div>
                    <div class="activity-description">
                        ${cleanNull(address)}
                    </div>
                    <div class="activity-topics">
                        ${cleanNull(city)}, ${cleanNull(region)} ${cleanNull(postal)}
                    </div>
                    <div class="activity-topics">
                        ${cleanNull(phone)}
                    </div>
                    <div class="activity-topics">
                        ${cleanNull(description)}
                    </div>
                    <div>
                        <a href="http://localhost/AdvWebProgFinal-master/BACKEND/api/v1/activity.php?delete&ID=${cleanNull(attractionID)}">Delete</a>
                    </div>
                </div>`;
                document.getElementById('activities-list').appendChild(el);
            };
            const fetchActivities = async () => {
                let service = await fetch('../BACKEND/api/v1/activity.php?getAll').then(r=>r.json());
                let otherService = await fetch('http://localhost/AdvWebFinal/webservice.php?infoType=activity').then(r=>r.json());
                var activities = service.concat(otherService);
                console.log(activities);
                for(let i=0; i<activities.length; i+=1) {
                    genActivity(activities[i]);
                }
            };

            const fetchSortedActivities = async (sortt) => {
                let service = await fetch('../BACKEND/api/v1/activity.php?getAll').then(r=>r.json());
                let otherService = await fetch('http://localhost/AdvWebFinal/webservice.php?infoType=activity').then(r=>r.json());
                var activities = service.concat(otherService);
                console.log(activities);
                console.log("Sortt: " + sortt);
                results = activities.sort(dynamicSort(sortt));
                console.log("Sorted results: " + results);
                for(let i=0; i<results.length; i+=1) {
                    genActivity(results[i]);
                }
            };

            // const fetchFromOtherWebService = async () => {
            //     let otherService = await fetch('http://localhost/AdvWebFinal/webservice.php?infoType=activity').then(r=>r.json());
            //    // console.log(images);
            //     console.log("Other Service: " + otherService);
            //     for(let i=0; i<activities.length; i+=1) {
            //         genActivity(activities[i]);
            //     }
            // };

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

        if( isset($_GET['page'])){
            if ($_GET['page'] == 'attractions') {   // ATTRACTIONS tab
                echo "<div id='activities'><script>fetchActivities();</script></div>";
            } 
        } // end if isset

        if (isset($_GET['filter']) && $_GET['filter'] == 'name') {
            echo "<div id='activities'><script>fetchSortedActivities('name');</script></div>";   
        } else if (isset($_GET['filter']) && $_GET['filter'] == 'address') {
            echo "<div id='activities'><script>fetchSortedActivities('address');</script></div>";
        } else if (isset($_GET['filter']) && $_GET['filter'] == 'city') {
            echo "<div id='activities'><script>fetchSortedActivities('city');</script></div>";
        } else if (isset($_GET['filter']) && $_GET['filter'] == 'region') {
            echo "<div id='activities'><script>fetchSortedActivities('state');</script></div>";
        } else if (isset($_GET['filter']) && $_GET['filter'] == 'postal') {
            echo "<div id='activities'><script>fetchSortedActivities('postal');</script></div>";
        }

        ?>
        <div class="category-head" id="activities-list"></div>
    </ul>
</nav>

</body>

</html>
