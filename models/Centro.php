<?php
namespace Models;

/**
 * Modelo de Empleado correspondiente a la tabla $table
 */
class Centro extends BaseModel {
    protected $table = 'centro';

    // los atributos como las columnas de la bd
    public $id_centro;
    public $nombre;

}