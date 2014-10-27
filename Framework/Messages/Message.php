<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 27.10.14
 * Time: 0:07
 */

namespace Framework\Messages;

/**
 * Class Message
 * @package Framework\Messages
 */
class Message
{
    /**
     * Message string
     *
     * @var array
     */
    private $content = array();

    /**
     * Constructor for initialization of message's text
     *
     * @param array $content
     */
    public function __construct(array $content)
    {
        $this->content = $content;
    }

    /**
     * Recording message to the session
     */
    public function send()
    {
        $_SESSION['sessionMessages'][] = $this->content;
    }

    /**
     * Getting the $content property
     *
     * @return string|string
     */
    public function getContent()
    {
        return $this->content;
    }

} 