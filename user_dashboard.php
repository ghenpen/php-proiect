<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proiect Bibliotecă</title>
    <style>

.button-54 {
  font-family: "Open Sans", sans-serif;
  font-size: 16px;
  letter-spacing: 2px;
  text-decoration: none;
  text-transform: uppercase;
  color: #AA6F73;
  cursor: pointer;
  border: 3px solid;
  padding: 0.25em 0.5em;
  box-shadow: 1px 1px 0px 0px, 2px 2px 0px 0px, 3px 3px 0px 0px, 4px 4px 0px 0px, 5px 5px 0px 0px;
  position: relative;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-54:active {
  box-shadow: 0px 0px 0px 0px;
  top: 5px;
  left: 5px;
}

@media (min-width: 768px) {
  .button-54 {
    padding: 0.25em 0.75em;
  }
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #66545E;
  position: -webkit-sticky;
  position: sticky;
  top: 0px;
  height: 80px;
  width: 100%;
  z-index: 100;
}

li {
  float: left;
  font-size: 20px;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 30px 33px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #EEA990;
}

.active {
  background-color: #AA6F73 ;
}
.wrapper {
    margin: 15px auto;
    width: 500px;
    position: absolute;
    top: 200px;
    left: 50px;
}

.container-calendar {
    background: #A39193;
    padding: 15px;
    max-width: 475px;
    margin: 0 auto;
    overflow: auto;
}

.button-container-calendar button {
    cursor: pointer;
    display: inline-block;
    zoom: 1;
    background: #EEA990;
    color: #fff;
    border: 1px solid #EEA990;
    border-radius: 4px;
    padding: 5px 10px;
}

.table-calendar {
    border-collapse: collapse;
    width: 100%;
}

.table-calendar td, .table-calendar th {
    padding: 5px;
    border: 1px solid #66545E;
    text-align: center;
    vertical-align: top;
}

.date-picker.selected {
    font-weight: bold;
    outline: 1px dashed #F6E0B5;
}

.date-picker.selected span {
    border-bottom: 2px solid currentColor;
}

/* sunday */
.date-picker:nth-child(1) {
  color: #EEA990;
}

/* friday */
.date-picker:nth-child(6) {
  color: #F6E0B5;
}

#monthAndYear {
    text-align: center;
    margin-top: 0;
}

.button-container-calendar {
    position: relative;
    margin-bottom: 1em;
    overflow: hidden;
    clear: both;
}

#previous {
    float: left;
}

#next {
    float: right;
}

.footer-container-calendar {
    margin-top: 1em;
    border-top: 1px solid #F6E0B5;
    padding: 10px 0;
}

.footer-container-calendar select {
    cursor: pointer;
    display: inline-block;
    zoom: 1;
    background: #F6E0B5;
    color: #66545E;
    border: 1px solid #66545E;
    border-radius: 3px;
    padding: 5px 1em;
}
.descriere{
    position: absolute;
    top: 200px;
    right: 50px;
    background-color: #AA6F73;
    width: 60%;
    height:600px;
    color: #ffffff;
    font-size: 18px;
    padding : 20px 20px;

}
.section{
    z-index: 1;
}
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto auto;
  padding: 70px;
  z-index: 2;
  width: 89%;
  height: 300px;
  position: absolute;
  top: 110px;
  left:50px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 20px;
  height: 500px;
  width: 300px;
  text-align: center;
}
</style>
</head>
<body style = "background-color : #F6E0B5; ">
<div>
    <div style="
        height: 100px;
        width: 100%;
        background-color:#EEA990; 
        position: relative">
    <h1 style="
        position:  absolute;
        left: 25%;
        color:#66545E;
        font-size: 50px;">Library Hub</h1>

<?php
session_start();
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $_SESSION['email'] = $email;
    echo "<p style='color:#66545E; position: absolute;
    right: 5%;
    top:30px;'>Utilizator: $email!</p>";
} else {
    echo "<button onclick=\"location.href='autentificare.php'\" class='button-54' style=' position: absolute; right: 5%; top:30px;'>Autentificare</button>";
}
?>

</div>
</div>
<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#horror">Horror</a></li>
  <li><a href="#sf">S.F.</a></li>
  <li><a href="#dragoste">Carti de dragoste</a></li>
  <li><a href="#istorie">Carti de istorie</a></li>
  <li><a href="#politiste">Carti politiste</a></li>
  <li><a href="#formular">Imprumuta</a></li>
</ul>

<section id="home">
 <div class="wrapper">
    <div class="container-calendar">
        <h3 id="monthAndYear"></h3>
        <div class="button-container-calendar">
            <button id="previous" onclick="previous()">&#8249;</button>
            <button id="next" onclick="next()">&#8250;</button>
        </div>
        <table class="table-calendar" id="calendar" data-lang="en">
            <thead id="thead-month"></thead>
            <tbody id="calendar-body"></tbody>
        </table>
        <div class="footer-container-calendar">
<label for="month">Jump To: </label>
      <select id="month" onchange="jump()">
                 <option value=0>Jan</option>
                 <option value=1>Feb</option>
                 <option value=2>Mar</option>
                 <option value=3>Apr</option>
                 <option value=4>May</option>
                 <option value=5>Jun</option>
                 <option value=6>Jul</option>
                 <option value=7>Aug</option>
                 <option value=8>Sep</option>
                 <option value=9>Oct</option>
                 <option value=10>Nov</option>
                 <option value=11>Dec</option>
             </select>
             <select id="year" onchange="jump()"></select>       
        </div>
    </div>
</div>
<div class="descriere">
    <h2>Bine ați venit la Biblioteca Noastră Online!</h2>

    <p>Suntem o comunitate pasionată de lectură și cunoaștere, dedicată să oferim acces la o varietate bogată de cărți și resurse pentru toți iubitorii de lectură.</p>
    <h3>Misiunea Noastră</h3>

    <p>La Biblioteca Noastră Online, ne-am asumat misiunea de a aduce lumea cărților direct la tine. Ne dorim să inspirăm, să educăm și să conectăm oamenii prin intermediul cărților, oferind o colecție vastă și diversă de titluri care să        acopere toate gusturile și interesele.</p>

    <h3>Ce Găsești Aici<h3>

    <p>Cu o selecție impresionantă de cărți în diverse domenii – de la cele clasice până la cele contemporane, de la ficțiune la non-ficțiune și multe altele – încercăm să răspundem tuturor preferințelor și să satisfacem setea ta de            cunoaștere și aventură literară.</p>

    <h3>Serviciile Noastre</h3>

    <p>Facem tot posibilul să ofere experiențe de lectură plăcute și eficiente. Poți naviga cu ușurință prin catalogul nostru online, să împrumuți cărți în mod convenabil și să te bucuri de servicii prietenoase și profesioniste.</p>

    <h3>Acces la Cărți</h3>

    <p>Pentru a avea acces la întreaga noastră colecție și pentru a împrumuta cărți, te invităm să creezi un cont gratuit. Este simplu și rapid! Creând un cont, vei avea posibilitatea de a explora catalogul nostru extins, de a împrumuta           cărți și de a te bucura de lectura preferată direct de acasă.</p>

</div>
</section>
<section id="horror" style="background-color: #66545E; height: 800px; position: relative; top: 700px;">
<p style="position: absolute; top: 10px; left: 150px; font-size: 45px; color:#ffffff"> Carti horror</p>
<div class="grid-container" style:"  background-color: #66545E;">
   <?php
        function get_file_extension($file_name) {
        $extensions = array('jpeg', 'jpg', 'png', 'gif'); 

        foreach ($extensions as $extension) {
            $full_path = $file_name . '.' . $extension;
            if (file_exists($full_path)) {
                return $extension; 
        }
    }

    return null;
}
        $servername = "sql212.infinityfree.com";
        $username = "if0_35399945";
        $password = "DUahAUIN7d"; 
        $dbname = "if0_35399945_libraryhub";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
        }
        $sql_horror_books = "SELECT c.id_carte, c.titlu, CONCAT(a.nume,' ',a.prenume) as autor , cat.nume FROM Carte c join Categorie cat ON (c.id_categorie = cat.id_categorie) join Autori a ON (c.id_autor = a.id_autor) WHERE cat.nume = 'horror'";
        
        $result_horror_books = mysqli_query($conn, $sql_horror_books);

        if (mysqli_num_rows($result_horror_books) > 0) {
            while ($row_book = mysqli_fetch_assoc($result_horror_books)) {
                echo '<div class="grid-item">';
                echo "<p>Titlu: " . $row_book["titlu"]. "</p>";
                echo "<p>Autor: " . $row_book["autor"]. "</p>";

                $nume_imagine = $row_book["id_carte"];
                $cale_imagine = "$nume_imagine";
                $extensie =  get_file_extension($nume_imagine);
            echo "<img src='{$cale_imagine}.{$extensie}' alt='Imagine carte' style='width:300px; height: 400px;' >";
            echo '</div>';
    }

    echo '</div>';
} else {
    echo "Nu s-au găsit cărți în categoria horror.";
}
?>

</div>
</section>
<section id="sf" style="background-color: #F6E0B5; height: 800px; position: relative; top: 700px;">
<p style="position: absolute; top: 10px; left: 150px; font-size: 45px; color:#66545E"> Carti S.F.</p>
<div class="grid-container" style="  background-color: #F6E0B5">
   <?php
        $servername = "sql212.infinityfree.com";
        $username = "if0_35399945";
        $password = "DUahAUIN7d"; 
        $dbname = "if0_35399945_libraryhub";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
        }
        $sql_sf_books = "SELECT c.id_carte, c.titlu, CONCAT(a.nume,' ',a.prenume) as autor , cat.nume FROM Carte c join Categorie cat ON (c.id_categorie = cat.id_categorie) join Autori a ON (c.id_autor = a.id_autor) WHERE cat.nume = 'S.F.'";
        
        $result_sf_books = mysqli_query($conn, $sql_sf_books);

        if (mysqli_num_rows($result_sf_books) > 0) {
            while ($row_book = mysqli_fetch_assoc($result_sf_books)) {
                echo '<div class="grid-item">';
                echo "<p>Titlu: " . $row_book["titlu"]. "</p>";
                echo "<p>Autor: " . $row_book["autor"]. "</p>";

                $nume_imagine = $row_book["id_carte"];
                $cale_imagine = "$nume_imagine";
                $extensie =  get_file_extension($nume_imagine);
            echo "<img src='{$cale_imagine}.{$extensie}' alt='Imagine carte' style='width:300px; height: 400px;' >";
            echo '</div>';
    }

    echo '</div>';
} else {
    echo "Nu s-au găsit cărți în categoria horror.";
}
?>
</div>
</section>
<section id="dragoste" style="background-color: #66545E; height: 800px; position: relative; top: 700px;">
<p style="position: absolute; top: 10px; left: 150px; font-size: 45px; color:#ffffff"> Carti de Dragoste</p>
<div class="grid-container" style:"  background-color: #66545E;">
   <?php
        $servername = "sql212.infinityfree.com";
        $username = "if0_35399945";
        $password = "DUahAUIN7d"; 
        $dbname = "if0_35399945_libraryhub";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
        }
        $sql_drg_books = "SELECT c.id_carte, c.titlu, CONCAT(a.nume,' ',a.prenume) as autor , cat.nume FROM Carte c join Categorie cat ON (c.id_categorie = cat.id_categorie) join Autori a ON (c.id_autor = a.id_autor) WHERE cat.nume = 'carti de dragoste'";
        
        $result_drg_books = mysqli_query($conn, $sql_drg_books);

        if (mysqli_num_rows($result_drg_books) > 0) {
            while ($row_book = mysqli_fetch_assoc($result_drg_books)) {
                echo '<div class="grid-item">';
                echo "<p>Titlu: " . $row_book["titlu"]. "</p>";
                echo "<p>Autor: " . $row_book["autor"]. "</p>";

                $nume_imagine = $row_book["id_carte"];
                $cale_imagine = "$nume_imagine";
                $extensie =  get_file_extension($nume_imagine);
            echo "<img src='{$cale_imagine}.{$extensie}' alt='Imagine carte' style='width:300px; height: 400px;' >";
            echo '</div>';
    }

    echo '</div>';
} else {
    echo "Nu s-au găsit cărți în categoria horror.";
}
?>

</div>
</section>
<section id="istorie" style="background-color: #F6E0B5; height: 800px; position: relative; top: 700px;">
<p style="position: absolute; top: 10px; left: 150px; font-size: 45px; color:#66545E"> Carti de Istorie</p>
<div class="grid-container" style="  background-color: #F6E0B5">
   <?php
        $servername = "sql212.infinityfree.com";
        $username = "if0_35399945";
        $password = "DUahAUIN7d"; 
        $dbname = "if0_35399945_libraryhub";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
        }
        $sql_istorie_books = "SELECT c.id_carte, c.titlu, CONCAT(a.nume,' ',a.prenume) as autor , cat.nume FROM Carte c join Categorie cat ON (c.id_categorie = cat.id_categorie) join Autori a ON (c.id_autor = a.id_autor) WHERE cat.nume = 'istorie'";
        
        $result_istorie_books = mysqli_query($conn, $sql_istorie_books);

        if (mysqli_num_rows($result_istorie_books) > 0) {
            while ($row_book = mysqli_fetch_assoc($result_istorie_books)) {
                echo '<div class="grid-item">';
                echo "<p>Titlu: " . $row_book["titlu"]. "</p>";
                echo "<p>Autor: " . $row_book["autor"]. "</p>";

                $nume_imagine = $row_book["id_carte"];
                $cale_imagine = "$nume_imagine";
                $extensie =  get_file_extension($nume_imagine);
            echo "<img src='{$cale_imagine}.{$extensie}' alt='Imagine carte' style='width:300px; height: 400px;' >";
            echo '</div>';
    }

    echo '</div>';
} else {
    echo "Nu s-au găsit cărți în categoria horror.";
}
?>
</div>
</section>
<section id="politiste" style="background-color: #66545E; height: 800px; position: relative; top: 700px;">
<p style="position: absolute; top: 10px; left: 150px; font-size: 45px; color:#ffffff"> Carti Politiste</p>
<div class="grid-container" style="  background-color: #66545E">
   <?php
        $servername = "sql212.infinityfree.com";
        $username = "if0_35399945";
        $password = "DUahAUIN7d"; 
        $dbname = "if0_35399945_libraryhub";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
        }
        $sql_sf_books = "SELECT c.id_carte, c.titlu, CONCAT(a.nume,' ',a.prenume) as autor , cat.nume FROM Carte c join Categorie cat ON (c.id_categorie = cat.id_categorie) join Autori a ON (c.id_autor = a.id_autor) WHERE cat.nume = 'carti politiste'";
        
        $result_sf_books = mysqli_query($conn, $sql_sf_books);

        if (mysqli_num_rows($result_sf_books) > 0) {
            while ($row_book = mysqli_fetch_assoc($result_sf_books)) {
                echo '<div class="grid-item">';
                echo "<p>Titlu: " . $row_book["titlu"]. "</p>";
                echo "<p>Autor: " . $row_book["autor"]. "</p>";

                $nume_imagine = $row_book["id_carte"];
                $cale_imagine = "$nume_imagine";
                $extensie =  get_file_extension($nume_imagine);
            echo "<img src='{$cale_imagine}.{$extensie}' alt='Imagine carte' style='width:300px; height: 400px;' >";
            echo '</div>';
    }

    echo '</div>';
} else {
    echo "Nu s-au găsit cărți în categoria horror.";
}
?>
</div>
</section>
<section id="formular" style="background-color: #F6E0B5; height: 600px; position: relative; top: 700px;">
<p style="position: absolute; top: 10px; left: 150px; font-size: 45px; color:#66545E">Imprumuta o carte</p>
<div class="grid-container" style="  background-color: #F6E0B5; font-size: 30px; color:#66545E ">
  <form action="submit.php" method="post">
        <label for="category">Categorie:</label>
        <select id="category" name="category" required>
            <?php
            $servername = "sql212.infinityfree.com";
        $username = "if0_35399945";
        $password = "DUahAUIN7d"; 
        $dbname = "if0_35399945_libraryhub";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
        }
            $sql = "SELECT nume FROM Categorie";
            $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                foreach ($row as $table_name) {
                    echo "<option value='$table_name'>$table_name</option>";
                }
            }
        } else {
            echo "Nu s-au găsit categorii în baza de date.";
        }

            $conn->close();
            ?>
        </select>
        <br><br>
        <label for="book-title">Titlu Carte:</label>
        <input type="text" id="book-title" name="book_title" required>
        <br><br>
        <label for="start-date">Data Împrumut:</label>
        <input type="date" id="start-date" name="start_date" required>
        <br><br>
        <label for="return-date">Data Restituire:</label>
        <input type="date" id="return-date" name="return_date" required>
        <br><br>
        <input type="submit" value="Împrumută">
    </form>
</div>
</section>
<section id="cautare" style="background-color: #66545E; height: 800px; position: relative; top: 700px;">
<p style="position: absolute; top: 10px; left: 150px; font-size: 45px; color:#ffffff"> Cauta-ti cartea favorita</p>
<div class="grid-container" style:"  background-color: #66545E;">
   <label for="searchInput" style =" color:#ffffff; font-size: 30px;">Introduceți titlul cărții:</label>
    <input type="text" id="searchInput" style="height :100px; width:200px;">
    <button onclick="searchBooks()" class="button-54" style="height :100px; width:200px;">Caută</button>

    <div id="results"></div>
</div>
</section>
<script>

function searchBooks() {
            const searchInput = document.getElementById("searchInput").value;
            const resultsContainer = document.getElementById("results");

            fetch(`search_books.php?searchInput=${encodeURIComponent(searchInput)}`)
                .then(response => response.json())
                .then(data => {

                    resultsContainer.innerHTML = "";
                    data.forEach(book => {
                        const bookDiv = document.createElement("div");
                        bookDiv.innerHTML = `<h3>${book.title}</h3><p>${book.authors.join(", ")}</p>`;
                        resultsContainer.appendChild(bookDiv);
                    });
                })
                .catch(error => console.error("Eroare în solicitarea către API:", error));
        }

function generate_year_range(start, end) {
    var years = "";
    for (var year = start; year <= end; year++) {
        years += "<option value='" + year + "'>" + year + "</option>";
    }
    return years;
}

today = new Date();
currentMonth = today.getMonth();
currentYear = today.getFullYear();
selectYear = document.getElementById("year");
selectMonth = document.getElementById("month");


createYear = generate_year_range(1970, 2050);
/** or
 * createYear = generate_year_range( 1970, currentYear );
 */

document.getElementById("year").innerHTML = createYear;

var calendar = document.getElementById("calendar");
var lang = calendar.getAttribute('data-lang');

var months = "";
var days = "";

var monthDefault = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

var dayDefault = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

if (lang == "en") {
    months = monthDefault;
    days = dayDefault;
} else if (lang == "id") {
    months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    days = ["Ming", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];
} else if (lang == "fr") {
    months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    days = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
} else {
    months = monthDefault;
    days = dayDefault;
}


var $dataHead = "<tr>";
for (dhead in days) {
    $dataHead += "<th data-days='" + days[dhead] + "'>" + days[dhead] + "</th>";
}
$dataHead += "</tr>";

//alert($dataHead);
document.getElementById("thead-month").innerHTML = $dataHead;


monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);



function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}

function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
}

function showCalendar(month, year) {

    var firstDay = ( new Date( year, month ) ).getDay();

    tbl = document.getElementById("calendar-body");

    
    tbl.innerHTML = "";

    
    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;

    // creating all cells
    var date = 1;
    for ( var i = 0; i < 6; i++ ) {
        
        var row = document.createElement("tr");

        
        for ( var j = 0; j < 7; j++ ) {
            if ( i === 0 && j < firstDay ) {
                cell = document.createElement( "td" );
                cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);
            } else if (date > daysInMonth(month, year)) {
                break;
            } else {
                cell = document.createElement("td");
                cell.setAttribute("data-date", date);
                cell.setAttribute("data-month", month + 1);
                cell.setAttribute("data-year", year);
                cell.setAttribute("data-month_name", months[month]);
                cell.className = "date-picker";
                cell.innerHTML = "<span>" + date + "</span>";

                if ( date === today.getDate() && year === today.getFullYear() && month === today.getMonth() ) {
                    cell.className = "date-picker selected";
                }
                row.appendChild(cell);
                date++;
            }


        }

        tbl.appendChild(row);
    }

}

function daysInMonth(iMonth, iYear) {
    return 32 - new Date(iYear, iMonth, 32).getDate();
}
</script>
</body>
</html>