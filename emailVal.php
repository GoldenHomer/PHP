// This file has nothing to do with the other files. I just wanted to file it under this repo.

<?php
  $email = "john.doe@example.com"; // Take student email value.
  
  // Remove all illegal characters from email
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  
  // Then validate it.
  if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo("$email is a valid email address");
  } 
  
  else {
    echo("$email is not a valid email address");
  }
?>
