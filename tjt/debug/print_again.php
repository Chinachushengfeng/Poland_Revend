<?php 
error_reporting(0);

$print_barcode = $_GET['print_barcode'];
$can = $_GET['can'];
$bottle = $_GET['bottle'];

include('incdb.php');

// 修正 SQL 语法：mysqli_query(连接, SQL语句)
$sql = "UPDATE command SET command=2, printer_barcode='$print_barcode', bottle='$bottle', can='$can'";

// 执行查询
$result = mysqli_query($link, $sql);

if ($result) {
    // 成功：显示提示并跳转
    echo "<script>
       alert('✅ Polecenie drukowania zostało wysłane. Sprawdź wydruk!');

        window.location.href = document.referrer; // 返回上一页
    </script>";
} else {
    // 失败：显示错误信息
    echo "<script> 
        window.history.back(); // 返回上一页 
    </script>";
}

// 可选：输出 SQL 用于调试（建议关闭）
// echo $sql;
?>