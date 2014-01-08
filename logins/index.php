<?php
//Always place this code at the top of the Page
session_start();
if (isset($_SESSION['id'])) {
    // Redirection to login page twitter or facebook
    header("location: home.php");
}

if (array_key_exists("login", $_GET)) {
    $oauth_provider = $_GET['oauth_provider'];
    if ($oauth_provider == 'twitter') {
        header("Location: login-twitter.php");
    } else if ($oauth_provider == 'facebook') {
        header("Location: login-facebook.php");
    }
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/signup.css" />
</head>
<body>
<style type="text/css">
    #buttons
	{
	text-align:center
	}
    #buttons img,
    #buttons a img
    { border: none;}
	h1
	{
	font-family:Arial, Helvetica, sans-serif;
	color:#999999;
	}
	
</style>


<div class="sign-up">
<div id="buttons">
    <a class="fb-login oauth-button" href="?login&oauth_provider=twitter"><img src="../images/sign-in-with-twitter-gray.png"></a>
    <a class="twitter-login oauth-button" href="?login&oauth_provider=facebook"><img src="../images/active_404.png"></a>
</div>
<span class="register">Create an Account</span>
<form class="sign-up-register">
    <span class="sign-up-username">Username:</span>
    <input type="text" name="username" placeholder="username">
    <span class="sign-up-password">Password:</span>
    <input type="password" placeholder="password" name="pass">
    <span class"sign-up-email">Email:</span>
    <input type="email" placeholder="myEmail@gmail.com" name="email">
    <input id="sign-up-submit"type="submit"> 
</form>
</div>

</body>
</html>