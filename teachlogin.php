<?php
  session_start();
	$_SESSION["logged"]="";
  $_SESSION["EMP"]="";
  $_SESSION["name"]="";
  $db=mysqli_connect('localhost','root','','att');
?>
<html>
  <head>
    <script>
		function valid()
		{
			var x=document.getElementById("empno").value;
			var y=document.getElementById("passwd").value;			
			if(y=="" || x=="")
			{
				alert("Please fill all the boxes");
			}
			var a=x.slice(0,3);
			var n=x.length;
			var c=a.toUpperCase();
			var d=x.slice(5,9)
			
			if(n!=7 || c!="TEA" )
			{
				alert("Please fill the registration number correctly");
			}
		}
	
	</script>
    <title> Teacher Login</title>
    <link rel=stylesheet type="text/css" href="as.css">
  </head>
  
 <body background="background.jpg">
        <header>
           <img src="logo.png">
		    <font face="Georgia" color="blue" size="5"><b>Attelp</b></font>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="stulogoin.php">Student</a></li>
                    <li><a href="teachlogin.php">Teacher</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </nav>
        </header>
    <?php
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        $emp=$_POST['empno'];
        $pass=$_POST['passwd'];
        $query="select empno from login1 where empno='$emp' and password='$pass';";
        $result=mysqli_query($db,$query);
        $count=mysqli_num_rows($result);
        if($count!=1)
        {
          $error="Wrong Teacher ID \n or Password";
        }
        else
        {
          $_SESSION["logged"]=1;
          $_SESSION["EMP"]=$emp;
		  
          header("location: teach1.php");
        }
      }
     ?>
    <center>
    <form id="login" class="login" method="post" action="">
      <h1 class="login-title">Attendance Management System</h1>
      <input type="text" class="login-input" placeholder="Teacher Reg number(E.G - TEA1001)" id='empno' name='empno' required/>
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
