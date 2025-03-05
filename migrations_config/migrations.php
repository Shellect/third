<?php
return [
    'table_storage' => [
        'table_name' => 'migration_versions',
        'version_column_name' => 'version',
        'version_column_length' => 191,
        'executed_at_column_name' => 'executed_at',
        'execution_time_column_name' => 'execution_time',
    ],
    'migrations_paths' => [
        'DoctrineMigrations' => __DIR__ . '/migrations',
    ],
    'all_or_nothing' => true,
    'check_database_platform' => true
];
