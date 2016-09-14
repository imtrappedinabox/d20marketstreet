<?php
//addItem.php
///////////////// main begins //////////////////
session_start();
include "db.php";
$message = "";
$customer_id = $_SESSION["customer_id"];
$query = "SELECT * FROM customers WHERE customer_id=".$customer_id."";
$creator = mysqli_query( $db_connection, $query)
    or die(mysqli_error($db_connection));
$row = mysqli_fetch_array($creator);
$code = $_POST["product_category_code"];
$query = "INSERT INTO `Products`
(
    product_name,
    product_price,
    product_inventory,
    product_description,
    product_size,
    product_image_url,
    product_category_code,
    store_id,
    product_additional_details
)
VALUES
('".
    $_POST["product_name"]."', '".
    $_POST["product_price"]."', '".
    $_POST["product_inventory"]."', '".
    $_POST["product_description"]."', '".
    $_POST["product_size"]."',
    'images/products/usercreated.png', '".
    $code."', '".
    $_SESSION["store_id"]."',
    'User created'
);";
mysqli_query( $db_connection, $query)
        or die(mysqli_error($db_connection));
if ($code != "CHAR" && $code != "RULE" && $code != "SCEN")
{
    $message = "Dear ".$row['salutation']." ".$row['customer_last_name'].":\r\n".
            "We have decided to approve your product for sale on d20 Market Street. ".
            "It can be found under the category ".$code." as well as at your personal ".
            "store. Please mail ".$_POST["product_inventory"]." of your product to ".
            "5566 Dublin Rd, Dublin, Ohio, 43017. We eagerly await its arrival and ".
            "will begin selling your item upon its reception. \r\n".
            "Best regards,\r\nThe d20 team";
    
    $product_id = mysqli_insert_id ($db_connection)
            or die(mysqli_error($db_connection));
    $query = "INSERT INTO `shipping_items`("
            . "`shipping_item_quantity`, "
            . "`shipping_item_price`, "
            . "`shipping_item_status_code`, "
            . "`product_id`) "
            . "VALUES ("
            . $_POST["product_inventory"].","
            . $_POST["product_price"].","
            . "'SP',"
            . $product_id .");";
    mysqli_query( $db_connection, $query)
            or die(mysqli_error($db_connection));
    $shipping_item_id = mysqli_insert_id ($db_connection)
            or die(mysqli_error($db_connection));
    $query = "INSERT INTO `shipment_items`(`shipping_item_id`) VALUES (".$shipping_item_id.")";
    mysqli_query( $db_connection, $query)
            or die(mysqli_error($db_connection));
    $shipment_id = mysqli_insert_id ($db_connection)
            or die(mysqli_error($db_connection));
    $query = "INSERT INTO `store_shipment`
    (
        shipment_id,
        shipment_tracking_number,
        shipment_date,
        other_shipment_details,
        store_id
    )
    VALUES
    ('".$shipment_id."', 'This is a placeholder value', CURDATE(), 'extra details', '".$_SESSION["store_id"]."');";
    mysqli_query( $db_connection, $query)
            or die(mysqli_error($db_connection));
}
if ($code != "PROP" && $code != "DICE" && $code != "MOD")
{
    if($message == ""){
        $message = "Dear ".$_SESSION['salutation']." ".$_SESSION['customer_last_name'].":\r\n".
            "We have decided to approve your product for sale on d20 Market Street. ".
            "It can be found under the category ".$code." as well as at your personal ".
            "store. We will begin selling this item immediately. \r\n".
            "Best regards,\r\nThe d20 team";
    }
    addItemFile();
}
mail($row["email_address"], "Your recent product was approved!", $message);
$record = $row["username"]." (".$row["customer_id"].") created a product titled ".
       $_POST["product_name"]." in the store ".$_SESSION["store_name"].
        " (".$_SESSION["store_id"].").";
if($shipment_id != ""){
    $record = $record." The shipment id is ".$shipment_id;
}
//Log the message in a file called feedback.txt on the web server
$fileVar = fopen("../data/sumbission.txt", "a")
    or die("Error: Could not open the log file.");
fwrite($fileVar, "\n-------------------------------------------------------\n")
    or die("Error: Could not write to the log file.");
fwrite($fileVar, "Date received: ".date("jS \of F, Y \a\\t H:i:s\n"))
    or die("Error: Could not write to the log file.");
fwrite($fileVar, $record)
    or die("Error: Could not write to the log file.");
header('Location: ../manage.php');

function addItemFile(){
    try {
        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        if (!isset($_FILES['userfile']['error']) ||is_array($_FILES['userfile']['error'])){throw new RuntimeException('Invalid parameters.');}
        switch ($_FILES['userfile']['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
            default:
                throw new RuntimeException('Unknown errors.');
        }
        // You should also check filesize here. 
        if ($_FILES['userfile']['size'] > 1000000) {throw new RuntimeException('Exceeded filesize limit.');};
        $ext = "txt";
        if (!move_uploaded_file( $_FILES['userfile']['tmp_name'],
            sprintf('uploads/%s.%s',$_SESSION["customer_id"].date(mdygis),$ext) )) {
            throw new RuntimeException('Failed to move uploaded file.');}
    } catch (RuntimeException $e) {echo $e->getMessage();}
}
?>
