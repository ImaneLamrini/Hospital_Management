<?php
$ipp=$_POST['ipp'];
$acte=$_POST['acte'];
$date=$_POST['date'];
$time=$_POST['time'];
$conn=new mysqli("localhost:4306","root","","test");
if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}
else{
    $stmt = $conn->prepare("INSERT INTO agenda (ipp, acte, date, time) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $ipp, $acte, $date, $time);
    
    $stmt->execute();
    echo "<script>alert('Appointment added successfully')</script>";
    echo "<script>document location ='registration.php';</script>";
    header("Refresh: 0; URL=agenda.php");
    $stmt->close();
    $conn->close();
}
?>


