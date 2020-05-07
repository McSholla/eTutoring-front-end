window.addEventListener('load', async () => {
    const studentsResponse = await fetch('https://etutoring-project.azurewebsites.net/api/dashboard/my-students', {
        headers: { Authorization: `Bearer ${token}` }
    });
    const studentsData = await studentsResponse.json();
    console.log(studentsData);
    for (let i = 0; i < studentsData.students.length; i++) {
        const postResponse = await fetch(`https://etutoring-project.azurewebsites.net/api/blog/all-posts?userId=${studentsData.students[i].id}`, {
            headers: {Authorization: `Bearer ${token}`}
        });
        const postData = await postResponse.json();
        console.log(postData);
        for (let j = 0; j < postData.posts.length; j++) {
        document.getElementById('issues').insertAdjacentHTML(
            'beforeend',
            `<div class="issue-info full" id="${postData.posts[j].id}" style="cursor: pointer;">
            <p>Title:${postData.posts[j].title}</p>
            <p>Author: ${postData.author.fullName}</p>
            <p>Description: ${postData.posts[j].content.length > 150 ? postData.posts[j].content.substring(0,150)+'...' : postData.posts[j].content}</p>
        </div>`
        );
        document.getElementById(`${postData.posts[j].id}`).addEventListener('click', () => {
            window.location.href = `./comment.html?postId=${postData.posts[j].id}`;
        });
        }
    }
});