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
$name = $_SESSION['name'];
$d = $_SESSION['desig'];

$sql = mysqli_query($con,"SELECT * from leaves Where uname='$un' order by sdate desc");
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
                    <li><?php 
if($d==3)
{
    echo "<a href=useradmin.php><span class='glyphicon glyphicon-home'
                         aria-hidden='true'></span>&nbsp; Dashboard</a>";
}    
if($d==4 || $d==5)
{
    echo "<a href=userprofile.php><span class='glyphicon glyphicon-home'
                         aria-hidden='true'></span>&nbsp; Dashboard</a>";
}    
 ?></li>   
                    <li class="active"><a href="alstatus.php"><span class="glyphicon glyphicon-bookmark"
                         aria-hidden="true"></span>&nbsp; Applied Leaves Status</a></li> 
<?php
if($d==3)
{
?>                         
                    <li><?php echo "<a href=leaverequest.php?ba=1><span class='glyphicon glyphicon-envelope'
                         aria-hidden='true'></span>&nbsp; Leave Requests</a>"; ?></li>   
                    <li><?php echo "<a href=leaverequest.php?ba=2><span class='glyphicon glyphicon-envelope'
                         aria-hidden='true'></span>&nbsp; Casual Leave Requests</a>"; ?></li> 
<?php
}
?>   
                      
<li><a href="logout.php"><span class="glyphicon glyphicon-bookmark"
                         aria-hidden="true"></span>&nbsp; Logout</a></li>                           
                </ul>
                <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                         role="button" aria-haspopup="true" aria-expanded="false">
                         <span class="glyphicon glyphicon-user"
                         aria-hidden="true"></span>&nbsp; <?php  echo $name; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="cp.php">Edit Profile</a></li>
                            <li><a href="changepass.php">Change Password</a></li>
                            <li><a href="cpassrec.php">Change Password Recovery Options</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>  
        
</nav>  

<div class="row row-content">
<?php 
if(mysqli_fetch_array($sql))
{
?>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1">
            <h2 align=center>Applied Leave Requests Status</h2>
        </br>
        <div class="table-responsive">
            <table class="table">
            <col width="30">
            <col width="400">
            <col width="200">
            <col width="150">
            <col width="200">
                <tr>
                    <td align=center><h4>S.No</h4></td>
                    <td align=center><h4>Type of leave</h4></td>
                    <td align=center><h4>Start Date</h4></td>
                    <td align=center><h4>End Date</h4></td>
                    <td align=center><h4>Status</h4></td>
                </tr>
<?php $c=0;

$sql = mysqli_query($con,"SELECT * from leaves Where uname='$un' order by sdate desc");

  while($row = mysqli_fetch_array($sql)) {
         $c=$c+1; 
         $type = $row['type'];
         $sdate = $row['sdate'];
         $edate = $row['edate'];
         $vhod = $row['vhod'];
         $vsadmin = $row['vsadmin'];
         
   switch($type)
    {
        case 1 : $t = "Medical Leave";
                 break;
        case 2 : $t = "Restricted Holiday";
                 break;
        case 3 : $t = "Casual Leave";
                 break;
        case 4 : $t = "Study Leave";
                 break;
        case 5 : $t = "Earned Leave";
                 break;
    }
    
    if($vhod==1 && $vsadmin==1) 
    { $status="SANCTIONED"; }
    else if($vhod==1 && $vsadmin==-1)
    { $status="REJECTED"; }
    else if($vhod==1 && $vsadmin==2)
    { $status="SANCTIONED"; }
    else if($vhod==1 && $vsadmin==0)
    { $status="PENDING"; }
    else if($vhod==0 && $vsadmin==0)
    { $status="PENDING"; }
    else if($vhod==-1 && $vsadmin==0)
    { $status="REJECTED BY HOD"; }
    else if($vhod==-1 && $vsadmin==2)
    { $status="REJECTED"; }
    else if($vhod==2 && $vsadmin==1)
    { $status="SANCTIONED"; }
    else if($vhod==2 && $vsadmin==-1)
    { $status="REJECTED"; }
    else
    { $status = "error"; }

    
?>                
                <tr style="font-weight:normal;">
                    
                    <td  align=center><?php   echo $c; ?>.</td>
                    
                    <td align=center><?php echo $t; ?></td>

                    <td align=center><?php echo $sdate; ?></td>
                    
                    <td align=center><?php echo $edate; ?></td>
                    
                    <td align=center><strong><?php echo $status; ?></strong></td>
                
                </tr>
                
<?php
  }
?>
            </table>
        </div>
    </div>
</div>
<?php
}
else
{
?>

<div class="row row-content">
    <h4><center>No leave Requests to display !!</center></h4>
</div>
<?php
}
?>

<script	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/
jquery.min.js"></script>	
<script	src="js/bootstrap.min.js"></script>	

</body>
</html>
<?php
mysqli_close($con);
}
?>