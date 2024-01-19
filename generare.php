<?php
require(__DIR__ . '/fpdf/fpdf.php');


class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Lista de Utilizatori', 0, 1, 'C');
        $this->Ln(10);
    }

    function Content($data)
    {
        $this->SetFont('Arial', '', 12);
        $this->SetFillColor(200, 200, 200);
        $this->Cell(30, 10, 'Nume', 1, 0, 'C', 1);
        $this->Cell(30, 10, 'Prenume', 1, 0, 'C', 1);
        $this->Cell(70, 10, 'Email', 1, 0, 'C', 1); 
        $this->Cell(30, 10, 'Rol Utilizator', 1, 1, 'C', 1);

        foreach ($data as $row) {
            $this->Cell(30, 10, $row['nume'], 1);
            $this->Cell(30, 10, $row['prenume'], 1);
            $this->Cell(70, 10, $row['email'], 1); 
            $this->Cell(30, 10, $row['rol_user'], 1);
            $this->Ln();
        }
    }
}

$servername = "sql212.infinityfree.com";
$username = "if0_35399945";
$password = "DUahAUIN7d"; 
$dbname = "if0_35399945_libraryhub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}

$sql = "SELECT nume, prenume, email, rol FROM Utilizatori WHERE rol IN ('user', 'bibliotecar')";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->Content($data);

    $pdf->Output();
} else {
    echo "Nu există utilizatori disponibili.";
}

mysqli_close($conn);
?>