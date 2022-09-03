<?php

return [
    'title' => 'Base API Mapper Module',
    'models' => [
        'user' => [
            //Parameter key and frontend configurations
            'parameters' => [
                'first_name' => [
                    'label' => 'First name',
                    'visible' => true,
                ],
                'last_name' => [
                    'label' => 'Last name',
                    'visible' => true,
                ],
                'email' => [
                    'label' => 'Email',
                    'visible' => true,
                ],
                'phone_number' => [
                    'label' => 'Phone number',
                    'visible' => true,
                ],
                'password' => [
                    'label' => 'Password',
                    'visible' => true,
                ],
                'company_id' => [
                    'label' => 'Organization',
                    'visible' => true,
                ],
                'role' => [
                    'label' => '',
                    'visible' => true,
                ],
            ],
        ],
    ],
];

