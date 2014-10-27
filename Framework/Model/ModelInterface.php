<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 25.10.14
 * Time: 10:41
 */

namespace Framework\Model;


interface ModelInterface {

    public function find(array $where = null, array $params = null);

    public function save(array $params);

    public function remove(array $params);

} 