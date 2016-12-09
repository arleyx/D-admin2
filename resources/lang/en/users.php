<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Language for users module
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
            'create_at' => 'Create at',
            'name' => 'Name',
            'email' => 'E-mail',
            'group' => 'Group',
            'action' => 'Actions',
        ],
        'action' => [
            'create' => 'Create',
            'edit' => 'Edit',
            'destroy' => 'Delete',
        ],
        'pagination' => 'Showing :firstItem to :lastItem of :total entries'
    ],

    'create' => [
        'name' => ['field' => 'Name', 'placeholder' => 'Enter Name'],
        'lastname' => ['field' => 'Last Name', 'placeholder' => 'Enter Last Name'],
        'email' => ['field' => 'Email', 'placeholder' => 'Enter Email'],
        'phone' => ['field' => 'Phone', 'placeholder' => 'Enter Phone'],
        'password' => ['field' => 'Password', 'placeholder' => 'Enter Password'],
        'password_confirmation' => ['field' => 'Confirm Password', 'placeholder' => 'Enter Confirm Password'],
        'group_id' => ['field' => 'Group', 'placeholder' => 'Select Group'],
        /*'title' => 'Create',
        'form' => [
            'name' => ['field' => 'Name', 'placeholder' => 'Enter Name'],
            'submit' => 'Submit',
        ],
        'table' => [
            'id' => 'ID',
            'name' => 'Name',
            'action' => 'Action',
        ],*/
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
