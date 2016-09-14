<?php
//login.php
session_start();
error_reporting(error_reporting() & ~E_NOTICE );
if ($_SESSION["customer_id"] != "") header('Location: index.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--.html-->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Register for d20 Market Street</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <script type="text/javascript" src="scripts/menu.js"></script>
        <script type="text/javascript" src="scripts/validateRegistration.js"></script>
        <script type="text/javascript" src="scripts/login.js"></script>
    </head>
    <body>
    <div id="page">
        <?php 
        include("common/header.php")
        ?>
        <div id="content">
        <div id="textOnly" class="RegisterForm">
            <h4>Login Form</h4>
            <fieldset>
          <form id="loginForm" name="loginForm" action="scripts/processLogin.php"
                method="post" onsubmit="return validateLoginForm();">
            <table summary="Login Form">
              <tr>
                <td>Username:</td>
                <td valign="top"><input name="customer_nm" type="text"
                id="customer_nm" size="20" /></td>
              </tr>
              <tr>
                <td>Password:</td>
                <td valign="top"><input name="customer_pw" type="password"
                id="customer_pw" size="20" /></td>
              </tr>
              <tr>
                <td><input type="submit" value="Login" /></td>
                <td><input type="reset" value="Reset Form" /></td>
              </tr>
              <?php if ($_GET["retry"] == true) { ?>
              <tr>
                <td valign="top" colspan="2">There was an error in the login.<br />
                 Either username or password was incorrect.<br />
                 Please re-enter the correct login information.</td>
              </tr>
              <?php } ?>
            </table>
          </form>
            </fieldset>
          <h4>Registration</h4>
          <p>In order to receive products from d20 Market Street, you must first
          create an account on our site</p>
          <form id="registerForm" action="registration.php" name="register"
                method="post" onsubmit="return processregisterform()">
            <fieldset>
              <legend>Public Details</legend> 
              <table summary="Public Details">
                <tr>
                  <td><label for="username">Username:</label></td>
                  <td><input id="username" type="text" name="username" size="40" /></td>
                </tr>
                <tr>
                  <td colspan="2"><label for="details">Set up a public
                  storefront?</label> <input id="storefront"
                  type="checkbox" name="storefront" value="yes" /></td>
                </tr>
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
              </table>
            </fieldset>
            <fieldset>
              <legend>Private Details (not displayed publicly)</legend> 
              <table summary="Private Details">
                  <div><p>Passwords must be between 8 and 20 characters 
                          and contain at least one number and letter</p></div>
                <tr>
                  <td><label for="password">Password</label></td>
                  <td><input id="password" type="password" name="password" size="40" /></td>
                </tr>
                <tr>
                  <td><label for="retype">Retype password</label></td>
                  <td><input id="retype" type="password" name="retype" size="40" /></td>
                </tr>
                <tr>
                  <td><label for="firstname">First name:</label></td>
                  <td><input id="firstname" type="text" name="firstname" size="40" /></td>
                </tr>
                <tr>
                  <td><label for="lastname">Last name:</label></td>
                  <td><input id="lastname" type="text" name="lastname" size="40" /></td>
                </tr>
                <tr>
                  <td><label for="middle">Middle initial:</label></td>
                  <td><input id="middle" type="text" name="middle" size="40" /></td>
                </tr>
                <tr valign="top">
                <td>Salutation:</td>
                <td><select id="salute" name="salute">
                  <option></option>
                  <option>Mrs.</option>
                  <option>Ms.</option>
                  <option>Mr.</option>
                  <option>Dr.</option>
                </select></td>
                </tr>
                <tr valign="top">
                <td>Gender:</td>
                <td><select id="gender" name="gender">
                  <option></option>
                  <option value="F">Female</option>
                  <option value="M">Male</option>
                  <option value="O">Other/Do not want to disclose</option>
                </select></td>
                </tr>
                <tr>
                  <td><label for="email">E-mail Address:</label></td>
                  <td><input id="email" type="text" name="email" size="40" /></td>
                </tr>
                <tr>
                  <td><label for="address">Street Address:</label></td>
                  <td><input id="address" type="text" name="address" size="40" /></td>
                </tr>
                <tr>
                  <td><label for="city">City:</label></td>
                  <td><input id="city" type="text" name="city" size="40" /></td>
                </tr>
                <tr>
                  <td><label for="state">State:</label></td>
                  <td>
                      <select id="state" name="state" >
                          <option selected="selected">...</option>
                          <option>Ohio</option>
                          <option>Other</option>
                      </select>
                  </td>
                </tr>
                <tr>
                    <td><label for="zip">Zip Code:</label></td>
                    <td><input id="zip" type="text" name="zip" size="40" /></td>
                </tr>
              </table>
            </fieldset>
            <span>
            <input type="submit" value="Register" />
            <input type="reset" value="Reset form" />
            </span>
          </form>
          <p>All private information is stored safely and privately on our
          secure servers. It is only accessible and modifiable by you. 
          (Security and safety to be implemented.)</p>
        </div>
      </div>
      <?php 
      include("common/footer.html")
      ?>
    </div>
  </body>
</html>
