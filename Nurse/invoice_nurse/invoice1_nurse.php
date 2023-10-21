<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="invoice1_nurse.css"/>
    <title>Document</title>
</head>
<body>
<header>
    <div class="leftside">
        <img src="circulatory-system.png" alt="logo"title="Health care">
    </div>
    <div class="rightside">
    <nav class="only">
        <a href="http://127.0.0.1:8080/projecthospital/Nurse/dashboard_nurse/dashboard_nurse.php"><button class="invoices">Home</button></a>
        <a href="http://127.0.0.1:8080/projecthospital/Nurse/patient_data_nurse/patient_data_nurse.php"><button class="logout">Data</button></a>
        <a href="http://127.0.0.1:8080/projecthospital/Nurse/agenda_nurse/agenda_nurse.php"><button class="logout">Agenda</button></a>
        <a href="http://127.0.0.1:8080/projecthospital/index/"><button class="logout">Logout</button></a>
    </nav>
    </div>
</header>
<img src="payment.png" alt=""class="img2">
<div class="container">
    <form action="invoice2_nurse.php" method="POST">
    <img src="bill.png" alt="" class="img1"><br><br>
    <label for="ipp" class="ipp">Select Patient (IPP):</label>
        <select id="ipp" name="ipp" required>
            <option value="">Select IPP</option>
            <?php
                $conn = new mysqli("localhost:4306", "root", "", "test");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } else {
                    $stmt = $conn->prepare("SELECT ipp FROM patients");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row["ipp"] . '">' . $row["ipp"] . '</option>';
                        }
                    }
                    $conn->close();
                }
            ?>
        </select><br><br>
        <label for="acte" class="acte">Select Acte:</label>
        <select id="acte" name="acte" required>
            <option value="">Select Acte</option>
            <?php
                $conn = new mysqli("localhost:4306", "root", "", "test");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } else {
                    $stmt = $conn->prepare("SELECT acte FROM actes_medicaux");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row["acte"] . '">' . $row["acte"] . '</option>';
                        }
                    }
                    $conn->close();
                }
            ?>
        </select><br><br><br>
        <input type="submit" value="Send"class="save">
    </form>
</div>

</body>
</html>