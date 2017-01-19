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

    'title' => 'Users',
    'description' => 'User for the system',

    'index' => [
        'title' => 'Index',
        'table' => [
            'id' => 'ID',
            'created_at' => 'Created at',
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
        'group_id' => ['field' => 'Group', 'placeholder' => 'Select Group'],
        'know_us' => ['field' => 'Know us', 'placeholder' => 'Enter Know us'],

        'name' => ['field' => 'Name', 'placeholder' => 'Enter Name'],
        'lastname' => ['field' => 'Last Name', 'placeholder' => 'Enter Last Name'],

        'country' => ['field' => 'Country', 'placeholder' => 'Select Country'],
        'citizenship' => ['field' => 'Citizenship', 'placeholder' => 'Select Citizenship'],
        'occupation' => ['field' => 'Occupation', 'placeholder' => 'Enter Occupation'],
        'about_you' => ['field' => 'About you', 'placeholder' => 'Enter About you'],

        'email' => ['field' => 'Email', 'placeholder' => 'Enter Email'],
        'phone' => ['field' => 'Phone', 'placeholder' => 'Enter Phone'],
        'password' => ['field' => 'Password', 'placeholder' => 'Enter Password'],
        'password_confirmation' => ['field' => 'Confirm Password', 'placeholder' => 'Enter Confirm Password'],

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
