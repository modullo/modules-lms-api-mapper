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
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'last_name' => [
                    'label' => 'Last name',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'email' => [
                    'label' => 'Email',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'phone_number' => [
                    'label' => 'Phone number',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'password' => [
                    'label' => 'Password',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'company_id' => [
                    'label' => 'Organization',
                    'visible' => false,
                    'placeholder' => '',
                    'should_map' => false,
                ],
                'role' => [
                    'label' => 'Role',
                    'visible' => false,
                    'placeholder' => '',
                    'should_map' => false,
                ],
            ],
        ],
        'program' => [
            //Parameter key and frontend configurations
            'parameters' => [
                'title' => [
                    'label' => 'Title',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'description' => [
                    'label' => 'Description',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'image' => [
                    'label' => 'Image',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'video_overview' => [
                    'label' => 'Video Overview',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'visibility_type' => [
                    'label' => 'Visibility Type',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
            ],
        ],
        'course' => [
            'parameters' => [
                'title' => [
                    'label' => 'Title',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'course_image' => [
                    'label' => 'Course Image',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'duration' => [
                    'label' => 'Duration',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'skills_to_be_gained' => [
                    'label' => 'Skills to Gain',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'course_state' => [
                    'label' => 'Course State', //draft or published
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'course_video' => [
                    'label' => 'Course Video',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'slug' => [
                    'label' => 'Slug',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'description' => [
                    'label' => 'Description',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'course_level' => [
                    'label' => 'Course Level',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'short_description' => [
                    'label' => 'Short Description',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'course_requirements' => [
                    'label' => 'Course Requirements',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
            ],
        ],
        'module' => [
            'parameters' => [
                'title' => [
                    'label' => 'Title',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'description' => [
                    'label' => 'Description',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'duration' => [
                    'label' => 'Duration',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'module_number' => [
                    'label' => 'Module Number',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
            ],
        ],
        'lesson' => [
            'parameters' => [
                'title' => [
                    'label' => 'Title',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'description' => [
                    'label' => 'Description',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'lesson_image' => [
                    'label' => 'Lesson Image',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'lesson_number' => [
                    'label' => 'Lesson Number',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'lesson_type' => [
                    'label' => 'Lesson Type', //video,article,quiz,exercise,survey,gamification,scheduler,project
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'schedule_type' => [
                    'label' => 'Schedule Type',
                    'visible' => false,
                    'placeholder' => '',
                    'should_map' => false,
                ],
                'schedule_instruction' => [
                    'label' => 'Schedule Instruction',
                    'visible' => false,
                    'placeholder' => '',
                    'should_map' => false,
                ],
                'project_details' => [
                    'label' => 'Project Details',
                    'visible' => false,
                    'placeholder' => '',
                    'should_map' => false,
                ],
                'has_code_editor' => [
                    'label' => 'Has Editor',
                    'visible' => false,
                    'placeholder' => '',
                    'should_map' => false,
                ],
                'code_language' => [
                    'label' => 'Code Language',
                    'visible' => false,
                    'placeholder' => '',
                    'should_map' => false,
                ],
                'skills_gained' => [
                    'label' => 'Skills Gained',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
                'resource_id' => [
                    'label' => 'Resource ID',
                    'visible' => true,
                    'placeholder' => '',
                    'should_map' => true,
                ],
            ],
        ],
    ],
];

