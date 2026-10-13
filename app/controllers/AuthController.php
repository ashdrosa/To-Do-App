   <?php

    class AuthController
    {

        //Register a new user Function
        function create_user()
        {
            $f3 = \Base::instance();
            $user = new User;

            // Set the user properties from the POST data
            $user->username = $f3->get('POST.username');
            $user->email = $f3->get('POST.email');
            $user->firstname = $f3->get('POST.firstname');
            $user->password = $f3->get('POST.password');

            if ($user->save()) {
                http_response_code(201);
                echo json_encode([
                    'success' => true,
                    'message' => 'User created successfully'
                ]);
            } else {
                http_response_code(400);
                echo json_encode([
                    'success' => false,
                    'message' => 'Failed to create user'
                ]);
            }
        }

        //Login a user Function
        function login_user()
        {
            $f3 = \Base::instance();
            $user = new User;

            // Set the login user properties from the POST data
            $username = $f3->get('POST.username');
            $user_password = $f3->get('POST.password');

            $user->load(['username = ?', $username]);

            if ($user->valid()) {
                if ($user->password === $user_password) {
                    $f3->set('SESSION.user_id', $user->id);
                    $f3->set('SESSION.user_email', $user->user_email);
                    $f3->set('SESSION.user_name', $user->username);

                    http_response_code(200);
                    echo json_encode([
                        'success' => true,
                        'message' => 'User logged in successfully'
                    ]);
                } else {
                    http_response_code(401);
                    echo json_encode([
                        'success' => false,
                        'message' => 'Invalid password'
                    ]);
                }
            } else {
                http_response_code(404);
                echo json_encode([
                    'success' => false,
                    'message' => 'User not found'
                ]);
            }
        }

        function logout_user()
        {
            $f3 = \Base::instance();
            $f3->clear('SESSION');
            http_response_code(200);
            echo json_encode([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
            $f3->reroute('/');
        }
    }
