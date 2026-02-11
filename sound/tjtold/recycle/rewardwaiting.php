<!DOCTYPE html>
<!-- saved from url=(0033)http://www.bootcss.com/p/flat-ui/ -->
<html lang="en" class="dk_fouc has-js"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Flat UI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.min.css"> 
<link rel="stylesheet" href="css/fakeloader.css">


<script src="jquery-1.9.1.min.js"></script> 
<script src="js/jquery.min.js"></script>
<script src="js/fakeloader.min.js"></script>

    <!-- Loading Bootstrap -->
    <link href="./Flat UI_files/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="./Flat UI_files/flat-ui.css" rel="stylesheet"> 
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
	background-image: url(../images/wait.jpg);
	background-repeat: no-repeat;
	background-color: #0B8C32;
}
    </style>
 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
     <![endif]-->
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
 
 
 </head>
<body>

    
  <?php
 
	  
 include("IncDB.php");
		

 

 
  
 $sql="select * from user   ";
 
$result=   mysqli_query($link,$sql); 
$result = mysqli_fetch_array($result);
$mid=$result['mid']; 
$token=$result['token'];
 $user=$result['user'];
$ch = curl_init();

$data = array('token' => $token, 'earnedpoint' => $result['bencijifen'],'spendpoint'=>50,'language'=>2);
 $data =  json_encode($data);
	 
	
curl_setopt($ch, CURLOPT_URL, 'https://uat.ww-fun.club/rvmapi/redeeminstantreward');
  
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
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

 
 
 
 
  
 
 
 
if(curl_errno($ch))
{
    print curl_error($ch);
}
curl_close($ch); 


$response = json_decode($response, true);
//echo var_dump($response);
  $p=$response['data']['p'];
  
 $response=$response['errcode'];
 
 //echo $p;
 
	if ($response==0)

	{
  $sql="update user set jifen= $p ,bencijifen=0  ";   //更新积分 
 mysqli_query($link,$sql);






									  
									 $sql="select * from   command    ";
									 
									$commandresult=mysqli_query($link,$sql); 
									 
										 $row= mysqli_fetch_array($commandresult);
										   
									 
										  $hdjl=$row['hdjl'] ;

									 
									$thejl=$hdjl % 15 +1 ;
									   
											
											 
									   $sql="update command set huodao=$thejl,hdjl=hdjl+1  ";
									 
									   mysqli_query($link,$sql); 

										if ($hdjl==59)
										{
									$sql="update command set  hdjl=0  ";
									mysqli_query($link,$sql); 	
											
										}		
										
										
										
				echo '<script type="text/javascript" src="js/timecountdown.js"></script>
 
    <script language="javascript" type="text/javascript"> 
 
setTimeout("javascript:location.href=\'receivereward.php\'", 15000); 
     </script>';						
	}
else
{
	
	echo '<script type="text/javascript" src="js/timecountdown.js"></script>
 
    <script language="javascript" type="text/javascript"> 
 
setTimeout("javascript:location.href=\'../index.php\'", 1000); 
     </script>';
	 
}	
			 							
										

		?>
		
 
		      
		
 
		
		 
	 
</body></html>