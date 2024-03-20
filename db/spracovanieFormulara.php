<?php

// PDO databázové pripojenie
$host = "localhost";
$dbname = "formular";
$port = 3306;
$username = "root";
$password = "";


// Pripojenie PDO
try {
    $conn = new PDO('mysql:host='.$host.';dbname='.$dbname.";port=".$port, $username,
        $password);
} catch (PDOException $e) {
    die("Chyba pripojenia: " . $e->getMessage());
}
// Získanie údajov z formulára
$meno = $_POST["meno"];
$email = $_POST["email"];
$sprava = $_POST["sprava"];
// SQL príkaz INSERT
$sql = "INSERT INTO udaje (meno, email, sprava) 
                VALUE ('".$meno."', '".$email."', '".$sprava."')";
$statement = $conn->prepare($sql);
try {
    $insert = $statement->execute();
    header("Location: http://localhost/cvicnasablona/thankyou.php");
    return $insert;
} catch (\Exception $exception) {
    return false;
}
// Zatvorenie pripojenia
$conn = null;





