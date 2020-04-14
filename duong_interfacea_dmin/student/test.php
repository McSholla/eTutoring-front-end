<!DOCTYPE html>
<html>
<head>
       <title></title>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

</body>
</html>
<center>
       hello
       <div id="showData"></div>
</center>
<script type="text/javascript">
       data = 
       [
       {
              "id" : "123",
              "userName" : "hello",
              "fullName" : "Student 1",
              "gender" : "male",
              "birthday" : "111",
              "email" : "one@gmail.com"
       },
       {
              "id" : "343",
              "userName" : "hello",
              "fullName" : "Student 1",
              "gender" : "male",
              "birthday" : "111",
              "email" : "one@gmail.com"
       }

       ];

       
       console.log(data);
       var col = [];
       for (var i = 0; i < data.length; i++) {
              for (var key in data[i]) {
                     if (col.indexOf(key) === -1) {
                            col.push(key);
                     }
              }
       }
// CREATE DYNAMIC TABLE.
var table = document.createElement("table");
table.border = '1px solid black ';
table.classList.add('table-striped');
table.style = 'margin : auto; width : 80%';

// CREATE HTML TABLE HEADER ROW USING THE EXTRACTED HEADERS ABOVE.
var tr = table.insertRow(-1);

for (var i = 0; i < col.length; i++) {
       var th = document.createElement("th");
       th.style  = 'text-align : center';
       th.innerHTML = col[i];

       tr.appendChild(th);
}

// ADD JSON DATA TO THE TABLE AS ROWS.
for (var i = 0; i < data.length; i++) {

       tr = table.insertRow(-1);

       for (var j = 0; j < col.length; j++) {
              var tabCell = tr.insertCell(-1);
              tabCell.innerHTML = data[i][col[j]];
              tabCell.style = 'text-align : center';
       }
}

// FINALLY ADD THE NEWLY CREATED TABLE WITH JSON DATA TO A CONTAINER.
var divContainer = document.getElementById("showData");
divContainer.innerHTML = "";
divContainer.appendChild(table);


</script>