<?php 
	//  <a href="http://127.0.0.1/tjt/login/index.php" class="btn bottombtn">
	
include("IncDB.php");


include("word_function/sql.php");


	 
  
  
  
 //version:103 /改动不转圈圈,修改空樽data.php为5
 //version:102 /改动关门后再切换


// errorcode
// 1 外門未正常打開
// 2 外門未正常關閉
// 4 內門未正常打開
// 8 內門未正常關閉
// 16 外門防夾手檢測有手超過30s
// 32 內門防夾瓶檢測有瓶超過30s
// 64 電機堵轉

// ===============================================檢測是否有transaction處理結束。================================
// 系統制作人，儲盛峰來自上海，  聯系維護 email:sharonxia@163.com  電話：13918715708
// ===============================================檢測是否要下載交換八達通文件。================================
// if(date("Hi",time()) > "1930" && date("Hi",time()) < "2000")
// 先檢測是否有新的八達通的交換文件   如果文件和服務器壹樣就不會執行， 註意，如果傳輸失敗，需要顯示錯誤信息，並且報告，記錄
 
 
date_default_timezone_set("PRC");
error_reporting(0);
 
 
 

 
 
 
 

///////////////////////////////////清空//////////////////////////////////////////////////////////////////////

  $mysql = "select * from mid ";
    $result = mysqli_query($link, $mysql);
    $result = mysqli_fetch_array($result);
    $mid = $result['mid'];
 


 
	
	
	
		
///////////////////////////////////清空//////////////////////////////////////////////////////////////////////




 

 
 

function mysqltorepair($mytable)
{
    include("IncDB.php");

    $mysql = "select * from mid ";
    $result = mysqli_query($link, $mysql);
    $result = mysqli_fetch_array($result);
    $mid = $result['mid'];
    $device = $result['device'];
    $row = mysqli_query($link, 'check table qcs.' . $mytable);
    $row = mysqli_fetch_array($row);

    $rowmsg = $row['Msg_text'];

    if ($rowmsg !== "OK") {
        $mysql = 'repair table qcs.' . $mytable;
        mysqli_query($link, $mysql);

        $mysql = 'truncate ' . $mytable;
        mysqli_query($link, $mysql);



if($mytable=='command')
{
         $mysql = 'insert into ' . $mytable . " (mid) values  ('$mid')";
        mysqli_query($link, $mysql);
}
  
  
  else
  {
	    $mysql = 'insert into ' . $mytable . " (mid) values  ('$mid')";
        mysqli_query($link, $mysql);
	  
  }
		
		
        if ($mytable == "machineinformation") {
            $sql = "select * from machineinformationbackup";

            $backup = mysqli_query($link, $sql);
            $backup = mysqli_fetch_array($backup);

            $ad0orpic1 = 0;
            $mute = $backup['mute'];

            $v_top0 = $backup['v_top0'];
            $v_top1 = $backup['v_top1'];
            $v_top2 = $backup['v_top2'];
            $v_top3 = $backup['v_top3'];
            $v_top4 = $backup['v_top4'];
            $v_top5 = $backup['v_top5'];
            $v_top6 = $backup['v_top6'];
            $v_top7 = $backup['v_top7'];
            $v_top8 = $backup['v_top8'];
            $v_top9 = $backup['v_top9'];
            $v_top10 = $backup['v_top10'];
            $v_top11 = $backup['v_top11'];
            $v_top12 = $backup['v_top12'];
            $v_top13 = $backup['v_top13'];
            $v_top14 = $backup['v_top14'];
            $v_top15 = $backup['v_top15'];
            $v_top16 = $backup['v_top16'];
            $v_top17 = $backup['v_top17'];
            $v_top18 = $backup['v_top18'];
            $v_top19 = $backup['v_top19'];
            $v_top20 = $backup['v_top20'];
            $v_top21 = $backup['v_top21'];
            $v_top22 = $backup['v_top22'];
            $v_top23 = $backup['v_top23'];

            $v_top24 = $backup['v_top24'];
            $v_top25 = $backup['v_top25'];
            $v_top26 = $backup['v_top26'];
            $v_top27 = $backup['v_top27'];
            $v_top28 = $backup['v_top28'];
            $v_top29 = $backup['v_top29'];
            $v_top30 = $backup['v_top30'];
            $p_top0 = $backup['p_top0'];
            $p_top1 = $backup['p_top1'];
            $p_top2 = $backup['p_top2'];
            $p_top3 = $backup['p_top3'];
            $p_down0 = $backup['p_down0'];
            $p_down1 = $backup['p_down1'];
            $p_down2 = $backup['p_down2'];
            $p_down3 = $backup['p_down3'];
            $p_down4 = $backup['p_down4'];
            $p_down5 = $backup['p_down5'];
            $p_down6 = $backup['p_down6'];
            $p_down7 = $backup['p_down7'];
            $p_down8 = $backup['p_down8'];
            $p_down9 = $backup['p_down9'];
            $p_down10 = $backup['p_down10'];
            $p_down11 = $backup['p_down11'];
            $p_down12 = $backup['p_down12'];
            $p_down13 = $backup['p_down13'];
            $p_down14 = $backup['p_down14'];
            $p_down15 = $backup['p_down15'];
            $p_down16 = $backup['p_down16'];
            $p_down17 = $backup['p_down17'];
            $p_down18 = $backup['p_down18'];
            $p_down19 = $backup['p_down19'];
            $p_down20 = $backup['p_down20'];
            $p_down21 = $backup['p_down21'];
            $p_down22 = $backup['p_down22'];
            $p_down23 = $backup['p_down23'];
            $p_down24 = $backup['p_down24'];
            $p_down25 = $backup['p_down25'];
            $p_down26 = $backup['p_down26'];
            $p_down27 = $backup['p_down27'];
            $p_down28 = $backup['p_down28'];
            $p_down29 = $backup['p_down29'];
            $p_down30 = $backup['p_down30'];

            $sql = "UPDATE machineinformation SET ad0orpic1 =0 ,mute='$mute',
	v_top0 ='$v_top0' ,v_top1 ='$v_top1' ,v_top2 ='$v_top2' ,
	v_top3 ='$v_top3' ,v_top4 ='$v_top4' ,v_top5 ='$v_top5' ,v_top6 ='$v_top6' ,
	v_top7 ='$v_top7' ,v_top8 ='$v_top8' ,v_top9 ='$v_top9' ,v_top10 ='$v_top10' ,
	v_top11 ='$v_top11' ,v_top12 ='$v_top12' ,v_top13 ='$v_top13' ,v_top14 ='$v_top14' ,
	v_top15 ='$v_top15' ,v_top16 ='$v_top16' ,v_top17 ='$v_top17' ,v_top18 ='$v_top18' ,
	v_top19 ='$v_top19' ,v_top20 ='$v_top20' ,v_top21 ='$v_top21' ,v_top22 ='$v_top22',v_top23 ='$v_top23' ,
	v_top24 ='$v_top24' ,v_top25 ='$v_top25' ,v_top26 ='$v_top26' ,v_top27 ='$v_top27',v_top28 ='$v_top28' ,
	v_top29 ='$v_top29',v_top30 ='$v_top30' ,p_top0 ='$p_top0' ,p_top1 ='$p_top1' ,p_top2 ='$p_top2' ,
	p_top3 ='$p_top3' ,p_down0 ='$p_down0' ,	p_down1 ='$p_down1' ,p_down2 ='$p_down2' ,p_down3 ='$p_down3' ,
	p_down4 ='$p_down4' ,p_down5 ='$p_down5' ,p_down6 ='$p_down6' ,	p_down7 ='$p_down7' ,p_down8 ='$p_down8' ,p_down9 ='$p_down9' ,p_down10 ='$p_down10' ,
	p_down11 ='$p_down11' ,p_down12 ='$p_down12' ,p_down13 ='$p_down13' ,p_down14 ='$p_down14' ,
	p_down15 ='$p_down15' ,p_down16 ='$p_down16' ,p_down17 ='$p_down17' ,p_down18 ='$p_down18' ,
	p_down19 ='$p_down19' ,p_down20 ='$p_down20' ,p_down21 ='$p_down21' ,p_down22 ='$p_down22',p_down23 ='$p_down23' ,
	p_down24 ='$p_down24' ,p_down25 ='$p_down25' ,p_down26 ='$p_down26' ,p_down27 ='$p_down27',p_down28 ='$p_down28' ,
	p_down29 ='$p_down29',p_down30 ='$p_down30'	";

            mysqli_query($link, $sql);
        }
    }
}

mysqltorepair("command");
mysqltorepair("user");
mysqltorepair("getbarcode");
mysqltorepair("machineinformation");
mysqltorepair("ocl");
mysqltorepair("qcscode");
mysqltorepair("alipay");
 
       
  
		 
  


 
 
 
 
 
 function encrypt($id)
{
    $id = serialize($id);
    $key = file_get_contents("../SECRET-AES-256/secret.txt");

    $data['iv'] = base64_encode(substr($key, 0, 16));
    $data['value'] = openssl_encrypt($id, 'AES-256-CBC', $key, 0, base64_decode($data['iv']));
    $encrypt = base64_encode(json_encode($data));
    return $encrypt;
}

function decrypt($encrypt)
{
    $key = file_get_contents("../SECRET-AES-256/secret.txt");
    $encrypt = json_decode(base64_decode($encrypt), true);
    $iv = base64_decode($encrypt['iv']);
    $decrypt = openssl_decrypt($encrypt['value'], 'AES-256-CBC', $key, 0, $iv);
    $id = unserialize($decrypt);
    if ($id) {
        return $id;
    } else {
        return 0;
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


 
		
		
		
		
		 
 



<p>&nbsp;</p>
</body>

</html>