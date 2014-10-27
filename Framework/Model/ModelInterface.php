<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 25.10.14
 * Time: 10:41
 */

namespace Framework\Model;


interface ModelInterface {

    /**
     * @param array $where
     * @param array $params
     * @return mixed
     */
    public function find(array $where = null, array $params = null);

    /**
     * @param array $params
     * @return mixed
     */
    public function save(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function remove(array $params);

} 