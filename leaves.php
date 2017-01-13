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

$desig = $_SESSION['desig'];
$time = time();
$d = date('d-m-y', $time);

$day1 = "01";
$day2 = 31;
$m1 = "07";
$m2 =  "05";
$m3 = "01";
$year1 = 16;
$year2 = 17;

$date1 = $day1."-".$m1."-".$year1; // 01-07-16
$date2 = $day2."-".$m2."-".$year2; // 31-05-17
$date3 = $day1."-".$m3."-".$year2; // 01-01-17
$date4 = $day1."-".$m1."-".$year2; // 01-07-17
if($desig == 1)
{
if($d == $date1)
{
    $sql1 = mysqli_query($con, "UPDATE users SET medical=10, restricted=3, casual=8, study=15 Where desig != 5");
    $year1 ++ ;
}

if($d == $date2)
{
    $sql1 =  mysqli_query($con, "UPDATE users SET medical=0, restricted=0, casual=0, study=0 Where desig != 5");
    $year2 ++;
}

if($d == $date3 || $d == $date4)
{
    $sql = mysqli_query($con, "SELECT * from users Where desig != 5");
    
    while($r = mysqli_fetch_array($sql))
    {
        $un = $r['uname'];
        $el = $r['earned'];
        $nel = 5 + $el;
        $sql2 = mysqli_query($con, "UPDATE users SET earned=$nel Where uname='$un'");
    }
}
}
else
{
if($d == $date1)
{
    $sql1 = mysqli_query($con, "UPDATE users SET medical=10, restricted=3, casual=8, study=15 Where desig == 5");
    $year1 ++ ;
}

if($d == $date2)
{
    $sql1 =  mysqli_query($con, "UPDATE users SET medical=0, restricted=0, casual=0, study=0 Where desig == 5");
    $year2 ++;
}

if($d == $date3 || $d == $date4)
{
    $sql = mysqli_query($con, "SELECT * from users Where desig == 5");
    
    while($r = mysqli_fetch_array($sql))
    {
        $un = $r['uname'];
        $el = $r['earned'];
        $nel = 5 + $el;
        $sql2 = mysqli_query($con, "UPDATE users SET earned=$nel Where uname='$un'");
    }
}    
}
?>

    <div class="row row-content">
        <h3 align=center>Leaves are Updated as per current Year !!</h3>
    </div>
    <div class="row row-content">
        <p><center><a href="index.php">Click here </a>to login again....</center></p>
    </div>

<script	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/
jquery.min.js"></script>	
<script	src="js/bootstrap.min.js"></script>	

</body>
</html>

<?php
mysqli_close($con);
}
session_destroy();
?>