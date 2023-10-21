<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300&family=Noto+Sans:ital@1&family=Nunito+Sans:wght@300&family=Righteous&family=Rubik&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300&family=Noto+Sans:ital@1&family=Nunito+Sans:wght@300&family=Righteous&family=Roboto:ital@1&family=Rubik&display=swap" rel="stylesheet">
    <title>Registration</title>
</head>
<body>
    <header>
        <a href="http://localhost:8080/projecthospital/patient_data/data.php" class="right"><button class="patientsdata">Patient's data</button></a>
        <h2>Health Care Hospital </h1>
        <h3>Hospital Management System</h3>
        <img src="hospital-bed.png" title="New patient"class="first">
        <a href="http://localhost:8080/projecthospital/patient_data/data.php"><img src="arrow (1).png" alt="back" class="back"></a>
    </header>
    <div>
    <form action="register.php"method="POST">
                <div class="firstdiv">
                <button class="personal">
                    Personal information
                </button><br><br>
                <label class="ipp">IPP :</label><br>
                <input type="text" name="ipp" id="ipp" placeholder="Automatically generated" readonly><br><br>
                <label for="name"class="nom">NAME:</label><br>
                <input type="text" name="name" id="nom"required><br><br>
                <label for="prenom"class="prenom">FORENAME:</label><br>
                <input type="text" name="prenom" id="fname"required><br><br>
                <label for="ddn"class="dde">Date of Birth:</label><br>
                <input type="date" name="ddn" id="datede"required><br><br>
                <label for="number" class="numero">Phone number:</label><br>
                <input type="text" name="number" id="num" required pattern="0\d{9}" placeholder="0*********"><br><br>

                <label for="adress"class="adrs">Adress:</label><br>
                <input type="text" name="adress" id="ad"required><br><br>
                </div>
                <div class="vertical-line"></div>
                <button class="medical">Medical information</button><br><br>
                <div class="seconddiv">
                <label for="dname"class="doctor">Doctor_Name:</label><br>
                <input type="text" name="dname" id="dname"><br><br>
                <label for="alergy" class="suffer">Which allergies do you suffer from?</label><br>
                <input type="text" name="alergy" id="all"><br><br>
                <label for="medication" class="medicamment">Current Medications:</label><br>
                <input type="text" name="medication" id="med"><br><br>
                <label for="insurance"class="insurance">Select insurance:</label><br><br>
                <select id="assurance" name="insurance">
                <option value="amo">AMO</option>
                <option value="cnops">CNOPS</option>
                <option value="cnss">CNSS</option>
                <option value="arm">FAR</option>
                <option value="ramed">RAMED</option>
                <option value="aucune">AUCUNE</option>
                <option value="autre">AUTRE</option>
                </select><br>
                <input type="submit"value="submit" id="submit">   
                </div>
         
            </form>
    </div>
    
</body>
</html>
