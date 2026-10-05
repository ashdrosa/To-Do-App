<?php
class SetupController
{

    function dbSetup()
    {
        User::setup();
        TodoList::setup();
        Task::setup();

        echo "Database setup completed successfully.";
    }
}
