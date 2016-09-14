<?php
//displayCategory.php
include 'db.php';
if($_GET["cat"] != ""){$cat = stripslashes($_GET["cat"]);}
$query = "SELECT * FROM `Products` WHERE `product_category_code` = '".$cat."' ORDER BY product_name ASC"; //added '".$cat."'" to line 5 in this query
$category = mysqli_query($db_connection, $query)
    or die(mysqli_error($db_connection));
$numRecords = mysqli_num_rows($category);
//echo "<p>$query</p>";
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
echo "</table></div>";
?>
