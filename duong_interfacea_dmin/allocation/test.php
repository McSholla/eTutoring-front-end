
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
  let dropdown = $('#locality-dropdown');

  dropdown.empty();

  dropdown.append('<option selected="true" disabled>Choose State/Province</option>');
  dropdown.prop('selectedIndex', 0);

  const url = 'https://api.myjson.com/bins/7xq2x';

// Populate dropdown with list of provinces
$.getJSON(url, function (data) {
  $.each(data, function (key, entry) {
    dropdown.append($('<option></option>').attr('value', entry.abbreviation).text(entry.name));
  })
});
</script>