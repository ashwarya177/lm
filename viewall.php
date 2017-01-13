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

switch($d)
{
    case 1 : $sql = mysqli_query($con,"SELECT * from leaves Where type!=3 and desig!=5 and vhod!=0 order by sdate desc");
             $ba=1;
             break;
    case 2 : $sql = mysqli_query($con,"SELECT * from leaves Where desig=5 order by sdate desc");
             $ba=2;
             break;
    case 3 : $sql = mysqli_query($con,"SELECT * from leaves Where desig!=5 order by sdate desc");
             $ba=1;
             break;
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
                <li><?php 
if($d==3)
{
    echo "<a href=useradmin.php><span class='glyphicon glyphicon-home'
                         aria-hidden='true'></span>&nbsp; Dashboard</a>";
?>
                <li>
<?php
    echo "<a href=alstatus.php><span class='glyphicon glyphicon-home'
                         aria-hidden='true'></span>&nbsp; Applied Leave Status</a>"; 
?>
                </li>
                <li>
<?php
    echo "<a href=leaverequest.php?ba=1><span class='glyphicon glyphicon-home'
                         aria-hidden='true'></span>&nbsp; Leave Requests</a>"; 
?>
                </li>
<li>
<?php
    echo "<a href=leaverequest.php?ba=2><span class='glyphicon glyphicon-home'
                         aria-hidden='true'></span>&nbsp; Casual Leave Requests</a>"; 
?>
                </li>
<?php
}    
if($d==1 || $d==2)
{
    echo "<a href=superadmin.php><span class='glyphicon glyphicon-home'
                         aria-hidden='true'></span>&nbsp; Dashboard</a>";
}    
 ?></li>   
            <li class="active"><a href="viewall.php"><span class="glyphicon glyphicon-bookmark"
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
<div class="row row-content" style="padding: 120px;">
<?php 
if(mysqli_fetch_array($sql))
{
?>
        <div class="col-xs-12">
            <h2 align=center  style="border-bottom: 1px solid black;"   >All Leave Applications</h2>
        </br>
        <div class="table-responsive" style="margin-top:20px;">
            <table class="table">
            <col width="30">
            <col width="400">
            <col width="200">
            <col width="150">
            <col width="150">
            <col width="150">
            <col width="200">
                <tr style="background-color: #F5F5f5;">
                    <td align=center><h4>S.No.</h4></td>
                    <td align=center><h4>Name</h4></td>
                    <td align=center><h4>Branch</h4></td>
                    <td align=center><h4>Designation</h4></td>
                    <td align=center><h4>Type of leave</h4></td>
                    <td align=center><h4>Start Date</h4></td>
                    <td align=center><h4>End Date</h4></td>
                    <td align=center><h4>Status</h4></td>
                </tr>
<?php $c=0;
switch($d)
{
    case 1 : $sql = mysqli_query($con,"SELECT * from leaves Where type!=3 and desig!=5 and vhod!=0 order by sdate desc");
             $ba=1;
             break;
    case 2 : $sql = mysqli_query($con,"SELECT * from leaves Where desig=5 order by sdate desc");
             $ba=2;
             break;
    case 3 : $sql = mysqli_query($con,"SELECT * from leaves Where desig!=5 order by sdate desc");
             $ba=1;
             break;
}
  while($row = mysqli_fetch_array($sql, MYSQL_ASSOC)) {
         $c=$c+1; 
         $type = $row['type'];
         $desig = $row['desig'];
         $branch = $row['branch'];
         $lid = $row['lid'];
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
     switch($desig)
    {
        case 1 : $d = "Director";
                 break;
        case 2 : $d = "Registrar";
                 break;
        case 3 : $d = "Head Of Department";
                 break;
        case 4 : $d = "Faculty Member";
                 break;
        case 5 : $d = "Administrative Staff";
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
                    
                    <td align=center><?php   echo $c; ?>.</td>
                    
                    <td align=center><?php echo $row['name']; ?></td>

                    <td align=center><?php echo $branch; ?></td>
                    
                    <td align=center><?php echo $d; ?></td>
                    
                    <td align=center><?php echo $t; ?></td>
                    
                    <td align=center><?php echo $row['sdate']; ?></td>
                    
                    <td align=center><?php echo $row['edate']; ?></td>
                    
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