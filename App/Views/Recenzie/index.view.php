<?php
/** @var \App\Models\recenzie[] $data */
/** @var \App\Models\produkt[] $produkty */

$recenzie = $data[0];
$produkty = $data[1];

/** @var \App\Core\IAuthenticator $auth */
?>
<link rel="stylesheet" href="/public/css/Recenzie.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="public/js/recenzia.js"></script>

<div>
    <?php if ($auth->isLogged()) { ?>
        <h2>Napíš recenziu</h2>
        <form id="formular" action="/?c=recenzie&a=naplnenie" method="post">
            <div class="cont">
                <hr>
                <div class="form-group">
                    <label for="nazovProduktu" class="bold"><b>Vyberte Produkt</b></label>
                    <select class="form-control" id="nazovProduktu" name="nazovProduktu">
                        <?php foreach ($produkty as $produkt) : ?>
                            <option value="<?= $produkt->getIdPr() ?>"><?= $produkt->getNazovPr() ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="recenzia"><b>Recenzia</b></label>
                    <textarea placeholder="Zadajte Recenziu" id="recenzia" name="recenzia" required></textarea>

                    <div class="hodnotenie-container">
                        <label for="hodnotenie" class="bold"><b>Priradte hodnotenie</b></label>
                        <div class="star-rating">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <input type="radio" id="rating<?= $i ?>" name="hodnotenie" value="<?= $i ?>"/>
                                <label for="rating<?= $i ?>" title="<?= $i ?> stars">&#9733;</label>
                            <?php endfor; ?>
                        </div>
                    </div>

                    <div class="clearfix">
                        <button type="submit" name="submit" class="odoslat"><b>Odoslať recenziu</b></button>
                    </div>
                </div>
            </div>
        </form>
    <?php } else { ?>
        <h3>Pre pridanie recenzie sa musíte prihlásiť</h3>
    <?php } ?>
</div>

<?php foreach ($recenzie as $recenzia) : ?>
    <div class="card">
        <div class="card-header">
            Recenzia
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>
                <?php
                $hodnotenie = $recenzia->getHodnotenie();
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $hodnotenie) {
                        echo '&#9733;';
                    } else {
                        echo '&#9734;';
                    }
                }
                ?>
                </p>
                <p><?= $recenzia->getRecenzia() ?></p>
                <footer class="blockquote-footer"><?= \App\Models\zakaznik::getOne($recenzia->getIdZak())->getLogin() ?>
                    <cite title="Source Title"><?= $recenzia->getDatum() ?></cite></footer>
            </blockquote>
            <?php if ($auth->isLogged() && $recenzia->getIdZak() == $auth->getLoggedUserId()) : ?>
                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#zrusenieModal_<?php echo $recenzia->getId() ?>">Zmazať</a>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal_<?php echo $recenzia->getId() ?>">Editovať</button>
            <?php endif; ?>

        </div>
    </div>


    <div class="modal fade" id="zrusenieModal_<?php echo $recenzia->getId() ?>" tabindex="-1" aria-labelledby="zrusenieModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="zrusenieModalLabel">Zrušenie recenzie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Naozaj chcete zmazať recenziu?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nie</button>
                    <a href="?c=recenzie&a=vymazanieRecenzie&id=<?php echo $recenzia->getId() ?>" class="btn btn-success">Áno</a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editModal_<?php echo $recenzia->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel_<?php echo $recenzia->getId() ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title bold" id="editModalLabel_<?php echo $recenzia->getId() ?>">Editovať Recenziu</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formEditBlogpost_<?php echo $recenzia->getId() ?>" method="post" action="?c=recenzie&a=editRecenzie&id=<?php echo $recenzia->getId() ?>">
                        <div class="form-group">
                            <label for="editBlogText" class="bold">Text</label>
                            <textarea required maxlength="100" minlength="5" type="textarea" class="form-control" rows="10" id="editRecenzieT_<?php echo $recenzia->getId() ?>" name="editRecenzie"><?php echo $recenzia->getRecenzia() ?></textarea>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
