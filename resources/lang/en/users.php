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
            'show' => 'Show',
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
    ],

    'show' => [
        'title' => 'Show',
        'table' => [
            'id' => 'ID',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'email' => 'E-mail',
            'phone' => 'Phone',
            'occupation' => 'Occupation',
            'about_you' => 'About you',
            'citizenship' => 'Citizenship',
            'country' => 'Country',
            'know_us' => 'Know us',
            'group' => 'Group',
            'beering' => 'Beering',
        ],
    ],
];
