<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2c918e0f3c45e3707e88409ecac990ef
{
    public static $files = array (
        'da253f61703e9c22a5a34f228526f05a' => __DIR__ . '/..' . '/wixel/gump/gump.class.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MVC\\' => 4,
        ),
        'G' => 
        array (
            'GUMP\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MVC\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'GUMP\\' => 
        array (
            0 => __DIR__ . '/..' . '/wixel/gump/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2c918e0f3c45e3707e88409ecac990ef::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2c918e0f3c45e3707e88409ecac990ef::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2c918e0f3c45e3707e88409ecac990ef::$classMap;

        }, null, ClassLoader::class);
    }
}
