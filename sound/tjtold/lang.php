<!doctype html> 
<html lang="en" class="no-js"> 
<head> 
  <meta charset="utf-8" /> 
  <title> 屈臣氏</title> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" />
  <style type="text/css">
  #apDiv1 {
	position: absolute;
	left: 755px;
	top: 302px;
	width: 355px;
	height: 336px;
	z-index: 1;
}
  body {
	background-image: url(images/03.jpg);
	background-repeat: no-repeat;
}
  #apDiv2 {
	position: absolute;
	left: 54px;
	top: 213px;
	width: 413px;
	height: 115px;
	z-index: 1;
}
  </style>
 
</head> 
 <include src="restart.php"><include> 

 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
<div   class="wenzi" aline-    >
  <blockquote>
 
  </blockquote>
 </div>
<div id="particles">
	<div class="intro">
    <br><br><br><br>
	  <h1 style="margin-left:0px"><a href="login/index.php?lang=2" class="btn2">中文繁體</a>
       <span class="btn2">English    </span> </h1>
  
    <script type="text/javascript" src="js/timecountdown.js"></script>
 
 
 
  <?php

 
 

  include("IncDB.php");
			
	$sql="update ocl set task=2,cardid=0";//标记结束transaction    //每次在载入首页时候会检查是否有0标记并上传。
mysqli_query($link,$sql);	 

 
 
 /* 
 $nowdate=date("His",time());
 
 
   $sql="update command set  scan=0";
	 
 mysqli_query($link,$sql);	
	
$auth_url = "https://uat.ww-fun.club/rvmapi/getbottlepointmapping";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
$response = curl_exec($ch);


if(curl_errno($ch))
{
	print curl_error($ch);
}
curl_close($ch); 
$response = json_decode($response, true);

 

$response=  $response ['data']    ;

$i=array();
$a=-1;
foreach ($response as $value) {
	
	 
	$a=$a+1;
	
$i[$a]=   $value['point'] ;   
}
 
 
  
   
	 $sql="update user SET qcsbottle= '$i[1]', otherbottle= '$i[2]' ";
 //注意，他给了3个值，所以有3个下标记
 mysqli_query($link,$sql);  
 
  */
 
 
 



 
 
 
 
	 
 
 
?>






























  </div>
</div> 
</div>


 
 
 <embed height="0" width="0" src="../sound/03.wav" />
 
<p>&nbsp;</p>
 
</body> 
</html> 