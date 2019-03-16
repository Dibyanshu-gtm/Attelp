<?php
  session_start();
  $db=mysqli_connect('localhost','root','','att') or die("Connection failed");
  if ($_SESSION["logged"]!=1)
    header("location: teachlogin.php?err=1");
	$emp=$_SESSION['EMP'];
	echo "<title> Welcome $emp </title>";
	
?>
<html>
<head>
<link rel=stylesheet type="text/css" href="as.css">
<script language="Javascript">

function deleteask(){
  if (confirm('Are you sure you want to logout?')){
    return true;
  }else{
    return false;
  }
}
</script>
</head>

  <body background="background.jpg">
        <header>
           <img src="logo.png">
		    <font face="Georgia" color="blue" size="5"><b>Attelp</b></font>
            <nav>
                <ul>
                    <li><a href="teach1.php">Home</a></li>
                    <li><a href="#">Classes</a></li>
                    <li><a href="about.html">About</a></li>
					<li><a href="logout.php"onclick="return deleteask();">Logout</a></li>
                    <li><a href="#"></a></li>
                </ul>
            </nav>
        </header>
<?php
 $query="SELECT * FROM login1 where empno='$emp';";
        mysqli_query($db,$query) or die("Query Failed");
        $result=mysqli_query($db,$query);
        while($row=mysqli_fetch_array($result)){
 $name=$row['name'];
		}
?>		

		    
<?php
echo "<marquee bgcolor='black'><h3 style= color:#FFFFFF;'> Welcome $name $emp</h3></marquee> " ;
?>
<h1 align="center" ><font color="white">Select your Class</font></h1>
<?php
$sql="SELECT * FROM class where empno='$emp';";
 mysqli_query($db,$sql) or die("Query Failed");
  $result=mysqli_query($db,$sql);
        while($row=mysqli_fetch_array($result)){
        $sub=$row['subid'];
		$subn=$row['subname'];
		
		}
?>
<div class="select-style" align="center">
<form id="form1" name="form1" method="post" action="main.php">
            
			
            <select name='NEW' >
			<option value="">---SELECT---</option>
			<?php
			$sql="SELECT * FROM class where empno='$emp';";
 mysqli_query($db,$sql) or die("Query Failed");
  $result=mysqli_query($db,$sql);
   while($row=mysqli_fetch_array($result)){
        $sub=$row['subid'];
		$subn=$row['subname'];
		?>
		<option value="<?php echo $sub;?>"><?php echo $sub."-".$subn;?></option>
   <?php } ?>
   </select>
  
   <input type="submit" name="Submit" value="Select" />
   </form>
    </div>

</body>