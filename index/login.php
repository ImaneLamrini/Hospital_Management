<?php
$login = $_POST['login'];
$pwd = $_POST['password'];
$conn = new mysqli("127.0.0.1:4306","root", "", "test"); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    $stmt = $conn->prepare("select * from test.admin where email  = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        if ($data["pwd"] == $pwd) {
            if($data["statut"] == 'Medecin'){
                echo 'success_medecin';
            } else {
                echo 'success_nurse';
            } 
        } else {
            echo 'error';
        }
    } else {
        echo 'error';
    }
    $stmt->close();
    $conn->close();
}
?>
