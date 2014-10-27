<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 23.10.14
 * Time: 21:18
 */

namespace Framework;


class Loader
{
//
//    /** [Singleton] where class' instance is keeping
//     * @var bool
//     */
//    static private $class = false;
//
//    /** [Singleton] Entry point to the class
//     * @return bool|Loader
//     */
//    public static function gate()
//    {
//        if (is_object(self::$class) == false) {
//            self::$class = new self;
//        }
//        return self::$class;
//    }
//
//    /**
//     * Prevent object cloning
//     * @return void
//     */
//    final private function __clone()
//    {
//    }
//
//    private $classFolders;


    public static function init()
    {
        if (is_callable('__autoload')) {
            spl_autoload_register('__autoload');
        }
        spl_autoload_register(__NAMESPACE__ . '\Loader::load');
    }

    public static function load($class)
    {
        $class = __DIR__ . '/../' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
        require_once $class;

    }
}