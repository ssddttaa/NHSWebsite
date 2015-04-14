<?php
require_once('CheckTokenValidity.php');
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

date_default_timezone_set('America/New_York');
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
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>
<body style="max-width:100%;overflow-x:hidden;"> 
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=1628939997340252";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <script src="jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="bootstrap-datepicker.js"></script>
    <script type = "text/javascript">
        function grayOutFacebook(loginURL)
        {
            var parsedLogin = loginURL.replace('&amp;','&');
            $('#facebookGlyph').attr({
                "data-placement"  :   "bottom",
                "data-original-title" :"Please Log In",
                "data-trigger"    :   "hover",
                "data-html"     : "true",
            });
            $('#loginLink').attr(
            {
               "href"   : loginURL
            });
            $('#facebook').attr("disabled","disabled");
            $('#facebookGlyph').css("max-width","200px");
            $('#facebookGlyph').popover({
                html : true, 
                content: function() { return $('#FacebookLogin').html();},
                trigger: 'manual',
                container: $(this).attr('id'),
                placement: 'top',
            }).on("mouseenter", function () {
                var _this = this;
                $(this).popover("show");
                $(this).siblings(".popover").on("mouseleave", function () {
                    $(_this).popover('hide');
                });
            }).on("mouseleave", function () {
                var _this = this;
                setTimeout(function () {
                    if (!$(".popover:hover").length) {
                        $(_this).popover("hide")
                    }
                }, 100);
            });
        }
    </script>
    <?php
    if (!isset($_COOKIE[$correctUser])) {
        echo "ACCESS DENIED";
    } 
    else {
        if ($_COOKIE[$correctUser] === $correctPass) {
            if (!CheckTokenValidity::isTokenActive($pass)) {
                $app_ID = '1628939997340252';
                $app_secret = '3c202c339b6e4c59b308ae62fcc86f5e';
                \Facebook\FacebookSession::setDefaultApplication($app_ID, $app_secret);
                $helper = new \Facebook\FacebookRedirectLoginHelper('http://localhost/NHSWebsite/RenewToken.php');
                $loginURL = $helper->getLoginUrl();
                echo "<div style = 'display:none' id = 'loginURL' name = 'loginURL'>'${loginURL}'</div>";
                echo "<script>$( document ).ready(function(){grayOutFacebook('${loginURL}');});</script>";
                $_SESSION['pass'] = $pass;
                
            }
            ?>
    <div class="navbar navbar-inverse" style="background-color: rgba(0, 0, 0, 0.51);">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar-content">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="font-size:22px; color:white;">STEM NHS</a>
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
    <?php
        $dateTimeToday = 60*date("H")+date("i");
    ?>
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
    <div class="panel panel-default">
        <div class="panel-heading">
            CREATE AN UPDATE
        </div>
        <div class="panel-body">
            <form class="form">
                <div class="form-group">
                    <textarea class="form-control" id="updateField" placeholder="Post to Schoology, Facebook, and Twitter"></textarea>
                </div>
                <div class="form-group">
                    <div class="col-xs-2">
                        <div id = "FacebookLogin" style = "display:none;">
                            <a id = "loginLink"><img src="img/LoginDefault.png" alt = "Login here" id = "LoginButton" onMouseOver="this.src = 'img/LoginHover.png'" onMouseOut="this.src = 'img/LoginDefault.png'" style = "cursor:hand; cursor:pointer;"></a>
                        </div>
                        <input type ="checkbox" name = "facebook" id = "facebook" data-content = "testing" data-toggle="hover" data-placement = "bottom" data-original-title = "testing testing">
                        <i class="fa fa-facebook-square fa-2x" id = "facebookGlyph"></i>
                    </div>
                    <div class="col-xs-2">
                        <input type ="checkbox" name = "twitter" id = "twitter">
                        <i class="fa fa-twitter-square fa-2x"></i>
                    </div>
                </div>
                </form>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-primary">Submit</button> 
            </div>
    </div>
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

    <h4>Updates</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
  </div>
</div>
<div class="col-xs-3">
    <h4>Events</h4>
    <?php
        $sql = "SELECT date FROM Events";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $counter = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $dateToday = date('m/d/Y', time());
                if (strtotime($dateToday) <= strtotime($row["date"])) {
                    $dateArray[$counter] = $row["date"];
                    $counter++;
                } 
            }
            sort($dateArray);
            $length = count($dateArray);
            for ($i = 0; $i < $length; $i++) {
                $sql = "SELECT name, description, date, time FROM Events WHERE date='$dateArray[$i]'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<ul style='padding-left:0px;'><a>".$row["name"]. "</a> " . $row["date"]."<li style='display:none; list-style-type: none;'>". $row["description"]."</li></ul>";
                }
            }
        } 
        else {
            echo "There are no upcoming events";
        }
    ?>
    <script>
        $("ul").click(function() {
                $(this).children().slideDown("fast");
        });
    </script>
</div>

</body>
</html>
<?php
    }
    else {
        echo "ACCESS DENIED";
        //header("Location:index.php");
        die();
    }
}
?>