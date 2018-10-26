<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8bad02d07df0dd3eb5dbb4dec3f53fbd
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpParser\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/php-parser/lib/PhpParser',
        ),
    );

    public static $prefixesPsr0 = array (
        'o' => 
        array (
            'org\\bovigo\\vfs' => 
            array (
                0 => __DIR__ . '/..' . '/mikey179/vfsStream/src/main/php',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8bad02d07df0dd3eb5dbb4dec3f53fbd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8bad02d07df0dd3eb5dbb4dec3f53fbd::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit8bad02d07df0dd3eb5dbb4dec3f53fbd::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}