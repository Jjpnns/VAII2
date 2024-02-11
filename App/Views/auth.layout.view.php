<?php

/** @var string $contentHTML */

use App\Core\IAuthenticator;


/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */

?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/css/stylIPStranky.css">

    <script src="public/js/script.js"></script>
</head>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/public/css/stylPStranky.css">

</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary" aria-label="Fourth navbar example">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            <img src="../../public/images/obrazky/Tea_plant.png" alt="Greeny" width="30" height="24">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04"
                aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?c=Home&a=index">Domov</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Produkty</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?c=produkty&a=kvety">Kvety</a></li>
                        <li><a class="dropdown-item" href="?c=produkty&a=rastliny">Rastliny</a></li>
                        <li><a class="dropdown-item" href="?c=produkty&a=bylinky">Byliny</a></li>
                        <li><a class="dropdown-item" href="?c=produkty&a=doplnky">Doplnky</a></li>
                    </ul>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?c=home&a=contact">Kontakt</a>
                </li>

            </ul>
            <div class="napravo">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?c=kosik">
                            <i class="bi bi-cart"  ></i>
                        </a>
                    </li>
                    <?php if (!$auth->isLogged()) { ?>
                        <li class="nav-item">
                            <a href="?c=auth" class="nav-link padding_left">Prihlásiť sa</a>
                        </li>


                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="?c=auth&a=logout" class="nav-link padding_left">Odhlásiť sa</a>
                        </li>

                        <li id="login">
                            <b id="loginDisplay"><?= $auth->getLoggedUserName() ?></b>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <form role="search">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>





<div class="container-fluid mt-3">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>


<div class="b-example-divider"></div>
<div class="container">
    <footer class="py-5">
        <div class="row">
            <div class="col-6 col-md-2 mb-3 justify-content-center">
                <h5>Kontakt</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">+421 906 233 455</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">greeny@gmail.com</a></li>
                </ul>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>© 2023 Greeny, Inc. All rights reserved.</p>
        </div>
    </footer>
</div>


</body>
</html>

