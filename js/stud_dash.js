window.addEventListener('load', async () => {
    const response = await fetch('https://etutoring-project.azurewebsites.net/api/auth/personal-info', {
        headers: { Authorization: `Bearer ${token}` }
      });
      const data = await response.json();
      const userId = data.id;
      if (data.role === 'tutor') {
          const submissionResponse = await fetch(`https://etutoring-project.azurewebsites.net/api/dashboard/student-overview`, {
              headers: { Authorization: `Bearer ${token}` }
          });
          const submissionData = await submissionResponse.json();
          document.getElementById('submission-num').innerText = submissionData.numberOfFiles;
          document.getElementById('students-num').innerText = submissionData.numberOfStudents;
      } else if (data.role === 'student') {
          document.getElementById('students-list').style.display = 'none';
      const submissionResponse = await fetch(`https://etutoring-project.azurewebsites.net/api/files/all-files?userId=${userId}`, {
          headers: {
              Authorization: `Bearer ${token}`
          }
      });
      const submissionData = await submissionResponse.json();
      document.getElementById('submission-num').innerText = submissionData.files.length;
    }
});

