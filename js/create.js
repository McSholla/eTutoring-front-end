window.addEventListener('load', async () => {
    document.getElementById('create-issue-btn').addEventListener('click', async event => {
        event.preventDefault();
        const title = document.getElementById('issue-title').value;
        const content = document.getElementById('issue-desc').value;
        const createBlogRes = await fetch(`https://etutoring-project.azurewebsites.net/api/blog/new-post`, {
            method: 'POST',
            headers: {
                Authorization: `Bearer ${token}`,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ title, content })
        });
        const createBlogData = await createBlogRes.json();
        console.log(createBlogData);
    });
});