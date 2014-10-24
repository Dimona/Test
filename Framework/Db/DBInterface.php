<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 24.10.14
 * Time: 16:42
 */

namespace Framework\Db;


/**
 * Interface DBInterface
 * @package Framework\Db
 */
interface DBInterface {

    /**
     * Creates connection to the database instance
     *
     * @param array $config
     * @return mixed
     */
    public function connect(array $config);

    /**
     * Destroys database connection
     *
     * @return mixed
     */
    public function disconnect();

    /**
     * Executes query like insert|update|delete
     *
     * @param $query
     * @return bool
     */
    public function execute($query);

    /**
     * Executes select query
     *
     * @param $query
     * @return array
     */
    public function select($query);


} 