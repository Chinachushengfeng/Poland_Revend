<?php
error_reporting(0);
 include("IncDB.php");  //   
   

$task=$_GET['task']; 
$value=$_GET['value']; 
$cardid=$_GET['cardid']; 
$returncode=$_GET['returncode'];
$lastdate=$_GET['lastdate'];

if ($task=="done" && $value && $cardid && $lastdate)
	
{
	
 
 
// if task=2 it means that task have been end;

 $sql="update ocl set task=2 ,value='$value',cardid='$cardid',lastdate='$lastdate' ";   
mysqli_query($link,$sql);

} 
if ($task=="timeout" )
	
{
	
 
 
// if task=2 it means that task have been end;

 $sql="update ocl set task=5";   
mysqli_query($link,$sql);

} 

if ($returncode )
	
{
	
 
 
// if task=2 it means that task have been end;

 $sql="update ocl set returncode='$returncode'" ;   
mysqli_query($link,$sql);

} 
 



	 $sql="select * from ocl";   // 
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);  

$mysqltask=$result['task'];
$qty=$result["qty"];
echo $mysqltask.$qty;

 




?>