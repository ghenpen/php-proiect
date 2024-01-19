<?php
session_start();

require(__DIR__ . '/phpmailer/class.phpmailer.php');
require(__DIR__ . '/phpmailer/mail_config.php');

$servername = "sql212.infinityfree.com";
$username = "if0_35399945";
$password = "DUahAUIN7d"; 
$dbname = "if0_35399945_libraryhub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

$book_title = $_POST['book_title'];
$category = $_POST['category'];
$start_date = $_POST['start_date'];
$return_date = $_POST['return_date'];

if (isset($_SESSION['email'])) {
    $user_email = $_SESSION['email'];
}
$book_id_query = "SELECT c.id_carte FROM Carte c JOIN Categorie ca ON c.id_categorie = ca.id_categorie WHERE c.titlu='$book_title' AND ca.nume='$category'";
$book_id_result = mysqli_query($conn, $book_id_query);

$id_pt_utilizator = "SELECT id_utilizator FROM Utilizatori WHERE email = '$user_email'";
$id_pt_u = mysqli_query($conn, $id_pt_utilizator);

if ($id_pt_u) {
    $roww = mysqli_fetch_assoc($id_pt_u);
    $user_id = $roww['id_utilizator'];
}

if ($book_id_result) {
    $row = mysqli_fetch_assoc($book_id_result);

    $book_id = $row['id_carte'];
    $book_query = "SELECT * FROM Imprumut WHERE id_carte = '$book_id'";
    $book_result = mysqli_query($conn, $book_query);
}
$message = "Bună ziua,\n\nCartea \"$book_title\" a fost împrumutată cu succes.\n\nData împrumutului: $start_date\nData restituirii: $return_date\n\nMulțumim că utilizați serviciile noastre.";
$message = wordwrap($message, 160, "<br />\n");


$mail = new PHPMailer(true); 

$mail->IsSMTP();
if ($book_result->num_rows == 0) {
    $sql_carte = "INSERT INTO Imprumut (id_utilizator , id_carte , dataimprumut , datareturnare) VALUES ('$user_id', '$book_id' , '$start_date' , '$return_date' )";
    if (mysqli_query($conn, $sql_carte)) {
        try {
        echo "<script>alert('Ați împrumutat cu succes cartea!');</script>";
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;
        $mail->Username   = $username_mail;
        $mail->Password   = $password_mail;

        $mail->setFrom('libraryhub31@gmail.com', 'Library hub');
        $mail->addAddress($user_email, 'Destinatar');
        $mail->isHTML(false);
        $mail->Subject = 'Imprumutare carte';
        $mail->Body    = $message;
        $mail->send();
        header("Location: user_dashboard.php?email=" . urlencode($user_email));
        }catch (phpmailerException $e) {
  echo $e->errorMessage(); //error from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //error from anything else!
}
        } else {
            echo "Eroare: " . $sql . "<br>" . mysqli_error($conn);
        }
}elseif ($book_result->num_rows > 0) {
        $existing_loans_query = "SELECT * FROM Imprumut WHERE id_carte='$book_id' IN (SELECT id_carte FROM Imprumut WHERE ('$start_date' BETWEEN dataimprumut AND datareturnare) AND ('$return_date' BETWEEN dataimprumut AND datareturnare))";
        $existing_loans_result = $conn->query($existing_loans_query);
        if ($existing_loans_result->num_rows > 0) {
            $insert_query = "INSERT INTO Imprumut (id_utilizator , id_carte , dataimprumut , datareturnare) VALUES ('$user_id', '$book_id' , '$start_date' , '$return_date' )";
            if (mysqli_query($conn, $insert_query)) {
                echo "<script>alert('Ați împrumutat cu succes cartea!');</script>";
                header("Location: user_dashboard.php?email=" . urlencode($user_email));
            } else {
                echo "Eroare: " . $sql . "<br>" . mysqli_error($conn);
            }
        }else {
            echo "<script>alert('Nu puteți împrumuta această carte, există deja un împrumut în intervalul specificat.');</script>";
                header("Location: user_dashboard.php?email=" . urlencode($user_email));
        }
    }

$conn->close();
?>