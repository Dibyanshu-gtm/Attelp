<?php
$db=mysqli_connect('localhost','root','','att') or die("Connection failed");
$data=''; //storing the data in this object
$subid=$_POST['subid'];
$date=$_POST['date'];

if (isset($_POST["export"])) {
$sql="SELECT regno,name,atten FROM atte where subid='$subid' and date='$date';";
        mysqli_query($db,$sql) or die("Query Failed");
        $productResult = mysqli_query($db,$sql);
	
    if(mysqli_num_rows($productResult)>0)
	{
		$data.='
		<table border="3" style=" text-align:center;">
		<tr>
		<th colspan="3">'.$date.'</th>
		</tr>
		<tr>
		<th>Regno</th>
		<th>Name</th>
		<th>Attendance</th>
		</tr>';
	while($row=mysqli_fetch_array($productResult))
		{
			$data.='
			<tr>
			<td>'.$row['regno'].'</td>
			<td>'.$row['name'].'</td>
			<td>'.$row['atten'].'</td>
			</tr>
			';
		}
		$data.='</table>';
		 header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
    echo $data;
	

	}}
		
		
?>