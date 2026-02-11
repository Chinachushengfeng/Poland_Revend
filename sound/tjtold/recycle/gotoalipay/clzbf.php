  
	 
<link rel="stylesheet" href="../../css/style.css">
         <link rel="stylesheet" href="../css/bootstrap.min.css"> 
        <link rel="stylesheet" href="../css/fakeloader.css">
        
        
    <script src="jquery-1.9.1.min.js"></script> 
        <script src="../js/jquery.min.js"></script>
        <script src="../js/fakeloader.min.js"></script>
        
<style type="text/css">
body {
	background-image: url(../../images/wait.jpg);
	background-repeat: no-repeat;
}
</style>
</head>

<body>

   <div class="fakeloader" style="margin-top:300px;margin-left:0%"></div>

     
 
        <script>
            $(document).ready(function(){
                $(".fakeloader").fakeLoader({
                    timeToHide:51200,
              
                    spinner:"spinner2"
                });
            });
        </script>
  <p> 
   
    
  </head>
  <body>
 
 
 
 
 
 
	
	<?php 


//  <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
 
 

//{"request":{"header":{"version":"1.0.0","function":"alipay.intl.fund.topup.query","clientId":"4Q5XSN2YSG0BP501",
//"reqTime":"2017-11-12T12:08:56+05:30","reqMsgId":"732917398173h123hiuhiuyi","clientSecret":"watsonhk","reserve":""}
//,"body":{"topupRequestId":"9342894135104188361326438754399"}},"signature":" 
 
 
 date_default_timezone_set("PRC");
 include("IncDB.php");
 /*   $sql="update command set syserror=syserror+1";
	  mysqli_query($link,$sql); */


theheader:
syserror:
		



// $sql="update command set syserror=0";
// mysqli_query($link,$sql);


 $querystr=""; //得到query寻求api之后的返回值
  
  $sql="select * from command";
$totalnum=mysqli_query($link,$sql);
$totalnum=mysqli_num_rows($totalnum);


  
  
$sql="select * from command";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);              

$mid=$result['mid'];
$isqcs=0;
$isother=$totalnum;
$user="EPA001";
 
$version  = "1.0.0";							  
$function="alipay.intl.fund.topup.create";
$clientId = '4Q5XSN2YSG0BP501';
 
$reqTime= date('Y-m-d\TH:i:s.0000\Z', time());  
$sql="select * from command";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);

$reqMsgId = $mid.$user.time() ;
 
 
$clientSecret = 'watsonhk';
$reserve = "";
$currency="HKD";
$value=$_GET['value']*10;
// $value="10";
$jsonstr=$_GET['json'];  
$userReference=$jsonstr;
$alipayid=$mid.$userReference.time();
$fundSource="CASH";
$signature=""; 
  
   
$topupRequestId= $mid.time().'00'.rand(10000,99999);            //重要
  
 				$request='{"request":';		
	      // 	{"header":{"version":"1.0.0","function":"alipay.intl.fund.topup.create","clientId":"4Q5XSN2YSG0BP501","reqMsgId":"2b284b5cd0cd4ac1bdde09b0fff35a32","reqTime":"2017-11-12T11:34:55+0800","clientSecret":"watsonhk","reserve":""},"body":{"topupRequestId":"9342894135104188361326438754399", "payAmount":{"value":"10000","currency":"HKD"},"userReference":"1000000046102","fundSource":"CASH"}}	
 
	$alipay='{"header":{"version":"'.$version .'","function":"'.$function.'","clientId":"'.$clientId.'","reqMsgId":"'.$reqMsgId.'","reqTime":"'.$reqTime.'","clientSecret":"watsonhk","reserve":""},"body":{"topupRequestId":"'.$topupRequestId.'","payAmount":{"value":"'.$value.'","currency":"HKD"},"userReference":"'.$userReference.'","fundSource":"CASH"}}';
 
     $prestr=$alipay;
$secret=rsaSign($prestr);   //用rsa加密！

$alipay=$request.$alipay.',"signature":"'.$secret.'"}';

 echo $alipay; 
 
$ch = curl_init();
 


 curl_setopt($ch, CURLOPT_URL, 'https://isupergw.alipaydev.com/isupergw/alipay/intl/fund/topup/create.htm');
  


// curl_setopt($ch, CURLOPT_URL, 'https://isupergw.alipaydev.com/isupergw/alipay/intl/fund/topup/create.htm');
  
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $alipay);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
  
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                )
        );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSLVERSION, 1);
 


	for($i=1;$i<=5;$i++){   //网络请求，如果第一次成功直接继续处理，否则直到5次访问报错给屈臣氏客服画面。
 
 $response = curl_exec($ch); 
  
    if(curl_errno($ch)==false){   // curl api成功
		   
 	//echo "在第".$i."时请求成功";
		 
		 $createretry=$i;
	  break;
	          
    }
 
 if ($i==4)	  //just演示  如果第四次，就网络报错。
 {
	 
	 $sql="select * from user ";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);

$mid=$result['mid'];
  
$user=$result['user'];
 

   
  $myfile = fopen("C:/print.txt", "w") or die("Unable to open file!");//这个是在c盘根目录生成文件
  $b =  "l^CreatError Please Call".PHP_EOL."l^AlipayHK Hotline:2245 3201".PHP_EOL."l^********************************".PHP_EOL."l^MID:            ".$mid.PHP_EOL."l^userReference:".$userReference.
PHP_EOL."l^reqMsgId:      ". $reqMsgId.PHP_EOL."l^PRINT DATE:".date('d-m-y H:m:s').PHP_EOL. "l^Amount:$".$value/100 .PHP_EOL."l^********************************".
PHP_EOL.'C:\rvm\CouponFooter.jpg';
 

fwrite($myfile, $b);//写入内容,可以写多次哦,不过没啥意义,因为你拼接好字符串,一次写入就行了
fclose($myfile);//关闭该操作



  // $sql="update command  set   print=1 ";
// mysqli_query($link,$sql);



header('Location: enderrorww.php?errorcode=createnetproblem');  //网络连接失败，直接报错去屈臣氏。
  // echo "网络报错";
 
 
 
 
 
 $sql="select * from user";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);

 
$user=$result['user'];
 
 $sql="insert into alipayerror (mid,alipayid,user,usereferance,isqcs,isother,reqmsgid,reqtime,value,errorcode,topuprequestid,
 fundorderid,settlementdate,payamount,paycurrency,settleamount,settlecurrency,feeamount,feecurrency) 
 VALUES   ('$mid','$alipayid','$user','$userReference','$isqcs','$isother','$reqMsgId','$reqTime','$value','createneterror' ,'$topupRequestId',
'unexist','$reqTime','$value','HKD','$value','HKD','0','HKD' )";
 
 mysqli_query($link,$sql);
 
  
 die()  ;   //失败退出，不继续运行。
 
	
 }
  	  
	 
	  
	 
	 
	 
	 
}     // 尝试循环5次，来判断是否create访问连接成功。->>结束
	  
	 
 
  curl_close($ch); 
   
	    //echo '<br>';

$response = json_decode($response, true);


echo '<br>';
 
   echo var_dump($response);
 
  //echo var_dump($response);

 
  
  
  $resultresultStatus=  $response['response']['body']['resultInfo']['resultStatus'] ; 
  
  $resultresultCode = $response['response']['body']['resultInfo']['resultCodeId'] ; 
  
  $resultresultMsg=  $response['response']['body']['resultInfo']['resultMsg'] ; 
 

   $fundorderid=  $response['response']['body']['fundOrderId'] ; 
   
    
 
 
 if  (strtolower($resultresultStatus)=="s" )        //create 成功返回 success
    
	{   
	
	echo "<br>";
	
	echo "<br>";
	
	echo "<br>";
	
	echo "<br>";
	
	echo "<br>";
	
	echo "create ok";
 
 	
	   //上传后台系统报告create请求成功。 
             			
					$auth_url='http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/alp.php?alipayid='.$alipayid.'&mid='.$mid.'&alipayuserid='.$userReference.'&alipayisqcs='.$isqcs.'&alipayisother='.$isother.'&alipaytotalamount='.$value.'&user='.$user.'&alipaycreatenum='.$createretry.'&alipayisok=create'.$resultresultCode.'&alipaytopupRequestId='.$topupRequestId.'&fundorderid='.$fundorderid.'&reqmsgid='.$reqMsgId.'&reqtime='.$reqTime.'&mid='.$mid;							
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5); 
$response = curl_exec($ch); 
curl_close($ch);

			 
 header('Location: endthanks.php?creatstatus='.$resultresultStatus."&fundorderid=".$fundorderid);
 
 
 
 
	}
	
 elseif (strtolower($resultresultStatus)=="u" )
 {
 
 
				 
				 
   alipayquery();

				if(   $querystr=="s")
					
					{
			/* 	  $fundorderid=  $response['response']['body']['fundOrderInfo']['fundOrderId'] ; 
				 
					
					   //上传后台系统报告create请求成功。
						//   echo "query判断create充值成功";
						
										
										$ch = curl_init();
									  curl_setopt($ch, CURLOPT_URL, 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/alp.php?alipayuserid='.$userReference.'&alipayisqcs='.$isqcs.'&alipayisother='.$isother.'&alipaytotalamount='.$value.'&user='.$user.'&alipaycreatenum='.$createretry.'&alipayisok='.$resultresultCode.'&alipaytopupRequestId='.$topupRequestId.'&fundorderid='.$fundorderid.'&reqmsgid='.$reqMsgId.'&reqtime='.$reqTime.'&mid='.$mid.'');
									curl_setopt($ch, CURLOPT_POST, 1);
									curl_setopt($ch, CURLOPT_POSTFIELDS, $alipay);
									curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
									curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
									  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
													'Content-Type: application/json; charset=utf-8',
													)
											);
									curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
									curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
									curl_setopt($ch, CURLOPT_SSLVERSION, 1);
										$response = curl_exec($ch); 
							 
				header('Location: endthanks.php'); */
				 
				 }
   
  
       
 
 
 
 
 
 
 
 
 
 /*  Creat 
 $resultresultStatus=  $response['response']['body']['resultInfo']['resultStatus'] ; 
  
  $resultresultCode = $response['response']['body']['resultInfo']['resultCode'] ; 
  
  $resultresultMsg=  $response['response']['body']['resultInfo']['resultMsg'] ; 
 
  */
 
	// echo "create充值返回失败";
	// echo $resultresultStatus;
	// echo $resultresultCode;
	// echo $resultresultMsg;
	 
	 
	 
	 
	 ////////////////////失败
 
	   
	   
	   
	   
 }
   else
  {
	  		 
				 
   alipayquery();
   
  }
      
 
 // $sql="update user set bencijifen=0,cishu=0,isqcs=0,isother=0,token=0,user=0";
 //mysql_query($sql);  
 
 
 
 
 //充值成功以后的查询 query 、开始
 
 
 


function alipayquery()
{
	 date_default_timezone_set("PRC");
 include("IncDB.php");
 
	again:
	
	
	
 

$version  = "1.0.0";							  
$function="alipay.intl.fund.topup.query";
$clientId = '4Q5XSN2YSG0BP501';

 
$reqTime= date('Y-m-d\TH:i:s.0000\Z', time()); 
 
$clientSecret = 'watsonhk';
$reserve = ""; //原本的值是TBD
 
  // $topupRequestId="222";  topupRequestId 已经用的是第一次create创建的变量。

  $sql="select * from command";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);

$reqMsgId =$result['latitude'] ;


global $topupRequestId;
global $userReference;
global $isqcs;
global $isother;
global $value;
global $user;
global $mid;
global $createretry;


	
 				$request='{"request":';		
	$alipay='{"header":{"version":"'.$version .'","function":"'.$function.'","clientId":"'.$clientId.'","reqTime":"'.$reqTime.'","reqMsgId":"'.$reqMsgId.'","clientSecret":"watsonhk","reserve":""},"body":{"topupRequestId":"'.$topupRequestId.'"}}';
 
 				
   $prestr=$alipay;
$secret=rsaSign($prestr);

$alipay=$request.$alipay.',"signature":"'.$secret.'"}';

 //test
  //echo $alipay; 
$ch = curl_init();

 curl_setopt($ch, CURLOPT_URL, 'https://isupergw.alipaydev.com/isupergw/alipay/intl/fund/topup/query.htm');

// curl_setopt($ch, CURLOPT_URL, 'https://isupergw.alipaydev.com/isupergw/alipay/intl/fund/topup/query.htm');

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $alipay);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                )
        );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSLVERSION, 1);
$response = curl_exec($ch);





	for($i=1;$i<=5;$i++){
 
    if(curl_errno($ch)==false){   // curl api成功
		   
 	//echo "在第".$i."时请求成功";
		 
		 
		 
	  break;
	 
	  
    }
 
 if ($i==5)
 {
	 
//	 echo "网络报错";
 
	 
 

$auth_url = 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/alp.php?alipayid='.$alipayid.'&mid='.$mid.'&alipayuserid='.$userReference.'&alipayisqcs='.$isqcs.'&alipayisother='.$isother.'&alipaytotalamount='.$value.'&alipaycreatenum='.$createretry.'&alipayisok=createneterror&alipaytopupRequestId='.$topupRequestId.'&reqmsgid='.$reqMsgId.'&reqtime='.$reqTime.'&mid='.$mid;

						
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5); 
$response = curl_exec($ch); 
curl_close($ch);









 
	 $sql="select * from user ";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);

$mid=$result['mid'];
  
$user=$result['user'];
 $isqcs=$result['isqcs'];
$isother=$result['isother'];
 

 

   
  $myfile = fopen("C:/print.txt", "w") or die("Unable to open file!");//这个是在c盘根目录生成文件
 $ref=time().rand(1,100);
 $b =  "l^QueryError".PHP_EOL."l^若您未收到充值金额 请联系".PHP_EOL."l^AlipayHK Hotline:2245 3201".PHP_EOL."l^********************************".PHP_EOL."l^MID:            ".$mid.PHP_EOL."l^userReference:".$userReference.
PHP_EOL."l^reqMsgId:      ". $reqMsgId.PHP_EOL."l^PRINT DATE:".date('d-m-y H:m:s')."".PHP_EOL."l^********************************".
PHP_EOL.'C:\rvm\CouponFooter.jpg';
 

fwrite($myfile, $b);//写入内容,可以写多次哦,不过没啥意义,因为你拼接好字符串,一次写入就行了
fclose($myfile);//关闭该操作



// $sql="update command  set   print=1 ";
// mysqli_query($link,$sql);


 
  
 
 
 
 header('Location: enderrorww.php?errorcode=querynetproblem');
 		

 }
  
$response = curl_exec($ch); 
 
usleep(5000000);

}
	  
 
curl_close($ch); 
$response = json_decode($response, true);


// echo   var_dump($response);

  $resultresultStatus=  $response['response']['body']['resultInfo']['resultStatus'] ; 
  
  $resultresultCode = $response['response']['body']['resultInfo']['resultCodeId'] ; 
  
  $resultresultMsg=  $response['response']['body']['resultInfo']['resultMsg'] ; 
   
  
 
 
 if  (strtolower($resultresultStatus)=="s"  )
    

	{
	  
	  
	  
	  
	  echo "query = ok";
		  $fundorderid=  $response['response']['body']['fundOrderId'] ; 
				 
					
					   //上传后台系统报告create请求成功。
						//   echo "query判断create充值成功";
						
						 			  
					
					$auth_url = 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/alp.php?alipayid='.$alipayid.'&mid='.$mid.'&alipayuserid='.$userReference.'&alipayisqcs='.$isqcs.'&alipayisother='.$isother.'&alipaytotalamount='.$value.'&user='.$user.'&alipaycreatenum='.$createretry.'&alipayisok=query'.$resultresultCode.'&alipaytopupRequestId='.$topupRequestId.'&fundorderid='.$fundorderid.'&reqmsgid='.$reqMsgId.'&reqtime='.$reqTime.'&mid='.$mid ;
						 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5); 
$response = curl_exec($ch); 
curl_close($ch); 



							 
		 header('Location: endthanks.php?querystatus='.$resultresultStatus."&fundorderid=".$fundorderid);
 
 
	}
   
   elseif   (strtolower($resultresultStatus)=="u"   )
    
	{
	  
	  $sql="update command set syserror=syserror+1";
	  mysqli_query($link,$sql);


	  
	  
  $fundorderid=  $response['response']['body']['fundOrderId'] ; 
 
 	
	   //上传后台系统报告create请求成功。
		//   echo "query判断create充值成功";
	
$sql="select * from command";
	$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);

	 if ($result['syserror']>3)
		 
		 {
												
											 

					$auth_url = 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/alp.php?alipayid='.$alipayid.'&mid='.$mid.'&alipayuserid='.$userReference.'&alipayisqcs='.$isqcs.'&alipayisother='.$isother.'&alipaytotalamount='.$value.'&user='.$user.'&alipaycreatenum='.$createretry.'&alipayisok=u&alipaytopupRequestId='.$topupRequestId.'&fundorderid='.$fundorderid.'&reqmsgid='.$reqMsgId.'&reqtime='.$reqTime.'&mid='.$mid ;
										
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5); 
$response = curl_exec($ch); 
curl_close($ch); 	
						
 
	     }
	
		else{	
				goto again;

		}
	}
 	
   
   
   
   else{
	//   echo "query判断create充值失败";
	   //上传后台系统报告create请求错误。
	   	 
 
  
 
	$auth_url = 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/alp.php/getalipay.php?alipayid='.$alipayid.'&mid='.$mid.'&alipayuserid='.$userReference.'&alipayisqcs='.$isqcs.'&alipayisother='.$isother.'&alipaytotalamount='.$value.'&alipaycreatenum='.$createretry.'&alipayisok=query'.$resultresultCode.'&alipaytopupRequestId='.$topupRequestId.'&reqmsgid='.$reqMsgId.'&reqtime='.$reqTime.'&mid='.$mid;						
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5); 
$response = curl_exec($ch); 
curl_close($ch); 	
						
						
						

	 $sql="select * from user ";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);

$mid=$result['mid'];
  
$user=$result['user'];
 

   
  $myfile = fopen("C:/print.txt", "w") or die("Unable to open file!");//这个是在c盘根目录生成文件
 $ref=time().rand(1,100);
  
  $b =  "l^QueryError Please Call".PHP_EOL."l^AlipayHK Hotline:2245 3201".PHP_EOL."l^********************************".PHP_EOL."l^MID:            ".$mid.PHP_EOL."l^userReference:".$userReference.
PHP_EOL."l^reqMsgId:      ". $reqMsgId.PHP_EOL."l^PRINT DATE:".date('d-m-y H:m:s').PHP_EOL. "l^Amount:$".$value/100 .PHP_EOL."l^********************************".
PHP_EOL.'C:\rvm\CouponFooter.jpg';
 

fwrite($myfile, $b);//写入内容,可以写多次哦,不过没啥意义,因为你拼接好字符串,一次写入就行了
fclose($myfile);//关闭该操作



  // $sql="update command  set   print=1 ";
// mysqli_query($link,$sql);


 
// header('Location: enderrorww.php?errorcode='.$resultresultCode);




   }
   
}
// echo '<br>';
 //echo var_dump($response);
 
 

  
 

 function rsaSign($prestr) {

     $public_key= file_get_contents('alipayapi/rsa_private_key.pem');

     $pkeyid = openssl_get_privatekey($public_key);

     openssl_sign($prestr, $sign, $pkeyid);

     openssl_free_key($pkeyid);

     $sign = base64_encode($sign);

     return $sign;

 }

 /**

25  * 验证签名

26  * @param $prestr 需要签名的字符串

27  * @param $sign 签名结果

28  * return 签名结果

  */

 function rsaVerify($prestr, $sign) {

     $sign = base64_decode($sign);

     $public_key= file_get_contents('alipayapi/ialipay-internal-rsa-public.key');

     $pkeyid = openssl_get_publickey($public_key);

     if ($pkeyid) {

         $verify = openssl_verify($prestr, $sign, $pkeyid);

         openssl_free_key($pkeyid);

     }

     if($verify == 1){

         return true;

     }else{

         return false;
     }

 }
 
 
 
 
 
 //echo   rsaSign($prestr).'<br>';



// echo "Temp verifySign:";
// echo  var_dump(rsaVerify($prestr,$sign));

 
 
 
 //echo   rsaSign($prestr).'<br>';



// echo "Temp verifySign:";
// echo  var_dump(rsaVerify($prestr,$sign));

  

 ?>

 