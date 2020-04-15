

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
  [
  {
    "tutor" : {
      "id" : "1234",
      "username" : "tutor1",
      "fullname" : "bro",
      "gender" : "male",
      "birthdat" : "1234",
      "email" : "one@gmail.com"
    },
    "student" :
    [
    {
      "id" : "1234",
      "username" : "student1",
      "fullname" : "student 1",
      "gender" : "male",
      "birthday" : "1234",
      "email" : "3@gmail.com"
    },
    {
      "id" : "12432",
      "username" : "432432",
      "fullname" : "432432 1",
      "gender" : "female",
      "birthday" : "1234",
      "email" : "3@gmail.com"
    }
    ]
  },
  {
    "tutor" : {
      "id" : "435",
      "username" : "tutor1",
      "fullname" : "bro",
      "gender" : "male",
      "birthdat" : "1234",
      "email" : "one@gmail.com"
    },
    "student" :
    [
    {
      "id" : "1234",
      "username" : "student1",
      "fullname" : "student 1",
      "gender" : "male",
      "birthday" : "1234",
      "email" : "3@gmail.com"
    },
    {
      "id" : "12432",
      "username" : "432432",
      "fullname" : "432432 1",
      "gender" : "female",
      "birthday" : "1234",
      "email" : "3@gmail.com"
    }
    ]
  }
  ]
  var studentselect1 = document.getElementById("student1");
  var studentselect2 = document.getElementById("student2");
  var studentselect3 = document.getElementById("student3");
  var tutor = document.getElementById("tutor");
  var studentid = [];
  var tutorid = [];
  console.log(tutorid);
  for (var i = data.length - 1; i >= 0; i--) 
  {
    for (var j = data.length - 1; j >= 0; j--) {
     studentid.push(data[i].student[j].id);
   }
 }
 for (var i = data.length - 1; i >= 0; i--) {
   tutorid.push(data[i].tutor.id);
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
 for (var i = tutorid.length - 1; i >= 0; i--) {
   var option = document.createElement("option");
   option.text = tutorid[i];
   tutor.appendChild(option);
 }

</script>