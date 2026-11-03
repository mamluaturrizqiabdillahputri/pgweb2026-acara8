<?php
$servername = "localhost";
$username= "root";
$password="";
$dbname="latihan";

$conn= new mysqli($servername, $username, $password, $dbname); //menghubungkan PHP dengan MySQL

if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}

$sql= "SELECT * FROM penduduk";
$result= $conn->query($sql);

echo "<a href='input/index.html'>Input</a>";

if($result->num_rows > 0){
    echo "<table border='1px'><tr>
            <th>id</th>
            <th>Kecamatan</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Luas</th>
            <th>Jumlah Penduduk</th>";
    
    while($row = $result->fetch_assoc()) {     //mengambil data dari hasil query per baris
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["Kecamatan"] . "</td>";
        echo "<td>" . $row["Longitude"] . "</td>";
        echo "<td>" . $row["Latitude"] . "</td>";
        echo "<td>" . $row["Luas"] . "</td>";
        echo "<td align='right'>" . $row["Jumlah Penduduk"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else{
    echo "0 result";
}
$conn->close();

?>