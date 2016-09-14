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
            <div id="textOnly">
                <h2>Current webpages</h2>
                <ul>
                    <li><a href="index.php">Homepage</a></li>
                    <li><a href="contact.php.">Contact Us</a></li>
                    <li><a href="register.php">Register</a></li>  
                    <li><a href="sitemap.php">Sitemap</a></li>
                    <li><a href="physical.php">Physical products</a>
                        <ul>
                            <li><a href="dice.php">Dice</a></li>
                            <li><a href="models.php">Models</a></li>  
                            <li><a href="props.php">Props</a></li>        
                        </ul>
                    </li>
                    <li><a href="digital.php">Digital products</a>
                        <ul>
                            <li><a href="characters.php">Characters</a></li>
                            <li><a href="homebrew.php">Homebrew rules and templates</a></li>  
                            <li><a href="scenarios.php">Scenarios</a></li>        
                        </ul>
                    </li>
                    <li><a href="both.php">Combination products</a>
                        <ul>
                            <li><a href="characterart.php">Character art</a></li>
                            <li><a href="worldart.php">World art</a></li>  
                            <li><a href="maps.php">Maps</a></li>        
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <?php 
        include("/common/footer.html")
        ?>
        </div>
    </body>
</html>
