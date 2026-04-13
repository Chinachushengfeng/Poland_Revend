<!doctype html> 
<html lang="en" class="no-js"> 
<head> 
  <meta charset="utf-8" /> 
  <title></title> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link rel="stylesheet" href="assets/css/index.css">
  <meta charset="utf-8" http-equiv="refresh" content="60;url=index.php">
<!DOCTYPE html>
<html>
<head>
<title>背景图片示例</title>
</head>
<body style="background-image: url('images/printer_error.jpg');">
<!-- 页面内容 -->
</body>
</html>
 
 
 
 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>
 
 
  
 
 
<a href="http://127.0.0.1/tjt/wait_restore_from_printer.php">
    <button style='position:absolute; left:50%; top:73%; transform:translateX(-50%); color:#0f613b; font-size:28px; background:transparent; border:none;'>
       Reset drukarki 
    </button>
</a>
 
 
 
  <?php 
  
error_reporting(0);
date_default_timezone_set("PRC");
$nowtime=time();




include("incdb.php");


$sql = "update command set bottle=0,can=0,statecode=0"; 
mysqli_query($link, $sql);

		
	 



if(!$_COOKIE["emailtime"])
{
	 
	setcookie("emailtime",$nowtime);
email();
exit;
}





 
$cookiesemailtime= $_COOKIE["emailtime"];


if(($nowtime-$cookiesemailtime)>3200)
{
	setcookie("emailtime",$nowtime);
 email();
}





function email()
{
	
	
include("IncDB.php");
 
 
   $mysql = "select * from command ";
    $result = mysqli_query($link, $mysql);
    $result = mysqli_fetch_array($result);
    $mid = $result['mid'];
	
$url="http://188.125.156.176:8080/groszek/public/rvmalert?mid=".$mid."&content=Printer with problem";
		 
		 
	 
		 

 
// getcharity?lang=zh
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url); //這裏是判斷網絡狀況  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 28);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSLVERSION, 1);

// curl_exec($ch); 
 

//email 报警endendendendendendendendendendendendendendendendendendend：

 




}











?>

 
 
	   <script src="js/jquery-1.9.1.min.js"></script> 
    <script>
		$(function(){ 
		    $("#btn").bind("click",{btn:$("#btn")},function(evdata){    
		         $.ajax({    
		                type:"POST",    
		                dataType:"json",    
		                url:"myapi.php",    
		                timeout:80000000,     //ajax请求超时时间80秒    
		                data:{time:"5000000000"}, //40秒后无论结果服务器都返回数据    
		                success:function(data,textStatus){    
		                    //从服务器得到数据，显示数据并继续查询    
		   evdata.data.btn.click();    
       $("#msg").append("<br>[0]");   
		                },    
		             //Ajax请求超时，继续查询    
		             error:function(XMLHttpRequest,textStatus,errorThrown){    
		                     if(textStatus=="timeout"){    
		                         $("#msg").append("<br>[超时空白页]");    
		                         evdata.data.btn.click();    
		                     }    
		             }    
 
		            });    
		    });    
		        
		});  
	</script>
	  <input id="btn" type="hidden" value="测试" />  
  </p> 

 
  
<div id="msg" style="margin-top:700px"> </div>

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
	 