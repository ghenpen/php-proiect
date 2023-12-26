<html>
<body>
<?php
$servername = "sql212.infinityfree.com";
$username = "if0_35399945";
$password = "DUahAUIN7d"; 
$dbname = "if0_35399945_libraryhub";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifică conexiunea
if (!$conn) {
    die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
}
// Verifică dacă a fost trimis formularul
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $parola = $_POST['psw'];
    // SQL pentru inserarea datelor în baza de date
    $sql = "INSERT INTO Utilizatori (Nume, Prenume, Email, Telefon, Parola, Rol) VALUES ('$nume', '$prenume', '$email', '$telefon', '$parola' , 'user')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Datele au fost înregistrate cu succes!");</script>';
        header("refresh:3;url=index.php");
    } else {
        echo "Eroare la înregistrarea datelor: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

</body>
</html>
