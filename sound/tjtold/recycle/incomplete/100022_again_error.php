     <!DOCTYPE html>
<html oncontextmenu="return false" onselectstart="return false" oncopy="return false">
  <link rel="stylesheet" href="../../css/style.css" />
<head>
    <title>智能回收機</title>

    <link href="css/style.css" rel='stylesheet' type='text/css' />
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
	background-image: url(images/22.jpg);
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
 
 
 
 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>


		
		
	 
		    <?php 
			
			 	date_default_timezone_set("Asia/Shanghai");  
include("IncDB.php");
	 
     $sql="UPDATE command SET  command=2 	";
mysqli_query($link,$sql); 
	
	
$sql="select * from   command     ";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$userscan=$result['userscan'];  

 
	
$sql="select sum(bottlevalue) as total from user_transaction where transactiondone=0 and recognitionstatus=1   ";
$bottlevalue=mysqli_query($link,$sql);
$bottlevalue=mysqli_fetch_array($bottlevalue);
$bottlevalue=$bottlevalue['total'];  //总价值
$qty= $bottlevalue  ;
  
  
  
  
  
$sql="update user_transaction set transactiondone=2 where transactiondone=0  ";   //标记2
 mysqli_query($link,$sql);
  
  
  
    
  
 
	 
	 $sql="update ocl set value='0',task=1,qty='$qty'";
	 mysqli_query($link,$sql);
	 
	 
	 
	 
	 
	  
 
$sql="update ocl set task=2";
mysqli_query($link,$sql);

$sql="select * from ocl";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
//$cardid=$result['cardid']; 
//$qty=$_GET['qty'];


$returncode=$result['returncode'];
$value=$result['value'];



 
if($value=="100022" || $value=="100025" )
{  
	$returncode="100022";
 
}

$datetime=time();
$shopno="wastons";
$deviceno="fffff";
$receiptno=time().rand(100,999);
 

//$cardid=$cardid;
//$addvalue=$qty*0.1;
//$remainvalue=$value;


if ($returncode=="100001")
{
	$codestr="未能接駁八達通收費器。<br>请联络wastons water客服电话：000000";
}

 if ($returncode=="100002")
{
	$codestr="系統錯誤。<br>请联络wastons water客服电话：000000";
}

if ($returncode=="100005")
{
	$codestr="未能接駁八達通收費器。<br>请联络wastons water客服电话：0000000";
}
if ($returncode=="100016" || $returncode=="100017" || $returncode=="100034" || $returncode=="100032" )
{
	$codestr="讀卡錯誤，請重試";
}
 
if ($returncode=="100019" ||$returncode=="100024" || $returncode=="100021" || $returncode=="100035" )
{
	$codestr="此卡失效，请换张卡";
}
if ($returncode=="100020" )
{
	$codestr="沒有掃描到卡,請再拍卡。";
}
 
 



if ($returncode=="100022" || $returncode=="100025"  )
{
	
	$codestr=" 請勿取消交易  <br> 交易未能完成 <br>
	请用同一張卡 <br>
再次拍卡，以確保交易無誤";

$sql="update ocl set task=1,value=0";
mysqli_query($link,$sql);



}

 
if (isset($_GET['equal'])  )
{
	
	$codestr=" 请使用您登录时的八达通卡进行拍卡  <br>  
	请使用登录时的八达通卡
	 (八達通號碼:".$userscan.")<br>
以確保交易無誤";

}

 
if ($returncode=="100049" || $returncode=="100050")
{
	$codestr="儲值額超出上限，请换卡";
}
 


if ($returncode=="100051")
{
	$codestr="控制台識別號碼不正確";
}
 


$sql="update ocl set  cardid=0";
mysqli_query($link,$sql);


 ?>
 
 
 
 
 
 
   


	    <script type="text/javascript" src="js/timecountdown.js"></script>
  
 <div style="margin-top:10%">
	<div style="font-size:50px;text-align:center"> 發生錯誤 </div>
	   
	   <div style="font-size:25px;text-align:center;margin-top:20px"> <?php echo $codestr;?></div>
 </div>
 
 











	    <script type="text/javascript" src="js/timecountdown.js"></script>
  
 <div style="margin-top:10%">
	<div style="font-size:50px;text-align:center"> 發生錯誤 </div>
	   
	   <div style="font-size:25px;text-align:center;margin-top:20px"> 請勿取消交易  <br> 交易未能完成 <br>
	请用同一張卡 <br>
再次拍卡，以確保交易無誤</div>


	   <div style="font-size:25px;text-align:center;margin-top:20px">請重試 <br> (八達通號碼：<?php echo $userscan ;?>) <br>
 
 </div>

 </div>
 
 
 
 <a href="index.php"> <input type="button" id="daojishi" class="btn2"  style="width:25%;margin-left:37%;font-size:35px"  value="还剩22秒 " disabled="disabled" /> </a>
 
 
	   
		  
	      <script>
      var tim=22;
      function aaa(){
        var btnn=document.getElementById("daojishi");
        if(tim<=0)
        {
          btnn.value="点此返回";
          btnn.disabled="";
        }
        else
        {
          btnn.value="还剩"  +tim+"秒";
          tim--;
        }
      }
      setInterval("aaa()",1000);
    </script>   
     
	 
	 
	 
	 
	 
  
</div>
 	
  </div>
   
	   <script src="js/jquery-1.9.1.min.js"></script> 
    <script>
		$(function(){ 
		    $("#btn").bind("click",{btn:$("#btn")},function(evdata){    
		         $.ajax({    
		                type:"POST",    
		                dataType:"json",    
		                url:"data.php",    
		                timeout:8000,     //ajax请求超时时间80秒    
		                data:{time:"50000"}, //40秒后无论结果服务器都返回数据    
		                success:function(data,textStatus){   
 		                    //从服务器得到数据，显示数据并继续查询    
		                    if(data.success=="1"){  
window.location.href='success.php?qty=<?php echo $qty;?>';   
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
							 
							 
		                    }    
		                 //未从服务器得到数据，继续查询  


else if(data.success=="3")   //errorcode  返回3

{
// window.location.href='success.php?qty=<?php echo $qty;?>';   

 window.location.href='error.php?qty=<?php echo $qty; ?>&returncode=' + data.text;   

		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
							 
	
		                    }  
							
							
							
else  if(data.success=="4"){  
window.location.href='100022.php';   
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
							 
							 
		                    } 
							
							

else if(data.success=="5"){
  
  //处理和第一次刷卡登录的八达通卡号 不相等的情况
  // window.location.href='success.php?qty=<?php echo $qty;?>';   

 window.location.href='error.php?equal=1';   

		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
						 
  
		                    }  
							
						 
		                   else{      
		                    evdata.data.btn.click();    
       $("#msg").append("<br>[0]"); 
		                    }    
		                },    
		             //Ajax请求超时，继续查询    
		             error:function(XMLHttpRequest,textStatus,errorThrown){    
		                     if(textStatus=="timeout"){    
		                         $("#msg").append("<br>[超时]");    
		                         evdata.data.btn.click();    
		                     }    
		             }    
		                    
		            });    
		    });    
		        
		});  
	</script>
	  <input id="btn" type="hidden" value="测试" />  
  </p> 

 
 <div id="msg1" style="margin-top:1px"  > </div>



  <script type="text/javascript">
// 两秒后模拟点击
setTimeout(function() {
// IE
if(document.all) {
document.getElementById("btn").click();
}
// 其它浏览器
else {
var e = document.createEvent("MouseEvents");
e.initEvent("click", true, true);
document.getElementById("btn").dispatchEvent(e);
}
}, 1000);
     </script>
	 
	 
	 
 </div>
 
 <script type="text/javascript" src="js/timecountdown.js"></script>
  
 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
 

setTimeout("javascript:location.href='100022endfail.php'", 60000); 

</script> 
 

 <p>&nbsp;</p>
</body>

</html>