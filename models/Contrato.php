<?php
namespace Models;

/**
 * Modelo de Empleado correspondiente a la tabla $table
 */
class Contrato extends BaseModel {
    protected $table = 'contrato';

    // los atributos como las columnas de la bd
    public $id_contrato;
    public $horas_diarias;

}