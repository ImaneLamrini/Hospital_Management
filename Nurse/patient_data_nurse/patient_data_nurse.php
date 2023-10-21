
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="data_Nurse.css"/>
    <title>Patient's data_nurse</title>
</head>
<body>
<header>
    <div class="leftside">
        <img src="circulatory-system.png" alt="logo"title="Health care">
    </div>
    <div class="rightside">
    <nav class="only">
        <a href="http://127.0.0.1:8080/projecthospital/Nurse/dashboard_nurse/dashboard_nurse.php"><button class="invoices">Home</button></a>
        <a href="http://127.0.0.1:8080/projecthospital/Nurse/agenda_nurse/agenda_nurse.php"><button class="logout">Agenda</button></a>
        <a href="http://127.0.0.1:8080/projecthospital/Nurse/invoice_nurse/invoice1_nurse.php"><button class="invoices">Invoices</button></a>
        <a href="http://127.0.0.1:8080/projecthospital/index/"><button class="logout">Logout</button></a>
    </nav>
    </div>
</header>
    <a href="http://127.0.0.1:8080/projecthospital/Nurse/dashboard_nurse/dashboard_nurse.php"><img src="back-button.png" alt="previous"class="previous"></a>
    <table class="tab" border="1"cellspacing="0">
        <img src="test.png" alt="patients"class="patient">
        <a href="http://127.0.0.1:8080/projecthospital/Nurse/new_patient_nurse/registration_nurse.php"><button class="add">Add new patient</button></a>
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
                        echo "<a href='http://127.0.0.1:8080/projecthospital/Nurse/patient_data_nurse/edit_nurse.php?ipp=" . $data['ipp'] . "'><button class='up'>Update</button></a>";
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
