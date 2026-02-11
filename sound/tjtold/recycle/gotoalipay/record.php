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
	background-image: url(background/Ali10c.jpg);
	background-repeat: no-repeat;
}
    </style>
 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
     <![endif]-->
  </head>  
 </head>
 
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
  
 $sql="update command set command=2";
 mysqli_query($link,$sql);
 
 $sql="select * from command ";
$json=  mysqli_query($link,$sql);
$json=mysqli_fetch_array($json);
$json=$json['userscan'];
$transactionid=$json['transactionid'];
$json=substr($json,-13,13);
 
$sql="select * from user_transaction where transactionid='$transactionid'";
$comresult=  mysqli_query($link,$sql);
$comresult=mysqli_num_rows($comresult);

if($comresult!==0)
{
	$mystr='<div align="left"  ><a href="clz.php" class="btn2" style="margin-top:480px;margin-left:45%;position:absolute">下一步</a> </div>';
}else
{
	 $mystr=$mystr='<div align="left"  ><a href="http://127.0.0.1/tjt" class="btn2" style="margin-top:480px;margin-left:45%;position:absolute">结束</a> </div>';
	
}

 echo $comresult;
	


	
		?>個 x HK$0.1</td>

<td>可回贈HK$<?php echo $comresult;  ?></td>
<tr>
 
 
<tr>
 
</tr>
</table>

    <?php echo $mystr; ?>

<div style="right:90px;margin-top:34%;font-size:32px;position:absolute;color:#FFF">AlipayHK總回贈金額：HK$<?php echo   $comresult*0.1 ; ?></div>
 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳轉
 
// 以下方式定時跳轉
setTimeout("javascript:location.href='clz.php'", 60000); 
</script>
 <embed height="0" width="0" src="../../sound/12.wav" />
</body></html>