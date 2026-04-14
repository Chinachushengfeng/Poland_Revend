<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
	
	<link rel="stylesheet" href="./assets/css/index.css">
</head>

 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>
 
	<div class="main">
		<!-- 背景圆圈 -->
		<div class="cricle-one">
			<div class="cricle-two">
				<div class="cricle-three"></div>
			</div>
		</div>
<div style='font-size:35px;margin-top:250px;position:absolute;color:white;margin-left:280px;justify-content:center;align:center;align-items:center'>
Wykryto przedmiot w maszynie.<p style='margin-left:-75px'>

Naciśnij przycisk na panelu autonaprawa. <p style='margin-left:110px'>  
			</div>	 
		<div class="content">
			<div class="center">
				<div class="logo"><img src="./assets/image/logo.png" alt="" srcset=""></div>
				<div class="context"></div>
				<!-- 按钮 -->
				<div class="btn">
					<div class="btnContent">
				  
				 
					 <a href="http://127.0.0.1/tjt/wait_restore.php" >  <button  class="btn bottombtn" style='position:absolutel;margin-left:20;color:#0f613b;font-size:15px'   >Autonaprawa</button>  
  
 </a> 
  
  
 
	 <?php  
	 
	 include("incdb.php");
	 
	 
	 	$sql = "update command set bottle=0,can=0,statecode=0"; 
		mysqli_query($link, $sql);
		
		
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
 

						
						
					</div>
				</div>

			</div>
		</div>

	</div>
</body>

</html>