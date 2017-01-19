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

    'title' => 'Roles',
    'description' => 'Roles for users',

    'index' => [
        'title' => 'Index',
        'table' => [
            'id' => 'ID',
            'created_at' => 'Created at',
            'name' => 'Name',
            'module' => 'Modules',
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
            'submit' => 'Submit',
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Name',
            'action' => 'Action',
        ],
    ],

    'edit' => [
        'title' => 'Edit',
        'form' => [
            'name' => ['field' => 'Name', 'placeholder' => 'Enter Name'],
            'submit' => 'Submit',
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Name',
            'action' => 'Action',
        ],
    ],

];
