<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="agenda_data_nurse.css"/>
    <title>Appointment's data</title>
</head>
<body>
<header>
        <div class="leftside">
            <img src="circulatory-system.png" alt="logo"title="Health care">
        </div>
        <div class="rightside">
        <nav class="only">
            <a href="http://127.0.0.1:8080/projecthospital/Nurse/dashboard_nurse/dashboard_nurse.php"><button class="invoices">Home</button></a>
            <a href="http://127.0.0.1:8080/projecthospital/Nurse/patient_data_nurse/patient_data_nurse.php"><button class="pres">Data</button></a>
            <a href="http://127.0.0.1:8080/projecthospital/Nurse/invoice_nurse/invoice1_nurse.php"><button class="logout">Invoices</button></a>
            <a href="http://127.0.0.1:8080/projecthospital/index/"><button class="logout">Logout</button></a>
        </nav>
        </div>
    </header>
    <table class="tab" border="1"cellspacing="0">
        <thead>
            <tr class="headrow">
                <th>ipp</th>
                <th>acte</th>
                <th>date</th>
                <th>time</th>
                <th>actions</th>

            </tr>
        </thead>
        <img src="agenda.png" alt=""class="image">
        <tbody class="bodyrow">
            <?php
                $conn= new mysqli("localhost:4306","root","","test");
                if($conn->connect_error){
                    die('connection failed'.$conn->connect_error);
                }
                else{
                    $stmt=$conn->prepare("select * from agenda");
                    $stmt->execute();
                    $resultat=$stmt->get_result();
                    if($resultat->num_rows >0){
                        while($data=$resultat->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>". $data['ipp'] . "</td>";
                            echo "<td>". $data['acte'] . "</td>";
                            echo "<td>". $data['date'] . "</td>";
                            echo "<td>". $data['time'] . "</td>";
                            echo "<td>";
                            echo "<a href='http://127.0.0.1:8080/projecthospital/Nurse/agenda_nurse/agenda_delete_nurse.php?ipp=" . $data['ipp'] . "'><button class='del'>Delete</button></a>";
                            echo "</td>";
                            echo "</tr>";
                            }
                    }
                    $stmt->close();
                }
                $conn->close();
            ?>
        </tbody>
    </table>
    <a href="http://127.0.0.1:8080/projecthospital/Nurse/agenda_nurse/agenda_nurse.php"><button class="add">ADD</button></a>
</body>
</html>