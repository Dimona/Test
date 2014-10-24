<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 24.10.14
 * Time: 23:23
 */

namespace Framework\Query;


class MySQLQuery implements QueryInterface
{
//  Some different properties for preparing sql query. It's realized very casually.
//  But for this project is enough
//----------------------------------------------------------------------------------
    protected $_condition = 'select';
    protected $_from = null;
    protected $_where = array();
    protected $_sort = null;
    protected $_limit = null;
    protected $_skip = 0;
//----------------------------------------------------------------------------------
    /**
     * Initializing of the $_condition property
     *
     * @param $condition
     * @return $this
     */
    public function condition($condition)
    {
        $this->_condition = $condition;
        return $this;
    }

    /**
     * Initializing of the $_from property
     *
     * @param $from
     * @return $this
     */
    public function from($from)
    {
        $this->_from = $from;
        return $this;
    }

    /**
     * Initializing of the $_where property
     *
     * @param array $where
     * @return $this
     */
    public function where($where = array())
    {
        $this->_where = $where;
        return $this;
    }

    /**
     * Initializing of the $_sort property
     *
     * @param $field
     * @param string $direction 'ASC'|'DESC'
     * @return $this
     */
    public function sort($field, $direction = 'ASC')
    {
        $this->_sort = $field . ' ' . ($direction !== 'ASC' ? 'DESC' : $direction);
        return $this;
    }

    /**
     * Initializing of the $_limit property
     *
     * @param $limit
     * @return $this
     */
    public function limit($limit)
    {
        $this->_limit = (int)$limit;
        return $this;
    }

    /**
     * Initializing of the $_skip property
     *
     * @param $skip
     * @return $this
     */
    public function skip($skip)
    {
        $this->_skip = $skip;
        return $this;
    }

    /**
     * Building of sql query string
     *
     * @return string
     */
    protected function toString()
    {
        $query = '';
        switch ($this->_condition) {
            case 'select':
                $query = 'SELECT * FROM ' . $this->_from;

                if (count($this->_where)) {
                    $queryArray = array();
                    foreach ($this->_where as $field => $value) {
                        $queryArray[] = "`$field`='$value'";
                    }
                    $query .= ' WHERE (' . implode(' AND ', $queryArray) . ')';
                }

                if (!is_null($this->_sort)) {
                    $query .= ' ORDER BY ' . $this->_sort;
                }

                if (!is_null($this->_limit)) {
                    $skip = (is_null($this->_skip)) ? 0 : $this->_skip;
                    $query .= ' LIMIT ' . $skip . ',' . $this->_limit;
                }
                break;
/*
            case 'insert':
                if (count($changedFields)) {
                    $query = 'INSERT INTO ' . $from . ' SET ';
                    $queryArray = array();
                    foreach ($changedFields as $field => $value) {
                        $queryArray[] = (strpos($value, 'PASSWORD') === False) ? "`$field` = '$value'" : "`$field` = $value";
                    }
                    $query .= implode(', ', $queryArray);
                }
                break;

            case 'update':
                if (count($changedFields)) {
                    $query = 'UPDATE ' . $from . ' SET ';
                    $queryArray = array();
                    foreach ($changedFields as $field => $value) {
                        $queryArray[] = (strpos($value, 'PASSWORD') === False) ? "`$field`='$value'" : "`$field`=$value";
                    }
                    //var_dump($queryArray);
                    $query .= implode(', ', $queryArray) . ' WHERE id = ' . $fields['id'];

                }
                break;
            case 'remove':
                $query = 'DELETE FROM ' . $from . ' WHERE `id` = ';
                $query .= (isset($fields['id'])) ? $fields['id'] : 'null';
                break;*/
        }

//        var_dump($query);
        return $query;
    }

    public function getQuery()
    {
        return $this->toString();
    }

}