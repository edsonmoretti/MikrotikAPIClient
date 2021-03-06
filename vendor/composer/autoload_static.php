<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit105f565f7117c4fb7f0c7bd9f48bafb0
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mikrotik\\Models\\' => 16,
            'Mikrotik\\Hotspot\\Models\\' => 24,
            'Mikrotik\\Hotspot\\' => 17,
            'Mikrotik\\Exceptions\\' => 20,
            'Mikrotik\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mikrotik\\Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Models',
        ),
        'Mikrotik\\Hotspot\\Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Hotspot/Models',
        ),
        'Mikrotik\\Hotspot\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Hotspot',
        ),
        'Mikrotik\\Exceptions\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Exceptions',
        ),
        'Mikrotik\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit105f565f7117c4fb7f0c7bd9f48bafb0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit105f565f7117c4fb7f0c7bd9f48bafb0::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
