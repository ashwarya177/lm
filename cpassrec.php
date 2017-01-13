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
    
    function validate()
    {
       var ce = document.getElementById("cques");
       var ca = ce.selectedIndex; 
       var ne = document.getElementById("nques");
       var na = ne.selectedIndex;
       
       if(document.myform.cans.value == "" && ca == 0 && document.myform.nans.value == "" && na == 0)
        {
            alert("Enter all details !!");
        }
        else if(ca == 0)
        {
            alert("Choose your current Security Question...");
            document.myform.cques.focus();
        }
        else if(document.myform.cans.value == "")
        {
            alert("Enter your current Security Answer...");
            document.myform.cans.focus();
        }
        else if(na == 0)
        {
            alert("Choose your new Security Question...");
            document.myform.nques.focus();
        }
        else if(document.myform.nans.value == "")
        {
            alert("Enter your new Security Answer...");
            document.myform.nans.focus();
        }
        else
        {
            document.myform.submit();
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
if(!isset($_POST['cques']) && !isset($_POST['cans']) && !isset($_POST['nques']) && !isset($_POST['nans']))
{
?>

<div class="col-xs-12 col-sm-push-3 col-sm-6 ">
    <form class="form-horizontal" role="form" method="post" action="cpassrec.php" name="myform">
        <h3><strong><center>Change Password Recovery Options</center></strong></h3>
        <br/><br/>
        <div class="form-group">
            <div class="col-xs-12">
                <label class="control-label">Choose your current Security Question :</label>
            </div>
            <br/>
            <div class="col-xs-12">
                <select name="cques" id="cques" class="form-control">
                    <option value="0">Choose your current security question </option>
                    <option value="What is your last name ?">What is your last name ?</option>
                    <option value="What is your petname ?">What is your petname ?</option>
                    <option value="What was your first school name ?">What was your first school name ?</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
               <label for="cans" class="control-label">Your current Security Answer :</label>
            </div>
            <br/>
            <div class="col-xs-12">
                <input type="text" class="form-control" id="cans" name="cans" placeholder="Current Answer" >
            </div>
        </div>
        <br/>
        <div class="form-group">
            <div class="col-xs-12">
                <label class="control-label">Choose your new Security Question :</label>
            </div>
            <div class="col-xs-12">
                <select name="nques" id="nques" class="form-control">
                    <option value="0">Choose your new security question </option>
                    <option value="What is your last name ?">What is your last name ?</option>
                    <option value="What is your petname ?">What is your petname ?</option>
                    <option value="What was your first school name ?">What was your first school name ?</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-12">
               <label for="nans" class="control-label">Your new Security Answer :</label>
            </div>
            <div class="col-xs-12">
                <input type="text" class="form-control" id="nans" name="nans" placeholder="New Answer" >
            </div>
        </div>
        <br/>
        
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-5 col-xs-4 col-xs-offset-5" >
                <input type="button" value="Submit" onClick="validate()">
            </div>
        </div>
    </form>
</div>
<?php
}
else
{
    $cques = $_POST['cques'];
    $cans = $_POST['cans'];
    $nques = $_POST['nques'];
    $nans = $_POST['nans'];
    
    $s = mysqli_query($con, "SELECT * from users where uname='$uname' and pass='$upass'");
    $r = mysqli_fetch_array($s);
    
    if($cques == $r['sques'] && $cans == $r['sans'])
    {
        $sql = "UPDATE users SET sques='$nques', sans='$nans' Where uname='$uname'";
        
        if(mysqli_query($con, $sql))
        {
?>
        <div class="row row-content">
            <div class="col-xs-8 col-xs-push-2 col-sm-8 col-sm-push-3" >
                <h3><strong>Password Recovery Options have been updated successfully !!</strong></h3>
            </div>
        </div>
<?php            
        }
    }
    else
    {
?>
        <div class="row row-content">
            <div class="col-xs-8 col-xs-push-2 col-sm-8 col-sm-push-2" >
                <strong>Enter your correct Current Security Question and Answer !!</strong>
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