<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Flags</title>
  <style>
    html,
    body {
      margin: 0;
      padding: 0;
      width: 100%;
      box-sizing: border-box;

    }

    .flag {
      display: inline-block;
    }

    .flag img {
      padding: 5px;
    }
  </style>
</head>

<body>
  <?php
  include("connection.inc.php");

  $sql = "SELECT id_country, `Country Name`, ISO2 FROM tbl_country order by `Country Name` ASC";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
  ?>
      <div class="flag">
        <a href="detail.php?id=<?php echo ($row["id_country"]); ?>">
          <?php echo ($row["Country Name"])."<br>"; ?>
          <img src="https://flagcdn.com/h80/<?php echo strtolower(($row["ISO2"])); ?>.png">
        </a>
      </div>
  <?php
    }
  } else {
    echo "0 results";
  }
  mysqli_close($conn);
  ?>
</body>

</html>