<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit93ffde7156306e84c95a8924fb04f4ea
{
    public static $classMap = array (
        'PHPGangsta_GoogleAuthenticator' => __DIR__ . '/../..' . '/PHPGangsta/GoogleAuthenticator.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit93ffde7156306e84c95a8924fb04f4ea::$classMap;

        }, null, ClassLoader::class);
    }
}