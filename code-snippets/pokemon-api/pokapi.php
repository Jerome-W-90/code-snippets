<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokémon API</title>
</head>
<body>
    
<?php
$found = true;
$id = 1;

while($found && $id < 15){
    $data = file_get_contents("http://pokeapi.co/api/v1/pokemon/".$id);

    if($data != ""){
        $rData = json_decode($data, true);
        echo("Found Pokemon " . $rData['name'] . " with ID ".$id."<br/>");
    }
    else{
        die("No Pokemon found");
    }

    $id++;
}

?>


</body>
</html>
