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


date_default_timezone_set('Asia/ShangHai'); 
 

	include("../IncDB.php");

$dir = "C://rwl/upload";//目录
 $lastfilename=    arraysort(printdir($dir));   //原本是end函数
 
 
   //之前还用arraysort方法。不知道什么原因
  //$lastfilename=explode(".",$lastfilename);
 // echo $lastfilename;
 
//遍历出每个文件以后，做比大小。。找到文件
   
   $a=0;
   
  
   
   $fileindex=0;
    $filestr=array();
   
  // error_reporting(0);
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
 
 
 
  $filepath=$dir."/".local_newestfile();
 
  //array(1) { ["response"]=> array(1) { ["file"]=> array(5) { [0]=> string(15) "IBKL.000-180801" [1]=> string(15) "IBKL.000-180807" [2]=> string(17) "IBKL.02200-180458" [3]=> string(15) "OTP.02800-15492" [4]=> string(14) "OTP.0800-15508" } } }
  
  //echo date( "Y-m-d H:i:m" ,fileatime($filepath)).'，文件名：'.$myfile.';';
  
 
  
		 
$a=$a+1;
}
	 
														$config = array(
														 
														 'host' =>'20.187.155.196', //服务器
														 // 'host' =>'52.184.84.220', //服务器
														
														'port' => '22', //端口
														'username' =>'sharonxia', //用户名
														'password' =>'oyangxia', //密码
														);
														$ftp = new Sftp($config);
														$localpath="C:\\rwl\upload\\".local_newestfile();
														$serverpath="/upload/".local_newestfile();
														$st = $ftp->upftp($localpath,$serverpath); //上传指定文件
														if($st == true){
															
															echo 'success';
						
$sql = "update ocl set task=0, donexfile=1 "; //成功。标记成功，然后再告诉服务器成功。如果不告诉服务器或者断开连接。服务器没有收到，就重新upload
mysqli_query($link, $sql);	


 
														 
$b =  PHP_EOL .date( "Y/m/d H:i:s",time()).","."Upload,".local_newestfile()."  From Local ".$localpath." To Remote ".$serverpath." ,Successful".PHP_EOL .date( "Y/m/d H:i:s",time()).',Connection Finished' ;    //PHP_EOL
 

file_put_contents("../../ocl/ocl/ocleventlog.txt", $b , FILE_APPEND);

 
														//echo "success";
														
														
 
														
														
													$sql="select *from  command";
													$result=mysqli_query($link,$sql);
													$result=mysqli_fetch_array($result);
													$mid=$result['mid'];
													$device=$result['device'];
													//			echo "success";
													$data['type']='upload';    
													$data['filestr'][0]=local_newestfile();   
													$data['mid']=$mid; 
													$data['transmit']=$_GET['transmit'];   //transmitid
													$data['device']=$device; 
										 		   $data['filemd5']=md5_file('C://rwl/upload/'.local_newestfile());
													
													
												  //	echo $data['filemd5'];
										
										
													
													
													$data= json_encode($data);
												 
												 
													 
												 
													 
													$ch = curl_init();
													curl_setopt($ch, CURLOPT_URL, 'http://188.125.156.176:8080/groszek/public/urlget/ocldata.php');     // 
													curl_setopt($ch, CURLOPT_POST, 1);
													curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
													curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
													curl_setopt($ch, CURLOPT_TIMEOUT,30);
													curl_setopt($ch, CURLOPT_HTTPHEADER, array(
													'Content-Type: application/json; charset=utf-8',
													)
													);
													curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
													curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
													curl_setopt($ch, CURLOPT_SSLVERSION, 1);
													$response = curl_exec($ch);
													
											 // echo var_dump($response);
											 
											 	 // echo $data;
												 
													if(curl_errno($ch))  //如果遇到错误，没有上传成功！！！
													{   
														
													print curl_error($ch);
													
											$sql = "update ocl set task=0, donexfile=1,xfileupload=0 "; //成功。标记全部成功，再告诉服务器成功。如果不告诉服务器，要考虑重新upload。
											mysqli_query($link, $sql);	
													
													}
													else{
																//写入log文件 关于传输的内容

															$sql = "update ocl set task=0, donexfile=1,xfileupload=1 "; //成功。标记全部成功，再告诉服务器成功。如果不告诉服务器，要考虑重新upload。
											mysqli_query($link, $sql);			
  
													}
													curl_close($ch); 
														 
														
														
														  //  Header("Location:../index.php");
														
														
														 copy($localpath,"C:\\rwl\backup\upload\\".local_newestfile()); 
														 
														 del_DirAndFile("C:\\rwl\upload\\");
														 
														 
														 
														 
														 
														
														} 
														else{
														//echo "fail";
														 
$b =  PHP_EOL .date( "Y/m/d H:i:s",time()).","."Upload,Fail" .PHP_EOL .date( "Y/m/d H:i:s",time()).',Connection Finished Go Try Again' ;    //PHP_EOL
 
file_put_contents("../../ocl/ocl/ocleventlog.txt", $b , FILE_APPEND);

 
 $sql = "update ocl set task=0, donexfile=1,xfileupload=0 "; //重新上传！
mysqli_query($link, $sql);	

														}
												 
											 
 																										
 
 
 
function local_newestfile()   //得到本地最新的xfile文件，在下载交换时候，作文件的比较。
{
					 $a=0;
				    $aa=0;
					
				$return_file =array();	   
				   $fileindex=0;
					$filestr=array();
				   $dir = "C://rwl/upload";//目录
 $lastfilename=    arraysort(printdir($dir));   //原本是end函数
 
				   //error_reporting(0);
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
				  
				 
	 
							 
							// if( fileatime($dir."/".$return_file) < fileatime($filepath)     )
								 if( substr($myfile,0,3)=="MPS"    )
							 {

									
						 
										 $return_file=$myfile;
									// $aa=$aa+1;
									 
							 }



 
				$a=$a+1;

				 
				}
				 
				 
				return $return_file;
				
				
				

}
 



 


   function printdir($dir)
{
	$filetime = 0;
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



function del_DirAndFile($dirName)
{
    if (is_dir($dirName)) {
        echo "<br /> ";

        if ($handle = opendir("$dirName")) {
            while (false !== ($item = readdir($handle))) {
                if ($item != "." && $item != "..") {
                    if (is_dir("$dirName/$item")) {
                        del_DirAndFile("$dirName/$item");
                    } else {
                        if (unlink("$dirName/$item")) {
                            echo "已刪除文件: $dirName/$item<br /> ";
                        }
                    }
                }
            }

            closedir($handle);
        }
    }
}



											   
   
													


?>