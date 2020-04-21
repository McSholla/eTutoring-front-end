window.addEventListener('load', async () => {
    const studentsResponse = await fetch('https://etutoring-project.azurewebsites.net/api/dashboard/my-students', {
        headers: { Authorization: `Bearer ${token}` }
    });
    const studentsData = await studentsResponse.json();
    console.log(studentsData);
    for (let i = 0; i < studentsData.students.length; i++) {
        document.getElementById('student-list').insertAdjacentHTML(
            'beforeend',
            `<tr>
                <td>${studentsData.students[i].userName}</td>
                <td>${studentsData.students[i].fullName}</td>
                <td>${studentsData.students[i].gender}</td>
                <td>${studentsData.students[i].birthday}</td>
                <td>${studentsData.students[i].email}</td>
            </tr>`
        );
    }
});