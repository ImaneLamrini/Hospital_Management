<?php
$conn = new mysqli("localhost:4306", "root", "", "test");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ipp = $_POST['ipp'];
$acte = $_POST['acte'];

// Récupérer le prix de l'acte depuis la base de données
$stmt = $conn->prepare("SELECT prix FROM actes_medicaux WHERE acte = ?");
$stmt->bind_param("s", $acte);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $prixActe = $row['prix'];
} else {
    die("Acte introuvable dans la base de données.");
}

// Récupérer les informations du patient depuis la base de données
$stmt = $conn->prepare("SELECT lname, fname FROM patients WHERE ipp = ?");
$stmt->bind_param("i", $ipp);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $nomPatient = $row['lname'];
    $prenomPatient = $row['fname'];
} else {
    die("Patient introuvable dans la base de données.");
}

// Fermer la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="invoice2_nurse.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300&family=Noto+Sans:ital@1&family=Nunito+Sans:wght@300&family=Righteous&family=Roboto:ital@1&family=Rubik&family=Tilt+Prism&display=swap" rel="stylesheet">
    <title>Facture</title>
</head>
<body>
    <a href="http://127.0.0.1:8080/projecthospital/Nurse/invoice_nurse/invoice1_nurse.php"><img src="arrow (1).png" alt=""class="back"></a>
    <div class="first">
    <img src="OIP.jpeg" alt=""title="his" id="logo">
    <h1>Facture</h1>
    <div class="main">
    <p class="ipp">IPP: <?php echo $ipp; ?></p><br>
    <p class="name">Nom du patient: <?php echo $nomPatient . " " . $prenomPatient; ?></p><br>
    <p class="acte">Acte: <?php echo $acte; ?></p><br>
    <p class="price">Prix de l'acte: <?php echo $prixActe; ?></p><br>
    <p class="ttc">Montant total à payer: <?php echo $prixActe; ?></p> <br><br>
    <button id="printButton">Imprimer</button>
    <script src="script.js"></script>
    </div>
    </div>
</body>
</html>
