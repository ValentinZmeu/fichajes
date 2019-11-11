<?php
namespace Models;


/**
 * Modelo base 
 */
class BaseModel {
    protected $table;

    // como argumento recibe un array asociativo con los datos a asignar al modelo
    public function __construct($data = []) {
        foreach( $data as $key => $value ) {
            $this->$key = $value;
        }
    }

    // autoinstancia del modelo
    public static function model() {
        $callerClass = get_called_class();
        return new $callerClass();
    }
    
    // devuelve el modelo buscado por el id
    public function findByPk( $id ) {
        global $data;
        $response = null;
        
        if( isset($data[$this->table]) ) {
            $foundData = array_filter($data[$this->table], function($dataToFilter) use (&$id) {
                return isset($dataToFilter["id_{$this->table}"]) && $dataToFilter["id_{$this->table}"] == $id;
            });


            if( $foundData ) {
                $callerClass = get_called_class();
                $response = new $callerClass( reset($foundData) );
            }
        }

        return $response;
    }

    // devuelve un array de modelos buscado según las condiciones
    public function findWhere( $condition = [] ) {
        global $data;
        $response = [];

        $filteredData = array_filter($data[$this->table], function($dataToFilter) use (&$condition) {
            $isValid = true;

            // la condicion es array('campo', 'valor' [, bool]) que si trae el indice 2 como true, comprueba si contiene el 'valor'
            foreach ($condition as $values) {
                if( isset($values[2]) && $values[2]) {
                    // se comprueba si contiene
                    if( !(isset($dataToFilter[$values[0]]) && strpos($dataToFilter[$values[0]], $values[1]) !== false) ) {
                        $isValid = false;
                        break;
                    }
                } else {
                    // se comprueba si es exacto
                    if( !(isset($dataToFilter[$values[0]]) && $dataToFilter[$values[0]] == $values[1]) ) {
                        $isValid = false;
                        break;
                    }
                }
            }

            return $isValid;
        });

        if( $filteredData ) {
            $callerClass = get_called_class();

            foreach( $filteredData as $row ) {
                $response[] = new $callerClass( $row );
            }
        }
        
        return $response;
    }
    
}