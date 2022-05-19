<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit385ace5c2e08955f7e50bf2c7d9cce81
{
    public static $files = array (
        '3755db2415e97f4eca53bbcfa20deee8' => __DIR__ . '/../..' . '/source/Config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Source\\' => 7,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
        'G' => 
        array (
            'Gumlet\\' => 7,
        ),
        'C' => 
        array (
            'CoffeeCode\\Router\\' => 18,
            'CoffeeCode\\DataLayer\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Source\\' => 
        array (
            0 => __DIR__ . '/../..' . '/source',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
        'Gumlet\\' => 
        array (
            0 => __DIR__ . '/..' . '/gumlet/php-image-resize/lib',
        ),
        'CoffeeCode\\Router\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/router/src',
        ),
        'CoffeeCode\\DataLayer\\' => 
        array (
            0 => __DIR__ . '/..' . '/coffeecode/datalayer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit385ace5c2e08955f7e50bf2c7d9cce81::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit385ace5c2e08955f7e50bf2c7d9cce81::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit385ace5c2e08955f7e50bf2c7d9cce81::$classMap;

        }, null, ClassLoader::class);
    }
}
