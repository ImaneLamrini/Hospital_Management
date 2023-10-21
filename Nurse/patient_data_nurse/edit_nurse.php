<?php
$conn = new mysqli("localhost:4306", "root", "", "test");
if ($conn->connect_error) {
    die("connection failed" . $conn->connect_error);
} else {
    $row = []; // Initialize $row as an empty array

    // Check if 'ipp' parameter is present in the URL
    if (isset($_GET['ipp']) && !empty($_GET['ipp'])) {
        $ipp = $_GET['ipp'];

        // Fetch the patient data based on the IPP
        $stmt = $conn->prepare("SELECT * FROM patients WHERE ipp = ?");
        $stmt->bind_param("s", $ipp);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if patient data exists with the given IPP
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Patient with IPP $ipp not found.";
            exit; // Stop further execution if patient not found
        }

        $stmt->close();
    }
  // Check if form is submitted for updating patient data
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ipp = $_POST['ipp'];
    $nom = $_POST['name']; // Update the name attribute
    $prenom = $_POST['prenom']; // Update the name attribute
    $date_naissance = $_POST['ddn'];
    $adresse = $_POST['adress']; // Update the name attribute
    $doctor_name = $_POST['dname']; // Update the name attribute
    $number = $_POST['number']; // Update the name attribute
    $alergy = $_POST['alergy']; // Update the name attribute
    $medication = $_POST['medication']; // Update the name attribute
    $assurance = $_POST['insurance']; // Update the name attribute

    $stmt = $conn->prepare("UPDATE patients SET lname=?, fname=?, ddn=?, adresse=?, dname=?, numero=?, alergy=?, med=?, assurance=? WHERE ipp=?");
    $stmt->bind_param(
        "ssssssssss",
        $nom, $prenom, $date_naissance, $adresse, $doctor_name, $number, $alergy, $medication, $assurance, $ipp
    );
    $stmt->execute();

    // Update $row with the new values from the form submission
    $row = $_POST;
}

$conn->close();
}
?>


<!-- ... Your HTML form remains unchanged ... -->

  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit_Nurse.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300&family=Noto+Sans:ital@1&family=Nunito+Sans:wght@300&family=Righteous&family=Rubik&display=swap" rel="stylesheet">
    <title>edit</title>
</head>
<body>
<header>
        <a href="http://127.0.0.1:8080/projecthospital/Nurse/patient_data_nurse/patient_data_nurse.php" class="right"><button class="patientsdata">Patient's data</button></a>
        <h2>Health Care Hospital </h1>
        <h3>Hospital Management System</h3>
        <img src="hospital-bed copy.png" title="New patient"class="first">
        <a href="http://127.0.0.1:8080/projecthospital/Nurse/patient_data_nurse/patient_data_nurse.php"><img src="arrow (1).png" alt=""class="back"></a>
    </header>
<div>
    <form method="POST">
        
    <div class="firstdiv">
        <button class="personal">
            Personal information
        </button><br><br>
        <label for="ipp"class="ipp">IPP :</label><br>
        <input type="text" name="ipp" id="ipp" value = "<?php echo $row['ipp']; ?>" required><br><br>
        <label for="name"class="nom">NAME:</label><br>
        <input type="text" name="name" id="nom" value = "<?php echo $row['lname']; ?>" required><br><br>
        <label for="prenom"class="prenom">FORENAME:</label><br>
        <input type="text" name="prenom" id="fname" value = "<?php echo $row['fname']; ?>"required><br><br>
        <label for="ddn"class="dde">Date of Birth:</label><br>
        <input type="date" name="ddn" id="datede"value = "<?php echo $row['ddn']; ?>"required><br><br>
        <label for="number"class="numero">Phone number:</label><br>
        <input type="text" name="number" id="num" value = "<?php echo $row['numero']; ?>"required><br><br>
        <label for="adress"class="adrs">Adress:</label><br>
        <input type="text" name="adress" id="ad" value = "<?php echo $row['adresse']; ?>"required><br><br>
        </div>
        <div class="vertical-line"></div>
        <button class="medical">Medical information</button><br><br>
        <div class="seconddiv">
        <label for="dname"class="doctor">Doctor_Name:</label><br>
        <input type="text" name="dname" id="dname" value = "<?php echo $row['dname']; ?>"required><br><br>
        <label for="alergy" class="suffer">Which allergies do you suffer from?</label><br>
        <input type="text" name="alergy" id="all" value = "<?php echo $row['alergy']; ?>"required><br><br>
        <label for="medication" class="medicamment">Current Medications:</label><br>
        <input type="text" name="medication" id="med" value = "<?php echo $row['med']; ?>"required><br><br>
        <label for="insurance"class="insurance">Select insurance:</label><br><br>
        <select id="assurance" name="insurance" value = "<?php echo $row['assurance']; ?>"required><br>
        <option value="amo">AMO</option>
        <option value="cnops">CNOPS</option>
        <option value="cnss">CNSS</option>
        <option value="arm">ARM</option>
        <option value="ramed">RAMED</option>
        <option value="aucune">AUCUNE</option>
        <option value="autre">AUTRE</option>
        </select><br>
        <input type="submit"value="Save" id="submit">
        </div>
    </form>
</div> 
</body>
</html> 