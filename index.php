<!DOCTYPE html>
<?php
include('components/php_start.php');
include('components/head.php');
?>

<html lang="cs">
<body>
  
  <?php
  include('components/header.php');
  ?>
  <div>
        <p>Katalog produktu</p>
    </div>
    </div>
    <div class="row" style="
    border-style: none solid;
    border-width: 1px;
    border-color: rgb(163, 162, 162);
    ">
<?php
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              echo  "<p>".$row["produkt"]." ". $row["vyrobce"]." ".$row["kod"]."<br>";
            }
          } else {
            echo "0 results";
          }
          $conn->close();
        ?>
    </div>
</div>
        
</body>
</html>

