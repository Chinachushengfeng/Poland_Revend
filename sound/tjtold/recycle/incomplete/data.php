 
    <?php
 
	  
include("IncDB.php");
				 
error_reporting(0);
//微信扫码  	    
 header("Content-type: text/html; charset=gb2312"); 
 
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
 
   
   

 //my suggestion is set a error handle at here;
 
  
 
  if ($returncode=="100022" || $returncode=="100025"  )  // 不完整的拍卡处理
 
 //error的处理
{


	  	 
 set_time_limit(0);//无限请求超时时间    
$i=0;    
				while (true){    
				//sleep(1);    
				usleep(500000);//0.5秿   
				$i++;    

 
				$arr=array('success'=>"4",'name'=>'pp','text'=>$returnerror);     //100022的错误 
				echo json_encode($arr);    



				exit();  


				}

 
}


    if ($returncode<> "100032" && $returncode <> "" && $returncode<> 0   )  
 
 //error的处理
{



 $sql="update ocl set task=2  ";
 mysqli_query($link,$sql);
 
 

	  	 
 set_time_limit(0);//无限请求超时时间    
$i=0;    
				while (true){    
				//sleep(1);    
				usleep(500000);//0.5秿   
				$i++;    

 
				$arr=array('success'=>"3",'name'=>'pp','text'=>$returnerror);     //各种错误值。
				echo json_encode($arr);    



				exit();  


				}


}




 
  
  if ($cardid != $userscan &&  strlen($cardid)>= 7  )  
 //八达通卡不是第一次登陆的处理
{
 
 
  $sql="update ocl set task=2  ";
 mysqli_query($link,$sql);
  
 
 
 set_time_limit(0);//无限请求超时时间    
$i=0;    
				while (true){    
				//sleep(1);    
				usleep(500000);//0.5秿   
				$i++;    

 
				$arr=array('success'=>"5",'name'=>'pp','text'=>$returnerror);     //和第一次登陆id不相等 
				echo json_encode($arr);    



				exit();  


				}


}






   if ( $task==2 )
 

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
 
 
   