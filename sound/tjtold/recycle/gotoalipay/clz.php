  
	 
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
 			 
			   	date_default_timezone_set("Asia/Shanghai");  
include("IncDB.php");


			 $sql="select * from command ";
$result=  mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$mid=$result['mid'];


			 $fundorderid=$mid.time();
   header('Location:receipt.php?fundorderid='.$fundorderid);
 
  

 ?>

 