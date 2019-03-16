<?php
  session_start();
  $db=mysqli_connect('localhost','root','','att') or die("Connection failed");
  if ($_SESSION["logged"]!=1)
    header("location: teachlogin.php?err=1");
	$emp=$_SESSION['EMP'];
	echo "<title> Welcome $emp </title>";
    $date=$_POST['date'];
	$subid=$_POST['subid'];
	
?>
<html>
<head>
<link rel=stylesheet type="text/css" href="as.css">
<style>
table, td, th {
  border: 1px solid white;
  color:white;
 
}

table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 50px;
}

th {
  height: 50px;
}
</style>
<script>
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
//Taking the inputs and storing in a final table for the attendance values//
echo "<marquee bgcolor='black'><h3 style= color:#FFFFFF;'> Welcome $name $emp $subid</h3></marquee> " ;
$qry="SELECT * FROM students where subid='$subid' ORDER BY regno;";
 mysqli_query($db,$qry) or die("Query Failed");
        $result=mysqli_query($db,$qry);
		$count=mysqli_num_rows($result);
		$k=0;
		$sql="SELECT regno,name,atten FROM atte where subid='$subid';";
        mysqli_query($db,$sql) or die("Query Failed");
        $productResult = mysqli_query($db,$sql);
		
		$sw="SELECT date from atte where subid='$subid' AND date='$date';";
		mysqli_query($db,$sw) or die("Query Failed");
        $res=mysqli_query($db,$sw);
		$cc=mysqli_num_rows($res);
           
		echo "The Attendance For.$date";
        if($cc!=0)
		{
		   $message = "Day's Attendance already taken";
          echo "<script type='text/javascript'>alert('$message');</script>";
		  header("refresh:5; url:teach1.php");
		}
		else
		{
        
        while($row=mysqli_fetch_array($result)){
			
			$reg=$row['regno'];
			$sname=$row['name'];

		
   
		$vaar=$_POST['chkRow'];
		$c=sizeof($vaar);
		for($i=0;$i<$c;$i++)
		{
			if($vaar[$i]=="Present")
			{
				 array_splice($vaar,$i+1,1);
				 $c=$c-1;
			}
	        
		}
		
		
        while($k<$c){		
		  
	
		  
		
		
	  $sql="INSERT INTO atte(regno,name,subid,date,atten) VALUES('$reg','$sname','$subid','$date','$vaar[$k]')";
	  mysqli_query($db,$sql) or die("Query Failed");
	  $k=$k+1;
	  break;
	  
	 
	}
	
		
	}
	
	



		}
		
?>

<table>
<tr>
<th>Course ID</th>
<th>Course Name</th>
<th>No of Students Present</th>
</tr>
<?php 
$sq="SELECT s1.subid,s1.subname,COUNT(s2.atten) AS Count FROM class s1,atte s2 where s1.subid=s2.subid and s2.atten='Present' and s2.date='$date' and s1.subid='$subid';";
mysqli_query($db,$sq) or die("Query Failed");
        $qw=mysqli_query($db,$sq);
		$final=mysqli_fetch_array($qw)
?>
<tr>
<td><?php echo $subid?></td>
<td><?php echo $final['subname']?></td>
<td><?php echo $final['Count']?></td>
</tr>
</table>
<form action="export.php" method="post">
<input type="hidden" name="subid" id="subid" value="<?php echo $subid;?>">
<input type="hidden" name="date" id="date" value="<?php echo $date;?>">
            <button type="submit" id="btnExport" name='export'
                value="Export to Excel" class="btn btn-info">Export to
                excel</button>
        </form>

</html>