
<?php

session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$num = $_POST['num'];
$dob =  $_POST['dob'];
$desig = $_POST['desig'];
$branch = $_POST['branch'];
$medical = $_POST['medical'];
$rh = $_POST['rh'];
$casual = $_POST['casual'];
$study = $_POST['study'];
$earned = $_POST['earned'];
$uname = $_POST['uname'];
$pass =  $_POST['pass'];
$cpass = $_POST['cpass'];
$ques =  $_POST['ques'];
$ans =  $_POST['ans'];

include 'config.php';

if(mysqli_connect_errno())
    echo "Failed to connect to database....<br>".mysqli_connect_error(). " error";

else
{
    
    $sch1 = mysqli_query($con, "SELECT * from users where uname='$uname'");
    $sch2 = mysqli_query($con, "SELECT * from users where email='$email'");
    
    if( (!mysqli_fetch_array($sch1)) && (!mysqli_fetch_array($sch2)) )
    {
        
        if($cpass == $pass)
        {
           
           $sql = "INSERT into users VALUES('$name', '$email', '$num', '$dob', $desig, $branch, $medical, $rh, $casual, $study, $earned, '$uname', '$pass', '$ques', '$ans')";
            
            if(!mysqli_query($con, $sql))
            {
                die('Error: '.mysqli_error($con));    
            }
            
            else
            {
                echo "Successfully Registered !!";
                echo "<a href='index.php'>Click here</a> to go to home page ...";
            }
        }
        
        else
        {
            echo "Password and Confirm Passwords fields are not same !!" ;
            echo '</br><a href="registration.html">Click Here</a> to register again !!';
        }
    }
    
    
    else
    {
        
        $sch1 = mysqli_query($con, "SELECT * from users where uname='$uname'");
        $sch2 = mysqli_query($con, "SELECT * from users where email='$email'");
    
        if(mysqli_fetch_array($sch1))
        {
                echo '<script type="text/javascript">';
                echo 'if(confirm("Username has already been taken by someone. Please choose some other username....")) { 
                 window.location.href = "registration.html"}';
                echo '</script>';
        }
        
        else if(mysqli_fetch_array($sch2))
        {
                echo '<script type="text/javascript">';
                echo 'if(confirm("This Email id is already registered....Please login into your account !!")) { 
                 window.location.href = "index.php"}';
                echo '</script>';
        }
        
        else
        {
            echo '<script type="text/javascript">';
            echo 'if(confirm("Something went wrong... Either email is already registered or username exists !!! Please try again ....")) {
                window.location.href="registration.html"}';
        }
    }
}

mysqli_close($con);
session_destroy();
?>