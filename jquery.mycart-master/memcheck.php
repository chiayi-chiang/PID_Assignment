<?php
require("database.php");


$sqlmember = 
  "SELECT * FROM `member`WHERE `manager`='0'";
  $row = mysqli_fetch_assoc(mysqli_query($con, $sqlmember));    



if (isset($_POST["btnOK"])) {
  $setunumber = $_POST["unumber"];
  $setcanuse = $_POST["txtcanuse"];
  $sqlmember = 
  "UPDATE `member` 
  SET canuse='$setcanuse'
  WHERE unumber = '$setunumber'";
  mysqli_query($con, $sqlmember);
  echo $sqlmember;
  header("location: manager.php");
 exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
        
        .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 1000px;
        margin:  auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
  </style>
</head>
<body>
    <div class="addproduct-page" >
    <div class="form">
      <form class="singup-form" id="form2" name="form2" method="post" >
          <div class="container">
            <h2 class="float-left"><?= "會員管理"?>
            <a href="manager.php" class="btn btn-outline-info btn-md float-right">回首頁</a>
            <table class="table table-striped">
              <thead>
                  <tr>
                      <th>會員帳號</th>
                      <th>會員名</th>
                      <th>會員手機</th>
                      <th>狀態</th>
                  </tr>
              </thead>
              <tbody>
                  <?php while ($row) { ?> 
                  <tr>
                      <td  name="unumber"><?= $row["unumber"] ?></td>
                      <td><?= $row["uName"] ?></td>
                      <td><?= $row["uPhone"] ?></td>
                      <td><input type="text" name="txtcanuse" id="txtcanuse" value="<?= $row["canuse"] ?>" class="form-control" /></td>
                      <td><button type="submit" name="btnOK" id="btnOK">修改</button></td>
                  </tr>
                  <?php } ?>
              </tbody>
            </table>
          </div>
      </from> 
      </div>
  </div>
</body>
</html>
