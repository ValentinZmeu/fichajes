<?php
namespace Models;

/**
 * Modelo de Empleado correspondiente a la tabla $table
 */
class Empleado extends BaseModel {
    protected $table = 'empleado';

    // los atributos como las columnas de la bd
    public $id_empleado;
    public $id_rol;
    public $id_contrato;
    public $id_centro;
    public $nombre;

    // modelos con los que se relaciona
    public $rol;
    public $contrato;
    public $centro;

    public function __construct( $data = [] ) {
        parent::__construct($data);
        if( $data ) {
            $this->setRelationsModels();
        }
    }

    private function setRelationsModels() {
        $this->rol = $this->id_rol ? Rol::model()->findByPk( $this->id_rol ) : null;
        $this->contrato = $this->id_contrato ? Contrato::model()->findByPk( $this->id_contrato ) : null;
        $this->centro = $this->id_centro ? Centro::model()->findByPk( $this->id_centro ) : null;
    }

}