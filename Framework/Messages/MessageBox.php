<?php
/**
 * Created by PhpStorm.
 * User: Dimona
 * Date: 27.10.14
 * Time: 0:23
 */

namespace Framework\Messages;


class MessageBox
{
    /**
     * The array of incoming messages
     *
     * @var array
     */
    private $messages = array();

    /**
     * Constructor. Record all incoming messages to the variable $message
     * and delete them from the session
     */
    public function __construct()
    {
        if (isset($_SESSION['sessionMessages']) && is_array($_SESSION['sessionMessages'])) {
            $this->messages = $_SESSION['sessionMessages'];
            $_SESSION['sessionMessages'] = array();
        }
    }

    /**
     * Get array of messages
     *
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }


} 