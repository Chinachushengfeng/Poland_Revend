<?php
/**
 * 从 MySQL 读取配置并生成 config.ini 文件
 * 数据库中没有的字段使用 config.ini 中的默认值
 */

// 数据库配置
$dbConfig = array(
    'host' => '127.0.0.1',
    'username' => 'root',
    'password' => 'chushengfeng123',
    'database' => 'qcs'
);

try {
    // 连接数据库
    $pdo = new PDO(
        "mysql:host={$dbConfig['host']};dbname={$dbConfig['database']};charset=utf8",
        $dbConfig['username'],
        $dbConfig['password'],
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        )
    );
    
    // 从数据库读取配置（取 id=1 的记录）
    $stmt = $pdo->prepare("SELECT * FROM machine_config WHERE id = 1 LIMIT 1");
    $stmt->execute();
    $config = $stmt->fetch();
    
    if (!$config) {
        throw new Exception("未找到配置数据，请先插入默认配置");
    }
    
    // 生成 INI 文件内容
    $iniContent = generateIniContent($config);
    
    // 写入文件
    $filePath = 'c:/rvm/config.ini';
    $result = file_put_contents($filePath, $iniContent);
    
    if ($result === false) {
        throw new Exception("写入文件失败，请检查目录权限");
    }
    
    echo "✅ config.ini 生成成功！\n";
    echo "📁 文件路径: {$filePath}\n";
    echo "\n--- 生成的内容 ---\n";
    echo $iniContent;
    
} catch (PDOException $e) {
    echo "❌ 数据库错误: " . $e->getMessage() . "\n";
} catch (Exception $e) {
    echo "❌ 错误: " . $e->getMessage() . "\n";
}

/**
 * 根据数据库配置生成 INI 文件内容
 * 
 * @param array $config 数据库配置数组
 * @return string INI 格式的内容
 */
function generateIniContent($config) {
    // 从数据库获取值，如果不存在则使用默认值
    // [Weight] 部分 - 固定值
    $scale = 1;
    $offset = 0;
    $minWeight = 20000;
    $lowerlimitWeight = 500;
    $upperlimitWeight = 500;
    
    // [Ozone] 部分 - 固定值
    $interval = 360;
    $duration = 20;
    
    // [Screen] 部分 - 从数据库读取
    $closeHour = isset($config['CloseHour']) ? $config['CloseHour'] : 0;
    $closeMinute = isset($config['CloseMinute']) ? $config['CloseMinute'] : 0;
    $openHour = isset($config['OpenHour']) ? $config['OpenHour'] : 0;
    $openMinute = isset($config['OpenMinute']) ? $config['OpenMinute'] : 0;
    
    // [Setting] 部分 - 从数据库读取，没有则用默认值
    $machineModel = isset($config['MachineModel']) && !empty($config['MachineModel']) 
        ? $config['MachineModel'] : 'RVM3000CFO';
    
    $maintenanceQR = isset($config['MaintenanceQR']) && !empty($config['MaintenanceQR']) 
        ? $config['MaintenanceQR'] : 'background-kegoo-RVM';
    
    $scanerPort1 = isset($config['ScanerPort1']) && !empty($config['ScanerPort1']) 
        ? $config['ScanerPort1'] : 'COM1';
    
    $scanerPort2 = isset($config['ScanerPort2']) && !empty($config['ScanerPort2']) 
        ? $config['ScanerPort2'] : 'COM2';
    
    // url 固定值
    $url = 'http://127.0.0.1';
    
    $imageConfidence = isset($config['imageConfidence']) 
        ? $config['imageConfidence'] : 1;
    
    $testModel = 'False';
    
    $allBarcode = isset($config['barcode_accepet_all']) 
        ? ($config['barcode_accepet_all'] == 1 ? 'True' : 'False') : 'False';
    
    $printTemplate = isset($config['PrintTemplate']) 
        ? $config['PrintTemplate'] : 1;
    
    $printPrice = 0.5;
    
    // 生成 INI 内容（严格按照原格式和顺序）
    $iniContent = "[Weight]\r\n";
    $iniContent .= "Scale={$scale}\r\n";
    $iniContent .= "Offset={$offset}\r\n";
    $iniContent .= "MinWeight={$minWeight}\r\n";
    $iniContent .= "LowerlimitWeight={$lowerlimitWeight}\r\n";
    $iniContent .= "UpperlimitWeight={$upperlimitWeight}\r\n";
    $iniContent .= "[Ozone]\r\n";
    $iniContent .= "Interval={$interval}\r\n";
    $iniContent .= "Duration={$duration}\r\n";
    $iniContent .= "[Screen]\r\n";
    $iniContent .= "CloseHour={$closeHour}\r\n";
    $iniContent .= "CloseMinute={$closeMinute}\r\n";
    $iniContent .= "OpenHour={$openHour}\r\n";
    $iniContent .= "OpenMinute={$openMinute}\r\n";
    $iniContent .= "[Setting]\r\n";
    $iniContent .= "MachineModel={$machineModel}\r\n";
    $iniContent .= "MaintenanceQR={$maintenanceQR}\r\n";
    $iniContent .= "ScanerPort1={$scanerPort1}\r\n";
    $iniContent .= "ScanerPort2={$scanerPort2}\r\n";
    $iniContent .= "url={$url}\r\n";
    $iniContent .= "imageConfidence={$imageConfidence}\r\n";
    $iniContent .= "TestModel={$testModel}\r\n";
    $iniContent .= "AllBarcode={$allBarcode}\r\n";
    $iniContent .= "PrintTemplate={$printTemplate}\r\n";
    $iniContent .= "PrintPrice={$printPrice}\r\n";
    
    return $iniContent;
}
?>