<?php
//header
$page_title="Search Results";
require("pageHeader.php");
?>

<h3>Apartment Search Results</h3>

<?php
  // quantity of people living and smoker search
  if (isset($_POST['Quantity'])) {
    $quantityDesired = $_POST['Quantity'];
  }
  if (isset($_POST['Smoker'])) {
    $smokerDesired = $_POST['Smoker'];
  }

  // fetching pet preference
  if (isset($_POST['Pets'])) {
    $noPet = false;
    foreach ($_POST['Pets'] as $pets) {
      if($pets == "None"){
        $noPet = true;
      }
    }
    if (!isset($_POST['Pets']) || $noPet){
      $petsDesired = 'no';
    }
    else{
      $petsDesired = 'yes';
    }
  }



  // these are here to check if the listing is set or not
  if (isset($_POST['Size'])) {
    $sizeDesired = $_POST['Size'];
  }
  if (isset($_POST['Location'])) {
    $locationDesired = $_POST['Location'];
  }
  if (isset($_POST['PriceRange'])) {
    $priceDesired = $_POST['PriceRange'];
  }
  if (isset($_POST['Feature'])) {
    $featureDesired = $_POST['Feature'];
  }

  $resultCount = 0;

  //checking if the listings in database match the searched valies
  $quantityCheck = false;
  $smokerCheck = false;
  $petsCheck = false;
  $sizeCheck = false;
  $locationCheck = false;
  $priceCheck = false;
  $featuresCheck = false;

  print "<table class=\"SearchTable\"> <tr> <th class=\"address\"> Address </th> <th> Max People</th> <th class=\"smoking\"> Smoking? </th>
                      <th>Pets allowed? </th> <th> Size </th> <th class=\"location\"> Location </th> <th> Price </th> <th class=\"features\"> Features </th> </tr>";

  $aptDatabase = file ('database.txt');

  foreach ($aptDatabase as $listing) {

    // ignores database entries with '//'
      if (preg_match ('/\/\//', $listing) == 1){
      }

      if(preg_match ('/\/\//', $listing) == 0){
      $listingDetails = explode(':', $listing);
      }

      if (empty($quantityDesired)){
          $quantityCheck = true;

          if(empty($listingDetails[1])){
            $quantityCheck = false;
          }
      }

      if (empty($smokerDesired)){
          $smokerCheck = true;
      }

      if (empty($petsDesired)){
          $petsCheck = true;
      }

      if (empty($sizeDesired)){
          $sizeCheck = true;
      }

      if (empty($locationDesired)){
          $locationCheck = true;
      }

      if (intval($priceDesired) == 10000){
          $priceCheck = true;
      }

      if (empty($featureDesired)){
          $featuresCheck = true;
      }

      if (!empty($listingDetails[1])){
        if($listingDetails[1] >= $quantityDesired){
          $quantityCheck = true;
        }
      }

      if ($smokerCheck == false && isset($listingDetails[2])){
        if ($smokerDesired == 'no'){
          $smokerCheck = true;
        }
        else if($listingDetails[2] == 'yes'){
            $smokerCheck = true;
          }
      }

      if ($petsCheck == false && isset($listingDetails[3])){
        if ($petsDesired == 'no'){
          $petsCheck = true;
        }
        else if ($listingDetails[3] == 'yes'){
          $petsCheck = true;
        }
      }

      if ($sizeCheck == false && isset($listingDetails[4])){
        foreach ($_POST['Size'] as $size) {
          if ($listingDetails[4] == $size){
            $sizeCheck = true;
          }
        }
      }

      if ($locationCheck == false && isset($listingDetails[5])){
        foreach ($_POST['Location'] as $location) {
          if ($listingDetails[5] == $location){
            $locationCheck = true;
          }
          if ($location == 'No opinion'){
            $locationCheck = true;
          }
        }
      }

      if ($priceCheck == false && isset($listingDetails[6])){
        $low;
        $high;

        if($priceDesired == "400"){
          $low = 0;
          $high = 499;
        }
        if($priceDesired == "800"){
          $low = 500;
          $high = 999;
        }
        if($priceDesired == "1500"){
          $low = 1000;
          $high = 1999;
        }
        if($priceDesired == "2500"){
          $low = 2000;
          $high = 10000;
        }
        if($priceDesired == "10000"){
          $low = 0;
          $high = 10000;
        }
        if($low <= $listingDetails[6] && $listingDetails[6] <= $high){
          $priceCheck = true;
        }
      }

      if ($featuresCheck == false && isset($listingDetails[7])){
        $aptFeatures = explode(', ', $listingDetails[7]);
        foreach ($_POST['Feature'] as $featureDemanded) {
          foreach ($aptFeatures as $featurePresent) {
            if ($featurePresent == $featureDemanded) {
              $featuresCheck = true;
            }
          }
        }
      }

      if($quantityCheck == true && $smokerCheck == true && $petsCheck == true && $sizeCheck == true && $locationCheck == true && $priceCheck == true && $featuresCheck == true){
        if (isset($_SESSION['login_user'])){
          $resultCount++;
          print "<tr> <td class=\"address\"> $listingDetails[0] </td> <td> $listingDetails[1] </td> <td> $listingDetails[2] </td>
                  <td>$listingDetails[3]</td> <td> $listingDetails[4] </td> <td class=\"location\"> $listingDetails[5] </td> <td> $listingDetails[6] </td> <td> $listingDetails[7] </td> </tr>";
        }
        else{
          $resultCount++;
          print "<tr> <td> * </td> <td> $listingDetails[1] </td> <td> $listingDetails[2] </td>
                  <td>$listingDetails[3]</td> <td> $listingDetails[4] </td> <td class=\"location\"> $listingDetails[5] </td> <td> $listingDetails[6] </td> <td> $listingDetails[7] </td> </tr>";
        }
      }

      //reset search parameters
      $quantityCheck = false;
      $smokerCheck = false;
      $petsCheck = false;
      $sizeCheck = false;
      $locationCheck = false;
      $priceCheck = false;
      $featuresCheck = false;
  }

  //Search result count at the end of the table
  if($resultCount == 0){
    print "</table> <br/> <p> <strong>$resultCount search results found!</strong> <br/>";
    print "Please try again with different search parameters.<br/>";
  }
  else if($resultCount == 1){
    print "</table> <br/> <p> <strong>$resultCount search result found!</strong> <br/>";
  }
  else{
    print "</table> <br/> <p> <strong>$resultCount search results found!</strong> <br/>";
  }

  if (isset($_SESSION['login_user'])){
    // print "<p> Thank you for signing in! </p>";
  }
  else{
    print "<p> <input type=\"button\" value=\"Login to view addresses\" onclick=\"document.location.href='login.php'\"/>";
  }

?>
<br/>
<br/>
<input type="button" value="Make a new Apartment Search" onclick="document.location.href='ApartmentSearch.php'"/>

<?php
//page footer
require("pageFooter.php");
?>
