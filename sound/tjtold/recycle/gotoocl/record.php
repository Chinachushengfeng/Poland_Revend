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
background-color:#005D30;
	 
	background-repeat: repeat;
	background-image: linear-gradient(#279038, #005d30); 
	 
}
    </style>
 
    <!--font-family: "Arial Black", Gadget, sans-serif;
	   <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
     <![endif]-->
  </head>  
 </head>
 
	  <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
 
 
       <img src="../images/dorecycle.png" style="position:absolute;margin-left:5%;margin-top:10px;opacity:0.9" width=90%> </img>
  
   
	
 	 
     <script type="text/javascript" src="js/timecountdown.js"></script>
 
 
 
 
 
 
 
 
 
 
 
 <hr style="background-color:#ededed;border:none;height:2px;width:90%;margin-left:60px;position:absolute;margin-top:20%">
 <hr style="background-color:#ededed;border:none;height:2px;width:90%;margin-left:60px;position:absolute;margin-top:31%">
 
 
 
 
 
 
<table width="82%" style="margin-left:0px;margin-top:22%;font-size:32px;position:absolute;color:#FFF;">
 


<td width="38%" align="right" >
 成功回收<br>Successful Recycled
</td>

<td align="center"> 

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
$mid=$result['mid']; 
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
	$mystr='<div align="left"  ><a href="index.php" class="btn2" style="bottom:-10px;left:50%;position:absolute;transform:translate(-50%,-50%)">下一步 NEXT</a> </div>';
}else
{
	 $mystr=$mystr='<div align="left"  ><a href=" ../thanks.php" class="btn2" style="bottom:20px;margin-left:42%;position:absolute">結束 END</a> </div>';
	
}

 echo '  <span style="font-size:50px;top:10px;position:absolute">'.$comresult.'</span>';
	
	
	

		if ($comresult==0)
	{
		
		$url="../thanks.php";
		
	}
	else{
		
		//$url="giveup.php";  //../donate.php?donate=rand
		
		$url="../thanks.php";
		
	}
	
	
	 
  $octreceipt= substr($mid,1,4).substr(time(),3,12);
  $octreceipt=intval($octreceipt);
  
   
   
   
   
 $sql="update  ocl  set receipt='$octreceipt'  ";
 mysqli_query($link,$sql);
  
//在user_transaction中寫入發票號
$sql="update  user_transaction  set octreceipt='$octreceipt' where transactionid='$transactionid'";
 mysqli_query($link,$sql);
 
	
 ?>
		
		
		 </td>

<td  width="42%" align="right" ><span style="font-size:32px;border-radius:10px">回贈金額HK  <span style="margin-left:50px;font-size:50px;top:10px;position:absolute">

 $<?php echo number_format(($totalvalue*0.1),1) ;  ?> </span>
<br>
<span  style="font-size:32px; border-radius:10px">
Refund Value
</span>

 </td>


 
</tr>
</table>

<div >

    <?php echo $mystr;
	
	
	 
 $sql="select * from command ";
$result=  mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);

	
	if($result['ishide']==0)
	{
	
	echo '
	
	  
  <div style="right:50px;margin-top:32%;font-size:32px;position:absolute;color:#FFF">八達通回贈後金額 Octopus Rebate Amount：HK$  '. number_format(($value*0.1+$comresult*0.1),1) .'</div>';

	}
else{
	
	
	
	
}



 


 function encrypt($id){
    $id=serialize($id);
		$key=file_get_contents("../../SECRET-AES-256/secret.txt");
   
    $data['iv']=base64_encode(substr($key,0,16));
    $data['value']=openssl_encrypt($id, 'AES-256-CBC',$key,0,base64_decode($data['iv']));
    $encrypt=base64_encode(json_encode($data));
    return $encrypt;
}



function decrypt($encrypt)
{
   	$key=file_get_contents("../../SECRET-AES-256/secret.txt");
    $encrypt = json_decode(base64_decode($encrypt), true);
    $iv = base64_decode($encrypt['iv']);
    $decrypt = openssl_decrypt($encrypt['value'], 'AES-256-CBC', $key, 0, $iv);
    $id = unserialize($decrypt);
    if($id){
        return $id;
    }else{
        return 0;
    }
}
 
 
 
 

 ?>

</div>

 



 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳轉
 
// 以下方式定時跳轉
setTimeout("javascript:location.href='<?php echo $url;?>'",60000); 
</script>
 <embed height="0" width="0" src="../../sound/12.wav" />
</body></html>