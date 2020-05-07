window.addEventListener('load', async () => {
    document.getElementById('add-user-btn').addEventListener('click', async event => {
        event.preventDefault();
        const username = document.getElementById('uname').value;
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const gen = document.getElementById('gen').value;
        const dob = document.getElementById('dob').value;
        const pwd = document.getElementById('pwd').value;
        const repPwd = document.getElementById('rep-pwd').value;
        const role = document.getElementById('role').value;
        const data = new FormData();
        data.append('username', username);
        data.append('fullname', name);
        data.append('email', email);
        data.append('password', pwd);
        data.append('confirmpassword', repPwd);
        data.append('role', role);
        data.append('gender', gen);
        data.append('birthday', dob);
        const createUserResponse = await fetch(`https://etutoring-project.azurewebsites.net/api/auth/register`, {
            method: 'POST',
            headers: { Authorization: `Bearer ${token}` },
            body: data
        });
        const createUserData = await createUserResponse.json();
        alert(createUserData.message);
        document.getElementById('uname').value = '';
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('gen').value = '';
        document.getElementById('dob').value = '';
        document.getElementById('pwd').value = '';
        document.getElementById('rep-pwd').value = '';
        document.getElementById('role').value = '';
    });
});