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
        var e = document.getElementById("ques");
        var a = e.selectedIndex;
        
        if(document.myform.uname.value == "" && a == 0 && document.myform.ans.value == "" && document.myform.email.value == "")
        {
            alert("Enter all details !!");
        }
        else if(document.myform.uname.value == "")
        {
            alert("Enter username !!");
        }
        else if(a == 0)
        {
            alert("Select your Security Question !!!");
        }
        else if(document.myform.ans.value == "")
        {
            alert("Enter your Security Answer !!");
        }
        else if(document.myform.email.value == "")
        {
            alert("Enter your Registered E-mail id !!");
        }
        else
        {
            document.myform.submit();
        }
    }
   
    function check()
    {
        if(document.pform.pass.value == "" && document.pform.cpass.value == "")
        {
             alert("Enter New Password.....");
             document.pform.pass.focus();
        }
        else if(document.pform.cpass.value == "")
        {
             alert("Fill Confirm New Password field.....");
             document.pform.cpass.focus();
        }
         else if(document.pform.pass.value != document.pform.cpass.value)
        {
            alert("Password and Confirm Passwords fields are not same.....");
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
?>
<nav class="navbar navbar-fixed-top" role="navigation">

        <div class="container">
            
            
                <ul class="nav navbar-nav">
                    <li><a href="index.php"><span class="glyphicon glyphicon-home"
                         aria-hidden="true"></span>&nbsp; Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="registration.html" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; Register / Sign Up</a>
                    </li>
                </ul>
          
</nav>  
<?php
if(!isset($_POST['ques']) && !isset($_POST['ans']) && !isset($_POST['uname']) && !isset($_POST['email']))
{
?>
<div class="container">

    <div class="row" style="padding-top:40px;">
    </div>

    <div class="col-xs-12 col-sm-push-3 col-sm-6 ">
    <form class="form-horizontal" role="form" method="post" action="fp.php" name="myform" >
        <h3><strong><center>Password Recovery</center></strong></h3>
        <br/><br/>
        <div class="form-group">
            <div class="col-xs-4 col-sm-3">
               <label for="uname" class="control-label"> Username</label>
            </div>
            <div class="col-xs-8">
                <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Userame">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6 col-sm-6">
                <label class="control-label">Choose your Security Question</label>
            </div>
            <div class="col-xs-6 col-sm-6 col-sm-pull-1 ">
                <select name="ques" id="ques" class="form-control">
                    <option value="0">Choose your security question !!</option>
                    <option value="What is your last name ?">What is your last name ?</option>
                    <option value="What is your petname ?">What is your petname ?</option>
                    <option value="What was your first school name ?">What was your first school name ?</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6 col-sm-5">
               <label for="ans" class="control-label">Your Security Answer</label>
            </div>
            <div class="col-xs-6 col-sm-7 col-sm-pull-1">
                <input type="text" class="form-control" id="ans" name="ans" placeholder="Enter Answer" >
            </div>
        </div>
        <div class="form-group">
        <div class="col-xs-4 col-sm-3">
               <label for="email" class="control-label">E-mail id</label>
        </div>
            <div class="col-xs-8">
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter E-Mail id">
            </div>
        </div>
        <br/>
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-4" >
                <input type="button" value="Submit" onClick="validate()">
                <a href="index.php" class="col-sm-offset-4"><input type="button" value="Cancel" style="color:black;"></a>
            </div>
        </div>
    </form>
    </div>
<?php
}
else if(isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['ans']) && isset($_POST['ques']))
{
   $uname = $_POST['uname'];
   $email = $_POST['email'];
   $ans = $_POST['ans'];
   $ques = $_POST['ques'];
   
   if(!isset($_POST['pass']) && !isset($_POST['cpass']))
   {
?>

<div class="col-xs-12 col-sm-push-3 col-sm-6 ">
    <form class="form-horizontal" role="form" method="post" action="fp.php" name="pform">
        <h3><strong><center>Password Recovery</center></strong></h3>
        <br/><br/>
        <div class="form-group">
            <div class="col-xs-4 col-sm-3">
               <label for="pass" class="control-label"> Enter New Password</label>
            </div>
            <div class="col-xs-8">
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter New Password ">
            </div>
        </div>
        <div class="form-group">
        <div class="col-xs-4 col-sm-3">
               <label for="cpass" class="control-label">Confirm New Password</label>
        </div>
            <div class="col-xs-8">
                <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Confirm New Password">
            </div>
        </div>
        <br/>
        <input type="hidden" name="uname" value="<?php echo $uname; ?>" />
        <input type="hidden" name="email" value="<?php echo $email; ?>" />
        <input type="hidden" name="ans" value="<?php echo $ans; ?>" />
        <input type="hidden" name="ques" value="<?php echo $ques; ?>" />
        <div class="form-group">
            <div class="col-sm-6 col-sm-offset-4" >
                <input type="button" value="Submit" onClick="check()">
                <a href="index.php" class="col-sm-offset-4"><input type="button" value="Cancel" style="color:black;"></a>
            </div>
        </div>
    </form>
</div>

<?php
    }
    else
    {
        include 'config.php';
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $ans = $_POST['ans'];
        $ques = $_POST['ques'];
        $pass = $_POST['pass'];
   
        $sql = "SELECT * from users Where uname='$uname' and email='$email' and sques='ques' and sans='ans'";
        if(mysqli_query($con, $sql))
        {
            $sql2 = "UPDATE users SET pass='$pass' Where uname='$uname' and email='$email' and sques='$ques' and sans='$ans'";
            if(mysqli_query($con,   $sql2))
            {
?>
    <div class="row row-content">
        <h3><center> Password changed successfully !!</center></h3>
    </div>
    
    <div class="row row-content">
        <a href="index.php"><center>Click here to login</center></a>
    </div>

<?php     
session_destroy();
            }
            else
            {
?>
    <div class="row row-content">
        <h3><center>Error in changing !! Please try again....</center></h3>
    </div>
    
     <div class="row row-content">
        <a href="fp.php"><center>Click here to change passsword !!</center></a>
    </div>
<?php
            }   
        }
    }
}
else
{
    header('Location: error.html');
}
?>
    <div class="row row-content">
</div>
    
   
    
</div>
 <footer class="row-footer">
        <div class="container">
            <div class="row">             
                    <h5><center>Our Address</center></h5>
                    <address align=center>
		              National Institute of Technology, Raipur<br>
		              G.E. Road, Raipur,<br>
		              Chhattisgarh, India.<br>
		              <i class="fa fa-phone"></i>: <br>
		              <i class="fa fa-envelope"></i>: <a href="http://www.nitrr.ac.in">www.nitrr.ac.in</a><br/>
		           </address>
                <div class="col-xs-12">
                    <p style="padding:10px;"></p>
                    <p align=center>Last Updated on : </p>
                </div>
                <br/>
                <div class="col-xs-12">
                    <p style="padding:10px;"></p>
                    <p align=center>© Copyright NIT, Raipur</p>
                </div>
            </div>
        </div>
    </footer>
<script	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/
jquery.min.js"></script>	
<script	src="js/bootstrap.min.js"></script>	

</body>
</html>