<?php

class ToDoListController
{

    //Create To-Do List Function
    function create_list()
    {
        $f3 = \Base::instance();

        $list = new ToDoList;
        $list->list_name = $f3->get('POST.list_title');
        $list->list_owner = $f3->get('SESSION.user_id');

        if ($list->save()) {
            http_response_code(201);
            echo json_encode([
                'success' => true,
                'message' => 'To-Do List created successfully'
            ]);
        } else {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => 'Failed to create To-Do List'
            ]);
        }
    }
}
