<?php

return [
    'scholarships' => [
        [
            'id' => 1,
            'title' => 'Academic Excellence Scholarship',
            'deadline' => '2026-03-15',
            'status' => 'open',
            'eligible_program' => 'All Programs',
            'eligible_year_level' => '1st–4th Year',
            'description' => 'For students with strong academic performance and good standing.',
        ],
        [
            'id' => 2,
            'title' => 'Need-Based Assistance Grant',
            'deadline' => '2026-03-20',
            'status' => 'open',
            'eligible_program' => 'BSIT, BSCpE',
            'eligible_year_level' => '1st–4th Year',
            'description' => 'Financial assistance for students who meet eligibility requirements.',
        ],
        [
            'id' => 3,
            'title' => 'Leadership Scholarship',
            'deadline' => '2026-02-28',
            'status' => 'closed',
            'eligible_program' => 'All Programs',
            'eligible_year_level' => '2nd–4th Year',
            'description' => 'For student leaders with proven leadership experience.',
        ],
    ],

    // We'll use this later for Student Portal login (Name + Reference ID)
    'approved_students' => [
        [
            'name' => 'Juan Dela Cruz',
            'reference_id' => 'REF-2026-0001',
        ],
    ],
];