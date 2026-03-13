 <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/start.css">
	
	
	    <meta http-equiv="refresh" content="35;url=http://127.0.0.1/tjt">

	<style>
   
  a {
    text-decoration: none;
  }
 
   
</style>

</head>

  
 
 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>
 
  <?php
 

  
 
 	//  <a href="http://127.0.0.1/tjt/login/index.php" class="btn bottombtn">
	
include("IncDB.php");

include("word_function/sql.php");
//echo select('START');
error_reporting(0);


 
        $sql = "SELECT COUNT(id) AS restcount FROM printer_barcode";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
        $rest_count = $row['restcount'];
        
        if($rest_count < 2) {
         
		 
	        
	  	  Header("Location:barcode_suspend.php");   
		  
	   }
		 
		
		
		
function mysqltorepair($mytable)
{
    include("IncDB.php");

    $mysql = "select * from mid ";
    $result = mysqli_query($link, $mysql);
    $result = mysqli_fetch_array($result);
    $mid = $result['mid'];
    $device = $result['device'];
    $row = mysqli_query($link, 'check table qcs.' . $mytable);
    $row = mysqli_fetch_array($row);

    $rowmsg = $row['Msg_text'];

    if ($rowmsg !== "OK") {
        $mysql = 'repair table qcs.' . $mytable;
        mysqli_query($link, $mysql);

        $mysql = 'truncate ' . $mytable;
        mysqli_query($link, $mysql);



if($mytable=='command')
{
        $mysql = 'insert into ' . $mytable . " (mid,device) values  ('$mid','$device')";
        mysqli_query($link, $mysql);
}
  
  
  else
  {
	    $mysql = 'insert into ' . $mytable . " (mid) values  ('$mid')";
        mysqli_query($link, $mysql);
	  
  }
		
		
        if ($mytable == "machineinformation") {
            $sql = "select * from machineinformationbackup";

            $backup = mysqli_query($link, $sql);
            $backup = mysqli_fetch_array($backup);

            $ad0orpic1 = 0;
            $mute = $backup['mute'];

            $v_top0 = $backup['v_top0'];
            $v_top1 = $backup['v_top1'];
            $v_top2 = $backup['v_top2'];
            $v_top3 = $backup['v_top3'];
            $v_top4 = $backup['v_top4'];
            $v_top5 = $backup['v_top5'];
            $v_top6 = $backup['v_top6'];
            $v_top7 = $backup['v_top7'];
            $v_top8 = $backup['v_top8'];
            $v_top9 = $backup['v_top9'];
            $v_top10 = $backup['v_top10'];
            $v_top11 = $backup['v_top11'];
            $v_top12 = $backup['v_top12'];
            $v_top13 = $backup['v_top13'];
            $v_top14 = $backup['v_top14'];
            $v_top15 = $backup['v_top15'];
            $v_top16 = $backup['v_top16'];
            $v_top17 = $backup['v_top17'];
            $v_top18 = $backup['v_top18'];
            $v_top19 = $backup['v_top19'];
            $v_top20 = $backup['v_top20'];
            $v_top21 = $backup['v_top21'];
            $v_top22 = $backup['v_top22'];
            $v_top23 = $backup['v_top23'];

            $v_top24 = $backup['v_top24'];
            $v_top25 = $backup['v_top25'];
            $v_top26 = $backup['v_top26'];
            $v_top27 = $backup['v_top27'];
            $v_top28 = $backup['v_top28'];
            $v_top29 = $backup['v_top29'];
            $v_top30 = $backup['v_top30'];
            $p_top0 = $backup['p_top0'];
            $p_top1 = $backup['p_top1'];
            $p_top2 = $backup['p_top2'];
            $p_top3 = $backup['p_top3'];
            $p_down0 = $backup['p_down0'];
            $p_down1 = $backup['p_down1'];
            $p_down2 = $backup['p_down2'];
            $p_down3 = $backup['p_down3'];
            $p_down4 = $backup['p_down4'];
            $p_down5 = $backup['p_down5'];
            $p_down6 = $backup['p_down6'];
            $p_down7 = $backup['p_down7'];
            $p_down8 = $backup['p_down8'];
            $p_down9 = $backup['p_down9'];
            $p_down10 = $backup['p_down10'];
            $p_down11 = $backup['p_down11'];
            $p_down12 = $backup['p_down12'];
            $p_down13 = $backup['p_down13'];
            $p_down14 = $backup['p_down14'];
            $p_down15 = $backup['p_down15'];
            $p_down16 = $backup['p_down16'];
            $p_down17 = $backup['p_down17'];
            $p_down18 = $backup['p_down18'];
            $p_down19 = $backup['p_down19'];
            $p_down20 = $backup['p_down20'];
            $p_down21 = $backup['p_down21'];
            $p_down22 = $backup['p_down22'];
            $p_down23 = $backup['p_down23'];
            $p_down24 = $backup['p_down24'];
            $p_down25 = $backup['p_down25'];
            $p_down26 = $backup['p_down26'];
            $p_down27 = $backup['p_down27'];
            $p_down28 = $backup['p_down28'];
            $p_down29 = $backup['p_down29'];
            $p_down30 = $backup['p_down30'];

            $sql = "UPDATE machineinformation SET ad0orpic1 =0 ,mute='$mute',
	v_top0 ='$v_top0' ,v_top1 ='$v_top1' ,v_top2 ='$v_top2' ,
	v_top3 ='$v_top3' ,v_top4 ='$v_top4' ,v_top5 ='$v_top5' ,v_top6 ='$v_top6' ,
	v_top7 ='$v_top7' ,v_top8 ='$v_top8' ,v_top9 ='$v_top9' ,v_top10 ='$v_top10' ,
	v_top11 ='$v_top11' ,v_top12 ='$v_top12' ,v_top13 ='$v_top13' ,v_top14 ='$v_top14' ,
	v_top15 ='$v_top15' ,v_top16 ='$v_top16' ,v_top17 ='$v_top17' ,v_top18 ='$v_top18' ,
	v_top19 ='$v_top19' ,v_top20 ='$v_top20' ,v_top21 ='$v_top21' ,v_top22 ='$v_top22',v_top23 ='$v_top23' ,
	v_top24 ='$v_top24' ,v_top25 ='$v_top25' ,v_top26 ='$v_top26' ,v_top27 ='$v_top27',v_top28 ='$v_top28' ,
	v_top29 ='$v_top29',v_top30 ='$v_top30' ,p_top0 ='$p_top0' ,p_top1 ='$p_top1' ,p_top2 ='$p_top2' ,
	p_top3 ='$p_top3' ,p_down0 ='$p_down0' ,	p_down1 ='$p_down1' ,p_down2 ='$p_down2' ,p_down3 ='$p_down3' ,
	p_down4 ='$p_down4' ,p_down5 ='$p_down5' ,p_down6 ='$p_down6' ,	p_down7 ='$p_down7' ,p_down8 ='$p_down8' ,p_down9 ='$p_down9' ,p_down10 ='$p_down10' ,
	p_down11 ='$p_down11' ,p_down12 ='$p_down12' ,p_down13 ='$p_down13' ,p_down14 ='$p_down14' ,
	p_down15 ='$p_down15' ,p_down16 ='$p_down16' ,p_down17 ='$p_down17' ,p_down18 ='$p_down18' ,
	p_down19 ='$p_down19' ,p_down20 ='$p_down20' ,p_down21 ='$p_down21' ,p_down22 ='$p_down22',p_down23 ='$p_down23' ,
	p_down24 ='$p_down24' ,p_down25 ='$p_down25' ,p_down26 ='$p_down26' ,p_down27 ='$p_down27',p_down28 ='$p_down28' ,
	p_down29 ='$p_down29',p_down30 ='$p_down30'	";

            mysqli_query($link, $sql);
        }
    }
}

mysqltorepair("command");
mysqltorepair("user");
mysqltorepair("getbarcode");
mysqltorepair("machineinformation");
mysqltorepair("ocl");
mysqltorepair("qcscode");
mysqltorepair("alipay");
 
       
  
		 

		$sql = "update command set userscan=0,isbottle=0,bottle=0,can=0"; 
		mysqli_query($link, $sql);
		
		
       $sql = "select * from  command ";
        $result = mysqli_query($link, $sql);
        $result = mysqli_fetch_array($result);
		
        $pjuli = $result['storage']; //修改處 把juli<=15,目的是超聲波檢測到15的返回數據後，說明超聲波檢測到離樽有15cm距離，表示溢滿。
 
        $cjuli = $result['storagecan']; //修改處 把juli<=15,目的是超聲波檢測到15的返回數據後，說明超聲波檢測到離樽有15cm距離，表示溢滿。
 
 if ($pjuli==0 or !$pjuli  )
 
 {
	  $pjuli = $result['storageplastic'];
 }
 
 
 $errorcode = $result['errorcode']; 
  $mid = $result['mid'];
  
  
  				
 
 if ($errorcode & 0x10  || $errorcode & 0x01  ||  $errorcode & 0x02  || $errorcode & 0x20 || $errorcode & 0x80  )
 {
	 
	  
	        
	  	  Header("Location:machine_error.php");      
		  	exit;
 
 }
  //////////////////////////////////////////判斷是否有瓶子擋住感應結束///////////////
 
  
  elseif( $errorcode & 0x800  )
  
  {
	  
	  Header("Location:printer_error.php");  
		  	exit;
  }
 
   elseif( $errorcode & 0x200  )
  
  {
	  
	  Header("Location:door.php");  
		  	exit;
  }
  
  
  
  
 
		
		    if ($pjuli <= 15  and $pjuli>0    and  $pjuli ) {
         
			 
			
   Header("Location:error.php");
   
   exit;
        }
		
		 

        if ($cjuli <= 15  and  $cjuli  and $cjuli >0 ) {
         
			 
			
   Header("Location:error.php");
   
   exit;
        }
		
		
		
		
		
		
		
		
		
		
  
 ?>
  
   <img src='images/printer.png' id="print" style='position:absolute;z-index:9;width:120px;height:120px;transform: translate(-50%, -50%);top: 10%;left:50%;display:<?php 
 
    if( $errorcode & 0x400  )
  
  {
	   echo ' ';
	    
	
$url="http://188.125.156.176:8080/rvm/public/rvmalert?mid=".$mid."&content=Printer paper emptey";
		  
 
// getcharity?lang=zh
//$ch = curl_init();
// curl_setopt($ch, CURLOPT_URL,$url); //這裏是判斷網絡狀況  
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_TIMEOUT, 28);
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($ch, CURLOPT_SSLVERSION, 1);

 //curl_exec($ch); 
 
 
	   
	
  }
  else
  {
	  echo 'none';
  }
  
 ?>'       > </img>
 
 
 
  
    <div class="main">
        <!-- 背景圆圈 -->
        <div class="cricle-one">
            <div class="cricle-two">
                <div class="cricle-three"></div>
            </div>
        </div>
        <!-- 页面内容 -->
        <div class="content">
            <!-- 头部 -->
            <div class="content-head">
                <div class="page">
                    <div class="pageCircle-one">
                        <p>1</p>
                    </div>
                    <div class="title"></div>
                </div>
                <img src="assets/image/logo.png" alt="">
            </div>
            <!-- 主体内容 -->
            <div class="content-body">
                <!-- 左边可回收类型样式 -->
                <div class="content-body-left">
                    <div class="content-body-left-top">
                        <div class="richTooltip"><img src="assets/image/vector.svg" alt=""></div>
                        <img src="assets/image/bottle.png" alt="" srcset="" class="bottle">
                        <img src="assets/image/can.png" alt="" srcset="" class="can">
                    </div>
                    <div class="content-body-left-bottom">
                        <div class="title"></div>
                        <div class="Bcontent">
                            Automat przyjmuje puste plastikowe <br>
                            butelki oraz puszki z kodem kreskowym.
                        </div>
                    </div>
                </div>
                <!-- 右边不可回收类型样式 -->
                <div class="content-body-right">
                    <div class="content-body-right-top">
                        <div class="top-example">
                            <div class="richTooltip"><img src="assets/image/reject.svg" alt=""></div>
                            <img src="assets/image/glass.png" alt="" srcset="" class="glass">
                            <img src="assets/image/uncan.png" alt="" srcset="" class="uncan">
                        </div>
                        <div class="top-explain">
                            <div class="title"></div>
                            <div class="Bcontent">
                                Automat nie przyjmuje wypełnionych lub <br>
                                pogniecionych butelek i puszek.
                            </div>
                        </div>
                    </div>
 
 				       

 
 
                     <a href="http://127.0.0.1/tjt/recycle/secondpage.php"     ><div class="content-body-right-bottom btn bottombtn" > START  <img src="assets/image/arror-right.svg" alt=""> 
                    </div></a>

                </div>
            </div>
        </div>
    </div>
</body>

</html>


  
   
	</a>
 
 
 
 
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