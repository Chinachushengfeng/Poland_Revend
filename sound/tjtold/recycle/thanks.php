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
		background-repeat: repeat;
background-image: linear-gradient(#08eed5, #007573);
}
    </style>
 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
     <![endif]-->
  </head>  
 </head>
  <!--
  
  <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>
  
  -->
<?php
date_default_timezone_set("PRC");	  
 include("IncDB.php");
 
 
include("../word_function/sql.php");

 ?>
 
	    <div  style="  margin-top:28%;font-size:30px"  align="center"> 
		Dziękuję za wsparcie dla sprawy ochrony środowiska  </div>
   <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
 
setTimeout("javascript:location.href='../index.php'", 6000); 
 


</script>
	
 	<?php 
	 
	//error_reporting(0);	
		// 以下是传给自己的大数据监控统计平台
  // 以下是传给自己的大数据监控统计平台
  
 	$sql = " truncate charityname"; //清空charityname
		mysqli_query($link, $sql);
 //
 
 
  
 
 
 

$sql="select * from ocl ";
$comresult=  mysqli_query($link,$sql);
$comresult=mysqli_fetch_array($comresult);
$ocltext=$comresult['text'];
$oclerror=$comresult['userencountcode'];

$octaddvaluetime=$comresult['addvaluetime'];

if(!$octaddvaluetime)
{
	$octaddvaluetime=time()-3;
 
}
 



$sql="select * from barcode ";
$comresult=  mysqli_query($link,$sql);
$comresult=mysqli_fetch_array($comresult);
$barcodeversion=$comresult['version'];
 

//	echo $barcodeversion;

$sql="select * from command ";
$comresult=  mysqli_query($link,$sql);
$comresult=mysqli_fetch_array($comresult);
$statecode=$comresult['statecode'];
$mid=$comresult['mid']; 
$device=$comresult['deviceid']; 
 $errorcode=$comresult['errorcode']; 
 
$transactionid=$comresult['transactionid'];

$storageplastic=$comresult['storageplastic']; //得到箱子的满溢状态
if($storageplastic==1000)
{
	$storageplastic=10;
	
}


 $storagecan=$comresult['storagecan']; //得到箱子的满溢状态
if($storagecan==1000)
{
	$storagecan=10;
	
}
 



$sql="select * from user_transaction where   transactionid='$transactionid' and uploaddone='0' order by dateline desc";
$comresult=  mysqli_query($link,$sql);
$comresult=mysqli_fetch_array($comresult);
 $user=$comresult['user'];
 $dateline= $comresult['dateline'];
$rebateordonate=$comresult['rebateordonate']; 
$platform=$comresult['payplatform'];
$charityname=$comresult['charityname'];  
$charityid=$comresult['charityid'];
$transactionid=$comresult['transactionid'];  
$octreceipt=$comresult['octreceipt'];   

$transactiondone=$comresult['transactiondone'];  

 



$sql="select sum(bottlevalue) as total from user_transaction where transactionid='$transactionid' and recognitionstatus=1   ";
$bottlevalue=mysqli_query($link,$sql);
$bottlevalue=mysqli_fetch_array($bottlevalue);
$totalbottlevalue=$bottlevalue['total'];  //总价值     //计算累计value

 

if(!$totalbottlevalue)
{
	$totalbottlevalue=0;
	
}

$sql="select * from user_transaction  where transactionid='$transactionid'   ";  // 因为tjt/index.php 网络正常上传中断数据，就不会有除该交易以外，找错交易的情况。
$result=  mysqli_query($link,$sql);



$data=array();

$data['barcodedata']=array();
$data['info']=array();
  
	
 // $data['barcodedata']['barcode']=array();
 // $data['barcodedata']['weight']=array();
 // $data['barcodedata']['bottlevalue']=array();
  // $data['barcodedata']['recognitionstatus']=array();
 
 
 
 while($it=mysqli_fetch_array($result))
	 
	 {
		  
		    $barcodedata['diam']=$it['diam']; 
		  $barcodedata['dateline']=$it['dateline'];
		 $barcodedata['barcode']=$it['barcode'];
		 $barcodedata['weight']=$it['weight'];
		 $barcodedata['bottlevalue']= $it['bottlevalue'];
		 $barcodedata['recognitionstatus']=$it['recognitionstatus'];
	     $barcodedata['bors']=$it['bors'];
   
  $barcodedata['metal']=$it['metal'];
   
   array_push($data['barcodedata'], $barcodedata);
	
	 }
	 
	 
 
 
$info['transactionid']=$transactionid;
$info['totalvalue']=$totalbottlevalue;//$value;
$info['user']=$user;
$info['rebateordonate']=$rebateordonate;
$info['platform']=$platform;
//$info['value']=1;//$value;
$info['charityname']=$charityname;
$info['charityid']=$charityid;

$info['storageplastic']=$storageplastic;
$info['storagecan']=$storagecan;
$info['statecode']=$statecode;
$info['octreceipt']=$octreceipt;
$info['errorcode']=$errorcode; 
$info['mid']=$mid;
$info['barcodeversion']=$barcodeversion;
$info['break']=$transactiondone;  //默认是0，如果是投樽时断网断电的是0，如果是transactiondone=2说明已经点击结束按钮， 
$info['octaddvaluetime']=$octaddvaluetime;
$info['transactiondone']=$transactiondone;
$info['oclerror']=$oclerror;
$info['ocltext']=$ocltext;



 

array_push($data['info'], $info);   

 
 
 

$data=json_encode(encrypt($data));
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://188.125.156.176:8080/groszek/public/urlget/user_transaction.php'); 
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT,28);
  
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                )
        );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSLVERSION, 1);
$response = curl_exec($ch);
 
// echo  var_dump($response );


if(!$response)
{
//echo ' Error No. : '.curl_errno($ch);
 
}
if($response)
{
    
 
	
 
		 //成功
					 
				$sql="update user_transaction set uploaddone=1,transactiondone=1 where transactionid='$transactionid' and  transactiondone=1   ";         //标记结束transaction    //每次在载入首页时候会检查是否有0标记并上传。
				mysqli_query($link,$sql);
			 
					 
				$sql="update user_transaction set uploaddone=1,transactiondone=1 where transactionid='$transactionid' and transactiondone=2"       ;           //标记结束transaction    //每次在载入首页时候会检查是否有0标记并上传。
				mysqli_query($link,$sql);
			 
				$sql="update user_transaction set uploaddone=1,transactiondone=1 where transactionid='$transactionid' and transactiondone=0"       ;           //标记结束transaction    //每次在载入首页时候会检查是否有0标记并上传。
				mysqli_query($link,$sql);
			 			

 
}

curl_close($ch); 
  

 
 
$sql="UPDATE ocl SET qty=0,receipt='0',text='' ";
mysqli_query($link,$sql); 
  
 
 
 
 
  
 
 
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
  

 

 <!-- <div class="fakeloader" style="margin-top:200px;margin-left:0%"></div>  -->
  
 
        <script>
            $(document).ready(function(){
                $(".fakeloader").fakeLoader({
                    timeToHide:51200,
              
                    spinner:"spinner2"
                });
            });
        </script>

   <embed height="0" width="0" src="http://127.0.0.1/sound/Thank You for Your Support for Environmental Protection.wav" />

</body></html>