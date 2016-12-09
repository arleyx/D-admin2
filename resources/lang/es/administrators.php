<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Language for profile module
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'title' => 'Administradores',
    'description' => 'Administradores para administrar el sistema',

    'index' => [
        'title' => 'Listado de administradores',
        'table' => [
            'id' => 'ID',
            'create_at' => 'Fecha de creación',
            'name' => 'Nombre',
            'email' => 'Correo electronico',
            'role' => 'Rol',
            'action' => 'Acciones',
        ],
        'action' => [
            'create' => 'Crear',
            'edit' => 'Editar',
            'destroy' => 'Eliminar',
        ],
        'pagination' => 'Mostrando :firstItem a :lastItem de :total entradas'
    ],

    'create' => [
        'title' => 'Crear administrador',
        'form' => [
            'name' => ['field' => 'Nombre', 'placeholder' => 'Ingrese un Nombre'],
            'email' => ['field' => 'Correo electronico', 'placeholder' => 'Ingrese Correo electronico'],
            'password' => ['field' => 'Contraseña', 'placeholder' => 'Ingrese una Contraseña'],
            'password_confirmation' => ['field' => 'Confirmación de la contraseña', 'placeholder' => 'Ingrese la confirmación de la Contraseña'],
            'role_id' => ['field' => 'Rol'],
            'submit' => 'Enviar',
        ],
    ],

    'edit' => [
        'title' => 'Editar administrador',
        'form' => [
            'name' => ['field' => 'Nombre', 'placeholder' => 'Ingrese un Nombre'],
            'email' => ['field' => 'Correo electronico', 'placeholder' => 'Ingrese Correo electronico'],
            'password' => ['field' => 'Contraseña', 'placeholder' => 'Ingrese una Contraseña', 'help' => 'Si el campo no es editado, este no se actualizará en el sistema'],
            'password_confirmation' => ['field' => 'Confirmación de la contraseña', 'placeholder' => 'Ingrese la confirmación de la Contraseña'],
            'role_id' => ['field' => 'Rol'],
            'submit' => 'Enviar',
        ],
    ],

];
