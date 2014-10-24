<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 23.10.14
 * Time: 21:19
 */

namespace Framework;

use Framework\Renderer\Renderer;
use Framework\Router\Router;

class Application
{
    /**
     *  Application initialization
     */
    public static function init()
    {
        $router = Router::getInstance();
        $router->setRoutes(require_once '../app/config/routes.php');

        try {
//            Factory::register(new MySQLAdapter(require '../config/config.php'));
            $content = $router->processConfig();
        } catch (\Exception $e){
            $content = $e->getCode() . '. ' . $e->getMessage();
        };
        $renderer = new Renderer('layout');
        $renderer->assign('content', $content);
        echo $renderer->render();
    }
} 