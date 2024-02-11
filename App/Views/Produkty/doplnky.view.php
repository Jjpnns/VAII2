<div class="con">
    <?php
    /** @var \App\Core\IAuthenticator $auth */
    /** @var \App\Models\produkt $data */
    $doplnky = $data[0];


    ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/public/css/Produkty.css">

    <div class="d-flex flex-wrap justify-content-around">
        <?php foreach ($doplnky as $produkt) { ?>
            <div class="card" style="width: 18rem; overflow: hidden;">
                <div class="card-body d-flex flex-column align-items-center" style="overflow: hidden;">
                    <img class="card-img-top" src="<?php echo $produkt->getObrazok() ?>" alt="Card image cap" style="object-fit: cover; height: 200px; width: 100%;">
                    <h5 class="card-title"><?php echo $produkt->getNazovPr() ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $produkt->getCena() ?>€</h6>
                    <p class="card-text" style="max-height: 60px; overflow: hidden;"><?php echo $produkt->getPopisPr() ?></p>
                    <p class="card-text-full" style="display: none;"><?php echo $produkt->getPopisPr() ?></p>
                    <a href="#" class="card-link-green toggleFullText">Zobrazit víc</a>
                    <?php if ($auth->isLogged()) { ?>
                        <a href="" class="card-link-green addToCart"
                           data-id="<?php echo $produkt->getIdPr(); ?>"
                           data-nazov="<?php echo $produkt->getNazovPr(); ?>"
                           data-cena="<?php echo $produkt->getCena(); ?>"
                        >
                            Pridať do košíka
                        </a>
                    <?php } ?>


                    <a href="?c=recenzie" class="card-link-green">Recenzie</a>
                </div>
            </div>
        <?php } ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="public/js/objednavky_script.js"></script>
</div>
