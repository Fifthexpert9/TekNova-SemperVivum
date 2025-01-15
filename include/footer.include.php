<?php
use \Constants\App;
?>

</body>
<footer class="w-100 text-center mt-auto">
    <div class="d-flex flex-wrap justify-content-around">
        <section class="footer-section">
            <h3 class="mb-2 fw-bold">Sempervivum</h3>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Plantas</a></li>
                <li><a href="#">Flores</a></li>
                <li><a href="#">Accesorios</a></li>
                <li><a href="#">Mistery Plantbox</a></li>
            </ul>
        </section>
        <section class="footer-section">
            <h3>Contacto</h3>
            <p>Email: <a href="mailto:info@sempervivum.com">info@sempervivum.com</a></p>
            <p>Teléfono: <a href="tel:+34910000000">+34 910 000 000</a></p>
        </section>
        <section class="footer-section">
            <h3>Síguenos</h3>
            <div class="social-media">
                <a href="#" class="social-icon">Facebook</a>
                <a href="#" class="social-icon">Instagram</a>
                <a href="#" class="social-icon">Twitter</a>
            </div>
        </section>
    </div>
    <div class="footer-copyright">
        <p>&copy; 2024 - <?= date('Y') ?> | <?= App::APP_TITLE ?> - Todos los derechos reservados.</p>
    </div>
</footer>