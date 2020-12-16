<section class="contenedor seccion">
    <h2>invitados</h2>
    <?php
        try{
            require_once('includes/funciones/bd_conexion.php');//Crear conexión
            $sql = " SELECT * FROM `invitados`";//escribir consulta
            $resultado = $conn_dataBase->query($sql); //realizando consulta a la BD
        }catch(\Exceptions $e){
            echo $e->getMessage();
        }
    ?>
    <div class="calendario">
        <div class="lista-invitados">
            <?php
                //$eventos = $resultado->fetch_assoc(); //imprimiento consulta en pantalla
                while($invitados = $resultado->fetch_assoc() ){ ?>
                    <div class="invitado">
                        <a class="invitado-info" href="#invitado<?php echo $invitados['invitado_id']?>">
                            <img src="img - web/<?php echo $invitados['url_imagen'];?>" alt="invitado">
                            <p><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado'];?></p>
                        </a>
                    </div>
                    <div style="display:none;" >
                        <div class="invitado-info" id="invitado<?php echo $invitados['invitado_id'];?>">
                            <h2><?php echo $invitados['nombre_invitado'] . " " . $invitados['apellido_invitado'];?></h2>
                            <img src="img - web/<?php echo $invitados['url_imagen'];?>" alt="invitado">
                            <p><?php echo $invitados['descripcion'];?></p>
                        </div>
                    </div>
                    
            <?php } //while de eventos?>
            
                    
        </div> 
    </div>
    <?php
        $conn_dataBase->close();//cerrar conexión
    ?>
  
</section>