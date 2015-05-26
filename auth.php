<?php 
  session_start();
  if(isset(!$_SESSION['isAdmin']) || !$_SESSION['isAdmin']) { // if user is not loggedin or isAdmin is false...
    header("Location: login.php");
  }
?>
