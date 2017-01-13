<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1"> 

    <title>LMS, NIT Raipur</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">	
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="myStyle.css" rel="stylesheet">	
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap-social.css" rel="stylesheet">

        <script type="text/javascript">
        
            function check()
            {
                if(document.myform.rem.checked)
                {
                   document.getElementById("myform").action = "login.php?rem=1";
                   document.getElementById("myform").submit();
                }
                else
                {
                   document.getElementById("myform").action = "login.php";
                   document.getElementById("myform").submit();
                }
            }
        
        </script>
</head>

<body>
<?php

    if(isset($_COOKIE['Username']) && isset($_COOKIE['Password']))
    {
        header('Location: login.php');
    }
    else
    {
?>
<nav class="navbar navbar-fixed-top" role="navigation">

        <div class="container">
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"
                         aria-hidden="true"></span>&nbsp; Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="registration.html" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Register</a>
                    </li>
                </ul>
            </div>
        </div>  
        
</nav>  

<header class="jumbotron">

        <div class="container">
            <div class="row row-header">
                <div class="col-xs-12 col-sm-12">
                    <h1><center>Leave Management System</center></h1>
                </div>
                <div class="col-sm-12" >
                    <h2><center>NIT, Raipur</center></h2>
                </div>
                </div>
        </div>        
        
</header>

<div class="row">
</div>

<div class="container">

    <form class=" col-xs-12 col-sm-push-4 col-sm-4 form-horizontal" role="form" method="post" name="myform" id="myform">
        <h3><center><span class="glyphicon glyphicon-log-in"></span>&nbsp; LOGIN</center></h3>
        </br>
        <div class="form-group">
        <div class="col-sm-3">
               <label for="username" class="control-label">Username:</label>
        </div>
            <div class=" col-sm-8">
                <input type="text" class="form-control" id="username" name="uname" placeholder="Enter Username" required>
            </div>
        </div>
        <div class="form-group">
        <div class="col-sm-3">
               <label for="password" class="control-label">Password:</label>
        </div>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="password" name="upass" placeholder="Enter Password" required>
            </div>
        </div>
        </br>
        <div class="form-group">
            <div class="col-xs-4 col-xs-push-5 col-sm-3 col-sm-push-5" >
                <input type="button" value="LOGIN" onClick="check()">
            </div>
        </div>
        <br/>
        <div class="form-group">  
            <div class="col-sm-1">
                <input type="checkbox" name="rem" onchange="alert('Clicking on Remember Me will make the browser remember your login details....')">   
            </div>
            <div class="col-sm-6">
                Remember Me
            </div>
                <div class="col-sm-5"><a href="fp.php">Forgot Password ?</a></div>
            </div>  
        </div>        
    </form>
    
<div class="row row-content">
</div>
</div>

<footer class="row-footer">
        <div class="container">
            <div class="row">             
                    <h5><center>Our Address</center></h5>
                    <address align=center>
		              National Institute of Technology, Raipur<br>
		              G.E. Road, Raipur,<br>
		              Chhattisgarh, India.<br>
		              <i class="fa fa-phone"></i>: <br>
		              <i class="fa fa-envelope"></i>: <a href="http://www.nitrr.ac.in">www.nitrr.ac.in</a><br/>
		           </address>
                <div class="col-xs-12">
                    <p style="padding:10px;"></p>
                    <p align=center>Last Updated on : </p>
                </div>
                <br/>
                <div class="col-xs-12">
                    <p style="padding:10px;"></p>
                    <p align=center>© Copyright NIT, Raipur</p>
                </div>
            </div>
        </div>
    </footer>

<script	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/
jquery.min.js"></script>	
<script	src="js/bootstrap.min.js"></script>	

</body>
</html>
<?php
    }
?>