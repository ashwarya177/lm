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

$sql = mysqli_query($con, "SELECT * From users Where uname='$uname' and pass='$upass'");
$r = mysqli_fetch_array($sql);

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
if(!isset($_POST['submit']))
{
?>
    <div class="col-xs-12 col-sm-push-3 col-sm-6 ">
    <form class="form-horizontal" role="form" method="post" action="cp.php">
        <h3><strong><center>Edit Profile</center></strong></h3>
        </br>
        <div class="form-group">
            <div class="col-xs-4 col-sm-3">
               <label for="name" class="control-label">Name:</label>
            </div>
            <div class="col-xs-8">
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
            </div>
        </div>
        <div class="form-group">
        <div class="col-xs-4 col-sm-3">
               <label for="email" class="control-label">E-mail id:</label>
        </div>
            <div class="col-xs-8">
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $r['email']; ?>">
            </div>
        </div>
        <div class="form-group">
        <div class="col-xs-4 col-sm-3">
               <label for="num" class="control-label">Mobile No:</label>
        </div>
            <div class="col-xs-8">
                <input type="text" class="form-control" id="num" name="num"  value="<?php echo $r['phno']; ?>">
            </div>
        </div>
        <div class="form-group">
        <div class="col-xs-4 col-sm-3">
               <label for="dob" class="control-label">Enter DOB:</label>
        </div>
            <div class="col-xs-8">
                <input type="text" class="form-control" id="dob" name="dob"  value="<?php echo $r['dob']; ?>">
            </div>
        </div>
        <div class="form-group">
        <div class="radio">
        
               <label class="col-xs-2 col-sm-2 control-label"><strong>Designation:</strong></label>
        
            <div class="col-xs-push-2 col-xs-8">
                 <input type="radio" name="desig" id="optionsRadios1" value="1" <?php if($des == 1) { ?> checked <?php } ?>>
                 Director
            </div>
            <div class="col-xs-push-4 col-sm-push-2 col-xs-8">
                 <input type="radio" name="desig" id="optionsRadios2" value="2" <?php if($des == 2) {?> checked <?php } ?>>
                 Registrar
            </div>
            <div class="col-xs-push-4 col-xs-8">
                 <input type="radio" name="desig" id="optionsRadios3" value="3" <?php if($des == 3) { ?> checked <?php } ?>>
                 Head Of Department
            </div>
            <div class="col-xs-push-4 col-xs-8">
                 <input type="radio" name="desig" id="optionsRadios4" value="4" <?php if($des == 4) { ?> checked <?php } ?>>
                 Faculty Member
            </div>
            <div class="col-xs-push-4 col-xs-8">
                 <input type="radio" name="desig" id="optionsRadios5" value="5" <?php if($des == 5) { ?> checked <?php } ?>>
                 Administrative Staff
            </div>
            </div>
        </div>
        <div class="form-group">
                        <div class="radio">
                            <label class="col-xs-2 col-sm-2 control-label"><strong>Branch:</strong></label>
  
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-2">
                                    <input type="radio" name="branch" id="optionsRadios1" value="1" <?php if($r['branch'] == 1) { ?> checked <?php } ?>>
                                    BioMedical Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-2">
                                    <input type="radio" name="branch" id="optionsRadios2" value="2" <?php if($r['branch'] == 2) { ?> checked <?php } ?>>
                                    Biotechnology
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios3" value="3" <?php if($r['branch'] == 3) { ?> checked <?php } ?>>
                                    Chemical Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios4" value="4" <?php if($r['branch'] == 4) { ?> checked <?php } ?>>
                                    Civil Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios5" value="5" <?php if($r['branch'] == 5) { ?> checked <?php } ?>>
                                    Computer Science and Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios6" value="6" <?php if($r['branch'] == 6) { ?> checked <?php } ?>>
                                    Electrical Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios7" value="7" <?php if($r['branch'] == 7) { ?> checked <?php } ?>>
                                    Electronics And Telecommunication Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios8" value="8" <?php if($r['branch'] == 8) { ?> checked <?php } ?>>
                                    Information Technology 
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios9" value="9" <?php if($r['branch'] == 9) { ?> checked <?php } ?>>
                                    Mechanical Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios10" value="10" <?php if($r['branch'] == 10) { ?> checked <?php } ?>>
                                    Mining Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios11" value="11" <?php if($r['branch'] == 11) { ?> checked <?php } ?>>
                                    Metallurgical Engineering
                                </div>
                    </div>
                   </div>
                   </br>
        
        
        <div class="form-group">
            <div class="col-xs-4 col-xs-push-5 col-sm-3 col-sm-push-5" >
                <input type="submit" value="Submit" name="submit">
            </div>
        </div>
        
    </form>
    </div>
<?php
}
else
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phno = $_POST['num'];
    $dob = $_POST['dob'];
    $desig = $_POST['desig'];
    $branch = $_POST['branch'];
    
    $sql2 = "UPDATE users SET name='$name', email='$email', phno=$phno, dob='$dob', desig=$desig, branch=$branch Where uname='$uname' and pass='$upass'";
    if(mysqli_query($con, $sql2))
    {
?>
<div class="col-xs-12 col-sm-push-3 col-sm-6 ">
    <form class="form-horizontal" role="form">
        <h3><strong><center>Your Profile</center></strong></h3>
        </br>
        <div class="row">
            <div class="col-xs-4 col-sm-3">
               <label for="name" class="control-label">Name:</label>
            </div>
            <div class="col-xs-8">
                <?php echo $name; ?>
            </div>
        </div>
        <div class="row">
        <div class="col-xs-4 col-sm-3">
               <label for="email" class="control-label">E-mail id:</label>
        </div>
            <div class="col-xs-8">
                <?php echo $r['email']; ?>
            </div>
        </div>
        <div class="row">
        <div class="col-xs-4 col-sm-3">
               <label for="num" class="control-label">Mobile No:</label>
        </div>
            <div class="col-xs-8">
                <?php echo $r['phno']; ?>
            </div>
        </div>
        <div class="row">
        <div class="col-xs-4 col-sm-3">
               <label for="dob" class="control-label">Enter DOB:</label>
        </div>
            <div class="col-xs-8">
                <?php echo $r['dob']; ?>
            </div>
        </div>
        <div class="row">
        <div class="radio">
        
               <label class="col-xs-2 col-sm-2 control-label"><strong>Designation:</strong></label>
        
            <div class="col-xs-push-2 col-xs-8">
                 <input type="radio" name="desig" id="optionsRadios1" value="1" <?php if($des == 1) { ?> checked <?php } ?>>
                 Director
            </div>
            <div class="col-xs-push-4 col-sm-push-2 col-xs-8">
                 <input type="radio" name="desig" id="optionsRadios2" value="2" <?php if($des == 2) {?> checked <?php } ?>>
                 Registrar
            </div>
            <div class="col-xs-push-4 col-xs-8">
                 <input type="radio" name="desig" id="optionsRadios3" value="3" <?php if($des == 3) { ?> checked <?php } ?>>
                 Head Of Department
            </div>
            <div class="col-xs-push-4 col-xs-8">
                 <input type="radio" name="desig" id="optionsRadios4" value="4" <?php if($des == 4) { ?> checked <?php } ?>>
                 Faculty Member
            </div>
            <div class="col-xs-push-4 col-xs-8">
                 <input type="radio" name="desig" id="optionsRadios5" value="5" <?php if($des == 5) { ?> checked <?php } ?>>
                 Administrative Staff
            </div>
            </div>
        </div>
        <div class="row">
                        <div class="radio">
                            <label class="col-xs-2 col-sm-2 control-label"><strong>Branch:</strong></label>
  
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-2">
                                    <input type="radio" name="branch" id="optionsRadios1" value="1" <?php if($r['branch'] == 1) { ?> checked <?php } ?>>
                                    BioMedical Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-2">
                                    <input type="radio" name="branch" id="optionsRadios2" value="2" <?php if($r['branch'] == 2) { ?> checked <?php } ?>>
                                    Biotechnology
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios3" value="3" <?php if($r['branch'] == 3) { ?> checked <?php } ?>>
                                    Chemical Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios4" value="4" <?php if($r['branch'] == 4) { ?> checked <?php } ?>>
                                    Civil Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios5" value="5" <?php if($r['branch'] == 5) { ?> checked <?php } ?>>
                                    Computer Science and Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios6" value="6" <?php if($r['branch'] == 6) { ?> checked <?php } ?>>
                                    Electrical Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios7" value="7" <?php if($r['branch'] == 7) { ?> checked <?php } ?>>
                                    Electronics And Telecommunication Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios8" value="8" <?php if($r['branch'] == 8) { ?> checked <?php } ?>>
                                    Information Technology 
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios9" value="9" <?php if($r['branch'] == 9) { ?> checked <?php } ?>>
                                    Mechanical Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios10" value="10" <?php if($r['branch'] == 10) { ?> checked <?php } ?>>
                                    Mining Engineering
                                </div>
                                <div class="col-xs-offset-4 col-sm-8 col-sm-offset-4">
                                    <input type="radio" name="branch" id="optionsRadios11" value="11" <?php if($r['branch'] == 11) { ?> checked <?php } ?>>
                                    Metallurgical Engineering
                                </div>
                    </div>
                   </div>
                   <br/>
                    <br/>
        
        <div class="row">
            <div class="col-xs-8 col-xs-push-2 col-sm-8 col-sm-push-2" >
                <strong>Profile has been updated successfully !!</strong>
            </div>
        </div>
        
    </form>  
<?php
}
}
?>  
    
    <div class="row" style="padding:30px;">
    </div>  
</div>

<script	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/
jquery.min.js"></script>	
<script	src="js/bootstrap.min.js"></script>	

</body>
</html>
<?php
}
?>