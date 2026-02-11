<!DOCTYPE html>
<!-- saved from url=(0033)http://www.bootcss.com/p/flat-ui/ -->
<html lang="en" class="dk_fouc has-js"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Flat UI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="./Flat UI_files/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="./Flat UI_files/flat-ui.css" rel="stylesheet"> 
	
	        <link rel="stylesheet" href="css/fakeloader.css">
        
         
        <script src="js/jquery.min.js"></script>
        <script src="js/fakeloader.min.js"></script>
		
		
		
		
	    <link rel="stylesheet" type="text/css" href="css/style1.css">
 
	
    <style type="text/css">
    body,td,th {
	font-family: Lato, sans-serif;
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

.img{
	
border-radius:10%;

	
	
	
	
	}
    body {
	background-image: url(images/22.jpg);
	background-repeat: no-repeat;
}
    </style>
 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
     <![endif]-->
  </head>  
 </head>
 
	
	
 	<?php 
	
date_default_timezone_set("PRC");	  
 include("IncDB.php");
	//error_reporting(0);	
		// 以下是传给自己的大数据监控统计平台
  // 以下是传给自己的大数据监控统计平台
  
 


$sql="select * from command ";
$comresult=  mysqli_query($link,$sql);
$comresult=mysqli_fetch_array($comresult);
$cardid=$comresult['userscan'];
 
 
 
 
 
 
  
 
 
 function encrypt($id){
    $id=serialize($id);
		$key=file_get_contents("../../SECRET-AES-256/secret.txt");
   
    $data['iv']=base64_encode(substr($key,0,16));
    $data['value']=openssl_encrypt($id, 'AES-256-CBC',$key,0,base64_decode($data['iv']));
    $encrypt=base64_encode(json_encode($data));
    return $encrypt;
}



function decrypt($encrypt)
{
   	$key=file_get_contents("../../SECRET-AES-256/secret.txt");
    $encrypt = json_decode(base64_decode($encrypt), true);
    $iv = base64_decode($encrypt['iv']);
    $decrypt = openssl_decrypt($encrypt['value'], 'AES-256-CBC', $key, 0, $iv);
    $id = unserialize($decrypt);
    if($id){
        return $id;
    }else{
        return 0;
    }
}




 



 
 
?>
     <script type="text/javascript" src="js/timecountdown.js"></script>
  

 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
 
setTimeout("javascript:location.href='../index.php'", 3000); 
 


</script>

  <div class="fakeloader" style="margin-top:300px;margin-left:0%"></div>

     
 
        <script>
            $(document).ready(function(){
                $(".fakeloader").fakeLoader({
                    timeToHide:51200,
              
                    spinner:"spinner2"
                });
            });
        </script>

 
</body></html>