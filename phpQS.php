<?php


require_once 'vendor/autoload.php';
require_once "./random_string.php";

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;

$connectionString = "DefaultEndpointsProtocol=https;AccountName=dicodingazureblob;AccountKey=D6T8K0QS9k5ky86DNdSr6zYbZ77+B7p2md5qdCl75N3A8YpslWI6s5J7FYZXSh2MkNFlehGA4gZFFrGacjeWiA==;EndpointSuffix=core.windows.net";
$containerName = "dicodingazureblob";

$blobClient = BlobRestProxy::createBlobService($connectionString);

$cekUpload = "";


if (isset($_POST['submit'])) {
    $fileToUpload = strtolower($_FILES["fileToUpload"]["name"]);
    $content = fopen($_FILES["fileToUpload"]["tmp_name"], "r");
    $cekUpload = "sukses";
    $blobClient->createBlockBlob($containerName, $fileToUpload, $content);
    header("Location: phpQS.php");
}

$listBlobsOptions = new ListBlobsOptions();
$listBlobsOptions->setPrefix("");
$result = $blobClient->listBlobs($containerName, $listBlobsOptions);

?>


<html>

<head>

</head>

<body>
    <form action="phpQS.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" accept=".jpeg,.jpg,.png" required="">
        <input type="submit" name="submit" value="Upload Gambar">
    </form>

    <br>
    <?php
    if (isset($cekUpload)) {
        echo $cekUpload;
        do {
            foreach ($result->getBlobs() as $hasil) {
                echo "Upload Berhasil <br>";

                ?>

                <?php echo $hasil->getName() . "<br>" ?>
                <?php echo $hasil->getUrl() . "<br>" ?>

                <form action="azureCognitive.php" method="post">
                    <input type="hidden" name="url" value="<?php echo $hasil->getUrl() ?>">
                    <input type="submit" name="submit" value="Analisa">
                </form>

            <?php
        }
        $listBlobsOptions->setContinuationToken($result->getContinuationToken());
    } while ($result->getContinuationToken());
}
?>

<br>
<br>
<h2><a href="index.php">KEMBALI KE HALAMAN UTAMA</a></h2>

</body>

</html>