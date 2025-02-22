<?php
/**
 * @var Product[] $products
 */

use Models\Product;

$cssFiles = [
    'landing.css'
];

require_once __DIR__ . '/../include/head.include.php';
require_once __DIR__ . '/../include/header.include.php';
?>

<main class="container text-center">
    <section class="row justify-content-center">
        <div class="col-12">
            <h1>Tu casa siempre viva,<br>para que tus días sean más verdes</h1>
            <p>
                Nuestras plantas tienen la maravillosa cualidad de no ponerse feas nunca.<br>
                ¡Por eso <b>siempre están vivas</b>!<br>
                Échales un ojo, y si algo te gusta ya sabes... ¡llévatelas al carrito!
            </p>
        </div>
    </section>

    <section class="row justify-content-center align-items-center mt-4">
        <div class="col-12 col-md-6">
            <img class="img-fluid b-1" src="../assets/imgs/ini1.webp" alt="Plantas suculentas">
        </div>

        <figure class="col-12 col-md-6 text-center">
            <img class="img-fluid b-1" src="../assets/imgs/phylodendron.webp" alt="Phylodendron Silver Sword">
            <figcaption>
                <p>
                    Solo durante este mes, esta auténtica belleza puede ser tuya por muy poco. 
                    Añade el <i>Philodendron Silver Sword</i> con un 50% dto.<br>
                    ¡Una oportunidad única!
                    <br>Aprovecha este momento para disfrutar de verla crecer a tu lado.
                </p>
                <a href="#" class="btn btn-primary grow">COMPRAR -50%</a>
            </figcaption>
        </figure>
    </section>

    <article class="row justify-content-center">
        <div class="col-12">
            <h1>¡Conoce a las nuevas consentidas!</h1>
            <p class="mt-4">
                Cada una ha crecido entre cuidados, luz perfecta y mimos constantes. 
                Aquí solo las más saludables y elegantes tienen el honor de adornar tu hogar. 
                ¡Descubre la nobleza de nuestras plantas y llévate un pedacito de naturaleza selecta!
            </p>
            <a href="#" class="btn btn-primary mt-3 grow">NUESTRAS CONSENTIDAS</a>
        </div>

        <div id="carouselExampleControls" class="carousel slide w-100 mt-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($products as $index => $product): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <img src="<?= $product->getImage() ?>" class="d-block w-100 img-fluid b-1" alt="<?= $product->getName() ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </article>

    <article class="row align-items-center mt-5 text-md-end text-center flex-column-reverse flex-md-row">
        <div class="col-12 col-md-6">
            <h1 class="mt-0">Mystery Box</h1>
            <p>
                <i>¿Qué es? ¿QUÉ ES? Hay luces de color. ¿Qué es? Parecen de algodón.</i>
                <br>
                No, no hay luces de colores ni algodón. Pero te vas a llevar una sorpresa igual.
                <br>
                Es una caja <i>mágica</i>, que cada mes llegará a tu puerta con una nueva mini plantita 
                que demandará todo tu amor.
                <br>
                ¿Estás list@ para descubrir cuál te tocará a ti?
            </p>
            <a href="#" class="btn btn-primary grow">¡QUIERO MI MYSTERY PLANTBOX!</a>
        </div>

        <div class="col-12 col-md-6 text-center">
            <img class="img-fluid b-1" src="../assets/imgs/misteryPlantbox.webp" alt="Mystery Box">
        </div>
    </article>
</main>


<?php
require_once __DIR__ . '/../include/footer.include.php';
require_once __DIR__ . '/../include/scripts.include.php';
?>