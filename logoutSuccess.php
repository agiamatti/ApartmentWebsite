<?php
//header
$page_title="Logout";
require("pageHeader.php");
?>

<h3>
  You have been successfully logged out!
</h3>

<p>
  Remember you need to be logged in to view the address of search results!
  <br/>
  <br/>
  <input type="button" value="Login" onclick="document.location.href='login.php'"/>
  <br/>
  <br/>
  <br/>
  <input type="button" value="Make a new Apartment Search" onclick="document.location.href='ApartmentSearch.php'"/>
</p>

<?php
//page footer
require("pageFooter.php");
?>
