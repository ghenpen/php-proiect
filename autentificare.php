<html>
<head>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
body {
  background-image: url('background.png');
  background-size: cover;
}
    </style>
</head>
<body>
<div style="
    height: 100px;
    width: 100%;
    background-color:#EEA990; 
    position: relative;
    top:20px;">
<h1 style="
    position:  absolute;
    left: 25%;
    color:#66545E;
    font-size: 50px;">Library Hub</h1>
<div style="
    position: absolute;
    top: 200px;
    left: 40%;
    height: 450px;
    width: 20%;
    background-color:#AA6F73;
">
<form action="verificare_login.php" method="post" style="
    position: absolute;
    top: 50px;
    left: 60px;
">
    <label for="email" style="
    font-family: &quot;Copperplate&quot;, Copperplate, fantasy;
    font-size: 20px; color:#66545E;">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="password" style="
    font-family: &quot;Copperplate&quot;, Copperplate, fantasy;
    font-size: 20px;color:#66545E;">Parolă:</label>
    <input type="password" id="password" name="password" required><br><br>
    <div class="g-recaptcha" data-sitekey="6LcqvTspAAAAAI6JYsMExb62rAGwUGisr475fsTk"></div>
    <input type="submit" value="Autentificare" class="button-54" role="button" style="
    position: absolute;
    top: 210px;">
    <a href="index.php"><input value="Inapoi" class="button-54" role="button" style="
    position: absolute;
    top: 210px; left:200px; width: 100px;"></a>
</form>
<a style="
    position: absolute;
    top: 230px;
    right:30px;
    ont-family: &quot;Copperplate&quot, Copperplate, fantasy;" href="inregistrare.html" >Nu ai cont? Inregistreaza-te aici.</p>
</div>

</body>
</html>
