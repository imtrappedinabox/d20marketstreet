<?php


//createStorefront.php
///////////////////// main begins ///////////////////////
include "db.php";
if($_SESSION["customer_id"] == "")
{
    $query = "SELECT `customer_id` FROM `customers` WHERE `email_address` = '".$_POST["email"]."'";
    $user = mysqli_query( $db_connection, $query)
        or die(mysqli_error($db));
    $row = mysqli_fetch_array($user);
    $userid = $row["customer_id"];
}
else{
    $userid = $_SESSION["customer_id"];
}

$storename = $_POST["storename"];
$unique_store = getUniqueStore($storename);
    if ($unique_store != $storename)
    {
        echo "<h3 class=\"margin10\">Your preferred login name exists.<br />
            So ... we have assigned $unique_store as your login name.</h3>";
    }

    $query = "INSERT INTO `personal_store`(`store_id`, `store_name`, `store_description`, `creator_bio`, `customer_id`) "
            . "VALUES (NULL, '".$unique_store."', '".$_POST["description"]."', '".$_POST["bio"]."', '".$userid."')";
    $customers = mysqli_query($db_connection, $query)
        or die(mysqli_error($db_connection));

$_SESSION["store_id"] = $unique_store;
    
function getUniqueStore($store)
{
    include "db.php";
    $unique_store = $store;
    $query = "SELECT * FROM `personal_store` WHERE `store_name` = '$unique_store'";
    $stores = mysqli_query( $db_connection, $query)
        or die(mysqli_error($db_connection));
    $numRecords = mysqli_num_rows($stores);
    if($numRecords != 0){
        for ($i = 0; $numRecords > 0; $i++)
        {
            $unique_store = $store.$i;
            $query = "SELECT * FROM `personal_store` WHERE `store_name` = '$unique_store'";
            $stores = mysqli_query( $db_connection, $query)
                or die(mysqli_error($db_connection));
            $numRecords = mysqli_num_rows($stores);
        }
    }
    return $unique_store;
}