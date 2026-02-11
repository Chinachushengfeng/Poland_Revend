<!DOCTYPE html>
<!-- saved from url=(0033)http://www.bootcss.com/p/flat-ui/ -->
<html lang="en" class="dk_fouc has-js"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <link rel="stylesheet" href="css/style.css" />
    <title>Flat UI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="./Flat UI_files/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
 
        
    <link href="./Flat UI_files/flat-ui.css" rel="stylesheet"> 
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

.img{
	
border-radius:10%;

	
	
	
	
	}
    body {
	background-image: url(../images/20.jpg);
	background-repeat: no-repeat;
}
    </style> 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
     <![endif]-->
  </head>
  <body>
  <?php 
  
  	  
 include("IncDB.php");

   
 
 
		 
		$sql="update command  SET   scan=0";

mysqli_query($link,$sql);  
 
		
		
		
		
		
		//--------------------以下是给：API准备的数据。
		
  
 $sql="select * from user   ";
 
$result=   mysqli_query($link,$sql); 
$result = mysqli_fetch_array($result);
$mid=$result['mid']; 
$token=$result['token'];
 $user=$result['user'];
 $cishu=$result['cishu'];



		
		  
 $sql="select * from command   ";
 
$result=   mysqli_query($link,$sql); 
$result = mysqli_fetch_array($result);

$hdjl=$result['hdjl']; 

$sql="update user set totalspendpoint = totalspendpoint+50 ";
mysqli_query($link,$sql);


$sql="select *from onsitereward where doup = 1 and upddsapi=1";  //查询等待上传的
$onsitereward=mysqli_query($link,$sql);
$onsitereward=mysqli_fetch_array($onsitereward);

 
  $dateline=time();
if (!$onsitereward['rewardsku'])
{ 
 
				$sql=" insert into onsitereward (rewardsku,dateline,user,doup,upddsapi,qty,pointamount ) 
			  	VALUES   ('onsitereward','$dateline','$user',1,1,1,50 )";

 
 mysqli_query($link,$sql);
 
}
else    
{
  
$sql=" update   onsitereward set qty=qty+1 where upddsapi=1 ";

mysqli_query($link,$sql);

}




		
		
 $auth_url = 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/getgift.php?mid='.$mid.'&user='.$user.'&gift=430mlWATSONSWATER'.'&huodao='.$hdjl;
 
 
 
$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT,28); 
 
$response = curl_exec($ch); 
curl_close($ch); 

//echo var_dump($response);   
 if (strlen($response)==79)
	 
 
 {	 
	 $sql="update command  set hdjl=0";
	 
	 mysqli_query($link,$sql);
	// echo "ok";
	  
	 
	 
	 	
 $auth_url = 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/getgift.php?mid='.$mid.'&user='.$user.'&gift=50分即时兑换'.'&huodao=1';
 
 
 
$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT,28);
curl_setopt($ch, CURLOPT_SSLVERSION, 1);
 
$response = curl_exec($ch); 
curl_close($ch); 

	 
	 
	 
	 
 }
 
  ?>
  <table width="621" border="0" align="center" cellspacing="0"  style="margin-left:15%" >
    <tr>
      <td height="113" colspan="2" align="center"><div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      <div></div></td>
    </tr>
    <tr >
      <td colspan="2" align="center"   >  
      <p> <br><br>   	
	  
	  
	  
 


<?php   


if ($cishu==10)
{	


 echo ' &nbsp;&nbsp;&nbsp;&nbsp; <a href="qsh.php?url=thanks"class="btn2" style="margin-left:-330px">結束回收</a>';
 
	 
   
}
elseif($cishu<10)

{
	
echo '	  <div align="center"  ><a href="qsh.php?url=thanks" class="btn2" style="margin-left:-250px">結束回收</a>  <a href="index.php" class="btn2" >繼續投放</a>
   ';
	
}	
   
   
   
   ?>
   
   
   
   

   </td>
      
      
      
   
       
    </tr>
    <tr>
      <td width="228" height="121" align="left"><div align="center"></td>
      <td width="389" align="left"><div class="span3" align="center" >
     
      </div></td>
    </tr>
  </table>
 </head>
<body>
	 
	 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>

  <?php
 
	  /* 
 include("IncDB.php");
		


 

  
 $sql="select * from   command    ";
 
$result=mysqli_query($link,$sql); 
 
	 $row= mysqli_fetch_array($result);
	   
 
	  $hdjl=$row['hdjl'] ;

 
$thejl=$hdjl % 18 +1 ;
   
		
		
   $sql="UPDATE command SET huodao=$thejl,hdjl=hdjl+1  ";
 
   mysqli_query($link,$sql); 
 */
		
		
	 	
 	
 	
		
		
		?>
	
	
 	
     <script type="text/javascript" src="js/timecountdown.js"></script>
 
 

 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
setTimeout("javascript:location.href='../../tjt/index.php'", 60000); 
</script>
 <embed height="0" width="0" src="../../sound/20.wav" />
</body></html>























































