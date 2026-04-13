<?php
header('Content-Type: application/json; charset=utf-8');

/**
 * 机器配置 API - 简单版
 * 只负责接收参数并写入数据库
 */

// 数据库连接
$pdo = new PDO(
    'mysql:host=127.0.0.1;dbname=qcs;charset=utf8',
    'root',
    'chushengfeng123'
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 获取 POST 过来的 JSON
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// 检查是否有数据
if (!$data) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data format or missing required fields'], JSON_UNESCAPED_UNICODE);
    exit;
}

// 允许更新的字段列表
$allowFields = [
    'shutdown'
];

// 准备要更新的字段
$updateFields = [];
$params = [];

foreach ($data as $key => $value) {
    // 只更新允许的字段
    if (in_array($key, $allowFields)) {
        $updateFields[] = "$key = :$key";
        $params[$key] = $value;
    }
}

// 没有允许的字段
if (empty($updateFields)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data format or missing required fields'], JSON_UNESCAPED_UNICODE);
    exit;
}

// 更新数据库
$sql = "UPDATE machine_config SET " . implode(', ', $updateFields) . " WHERE id = 1";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);

// 返回成功
echo json_encode([
    'status' => 'success',
    'message' => 'Configuration updated successfully',
    'updated' => array_keys($data)
], JSON_UNESCAPED_UNICODE);
?>

