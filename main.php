<?php
  session_start();
  $db=mysqli_connect('localhost','root','','att') or die("Connection failed");
  if ($_SESSION["logged"]!=1)
    header("location: teachlogin.php?err=1");
	$emp=$_SESSION['EMP'];
	echo "<title> Welcome $emp </title>";
	$subid= $_POST['NEW'];
	if(isset($_POST['Submit']))
	{
		$_SESSION['FORM']="1";
	}
	
?>
<html>
<head>
<link rel=stylesheet type="text/css" href="as.css">

<style>
table, td, th {
  border: 1px solid black;

 
}

table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 50px;
}

th {
  height: 50px;
}
tr:hover td{
	
	color: yellow;
}


h3{
	font-family: "Verdana", Times, serif;
	text-align: center;
	color: white;
}
input[type="submit"]{
    /* change these properties to whatever you want */
    background-color: white;
    color: black;
    border-radius: 30px;
	padding: 20px 40px;
	cursor: pointer;
	margin-top: 20px;

}

</style>

<script>
//script here is used for changing color once clicked//
function highlight_row(the_element, checkedcolor) {
	if(the_element.parentNode.parentNode.style.backgroundColor != checkedcolor) {
		the_element.parentNode.parentNode.style.backgroundColor = checkedcolor;
	} else {
		the_element.parentNode.parentNode.style.backgroundColor = '#FF3333';
	}
}
function val()
{
	document.getElementById("chkRow[]").value= "1";
}
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
echo "<marquee bgcolor='black'><h3 style= color:#FFFFFF;'> Welcome $name $emp $subid</h3></marquee> " ;
$qry="SELECT * FROM students where subid='$subid' ORDER BY regno;";
 mysqli_query($db,$qry) or die("Query Failed");
        $result=mysqli_query($db,$qry);
		$count=mysqli_num_rows($result);
?>
<div align="center">
<form id="man" name="man" method="post" action="final.php">
<h3>Select Date</h3>
<?php 

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
<input type="date" value="<?php echo $today; ?>"  id="date" name="date">
</div>
<div style="background-color:lightblue">


<table>
<tr>
<th>Regno</th>
<th>Name</th>
<th>Present Status</th>
</tr>
<?php

        while($row=mysqli_fetch_array($result)){
			$reg=$row['regno'];
			$sname=$row['name'];
		
		
?>

<tr id='chk1'>
<td><?php echo $reg;?></td>
<td><?php echo $sname;?></td>
<td><input type="checkbox" name="chkRow[]" id="chkRow[]" value="Present"onclick="highlight_row(this, 'green');"><input type="hidden" name="chkRow[]" value="Absent"></td>
</tr>
<?php } ?>
</table>
</div>
<center><input type="Submit"><input type="hidden" name="subid" id="subid" value="<?php echo $subid;?>"></center>
</form>



</body>