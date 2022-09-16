<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$dbname = "remante";

echo "<b>Seznam produktu</b>";
// Create connection
$conn = mysqli_connect($hostName, $userName, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "
SELECT 
produkt.id_produkt AS 'id_p',
produkt.id_vyrobce AS 'id_v',
produkt.cena AS 'cena',
produkt.name AS 'produkt',
produkt.popis AS 'popis',
produkt.kod AS 'kod',
vyrobce.id AS 'id_v',
vyrobce.name AS 'vyrobce',
typ_produktu.id AS 'id_t',
typ_produktu.name AS 'id_t' 

FROM (produkt
     INNER JOIN `vyrobce`  ON vyrobce.id = produkt.id_vyrobce
     INNER JOIN `typ_produktu` ON typ_produktu.id = produkt.id_typ)
     
ORDER BY produkt.id_produkt ASC;

";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo  "<p>".$row["produkt"]." ". $row["vyrobce"]." ".$row["kod"]."<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>