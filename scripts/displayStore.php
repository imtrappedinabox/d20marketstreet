<?php
//displayCategory.php
include 'db.php';
if($_GET["store"] != ""){
    $store_id = stripslashes($_GET["store"]);
    $query = "SELECT * FROM `Products` WHERE `store_id` = '".$store_id."' ORDER BY product_name ASC";
    $category = mysqli_query($db_connection, $query)
        or die(mysqli_error($db_connection));
    $numRecords = mysqli_num_rows($category);
    if($numRecords > 0){
        $store = getStore($store_id);
        $creator_name = getCreatorName($store["customer_id"]);
        echo "<div id=\"title\"><h1>".$store["store_name"]."</h1>"
                . "<h5>Created by ".$creator_name."</h5></div>";
        echo "<div class=\"Products\"><table>";
        echo "<tr><td align='center'><strong>Product Image</strong></td>
            <td align='center'><strong>Product Name</strong></td>
            <td align='center'><strong>Price</strong></td>
            <td align='center'><strong>Quantity in Stock</strong></td>
            <td align='center'><strong>Purchase?</strong></td></tr>";
        for ($i = 0; $i < $numRecords; $i++)
        {
            echo "<tr>";
            $row = mysqli_fetch_array($category);
            echo "<td align='center'>";
            echo  "<img height='70px' width='70px'
                src='".$row["product_image_url"]."'
                alt='Product Image' />";
            echo "</td><td>";
            echo $row["product_name"];
            echo "</td><td align='center'>";
            printf("$%.2f",$row["product_price"]);
            echo "</td><td align='center'>";
            echo $row["product_inventory"];
            echo "</td><td align='center'>";
            echo "<a href=\"purchase.php?prod='".$row["product_id"]."'\">";
            echo "<img src='images/buythisitem.png' alt='Buy this item' /></a>";
            echo "</td></tr>";
        }
        echo "</table><p id=\"store_description\">".$store["store_description"]."</p>"
                ."<p id=\"creator_bio\">".$store["creator_bio"]."</p>"
                . "</div>";
    }
    else{
        echo "<div id=\"title\"><h1>This store does not exist</h1></div>";
    }
    
}
else{
    header('Location: ../index.php');
}

function getStore($store_id)
{
    include "db.php";
    $query = "SELECT * FROM personal_store WHERE store_id = '$store_id';";
    $order = mysqli_query( $db_connection, $query)
        or die(mysqli_error($db_connection));
    $row = mysqli_fetch_array($order);
    return $row;
}

function getCreatorName($customer_id)
{
    include "db.php";
    $query = "SELECT username FROM customers WHERE customer_id = '$customer_id';";
    $order = mysqli_query( $db_connection, $query)
        or die(mysqli_error($db_connection));
    $row = mysqli_fetch_array($order);
    return $row["username"];
}
?>