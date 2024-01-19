<?php

require 'jpgraph/src/jpgraph.php';
require 'jpgraph/src/jpgraph_line.php';

function generateUserRegistrationGraph() {
    $servername = "sql212.infinityfree.com";
$username = "if0_35399945";
$password = "DUahAUIN7d"; 
$dbname = "if0_35399945_libraryhub";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
}

    $sql = "SELECT DATE_FORMAT(dataInregistrare, '%Y-%m-%d') as data, COUNT(*) as numar_inregistrari
            FROM Utilizatori
            WHERE dataInregistrare IS NOT NULL
            GROUP BY DATE_FORMAT(dataInregistrare, '%Y-%m-%d')";
    $result = $conn->query($sql);

    $dates = array();
    $registrationCounts = array();

    while ($row = $result->fetch_assoc()) {
        array_push($dates, $row["data"]);
        array_push($registrationCounts, intval($row["numar_inregistrari"]));
    }

    $fimg = 'jpgraph-line.png';

    $graph = new Graph(970, 670);

    $graph->SetScale("textlin");
    $graph->title->Set('Numar Inregistrari Utilizatori');
    $graph->title->SetFont(FF_FONT1, FS_BOLD);

    $lineplot = new LinePlot($registrationCounts);
    $lineplot->SetColor("blue");
    $lineplot->SetWeight(2);

    $graph->Add($lineplot);
    $graph->xaxis->SetTickLabels($dates);

    $graph->Stroke($fimg);

    if (file_exists($fimg)) {
        echo '<img src="' . $fimg . '" />';
    } else {
        echo 'Unable to create: ' . $fimg;
    }
}

generateUserRegistrationGraph();
?>
