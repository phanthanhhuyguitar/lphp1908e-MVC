<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3e5c97488a1caf18059a0390b6e401ee
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3e5c97488a1caf18059a0390b6e401ee::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3e5c97488a1caf18059a0390b6e401ee::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
