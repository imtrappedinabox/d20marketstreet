<?php
//displayCategory.php
include 'db.php';
if($_SESSION["store_id"] == "")
{
    header('Location: ../create.php');
}
else{
    $store = $_SESSION["store_id"];
    $query = "SELECT * FROM `Products` WHERE `store_id` = '".$store."' ORDER BY product_name ASC"; //added '".$cat."'" to line 5 in this query
    $category = mysqli_query($db_connection, $query)
        or die(mysqli_error($db_connection));
    $numRecords = mysqli_num_rows($category);
    echo "<div id=\"title\"><h1>Your Store</h1></div>";
    echo "<div class=\"Products\"><table>";
    echo "<tr><td align='center'><strong>Product Category</strong></td>
        <td align='center'><strong>Product Name</strong></td>
        <td align='center'><strong>Price</strong></td> 
        <td align='center'><strong>Description</strong></td>
        <td align='center'><strong>Quantity in Stock</strong></td>
        <td align='center'><strong>Modify?</strong></td></tr>";
    for ($i = 0; $i < $numRecords; $i++)
    {
        $row = mysqli_fetch_array($category);
        echo "<form id=\"modify".$row["product_id"]."\" name=\"modify".$row["product_id"]."\" "
                . "action=\"scripts/modifyItem.php\" onsubmit=\"return validateModifyForm('".$row["product_id"]."');\" method=\"post\"><tr>";
        echo "<td align='center'><select id=\"product_category_code\" name=\"product_category_code\">
                      <option>...</option>
                      <option>DICE</option>
                      <option>MOD</option>
                      <option>PROP</option>
                      <option>CHAR</option>
                      <option>RULE</option>
                      <option>SCEN</option>
                      <option>CHARART</option>
                      <option>WORLART</option>
                      <option>MAPS</option>
                    </select></td><td>";
        echo "<input name=\"product_name\" type=\"text\"
                    id=\"product_name\" size=\"20\" value=\"".$row["product_name"]."\" />";
        echo "</td><td align='center'>";
        echo "<input name=\"product_price\" type=\"number\"
                    id=\"product_price\" size=\"20\" value=\"".$row["product_price"]."\"/>";
        echo "</td><td align='center'>";
        echo "<input name=\"product_description\" type=\"text\"
                    id=\"product_description\" size=\"20\" value=\"".$row["product_description"]."\"/>";
        echo "</td><td align='center'>";
        echo "<input name=\"product_inventory\" type=\"number\"
                    id=\"product_inventory\" size=\"20\" value=\"".$row["product_inventory"]."\"/>";
        echo "</td><td align='center'>";
        echo "<input type=\"submit\" value=\"Modify\" />";
        echo "</td></tr></form>";
    }
    echo "</table><form action=\"scripts/createItem.php\" id=\"addForm\" name=\"addForm\" 
                    method=\"post\" onsubmit=\"return validateAddForm();\" enctype='multipart/form-data'>
                <table summary=\"add Form\">
                  <input type=\"hidden\" name=\"product_creator\" value=\"".$_SESSION["username"]."\"/>
                  <tr>
                    <td>Product Name:</td>
                    <td valign=\"top\"><input name=\"product_name\" type=\"text\"
                    id=\"product_name\" size=\"20\" /></td>
                  </tr>
                  <tr>
                    <td>Product Category:</td>
                    <td valign=\"top\"><select id=\"product_category_code\" name=\"product_category_code\" onchange=\"showFileLoad()\">
                      <option>...</option>
                      <option>DICE</option>
                      <option>MOD</option>
                      <option>PROP</option>
                      <option>CHAR</option>
                      <option>RULE</option>
                      <option>SCEN</option>
                      <option>CHARART</option>
                      <option>WORLART</option>
                      <option>MAPS</option>
                    </select></td>
                  </tr>
                  <tr>
                    <td>Price:</td>
                    <td valign=\"top\"><input name=\"product_price\" type=\"number\"
                    id=\"product_price\" size=\"20\" /></td>
                  </tr>
                  <tr>
                    <td>Number of Items:</td>
                    <td valign=\"top\"><input name=\"product_inventory\" type=\"number\"
                    id=\"product_inventory\" size=\"20\" /></td>
                  </tr>
                  <tr>
                    <td>Description:</td>
                    <td valign=\"top\"><input name=\"product_description\" type=\"text\"
                    id=\"product_description\" size=\"20\" /></td>
                  </tr>
                  <tr>
                    <td>Size:</td>
                    <td valign=\"top\"><select id=\"product_size\" name=\"product_size\">
                      <option>...</option>
                      <option>Small</option>
                      <option>Medium</option>
                      <option>Large</option>
                    </select></td>
                  </tr>
                  <tr id=\"upload_files\" name=\"upload_files\">
                    <td>Item File:</td>
                    <td valign=\"top\"><input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"30000\" />
                        <input name=\"userfile\" type=\"file\"
                    id=\"upload\" size=\"20\" /></td>
                  </tr>
                  <tr>
                    <td><input type=\"submit\" value=\"Add Item\" /></td>
                    <td><input type=\"reset\" value=\"Reset Form\" /></td>
                  </tr>
                </table>
              </form></div>";
}
?>
