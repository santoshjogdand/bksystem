<?php
require 'connect.php';
$sql = "SELECT * from customers;";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All customer</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');

    h1 {
      text-align: center;
      font-size: large;
    }

    table,
    th,
    td {
      margin: auto;
      border-collapse: collapse;
      padding: 8px 30px;
      text-align: center;
      border: 1px solid black;
    }

    #hrow {
      background-color: #EA4C89;
      color: white;
    }

    table {
      border: 1px solid black;
    }
  </style>
  <script src="https://cdn.tailwindcss.com"></script>
  
  <link rel="stylesheet" href="/style/showcust.css">

</head>

<body onload="myFunction()">
  <?php include("../comp/header.php"); ?>
  <h1 class="text-4xl my-5 font-semibold text-[#735DA5]">All Customers</h1>
<div class="flex justify-center mb-5">
  <form action="customerinfo.php" method="POST" class="">
    <label for="customer_name" class="text-[#735DA5] font-semibold">Name: </label>
    <input type="text" class="font-[#735DA5] outline-none px-3 py-[2px] text-base  border-[2px] border-[#735DA5] shadow-[#735DA5] " required name="customer_name">
    <label for="customer_name" class="text-[#735DA5] font-semibold">Id: </label>
    <input type="number" class="font-[#735DA5] px-3 py-[2px] text-base outline-none border-[2px] border-[#735DA5] shadow-[#735DA5]" required name="cust_id">
    <input type="submit" class="button text-white px-3 py-[2px] bg-[#EA4C89] text-base border-[2px] border-[#735DA5] shadow-[#735DA5]" name="submit">
  </form>
  </div>
  <?php
  echo "<table>";
  echo "<tr id='hrow'><th>ID</th><th>NAME</th><th>EMAIL</th><th>BALANCE</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr class='row'>";
    echo "<td>" . $row["id"] . "</td>";
    $id = $row["id"];
    $name = $row["name"];
    echo "<td><a href='customerinfo.php?cust_id=$id&customer_name=$name'>" . strtoupper($row["name"]) . "</a></td>";
    echo "<td>" . strtoupper($row["email"]) . "</td>";
    echo "<td>" . $row["current_bal"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  ?>

</body>
<?php
mysqli_close($conn);
?>

</html>