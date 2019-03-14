<!--
// Page footer for Apartment website
-->
<br/>
<br/>
<footer>
  <table class="footer">
    <tr>
      <td>
        <a href = "index.php">Main Page</a>
      </td>
      <td>
        <a href = "ApartmentSearch.php">Apartment Search</a>
      </td>
      <td>
        <a href = <?php
                  if (isset($_SESSION['login_user'])){
                    print "\"loginSuccess.php\"";
                  }
                  else{
                    print "\"login.php\"";
                  }
                                          ?>> Account Page</a>
      </td>
      <td>
        <a href = "privacy.php">Privacy/Disclaimer Statement</a>
      </td>
      <td>
        <a href = "sources.php">Sources</a>
      </td>
      <td>
      &copy;Alan Giamatti 2017
      </td>
  </table>
</footer>

</body>
</html>
