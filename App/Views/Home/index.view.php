<?php
/** @var \App\Models\produkt $data */
/** @var \App\Core\IAuthenticator $auth */
$produkty = $data[0];


?>


<link rel="stylesheet" href="/public/css/stylPStranky.css">

<div class="slideshow-container">

    <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="../../public/images/obrazky/plants.jpg" alt="rastliny">
    </div>

    <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="../../public/images/obrazky/flowers.jpg" alt="kvety">

    </div>

    <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="../../public/images/obrazky/herbs.jpg" alt="bylinky">
    </div>

    <div class="mySlides fade">
        <div class="numbertext"></div>
        <img src="../../public/images/obrazky/yankee-christmas-group2-008-hrc-1635950720.jpg" alt="yankee">

    </div>
</div>


<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 2000);
    }
</script>
<!--nechce mi to ist ked je scrip v ajava-->

<a class="textik" href="#">
    <h1> Vitajte!</h1>
</a>
<h2> Niečo o nás</h2>
<h3>Vitajte na stránke nášho kvetinárstva a záhradníckom centre! Sme Vaším spoľahlivým zdrojom pre krásne kvety, zdravé
    rastliny a liečivé byliny. S dlhoročnými skúsenosťami a vášňou pre záhradníctvo vám prinášame rozmanitý výber
    kvalitných produktov pre vašu záhradu a interiér.</h3>

<h2>TOP PICK</h2>
<div class = "row">
<?php foreach ($produkty as $produkt) { ?>
    <div class="card" style="width: 18rem;">
            <div class="card-body d-flex flex-column align-items-center" style="overflow: hidden;">
                <img class="card-img-top" src="<?php echo $produkt->getObrazok() ?>" alt="Card image cap" style="object-fit: cover; height: 200px; width: 100%;">
                <h5 class="card-title"><?php echo $produkt->getNazovPr() ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $produkt->getCena() ?>€</h6>
                <p class="card-text" style="max-height: 60px; overflow: hidden;"><?php echo $produkt->getPopisPr() ?></p>
                <p class="card-text-full" style="display: none;"><?php echo $produkt->getPopisPr() ?></p>
                <a href="#" class="card-link-green toggleFullText">Zobraziť viac</a>
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

<div class="voucher"></div>
<h2>Darčekový poukaz</h2>
<p>Hľadáte dokonalý darček pre vašich blízkych? Nieste si istý, čo by ich mohlo potešiť? Máme pre vás riešenie! Naše
    darčekové poukazy sú ideálnym darčekom pre všetkých milovníkov kvetín, rastlín a byliniek. S týmto poukazom si môžu
    slobodne vybrať tie najkrajšie kvety a najzdravšie rastliny, ktoré im prinesú radosť a krásu do domova.</p>
<h3>Prečo naše darčekové poukazy?</h3>
<ul>
    <li>Široký výber: V našom kvetinárstve nájdu nespočetné množstvo druhov kvetín, exotických rastlín a liečivých
        bylín. Vďaka darcovskému poukazu si môžu vybrať tie, ktoré ich najviac nadchli.
    </li>

    <li>Kvalita a krása: Každý z našich produktov je starostlivo vybraný a pestovaný s láskou a starostlivosťou. Vaši
        blízki si tak môžu byť istí, že dostávajú rastliny v najlepšom stave.
    </li>

    <li>Flexibilita: Darcovský poukaz je flexibilnou voľbou, ktorá umožňuje obdarovaným slobodne vybrať, kedy a ako chcú
        svoj darček využiť.
    </li>
</ul>
<div class="klikNaNakupVouchera">
    <h3><a href="?c=preukaz">Ako zakúpiť darčekový poukaz</a></h3>
</div>

<div class="obrazok-container">
    <img src="../../public/images/voucher/voucher.png" alt="Obrázok" class="stredny-obrazok">
</div>
