<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 24.10.14
 * Time: 10:42
 */

namespace Framework\Renderer;

use Framework\Exception\RendererException;

/**
 * Rendering of the views
 * Class Renderer
 * @package Framework\Renderer
 */
class Renderer
{
    /**
     * Path to view layout
     * @var string
     */
    private $file = false;

    /**
     * Array of the variables
     * @var array
     */
    private $data = array();

    /**
     * Constructor
     * @param $layout
     * @throws \Framework\Exception\RendererException
     */
    public function __construct($layout)
    {
        $file = __DIR__ . '/../../src/Views/' . $layout . '.html.php';
//        var_dump('$file = ' . $file);
        if (file_exists($file)) {
            $this->file = $file;
        } else {
            throw new RendererException('Layout "' . $file . '" not found');
        }
    }

    /**
     * Adding the variables to $data property
     * @param $variable
     * @param $value
     * @return $this
     */
    public function assign($variable, $value)
    {
        $this->data[$variable] = $value;
    }

    /**
     * Rendering
     * @return string
     */
    public function render()
    {
        ob_start();
        extract($this->data);
        include $this->file;
        return ob_get_clean();
    }

} 