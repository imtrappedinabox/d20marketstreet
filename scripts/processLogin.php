<?php
//processLogin.php
session_start();
include "db.php";
$query = "SELECT * FROM `customers` WHERE
    username = '".$_POST["customer_nm"]."'";
$rowsWithMatchingLoginName = mysqli_query($db_connection, $query)
    or die(mysqli_error($db_connection));
$numRecords = mysqli_num_rows($rowsWithMatchingLoginName);
if ($numRecords == 1)
{
    $row = mysqli_fetch_array($rowsWithMatchingLoginName);
    if ($_POST["customer_pw"] == $row["password"])
    {
        $_SESSION["customer_id"] = $row["customer_id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["salutation"] = $row["salutation"];
        $_SESSION["customer_first_name"] = $row["customer_first_name"];
        $_SESSION["customer_middle_initial"] = $row["customer_middle_initial"];
        $_SESSION["customer_last_name"] = $row["customer_last_name"];
        $prod = $_SESSION["purchasePending"] ;
        if ($prod != "")
        {
            unset($_SESSION["purchasePending"]);
            $goto  = "Location: ../purchase.php?prod=$prod";
        }
        else
        {
            $goto  = 'Location: ../index.php';
        }
        $query = "SELECT * FROM `Personal_store` WHERE
            customer_id = '".$_SESSION["customer_id"]."'";
        $rows = mysqli_query($db_connection, $query)
            or die(mysqli_error($db_connection));
        $numRecords = mysqli_num_rows($rows);
        if ($numRecords == 1){
            $row = mysqli_fetch_array($rows);
            $_SESSION["store_id"] = $row["store_id"];
            $_SESSION["store_name"] = $row["store_name"];
        }
        else{
            $_SESSION["store_id"] = "";
        }
        header($goto);
    }
    else{
    //Either no records were received or the password did not match
    header('Location: ../login.php?retry=true');
    }
    
}
else{
//Either no records were received or the password did not match
header('Location: ../login.php?retry=true');
}
?>