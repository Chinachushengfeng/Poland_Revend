<!DOCTYPE html>
<!-- saved from url=(0033)http://www.bootcss.com/p/flat-ui/ -->
<html lang="en" class="dk_fouc has-js"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Flat UI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="./Flat UI_files/bootstrap.min.css" rel="stylesheet">
  
    <!-- Loading Flat UI --> 
    <link rel="stylesheet" type="text/css" href="css/style2.css">
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
	background-image: url(background/Ali08c.jpg);
	background-repeat: no-repeat;
}
    </style>
 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
     <![endif]-->
  </head>  
 </head>
<body>
	  <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
 
 <?php 


 include("IncDB.php"); 
     $sql="UPDATE command SET  command=2 	";

mysqli_query($link,$sql); 
?>
	
	
 	 
     <script type="text/javascript" src="js/timecountdown.js"></script>
 
 
     <div align="left"  ><a href="gotoscan.php" class="btn2" style="margin-top:450px;position:absolute;margin-left:50px;">下一步</a> </div>
     <div align="left"  ><a href="giveup.php" class="btn2" style="margin-top:450px;margin-left:250px;position:absolute">不需AlipayHK回贈</a> </div>
      

 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
setTimeout("javascript:location.href='giveup.php'", 60000); 
</script>
 <embed height="0" width="0" src="../../sound/12.wav" />
</body></html>