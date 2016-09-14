<?php
//addItem.php
///////////////// main begins //////////////////
session_start();
include "db.php";
$customer_id = $_SESSION["customer_id"];
$order_id = getOrderID($customer_id);
$prod = stripslashes($_GET["prod"]);
$query = "SELECT * FROM Products WHERE product_id=".$_GET["prod"]."";
$product = mysqli_query( $db_connection, $query)
    or die(mysqli_error($db_connection));
$row = mysqli_fetch_array($product);
$product_inventory = $row["product_inventory"];
$quantity = $_GET["quantity"];
if ($product_inventory < $quantity )
{
    header("Location: ../purchase.php?prod=$prod&retry=true");
}
else
{
    $product_price = $row["product_price"];
    $query = "INSERT INTO Shipping_Items
    (
        shipping_item_status_code,
        order_id,
        product_id,
        shipping_item_quantity,
        shipping_item_price
    )
    VALUES
    (
        'IP',
        $order_id,
        $prod,
        $quantity,
        $product_price
    );";
    mysqli_query( $db_connection, $query)
            or die(mysqli_error($db_connection));
    header('Location: ../purchase.php?prod=view');
}
////////////// main ends functions begin //////////////
function getOrderID($customer_id)
{
    include "db.php";
    $query = "SELECT
            Orders.order_id,Orders.order_status_code,
            Orders.customer_id
        FROM Orders WHERE
            Orders.order_status_code = 'IP' and
            Orders.customer_id = '$customer_id';";
    $order = mysqli_query( $db_connection, $query)
        or die(mysqli_error($db_connection));
    $row = mysqli_fetch_array($order);
    return $row["order_id"];
}
?>
