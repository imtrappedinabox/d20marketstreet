<?php
///////////////// main begins //////////////////
session_start();
include "receipt.php";
$customer_id = $_SESSION["customer_id"];
displayReceipt($customer_id);
$order_id = orderPaid($customer_id);
orderItemPaid($order_id);
////////////// main ends functions begin //////////////

function orderPaid($customer_id)
{
    include 'db.php';
    $query = "SELECT * FROM Orders WHERE
        Orders.order_status_code = 'IP' and
        Orders.customer_id = '$customer_id';";
    $order = mysqli_query( $db_connection, $query)
        or die(mysqli_error($db_connection));
    $row = mysqli_fetch_array($order);
    $query2 = "REPLACE INTO Orders
    (
        order_id,
        customer_id,
        order_status_code,
        date_order_placed,
        order_details
    )
    VALUES
    (
        '"
        .$row["order_id"]."','"
        .$row["customer_id"]."',
        'PD',
        CURDATE(),"
        . 0
        .");";
    mysqli_query( $db_connection, $query2)
       or die(mysqli_error($db_connection));
    return $row[order_id];
}

function orderItemPaid($order_id)
{
    include 'db.php';
    $query = "SELECT *
        FROM Shipping_Items WHERE
        order_id = '$order_id';";
    $orderItems = mysqli_query( $db_connection, $query)
        or die(mysqli_error($db_connection));
    $numRecords = mysqli_num_rows($orderItems);
    for($i = 0; $i < $numRecords; $i++)
    {
        $row = mysqli_fetch_array($orderItems);
        $query2 = "REPLACE INTO Shipping_Items
        (
            shipping_item_id,
            shipping_item_status_code,
            order_id,
            product_id,
            shipping_item_quantity,
            shipping_item_price
        )
        VALUES
        ('"
            .$row["shipping_item_id"]."',
            'PD','"
            .$row["order_id"]."','"
            .$row["product_id"]."','"
            .$row["shipping_item_quantity"]."','"
            .$row["shipping_item_price"]."');";
        mysqli_query( $db_connection, $query2)
            or die(mysqli_error($db_connection));
        reduceInventory($row[product_id], $row[shipping_item_quantity]);
    }
}

function reduceInventory($prod, $quantity)
{
    include 'db.php';
    $query = "SELECT * FROM Products WHERE product_id=".$prod.";";
    $product = mysqli_query( $db_connection, $query)
        or die(mysqli_error($db_connection));
    $row = mysqli_fetch_array($product);
    $row["product_inventory"] -= $quantity;
    $query = "REPLACE INTO Products
        (
            product_id,
            product_category_code,
            product_name,
            product_price,
            product_inventory,
            product_size,
            product_description,
            product_image_url
        )
        VALUES
        ('"
            .$row["product_id"]."','"
            .$row["product_category_code"]."','"
            .$row["product_name"]."','"
            .$row["product_price"]."','"
            .$row["product_inventory"]."','"
            .$row["product_size"]."','"
            .$row["product_description"]."','"
            .$row["product_image_url"].
         "');";
    mysqli_query( $db_connection, $query)
        or die(mysqli_error($db_connection));
}
?>
