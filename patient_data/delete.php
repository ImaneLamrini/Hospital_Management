<!-- delete.php -->
<?php
$conn = new mysqli("localhost:4306", "root", "", "test");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['ipp']) && !empty($_GET['ipp'])) {
    $ipp = $_GET['ipp'];

    // Prepare the SQL statement to delete the row from the database
    $stmt = $conn->prepare("DELETE FROM patients WHERE ipp = ?");
    $stmt->bind_param("s", $ipp);
    $stmt->execute();

    

    $stmt->close();
 }

$conn->close();
?>
 