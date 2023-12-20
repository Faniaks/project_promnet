<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_afr";
$port= 3306; 



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
echo "Data berhasil disimpan!";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
   
    $sql = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)";
   
    if ($stmt = $conn->prepare($sql)) {
       $stmt->bind_param("sss", $name, $email, $message);
       $stmt->execute();
       echo  " kembali ke <a href='index.html'>Home</a>";
    } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
    }
   
    $stmt->close();
    $conn->close();
   }
   ?>
