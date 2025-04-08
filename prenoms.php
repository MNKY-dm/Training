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
            <input type="number" name="dateNaiss" id="dateNaiss">
        </label>
        <br>
        <input type="reset" value="Réinitialiser">
        <br>
        <input type="submit" value="Envoyer"></input>
    </form>
</body>
</html>

<?php
function br() {
    echo "<br>";
}

findByYear();

// if ((isset($_GET['prenom'])) && (isset($_GET['dateNaiss']))){
//     $file = fopen("../prenoms/DS_PRENOMS_data_2.csv","r");

//     $prenom = htmlspecialchars($_GET['prenom']);
//     $dateNaiss = htmlspecialchars($_GET['dateNaiss']);

//     echo "Ton nom est ".$prenom.'.'."<br>Tu es né en ".$dateNaiss;
//     br();
    
//     $correspond = 0;
//     $correspondAnnee = 0;

//     while (($data = fgetcsv($file, NULL, ";")) !== FALSE) {

//         // var_dump($data); --> "YOB;"SEX";"PRENOM";"GEO";"GEO_OBJECT";"TIME_PERIOD";"OBS_VALUE"

//         $dep = $data[3];
//         $nbParDep = $data[6];

//         if (strtoupper($prenom) === $data[2]){

//             $correspond+= (int)str_replace(",","",$data[6]);

//             if ($dateNaiss === $data[0]) {
//                 $correspondAnnee+= (int)str_replace(",","",$data[6]);
//             }
            
//             if ($dep === 'DEP') {
//                 echo "Votre prénom a été donné ".$nbParDep." fois dans le département n°".$dep;
//             }
//         }
//     }
//     br();
//     echo "Votre prénom a été donné ".$correspondAnnee." fois en ".$dateNaiss;
//     br();
//     echo "Votre prénom a été donné ".$correspond." fois au total depuis 20 ans en France.";
    

//     fclose($file);
// }

function findByYear() {
    if ((isset($_GET['prenom'])) && (isset($_GET['dateNaiss']))){
        $file = fopen("../prenoms/DS_PRENOMS_data.csv","r");
    
        $prenom = htmlspecialchars($_GET['prenom']);
        $dateNaiss = htmlspecialchars($_GET['dateNaiss']);
    
        echo "Ton nom est ".$prenom.'.'."<br>Tu es né en ".$dateNaiss;
        br();
        
        $correspondAnnee = 0;
    
        while (($data = fgetcsv($file, NULL, ";")) !== FALSE) {
    
            // var_dump($data); --> "YOB;"SEX";"PRENOM";"GEO";"GEO_OBJECT";"TIME_PERIOD";"OBS_VALUE"    
            if (strtoupper($prenom) === $data[2]){    
                if ($dateNaiss === $data[0]) {
                    $correspondAnnee+= (int)str_replace(",","",$data[6]);
                    if ($data[4] === 'DEP'){
                        echo $data[3]." : ".(int)str_replace(",","",$data[6]);
                        br();
                    }
                }
            }
        }
        br();
        echo "Votre prénom a été donné ".$correspondAnnee." fois en ".$dateNaiss;
        br();
        
        
        fclose($file);
    }
}



// if ($dep === 'DEP') {
//     echo "Votre prénom a été donné ".$nbParDep." fois dans le département n°".$dep;
//     echo "Votre prénom a été donné ".$correspond." fois au total depuis 20 ans en France.";
// }