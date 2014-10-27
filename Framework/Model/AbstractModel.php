<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 25.10.14
 * Time: 10:47
 */

namespace Framework\Model;

use Framework\DI\Service;
use Framework\Query\MySQLQuery;

/**
 * Class AbstractModel
 * @package Framework\Model
 */
abstract class AbstractModel implements ModelInterface
{

    protected $_table;

    /**
     * Gathers all parameters, builds sql string and executes query
     *
     * @param array $where
     * @param array $params
     * @return mixed
     */
    public function find(array $where = null, array $params = null)
    {
        $query = new MySQLQuery();
        $query->condition('select')->from($this->_table);
        if (gettype($where) === 'array' && count($where)) {
            $query->where($where);
        }
        if (isset($params['limit']) && gettype($params['limit']) === 'int') {
            $query->limit($params['limit']);
        }
        if (isset($params['skip']) && gettype($params['skip']) === 'int') {
            $query->skip($params['skip']);
        }
        if (isset($params['sort']) && gettype($params['sort']) === 'string') {
            $query->sort($params['sort']);
        }
        $query = $query->build();
        $result = Service::get('connection')->select($query);
        return $result;
    }

    /**
     * Gathers all parameters for inserting or updating, builds sql string and executes query
     *
     * @param $params
     * @return mixed
     */
    public function save(array $params)
    {
        $query = new MySQLQuery();
        $query = (isset($params['id'])) ? $query->condition('update') : $query->condition('insert');
        $query->to($this->_table)->params($params);
        $query = $query->build();
        $result = Service::get('connection')->execute($query);
        return $result;
    }

    /**
     * Gathers parameters for deleting, builds sql string and executes query
     *
     * @param array $params
     * @return mixed
     */
    public function remove(array $params)
    {
        $query = new MySQLQuery();
        $query->condition('remove')->from($this->_table)->params($params);
        $query = $query->build();
        $result = Service::get('connection')->execute($query);
        return $result;
    }


} 