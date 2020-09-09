<?php
require("database.php");


$sqlmember = 
  "SELECT * FROM `member`WHERE `manager`='0'";
$member = mysqli_query($con, $sqlmember);    

if(isset($_POST["uid"])){
    $userID=$_POST["uid"];
    $setcanuse=$_POST["can"];
    $sqlmember=
    "UPDATE `member` 
    SET `canuse` = '$setcanuse' 
    WHERE `member`.`uID` = '$userID';";
    mysqli_query($con, $sqlmember);
    exit();
}

//   $setunumber = $_POST["unumber"];
   
//   $sqlmember = 
//   "UPDATE `member` 
//   SET canuse='$setcanuse'
//   WHERE unumber = '$setunumber'";
//   mysqli_query($con, $sqlmember);
   //echo $setcanuse;
//   header("location: manager.php");
 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 1000px;
            margin: 100px auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body>
<div class="form"> 
    <form class="member-form" method="post" >
        <div class="container">
        <h2 class="float-left"><?="會員管理"?></h2>
        <a href="manager.php" class="btn btn-outline-info btn-md float-right">回首頁</a>
                <table class="table table-striped" >
                <thead>
                  <tr>
                      <th>會員帳號</th>
                      <th>會員名</th>
                      <th>會員手機</th>
                      <th>狀態</th>
                      <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                <div id="test">
                  <?php while ($row=mysqli_fetch_assoc($member)) { ?> 
                  <tr>
                      <td><?= $row["unumber"] ?></td>
                      <td><?= $row["uName"] ?></td>
                      <td><?= $row["uPhone"] ?></td>
                      <td><input type="text" name="<?=$row['uID']?>" id="name<?=$row['uID']?>" value="<?= $row["canuse"] ?>" class="form-control" /></td>
                      <td><button onClick="reply_click()" type="submit" name="<?=$row['uID']?>" id="<?=$row['uID']?>" class="btn-danger">修改</button></td>
                  </tr>
                  <?php } ?>
                </div>  
              </tbody>
            </table>
        </div>
    </form>
</div>
</body>
<script type="text/javascript">
function reply_click()
{
    let postid=event.srcElement.id;
    let name = $("#name"+postid).val();
    //alert (name);
    $.ajax({
          type: 'POST',
          url: 'memcheck.php',
          data: {can:name,uid:postid},
          success: function(e){
            //alert(e);
          },
          error: function(){
            alert('error');
          }
        
    }); 

    
}

    
</script>
</html>