<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <style type="text/css">
        #apDiv1 {
            position: absolute;
            left: 755px;
            top: 302px;
            width: 355px;
            height: 336px;
            z-index: 1;
        }

        body {
            background-repeat: repeat;
            background-image: linear-gradient(#279038, #005d30);
        }

        #apDiv2 {
            position: absolute;
            left: 54px;
            top: 213px;
            width: 413px;
            height: 115px;
            z-index: 1;
        }

        .bottombtn {
            bottom: 5%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, 0%);
            white-space: nowrap;
        }
    </style> 

</head>


 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>


<img src="images/induction.png" width="80%" style="margin-top:15%;margin-left:10%"></img>

 
    <a href="http://127.0.0.1/tjt/" class="btn bottombtn" >Back
 
	</a>
	 

 <div style=" position:absolute;top:70%;left:50%;transform:translate(-50%, -50%);font-size:35px">
 <?php 
 
 
  
 include("IncDB.php");
include("word_function/sql.php");
 



 ?> 
 </div>

 
 



 <script type="text/javascript" src="js/timecountdown.js"></script>
  

 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
 
setTimeout("javascript:location.href='index.php'", 30000); 
 


</script>


 



</body>
</html>