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
    <script type="text/javascript" src="scripts/rotate.js"></script>
    
    </head>
    <body onload="startRotation()">
        <div id="page">
        <?php 
        include("common/header.php")
        ?>
        <div id="content">
            <form id="registerForm" action="created.php" name="register"
                method="post" onsubmit="return processregisterform()">
            <fieldset>
              <legend>Store Details</legend> 
              <table summary="Store Details">
                <tr>
                  <td><label for="storename">Store name:</label></td>
                  <td><input id="storename" type="text" name="storename" size="40" /></td>
                </tr>
                <tr>
                  <td><label for="description">Store description:</label></td>
                  <td><input id="description" type="text" name="description" size="40" /></td>
                </tr>
                <tr>
                  <td><label for="bio">Your bio:</label></td>
                  <td><input id="bio" type="text" name="bio" size="40" /></td>
                </tr>
                <tr>
                  <td><input type="submit" value="Create" /></td>
                  <td><input type="reset" value="Reset Form" /></td>
                </tr>
              </table>
            </fieldset>
            </form>
        </div>
        <?php
        include("/common/footer.html")
        ?>
        </div>
    </body>
</html>
