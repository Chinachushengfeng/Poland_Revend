<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/page3.css">
 
	<script src="js/jquery.min.js"></script>
 	<script src="js/swiper.min.js"></script>
 

 	<script type="text/javascript" src="js/naranja.js"></script>

 	<script src="js/myjs.js"></script>
    <title>Document</title>
</head>
 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>

    <div class="main">
        <div class="cricle-one">
            <div class="cricle-two">
                <div class="cricle-three"></div>
            </div>
        </div>
        <!-- 故障提示 -->
        <div id="wrong" class="catroon">
            <div class="wrong catroon">
                <img src="../assets/image/wrong-circle.svg" alt="">
                <div class="wrongCard">
                    <div class="wrong-title">Błąd!</div>
                    <div class="wrong-content" id='prompts'>12 
                    </div>
                </div>
            </div>
        </div>



 

        <!-- 注意提示 -->
        <div id="notice">
            <div class="notice catroon">
                <img src="../assets/image/notice-circle.svg" alt="">
                <div class="noticeCard">
                    <div class="notice-title">Uwaga!</div>
                    <div class="notice-content">Zachowaj ostrożność i nie trzymaj butelki <br> w trakcie procesu
                        recyklingu.
                    </div>
                </div>
            </div>
        </div>
 
		
		
		<?php


date_default_timezone_set("PRC");	
		include("incdb.php");

		error_reporting(0);
		// $sql="SELECT SUM(value) as totalvalue from  user_transaction where user='$user' and transactiondone='0' and recognitionstatus="1""; 
		// $result=mysqli_query($link,$sql);
		// $result=mysqli_fetch_array($result);
		// $totalvalue=$result['totalvalue'];

		include("function/sql.php");

 	$mid = select("command", "mid");
  	$bottle = select("command", "bottle");
  	$can = select("command", "can");
 
if (!$bottle and !$can)
{
	$bottle=0;
	$can=0;
	
}
?>
        <!-- 内同 -->
        <div class="content">
            <!-- 头部内容 -->
            <div class="content-head">
                <div class="page">
                    <div class="pageCircle-one">
                        <p>3</p>
                    </div>
                    <div class="title"></div>
                </div>
                <img src="../assets/image/logo.png" alt="">
            </div>
            <!-- 主体内容 -->
            <div class="content-body">
                <div class="content-body-main">
                    <div class="bottle img-c-d">
<div id="Bottlesuccess">
                    <div class="success">
                    <img src="../assets/image/successTip.svg" alt="">
                                <div class="successCard">
                                    <div class="success-title">Sukces!</div>
                                    <div class="success-content">+1 zrecyklowane</div>
                                </div>
                            </div>
                        </div>
                        <!-- 塑料瓶 -->
                        <img src="../assets/image/bottle.png" alt="">
                        <div class="count"><span>Butelki:</span>
                            <div class="number"  id="msg"><?php echo $bottle;  ?></div>
                        </div>
                    </div>
                    <!-- 易拉罐 -->
                    <div class="can img-c-d">
					 <!-- 易拉罐成功提示 -->
					<div id="Cansuccess">
					<div class="success">
					<img src="../assets/image/successTip.svg" alt="">
					<div class="successCard"><div class="success-title">Sukces!</div>
<div class="success-content">+1 zrecyklowane</div>
</div>
</div>
                        </div>
                        <img src="../assets/image/can.png" alt="">
                        <div class="count"><span>Puszki:</span>
                            <div class="number"  id="canmsg"><?php echo $can;  ?></div>
                        </div>
                    </div>
                    <!-- 右边表格 -->
                    <div class="table ">
                        <!-- 剩余时间 -->
                        <div class="re re-time">
                            <p>Czas na recykling: </p> <span id="timer">120</span>
                        </div>
                        <div class="line"></div>
                        <!-- 瓶子/易拉罐限制 -->
                        <div class="re re-limit">
                            <p> Limit butelek/puszek: </p> <span id="msg3" >30</span>
                        </div>
                        <div class="line"></div>
                        <!-- 金额 -->
                        <div class="re discount">
                            <p>Wartość rabatu: </p> <span  id="msg1">0.00</span><span>zł</span>
                        </div>
                    </div>
                </div>
                <div class="content-body-bottom">
                    <!-- 底部左边提示 -->
                    <div class="tips">
                        <img src="../assets/image/mc.png" alt="">
                        <p>Wrzuć butelkę/puszkę kiedy okrąg <br> wlotu świeci się na zielono.</p>
                    </div>
                    <!-- 底部按钮 -->
					
                <a href='qsh.php' style="text-decoration: none;">    <div class="btn" id="endbtn"  >KOŃCZYMY <img src="../assets/image/arror-right.svg" alt=""></div>
			</a>		
 
					
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    // value 指按钮点击传入的值
    function changeStatus(value,mymsg) {
        var Card = document.getElementById(value)
		
		
      document.getElementById("prompts").innerHTML =  mymsg  ;
        Card.style.opacity = 1
        setTimeout(() => {
            Card.style.opacity = 0
        }, 3000);

    }
	
	 
</script>




<script>
	var pressed=0;
	 
$(function () {
	   
            $('#endbtn').click(function () {
				
					 if (pressed==1)
					 {
						 return;
					 }
					 pressed=1;
					 
					 
					 
                var count = 3;
                var countdown = setInterval(CountDown, 1000);
				 document.getElementById("endbtn").innerHTML = "Proszę poczekać";
				 maxtime=3;
				  
                function CountDown() { 
				//	document.all["timer"].innerHTML = count;
					
					 
					
                    if (count == 0) {
						console.log("点击我");
                        clearInterval(countdown);
	   
				window.location = 'qsh.php'
			     }
					count--; 
							$.ajax({
							url: "data.php?close=1",
							type: 'get',
						    dataType: "json",

							 success: function (res) {
									 console.log(res);
										if(res.success=='close')
										{ 
											count=0;
										}
										else{

											} 
										}
		 
							}) 
                }
				 
				 $.ajax({
					 
							url: "data.php?close=1",
							type: 'get',
         
    })
			
				
				
			 	
            })
			
			
			
			 
 				  
			
			
			
			
			
        });
		
		
		
		
		
		
		
		
		
		
		
</script>




 	<!--  <img style="position:absolute;margin-left:-120px;margin-top:0px" src="images/alipay.jpg" width="120px"></img> ！-->




<audio id="sound"> </audio>


 	<script type="text/javascript">
 		var maxtime = 120; //   

 		function CountDown() {

 
 			if (maxtime >= 0) {

 				seconds = maxtime;
 				msg = seconds; //原來的：   msg =  seconds + "秒";
 				document.all["timer"].innerHTML = msg;

 				--maxtime;


 			} else {


 				clearInterval(timer);




 			}




 
	 
			
			
			

 			if (document.getElementById("timer").innerHTML == '0') //如果要加秒的話 記住是'0秒'
 			{




									//	window.location.href = '<?php echo $url; ?>';
										
										
										 
										var count = 3;
										var countdown = setInterval(CountDown, 1000);
										 document.getElementById("endbtn").innerHTML = "Proszę poczekać";
										 
										function CountDown() { 
											document.all["timer"].innerHTML = count; 
											if (count == 0) {
												console.log("点击我");
												clearInterval(countdown);
							   
										window.location = 'qsh.php'
										 }
											count--; 
													$.ajax({
													url: "data.php?close=1",
													type: 'get',
													dataType: "json",

													 success: function (res) {
															 console.log(res);
																if(res.success=='close')
																{ 
																	count=0;
																}
																else{

																	} 
																}
								 
													}) 
										}
										 
										 $.ajax({
											 
													url: "data.php?close=1",
													type: 'get',
								 
							})
									
				
				
			 	
          
				
				

 			}




 		}
 		timer = setInterval("CountDown()", 1000);
 	</script>





 	<script src="js/jquery-1.9.1.min.js"></script>



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
 					url: "data.php",
 					timeout: 80000000, //ajax請求超時時間80秒    
 					data: {
 						time: "50000000"
 					}, //40秒後無論結果服務器都返回數據    
 					success: function(data, textStatus) {
 	 
											
			  if (document.getElementById("msg3").innerHTML.trim() == "0") {
					document.getElementById("msg3").innerHTML = "End ……"; 
						document.getElementById("timer").innerHTML  = "3"; 
						maxtime = 3;
					let seconds = 3;
					const countdown = setInterval(function() {
						seconds--;
					 
						if (seconds <= 0) {
							clearInterval(countdown); // 停止倒计时
							location.href = 'qsh.php';
						}
					}, 1000); // 每 1000 毫秒（1秒）更新一次
				}




 						//從服務器得到數據，顯示數據並繼續查詢    
 						if (data.success == "1") {
							
							
									playsound("dingding");
								
				if (data.metal == "0") {   //是塑料瓶
					
					
					 				maxtime = 120;
									 changeStatus('Bottlesuccess' )
 							evdata.data.btn.click();
 							document.getElementById("msg3").innerHTML = parseInt(document.getElementById("msg3").innerHTML) - 1;
 							mynum = parseInt(document.getElementById("msg").innerHTML) + 1;

 							bottletotalvalue = document.getElementById("msg1").innerHTML; //msg1本身
 							document.getElementById("msg1").innerHTML = (parseFloat(bottletotalvalue) + parseInt(data.bottlevalue) * 0.1).toFixed(2); //每次乘以0.2(mynum*0.2).toFixed(1);

 							successnum = parseInt(document.getElementById("msg").innerHTML) + 1;
 							document.getElementById("msg").innerHTML = successnum;
 		  
		 
					 
 
 
				}

				else 
				{
	 

 				maxtime = 120;

 
			
							changeStatus('Cansuccess'  )	
 							evdata.data.btn.click();
 							document.getElementById("msg3").innerHTML = parseInt(document.getElementById("msg3").innerHTML) - 1;
 							mynum = parseInt(document.getElementById("canmsg").innerHTML) + 1;

 							bottletotalvalue = document.getElementById("msg1").innerHTML; //msg1本身
 							document.getElementById("msg1").innerHTML = (parseFloat(bottletotalvalue) + parseInt(data.bottlevalue) * 0.1).toFixed(2); //每次乘以0.2(mynum*0.2).toFixed(1);

 							successnum = parseInt(document.getElementById("canmsg").innerHTML) + 1;
 							document.getElementById("canmsg").innerHTML = successnum;
 		 
 						 
							 

	
	
				}
} 
				 else if (data.success == "44") {

 
 setTimeout("javascript:location.href='cheating.php'", 1000); 


 						}else if (data.success == "55") {

 
setTimeout("javascript:location.href='cheatingend.php'", 1000); 

 						}

				

 						 else if (data.success == "2") {

	playsound("Please try again");
 							evdata.data.btn.click();
 							/* 
document.getElementById("msg1").innerHTML=data.value;
document.getElementById("msg").innerHTML=data.num; */
 						 
 
changeStatus('wrong','Pojemnik zawiera płyn.<br> Opróżnij butelkę.')


 						} else if (data.success == "3") {
playsound("barcode not in database");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 						  
changeStatus('wrong','Kodu kreskowego butelki nie ma w <br>bibliotece kodów kreskowych')

 						} else if (data.success == "6") {
playsound("Unreadable Barcode");
 							evdata.data.btn.click();
 							/* 
document.getElementById("msg1").innerHTML=data.value;
document.getElementById("msg").innerHTML=data.num; */
 						  
changeStatus('wrong','Nie można odczytać kodu kreskowego')

 						} else if (data.success == "4") {
playsound("Please try again");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "image failed";
 			 
						changeStatus('wrong','Rozpoznanie obrazu nie powiodło się')

 						} else if (data.success == "5") {
  playsound("Please Do Not Touch The Bottle When Recycling");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "Recycle failed";
							
 							changeStatus('notice',' Zachowaj ostrożność i nie trzymaj butelki <br> w trakcie procesu recyklingu.')		  

 						} else if (data.success == "7") {
playsound("Please try again");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "Size mismatch";
 							changeStatus('wrong','Błąd rozpoznawania. Spróbuj ponownie')		
 
 						}
 else if (data.success == "8") {
 playsound("Please Do Not Touch The Bottle When Recycling");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "Recycle failed";
 							 
						changeStatus('notice',' Zachowaj ostrożność i nie trzymaj butelki <br> w trakcie procesu recyklingu.')		
 						}


 else if (data.success == "9") {
 
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num;塑料瓶箱子已满 */
 							datavalue = "Full";
 							  
	changeStatus('wrong','Plastikowe pudełko do przechowywania butelek jest pełne')
 						}

 else if (data.success == "10") {
 
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; 易拉罐箱子已满 */  
 							datavalue = "回收失败Recycle failed";
 							  
					changeStatus('wrong','Aluminiowe pudełko do przechowywania puszek ma pełne')				
 						}

else if (data.success == "19") {
  
setTimeout("javascript:location.href='block.php'", 1000); 


						}
						
						


else if (data.success == "20") {
  
setTimeout("javascript:location.href='qsh.php'", 1000); 


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
		
		
 


		function playsound(name){
  sound.pause();
  //语音路径
  sound.src="http://127.0.0.1/sound/"+name+".wav";
  sound.play();
}
 

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





































</html>