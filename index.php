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
            
            <div id="textLeft">
                <h2>A Marketplace for Tabletop Gamers</h2>
                <p>Here, you can find anything you need related to tabletop games!
                 From dice, to physical props, to art for whatever scenario you 
                 need. Our artists and writers are also commissionable so that they
                 can create products specifically tailored to your needs. In 
                 addition, we also offer the opportunity for you to create your own 
                 digital storefront to begin selling your own goods!</p>
                <p>Below, you'll find a list of featured stores that sell on our
                site. You're encouraged to click these links and see exactly
                what each has to offer.</p>
            </div>
            <div id="image">
                <img id="placeholder" src="" alt="Products"
                width="280px" height="160px" />
            </div>
            <div class="Links" id="featured">
                <h1>Currently featured</h1>
                <ul>
                    <li><a href="store.php?store=12">TestStore</a></li>
                </ul>
            </div>
        </div>
        <?php
        include("/common/footer.html")
        ?>
        </div>
    </body>
</html>
