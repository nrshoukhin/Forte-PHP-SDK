<?php

namespace Shoukhin\Forte\Log;

use Psr\Log\LoggerInterface;

/**
 * Class ForteDefaultLogFactory
 *
 * This factory is the default implementation of Log factory.
 *
 * @package Shoukhin\Forte\Log
 */
class ForteDefaultLogFactory implements ForteLogFactory
{
    /**
     * Returns logger instance implementing LoggerInterface.
     *
     * @param string $className
     * @return LoggerInterface instance of logger object implementing LoggerInterface
     */
    public function getLogger($className)
    {
        return new ForteLogger($className);
    }
}
