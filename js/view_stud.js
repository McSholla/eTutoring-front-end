window.addEventListener('load', async () => {
    const studentsResponse = await fetch('https://etutoring-project.azurewebsites.net/api/list/students', {
        headers: { Authorization: `Bearer ${token}` }
    });
    const studentsData = await studentsResponse.json();
    console.log(studentsData);
    for (let i = 0; i < studentsData.length; i++) {
        document.getElementById('tutors-list').insertAdjacentHTML(
            'beforeend',
            `<tr>
            <td>${studentsData[i].userName}</td>
            <td>${studentsData[i].fullName}</td>
            <td>${studentsData[i].gender}</td>
            <td>${studentsData[i].birthday}</td>
            <td>${studentsData[i].email}</td>
            <td>${studentsData[i].tutor ? studentsData[i].tutor.fullName : "Not Assigned"}</td>
            </tr>`
        );
    }
});