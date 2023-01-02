<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit81b8a8953c33d2e428bddb0c6673f5a0
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit81b8a8953c33d2e428bddb0c6673f5a0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit81b8a8953c33d2e428bddb0c6673f5a0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit81b8a8953c33d2e428bddb0c6673f5a0::$classMap;

        }, null, ClassLoader::class);
    }
}
