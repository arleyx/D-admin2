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

    'title' => 'Administrators',
    'description' => 'Administrators for admin system',

    'index' => [
        'title' => 'Index',
        'table' => [
            'id' => 'ID',
            'created_at' => 'Created at',
            'name' => 'Name',
            'email' => 'E-mail',
            'role' => 'Role',
            'action' => 'Action',
        ],
        'action' => [
            'create' => 'Create',
            'edit' => 'Edit',
            'destroy' => 'Delete',
        ],
        'pagination' => 'Showing :firstItem to :lastItem of :total entries'
    ],

    'create' => [
        'title' => 'Create',
        'form' => [
            'name' => ['field' => 'Name', 'placeholder' => 'Enter Name'],
            'email' => ['field' => 'E-mail', 'placeholder' => 'Enter E-mail'],
            'password' => ['field' => 'Password', 'placeholder' => 'Enter Password'],
            'password_confirmation' => ['field' => 'Confirm Password', 'placeholder' => 'Enter Confirm Password'],
            'role_id' => ['field' => 'Role'],
            'submit' => 'Submit',
        ],
    ],

    'edit' => [
        'title' => 'Edit',
        'form' => [
            'name' => ['field' => 'Name', 'placeholder' => 'Enter Name'],
            'email' => ['field' => 'E-mail', 'placeholder' => 'Enter E-mail'],
            'password' => ['field' => 'Password', 'placeholder' => 'Enter Password', 'help' => 'If the field is not edited, this is not updated in the system'],
            'password_confirmation' => ['field' => 'Confirm Password', 'placeholder' => 'Enter Confirm Password'],
            'role_id' => ['field' => 'Role'],
            'submit' => 'Submit',
        ],
    ],

];
