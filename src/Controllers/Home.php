<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 24.10.14
 * Time: 9:32
 */

namespace src\Controllers;

use Framework\Renderer\Renderer;

/**
 * Controller of the main page
 * Class Home
 * @package src\Controllers
 */
class Home
{
    /**
     * Controller of index action
     * @return string
     */
    public function indexAction()
    {
        $content = new Renderer('index');
        return $content->render();
    }
} 