 
    <?php
 
	  
include("IncDB.php");
				 
error_reporting(0);
//微信扫码  	    
 header("Content-type: text/html; charset=utf-8"); 
 
 $sql="select * from ocl ";
 $result=mysqli_query($link,$sql);
 $result=mysqli_fetch_array($result);

$task=$result['task'];
$value=$result['value'];
 $cardid=$result['cardid'];
 
  $returncode=$result['returncode'];
      
   $returnerror=$returncode;
 
 $sql="select * from command ";
 $result=mysqli_query($link,$sql);
 $result=mysqli_fetch_array($result);

$userscan=  $_COOKIE["user"];
 $mid=$result['mid'];
   
     
   
   
   
   
 
   
   
   
   
   

 //my suggestion is set a error handle at here;
 
  
 

 
   if ($cardid != $userscan &&  strlen($cardid)>= 7  )  
 //八达通卡不是第一次登陆的处理
{
 
  
  
  
 set_time_limit(0);//无限请求超时时间    
$i=0;    
				while (true){    
				//sleep(1);    
				usleep(500000);//0.5秿   
				$i++;    

 
				$arr=array('success'=>"3",'name'=>'pp','text'=>"999999");     //和第一次登陆id不相等 
				echo json_encode($arr);    

 $sql="UPDATE ocl SET  cardid='', task=7  	";  //这里不需要returncode=0 。注意下 
mysqli_query($link,$sql); 

				exit();  


				}


}



    if ($returncode<> "100032" && $returncode <> "" && $returncode<> 0   )  
 
 //error的处理
{


 
 

	  	 
 set_time_limit(0);//无限请求超时时间    
$i=0;    
				while (true){    
				//sleep(1);    
				usleep(500000);//0.5秿   
				$i++;    

 
				$arr=array('success'=>"3",'name'=>'pp','text'=>$returnerror);     //各种错误值。
				echo json_encode($arr);    

 $sql="UPDATE ocl SET  task=7 ,returncode=0	";
mysqli_query($link,$sql); 



   if( $returnerror=="100001" ||  $returnerror=="100050" )
   {
   $auth_url = 'http://127.0.0.1/email/index.php?mid='.$mid.'Errorcode='.$returnerror."&content=Error";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT,28);
$response = curl_exec($ch); 
curl_close($ch);
   
    $sql="UPDATE ocl SET  returncode='0'   	";  //这里不需要returncode=0 。注意下 
mysqli_query($link,$sql); 
   
   
   }
   
   
   
				exit();  


				}


}



 





   if ( $task==2)
 

{
  
 
 
 set_time_limit(0);//无限请求超时时间    
$i=0;    
				while (true){    
				//sleep(1);    
				usleep(500000);//0.5秿   
				$i++;    
 
				$arr=array('success'=>"1",'name'=>'pp','text'=>"55");     //增值成功
				echo json_encode($arr);    
 
				exit();  


				}


}
 
   

 //my suggestion is set a error handle at here;
 
 
 
	else

{

  
      
        
 set_time_limit(0);//无限请求超时时间    
$i=0;    
while (true){    
    //sleep(1);    
    usleep(500000);//0.5秿   
    $i++;    
        
      
        $arr=array('success'=>"0",'name'=>'pp','text'=>"55");    
        echo json_encode($arr);    
        exit();  

    

 
}

      
}


       
        
		
	 
 

	 
		
		
	 
  
	 
  
   
 ?>
 
 
   