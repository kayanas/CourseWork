<?php

include "./controllers/ShopController.php";

$edit = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['save'])) {
        ShopController::store();
        header("Location: ./index.php");
        die;
    }

    if (isset($_POST['edit'])) {
        $shop = ShopController::show();
        $edit = true;
    }

    if (isset($_POST['update'])) {
        $movie = ShopController::update();
        header("Location: ./index.php");
        die;
    }

    if (isset($_POST['destroy'])) {
        $shop = ShopController::destroy();
        header("Location: ./index.php");
        die;
    }

    if (isset($_POST['destroycard'])) {
        $shop = ShopController::destroy();
        header("Location: ./index.cards.php");
        die;
    }
}

if (isset($_GET['search'])) {
    $shops = ShopController::filter();
} else if (isset($_GET['sort'])) {
    $shops = ShopController::sort();
} else {
    $shops = ShopController::index();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
    <title>Urmo Baze - Parduotuviu Tinklas</title>
</head>

<body style="background-color: orange;">

    <nav class="navbar navbar-light sticky-top">

        <div class="navbar">

            <a class="navbar-brand navbar-text" href="./index.php"><img class="logo" src="./images/urmas.png"></a>
            <a class="navbar navbar-text" href="./index.cards.php"> | IMONES |</a>
            <a class="navbar navbar-text" href="./index.about.php"> | APIE MUS |</a>
            <a class="navbar navbar-text" href="./index.planas.php"> | PLANAS |</a>


        </div>
        <form class="d-flex search" method="get">
            <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

    </nav>