<?php
//phpinfo();
    //db.php
    $db_location = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_database = "d20marketstreet";
    $db_connection = mysqli_connect($db_location,$db_username,$db_password,$db_database)
        or die ("Error - Could not connect to MySQL Server");
    //$db_connection = mysql_connect('localhost','admin','adminadmin',$db_database);
    //echo mysql_error();
      // or die ("Error - Could not connect to MySQL Server");

    //$db = mysqli_select_db($db_connection,$db_database);
    //echo mysql_error();
        //or die ("Error - Could not open database");
    
?>