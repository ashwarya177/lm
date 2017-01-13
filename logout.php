<?php

session_start();
session_destroy();

?>
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
</head>

<body>
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

    <div class="container">
        
        <div class="row row-content">
            <p><center><span style="font-size: 30px">You have successfully logged out !!!</span></center></p>
        </div>
        
        <div class="row row-content">
            <p><center><a href="index.php" style="border-bottom: 1px solid blue;">Click here</a> to go to HomePage</center></p>
        </div>
        
    </div>
    
</body>
</html>