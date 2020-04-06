<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Google Map Static</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
<?php 
    // Informations à ajouter
    $keyAPI = ''; // Clé API Google
    $DB_HOST = '';
    $DB_NAME = '';
    $DB_USER = '';
    $DB_PASSWORD = '';

    // Connexion à la BDD
    try{
        $base = new PDO('mysql:host='.$DB_HOST.';dbname='.$DB_NAME.'',''.$DB_USER.'',''.$DB_PASSWORD.'');
    }
    catch(exception $e){
        die('Erreur ' .$e->getMessage());
    }
    $base->exec("SET CHARACTER SET utf8");

    // Requête SQL pour récupérer la liste des latitudes + longitudes
    $retour = $base->query('
        SELECT 
        FROM 
        WHERE 
    ');

    // Traitement des données (output name = image-nice.png)
    while($data = $retour->fetch()){
       $src =  'http://maps.googleapis.com/maps/api/staticmap?zoom=15&sensor=true&size=730x400&center='.$data['lat'].','.$data['long'].'&markers=color:red|'.$data['lat'].','.$data['long'].'&key='.$keyAPI.'';
       $destFolder = 'images/';
       $cityName = strtolower(str_replace("---", "-", str_replace(" ", "-", $data['city'])));
       $imgName = 'image-'.$cityName.'.png';
       $imgPath = $destFolder.$imgName;
       file_put_contents($imgPath, file_get_contents($src));
    }

    // Fin de connexion à la BDD
    $base = null;
?>

</body>
</html>