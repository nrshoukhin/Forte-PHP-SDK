<?php

namespace Shoukhin\Forte\Common;

use Shoukhin\Forte\Transport\ForteRestCall;

/**
 * Class ForteResourceModel
 * An Executable ForteModel Class
 * @package Shoukhin\Forte\Common
 */
class ForteResourceModel extends ForteModel
{

    protected static function executeCall($url, $method, $payLoad, $headers = array(), $apiContext = null, $restCall = null, $handlers = array('Shoukhin\Forte\Handler\RestHandler'))
    {
        //Initialize the context and rest call object if not provided explicitly
        $restCall = $restCall ? $restCall : new ForteRestCall($apiContext);

        //Make the execution call
        $json = $restCall->execute($handlers, $url, $method, $payLoad, $headers);
        return $json;
    }

}
