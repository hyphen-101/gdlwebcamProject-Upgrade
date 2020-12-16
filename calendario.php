

<?php include_once 'includes/templates/header.php';?>

<section class="contenedor seccion">
    <h2>Calendario de eventos</h2>
    <?php
        try{
            require_once('includes/funciones/bd_conexion.php');//Crear conexión
            $sql = " SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";//escribir consulta
            $sql .= " FROM eventos ";
            $sql .= " INNER JOIN categoria_evento ";
            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
            $sql .= " INNER JOIN invitados ";
            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
            $sql .= " ORDER BY evento_id ";
            $resultado = $conn_dataBase->query($sql); //realizando consulta a la BD
        }catch(\Exceptions $e){
            echo $e->getMessage();
        }
    ?>
    <div class="calendario">
        <?php
//$eventos = $resultado->fetch_assoc(); //imprimiento consulta en pantalla
            $calendario = array();
            while($eventos = $resultado->fetch_assoc() ){ ?>
                
                <?php 
                $fecha = $eventos['fecha_evento'];
                $evento = array(
                    'titulo' => $eventos['nombre_evento'],
                    'fecha' => $eventos['fecha_evento'],
                    'hora' => $eventos['hora_evento'],
                    'categoria' => $eventos['cat_evento'],
                    'icono' => $eventos['icono'],
                    'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']
                );
                $calendario[$fecha][] = $evento;
                ?>
                
           <?php } //while de eventos?>
           
             <?php
                //imprimiendo los eventos
                foreach($calendario as $dia => $lista_eventos){ ?>
                <h3>
                    <i class="far fa-calendar-alt"></i>
                    <?php
                        //para cambiar de ingles a español
                        setlocale(LC_TIME, 'spanish');

                        echo utf8_encode(strftime(" %A, %d de %B del %Y", strtotime($dia)));
                    ?>
                </h3>
            <div class="dia-grid">
                <?php
                    foreach($lista_eventos as $evento){?>
                        
                        <div class="dia">
                            <p class="titulo">
                                <?php echo $evento['titulo']; ?>
                            </p>
                            <p class="hora">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <?php echo $evento['fecha'] . " " . $evento['hora'];?>
                            </p>
                            <p class="categoria">
                                <i class="fas <?php echo $evento['icono'];?>" aria-hidden="true"></i>
                                <?php echo $evento['categoria'];?>
                            </p>
                            <p>
                                <i class="fas fa-user" aria-hidden="true"></i>
                                <?php echo $evento['invitado'];?>
                            </p>

                        </div>
                <?php } ?><!--Fin foreach evento-->
            </div><!--dia-grid-->
            <?php } ?><!-- for each dias///bucle para calendario-->
            
    </div>
    <?php
        $conn_dataBase->close();//cerrar conexión
    ?>
  
</section>

<?php include_once 'includes/templates/footer.php';?>

