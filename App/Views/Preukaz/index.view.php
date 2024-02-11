<?php
/** @var \App\Models\poukaz $data */
?>


<link rel="stylesheet" href="/public/css/preukaz.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

<script src="public/js/kupon.js"></script>



<form id="objednavka-form" action="/?c=preukaz&a=odosliPoukaz" method="post">
    <div class="objednavka-form">
        <div class="row">
            <div class="col-md-4">
                <label for="meno"><b>Meno</b></label>
                <input type="text" class="form-control mb-3" placeholder="Zadaj Meno" id="meno" name="meno" required>

            </div>
            <div class="col-md-4">
                <label for="priezvisko"><b>Priezvisko</b></label>
                <input type="text" class="form-control mb-3" placeholder="Zadajte Priezvisko" id="priezvisko" name="priezvisko" required>

            </div>
            <div class="col-md-4">
                <label for="email"><b>Email</b></label>
                <input type="email" class="form-control mb-3" placeholder="Zadajte adresu" id="email" name="email" required>

            </div>
        </div>

        <div class="hodnota-container">
            <label for="hodnota"><b>Vyberte hodnotu</b></label>
            <select class="form-control" id="hodnota" name="hodnota" required>
                <option value="10"> 10€</option>
                <option value="25"> 25€</option>
                <option value="50"> 50€</option>
            </select>

        </div>

        <label for="platba"><b>Vyberte Spôsob platby</b></label>
        <select id="platba" name="platba" required>
            <option value="karta">Platba kartou</option>
            <option value="dobierka">Dobierka</option>
        </select>


        <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#zrusenieModal">Zrušiť</button>
            <button type="submit" class="btn btn-success" id="potvrdenie">Potvrď objednávku</button>

        </div>

    </div>
</form>


















<!--<div class="modal fade" id="potvrdenieModal" tabindex="-1" aria-labelledby="potvrdenieModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="potvrdenieModalLabel">Potvrdenie objednávky</h5>-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                Naozaj chcete odoslať objednávku?-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nie</button>-->
<!--                <a href="?c=preukaz&a=odosliPoukaz" class="btn btn-success">Áno</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="modal fade" id="zrusenieModal" tabindex="-1" aria-labelledby="zrusenieModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="zrusenieModalLabel">Zrušenie objednávky</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Naozaj chcete zahodiť objednávku?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nie</button>
                <a href="?c=home" class="btn btn-success" id="zrusit">Áno</a>
            </div>
        </div>
    </div>
</div>






