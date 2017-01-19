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

    'title' => 'Beerings',
    'description' => 'Beerings for the system',

    'index' => [
        'title' => 'Index',
        'table' => [
            'id' => 'ID',
            'created_at' => 'Created at',
            'title' => 'Title',
            'amount' => 'Amount',
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
        'title' => 'Create',
        'form' => [
            'title' => ['field' => 'Title', 'placeholder' => 'Enter Title'],
            'objective' => ['field' => 'Objective', 'placeholder' => 'Enter Objective'],
            'description' => ['field' => 'Description', 'placeholder' => 'Enter Description'],
            'amount' => ['field' => 'Amount', 'placeholder' => 'Enter Amount'],
            'submit' => 'Submit',
        ],
    ],

    'edit' => [
        'title' => 'Edit',
        'form' => [
            'title' => ['field' => 'Title', 'placeholder' => 'Enter Title'],
            'objective' => ['field' => 'Objective', 'placeholder' => 'Enter Objective'],
            'description' => ['field' => 'Description', 'placeholder' => 'Enter Description'],
            'amount' => ['field' => 'Amount', 'placeholder' => 'Enter Amount'],
            'submit' => 'Submit',
        ],
    ],
];
