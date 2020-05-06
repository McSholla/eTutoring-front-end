window.addEventListener('load', async () => {
    const response = await fetch(`https://etutoring-project.azurewebsites.net/api/list/students`, {
        method: 'GET',
        headers: {Authorization: `Bearer ${token}`}
    });
    const responseData = await response.json();
    document.getElementById('students-total-num').innerText = responseData.length;


    const responsestud = await fetch(`https://etutoring-project.azurewebsites.net/api/list/tutors`, {
        method: 'GET',
        headers: {Authorization: `Bearer ${token}`}
    });
    const responseDatastud = await responsestud.json();
    document.getElementById('tutors-total-num').innerText = responseData.length;
});