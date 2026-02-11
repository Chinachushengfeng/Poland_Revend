 <html lang="en" class="dk_fouc has-js">

 <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

 	<title> </title>
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">

 	<!-- Loading Bootstrap -->


 	<!-- Loading Flat UI -->
 	<link rel="stylesheet" type="text/css" href="css/style.css">

 	<link rel="stylesheet" href="css/swiper.min.css">
 	<link rel="stylesheet" href="css/naranja.min.css">
 	<!--  <link rel="stylesheet" href="css/swiper.min.css"> 優惠券!-->
 	<link rel="stylesheet" href="css/certify.css">
 	<link rel="stylesheet" href="css/dengdaitouping.css">
 	<script src="js/swiper.min.js"></script>

	<script src="js/jquery.min.js"></script>

 	<script type="text/javascript" src="js/naranja.js"></script>

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

 		body,
 		td,
 		th {
 			font-family: Lato, sans-serif;
 		}

 		body {
 			background-color: #005D30;

 			background-repeat: repeat;
	background-image: linear-gradient(#08eed5, #007573);
 			font-family: "Arial Black", Gadget, sans-serif;
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
 			margin-top: 550px;
 			margin-left: -1121px;


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
date_default_timezone_set("PRC");	
		include("incdb.php");

		error_reporting(0);
		// $sql="SELECT SUM(value) as totalvalue from  user_transaction where user='$user' and transactiondone='0' and recognitionstatus="1""; 
		// $result=mysqli_query($link,$sql);
		// $result=mysqli_fetch_array($result);
		// $totalvalue=$result['totalvalue'];

		include("function/sql.php");

 	$mid = select("command", "mid");
	
		$sql = "update command set command=1"; //开门
		mysqli_query($link, $sql);

		$sql = "update ocl set task=2"; // 
		mysqli_query($link, $sql);


 

	 
   $octreceipt= intval(substr($mid,2,6)).substr(time(),1,12);
   
 
 
   
   
 $sql="update  ocl  set receipt='$octreceipt'  ";
 mysqli_query($link,$sql);






 

		?>

 
 	 

 	<div class="container" style="position:absolute;margin-top:20%">
 		<div class="row" style="padding:2em 0">


 		</div>
 	</div>


 	<div id="bottle-num"> </div>



 	</div>
 	</div>



 	<?php
	    $userscan =  $_COOKIE["user"];
		//$userscan = select("command", "userscan");
		$limitedvalue = select("command", "limitedvalue");
		$usermaxvalue = select("ocl", "usermaxvalue");
		$ishide=select("command", "ishide");
			
			
			
		   if  ( substr($userscan,0,1 )=='K')  {
			
		 
				$limitedvalue = select("command", "limitedvalue");



			$userscan = "";
			$type="dds";
			$url = "ddsreceipt.php?user=".$_GET['userscan'];
			
		 
	 
	 
			echo '<img src="images/dds.png "width=92.5%" style="position:absolute;margin-left:4%;margin-top:20px;opacity:0.9" width=90%> </img>';
			
		$button="Finish";
			
			
		}
		
	     elseif (strlen($userscan) >= 117 && strlen($userscan) <= 1110 ) {

					$url = "gotoocl/index.php";
					$typestr='八達通號碼 Octopus no.：';
					echo '<img src="images/bdt.png"  "width=100%"      style="position:absolute;margin-left:4%;margin-top:10px;opacity:0.9" width=90%> </img>';
				
				$button="Finish";
						}
						
						
						
		 elseif (strlen($userscan) == 32) {
			$userscan = substr($userscan, -13, 13);
			$type="alipay";
			$url = "gotoalipay/qsh.php";
			$typestr='支付寶香港號碼 Alipay HK no.：';
		echo '<img src="images/alipay.png"  "width=105%"      style="position:absolute;margin-left:4%;margin-top:30px;opacity:0.9" width=90%> </img>';
		$button="Finish";
		
		
		}
 
		
		else   {
			
			
	 	 setcookie("user",'donate',time()+3600,"/" );
	 
			$charityid=$_GET['donate'];
			
			
			$sql="update command set userscan ='donate',limitedvalue='30',charityid='$charityid'";
			mysqli_query($link,$sql);
				$limitedvalue = select("command", "limitedvalue");



			$userscan = "";
			$type="donate";
			$url = "donate.php?donate=".$_GET['donate'];
			
			$charityid=$_GET['donate'];
			
			$sql="select * from charityname where charityid='$charityid'";
			$result=mysqli_query($link,$sql);
			$result=mysqli_fetch_array($result);
			$encharity=$result['encharityname'];
			$zhcharity=$result['chhcharityname'];
			
			
			$typestr='';
		

		echo '<img src="images/donate.png "width=105%" style="position:absolute;margin-left:4%;margin-top:20px;opacity:0.9" width=90%> </img>';
			
		$button="Koniec";
			
			
		}


		?>
 
 	<table width="92%" border="21px" style="margin-top:130px;margin-left:45px">

 		<tr> 

 			<td width="62%" align="left" style="font-size:28px"><strong style=" border-radius:10px">
 					<?php echo $typestr;?></strong> <span style="font-size:28px"> <?php echo  $userscan; ?></span>

	<hr style="background-color:#fff;border:none;height:1px;width:80%;margin-left:10%;opacity:0; ">
 			
 			</td>

<tr>
<td>
 
</td>
</tr>


<tr>

 


 			<td  align="left"><span class="bianjiziti" style="font-size:28px ;">
			
			
			
	<?php  
	
 
 if(	$type=="donate")
 {
	 goto out;
 }
 
 
	if($ishide != '1')
	{
 				echo	'<strong style=" border-radius:10px">當天回贈限額 Daily rebate limit：</strong>  '; 
					 
					 
				 	echo '$' . number_format($limitedvalue * 0.1,1);

echo '	<hr style="background-color:#fff;border:none;height:1px;width:80%;margin-left:10%;opacity:0; ">
 			';


echo ' <td> 
	
	 	<hr style="background-color:#ededed;border:none;height:2px;width:92%;margin-left:-615px;margin-top:-15px ;position:absolute"> 
 			
 			
</td>';


	}
	
	else
	{
		
			echo	'<strong  style=" border-radius:10px">當天回贈限額 Daily Rebate Limit：</strong> '; 
					 
					 
				 	echo '$' . number_format($limitedvalue * 0.1,1);



echo ' <td> 
	
 
 			
</td>';
	}
				
			







			
			out:

				?>
					
					
					
					
				 

 					</strong></span>


 			</td>
 		</tr>



<?php 
//这里是捐赠机构的信息
	$getcharityid=  $_GET['donate'];
				
				$sql="select * from charityname where charityid='$getcharityid' ";
				$result=mysqli_query($link,$sql);
				$result=mysqli_fetch_array($result);
				$chcharityname=$result['chcharityname'];
				$encharityname=$result['encharityname'];
				
if($type=="donate")
{
	 
echo '

<tr   >

<td  colspan="2" class="bianjiziti" style="font-size:28px" >

"Test mode"

'.$chcharityname.'  <span style="font-size:16px">'.$encharityname.'</span>


</td>
</tr>



 <td> 
	
	 	<hr style="background-color:#ededed;border:none;height:2px;width:160%;margin-left:0px ">
		<hr style="background-color:#fff;border:none;height:1px;width:80%;margin-left:10%;opacity:0; ">
 			
 			
</td>
 
 
 
';

}



?>
 
 
 
  
 

 		<tr>
 		 

 

 			<td  align="left"><span style="font-size:28px;">  
			 
			
			<?php if($type=="donate") {echo 'Kwota rabatu：';}else{echo 'Rebate amount：';}?>   $<span id="msg1">0.0</span>


		<hr style="background-color:#fff;border:none;height:1px;width:80%;margin-left:10%;opacity:0; ">
 			
			</td>
 		</tr>


		<tr>
  

 		<td  align="left" style="font-size:28px ;"><strong style="border-radius:10px">Statystyki recyklingu：</strong>
		
 				<span id="msg" style="text-decoration:underline">0</span>     <img src='images/b.png' style='margin-top:-60px;margin-left:10px;position:absolute'> </img>  
				
			 
 				<span id="canmsg"  style="text-decoration:underline;margin-left:65px" >0</span>     <img src='images/c.png' style='margin-top:-55px;margin-left:15px;position:absolute'></img> 

				
				<hr style="background-color:#fff;border:none;height:1px;width:80%;margin-left:10%;opacity:0; ">
 			
			</td>

 		</tr>
		
		

 		<tr>





 			<!--- <td  width="325" align="center" style="font-size:20px ;;" ><strong  >最多可回收:</strong>
		<span    >50個</span>
		<img src="images/bottle.png "width=35px> </img>
		</td>
		--->


			 <td  align="left" style="font-size:28px" width="10%">
			 
			 <strong>Pozostał limit zwrotu：</strong>
 				<span id="msg3" ><?php

 

	
									if ($limitedvalue * 0.1 / 0.1 > 30) {   //0.1是设定的值！
										echo 30;
									} else {
										echo filter($limitedvalue * 0.1 / 0.1, 0);  //0.1是设定的值！
									}



									function filter($money, $accuracy = 2)
									{
										$str_ret = 0;
										if (empty($money) === false) {
											$str_ret = sprintf("%." . $accuracy . "f", substr(sprintf("%." . ($accuracy + 1) . "f", floatval($money)), 0, -1));
										}

										return floatval($str_ret);
									}





									?></span> <span id="msg5">Ilość</span>		</td>
									
											<td style="font-size:20px"  >
									
				 <span id="msg6" style="font-size:27px"> <!-- <img src="images/bottle.png " width=35px> </img></span> -->
				 <strong style='margin-left:100px'>Odliczanie：</strong>

 				<span id="timer" style="font-size:28px;">120</span> 
				<!-- <span><img src="images/time.gif " width=35px /></span>  -->
				
 			</td>

 		</tr>




 	</table>

  
 	</div>


 

 						<?php
						
 
						
						if ($type=="alipaynope"){
							 
						
						
						
						echo '
 	<span style="margin-left:35%;; border-radius:10px"><strong><span style="color:#ff7300"> ❤ </span>您還可以通過以下慈善組織進行捐贈 <span style="color:#ff7300"> ❤ </span></strong></span>
 	<br>
 	<span style="margin-left:20%;; border-radius:10px"><strong><span style="color:#ff7300"> ❤ </span> You can also donate through the following charitable organizations<span style="color:#ff7300"> ❤ </span></strong></span>








 	<div id="certify" style="margin-top:-320px;margin-left:6%">
 		<div class="swiper-container">
 			<div class="swiper-wrapper">




 				<div class="swiper-slide" style="margin-top:255px;margin-left:-250px">
 					<p align="center" style="margin-top:-30px">
';
						
						
						
						
						
						
						

							$sql = "select * from charityname ";

							$result = mysqli_query($link, $sql);
							$charityarray = array();
							$i = 0;
							while (($charityname = mysqli_fetch_array($result) ) && $i<=2 ) {



								$charityarray['zhcharity'][$i] = $charityname['chcharityname'];

								$charityarray['encharity'][$i] = $charityname['encharityname'];
								$charityarray['charityid'][$i] = $charityname['charityid'];


								echo ' <a href="donate.php?url=donate&donate=' . $charityarray['charityid'][$i] . '" class="coupon" style="font-size:28px">' . $charityarray['zhcharity'][$i]."<br> <span style='font-size:18px'>".$charityarray['encharity'][$i]   . '</span></a> ';  //<img src="images/1.jpg" width="180px" style="border-radius:50px" >

								$i = $i + 1;
								
								
								
								
							}


							echo '</div>






							</div>
							</div>



							<div class="swiper-button-prev"></div>
							<div class="swiper-button-next"></div>

							</div>';









						}
						




							?>







 				 






 	<br><br>



 	<span class="rebate" id="endbtn" style="bottom:-10px;left:50%;position:absolute;transform:translate(-50%,-50%)"><?php echo $button ;?></span>
	
 
<script>
	var pressed=0;
	 
$(function () {
	  
				 
            $('#endbtn').click(function () {
				
					 if (pressed==1)
					 {
						 return;
					 }
					 pressed=1;
					 
					 
					 
                var count = 30;
                var countdown = setInterval(CountDown, 1000);
				 document.getElementById("endbtn").innerHTML = "Proszę chwilę poczekać";
				 maxtime=30;
				  
                function CountDown() { 
				//	document.all["timer"].innerHTML = count;
					
					 
					
                    if (count == 0) {
						console.log("点击我");
                        clearInterval(countdown);
	   
				window.location = '<?php echo $url;?>'
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
 		var temp = 0;

 		function CountDown() {

 
 			if (maxtime >= 0) {

 				seconds = maxtime;
 				msg = seconds; //原來的：   msg =  seconds + "秒";
 				document.all["timer"].innerHTML = msg;

 				--maxtime;


 			} else {


 				clearInterval(timer);




 			}





 			if (document.getElementById("msg").innerHTML != temp) {

 				maxtime = 120;


 				temp = document.getElementById("msg").innerHTML;

 			}


 			if (document.getElementById("timer").innerHTML == '0') //如果要加秒的話 記住是'0秒'
 			{




									//	window.location.href = '<?php echo $url; ?>';
										
										
										 
										var count = 30;
										var countdown = setInterval(CountDown, 1000);
										 document.getElementById("endbtn").innerHTML = "Proszę poczekać chwilę.";
										 
										function CountDown() { 
											document.all["timer"].innerHTML = count; 
											if (count == 0) {
												console.log("点击我");
												clearInterval(countdown);
							   
										window.location = '<?php echo $url;?>'
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





 	<script>
 		certifySwiper = new Swiper('#certify .swiper-container', {
 			watchSlidesProgress: true,
 			slidesPerView: 'auto',
 			centeredSlides: true,
 			loop: true,
 			loopedSlides: 5,
 			autoplay: false,
 			navigation: {
 				nextEl: '.swiper-button-next',
 				prevEl: '.swiper-button-prev',
 			},
 			pagination: {
 				el: '.swiper-pagination',
 				//clickable :true,
 			},
 			on: {
 				progress: function(progress) {
 					for (i = 0; i < this.slides.length; i++) {
 						var slide = this.slides.eq(i);
 						var slideProgress = this.slides[i].progress;
 						modify = 0.2;
 						if (Math.abs(slideProgress) > 21) {
 							modify = (Math.abs(slideProgress) - 1) * 0.2 + 1;
 						}
 						translate = slideProgress * modify * 260 + 'px';
 						scale = 1 - Math.abs(slideProgress);
 						zIndex = 999 - Math.abs(Math.round(10 * slideProgress));
 						slide.transform('translateX(' + translate + ') scale(' + scale + ')');
 						slide.css('zIndex', zIndex);
 						slide.css('opacity', 1);
 						if (Math.abs(slideProgress) > 1) {
 							slide.css('opacity', 0);
 						}
 					}
 				},
 				setTransition: function(transition) {
 					for (var i = 0; i < this.slides.length; i++) {
 						var slide = this.slides.eq(i)
 						slide.transition(transition);
 					}

 				}
 			}

 		})
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
 						if (document.getElementById("msg3").innerHTML == "0") {
 							document.getElementById("msg3").innerHTML = "End ……";
 							document.getElementById("msg5").innerHTML = "";
 							document.getElementById("msg6").innerHTML = "";

 							javascript: location.href = '<?php  echo $url; ?>'
 						}

 						//從服務器得到數據，顯示數據並繼續查詢    
 						if (data.success == "1") {
							
							
							
								
				if (data.metal == "0") {   //是塑料瓶
					
					 		
 							evdata.data.btn.click();
 							document.getElementById("msg3").innerHTML = parseInt(document.getElementById("msg3").innerHTML) - 1;
 							mynum = parseInt(document.getElementById("msg").innerHTML) + 1;

 							bottletotalvalue = document.getElementById("msg1").innerHTML; //msg1本身
 							document.getElementById("msg1").innerHTML = (parseFloat(bottletotalvalue) + parseInt(data.bottlevalue) * 0.1).toFixed(1); //每次乘以0.2(mynum*0.2).toFixed(1);

 							successnum = parseInt(document.getElementById("msg").innerHTML) + 1;
 							document.getElementById("msg").innerHTML = successnum;
 		 
 							narn("success","","Skuteczny recykling","Recykling butelek udany +1");

							playsound("dingding");

 
				}

				else
				{
	
								
 							evdata.data.btn.click();
 							document.getElementById("msg3").innerHTML = parseInt(document.getElementById("msg3").innerHTML) - 1;
 							mynum = parseInt(document.getElementById("canmsg").innerHTML) + 1;

 							bottletotalvalue = document.getElementById("msg1").innerHTML; //msg1本身
 							document.getElementById("msg1").innerHTML = (parseFloat(bottletotalvalue) + parseInt(data.bottlevalue) * 0.1).toFixed(1); //每次乘以0.2(mynum*0.2).toFixed(1);

 							successnum = parseInt(document.getElementById("canmsg").innerHTML) + 1;
 							document.getElementById("canmsg").innerHTML = successnum;
 		 
 							narn("success","","Skuteczny recykling","Pomyślnie recyklowane puszki +1");

							playsound("dingding");

	
	
				}
 
  
 


 						} else if (data.success == "2") {

	playsound("Please try again");
 							evdata.data.btn.click();
 							/* 
document.getElementById("msg1").innerHTML=data.value;
document.getElementById("msg").innerHTML=data.num; */
 						 
narn("error","(Błąd)"," ","Za dużo płynu w butelce");


 						} else if (data.success == "3") {
playsound("barcode not in database");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 						 
 							narn("error","(Błąd)"," ","Brak kodu kreskowego w bazie danych");

 						} else if (data.success == "6") {
playsound("Unreadable Barcode");
 							evdata.data.btn.click();
 							/* 
document.getElementById("msg1").innerHTML=data.value;
document.getElementById("msg").innerHTML=data.num; */
 						 
 							narn("error","(Błąd)"," ","Nieczytelny kod kreskowy");


 						} else if (data.success == "4") {
playsound("Please try again");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "image failed";
 						narn("error",""," ","Rozpoznanie obrazu nie powiodło się");

 						} else if (data.success == "5") {
  playsound("Please Do Not Touch The Bottle When Recycling");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "Recycle failed";
 							 
							narn("warn"," "," ","Prosimy nie dotykać butelki podczas recyklingu");

 						} else if (data.success == "7") {
playsound("Please try again");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "Size mismatch";
 							narn("warn","","","Bottle Shape And Barcode Does Not Match");

 						}
 else if (data.success == "8") {
 playsound("Please Do Not Touch The Bottle When Recycling");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "Recycle failed";
 							 
							narn("warn","(Warn)","","Prosimy nie dotykać butelki podczas recyklingu");

 						}


 else if (data.success == "9") {
 
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "Full";
 							 
							narn("error","Plastic Bottle Storage Box Has Full",""," ");

 						}

 else if (data.success == "10") {
 
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "回收失败Recycle failed";
 							 
								narn("error","Aluminum Can Storage Box Has Full ","","");
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
 	<div id="msg2" style="margin-top:500px;"> 12</div>

 <embed height="0" width="0" src="http://127.0.0.1/sound/Please insert plastic bottles into the RVM.wav" />


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