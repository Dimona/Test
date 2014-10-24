<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 24.10.14
 * Time: 18:06
 */

namespace src\Models;

use Framework\DI\Service;
use Framework\Query\MySQLQuery;

class Students
{

    protected $_table;

    public function __construct()
    {
        $this->_table = array_pop(explode('\\', get_class($this)));
    }

    public function find()
    {
        $query = new MySQLQuery();
        $query->condition('select')->from($this->_table)->limit(1);
        $query = $query->getQuery();
        var_dump($query);
        var_dump(Service::get('connection'));
        $result = Service::get('connection')->select($query);
        var_dump($result);
    }


} 