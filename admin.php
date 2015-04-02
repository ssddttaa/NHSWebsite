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
                      <a href="#" data-toggle="dropdown" id="navManageEvents">Manage Events</a>
                  </li>
                  <li id="menuLogout">
                      <a href="#" data-toggle="dropdown" id="navLogout">Logout</a>
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
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
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
            <form class="form">
                <div class="form-group">
                    <label for="nameField">Name/Subject</label>
                    <input type="text" class="form-control" id="nameField" placeholder="What will be the name of the meeting or event?" />
                </div>
                <div class="form-group">
                    <label for="descField">Description of Event</label>
                    <textarea class="form-control" id="descField" placeholder="What will be discussed in this meeting or event?"></textarea>
                </div>
                <label for="dateField">Date</label>
                <input type="text" class="form-control datepicker" id="dateField" placeholder="When will this meeting be held?">
                <script>
                $('.datepicker').datepicker();
                </script>
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

<!--<form class="form">
<div class="form-group">
<label for="nameField">Name</label>
<input type="text" class="form-control" id="nameField" placeholder="Your Name" />
</div>

<div class="form-group">
<label for="emailField">Email</label>
<input type="email" class="form-control" id="emailField" placeholder="Your Email" />
</div>

<div class="form-group">
<label for="phoneField">Phone</label>
<input type="text" class="form-control" id="phoneField" placeholder="Your Phone Number" />
</div>

<div class="form-group">
<label for="descField">Description</label>
<textarea class="form-control" id="descField" placeholder="Your Comments"></textarea>
</div>

<button type="submit" class="btn btn-primary">Submit</button> 
<button type="reset" class="btn btn-default">Reset</button>
</form>-->
</body>
</html>