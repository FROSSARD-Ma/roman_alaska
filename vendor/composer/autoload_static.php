<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaabd824f4a5ad7defa85a297063d738c
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Alaska\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Alaska\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaabd824f4a5ad7defa85a297063d738c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaabd824f4a5ad7defa85a297063d738c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}