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
    
$branch = $_SESSION['branch'];
$name = $_SESSION['name'];
$ba = $_GET['ba'];

if($ba == 1)
{ $title = "Leave Requests"; }
if($ba == 2)
{ $title = "Casual Leave Requests"; }
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
                    <li><a href="useradmin.php"><span class="glyphicon glyphicon-home"
                         aria-hidden="true"></span>&nbsp; Dashboard</a></li>
                    <li><a href="alstatus.php"><span class="glyphicon glyphicon-bookmark"
                         aria-hidden="true"></span>&nbsp; Applied Leaves Status</a></li> 
                    <li <?php if($ba ==1) { echo "class=active";} ?> ><?php echo "<a href=leaverequest.php?ba=1><span class='glyphicon glyphicon-envelope'
                         aria-hidden='true'></span>&nbsp; Leave Requests</a>"; ?></li>   
                    <li <?php if($ba ==2) { echo "class=active";} ?>><?php echo "<a href=leaverequest.php?ba=2><span class='glyphicon glyphicon-envelope'
                         aria-hidden='true'></span>&nbsp; Casual Leave Requests</a>"; ?></li> 
                    <li><a href="viewall.php"><span class="glyphicon glyphicon-bookmark"
                         aria-hidden="true"></span>&nbsp;View all Leave Applications</a></li> 
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

<div class="container">

    <div class="row row-content" style="margin:40px auto; padding:70px 0px 0px 0px;">
    
        <div class="col-xs-12 col-sm-12">
            <h2 style="border-bottom: 1px solid black;"><center><?php echo $title; ?></center></h2></br>    
        </div>
            
<?php 
$c=0;

switch($ba)
{
    case 1 : $sql = mysqli_query($con, "SELECT * from leaves where branch=$branch and vhod=0 order by name");
             break;
    case 2 : $sql = mysqli_query($con, "SELECT * from leaves where branch=$branch and type=3 and desig!=5 and vhod=0 order by name");
             break;
}


if(mysqli_fetch_array($sql))
{
    switch($ba)
{
    case 1 : $sql = mysqli_query($con, "SELECT * from leaves where branch=$branch and desig!=5 and type!=3 and vhod=0 order by name");
             break;
    case 2 : $sql = mysqli_query($con, "SELECT * from leaves where branch=$branch and type=3 and desig!=5 and vhod=0 order by name");
             break;
}
?>

        <h4>Persons who have applied for Leave :</h4><p>(Click on name of person to view leave request)</p>
    </div>
    
<div class="table-responsive" style="margin-top:20px;">
            <table class="table">
            <col width="30">
            <col width="400">
            <col width="200">
            <col width="200">
                <tr style="background-color:#F5F5F5;">
                    <td align=center><h4><strong>S.No.</strong></h4></td>
                    <td align=center><h4><strong>Name</strong></h4></td>
                    <td align=center><h4><strong>Date</strong></h4></td>
                    <td align=center><h4><strong>Type of leave</strong></h4></td>
                </tr>
<?php    
    while($row = mysqli_fetch_array($sql)) 
    {
        $c=$c+1;   
        $lid = $row['lid'];
        $d = $row['sdate'];
        $type = $row['type'];
        
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
?>  
                <tr style="font-size: 15px;">
                    
                    <td  align=center><?php   echo $c; ?>.</td>
                    
                    <td  align=center><?php
                    echo "<a href=decide.php?lid=$lid&ba=$ba style='font-size: 17px;'> ".
                          $row['name']." </a>";
                    ?></td>

                    <td  align=center><?php echo $d; ?></td>
                        
                    <td align=center><?php echo $t; ?></td>
                
                </tr>

<?php
  }
?>
    </table>
</div>
<?php
}
else 
{
?>

    <div class="row row-content">
        <h4><center>No new requests to show !!</center></h4>
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