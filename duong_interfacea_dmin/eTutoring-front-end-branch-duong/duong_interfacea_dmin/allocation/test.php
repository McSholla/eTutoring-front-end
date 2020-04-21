

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="addcss.css">
</head>
<body>

  <form action="/action_page.php" method="POST">
    <div class="container">
      <h1>Add an allocation</h1>
      <hr>
      <label>Select a student</label>
      <form method="POST" action="oong dien link controller vao day">
        <select id="student1" name="student1">
        </select>
        <select id="student2" name="student2">

        </select>
        <select id="student3" name="student3">

        </select>
      </form>
      <label>Select a tutor</label>
      <select name="tutorid" id="tutor">

      </select>
      <hr>
      <p>Back to home page <a href="../header.html">HOME</a>.</p>

      <button type="submit" class="addstudent">Add this allocatiton</button>
    </div>
  </form>

</body>
</html>
<script type="text/javascript">
  data = 
  {
    "allocations": [
    {
      "tutor": {
        "id": "20da5bd7-bdc7-4cfe-90a7-22f40a2ed2f7",
        "userName": "tutor1",
        "fullName": "Tutor 1",
        "gender": "male",
        "birthday": "11/12/2001",
        "email": "one@tutors.com"
      },
      "students": [
      {
        "id": "5132604e-7fe3-420b-804e-3901235f69ae",
        "userName": "student1",
        "fullName": "Student 1",
        "gender": "male",
        "birthday": "11/12/2001",
        "email": "one@students.com"
      }
      ]
    },
    {
      "tutor": {
        "id": "06d40375-034e-49a6-90a4-1352e9c24f45",
        "userName": "tutor2",
        "fullName": "Tutor 2",
        "gender": "male",
        "birthday": "11/12/2001",
        "email": "two@tutors.com"
      },
      "students": []
    },
    {
      "tutor": {
        "id": "fb894a01-d17d-421e-8ae8-cd75fd729c0e",
        "userName": "tutor3",
        "fullName": "Tutor 3",
        "gender": "male",
        "birthday": "11/12/2002",
        "email": "three@tutors.com"
      },
      "students": []
    }
    ],
    "unallocatedStudents": [
    {
      "id": "43eda304-2a13-49fb-bfcb-a38300ae8386",
      "userName": "student4",
      "fullName": "Student 4",
      "gender": "male",
      "birthday": "11/12/2003",
      "email": "three@students.com"
    },
    {
      "id": "46ef8833-b35c-4ae6-855f-742f00f3b2f6",
      "userName": "student3",
      "fullName": "Student 3",
      "gender": "male",
      "birthday": "11/12/2001",
      "email": "three@students.com"
    },
    {
      "id": "ba0a3b24-9ab0-442e-b889-3c3e9afcc1eb",
      "userName": "student2",
      "fullName": "Student 2",
      "gender": "male",
      "birthday": "11/12/2001",
      "email": "two@students.com"
    }
    ]
  }
  console.log(data);
  var studentselect1 = document.getElementById("student1");
  var studentselect2 = document.getElementById("student2");
  var studentselect3 = document.getElementById("student3");
  var tutor = document.getElementById("tutor");
  var studentid = [];
  var tutorid = [];
  for (var i = data.unallocatedStudents.length - 1; i >= 0; i--) {
    studentid.push(data.unallocatedStudents[i].id);
  }
  for (var i = studentid.length - 1; i >= 0; i--) {
    var option = document.createElement("option");
    option.text = studentid[i];
    studentselect1.appendChild(option);
  }
  for (var i = studentid.length - 1; i >= 0; i--) {
    var option = document.createElement("option");
    option.text = studentid[i];
    studentselect2.appendChild(option);
  }
  for (var i = studentid.length - 1; i >= 0; i--) {
    var option = document.createElement("option");
    option.text = studentid[i];
    studentselect3.appendChild(option);
  }
  for (var i = data.allocations.length - 1; i >= 0; i--) {
    tutorid.push(data.allocations[i].tutor.id);
  }
  for (var i = tutorid.length - 1; i >= 0; i--) {
    var option = document.createElement("option");
    option.text = tutorid[i];
    tutor.appendChild(option);
  }

</script>