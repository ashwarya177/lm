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
    $ba = $_GET['ba'];
    $name = $_SESSION['name'];
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

<?php

if( !isset($_POST['status']) )
{
    
    include 'config.php';
    $lid = $_GET['lid'];
    $sql = mysqli_query($con, "SELECT * from leaves where lid='$lid'");
    $r = mysqli_fetch_array($sql);
    $d = $r['days'];
    $type = $r['type'];
    $desig = $r['desig'];
    
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
?>
<div class="row row-content" style="margin:40px auto; padding:70px 0px 0px 0px;">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        <h3 align=center><strong><?php echo $r['name']; ?><strong></h3></br>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3">    
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <td><strong>Mobile Number :</strong></td>
                    <td><?php  echo $r['num']; ?></td>
                </tr>
                <tr>
                    <td><strong>Designation :</strong></td>
                    <td><?php  echo $d; ?></td>
                </tr>
                <tr>
                    <td><strong>Type of Leave :</strong></td>
                    <td><?php  echo $t; ?></td>
                </tr>
                <tr>
                    <td><strong>No. of days :</strong></td>
                    <td><?php  echo $r['days']; ?></td>
                </tr>
                <tr>
                    <td><strong>Start Date :</strong></td>
                    <td><?php  echo $r['sdate']; ?></td>
                </tr>
                <tr>
                    <td><strong>End Date :</strong></td>
                    <td><?php  echo $r['edate']; ?></td>
                </tr>
                <tr>
                    <td><strong>Reason :</strong></td>
                    <td><?php  echo $r['reason']; ?></td>
                </tr>
                <tr>
                    <td><strong>Substitute's Name :</strong></td>
                    <td><?php  echo $r['sname']; ?></td>
                </tr>
            </table>
        </div>
    </div>    
</div>  

<div class="row">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        <form class="form-horizontal" role="form" <?php echo "action=decide.php?ba=$ba"; ?> method="post">
            <div class="form-group">
                <div class="radio">
                    <label class="control-label col-xs-12 col-sm-4"><strong>Sanction and Forward :</strong></label>
                    <div class="col-xs-6 col-sm-4 col-sm-push-1">
                        <input type="radio" name="status" id="option1" value="1" checked>Yes
                    </div>
                    <div class="col-xs-6 col-sm-4 col-sm-push-1">
                        <input type="radio" name="status" id="option2" value="-1">No
                    </div>
                </div>
            </div> 
            <input type="hidden" name="lid" value="<?php echo $lid; ?>" />
            <input type="hidden" name="type" value="<?php echo $type; ?>" />
            <div class="form-group">
                <div class="col-xs-12 col-sm-offset-1 col-sm-2">
                    <input type="submit" value="Submit !" >
                </div>
            </div>
        </form>
    </div>      
</div>

<div class="row row-content">
</div> 
<?php
}
else
{
    include 'config.php';
    $st = $_POST['status'];
    $lid = $_POST['lid'];
    $type = $_POST['type'];

if($st == 1 && $type==3)
{    
    $sql3 = mysqli_query($con, "SELECT * from users Where uname='$un' and pass='$up'");
    $row = mysqli_fetch_assoc($sql3);
   
        $c = $row["casual"];
        $nc = $c - $d;
        $sql4 = mysqli_query($con, "UPDATE users SET casual=$nc Where uname='$un'");
}

    if($ba == 1)
    {
        $sql2 = "UPDATE leaves SET vhod=$st Where lid='$lid'";
    }
    if($ba == 2)
    {
        $sql2 = "UPDATE leaves SET vhod=$st, vsadmin=2 Where lid='$lid'";
    }
    if(mysqli_query($con, $sql2)    )
    {
?>

    
    <div class="row row-content" style="padding:50px;">
    </div>
    <div class="row row-content">
        <h3><center>Your Response has been submitted successfully !!</center></h3>
    </div>

<?php        
    }
    else
    {
?>

    <div class="row row-content">
        <h3><center>Error... Please try again !!</center></h3>
    </div>

<?php
    }
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