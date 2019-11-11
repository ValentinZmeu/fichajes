<?php
namespace Models;

/**
 * Modelo de Empleado correspondiente a la tabla $table
 */
class Fichaje extends BaseModel {
    protected $table = 'fichaje';

    // los atributos como las columnas de la bd
    public $id_fichaje;
    public $id_empleado;
    public $fecha;

    // con el id de usuarios y una fecha devuelve las horas hechas por el mismo
    public static function getHorasTrabajadasPorDias($id_empleado) {
        $diasHoras = [];
        $temp = [];
        // se considera que va a haber una hora de entrada y otra de salida por día
        $fichajes = self::model()->findWhere([
            ['id_empleado', $id_empleado],
        ]);


        foreach ($fichajes as $i => $fichaje) {
            if( isset($fichaje->fecha) ) {
                $fecha = date( "m/d/Y", strtotime($fichaje->fecha) );

                // si se ha registrado una hora se hace la diferencia
                if( isset($temp[$fecha]) ) {
                    $datetime1 = new \DateTime($temp[$fecha]);
                    $datetime2 = new \DateTime($fichaje->fecha);
                    $interval = $datetime1->diff($datetime2);
                    $diasHoras[$fecha] =  $interval->format('%H').":".$interval->format('%I');
                } else {
                    $temp[$fecha] = $fichaje->fecha;
                }
            }
        }

        return $diasHoras;
    }
}