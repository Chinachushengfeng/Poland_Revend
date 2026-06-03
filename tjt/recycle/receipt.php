 <html lang="en" class="dk_fouc has-js"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>屈臣氏</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
 

    <!-- Loading Flat UI --> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
   
	    <link rel="stylesheet" href="css/dengdaitouping.css">
     
 	 
	 <script src="js/myjs.js"></script>
 
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 691px;
	top: 1340px;
	width: 95px;
	height: 344px;
	z-index: 1;
}
body,td,th {
	font-family: Lato, sans-serif;
}
  body {
		background-repeat: repeat;
 				background-image: linear-gradient(#08eed5, #007573);
 			font-family: "Arial Black", Gadget, sans-serif;
}
 
    ::-webkit-scrollbar {
        display: none;
    }
    html {
        scrollbar-width: none;
    }
 
#apDiv2 {
	position: absolute;
	left: 34px;
	top: 262px;
	width: 135px;
	height: 305px;
	z-index: 2;
}

#apDiv3 {
	margin-top:550px;
 margin-left:-1121px ;
	
	
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
</style> 
 

</head>

 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>

 
    
<?php 
include ("incdb.php");
error_reporting(0); 
 // $sql="SELECT SUM(value) as totalvalue from  user_transaction where user='$user' and transactiondone='0' and recognitionstatus="1""; 
// $result=mysqli_query($link,$sql);
// $result=mysqli_fetch_array($result);
// $totalvalue=$result['totalvalue'];

include("function/sql.php");

$sql="select * from command ";
$result=  mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$transactionid=$result['transactionid'];



$sql="update user_transaction set  transactiondone=1 where transactionid='$transactionid'   ";    //1=完成增值,2是只是用户点击了结束。 
mysqli_query($link,$sql);

			 
			 
			 
$sql="select * from user_transaction where transactionid='$transactionid' ";
$comresult=  mysqli_query($link,$sql);
$comresult=mysqli_num_rows($comresult);
 
	 
$mid=select("command","mid");
 
$userscan= select("command","userscan");
$can= select("command","can");
$bottle= select("command","bottle");
if($comresult==0)
{
    header("Location:../index.php"); 
}

 
 



?>
 
   
	<div class="container" style="position:absolute;margin-top:20%">
		<div class="row" style="padding:2em 0">
			 
			 
		</div>
	</div>
 
 
<div id="bottle-num">   </div> 

  
  
   </div>
</div>
<!--- <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>  
 
 -->
 <div align="center" style="margin-top:120px">
 <strong  style="font-size:48px;font-weight:bold"><b><?php echo selectword('Electronic Receipt');	?><br> </strong>
</div>
 
 	<hr style="background-color:#ededed;border:none;height:2px;width:90%;margin-left:60px;position:absolute;margin-top:-1%">

 <table width=100%  style="margin-top:30px;margin-left:55px" >

			 
				
		
				<tr>
				
 	<td width=50% align="left" style="font-size:28px  " > 
				 RVM ID ： 
				
				</td>
				
			
 

				
			<td width=40% align="right" style="font-size:28px  " > 
			
			<?php echo $mid;?>
				
				</td>
</tr>












				<tr>
				
 	<td width=50% align="left" style="font-size:28px  " >  <?php echo selectword('User number:');?>   
				
				</td>
				
			
 

				
			<td width=40% align="right" style="font-size:28px  " > 
			
 


<?php 
				//  echo  substr($userscan,0,1).'****'.substr($userscan,-3);
				 
				 echo '/';
				
		$sql="update command set command=2 ";//標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
mysqli_query($link,$sql);
		
		 
		
		
		
		
		
		
		
				?>

				
				</td>
</tr>





	<tr>
				
 	<td width=50% align="left" style="font-size:28px  " > 
				 <?php echo selectword('Value Added Success');?> 
				
				</td>
				
			
 

				
			<td width=40% align="right" style="font-size:28px  " > 
			
			<?php echo date('Y-m-d H:i:s',time());?> 
				
				</td>
</tr>




				<tr>
				
 	<td width=50% align="left" style="font-size:28px  " > 
			   
				 <?php echo selectword('Order Number：');?> 	
				</td>
				
 

				
			<td width=40% align="right" style="font-size:28px  " > 
			
 
					<span id="msg"  ><?php echo $transactionid; ?></span>  
				</td>
</tr>








		
				<tr>
				
 	<td width=50% align="left" style="font-size:28px  " > 
		    
		Plastikowa butelka:		
				</td>
				
 

				
			<td width=40% align="right" style="font-size:28px  " > 
	 
					<span id="msg"  > <?php echo $bottle ;  ?></span>  
				</td>
</tr>




				<tr>
				
 	<td width=50% align="left" style="font-size:28px  " > 
		    
		Puszki aluminiowe:	
				</td>
				
 

				
			<td width=40% align="right" style="font-size:28px  " > 
			
 
					<span id="msg"  > <?php echo $can ;  ?></span>  
				</td>
</tr>


 
				<tr>
				<td width="244" align="center" style="font-size:28px ;font-weight:bold;" >
				
				
				</td>
				<td width="431" align="left" ><span class="bianjiziti" style="font-size:30px" ><strong>
 
				</strong></span></td>
				  <td>&nbsp;</td>
				<td>
				
				 
				</td>

				</tr>
				
				
					<tr>

 
		<td  width="200" align="center" style="font-size:20px ;font-weight:bold;" ><strong style="color:green; background-color:#fff;border-radius:10px"> </strong>
		 
		</td>
		
		
	 
		 
 
				</tr>
					
				 
        </table>
 
			<hr style="background-color:#ededed;border:none;height:2px;width:90%;margin-left:60px;margin-top:-10px">
		 

		
      </div> 
       


<div align="center" style="font-size:20px">  <?php echo selectword('take photo');?>   </div>	 

 
       
   
 	<div align="center">
<a  href="thanks.php"> <img src="images/gou.gif?<?php echo rand(1,9999);?>" style="border-radius:70%;margin-top:5%" width=10% ></img> </a>
   </div>  
   

 	
     <script type="text/javascript" src="js/timecountdown.js"></script>
 
 

 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳轉
 
// 以下方式定時跳轉
 
setTimeout("javascript:location.href='thanks.php'", 5000); 
 


</script>
<br>

 
 <embed height="0" width="0" src="http://127.0.0.1/sound/Completed.wav" />
 
 
 


