<?php
$cssFiles = [
    'landing.css'
];

require_once __DIR__ . '/../include/head.include.php';
require_once __DIR__ . '/../include/header.include.php';
?>

<main class="d-flex flex-wrap justify-content-center">
    <section class="d-flex flex-wrap justify-content-center text-center w-100">
        <h1>Tu casa siempre viva,<br>para que tus días sean más verdes</h1>
        <p class="mt-4">
            Nuestras plantas tienen la maravillosa cualidad de no ponerse feas nunca.<br>
            ¡Por eso siempre están vivas!<br>
            Échales un ojo, y si algo te gusta ya sabes... ¡llévatelas al carrito!
        </p>
    </section>

    <section class="d-flex flex-wrap justify-content-evenly align-items-center mt-4 w-75 section-img-2">
        <img class="b-1" src="../assets/imgs/ini1.jpg" alt="Plantas suculentas">

        <figure class="d-flex flex-column align-items-center w-50">
            <img class="w-100 b-1" src="../assets/imgs/phylodendron.jpg" alt="Phylodendron Silver Sword">
            <figcaption class="d-flex flex-column align-items-center w-100">
                <p class="mt-4 text-center">
                    Solo durante este mes, esta auténtica belleza puede ser tuya por muy poco. Añade el Philodendron Silver Sword con un 50% dto.<br>
                    ¡Una oportunidad única!
                    <br>Aprovecha este momento para disfrutar de verla crecer a tu lado.
                </p>

                <a href="#" class="btn btn-primary grow">COMPRAR -50%</a>
            </figcaption>
        </figure>
    </section>

    <article class="d-flex flex-column align-items-center text-center">
        <h1>¡Conoce a tus nuevas consentidas!</h1>
        <p class="mt-4">
            Cada una ha crecido entre cuidados, luz perfecta y mimos constantes. Aquí solo las más saludables
            <br>
            y elegantes tienen el honor de adornar tu hogar. ¡Descubre la nobleza de nuestras plantas
            <br>
            y llévate un pedacito de naturaleza selecta!
        </p>

        <a href="#" class="btn btn-primary mt-3 grow">NUESTRAS CONSENTIDAS</a>

        <!-- TODO: Añadir texto alternativo a cada una de las imágenes -->

        <figure id="carouselExampleControls" class="carousel slide w-75 mt-6" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../assets/imgs/01.jpg" class="d-block w-100 b-1" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/imgs/02.jpg" class="d-block w-100 b-1" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../assets/imgs/03.jpg" class="d-block w-100 b-1" alt="...">
                </div>
            </div>

            <button class="carousel-control-prev b-1" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next b-1" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </figure>
    </article>

    <article class="d-flex align-items-center m-5 gap-5 mistery-box">
        <div class="text-end">
            <h1>Mistery Box</h1>
            <p>
                <i>¿Qué es? ¿QUÉ ES? Hay luces de color. ¿Qué es? Parecen de algodón.</i>
                <br>
                No, no hay luces de colores ni algodón. Pero te vas a llevar una sorpresa igual.
                <br>
                Es una caja <i>mágica</i>, que cada mes llegará a tu puerta con una nueva
                <br>
                mini plantita que demandará todo tu amor.
                <br>
                ¿Estás list@ para descubrir cuál te tocará a ti?
            </p>

            <a href="#" class="btn btn-primary grow">¡QUIERO MI MISTERY PLANTBOX!</a>
        </div>

        <img src="../assets/imgs/misteryPlantbox.jpg" alt="">
    </article>
</main>

<?php
require_once __DIR__ . '/../include/footer.include.php';
require_once __DIR__ . '/../include/scripts.include.php';
?>