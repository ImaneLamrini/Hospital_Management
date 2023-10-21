<?php
$lname=$_POST['name'];
$fname=$_POST['prenom'];
$ddn=$_POST['ddn'];
$num=$_POST['number'];
$adr=$_POST['adress'];
$doctor_name=$_POST['dname'];
$type_alergy=$_POST['alergy'];
$medication=$_POST['medication'];
$assurance=$_POST['insurance'];
    // Validate phone number format (e.g., 06********)
    if (!preg_match("/^0\d{9}$/", $num)) {
        echo "Invalid phone number format. Please use 06******** format.";
        exit;
    }
$conn=new mysqli("localhost:4306","root","","test");
if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}
else{
    $stmt = $conn->prepare("INSERT INTO patients (lname, fname, ddn, adresse, dname, numero, alergy, med, assurance) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss",$lname, $fname, $ddn, $adr, $doctor_name, $num, $type_alergy, $medication, $assurance);
    
    $stmt->execute();
    echo "<script>alert('patient added successfully!')</script>";
    echo "<script>document location ='registration_nurse.php';</script>";
    header("Refresh:0; URL=registration_nurse.php");
    $stmt->close();
    $conn->close();
}
?>



