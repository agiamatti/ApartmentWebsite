<?php
//header
$page_title="Welcome to AG!";
require("pageHeader.php");
?>

<h3>
  Welcome to AG ApartmentSearch!
</h3>
  <br/>
  <h4>
    Where we help you find the perfect apartment for you!
  </h4>


<br/>
<p>
  <input type="button" value="Search for your perfect apartment now!" onclick="document.location.href='ApartmentSearch.php'"/>
  <br/>
  <br/>

  <?php
  if (isset($_SESSION['login_user'])){
    echo $_SESSION['login_user'], ", you are logged in and able to access all member benefits!";
  }
  else{
    print "<input type=\"button\" value=\"Log in or Sign up to access full member benefits!\" onclick=\"document.location.href='login.php'\"/>";
  }

?>

<?php
//page footer
require("pageFooter.php");
?>
