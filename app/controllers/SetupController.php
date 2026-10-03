<?php

class SetupController
{

    function dbSetup()
    {
        User::setup();
    }
}
