<?php

return [
    'db_host' => getenv('DB_HOST') ?: 'localhost',
    'db_port' => getenv('DB_PORT') ?: '5432',
    'db_name' => getenv('DB_NAME') ?: 'simpus_mini',
    'db_user' => getenv('DB_USER') ?: 'muhammadnur',
    'db_pass' => getenv('DB_PASS') ?: 'muhammadnur1103',
];