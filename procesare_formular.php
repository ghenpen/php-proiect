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
        if (isset($_POST['adauga'])) {
        $titlu = $_POST['titlu'];
        $autor = $_POST['autor'];
        $categorie = $_POST['categorie'];

        $parts = explode(" ", $autor);

        $nume = isset($parts[0]) ? $parts[0] : '';
        $prenume = isset($parts[1]) ? $parts[1] : '';
        

        $sql_autor = "INSERT INTO Autori (nume , prenume) VALUES ('$nume', '$prenume')";
        mysqli_query($conn, $sql_autor);
        $id_autor = mysqli_insert_id($conn);
        
        $sql_select_categorie = "SELECT id_categorie FROM Categorie WHERE nume = '$categorie'";
        $result_select_categorie = mysqli_query($conn, $sql_select_categorie);

        if ($result_select_categorie) {
            $row = mysqli_fetch_assoc($result_select_categorie);
            $id_categorie = $row['id_categorie'];
        }

        $sql_carti = "INSERT INTO Carte (titlu, id_autor, id_categorie) VALUES ('$titlu', $id_autor, $id_categorie)";
        mysqli_query($conn, $sql_carti);

        
        if (mysqli_query($conn, $sql_carti)) {
            echo "<script>alert('Cartea a fost adăugată cu succes!');</script>";
            header("refresh:3;url=bibliotecar_dashboard.php");
        } else {
            echo "Eroare: " . $sql . "<br>" . mysqli_error($conn);
        }
        } elseif (isset($_POST['sterge'])) {
            if (isset($_POST['titlu'])) {
            $nume_carte = $_POST['titlu'];
            $sql_select = "SELECT id_carte FROM Carte WHERE titlu = '$nume_carte'";
            $result = mysqli_query($conn, $sql_select);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $id_carte = $row['id_carte'];

                $sql_stergere = "DELETE FROM Carte WHERE id_carte = $id_carte";

                if (mysqli_query($conn, $sql_stergere)) {
                    echo "<script>alert('Cartea a fost stearsa cu succes!');</script>";
                    header("refresh:3;url=bibliotecar_dashboard.php");
                } else {
                    echo "Eroare la ștergerea cărții din baza de date: " . mysqli_error($conn);
                }
            } else {
                echo "Nu s-a găsit cartea în baza de date.";
            }
        } else {
            echo "Numele cărții pentru ștergere lipsește.";
        }
        }
    }
?>
<body>
</html>