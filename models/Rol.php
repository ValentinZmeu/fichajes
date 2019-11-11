<?php
namespace Models;

/**
 * Modelo de Empleado correspondiente a la tabla $table
 */
class Rol extends BaseModel {
    protected $table = 'rol';

    // los atributos como las columnas de la bd
    public $id_rol;
    public $nombre;


}