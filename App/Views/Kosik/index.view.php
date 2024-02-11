<?php
/** @var \App\Models\produkt[] $data */
/** @var \App\Core\IAuthenticator $auth */
if ($data != null) {
    $obje = $data[0];
}

$suma = 0;
?>


<link rel="stylesheet" href="/public/css/Kosik.css">

<?php if (!$auth->isLogged()) { ?>
    <p>Pre zobrazenie košíka sa musíte prihlásiť.</p>
<?php } else if ($obje == null) { ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5">
                <p>Košík je prázdny.</p>
                <p>Chcete sa vrátiť <a href="?c=home">späť</a> na hlavnú stránku?</p>
            </div>
        </div>
    </div>
<?php } else { ?>
    <h2>Nákupný košík</h2>
    <div class="container">
        <div class="d-flex flex-wrap justify-content-around">
            <?php foreach ($obje as $produkt) { ?>
                <div class="card" style="width: 18rem; overflow: hidden;">
                    <div class="card-body d-flex flex-column align-items-center" style="overflow: hidden;">
                        <img class="card-img-top" src="<?= $produkt->getObrazok()?>" alt="Card image cap" style="object-fit: cover; height: 200px; width: 100%;">
                        <h5 class="card-title"><?= $produkt->getNazovPr() ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $produkt->getCena() ?>€</h6>
                        <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#zrusenieModal<?php echo $produkt->getIdPr() ?>">Zmazať</a>
                    </div>
                </div>
                <?php $suma += $produkt->getCena(); ?>

                <div class="modal fade" id="zrusenieModal<?php echo $produkt->getIdPr() ?>" tabindex="-1" aria-labelledby="zrusenieModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="zrusenieModalLabel">Zrušenie produktu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Naozaj chcete zmazať produkt?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nie</button>
                                <a href="?c=kosik&a=vymazanieProduktu&id_pro=<?= $produkt->getIdPr() ?>" class="btn btn-success">Áno</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="modal-footer">
            <div class="text-center">
                <p>Výsledná suma je: <?= $suma ?>€</p>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                    Dokončit objednávku
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModal">Fakturačné údaje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="objednavka-form" action="/?c=kosik&a=odosliObjednavku" method="post">
                        <label for="meno"><b>Meno</b></label>
                        <input type="text" placeholder="Zadaj Meno" id="meno" name="meno" required>

                        <label for="priezvisko"><b>Priezvisko</b></label>
                        <input type="text" placeholder="Zadajte Priezvisko" id="priezvisko" name="priezvisko" required>

                        <label for="adresa"><b>Adresa</b></label>
                        <input type="text" placeholder="Zadajte adresu" id="adresa" name="adresa" required>

                        <label for="phone"><b>Telefónne číslo</b></label>
                        <input type="text" placeholder="Zadajte Telefon" id="phone" name="phone" required>

                        <label for="platba"><b>Vyberte Spôsob platby</b></label>
                        <select id="platba" name="platba" required>
                            <option value="karta">Platba kartou</option>
                            <option value="dobierka">Dobierka</option>
                        </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavrieť</button>
                    <button class="btn btn-success" type="submit" name="submit">Potvrď objednávku</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
