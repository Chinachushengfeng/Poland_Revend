<!DOCTYPE html>
<!-- saved from url=(0035)https://www.bootcss.com/p/flat-ui/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Flat UI</title>
	
	 <link href="css/style.css" rel='stylesheet' type='text/css' />
 
 
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="./Flat UI_files/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="./Flat UI_files/flat-ui.css" rel="stylesheet">
    
	
	
 <link href="css/style.css" rel='stylesheet' type='text/css' />

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
	background-image: linear-gradient(#279038, #005d30); 
	
	 
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
 
 	date_default_timezone_set("Asia/Shanghai");  
include("IncDB.php");
				 
 
 	    
  $sql="select * from command ";
 $result=mysqli_query($link,$sql);
 $result=mysqli_fetch_array($result);

$mid=$result['mid'];
$device=$result['device'];
$value=$result['uservalue'];
$transactionid=$result['transactionid'];

 

if (substr($value,0,1)=="-")
{
	$fuhao='-';
	$value=abs($value);
}
else
{
	$fuhao='';
	
}

 
 
$sql="update ocl set task=2";
mysqli_query($link,$sql);
	
	
 
 $sql="select sum(bottlevalue) as total from user_transaction where recognitionstatus=1 and transactionid='$transactionid'   ";
$bottlevalue=mysqli_query($link,$sql);
$bottlevalue=mysqli_fetch_array($bottlevalue);
$bottlevalue=$bottlevalue['total'];  //總價值
  $qty= $bottlevalue  ;
	 
	 
	 
$sql="select * from ocl";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$cardid=  $_COOKIE["user"];
$lastdate=$result['lastdate'];
  $octreceipt=$result['receipt'];
	$addvaluetime=$result['addvaluetime'];
	
	if(!$addvaluetime)
	{
		$addvaluetime=time()-3;
	}
	
	
$ishide=$result['ishide'];

$datetime=time();
 
 
 
$addvalue=$qty*0.1;
$remainvalue=$value*0.1;



if(!$ishide)
{
	$yuestr='     <li><div> <div style="float:left">餘額(Remaining value):</div><div  style="text-align: right"> '.$fuhao.'$'.number_format(($remainvalue),1) .'</div></div></li>		';
	 
	$chaxunstr="";
	
}

else
{
	 
		$yuestr='';


	$chaxunstr="妳可於八達通App查閱餘額<br>You may check Remaining Value on Octopus App";
	
	
	
	
}



 

 $sql="update user_transaction set transactiondone=1 where transactionid='$transactionid'";         //標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
mysqli_query($link,$sql);
 
 
 
  
 /* 
$auth_url = "http://117.18.4.20/hbs/urlget/getdataback.php?mid=m099&isqcs=0&isother=".$qty."&user=".$cardid."&rongliang=0&juli=0";
              
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5); 
$response = curl_exec($ch); */


 ?>
 
 
          <div class="span5" style="margin-left:20%;margin-top:1%;width:60%;height:50%">
            <div class="footer-banner" style="border-radius:2%;font-size:20px">
			
               <h3   style="font-size:30px;margin-left:100px"><b>電子收據 Electronic Receipt</b></h3>
              <ul>
                <li><div> <div style="float:left">日期/時間(Date/Time):</div><div style="text-align: right"><?php echo date("Y-m-d",$addvaluetime).'&nbsp;&nbsp;'.date("H:i:s",$addvaluetime) ; ?></div></div></li>
                <li><div> <div style="float:left">智能回收機編號(RVM ID):</div><div style="text-align: right"><?php echo $mid ; ?></div></div></li>
                <li><div> <div style="float:left">機號(Device no.):</div><div style="text-align: right"> <?php echo $device ; ?> </div></div></li>
                <li><div> <div style="float:left">收據號碼(Receipt no.):</div><div style="text-align: right"><?php echo $octreceipt; ?></div></div></li>
       <!--         <li><div> <div style="float:left">總額(Total):</div> <div style="text-align: right"><?php echo $addvalue  ;?></div></div></li>  -->
		 
				<li style="font-size:26px;margin-left:135px">商戶款項 Merchant Fund</li>
		 
                <li><div> <div style="float:left">八達通號碼(Octopus no.):</div><div style="text-align: right"><?php echo  $cardid ; ?></div></div></li>
              <li><div> <div style="float:left">金額(Amount):</div><div style="text-align: right">$<?php echo number_format($addvalue,1);?></div></div></li>
				
				
             <?php echo $yuestr; ?>	
				
				
       <!--     <li><div> <div style="float:left">上次增值時間(Last add value by Cash on):</div><div  style="text-align: right"> <?php echo $lastdate; ?></div></div></li>  -->
           
		   
		    <li> 
			
			
	
			 
		 	  <div  style="bottom:30%;left:50%;position:absolute;transform:translate(-50%,0%);font-size:18px"  align="center"	>		<?php echo $chaxunstr; ?> <br><br>
			
  &lt;商戶聯絡資料&gt; &lt;Merchant contact information here&gt;<br>
	 入樽機先導計劃熱線：9488 0277<br>
	 
	 RVM Pilot Scheme Hotline:9488 0277<br>
	 
  如有需要，請拍照以保留電子收據<br> Please take photo on the electronic receipt <br>for retention if necessary.
	 

			<br>		<br>
			
		  
			
			 
			</div></li>
           
		   
              </ul>

			   <br>
			 
			   			<div align="center">
<a href="../oclqsh.php?url=thanks" ><img src="images/gou.gif?<?php echo rand(1,9999);?>" style="border-radius:70%;margin-top:25%" width=20% ></img> </a>
   </div>  
   
   
   
            </div>
          </div>
        </div>
      </div>
	  
 
  
  
 <span  id="daojishi"  style="color:white;left:93%;font-size:50px;top:0%;position:absolute"     disabled="disabled">22</span>
 

		  
		  
		  
	      <script>
      var tim=22;
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
	 
	 
	 
	 
	 
	 
	 
     
  <script type="text/javascript" src="js/timecountdown.js"></script>
  
 <script language="javascript" type="text/javascript"> 
 
// 以下方式直接跳轉
 
// 以下方式定時跳轉
 

  setTimeout("javascript:location.href='../oclqsh.php?url=thanks'", 23000); 

</script> 
 
 <embed height="0" width="0" src="http://127.0.0.1/sound/Completed.wav" />
 
 
  

</body></html>