   <?php

    class AuthController
    {

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
    }
