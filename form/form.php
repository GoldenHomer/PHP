<?php
$errors = array();
$missing = array();
if (isset($_POST['send'])) {
	$to = 'david@example.com';
	$subject = 'Feedback from contact form';
	$expected = array('name', 'email', 'comments');
	$required = array('name', 'comments');
	$headers = "From: webmaster@example.com";
	$headers .= "Content-type: text/plain; charset=utf-8";
	$authenticate = '-fme@example.com';
	require './includes/mail_process.php';
	
	if($mailSent){
		header('Location: thanks.php');
		exit;
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact Us</title>
	<link href="../styles.css" rel="stylesheet" type="text/css">
</head>
	
<body>
	<h1>Contact Us</h1>
	<?php if(($_POST && $suspect) || ($_POST && isset($errors['mailfail']))) {?>
	<p class="warning">Sorry, your mail could not be sent.</p>
	<?php } elseif ($errors || $missing) { ?>
	<p class="warning">Please fix the item(s) indicated.</p>
	<?php }?>
	<form name="contact" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	    <p>
	        <label for="name">Name:
	        <?php if ($missing && in_array('name', $missing)) { ?>
	        <span class="warning">Please enter your name</span>
	        <?php } ?>
	        </label>
	        <input type="text" name="name" id="name">
	    </p>
	    <p>
	        <label for="email">Email:
	        <?php if ($missing && in_array('email', $missing)) { ?>
	        <span class="warning">Enter your email address</span>
	        <?php } ?>
	        </label>
	        <input type="text" name="email" id="email">
	    </p>
	    <p>
	        <label for="comments">Comments:
	        <?php if ($missing && in_array('comments', $missing)) { ?>
	        <span class="warning">You forgot to add your comments</span>
	        <?php } ?>
	        </label>
	        <textarea name="comments" id="comments"></textarea>
	    </p>
	    <p>
	        <input type="submit" name="send" id="send" value="Send Comments">
	    </p>
	</form>
</body>
</html>
