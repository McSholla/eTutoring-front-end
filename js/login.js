let loggedIn = localStorage.getItem('loggedIn');
const token = localStorage.getItem('access_token');
const expiresIn = localStorage.getItem('expires_in');

if (!token || !expiresIn) {
  loggedIn = false;
} else if (new Date(expiresIn) <= new Date()) {
  logout();
} else {
  const remainingMilliseconds = new Date(expiresIn).getTime() - new Date().getTime();
  autoLogout(remainingMilliseconds);
}

if (loggedIn) {
  let element = document.getElementById('myBtn');
  element.innerText = 'Log Out';
  element.addEventListener('click', logout);
} else {
  document.querySelector('.header-down').innerHTML = '';
  document.getElementById('myBtn').innerText = 'Log In';
  document.getElementById('myBtn').addEventListener('click', openLoginModal);
}

$(document).ready(function(){    
    $("#fgBtn").click(function(){
    $("#fg-myModal").modal();
  });
});

function openLoginModal() {
   $("#myModal").modal();   
}

document.getElementById('lgn').addEventListener('click', async event => {
  event.preventDefault();
  const username = document.getElementById('usrname').value;
  const password = document.getElementById('psw').value;
  console.log('username', username);
  console.log('password', password);

  
  const loginResponse = await fetch('https://etutoring-project.azurewebsites.net/api/auth/login', 
          {
      method: 'POST', 
      body: `grant_type=password&username=${username}&password=${password}`});
  
  
  console.log(loginResponse);
  const decodedLoginResponse = await loginResponse.json();
  if (loginResponse.status !== 200) {
    alert(decodedLoginResponse.error_description);
  } else {
    document.getElementById('myBtn').innerText = 'Log Out';
    document.getElementById('myBtn').removeEventListener('click', openLoginModal);
    localStorage.setItem('loggedIn', 'true');
    localStorage.setItem('access_token', decodedLoginResponse.access_token);
    const remainingMilliseconds = 59 * 60 * 1000;
    const expiryDate = new Date(
      new Date().getTime() + remainingMilliseconds
    );
    localStorage.setItem('expires_in', expiryDate.toISOString());
    autoLogout(remainingMilliseconds);
    window.location = '/index.html';
  }
  console.log(decodedLoginResponse);
}); 

function autoLogout (milliseconds) {
  setTimeout(() => {
    logout();
  }, milliseconds);
};

function logout () {
  localStorage.removeItem('access_token');
  localStorage.removeItem('expires_in');
  window.location = '/index.html';
};
