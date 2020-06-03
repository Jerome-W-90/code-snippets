<?php
/**
 * Utilisation de aws-sdk-php version 3+
 */

require 'vendor/autoload.php';

// Informations à remplacer
$bucketName = 'A REMPLACER';
$region = 'A REMPLACER';
$key = 'A REMPLACER'; // service IAM
$secret = 'A REMPLACER'; // service IAM

// Initialisation des credentials
$s3 = new Aws\S3\S3Client([
    'region'  => $region,
    'version' => 'latest',
    'credentials' => [
        'key'    => $key,
        'secret' => $secret,
    ]
]);


// Formulaire d'envoi d'un fichier sur le bucket
if(isset($_FILES['image'])){
    $file_name = $_FILES['image']['name'];
    $temp_file_location = $_FILES['image']['tmp_name'];

    $result = $s3->putObject([
        'Bucket' => $bucketName,
        'Key'    => $file_name,
        'SourceFile' => $temp_file_location
    ]);
}

// Suppression d'un fichier
if($_POST['deleteFileName']){
    $s3->deleteObject([
        'Bucket' => $bucketName,
        'Key'    => $_POST['deleteFileName'],
    ]);
}

// Liste des fichiers présents dans le bucket
$listFiles = $s3->getIterator('ListObjects', [
    'Bucket' => $bucketName
]);

// Liste des buckets
$listBuckets = $s3->listBuckets();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AWS S3 WITH SDK PHP</title>
</head>
<body>
    <h3>Liste des buckets</h3>
    <ul>
    <?php foreach ($listBuckets['Buckets'] as $bucket): ?>
        <li><?php echo "{$bucket['Name']} - {$bucket['CreationDate']}\n"; ?></li>
    <?php endforeach; ?>
    </ul>

    <hr>

    <h3>Formulaire d'envoi d'un fichier sur le bucket <span style="color:#ff0000;"><?php echo $bucketName; ?></span></h3>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" />
        <input type="submit" value="Envoyer"/>
    </form>

    <hr>

    <h3>Liste des fichiers présents dans le bucket <span style="color:#ff0000;"><?php echo $bucketName; ?></span></h3>
    <table>
        <thead>
        <tr>
            <th>Nom du fichier</th>
            <th>Classe de stockage</th>
            <th>Taille</th>
            <th>Lien</th>
            <th>Suppression</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($listFiles as $file): ?>
            <tr>
                <td><?php echo $file['Key']; ?></td>
                <td><?php echo $file['StorageClass']; ?></td>
                <td><?php echo $file['Size']; ?></td>
                <td><a href="<?php echo $s3->getObjectUrl('test-sdk-aws', $file['Key']); ?>" target="_blank">Cliquer</a></td>
                <td>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                        <input name="deleteFileName" id="deleteFileName" type="hidden" value="<?php echo $file['Key']; ?>">
                        <input type="submit" value="Supprimer">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
