<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 23.10.14
 * Time: 21:19
 */

namespace Framework;

use Framework\Db\MySQL;
use Framework\DI\Service;
use Framework\Messages\MessageBox;
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
            $connection = new MySQL(require_once '../app/config/config.php');
            Service::set('connection', $connection);
//            var_dump($connection);
            $content = $router->processConfig();
        } catch (\Exception $e){
            $content = $e->getCode() . '. ' . $e->getMessage();
        };

        $renderer = new Renderer('layout');
        $renderer->assign('content', $content);
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $messageBox = new MessageBox();
//            var_dump($messageBox->getMessages());
            $renderer->assign('messages', $messageBox->getMessages());
        }
        echo $renderer->render();
    }
} 