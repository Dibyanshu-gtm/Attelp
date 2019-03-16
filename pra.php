<?php
header('Content-Type: application/json');
 $db=mysqli_connect('localhost','root','','att');
$reg="17BCE1328";

$sql="SELECT subid from students where regno='$reg' ORDER BY subid;";
$data=array();
$dataf=array();
$res=mysqli_query($db,$sql);
foreach($res as $row)
{
$k=0; //k is used here for storing the no of days a guy is present

$subid=$row['subid'];
$data['subid']="$subid";
$sql2="SELECT atten FROM atte where regno='$reg'and subid='$subid';";

$r=mysqli_query($db,$sql2);
$tot=mysqli_num_rows($r);
foreach($r as  $ro)
{
$a=$ro['atten'];
if ($a=="Present")
{
	
$k=$k+1;
}
}
if($tot==0)
{

	$fra=0;
}
else
{
$fra= $k/$tot;
}

$fra=$fra*100; //fra is the final attendance percentage


$data['at']=$fra;
$dataf[]=$data;
}
echo json_encode($dataf); //encoding json array with the data which we found
?>