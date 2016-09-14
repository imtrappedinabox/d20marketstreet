<?php
//processRegistration.php
///////////////////// main begins ///////////////////////

include "db.php";
if ($_POST["gender"] == "Female") $gender = "F";
else if ($_POST["gender"] == "Male") $gender = "M";
else $gender = "O";
$email = $_POST["email"];
if (emailExists($email))
{
    echo "<h3 class=\"margin10\">Sorry, but your e-mail address is already 
        registered.</h3>";
    echo "<h3 class=\"margin10\">[Exercise: Implement mailing  
        username and password to the e-mail address.]</h3>";
}
else
{
    $unique_login = getUniqueID($_POST["username"]);
    if ($unique_login != $_POST["username"])
    {
        echo "<h3 class=\"margin10\">Your preferred login name exists.<br />
            So ... we have assigned $unique_login as your login name.</h3>";
    }

    $query = "INSERT INTO Customers (`customer_id`, `salutation`, `customer_first_name`,
        `customer_last_name`, `customer_middle_initial`, `gender`, `email_address`,
        `username`, `password`, `street_address`, `town_city`, `county`, `country`, `zip_code`)
    VALUES (
        NULL, '".$_POST["salute"]."', '".$_POST["firstname"]."', '".$_POST["lastname"]."', '".$_POST["middle"]."', '".$gender."',
        '".$_POST["email"]."', '".$unique_login."', '".$_POST["password"]."', '".$_POST["address"]."',
        '".$_POST["city"]."', '".$_POST["state"]."', 'USA', '".$_POST["zip"]."'
    );";
    $customers = mysqli_query($db_connection, $query)
        or die(mysqli_error($db_connection));
    if($_POST["storefront"] == "yes")
    {
        include "scripts/createStorefront.php";
    }
    echo "<h3 class=\"margin10\">Thank you for registering with our e-store.</h3>";
    echo "<h3 class=\"margin10\"><a class=\"noDecoration\" href = \"login.php\">
        Please click here to login and start shopping.</a></h3>";
}
///////////////////// main ends functions begin ///////////////////////
function emailExists($email)
{
    include "db.php";
    $query = "SELECT * FROM Customers WHERE email_address = '$email'";
    $customers = mysqli_query($db_connection, $query)
        or die(mysqli_error($db_connection));
    $numRecords = mysqli_num_rows($customers);
    if ($numRecords > 0)
        return true;
    else
        return false;
}

function getUniqueID($username)
{
    include "db.php";
    $unique_login = $username;
    $query = "SELECT * FROM Customers WHERE username = '$unique_login'";
    $customers = mysqli_query( $db_connection, $query)
        or die(mysqli_error($db_connection));
    $numRecords = mysqli_num_rows($customers);
    if($numRecords != 0){
    for ($i = 0; $numRecords > 0; $i++)
    {
        $unique_login = $username.$i;
        $query = "SELECT * FROM Customers WHERE username = '$unique_login'";
        $customers = mysqli_query( $db_connection, $query)
            or die(mysqli_error($db_connection));
        $numRecords = mysqli_num_rows($customers);
    }
    }
    return $unique_login;
}
?>
