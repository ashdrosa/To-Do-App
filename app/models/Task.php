<?php

class Task extends \DB\Cortex
{

    protected $fieldConf = [
        'task_name' => [
            'type' => \DB\SQL\Schema::DT_VARCHAR256,
            'nullable' => false
        ],

        'date_created' => [
            'type' => \DB\SQL\Schema::DT_TIMESTAMP,
            'default' => \DB\SQL\Schema::DF_CURRENT_TIMESTAMP,
            'nullable' => false
        ],

        'task_list_id' => [
            'belongs-to-one' => 'TodoList',
        ],

        'task_completed' => [
            'type' => \DB\SQL\Schema::DT_BOOL,
            'nullable' => false,
            'default' => false
        ],
    ];

    protected $db = 'DB';
    protected $table = 'tasks';
    protected $primary = 'id';
}
