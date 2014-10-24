<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 24.10.14
 * Time: 09:17
 */

namespace Framework\Request;


class Request {

    /**
     * Getting request URI from $_SERVER global variable
     * @return string
     */
    public static function getURI()
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * Getting request method from $_SERVER global variable
     * @return string
     */
    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Check of the Request that is Ajax
     * @return bool
     */
    public static function isAjax()
    {
        return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest');
    }
} 