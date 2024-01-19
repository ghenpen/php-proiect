<html>
<body>
<?php

$servername = "sql212.infinityfree.com";
$username = "if0_35399945";
$password = "DUahAUIN7d"; 
$dbname = "if0_35399945_libraryhub";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

    $sql = "SELECT * FROM Utilizatori WHERE Email = '$email' AND Parola = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);
        $userRole = $row['rol'];
        if ($userRole == 'admin') {
            header("Location: admin_dashboard.php");
        } elseif ($userRole == 'user') {
            header("Location: user_dashboard.php?email=" . urlencode($email));
            exit();
        }elseif ($userRole == 'bibliotecar') {
            header("Location: bibliotecar_dashboard.php");
        }
    } else {
        header("Location: login.php?error=login_failed");
    }
    $recaptchaSecretKey = '6LcqvTspAAAAAHhODf4uAKTEIyr-s4qX85lbbgWC';
        $recaptchaResponse = $_POST['g-recaptcha-response'];

        $recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify";
        $recaptchaData = [
            'secret' => $recaptchaSecretKey,
            'response' => $recaptchaResponse,
        ];

        $recaptchaOptions = [
            'http' => [
                'method' => 'POST',
                'content' => http_build_query($recaptchaData),
            ],
        ];

        $recaptchaContext = stream_context_create($recaptchaOptions);
        $recaptchaResult = file_get_contents($recaptchaUrl, false, $recaptchaContext);
        $recaptchaResult = json_decode($recaptchaResult, true);

        if (!$recaptchaResult['success']) {
            echo '<script>alert("Eroare verificare reCAPTCHA.");</script>';
            exit();
        }
        $stmt = $conn->prepare("SELECT * FROM utilizatori WHERE email = ? AND parola = ?");
        $stmt->bind_param("ss", $email, $parola);
        $stmt->execute();
        $result = $stmt->get_result();
}
?>

</body>
</html>