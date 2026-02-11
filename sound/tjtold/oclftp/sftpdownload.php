<?php
/**
 * SFtp上传下载文件
 *
 */
 
 
 
 //从  c:\1.txt  上传 
 namespace Common\ORG\Util;
 
  
 
 
 
 
 
  
class Sftp
{
 
 // 初始配置为NULL
 private $config = NULL;
 // 连接为NULL
 private $conn = NULL;
 // 初始化
 public function __construct($config)
 {
 $this->config = $config;
 $this->connect();
 }
  
 
 public function connect()
 {
  
 $this->conn = ssh2_connect($this->config['host'], $this->config['port']);
 if( ssh2_auth_password($this->conn, $this->config['username'], $this->config['password']))
 {
   
 }else{ 
 
 
  echo "无法在服务器进行身份验证";
  
 }
  
 }
  
 // 传输数据 传输层协议,获得数据
 public function downftp($remote, $local)
 { 
 $ressftp = ssh2_sftp($this->conn);
 return copy("ssh2.sftp://{$ressftp}".$remote, $local);
 }
  
 // 传输数据 传输层协议,写入ftp服务器数据
 public function upftp( $local,$remote, $file_mode = 0777)
 { 
 $ressftp = ssh2_sftp($this->conn);
 return copy($local,"ssh2.sftp://{$ressftp}".$remote); 
  
 }
  
}


 

$config = array(
  'host' =>'20.187.155.196', //服务器
  //	'host' =>'52.184.84.220', //服务器
 'port' => '22', //端口
 'username' =>'sharonxia', //用户名
 'password' =>'oyangxia', //密码
);
$ftp = new Sftp($config);
 

 
 
/*  $localpath="C:\\1.txt";
$serverpath="/2222.txt";
$st = $ftp->upftp($localpath,$serverpath); //上传指定文件


if($st == true){
 echo "success";
  
}else{
 echo "fail";
}
 */
   date_default_timezone_set("PRC");
 
	include("../IncDB.php");
 			 
						
 $i=0;
 $a=1;
    
	
	
	$remote_filename= returnfile() ;
 
		// echo  var_dump(returnfile());
 
 
  echo  var_dump(returnfile());
  echo '<br>';
 echo var_dump(local_newestfile());
 
		$remote_filename_count=		count(returnfile());	
 	//$remote_filename_count;
$thecount=	0;
$downloadsuccess=0;
 
 while($remote_filename[$i])   //下载sftp服务器上的文件 
	 
	 {
	 
				//	if(!in_array( returnfile()['response']['file'][$i], local_newestfile()))
						
							 						//因为RVM有停机的考虑，所以判断远程是否有文件。比较有不同文件名则下载。
			   
			 
			   
						if(!in_array($remote_filename[$i],local_newestfile()) )
					{
					 
							echo $remote_filename[$i];
							
							 
							   $thecount=$thecount+1;  //计算有多少个要下载
							   
							   
							   
										$localpath="C:\\rwl\download\\".$remote_filename[$i];
										$serverpath="/download/".$remote_filename[$i];
										 
										$st = $ftp->downftp($serverpath,$localpath); //下传指定文件
echo "st:";
									echo var_dump($st);
									echo "<br>";
										if($st == true){  //成功
							

			 



				$status="success";   //只有成功以后才会记录下载的文件给api记录。
							 $myfilename[$i]=$remote_filename[$i];
							 
				if($a==1)			 
				{
					
					 $b =  PHP_EOL  .date( "Y/m/d H:i:s",time()).",Connection Successful". PHP_EOL .date( "Y/m/d H:i:s",time()).","."Download,".$myfilename[$i]." From Remote".$serverpath." To ".$localpath.",Successful" ;    //PHP_EOL
 
				} 
				
				else{
					
					$b =  PHP_EOL .date( "Y/m/d H:i:s",time()).","."Download,". $myfilename[$i]." From Remote".$serverpath." To ".$localpath.",Successful";    //PHP_EOL
 
				}
 
 
 file_put_contents("../../ocl/ocl/ocleventlog.txt", $b , FILE_APPEND);
				

 
 

$downloadsuccess=$downloadsuccess+1;

 
 
 
                 }
				 
				 
				 
				 else{
				 
				 
					
											
								     	echo "fail";
										
										
											if($a==1)			 
				{ 
					 $b = PHP_EOL  .date( "Y/m/d H:i:s",time()).",Connection Successful".PHP_EOL .date( "Y/m/d H:i:s",time()).","."Download,".implode(';',$myfilename).',Fail' ;    //PHP_EOL
				}
							 		
				
				else{
					
					 $b =   PHP_EOL .date( "Y/m/d H:i:s",time()).","."Download".implode(';',$myfilename).',Fail' ;    //PHP_EOL
 
				}
	
					file_put_contents("../../ocl/ocl/ocleventlog.txt", $b , FILE_APPEND);
										
				 $b =  PHP_EOL .date( "Y/m/d H:i:s",time()).","."Download Fail".",Disconnect Go Try Again"  ;    //PHP_EOL
			 	file_put_contents("../../ocl/ocl/ocleventlog.txt", $b , FILE_APPEND);
  
  				
				
				
  $sql="update ocl set downloadcomplete=0 ";
	mysqli_query($link,$sql);
				
					 
				break;
				exit;
				
				
				
										}
										
								
								$a=$a+1; //为了换行判断
						
					}
					
					
					
					
 	
					
					
 	$i=$i+1;
					
					
	 }
	 		
			echo "downloadsuccess:".$downloadsuccess.'<br>';
			echo "thecount:".$thecount;
			
if( $downloadsuccess==$thecount)  //下载成功和要下载的文件个数要相等
{
	
  $sql="update ocl set downloadcomplete=1 ";
	mysqli_query($link,$sql);
	
}
				
				
				
 
 
 
 
 if($status=="success")
 {
	 
 
	 
include("../IncDB.php");
$sql="select *from  command";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$mid=$result['mid'];
$device=$result['device'];
									
						//			echo "success";
							
									$transmit=$mid.'00'.time(); 
									$data['type']='download';
									$data['filestr']=$myfilename;
									$data['mid']=$mid;
						//			$data['transmit']=$transmit; // transmitid 
									$data['device']=$device;

													
													$data=json_encode($data);
													$ch = curl_init();
													curl_setopt($ch, CURLOPT_URL, 'http://188.125.156.176:8080/groszek/public/urlget/ocldata.php');     //这里上传数据给后台接口
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
 // echo $response;
													if(curl_errno($ch))
													{
														
													print curl_error($ch);

									 						 
													}
													else{ 


												  

  
														 
														
														
													}
												 

													curl_close($ch); 
							 
							
 }
 
 
  
 
 
 
 
function local_newestfile()   //得到本地最新的xfile文件，在下载交换时候，作文件的比较。
{
					 $a=0;
				    
				$return_file =array();	   
				   $fileindex=0;
					$filestr=array();
				   $dir = "C://rwl/download";//目录
 $lastfilename=    arraysort(printdir($dir));   //原本是end函数
 
 
				   while ($lastfilename[$a])
				   {
				 

				  
				 
							/*
							if( fileatime("barcode/".$myfile)< fileatime("barcode/".$lastfilename[$a] )  )
							{ 
						
					 
								$myfile= $lastfilename[$a];
								
								echo fileatime("barcode/".$myfile).$myfile;
							//	echo '---';
								
					 
								$mya=$a;  //标记这个最大时间戳，也就是最近的时间。
								
							}
				 */
				 
				 
				 $myfile= $lastfilename[$a];
				 
				 
			 
				
				  $filepath=$dir."/".$myfile;
				  
				  
				  //array(1) { ["response"]=> array(1) { ["file"]=> array(5) { [0]=> string(15) "IBKL.000-180801" [1]=> string(15) "IBKL.000-180807" [2]=> string(17) "IBKL.02200-180458" [3]=> string(15) "OTP.02800-15492" [4]=> string(14) "OTP.0800-15508" } } }
				  
				  //echo date( "Y-m-d H:i:m" ,fileatime($filepath)).'，文件名：'.$myfile.';';
				  
				 
				  
							 
						//	 if(fileatime($filepath)>  strtotime(date("Y/m/d  " ))  )
						//	 {

									
						 
										 $return_file[$a]=$myfile;
									
						//	 }




				$a=$a+1;

				 
				}
				
				
				return $return_file;
				
				
				

}
 




 
 //..............................................................................................curl 下载的文件
 

 
function returnfile() {

//$url="https://ke-goo.com/curl/1.php";

$url="http://188.125.156.176:8080/groszek/public/urlget/ocl/getfile.php";
 


 
$empty="";
$curl=curl_init();
curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_HEADER,0);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,0);
curl_setopt($curl, CURLOPT_POSTFIELDS, $empty);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,false);
//curl_setopt($curl,CURLOPT_CAINFO,getcwd().'\cacert.pem'); //证书路径
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,"POST"); 
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
 curl_setopt($curl, CURLOPT_TIMEOUT,28);
$result=curl_exec($curl);
//$error=curl_errno($curl);print_r($error);exit;//返回错误
    
curl_close($curl);
  

 
return decrypt($result) ;






}

 


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
 
  





   function printdir($dir)
{$filetime = 0;
	$files = array();
	//opendir() 打开目录句柄
	if($handle = @opendir($dir)){
	//readdir()从目录句柄中（resource，之前由opendir()打开）读取条目,
	// 如果没有则返回false
		while(($file = readdir($handle)) !== false){//读取条目
			if( $file != ".." && $file != "."){//排除根目录
				if(is_dir($dir . "/" . $file)) {//如果file 是目录，则递归
					$files[$file] = printdir($dir . "/" . $file);
				} else {
					//获取文件修改日期
					 
					//文件修改时间作为健值
					$files[$filetime] = $file;
					$filetime = $filetime+1;
				}
			}
		}
		@closedir($handle);
		return $files;
	}
	
} 

function arraysort($aa) {
	if( is_array($aa)){
		ksort($aa);
		foreach($aa as $key => $value) {
			if (is_array($value)) {
				$arr[$key] = arraysort($value);
			} else {
				$arr[$key] = $value;
			}
		}
		return $arr;
	} else {
		return $aa;
	}
}



?>
 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>
