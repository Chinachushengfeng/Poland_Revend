<?php
include("IncDB.php");
  
date_default_timezone_set('Europe/Warsaw'); 
$thetime=time();
$bin_barcode=$_GET['bin_barcode'];
$storage_type=$_GET['storage_type'];

$bin_type = $storage_type ;
$barcode= $bin_barcode;

 
// 判断 $barcode 是否存在，并且包含至少 3 个数字
if ($barcode) {
    // 用正则匹配数字
    preg_match_all('/\d/', $barcode, $matches);
    if (count($matches[0]) < 3) {
        // 不符合条件，返回上一页
        echo "<script>alert('Proszę sprawdzić swoje dane wejściowe');history.back();</script>";
        exit;
    }
}







$sql = "SELECT * FROM command";
$result = mysqli_query($link, $sql);

$result = mysqli_fetch_array($result);

$mid=$result['mid'];



?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Zarządzania Skrzynkami</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        header {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .status-info {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        .status-info h2 {
            color: #3498db;
            margin-bottom: 15px;
        }
        
        .bin-type {
            display: inline-block;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: bold;
            margin: 0 10px;
        }
        
        .bin-type.left {
            background-color: #4C7D3C;
            color: #fff;
        }
        
        .bin-type.right {
            background-color: #4C7D3C;
            color: #ffffff;
        }
        
        .barcode {
            font-size: 1.5em;
            font-weight: bold;
            color: #2c3e50;
            letter-spacing: 2px;
            margin: 10px 0;
        }
        
        .records-table {
            width: 100%;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .records-table h2 {
            padding: 20px;
            background: #4C7D3C;
            color: white;
            text-align: center;
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th {
            background-color: #4C7D3C;
            color: white;
            padding: 15px;
            text-align: left;
        }
        
        td {
            padding: 15px;
            border-bottom: 1px solid #4C7D3C;
        }
        
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        tr:hover {
            background-color: #e8f4fd;
        }
        
        .timestamp {
            font-weight: bold;
            color: #7f8c8d;
        }
        
        .bin-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.9em;
            font-weight: bold;
			color:white;
        }
        
        .bin-left {
            background-color: #d6eaf8;
            color: #2874a6;
        }
        
        .bin-right {
            background-color: #fadbd8;
            color: #cb4335;
        }
        
        .barcode-cell {
            font-family: 'Courier New', monospace;
            letter-spacing: 2px;
            color: #2c3e50;
            font-weight: bold;
        }
        
        footer {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            color: #7f8c8d;
            font-size: 0.9em;
        }
        
		 .back-button {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(135deg, #4C7D3C, #4C7D3C);
            color: white;
            border: none;
            padding: 32px 24px;
            border-radius: 50px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .back-button:hover {
            background: linear-gradient(135deg, #2980b9, #3498db);
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
            transform: translateY(-50%) scale(1.05);
        }
        
        .back-button:active {
            transform: translateY(-50%) scale(0.98);
        }
        
        .back-button i {
            font-size:48px;
        }
		
        @media (max-width: 768px) {
            th, td {
                padding: 10px 5px;
                font-size: 0.9em;
            }
            
            .barcode {
                font-size: 1.2em;
            }
        }
    </style>
</head>
 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>
 
<?php 
error_reporting(0);





if (!$bin_type || !$barcode)
{
    $backUrl = htmlspecialchars($_SERVER['HTTP_REFERER'] ?? 'javascript:history.back()');
    
    echo '<div style="text-align:center; padding:50px; font-family:Arial; margin-top:100px;text-align: center;
            padding: 50px; align-items: center; justify-content: center;margin-top:600px
			
			">
        <div style="font-size:60px;">Bład wymiany worka</div>
        <h2 style="color:#4c7d3c;">Nie zeskanowano poprawnie plomby</h2>
        <p style="font-size:18px; color:#333;">Wróć do poprzedniego ekranu i zeskanuj ponownie.<br>
        
        <p style="margin-top:30px; color:#666;">Za 5 sekund nastąpi automatyczny powrót...</p>
        <a href="' . $backUrl . '" style="display:inline-block; margin-top:20px; padding:10px 25px; background:#4c7d3c; color:white; text-decoration:none; border-radius:5px;"> <— Wróć teraz</a>
        <meta http-equiv="refresh" content="5;url=' . $backUrl . '">
    </div>';
    exit;
}

   

if ($bin_type == "l") {
    $bin_type_display = "Lewa strona";
    $bin_type = "left";
} else {
    $bin_type_display = "Prawa strona";
    $bin_type = "right";
}

// 插入新记录
$sql = "INSERT INTO empty_record (mid, dateline, bin_type, barcode) VALUES ('$mid','$thetime','$bin_type','$barcode')";
mysqli_query($link, $sql);
 
// 获取最新记录
 
// 继续正常代码...
?>

							
    <div class="container">
        <header>
            <h1>Lista zamkniętych plomb</h1>
        
		
		
		
		
        </header>
		
<button  style="position: fixed; top: 20px; left: 20px; z-index: 9999; background: #4c7d3c; color: white; border: none; padding: 10px 20px; border-radius: 8px; cursor: pointer; font-size: 14px; box-shadow: 0 2px 5px rgba(0,0,0,0.2);" onclick="window.location.href='http://127.0.0.1/tjt/debug/empty.php'">
    ← Powrót
</button>
		
        <div class="status-info">
            <h2>Ostatnio zamknięta plomba</h2>
            <div class="bin-type <?php echo $bin_type; ?>">
                <?php echo $bin_type_display; ?>
            </div>
            <div class="barcode"><?php echo $barcode; ?></div>
            <p>Czas zamknięcia worka: <?php echo date('Y-m-d H:i:s', $thetime); ?></p>
        </div>
        
        <div class="records-table">
            <h2>Historia plomb (ostatnie 200)</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Data i czas</th>
                            <th>Pojemnik</th>
                            <th>Numer plomby</th>
                        </tr>
                    </thead>


<tbody>
    <?php 
    $sql = "SELECT * FROM empty_record ORDER BY id DESC LIMIT 200";
    $result = mysqli_query($link, $sql);
    
    while($it = mysqli_fetch_assoc($result))  
    {
        // 使用每条记录自己的时间戳
        $date = date('Y-m-d H:i:s', $it['dateline']);
        
        // 根据数据库中存储的 bin_type 判断显示内容
        if ($it['bin_type'] == "left") {
            $bin_display = "Lewa strona";
            $bin_class = "bin-left";
        } else {
            $bin_display = "Prawa strona";
            $bin_class = "bin-right";
        }
    ?>
    <tr>
        <td class="timestamp"><?php echo $date; ?></td>
        <td><span class="bin-badge <?php echo $bin_class; ?>"><?php echo $bin_display; ?></span></td>
        <td class="barcode-cell"><?php echo htmlspecialchars($it['barcode']); ?></td>
    </tr>
    <?php } ?>
</tbody>


                </table>
            </div>
        </div>
    <script>
        // 延迟 5 秒后跳转
        setTimeout(() => {
            window.location.href = "http://127.0.0.1";
        }, 120000); // 5000 毫秒 = 5 秒
    </script>
	
        <footer>
            <p>System Zarządzania Skrzynkami &copy; <?php echo date('Y'); ?></p>
        </footer>
    </div>
	 
</body>
</html>