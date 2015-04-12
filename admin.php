<?php
$servername = "sql3.freemysqlhosting.net";
$username = "sql373806";
$password = "tP4*vK2*";
$dbname = "sql373806";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user="NHSExecutives";
$pass="nhsislife15";
$correctUser=md5($user);
$correctPass=md5($pass);
if(!isset($_COOKIE[$correctUser])) {
    echo "ACCESS DENIED";
}
else {
    if ($_COOKIE[$correctUser]===$correctPass) {
?>

<!DOCTYPE html>
<html lang="en" style="max-width:100%;overflow-x:hidden;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, 
    ➥initial-scale=1">
    <title>STEM NHS</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="datepicker.css">

</head>
<body style="max-width:100%;overflow-x:hidden;">   
    <script src="jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="bootstrap-datepicker.js"></script>
    <div class="navbar navbar-inverse" style="background-color: rgba(0, 0, 0, 0.51);">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar-content">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="font-size:22px; color:white;">stem nhs</a>
            </div>
            <div class="collapse navbar-collapse" id="mynavbar-content">
                <ul class="nav navbar-nav navbar-right">
                    <li id="menuManageEvents">
                      <a href="#" id="navManageEvents">Manage Events</a>
                  </li>
                  <li id="menuLogout">
                      <a href="logout.php" id="navLogout">Logout</a>
                  </li>
              </ul>
          </div>
      </div>
  </div>
  <div class="jumbotron" style="background: url('bg.jpg'); margin-top:-80px; padding-top:60px; padding-bottom:0px; max-height:50px"></div>
  <div class="col-xs-6 col-xs-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            ATTENTION
        </div>
        <div class="panel-body">
            The National Honor Society meeting scheduled for (Time/Date) regarding (SubjectOfMeeting) is currently taking place. Would you like to sign in for attendance?
        </div>
        <div class="panel-footer">
            <a href="#" class="btn btn-danger btn-sm">Agree</a> 
        </div>
    </div>
</div>
<div class="col-xs-3">
    <h4>Events</h4>
    <?php
        $sql = "SELECT name, description, date, time FROM Events";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<ul><a>".$row["name"]. "</a> " . $row["date"]."<li style='display: none'>". $row["description"]."</li></ul>";
            }
        } else {
            echo "There are no upcoming events";
        }
    ?>
    <script>
    $("ul").click(function() {
      $(this).children().slideDown("fast");
    });
    </script>
</div>
<div class="col-xs-6 col-xs-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            CREATE AN UPDATE
        </div>
        <div class="panel-body">
            <form class="form">
                <div class="form-group">
                    <textarea class="form-control" id="updateField" placeholder="Post to Schoology, Facebook, and Twitter"></textarea>
                </div>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-primary">Submit</button> 
            </form>
        </div>
    </div>
</div>

<div class="col-xs-6 col-xs-offset-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            CREATE A MEETING
        </div>
        <div class="panel-body">
            <form class="form" method="post" action="createEvent.php">
                <div class="form-group">
                    <label for="nameField">Name/Subject</label>
                    <input type="text" maxlength="75" name="name" class="form-control" id="nameField" placeholder="What will be the name of the meeting or event?" />
                </div>
                <div class="form-group">
                    <label for="descField">Description of Event</label>
                    <textarea class="form-control" maxlength="250" name="description" id="descField" placeholder="What will be discussed in this meeting or event?"></textarea>
                </div>
                <label for="dateField">Date</label>
                <input type="text" class="form-control datepicker" name="date" id="dateField" placeholder="When will this meeting be held?">
                <script>
                $('.datepicker').datepicker();
                </script>
                <br>
                <div class="form-group">
                    <label for="timeField">When will this meeting be held?</label>
                    <select class="form-control" id="timeField" name="time">
                        <option value="beforeSchool">Before School</option>
                        <option value="910LunchA">9/10 Lunch on a 1-7 Day</option>
                        <option value="910LunchB">9/10 Lunch on a Block Day</option>
                        <option value="1112LunchA">11/12 Lunch on a 1-7 Day</option>
                        <option value="1112LunchB">11/12 Lunch on a Block Day</option>
                        <option value="advisory">Advisory</option>
                        <option value="seminar">Seminar</option>
                        <option value="afterSchool">After School</option>
                    </select>
                </div>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-primary">Submit</button> 
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-6 col-xs-offset-3">
        <h4>Updates</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
    </div>
</div>
</body>
</html>
<?php
    }
    else {
        echo "ACCESS DENIED";
    }
}
?>