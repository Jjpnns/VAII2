<?php
/** @var Array $data */
?>

    <link rel="stylesheet" href="/public/css/Vyplnovanie.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


<form action="/?c=regis&a=naplnenie" method="post">
    <div class="container">
    <div class="nadpis" >
        <h1>Zaregistruj sa </h1>
        <p>Prosím Vás, vyplnte nasledujúce údaje</p>
    </div>
        <hr>
        <label for="meno"><b>Meno</b></label>
        <input type="text" placeholder="Zadaj Meno" id="meno" name="meno" required>
        <label for="priezvisko"><b>Priezvisko</b></label>
        <input type="text" placeholder="Zadajte Priezvisko" id="priezvisko" name="priezvisko" required>

        <label for="meno"><b>Prihlasovacie Meno</b></label>
        <input type="text" placeholder="login" id="login" name="login" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Zadajte Email" id="email" name="email" required>

        <label for="password"><b>Heslo</b></label>
        <input type="password" placeholder="Zadajte Heslo" id="password" name="password" required>

        <label for="psw-repeat"><b>Zopakujte Heslo</b></label>
        <input type="password" placeholder="Zopakujte Heslo" id="psw-repeat" name="psw-repeat" required>

        <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Zapamätať si ma
</label>

        <p>Vytvorením účtu súhlasíte s našimi <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
            <button type="submit" name="submit" class="signup">Prihlásiť sa</button>
        </div>
    </div>
</form>


