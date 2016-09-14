<!-- logomenu.html -->

<div id="mainMenu" onmouseout="hideAll()">
    <div id="logo" onmouseover="show('m1')">
        <a href="index.php">
            <img  src="images/logo.png" alt="d20 Market Street"
                  height="165" width="500"/>
        </a>
        <ul class="Links">
            <li onmouseover="show('m1')"><div id="m1">
                <a href="physical.php" onmouseover="showsub('m2')" >Physical products</a>
                <a href="digital.php" onmouseover="showsub('m3')" >Digital products</a>
                <a href="both.php" onmouseover="showsub('m4')" >Combination products</a>
            </div></li>
        </ul>
    </div>
    <div id="holder" onmouseover="show('m1')">
    <ul class="Sublinks">
        <li onmouseover="showsub('m2')"><div id="m2">
                <a href="dice.php">Dice</a>
                <a href="models.php">Models</a>
                <a href="props.php">Props</a>
    </ul>
    <ul class="Sublinks">
        <li onmouseover="showsub('m3')"><div id="m3">
                <a href="characters.php">Characters</a>
                <a href="homebrew.php">Homebrew rules</a>
                <a href="scenarios.php">Scenarios</a>
    </ul>
    <ul class="Sublinks">
        <li onmouseover="showsub('m4')"><div id="m4">
                <a href="characterart.php">Character art</a>
                <a href="worldart.php">World art</a>
                <a href="maps.php">Maps</a>
    </ul>
    </div>
      <!-- register -->
    <div id="dateandtime">
        <?php
  //Please make sure that you have called session_start()
  //at the beginning of the file that includes this script.
  error_reporting(error_reporting() & ~E_NOTICE );
  $salutation = $_SESSION["salutation"];
  $customer_first_name = $_SESSION["customer_first_name"];
  $customer_middle_initial = $_SESSION["customer_middle_initial"];
  $customer_last_name = $_SESSION["customer_last_name"];
  $customer_id = $_SESSION["customer_id"];
  if ($nodisplay != true)
  {
      if ($customer_id == "")
      {
          echo "<h5>Welcome!<br />".$_SESSION["customer_id"];
          echo "It's ".date("l, F jS").".<br />";
          echo "Our time is ".date('g:ia').".</h5>";
          echo "<div id=\"register\"><a href=\"register.php\">Register/Login</a></div>";
      }
      else
      {
          echo "<h5>Welcome, " . $customer_first_name . "!<br />";
          echo  $salutation . " " .
          $customer_first_name . " " .
          $customer_middle_initial . " " .
          $customer_last_name . "<br/>";
          echo "It's ".date("l, F jS").".<br />";
          echo "Our time is ".date('g:ia').".</h5>";
          echo "<div id=\"cart\"><a href=\"purchase.php?prod=view\">View your shopping cart</a></div><div class='spacing'></div>";
          echo "<div id=\"register\"><a href=\"logout.php\">Logout</a></div>";
          if($_SESSION["store_id"] != ""){
            echo "<div id=\"register\"><a href=\"manage.php\">Manage your store</a></div>";
          }
          else{
              echo "<div id=\"register\"><a href=\"create.php\">Create your store</a></div>";
          }
      }
  }
  ?>
    </div>
</div>