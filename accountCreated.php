<?php
//header
$page_title="Account menu";
require("pageHeader.php");
?>

<?php
  echo "<h3> Welcome new user ", $_SESSION['login_user'], "!</h3> <p> You are now registered and logged in. <br/>";
  print "<br/> <input type=\"button\" value=\"Log out\" onclick=\"document.location.href='logout.php'\"/> </p> <br/>";
?>
<p>
  <input type="button" value="Continue your apartment Search" onclick="document.location.href='ApartmentSearch.php'"/>
</p>
<?php
//page footer
require("pageFooter.php");
?>
