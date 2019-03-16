<?php
  session_start();
	$_SESSION["logged"]="";
  $_SESSION["REG"]="";
  $_SESSION["name"]="";
  $db=mysqli_connect('localhost','root','','att');
?>
<html>
  <head>
    <script>
		function valid()
		{
			var x=document.getElementById("regno").value;
			var y=document.getElementById("passwd").value;			
			if(y=="" || x=="")
			{
				alert("Please fill all the boxes");
			}
			var a=x.slice(0,2);
			var b=x.slice(2,5);
			var n=x.length;
			var c=b.toUpperCase();
			var d=x.slice(5,9)
			
			if(n!=9 || a!='17' || a!="16" && c!='BCE'  && c!="BLC" && c!="BME" && c!="BEC" && c!="BEE" && c!="BCL"  )
			{
				alert("Please fill the registration number correctly");
			}
			var patt=/[
		}
	
	</script>
    <title> Student Login</title>
    <link rel=stylesheet type="text/css" href="as.css">
  </head>
  
 <body background="background.jpg">
        <header>
           <img src="logo.png">
		    <font face="Georgia" color="blue" size="5"><b>Attelp</b></font>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="stulogin.php">Student</a></li>
                    <li><a href="teachlogin.php">Teacher</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </nav>
        </header>
    <?php
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        $reg=$_POST['regno'];
        $pass=$_POST['passwd'];
        $query="select regno from login where regno='$reg' and password='$pass';";
        $result=mysqli_query($db,$query);
        $count=mysqli_num_rows($result);
        if($count!=1)
        {
          $error="Wrong Registration number \n or Password";
        }
        else
        {
          $_SESSION["logged"]=1;
          $_SESSION["REG"]=$reg;
		  
          header("location: stud1.php");
        }
      }
     ?>
    <center>
    <form id="login" class="login" method="post" action="">
      <h1 class="login-title">Attendance Management System</h1>
      <input type="text" class="login-input" placeholder="Registration number" id='regno' name='regno' required/>
      <input type="password" class="login-input" placeholder="Password" id='passwd' name='passwd' />
      <?php
        if(isset($error) && !empty($error))
        {
          echo "<p id='error' style='color:red;size:23pt'> $error </p>";
        }
        mysqli_close($db);
       ?>
      <button type="submit" onClick="valid()"class="login-button">
        Log In
      </button>
    </form>
  </center>

  </body>
</html>
