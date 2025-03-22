<!DOCTYPE html>
<html>
<head>
<title>PSA Census Data Entry</title>
<style>
body {
  font-family: sans-serif;
  background-color: #004d99 ;
  color: white;
}

#censusForm {
  width: 500px;
  margin: 60px auto;
  border: 1px solid #ccc;
  padding: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input, select {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 15px;
  border: none;
  cursor: pointer;
}

#dataList {
  width: 80%;
  margin: 80px auto;
  border: 1px solid #ccc;
  padding: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

th {
  background-color: #4CAF50;
}

#searchBar {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  box-sizing: border-box;

 }
        .back-button {
            position: absolute;
            margin: 20px;
            top: 20px;
            right: 20px;
            background: dodgerblue;
            color: white;
            padding: 10px 10px;
            text-decoration: none;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <a href="#" class="back-button">Back</a>
</style>
</head>
<body>

<div id="censusForm">
  <h2>Census Data Entry</h2>
  <label for="householdNo">Household Number:</label>
  <input type="text" id="householdNo">

  <label for="name">Name:</label>
  <input type="text" id="name">

  <label for="age">Age:</label>
  <input type="number" id="age">

  <label for="gender">Gender:</label>
  <select id="gender">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
  </select>

  <label for="province">Province:</label>
  <input type="text" id="province">

  <label for="city">City:</label>
  <input type="text" id="city">

  <button onclick="addData()">Add Data</button>
</div>

<div id="dataList">
  <h2>Census Data List</h2>
  <input type="text" id="searchBar" placeholder="Search by Name/Household No.">
  <table id="dataTable">
    <thead>
      <tr>
        <th>Household No.</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Province</th>
        <th>City</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>

<script>
let censusData = [];

function addData() {
  const householdNo = document.getElementById("householdNo").value;
  const name = document.getElementById("name").value;
  const age = document.getElementById("age").value;
  const gender = document.getElementById("gender").value;
  const province = document.getElementById("province").value;
  const city = document.getElementById("city").value;

  if (householdNo && name && age && gender && province && city) {
    censusData.push({ householdNo, name, age, gender, province, city });
    displayData(censusData);
    clearForm();
  } else {
    alert("Please fill in all fields.");
  }
}

function displayData(data) {
  const tableBody = document.getElementById("dataTable").getElementsByTagName("tbody")[0];
  tableBody.innerHTML = "";

  data.forEach(item => {
    const row = tableBody.insertRow();
    const cell1 = row.insertCell(0);
    const cell2 = row.insertCell(1);
    const cell3 = row.insertCell(2);
    const cell4 = row.insertCell(3);
    const cell5 = row.insertCell(4);
    const cell6 = row.insertCell(5);

    cell1.innerHTML = item.householdNo;
    cell2.innerHTML = item.name;
    cell3.innerHTML = item.age;
    cell4.innerHTML = item.gender;
    cell5.innerHTML = item.province;
    cell6.innerHTML = item.city;
  });
}

function clearForm() {
  document.getElementById("householdNo").value = "";
  document.getElementById("name").value = "";
  document.getElementById("age").value = "";
  document.getElementById("gender").value = "Male";
  document.getElementById("province").value = "";
  document.getElementById("city").value = "";
}

document.getElementById("searchBar").addEventListener("input", function() {
  const searchTerm = this.value.toLowerCase();
  const filteredData = censusData.filter(item => {
    return (
      item.name.toLowerCase().includes(searchTerm) ||
      item.householdNo.toLowerCase().includes(searchTerm)
    );
  });
  displayData(filteredData);
});

//Initial display.
displayData(censusData);

</script>

</body>
</html>