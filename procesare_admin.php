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

if (isset($_POST['submit'])) {
    $selected_table = $_POST['tabel'];

    echo "<h2>Tabelul selectat: $selected_table</h2>";

    $sql = "SELECT * FROM $selected_table";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nu s-au găsit înregistrări în tabelul selectat.";
    }
    mysqli_close($conn);
}
?>

</body>
</html>
