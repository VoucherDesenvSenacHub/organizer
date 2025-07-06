<?php
require_once __DIR__ . '/../vendor/autoload.php'; // carregando o autoload do Composer

use Cloudinary\Cloudinary;

$cloudinary = new Cloudinary([
    'cloud' => [
        'cloud_name' => 'du6oqtrkj',
        'api_key'    => '969137531886294',
        'api_secret' => 'Mlw0TByox6XNDIdxECCkki2Fx5E',
    ],
    'url' => [
        'secure' => true,
    ],
]);
