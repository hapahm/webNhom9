<?php
session_start();
//lay id goi den
$delid = $_GET['id'];

//ket noi csdl
require('../db/conn.php');
if ($_SESSION['user']['type'] != 'Admin') {
    echo "<h2>Bạn không có quyền truy cập nội dung này!</h2>";
    // exit;
} else {
    //xoa du lieu san pham trong CSDL
    $sql_str = "delete from admins where id=$delid";
    mysqli_query($conn, $sql_str);

    //trở về trang liệt kê 
    header("location: listusers.php");
}