<?php
//deleteItem.php
//main begins
session_start();
include "db.php";
$order_item = stripslashes($_GET["order_item"]);
$order_id = stripslashes($_GET["order_id"]);
$query = "DELETE FROM Shipping_Items WHERE shipping_item_id = $order_item";
mysqli_query( $db_connection, $query)
    or die(mysqli_error($db));

$query = "SELECT COUNT(*) AS numItemsStillInOrder
    FROM Shipping_Items
    WHERE order_id=$order_id;";
$return_value = mysqli_query( $db_connection, $query)
    or die(mysqli_error($db_connection));
$row = mysqli_fetch_array($return_value);
if ($row[numItemsStillInOrder] == 0)
{
    $query = "DELETE FROM Orders WHERE order_id=$order_id";
    mysqli_query( $db_connection, $query)
        or die(mysqli_error($db));
}

header('Location: ../purchase.php?prod=view');
//main ends
?>
