<?php

$layout = 'auth';
/** @var \App\Core\IAuthenticator $auth */
/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<selection class= "">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="/public/css/Prihlasenie.css">


    <nav class="navbar navbar-expand-lg bg-body-tertiary" aria-label="Fourth navbar example">
    <div class="container-fluid">
        <link rel="stylesheet" href="/public/css/Prihlasenie.css">

        <?php if (!$auth->isLogged()) { ?>


<form method="post" action="<?=\App\Config\Configuration::LOGIN_URL?>">

    <div class="container">
        <label for="login"><b>Login</b></label>
        <input name= "login" type="text" id="login" placeholder="Zadajte Login" required>


        <label for="password"><b>Heslo</b></label>
        <input name= "password" type="password" id="password" placeholder="Zadajte Heslo" required>

        <button class="button" type="submit" name="submit">Prihlásiť sa</button>

    </div>

    <div class="container">
        <a href="?c=regis&a=index" class="Registration">Zaregistrovať sa</a>
    </div>
</form>
        <?php } ?>
<script>

    var modal = document.getElementById('id01');


    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


</selection>