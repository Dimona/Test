<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 01.10.14
 * Time: 20:44
 */

namespace AR\Exception;


class QueryException extends \Exception
{
    public function __construct($message = "", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, 500, $previous);
    }

} 