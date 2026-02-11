<!doctype html> 
<html lang="en" class="no-js"> 
<head> 
  <meta charset="utf-8" /> 
  <title></title> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <meta charset="utf-8" http-equiv="refresh" content="10;url=index.php">
  <link rel="stylesheet" href="css/style.css" />
  <style type="text/css">
   body,td,th {
	font-family: Lato, sans-serif;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
    body {
	background-repeat: no-repeat;
	background-image: url(
images/wait.jpg);
	 background-color:#076b2f;
}

 
  </style>
  
  
 
 
 
  <div align="center" style="margin-top:20%;margin-left:20%;font-size:100px"><?php 
   
   
   
    include("IncDB.php");
include("word_function/sql.php");
echo select('RVM is overfull');
echo '<br>';	
 



?></div>
    
	
   <div align="center" style="margin-top:10%;position:absolute;margin-left:50%;margin-top:5%;font-size:50px"><?php 
   
 echo select('suspend');
?>
 </div>
 
    <img  src="images/overfull.png" style="position:absolute;margin-left:10%;margin-top:-18%" width=15%> </img>
 
 
  <?php 
  
error_reporting(0);
date_default_timezone_set("PRC");
$nowtime=time();

if(!$_COOKIE["emailtime"])
{
	 
	setcookie("emailtime",$nowtime);
email();
exit;
}



 
$cookiesemailtime= $_COOKIE["emailtime"];


if(($nowtime-$cookiesemailtime)>7200)
{
	setcookie("emailtime",$nowtime);
 email();
}





function email()
{
	
	
include("IncDB.php");
 
 
   $mysql = "select * from command ";
    $result = mysqli_query($link, $mysql);
    $result = mysqli_fetch_array($result);
    $mid = $result['mid'];
	
$url="http://machineback.com/rvmalert?mid=".$mid."&content=RVM Full，need empty";
		 
		 
	 
		 

 
// getcharity?lang=zh
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url); //這裏是判斷網絡狀況  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 28);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSLVERSION, 1);

 curl_exec($ch); 
 

//email 报警endendendendendendendendendendendendendendendendendendend：

 




}











?>


    <a href="http://127.0.0.1/tjt/" class="btn bottombtn" style="top:90%;left:50%;position:absolute;transform:translate(-50%,-50%);width:15%">
	
	
	
 
	</a>
	 