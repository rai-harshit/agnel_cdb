<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5e2d31874f0f0b891f5931271ede366a
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5e2d31874f0f0b891f5931271ede366a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5e2d31874f0f0b891f5931271ede366a::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
