 
    <?php
error_reporting(0);
 include("IncDB.php");  //  自己设置下账户密码和表名。
 
 $sql="update ocl set task=1 ";   
mysql_query($sql);


$task=$_GET['task']; 
$value=$_GET['value']; 
$cardid=$_GET['cardid']; 


if ($task=="done" && $value && $cardid)
	
{
	
 
 

 $sql="update ocl set task=2 ,value=$value,cardid=$cardid";   
mysql_query($sql);

} 
 
	 $sql="select * from ocl";   // 建立个ali的表 .里面有account的字段。
$result=mysql_query($sql);
$result=mysql_fetch_array($result);

$task=$result['task'];


echo $task;

 




?> 
    