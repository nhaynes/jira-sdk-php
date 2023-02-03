<?php

return [
    #'openapi-file' => 'https://developer.atlassian.com/cloud/jira/platform/swagger-v3.v3.json',
    'openapi-file' => __DIR__.'/resources/swagger-v3.v3.json',
    'namespace' => 'JiraSdk\Api',
    'directory' => __DIR__.'/generated',
    'reference' => true,
    'use-fixer' => true,
    'fixer-config-file' => __DIR__ . '/.php-cs-fixer.php',
];
