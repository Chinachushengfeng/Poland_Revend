<!DOCTYPE html>
<html oncontextmenu="return false" onselectstart="return false" oncopy="return false">
  <link rel="stylesheet" href="../../css/style.css" />
<head>
    <title>智能回收機</title>

    <link href="css/style.css" rel='stylesheet' type='text/css' />
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>


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
  <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>

  
		
		
	 
		    <?php 
			 include("IncDB.php");  //   
    
	
	 
 
	
	
	  
  
  

 $sql="select * from command ";
$result=  mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$transactionid=$result['transactionid'];
$mid=$result['mid'];
$sql="update   user_transaction  set transactiondone=2 where transactionid='$transactionid' 	";  //标记2说明投瓶结束。
mysqli_query($link,$sql); 
	
	
      $octreceipt= intval(substr($mid,2,6)).substr(time(),1,12);
    
 
 $sql="update  ocl  set receipt='$octreceipt'  ";
 mysqli_query($link,$sql);
 

 
  
	
	 
 $sql="select * from ocl ";
$result=  mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$task=$result['task'];
	  $qty= $result['qty']  ; 
	 
	
	 $sql="update ocl set task=1,qty='$qty',returncode=''";
	 mysqli_query($link,$sql);
	 
	 
	 ?> 
  	      <img src="images/paika.gif" width="40%" style="top:30%;left:50%;position:absolute;transform:translate(-50%,-50%)" ></img>
      
 
	 
 		   <span   style="top:68%;left:50%;position:absolute;transform:translate(-50%,-50%);font-size:38px;text-align:center">請拍八達通卡 <br>Please Tap Octopus Card</span>
       
  <br>
 
	
   	 
	  </div>
 
	  </div>
	   
		
  
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
window.location.href='oclqsh.php?url=success';   
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
							 
							 
		                    }    
		                 //未从服务器得到数据，继续查询  


else if(data.success=="3")   //errorcode  返回3

{
// window.location.href='success.php?qty=<?php echo $qty;?>';   

 window.location.href='qsh.php?url=error&returncode=' + data.text;   

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
							

else  if(data.success=="4"){  
window.location.href='100022.php';   
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

 <br><br> 	<br><br><br><br><br><br><br><br>  	<br><br><br><br><br><br><br><br>  	<br><br><br><br><br><br><br><br>  	<br><br><br><br><br><br><br><br> 
 <div id="msg" style="margin-top:1px"  > </div>



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
 

setTimeout("javascript:location.href='100022endfail.php'",60000); 

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
 <p>&nbsp;</p>
  <embed height="0" width="0" src="http://127.0.0.1/sound/Please tap octopus.wav" /> 

 

</body>

</html>