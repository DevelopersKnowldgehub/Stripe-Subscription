<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbe4042b1c73fb3e41f88aa800dcbd923
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbe4042b1c73fb3e41f88aa800dcbd923::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbe4042b1c73fb3e41f88aa800dcbd923::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
