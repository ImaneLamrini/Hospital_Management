<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="prescriptions.css"/>
    <title>Prescription</title>
</head>
<body>
<header>
    <div class="leftside">
        <img src="circulatory-system.png" alt="logo"title="Health care">
    </div>
    <div class="rightside">
    <nav class="only">
        <a href="http://localhost:8080/projecthospital/invoices/invoice1.php"><button class="invoices">Invoices</button></a>
        <a href="http://localhost:8080/projecthospital/Agenda/agenda.php"><button class="pres">Agenda</button></a>
        <a href="http://127.0.0.1:8080/projecthospital/dashboard/dashboard.php"><button class="logout">Home</button></a>
        <a href="http://127.0.0.1:8080/projecthospital/index/"><button class="logout">Logout</button></a>
    </nav>
    </div>
</header>
    <div class="images">
        <img src="medicament.png" alt="" class="img1">
    </div>
    <form action="https://docs.google.com/document/d/140hV16teTwHxuknyh0MyE2pH1xJAlWPwD9CFlsptgkw/edit" method="get">
        <img src="—Pngtree—stethoscope and medical prescription vector_7258396.png" alt="" class="recepee">
        <label for="ipp" class="ippp">Select Patient (IPP):</label>
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
        </select><br><br><br>
        <label for="ordonnance" class="ord">Write a prescription:</label>
        <button type="submit" id="ord">Click here to write it</button>
    </form>
</body>
</html>
