<html>
<head>
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
</style>
</head>
<body style = 'background-color : #F6E0B5; '>
<div style="
    height: 100px;
    width: 100%;
    background-color:#EEA990; 
    position: relative">
<h1 style="
    position:  absolute;
    left: 25%;
    color:#66545E;
    font-size: 50px;">Library Hub-Admin Dashboard</h1>
</div>
<div style=" background-color: #AA6F73; width: 400px; height: 400px; position: absolute; top:210px; left:400px; font-size:20px; color:#66545E;">
<p>Ce tabel doresti sa vezi?</p>
<form action="procesare_admin.php" method="post" style="position: absolute; left: 20px;">
<label for="tabel">Alege un tabel:</label>
    <select name="tabel" id="tabel">
        <?php
        $servername = "sql212.infinityfree.com";
    $username = "if0_35399945";
    $password = "DUahAUIN7d"; 
    $dbname = "if0_35399945_libraryhub";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
    }
        $sql = "SHOW TABLES";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                foreach ($row as $table_name) {
                    echo "<option value='$table_name'>$table_name</option>";
                }
            }
        } else {
            echo "Nu s-au găsit tabele în baza de date.";
        }
        mysqli_close($conn);
        ?>
    </select>
    <input type="submit" name="submit" value="Afiseaza tabelul" class="button-54">
</form>
</div>

<a href="index.php"><input value="Inapoi" class="button-54" role="button" style="
    position: absolute;
    top: 110px; left:200px; width: 100px;"></a>
</body>

</html>


