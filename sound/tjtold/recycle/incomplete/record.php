<!DOCTYPE html>
<!-- saved from url=(0033)http://www.bootcss.com/p/flat-ui/ -->
<html lang="en" class="dk_fouc has-js"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>record</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="./Flat UI_files/bootstrap.min.css" rel="stylesheet">
  
    <!-- Loading Flat UI --> 
    <link rel="stylesheet" type="text/css" href="css/style2.css">
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
	background-image: url(images/Ali10c.jpg);
	background-repeat: no-repeat;
}
    </style>
 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
     <![endif]-->
  </head>  
 </head>
<body>
	  <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
 
 
	
	
 	 
     <script type="text/javascript" src="js/timecountdown.js"></script>
 
 
 
<table width="1000px" style="margin-left:75px;margin-top:24%;font-size:32px;position:absolute;color:#FFF">


<tr>
<td width="300px">
  成功回收:
</td>

<td> 

<?php  	  

  include("IncDB.php");
  
  $sql="select * from ocl ";
$result=  mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$value=$result['value'];
	
	
	
 $sql="update command set command=2";
 mysqli_query($link,$sql);
 
 $sql="select * from command ";
$result=  mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$transactionid=$result['transactionid'];
$mid=substr($result['mid'],1,5); 
$device=$result['device'];
 
 
 $sql="select * from user_transaction where transactionid='$transactionid' and recognitionstatus=1";
$comresult=  mysqli_query($link,$sql);
$comresult=mysqli_num_rows($comresult);
	
	 
$sql="select sum(bottlevalue) as totalvalue from user_transaction where transactionid='$transactionid'and recognitionstatus=1";
$totalvalue=  mysqli_query($link,$sql);
$totalvalue=mysqli_fetch_array($totalvalue);
$totalvalue=$totalvalue['totalvalue'];
 

	
if($comresult!==0)
{
	$mystr='<div align="left"  ><a href="index.php" class="btn2" style="margin-top:480px;margin-left:45%;position:absolute">下壹步</a> </div>';
}else
{
	 $mystr=$mystr='<div align="left"  ><a href=" ../thanks.php" class="btn2" style="margin-top:480px;margin-left:45%;position:absolute">結束</a> </div>';
	
}

 echo $comresult;
	
	
	

		if ($comresult==0)
	{
		
		$url="../thanks.php";
		
	}
	else{
		
		$url="giveup.php";  //../donate.php?donate=rand
	}
	
	
	
	
	
	
	
		 
  $octreceipt=time();
  
  
  
//在user_transaction中寫入發票號
$sql="update  user_transaction  set octreceipt='$octreceipt' where transactiondone=0 and uploaddone=0";
 mysqli_query($link,$sql);
 
 $sql="update  ocl  set receipt='$octreceipt'  ";
 mysqli_query($link,$sql);
	
 ?>
		
		
		個 x HK$0.1</td>

<td>回贈金額HK$<?php echo $totalvalue;  ?></td>
<tr>
 
 
<tr>
 
</tr>
</table>

    <?php echo $mystr;
	
	
	 
 $sql="select * from command ";
$result=  mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);

	
	if($result['ishide']==0)
	{
	
	echo '
	
	 <div style="right:90px;margin-top:32%;font-size:32px;position:absolute;color:#FFF">八達通當前金額：HK$  '.$value*0.1 .'        </div>
<br> <div style="right:90px;margin-top:34%;font-size:32px;position:absolute;color:#FFF">八達通回贈後金額：HK$  '.($value*0.1+$comresult*0.1) .'</div>';

	}
else{
	
	
	
	
}


 ?>



 



 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳轉
 
// 以下方式定時跳轉
setTimeout("javascript:location.href='<?php echo $url;?>'",60000); 
</script>
 <embed height="0" width="0" src="../../sound/12.wav" />
</body></html>