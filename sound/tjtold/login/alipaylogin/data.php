 
    <?php
   

  
include("IncDB.php");
date_default_timezone_set("PRC");

   
$sql="select * from command";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$userscan=$result['userscan'];
 
  
 
if (  strlen($userscan) <=15 && strlen($userscan) >=4 )   //直接过滤掉非32位的用户id
{
 
 
	 setcookie("user",$userscan,time()+3600,"/" );
	 
	 
  // $sql="update command  set longitude =0 , print=1 ";
// mysqli_query($link,$sql);


 set_time_limit(0);//无限请求超时时间    
   
while (true){    
    //sleep(1);    
    
      $arr=array('success'=>"1",'name'=>"null");    
        echo json_encode($arr);    
      sleep(1);//0.5秿   
     
       exit();
		 
	 	 
		}
  
}

 
else 
{
 
  // $sql="update command  set longitude =0 , print=1 ";
// mysqli_query($link,$sql);


 set_time_limit(0);//无限请求超时时间    
   
while (true){    
    //sleep(1);    
    
      $arr=array('success'=>"0",'name'=>"null");    
        echo json_encode($arr);    
      sleep(1);//0.5秿   
     
       exit();
		 
	 	 
		}
  
}






















 
  
   
 ?>
 
 
   