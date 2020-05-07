window.addEventListener('load', async () => {
    const tutorsResponse = await fetch('https://etutoring-project.azurewebsites.net/api/list/tutors', {
        headers: { Authorization: `Bearer ${token}` }
    });
    const tutorsData = await tutorsResponse.json();
    console.log(tutorsData);
    for (let i = 0; i < tutorsData.length; i++) {
        document.getElementById('tutors-list').insertAdjacentHTML(
            'beforeend',
            `<tr>
            <td>${tutorsData[i].userName}</td>
            <td>${tutorsData[i].fullName}</td>
            <td>${tutorsData[i].gender}</td>
            <td>${tutorsData[i].birthday}</td>
            <td>${tutorsData[i].email}</td>
            </tr>`
        );
    }
});