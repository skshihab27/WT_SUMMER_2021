<?php

session_start(); 
include "..\control\SearchUser.php";
include('../control/updatecheck.php');



if(empty($_SESSION["username"])) // Destroying All Sessions
{
header("Location: ../control/login.php"); // Redirecting To Home Page
}

?>




<!DOCTYPE html>
<html>
<body>


<h2>Profile Page</h2>

<br><br>
<?php
$User="";
$username="";
$radio1=$radio2=$radio3=$password=$address=$dob=$Prof1=$Prof2=$Prof3=$Prof4=$I1=$I2=$I3="";
$firstname=$email="";
$connection = new db();
$conobj=$connection->OpenCon();
//

//$searchQuery=$connection->searc
if(isset($_POST['Search']))
{
  $User=$_REQUEST['username'];
  $userQuery=$connection->Search($conobj,"student",$User);

if ($userQuery->num_rows > 0) {

    // output data of each row
    while($row = $userQuery->fetch_assoc()) {
      $firstname=$row["firstname"];
      $password=$row["password"];
      $address=$row["address"];
      $username=$row["username"];
      $email=$row["email"];
      $dob=$row["dob"];
     
      if(  $row["gender"]=="female" )
      { $radio1="checked"; }
      else if($row["gender"]=="male")
      { $radio2="checked"; }
      else{$radio3="checked";}

      if($row["profession"]=="Academician")
      {
        $Prof1="selected";
      }
      if($row["profession"]=="student")
      {
        $Prof2="selected";
      }
      if($row["profession"]=="Business")
      {
        $Prof3="selected";
      }
      if($row["profession"]=="Stuff")
      {
        $Prof4="selected";
      }

      if($row["interests"]=="music")
      {
        $I1="checked";
      }
      if($row["interests"]=="sports")
      {
        $I2="checked";
      }
      if($row["interests"]=="reading")
      {
        $I3="checked";
      }
    $dob=$row["dob"];


  } 
}
  else {
    echo "0 results";
  }
}
