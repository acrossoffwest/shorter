<?php

return [
    'route' => [
        'name_prefix' => 'shorter',
        'url_prefix' => 'shorter'
    ],
    'url' => [
        'regex' => '/(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/',
        'generate_url_length' => 8
    ]
];
