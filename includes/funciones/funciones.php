<?php
    function productos_json(&$boletos, &$camisas = 0, &$etiquetas = 0){
        
        
        $dias = array(0=>'un_dia', 1=>'pase_completo', 2=>'dos_dias');
        $total_boletos = array_combine($dias, $boletos);
        $json = array();
        
        foreach($total_boletos as $key => $boletos){
            if((int) $boletos > 0){
                $json[$key] = (int) $boletos;
            };
        };

        if((int)$camisas > 0){
            $json['camisas'] = (int)$camisas;
        } 

        if((int)$etiquetas > 0){
            $json['etiquetas'] = (int)$etiquetas;
        } 
        return json_encode($json);
    }

    //funcion de registro
    function eventos_json(&$eventos){
        $json = array();

        foreach ($eventos as $evento) {
            $json['eventos'][]=$evento;
        }

        return json_encode($json);
    }
?>