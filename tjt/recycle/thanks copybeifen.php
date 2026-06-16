<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/page4.css">
			<style>
   
  a {
    text-decoration: none;
  }
 
 
    ::-webkit-scrollbar {
        display: none;
    }
    html {
        scrollbar-width: none;
    } 
</style>
	<script src="js/jquery.min.js"></script>

    <title>Document</title>
</head>

 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>
 
    <div class="main">
        <!-- 背景圆圈 -->
        <div class="cricle-one">
            <div class="cricle-two">
                <div class="cricle-three"></div>
            </div>
        </div>
        <div class="content">
            <!-- 页面抬头 -->
            <div class="content-head">
                <div class="page">
                    <div class="pageCircle-one">
                        <p>4</p>
                    </div>
                    <div class="title"></div>
                </div>
                <img src="../assets/image/logo.png" alt="">
            </div>
            <!-- 页面内容 -->
            <div class="content-body">
                <div class="content-body-main">
                    <div class="bottle img-c-d">
                        <div class="richTooltip"><img src="../assets/image/vector.svg" alt=""></div>
                        <img src="../assets/image/slimbottle.png" alt="">

<?php
date_default_timezone_set('Europe/Warsaw');
include("incdb.php");	 
include("function/sql.php");

?>
                        <!-- 塑料瓶 -->
                        <div class="count"> <span>Zrecyklowane butelki:</span>
                            <div class="number"><?php 


$transactionid= select('command','transactionid');
$bottle= select('command','bottle');
$can= select('command','can');



//$sql="select count(transactionid) as bottleQty from user_transaction where transactionid='$transactionid' and  metal='0' and recognitionstatus=1 and print_barcode='0'";
//$bottleQty=  mysqli_query($link,$sql);
//$bottleQty=mysqli_fetch_array($bottleQty);
//$bottleQty=$bottleQty['bottleQty'];		
 
$sql="SELECT count(id) as bottleQTY from user_transaction where recognitionstatus=1 and metal=0 and transactionid='$transactionid'";
 $bottleQTY=  mysqli_query($link,$sql);
 $bottleQTY=mysqli_fetch_array($bottleQTY);
 $bottleQTY=$bottleQTY['bottleQTY'];	

 echo $bottleQTY;


   
$sql="update command set  bottle='$bottleQTY'  ";//標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
mysqli_query($link,$sql);

							?></div>
                        </div>
                    </div>
                    <div class="can img-c-d">
                        <div class="richTooltip"><img src="../assets/image/vector.svg" alt=""></div>
                        <img src="../assets/image/slimCan.png" alt="">
                        <!-- 易拉罐 -->
                        <div class="count"><span>Zrecyklowane puszki:</span>
                            <div class="number"> <?php
							

//$sql="select count(transactionid) as canQty from user_transaction where transactionid='$transactionid' and  metal='1' and recognitionstatus=1 and print_barcode='0'";
//$canQty=  mysqli_query($link,$sql);
//$canQty=mysqli_fetch_array($canQty);
//$canQty=$canQty['canQty'];		
 
$sql="SELECT count(id) as canQTY from user_transaction where recognitionstatus=1 and metal=1 and transactionid='$transactionid'";
 $canQTY=  mysqli_query($link,$sql);
 $canQTY=mysqli_fetch_array($canQTY);
 $canQTY=$canQTY['canQTY'];	

 echo $canQTY;

 

   
$sql="update command set  can='$canQTY'  ";//標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
mysqli_query($link,$sql);
 
  
$sql="update user_transaction set  transactiondone=2   where transactionid='$transactionid'";//標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
mysqli_query($link,$sql);

 




 if (($canQTY+$bottleQTY )>0)
 {
	 
	  
	 	   $printer_barcode=select("printer_barcode","barcode");
		   
		   
if (empty($printer_barcode) || $printer_barcode === '0' || $printer_barcode === 0) {
    $printer_barcode = 'nobarcode';
}  


				    $nowthetime=time();
                    $nowthetime=date('Y-m-d H:i:s', $nowthetime);

 
			 
             
		 	  $sql="update user_transaction  set  print_barcode='$printer_barcode',octreceipt='$nowthetime'  where transactionid='$transactionid'";
			 mysqli_query($link,$sql);	 
			 


$sql="select * from user_transaction where transactionid='$transactionid' ";//標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
$result=mysqli_query($link,$sql);
 $result=mysqli_fetch_array($result);
 $print_barcode=$result['print_barcode'];
 


		 	  $sql="update command set   print_time='$nowthetime', printer_barcode='$printer_barcode'";
			 mysqli_query($link,$sql);	 

 


			 
			 	  $sql="delete from printer_barcode  where  barcode='$printer_barcode'";
			 mysqli_query($link,$sql);	 
             
			 
 }
 
 
 	  $sql="update command  set  command=2";
			 mysqli_query($link,$sql);	 
			 
 
 
							?>
							</div>
                        </div>
                    </div>
                    <!-- 右边表格 -->
                    <div class="table ">
                        <!-- 第一行 时间 -->
                        <div class="re re-time">
                                 <p>Czas na recykling: </p> <span id="time">120</span>
                        </div>
                        <div class="line"></div>
                        <!-- 第二行 金额-->
                        <div class="re discount">
                            <p>Twój rabat: </p> <span> <?php 	
			
 
$transactionid= select('command','transactionid');

$sql="select sum(bottlevalue) as totalvalue from user_transaction where transactionid='$transactionid'and recognitionstatus=1";
$totalvalue=  mysqli_query($link,$sql);
$totalvalue=mysqli_fetch_array($totalvalue);
$totalvalue=$totalvalue['totalvalue'];		
 
 echo number_format ($totalvalue*0.1,2);
			   ?> zł</span>
                        </div>
                    </div>
                </div>
                <!-- 底部 -->
                <div class="content-body-bottom">
                    <!-- 图标 -->
                    <div class="tips">
                        <img src="../assets/image/earth.png" alt="">
                        <p>Udało się, Twoja pomoc w ochronie <br> naszej planety jest nieoceniona.</p>
                    </div>
                    <!-- 按钮 -->
           <!--- <a href='../index.php' style="text-decoration: none;">    -->        <div class="btn" id="endbtn">Powrót do strony głównej<img src="../assets/image/arror-right.svg" alt=""></div> 
             </a>   </div>
            </div>
        </div>
    </div>
	
	
	
	
 
	
	
	<?php 
	
	

 
date_default_timezone_set("PRC");
$sql = "select * from user_transaction where uploaddone=0 order by id desc  "; //查找沒有update到服務器的。
$comresult = mysqli_query($link, $sql);
$comresult = mysqli_num_rows($comresult);

if ($comresult!=0) {
    $doup = 1; //標記


	$sql = "select * from barcode ";
    $comresult = mysqli_query($link, $sql);
    $comresult = mysqli_fetch_array($comresult);
    $barcodeversion = $comresult['version'];
	
	
    $sql = "select * from user_transaction where uploaddone=0  "; //查找沒有update到服務器的。
    $comresult = mysqli_query($link, $sql);
    $comresult = mysqli_fetch_array($comresult);
    $transactionid = $comresult['transactionid'];
    // echo $barcodeversion;
    $sql = "select * from command ";
    $comresult = mysqli_query($link, $sql);
    $comresult = mysqli_fetch_array($comresult);
    $statecode = $comresult['statecode'];
    $mid = $comresult['mid'];
	
 $errorcode=0;
    $device = ""; //device
 
        $storagecan = 10;
		 $storageplastic = 10;
 
	
	
    $sql = "select * from user_transaction where transactionid='$transactionid' order by dateline asc"; //查找沒有update到服務器的。
    $comresult = mysqli_query($link, $sql);
    $comresult = mysqli_fetch_array($comresult);

    $user = $comresult['user'];
    $dateline = $comresult['dateline'];
    $rebateordonate ="0";
    $platform = "";
    $charityname = ""; 
    $charityid = ""; 
 $transactionid = $comresult['transactionid'];
    $octreceipt = $comresult['octreceipt'];
    $transactiondone = $comresult['transactiondone'];
 

    $sql = "select sum(bottlevalue) as total from user_transaction where transactionid='$transactionid'  and recognitionstatus=1  ";
    $bottlevalue = mysqli_query($link, $sql);

    $bottlevalue = mysqli_fetch_array($bottlevalue);
    $bottlevalue = $bottlevalue['total'];

    $totalbottlevalue = $bottlevalue; //計算累計value
	
 
if(!$totalbottlevalue)
{
	$totalbottlevalue=0;
	
}


    $sql = "select * from user_transaction  where transactionid='$transactionid'"; //
    $result = mysqli_query($link, $sql);

    $data = array();

    $data['barcodedata'] = array();
    $data['info'] = array();
    // $data['barcodedata']['barcode']=array();
    // $data['barcodedata']['weight']=array();
    // $data['barcodedata']['bottlevalue']=array();
    // $data['barcodedata']['recognitionstatus']=array();
    while ($it = mysqli_fetch_array($result)) {
        $barcodedata['dateline'] = $it['dateline'];
        $barcodedata['barcode'] = $it['barcode'];
        $barcodedata['weight'] = $it['weight'];
        $barcodedata['bottlevalue'] = $it['bottlevalue'];
        $barcodedata['recognitionstatus'] = $it['recognitionstatus'];
		$barcodedata['diam']=$it['diam']; 
		$barcodedata['bors']=$it['metal']; 
 
        array_push($data['barcodedata'], $barcodedata);
    }

    $info['transactionid'] = $transactionid;
    $info['totalvalue'] = $totalbottlevalue; //$value;
    $info['user'] = $user;
    $info['rebateordonate'] = $rebateordonate;
	 
	if($user=='donate')
	{
		$platform="donate";
	}
    $info['platform'] = $platform;
   // $info['value'] = 1; //$value;
    $info['charityname'] = $charityname;
	  $info['charityid'] = $charityid;
    $info['storageplastic'] = $storageplastic;
	    $info['storagecan'] = $storagecan;
    $info['statecode'] = $statecode;
    $info['mid'] = $mid;
    $info['device'] = $device;
    $info['barcodeversion'] = $barcodeversion;
    $info['octreceipt'] =  "0";
    $info['transactiondone'] = $transactiondone;
	$info['octaddvaluetime']='0';
    $info['break'] = $transactiondone;
 $info['errorcode'] = '0';
 
 
    array_push($data['info'], $info);
    echo var_dump(json_encode($data));
    $data = json_encode(encrypt($data));



    /**
     * echo var_dump($data);
     * echo '<br>';
     * echo var_dump(decrypt($data));
     */

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://188.125.156.176:8080/rvm/public/urlget/user_transaction.php'); //這裏要做壹個接受中斷數據的接口
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 28);

    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array('Content-Type: application/json; charset=utf-8',)
    );
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSLVERSION, 1);
    
 //$response = curl_exec($ch);

if(curl_errno($ch))
{
										//	有错误情况
		echo '2error='.curl_errno($ch);
}
else
{
	
  //成功
				   
					 

						 
								if ($transactiondone = 0) {//還沒有點擊結算，很有可能是斷電。
									$sql = "update user_transaction set transactiondone=1,uploaddone=1 where transactionid='$transactionid'"; //標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
									mysqli_query($link, $sql);
								} elseif ($transactiondone = 2) {  //已經點擊結算，結束了投樽之後的情況。
									$sql = "update user_transaction set uploaddone=1 where transactionid='$transactionid'"; //標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
									mysqli_query($link, $sql);
								}
								
			 	
						
		
    } 
    curl_close($ch);
}

else  //如果沒有需要上傳的數據
{
	 
}
// ===============================================檢測是否有transaction處理結束。================================
// 系統制作人，儲盛峰來自上海，  聯系維護 email:shengfeng2015@163.com / sharonxia@163.com 電話 and wechat：13918715708
// ===============================================檢測是否要下載交換八達通文件。================================
// if(date("Hi",time()) > "1930" && date("Hi",time()) < "2000")
// 先檢測是否有新的八達通的交換文件   如果文件和服務器壹樣就不會執行， 註意，如果傳輸失敗，需要顯示錯誤信息，並且報告，記錄
 
 






 
 
 
 
 
 function encrypt($id)
{
    $id = serialize($id);
    $key = file_get_contents("../../SECRET-AES-256/secret.txt");

    $data['iv'] = base64_encode(substr($key, 0, 16));
    $data['value'] = openssl_encrypt($id, 'AES-256-CBC', $key, 0, base64_decode($data['iv']));
    $encrypt = base64_encode(json_encode($data));
    return $encrypt;
}

function decrypt($encrypt)
{
    $key = file_get_contents("../../SECRET-AES-256/secret.txt");
    $encrypt = json_decode(base64_decode($encrypt), true);
    $iv = base64_decode($encrypt['iv']);
    $decrypt = openssl_decrypt($encrypt['value'], 'AES-256-CBC', $key, 0, $iv);
    $id = unserialize($decrypt);
    if ($id) {
        return $id;
    } else {
        return 0;
    }
}

	?>
		<script>
    // 全局变量
    let countdown;  
    let timeLeft;   

    function startCountdown() {
        let timeElement = document.getElementById('time');
        timeLeft = parseInt(timeElement.textContent, 10);

        countdown = setInterval(() => {
            timeLeft--;

            if (timeLeft >= 0) {
                timeElement.textContent = timeLeft;
            }

            if (timeLeft < 0) {
                clearInterval(countdown);
                window.location.href = 'http://127.0.0.1/tjt'; // 页面跳转
            }
        }, 1000); 
    }

    window.onload = startCountdown;
</script>
	
	   <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
 
setTimeout("javascript:location.href='../index.php'",  120000); 
 


</script>
 
 
	<!--
 
<script>
let link = document.getElementById("endbtn");

// 初始禁止跳转
function blockJump(event) {
    event.preventDefault(); 
}
link.addEventListener("click", blockJump);

// 点击按钮时，移除阻止 → 链接恢复正常
function enableJump() {
    link.removeEventListener("click", blockJump); 
}
</script>



	-->
	
	
		<script src="js/jquery-1.9.1.min.js"></script>
	<script>
	
 let isClicked = false;
	  const button = document.getElementById('endbtn');
        
        // 添加点击事件监听器
     button.addEventListener('click', function() {
    
	
	
		 
		  
		     if (!isClicked) {
    
        timeLeft = 30;
        isClicked = true;
        
       
          timer = setInterval(CountDown, 1000);
    } 
		  
		  
		  
		  document.getElementById('endbtn').innerHTML ='Proszę czekać';
		  
		  
		  
	 function CountDown() { 	


		 
	 
		  $.ajax({
							url: "crusherdata.php?close=1",
							type: 'get',
						    dataType: "json",

							 success: function (res) {
								 
								 
										if(res.success=='close')
										{ 
											 window.location.href = 'http://127.0.0.1/tjt'; // 页面跳转
										}
										else{

											} 
										}
		 
							}) 

		  
		      }
		  
        });
	
	</script>
	
	
	
	
	 





 	<script>
 		var datavalue;

 		function narn(type,datatitle,text_ch,text_rn) {
 			naranja()[type]({ 
 				title: datatitle,
 				textch: text_ch,
				texten:text_rn,
 				timeout: '3000', 
 			})
 		}
 
 		$(function() {
 			$("#btn").bind("click", {
 				btn: $("#btn")
 			}, function(evdata) {
 				$.ajax({
 					type: "POST",
 					dataType: "json",
 					url: "crusherdata.php",
 					timeout: 80000000, //ajax請求超時時間80秒    
 					data: {
 						time: "50000000"
 					}, //40秒後無論結果服務器都返回數據    
 					success: function(data, textStatus) {
 
   
 	
	if (data.success == "30") {
 
 
 
setTimeout("javascript:location.href='../index.php'", 1000); 





							
						}
						
						
						
				
	else if (data.success == "10") {
 
  
 
 
    
 
 
						}
									
		 
									
						

						else {
							
							
					 




 							evdata.data.btn.click();
 							$("#msg2").append("<br>0");


 							/*  
 							 document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num;
 							 */

 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */



 						}
 					},




 					//Ajax請求超時，繼續查詢    
 					error: function(XMLHttpRequest, textStatus, errorThrown) {
 						if (textStatus == "timeout") {
 							$("#msg").append("<br>[超時空白頁]");
 							evdata.data.btn.click();
 						}
 					}




 				});
 			});





 		});
		
		
 




 	</script>

	
 	<input id="btn" type="hidden" value="測試" />
 	<div id="msg2" style="margin-top:10px;">  </div>

 

 	<script type="text/javascript">
 		// 兩秒後模擬點擊
 		setTimeout(function() {
 			// IE
 			if (document.all) {
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





	
	
	
	
	
	
	
	 
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</body>


</html>