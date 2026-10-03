<?php

class User extends \DB\Cortex
{

    protected $fieldConf = [
        'firstname' => [
            'type' => \DB\SQL\Schema::DT_VARCHAR256,
            'nullable' => false
        ],
        'lastname' => [
            'type' => \DB\SQL\Schema::DT_VARCHAR256,
            'nullable' => false
        ],

        'username' => [
            'type' => \DB\SQL\Schema::DT_VARCHAR256,
            'nullable' => false,
            'unique' => true
        ],

        'email' => [
            'type' => \DB\SQL\Schema::DT_VARCHAR256,
            'nullable' => false,
            'unique' => true
        ],

        'password' => [
            'type' => \DB\SQL\Schema::DT_VARCHAR512,
            'nullable' => false
        ],

    ];

    protected $db = 'DB';
    protected $table = 'users';
    protected $primary = 'id';
}
