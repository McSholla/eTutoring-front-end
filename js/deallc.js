window.addEventListener('load', async () => {
    const studentsResponse = await fetch('https://etutoring-project.azurewebsites.net/api/allocation/view-allocations', {
        headers: { Authorization: `Bearer ${token}` }
    });
    const studentsData = await studentsResponse.json();
    console.log(studentsData);
    for (let i = 0; i < studentsData.length; i++) {
        for (let j = 0; j < studentsData[i].students.length; j++) {
        document.getElementById('student-list').insertAdjacentHTML(
            'beforeend',
            `<tr>
                <td>${studentsData[i].students[j].userName}</td>
                <td>${studentsData[i].students[j].fullName}</td>
                <td>${studentsData[i].students[j].gender}</td>
                <td>${studentsData[i].students[j].birthday}</td>
                <td>${studentsData[i].students[j].email}</td>
                <td><a id="dealloc_but_${studentsData[i].students[j].id}">Deallocate students</a></td> 
            </tr>`
        );
        document.getElementById(`dealloc_but_${studentsData[i].students[j].id}`).addEventListener('click', async () => {
            const selectedStudents = [studentsData[i].students[j].id];
            const deallocateRes = await fetch(`https://etutoring-project.azurewebsites.net/api/allocation/delete`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Authorization: `Bearer ${token}`
                },
                body: JSON.stringify({
                    studentIds: selectedStudents
                })
            });
            const deallocateData = await deallocateRes.json();
            alert(deallocateData.message);
            
        });
    }}
});