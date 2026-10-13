<?php

class PageController
{

    function home()
    {
        echo \Template::instance()->render('home.html');
    }

    function login()
    {
        echo \Template::instance()->render('login.html');
    }

    function register()
    {
        echo \Template::instance()->render('register.html');
    }

    function dashboard()
    {

        $f3 = \Base::instance();
        if (!$f3->exists('SESSION.user_id')) {
            $f3->reroute('/login');
            return;
        }

        echo \Template::instance()->render('dashboard.html');
    }
}
