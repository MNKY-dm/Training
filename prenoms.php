<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prénoms</title>
</head>
<body>
    <form action="prenoms.php" method="get">
        <label for="prenom">
            Saisisez votre prénom : 
            <input type="text" name="prenom" id="prenom" placeholder="John">
        </label>
        <br>
        <label for="dateNaiss">
            Saisissez votre date de naisance : 
            <input type="date" name="dateNaiss" id="dateNaiss">
        </label>
        <input type="reset" value="Réinitialiser">
        <input type="submit" value="Envoyer"></input>
    </form>
</body>
</html>

<?php
if ((isset($_GET['prenom'])) && ($_GET['dateNaiss'])){
    $prenom = $_GET['prenom'];
    $dateNaiss = $_GET['dateNaiss'];
    echo "Ton nom est ".$prenom.'.'."<br>Tu es né le ".$dateNaiss;
}
