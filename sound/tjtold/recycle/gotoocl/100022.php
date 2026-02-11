     <!DOCTYPE html>
<html oncontextmenu="return false" onselectstart="return false" oncopy="return false">
  <link rel="stylesheet" href="../css/style.css" />
<head>
    <title>智能回收機</title>

    <link href="css/style.css" rel='stylesheet' type='text/css' /> 
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

background-color:#005D30;
	 
	background-repeat: repeat;
	background-image: linear-gradient(#279038, #005d30); 
	 
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
			
			 include("IncDB.php");  //   
    
	 
	     $sql="UPDATE ocl SET  task=7 ";
mysqli_query($link,$sql); 
	
	 
     $sql="UPDATE command SET  command=2 ";
mysqli_query($link,$sql); 
	
	
$sql="select * from   command     ";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
   
$userscan=   $_COOKIE["user"];
$transactionid=$result['transactionid'];
 
	
$sql="select sum(bottlevalue) as total from user_transaction where transactionid='$transactionid' and recognitionstatus=1   ";
$bottlevalue=mysqli_query($link,$sql);
$bottlevalue=mysqli_fetch_array($bottlevalue);
$bottlevalue=$bottlevalue['total'];  //總價值
$qty= $bottlevalue  ;
  
  
  
  
  
$sql="update user_transaction set transactiondone=2 where transactionid='$transactionid'  ";   //標記2
 mysqli_query($link,$sql);
  
   
	 
	 ?> 


 



	    <script type="text/javascript" src="js/timecountdown.js"></script>
  
 <div style="margin-top:10%">
	<div style="font-size:50px;text-align:center" id="returncode"> 100022<!-- 發生錯誤(Error) --> </div>
	   
	   <div id="errormsg" style="font-size:25px;text-align:center;margin-top:20px">  
	   
	   
	   
	   </div>

 
 

 </div>
 
 
 
 <a href="100022endfail.php"> <input type="button" id="daojishi" class="btn2"  style="width:25%;margin-left:37%;font-size:35px"  value="剩餘22秒" disabled="disabled" /> </a>
 
 
 
	   
		  
	      <script>
      var tim=22;
      function aaa(){
        var btnn=document.getElementById("daojishi");
        if(tim<=0)
        {
          btnn.value="結束 END ";
          btnn.disabled="";
        }
        else
        {
          btnn.value="剩餘"  +tim+"秒";
          tim--;
        }
      }
      setInterval("aaa()",1000);
    </script>   
     
	 
	 
	 
	 
	 
  
</div>
 	
  </div>
   
	   <script src="js/jquery-1.9.1.min.js"></script> 
    <script>	
	var cishu=1;	
	document.getElementById("errormsg").innerHTML="交易未能完成。請再次拍卡<br>Incomplete transaction. Please retry <br>with the same Octopus <br><br>請重試：(八達通號碼"+<?php echo $userscan ;?> +") <br>Retry please Octopus no."+<?php echo $userscan ;?>;
		$(function(){ 		
	
		    $("#btn").bind("click",{btn:$("#btn")},function(evdata){    
		         $.ajax({

					 
		                type:"POST",    
		                dataType:"json",    
		                url:"100022data.php",    
		                timeout:8000,     //ajax請求超時時間80秒    
		                data:{time:"50000"}, //40秒後無論結果服務器都返回數據    
		                success:function(data,textStatus){   
 		                    //從服務器得到數據，顯示數據並繼續查詢    
		                    if(data.success=="1"){  
window.location.href='success.php?qty=<?php echo $qty;?>';   
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
							 
							 
		                    }    
		                 //未從服務器得到數據，繼續查詢  


else if(data.success=="3")   //errorcode  返回3

				{
					
					
					if(parseInt(data.text)==999999)
					{
					 document.getElementById("returncode").innerHTML ="";
					}
					else{
						document.getElementById("returncode").innerHTML =data.text;
					}
					 
					 
					// window.location.href='success.php?qty=<?php echo $qty;?>';   

								// window.location.href='100022.php?returncode=' + data.text;   
									
								  if (cishu>1 || (parseInt(data.text)>100000 && parseInt(data.text)!=100022 )  )
								  {
									  
									  document.getElementById("errormsg").innerHTML=" <br><br>請重試：(八達通號碼"+<?php echo $userscan ;?> +") <br>Retry please Octopus no."+<?php echo $userscan ;?> ;
								 	
								  }									
									  if(data.text=="100016" ||  data.text=="100017"
														|| data.text=="100020" || data.text=="100032" || data.text=="100034" )
									 {
									 document.getElementById("errormsg").innerHTML =" 請再次拍卡 <br>Please tap card again"+document.getElementById("errormsg").innerHTML;
								  
								 
									 }
									  else if (data.text=="100019" ||  data.text=="100021"
														|| data.text=="100024" || data.text=="100035"   )
									 {
									 document.getElementById("errormsg").innerHTML= "此卡失效。請使用另一張八達通卡 <br>Invalid Octopus. Please use another Octopus"+document.getElementById("errormsg").innerHTML;
  
									 } 
									  
								 
									   else if (data.text=="100049" )
									 {

									 document.getElementById("errormsg").innerHTML=" 卡上儲值額超出上限<br> Stored value on card exceeds limit."+document.getElementById("errormsg").innerHTML;
								 
									 }
										else if (data.text=="999999" )
									 {
										 data.text="";
									 document.getElementById("errormsg").innerHTML=" 交易未能完成。請再次拍卡 <br>Incomplete transaction. Please retry <br> with the same Octopus"+document.getElementById("errormsg").innerHTML;
								 
									 }
										else if ( data.text=="100022"  || data.text=="100025" )
									 {
										 
										 if(cishu>1)
										 {
											 
											document.getElementById("errormsg").innerHTML=" 交易未能完成。請再次拍卡 <br>Incomplete transaction. Please retry <br> with the same Octopus"+document.getElementById("errormsg").innerHTML;
											tim=22;
 
										 }
											 cishu++; 
									 }
									 
										
									   else   
									 {
										 
										 
									 document.getElementById("errormsg").innerHTML="機器故障，請致電技術支援熱線：94880277 <br>Machine out of order. <br>Please contact Technical Service<br>Hotline on 94880277 for assistance";
								 
							 
									 }
	  
 
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
		             //Ajax請求超時，繼續查詢    
		             error:function(XMLHttpRequest,textStatus,errorThrown){    
		                     if(textStatus=="timeout"){    
		                         $("#msg").append("<br>[超時]");    
		                         evdata.data.btn.click();    
		                     }    
		             }    
		                    
		            });    
		    });    
		        
		});  
	</script>

<br><br><br><br><br><br><br><br><br><br>
	  <input id="btn" value="測試" />  
  </p> 

 
 
 <div id="msg" style="margin-top:1px"  > </div>



  <script type="text/javascript">
// 兩秒後模擬點擊
setTimeout(function() {
// IE
if(document.all) {
document.getElementById("btn").click();
}
// 其它瀏覽器
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
// 以下方式直接跳轉
 
// 以下方式定時跳轉
 

setTimeout("javascript:location.href='100022endfail.php'", 60000); 

</script> 
 

 <p>&nbsp;</p>
</body>

</html>