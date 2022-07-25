<?php
include_once("sql.php");

//Check if Variables are set

if(isset($_POST['name'])){
    $name = $_POST['name'];
}
if(isset($_POST['email'])){
    $email = $_POST['email'];
}
if(isset($_POST['phone'])){
    $phone = $_POST['phone'];
}
if(isset($_POST['date'])){
    $date = $_POST['date'];
}
if(isset($_POST['time'])){
    $time = $_POST['time'];
}
if(isset($_POST['table'])){
    $table = $_POST['table'];
}
//check if table is already reserved
$sql = "SELECT * FROM Reservation WHERE TableID = '$table' AND date = '$date' AND time = '$time'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    echo "<h1>Table is already reserved</h1>";
}
else{
    //insert into database
    $sql = "INSERT INTO Reservation (Name, Email, Phone, Date, Time, TableID) VALUES ('$name', '$email', '$phone', '$date', '$time', '$table')";
    if(mysqli_query($conn, $sql)){
        echo "<h1>Reservation successful</h1>";
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
