<?php
session_start();
require 'admin/root.php';

// Display errors for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h1>Kiểm tra cấu trúc cơ sở dữ liệu</h1>";

// Check connection
if ($connect) {
    echo "<p style='color:green'>✓ Kết nối đến cơ sở dữ liệu thành công.</p>";
} else {
    echo "<p style='color:red'>✗ Lỗi kết nối cơ sở dữ liệu: " . mysqli_connect_error() . "</p>";
    exit;
}

// Check if orders table exists
$check_orders = mysqli_query($connect, "SHOW TABLES LIKE 'orders'");
if (mysqli_num_rows($check_orders) > 0) {
    echo "<p style='color:green'>✓ Bảng 'orders' đã tồn tại.</p>";
    
    // Check if payment_method column exists
    $check_column = mysqli_query($connect, "SHOW COLUMNS FROM `orders` LIKE 'payment_method'");
    if (mysqli_num_rows($check_column) > 0) {
        echo "<p style='color:green'>✓ Cột 'payment_method' đã tồn tại trong bảng 'orders'.</p>";
    } else {
        echo "<p style='color:orange'>! Cột 'payment_method' chưa tồn tại. Đang thêm cột...</p>";
        
        // Add payment_method column
        $alter_table = "ALTER TABLE `orders` ADD COLUMN `payment_method` VARCHAR(50) DEFAULT 'cod' AFTER `status`";
        if (mysqli_query($connect, $alter_table)) {
            echo "<p style='color:green'>✓ Đã thêm cột 'payment_method' vào bảng 'orders'.</p>";
        } else {
            echo "<p style='color:red'>✗ Lỗi khi thêm cột 'payment_method': " . mysqli_error($connect) . "</p>";
        }
    }
} else {
    echo "<p style='color:red'>✗ Bảng 'orders' không tồn tại.</p>";
}

// Check if order_detail table exists
$check_order_detail = mysqli_query($connect, "SHOW TABLES LIKE 'order_detail'");
if (mysqli_num_rows($check_order_detail) > 0) {
    echo "<p style='color:green'>✓ Bảng 'order_detail' đã tồn tại.</p>";
    
    // Show structure of order_detail table
    echo "<h2>Cấu trúc bảng order_detail:</h2>";
    $columns = mysqli_query($connect, "SHOW COLUMNS FROM `order_detail`");
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    while ($column = mysqli_fetch_assoc($columns)) {
        echo "<tr>";
        foreach ($column as $key => $value) {
            echo "<td>" . ($value === null ? 'NULL' : $value) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    
    // Check if product_lp_id allows NULL
    $check_product_lp = mysqli_query($connect, "SHOW COLUMNS FROM `order_detail` LIKE 'product_lp_id'");
    if (mysqli_num_rows($check_product_lp) > 0) {
        $column = mysqli_fetch_assoc($check_product_lp);
        if ($column['Null'] === 'NO') {
            echo "<p style='color:orange'>! Cột 'product_lp_id' không cho phép NULL. Đang sửa...</p>";
            
            // Modify column to allow NULL
            $alter_column = "ALTER TABLE `order_detail` MODIFY COLUMN `product_lp_id` INT NULL";
            if (mysqli_query($connect, $alter_column)) {
                echo "<p style='color:green'>✓ Đã sửa cột 'product_lp_id' để cho phép NULL.</p>";
            } else {
                echo "<p style='color:red'>✗ Lỗi khi sửa cột 'product_lp_id': " . mysqli_error($connect) . "</p>";
            }
        } else {
            echo "<p style='color:green'>✓ Cột 'product_lp_id' đã cho phép NULL.</p>";
        }
    }
} else {
    echo "<p style='color:red'>✗ Bảng 'order_detail' không tồn tại.</p>";
}

// Show all tables in the database
echo "<h2>Danh sách bảng trong cơ sở dữ liệu:</h2>";
$tables = mysqli_query($connect, "SHOW TABLES");
echo "<ul>";
while ($table = mysqli_fetch_array($tables)) {
    echo "<li>" . $table[0] . "</li>";
}
echo "</ul>";

mysqli_close($connect);
?> 