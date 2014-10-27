<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 24.10.14
 * Time: 16:30
 */

namespace Framework\Db;

use Framework\Exception\ConfigException;
use Framework\Exception\ConnectException;
use Framework\Exception\QueryException;

class MySQL implements DBInterface
{

    /**
     * Result of the connecting to the database
     *
     * @var
     */
    protected $_resource;

    /**
     * Constructor. Check the connecting to the database
     *
     * @param array $config
     * @throws \Framework\Exception\ConnectException
     */
    public function __construct(array $config)
    {
        if (!$this->connect($config)) {
            throw new ConnectException("Could not connect to the database '$config[database]'");
        }
    }

    /**
     * Destructor. Initiate disconnect method
     */
    function __destruct()
    {
        $this->disconnect();
    }


    /**
     * Set the connection to th database
     *
     * @param array $config
     * @return bool|mixed
     * @throws \Framework\Exception\ConfigException
     * @throws \Framework\Exception\ConnectException
     */
    public function connect(array $config)
    {
        $keys = array('host', 'user', 'password', 'database');
        if (count(array_diff($keys, array_keys($config)))) {
            throw new ConfigException('There are necessary parameters in db config: ' . implode(',', $keys));
        }

        if (is_null($this->_resource)) {
            if (!$this->_resource = mysql_connect($config['host'], $config['user'], $config['password'])) {
                throw new ConnectException('Could not connect to the mysql instance..');
            };

            return mysql_select_db($config['database'], $this->_resource);
        }
        return true;
    }

    /**
     * Close the connection to the database
     *
     * @return bool|mixed
     */
    public function disconnect()
    {
        return mysql_close($this->_resource);
    }

    /**
     * Executes query like insert|update|delete
     *
     * @param $query
     * @return bool
     * @throws \Framework\Exception\QueryException
     */
    public function execute($query)
    {
        var_dump($query);
        if (!mysql_query($query)) {
            throw new QueryException('The Query is not executed');
        }
        return true;
    }


    /**
     * Executes select query
     *
     * @param $query
     * @return array|bool
     */
    public function select($query)
    {
        if ($rowset = mysql_query($query, $this->_resource)) {
            $result = array();
            while ($row = mysql_fetch_assoc($rowset)) {
                $result[] = $row;
            }
            return $result;
        }
        return false;
    }


}
