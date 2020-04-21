$(document).ready(function(){
    
    $("#fgBtn").click(function(){
    $("#fg-myModal").modal();
  });
});

const openModal = () => {
  $('#myModal').modal();
}

document.getElementById('myBtn').addEventListener('click', openModal);

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
  document.getElementById('myBtn').innerText = 'Log Out';
  document.getElementById('myBtn').removeEventListener('click', openModal);
  document.getElementById('myBtn').addEventListener('click', logout);
  if (document.getElementById('menu')) document.getElementById('menu').style.display = 'block';
} 


document.getElementById('lgn').addEventListener('click', async event => {
  event.preventDefault();
  const username = document.getElementById('usrname').value;
  const password = document.getElementById('psw').value;


  
  const loginResponse = await fetch('https://etutoring-project.azurewebsites.net/api/auth/login', 
          {
      method: 'POST', 
      body: `grant_type=password&username=${username}&password=${password}`});
  
  
  
  const decodedLoginResponse = await loginResponse.json();
  if (loginResponse.status !== 200) {
    alert(decodedLoginResponse.error_description);
  } else {
    localStorage.setItem('loggedIn', 'true');
    localStorage.setItem('access_token', decodedLoginResponse.access_token);
    const remainingMilliseconds = 59 * 60 * 1000;
    const expiryDate = new Date(
      new Date().getTime() + remainingMilliseconds
    );
    localStorage.setItem('expires_in', expiryDate.toISOString());
    autoLogout(remainingMilliseconds);
    window.location = 'index.html';
  }
 
}); 

function autoLogout (milliseconds) {
  setTimeout(() => {
    logout();
  }, milliseconds);
};


function logout () {
  localStorage.removeItem('access_token');
  localStorage.removeItem('expires_in');
  window.location = 'index.html';
};
