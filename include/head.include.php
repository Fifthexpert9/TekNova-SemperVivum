<?php
/**
 * @var ?string $pageTitle
 * @var ?array $cssFiles
 * @var ?array $jsFiles
 */

use Constants\App;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Compra plantas y flores de interior y exterior, accesorios para jardinería y más. Descubre Sempervivum, el hogar de tu pasión por lo verde.">
    <meta name="keywords" content="Tienda de plantas, plantas de interior y exterior, accesorios de jardinería, semillas y bulbos, cuidado de plantas, macetas, flores frescas, decoración de jardines, plantas y flores de interior y exterior.">
    <meta name="author" content="<?= App::APP_AUTHOR ?>">
    <link rel="stylesheet" href="/assets/css/lib/bootstrap.min.css">

    <link rel="stylesheet" href="/assets/css/variables.css">
    <link rel="stylesheet" href="/assets/css/fonts.css">
    <link rel="stylesheet" href="/assets/css/utils.css">
    <link rel="stylesheet" href="/assets/css/global.css">

    <?php if (isset($cssFiles)): ?>
        <?php foreach ($cssFiles as $cssFile): ?>
            <link rel="stylesheet" href="/assets/css/<?= $cssFile ?>">
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (isset($jsFiles)): ?>
        <?php foreach ($jsFiles as $jsFile): ?>
            <script src="/assets/js/<?= $jsFile ?>" defer></script>
        <?php endforeach; ?>
    <?php endif; ?>

    <title><?= App::APP_TITLE ?> - <?= isset($pageTitle) ? $pageTitle : 'Inicio' ?> | <?= App:: APP_DESCRIPTION ?></title>
</head>