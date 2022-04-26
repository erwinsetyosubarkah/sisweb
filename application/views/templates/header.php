<!DOCTYPE html>
<html lang="en">
<head>    

    <title><?= $pengaturan['nama_sekolah']; ?></title>

    <!-- favicon -->
    <link rel="icon" href="<?= base_url("assets/"); ?>img/icon/<?= $pengaturan['logo']; ?>" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url("assets/"); ?>bootstrap/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url("assets/"); ?>css/custom.css">

    <!-- Font Awesome -->
    <link href="<?= base_url("assets/"); ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    
</head>
<body>

    <?php require_once "navbar.php"; ?>

    <!-- container utama -->
    <div class="container container-utama">