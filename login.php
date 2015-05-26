<?php 
  session_start();
  
  if (isset($_POST['name']) && isset($_POST['password'])) {
  $db = mysqli_connect('localhost', 'root', '', 'php');
  $sql = sprintf("SELECT * FROM users WHERE name='%s'",
    mysqli_real_escape_string($db, $_POST['name']);
  );
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);
  
  if($row) {
    $hash = $row['password'];
    $isAdmin = $row['isAdmin'];
    
    if(password_verify($_POST['password'], $hash)) {
      $message = 'Login successful';
      
      $_SESSION['user'] = $row['name'];
      $_SESSION['isAdmin'] = $isAdmin;
    }
    else {
      $message = 'login failed';
    }
    
  }
  else {
    $message = 'Login failed';
  }
  mysqli_close($db);
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php 
  readfile('navigation.html');
  echo "<p>$message</p>"
?>
<form method="post" action="">
  Username<input type="text" name="name"><br>
  Password<input type="password" name="password"><br>
  <input type="submit" value="login">
  </form>
</body>
</html>
