<?php 

ob_start();
require_once("connect.php");
$id = $_GET['id'];


$update_order_query = "UPDATE orders SET status_id = 2 WHERE id = $id";

$result = mysqli_query($conn, $update_order_query);


mysqli_close($conn);
header("Location: ../views/orders.php");

ob_end_flush();
?>