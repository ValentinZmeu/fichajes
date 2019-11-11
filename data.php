<?php

/**
 * Esto es para evitar meter datos en la base de datos y ahorrarme queries y conexiones
 */

$data = [
    // tabla empleado
    'empleado' => [
        [
            'id_empleado' => 1,
            'id_rol' => 1,
            'id_contrato' => 1,
            'id_centro' => 1,
            'nombre' => 'Ana',
            'apellidos' => 'Martinez'
        ],
        [
            'id_empleado' => 2,
            'id_rol' => 2,
            'id_contrato' => 2,
            'id_centro' => 1,
            'nombre' => 'Juan',
            'apellidos' => 'Fernandez'
        ]
    ],
    // tabla rol
    'rol' => [
        [
            'id_rol' => 1,
            'nombre' => 'Gerente'
        ],
        [
            'id_rol' => 2,
            'nombre' => 'Empleado'
        ]
    ],
    // tabla contrato
    'contrato' => [
        [
            'id_contrato' => 1,
            'horas_diarias' => '8:00'
        ],
        [
            'id_contrato' => 2,
            'horas_diarias' => '6:00'
        ]
    ],
    // tabla centro
    'centro' => [
        [
            'id_centro' => 1,
            'nombre' => 'Oficina Central'
        ]
    ],
    // tabla fichaje
    'fichaje' => [
        [
            'id_fichaje' => 1,
            'id_empleado' => 1,
            'fecha' => '11/11/2019 1:00',
        ],
        [
            'id_fichaje' => 2,
            'id_empleado' => 1,
            'fecha' => '11/11/2019 10:00',
        ],

        [
            'id_fichaje' => 3,
            'id_empleado' => 2,
            'fecha' => '11/11/2019 9:30',
        ],
        [
            'id_fichaje' => 4,
            'id_empleado' => 2,
            'fecha' => '11/11/2019 3:15',
        ],

        [
            'id_fichaje' => 5,
            'id_empleado' => 2,
            'fecha' => '12/11/2019 9:23',
        ],
        [
            'id_fichaje' => 6,
            'id_empleado' => 2,
            'fecha' => '12/11/2019 14:45',
        ],
    ]
];