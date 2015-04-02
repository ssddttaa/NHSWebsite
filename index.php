<!DOCTYPE html>
<html lang="en" style="max-width:100%;overflow-x:hidden;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, 
    ➥initial-scale=1">
    <title>STEM NHS</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    
</head>
<body style="max-width:100%;overflow-x:hidden;">
    <script>xam
        window.fbAsyncInit = function() {
          FB.init({
            appId      : '1628939997340252',
            xfbml      : true,
            version    : 'v2.3'
          });
        };

        (function(d, s, id){
           var js, fjs = d.getElementsByTagName(s)[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement(s); js.id = id;
           js.src = "//connect.facebook.net/en_US/sdk.js";
           fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
    </script>
    <script src="jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
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
                    <li class="dropdown" id="menuLogin">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login</a>
                        <div class="dropdown-menu" style="padding:17px;">
                            <form class="form" id="formLogin"> 
                                <div class="form-group">
                                    <input type="text" class="form-control" id="username" placeholder="Username"/>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" placeholder="Password"/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Login</button> 
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="jumbotron" style="background: url('bg.jpg'); margin-top:-80px; padding-top:165px; padding-bottom:135px;">
            <!--<div class="row" style="padding-left:15px; margin-top:-105px; background-color:yellow; padding-bottom: 0px; height:25px; line-height:25px;">
                <div class="col-md-12">
                    <p style="font-size:14px; color:red;">URGENT:</p>
                </div>
            </div>-->
    <!--<div class="panel panel-default">
            <div class="panel-heading">
                ATTENTION STUDENTS
            </div>
            <div class="panel-body">
                The National Honor Society meeting scheduled for (Time/Date) regarding (SubjectOfMeeting) is currently taking place. Would you like to sign in for attendance?
            </div>
            <div class="panel-footer">
                <a href="#" class="btn btn-danger btn-sm">Agree</a> 
            </div>
        </div>-->
        <h1 style="color:white; text-align:center;">National Honor Society</h1>
        <h1 style="color:#DFDFDF; text-align:center; font-size:30px;">Downingtown STEM Academy</h1>
        <!--<button type="submit" class="btn btn-primary">Learn More</button>-->
    </div>
</div>
<div class="container">


    <div class="row">
        <div class="col-md-9">
            <h4>Updates</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        </div>
        <div class="col-md-3">
            <h4>Events</h4>
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
    </div>
</body>
</html>