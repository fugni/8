<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Flag detail</title>
  <style>
    html,
    body {
      margin: 0;
      padding: 0;
      width: 100%;
      box-sizing: border-box;
      display: flex;
      flex-wrap: wrap;

    }

    .flag {
        margin: 20px;
    }

    .flag img {
        padding: 5px;
    }
  </style>
</head>

<body>
  <?php
  include("connection.inc.php");

  $sql = "SELECT * FROM tbl_country WHERE id_country = " . $_GET["id"];
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
  ?>
      <div class="flag">
    <?php
      echo "<a href='detail.php?id=" . $row["id_country"] . "'><img src=https://flagcdn.com/h240/" . strtolower(($row["ISO2"])) . ".png></a><br>";
      echo ("Country: " . $row["Country Name"] . "<br>");
      echo ("Capital: " . $row["Capital"] . "<br>");
      echo ("Continent: " . $row["Continent"] . "<br>");
      echo ("Top Level Domain: ." . $row["Top Level Domain"] . "<br>");
      echo ("</div>");
    }
  } else {
    echo "0 results";
  }
    mysqli_close($conn);
    ?>
</body>

</html>