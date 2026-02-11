 
    <?php
 
 a:
 
    error_reporting(0);
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
 
 
 
	  
include("IncDB.php");
	
 


  
 $sql="select * from command";
 $result=mysqli_query($link,$sql);
 $result=mysqli_fetch_array($result);
 $theuserscan= $_COOKIE["user"];
 
 $theuserscan=substr($theuserscan,-13,13);
 
 
 
 $sql="select * from user_transaction where transactiondone=0";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);

  $nomalstr=$result['user'];;

 
  
 
 
	 if($theuserscan!==$nomalstr && $theuserscan !=="0" )
	{ 
		
		
					
			 set_time_limit(0);//无限请求超时时间    
				
			while (true){    
				//sleep(1);    
				usleep(500000);//0.5秿   
				
			   
					
			 
			 
			 
				  $arr=array('success'=>"10",'name'=>'ok','json'=>$jsonstr,'max'=>$max,'min'=>$min);    
					echo json_encode($arr);    
				 
				   exit();
					 
					 
					}
 
		
	}
	
 elseif  ( $theuserscan !=='0' &&   $theuserscan !==''  )
    
	{ 
	  
		/* 
     $max=  $response['response']['body']['minAmount']['value'] ; 
     $min=  $response['response']['body']['maxAmount']['value'] ; 
    
 
 
   $auth_url = 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/alp.php?alipayid='.$alipayid.'&mid='.$mid.'&alipayuserid='.$userReference.'&alipayisqcs='.$isqcs.'&alipayisother='.$isother.'&alipaytotalamount='.$value.'&user='.$user.'&alipaycreatenum=&alipayisok=consult'.$resultresultCode.'&alipaytopupRequestId=&fundorderid=&reqmsgid='.$reqMsgId.'&reqtime='.$reqTime.'&mid='.$mid ;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5); 
$response = curl_exec($ch); 
curl_close($ch); 

 
 
// $sql="update user set user='$user',jifen='$point',token='$token'";
// mysqli_query($link,$sql);
// $starttime=time();
// $sql="update command set doing='1',starttime='$starttime' ";
// mysqli_query($link,$sql);

 
$sql="UPDATE command SET userscan=''	";

mysqli_query($link,$sql);   	  

		    */
  
 set_time_limit(0);//无限请求超时时间    
   
   
   
   
while (true){    
    //sleep(1);    
    usleep(500000);//0.5秿   
	
   
        
 
 
 
      $arr=array('success'=>"1",'name'=>'ok','json'=>$jsonstr,'max'=>$max,'min'=>$min);    
        echo json_encode($arr);    
     
       exit();
		 
		 
		}
 
	}
	
	 
	
	else
	{
		
 set_time_limit(0);//无限请求超时时间    
   
   
   
   
while (true){    
    //sleep(1);    
    usleep(500000);//0.5秿   
	
   
        
 
 
 
      $arr=array('success'=>"0",'name'=>'ok','json'=>$jsonstr,'max'=>$max,'min'=>$min);    
        echo json_encode($arr);    
     
       exit();
		 
		 
		}
		
	}
 
 
















// unknow 五次重试
   
 ?>
 
 
   