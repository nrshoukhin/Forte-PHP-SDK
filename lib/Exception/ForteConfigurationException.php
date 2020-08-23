<?php

namespace Shoukhin\Forte\Exception;

/**
 * Class ForteConfigurationException
 *
 * @package Shoukhin\Forte\Exception
 */
class ForteConfigurationException extends \Exception
{

    /**
     * Default Constructor
     *
     * @param string|null $message
     * @param int  $code
     */
    public function __construct($message = null, $code = 0)
    {
        parent::__construct($message, $code);
    }
}
