<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="5" >
    <link rel="stylesheet" type="text/css" href="style.css" media="screen"/>

	<title>Canna</title>

</head>

<body>

    <h1>DATOS DEL CULTIVO</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cannatemp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, temperature, humidity, created_at FROM proyecto_iot ORDER BY id DESC"; 
echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <th>ID</th> 
        <th>Fecha y hora</th> 
        <th>Temperatura en &deg;C</th> 
        <th>Humedad en &#37;</th>   
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_created_at = $row["created_at"];
        $row_temperature = $row["temperature"];
        $row_humidity = $row["humidity"];
      
        echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $row_created_at . '</td> 
                <td>' . $row_temperature . '</td> 
                <td>' . $row_humidity . '</td>
                
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>

</body>
</html>

	</body>
</html>