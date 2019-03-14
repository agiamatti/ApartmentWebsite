<?php
//header
$page_title="Login";
require("pageHeader.php");
?>

<h3>
  Account Login Page
</h3>
<br/>



<form class="loginInfo" action="/login.php" method="POST">
  <table>
    <tr>
      <td>
        Username:
      </td>
      <td>
        <input type="text" name="username" size= "30"  placeholder="Enter Username" required>
      </td>
    </tr>
    <tr>
      <td>
        Password:
      </td>
      <td>
        <input type="password" name="password" size="30" placeholder="Enter Password" required>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <br/>
        <button type="submit">Login</button>
      </td>
    </tr>
  </table>
</form>

<p>
  A valid username can only contain letters (uppercase and lowercase) and digits.
  <br/>
  A valid password must be at least 4 characters long, and contain at least one digit and one letter.
</p>

<?php
$validUN = false;
$validPass = false;

if (isset($_POST['username'])){

  if (strlen($_POST['username']) > 0 && preg_match('/\W/', $_POST['username']) == 0){
    $username = $_POST['username'];
    $validUN = true;
  }
  else if (strlen($_POST['username']) >= 1){
    print "<br/> <p> Invalid username, please make sure the format is appropriate </p> <br/>";
  }
  else{
  }

  if (strlen($_POST['password']) > 3 && preg_match('/\d/', $_POST['password']) > 0 && preg_match('/\w/', $_POST['password']) > 0){
    $password = $_POST['password'];
    $validPass = true;
  }
  else if (strlen($_POST['password']) >= 1){
    print "<br/> <p> Invalid password, please make sure the format is appropriate </p> <br/>";
  }
  else{
  }

  $usersList = file ('passwords.txt');

  $successUSN = false;
  $successpass = false;

  foreach ($usersList as $user) {
      $userCredentials = explode(':', $user);
      if (strcmp($userCredentials[0], $username) == 0){
          $successUSN = true;
          if (strcmp($userCredentials[1], $password) == 0) {
            $successpass = true;
            break;
          }
        }
  }

  if ($successUSN && $successpass) {
      $_SESSION['login_user']= $username;
      echo "<script> window.location.assign('loginSuccess.php'); </script>";
  }

  else if ($successUSN && $validUN == true && $validPass == true) {
      print "<br/> <p> Invalid login, please re-enter your password </p> <br/>";
  }

  else if ($validUN == true && $validPass == true) {
    file_put_contents('passwords.txt', "$username".":"."$password".":", FILE_APPEND);
    $_SESSION['login_user']= $username;
    echo "<script> window.location.assign('accountCreated.php'); </script>";
  }

}


?>

<?php
//page footer
require("pageFooter.php");
?>
