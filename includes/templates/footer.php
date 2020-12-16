<footer class="site-footer seccion">
        <div class="contenedor">
            <div class="bloques-footer">
                <div class="informacion-footer bloque">
                    <h3>sobre <span>Gdlwebcamp</span></h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis libero consequatur earum consectetur vel voluptatibus sapiente modi labore, sed sunt error illum dolorem amet quam quod a quos voluptatum nihil!</p>
                </div>
                <div class="ultimos-tweets bloque">
                    <h3>ultimos <span>tweets</span></h3>
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. #Pellentesque Nam a mauris non dui suscipit condimentum.</li>
                        <li>Lorem ipsum dolor sit amet,#Justo consectetur adipiscing elit. Nam a mauris non dui suscipit condimentum.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam a mauris non dui suscipit condimentum @justo.</li>
                    </ul>
                </div>
                <div class="menu bloque">
                    <h3>redes <span>sociales</span></h3>
                    <nav class="redes">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
    <p class="copyright">Todos los derechos reservados GDLWEBCAMP 2019 &copy;</p>
    <!--End of my site content here-->
    <script src="js/vendor/modernizr-3.8.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')
    </script>
    <script src="js/plugins.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.lettering.js"></script>
    <?php
        $archivo = basename($_SERVER['PHP_SELF']);
        $pagina = str_replace(".php","",$archivo);
        if($pagina == 'invitados' || $pagina == 'index'){
            echo '<script src="js/jquery.colorbox-min.js"></script>';
        }
        else if($pagina == 'conferencia'){
            echo '<script src="js/lightbox.js"></script>';

        }
    ?>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script src="js/main.js"></script>

    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('set', 'transport', 'beacon');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>