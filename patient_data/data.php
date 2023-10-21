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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="dataa.css"/>
    <title>Patient's data</title>
</head>
<body>
<header>
    <div class="leftside">
        <img src="circulatory-system.png" alt="logo"title="Health care">
    </div>
    <div class="rightside">
    <nav class="only">
        <a href="http://localhost:8080/projecthospital/invoices/invoice1.php"><button class="invoices">Invoices</button></a>
        <a href="http://localhost:8080/projecthospital/prescription/prescription.php"><button class="pres">Prescriptions</button></a>
        <a href="http://localhost:8080/projecthospital/Agenda/agenda.php"><button class="logout">Agenda</button></a>
        <a href="http://127.0.0.1:8080/projecthospital/index/"><button class="logout">Logout</button></a>
    </nav>
    </div>
</header>
    <a href="http://127.0.0.1:8080/projecthospital/dashboard/dashboard.php"><img src="back-button.png" alt="previous"class="previous"></a>
    <table class="tab" border="1"cellspacing="0">
        <img src="test.png" alt="patients"class="patient">
        <a href="http://localhost:8080/projecthospital/new_patient/registration.php"><button class="add">Add new patient</button></a>
        <h1 class="title">List of patients :</h1>
        <thead>
        <tr class="headrow">
            <th>ipp</th>
            <th>lname</th>
            <th>fname</th>
            <th>ddn</th>
            <th>adresse</th>
            <th>dname</th>
            <th>numero</th>
            <th>alergy</th>
            <th>med</th>
            <th>assrance</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody class="bodyrow">
            <?php
            $conn = new mysqli("localhost:4306","root","","test");
            if($conn->connect_error){
                die("connection failed".$conn->connect_error);
            }
            else{
                $stmt=$conn->prepare("select * from patients");
                $stmt->execute();
                $stmt_result = $stmt->get_result();
                if($stmt_result->num_rows > 0){
                    while ($data = $stmt_result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>". $data['ipp'] . "</td>";
                        echo "<td>". $data['lname'] . "</td>";
                        echo "<td>". $data['fname'] . "</td>";
                        echo "<td>". $data['ddn'] . "</td>";
                        echo "<td>". $data['adresse'] . "</td>";
                        echo "<td>". $data['dname'] . "</td>";
                        echo "<td>". $data['numero'] . "</td>";
                        echo "<td>". $data['alergy'] . "</td>";
                        echo "<td>". $data['med'] . "</td>";
                        echo "<td>". $data['assurance'] . "</td>";
                        echo "<td>";
                        echo "<a href='http://localhost:8080/projecthospital/patient_data/edit.php?ipp=" . $data['ipp'] . "'><button class='up'>Update</button></a>";
                        echo "<a href='http://localhost:8080/projecthospital/patient_data/data.php?ipp=" . $data['ipp'] . "'><button class='del'>Delete</button></a>";
                        echo "</td>";
                        echo "</tr>";
                    } 
                }
                $stmt->close();
                $conn->close();
            }
            ?>
        </tbody>
    </table>
</body>
</html>
