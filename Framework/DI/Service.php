<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 24.10.14
 * Time: 20:45
 */

namespace Framework\DI;


final class Service
{

    /**
     * Registry of variables
     *
     * @var array
     */
    private static $registry = array();

    private final function __construct()
    {
    }

    /**
     * Sets value to $registry property
     *
     * @param $name
     * @param $value
     */
    public static function set($name, $value)
    {
        self::$registry[$name] = $value;
    }

    /**
     * Searches value from $registry property by name
     *
     * @param $name
     * @return null|mixed
     */
    public static function get($name)
    {
        return array_key_exists($name, self::$registry) ? self::$registry[$name] : null;
    }


} 