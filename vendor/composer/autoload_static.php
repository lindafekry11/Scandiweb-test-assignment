<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcdc96a65290911fa3fd6f07114e94470
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'src\\' => 4,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcdc96a65290911fa3fd6f07114e94470::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcdc96a65290911fa3fd6f07114e94470::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcdc96a65290911fa3fd6f07114e94470::$classMap;

        }, null, ClassLoader::class);
    }
}
