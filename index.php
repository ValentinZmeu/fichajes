<?php


require_once dirname(__FILE__) . '/functions.php';
require_once dirname(__FILE__) . '/data.php';
include_once dirname(__FILE__) . '/models/BaseModel.php';
include_once dirname(__FILE__) . '/models/Empleado.php';
include_once dirname(__FILE__) . '/models/Rol.php';
include_once dirname(__FILE__) . '/models/Contrato.php';
include_once dirname(__FILE__) . '/models/Centro.php';
include_once dirname(__FILE__) . '/models/Fichaje.php';


if( !isset($_REQUEST['id_empleado']) ) {
    echo "<h2 style='text-align:center;'>Debes introducir un parametro 'id_empleado=[1,2]' para poder hacer la mágia. <br> <a href='?id_empleado=1'>Magia con empleado 1</a> <br> <a href='?id_empleado=2'>Magia con empleado 2</a> ";
} else {
    $empleado = \Models\Empleado::model()->findByPk($_REQUEST['id_empleado']);
    $diasHoras = \Models\Fichaje::getHorasTrabajadasPorDias($empleado->id_empleado);

    echo "<h4>Empleado : {$empleado->nombre} {$empleado->apellidos}";

    foreach($diasHoras as $dia => $horasTrabajadas) {
        $trabajado = strtotime($horasTrabajadas);
        $contrato = strtotime($empleado->contrato->horas_diarias);
        $diferencia = $trabajado > $contrato ? ($trabajado - $contrato) : ($contrato - $trabajado) ;
        
        $diferencia = date('H:i',  $diferencia);

        // si ha trabajado más horas
        echo "<h5> - El dia $dia ha trabajado $diferencia horas ";
        if($trabajado > $contrato) {
            echo "mas ";
        } else { // si ha trabajado menos
            echo "menos ";
        }

        echo "de las que le corresponde por contrato ({$empleado->contrato->horas_diarias})</h5>";
    }

}