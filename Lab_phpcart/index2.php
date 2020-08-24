<?php
require_once("connMysql.php");
$sqlStatement = <<<multi
select c.cID,c.cName,c.Phone,o.oID,o.OrderDate,o.ShipDate
    from restaurants r ,menus m ,details d ,orders o ,customers c ,shippers s
    where r.rID = m.rID 
        AND m.mID = d.mID
        and d.oID = o.oID
        and o.cID = c.cID
        and o.sID = s.sID
    ORDER BY c.cID
multi;
// "select * from employee";
$result = mysqli_query($link, $sqlStatement);
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
</head>
<body>

<div class="container">
  <h2>Employee List
      <a href="addEmployee.php" class="btn btn-outline-info btn-md float-right">New</a>
  </h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>cID</th>
        <th>cName</th>
        <th>oID</th>
        <th>OrderDate</th>
        <th>ShipDate</th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>
    <?php while ( $row = mysqli_fetch_assoc($result) ) { ?>
      <tr>
        <td><?= $row["cID"] ?></td>
        <td><?= $row["cName"] ?></td>
        <td><?= $row["oID"] ?></td>
        <td><?= $row["OrderDate"] ?></td>
        <td><?= $row["ShipDate"] ?></td>
        <td>
            <span class="float-right">
                <a href="./editForm.php?id=<?= $row["cID"] ?>" class="btn btn-outline-success btn-sm">Edit</a>
                | 
                <a href="./deleteEmployee.php?id=<?= $row["cID"] ?>" class="btn btn-outline-danger btn-sm">Delete</a>
            </span>
        </td>
      </tr>
    <?php } ?>
    
    </tbody>
  </table>
</div>

</body>
</html>
