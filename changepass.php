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
    
    <script type="text/javascript" >
    function check()
    {
        if(document.pform.pass.value == "" && document.pform.cpass.value == "")
        {
             alert("Enter Current Password.....");
             document.pform.pass.focus();
        }
        else if(document.pform.cpass.value == "")
        {
             alert("Fill New Password field.....");
             document.pform.cpass.focus();
        }
        else
        {
            document.pform.submit();
        }
    }
    
    </script>

</head>
<body>
<?php
session_start();
if(!isset($_SESSION['uname']) && !isset($_SESSION['upass']))
{
    header('Location: error.html');
}
else
{
include 'config.php';

$des = $_SESSION['desig'];
$name = $_SESSION['name']; 
$uname = $_SESSION['uname'];
$upass = $_SESSION['upass'];

?>
<nav class="navbar navbar-fixed-top" role="navigation">

        <div class="container">
            
            
                <ul class="nav navbar-nav">
<li>
<?php
 switch($des)
        {
            case 1 : echo "<a href=superadmin.php><span class='glyphicon glyphicon-home'
                         aria-hidden='true'></span>&nbsp; Dashboard</a>";
                        break;
                       
            case 2 : echo "<a href=superadmin.php><span class='glyphicon glyphicon-home'
                         aria-hidden='true'></span>&nbsp; Dashboard</a>";
                        break;
            case 3 : echo "<a href=useradmin.php><span class='glyphicon glyphicon-home'
                         aria-hidden='true'></span>&nbsp; Dashboard</a>";
                        break;
            case 4 :echo "<a href=userprofile.php><span class='glyphicon glyphicon-home'
                         aria-hidden='true'></span>&nbsp; Dashboard</a>";
                        break;
            case 5 : echo "<a href=userprofile.php><span class='glyphicon glyphicon-home'
                         aria-hidden='true'></span>&nbsp; Dashboard</a>";
                        break;
            default : header('Location: error.html');
        }
?>
</li>
                    
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
          
</nav>  
<div class="container">

    <div class="row" style="padding-top:40px;">
    </div>
    
<?php
if(!isset($_POST['pass']) && !isset($_POST['cpass']))
{
?>

<div class="col-xs-12 col-sm-push-3 col-sm-6 ">
    <form class="form-horizontal" role="form" method="post" action="changepass.php" name="pform">
        <h3><strong><center>Change Password</center></strong></h3>
        <br/><br/>
        <div class="form-group">
            <div class="col-xs-4 col-sm-3">
               <label for="pass" class="control-label"> Enter your current Password</label>
            </div>
            <div class="col-xs-8">
                <input type="text" class="form-control" id="pass" name="pass" placeholder="Current Password ">
            </div>
        </div>
        <div class="form-group">
        <div class="col-xs-4 col-sm-3">
               <label for="cpass" class="control-label">Enter New Password</label>
        </div>
            <div class="col-xs-8">
                <input type="text" class="form-control" id="cpass" name="cpass" placeholder="New Password">
            </div>
        </div>
        <br/>
        
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-5 col-xs-4 col-xs-offset-5" >
                <input type="button" value="Submit" onClick="check()">
            </div>
        </div>
    </form>
</div>
<?php
}
else
{
    $p = $_POST['pass'];
    $cp = $_POST['cpass'];
    
    if($p == $upass)
    {
        $sql = "UPDATE users SET pass='$cp' Where uname='$uname'";
        
        if(mysqli_query($con, $sql))
        {
?>
        <div class="row row-content">
            <div class="col-xs-8 col-xs-push-2 col-sm-8 col-sm-push-3" >
                <h3><strong>Password has been updated successfully !!</strong></h3>
            </div>
        </div>
<?php            
        }
    }
    else
    {
?>
        <div class="row">
            <div class="col-xs-8 col-xs-push-2 col-sm-8 col-sm-push-2" >
                <strong>Enter your correct Current Password !!</strong>
            </div>
        </div>
<?php        
    }
}
?>

</div>
<script	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/
jquery.min.js"></script>	
<script	src="js/bootstrap.min.js"></script>	

</body>
</html>
<?php
mysqli_close($con);
}
?>