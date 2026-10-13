<?php

class ToDoListController
{

    //Create To-Do List Function
    function create_list()
    {
        $f3 = \Base::instance();

        $list = new TodoList;
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
    //Get To-Do Lists Function
    function get_lists()
    {
        $f3 = \Base::instance();
        if (!$f3->exists('SESSION.user_id')) {
            http_response_code(401);
            echo json_encode([
                'success' => false,
                'message' => 'Must be logged in to view To-Do Lists'
            ]);
            return;
        }

        $user_id = $f3->get('SESSION.user_id');
        $lists = new TodoList;
        $user_lists = $lists->find(['list_owner = ?', $user_id]);

        if (!$user_lists) {
            http_response_code(200);
            echo json_encode([]);
            return;
        }
        $data = $user_lists->castAll(0);
        http_response_code(200);
        echo json_encode($data);
    }
}
