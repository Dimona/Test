<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 23.10.14
 * Time: 21:18
 */

namespace Framework;

/**
 * Class Loader
 * @package Framework
 */
class Loader
{
    /**
     * Registration of the autoloader
     */
    public static function init()
    {
        if (is_callable('__autoload')) {
            spl_autoload_register('__autoload');
        }
        spl_autoload_register(__NAMESPACE__ . '\Loader::load');
    }

    /**
     * Loading of the class
     *
     * @param $class
     */
    public static function load($class)
    {
        $class = __DIR__ . '/../' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        require_once $class;

    }
}