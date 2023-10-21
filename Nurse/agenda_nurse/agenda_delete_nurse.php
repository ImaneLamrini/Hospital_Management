<!-- delete.php -->
<?php
$conn = new mysqli("localhost:4306", "root", "", "test");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['ipp']) && !empty($_GET['ipp'])) {
    $ipp = $_GET['ipp'];

    // Prepare the SQL statement to delete the row from the database
    $stmt = $conn->prepare("DELETE FROM agenda WHERE ipp = ?");
    $stmt->bind_param("i", $ipp);
    $stmt->execute();
    if ($stmt->execute()) {
        echo "<script>alert('Record deleted successfully!')</script>";
        echo "<script>document location ='agenda_data_nurse.php';</script>";
        header("Refresh:0; URL=agenda_data_nurse.php");
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
    $stmt->close();
 }

$conn->close();
?>
 