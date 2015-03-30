<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, 
    ➥initial-scale=1">
    <title>STEM NHS</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    
</head>
<body>   
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <div class="container">
        <div class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar-content">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Downingtown STEM National Honor Society</a>
                </div>
                <div class="collapse navbar-collapse" id="mynavbar-content">
                    <ul class="nav navbar-nav">
                        <div class="dropdown">
                        <li><a data-toggle="dropdown" data-target="#" href="#">Login</a></li>
                        <ul class="dropdown-menu">
                            <li><a href="#">Board of Members</a></li>
                        </ul>
                    </div>
                    </ul>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                ATTENTION STUDENTS
            </div>
            <div class="panel-body">
                The National Honor Society meeting scheduled for (Time/Date) regarding (SubjectOfMeeting) is currently taking place. Would you like to sign in for attendance?
            </div>
            <div class="panel-footer">
                <a href="#" class="btn btn-danger btn-sm">Agree</a> 
            </div>
        </div>
        <form class="form">
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
        </form>
    </div>
</body>
</html>