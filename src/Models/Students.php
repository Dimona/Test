<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 24.10.14
 * Time: 18:06
 */

namespace src\Models;

use Framework\Model\AbstractModel;

/**
 * Class Students
 * @package src\Models
 */
class Students extends AbstractModel
{
    /**
     * Constructor. Set the value to the $_table property
     */
    public function __construct()
    {
        $this->_table = array_pop(explode('\\', get_class($this)));
    }

} 