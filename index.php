<?php include_once 'includes/templates/header.php';?>
    <section class="seccion contenedor">
        <h2>La mejor conferencia de diseño web en español</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, consequuntur cum! Tenetur architecto blanditiis laboriosam est voluptatibus praesentium nam reprehenderit unde sed odit, quo asperiores voluptatem nihil quasi reiciendis laborum.</p>
    </section>
    <!--Seccion-->
    <section class="programa">
        <div class="contenedor-video">
            <video loop autoplay poster="img - web/bg-talleres.jpg">
                <source src="video/video.mp4" type="video/mp4"> 
                <source src="video/video.webm" type="video/webm"> 
                <source src="video/video.ogv" type="video/ogv">  
            </video>
        </div>
        <div class="contenido-programa">
            <div class="contenedor">
                <div class="programa-evento">
                    <h2>programa del evento</h2>
                    <?php
                        try{
                            require_once('includes/funciones/bd_conexion.php');//Crear conexión
                            $sql = " SELECT * FROM `categoria_evento`";
                            $resultado = $conn_dataBase->query($sql); //realizando consulta a la BD
                        }catch(\Exceptions $e){
                            echo $e->getMessage();
                        }
                    ?>
                    <nav class="menu-programa">
                        <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) {?>
                            <?php $categoria = $cat['cat_evento'];?>
                        
                            <a href="#<?php echo strtolower($categoria);?>">
                            <i class="fas <?php echo $cat['icono'];?>"></i><?php echo $categoria;?>
                            </a>

                        <?php } ?>
                    </nav>
                    <?php
                        try{
                            require_once('includes/funciones/bd_conexion.php');//Crear conexión
                            $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";//escribir consulta
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento ";
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN invitados ";
                            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= " AND eventos.id_cat_evento = 1 ";
                            $sql .= " ORDER BY `evento_id` LIMIT 2;";
                            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";//escribir consulta
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento ";
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN invitados ";
                            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= " AND eventos.id_cat_evento = 2 ";
                            $sql .= " ORDER BY `evento_id` LIMIT 2;";
                            $sql .= " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";//escribir consulta
                            $sql .= " FROM eventos ";
                            $sql .= " INNER JOIN categoria_evento ";
                            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                            $sql .= " INNER JOIN invitados ";
                            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                            $sql .= " AND eventos.id_cat_evento = 3 ";
                            $sql .= " ORDER BY `evento_id` LIMIT 2;";
                        }catch(\Exceptions $e){
                            echo $e->getMessage();
                        }
                    ?>
                    <?php $conn_dataBase->multi_query($sql); ?>
                    <?php 
                        do {
                            $resultado = $conn_dataBase->store_result();
                            $row = $resultado->fetch_all(MYSQLI_ASSOC);  ?>

                            <?php $i = 0; ?>
                           <?php foreach($row as $evento): ?>
                                <?php if($i % 2 == 0){?> 
                                    <!--Menu-->
                                    <div id="<?php echo strtolower($evento['cat_evento']);?>" class="info-curso ocultar">
                                <?php } ?>
                                    <div class="detalle-evento">
                                        <h3><?php echo $evento['nombre_evento']; ?></h3>
                                        <p><i class="far fa-clock"></i><?php echo $evento['hora_evento']; ?></p>
                                        <p><i class="far fa-calendar-alt"></i><?php echo $evento['fecha_evento']; ?></p>
                                        <p><i class="fas fa-user"></i><?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado']; ?></p>
                                        
                                        <!--Boton con Flex-->
                                    </div>
                                    <!--detalles-->
                                <?php if($i % 2 == 1):?>     
                                    </div>                                   
                                    <!--talleres-->
                                <?php endif; ?>                                
                                <?php $i++;?>
                            <?php endforeach; ?> 
                            <?php $resultado->free(); ?>
                       <?php } while ($conn_dataBase->more_results() && $conn_dataBase->next_result());?>
                       <div class="ver-todos">
                            <a href="calendario.php" class="button">Ver todos</a>
                        </div>
                </div>
                <!--Eventos del Programa-->
            </div>
        </div>
        <!--contenido-->
    </section>
    <!--Seccion/Programa-->

    <?php include_once 'includes/templates/invitados.php';?>
    <!--fotos y descripcion de invitados-->

    <div class="parallax contador">
        <div class="contenedor">
            <ul class="contador-evento">
                <li>
                    <p class="numero"></p>invitados
                </li>
                <li>
                    <p class="numero"></p>talleres
                </li>
                <li>
                    <p class="numero"></p>dias
                </li>
                <li>
                    <p class="numero"></p>conferencias
                </li>
            </ul>
            <!--Contador de evento-->

        </div>
    </div>
    <!--Contador/Parallax-->
    <section class="seccion precios">
        <div class="contenedor">
            <h2>Precios</h2>
            <div class="tablas-precios">
                <ul class="lista-precios">
                    <div class="tabla-precio">
                        <h3>Pase por día</h3>
                        <p class="numero">$30</p>
                        <ul>
                            <li>bocadillos gratis</li>
                            <li>todas las conferencias</li>
                            <li>todos los talleres</li>
                        </ul>
                        <a href="reservaciones.php" class="button hollow">Comprar</a>
                    </div>
                    <div class="tabla-precio">
                        <h3>todos los días</h3>
                        <p class="numero">$50</p>
                        <ul>
                            <li>bocadillos gratis</li>
                            <li>todas las conferencias</li>
                            <li>todos los talleres</li>
                        </ul>
                        <a href="reservaciones.php" class="button ">Comprar</a>
                    </div>
                    <div class="tabla-precio">
                        <h3>Pase por 2 días</h3>
                        <p class="numero">$45</p>
                        <ul>
                            <li>bocadillos gratis</li>
                            <li>todas las conferencias</li>
                            <li>todos los talleres</li>
                        </ul>
                        <a href="reservaciones.php" class="button hollow">Comprar</a>
                    </div>
                </ul>
                <!--Lista de precios-->
            </div>
            <!--Tablas de precios-->
        </div>
    </section>
    <div id="mapa" class="mapa"></div>
    <!--Mapa-->
    <section class="seccion contenedor">
        <h2>testimoniales</h2>
        <div class="testimoniales contenedor">
            <div class="testimonial">
                <blockquote>
                    <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque amet laudantium harum commodi aliquid cupiditate iusto! Nobis cupiditate repudiandae.</p>
                    <footer class="testimonial-footer">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo aponte escobedo<span>diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <div class="testimonial">
                <blockquote>
                    <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque amet laudantium harum commodi aliquid cupiditate iusto! Nobis cupiditate repudiandae.</p>
                    <footer class="testimonial-footer">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo aponte escobedo<span>diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
            <div class="testimonial">
                <blockquote>
                    <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque amet laudantium harum commodi aliquid cupiditate iusto! Nobis cupiditate repudiandae.</p>
                    <footer class="testimonial-footer">
                        <img src="img/testimonial.jpg" alt="imagen testimonial">
                        <cite>Oswaldo aponte escobedo<span>diseñador en @prisma</span></cite>
                    </footer>
                </blockquote>
            </div>
        </div>
    </section>
    <!--Precios-->
    <section class="newsletter parallax">
        <div class="contenedor contenido-nws">
            <p>registrate al newsletter:</p>
            <h3>Gdlwebcamp</h3>
            <a href="#" class="button transparente">registro</a>
        </div>
    </section>
    <!--newsletter-->
    <section class="cuenta-regresiva">
        <h2>Faltan</h2>
        <div class="contenedor">
            <ul class="count-down">
                <li>
                    <p id="dias" class="numero"></p>días
                </li>
                <li>
                    <p id="horas" class="numero"></p>horas
                </li>
                <li>
                    <p id="minutos" class="numero"></p>minutos
                </li>
                <li>
                    <p id="segundos" class="numero"></p>segundos
                </li>
            </ul>
            <!--Contador de evento-->
        </div>
    </section>
    <!--Conteo regresivo-->
<?php include_once 'includes/templates/footer.php';?>
