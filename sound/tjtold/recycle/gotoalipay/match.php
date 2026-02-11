
<!DOCTYPE html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>屈臣氏</title>
  
    <!-- Loading Bootstrap -->
    <link href="./Flat UI_files/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
    <!-- Loading Flat UI --> 
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
	background-image: url(background/info.jpg);
	background-repeat: no-repeat;
}
    </style>
 
    <p>
      <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
      <!--[if lt IE 9]>
     <![endif]-->
      </head>
      
   
      
       
      
<body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
 
   
      
      
  </head>
  <body> 
 
 <div class="wenzi ">
 
 
</div>
 </div>
</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 
 
 
<div style="font-size:45px;margin-top:-32%;margin-left:5%">用户信息不匹配：</a>


 
         <table width="1000"  style="margin-top:1px;margin-left: 5px" >

				<tr>
				
				<td width="100" align="center" style="font-size:28px ;font-weight:bold;" ><strong style="color:green; background-color:#fff;border-radius:10px">
				回赠卡号：
				
				   <?php
 
 
  include("IncDB.php");
 
 $sql="select * from command ";
 $result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);

$userscan=$result['userscan'];
  
  
  $userscanlen=strlen($userscan);
  
  if ($userscanlen==32)
  {
  $userscan=substr($userscan,-13,13); 
  $typestr="支付宝用户";
  $startstr="开始回收";
 
  	   $url="dorecycle";
	   
	   
  }
  elseif($userscanlen==8)  {
		
	 
		  $typestr="八达通用户";
		  $startstr="开始回收";
		  
		  
		  
		   	   $url="dorecycle";
	  }
	  else{
		  
		   $typestr="无法识别";
		  $startstr="结束 END";
		  
		  
		  
		   $url="../index.php";
	  }


$sql="select * from user_transaction where transactiondone=0  ";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
 
  $nomalstr=$result['user'];
 
  
 
?>




</strong>
				
				</td>
				
				<td width="300" align="left" ><span class="bianjiziti" style="font-size:30px" ><strong>

				<span >  <?php echo   $userscan;?></span>
				
				 
				</strong></span>
				
					 
					 </td>
			 
			   <td>&nbsp;</td>
			 	
				<td width="400" align="left" ><span class="bianjiziti" style="font-size:30px" ><strong>

				<span  style="font-size:25px;font-weight:bold;">用户类型：<?php echo $typestr;?></span>
				
				 
				</strong></span>
				
					 
					 </td>
				</tr>

 
				<tr>
				<td width="244" align="center" style="font-size:28px ;font-weight:bold;" >
				<strong style="color:green; background-color:#fff;border-radius:10px">登录卡号：</strong></td>
				<td width="431" align="left" ><span class="bianjiziti" style="font-size:30px" ><strong>


 
				<span  ><?php echo $nomalstr;?></span>   
				
				
			 
				 
        </table>



 <div  style="margin-left:37%;margin-top:15%">
 <a href="gotoscan.php" class="btn2"> 
 
 
上一步
 
 </a></div>
 
  
 
 
 <p>&nbsp;</p>
 <p>&nbsp;</p> 
 <p>
 
    
     




   <script type="text/javascript" src="js/timecountdown.js"></script>
 </p>
    <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
setTimeout("javascript:location.href='qsh.php?url=thanks'", 60000); 
     </script>
 
  
</body></html>
