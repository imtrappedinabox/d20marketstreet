<?php
//purchase.php
session_start();
if($_SESSION["customer_id"] == "")
{
    $_SESSION["purchasePending"] = stripslashes($_GET["prod"]);
    header('Location: login.php');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Nature's Source - Purchasing Products</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <script type="text/javascript" src="scripts/menu.js"></script>
    <script type="text/javascript" src="scripts/order.js"></script>
    <?php include "scripts/db.php" ?>
  </head>
  <body>
    <div id="page">
      <?php
      include("common/header.php");
      ?>
      <div id="content">
        <div id="purchaseProducts">
          <?php include "scripts/processPurchase.php" ?>
        </div>
      </div>
      <?php include("common/footer.html"); ?>
    </div>
  </body>
</html>
