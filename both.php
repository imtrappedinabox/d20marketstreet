<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--.html-->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <title>d20 Market Street</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <script type="text/javascript" src="scripts/menu.js"></script>
    </head>
    <body>
        <div id="page">
        <?php 
        include("common/header.php")
        ?>
        <div id="content">
            <?php
            $cat = "CHARART' OR `product_category_code` = 'WORLART' OR `product_category_code` = 'MAPS";
            include 'scripts/displayCategory.php';
            ?>
        </div>
        <?php 
        include("/common/footer.html")
        ?>
        </div>
    </body>
</html>
