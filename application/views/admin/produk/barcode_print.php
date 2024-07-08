<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Produk <?= $result->kode_brg ?></title>
</head>

<body>
    <?php
    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($result->kode_brg, $generator::TYPE_CODE_128)) . '"style = "width:300px;">';
    ?>
    <br>
    <?= $result->kode_brg ?>
</body>

</html>