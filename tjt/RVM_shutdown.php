	
	 <html lang="en" class="dk_fouc has-js">
        
         
                <script src="js/debug.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/fakeloader.min.js"></script>
                <script src="js/debug.js"></script>
        
        <link rel="stylesheet" href="css/fakeloader.css">
 
 	<style type="text/css">
 
		  body {
    background-image: url('images/shutdown.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed; /* 可选：固定背景不滚动 */
  }
 
		
 
					        .text {
            bottom:40%;
           text-align: center;
 position: absolute;
 
  left: 50%;
  transform: translate(-50%, -50%); 
            transform: translate(-50%, 0%);
            white-space: nowrap;
			width:15%;
			font-size:80px;
			font-weight :bold;
        color:#fff
		}
		
	 
  
 
 	</style>


 </head>



 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>




  
  

 
 <?php
 
 include("incdb.php");

$sql = "update machine_config set rvm_shutdown=0 ";
$result = mysqli_query($link, $sql);
 
		
 ?>
  
  
 
  
 <script type="text/javascript" src="js/timecountdown.js"></script>
 
 

 

<div class='text' id='myButton'  > 30  </div>

   
    <script>
	 
		 
        let countdown = 29;
		
        const button = document.getElementById('myButton');
        const interval = setInterval(() => {
            if (countdown > 0) {
                button.textContent = ` ${countdown} `;
				 
                countdown--;
				 debug(13); 
            } else {
                clearInterval(interval); 
				
                button.disabled = false;
                button.style.cursor = 'pointer';
                button.style.opacity = 1;
            }
        }, 1000);
    </script>
	
	
        
    
  </head>
  <body>
   
 </p>  
 
 <script type="text/javascript" src="js/timecountdown.js"></script>
 
 	<script src="js/jquery-1.9.1.min.js"></script>


 	<input id="btn" type="hidden" value="測試" />
 	<div id="msg2" style="margin-top:1500px;position:absolute"> 12</div>



    <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
 
setTimeout("javascript:location.href='index.php'", 30000); 

 

</script> 