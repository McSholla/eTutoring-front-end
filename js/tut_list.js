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
                <td>${tutorsData[i].gender}</td>
                <td>${tutorsData[i].email}</td>
                <td><a id="alloc_but" href="allct_list.html?tutorId=${tutorsData[i].id}">Allocate students</a></td>   
            </tr>`
        );
    }
});