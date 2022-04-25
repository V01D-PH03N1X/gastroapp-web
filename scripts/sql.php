<?php
//SQL Variables
$servername = "db.mydark.me";
$username = "gastroapp";
$password = "7LEErmZJAe6c16S[";
$dbname = "gastroapp";

//Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check Connection
if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}

//Create Table
$sql = "CREATE TABLE IF NOT EXISTS reservation (
    `ID` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `TableID` int NOT NULL,
    `Name` VARCHAR(255) NOT NULL,
    `Email` VARCHAR(60) NOT NULL,
    `Phone` VARCHAR(30) NOT NULL,
    `Date` date NOT NULL,
    `Time` time NOT NULL,
    FOREIGN KEY (TableID) REFERENCES Tables(ID)
)";

//Check if Table is created
if($conn->query($sql) === TRUE){
    echo "<script>console.log('Table Created Successfully');</script>";
}else{
    echo "<script>console.log('Error Creating Table: " . $conn->error . "');</script>";
}
?>
