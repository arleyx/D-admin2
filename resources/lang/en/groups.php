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

    'title' => 'Groups',
    'description' => 'Groups for the system',

    'index' => [
        'title' => 'Index',
        'table' => [
            'id' => 'ID',
            'created_at' => 'Created at',
            'name' => 'Name',
            'beering_id' => 'Beering',
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
            'name' => ['field' => 'Name', 'placeholder' => 'Enter Name'],
            'beering_id' => ['field' => 'Beering', 'placeholder' => 'Enter Beering'],
            'about' => ['field' => 'About', 'placeholder' => 'Enter information About'],
            'record' => ['field' => 'Record', 'placeholder' => 'Enter information Record'],
            'submit' => 'Submit',
        ],
    ],

    'edit' => [
        'title' => 'Edit',
        'form' => [
            'name' => ['field' => 'Name', 'placeholder' => 'Enter Name'],
            'beering_id' => ['field' => 'Beering', 'placeholder' => 'Enter Beering'],
            'about' => ['field' => 'About', 'placeholder' => 'Enter information About'],
            'record' => ['field' => 'Record', 'placeholder' => 'Enter information Record'],
            'submit' => 'Submit',
        ],
    ],
];
