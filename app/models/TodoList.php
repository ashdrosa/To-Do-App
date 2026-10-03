<?php

class TodoList extends \DB\Cortex
{

    protected $fieldConf = [
        'list_name' => [
            'type' => \DB\SQL\Schema::DT_VARCHAR256,
            'nullable' => false
        ],

        'list_owner' => [
            'belongs-to-one' => 'User',
        ],

        'date_created' => [
            'type' => \DB\SQL\Schema::DT_TIMESTAMP,
            'default' => \DB\SQL\Schema::DF_CURRENT_TIMESTAMP,
            'nullable' => false
        ],

    ];

    protected $db = 'DB';
    protected $table = 'todo_lists';
    protected $primary = 'id';
}
