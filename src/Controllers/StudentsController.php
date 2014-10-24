<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 24.10.14
 * Time: 12:36
 */

namespace src\Controllers;

use src\Models\Students;

class StudentsController {

    public function showAction()
    {
        $students = new Students();
        $students->find();
        echo "Hello It's Students";
    }

} 