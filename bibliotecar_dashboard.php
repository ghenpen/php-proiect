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
    font-size: 50px;">Library Hub-Bibliotecar Dashboard</h1>
<div style=" background-color: #AA6F73; width: 400px; height: 400px; position: absolute; top:210px; left:400px; font-size:20px; color:#66545E;">
<h2 style="position: relative; left: 20px;">Adaugă sau Șterge o carte:</h2>

<form action="procesare_formular.php" method="post" style="position: absolute; left: 20px;">
    <label for="titlu">Titlu:</label><br>
    <input type="text" id="titlu" name="titlu" required><br><br>

    <label for="autor">Autor:</label><br>
    <input type="text" id="autor" name="autor" required><br><br>

    <label for="categorie">Categorie:</label><br>
    <input type="text" id="categorie" name="categorie" required><br><br>

    <input type="submit" name="adauga" value="Adaugă Carte" class="button-54">
    <input type="submit" name="sterge" value="Șterge Carte" class="button-54">
</form>
</div>
<a href="index.php"><input value="Inapoi" class="button-54" role="button" style="
    position: absolute;
    top: 110px; left:200px; width: 100px;"></a>
</body>

</html>


