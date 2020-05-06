$(document).ready(function(){
    
    $("#fgBtn").click(function(){
    $("#fg-myModal").modal();
  });
});



const openModal = () => {
  $('#myModal').modal();
}

if (document.getElementById('myBtn')) document.getElementById('myBtn').addEventListener('click', openModal);

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

const configureDashboard = async () => {
  const response = await fetch('https://etutoring-project.azurewebsites.net/api/auth/personal-info', {
        headers: { Authorization: `Bearer ${token}` }
      });
      const data = await response.json();
  if (data.role === 'tutor') {
    document.getElementById('dash-menu').setAttribute('href', 'tut_dash.html');
  } else if (data.role === 'student') {
    document.getElementById('dash-menu').setAttribute('href', 'stud_dash.html');
  } else {
    if (document.getElementById('dash-menu')) {
    document.getElementById('dash-menu').setAttribute('href', 'staff_dash.html');
    }
  }
}

if (loggedIn) {
  if (document.getElementById('myBtn')) {
  document.getElementById('myBtn').innerText = 'Log Out';
  document.getElementById('myBtn').removeEventListener('click', openModal);
  document.getElementById('myBtn').addEventListener('click', logout);
  configureDashboard();
  }

  if (document.getElementById('menu')) document.getElementById('menu').style.display = 'block';
} 

if (document.getElementById('lgn')) {
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
}

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
