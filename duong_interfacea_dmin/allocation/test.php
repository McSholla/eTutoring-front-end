
<select id="demo" name="locality">
</select>
<script type="text/javascript">
  data = [{
    "name": "Alberta",
    "abbreviation": "AB"
  },
  {
    "name": "British Columbia",
    "abbreviation": "BC"
  },
  {
    "name": "Manitoba",
    "abbreviation": "MB"
  },
  {
    "name": "New Brunswick",
    "abbreviation": "NB"
  },
  {
    "name": "Newfoundland and Labrador",
    "abbreviation": "NL"
  },
  {
    "name": "Nova Scotia",
    "abbreviation": "NS"
  },
  {
    "name": "Northwest Territories",
    "abbreviation": "NT"
  },
  {
    "name": "Nunavut",
    "abbreviation": "NU"
  },
  {
    "name": "Ontario",
    "abbreviation": "ON"
  },
  {
    "name": "Prince Edward Island",
    "abbreviation": "PE"
  },
  {
    "name": "Quebec",
    "abbreviation": "QC"
  },
  {
    "name": "Saskatchewan",
    "abbreviation": "SK"
  },
  {
    "name": "Yukon",
    "abbreviation": "YT"
  }] 
  $(document).ready(function () {
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

                    // CREATE HTML TABLE HEADER ROW USING THE EXTRACTED HEADERS ABOVE.
                    var tr = table.insertRow(-1);

                    for (var i = 0; i < col.length; i++) {
                      var th = document.createElement("th");
                      th.innerHTML = col[i];

                      tr.appendChild(th);
                    }

                    // ADD JSON DATA TO THE TABLE AS ROWS.
                    for (var i = 0; i < data.length; i++) {

                      tr = table.insertRow(-1);

                      for (var j = 0; j < col.length; j++) {
                        var tabCell = tr.insertCell(-1);
                        tabCell.innerHTML = data[i][col[j]];
                      }
                    }

                     // FINALLY ADD THE NEWLY CREATED TABLE WITH JSON DATA TO A CONTAINER.
                     var divContainer = document.getElementById("showData");
                     divContainer.innerHTML = "";
                     divContainer.appendChild(table);

                   });
                 </script>