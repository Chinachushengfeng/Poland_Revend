     <!DOCTYPE html>
<html oncontextmenu="return false" onselectstart="return false" oncopy="return false">
  <link rel="stylesheet" href="../css/style.css" />
<head>
    <title>智能回收機</title>

    <link href="css/style2.css" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="js/myjs.js"></script>
    <script type="text/javascript" src="js/jq.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>


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
 
	background-repeat: repeat;
	background-image: linear-gradient(#279038, #005d30); 
	 
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
 
 
 
<body >

      
 <?php
 
 	date_default_timezone_set("Asia/Shanghai");  
include("IncDB.php");
			
error_reporting(0);			
 $returncode=$_GET['returncode'];
 $sql="select * from ocl ";
 $result=mysqli_query($link,$sql);
 $result=mysqli_fetch_array($result);

$task=$result['task'];

 
 $sql="select * from command ";
 $result=mysqli_query($link,$sql);
 $result=mysqli_fetch_array($result);

 
$userscan=   $_COOKIE["user"];
$mid=$result['mid'];
 
$sql="update ocl set task=2 ";
mysqli_query($link,$sql);

$sql="select * from ocl";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$content=$result['text'];
//$cardid=$result['cardid']; 
//$qty=$_GET['qty'];


 
$value=$result['value'];

 

 
 
$datetime=time(); 


 
 
 
 
 
  
 if ($returncode=="100016" || $returncode=="100017" || $returncode=="100034" || $returncode=="100032" || $returncode=="100020" )
{
	echo ' <embed height="0" width="0" src="http://127.0.0.1/sound/Please try again.wav" />';

	$codestr="請再次拍卡<br>please tap card again";
}
 
elseif ($returncode=="100019" ||$returncode=="100024" || $returncode=="100021" || $returncode=="100035" )
{
			$codestr="此卡失效。請使用另一張八達通卡<br>Invalid Octopus.Please use another Octopus";
}  

 
 
 


elseif ($returncode=="100022" || $returncode=="100025"  )
{
	
	$codestr="  請勿取消交易   <br>Do not cancel the transaction<br> 交易未能完成 <br>Transaction failed to complete
	請用同一張卡 <br>Please use the same card<br>
再次拍卡，以確保交易無誤<br>Tap the card again to make sure the transaction is correct";

$sql="update ocl set task=1,value=0";
mysqli_query($link,$sql);
 
}

 
elseif (isset($_GET['equal'])  )
{
	
	$codestr="交易未能完成。請再次拍卡<br>Incomplete transaction.Pleaser retry <br>with the same Octopus<br>  
	
	<br>請重試(八達通號碼".$userscan.")<br>Retry please(Octopus no.".$userscan.")<br>";

}

 
elseif ($returncode=="100049"  )
{
	$codestr="卡上儲值額超出上限<br>Stored value on card exceeds limit.<br> ";
}
 
 
elseif ($returncode=="100050"  )
{
	
 
 $codestr="機器故障，請致電技術支援熱線：94880277 <br>Machine out of order. <br>Please contact Technical Service<br>Hotline on 94880277 for assistance";

error_reporting(0);
 
  
  $content=str_replace(" ","",$content);
   //echo var_dump($content);
   //要註意 先轉圈圈再載入本頁
   
$auth_url = 'http://127.0.0.1/email/index.php?mid='.$mid.';八達通100050故障：'."&content=VersionInfo:".$content;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT,28);
$response = curl_exec($ch); 
curl_close($ch);
 
 
 
     $sql = "update ocl set task=9,xfileupload=0"; //告訴ocl.exe處理100050錯誤，call init載入最新的交換文件，和配額文件。 註意 xfile 只能生產壹次！
    mysqli_query($link, $sql);
	
	
 
 
 
}
 
 
 
else
{
	  
 
$codestr="機器故障，請致電技術支援熱線：94880277 <br>Machine out of order. <br>Please contact Technical Service<br>Hotline on 94880277 for assistance";
$auth_url = 'http://127.0.0.1/email/index.php?mid='.$mid.';八達通故障：Errorcode='.$returncode."&content=八達通故障";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT,28);
$response = curl_exec($ch); 
curl_close($ch);




}
 



$sql="update ocl set  cardid=0";
mysqli_query($link,$sql);




$bj100022=$_GET['bj100022'];
 
 ?>
 
  
 
 
   


	    <script type="text/javascript" src="js/timecountdown.js"></script>
  
 <div style="margin-top:10%">
	<div style="font-size:50px;text-align:center"> <?php 
		
		if($returncode)
		{
			
 	echo $returncode;
		
		}
		
		;?></div>
		<div style="font-size:25px;text-align:center">   </div>
	   <div style="font-size:25px;text-align:center;margin-top:20px"> <?php echo $codestr;?></div>
 </div>
 
 
	  
	   

	   <?php 
	   
	   
	   	
$sql="select * from   command     ";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$userscan=$result['userscan'];  


if($returncode=="100001" ||$returncode=="100024" ||$returncode=="100021" ||$returncode=="100048" ||$returncode=="100049" ||$returncode=="100050" ||$returncode=="100051" )
{

$str="結束 END";
$url="100022endfail.php";
 
}
else{
	
	
	$str="Back";
	$url="index.php";
	
}

if ($bj100022=="1")
{
	
echo '   <div style="font-size:25px;text-align:center;margin-top:20px">請重試 <br> (八達通號碼:'.$userscan.') <br>';

 
}

else{
	
	
}
 
	   if ($returncode=="100022" || $returncode=="100025"  )
	   {
		    echo '<a href="index.php"> <input type="button" id="daojishi" class="btn2"  style="width:25%;margin-left:37%;font-size:35px"  value="22 Second " disabled="disabled" /> </a>';
	   }
	   else
	   {
		   
		     echo '<div align="center"> <a href="'.$url.'" class="btn" style="margin-top:10%">'.$str.'</a> </div>';
			 
	   }
	   
	   
	   ?>
	   
	   
         
	      
	 
	 
 
	 
	 
	 
	 
	 
	 
	 
  <script type="text/javascript" src="js/timecountdown.js"></script>
  
 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳轉
 
// 以下方式定時跳轉
 

setTimeout("javascript:location.href='100022endfail.php'", 60000); 

</script> 
 
 
 
  <span  id="daojishi"  style="color:white;left:93%;font-size:50px;top:0%;position:absolute"     disabled="disabled">60</span>
 

		  
		  
		  
	      <script>
      var tim=59;
      function aaa(){
        var btnn=document.getElementById("daojishi");
		
  document.getElementById("daojishi").innerHTML= ''+tim+'';
		 
      
          tim--;
		  
		  if (tim<0)
		  {
			    document.getElementById("daojishi").innerHTML= '';
		 
		  }
      }
      setInterval("aaa()",1000);
    </script>   

</body></html>