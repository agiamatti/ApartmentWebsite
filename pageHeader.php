<?php
session_start();
?>

<!DOCTYPE html>

<!--
// Page header for Apartment website
// By Alan Giamatti
// For SOEN 287 - WInter 2017
// Assignment 4 - Excersize 4
-->

<html lang="en">

<head>
  <meta charset="utf-8" />
    <title><?php echo $page_title;?></title>
    <link rel="stylesheet" type="text/css" href="ApartmentSearch.css" />
    <script type="text/javaScript" src="ApartmentSearch.js"></script>
    <script type="text/javaScript" src="clock.js"></script>
    <script type="text/javaScript" src="accountManagement.js"></script>
</head>

<body>
    <table>
      <tr>
        <td class= "login" colspan=2>
          <div class="login" id="accountLogin"> </div>
          <?php
          if (isset($_SESSION['login_user'])){
            echo "Welcome: ", $_SESSION['login_user'], "! &nbsp; &nbsp;";
            print "<input type=\"button\" value=\"Log out\" onclick=\"document.location.href='logout.php'\"/>";
          }
          else{
            print "<input type=\"button\" value=\"Login\" onclick=\"document.location.href='login.php'\"/>";
          }
          ?>
        </td>
      </tr>
        <tr>
            <td>
                <a href="index.php"><img src="http://www.apartmentguide.com/blog/wp-content/uploads/2013/05/long-distance-sergign-original.jpg" alt="Canada" width="300" height="150" /></a>
            </td>
            <td>
                <h1>
                    AG ApartmentSearch
                </h1>
            </td>
        </tr>
        <tr>
          <td colspan=2 class="time" id="timeInput">
          </td>
        </tr>
    </table>
