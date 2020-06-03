<?php
/**
 * Utilisation de aws-sdk-php version 3+
 */

// Informations à remplacer
$bucketName = 'A REMPLACER';
$region = 'A REMPLACER';
$key = 'A REMPLACER'; // service IAM
$secret = 'A REMPLACER'; // service IAM

// Formulaire d'envoi d'un fichier sur le bucket
if(isset($_FILES['image'])){
    $file_name = $_FILES['image']['name'];
    $temp_file_location = $_FILES['image']['tmp_name'];

    require 'vendor/autoload.php';

    $s3 = new Aws\S3\S3Client([
        'region'  => $region,
        'version' => 'latest',
        'credentials' => [
            'key'    => $key,
            'secret' => $secret,
        ]
    ]);

    $result = $s3->putObject([
        'Bucket' => $bucketName,
        'Key'    => $file_name,
        'SourceFile' => $temp_file_location
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
    <title>AWS S3</title>
</head>
<body>
    
    <h3>Liste des buckets</h3>
    <?php foreach ($listBuckets['Buckets'] as $bucket): ?>
        <p><?php echo "{$bucket['Name']} - {$bucket['CreationDate']}\n"; ?></p>
    <?php endforeach; ?>
    <h5>Bucket utilisé : <span style="color:#ff0000;"><?php echo $bucketName; ?></span></h5>

    <hr>

    <h3>Formulaire d'envoi d'un fichier sur le bucket</h3>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" />
        <input type="submit"/>
    </form>

    <hr>

    <h3>Liste des fichiers présents dans le bucket</h3>
    <table>
        <thead>
        <tr>
            <th>Fichier</th>
            <th>Type de stockage</th>
            <th>Taille</th>
            <th>Lien</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($listFiles as $file): ?>
            <tr>
                <td><?php echo $file['Key']; ?></td>
                <td><?php echo $file['StorageClass']; ?></td>
                <td><?php echo $file['Size']; ?></td>
                <td><a href="<?php echo $s3->getObjectUrl('test-sdk-aws', $file['Key']); ?>" target="_blank">Cliquer</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
