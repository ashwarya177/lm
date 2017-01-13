<?php

session_start();

include 'config.php';

if(mysqli_connect_errno())
{
    echo "Failed to connect to database !!";
}

else
{
    
    if(isset($_COOKIE['Username']) && isset($_COOKIE['Password']))
    {
        $un = $_COOKIE['Username'];
        $up = $_COOKIE['Password'];
    }
    else
    {
        $un = $_POST['uname'];
        $up = $_POST['upass'];
    }

    if(isset($_GET['rem']))
        {
            setcookie("Username", $un, time()+31536000);
            setcookie("Password", $up, time()+31536000);
        }
    
    if(!isset($_GET['rem']))
    {
        if(isset($_COOKIE['Username']) && isset($_COOKIE['Password']))
        {
            setcookie("Username","", time()-3600);
            setcookie("Password", "", time()-3600);
        }
    }
    
    $sql = mysqli_query($con, "SELECT * from users Where uname='$un' and pass='$up'");

    if(mysqli_fetch_array($sql))
    {
        $sql = mysqli_query($con, "SELECT * from users Where uname='$un' and pass='$up'");
        $r = mysqli_fetch_array($sql);  
        $des = $r["desig"]; 
        $_SESSION['name'] = $r['name'];
        $_SESSION['uname'] = $un;
        $_SESSION['upass'] = $up;
        $_SESSION['desig'] = $des;
        
$time = time();
$at = date('d-m-y', $time);
$ad = date('H:i:s', $time);

$sql2 = mysqli_query($con, "SELECT * from info where uname='$un'");

if(mysqli_fetch_array($sql2))
{
    $sql2 = mysqli_query($con, "SELECT * from info where uname='$un'");
    $result = mysqli_fetch_array($sql2);
   
        $lastd = $result['date'];
        $lastt = $result['time'];
        $_SESSION['lastd'] = $lastd;
        $_SESSION['lastt'] = $lastt;
    
    
    
    $s = mysqli_query($con, "UPDATE info SET date='$at', time='$ad' Where uname='$un'");
}
else
{
    $s = mysqli_query($con, "INSERT into info VALUES('$un','$at', '$ad' )");
}
        
        switch($des)
        {
            case 1 : header('Location: superadmin.php');
                        break;
            case 2 : header('Location: superadmin.php');
                        break;
            case 3 : header('Location: useradmin.php');
                        break;
            case 4 : header('Location: userprofile.php');
                        break;
            case 5 : header('Location: userprofile.php');
                        break;
            default : header('Location: error.html');
        }
        
    }
    else
    {
       header('Location: error.html');
    }   
}

mysqli_close($con);

?>
