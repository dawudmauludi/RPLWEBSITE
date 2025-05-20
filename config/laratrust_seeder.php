<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadmin' => [
            'users' => 'c,r,u,d',
            'kelas' => 'c,r,u,d',
            'siswa_profiles' => 'c,r,u,d',
            'guru_profiles' => 'c,r,u,d',
            'beritas' => 'c,r,u,d',
            'category_beritas' => 'c,r,u,d',
            'category_karyas' => 'c,r,u,d',
            'karya_siswas' => 'c,r,u,d',
            'ulangans' => 'c,r,u,d',
            'nilai_ulangans' => 'c,r,u,d',
        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'kelas' => 'c,r,u,d',
            'siswa_profiles' => 'c,r,u,d',
            'guru_profiles' => 'c,r,u,d',
            'beritas' => 'c,r,u,d',
            'category_beritas' => 'c,r,u,d',
            'category_karyas' => 'c,r,u,d',
            'karya_siswas' => 'c,r,u,d',
            'ulangans' => 'c,r,u,d',
            'nilai_ulangans' => 'c,r,u,d',
        ],
        'guru' => [
             'users' => 'r',
            'kelas' => 'r',
            'siswa_profiles' => 'r',
            'guru_profiles' => 'c,r,u,d',
            'beritas' => 'c,r,u,d',
            'category_beritas' => 'c,r,u,d',
            'category_karyas' => 'c,r,u,d',
            'karya_siswas' => 'c,r,u,d',
            'ulangans' => 'c,r,u,d',
            'nilai_ulangans' => 'c,r,u,d',
        ],
        'siswa' => [
            'kelas' => 'r,u,d',
            'siswa_profiles' => 'c,r,u,d',
            'beritas' => 'r',
            'category_beritas' => 'r',
            'category_karyas' => 'r',
            'karya_siswas' => 'r',
            'ulangans' => 'r',
            'nilai_ulangans' => 'r',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
