 
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

   <div class="fakeloader" style="margin-top:250;margin-left:0%"></div>

     
 
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
   
 </p>  
 
 
 <?php 
 
  	date_default_timezone_set("Asia/Shanghai");  
include("IncDB.php");
	 $sql = "UPDATE command SET command=2 ,recognitionstatus='10'	";
mysqli_query($link, $sql);
	
	
	
			 $sql="select * from command ";
$result=  mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$transactionid=$result['transactionid'];

 
		
$sql="select * from user_transaction where transactionid='$transactionid'";
$resulttotalvalue=  mysqli_query($link,$sql); 
$resulttotalvalue=mysqli_num_rows($resulttotalvalue);

 
 
 $sql="select * from user_transaction where transactionid='$transactionid' and recognitionstatus ='1' ";
$resulttotalvalue1=  mysqli_query($link,$sql); 
$resulttotalvalue1=mysqli_num_rows($resulttotalvalue1);

 
 
 
 if ($resulttotalvalue==0)  //完全没有收樽记录
 {
		
	 
  header("Location:qsh1s.php?url=first"); 
		echo 1;
		
 }
 
 elseif ($resulttotalvalue1==0 && $resulttotalvalue>0)   //有收樽记录，但是没有收樽成功
 { 
 
	 
	     
		 
	  header("Location:qsh1s.php?url=thanks"); 
		echo 1;
 }
 
 
 ?>


 	
     <script type="text/javascript" src="js/timecountdown.js"></script>
 
 

 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
setTimeout("javascript:location.href='clz.php'", 1000); 
</script>


 
 
 
 