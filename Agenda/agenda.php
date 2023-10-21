<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="agenda.css">
    <title>Agenda - Health Care Hospital</title>
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
            <a href="http://127.0.0.1:8080/projecthospital/dashboard/dashboard.php"><button class="logout">Home</button></a>
            <a href="http://127.0.0.1:8080/projecthospital/index/"><button class="logout">Logout</button></a>
        </nav>
        </div>
    </header>
    <div class="container">
        <h2>Agenda - Schedule Appointment</h2>
        <div class="leftone">
            <img src="agenda.png" alt="agenda"class="picture">
        </div>
        <div class="vertical-line"></div>
        <div class="rightone">
            <form action="registeragenda.php" method="post">
                <label for="ipp" class="ipp">Select Patient (IPP):</label>
                <select id="ipp" name="ipp" required><br><br>
                <option value="" class="selectt">Select IPP</option>
                <?php
                    $conn = new mysqli("localhost:4306","root","","test");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    else{
                        $stmt=$conn->prepare("SELECT ipp FROM patients");
                        $stmt->execute();
                        $result=$stmt->get_result();
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row["ipp"] . '">' . $row["ipp"] . '</option>';
                            }
                        }
                        $conn->close();
                    }
                ?>
                    </select><br><br>
            
            <label for="acte">Select Acte:</label>
            <select id="acte" name="acte" required>
                <option value="">Select an option</option>
                <option value="consultation">Consultation</option>
                <option value="ARM">ARM</option>
                <option value="Scanner">Scanner</option>
                <option value="Blood test">Blood test</option>
                <option value="vaccination">Vaccination</option>
                <option value="surgery">Surgery</option>
                <option value="cardio_consultation">Cardiology Consultation</option>
                <option value="Gyneco_Consultation">Gynecology Consultation</option>
                <option value="Pediatrics_Consultation">Pediatrics Consultation</option>
                <option value="Dermato_Consultation">Dermatology Consultation</option>
            </select><br><br>
            <label for="date"class="date">Appointment Date:</label>
            <input type="date" id="date" name="date" required><br><br>
            
            <label for="time"class="time">Appointment Time:</label>
            <input type="time" id="time" name="time" required><br><br><br>
            <input type="submit" value="Save"class="save">
        </form>
        </div>
      
        <a href="agenda_data.php"><button class="appoint">See all of Appointments</button></a>
    </div>
</body>
</html>
