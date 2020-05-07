window.addEventListener('load', async () => {
    const studentsResponse = await fetch('https://etutoring-project.azurewebsites.net/api/allocation/unallocated-students', {
        headers: { Authorization: `Bearer ${token}` }
    });
    const studentsData = await studentsResponse.json();
    console.log(studentsData);
    for (let i = 0; i < studentsData.length; i++) {
        document.getElementById('unalloc-stud-list').insertAdjacentHTML(
            'beforeend',
            `<div class="checkbox">
            <label>${studentsData[i].fullName}<input type="checkbox" name="students" value="${studentsData[i].id}"></label>
          </div>`
        );
    }
    let selectedStudents = [];
    Array.prototype.filter.call(document.querySelectorAll('[name="students"]'), student => {
        student.addEventListener('change', event => {
            if (event.target.checked) {
                selectedStudents.push(event.target.value);
            } else {
                selectedStudents = selectedStudents.filter(el => el !== event.target.value);
            }
        });
    });
    document.getElementById('allc_final').addEventListener('click', async () => {
        if (selectedStudents.length < 1) {
            alert('You have to select a student');
        } else {
            const tutorId = window.location.href.split('=')[1];
            const data = new FormData();
            data.append('tutorid', tutorId);
            for (let i = 0; i < selectedStudents.length; i++) {
                data.append('studentIds[]', selectedStudents);
            }
            const allocateResponse = await fetch(`https://etutoring-project.azurewebsites.net/api/allocation/add`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', Authorization: `Bearer ${token}`},
                body: JSON.stringify({
                    tutorid:tutorId,
                    studentIds: selectedStudents
                })
            });
            const allocateResponseData = await allocateResponse.json();
            console.log(allocateResponseData);
        }
    });
});