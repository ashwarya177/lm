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
<?php

session_start();

if(!isset($_SESSION['uname']) && !isset($_SESSION['upass']))
    header('Location: error.html');

else
{
    include 'config.php';
    
$un = $_SESSION['uname'];
$up = $_SESSION['upass'];

if(isset($_SESSION['lastt']) && isset($_SESSION['lastd']))
{
$lastt = $_SESSION['lastt'];
$lastd = $_SESSION['lastd'];
}
else
{
    $lastt = "";
    $lastd = "";
}

$sql = mysqli_query($con, "SELECT * from users Where uname='$un' and pass='$up'");
$r = mysqli_fetch_assoc($sql);

$_SESSION['branch'] = $r['branch'];
$name = $_SESSION['name'];

$desig = $r['desig'];
$branch = $r['branch'];
$m = $r["medical"];
$rest = $r["restricted"];
$c = $r["casual"];
$s = $r["study"];
$el = $r["earned"];

$q1 = $q2 = $q3 = $q4 = $q5 = 0;
if($m == 0)
{
    $p = "You cannot apply for this leave.";
    $q1 = -1;   
}
if($rest == 0)
{
     $p = "You cannot apply for this leave.";
     $q2 = -1;
}
if($c == 0)
{
     $p = "You cannot apply for this leave.";
     $q3 = -1;  
}
if($s == 0 )
{
     $p = "You cannot apply for this leave.";
     $q4 = -1;
}
if($el == 0)
{
     $p = "You cannot apply for this leave.";
     $q5 = -1;
}


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
                    <li class="active"><a href="useradmin.php"><span class="glyphicon glyphicon-home"
                         aria-hidden="true"></span>&nbsp; Dashboard</a></li>
                    <li><a href="alstatus.php"><span class="glyphicon glyphicon-bookmark"
                         aria-hidden="true"></span>&nbsp; Applied Leaves Status</a></li> 
                    <li><?php echo "<a href=leaverequest.php?ba=1><span class='glyphicon glyphicon-envelope'
                         aria-hidden='true'></span>&nbsp; Leave Requests</a>"; ?></li>   
                    <li><?php echo "<a href=leaverequest.php?ba=2><span class='glyphicon glyphicon-envelope'
                         aria-hidden='true'></span>&nbsp; Casual Leave Requests</a>"; ?></li> 
                    <li><a href="viewall.php"><span class="glyphicon glyphicon-home"
                         aria-hidden="true"></span>&nbsp; View all Leave Applications</a></li>
<li><a href="logout.php"><span class="glyphicon glyphicon-bookmark"
                         aria-hidden="true"></span>&nbsp; Logout</a></li>                            
                </ul>
                <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                         role="button" aria-haspopup="true" aria-expanded="false">
                         <span class="glyphicon glyphicon-user"
                         aria-hidden="true"></span>&nbsp; <?php echo $name; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="editprofile.php">Edit Profile</a></li>
                            <li><a href="changepass.php">Change Password</a></li>
                            <li><a href="cpassrec.php">Change Password Recovery Options</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>  
        
</nav>  

    <div class="row" style="margin:40px 0px 0px 0px; padding:70px 0px 0px 0px;">
       <div class="col-xs-12 col-sm-8">
            <h1 align="center">Welcome <?php echo $name; ?> !!</h1>
        </div>
        <div class="col-xs-12 col-sm-4">
            <img src="img/logo.png" class="img-responsive img-circle" align=right>  
        </div>
    </div>
    
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-10">
                <h2><span style="border-bottom: 1px dashed black;">Your Leaves</span></h2></br>
                <ul class="nav nav-tabs" role="navigation">
                    <li role="presentation" class="active">
                    <a href="#medical" aria-controls="medical"
                     role="tab" data-toggle="tab">Medical Leaves</a></li>
                    <li role="presentation"><a href="#rh"
                     aria-controls="rh" role="tab"
                     data-toggle="tab">Restricted Holidays</a></li>
                    <li role="presentation"><a href="#casual"
                     aria-controls="casual" role="tab"
                     data-toggle="tab">Casual Leaves</a></li>
                    <li role="presentation"><a href="#study"
                     aria-controls="study" role="tab"
                     data-toggle="tab">Study Leaves</a></li>
                    <li role="presentation"><a href="#earned"
                     aria-controls="earned" role="tab"
                     data-toggle="tab">Earned Leaves</a></li>
                </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="medical">
                <h3><span style="border-bottom: 1px solid black;">Medical Leaves</span><small>&nbsp; &nbsp; ( Maximum - 10 )</small></h3></br>
                <p>Number of Medical Leaves remaining for you are <?php echo $m; if($q1 == -1) { echo ". $p";}?></p>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="rh">
                <h3><span style="border-bottom: 1px solid black;">Restricted Holidays</span><small>&nbsp; &nbsp; ( Maximum - 3 )</small></h3></br>
                <p>Number of Restricted Holidays remaining for you are <?php echo $rest; if($q2 == -1) { echo ". $p";}?></p>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="casual">                
                <h3><span style="border-bottom: 1px solid black;">Casual Leaves</span><small>&nbsp; &nbsp; ( Maximum - 8 )</small></h3></br>
                <p>Number of Casual Leaves remaining for you are <?php echo $c; if($q3 == -1) { echo ". $p";}?></p>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="study">
                <h3><span style="border-bottom: 1px solid black;">Study Leaves</span><small>&nbsp; &nbsp; ( Maximum - 15 )</small></h3></br>
                <p>Number of Study leaves remaining for you are <?php echo $s; if($q4 == -1) { echo ". $p";}?></p>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="earned">
                <h3><span style="border-bottom: 1px solid black;">Earned Leaves</span><small>&nbsp; &nbsp; ( Maximum - 300 )</small></h3></br>
                <p>Number of Earned leaves remaining for you are <?php echo $el; if($q5 == -1) { echo ". $p";}?></p>
                </div>
            </div>
         </div>   
       </div>
<?php
if( !isset($_POST['branch']) && !isset($_POST['desig']) && !isset($_POST['type']) )
{
?>          <section id="apply">    
        <div class="col-xs-12 col-sm-push-4 col-sm-6">
    <form class="form-horizontal" role="form" method="post" action="userprofile.php">
        <h3><strong><center>Apply for Leave</center></strong></h3>
        </br>
        <div class="form-group">
            <div class="col-xs-4 col-sm-3">
               <label for="name" class="control-label">Name:</label>
            </div>
            <div class="col-xs-8">
                <input type="text" class="form-control" id="name" name="name" value="<?php  echo $name; ?>">
            </div>
        </div>
        <div class="form-group">
        <div class="col-xs-4 col-sm-3">
               <label for="num" class="control-label">Mobile No:</label>
        </div>
            <div class="col-xs-8">
                <input type="text" class="form-control" id="num" name="num" value="<?php  echo $r['phno']; ?>">
            </div>
        </div>
        <div class="form-group">
        <div class="radio">
        
               <label class="col-xs-2 col-sm-2 control-label"><strong>Designation:</strong></label>
        
            <div class="col-xs-push-2 col-xs-8">
<input type="radio" name="desig" id="optionsRadios1" value="1" <?php if($desig == 1){ ?> checked <?php } ?>>
                 Director
            </div>
            <div class="col-xs-push-4 col-sm-push-2 col-xs-8">
                 <input type="radio" name="desig" id="optionsRadios2" value="2" <?php if($desig == 2){ ?> checked <?php } ?>>
                 Registrar
            </div>
            <div class="col-xs-push-4 col-xs-8">
                 <input type="radio" name="desig" id="optionsRadios3" value="3" <?php if($desig == 3){ ?> checked <?php } ?>>
                 Head Of Department
            </div>
            <div class="col-xs-push-4 col-xs-8">
                 <input type="radio" name="desig" id="optionsRadios4" value="4" <?php if($desig == 4){ ?> checked <?php } ?>>
                 Faculty Member
            </div>
            <div class="col-xs-push-4 col-xs-8">
                 <input type="radio" name="desig" id="optionsRadios5" value="5" <?php if($desig == 5){ ?> checked <?php } ?>>
                 Administrative Staff
            </div>
            </div>
        </div>
        <div class="form-group">
                        <div class="radio">
                            <label class="col-xs-2 col-sm-2 control-label"><strong>Branch:</strong></label>
  
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-2">
                                    <input type="radio" name="branch" id="optionsRadios1" value="1" <?php if($branch == 1){ ?> checked <?php } ?>>
                                    BioMedical Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-2">
                                    <input type="radio" name="branch" id="optionsRadios2" value="2"  <?php if($branch == 2){ ?> checked <?php } ?>>
                                    Biotechnology
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios3" value="3"  <?php if($branch == 3){ ?> checked <?php } ?>>
                                    Chemical Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios4" value="4"  <?php if($branch == 4){ ?> checked <?php } ?>>
                                    Civil Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios5" value="5"  <?php if($branch == 5){ ?> checked <?php } ?>>
                                    Computer Science and Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios6" value="6"  <?php if($branch == 6){ ?> checked <?php } ?>>
                                    Electrical Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios7" value="7"  <?php if($branch == 7){ ?> checked <?php } ?>>
                                    Electronics And Telecommunication Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios8" value="8"  <?php if($branch == 8){ ?> checked <?php } ?>>
                                    Information Technology 
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios9" value="9" <?php if($branch == 9){ ?> checked <?php } ?>>
                                    Mechanical Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios10" value="10"  <?php if($branch == 10){ ?> checked <?php } ?>>
                                    Mining Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios11" value="11"  <?php if($branch == 11){ ?> checked <?php } ?>>
                                    Metallurgical Engineering
                                </div>
                    </div>
        </div>
        </br>
        <div class="form-group">
        <div class="radio">
        
               <label class="col-xs-2 col-sm-2 control-label"><strong>Type of leave:</strong></label>
<?php
if($q1 != -1)
{
?>        
            <div class="col-xs-push-2 col-xs-8">
                 <input type="radio" name="type" id="optionsRadios1" value="1" checked>
                 Medical
            </div>
<?php
}
else
{
?>
<br/>
<?php
}
if($q2 != -1)
{
?>
            <div class="col-xs-push-2 col-sm-push-2 col-xs-8">
                 <input type="radio" name="type" id="optionsRadios2" value="2">
                 Restricted 
            </div>
<?php
}
else
{
?>
<br/>
<?php
}
if($q3 != -1)
{
?>
            <div class="col-xs-push-2 col-xs-8">
                 <input type="radio" name="type" id="optionsRadios3" value="3">
                 Casual
            </div>
<?php
}
else
{
?>
<br/>
<?php
}
if($q4 != -1)
{
?>
            <div class="col-xs-push-4 col-xs-8">
                 <input type="radio" name="type" id="optionsRadios4" value="4">
                 Study
            </div>
<?php
}
else
{
?>
<br/>
<?php
}
if($q5 != -1)
{
?>
            <div class="col-xs-push-4 col-xs-8">
                 <input type="radio" name="type" id="optionsRadios5" value="5">
                 Earned
            </div>
<?php
}
else
{
?>
<br/>
<?php
}
?>
            </div>
        </div> 
        <div class="form-group">
            <div class="col-xs-6 col-sm-5">
               <label for="days" class="control-label">Enter no. of days of leave:</label>
            </div>
            <div class="col-xs-6 col-sm-7 col-sm-pull-1">
                <input type="text" class="form-control" id="days" name="days" placeholder="Enter no. of days" required>
                </textarea>
            </div>
        </div>        
        <div class="form-group">
            <div class="col-xs-6 col-sm-5">
               <label for="uname" class="control-label">Start Date:</label>
            </div>
            <div class="col-xs-6 col-sm-7 col-sm-pull-1">
                <input type="text" class="form-control" id="sdate" name="sdate" placeholder="dd-mm-yy" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6 col-sm-5">
               <label for="edate" class="control-label">End Date:</label>
            </div>
            <div class="col-xs-6 col-sm-7 col-sm-pull-1">
                <input type="text" class="form-control" id="edate" name="edate" placeholder="dd-mm-yy" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6 col-sm-5">
               <label for="reason" class="control-label">Enter Reason:</label>
            </div>
            <div class="col-xs-6 col-sm-7 col-sm-pull-1">
                <textarea class="form-control" id="reason" name="reason" placeholder="Enter Reason for leave" col="10" rows="10" required>
                </textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6 col-sm-5">
               <label for="sname" class="control-label">Enter Substitute's Name:</label>
            </div>
            <div class="col-xs-6 col-sm-7 col-sm-pull-1">
                <input type="text" class="form-control" id="sname" name="sname" placeholder="Enter Substitute Name" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-4 col-xs-push-5 col-sm-3 col-sm-push-5" >
                <input type="submit" value="Submit">
            </div>
        </div>
    </form>
    </div>
</section>    
<?php
}

else
{
$name = $_POST['name'];
$num = $_POST['num'];
$desig = $_POST['desig'];
$branch = $_POST['branch'];
$type = $_POST['type'];
$days = $_POST['days'];
$sdate = $_POST['sdate'];
$edate = $_POST['edate'];
$reason = $_POST['reason'];
$sname = $_POST['sname'];

$lid = $_SESSION['uname'].rand();

include 'config.php';

    $sql1 = "INSERT INTO leaves Values('$lid', '$un',  '$name', '$num', '$desig', '$branch', '$type', $days, '$sdate', '$edate', '$reason', '$sname', 1, 0 )";
if(mysqli_query($con, $sql1))
{    
?>

<div class="row-content">

<h3>Your Leave Request has been Submitted successfully !!! </h3>

</div>
 
<?php
}
else
{
?>

<div class="row row-content">
    <h4><center>Error !! Please try again....</center>
</div>
<?php
}
}
$name = null;
$num = null;
$desig = null;
$branch = null;
$type = null;
$days = null;
$sdate = null;
$edate = null;
$reason = null;
$sname = null;
$lid = null;

mysqli_free_result($sql);

?>

    <div class="row" style="padding:30px;">
    </div>  
    
</div>

<footer class="row-footer">
        <div class="container">
            <div class="row">             
                <div class="col-xs-12">
                    <p style="padding:10px;"></p>
<?php if($lastd != "") { ?><p align=center style="color: #fff;">Last Logged in at - <?php echo $lastt; ?>&nbsp; on : <?php echo $lastd; ?> </p><?php } ?>
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
mysqli_close($con);
}
?>